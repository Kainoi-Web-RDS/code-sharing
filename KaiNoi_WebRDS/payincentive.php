<!DOCTYPE html>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<html>
<body>
<?php

$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";


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

function get150ecoupon($ncoupon){
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
	if ($conn->connect_error) {
		 return "none";
	} 	
	mysqli_set_charset( $conn, 'utf8');
	$sql = "select * from tbecoupon where cvalue = 150 and used_date is null";
	$result = $conn->query($sql);
	$num_rows = mysqli_num_rows($result);
	$c150baht = array();
	$row = $result->fetch_assoc();
	if ($num_rows < $ncoupon){
		return "none";
	} else {
		$k = 0;
		$coupon150 = "c150 = ";
		while ($row = $result->fetch_assoc()) {
				if ($k == $ncoupon ){
					break;
				}
				$k = $k + 1;
				$c150baht[$k] = $row['cnumber'];
				$coupon150 = $coupon150 . $row['cnumber'] . "," ;
				
		}
		/* free result set */
		$result->free();
		echo $c150baht[0];
		return $c150baht;
	}
}
function get500ecoupon(){
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
	if ($conn->connect_error) {
		 return "none";
	} 	
	mysqli_set_charset( $conn, 'utf8');
	$sql = "select * from tbecoupon where cvalue = 500 and used_date is null";
	$result = $conn->query($sql);
	$num_rows = mysqli_num_rows($result);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) {
			return $row['cnumber'];
	} else {
		$conn->close();	
		return "none";
	}
}
function get50ecoupon($ncoupon){
	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
	if ($conn->connect_error) {
		 return "none";
	} 	
	mysqli_set_charset( $conn, 'utf8');
	$sql = "select * from tbecoupon where cvalue = 50 and used_date is null";
	$result = $conn->query($sql);
	$num_rows = mysqli_num_rows($result);
	$c50baht = array();
	
	if ($num_rows < $ncoupon){
		return "none";
	} else {
		$k = 0;
		$coupon50 = "c50 = ";
		while ($row = $result->fetch_assoc()) {
				
				if ($k == $ncoupon ){
					break;
				}
				$k = $k + 1;
				$c50baht[$k] = $row['cnumber'];
				$coupon50 = $coupon50 . $row['cnumber'] . "," ;
				
		}
		/* free result set */
		$result->free();
		return $c50baht;
	}
	return "none";
}




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
//Pay right away	
//$sql = "select * from tbpayqueue where paid_date is null order by pay_value";
//Pay 14 Days later
$sql = "select * from tbpayqueue where paid_date is null and DATEDIFF(now(),req_date) > 7 order by pay_value";
$code_truemoney = "";
$result = $conn->query($sql);
$num_rows = mysqli_num_rows($result);
//$row = $result->fetch_assoc();


echo "Waitting on queue : " . $num_rows;
echo "<br>";
echo RunSQL("insert into tbpaylog(mnumber,date_process,pay_type,pay_value,pay_detail) Values ('System',Now(),'Log',Null,'" . $num_rows . " request(s) on queue')") . " : ";
echo "insert into tbpaylog(mnumber,date_process,pay_type,pay_value,pay_detail) Values ('System',Now(),'Log',Null," . $num_rows . "' On queue')" ;

