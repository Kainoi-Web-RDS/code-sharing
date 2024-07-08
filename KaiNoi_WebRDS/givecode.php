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
$ask_dayplus = $_SESSION["ask_dayplus"];

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
          <h3 class="wow-outer"><span class="wow slideInUp"></span></h3>
          <p class="wow-outer"><span class="text-width-1 wow slideInDown">
          <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #1370F2;">
                                           
                                                 <h3><b> </b></h3>
                                                <h4>เมื่อเพื่อนของคุณนำรหัสมาใช้งานใน kainoi.net และมีคุณสมบัติครบถ้วนและได้เข้ามาตอบแบบสอบถาม ระบบจะบันทึกรหัสทันที เพื่อให้คุณได้รับค่าชดเชยในการชวนเพื่อนเข้าร่วมโครงการได้ครบตามที่ระบุไว้ พวกเราจึงขอให้คุณแจกรหัสให้กับเพื่อนที่มีคุณสมบัติครบถ้วนตามระบุข้างต้นนะครับ<br> </h4>
                                                <h4>(ปล. อย่าลืมชวนเพื่อนของท่าน)</h4><br>
                                                <?php
                                                if ($ask_dayplus ='1'){
                                                   echo "<h3 style='font-weight: bold; color:red;'>คูปองนี้ จะใช้ได้ในอีก 1 วันถัดไป</h3>";
                                                }
                                                else{
                                                    echo "<h3 style='font-weight: bold; color:red;'>คูปองนี้ สามารถใช้ได้ทันที</h3>";
                                                }
                                                
                                                ?>
                                                <h4>ขอบคุณที่เข้าร่วมโครงการ</h4>
                                                      <img style="width: 500px;" src="https://kainoi.net/images/kai2-1.png">
                               <br>
                               
                               <center>
                               
                    <?php
                    if ($conn_rds->connect_error) {
                        die("Connection failed: " . $conn_rds->connect_error);
                    }
                    
                      $sql = "select * from tbanswer WHERE RDSCODE = '$rdscode' ";
                                                                    $result = $conn_rds->query($sql);
                                                                    $num_rows = mysqli_num_rows($result);
                                                                    $row = $result->fetch_assoc();
                                                                    
                                                                    
                                                                     $plan_service =$row['IS_Agree'];
                                                                     $DATE_REGIS =$row['DATE_REGISTER'];
                    //แจ้งเตือนผ่านไลน์


		define('LINE_API',"https://notify-api.line.me/api/notify");
 
			$token = "TOtOJBYj2yOR0BFgIcNMTMXxay0JBmjmJYx5btRicfl"; //ใส่Token ที่copy เอาไว้
			
			$str = "\r\n".'มีผู้เข้าร่วมโครงการ = '.$rdscode.
				   "\r\n".' เมื่อวันที่ = '. $DATE_REGIS;
        "\r\n".'เข้าสู่ระบบ';
				    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
			 
			$res = notify_message($str,$token);
			//print_r($res);
			function notify_message($message,$token){
			 $queryData = array('message' => $message);
			 $queryData = http_build_query($queryData,'','&');
			 $headerOptions = array( 
			         'http'=>array(
			            'method'=>'POST',
			            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
			                      ."Authorization: Bearer ".$token."\r\n"
			                      ."Content-Length: ".strlen($queryData)."\r\n",
			            'content' => $queryData
			         ),
			 );
			 $context = stream_context_create($headerOptions);
			 $result = file_get_contents(LINE_API,FALSE,$context);
			 $res = json_decode($result);
			 return $res;
			}
