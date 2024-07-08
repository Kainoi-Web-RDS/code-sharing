<!DOCTYPE html>

<meta http-equiv=Content-Type content="text/html; charset=utf-8">

<html>

<body>

<?php

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


$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";


$rds_code = $_POST['rds_code'];

$pay_value = $_POST['pay_value'];

$pay_type = $_POST['pay_type'];

$m_phone = $_POST['m_phone'];





function redirect($url, $statusCode = 303)

{

   header('Location: ' . $url, true, $statusCode);

   die();

}



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

     die("Connection failed: " . $conn->connect_error);

} 



mysqli_set_charset( $conn, 'utf8');

$sql = "select * from tbpayqueue where mnumber ='" . $m_phone . "' and pay_for = '" . $pay_type .  "'" ;

$result = $conn->query($sql);

$num_rows = mysqli_num_rows($result);

$row = $result->fetch_assoc();
echo $m_phone . " : " . decode($m_phone,"w-e-b-r-d-s");

if (num_rows == 0) {

		$sql_i = "INSERT INTO tbpayqueue (mnumber,pay_for,pay_value,req_date) VALUES ('" . $m_phone . "','" . $pay_type ."'," . $pay_value . ",NOW())";


		if ($conn->query($sql_i) === TRUE) {

			echo "New record created successfully";

		} else {

			echo "Error: " . $sql_i . "<br>" . $conn->error;

		}

	} else {



    echo "non existing code";

}



$conn->close();

?>  



</body>

</html>