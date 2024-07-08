<?php
ob_start();
session_start();
require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php'); 
?>
<?php
$rds_code = $_SESSION["rds_code"];
 //$status = "";  Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,JOIN,QT-PASS,BIO-PASS

//-----------------------------------------------Question Screen-----------------------------------------------

$isAgree =  $_POST["isAgree"];
//echo  $isAgree ;
//echo "<br>";
if(!empty($_POST['pins'])){
     $pins= $_POST['pins'];
}
if(empty($_POST['pins'])){
     $pins = '0';
}
//echo "<br>";
//echo  $pins ;

//echo "<br>";

  $plan = $pins + $isAgree;

//echo  $plan ;

//echo "<br>";




//$knhiv=  $_POST["knhiv"];
if(!empty($_POST['knhiv'])){
     $knhiv = $_POST['knhiv'];
}

if(empty($_POST['knhiv'])){
     $knhiv = '0';
}  
//$knhiv_oth =  $_POST["knhiv_oth"];
if(!empty($_POST['knhiv_oth'])){
     $knhiv_oth = $_POST['knhiv_oth'];
}

if(empty($_POST['knhiv_oth'])){
     $knhiv_oth = '0';
}



//-----------------------------------------------CHECK-----------------------------------------------
  
//echo  $ELIGIB;
 error_reporting( error_reporting() & ~E_NOTICE );
  $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));



if ($conn_rds->connect_error) {
    die("Connection failed: " . $conn_rds->connect_error);
} 

//$sql = "UPDATE tbanswer SET lastname='Doe' WHERE RDSCODE='$rds_code'";

	         $sql = "UPDATE tbanswer SET";                                                                                                          
                                                                                                                  
                                                            $sql.= " IS_Agree='$plan',";                                                                                                                   
                                                            $sql.= " KNHIV='$knhiv',";                                                                                                                       
                                                            $sql.= " KNHIV_OTH='$knhiv_oth',";                                                
	                                                        $sql.= " LASTUPDATE='$datenow'";                                                                                                                                                               
                                                            $sql.= "WHERE RDSCODE='$rds_code'";

if ($conn_rds->query($sql) === TRUE) {

	        echo "<meta http-equiv='refresh' content='0;URL=recruitment.php'>";
	}
else
	{
	echo "Error updating record: " . $conn_rds->error;
	 }

$conn_rds->close();
?>


