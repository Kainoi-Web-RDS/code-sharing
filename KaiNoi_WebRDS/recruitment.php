<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');

if (isset($_SESSION['rds_code']) == "") {
    header("location: index.php");
    exit();
}
$rdscode = $_SESSION["rds_code"];
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
                        	<li><span class="icon mdi mdi-cellphone-android"></span><a href="tel:0922760584">0922760584</a></li>
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
          <h3 class="wow-outer"><span class="wow slideInUp"><br></span></h3>
          <p class="wow-outer"><span class="text-width-1 wow slideInDown">
          <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #1370F2;">
                                               <h3>ระบบได้ส่งรหัสเพื่อชวนเพื่อนเข้าร่วมโครงการให้กับคุณทางโทรศัพท์จำนวน 3 รหัส เพื่อชวนเพื่อนจำนวน 3 คน<h3></center>
                                                <h4>เราขอให้คุณส่งรหัสดังกล่าวให้กับเพื่อนที่เป็นชายที่มีเพศสัมพันธ์กับชาย <br> </h4>
                                                <h4>(มีเพศสัมพันธ์ทางทวารหนักกับชายในช่วง  6 เดือนที่ผ่านมา)</h4>
                                                </center>
                                               <br>
                                                  <img style="width: 500px;" src="https://kainoi.net/images/kai4-1.png">
                    <form action="#" id="gen">	
                                               <br>
                                               <?php
                                   error_reporting( error_reporting() & ~E_NOTICE );
                                      // date_default_timezone_set("Asia/Bangkok");
                                             $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
                              ////////// T200 Check/////////////////
                              
                                  if ($conn_rds->connect_error) {
                                 die("Connection failed: " . $conn_rds->connect_error);
                                           }
                                   $sql_t200 = "select T200 from tbanswer where RDSCODE = '" . $rdscode . "'";
                                   $result_t200 = $conn_rds->query($sql_t200);
                                   $num_rows = mysqli_num_rows($result_t200);
                                   $row_t = $result_t200->fetch_assoc();
                                   $ck_t200 =$row_t['T200'];
                                 
                                   if($ck_t200 == NULL){
                                     /////////////////////////////////
                                        
                                                                    $T200 = 1;
                                                                   
                                                                    $sql_t = "UPDATE tbanswer SET";                                                                                                          
                                                                    $sql_t.= " T200='$T200',";                                                                                                                
                                                                    $sql_t.= " LASTUPDATE='$datenow'";                                                                                                                                                               
                                                                    $sql_t.= "WHERE RDSCODE='a'";
                                                                    $result = $conn_rds->query($sql_t);
                                                                    
                                      function RunSQL($sqlstring){
                                      
                                        $conn_rds =  mysqli_connect("xxxxxxxxxxxxxx","xxxxxxxxxxxxxx","xxxxxxxxxxxxxx","xxxxxxxxxxxxxx");
                                        if ($conn_rds->connect_error) {
                                             return "errorconnect";
                                        } 	
                                        mysqli_set_charset( $conn_rds, 'utf8');
                                        if (mysqli_query($conn_rds, $sqlstring)) {
                                            return "success";
                                        } else {
                                            return "failed" . mysqli_error($conn_rds);
                                        }
                                        mysqli_close($conn_rds);
                                    }
                                  
                                    function isAlreadyAddCoupon($code2check){
                                        $conn_rds =  mysqli_connect("xxxxxxxxxxxxxx","xxxxxxxxxxxxxx","xxxxxxxxxxxxxx","xxxxxxxxxxxxxx");
                                        
                                        if ($conn_rds->connect_error) {
                                             return "errorconnect";
                                        } 	
                                        mysqli_set_charset($conn_rds, 'utf8');
                                    
                                        $sql = "select * from tbcoupon where recruiter = '" . $code2check . "'";
                                      // mysqli_query($conn_rds,$sql) or die(mysql_error());
                                        $result = $conn_rds->query($sql);
                                        $num_rows = mysqli_num_rows($result);
                                        $row = $result->fetch_assoc();
                                        if ($result->num_rows > 0) {
                                            $conn_rds->close();	
                                            return "yes";
                                        } else {
                                            $conn_rds->close();	
                                            return "no";
                                        }
                                    }
                                    
                                    //Check is already done a questionnaire 
                                    
                                    
                                    function genrdscode($inum){
                                        $basecode = "abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789";
                                        $rndcode = array() ;
                                        $length = mb_strlen($basecode) - 1;
                                        $allcode = "" ;
                                        $i = 0;
                                        $i = $inum - 1 ;
                                        do {
                                            $allcode = "";
                                            for ($x = 0; $x < $i + 1; $x++) {
                                                $rndcode[$x] = substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1);
                                                if ($x < $i){
                                                    $allcode = $allcode . "'" . $rndcode[$x] . "'," 	;
                                                } else {
                                                    $allcode = $allcode . "'" . $rndcode[$x] . "'"  	;
                                                }
                                    
                                            }
                                            $rdscode = IsDuplicateCode($allcode);
                                        } 
                                        while ( $rdscode== "dup" );
                                        return $rndcode;
                                    }
                                    function IsDuplicateCode($code2check){
                                    
                                         $conn_rds =  mysqli_connect("xxxxxxxxxxxxxx","xxxxxxxxxxxxxx","xxxxxxxxxxxxxx","xxxxxxxxxxxxxx");
                                        
                                        // Check connection
                                        if ($conn_rds->connect_error) {
                                             return "errorconnect";
                                        } 	
                                        mysqli_set_charset( $conn_rds, 'utf8');
                                        $sql = "select * from tbcoupon where Coupon in (" . $code2check . ") ";
                                        $result = $conn_rds->query($sql);
                                        //$row = $result->fetch_assoc();	
                                        $num_rows = mysqli_num_rows($result);
                                        if ($num_rows == 0){
                                            $conn_rds->close();
                                            return "nodup";
                                        } else {
                                            $conn_rds->close();
                                            return "dup";
                                        }
                                    }
                                    
                                    if($rdscode <> "readonly" or $rdscode <> "") {
                                           
                                                if(isAlreadyAddCoupon($rdscode) == "no"){
                                           
                                                     $sql_plusday = "select * from tbcoupon where Coupon = '" . $rdscode . "'";
                                                     $result_plusday = $conn_rds->query($sql_plusday);
                                                     $num_rows_plusday = mysqli_num_rows($result_plusday);
                                                     $row_plusday = $result_plusday->fetch_assoc();
                                                     $DateActivated_ck  = $row_plusday['DateActivated'];
                                                     $Dateused_ck  = $row_plusday['DateActivated'];
                                                     
                                                     $time_ck = (strtotime($Dateused_ck) - strtotime($DateActivated_ck))/  ( 60 * 60 ); // 1 Hour =  60*60
                                                     
                                                      $dayplus = date ("Y-m-d H:i:s", strtotime("+1 day", strtotime($datenow)));
                                                      
                                                     if($time_ck <= '15')
                                                     {
                                                        $array = genrdscode(3);
                                                        
                                                        RunSQL("Update tbanswer set peercode01 = '" . $array[0] . "',lastupdate = now() where rdscode = '" . $rdscode . "' and peercode01 is null" );
                                                        RunSQL("Update tbanswer set peercode02 = '" . $array[1] . "',lastupdate = now() where rdscode = '" . $rdscode . "' and peercode02 is null" );
                                                        RunSQL("Update tbanswer set peercode03 = '" . $array[2] . "',lastupdate = now() where rdscode = '" . $rdscode . "' and peercode03 is null" );
                                                        RunSQL("Insert into tbcoupon (Coupon,isActivated,DateExpire,DateActivated,Recruiter) Values('" . $array[0] . "','y',ADDDATE(now(), INTERVAL 14 DAY),'" . $dayplus . "','" . $rdscode . "')" );
                                                        RunSQL("Insert into tbcoupon (Coupon,isActivated,DateExpire,DateActivated,Recruiter) Values('" . $array[1] . "','y',ADDDATE(now(), INTERVAL 14 DAY),'" . $dayplus . "','" . $rdscode . "')" );
                                                        RunSQL("Insert into tbcoupon (Coupon,isActivated,DateExpire,DateActivated,Recruiter) Values('" . $array[2] . "','y',ADDDATE(now(), INTERVAL 14 DAY),'" . $dayplus . "','" . $rdscode . "')" );
                                                        $ask_dayplus ='1';  
                                                        $_SESSION["ask_dayplus"] = $ask_dayplus;
                                                     }
                                                     else{
                                                        $array = genrdscode(3);
                                                        RunSQL("Update tbanswer set peercode01 = '" . $array[0] . "',lastupdate = now() where rdscode = '" . $rdscode . "' and peercode01 is null" );
                                                        RunSQL("Update tbanswer set peercode02 = '" . $array[1] . "',lastupdate = now() where rdscode = '" . $rdscode . "' and peercode02 is null" );
                                                        RunSQL("Update tbanswer set peercode03 = '" . $array[2] . "',lastupdate = now() where rdscode = '" . $rdscode . "' and peercode03 is null" );
                                                        RunSQL("Insert into tbcoupon (Coupon,isActivated,DateExpire,DateActivated,Recruiter) Values('" . $array[0] . "','y',ADDDATE(now(), INTERVAL 14 DAY),now(),'" . $rdscode . "')" );
                                                        RunSQL("Insert into tbcoupon (Coupon,isActivated,DateExpire,DateActivated,Recruiter) Values('" . $array[1] . "','y',ADDDATE(now(), INTERVAL 14 DAY),now(),'" . $rdscode . "')" );
                                                        RunSQL("Insert into tbcoupon (Coupon,isActivated,DateExpire,DateActivated,Recruiter) Values('" . $array[2] . "','y',ADDDATE(now(), INTERVAL 14 DAY),now(),'" . $rdscode . "')" );
                                                         $ask_dayplus ='0';  
                                                        $_SESSION["ask_dayplus"] = $ask_dayplus;
                                                  
                                                  }   
                                                } else {
                                               }
                                            /* }else {
                                                echo "OTP not matched";	
                                            }*/
                                        
                                    } else {
                                            redirect("formmessage80.php",303);
                                    
                                    }
                                
                                    ////////////////////////////////////**************************************SMS** แจกเพือน*****************************************
                                                $sqlgive = "select DISTINCT REGMOBILE, PEERCODE01, PEERCODE02, PEERCODE03, DateExpire from tbanswer left join tbcoupon ON tbcoupon.Recruiter = tbanswer.RDSCODE WHERE  RDSCODE = '$rdscode' ";
                                                $resultgive = $conn_rds->query($sqlgive);
                                                $numgive_rows = mysqli_num_rows($resultgive);
                                                $rowgive = $resultgive->fetch_assoc();
																																																
                                                 $peer1 = $rowgive['PEERCODE01'];
                                                 $peer2 = $rowgive['PEERCODE02'];
                                                 $peer3 = $rowgive['PEERCODE03'];
                                                 $dateExp = $rowgive['DateExpire'];
                                              
                                                 $dateExp2 = date("d/m/Y", strtotime($dateExp));
                                                 $telcode = $rowgive['REGMOBILE'];
                                                
                                                 //error_reporting( error_reporting() & ~E_NOTICE );
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

