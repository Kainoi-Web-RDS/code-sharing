<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php'); 
/*require_once("DBController.php");
$db_handle = new DBController();*/
//$rds_code  = $_SESSION["rds_code"];
$secure_m = $_POST['secure_m'];
$pay = $_POST['idmos'];

 error_reporting( error_reporting() & ~E_NOTICE );
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
														    
															$secure_text = encode($secure_m,"w-e-b-r-d-s");
//$_SESSION["pay"] = $pay;
//$pay = $_SESSION["pay"];

if(!empty($_POST["idmos"])) {
	if($secure_text == "j4j5u584"){ //kam3

	$pay_select =substr($pay,0,1); 
    //echo $pay_select;
   // echo "<br>";
     if($pay_select == "Q"){
		$pay_text = "ค่าตอบแบบสอบถาม";
	  }
	  elseif($pay_select == "R"){
		$pay_text = "ค่าชวนเพื่อนเข้าร่วมโครงการ";
	  }
	  elseif($pay_select == "L"){
		$pay_text = "ค่ามาตรวจเลือด";
	  }
  
	$pay_mobile =substr($pay,1,20);
    //echo $pay_mobile;
    //echo "<br>";
	$pay_values =substr($pay,21);
   // echo $pay_values;
   // echo "<br>";
															
      $mobilephoneEX = decode($pay_mobile,"w-e-b-r-d-s");
													
		$query = "SELECT * FROM tbpayqueue WHERE  mnumber='$pay_mobile' and pay_for='$pay_select' and pay_value='$pay_values'";
		   $result_t= $conn_rds->query($query);
		   $user_count = mysqli_num_rows($result_t);
           $row_t = $result_t->fetch_assoc();
		   
			$peer1 = $row_t['ecoupon01'];
            $peer2 = $row_t['ecoupon02'];
            $peer3 = $row_t['ecoupon03'];
			$peer4 = $row_t['ecoupon04'];
																							
			if($user_count == 1){
				////////////////////////////////////**************************************SMS** แจกเพือน*****************************************
											
                                                
                                               	$tel_users = $mobilephoneEX;
											    $change_moblie = substr($tel_users,1,9);
												$new_moblie = 66000000000+$change_moblie;
												

				$text_sms2 = utf8tohtml('www.kainoi.net ส่งรหัส 
				'. $peer1 .'
				'. $peer2 .'
				'. $peer3 .'
				'. $peer4 .'', true); 
		
				
				$input_xml = "<?xml version=\"1.0\" encoding=\"TIS-620\"?><message>
				<sms type=\"mt\">
				<service-id>xxxxxxxxxxxxxxxxxxx</service-id>
				<destination>
						<address>
						<number type=\"international\">$new_moblie</number>
						</address></destination><source>
						<address>
						<number type=\"abbreviated\">xxxxxxxxxxxxxxxx</number>
						<originate type=\"international\">xxxxxxxxxxxxxx</originate>
						<sender>KAINOI</sender>
				</address>
				</source><ud type=\"text\" encoding=\"unicode\">$text_sms2</ud><dro>true</dro></sms>
				</message>";
				
				
				echo "\n";
				$url = "xxxxxxxxxxxxxxxx";
				$headers = array(
					"Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxx",
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
					
				echo "<script>document.getElementById('user-availability-status').style.display = 'block'</script>";
				echo "<span id=g2 class='status-available'><h4>
				<p>ส่ง SMSที่เบอร์โทร์ศัพท์ :<font color='#A569BD'>$mobilephoneEX</font></p>
				<p>$pay_text จำนวน <font color='#FF2158'>$pay_values</font> บาท</p>
				<br></h4></span>";
				echo "<script>document.getElementById('ps').style.display = 'block'</script>";
				echo "<script>document.getElementById('submit').style.display = 'block'</script>";
				echo "<script>$('#ok2').prop('disabled',false);</script> ";
				echo "<script>document.getElementById('back').style.display = 'none'</script>";
																																															
                                          	
					
				}
			else{
				echo "<script>document.getElementById('user-availability-status').style.display = 'block'</script>";
				echo "<span id=g1 class='status-not-available'><h4><font color='#E74C3C'>รหัสไม่ถูกต้อง</font></h4></span>";
				echo "<script>document.getElementById('ps').style.display = 'none'</script>";
				echo "<script>document.getElementById('submit').style.display = 'none'</script>";
				echo "<script>$('#ok2').prop('disabled',true);</script>";
				echo "<script>document.getElementById('back').style.display = 'block'</script>";
				}
			}			
		else
			{
					echo "<script>document.getElementById('user-availability-status').style.display = 'block'</script>";
					echo "<span id=g1 class='status-not-available'><h4><font color='#E74C3C'>รหัสยืนยันไม่ถูกต้อง</font></h4></span>";
					echo "<script>document.getElementById('ps').style.display = 'none'</script>";
					echo "<script>document.getElementById('submit').style.display = 'none'</script>";
					echo "<script>$('#ok2').prop('disabled',true);</script>";
					echo "<script>document.getElementById('back').style.display = 'block'</script>";
			}
	}
	else
	{
		echo "<script>document.getElementById('user-availability-status').style.display = 'block'</script>";
	    echo "<span id=g1 class='status-not-available'><h4><font color='#E74C3C'>ข้อมูลผิดผลาด</font></h4></span>";
		echo "<script>document.getElementById('ps').style.display = 'none'</script>";
		echo "<script>document.getElementById('submit').style.display = 'none'</script>";
		echo "<script>$('#ok2').prop('disabled',true);</script>";
		echo "<script>document.getElementById('back').style.display = 'block'</script>";
	}
?>