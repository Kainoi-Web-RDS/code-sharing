<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php'); 
/*require_once("DBController.php");
$db_handle = new DBController();*/
//$rds_code  = $_SESSION["rds_code"];


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

				$query = "select regmobile,coupon1 from sendPHONE_SMS";
		


		   $result_t= $conn_rds->query($query);
		  // $user_count = mysqli_num_rows($result_t);
    // $row_t = $result_t->fetch_assoc();
		while($row = mysqli_fetch_array($result_t))
   {
   // echo   $row['rdscode']; 
    $value = $row['regmobile'];
    $value2 = $row['coupon1'];
     
 

				////////////////////////////////////**************************************SMS** แจกเพือน*****************************************
										
             $mobilephoneEX = decode($value,"w-e-b-r-d-s");                                  
             $tel_users = $mobilephoneEX;
											  $change_moblie = substr($tel_users,1,9);
											  $new_moblie = 66000000000+$change_moblie;
											
					
				echo $new_moblie;
    echo "<br>";
				##### 
				#####
				##### 
				
				//$text_sms0  = utf8tohtml('เหลือรหัสแจกเพื่อนที่ยังใช้ได้ภายใน', true); // &#3585;&#3586;&#3588;&#3591;
				//$text_sms1 = utf8tohtml('คุณได้TrueMoney 200 บาท E-coupon 150 บาท  4568789797511', true); // &#3585;&#3586;&#3588;&#3591;
				//$text_sms2 = utf8tohtml('คุณได้TrueMoney 
				//E-coupon 50 บาท 4568789797511
				//E-coupon 50 บาท 5008789797512
				//E-coupon 50 บาท 9998789797513', true); // &#3585;&#3586;&#3588;&#3591;
				//$text_sms3 = utf8tohtml('คุณได้TrueMoney 200 บาท E-coupon 150 บาท  7227897975488', true);
		 //	$text_sms_rd = utf8tohtml('คุณสามารถเข้ารับการตรวจเลือดได้ทีสถานพยาบาล ดังนี้ https://kainoi.net/hos.php ได้รับค่าเดินทาง truemoney 500 บาท ', true); // &#3585;&#3586;&#3588;&#3591; //BKK ตรวจเลือด
    //แจกรหัสทั้งหมดให้เพือนได้อีก 150บาท ให้เพื่อนข้าร่วมโครงการกับเรา   คลิกที่ kainoi.net
     $text_sms_rd = utf8tohtml('อย่าลืมแจกรหัสให้เพือน เมื่อเพื่อนเข้าร่วมโครงการกับเรา คุณจะได้รับทรูมันนี่ 50 บาท/เพื่อน 1 คน (ชวนเพื่อนได้ 3 คน)', true);
    //$text_sms_rd = utf8tohtml('แจกรหัสทั้งหมดให้เพือนได้อีก 150บาท ให้เพื่อนข้าร่วมโครงการกับเรา   คลิกที่ kainoi.net', true); // &#3585;&#3586;&#3588;&#3591; //BKK ตรวจเลือด
				$text_sms5 = utf8tohtml('ขอส่งรหัสทรูมันนี่ทดแทนรหัสเดิมที่ใช้ไม่ได้ รหัสใหม่คือ  '. $value2 , true);// &#3585;&#3586;&#3588;&#3591;
				//echo utf8tohtml('<font>', true); // &lt;font&gt;
				//echo utf8tohtml('<font>', false); // <font>
				
    /*  close*/
				$input_xml = "<?xml version=\"1.0\" encoding=\"TIS-620\"?><message>
				<sms type=\"mt\">
				<service-id>xxxxxxxxxxxxxx</service-id>
				<destination>
						<address>
						<number type=\"international\">$new_moblie</number>
						</address></destination><source>
						<address>
						<number type=\"abbreviated\">xxxxxxxxxxxxxx</number>
						<originate type=\"international\">xxxxxxxxxxxxxx</originate>
						<sender>KAINOI</sender>
				</address>
				</source><ud type=\"text\" encoding=\"unicode\">$text_sms5</ud><dro>true</dro></sms>
				</message>";
				
				
				echo "\n";
				$url = "xxxxxxxxxxxxxxxxxxxxxx";
				$headers = array(
					"Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxx",
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
					/**/
  
    }

?>