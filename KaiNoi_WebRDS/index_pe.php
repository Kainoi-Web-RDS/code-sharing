<?php
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
/*$cookie_rds = "webrds_cookie";
if(isset($_COOKIE[$cookie_rds])) {
	
	}else{
setcookie($cookie_rds, "thailand2019", time() + 3600000, '/');
}*/

session_unset();
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
 /* @media only screen and (max-width: 320px) {
  .s5 {
    font-size: 12px;
  }
}
@media only screen and (min-width: 320px) {
  .s5 {
    font-size: 15px;
  }
  } */
 /*open alert*/
 .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
/*close alert*/
  .button.button-primary, .button.button-primary:focus {
  	margin-top: 1px;
  }
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

  .tabcontent {

  	padding: 100px 0px ;
  	height: 100%;
  }
  .row:after {
  	content: "";
  	display: table;
  	clear: both;
  	height: 100%;
  }

  .column-66 {
  	float: left;
  	width: 60%;
  	padding: 20px;
  }

  .column-33 {
  	float: left;
  	width: 40%;
  	padding: 20px;
  }

  .large-font {
  	font-size: 48px;
  }

  .xlarge-font {
  	font-size: 64px
  }

  .button {
  	border: none;
  	color: white;
  	padding: 14px 28px;
  	font-size: 16px;
  	cursor: pointer;
  	background-color: #4CAF50;
  }

  img {

  	height: auto;
  	max-width: 100%;
  }

  @media screen and (max-width: 1000px) {
  	.column-66,
  	.column-33 {
  		width: 100%;
  		text-align: center;
  	}
  	img {
  		margin: auto;
  	}
  }

  hr.new2 {
  	border-top: 1px solid;
  }


  .container_c {
  	border: 2px solid #000000;
  	background-color: #FFFFFF;
  	border-radius: 5px;
  	padding: 16px;
  	margin: 16px 0
  }

  .container_c:after {
  	content: "";
  	clear: both;
  	display: table;
  }

  .container_c img {
  	float: left;
  	margin-right: 20px;

  }

  .container_c span {
  	font-size: 20px;
  	margin-right: 15px;
  }

  @media (max-width: 500px) {
  	.container_c {
  		text-align: center;
  	}
  	.container_c img {
  		margin: auto;
  		float: none;
  		display: block;
  	}
  }


.topimg{
   		/*margin-top:95px;*/
}

.linenew{
	border: 1px solid #b2a18a;
	margin-left: 100px;
	margin-right: 100px;
	margin-top: 40px;
}

.scontent5{
	padding-left: 250px; padding-right: 250px;margin-top: 30px;
}

.scontentxt5{
	padding-left: 300px; padding-right: 300px;
}

@media only screen and (max-width: 992px) {
   .topimg{
   		margin-top:0px;
   }
}
@media only screen and (max-width: 500px) {
   .widthimg{
   		width:130px;  
	}
	#destimg{
		display: none;
	}
	#vdestop{
		display: none;
	}
}
@media only screen and (min-width: 500px) {
	#moimg{
		display: none;
	}
	#vphone{
		display: none;
	}
}
@media only screen and (max-width: 990px) {
	.scontent5{
		padding: 0px;
	}
	.scontentxt5{
		padding: 0px;
	}
	.btnmenu{
		color: #FFF;
	}
}

@media only screen and (max-width: 400px) {
	.imgbox{
		height: 170px;
	}
	.newsocials{
		margin-bottom: -5px;
		font-size: 12px;
	}
	.himgtop{
		padding-top: 25px;
	}
}

.containerimg {
  position: relative;
  width: 100%;
}

.containerimg img {
  width: 100%;
  height: auto;
}

.btninimg{
	position: absolute;
    color: #555;
    background: #ffffff;
    border-radius: 5px;
    left: 46%;
    margin-top: 26%;
    padding: 2px 10px;
    width: 28%;
    height: 6%;
    transform: skew(-10deg ,-6deg);
}


.btninimg:hover {
   border: 2px solid #FFF;

}

.btninimgmo{
	position: absolute;
    color: #555;
    background: #ffffff;
    border-radius: 5px;
    left: 46%;
    margin-top: 60%;
    padding: 2px 10px;
    width: 28%;
    height: 3.5%;
    transform: skew(-10deg ,-12deg);
}


.btninimgmo:hover {
   border: 2px solid #FFF;

}

@media only screen and (min-width: 500px) {
	.btninimg{
	    margin-top: 27%;
    	height: 4.1%;
	}
}

