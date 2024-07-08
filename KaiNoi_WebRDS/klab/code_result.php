<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');

?>
<?php
error_reporting(~E_NOTICE);

 $LABNUMBER =  $_POST['LABNUMBER'];
 $_SESSION["LABNUMBER"] = $_POST['LABNUMBER'];
 
 
 $BMHIVRES =  $_POST['BMHIVRES'];
 /*$BMVLRES = $_POST['BMVLRES'];*/
 $BMVLRES_OTH = $_POST['BMVLRES_OTH'];

/*if($BMVLRES  == 'NOT DONE' or $BMVLRES  == 'UNDETECTABLE' )
{
 $BMVLRES = $BMVLRES;      
}
else{
   $BMVLRES   =   $BMVLRES_OTH; 
}*/
$Syphilis = isset($_POST['Syphilis']) ? $_POST['Syphilis'] : 0;
$titer_OTH = $_POST['titer_OTH'];
$TP = isset($_POST['TP']) ? $_POST['TP'] : 0;

$HB = isset($_POST['HB']) ? $_POST['HB'] : 0;
$HC = isset($_POST['HC']) ? $_POST['HC'] : 0;
$Recency = isset($_POST['Recency']) ? $_POST['Recency'] : 0;


      $datenow = date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));

		
		if($conn_rds->connect_error)
		{
			die("Connection failed: " . $conn_rds->connect_error);
		}
  
  //  check duplicate ก่อน
 
                                                            $sqlduplicate = "select LABNUMBER from tbresult  where LABNUMBER= '" . $LABNUMBER . "'";
                                                            $resultduplicate = $conn_rds->query($sqlduplicate);
                                                            $num_rowsduplicate = mysqli_num_rows($resultduplicate);
                                                            if ($resultduplicate->num_rows > 0) {
                                                             $LABNUMBER =  $_POST['LABNUMBER'];
                                                             $_SESSION["LABNUMBER"] = $_POST['LABNUMBER'];
                                                                echo "<meta http-equiv='refresh' content='0;URL=formmessage03.php'>";
                                                            }
                                                            else
                                                            {
                                                            $sql = "INSERT INTO tbresult (LABNUMBER,";                                                                                         // RDS CODE
                                                            $sql.= " BMHIVRES,";                                                                                                                             // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,QT-PASS,BIO-PASS
                                                            $sql.= " BMVLRES, BMVLRES_OTH,";                                                                                                       // Date regis  and seed
                                                            $sql.= " Syphilis_RPR, titer, Syphilis_TP, HB, HC, Recency,";
                                                            $sql.= " LASTUPDATE) VALUES";                                                                                                              // Date Update
                                                            // ==========================================INSERT VALUES====================================================
                                                            $sql.= "('$LABNUMBER',";                                                                                                                                   // RDS CODE
                                                            $sql.= "'$BMHIVRES',";
                                                            $sql.= "'0','$BMVLRES_OTH',";                                                                                                                             // Date regis  and seed
                                                            $sql.= "'$Syphilis','$titer_OTH','$TP','$HB','$HC','$Recency',";
                                                            $sql.= "'$datenow')";                                                                                                                                     // Date Update
                                                                        if ($conn_rds->query($sql) === TRUE)
                                                                              {
                                                                               
                                                                                      
                                                                                    echo "<meta http-equiv='refresh' content='0;URL=fins.php'>";							//nextstep old	///accept.php									
                                                                           }
                                                            }
                                                       
					   $conn_rds->close();
?>