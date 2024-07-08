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
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />
    <!-- Stylesheets-->
        <style type="text/css">
    /* ใช้ทั้งเว็บไซต์ */
      body {
        font-family: 'Sriracha', cursive;
        
      }
      /* ใช้เฉพาะหัวข้อ */
      h1, h2, h3, h4, h5, h6 {
        font-family: 'Sriracha',
        cursive;
      }
      
         body,td,th {
	font-family: "Open Sans", sans-serif;
}

.container {

}


/*//////////////////  checkmark /////////*/
	.containerins12 {
			display: flex;
			position: relative;
   font-weight:  bold;
			padding-left: 55px;
			margin-bottom: 12px;
			cursor: pointer;
			/*font-size: 22px;*/
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		/* Hide the browser's default checkbox */
		.containerins12 input {
			position: absolute;
			opacity: 0;
   
			cursor: pointer;
			height: 0;
			width: 0;
		}

		/* Create a custom checkbox */
		.checkmarkins12 {
			position: absolute;
			top: 0;
			left: 0;
			height: 25px;
			width: 25px;
   
			background-color: #9FA59F;
			border-radius: 77px;
		}

		/* On mouse-over, add a grey background color */
		.containerins12:hover input ~ .checkmarkins12 {
			background-color: #000000;
		}

		/* When the checkbox is checked, add a blue background */
		.containerins12 input:checked ~ .checkmarkins12 {
			background-color: #000000;
		}

		/* Create the checkmark/indicator (hidden when not checked) */
		.checkmarkins12:after {
			content: "";
			position: absolute;
			display: none;
		}

		/* Show the checkmark when checked */
		.containerins12 input:checked ~ .checkmarkins12:after {
		display: block;
		}

		/* Style the checkmark/indicator */
		.containerins12 .checkmarkins12:after {
			left: 9px;
			top: 5px;
			width: 5px;
			height: 10px;
			border: solid white;
			border-width: 0 3px 3px 0;
			-webkit-transform: rotate(45deg);
			-ms-transform: rotate(45deg);
			transform: rotate(45deg);
		}



    #myDIV {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightgreen;
      margin-top: 20px;
      
      border-radius: 6px ;
      border: 3px solid #000000;
      padding: 5px;
    }
    
       #myDIV2 {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightgreen;
      margin-top: 20px;
      display: none;
      border-radius: 6px ;
      border: 3px solid #000000;
      padding: 5px;
    }
    
      .mapboxgl-popup {
      max-width: 400px;
      font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
      }
      .marker {
      display: block;
      border: none;
      border-radius: 50%;
      cursor: pointer;
      padding: 0;
      }
      .table-responsive {
    display: table;
    }

     @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 2px solid #000; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
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
          <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #1370F2; opacity: 5; border-radius: 15px;" >
                                 <h3><p class="thick" style="text-align: center;" >สำหรับคุณที่อยู่บริเวณกรุงเทพมหานคร</p></h3><br>
                                 <h4> <b>ทำไมต้องตรวจเอชไอวี ?</b></h4> 
                                <h5>หลายคนที่ติดเชื้อเอชไอวีไม่รู้ตัวว่าติดเชื้อเพราะไม่เคยตรวจเลือด ดังนั้นมีวิธีเดียวที่จะรู้ว่าติดเชื้อหรือไม่ คือการตรวจเลือด</h5><br>
                                <h5>ถ้าตรวจแล้วไม่ติดเชื้อเอชไอวี จะได้เริ่มต้นป้องกันตัวเองอย่างจริงจัง </h5><br>
                                <h4><b>คุณจะได้อะไร หากไปตรวจเลือด ? </b></h4> 
                                <h5>หากคุณยินยอมไปตรวจเลือดด้วยความสมัครใจ ที่สถานบริการที่โครงการกำหนด จะได้รับการตรวจหาการติดเชื้อเอชไอวีจำนวนเชื้อไวรัสเอชไอวี ซิฟิลิส ไวรัสตับอักเสบชนิดบีและซี </h5><br>
                                <h5>ตามมาตรฐานที่กระทรวงสาธารณสุขกำหนด โดยไม่เสียค่าใช้จ่ายใด ๆ อีกทั้งจะได้รับรหัสบัตรเงินสดทรูมันนี่ มูลค่า 500 บาท ผ่านทางหมายเลขโทรศัพท์ที่คุณได้ลงทะเบียนไว้ตั้งแต่เริ่มต้น</h5><br>
                                <h5>หากคุณสนใจ โครงการมีรายชื่อสถานบริการ ตามที่ระบุไว้ด้านล่าง เพื่อให้คุณไปตรวจเลือดได้</h5><br>
                                <img style="width: 300px;" src="https://kainoi.net/images/kai3-1.png">
                                 <p><h5>(โดยเฉพาะที่ <b style="color: #FF0000;"> "สภากาชาดไทย" </b>มีบริการนัดหมาย)<br>
                                                      ส่วนคลินิคที่อื่นๆต้องโทรนัดหมายดังรายละเอียดที่ให้ไว้ </h5></p><br>
                                 <p><h5> คุณสามารถเลือกดูสถานบริการ ที่ให้บริการ จากภาพแผนที่ ข้างล่าง</h5></p>
                                <br>
                                   <div class="contact-form" style="padding: 50px 0; background-color: #ffffff; margin-top: 20px; border-radius: 6px ; border: 3px solid #000000;padding: 5px;">
                                                                  <div id='map' style="width: 100%; height: 400px;"></div>
                                    </div>
                            <div id="myDIV">
                                                <h4  style="font-weight: bold;">คุณสนใจเข้ารับบริการตรวจหาการติดเชื้อเอชไอวี ไวรัสตับอักเสบ บีซี และซิฟิลิสหรือไม่:<br></h4>
                                                <br>
                                                  <form name="agreeForm"  id="agreeForm" method="POST" action="agree.php"  onSubmit="JavaScript:return fncSubmit();">
                                 
                                                <label class="containerins12">&nbsp;&nbsp;&nbsp;&nbsp;สนใจเข้ารับบริการตรวจเลือด
                                                <input type="radio" name="isAgree" id="yesCheck"  value="0" onclick="javascript:yesnoCheck();" data-toggle="modal" data-target="#warnning"><br>
                                               <span class="checkmarkins12"></span>
                                                </label>
                                                 <div id="ifyes" style="display:none" >
                                                    <div class="sec-sub-title text-center">
                                                     
                                                        <div class="contact-form" style="padding: 50px 0; background-color: #7FFFCC; margin-top: 20px; border-radius: 6px ; border: 3px solid #000000;padding: 5px;">
                                                                <p style="font-weight: bold;">กรุณาเลือกสถานที่ตรวจเลือดที่ท่านสนใจเข้ารับบริการ </p>
                                                                 <p style="font-weight: bold;">ท่านสามารถเข้ารับบริการ ตาม วัน เวลา ที่ระบุไว้ด้านล่างนี้</p>
                                                               <br>
                                                              
                                                                <div class="container2" style="overflow-x:auto;">
                                                               <div class="table-responsive" style="background-color: #fff;">
                                                                        <table class="table">
                                                                          <thead>
                                                                            <tr>
                                                                              <th>สถานที่/โรงพยาบาล</th>
                                                                              <th>วัน เวลาที่ให้บริการ</th>
                                                                              <th>เบอร์ติดต่อ</th>
                                                                            </tr>
                                                                          </thead>
                                                                          <tbody>
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">1.รพ.ราชพิพัฒน์
                                                                             <input type="radio" id="pins12a" name="pins" value="1">
                                                                             <span class="checkmarkins12"></span>
                                                                             </td>
                                                                             <td>ในเวลาราชการ
                                                                                                          จันทร์-ศุกร์ <br>
                                                                                                          เวลา 8.00 -16.00 น.<br>
                                                                                    <br>
                                                                                                          นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน <br>
                                                                                                          จันทร์,พุธ,พฤหัสบดี <br>
                                                                                                          เพิ่ม 16.00 – 20.00 น.
                                                                             </td>
                                                                              <td>โทร 02-444-0138 ต่อ 8846<br>เบอร์มือถือ 061-856-9664</td>
                                                                             </label>
                                                                            </tr>
                                                                            
                                                                             <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">2.รพ.เวชการุณย์รัศมิ์
                                                                             <input type="radio" id="pins12b" name="pins" value="2">
                                                                               <span class="checkmarkins12"></span>
                                                                             </td>
                                                                              <td>นอกเวลาราชการ<br>
                                                                                                           คลินิกรักษ์เพื่อน<br>
                                                                                                           จันทร์,พุธ-พฤหัสบดี<br>
                                                                                                           เวลา 16.00 - 20.00 น.
                                                                             </td>
                                                                              <td>โทร 02-988-4000-1 ต่อ 255</td>
                                                                             </label>
                                                                            </tr>
                                                                            
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">3. รพ.หลวงพ่อทวีศักดิ์ ชุตินฺธโร อุทิศ
                                                                             <input type="radio" id="pins12c" name="pins" value="3">
                                                                               <span class="checkmarkins12"></span>
                                                                             </td>
                                                                             <td>นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน<br> 
                                                                                                          จันทร์,พุธ-พฤหัสบดี<br>
                                                                                                          เวลา 16.00 - 20.00 น.
                                                                              </td>
                                                                              <td>โทร 02-429-3575-81 ต่อ 8619</td>
                                                                             </label>
                                                                            </tr>
                                                                            
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">4. รพ.ลาดกระบัง กรุงเทพมหานคร
                                                                             <input type="radio" id="pins12d" name="pins" value="4">
                                                                               <span class="checkmarkins12"></span>
                                                                             </td>
                                                                                <td>นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน<br> 
                                                                                                          จันทร์,พุธ-พฤหัสบดี<br>
                                                                                                          เวลา 16.00 - 20.00 น.
                                                                              </td>
                                                                               <td>โทร 02-326-9995, 02-326-7711 ต่อ 254, 258<br>เบอร์เมือถือ 086-995-6364</td>
                                                                             </label>
                                                                            </tr>
                                                                            
                                                                              <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">5. รพ.ตากสิน
                                                                             <input type="radio" id="pins12e" name="pins" value="5">
                                                                               <span class="checkmarkins12"></span>
                                                                             </td>
                                                                               <td>นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน<br> 
                                                                                                          จันทร์,พุธ-พฤหัสบดี<br>
                                                                                                          เวลา 16.00 - 20.00 น.
                                                                              </td>
                                                                                 <td>โทร 02- 437-0123 ต่อ 1136,1140</td>
                                                                             </label>
                                                                            </tr>
                                                                     
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">6. รพ.สิรินธร
                                                                             <input type="radio" id="pins12f" name="pins" value="6">
                                                                               <span class="checkmarkins12"></span>
                                                                             </td>
                                                                                 <td>นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน<br> 
                                                                                                          จันทร์,พุธ-พฤหัสบดี<br>
                                                                                                          เวลา 16.00 - 20.00 น.
                                                                              </td>
                                                                              <td>โทร 02-328-6900-19 ต่อ 10268,10269<br>เบอร์เมือถือ 083-835-5227</td>
                                                                             </label>
                                                                            </tr>
                                                                    
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">7. รพ.เจริญกรุงประชารักษ์
                                                                             <input type="radio" id="pins12g" name="pins" value="7">
                                                                               <span class="checkmarkins12"></span>
                                                                             </td>
                                                                               <td>ในเวลาราชการ OPD อายุรกรรม 
                                                                                                          จันทร์-ศุกร์ <br>
                                                                                                          เวลา 8.00 -16.00 น.<br>
                                                                                    <br>
                                                                                                          นอกเวลาราชการ<br>
                                                                                                          - คลินิกรักษ์เพื่อน <br>
                                                                                                          จันทร์,พุธ,พฤหัสบดี <br>
                                                                                                          เพิ่ม 16.00 – 20.00 น.<br><br>
                                                                                                          - คลินิกฟ้าใหม่ <br>
                                                                                                            อังคาร  <br>
                                                                                                          เพิ่ม 16.00 – 20.00 น.<br>                     
                                                                             </td>
                                                                               <td> OPD อายุรกรรม <br> โทร 02-289-7528-9<br><br><br><br>
                                                                                                             คลินิกรักษ์เพื่อน<br> โทร 02-289-7890<br><br><br>
                                                                                                             คลินิกฟ้าใหม่<br> เบอร์เมือถือ 098-923-8714</td>
                                                                             </label>
                                                                            </tr>
                                                                          
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">8. รพ.กลาง
                                                                             <input type="radio" id="pins12h" name="pins" value="8">
                                                                               <span class="checkmarkins12"></span>
                                                                             </td>
                                                                                    <td>ในเวลาราชการ
                                                                                                          - หน่วยปรึกษาสุขภาพและจิตวิทยา<br>
                                                                                                          จันทร์-ศุกร์ <br>
                                                                                                          เวลา 8.00 -15.00 น.<br>
                                                                                    <br>
                                                                                                          นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน <br>
                                                                                                          จันทร์,พุธ,พฤหัสบดี <br>
                                                                                                          เพิ่ม 16.00 – 20.00 น.
                                                                             </td>
                                                                                   <td>โทร 02-220-8000 ต่อ 10210<br>เบอร์เมือถือ 092-342-8942</td>
                                                                             </label>
                                                                            </tr>
                                                                             
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">9. รพ.ศูนย์บริการสาธารณสุข 28 กรุงธนบุรี 
                                                                             <input type="radio" id="pins12i" name="pins" value="9">
                                                                               <span class="checkmarkins12"></span>
                                                                             </td>
                                                                                    <td>ในเวลาราชการ
                                                                                                          - คลินิกรักปลอดภัย <br>
                                                                                                          จันทร์-ศุกร์ <br>
                                                                                                          เวลา 08.30 – 12.00 น. และ 13.00 -15.30 น.<br>
                                                                                    <br>
                                                                                                          นอกเวลาราชการ<br>
                                                                                                          คลินิคแฟมมิลี่แอนด์เฟรนด์ <br>
                                                                                                          จันทร์ – ศุกร์ <br>
                                                                                                          เพิ่ม 7.00 – 12.00 น.
                                                                             </td>
                                                                                       <td>โทร 02-860-8210 ต่อ 311<br>เบอร์เมือถือ 096-797-1610</td>
                                                                             </label>
                                                                            </tr>
                                                                           
                                                                            
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">10. สภากาชาดไทย : คลินิกนิรนาม
                                                                             <input type="radio" id="pins12j" name="pins" value="10">
                                                                               <span class="checkmarkins12"></span>
                                                                             </td>
                                                                                     <td>ในเวลาราชการ<br>
                                                                                                                   คลินิกนิรนาม<br> 
                                                                                                                  จันทร์ – ศุกร์ <br>
                                                                                                                  เวลา 07.30-15.00 น.<br>
                                                                                            <br>                
                                                                                                                  เสาร์ <br>
                                                                                                                  เพิ่ม 8.30-16.00  น.<br>
                                                                                                                  หยุดทุกวันอาทิตย์ และวันนักขัตฤกษ์
                                                                                           </td>
                                                                              <td>โทร 02-2516711-5</td>
                                                                             </label>
                                                                            </tr>

                                                                          </tbody>
                                                                        </table>
                                                                        </div>
                                                                      </div>
                                                              
                                                         </div>
                                                     </div>
                                                 </div>
                                               <br>
                                            <label class="containerins12">&nbsp;&nbsp;&nbsp;&nbsp;ไม่สนใจเข้ารับการตรวจเลือด
                                            <input type="radio" name="isAgree" id="noCheck" value="99" onclick="javascript:yesnoCheck();"><br>
                                            <span class="checkmarkins12"></span>
                                            </label>
                                              <div id="ifNo" style="display:none; background-color: #fff;" >
                                                    <ul  class="sec-title text-left" style="font-size: 20px; font-weight: bold; padding-top: 5px;">เพราะว่า :<br>
                                                       <label class="container">
                                                      <li>
                                                        <label class="containerins12">&nbsp;&nbsp;&nbsp;&nbsp;ทราบผลตรวจแล้ว <input type="radio" id="yesCheck1"  name="knhiv" value="1" onclick="javascript:yesnoCheck2();">
                                                        <span class="checkmarkins12"></span>
                                                       </label><br></li>
                                                      <li> <label class="containerins12">&nbsp;&nbsp;&nbsp;&nbsp;รับการรักษาด้วยยาต้านไวรัสอยู่<input type="radio" id="yesCheck2"  name="knhiv" value="2" onclick="javascript:yesnoCheck2();">
                                                      <span class="checkmarkins12"></span>
                                                       </label><br></li>
                                                      <li> <label class="containerins12">&nbsp;&nbsp;&nbsp;&nbsp;ไม่มีเวลา<input type="radio" id="yesCheck3"  name="knhiv" value="3" onclick="javascript:yesnoCheck2();">
                                                      <span class="checkmarkins12"></span>
                                                       </label><br></li>
                                                      <li> <label class="containerins12">&nbsp;&nbsp;&nbsp;&nbsp;ค่าตอบแทนน้อย<input type="radio" id="yesCheck4"  name="knhiv" value="4" onclick="javascript:yesnoCheck2();">
                                                      <span class="checkmarkins12"></span>
                                                       </label><br></li>
                                                      <li> <label class="containerins12">&nbsp;&nbsp;&nbsp;&nbsp;อื่นๆ<input type="radio" id="noCheck1" name="knhiv" value="5" onclick="javascript:yesnoCheck2();">
                                                      <span class="checkmarkins12"></span>
                                                       </label><br></li>
                                                      
                                                                <div id="ifNo2" style="display:none">
                                                                                           อื่นๆ โปรดระบุ<input style="opacity: 5; border-radius: 20px; height: 35px;"  type="text" id="knhiv_oth" name="knhiv_oth"><br>
                                                                </div>
                                                    </ul>
                                                               
                                            </div>
                                                       <br>
                                                       <button type='submit'   id='submit' class='btn btn-primary btn-lg'>ถัดไป</button></center>
                                                       <br><br>
                                      </form>
                                    
                            </div>
                               <!-- <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='consent.php'">แบบขอคำยินยอม</button>-->
					                   <br>
                        <br>
          </div>
        </div>
    </div>
          </span>
      </section>
		
        <!--
        End Features
        ==================================== -->
