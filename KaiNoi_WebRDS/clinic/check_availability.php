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


if(!empty($_POST["BMRETEL1"])) {
$telcode2  =  $_POST["BMRETEL1"];
$_SESSION["telcode2"] = $telcode2;
$telcode2 = $_SESSION["telcode2"];

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

                                  
                                   $query = "SELECT * FROM tbanswer WHERE STATUS_LAB='0' and  REGMOBILE='" . $mobilephoneEX2. "'";
                                   $result = $conn_rds->query($query);
                                   $user_count = mysqli_num_rows($result);
                                   $row_t = $result->fetch_assoc();
                                   $OTP =$row_t['OTP_ACT_TEST'];
                                   $ck_t300 =$row_t['T300'];
                             

 
  if($user_count == 1) {
						                   
                                            if($ck_t300 == NULL){
                                                       
                                                                                   $T300 = 1;
                                                                                   $status_lab =1;
                                                                                   $sql_t = "UPDATE tbanswer SET";
                                                                                   $sql_t.= " STATUS_LAB='$status_lab',";    
                                                                                   $sql_t.= " T300='$T300',";                                                                                                                
                                                                                   $sql_t.= " LASTUPDATE='$datenow'";                                                                                                                                                               
                                                                                   $sql_t.= "WHERE REGMOBILE='$mobilephoneEX2'";
                                                                                   $result = $conn_rds->query($sql_t);
                                            
                         
																								$change_moblie = substr($telcode2,1,9);
																							$new_moblie = 66000000000+$change_moblie;
                                            //    $new_moblie= 66811422485;
																																															
																																																
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

$text_sms4 = utf8tohtml('OTP = "'. $OTP .'" สำหรับมารับบริการที่คลินิค', true);


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
		<sender>kainoi</sender>
</address>
</source><ud type=\"text\" encoding=\"unicode\">$text_sms4</ud><dro>true</dro></sms>
</message>";


echo "\n";
$url = "xxxxxxxxxxxxxx";
$headers = array(
    "Authorization: Basic xxxxxxxxxxxxxx",
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
    
    
    
    
               echo "<span id=g1 class='status-available1'><h4><font color='#A569BD'>&nbsp;&nbsp;'$telcode2'&nbsp;&nbsp;มีอยู่ในระบบ</font></h4></span>";
               echo "<script>document.getElementById('otpinput').style.display = 'block'</script>";
               echo "<script>document.getElementById('ps').style.display = 'block'</script>";
               echo "<script>document.getElementById('submit1').style.display = 'block'</script>";
               echo "<script>$('#submit1').prop('disabled',false);</script> ";       
           }else
           {
               echo "<span id=g1 class='status-available1'><h4><font color='#A569BD'>&nbsp;&nbsp;'$telcode2'&nbsp;&nbsp;มีอยู่ในระบบ</font></h4></span>";
               echo "<script>document.getElementById('otpinput').style.display = 'block'</script>";
               echo "<script>document.getElementById('ps').style.display = 'block'</script>";
               echo "<script>document.getElementById('submit1').style.display = 'block'</script>";
               echo "<script>$('#submit1').prop('disabled',false);</script> ";       
           }
  }else{
                                   $labck = "SELECT * FROM tbanswer WHERE STATUS_LAB = '1' and  REGMOBILE = '$mobilephoneEX2'";
                                   $resultlabck = $conn_rds->query($labck);
                                   $luser = mysqli_num_rows($resultlabck);
                                         
                                   			  if($luser==0) {																	
                                                  echo "<span id=g1 class='status-not-available1'><h4><font color='#E74C3C'>ไม่พบในระบบ</font></h4></span>";
                                                  echo "<script>document.getElementById('otpinput').style.display = 'none'</script>";
                                                  echo "<script>document.getElementById('ps').style.display = 'none'</script>";
                                                  echo "<script>document.getElementById('buttona').style.display = 'none'</script>";
                                                  echo "<script>$('#submit1').hide();</script>";
                                               }
                                               else
                                               {     
       echo "<span id=g1 class='status-not-available1'><h4><font color='#E74C3C'>&nbsp;&nbsp;'$telcode2'&nbsp;&nbsp;ได้เข้ามารับบริการเรียบร้อยแล้ว</font></h4></span>";
       echo "<script>document.getElementById('otpinput').style.display = 'none'</script>";
       echo "<script>document.getElementById('ps').style.display = 'none'</script>";
       echo "<script>document.getElementById('buttona').style.display = 'none'</script>";
       echo "<script>$('#submit1').hide();</script>";
      
       unset($_SESSION['$BMRECID']);
        echo "<script>$('#j1').hide();</script>";
        echo "<script>document.getElementById('ps2').style.display = 'none'</script>";
        echo "<script>document.getElementById('submit2').style.display = 'none'</script>";
       
  }
  
    }
  
  } 

?>