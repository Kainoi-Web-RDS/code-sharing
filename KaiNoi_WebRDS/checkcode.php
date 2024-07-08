<?php
ob_start();
session_start();

require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php'); 

   function redirect($url, $statusCode = 303)
         {
               header('Location:  ' . $url, $statusCode);
               exit;
         }
         
                                              $mobilephone =  $_POST["mobilephone"];
                                              $rds_code = $_POST['rds_code'];
                                              
                                              $_SESSION["mobilephone"] = $mobilephone;
                                              $_SESSION["rds_code"] = $rds_code;
                                              
                                             $rds_code = $_SESSION["rds_code"];
                                             $mobilephone = $_SESSION["mobilephone"];
                                             
                                             
                                              error_reporting( error_reporting() & ~E_NOTICE );
                                                    $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
                                                
                                                         if (!empty($_SERVER['HTTP_CLIENT_IP']))   
                                               {
                                                 $ip_address = $_SERVER['HTTP_CLIENT_IP'];
                                               }
                                             //whether ip is from proxy
                                             elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
                                               {
                                                 $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                               }
                                             //whether ip is from remote address
                                             else
                                               {
                                                 $ip_address = $_SERVER['REMOTE_ADDR'];
                                               }
                                              $ip_address;
                                              
                                              
                                                  
                                             $status = "Wait";   // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,JOIN,QT-PASS,BIO-PASS
                                             $datereg=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
                                             

                                             
  function generatePIN1($digits = 4){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}

//If I want a 4-digit PIN code.
$pin = generatePIN1();

function generatePIN2($digits2 = 4){
    $v = 0; //counter
    $pin2 = ""; //our default pin is blank.
    while($v < $digits2){
        //generate a random number between 0 and 9.
        $pin2 .= mt_rand(0, 9);
        $v++;
    }
    return $pin2;
}

//If I want a 4-digit PIN code.
$pin2 = generatePIN2();

   
                                             function getVisIpAddr() { 
      
                                                 if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
                                                     return $_SERVER['HTTP_CLIENT_IP']; 
                                                 } 
                                                 else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
                                                     return $_SERVER['HTTP_X_FORWARDED_FOR']; 
                                                 } 
                                                 else { 
                                                     return $_SERVER['REMOTE_ADDR']; 
                                                 } 
                                             } 
                                              
                                            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $vis_ip));  ;
                                            $c_detect_geo =  $ipdat->geoplugin_countryName;
                                           //$c_detect_geo = "lao";
                                   
                                            $c = 0;
                                            if($c_detect_geo == "Thailand"){
                                             $c = 1;
                                            }
                                            else{
                                             $c = 2;
                                            }
                                          $ELLOC2 = $c;
                                          //   $ELLOC2 = 2;
                                            
  function get_the_browser()
{
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
   return 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false)
    return 'Internet explorer';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false)
   return 'Mozilla Firefox';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
   return 'Google Chrome';
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false)
   return "Opera Mini";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false)
   return "Opera";
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false)
   return "Safari";
 else
   return 'Other';
}

     $browser = get_the_browser();
   // echo get_the_browser();

echo "<br>";



function get_the_device()
{
        $useragent=$_SERVER['HTTP_USER_AGENT'];
       //echo $useragent . "<br>";
       
       if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        { 
            return  "Mobile";
        }
        else{
            return "Desktop";
        }
}
$device = get_the_device();

//echo get_the_device();
                                              //error_reporting( error_reporting() & ~E_NOTICE );
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
$_SESSION["encode_phone"] = $encode_phone;


//==========================================SET COOKIE====================================================
//check cookie
$cookie_rds = 'webrds_cookie';
$accept_cookie = 'n';
$old_user = 'na';