<div class="modal" id="warnning">
    <div class="modal-dialog">
      <div class="modal-content"  style="height:450px;">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> <label style="font-size: 16px; font-weight: bold; color:Black;">คำเตือน:</label></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
         <p style="text-align: center;">
          <label style="font-size: 16px; font-weight: bold; color:Black;">การเข้ารับบริการตรวจเลือดที่คลินิค เจ้าหน้าที่จะตรวจสอบว่าคุณผ่านการตอบแบบสอบถาม</label><br>
           <label style="font-size: 16px; font-weight: bold; color:Black;">แล้วผ่านเบอร์โทรศัพท์ที่ท่านให้ไว้ในเว็บไซค์นี้ ดังนั้นท่านต้องนำโทรศัพท์ </label><br>
          <label style="font-size: 16px; font-weight: bold; color:red;">(เบอร์โทรที่ให้ไว้ในครั้งนี้)</label><br>
          <label style="font-size: 16px; font-weight: bold; color:Black;">ติดตัวไปด้วย เมื่อไปรับบริการที่คลินิค</label>
         </p><br>
          <center><img style="width: 150px;" src="https://kainoi.net/images/p1.png"></center>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

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
    
<script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibWFpcmVpbmEiLCJhIjoiY2syZm5nOWduMDk4ZDNocWdobHR2NmxhbiJ9.WI9H08vRgnFNVphJHjWH6w';
 
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [100.5310656, 13.7263409 ],
zoom: 9.18
});
 
