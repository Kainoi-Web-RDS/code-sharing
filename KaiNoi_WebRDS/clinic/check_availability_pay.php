<?php
ob_start();
session_start();

require_once('connections/conn_rds.php');
require_once('connections/utf8.php');

/*  $STATUS = $_SESSION['STATUS'];
	if($STATUS!='1'){
    Header("Location: logout.php");  
  }  */
/*
require_once("DBController.php");
$db_handle = new DBController();*/


//if(!empty($_POST["BMRECID"])) {


if(!empty($_POST["STEPTEL1"])) {
$telcode2  =  $_POST["STEPTEL1"];


      $datenow = date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));

error_reporting( error_reporting() & ~E_NOTICE );
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
$mobilephoneEX2 = encode($telcode2,"w-e-b-r-d-s");

                                       if ($conn_rds->connect_error)
                                           {
                                               die("Connection failed: " . $conn_rds->connect_error);
                                           }

                                  
                                   $labck = "SELECT * FROM tbanswer WHERE STATUS_LAB = '1' and  REGMOBILE = '$mobilephoneEX2'";
                                   $resultlabck = $conn_rds->query($labck);
                                   $luser = mysqli_num_rows($resultlabck);
                                         
      if($luser==1) {														
               echo "<span id=g1 class='status-available1'><h4><font color='#A569BD'>&nbsp;&nbsp;'$telcode2'&nbsp;&nbsp;มีอยู่ในระบบ</font></h4></span>";
                echo "<script>document.getElementById('LAB_LABEL').style.display = 'block'</script>";
               echo "<script>document.getElementById('LABNO').style.display = 'block'</script>";
               echo "<script>document.getElementById('ps').style.display = 'block'</script>";
               echo "<script>document.getElementById('submit1').style.display = 'block'</script>";
               echo "<script>$('#submit1').prop('disabled',false);</script> ";     
                                               }
                                               else
                                               {
                                                
       echo "<span id=g1 class='status-not-available1'><h4><font color='#E74C3C'>&nbsp;&nbsp;'$telcode2'&nbsp;&nbsp;ไม่พบในระบบ</font></h4></span>";
       echo "<script>document.getElementById('LAB_LABEL').style.display = 'none'</script>";
       echo "<script>document.getElementById('LABNO').style.display = 'none'</script>";
       echo "<script>document.getElementById('ps').style.display = 'none'</script>";
       echo "<script>document.getElementById('buttona').style.display = 'none'</script>";
       echo "<script>$('#submit1').hide();</script>";

  }
  
    } 

?>