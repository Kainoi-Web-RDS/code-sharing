<?php
error_reporting(E_ALL ^ E_NOTICE);
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');

//http://www.farmerboe.com/app/RDSONLINE/randomcode.php?ISQUES1={SAVEDID}&ISQUES2={TOKEN}


	 $ISQUES1= $_GET['ISQUES1'];
     $ISQUES2= $_GET['ISQUES2'];
     $ISQUES3= $_GET['ISQUES3'];
	 $ISQUES4= $_GET['ISQUES4'];
 	$rds_code_lime = $ISQUES3;
	$CSBIOM_lime = $ISQUES4;
	// echo $rds_code;
	 //exit(0);
	$_SESSION["CSBIOM"] =  $CSBIOM_lime;
	$_SESSION["rds_code"] =  $rds_code_lime;
     $rdscode = $_SESSION["rds_code"];
	 $CSBIOM = $_SESSION["CSBIOM"];
     $ISQUES_ALL = $ISQUES1."-".$ISQUES2;
           error_reporting( error_reporting() & ~E_NOTICE );
              // date_default_timezone_set("Asia/Bangkok");
                                             $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
           $status = "QT-PASS";
		   $stalab = 0;													

		   
        if ($conn_rds->connect_error) {
		die("Connection failed: " . $conn_rds->connect_error);
            }
			
			$sql = "select REGMOBILE from tbanswer where RDSCODE = '" . $rdscode . "'";
			$result = $conn_rds->query($sql);
			$num_rows = mysqli_num_rows($result);
			$row = $result->fetch_assoc();
			$telcode =$row['REGMOBILE'];
			
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
				$mobilephone = decode($decode_phone,"w-e-b-r-d-s");
				
				
			$_SESSION["mobilephone"] = $mobilephone;
			$mobilephone = $_SESSION["mobilephone"];
			 
		
                                                                    $sql_d = "UPDATE tbanswer SET";                                                                                                          
                                                                    $sql_d.= " STATUSCODE='$status',";                                                                                                                
                                                                    $sql_d.= " ISQUES='$ISQUES_ALL',";                                 
                                                                    $sql_d.= " STATUS_LAB='$stalab',";  
                                                                    $sql_d.= " LASTUPDATE='$datenow'";                                                                                                                                                               
                                                                    $sql_d.= "WHERE RDSCODE='$rdscode'";
                                                                  if ($conn_rds->query($sql_d) === TRUE) {
                                                                //$resultd = $conn_rds->query($sql_d);
								//redirect("randomcode_get.php",303);
								
								echo "<script>";
								echo "window.location='quespass.php'";
								echo "</script>";
                          //echo "<meta http-equiv='refresh' content='0;URL=randomcode_get.php'>";																			
							} else {
								  redirect("formmessage80.php",303);
								  }
								$conn_rds->close();
?>
