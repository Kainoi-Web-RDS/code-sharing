<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
 /* $STATUS = $_SESSION['STATUS'];
	if($STATUS!='1'){
    Header("Location: logout.php");  
  }  */

if(!empty($_POST["otpinput"])) {
$otpcode  =  $_POST["otpinput"];

$telcode2 = $_SESSION["telcode2"];

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
 
                         if ($conn_rds->connect_error) {
                                 die("Connection failed: " . $conn_rds->connect_error);
                                           }

                                   $query = "SELECT * FROM tbanswer WHERE 	 REGMOBILE = '" . $mobilephoneEX2 . "' and  OTP_ACT_TEST='" . $otpcode . "'";
                                   $result = $conn_rds->query($query);
                                   $user_count = mysqli_num_rows($result);
                                   $row_t = $result->fetch_assoc();
                                   $BMRECID =$row_t['RDSCODE'];
                                   $_SESSION["BMRECID"] = $BMRECID;
                                   $BMRECID = $_SESSION["BMRECID"];
																																																
  if($user_count == 1) {
   
                                                echo "<span id=j1 class='status-available2'><h4><font color='#A569BD'>&nbsp;&nbsp;'$BMRECID'&nbsp;&nbsp;มีอยู่ในระบบ</font></h4></span>";
                                               echo "<script>document.getElementById('ps2').style.display = 'block'</script>";
                                               echo "<script>document.getElementById('submit2').style.display = 'block'</script>";
                                               echo "<script>$('#submit2').prop('disabled',false);</script> ";
                                               echo "<script>document.getElementById('ps3').style.display = 'block'</script>";//new                  
     
  }else{
        echo "<span id=j1 class='status-not-available2'><h4><font color='#E74C3C'>OTP ที่ได้รับไม่ถูกต้อง</font></h4></span>";
       echo "<script>document.getElementById('ps2').style.display = 'none'</script>";
      echo "<script>document.getElementById('submit2').style.display = 'none'</script>";
      echo "<script>$('#submit2').prop('disabled',true);</script>";
      echo "<script>document.getElementById('ps3').style.display = 'none'</script>";//new
  }
  }
?>