// end line notify
                    $sql = "select IS_Agree from tbanswer WHERE RDSCODE = '$rdscode' ";
                                                                    $result = $conn_rds->query($sql);
                                                                    $num_rows = mysqli_num_rows($result);
                                                                    $row = $result->fetch_assoc();
                                                                    
                                                                    
                                                                     $plan_service =$row['IS_Agree'];
                                        If($plan_service ==  10)
                                        {
                                         // เต็ม 25คนแล้ว
                                           // echo "<meta http-equiv='refresh' content='0;URL=formmessage05.php'>";
                                            echo "
                                            <div class='modal' id='myModal'>
                                             <div class='modal-dialog'>
                                               <div class='modal-content'  style='height:450px;'>
                                                
                                                 <div class='modal-header'>
                                                   <h4 class='modal-title'> <label style='font-size: 16px; font-weight: bold; color:Black;'>คำเตือน:</label></h4>
                                                   <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                 </div>
                                               
                                                 <div class='modal-body'>
                                                  <p style='text-align: center;'>
                                                   <label style='font-size: 16px; font-weight: bold; color:Black;'>การเข้ารับบริการตรวจเลือดที่คลินิค เจ้าหน้าที่จะตรวจสอบว่าคุณผ่านการตอบแบบสอบถาม</label><br>
                                                    <label style='font-size: 16px; font-weight: bold; color:Black;'>แล้วผ่านเบอร์โทรศัพท์ที่ท่านให้ไว้ในเว็บไซค์นี้ ดังนั้นท่านต้องนำโทรศัพท์ </label><br>
                                                   <label style='font-size: 16px; font-weight: bold; color:red;'>(เบอร์โทรที่ให้ไว้ในครั้งนี้)</label><br>
                                                   <label style='font-size: 16px; font-weight: bold; color:Black;'>ติดตัวไปด้วย เมื่อไปรับบริการที่คลินิค</label>
                                                  </p><br>
                                                   <center><img style='width: 150px;' src='https://kainoi.net/images/p1.png'></center>
                                                 </div>
                                                
                                                 <div class='modal-footer'>
                                                   <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                                                 </div>
                                               </div>
                                             </div>
                                           </div>";
                                           echo "<br>";
                                            echo "<center><h3>ไปหน้านัดตรวจที่คลีนิคนิรนามสภากาชาติไทย</h3></center>";
                                            echo "<input class=\"button button-primary button-winona wow fadeIn button-block\" type=\"button\" value=\"กดเพื่อนัดหมาย\" onclick=\"window.location.href='https://th.trcarc.org/th/2-information/407-6-6-2019'\">";
                                        }
                                          else if ($plan_service == 1 or $plan_service == 2 or $plan_service == 3 or $plan_service == 4 or $plan_service == 5 or $plan_service == 6 or $plan_service == 7 or $plan_service == 8 or $plan_service == 9)
                                       {
                                         echo "
                                            <div class='modal' id='myModal'>
                                             <div class='modal-dialog'>
                                               <div class='modal-content'  style='height:450px;'>
                                                
                                                 <div class='modal-header'>
                                                   <h4 class='modal-title'> <label style='font-size: 16px; font-weight: bold; color:Black;'>คำเตือน:</label></h4>
                                                   <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                 </div>
                                               
                                                 <div class='modal-body'>
                                                  <p style='text-align: center;'>
                                                   <label style='font-size: 16px; font-weight: bold; color:Black;'>การเข้ารับบริการตรวจเลือดที่คลินิค เจ้าหน้าที่จะตรวจสอบว่าคุณผ่านการตอบแบบสอบถาม</label><br>
                                                    <label style='font-size: 16px; font-weight: bold; color:Black;'>แล้วผ่านเบอร์โทรศัพท์ที่ท่านให้ไว้ในเว็บไซค์นี้ ดังนั้นท่านต้องนำโทรศัพท์ </label><br>
                                                   <label style='font-size: 16px; font-weight: bold; color:red;'>(เบอร์โทรที่ให้ไว้ในครั้งนี้)</label><br>
                                                   <label style='font-size: 16px; font-weight: bold; color:Black;'>ติดตัวไปด้วย เมื่อไปรับบริการที่คลินิค</label>
                                                  </p><br>
                                                   <center><img style='width: 150px;' src='https://kainoi.net/images/p1.png'></center>
                                                 </div>
                                                
                                                 <div class='modal-footer'>
                                                   <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                                                 </div>
                                               </div>
                                             </div>
                                           </div>";
                                       }
                                       else if ($plan_service == 12)
                                       {
                                          echo "<br>";
                                          echo "<center><h3>ไปหน้านัดตรวจที่คลีนิคเอ็มพลัสเชียงใหม่</h3></center>";
                                          echo "<input class=\"button button-primary button-winona wow fadeIn button-block\" type=\"button\" value=\"กดเพื่อนัดหมาย\" onclick=\"window.location.href='https://res99.org/home/reservation/1590'\">";
                                           
                                       }
                                       else {
                                                echo "<br>";
                                       }
                                    $conn_rds->close();          
                               ?>
<br><br>
                                     <button type="button" name="button"  class="button button-primary button-block"  style="font-size:  16px;" onclick="window.location.href='index.php'">กลับหน้าหลัก</button>
                               </center>
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
  <script type="text/javascript">
   $(window).on('load',function(){
    var delayMs = 1500; // delay in milliseconds

         setTimeout(function(){
             $('#myModal').modal('show');
         }, delayMs);
     });    
</script>
  </body>
</html>