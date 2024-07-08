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
  	font-family: 'Chakra Petch', sans-serif;
  	color: #000000;
  	/* font-family: 'Sriracha', cursive;*/
  }
  /* ใช้เฉพาะหัวข้อ */
  h1, h2, h3, h4, h5, h6 {
  	font-family: 'Chakra Petch', sans-serif;
  	color: #000000;
  }
         
     /*//////////////////  checkmark /////////*/
	.containerins12 {

			position: relative;
			padding-left: 35px;
			margin-bottom: 12px;
			cursor: pointer;
			font-size: 22px;
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
			background-color: #8BE2E5;
		}

		/* When the checkbox is checked, add a blue background */
		.containerins12 input:checked ~ .checkmarkins12 {
			background-color: #2C8CF9;
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
  
  /*//////////////////  checkmark /////////*/
	.containerins123 {
			display: flex;
			position: relative;
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
		.containerins123 input {
			position: absolute;
			opacity: 0;
   
			cursor: pointer;
			height: 0;
			width: 0;
		}

		/* Create a custom checkbox */
		.checkmarkins123 {
			position: absolute;
			top: 0;
			left: 0;
			height: 25px;
			width: 25px;
   
			background-color: #fff;
			border-radius: 1px;
    border-style: solid;
    border-color: #000;
		}

		/* On mouse-over, add a grey background color */
		.containerins123:hover input ~ .checkmarkins123 {
			background-color: #000000;
		}

		/* When the checkbox is checked, add a blue background */
		.containerins123 input:checked ~ .checkmarkins123 {
			background-color: #000000;
		}

		/* Create the checkmark/indicator (hidden when not checked) */
		.checkmarkins123:after {
			content: "";
			position: absolute;
			display: none;
		}

		/* Show the checkmark when checked */
		.containerins123 input:checked ~ .checkmarkins123:after {
		display: block;
		}

		/* Style the checkmark/indicator */
		.containerins123 .checkmarkins123:after {
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

  .button.button-primary, .button.button-primary:focus {
  	margin-top: 1px;
  }
  /* ใช้ทั้งเว็บไซต์ */
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
         <div  id="printableArea">
          <h3 class="wow-outer" style="text-align: center;" ></h3><br>
          <div  class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #1370F2;">
                                   <h4 ><b>ใบยินยอมเข้าร่วมโครงการ “kainoi.net”</b></h4><br>
                                  <h4 style ="text-align: left;" ><b> วัตถุประสงค์ของโครงการ</b></h4>
                                  <p><h5>&nbsp;&nbsp;&nbsp;&nbsp;กระทรวงสาธารณสุขประเทศไทยร่วมกับศูนย์ความร่วมมือไทย-สหรัฐด้านสาธารณสุข
                                  ได้ดำเนินการนำร่องใช้รูปแบบสำรวจพฤติกรรมสุขภาพทางเพศผ่านเว็บแอพพลิเคชั่นในกลุ่มประชากรชายรักชาย
                                  ซึ่งโครงการนี้มีชื่อว่า“KAINOI SURVEY” การดำเนินงานนี้มีวัตถุประสงค์เพื่อศึกษาข้อดี ปัญหา หรืออุปสรรค
                                  ของการใช้รูปแบบดังกล่าวในการสำรวจพฤติกรรมสุขภาพทางเพศ และคาดประมาณจำนวนประชากรของกลุ่มชายรักชายในประเทศไทย</h5></p>
                                  </br>
                                  <h4 style ="text-align: left;" ><b> คุณเข้าร่วมโครงการได้อย่างไร</b></h4>
                                  <p><h5>&nbsp;&nbsp;&nbsp;&nbsp;หากคุณยินยอมเข้าร่วมโครงการด้วยความสมัครใจ
                                  ทางโครงการขอให้คุณลงทะเบียนโดยใช้หมายเลขโทรศัพท์ของคุณ เพื่อใช้ตอบแบบสอบถามผ่านเว็บแอปพลิเคชัน ซึ่งใช้เวลาในการตอบประมาณ 5 – 10 นาที
                                                                    คุณจะได้รับค่าชดเชยการตอบแบบสอบถามเป็นรหัสบัตรเงินสดทรูมันนี่มูลค่า 200 บาท ผ่าน SMS
                                                                   ตามเบอร์โทรศัพท์ที่คุณให้ไว้และทางโครงการขอให้คุณชวนเพื่อนของคุณเข้าร่วมโครงการนี้
                                  ซึ่งคุณจะได้รับค่าชดเชยสำหรับการชวนเพื่อนเป็นรหัสบัตรเงินสดทรูมันนี่มูลค่า 50 บาท ต่อการชวนเพื่อน 1 คน ผ่าน SMS
                                  ตามเบอร์โทรศัพท์ที่คุณให้ไว้ (ชวนเพื่อนได้ไม่เกิน 3 คน) เมื่อเพื่อนของคุณเข้าร่วมโครงการและทำการตอบแบบสอบถาม</h5></p>
                                  </br>
                                  <h4 style ="text-align: left;" ><b>การชวนเพื่อนเข้าร่วมโครงการ</b></h4>
                                   <p><h5>&nbsp;&nbsp;&nbsp;&nbsp;เมื่อจบการตอบแบบสอบถาม เราจะส่งรหัสผ่านระบบ SMS จำนวน 3 รหัส
                                   เพื่อให้คุณนำรหัสนี้ส่งไปให้เพื่อนที่เป็นชายรักชายที่คุณต้องการชวนให้เข้าร่วมโครงการ ระบบจะบันทึกรหัสทันทีเมื่อเพื่อนคุณได้นำมาเปิดใช้ในเว็บแอปพลิเคชัน
                                                                                              ดังนั้นจึงขอให้คุณแจกรหัสให้กับเพื่อนที่มีคุณสมบัติครบถ้วน</h5></p>
                                   
                                   <h4 style ="text-align: left;" ><b>ความเสี่ยงและการรักษาความลับ</b></h4>
                                   <p><h5>&nbsp;&nbsp;&nbsp;&nbsp;โครงการนี้จะไม่เก็บชื่อ นามสกุล หรือรหัสบัตรประชาชนเลย จะขอให้คุณระบุเพียงเบอร์โทรศัพท์เท่านั้น
                                   ซึ่งจะถูกแปลงเป็นรหัสเก็บไว้ในฐานข้อมูล และข้อมูลจากโครงการนี้จะถูกเก็บไว้ในฐานข้อมูลที่ปลอดภัย และจะไม่ถูกส่งออกไปยังบุคคลภายนอกโครงการ
                                   และการเข้าถึงข้อมูลจะมีผู้วิจัยหลัก ผู้ร่วมดำเนินงานวิจัย ผู้สนับสนุนทุนวิจัย และคณะกรรมการจริยธรรมการวิจัยเท่านั้นที่สามารถเข้าถึงข้อมูลได้
                                    <br>      และเมื่อครบ 2 ปี หลังจากที่ผลงานวิจัยได้เผยแพร่สู่สาธารณะแล้ว ข้อมูลทั้งหมดจะถูกทำลายโดยลบออกจากฐานข้อมูลทั้งหมด</h5></p>
                                   <p><h5>&nbsp;&nbsp;&nbsp;&nbsp;คำถามบางข้อเป็นคำถามที่กระทบความรู้สึก ดังนั้นเพื่อให้ความเสี่ยงด้านนี้ลดน้อยลง ผู้เข้าร่วมโครงการสามารถที่จะข้ามข้อคำถามนั้น ๆ ได้ </h5></p>
                                   
                                   <h4 style ="text-align: left;" ><b> ค่าใช้จ่ายจากการเข้าร่วมโครงการ</b></h4>
                                    <p><h5>&nbsp;&nbsp;&nbsp;&nbsp;คุณไม่ต้องเสียค่าใช้จ่ายอะไรเลย เราจะส่งรหัสบัตรเงินสดทรูมันนี่มูลค่า 200 บาทให้คุณทันทีผ่านระบบเมื่อคุณตอบแบบสอบถามผ่านเว็บไซต์ Kainoi.net
                                    และหากเพื่อนที่คุณชวนมีคุณสมบัติผ่านเกณฑ์เข้าร่วมโครงการและได้ตอบแบบสอบถาม <br> เราจะส่งรหัสบัตรเงินสดทรูมันนี่มูลค่า 50 บาท ต่อเพื่อนของคุณที่เข้าร่วมโครงการ 1 คน (ไม่เกิน 3 คน) </h5></p>
                                    <h4 style ="text-align: left;" ><b>การเข้าร่วมหรือออกจากโครงการ</b></h4>
                                       <p><h5>&nbsp;&nbsp;&nbsp;&nbsp;คุณสามารถเข้าร่วมโครงการหรือออกจากโครงการเมื่อใดก็ได้ขึ้นอยู่กับการตัดสินใจของคุณ แต่คุณสามารถเข้าร่วมโครงการได้แค่เพียง  1 ครั้งเท่านั้น</h5></p>
                                   <h4 style ="text-align: left;" ><b>ประโยชน์ที่จะได้รับจากการเข้าร่วมโครงการวิจัย</b></h4>
                                     <p><h5>&nbsp;&nbsp;&nbsp;&nbsp;การศึกษาวิจัยนี้ไม่ได้มีผลประโยชน์ต่อผู้เข้าร่วมโครงการโดยตรง แต่คำตอบของผู้เข้าร่วมโครงการจะช่วยให้ทีมผู้วิจัยทราบพฤติกรรมเสี่ยงต่อการติดเชื้อเอชไอวี
                                     และนำข้อมูลไปใช้ ในการวางแผนนโยบาย มาตรการ และการจัดบริการ ในการป้องกันควบคุมด้านเอชไอวีสำหรับกลุ่มชายที่มีเพศสัมพันธ์กับชายในประเทศไทยต่อไป
                                     และประเทศไทยจะมีทางเลือกในเข้าถึงกลุ่มตัวอย่างด้วยระบบออนไลน์ เป็นอีกหนึ่งทางเลือก ซึ่งสามารถใช้ในการดำเนินงานการเฝ้าระวังพฤติกรรมที่สัมพันธ์กับการติดเชื้อเอชไอวีและการติดเชื้อเอชไอวี (BBS)
                                     ในประชากรกลุ่มหลัก เช่น กลุ่มชายที่มีเพศสัมพันธ์ก้บชาย เป็นต้น เพื่อที่จะสามารถติดตามสถานการณ์ระบาดของเชื้อเอชไอวีและพฤติกรรมที่สัมพันธ์กับการติดเชื้อเอชไอวี ในประชากรกลุ่มประชากรที่เข้าถึงได้ยาก และครอบคลุมมากขึ้น
                                     ซึ่งเป็นการเพิ่มศักยภาพในการดำเนินงานโครงการป้องกันการติดเชื้อเอชไอวี</h5></p>
                                    <h4 style ="text-align: left;" ><b>การติดต่อโครงการ</b></h4>
                                    <p><h5>หากคุณมีข้อสงสัยหรือข้อเสนอแนะ สามารถติดต่อนายฐิติพงษ์ ยิ่งยง กองระบาดวิทยา <br>กรมควบคุมโรค กระทรวงสาธารณสุข ถ.ติวานนท์ ต.ตลาดขวัญ อ.เมือง จ.นนทบุรี 11000 เบอร์โทร 081-4543593</p>
                                     </br> </br>
                                    <p><b>หากได้รับการปฏิบัติที่ไม่เป็นธรรรมสามารถติดต่อได้ที่</b></h5></p>
                                    </br>
                                    <p><h5>&nbsp;&nbsp;&nbsp;&nbsp;คณะกรรมการจริยธรรมการวิจัย กรมควบคุมโรค <br>ที่อยู่ กรมควบคุมโรค ถ.ติวานนท์ ต.ตลาดขวัญ อ.เมือง จ.นนทบุรี 11000 โทร 02-5903149</h5></p>
                                  </br> </br>
                                  <p><h5>&nbsp;&nbsp;&nbsp;&nbsp;ก่อนที่จะเลือกยินยอมเข้าร่วมโครงการนี้ ข้าพเจ้าได้รับคำอธิบายจากผู้วิจัยถึงวัตถุประสงค์ของการวิจัย วิธีการวิจัย
                                                                    ความเสี่ยง หรือผลกระทบที่อาจเกิดขึ้นจากการวิจัย รวมทั้งประโยชน์ที่จะเกิดขึ้นจากการวิจัยอย่างละเอียด และมีความเข้าใจดีแล้ว</h5></p>
                                                  <br><br>
                        <div style="  padding-left: 15px; padding-top: 15px;  background: linear-gradient(-60deg, rgb(7, 151, 255) 0%, rgb(255, 254, 252) 0%, rgb(113, 201, 252) 100%);  border-radius: 6px ; border: 3px solid #000000;">
                        <center><label style="font-size: 16px; font-weight:bold;" class="containerins123">ข้าพเจ้าได้อ่านรายละเอียดของโครงการับทราบและเข้าใจขั้นตอนการเข้าร่วมโครงการอย่างละเอียดดีแล้ว
                                                     <input type="checkbox" id="ck1" name="ck1" value="1">
                                                     <span class="checkmarkins123"></span>
                        </label></center> 
                        </div>                      <br>
                                                 
                         <div class="sec-sub-title" id="ck2" style="display:none">
                                                     <h4><b>คุณยินยอมด้วยความสมัครใจ</b></h4>
                                            <div class="contact-form">

                                                   <label style="font-size: 16px; font-weight:bold;" class="containerins12">ยินยอมเข้าร่วมโครงการ
                                                     <input type="radio" id="acc_a" name="acc" value="1">
                                                     <span class="checkmarkins12"></span>
                                                    </label>
                                                  
                                                    <label style="font-size: 16px; font-weight:bold;" class="containerins12">ไม่ยินยอมเข้าร่วมโครงการ
                                                     <input type="radio" id="acc_b" name="acc" value="2">
                                                     <span class="checkmarkins12"></span>
                                                    </label>

                                            </div>
                                             <br>
                           <h5><b>คุณสามารถพิมพ์แบบยินยอมนี้ได้โดยกดปุ่ม</b></h5>
                             <a href="images/consent_kainoi.pdf" download="consent">
                               <button class="btn btn-danger">ดาวน์โหลดใบยินยอม!</button>
                             </a>
                           
                                                  <!-- <button class="btn btn-danger" onclick="document.getElementById('link').click()">ดาวน์โหลดใบยินยอม!</button>
                                                  <a id="link" href="images/consent_kainoi.pdf" download hidden></a>-->
                                                 
                         <br>
                                                       <br>
                                                        <div class="row">
                                                             
                                                                  <div  class="col-md-12" style="padding:0px;">
                                                                    <div id="ifNo1" style="display:none">
                                                                  <button  type="submit" id='submit' class="button button-primary btn-block s5" style="padding: 15px; font-size: 16px; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" onclick="window.location.href='joincode.php'">ถัดไป</button>
                                                                   </div>
                                                                  </div>
                                                                   <br>
                                                                  <div  class="col-md-12" style="padding:0px; " >
                                                                    <div id="ifNo2" style="display:none">
                                                                  <button type="submit"  id="submit" class="button button-primary btn-block s5"" style="padding: 15px; font-size: 16px;  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" onclick="window.location.href='formmessage06.php'">ยกเลิก</button>
                                                                  <!--<button type="button"  id=not_interest class="button button-primary btn-block s5"" style="padding: 15px; font-size: 15px;  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;" onclick="window.location.href='not_interestcode.php'">ไม่สนใจเข้าร่วมโครงการ</button>-->
                                                                   </div>
                                                                   </div>
                                                               
                                                        </div>
                                                    
                                                       <br>

                           <!--<div class="sec-title text-center">
                                                  <label>โปรดกด Enter เพื่อเข้าสู่กระบวนการต่อไป</label><br>
                                     <button type="button" name="button"  class="button button-primary button-winona wow fadeIn" onclick="window.location.href='joincode.php'">ต่อไป</button>
                                     <!--<button type="button" name="button"  class="button button-primary button-winona wow fadeIn" onclick="window.location.href='joincode.php'">ถัดไป</button>-->
                                <!--</div>-->
                          </div>
                        
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
   <script>
      function printDiv(printableArea) {
           var printContents = document.getElementById(printableArea).innerHTML;
           var originalContents = document.body.innerHTML;
      
           document.body.innerHTML = printContents;
      
           window.print();
      
           document.body.innerHTML = originalContents;
      }
      

        $("#ck1").click(function () {
            if ($(this).is(":checked")) {
             $("#ck2").show(); 
            } else {
             $("#ck2").hide();    
            }
        });
     
      $("#acc_a").click(function(){
      $("#ifNo2").hide();
      $("#ifNo1").show();
   });
      $("#acc_b").click(function(){
      $("#ifNo1").hide();
      $("#ifNo2").show();
   });
      
      
</script>
  </body>
</html>