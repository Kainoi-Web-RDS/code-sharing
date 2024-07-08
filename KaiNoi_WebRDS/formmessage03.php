<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
session_destroy();
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
      
   * {
     box-sizing: border-box;
   }

body {
  background-color: #f1f1f1;
}

/* Content */
.content {
  background-color: white;
  padding: 10px;
  
}

#regForm {
  background-color: #ffffff;
  margin:  auto;
  	font-family: 'Chakra Petch', sans-serif;
  padding: 15px;
  width: 100%;
  height:  45%;
  min-width: 10px;
}

hr.new {
  border-top: 2px dashed #4CAF50;
}


input[type=button]{
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  /*font-size: 14px;*/
  	font-family: 'Chakra Petch', sans-serif;
  border-radius:6px;
	border:1px solid #000000;
	display:inline-block;
  cursor: pointer;
}

input[type=button]:hover {
  background-color: #45a049;
}
input[type=button].next{
  background-color: #8f00b3;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
 /* font-size: 14px;*/
  	font-family: 'Chakra Petch', sans-serif;
  border-radius:6px;
	border:1px solid #000000;
	display:inline-block;
  cursor: pointer;
}

button.next{
  background-color: #8f00b3;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
 /* font-size: 14px;*/
  	font-family: 'Chakra Petch', sans-serif;
  border-radius:6px;
	border:1px solid #000000;
	display:inline-block;
  cursor: pointer;
}



/*//////////////////  checkmark /////////*/
	.containerins12 {
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

  .button.button-primary, .button.button-primary:focus {
  	margin-top: 1px;
  }
  /* ใช้ทั้งเว็บไซต์ */
 

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
   		margin-top:95px;
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

@media only screen and (min-width: 768px) {
   .qs1{
       margin-top: 3%;
       font-size: 30px;
  
   }
}
@media only screen and (min-width: 990px) {
   .qs1{
       margin-top: 2%;
       font-size: 28px;
  
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
.borderq{
 border:1px solid #bbb;
 border-radius: 9px;
 padding: 20px 20px;
}

  
 </style>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,400,500,700">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@400;500;700&display=swap" rel="stylesheet">
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
  
    <![endif]-->
  </head>
  <body>
    <div class="page">
                     

   <header class="section page-header" style="position: relative; height: 2px;" >
			<!-- RD Navbar-->
			<div class="rd-navbar-wrap rd-navbar">
				<nav class="rd-navbar rd-navbar-thin" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-fixed" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
					<div class="rd-navbar-main-outer" style="background-color: #FFFFFF;">
        
              <button class="rd-navbar-collapse-toggle rd-navbar-fixed-element-2" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></button>
        
              <button style="right: 10px;" class="rd-navbar-collapse-toggle rd-navbar-fixed-element-2" data-rd-navbar-toggle="#rd-navbar-nav-wrap-1, #rd-navbar-hidden-1">
               Menu </button>
        
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
         </div>
				  </nav>
			</div>
		</header>
      <!-- FScreen-->
     <!-- <section class="section section-halfscreen bg-image" style="background-image: url(images/header-bg.jpg);">
        <div class="section-halfscreen-inner">
          <div class="section-halfscreen-image wow fadeIn" style="background-image: url(images/screens-1-960x752.jpg); "></div>-->
      <section>
        <div  class="section section-lg text-center" style="padding: 0px;">
              <div class="container" style=" background: linear-gradient(-60deg, rgba(2,0,36,1) 0%, rgb(0, 0, 0) 0%, rgb(255, 4, 0) 100%);  border-radius: 6px ; border: 3px solid #000000;">
               <br>
               <!--<div class="container" >
              <div class="row">
                  <div class="col-md-6 col-lg-5">
                  <div class="section-halfscreen-content">-->
              <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #000000;  margin-left: 10px; margin-right: 10px; padding:0px ">
                   
                        <!--<h4 style ="background-color :#ffffff; border-style: groove; border-color: #64B2EA;"><br>ตอบคำถามนี้เพื่อมาเป็นตัวตั้งต้นกับเรา<br></h4> -->
                             <center> <img src="images/kai11.png" class="img-rounded" alt="Cinque Terre" width="154" height="86"></center>
                                   <h4><span style="text-align: justify; white-space: pre;font-weight: bold;">ขอขอบคุณที่คุณให้ความสนใจ</span>
                                  <span style="text-align: justify;white-space: pre;font-weight: bold;">ในโครงการ kainoi.net</span>
                                  <span style="text-align: justify;white-space: pre;font-weight: bold;">และสละเวลาอันมีค่า</span>
                                  <br>
                                  <span style="text-align: justify; white-space: pre;font-weight: bold;">คุณมีคุณสมบัติไม่ครบ</span>
                                  <span style="text-align: justify;white-space: pre;font-weight: bold;">ตามที่โครงการกำหนดไว้นะครับ</span></h4>
                                          <br>
                               <center>
                                     <button type="button" name="button"  class="button button-primary button-winona wow fadeIn" onclick="window.location.href='index.php'">กลับไปหน้าแรก</button>
                               </center>
                               <br>
  </div>
 </div>
</div>   
</section>

      <!-- Advantages and Achievements-->
     
      <!-- Services-->
     
      
      <!-- Page Footer-->
      <hr>
      <footer class="section footer-minimal">
        <div class="container"> 
          <div class="footer-minimal-inner"><a class="brand" href="index.php"><img src="images/logo-light-398x45.gif" alt="" width="199" height="22"/></a>
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