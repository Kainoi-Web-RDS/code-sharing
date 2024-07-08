<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');

?>
<?php

//$BMCONS = $_POST['BMCONS'];// ยินดี // ไม่ยินดี

//$BMCOMM = $_POST['BMCOMM'];
//ยินดี

error_reporting( error_reporting() & ~E_NOTICE );
$BMTESTDATE = $_POST['BMTESTDATE'];
$STEPTEL1 = $_POST['STEPTEL1'];

//$BMSPX = $_POST['BMSPX'];
$LABNO = $_POST['LABNO'];
//ไม่ยินดี
//$RFBIO = $_POST['RFBIO'];
//$RFBIO_OTH= $_POST['RFBIO_OTH'];



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
 $mobilephoneEX2 = encode($STEPTEL1,"w-e-b-r-d-s");
 $_SESSION["mobilephoneEX2"] = $mobilephoneEX2;
  $datenow = date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
		
		if($conn_rds->connect_error)
		{
			die("Connection failed: " . $conn_rds->connect_error);
		}


         $date = str_replace('/', '-', $BMTESTDATE);
         $BMTESTDATE =  date('Y-m-d', strtotime($date));
         
                                                                            $sql_up = "UPDATE tblab SET";                                                                                                          
                                                                                
                                                                            $sql_up.= " BMTESTDATE='$BMTESTDATE',";
                                                                            $sql_up.= " LABNUMBER='$LABNO',";
                                                                            $sql_up.= " LASTUPDATE='$datenow'";                    
                                                                            $sql_up.= " WHERE BMRETEL1 = '" . $mobilephoneEX2 . "'";                                          
                                                                                 if ($conn_rds->query($sql_up) === TRUE)
                                                                            {
                                                                                     $status_lab =2;
                                                                                     $STATUSCODE ='BIO-PASS';
                                                                                      $sql_up2 = "UPDATE tbanswer SET";
                                                                                      $sql_up2.= " STATUSCODE = '$STATUSCODE',";  
                                                                                      $sql_up2.= " STATUS_LAB = '$status_lab',";                                                                                                      
                                                                                      $sql_up2.= " LASTUPDATE = '$datenow'";                                                                                                                                                               
                                                                                      $sql_up2.= "WHERE REGMOBILE='" . $mobilephoneEX2 . "'";
                                                                                      $conn_rds->query($sql_up2) ;
                                                                                      echo "<meta http-equiv='refresh' content='0;URL=success.php'>";
                                                                            }
                                                                            else
                                                                            {
                                                                                    echo "Error: " . $sql_up2 . "<br>" . $conn_rds->error;
                                                                                }
    
                                                                                    
                                                                                  
                                                                                   //   																
                                                                      //      }    							
                                        
					   $conn_rds->close();
?>