if ($num_rows > 0) {
	/* fetch associative array */
	
	echo "<br>";
    while ($row = $result->fetch_assoc()) {
			echo "waitting for pay : " . $row['mnumber'] . " pay for : " . $row['pay_for'] . " requested time : " . $row['req_date'] ;
			echo "<br>";
			switch ($row['pay_for']) {
				case "Q":
					if (get150ecoupon(2) == "none") {
						$code_truemoney = "coupon 150 is not enough";
					} else	{
						$a = array();
						$a = get150ecoupon(2);
						foreach($a as $key => $value){
							$code_truemoney = $code_truemoney . $value . ",";
					    }
						$code_truemoney = substr($code_truemoney,0,strLen($code_truemoney)-1) ;
					}
					break;
				case "R":
					switch ($row['pay_value']) {
						case 0:
							$code_truemoney = "No recruitee";
							break;
						case 50:
							if (get50ecoupon(1) == "none") {
								$code_truemoney = "coupon 50 is not enough";
							} else {
								$a = array();
								$a = get50ecoupon(1);
								foreach($a as $key => $value){
									$code_truemoney = $code_truemoney . $value . "," ;
								}
								$code_truemoney = substr($code_truemoney,0,strLen($code_truemoney)-1) ;
							}						
							break;
						case 100:
							if (get50ecoupon(2) == "none") {
								$code_truemoney = "coupon 50 is not enough";
							} else {
								$a = array();
								$a = get50ecoupon(2);
								foreach($a as $key => $value){
									$code_truemoney = $code_truemoney . $value . "," ;
								}
								$code_truemoney = substr($code_truemoney,0,strLen($code_truemoney)-1) ;
							}		
							break;
						case 150:
							if (get150ecoupon(1) == "none") {
								if (get50ecoupon(3) == "none") {
									$code_truemoney = "coupon 50 is not enough";
								} else {
									$a = array();
									$a = get50ecoupon(3);
									foreach($a as $key => $value){
										$code_truemoney = $code_truemoney . $value . "," ;
									}
									$code_truemoney = substr($code_truemoney,0,strLen($code_truemoney)-1) ;
								}		
							} else {
								$a = array();
								$a = get150ecoupon(1);
								foreach($a as $key => $value){
									$code_truemoney = $code_truemoney . $value . ",";
					    		}
								$code_truemoney = substr($code_truemoney,0,strLen($code_truemoney)-1) ;							
							}		
							break;
						default:
							$code_truemoney =  "ERROR" ;
					}
					break;
				case "L":
					if ((get500ecoupon() == "none") || (get50ecoupon(4) == "none")){
						$code_truemoney = "coupon 500/50 is not enough";
					} else	{

						$code_truemoney =  get500ecoupon() . "," ;
						$a = array();
						$a = get50ecoupon(4);
						foreach($a as $key => $value){
							$code_truemoney = $code_truemoney . $value . "," ;
						}
						$code_truemoney = substr($code_truemoney,0,strLen($code_truemoney)-1) ;
					}
					break;
				default:
					$code_truemoney =  "ERROR";
			}
			

			if ($code_truemoney == "ERROR" || $code_truemoney == "coupon 50 is not enough" || $code_truemoney == "coupon 500/50 is not enough" || $code_truemoney == "coupon 150 is not enough" ){
					//Update tbPaylog
					echo RunSQL("insert into tbpaylog(mnumber,date_process,pay_type,pay_value,pay_detail) Values ('" . $row['mnumber'] . "',Now(),'" . $row['pay_for'] . "'," . $row['pay_value'] . ",'FAILED')") . " : " ;
					echo "insert into tbpaylog(mnumber,date_process,pay_type,pay_value,pay_detail) Values ('" . $row['mnumber'] . "',Now(),'" . $row['pay_for'] . "'," . $row['pay_value'] . ",'FAILED')" ;
					echo "<br>" ;					
				} elseif ($code_truemoney == "No recruitee") {
					$ssql = "ecoupon01 = NULL";
					$ssql2 = "";
					
					echo RunSQL("Update tbpayqueue set paid_date = Now()," . $ssql . " where mnumber = '" . $row['mnumber'] . "' and pay_for = 'R'") . " ; " ;
					echo "Update tbpayqueue set paid_date = Now()," . $ssql . " where mnumber = '" . $row['mnumber'] . "' and pay_for = 'R'";
					echo "<br>" ;

					//Update tbPaylog
					echo RunSQL("insert into tbpaylog(mnumber,date_process,pay_type,pay_value,pay_detail) Values ('" . $row['mnumber'] . "',Now(),'R',0,'Success')") . " : " ;
					echo "insert into tbpaylog(mnumber,date_process,pay_type,pay_value,pay_detail) Values ('" . $row['mnumber'] . "',Now(),'R',0,'Success')" ;
					echo "<br>" ;		

					$code_truemoney = ""  ;
					$ssql = "";
					$ssql2 = "";
					
				}	else {
					$topay = array();
					$ssql = "";
					$ssql2 = "";
					
					echo $row['pay_value'];
					echo $code_truemoney[0];

					$topay = explode(',' , $code_truemoney);
					
					for ($x = 0; $x <= sizeof($topay) - 1; $x++) {
						
						$ssql = $ssql  . "ecoupon0" . ($x + 1) . " = '" . $topay[$x] . "',";
						$ssql2 = $ssql2 . "'" . $topay[$x] . "',";
					}
					

					$ssql = substr($ssql,0,strLen($ssql)-1) ;
					$ssql2 = substr($ssql2,0,strLen($ssql2)-1) ;
					//Update tbpayqueue
				echo $ssql;
				echo "<br>" ;
					echo RunSQL("Update tbpayqueue set paid_date = Now()," . $ssql . " where mnumber = '" . $row['mnumber'] . "' and pay_for = '" . $row['pay_for'] . "'") . " ; " ;
					echo "Update tbpayqueue set paid_date = Now()," . $ssql . " where mnumber = '" . $row['mnumber'] . "' and pay_for = '" . $row['pay_for'] . "'";					

					echo "<br>" ;

					//Update tbecoupon
					echo RunSQL("Update tbecoupon set used_date = NOW() where cnumber in (" . $ssql2 . ")" ) . " : ";
					echo "Update tbecoupon set used_date = NOW() where cnumber in (" . $ssql2 . ")" ;
					echo "<br>" ;

					//Update tbPaylog
					echo RunSQL("insert into tbpaylog(mnumber,date_process,pay_type,pay_value,pay_detail) Values ('" . $row['mnumber'] . "',Now(),'" . $row['pay_for'] . "'," . $row['pay_value'] . ",'Success')") . " ; " ;
					echo "insert into tbpaylog(mnumber,date_process,pay_type,pay_value,pay_detail) Values ('" . $row['mnumber'] . "',Now(),'" . $row['pay_for'] . "'," . $row['pay_value'] . ",'Success')" ;
					echo "<br>" ;					

					//Send SMS
					echo decode($row['mnumber'],"w-e-b-r-d-s") . " : " .  $code_truemoney . "<br>"; 


				 $mobilephoneEX = decode($row['mnumber'],"w-e-b-r-d-s");
               $tel_users = $mobilephoneEX;
				
					$change_moblie = substr($tel_users,1,9);
			
					$new_moblie = 66000000000+$change_moblie;
			
					
					function utf8tohtml($utf8, $encodeTags) {
					$result = '';
					for ($i = 0; $i < strlen($utf8); $i++) {
						 $char = $utf8[$i];
						 $ascii = ord($char);
						 if ($ascii < 128) {
							  // one-byte character
							  $result .= ($encodeTags) ? htmlentities($char) : $char;
						 } else if ($ascii < 192) {
							  // non-utf8 character or not a start byte
						 } else if ($ascii < 224) {
							  // two-byte character
							  $result .= htmlentities(substr($utf8, $i, 2), ENT_QUOTES, 'UTF-8');
							  $i++;
						 } else if ($ascii < 240) {
							  // three-byte character
							  $ascii1 = ord($utf8[$i+1]);
							  $ascii2 = ord($utf8[$i+2]);
							  $unicode = (15 & $ascii) * 4096 +
											 (63 & $ascii1) * 64 +
											 (63 & $ascii2);
							  $result .= "&#$unicode;";
							  $i += 2;
						 } else if ($ascii < 248) {
							  // four-byte character
							  $ascii1 = ord($utf8[$i+1]);
							  $ascii2 = ord($utf8[$i+2]);
							  $ascii3 = ord($utf8[$i+3]);
							  $unicode = (15 & $ascii) * 262144 +
											 (63 & $ascii1) * 4096 +
											 (63 & $ascii2) * 64 +
											 (63 & $ascii3);
							  $result .= "&#$unicode;";
							  $i += 3;
						 }
					}
					return $result;
			  }

			  //$text_sms0  = utf8tohtml('เหลือรหัสแจกเพื่อนที่ยังใช้ได้ภายใน', true); // &#3585;&#3586;&#3588;&#3591;
			  //$text_sms1 = utf8tohtml('คุณได้TrueMoney 200 บาท E-coupon 150 บาท  4568789797511', true); // &#3585;&#3586;&#3588;&#3591;
			  //$text_sms2 = utf8tohtml('คุณได้TrueMoney 
			  //E-coupon 50 บาท 4568789797511
			  //E-coupon 50 บาท 5008789797512
			  //E-coupon 50 บาท 9998789797513', true); // &#3585;&#3586;&#3588;&#3591;
			  $tspit = explode(',' , $code_truemoney);
           $t0= $tspit[0];
			  $t1= $tspit[1];
			  $t2= $tspit[2];
			  $t3= $tspit[3];
			  $t4= $tspit[4];
			  $text_sms3 = utf8tohtml('คุณได้ TrueMoney
				'. $t0 .'
				'. $t1 .'
				'. $t2 .'
				'. $t3 .'
				'. $t4 .'', true); // &#3585;&#3586;&#3588;&#3591;
			  /*$text_sms2 = utf8tohtml('รหัสแจกเพื่อน(ชวนเพื่อน)
			  '. $peer1 .'
			  '. $peer2 .'
			  '. $peer3 .'
			  ใช้ภายใน '. $dateExp2 .'', true); */
			  //$text_sms5 = utf8tohtml('รหัสแจกเพื่อนใช้ภายใน '. $dateExpire .' (ชวนเพื่อน) = '. $p1 .' ของท่าน', true);// &#3585;&#3586;&#3588;&#3591;
			  //echo utf8tohtml('<font>', true); // &lt;font&gt;
			  //echo utf8tohtml('<font>', false); // <font>
			  
			  $input_xml = "<?xml version=\"1.0\" encoding=\"TIS-620\"?><message>
			  <sms type=\"mt\">
			  <service-id>xxxxxxxxxxxxxxxxxxxxx</service-id>
			  <destination>
					  <address>
					  <number type=\"international\">$new_moblie</number>
					  </address></destination><source>
					  <address>
					  <number type=\"abbreviated\">xxxxxxxxxxxxxxxxx</number>
					  <originate type=\"international\">xxxxxxxxxxxxxxxxxxx</originate>
					  <sender>KAINOI</sender>
			  </address>
			  </source><ud type=\"text\" encoding=\"unicode\">$text_sms3</ud><dro>true</dro></sms>
			  </message>";
			  
			  
			  echo "\n";
			  $url = "xxxxxxxxxxxxxxxxxxxxxx";
			  $headers = array(
					"Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxxx",
					"Content-type: text/xml",
					"Content-length: " . strlen($input_xml),
					"Connection: close",
			  );
			  
			  $ch = curl_init();
			  curl_setopt($ch, CURLOPT_URL,$url);
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			  curl_setopt($ch, CURLOPT_POST, true);
			  curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml);
			  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			  $data = curl_exec($ch);			
				  

/////////

					$code_truemoney = ""  ;
					$ssql = "";
					$ssql2 = "";
			}
			
    }
    /* free result set */
    $result->free();
} 
$conn->close();

?>  

</body>
</html>