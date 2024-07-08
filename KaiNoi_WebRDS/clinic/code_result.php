<?php
ob_start();
session_start();
require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php');

?>
<?php
error_reporting(~E_NOTICE);

 $LABNUMBER = $_SESSION["LABNUMBER"];
 


 
 $BMHIVRES =  $_POST['BMHIVRES'];

 /*$BMVLRES = $_POST['BMVLRES'];*/
 $BMVLRES_OTH = $_POST['BMVLRES_OTH'];


$Syphilis = isset($_POST['Syphilis']) ? $_POST['Syphilis'] : 0;
$HB = isset($_POST['HB']) ? $_POST['HB'] : 0;
$HC = isset($_POST['HC']) ? $_POST['HC'] : 0;
$Recency = isset($_POST['Recency']) ? $_POST['Recency'] : 0;


      $datenow = date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));

		if($conn_rds->connect_error)
		{
			die("Connection failed: " . $conn_rds->connect_error);
		}
			 $sql_upe = "UPDATE tbresult SET BMHIVRES ='$BMHIVRES', BMVLRES ='0', BMVLRES_OTH	='$BMVLRES_OTH', Syphilis ='$Syphilis', HB ='$HB',";
    $sql_upe.= " HC ='$HC', Recency ='$Recency', LASTUPDATE ='$datenow' WHERE LABNUMBER = '" . $LABNUMBER . "'";
                                                                            
								 $result= $conn_rds->query($sql_upe);
								      
								         //  echo "Error: " . $sql_upe . "<br>" . $conn_rds->error;
										        echo "<meta http-equiv='refresh' content='0;URL=fin.php'>";																	
								   
					   $conn_rds->close();
?>