map.on('load', function () {
  
map.loadImage('images/gmap_marker_active.png', function(error, image) {
if (error) throw error;
map.addImage('cat', image);
// Add a layer showing the places.
map.addLayer({
"id": "places",
"type": "symbol",
"source": {
"type": "geojson",
"data": {
"type": "FeatureCollection",
"features": [{
"type": "Feature",
"properties": {
"description": "<strong style='color:DodgerBlue;'>รพ.ราชพิพัฒน์</strong>"
},
"geometry": {
"type": "Point",
"coordinates": [100.366998, 13.7305709]
}
}, {
"type": "Feature",
"properties": {
"description": "<strong style='color:DodgerBlue;'>รพ.เวชการุณย์รัศมิ์</strong>"

},
"geometry": {
"type": "Point",
"coordinates": [100.8587767, 13.8559863]
}
}, {
"type": "Feature",
"properties": {
"description":"<strong style='color:DodgerBlue;'>รพ.หลวงพ่อทวีศักดิ์ ชุตินฺธโร อุทิศ</strong>"
},
"geometry": {
"type": "Point",
"coordinates": [100.3451608, 13.656257]
}
}, {
"type": "Feature",
"properties": {
"description":"<strong style='color:DodgerBlue;'>รพ.ลาดกระบัง กรุงเทพมหานคร</strong>"
},
"geometry": {
"type": "Point",
"coordinates": [100.7839619, 13.7223801]
}
}, {
"type": "Feature",
"properties": {
"description":"<strong style='color:DodgerBlue;'>รพ.ตากสิน</strong>"
},
"geometry": {
"type": "Point",
"coordinates": [100.5085964, 13.7305097]
}
}, {
"type": "Feature",
"properties": {
"description":"<strong style='color:DodgerBlue;'>รพ.สิรินธร</strong>"
},
"geometry": {
"type": "Point",
"coordinates": [ 100.7057794, 13.7170142]
}
}, {
"type": "Feature",
"properties": {
"description":"<strong style='color:DodgerBlue;'>รพ.เจริญกรุงประชารักษ์</strong>"
},
"geometry": {
"type": "Point",
"coordinates": [100.4945226, 13.6943709]
}
}, {
"type": "Feature",
"properties": {
 "description":"<strong style='color:DodgerBlue;'>รพ.กลาง</strong>"
},
"geometry": {
"type": "Point",
"coordinates": [100.5091634, 13.746529]
}
}, {
"type": "Feature",
"properties": {
 "description":"<strong style='color:DodgerBlue;'>ศูนย์บริการสาธารณสุข 28 กรุงธนบุรี</strong>"
},
"geometry": {
"type": "Point",
"coordinates": [100.5006285, 13.7205081]
}
}, {
"type": "Feature",
"properties": {
 "description":"<strong style='color:DodgerBlue;'>คลินิกนิรนาม :  สภากาชาดไทย</strong><p><b style='color: #FF0000;'>สามารถทำการนัดหมายได้</b>"
},
"geometry": {
"type": "Point",
"coordinates": [100.5382722, 13.734508]
}
}]
}
},
"layout": {
"icon-image": "cat",
"icon-size": 0.5
}
});
 });
// When a click event occurs on a feature in the places layer, open a popup at the
// location of the feature, with description HTML from its properties.
map.on('click', 'places', function (e) {
var coordinates = e.features[0].geometry.coordinates.slice();
var description = e.features[0].properties.description;
 
// Ensure that if the map is zoomed out such that multiple
// copies of the feature are visible, the popup appears
// over the copy being pointed to.
while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
}
 
new mapboxgl.Popup()
.setLngLat(coordinates)
.setHTML(description)
.addTo(map);
});
 
// Change the cursor to a pointer when the mouse is over the places layer.
map.on('mouseenter', 'places', function () {
map.getCanvas().style.cursor = 'pointer';
});
 
// Change it back to a pointer when it leaves.
map.on('mouseleave', 'places', function () {
map.getCanvas().style.cursor = '';
});
});
 
