<!DOCTYPE html>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<html>
<body>
<?php

$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";




function push2queue($rds_number,$mnumber,$ptype,$pvalue){
	$url = 'https://kainoi.net/incentive.php';	
	$encode_phone = encode($mnumber,"w-e-b-r-d-s") ;
	$fields = [
		'rds_code'      => $rds_number,
		'm_phone' => $mnumber,
		'pay_type' => $ptype,
		'pay_value' => $pvalue
	];
$fields_string = http_build_query($fields);
//open connection
/*
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);*/

										$ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                                        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                                        
                                        $httpCode = curl_getinfo($ch , CURLINFO_HTTP_CODE); // this results 0 every time
                                        $result = curl_exec($ch);
                                        
                                        if ($result === false) 
                                            $result = curl_error($ch);
                                        
                                       // echo stripslashes($response);
                                        
                                        curl_close($ch);


return $result;
}

function RunSQL($sqlstring){
	// Create connection
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
	if ($conn->connect_error) {
		 return "errorconnect";
	} 	
	mysqli_set_charset( $conn, 'utf8');
	if (mysqli_query($conn, $sqlstring)) {
		return "success";
	} else {
		return "failed" . mysqli_error($conn);
	}
	mysqli_close($conn);
}

function encode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string,$i,1));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
    }
    return $hash;
}

function decode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    return $hash;
}


function get_eli2pay($recruiter){
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
	if ($conn->connect_error) {
		 return "none";
	} 	
	mysqli_set_charset( $conn, 'utf8');
	$sql = "SELECT tbanswer.rdscode, tbanswer.REGMOBILE,tbcoupon.DateExpire from tbanswer INNER JOIN tbcoupon on tbanswer.RDSCODE = tbcoupon.Coupon where tbanswer.isques is not null and tbcoupon.recruiter = '" . $recruiter . "'" ;
	$result = $conn->query($sql);
	$num_rows = mysqli_num_rows($result);
	$eli2pay = array();
	
	if ($num_rows == 0){
		return $eli2pay;
	} else {
		$k = 0;
		while ($row = $result->fetch_assoc()) {
				$k = $k + 1;
				$eli2pay[$k] = $row['rdscode'];
		}
		/* free result set */
		$result->free();
		return $eli2pay;
	}
}




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

mysqli_set_charset( $conn, 'utf8');
$sql = "select distinct tbcoupon.Recruiter ,tbanswer.REGMOBILE,  tbanswer.RDSCODE";
$sql.= " FROM tbcoupon inner join  tbanswer on tbcoupon.Recruiter = tbanswer.RDSCODE";
$sql.= " where tbcoupon.DateExpire < now() and tbcoupon.Recruiter is not null and tbanswer.isques is not null and tbanswer.REGMOBILE not in (select tbpayqueue.mnumber from tbpayqueue where pay_for = 'R')";
$result = $conn->query($sql);
$num_rows = mysqli_num_rows($result);

echo "Clear older than 2 days PayLog";
echo "<br>";
echo RunSQL("Delete FROM `tbpaylog` WHERE pay_detail = '0 request(s) on queue' and date_process < DATE_sub(now(), INTERVAL 2 DAY)");
echo "<br>";

echo "Waitting to pay for refer : " . $num_rows;
echo "<br>";
echo RunSQL("insert into tbpaylog(mnumber,date_process,pay_type,pay_value,pay_detail) Values ('System',Now(),'Log',Null,'" . $num_rows . " request(s) for refer')") . " : ";
echo "insert into tbpaylog(mnumber,date_process,pay_type,pay_value,pay_detail) Values ('System',Now(),'Log',Null," . $num_rows . ",'for refer')" ;
if ($num_rows > 0) {
	/* fetch associative array */
	echo "<br>";
    while ($row = $result->fetch_assoc()) {
		echo $row['Recruiter'];
		echo "waitting for pay : " . $row['Recruiter'] . "/" . $row['REGMOBILE'] . " pay for : Refer requested time : " . date("d-h-Y H:i:s");
		echo "<br>";
		$a = array();
		$a = get_eli2pay($row['Recruiter']);
		echo sizeof($a) . " recruitee";
		echo "<br>";
		if (sizeof($a) == 0) {
			echo push2queue($row['Recruiter'],$row['REGMOBILE'],"R",sizeof($a)*50);
		} else	{
			foreach($a as $key => $value){
				echo $value . " " ;
			}
			echo "<br>";
			echo push2queue($row['recruiter'],$row['REGMOBILE'],"R",sizeof($a)*50);
			echo "<br>";
		}
	}
}
    /* free result set */
    $result->free();
$conn->close();

?>  

</body>
</html>