@media only screen and (min-width: 600px) {
	.btninimg{
	    margin-top: 27%;
    	height: 4.5%;
	}
}

@media only screen and (min-width: 700px) {
	.btninimg{
	    margin-top: 27%;
    	height: 5.2%;
	}
}

@media only screen and (min-width: 768px) {
	.btninimg{
	    margin-top: 27%;
	    height: 4.6%;
	}
}

@media only screen and (min-width: 880px) {
	.btninimg{
	    margin-top: 27%;
	    height: 5.2%;
	}
}

@media only screen and (min-width: 990px) {
	.btninimg{
	    margin-top: 27%;
	    height: 6.4%;
	}
}

@media only screen and (min-width: 993px) {
	.btninimg{
	    margin-top: 37%;
        height: 7%;
	}
}

@media only screen and (min-width: 1100px) {
	.btninimg{
	    margin-top: 36%;
        height: 8.7%;
	}
}

@media only screen and (min-width: 1200px) {
	.btninimg{
	    margin-top: 35%;
        height: 8.5%;
	}
}

@media only screen and (min-width: 1400px) {
	.btninimg{
	    margin-top: 34%;
        height: 8.8%;
	}
}

@media only screen and (min-width: 1700px) {
	.btninimg{
	    margin-top: 33%;
        height: 9.8%;
	}
}

@media only screen and (min-width: 2200px) {
	.btninimg{
	    margin-top: 32%;
        height: 11%;
	}
}