</script>
<script>

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifNo').style.display = 'none';
    }
    else document.getElementById('ifNo').style.display = 'block';
  
    if (document.getElementById('noCheck').checked) {
        document.getElementById('ifyes').style.display = 'none';
    }
    else document.getElementById('ifyes').style.display = 'block';
}

function yesnoCheck2() {
    if (document.getElementById('noCheck1').checked) {
        document.getElementById('ifNo2').style.display = 'block';
     
    }
    else
    document.getElementById('ifNo2').style.display = 'none';
    
}
</script>

<script>
 function fncSubmit()
{
    var radio1 = document.agreeForm.yesCheck,
          radio2 = document.agreeForm.noCheck,
          
          radio10 = document.agreeForm.pins12a,
          radio11 = document.agreeForm.pins12b,
          radio12 = document.agreeForm.pins12c,
          radio13 = document.agreeForm.pins12d,
          radio14 = document.agreeForm.pins12e,
          radio15 = document.agreeForm.pins12f,
          radio16 = document.agreeForm.pins12g,
          radio17 = document.agreeForm.pins12h,
          radio18 = document.agreeForm.pins12i,
          radio19 = document.agreeForm.pins12j,
          
          radio3 = document.agreeForm.yesCheck1,
          radio4 = document.agreeForm.yesCheck2,
          radio5 = document.agreeForm.yesCheck3,
          radio6 = document.agreeForm.yesCheck4,
          radio7= document.agreeForm.noCheck1,
          textbox1 = document.agreeForm.knhiv_oth;
          
          
          
          

    if( radio1.checked==false && radio2.checked==false ){
        alert('โปรดเลือกคำตอบของท่าน.');
        return false;
         }else if(radio1.checked==true){
            if(radio10.checked==false && radio11.checked==false && radio12.checked==false && radio13.checked==false  && radio14.checked==false && radio15.checked==false   && radio16.checked==false   && radio17.checked==false   && radio18.checked==false   && radio19.checked==false){
            alert('โปรดเลือกสถานที่ ที่ท่านต้องการไปตรวจ');
              return false;
        }}else if(radio2.checked==true){
            if(radio3.checked==false && radio4.checked==false && radio5.checked==false && radio6.checked==false  && radio7.checked==false){
            alert('โปรดเลือกคำตอบของท่านว่าทำไม่ไม่ไปตรวจ');
              return false;
           }else if( radio7.checked==true && textbox1.value.length<=0 ){
            alert('โปรดระบุคำตอบของท่าน');
            return false;
        }}
        return true;
}
</script>
  </body>
</html>