if(isset($_COOKIE[$cookie_rds])) {
	if($_COOKIE[$cookie_rds] == "thailand2019_screen" ){
		$accept_cookie = 'y';
		$old_user = 'y';
  
    $sqlolduser = "INSERT INTO Not_swarm_oldusers (date_swarm, code_swarm, telephone,IP) VALUES ('$datenow','$rds_code', '$encode_phone', '$ip_address')";                                                                                                                                    
    $resultckolduser = $conn_rds->query($sqlolduser);
    
	} else {
		$accept_cookie = 'y';
		$old_user = 'n';
  
  
	}

} else {
	$accept_cookie = 'n';
	$old_user = 'na';

}

                                              




                                                //  KEY  เลข  SEED เข้าระบบ
                                                
                                                if ($conn_rds->connect_error) {
                                               die("Connection failed: " . $conn_rds->connect_error);
                                             }
                                            
                                             $sqlchseed = "select * from tbcoupon where Coupon = '" . $rds_code . "'";
                                             $resultchseed = $conn_rds->query($sqlchseed);
                                             $num_rows_chseed  = mysqli_num_rows($resultchseed);
                                             $row_chseed  = $resultchseed->fetch_assoc();
                                             
                                             $DateActivated  =$row_chseed['DateActivated'];
                                            
                                             //echo $DateActivated;
                                            /* echo "<br>";
                                             echo "TEST";
                                             exit(0);*/
                                             
                                             if($DateActivated == Null)
                                             {
                                              
                                              $couponexist = 'n';
                                              $isactivated = 'na';
                                              $isused = 'na';
                                              $isexpired = 'na';
                                              $iscancel = 'na';
                                              $isfail2regis = 'na';
                                              $isvalid = 'n';
                                              $rdsinsert = "Insert into tbcouponlog( couponinput,dateinput,fromip,cookie_accept,isolduser,coupon_existed,coupon_activated,coupon_used,coupon_cancel,coupon_expired,coupon_fail2regis,coupon_valid,device_type,browser_type,mphone,ip_from,lastupdate) Values(";
                                             $rdsinsert.= "'$rds_code','$datenow','$ip_address','$accept_cookie',";
                                             $rdsinsert.= "'$old_user','$couponexist','$isactivated',";
                                             $rdsinsert.= "'$isused','$iscancel','$isexpired',";
                                             $rdsinsert.= "'$isfail2regis','$isvalid',";
                                             $rdsinsert.= "'$device','$browser','$encode_phone',";
                                             $rdsinsert.= "'$ELLOC2','$datenow')";
                                             $result = $conn_rds->query($rdsinsert);
                                              
                                              
                                                       echo "<script>";
                                                       echo "window.location='not_swarm.php'";
                                                       echo "</script>";
                                                       $ch_seed ="not pass";
                                                   
                                              }
                                              else{
                                                  $ch_seed ="pass";
                                              
                                     
                                             
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
  	font-family: 'Chakra Petch', sans-serif;
  	color: #000000;
  	/* font-family: 'Sriracha', cursive;*/
  }
  /* ใช้เฉพาะหัวข้อ */
  h1, h2, h3, h4, h5, h6 {
  	font-family: 'Chakra Petch', sans-serif;
  	color: #000000;
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
        <section class="section section-lg text-center" style="background-image: url(images/20896.jpg); background-repeat: repeat-y;">
        <div class="container">
  
                                               </br>
                                                 <?php
                                                
                                                 
                                         
                                         

if ($conn_rds->connect_error) {
  die("Connection failed: " . $conn_rds->connect_error);
}

$sql = "select * from tbcoupon where Coupon = '" . $rds_code . "'";

$result = $conn_rds->query($sql);

$num_rows = mysqli_num_rows($result);

$row = $result->fetch_assoc();



$couponexist = ''; //  มีไหม มั่วมา
$isactivated = '';  //  สถานะคูปอง ที่ยังจะใช้งาน
$isused = ''; // ใช้ไปแล้ว
$isexpired = ''; //  หมดอายุ
$iscancel = ''; //  คูปอง ถูกยกเลิกรึยัง  
$isfail2regis = ''; // otp
$isvalid = ''; // เช็คว่าเรียบร้อยไทม


//$couponexist = ($user['permissions'] == 'admin') ? true : false;


if ($result->num_rows > 0) {

		$couponexist = 'y';
		$isactivated = ($row['IsActivated'] != 'y') ? 'n' : 'y';
		$isused = ($row['IsUsed'] == 'y') ? 'y' : 'n';
		$isexpired = (date_create('now')->format('Y-m-d H:i:s') > $row['DateExpire']) ? 'y' : 'n';
		$iscancel = ($row['IsCancel'] == 'y') ? 'y' : 'n';
		$isfail2regis = ($row['IsFail2Regist'] == 'y') ? 'y' : 'n';

		if($couponexist == 'y' and $isactivated == 'y' and $isused == 'n' and $isexpired == 'n' and $iscancel == 'n' and $isfail2regis == 'n'   ){
			$isvalid = 'y';
		} else {
			$isvalid = 'n';
		}
	} else {
		$couponexist = 'n';
		$isactivated = 'na';
		$isused = 'na';
		$isexpired = 'na';
		$iscancel = 'na';
		$isfail2regis = 'na';
		$isvalid = 'n';
}
$sql.= " DATE_REGISTER, ISSEED,";      
$sql.= "'$datereg','peer',";         
$rdsinsert = "Insert into tbcouponlog( couponinput,dateinput,fromip,cookie_accept,isolduser,coupon_existed,coupon_activated,coupon_used,coupon_cancel,coupon_expired,coupon_fail2regis,coupon_valid,device_type,browser_type,mphone,ip_from,lastupdate) Values(";

$rdsinsert.= "'$rds_code','$datenow','$ip_address','$accept_cookie',";
$rdsinsert.= "'$old_user','$couponexist','$isactivated',";
$rdsinsert.= "'$isused','$iscancel','$isexpired',";
$rdsinsert.= "'$isfail2regis','$isvalid',";
$rdsinsert.= "'$device','$browser','$encode_phone',";
$rdsinsert.= "'$ELLOC2','$datenow')";
$result = $conn_rds->query($rdsinsert);



if ($couponexist  == 'y') {
           
                   


		if ($isactivated != 'y') {
          
                                                       echo "<script>";
                                                       echo "window.location='not_swarm.php'";
                                                       echo "</script>";
                                               
                  // }
 } elseif ($old_user == 'y') {
                                                                
                                                                $use_cancel = 'y';
                                                               
                                                                $sql_uptk = "UPDATE tbcoupon SET";                                                                                                          
                                                                $sql_uptk.= " IsCancel= '$use_cancel', DateCancel = '$datenow'";                                                                                                                                                                                                                                                          
                                                                $sql_uptk.= " WHERE Coupon ='$rds_code'";

                                                            if ($conn_rds->query($sql_uptk) === TRUE) {
                                                                echo "<script>";
                                                                echo "window.location='not_swarm_oldusers.php'";
                                                                echo "</script>";
                                                       }
		} elseif ($isused == 'y') {

                                                           $sqlduplicate = "select * from tbanswer  where  STATUSCODE ='Wait'   and RDSCODE= '" . $rds_code . "'";
                                                            $resultduplicate = $conn_rds->query($sqlduplicate);
                                                            $num_rowsduplicate = mysqli_num_rows($resultduplicate);
                                                            if ($resultduplicate->num_rows > 0) {
                                                           	echo "<html>";
                                                            echo "<head></head>";
                                                            echo "<body class=\"page_bg\">";
                                                             echo " <h3 class='wow-outer' style ='background-color :#ffffff; border-style: groove; border-color: #1370F2; opacity: 5; border-radius: 5px;'><span class='wow slideInUp' style ='padding: 8px 8px;'></span></h3>";
                                                             echo " <p class='wow-outer'><span class='text-width-1 wow slideInDown'>";
                                                              echo "<div class='jumbotron'  style ='background-color :#ffffff; border-style: groove; border-color: #1370F2; opacity: 5; border-radius: 5px;'>";
                                                            echo "<center> <p><h4><font color='#000000'>รหัสนี้ :</font> <font color='#3333ff' >" . $rds_code . " </font><font color='#000000'>สามารถเข้าร่วมโครงการได้ครับ</font></h4></p></center>";
                                                             echo "<img style='width: 200px;' src='https://kainoi.net/images/kai10.png'>";
                                                            echo "<form name='ShowValidCode' method='post' action='selfcheck.php'><br>";
                                                            //echo "Invite Code	: <input type='text' name='p_code' value = " . $rds_code . " readonly><br><br>" ;
                                                           echo "<center><button type='buttongsc' class='button button-primary button-winona wow fadeIn'  onclick='window.location.href='selfcheck.php'>ถัดไป</button></center>&nbsp;&nbsp";
                                                          //  echo "<input type='submit' name='btPost' value=' Next'>";
                                                            echo "</form></html>";
                                                            }
                                                            else{
                                                        //redirect("formmessage02.php", 303);
                                                       echo "<script>";
                                                       echo "window.location='not_swarm.php'";
                                                       echo "</script>";
                                                      }

		} elseif ($iscancel == 'y') {

                                                       echo "<script>";
                                                       echo "window.location='not_swarm.php'";
                                                       echo "</script>";
		
		} elseif ($isfail2regis == 'y') {

		                                                     echo "<script>";
                                                       echo "window.location='not_swarm.php'";
                                                       echo "</script>";

		} elseif ( $isexpired == 'y' ) {

	                                                      echo "<script>";
                                                       echo "window.location='not_swarm.php'";
                                                       echo "</script>";

		} else {

 

		$sql = "INSERT INTO tbanswer (RDSCODE,";                                                                                         // RDS CODE
                                                            $sql.= " STATUSCODE,";                                                                                                                             // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,QT-PASS,BIO-PASS
                                                            $sql.= " DATE_REGISTER, ISSEED,";                                                                                                       // Date regis  and seed
                                                            $sql.= " ELCIDN, ELLOC1, ELLOC2, ELCIDN2, ELCIDN3,";                                                                      //  IP ADDRESS
                                                            $sql.= " REGMOBILE,";    
                                                            $sql.= " OTP_ACT_QUES, OTP_ACT_TEST,";    
                                                            $sql.= " DEVICE_TYPE, BROWSER_TYPE,";                                                                                       // Detect Device
                                                            $sql.= " LASTUPDATE) VALUES";                                                                                                              // Date Update
                                                            // ==========================================INSERT VALUES====================================================
                                                            
                                                            $sql.= "('$rds_code',";                                                                                                                                   // RDS CODE
                                                            $sql.= "'$status',";
                                                            $sql.= "'$datereg','peer',";                                                                                                                             // Date regis  and seed
                                                            $sql.= "'$rds_code','$ip_address','$ELLOC2','1','1',";       
                                                            $sql.= "'$encode_phone',";         
                                                            $sql.= "'$pin','$pin2',"; 
                                                            $sql.= "'$device','$browser',";        // Detect Device
                                                            $sql.= "'$datenow')";                                                                                                                                     // Date Update
                                                        if ($conn_rds->query($sql) === TRUE) {
                                                          $conpon_use = "UPDATE tbcoupon SET";                                                                                                          
                                                          $conpon_use.= " DateUsed= '$datenow',";                                                                                                      
                                                          $conpon_use.= " IsUsed ='y'";                                                                                                                                                                                                                             
                                                          $conpon_use.= "WHERE Coupon='" . $rds_code . "'";
                                                          $conn_rds->query($conpon_use) ;
                                                          
                                                          // ELLOC2 =2 code no pass
                                                          if($ELLOC2 == "2"){ //นอกประเทศ
                                                                     if ($conn_rds->connect_error) {
                                                                           die("Connection failed: " . $conn_rds->connect_error);
                                                                      } 
                                                       
                                                             $status_c =  "NOT-COUNTRY";
                                                             
                                                              $cno_sql = "UPDATE tbanswer SET";
                                                              $cno_sql.= " STATUSCODE= '$status_c',"; 
                                                              $cno_sql.= " LASTUPDATE='$datenow'";                                                                                               
                                                              $cno_sql.= "WHERE RDSCODE = '" . $rds_code . "'";
                                                              //$cno_result  = $conn_rds->query($cno_sql);
                                                            if ($conn_rds->query($cno_sql) === TRUE)
                                                                                                    {
                                                                                                       echo "<script>";
                                                                                                       echo "window.location='formmessage00.php'";
                                                                                                       echo "</script>";
                                                                                                        exit(0);   
                                                                                                     }
                                                            else
                                                                                                     {
                                                                                                         echo "Error: " . $cno_sql . "<br>" . $conn_rds->error;
                                                                                             
                                                                                                     }

                                                                                 
                                                 }else{     // ประเทศ

                                                       	//ELLOC2 =1 code pass
                                                        
                                        if(!empty($_POST["mobilephone"])) { //  check phone
                                        $query_ntele = "SELECT * FROM Not_telephone_duplicate WHERE telephone='" . $encode_phone . "'";
                                      $result_ntele = mysqli_query($conn_rds,$query_ntele);
                                      $user_ntele_count  = mysqli_num_rows($result_ntele);
                                      if($user_ntele_count  > 1) {  //  insert เข้ามาแล้ว +1   
                                           $sed_ntele = 1;
                                       
                                      }
                                      else{
                                            $sed_ntele = 0;
                                      }
                                      $query_olduser = "SELECT * FROM Not_swarm_oldusers WHERE telephone='" . $encode_phone . "'";
                                      $result_olduser = mysqli_query($conn_rds,$query_olduser);
                                      $user_olduser_count  = mysqli_num_rows($result_olduser);
                                      if($user_olduser_count  > 1) {  //  insert เข้ามาแล้ว +1 
                                       $sed_olduser = 1;
                                       
                                      }
                                      else{
                                       $sed_olduser = 0;
                                      }
                                      
                                      $query1 = "SELECT * FROM tbanswer  WHERE REGMOBILE='" . $encode_phone . "'";
                                      $result1 = mysqli_query($conn_rds,$query1);
                                      $user_count1 = mysqli_num_rows($result1);
                                      
                                      if($user_count1  > 1) {  //  insert เข้ามาแล้ว +1 
                                       $sed1 = 1;
                                       
                                      }
                                      else{
                                       $sed1 = 0;
                                      }
                                      
                                       $query2 = "SELECT * FROM tbseed WHERE REGMOBILE='" . $encode_phone . "'";
                                      $result2 = mysqli_query($conn_rds,$query2);
                                      $user_count2 = mysqli_num_rows($result2);
                                      if($user_count2  > 0) {
                                       $sed2 = 1;
                                      }
                                      else{
                                        $sed2 = 0;
                                      }
                                       /* echo  $sed1;
                                       echo "<br>";
                                         echo  $sed2;
                                       echo "<br>";*/
                                       $sed_ck =  $sed1 +  $sed2 + $sed_olduser + $sed_ntele;
                                      // echo  $sed_ck;
                                       /*echo "<br>";
                                       exit(0);*/
                                       if($sed_ck > 0)
                                       {

                                             //whether ip is from share internet
                                                mysqli_set_charset($conn_rds, 'utf8');
                                                
                                                if ($conn_rds->connect_error) {
                                                     die("Connection failed: " . $conn_rds->connect_error);
                                                } 

                                                            
                                                       
                                                             $status_c =  "MOBILE-DUPLICATE";
                                                             
                                                              $cnom_sql = "UPDATE tbanswer SET";
                                                              $cnom_sql.= " STATUSCODE= '$status_c',"; 
                                                              $cnom_sql.= " LASTUPDATE='$datenow'";                                                                                               
                                                              $cnom_sql.= "WHERE RDSCODE = '" . $rds_code . "'";
                                                              $conn_rds->query($cnom_sql) ;
                                                              
                                                           // ========================================== Code ====================================================
                                                            $cno_sql = "INSERT INTO Not_telephone_duplicate (rdscode, date_dup, telephone,";                                                                  
                                                            $cno_sql.= " IP) VALUES";                                                                                                              
                                                            // ==========================================INSERT VALUES====================================================
                                                            $cno_sql.= "('$rds_code','$datenow','$encode_phone',";                                                                                                                               
                                                            $cno_sql.= "'$ip_address')";                                                                                                                            
                                                             if ($conn_rds->query($cno_sql) === TRUE)
                                                                                                    {
                                                                                                       echo "<script>";
                                                                                                       echo "window.location='formmessage01.php'";
                                                                                                       echo "</script>";
                                                                                                       exit(0);         
                                                                                                     }
                                                              else
                                                                                                     {
                                                                                                         echo "Error: " . $cno_sql . "<br>" . $conn_rds->error;
                                                                                                     }
															                                           
                                        }
                                       else{
                                                           // mobile pass
                                                         echo "<html>";
                                                         echo "<head></head>";
                                                         echo "<body class=\"page_bg\">";
                                                         echo " <h3 class='wow-outer' style ='background-color :#ffffff; border-style: groove; border-color: #1370F2; opacity: 5; border-radius: 5px;'><span class='wow slideInUp' style ='padding: 8px 8px;'></span></h3>";
                                                         echo " <p class='wow-outer'><span class='text-width-1 wow slideInDown'>";
                                                         echo "<div class='jumbotron'  style ='background-color :#ffffff; border-style: groove; border-color: #1370F2; opacity: 5; border-radius: 5px;'>";
                                                         echo "<center> <p><h4><font color='#000000'>รหัสนี้ :</font> <font color='#3333ff' >" . $rds_code . " </font><font color='#000000'>สามารถเข้าร่วมโครงการได้ครับ</font> </h4></p></center>";
                                                         echo "<img style='width: 200px;' src='https://kainoi.net/images/kai10.png'>";
                                                         echo "<form name='ShowValidCode' method='post' action='selfcheck.php'><br>";
                                                         //echo "Invite Code	: <input type='text' name='p_code' value = " . $rds_code . " readonly><br><br>" ;
                                                         echo "<center><button type='buttongsc'  class='button button-primary button-winona wow fadeIn'  onclick='window.location.href='selfcheck.php'>ถัดไป</button></center>&nbsp;&nbsp";
                                                         // echo "<input type='submit' name='btPost' value=' Next'>";
                                                         echo "</form></html>";
                                              }
                                              }//  close check phone
                                              }// close ในประเทศ
                                              } else {
                                                            echo "Error: " . $sql . "<br>" . $conn_rds->error;
                                                         }
		}

	} else {

	                                                      echo "<script>";
                                                       echo "window.location='not_swarm.php'";
                                                       echo "</script>";

}}
//==========================================END COOKIE====================================================
  $conn_rds->close();
 ?>
 </h4>
        </div>
        </div>
          </span>
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
  </body>
</html>