@keyframes border-pulsate {
    0%   { box-shadow: 0 4px 8px 0 #291902f0, 0 1px 3px 0 #FFF; }
    25%  { box-shadow: 0 4px 8px 0 #291902f0, 0 1px 7px 0 #FFF; }
    50%  { box-shadow: 0 4px 8px 0 #291902f0, 0 1px 15px 0 #FFF; }
    75%  { box-shadow: 0 4px 8px 0 #291902f0, 0 1px 25px 0 #FFF; }
    100% { box-shadow: 0 4px 8px 0 #291902f0, 0 1px 30px 0 #FFF; }
}

.abtnanimate{
 background-image: url('images/Picture12.gif');
 background-repeat: no-repeat; 
 background-size: contain;
 animation: border-pulsate 1s infinite;
}
</style>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,400,500,700">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@400;500;700&display=swap" rel="stylesheet">

</head>
<body>
	<div class="page">

		<header class="section page-header" style="position: relative">
			<!-- RD Navbar-->
			<div class="rd-navbar-wrap rd-navbar">
				<nav class="rd-navbar rd-navbar-thin" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-fixed" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
					<div class="rd-navbar-main-outer" style="background-color: #FFFFFF;">

						<button class="rd-navbar-collapse-toggle rd-navbar-fixed-element-2" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></button>

						<button style="right: 10px;" class="rd-navbar-collapse-toggle rd-navbar-fixed-element-2" data-rd-navbar-toggle="#rd-navbar-nav-wrap-1, #rd-navbar-hidden-1">
							<!--Menu-->
							
						</button>

						<div class="rd-navbar-main">
							<!-- RD Navbar Panel-->
							<div class="rd-navbar-panel">
                <div style ="font-size: large; background-color :#ffffff; border-style: groove; border-color: #F49A3A;opacity: 5; border-radius: 10px; "><a style="color: #212529;" href="#section_background">&nbsp;&nbsp;kainoi.net คืออะไร&nbsp;&nbsp;</a></div>
								<img style="margin: inherit;" class="widthimg" src="images/logo-default-398x45.gif" alt="" width="199" height="22"/>
								<!-- RD Navbar Toggle-->
								
								<!-- RD Navbar Brand-->
								<div class="rd-navbar-block" id="rd-navbar-hidden-1">
									<div class="rd-navbar-collapse">
										<ul class="list-inline-bordered rd-navbar-list">
											<li><span class="icon mdi mdi-comment-text-outline"></span><a href="contacts.php">ติดต่อเรา</a></li>
											<li><span class="icon mdi mdi-cellphone-android"></span><a href="tel:0922760584">0922760584</a></li>
										</ul>
									</div>
									<!-- <button class="rd-navbar-search-toggle" data-rd-navbar-toggle="#rd-navbar-search-1"><span></span></button> -->
								</div>
							</div>

							<div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap-1">
								<!-- RD Navbar Brand--><a class="rd-navbar-brand" href="index.php"><img  src="images/logo-default-398x45.gif" alt="" width="199" height="22"/></a>
								<!-- RD Navbar Nav-->
								<ul class="rd-navbar-nav">
									<li class="rd-nav-item active"><a class="rd-nav-link" href="#home">หนัาหลัก</a>
									</li>
									<li class="rd-nav-item"><a class="rd-nav-link" href="#section_background">Kainoi.net คืออะไร </a>
									</li>
									<li class="rd-nav-item"><a class="rd-nav-link" href="#team">5  สิ่งห้ามพลาดใน kainoi.net</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</header>

	<!-- Modal ปิดปรับปรุง server --> 
	<!--  <div class="modal fade" id="myModalclose" role="dialog" class="modal hide fade in" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog"  style=" width: 300px; height: 600px;" >
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><center> <h4><p><b>ขออภัย</p></b></h4></center>
											<img class="img-responsive himgtop" src="images/fav_kainoi-xl.gif" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> </h4>
										
        </div>
        <div class="modal-body">
									
									<img class="img-responsive himgtop" src="images/p1.png" alt="" style=" width: 300px; height: 250px; border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
								
         <center> <h4><p><b>ปิดปรับปรุงเว็บไซต์ชั่วคราว</p></b></h4></center>
										
									 <p></p>
        </div>
        <div class="modal-footer">
      
							
        </div>
      </div>
      
    </div>
  </div>--> 
	<!-- Modal ปิดปรับปรุง server --> 

			<section id="home" class="section" >
			<div id="destimg">
				<!--<div class="alert">
					<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
						<span  style="   font-size: 20px; color :#FFFFFF; text-shadow: 1px 1px 2px black;white-space: pre;font-weight: bold;">!&nbsp;&nbsp;ทดสอบระบบ รับอาสาสมัคร 10 คน เท่านั้น.</span>
				</div>-->
				<?php
				  if ($conn_rds->connect_error) {
                        die("Connection failed: " . $conn_rds->connect_error);
                    }
                    
                                                                    $sql = "SELECT ISSEED FROM tbanswer where ISSEED = 'peer'";
                                                                    $result = $conn_rds->query($sql);
                                                                    $num_rows = mysqli_num_rows($result);
                                                                    $row = $result->fetch_assoc();
                                                                    
                                                                    
                                        If($num_rows < 3000)
                                        {
																				 echo 	"<a href='getcode.php'><img class='topimg' src='images/3368748-1-8.gif' style='width:100%;height: auto;'>";
																				}
																				else
																				{
																				 echo 	"<a href='formmessage06.php'><img class='topimg' src='images/3368748-1-8.gif' style='width:100%;height: auto;'>";
																				}
				?>
				

				<!--<a href="getcode.php"><img class="topimg" src="images/3368748-1-8.gif" style="width:100%;height: auto;">
				
			เบอร์โทรศัพท์ใช้ในโครงการได้เพียง1ครั้ง เท่านั้น หากไม่ผ่านการคัดกรองของระบบ ก็ไม่สามารถเข้าร่วมโครงการได้อีก
						</a>-->
			</div>
			
			<div id="moimg">
					<div class="alert">
						<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
							<span  style="   font-size: 14px; color :#FFFFFF; text-shadow: 1px 1px 2px black;white-space: pre;font-weight: bold;">!&nbsp;&nbsp;ทดสอบระบบ รับอาสาสมัคร 10 คน เท่านั้น.</span>
					</div>
				<?php
				  if ($conn_rds->connect_error) {
                        die("Connection failed: " . $conn_rds->connect_error);
                    }
                    
                                                                    $sql = "SELECT ISSEED FROM tbanswer where ISSEED = 'peer'";
                                                                    $result = $conn_rds->query($sql);
                                                                    $num_rows = mysqli_num_rows($result);
                                                                    $row = $result->fetch_assoc();
                                                                    
                                                                    
                                        If($num_rows < 3000)
                                        {
																				 echo 	"<a href='getcode.php'><img  src='images/3368748-1-square-8.gif' style='width:100%;height: auto;'>";
																				}
																				else
																				{
																				 echo 	"<a href='formmessage06.php'><img src='images/3368748-1-square-8.gif' style='width:100%;height: auto;'>";
																				}
				?>
			
		
 
			
					<!--<a href="getcode.php"><img class="topimg" src="images/3368748-1-square-8.gif" style="width:100%;height: auto;">
			
				</a> -->
			</div>
		</section>
    <section id="section_background" class="section section-lg text-center" style="background-image: url(images/20895.jpg); background-repeat: repeat-y; padding: 22px 0px 5px; ">
        <div class="container">
           <span class="text-width-1 wow slideInDown">
                <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #000000; opacity: 5; border-radius: 10px;">
                 <h3 style="text-align: center;  border-style: dotted; border-color: #F49A3A;opacity: 5; border-radius: 10px;">Kainoi.net คืออะไร </h3><br>
                 <h4 style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kainoi.net คือโครงการสำรวจพฤติกรรมสุขภาพทางเพศผ่านเว็บไซต์ในกลุ่มชายรักชาย ดำเนินโครงการโดย กรมควบคุมโรค กระทรวงสาธารณสุขร่วมกับศูนย์ความร่วมมือไทย-สหรัฐด้านสาธารณสุข
                 โดยโครงการนี้มีวัตถุประสงค์เพื่อศึกษาความเป็นไปได้ในการสำรวจพฤติกรรมสุขภาพทางเพศ แบบเครือข่ายผ่านเว็บแอพพลิเคชั่น </h4>     
              </div>
          </span>
        </div>
      </section>
     <!-- section_inprocess-->
     <section id="section_inprocess" class="section section-lg text-center" style="background-image: url(images/20895.jpg); background-repeat: repeat-y; padding: 22px 0px 5px;">
        <div class="container">
           <span class="text-width-1 wow slideInDown">
                 <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #000000; opacity: 5; border-radius: 10px;">
                 <h3 style="text-align: center;  border-style: dotted; border-color: #F49A3A;opacity: 5; border-radius: 10px;">ขั้นตอนในการเข้าร่วมโครงการ</h3><br>
                 <ul>
								 <li style="text-align: left;"> <h4><font color='#000000'>1.	ผู้ที่จะเข้าร่วมโครงการจะต้องได้รับรหัสชักชวนจากเพื่อนถึงจะสามารถเข้าร่วมโครงการได้</font></h4></li>
								 <li style="text-align: left;"> <h4><font color='#000000'>2.	นำรหัสมาลงทะเบียนหน้าเว็บไซต์ พร้อมทั้งกรอกเบอร์โทรศัพท์เพื่อยืนยันตัวตน</font></h4></li>
								 <li style="text-align: left;"> <h4><font color='#000000'>3.	คัดกรองคุณสมบัติผ่านเว็บไซต์</font></h4></li>
								 <li style="text-align: left;"> <h4><font color='#000000'>4.	ตอบแบบสอบถาม </font></h4></li>
								 <li style="text-align: left;"> <h4><font color='#000000'>5.	รับรหัสผ่าน SMS เพื่อนำไปแจกเพื่อนมาเข้าโครงการต่อไป</font></li>
								 </ul>
              </div>
           </span>  
        </div>
      </section>
     <!-- section_risk-->
        <section  id="section_risk" class="section section-lg text-center" style="background-image: url(images/20895.jpg); background-repeat: repeat-y; padding: 22px 0px 5px;">
        <div class="container">
           <span class="text-width-1 wow slideInDown">
               <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #000000; opacity: 5; border-radius: 10px;">
                 <h3 style="text-align: center;  border-style: dotted; border-color: #F49A3A;opacity: 5; border-radius: 10px;">ความเสี่ยงและการรักษาความลับ</h3><br>
               <h4 style="text-align: justify;"><font color='#000000'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เราจะไม่เก็บชื่อ นามสกุล หรือรหัสบัตรประชาชนเลย แต่จะขอให้คุณระบุเพียงเบอร์โทรศัพท์เท่านั้น ซึ่งจะถูกแปลงเป็นรหัสเก็บไว้ในฐานข้อมูล และข้อมูลจากโครงการนี้จะถูกเก็บไว้ในฐานข้อมูลที่ปลอดภัย และจะไม่ถูกส่งออกไปยังบุคคลภายนอกโครงการ <br>ในการตอบแบบสอบถาม หากผู้เข้าร่วมโครงการรู้สึกไม่สบายใจหรือไม่อยากตอบในข้อคำถามนั้น ๆ ผู้เข้าร่วมโครงการสามารถข้ามข้อคำถามนั้น ๆ ได้</font></h4>
            
            </div>
          </span>
        </div>
      </section>
     <!-- section_benefit-->
      <section  id="section_benefit" class="section section-lg text-center" style="background-image: url(images/20895.jpg); background-repeat: repeat-y; padding: 22px 0px 5px;">
        <div class="container">
         <span class="text-width-1 wow slideInDown">
                <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #000000; opacity: 5; border-radius: 10px;">
                 <h3 style="text-align: center;  border-style: dotted; border-color: #F49A3A;opacity: 5; border-radius: 10px;">ค่าใช้จ่ายจากการเข้าร่วมโครงการ
</h3><br>
                 <h4 style="text-align: justify;"><font color='#000000'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คุณไม่ต้องเสียค่าใช้จ่ายอะไรเลย เราจะส่งรหัสบัตรเงินสดทรูมันนี่มูลค่า 200 บาทให้คุณภายใน 7วัน ผ่านระบบเมื่อคุณตอบแบบสอบถามผ่านเว็บไซต์ Kainoi.net และหากเพื่อนที่คุณชวนมีคุณสมบัติผ่านเกณฑ์เข้าร่วมโครงการและได้ตอบแบบสอบถาม เราจะส่งรหัสบัตรเงินสดทรูมันนี่มูลค่า 50 บาท ต่อเพื่อนของคุณที่เข้าร่วมโครงการ 1 คน (ชวนเพื่อนได้ไม่เกิน 3 คน และระบบจะส่งรหัสเงินสดทรูมันนี่หลังจากที่คุณเข้าร่วมโครงการแล้ว 2 สัปดาห์)  </font> </h4>
                         
              </div>
          </span>
        </div>
      </section>
     <!-- section_noenforce-->
      <section id="section_noenforce" class="section section-lg text-center" style="background-image: url(images/20895.jpg); background-repeat: repeat-y; padding: 22px 0px 5px;">
        <div class="container">
          <span class="text-width-1 wow slideInDown">
               <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #000000; opacity: 5; border-radius: 10px;">
                 <h3 style="text-align: center;  border-style: dotted; border-color: #F49A3A;opacity: 5; border-radius: 10px;">การเข้าร่วมหรือออกจากโครงการ</h3><br>
                <h4 style="text-align: justify;"><font color='#000000'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คุณสามารถเข้าร่วมโครงการหรือออกจากโครงการเมื่อใดก็ได้ขึ้นอยู่กับการตัดสินใจของคุณแต่คุณมีสิทธิเข้าร่วมโครงการได้แค่เพียง  1 ครั้งเท่านั้น</font><br> </h4>
             </div>
          </span>
        </div>
      </section>
		<hr>

		<section id="team" class="page-section">
			<div class="container">
				<div class="heading text-center" style="margin-top: 50px;margin-bottom: 30px;"> 
					<!-- Heading -->
					<h3><b>5  สิ่งห้ามพลาดใน kainoi.net</b></h3>
				</div>
				<!-- Team Member's Details -->
				<div class="team-content" id="vdestop">
					<div class="row">
						<!--  ---------------------------->
						    <div class="col-lg-3 col-sm-6 col-xs-6" style="width: 50%;"> 
								<div class="team-member pDark"> 
									<div class="member-img imgbox"style ="background-color :#ffffff; border-style: groove; border-color: #c6c6c6;opacity: 5; border-radius: 20px;">
										<!-- Image  --> 
										<img class="img-responsive himgtop" src="images/p9new.png" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
									</div>

										<div class="team-socials newsocials"style="padding-left: 20px; padding-right: 20px;  font-size: 22px; "><p style="background-color: #ffffff; border-radius: 5px; padding: 3px 3px;">
										1. ถ้าคุณมีคุณสมบัติครบ<br>
										คุณก็สามารถ<br>
										เข้าร่วมโครงการ<br>
										กับพวกเราได้เลยครับ</p>
										</div>

										<h3 style="text-align: center;margin-top: 15px;">ตรวจสอบ</h3>

								</div>
							</div>
							<!--  ---------------------------->
							<div class="col-lg-3 col-sm-6 col-xs-6" style="width: 50%;"> 
								<!-- Team Member -->
								<div class="team-member pDark"> 
									<!-- Image Hover Block -->
									<div class="member-img imgbox" style ="font-size:24px; background-color :#ffffff; border-style: groove; border-color: #c6c6c6;opacity: 5; border-radius: 20px;">
										<!-- Image  --> 
										<img class="img-responsive himgtop" src="images/p6new.png" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
									</div>
									<div class="team-socials newsocials"style="padding-left: 20px; padding-right: 20px; font-size: 22px;  "><p style="background-color: #ffffff; border-radius: 5px; padding: 3px 3px;">
									2.ตอบแบบสอบถามของเรา<br>
									ให้เรียบร้อย</p>
									</div>
									<h3 style="text-align: center;margin-top: 15px;">พร้อมลุย</h3>
								</div>
							</div>
							<!--  ---------------------------->
							<div class="col-lg-3 col-sm-6 col-xs-6" style="width: 50%;"> 
								<!-- Team Member -->
								<div class="team-member pDark"> 
									<!-- Image Hover Block -->
									<div class="member-img imgbox" style ="background-color :#ffffff; border-style: groove; border-color: #c6c6c6;opacity: 5; border-radius: 20px;">
										<!-- Image  --> 
										<img class="img-responsive himgtop" src="images/p8new.png" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
									</div>
									<div class="team-socials newsocials"style="padding-left: 20px; padding-right: 20px; font-size: 22px;  "><p style="background-color: #ffffff; border-radius: 5px; padding: 3px 3px;">
									3.รับรหัสบัตรเงินสด<br>
				  				<span style="color: red;font-weight: bold;">True Money 200</span><br>
									ไปเลย<br>
									เมื่อตอบแบบสอบถามเรียบร้อย</p>
									</div>
									<h3 style="text-align: center;margin-top: 15px;">รางวัล</h3>
								</div>
							</div>
							<!--  ---------------------------->
							<div class="col-lg-3 col-sm-6 col-xs-6" style="width: 50%;"> 
									<!-- Team Member -->
									<div class="team-member pDark"> 
										<!-- Image Hover Block -->
										<div class="member-img imgbox" style ="background-color :#ffffff; border-style: groove; border-color: #c6c6c6;opacity: 5; border-radius: 20px;">
											<!-- Image  --> 
											<img class="img-responsive himgtop" src="images/p4new.png" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
										</div>
										<div class="team-socials newsocials"style="padding-left: 20px; padding-right: 20px; font-size: 22px; "><p style="background-color: #ffffff; border-radius: 5px; padding: 3px 3px;">
										4.ส่งรหัสใน sms ให้เพื่อน<br>
										ทางออนไลน์หรือออฟไลน์</p>
										</div>
											<h3 style="text-align: center;margin-top: 15px;">ส่งต่อ</h3>
									</div>
							</div>	
							<!--  ---------------------------->				
							<div class="col-md-12 col-sm-12 col-xs-12"> 
								<!-- Team Member -->
								<div class="team-member pDark scontent5"> 
									<!-- Image Hover Block -->
									<div class="member-img imgbox" style ="background-color :#ffffff; border-style: groove; border-color: #c6c6c6;opacity: 5; border-radius: 20px;">
										<!-- Image  --> 
										<img class="img-responsive himgtop" src="images/t8.png" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
										<div class="team-socials" style="margin-bottom: -70px;padding: 5px;"> 
											<p style="background-color: #ffffff; border-radius: 5px; padding: 3px 3px; font-size: 22px; ">
												5.เพื่อนนำรหัสมาเข้าโครงการ<br>
												มีคุณสมบัติครบ <br>
												ตอบแบบสอบถามเรียบร้อย<br>
												<span style="color: red;font-weight: bold;">true money 50 บาท</span>&nbsp;ทันที<br>
												เพื่อนได้ &nbsp;<span style="color: red;font-weight: bold;">200 บาท</span>&nbsp;ทันที</p>
										</div>
									</div>									
										<h3 style="text-align: center;margin-top: 15px;">รางวัลสองชั้น</h3>
								</div>
							</div>

					</div>
				</div>

				<div class="team-content" id="vphone">
					<div class="row">
						<!--  ---------------------------->
						    <div class="col-lg-3 col-sm-6 col-xs-6" style="width: 50%;"> 
								<div class="team-member pDark" id="gyline1"> 
									<div class="member-img "style ="background-color :#ffffff; border-style: groove; border-color: #c6c6c6;opacity: 5; border-radius: 20px;">
										<!-- Image  --> 
										<img class="img-responsive " src="images/p9new.png" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
									</div>
										<h3 style="text-align: center;margin-top: 15px;">ตรวจสอบ</h3>
								</div>
							</div>
							<!--  ---------------------------->
							<div class="col-lg-3 col-sm-6 col-xs-6" style="width: 50%;"> 
								<!-- Team Member -->
								<div class="team-member pDark" id="gyline2"> 
									<!-- Image Hover Block -->
									<div class="member-img " style ="font-size:24px; background-color :#ffffff; border-style: groove; border-color: #c6c6c6;opacity: 5; border-radius: 20px;">
										<!-- Image  --> 
										<img class="img-responsive " src="images/p6new.png" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
									</div>
									<h3 style="text-align: center;margin-top: 15px;">พร้อมลุย</h3>
								</div>
							</div>
							<!--  ---------------------------->
							<div class="col-lg-3 col-sm-6 col-xs-6" style="width: 50%;"> 
								<!-- Team Member -->
								<div class="team-member pDark" id="gyline3"> 
									<!-- Image Hover Block -->
									<div class="member-img " style ="background-color :#ffffff; border-style: groove; border-color: #c6c6c6;opacity: 5; border-radius: 20px;">
										<!-- Image  --> 
										<img class="img-responsive " src="images/p8new.png" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
									</div>
									<h3 style="text-align: center;margin-top: 15px;">รางวัล</h3>
								</div>
							</div>
							<!--  ---------------------------->
							<div class="col-lg-3 col-sm-6 col-xs-6" style="width: 50%;"> 
									<!-- Team Member -->
									<div class="team-member pDark" id="gyline4"> 
										<!-- Image Hover Block -->
										<div class="member-img " style ="background-color :#ffffff; border-style: groove; border-color: #c6c6c6;opacity: 5; border-radius: 20px;">
											<!-- Image  --> 
											<img class="img-responsive " src="images/p4new.png" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
										</div>
											<h3 style="text-align: center;margin-top: 15px;">ส่งต่อ</h3>
									</div>
							</div>	
							<!--  ---------------------------->				
							<div class="col-md-12 col-sm-12 col-xs-12"> 
								<!-- Team Member -->
								<div class="team-member pDark scontent5" id="gyline5"> 
									<!-- Image Hover Block -->
									<div class="member-img " style ="background-color :#ffffff; border-style: groove; border-color: #c6c6c6;opacity: 5; border-radius: 20px;">
										<!-- Image  --> 
										<img class="img-responsive " src="images/t8.png" alt="" style="border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
									</div>									
										<h3 style="text-align: center;margin-top: 15px;">รางวัลสองชั้น</h3>
								</div>
							</div>

					</div>
				</div>

			</div>
		</section>
	</div>


				<hr class="linenew" style="  margin-left: 0;  margin-right: 0;">
				<!-- Page Footer-->
				<footer class="section footer-minimal">
					<div class="container"> 
						<div class="footer-minimal-inner"><a class="brand" href="index.php"><img src="images/logo-light-398x45.gif" alt="" width="199" height="22"/></a>
							<!-- Rights-->
							<p class="left"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights Reserved. Design by kainoi.net</a></p>
						</div>
					</div>
				</footer>

			

			<div class="preloader"> 
				<div class="preloader-logo"><img src="images/logo-light-398x45.gif" alt="" width="199" height="22"/>
				</div>
				<div class="preloader-body">
					<div id="loadingProgressG">
						<div class="loadingProgressG" id="loadingProgressG_1"></div>
					</div>
				</div>
			</div>


			 <!-- Modal -->
			  <div class="modal fade" id="myModal1" role="dialog">
			    <div class="modal-dialog" style=" margin: 0; width: 100%; margin-top: 30%; ">		    
			      <!-- Modal content-->
			      <div class="modal-content" style="height: unset;">
			        <div class="modal-header" style="border-bottom: 1px solid #ffffff;height: 0px;margin-bottom: 10px;">
			          <img style="margin: inherit;" class="widthimg" src="images/logo-default-398x45.gif" alt="" width="100"/>
			          <button type="button" class="close" data-dismiss="modal" style="padding: 0px 6px;">&times;</button>
			        </div>
			        <div class="modal-body">
			          <h3 style="text-align: center;">
									ถ้าคุณมีคุณสมบัติครบ<br>
									คุณก็สามารถเข้าร่วมโครงการ<br>
									กับพวกเราได้เลยครับ</h3>
			        </div>
			      </div>
			    </div>
			  </div>

			  <div class="modal fade" id="myModal2" role="dialog">
			    <div class="modal-dialog" style=" margin: 0; width: 100%; margin-top: 30%; ">		    
			      <!-- Modal content-->
			      <div class="modal-content" style="height: unset;">
			        <div class="modal-header" style="border-bottom: 1px solid #ffffff;height: 0px;margin-bottom: 10px;">
			          <img style="margin: inherit;" class="widthimg" src="images/logo-default-398x45.gif" alt="" width="100"/>
			          <button type="button" class="close" data-dismiss="modal" style="padding: 0px 6px;">&times;</button>
			        </div>
			        <div class="modal-body">
			          <h3 style="text-align: center;">
									ตอบแบบสอบถามของเรา<br>
									ให้เรียบร้อย</h3>
			        </div>
			      </div>
			    </div>
			  </div>

			  <div class="modal fade" id="myModal3" role="dialog">
			    <div class="modal-dialog" style=" margin: 0; width: 100%; margin-top: 30%; ">		    
			      <!-- Modal content-->
			      <div class="modal-content" style="height: unset;">
			        <div class="modal-header" style="border-bottom: 1px solid #ffffff;height: 0px;margin-bottom: 10px;">
			          <img style="margin: inherit;" class="widthimg" src="images/logo-default-398x45.gif" alt="" width="100"/>
			          <button type="button" class="close" data-dismiss="modal" style="padding: 0px 6px;">&times;</button>
			        </div>
			        <div class="modal-body">
			          <h3 style="text-align: center;">
									รับรหัสบัตรเงินสด <br>
									<font color="red" ><b>True Money 200 บาท</b></font>ไปเลย<br>
									เมื่อตอบแบบสอบถามเรียบร้อย</h3>
			        </div>
			      </div>
			    </div>
			  </div>

			  <div class="modal fade" id="myModal4" role="dialog">
			    <div class="modal-dialog" style=" margin: 0; width: 100%; margin-top: 30%; ">		    
			      <!-- Modal content-->
			      <div class="modal-content" style="height: unset;">
			        <div class="modal-header" style="border-bottom: 1px solid #ffffff;height: 0px;margin-bottom: 10px;">
			          <img style="margin: inherit;" class="widthimg" src="images/logo-default-398x45.gif" alt="" width="100"/>
			          <button type="button" class="close" data-dismiss="modal" style="padding: 0px 6px;">&times;</button>
			        </div>
			        <div class="modal-body">
			          <h3 style="text-align: center;">
									ส่งรหัสใน sms <br>
									ให้เพื่อนทางออนไลน์<br>
									หรือออฟไลน์</h3>
			        </div>
			      </div>
			    </div>
			  </div>

			  <div class="modal fade" id="myModal5" role="dialog">
			    <div class="modal-dialog" style=" margin: 0; width: 100%; margin-top: 30%; ">		    
			      <!-- Modal content-->
			      <div class="modal-content" style="height: unset;">
			        <div class="modal-header" style="border-bottom: 1px solid #ffffff;height: 0px;margin-bottom: 10px;">
			          <img style="margin: inherit;" class="widthimg" src="images/logo-default-398x45.gif" alt="" width="100"/>
			          <button type="button" class="close" data-dismiss="modal" style="padding: 0px 6px;">&times;</button>
			        </div>
			        <div class="modal-body">
			          <h3 style="text-align: center;">
									เพื่อนนำรหัสมาเข้าโครงการ<br>
									มีคุณสมบัติครบ <br>
									ตอบแบบสอบถามเรียบร้อย <br>
									เราได้บัตรเงินสด&nbsp;<br>
									<font color="red"><b>true money 50 บาท</b></font>&nbsp;ภายใน 14วัน <br>
									เพื่อนได้ &nbsp;<font color="red" ><b>200 บาท</b></font>&nbsp;ภายใน 14วัน</h3>
			        </div>
			      </div>
			    </div>
			  </div>




			<!-- Global Mailform Output-->
			<div class="snackbars" id="form-output-global"></div>
			<!-- Javascript-->
			<script src="js/core.min.js"></script>
			<script src="js/script.js"></script>

			<script type="text/javascript"> //ปิด ปรับปรุง
								$(window).load(function()
				{
								$('#myModalclose').modal('show');
				});
				</script>
			<script type="text/javascript">
				$( "#gyline1" ).click(function() {
				   $("#myModal1").modal();
				});
				$( "#gyline2" ).click(function() {
				   $("#myModal2").modal();
				});
				$( "#gyline3" ).click(function() {
				   $("#myModal3").modal();
				});
				$( "#gyline4" ).click(function() {
				   $("#myModal4").modal();
				});
				$( "#gyline5" ).click(function() {
				   $("#myModal5").modal();
				});
			</script>
	</body>
	</html>