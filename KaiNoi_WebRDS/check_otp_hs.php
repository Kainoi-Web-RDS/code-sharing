<?php
ob_start();
session_start();
require_once("DBController.php");
$db_handle = new DBController();
$mobilephone = $_SESSION["mobilephone"];
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
                                             $encode_phone = encode($mobilephone,"w-e-b-r-d-s");

if(!empty($_POST["otpinput"])) {
  $query = "SELECT * FROM tbseed WHERE 	 REGMOBILE='" . $encode_phone . "' and  OTP_ACT_QUES='" . $_POST["otpinput"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count == 1) {
   echo "<span id=g2 class='status-available'><h4><font color='#A569BD'>คุณได้ยืนยันตัวตนเรียบร้อยแล้ว</font></h4></span>";
      echo "<script>document.getElementById('ps').style.display = 'block'</script>";
      echo "<script>document.getElementById('submit').style.display = 'block'</script>";
      echo "<script>$('#submit').prop('disabled',false);</script> ";
      echo "<script>document.getElementById('back').style.display = 'none'</script>";
  }else{
 echo "<span id=g1 class='status-not-available'><h4><font color='#E74C3C'>หมายเลขไม่ถูกต้อง</font></h4></span>";
       echo "<script>document.getElementById('ps').style.display = 'none'</script>";
      echo "<script>document.getElementById('submit').style.display = 'none'</script>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
			 echo "<script>document.getElementById('back').style.display = 'block'</script>";
  }
  }
?>