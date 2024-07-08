<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
if (isset($_SESSION['mobilephone']) == "") {
    header("location: index_hs.php");
    exit();
}
error_reporting( error_reporting() & ~E_NOTICE );
//$rds_code = $_SESSION["rds_code"];
$mobilephone = $_SESSION["mobilephone"];
                                
                                
                                  // date_default_timezone_set("Asia/Bangkok");
                                             $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));



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
                                             
                                             
                                  if ($conn_rds->connect_error) {
                                  die("Connection failed: " . $conn_rds->connect_error);
                                  }
                                   
                                   $sql_t100 = "select T100 from tbseed where REGMOBILE = '" . $encode_phone . "'";
                                   $result_t100 = $conn_rds->query($sql_t100);
                                   $num_rows = mysqli_num_rows($result_t100);
                                   $row_t = $result_t100->fetch_assoc();
                                   $ck_t100 =$row_t['T100'];
                                 
                                   if($ck_t100 == NULL){
                                     /////////////////////////////////
                                        
                                                                    $T100 = 1;
                                                                   
                                                                    $sql_t = "UPDATE tbseed SET";                                                                                                          
                                                                    $sql_t.= " T100='$T100',";                                                                                                                
                                                                    $sql_t.= " LASTUPDATE='$datenow'";                                                                                                                                                               
                                                                    $sql_t.= "WHERE REGMOBILE = '" . $encode_phone . "'";
                                                                    $result = $conn_rds->query($sql_t);
                                                                   /*   echo "Error: " . $sql_t . "<br>" . $conn_rds->error;
                                                                    exit(0);*/

 $sql = "select REGMOBILE, OTP_ACT_QUES  from tbseed WHERE REGMOBILE='" . $encode_phone . "'";
                                                $result = $conn_rds->query($sql);
                                                $num_rows = mysqli_num_rows($result);
                                                $row = $result->fetch_assoc();
																																																
                                                
                                                 $OTP =$row['OTP_ACT_QUES'];
																																																
																																															 
                                                 $telcode = $row['REGMOBILE'];
                                                
                                                 error_reporting( error_reporting() & ~E_NOTICE );
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
                                                
                                                
                                                 $mobilephoneEX = decode($telcode,"w-e-b-r-d-s");

																																																 $tel_users = $mobilephoneEX;
																																														 		$change_moblie = substr($tel_users,1,9);
																																																 $new_moblie = 66000000000+$change_moblie;
                                                
                                               
																	
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

$text_sms4 = utf8tohtml('OTP= '. $OTP . ' สำหรับเข้าร่วมโครงการ kainoi.net', true);
$input_xml = "<?xml version=\"1.0\" encoding=\"TIS-620\"?><message>
<sms type=\"mt\">
<service-id>xxxxxxxxxxx</service-id>
<destination>
		<address>
		<number type=\"international\">$new_moblie</number>
		</address></destination><source>
		<address>
		<number type=\"abbreviated\">xxxxxxxxxxxxxxxxx</number>
		<originate type=\"international\">xxxxxxxxxxxxxxxxxxxxxxxxxxx</originate>
		<sender>KAINOI</sender>
</address>
</source><ud type=\"text\" encoding=\"unicode\">$text_sms4</ud><dro>true</dro></sms>
</message>";


echo "\n";
$url = "xxxxxxxxxxxxxxxxx";
$headers = array(
    "Authorization: Basic xxxxxxxxxxxxxxxxxx",
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

 }
            else{
                         
                   }

?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
      <title>kainoi.net</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
        <style type="text/css">
    /* ใช้ทั้งเว็บไซต์ */
      body {
        font-family: 'Sriracha', cursive;
        
      }
      /* ใช้เฉพาะหัวข้อ */
      h1, h2, h3, h4, h5, h6 {
        font-family: 'Sriracha', cursive;
      }
      .hero-image {
       background-image:url("images/banner-img-6.png");
       width: 430px;
       height: 650px;
       background-position: center;
       background-repeat: no-repeat;
       background-size: cover;
       position: relative;
     }
     
     .hero-text {
       text-align: center;
       position: absolute;
       top: 40%;
       left: 50%;
       transform: translate(-50%, -50%);
       color: black;
     }
       #myDIV {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightgreen;
      margin-top: 20px;
      display: none;
      border-radius: 6px ;
      border: 3px solid #000000;
      padding: 5px;
      
      .demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
      .status-available{color:#A569BD;}
      .status-not-available{color:#E74C3C;}
    }


     
 </style>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,400,500,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Itim|Kodchasan|Mali|Sriracha&display=swap" rel="stylesheet">
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>


    <![endif]-->
  </head>
  <body>
    <div class="page">
     
      <header class="section page-header" style="position: relative">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap rd-navbar-absolute">
          <nav class="rd-navbar rd-navbar-thin" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-fixed" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <button class="rd-navbar-collapse-toggle rd-navbar-fixed-element-2" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></button>
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle="#rd-navbar-nav-wrap-1, #rd-navbar-hidden-1"><span></span></button>
                  <!-- RD Navbar Brand--><a class="rd-navbar-brand" href="index.php"><img src="images/logo-default-398x45.png" alt="" width="199" height="22"/></a>
                  <div class="rd-navbar-block" id="rd-navbar-hidden-1">
                    <div class="rd-navbar-collapse">
                      <ul class="list-inline-bordered rd-navbar-list">
                        <li><span class="icon mdi mdi-comment-text-outline"></span><a href="contacts.php">ติดต่อเรา</a></li>
                        	<li><span class="icon mdi mdi-cellphone-android"></span><a href="tel:082-0031749">082-0031749</a></li>
                      </ul>
                    </div>
                    <button class="rd-navbar-search-toggle" data-rd-navbar-toggle="#rd-navbar-search-1"><span></span></button>
                  </div>
                </div>
                <!-- RD Navbar Search-->
                <div class="rd-navbar-search" id="rd-navbar-search-1">
                  <form class="rd-search" action="#" data-search-live="rd-search-results-live-1" method="GET">
                    <div class="form-wrap">
                      <label class="form-label" for="rd-navbar-search-form-input-1">Search...</label>
                      <input class="form-input rd-navbar-search-form-input" id="rd-navbar-search-form-input-1" type="text" name="s" autocomplete="off">
                      <div class="rd-search-results-live" id="rd-search-results-live-1"></div>
                    </div>
                    <button class="rd-search-form-submit fa-search" type="submit"></button>
                  </form>
                </div>
                <div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap-1">
                  <!-- RD Navbar Brand--><a class="rd-navbar-brand" href="index.php"><img src="images/logo-default-398x45.png" alt="" width="199" height="22"/></a>
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index.php">หนัาหลัก</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="chart.php">สถิติคนเข้าร่วมโครงการตอบแบบสอบถาม</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="flow.php">Flow การเข้าร่วมโครงการ</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="contact.php">ติดต่อเรา</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- FScreen-->
     
      
      <div class="tabs-horizontal"></div>
        <section class="section section-lg text-center"  style="background-image: url(images/20896.jpg); background-repeat: repeat-y; ">
        <div class="container">
          <h3 class="wow-outer"><span class="wow slideInUp"></span>
          <p class="wow-outer"><span class="text-width-1 wow slideInDown">kainoi ได้ทำการส่ง OTP ไปที่เบอร์มือถือของคุณแล้ว</span></p></h3>
          </span></p></h3>
          
          <div  style ="background-color :#ffffff; border-style: groove; border-color: #1370F2; opacity: 5; border-radius: 15px;" >
        
                     <br><h5>
                     <h3><center>กรุณาระบุ OTP ที่ท่านได้รับ<br>เพื่อยืนยันตัวตนของคุณ</center></h3>
                                <form name="chkotpform" id="chkotpform" method="POST" action="screen_hs.php" onSubmit="JavaScript:return fncSubmit();">
                                <!-- Trigger the modal with a button -->
															                	 <center><input type ="text" style="opacity: 5; border-radius: 15px;  width: 150px;height: 40px; font-size: 20px; text-align: center;" maxlength="4" id ="otpinput" name="otpinput" placeholder="เลข 4 หลัก"  onkeypress="isInputNumber(event)"  class="demoInputBox" required></center>
                                                <br><center> <button type = "button" id="butck"  class = "button button-primary button-winona wow fadeIn"  onclick ="checkAvailability()"><h4><font color='#ffffff'>ตรวจสอบ</font></h4></button></center><br>
                                  <p><center><img src="images/LoaderIcon.gif" id="loaderIcon" style="display:none" /></center></p>
                                  <center><span id="user-availability-status"></span></center>
                                   <center><p id='ps' style = 'font-size: 20px; font color=#000000; display: none;'>โปรดกด "ตกลง" เพื่อเข้าสู่กระบวนการ</p></center>
                                    <center><p id='fail' style = 'font-size: 20px; font color=#000000; display: none;'>คุณใส่หมายเลข OTP เกินจำนวนครั้งที่กำหนด</p></center>
                                    <center><button type='submit'   id='submit' class='button button-primary button-winona wow fadeIn' style =  'display: none;'><h4>ตกลง</h4></button></center><br>
                                   <center><button type='button'   id='back' class='button button-primary' style = 'display: none;' onclick="location.replace('index_hs.php');" />กลับไปหน้าหลัก</button></center><br>
                                </form>
                       </h5>
                     <br>
             </div>
        <br>
            
                 
                  

             </div>

      </section>
      <!-- Page Footer-->
      <footer class="section footer-minimal bg-primary-darken">
        <div class="container"> 
          <div class="footer-minimal-inner"><a class="brand" href="index.php"><img src="images/logo-light-398x45.png" alt="" width="199" height="22"/></a>
            <!-- Rights-->
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights Reserved. Design by kainoi.net</a></p>
          </div>
        </div>
      </footer>
    </div>
    <div class="preloader"> 
      <div class="preloader-logo"><img src="images/logo-default-398x45.png" alt="" width="199" height="22"/>
      </div>
      <div class="preloader-body">
        <div id="loadingProgressG">
          <div class="loadingProgressG" id="loadingProgressG_1"></div>
        </div>
      </div>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
   <script>
      var count = 0;
      function checkAvailability() {
       count += 1;
    
      
      if(count >= 3) {
        $("#butck").hide();
        $("#fail").show();
          $("#back").show();
        
      }else{
           $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_otp_hs.php",
        data:'otpinput='+$("#otpinput").val(),
        type: "POST", 
        success:function(data){
       
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
     },
        error:function (){
       
        }  
        }
        
        );
       
      }
    
      }
      </script>
		
       <script language="javascript">
              function fncSubmit()
              {
                var x = document.forms["chkotpform"]["otpinput"].value;
                if(x  == "")
                {
                  alert('โปรดใส่ รหัส OTP');
                  document.chkotpform.otpinput.focus();
                  return false;
                }
               else if ( x.length < 4) {
                      alert('ระบุเลขจำนวน 4 หลัก');
                      document.chkotpform.otpinput.focus();
                      return false;
                    }
                
              else
              document.chkotpform.submit();
              }
              
      </script>
    <script>
              $("#otpinput").keypress(function(event){
                       var keycode = event.which;
                           if( $(this).val().length === 4) { 
                                       return false;
                           }else{
                                       if (!(keycode >= 48 && keycode <= 57)) {
                                           event.preventDefault();   
                                       }
                           }      
               
                       
                   });
            
     </script>
    
  </body>
</html>