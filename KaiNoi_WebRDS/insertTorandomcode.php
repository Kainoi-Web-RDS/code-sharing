<?php 
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');

if(isset($_POST['ISQUES_ALL'])){

	 $ISQUES_ALL = $_POST['ISQUES_ALL'];
	 $rdscode = $_POST['rds_code'];
	 
	$session['rdscode'] =  $rdscode;

	$datenow= date("Y-m-d h:i:s");
	$status = "QT-PASS";

	if ($conn_rds->connect_error) {
		die("Connection failed: " . $conn_rds->connect_error);
	} 

	$sql_d = "UPDATE tbanswer SET";                                                                                                          
	$sql_d.= " STATUSCODE='$status',";                                                                                                                
	$sql_d.= " ISQUES='$ISQUES_ALL',";                                 

	$sql_d.= " LASTUPDATE='$datenow'";                                                                                                                                                               
	$sql_d.= "WHERE RDSCODE='$rdscode'";
	if ($conn_rds->query($sql_d) === TRUE) {
        //$resultd = $conn_rds->query($sql_d);
		//redirect("randomcode_get.php",303);

		echo "1";
        //echo "<meta http-equiv='refresh' content='0;URL=randomcode_get.php'>";																			
	} else {
		echo "2";
	}
	$conn_rds->close();

}


?>