$text_sms2 = utf8tohtml('รหัสแจกเพื่อนชวนเพื่อน
'. $peer1 .'
'. $peer2 .'
'. $peer3 .'
ไปที่ www.kainoi.net ใช้ภายใน '. $dateExp2 .'', true); 


$input_xml = "<?xml version=\"1.0\" encoding=\"TIS-620\"?><message>
<sms type=\"mt\">
<service-id>xxxxxxxxxxxxxxxxxxxxx</service-id>
<destination>
		<address>
		<number type=\"international\">$new_moblie</number>
		</address></destination><source>
		<address>
		<number type=\"abbreviated\">xxxxxxxxxxxxxxxxx</number>
		<originate type=\"international\">xxxxxxxxxxxxxxxxxxxx</originate>
		<sender>KAINOI</sender>
</address>
</source><ud type=\"text\" encoding=\"unicode\">$text_sms2</ud><dro>true</dro></sms>
</message>";


echo "\n";
$url = "xxxxxxxxxxxxxxxxxxxxxxxx";
$headers = array(
    "Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxxxxx",
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
	
 
 
 
 
 
    //จ่ายเงิน..............................................................................................................
                                         $url2 = 'https://kainoi.net/incentive.php';
                                        //$encode_phone = encode('0811422485',"w-e-b-r-d-s") ;

                                        $encode_phone =  $telcode ;
                                        
                                      /*  echo  $encode_phone;
                                        echo "<br>";
                                        echo  $rdscode;
                                        echo "<br>";
                                        echo  $url;*/
                                        $fields = [
                                            'rds_code'      => $rdscode,
                                            'm_phone' => $encode_phone,
                                            'pay_type' => 'Q',
                                            //'pay_type' => 'L',   
                                            'pay_value'         => '200'
                                        ];
                                        
                                        $fields_string = http_build_query($fields);
                                        
                                        //open connection
                                       /* $ch = curl_init();
                                        
                                        //set the url, number of POST vars, POST data
                                        curl_setopt($ch,CURLOPT_URL, $url);
                                        curl_setopt($ch,CURLOPT_POST, true);
                                        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                                        
                                        //So that curl_exec returns the contents of the cURL; rather than echoing it
                                        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                                        
                                        //execute post
                                        $result = curl_exec($ch);
                                        //echo $result;
                                        //exit(0);*/
                                        
                                           $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $url2);
                                        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                                        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                                        
                                        $httpCode = curl_getinfo($ch , CURLINFO_HTTP_CODE); // this results 0 every time
                                        $response = curl_exec($ch);
                                        
                                        if ($response === false) 
                                            $response = curl_error($ch);
                                        
                                       // echo stripslashes($response);
                                        
                                        curl_close($ch);
                                        
                                                                 
         
                                                                   echo "<input class=\"button button-primary button-winona wow fadeIn\" type=\"button\" value=\"ถัดไป\" onclick=\"window.location.href='givecode.php'\">";
                                   }
                                   else{
                                                                   echo "<input class=\"button button-primary button-winona wow fadeIn\" type=\"button\" value=\"ถัดไป\" onclick=\"window.location.href='givecode.php'\">";
                                   }
 
                                    $conn_rds->close();
                                                                   
                                    ?>
                                     <!--<button type="button" class="button button-primary button-winona wow fadeIn" onclick="window.location.href='givecode.php'">ถัดไป</button>-->
                        <br>
                      </form>
                          <br>
       
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