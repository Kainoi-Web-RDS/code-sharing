<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
if (isset($_SESSION['rds_code']) == "") {
    header("location: index.php");
    exit();
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
    <!--
        Features
        ==================================== -->
		
		 <div class="tabs-horizontal"></div>
        <section class="section section-lg text-center" style="background-image: url(images/20896.jpg); background-repeat: repeat-y;">
        <div class="container">
          <h3 class="wow-outer"><span class="wow slideInUp"><br></span></h3>
          <p class="wow-outer"><span class="text-width-1 wow slideInDown">
          <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #1370F2;">
                                <h3><p class="thick" style="text-align: center;" >ความสำคัญของการตรวจเลือดหาเชื้อเอชไอวี (Anti-HIV)</p></h3><br>
                                <h3>"เอชไอวี  เป็นไวรัสที่เป็นสาเหตุของโรคเอดส์ "</h3><br>
                                <h4>หลายคนที่ติดเชื้อเอชไอวีไม่รู้ตัวว่าติดเชื้อเพราะไม่เคยตรวจเลือดดังนั้นมีวิธีเดียวที่จะรู้ว่าติดเชื้อหรือไม่  ก็โดยการตรวจเลือด</h4>
                                <h4>ถ้าตรวจไม่เจอ  จะได้เริ่มต้นป้องกันตัวเองอย่างจริงจัง  หรือถ้าตรวจเจอต้องถือว่า  โชคดีที่รู้ตัวก่อนที่จะป่วยขึ้นมา  จะได้เข้าสู่กระบวนการรักษาแต่เนิ่นๆ จะได้ไม่ป่วยหรือเสียชีวิตจากโรคเอดส์  อีกทั้งสามารถป้องกันคนที่เรารักและคนอื่นๆ ไม่ให้ติดเชื้อจากเราได้</h4>
                                <h4>เรามีโอกาสจะติดเอดส์ไหม?  ร้อยละ 90 ของผู้ติดเชื้อเอชไอวี รายใหม่ ติดเชื้อจากการมีเพศสัมพันธ์ที่ไม่ป้องกัน ดังนั้นเมื่อท่านเคยมีพฤติกรรมที่เสี่ยงต่อการติดเชื้อเอชไอวี เช่น เคยเสพยาโดยการฉีด  หรือเคยมีเพศสัมพันธ์กับใครโดยไม่ได้ใส่ถุงยางอนามัย</h4>
                                <h4>(แม้กระทั่งกับสามีหรือภรรยาของเราเอง เพราะเราไม่รู้ว่าเขาเคยมีเพศสัมพันธ์กับผู้ติดเชื้อมาก่อนหรือไม่) ท่านควรตรวจเลือดหาเชื้อเอชไอวี เพราะคนที่ติดเชื้อใหม่ในปัจจุบัน  ติดมาจากคนที่ติดเชื้ออยู่ก่อนแล้ว  แต่ไม่รู้ตัว  เพราะไม่เคยไปตรวจ  หรือไม่มีอาการอะไร</h4>
                                <h4>การตรวจแอนตี้เอชไอวีเป็นวิธีที่ดีที่สุดในการตรวจหาการติดเชื้อเอชไอวี (เอดส์)  โดยไม่ต้องรอให้มีอาการ</h4><br>
                                 <br>
                                        <button type="button" class="button button-primary button-winona wow fadeIn" onclick="window.location.href='recruitment.php'">ถัดไป</button>
                                <br>

                               <!-- <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='consent.php'">แบบขอคำยินยอม</button>-->
        </div>
        </div>
          </span>
      </section>
		
        <!--
        End Features
        ==================================== -->

        <!--
        End Contact Us
        ==================================== -->
		
		
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


