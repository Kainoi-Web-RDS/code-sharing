<?php
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
/*
$cookie_rds = "webrds_cookie";
setcookie($cookie_rds, "thailand2019", time() + 3600000, '/');

session_unset();*/
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
:root {
  /*--container-bg-color: #333;*/
  --left-bg-color: rgba(192, 90, 0, 0.8);
  --left-button-hover-color: rgba(161, 11, 11, 0.3);
  --right-bg-color: rgba(8, 24, 43, 0.81);
  --right-button-hover-color: rgba(92, 92, 92, 0.3);
  --hover-width: 75%;
  --other-width: 25%;
  --speed: 1000ms;
}

html, body {
  padding:0;
  margin:0;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  width: 100%;
  height: 100%;
  overflow-x: hidden;
}

h3{
  font-size: 4rem;
  color: #fff;
  position: absolute;
  left: 50%;
  top: 35%;
  transform: translateX(-50%);
  white-space: nowrap;
  padding-left: 5%;
  padding-right: 5%;
	/*padding-top: 100px;*/
	background-color :#ffffff;
	border-style: groove;
	border-color: #0093FC;
	opacity: 5;
	border-radius: 15px;
}


/* Style the rainbow text element. */
.rainbow-text {
  /* Create a conic gradient. */
  /* Double percentages to avoid blur (#000 10%, #fff 10%, #fff 20%, ...). */
  background: #CA4246;
  background-color: #CA4246;
  background: conic-gradient(
    #CA4246 16.666%, 
    #E16541 16.666%, 
    #E16541 33.333%, 
    #F18F43 33.333%, 
    #F18F43 50%, 
    #8B9862 50%, 
    #8B9862 66.666%, 
    #476098 66.666%, 
    #476098 83.333%, 
    #A7489B 83.333%);
  
  /* Set thee background size and repeat properties. */
  background-size: 57%;
  background-repeat: repeat;
  
  /* Use the text as a mask for the background. */
  /* This will show the gradient as a text color rather than element bg. */
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent; 
  
  /* Animate the text when loading the element. */
  /* This animates it on page load and when hovering out. */
  animation: rainbow-text-animation-rev 0.5s ease forwards;

  cursor: pointer;
}

/* Add animation on hover. */
.rainbow-text:hover {
  animation: rainbow-text-animation 0.5s ease forwards;
}

/* Move the background and make it larger. */
/* Animation shown when hovering over the text. */
@keyframes rainbow-text-animation {
  0% {
    background-size: 57%;
    background-position: 0 0;
  }
  20% {
    background-size: 57%;
    background-position: 0 1em;
  }
  100% {
    background-size: 300%;
    background-position: -9em 1em;
  }
}

/* Move the background and make it smaller. */
/* Animation shown when entering the page and after the hover animation. */
@keyframes rainbow-text-animation-rev {
  0% {
    background-size: 300%;
    background-position: -9em 1em;
  }
  20% {
    background-size: 57%;
    background-position: 0 1em;
  }
  100% {
    background-size: 57%;
    background-position: 0 0;
  }
}

.img1{
  position: absolute;
  left: 50%;
  top: 10%;
  transform: translateX(-50%);
  white-space: nowrap;
		border-style: groove;
		border-color: #0093FC;
		border-radius: 50%;
}

.buttont {
  display: block;
  position: absolute;
  left: 50%;
  top: 55%;
  /*height: 2.5rem;*/
	margin-top: 7%;
  padding: 15px 15px 15px 15px;
  width: 15rem;
  text-align: center;
  color: #fff;
  border: #fff solid 0.2rem;
	border-radius: 90%;
		opacity: 5px;
  font-size: 15;
  font-weight: bold;
  text-transform: uppercase;
  text-decoration: none;
  transform: translateX(-50%);
}

.split.left .button:hover {
  background-color: var(--left-button-hover-color);
  border-color: var(--left-button-hover-color);
}

.split.right .button:hover {
  background-color: var(--right-button-hover-color);
  border-color: var(--right-button-hover-color);
}

.container {
  position: relative;
  width: 100%;
  height: 100%;
  background: var(--container-bg-color);
}

.split {
  position: absolute;
  width: 50%;
  height: 100%;
  overflow: hidden;
}

.split.left {
  left:0;
  background: url('images/20895.jpg') center center no-repeat;
  background-size: cover;
}

.split.left:before {
  position:absolute;
  content: "";
  width: 100%;
  height: 100%;
  background: var(--left-bg-color);
}

.split.right {
  right:0;
  background: url('images/20896-r.jpg') center center no-repeat;
  background-size: cover;
}

.split.right:before {
  position:absolute;
  content: "";
  width: 100%;
  height: 100%;
  background: var(--right-bg-color);
}

.split.left, .split.right, .split.right:before, .split.left:before {
  transition: var(--speed) all ease-in-out;
}

.hover-left .left {
  width: var(--hover-width);
}

.hover-left .right {
  width: var(--other-width);
}

.hover-left .right:before {
  z-index: 2;
}


.hover-right .right {
  width: var(--hover-width);
}

.hover-right .left {
  width: var(--other-width);
}

.hover-right .left:before {
  z-index: 2;
}

div {

  margin-bottom: 1px;
  /*padding: 4px 4px 4px 4px;*/
}

.info {
  background-color: #F72E5D;
	padding-top: 10px;
  border-left: 6px solid #2196F3;
}
/*
@media(max-width: 800px) {
  h1 {
    font-size: 2rem;
  }

  .button {
    width: 12rem;
  }
}

@media(max-height: 700px) {
  .button {
    top: 70%;
  }
}*/
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
	 	<div class="info">
  	<!--<p><strong style="color: #000000;">แจ้งให้ทราบ</strong><br>ระบบการจ่ายค่าตอบแทนผู้เข้าร่วมโครงการอยู่ระหว่างปรับปรุง     ท่านสามารถเข้าร่วมโครงการได้ตามปกติ แต่ระบบจะส่งค่าตอบแทนให้หลังจากปรับปรุงระบบเสร็จเรียบร้อย</p>--> 
	<p><strong style="color: #000000;">แจ้งให้ทราบ</strong><br>ระบบจะจ่ายค่าตอบแทนหลังจากตอบแบบสอบถามแล้ว <strong style="color: #000000;">ภายใน 7วัน</strong></p>
</div> 
	<!-- SHOW peer คำเตือน --> 
 <div class="modal fade" id="myModalpeer" role="dialog" class="modal hide fade in" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog"  style=" width: 420px; height: 500px;" >
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"  style="display: inline";>
          <h4 class="modal-title"><center> <h2><p><b>คำเตือน</b></p></h2>
											<img class="img-responsive himgtop" src="images/fav_kainoi-xl.gif" alt="" style="width: 170px; height: 70px;  border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> </h4>
										</center>
        </div>
        <div class="modal-body">
									
									<!--<img class="img-responsive himgtop" src="images/p1.png" alt="" style=" width: 20px; height: 250px; border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
								-->
					<!--<center> <p><b>ระบบการจ่ายค่าตอบแทนผู้เข้าร่วมโครงการอยู่ระหว่างปรับปรุง<br><b style="color: red">ท่านสามารถเข้าร่วมโครงการได้ตามปกติ</b><br> แต่ระบบจะส่งค่าตอบแทนให้หลังจากปรับปรุงระบบเสร็จเรียบร้อย</p></b></center><br>-->
					<center> <p><b>ระบบจะจ่ายค่าตอบแทนหลังจากตอบแบบสอบถามแล้ว </b><br><b  style="color: red"> ภายใน 7วัน</b></p></center><br>
												<center> <p><b></b><b style="color: red">--------------------</p></b></center><br><br>
          <center> <p><b>เบอร์โทรศัพท์ใช้ในโครงการได้เพียง<br><b style="color: red">1ครั้ง เท่านั้น</b><br> หากไม่ผ่านการคัดกรองของระบบ<br> ก็ไม่สามารถเข้าร่วมโครงการได้อีก</p></b></center>
										
									 <p></p>
        </div>
        <div class="modal-footer">
       	 <button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.location.href = 'index_pe.php';">เข้าใจ</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
							
        </div>
      </div>
      
    </div>
  </div>
	<!-- Modal SEED  คำเตือน -->
	
 <div class="modal fade" id="myModalseed" role="dialog" class="modal hide fade in" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog"  style=" width: 420px; height: 500px;" >
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"   style="display: inline";>
          <h4 class="modal-title"><center> <h2><p><b>คำเตือน</b></p></h2>
											<img class="img-responsive himgtop" src="images/fav_kainoi-xl.gif" alt="" style="width: 170px; height: 70px; border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> </h4>
										</center>
        </div>
        <div class="modal-body">
									
									<!--<img class="img-responsive himgtop" src="images/p1.png" alt="" style=" width: 20px; height: 250px; border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
								-->
							<!--<center> <p><b>ระบบการจ่ายค่าตอบแทนผู้เข้าร่วมโครงการอยู่ระหว่างปรับปรุง<br><b style="color: red">ท่านสามารถเข้าร่วมโครงการได้ตามปกติ</b><br> แต่ระบบจะส่งค่าตอบแทนให้หลังจากปรับปรุงระบบเสร็จเรียบร้อย</p></b></center><br>-->
								<center> <p><b>ระบบจะจ่ายค่าตอบแทนหลังจากตอบแบบสอบถามแล้ว </b><br><b  style="color: red"> ภายใน 7วัน</b></p></center><br>
												<center> <p><b></b><b style="color: red">--------------------</p></b></center><br><br>
          <center> <p><b>เบอร์โทรศัพท์ใช้ในโครงการได้เพียง<br><b style="color: red">1ครั้ง เท่านั้น</b><br> หากไม่ผ่านการคัดกรองของระบบ<br> ก็ไม่สามารถเข้าร่วมโครงการได้อีก</p></b></center>
										
									 <p></p>
        </div>
        <div class="modal-footer">
       	 <button type="button" class="btn btn-success" data-dismiss="modal" onclick="window.location.href = 'index_hs.php';">เข้าใจ</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
							
        </div>
      </div>
      
    </div>
  </div>
	<!-- Modal PEER คำเตือน --> 

			<section>
			<div class="container_c">
							<div class="split left">
									<img class="img1" style="background: white;" src="images/kai2-1.png" alt="" width="270" height="290"/>
									
									<br><br><br><br><br><br>
									
									<center><h3>คุณได้รับรหัสคูปอง<br><SPAN class="rainbow-text"><b>SMS</b></SPAN><br>ที่ได้จากเพื่อน</h3></center>
								
									<!--<a href="#" class="buttont" style="background: #0C3889;">Click</a>-->
									<button type="button" style="background: #0C3889;" class="buttont" data-toggle="modal" data-target="#myModalpeer" >Click !!</button>
							</div>
							<div class="split right">
									<img style="border-color: #F98D00;" class="img1" src="images/p1.png" alt="" width="270" height="290"/>
									
									<br><br><br><br><br><br>
											<center><h3 style="border-color: #F98D00;">คุณมาจากการเชิญ <br>ทาง ไลฟ์ <SPAN class="rainbow-text"><b>LIVE</b></SPAN><br>แบนเนอร์  <SPAN class="rainbow-text"><b>BANNER</b></SPAN></h3></center>
							
											<!--<a href="#" class="buttont" style="background: #0C3889;">Click</a>-->
									<button type="button" style="background: #D3930A;" class="buttont" data-toggle="modal" data-target="#myModalseed" >Click !!</button>
							</div>
					</div>
		</section>
	</div>

				<!-- Page Footer-->
				<footer class="section footer-minimal">
					<div class="container"> <center
						<div class="footer-minimal-inner"><a style="border-color: #F98D00;" class="brand" href="index.php"><img src="images/logo-light-398x45.gif" alt="" width="199" height="22"/></a>
							<!-- Rights-->
							<p class="left"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights Reserved. Design by kainoi.net</a></p>
						</div></center>
					</div>
				</footer>

			<!-- Modal ปิดปรับปรุง server --> 
<div class="modal fade" id="myModalclose" role="dialog" class="modal hide fade in" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog"  style=" width: 400px; height: 700px;" >
    
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><center> <h4><p><b style="color: red;">ปิดโครงการ</p></b></h4></center>
											<img class="img-responsive himgtop" src="images/fav_kainoi-xl.gif" alt="" style="border-top: solid 1px #ffffff;"> </h4>
										
        </div>
        <div class="modal-body">
									
									<img class="img-responsive himgtop" src="images/p1.png" alt="" style=" width: 300px; height: 200px; border-bottom: solid 4px #d88900;border-top: solid 1px #ffffff;"> 
										<br>&nbsp;&nbsp;&nbsp;ขณะนี้ Kainoi.net ได้ปิดการเข้าร่วมโครงการ
										ขอขอบคุณทุกท่านที่สนใจเข้าร่วมโครงการกับเรา
										ผิดพลาดประการใด ขออภัย ณ ที่นี้
									 <p></p>
									 <br>
									   <center> <h4><p><b>ขอขอบคุณ</p></b></h4></center
        </div>
        <div class="modal-footer">
      
							
        </div>
      </div>
      
    </div>
  </div>
	<!-- Modal ปิดปรับปรุง server --> 

			<div class="preloader"> 
				<div class="preloader-logo"><img src="images/logo-light-398x45.gif" alt="" width="199" height="22"/>
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
       <script type="text/javascript"> //ปิด ปรับปรุง
								$(window).load(function()
				{
							/*	$('#myModalclose').modal('show');*/
				});
								
				</script>
			<script type="text/javascript"> //ปิด ปรับปรุง
						const left = document.querySelector(".left");
						const right = document.querySelector(".right");
						const container = document.querySelector(".container_c");
						
						left.addEventListener("mouseenter", () => {
								container.classList.add("hover-left");
						});
						
						left.addEventListener("mouseleave", () => {
								container.classList.remove("hover-left");
						});
						
						right.addEventListener("mouseenter", () => {
								container.classList.add("hover-right");
						});
						
						right.addEventListener("mouseleave", () => {
								container.classList.remove("hover-right");
						});

			</script>
	</body>
	</html>