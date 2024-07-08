<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
if (isset($_SESSION['mobilephone']) == "") {
    header("location: index_hs.php");
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/united/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/styles/shCoreDefault.min.css" />

        <link rel="stylesheet" href="dist2/css/bootstrap/zebra_datepicker.min.css" type="text/css">
        <link rel="stylesheet" href="dist2/examples.css" type="text/css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/scripts/shCore.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/scripts/shBrushJScript.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/scripts/shBrushXml.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/scripts/shBrushCss.min.js"></script>
        
   <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,400,500,700">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    
   <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@400;500;700&display=swap" rel="stylesheet">
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
   
     
    <![endif]-->
          
      <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       } 
                  }
             };
             req.open("GET", "localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('geo', -1);
    </script>
      
    <script>
   $('#datepicker').Zebra_DatePicker({
    format: 'd m Y',
   });
   $(document).ready(function(){
     $.fn.datepicker.defaults.language = 'th';
});
$(document).ready(function(){
     $('.datepicker').datepicker();
});
</script>

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
        <section class="section section-lg text-center" style="background-image: url(images/20897.jpg); background-repeat: repeat-y;">
        <div class="container">
          <h3 class="wow-outer"><span class="wow slideInUp"><br></h3>
          <p class="wow-outer"><span class="text-width-1 wow slideInDown">
          <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #1370F2;">
                         <br>
                          <h4><p>ยินดีต้อนรับสู่ kainoi.net กรุณาเลือกคำตอบที่ถูกต้องที่สุด หากไม่แน่ใจให้เลือกคำตอบที่คิดว่าถูกต้องที่สุด</p></h4> <br>
                        <!--      <form id="regForm" method="POST" action="checkscreen_hs.php"> -->
                                <form id="regForm" method="POST" action="check_seed.php">
		   <!-- progressbar -->
                        <!--  <ul id="progressbar">
                          <li><p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>-------0%-------</h5></p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>-------10%-----</h5></p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>-------20%-----</h5></p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>-------30%-----</h5></p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>-------40%-----</h5></p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>-------50%-----</h5></p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>-------60%-----</h5></p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>-------70%-----</h5></p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>-------80%-----</h5></p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>-------90%-----</h5></p><hr class="new"><br></li>
                          <li><p><h5 style="color: #0000FF;">ขณะนี้ทำแบบสอบถามคัดกรองไปแล้ว<br>------100%----</h5></p><hr class="new"><br></li>
                         </ul>-->
                         <ul id="progressbar">
                          <li><p><hr class="new"><br></li>
                          <li><div class="progress">
                                     <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:1%">
                                       0% Complete
                                     </div>
                                   </div><hr class="new"><br></li>
                          <li><div class="progress">
                                     <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                                       10% Complete 
                                     </div>
                                   </div><hr class="new"><br></li>
                           <li><div class="progress">
                                     <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                       20% Complete 
                                     </div>
                                   </div><hr class="new"><br></li>
                          <li><div class="progress">
                                     <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                       40% Complete 
                                     </div>
                                   </div><hr class="new"><br></li>
                         <li><div class="progress">
                                     <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                       50% Complete 
                                     </div>
                                   </div><hr class="new"><br></li>
                          <li><div class="progress">
                                     <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                       70% Complete 
                                     </div>
                                   </div><hr class="new"><br></li>
                          <li><div class="progress">
                                     <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                       80% Complete 
                                     </div>
                                         </div><hr class="new"><br></li>
                       
                          <li><div class="progress">
                                     <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                       100% Complete 
                                     </div>
                                   </div><hr class="new"><br></li>
                         </ul>
                         <!-- error messages -->
                         <span class="fs-error"></span>

		   <!-- fieldsets -->
     <fieldset class= "qs1"  >
      
     <span style="text-align: justify; white-space: pre;font-weight: bold;">สวัสดีครับ ขอให้คุณ</span>
       <span style="text-align: justify; white-space: pre;font-weight: bold;">กรุณาตอบคำถาม</span>
      <span style="text-align: justify;white-space: pre;font-weight: bold;">เพื่อตรวจสอบ</span>
        <span style="text-align: justify;white-space: pre;font-weight: bold;">คุณสมบัติในการ</span>
      <span style="text-align: justify;white-space: pre;font-weight: bold;">เข้าร่วมโครงการ</span>
      <span style="text-align: justify;white-space: pre;font-weight: bold;">ของคุณ</span>
      <br> <br>
      <h3 style=" text-align: left;"><span style=" text-align: left; white-space: pre;">คุณมีสัญชาติอะไร</span></h3>
      <br>
      <hr class="new">
			   <br>
       <label  class="containerins12" style="text-align: left;">1.ไทย<input type="radio" id="NATION_a" name="NATION" value="1">
        <span class="checkmarkins12"></span></label>
       
        <label class="containerins12" style="text-align: left;">2.ชนกลุ่มน้อย กลุ่มชาติพันธุ์  เช่น ไทยใหญ่<input type="radio" id="NATION_b" name="NATION" value="2">
        <span class="checkmarkins12"></span></label>
        
        <label class="containerins12" style="text-align: left;">3.พม่า<input type="radio" id="NATION_c" name="NATION" value="3">
        <span class="checkmarkins12"></span></label>
        <label  class="containerins12" style="text-align: left;">4.ลาว<input type="radio" id="NATION_d" name="NATION" value="4">
        <span class="checkmarkins12"></span></label>
       
        <label class="containerins12" style="text-align: left;">5.เขมร<input type="radio" id="NATION_e" name="NATION" value="5">
        <span class="checkmarkins12"></span></label>
        
        <label class="containerins12" style="text-align: left;">6. อื่นๆ ระบุ…<input type="radio" id="NATION_f" name="NATION" value="6">
        <span class="checkmarkins12"></span></label>

       <div id="ifNo1" style="display:none">
            โปรดระบุ <input style="padding-left: 8px;opacity: 5; border-radius: 20px; height: 35px;"  type="text" id="NATION_OTH" name="NATION_OTH">
       </div>
     

     <br><hr class="new"><br>
			  <input type="button" name="next" class="next action-button" value="ถัดไป" />
		   </fieldset>
     
      <fieldset class= "qs1">
      <h3 style=" text-align: left;"><span style=" white-space: pre;">เพศตั้งแต่เกิด</span>
      <span style="white-space: pre;">คุณเป็นเพศอะไร</span></h3>
      
        <hr class="new">
			   <br>
       <label  class="containerins12" style="text-align: left;">1.ชาย<input type="radio" id="ELSXBORN_a" name="ELSXBORN" value="1">
        <span class="checkmarkins12"></span></label>
       
        <label class="containerins12" style="text-align: left;">2.หญิง<input type="radio" id="ELSXBORN_b" name="ELSXBORN" value="2">
        <span class="checkmarkins12"></span></label>
        
     <br><hr class="new">
         <br>

     <br>
	    <input type="button" name="previous" style="float: left;" class="previous action-button" value="ก่อนหน้า" />
			  <input type="button" name="next" style="float: right;" class="next action-button" value="ต่อไป" />
      
		   </fieldset>
     
   <fieldset class= "qs1">
            <h3 style=" text-align: left;"><span style="white-space: pre;">คุณคิดว่า </span>
       <span style="white-space: pre;">คุณเป็นผู้หญิง</span>
      <span style="white-space: pre;">ผู้ชาย หรือ </span>
      <span style="white-space: pre;">สาวประเภทสอง</span></h3>

      
        <hr class="new">
			   <br>
       <label  class="containerins12" style="text-align: left;">1.ชาย<input type="radio" id="ELTGNOW_a" name="ELTGNOW" value="1">
        <span class="checkmarkins12"></span></label>
       
        <label class="containerins12" style="text-align: left;">2.หญิง<input type="radio" id="ELTGNOW_b" name="ELTGNOW" value="2">
        <span class="checkmarkins12"></span></label>
        
        <label class="containerins12" style="text-align: left;">3.สาวประเภทสอง<input type="radio" id="ELTGNOW_c" name="ELTGNOW" value="3">
        <span class="checkmarkins12"></span></label>
        
     <br><hr class="new">
         <br>

     <br>
	    <input type="button" name="previous" style="float: left;" class="previous action-button" value="ก่อนหน้า" />
			  <input type="button" name="next" style="float: right;" class="next action-button" value="ต่อไป" />
      
		   </fieldset>

 <fieldset class= "qs1">
      <h3 style=" text-align: left;"><span style="white-space: pre;">คุณอายุเท่าไร</span>
      <span style="white-space: pre;">(นับถึงวันเกิดปีล่าสุด)</span></h3>

      
        <hr class="new">
			   <br>
          <input name="ELAGE" id="ELAGE"  min="10" max="99" maxlength="2" type="text" maxlength="2" class="form-control" style="opacity: 5; border-radius: 15px;  width: 250px;height: 40px; font-size: 20px;">
        
     <br><hr class="new">
         <br>

     <br>
	    <input type="button" name="previous" style="float: left;" class="previous action-button" value="ก่อนหน้า" />
			  <input type="button" name="next" style="float: right;" class="next action-button" value="ต่อไป" />
      
		   </fieldset>


      <fieldset class= "qs1">
            <h3 style=" text-align: left;"><span style="white-space: pre;"></span></h3>
   
			  <div class="row" style="text-align: left;margin-left: 0px;">
			  <div class='btns'>
               <p style="font-size: 25px;">ปัจจุบันคุณอยู่ภาคไหนของประเทศไทย :
                <span id="geo">
                    <select style="opacity: 5; border-radius: 15px;  width: 150px;height: 40px; font-size: 16px; text-align: center;" >
                        <option value='0'>- เลือกภาค -</option>
                    </select>
                </span></p>
           <br>
             <p style="font-size: 25px;">ปัจจุบันคุณอาศัยอยู่ที่จังหวัดไหน :
                <span id="province">
                    <select style="opacity: 5; border-radius: 15px;  width: 150px;height: 40px; font-size: 16px; text-align: center;" >
                        <option value='0'>- เลือกจังหวัด -</option>
                    </select>
                </span></p>
            <br>
            <p style="font-size: 25px;">ปัจจุบันคุณอาศัยอยู่ที่เขตไหน :
                <span id="amphur">
                    <select style="opacity: 5; border-radius: 15px;  width: 200px;height: 40px; font-size: 16px; text-align: center;" >
                        <option value='0'>- เลือกอำเภอ -</option>
                    </select>
                </span></p>
            <br>
          <p>
          <span id= ELLOCZIP>
                <select style="opacity: 5; border-radius: 15px;  width: 200px;height: 40px; font-size: 16px; text-align: center; visibility: hidden">
                        <option value='0'>- รหัสที่อยู่ของท่าน -</option>
               </select>
          </span></p></div>
     	</div><br><hr class="new"><br>
			  <input type="button" name="previous" style="float: left;" class="previous action-button" value="ก่อนหน้า" />
			  <input type="button" name="next" style="float: right;"  class="next action-button" value="ต่อไป" />
		   </fieldset>
      
      
    <fieldset class= "qs1">
      <h3 style=" text-align: left;"><span style="white-space: pre;">คุณเคยมีเพศสัมพันธ์ </span>
      <span style="white-space: pre;">ทางทวารหนัก</span>
      <span style="white-space: pre;">กับผู้ชายหรือไม่</span>
      <span style="white-space: pre;">(หมายถึงอวัยวะเพศ</span>
      <span style="white-space: pre;">ชายสอดเข้าไปใน</span>
      <span style="white-space: pre;">ทวารหนัก)</span></h3>
      

      
        <hr class="new">
			   <br>
       <label  class="containerins12" style="text-align: left;">1.เคย<input type="radio" id="ELMSMEV_a" name="ELMSMEV" value="1">
        <span class="checkmarkins12"></span></label>
       
        <label class="containerins12" style="text-align: left;">2.ไม่เคย<input type="radio" id="ELMSMEV_b" name="ELMSMEV" value="2">
        <span class="checkmarkins12"></span></label>
        
        <label class="containerins12" style="text-align: left;">3.ไม่รู้<input type="radio" id="ELMSMEV_c" name="ELMSMEV" value="97">
        <span class="checkmarkins12"></span></label>
        
        <label class="containerins12" style="text-align: left;">4.ไม่ตอบ<input type="radio" id="ELMSMEV_d" name="ELMSMEV" value="98">
        <span class="checkmarkins12"></span></label>
        
     <br><hr class="new">
         <br>

     <br>
	    <input type="button" name="previous" style="float: left;" class="previous action-button" value="ก่อนหน้า" />
			  <input type="button" name="next" style="float: right;" class="next action-button" value="ต่อไป" />
      
		   </fieldset>   
      
        
    <fieldset class= "qs1">
      <h3 style=" text-align: left;"><span style="white-space: pre;">ครั้งสุดท้ายที่คุณ</span>
       <span style="white-space: pre;">มีเพศสัมพันธ์กับผู้ชาย</span>
      <span style="white-space: pre;">(นานเท่าไรแล้ว)</span></h3>

      
        <hr class="new">
			   <br>
       <label  class="containerins12" style="text-align: left;">1.	ภายใน 6 เดือน<input type="radio" id="ELMSMREC_a" name="ELMSMREC" value="1">
        <span class="checkmarkins12"></span></label>
       
        <label class="containerins12" style="text-align: left;">2.	นานกว่า 6 เดือนมาแล้ว<input type="radio" id="ELMSMREC_b" name="ELMSMREC" value="2">
        <span class="checkmarkins12"></span></label>
        
        <label class="containerins12" style="text-align: left;">3.	ไม่ทราบ<input type="radio" id="ELMSMREC_c" name="ELMSMREC" value="97">
        <span class="checkmarkins12"></span></label>
        
        <label class="containerins12" style="text-align: left;">4.ไม่ตอบ<input type="radio" id="ELMSMREC_d" name="ELMSMREC" value="98">
        <span class="checkmarkins12"></span></label>
        
     <br><hr class="new">
         <br>

     <br>
	    <input type="button" name="previous" style="float: left;" class="previous action-button" value="ก่อนหน้า" />
			  <input type="button" name="next" style="float: right;" class="next action-button" value="ต่อไป" />
      
		   </fieldset>   
      
				<fieldset class= "qs1">
      <h3 style=" text-align: left;"><span style="white-space: pre; ">คุณมีเพื่อนที่</span>
       <span style="white-space: pre;">เป็นชายรักชาย </span>
      <span style="white-space: pre;">หรือสาวประเภทสอง</span>
       <span style="white-space: pre;">และยังติดต่อกัน</span>
       <span  style=" color :#F40000; text-shadow: 1px 1px 2px orange;white-space: pre;"> ทางออนไลน์หรือออฟไลน์</span>
      <span style=" white-space: pre; "> จำนวนกี่คน</span></h3>

      
        <hr class="new">
			   <br>
       <label  class="containerins12" style="text-align: left;">1.	[ 1-4] คน<input type="radio" id="ELDG_a" name="ELDG" value="1"><!--(1-5)/10-12-64/(1-4)*-->
        <span class="checkmarkins12"></span></label>
       
        <label class="containerins12" style="text-align: left;">2.     [  5-10 ] คน<input type="radio" id="ELDG_b" name="ELDG" value="2"><!--(6-10)/10-12-64/(5-10)*-->
        <span class="checkmarkins12"></span></label>
        
        <label class="containerins12" style="text-align: left;">3.	มากกว่า 10 คน<input type="radio" id="ELDG_c" name="ELDG" value="3">
        <span class="checkmarkins12"></span></label>
        
        
     <br><hr class="new">
         <br>

     <br>
	    <input type="button" name="previous" style="float: left;" class="previous action-button" value="ก่อนหน้า" />
			  <input type="button" name="next" style="float: right;" class="next action-button" value="ต่อไป" />
      
		   </fieldset>   
      
						
          
			<fieldset class= "qs1">
      <h3 style=" text-align: left;"><span style=" white-space: pre;">เพื่อนคุณได้เข้าร่วม </span>
       <span style="white-space: pre;">โครงการครั้งนี้หรือไม่ </span></h3>

        <hr class="new">
			   <br>
       <label  class="containerins12" style="text-align: left;">1.	มีเพื่อนเข้าร่วม<input type="radio" id="ELFRREC_a" name="ELFRREC" value="1">
        <span class="checkmarkins12"></span></label>
       
        <label class="containerins12" style="text-align: left;">2.	ไม่มีเพื่อนเข้าร่วม<input type="radio" id="ELFRREC_b" name="ELFRREC" value="2">
        <span class="checkmarkins12"></span></label>

		  	<br><hr class="new">
     <br>
     <p>กรุณากดปุ่ม "กดส่ง"ด้วยครับ</p>
     <br>
			  <input type="button" name="previous" style="float: left;"  class="previous action-button" value="ก่อนหน้า" />
	    	<button name="next"  class="next" style="float: right;"  type="submit">กดส่ง</button>
		   </fieldset>

           
		</form>
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
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/zebra_pin@2.0.0/dist/zebra_pin.min.js"></script>
        <script src="dist2/zebra_datepicker.min.js"></script>
        <script src="dist2/examples.js"></script>
        
     <script>
     $(document).ready(function() {
      $(".datepicker").Zebra_DatePicker({ format: "d-m-y" }); 
     });
 </script>
 <script>
   var zip3= 0;
		$(document).ready(function() {
		  
		  $(".next").click(function(event) {
			var current_index = $(this).parent().index("fieldset");
			
			if(validateStep(current_index)){
				makeStepActive(current_index+1);
			}else{
				event.preventDefault();
			}
		  });

		  $(".previous").click(function() {
			var current_index = $(this).parent().index("fieldset");
			makeStepActive(current_index - 1);
		  });

		 makeStepActive(0);	
		 
		});
	
		function makeStepActive(index){
			var step = $("#progressbar li:eq("+index+")");
			var feildset = $("fieldset:eq("+index+")");
			if(step.length){
				$("#progressbar li").hide();
				$("fieldset").hide();
				step.show();
				feildset.slideDown(500);
			}
		}
	
		function validateStep(step){
			switch(step){
      case 0:
       
				  if(($("input[name='NATION']:checked").length === 0)){
						alert('กรุณาเลือกคำตอบ!');
						return false;
					}
					return true;
                break;
				break;
     case 1:
     if(($("input[name='ELSXBORN']:checked").length === 0)){
					alert('กรุณาเลือกคำตอบ!');
						return false;
					}
					return true;
				break;
    case 2:
     if(($("input[name='ELTGNOW']:checked").length === 0)){
	  		alert('กรุณาเลือกคำตอบ!');
						return false;
					}
					return true;
                break;
   case 3:
					var x = document.forms["regForm"]["ELAGE"].value;
							if (x == "") {
							  	alert('กรุณาตอบคำถาม!');
							  return false;
							}
       	else if(x < 10 || x > 98)
							{
								alert("อายุไม่ถูกต้อง");
									  return false;
							}	
        return true;
				break;
   case 4:
              var x = document.forms["regForm"]["ELLOCZIP"].value;
							if (x == "") {
							  	alert('กรุณาตอบคำถาม!');
							  return false;
							}
      	else if ( x.length < 4) {
        alert('ระบุรหัสไปรษณีย์ของท่าน');
							  return false;
							}
        return true;
				break;
   	case 5:
       if(($("input[name='ELMSMEV']:checked").length === 0)){
						alert('กรุณาเลือกคำตอบ!');
						return false;
					}
					return true;
                break;
			case 6:
     if(($("input[name='ELMSMREC']:checked").length === 0)){
			  alert('กรุณาเลือกคำตอบ!');
						return false;
					}
					return true;
                break;
   	case 7:
       if(($("input[name='ELDG']:checked").length === 0)){
						alert('กรุณาเลือกคำตอบ!');
						return false;
					}
					return true;
                break;
			case 8:
     if(($("input[name='ELFRREC']:checked").length === 0)){
			  alert('กรุณาเลือกคำตอบ!');
						return false;
					}
					return true;
                break;
   
				default:
	
			}
		}
		

      
 
   
    
    
          
          
             $("#NATION_a").click(function(){
                  $("#ifNo1").hide();$("#NATION_OTH").val('');
             });
             $("#NATION_b").click(function(){
                  $("#ifNo1").hide();$("#NATION_OTH").val('');
             });
             $("#NATION_c").click(function(){
                  $("#ifNo1").hide();$("#NATION_OTH").val('');
             });
             $("#NATION_d").click(function(){
                  $("#ifNo1").hide();$("#NATION_OTH").val('');
             });
             $("#NATION_e").click(function(){
                       $("#ifNo1").hide();  $("#NATION_OTH").val('');
             });  
              $("#NATION_f").click(function(){
                   $("#ifNo1").show("slow");
             });
            
            
        
                
                   $("#ELAGE").keypress(function(event){
                       var keycode = event.which;
                           if( $(this).val().length === 2 ) { 
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