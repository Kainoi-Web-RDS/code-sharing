<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php'); 
   $USERS= $_SESSION['USERS'];
   $HOS = $_SESSION['HOS'];
  $STATUS = $_SESSION['STATUS'];
	if($STATUS!='2'){
    Header("Location: logout.php");  
  }
  
      $hos_data  =$HOS;
                                      
                                      if($hos_data==1){
                                       $hos_name = 'รพ.กลาง';
                                       $stickerhos = '11537';
                                      }elseif($hos_data==2){
                                        $hos_name = 'รพ.เจริญกรุงประชารักษ์';
                                        $stickerhos = '00000';//11541
                                       }elseif($hos_data==3){
                                        $hos_name = 'รพ.ตากสิน';
                                          $stickerhos = '11539';
                                      }elseif($hos_data==4){
                                        $hos_name = 'รพ.ราชพิพัฒน์';
                                        $stickerhos = '14641';
                                      }elseif($hos_data==5){
                                        $hos_name = 'รพ.ลาดกระบัง กรุงเทพมหานคร';
                                         $stickerhos = '11538';
                                      }elseif($hos_data==6){
                                        $hos_name = 'รพ.เวชการุณย์รัศมิ์';
                                        $stickerhos = '11536';
                                      }elseif($hos_data==7){
                                        $hos_name = 'รพ.ศูนย์บริการสาธารณสุข 28 กรุงธนบุรี';
                                          $stickerhos = '13673';
                                      }elseif($hos_data==8){
                                        $hos_name = 'รพ.สิรินธร';
                                          $stickerhos = '15049';
                                      }elseif($hos_data==9){
                                        $hos_name = 'รพ.หลวงพ่อทวีศักดิ์ ชุตินฺธโร อุทิศ';
                                          $stickerhos = '11540';
                                      }elseif($hos_data==10){
                                        $hos_name = 'สภากาชาดไทย : คลินิกนิรนาม';
                                          $stickerhos = '23220';// please update
                                      }elseif($hos_data==11){
                                        $hos_name = 'รพ.สารภี (เชียงใหม่)';
                                      }elseif($hos_data==12){
                                        $hos_name = 'มูลนิธิเอ็มพลัส Mplus+(เชียงใหม่)';
                                      }elseif($hos_data==13){
                                        $hos_name = 'ศูนย์สุขภาพ แคร์แมท CAREMAT(เชียงใหม่)';
                                      }elseif($hos_data==0){
                                        $hos_name = 'ส่วนกลาง';
                                        $stickerhos = '00000';
                                      }elseif($hos_data==14){
                                        $hos_name = 'สำนักงานชันสูตรสาธารณสุข';
                                        $stickerhos = '00000';
                                      }            
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!--  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <meta name="description" content="it">
    <meta name="keywords" content="Rapoo,creative, agency, startup, Mobicon,onepage, clean, modern,business, company,it">
    <meta name="author" content="Dreambuzz">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/themify/themify-icons.css">

    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/all.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <title>WebRDS-Clinic</title>
     <link rel="icon" href="../img/fav.png" type="image/x-icon">
      <style>
       
         body {
  	font-family: 'Chakra Petch', sans-serif;
  	color: #000000;
   font-size:25px;
  	/* font-family: 'Sriracha', cursive;*/
  }
  /* ใช้เฉพาะหัวข้อ */
  h1, h2, h3, h4, h5, h6 {
  	font-family: 'Chakra Petch', sans-serif;
  	color: #000000;
  }
  
 .buttong {
	-moz-box-shadow:inset 0px 1px 0px 0px #d978de;
	-webkit-box-shadow:inset 0px 1px 0px 0px #d978de;
	box-shadow:inset 0px 1px 0px 0px #d978de;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c482fa), color-stop(1, #c192d1));
	background:-moz-linear-gradient(top, #c482fa 5%, #c192d1 100%);
	background:-webkit-linear-gradient(top, #c482fa 5%, #c192d1 100%);
	background:-o-linear-gradient(top, #c482fa 5%, #c192d1 100%);
	background:-ms-linear-gradient(top, #c482fa 5%, #c192d1 100%);
	background:linear-gradient(to bottom, #c482fa 5%, #c192d1 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c482fa', endColorstr='#c192d1',GradientType=0);
	background-color:#c482fa;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #9c27d6;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #873ce8;
}
.buttong:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c192d1), color-stop(1, #c482fa));
	background:-moz-linear-gradient(top, #c192d1 5%, #c482fa 100%);
	background:-webkit-linear-gradient(top, #c192d1 5%, #c482fa 100%);
	background:-o-linear-gradient(top, #c192d1 5%, #c482fa 100%);
	background:-ms-linear-gradient(top, #c192d1 5%, #c482fa 100%);
	background:linear-gradient(to bottom, #c192d1 5%, #c482fa 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c192d1', endColorstr='#c482fa',GradientType=0);
	background-color:#c192d1;
}
.buttong:active {
	position:relative;
	top:1px;
}


.buttonf {
	-moz-box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	-webkit-box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fc8d83), color-stop(1, #e4685d));
	background:-moz-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-webkit-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-o-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-ms-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:linear-gradient(to bottom, #fc8d83 5%, #e4685d 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fc8d83', endColorstr='#e4685d',GradientType=0);
	background-color:#fc8d83;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #d83526;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:25px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b23e35;
}
.buttonf:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e4685d), color-stop(1, #fc8d83));
	background:-moz-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-webkit-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-o-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-ms-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:linear-gradient(to bottom, #e4685d 5%, #fc8d83 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e4685d', endColorstr='#fc8d83',GradientType=0);
	background-color:#e4685d;
}
.buttonf:active {
	position:relative;
	top:1px;
}




.button {
	-moz-box-shadow: 0px 0px 0px 2px #f0e99e;
	-webkit-box-shadow: 0px 0px 0px 2px #f0e99e;
	box-shadow: 0px 0px 0px 2px #f0e99e;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e0eb17), color-stop(1, #ffa02b));
	background:-moz-linear-gradient(top, #e0eb17 5%, #ffa02b 100%);
	background:-webkit-linear-gradient(top, #e0eb17 5%, #ffa02b 100%);
	background:-o-linear-gradient(top, #e0eb17 5%, #ffa02b 100%);
	background:-ms-linear-gradient(top, #e0eb17 5%, #ffa02b 100%);
	background:linear-gradient(to bottom, #e0eb17 5%, #ffa02b 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e0eb17', endColorstr='#ffa02b',GradientType=0);
	background-color:#e0eb17;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
	border:1px solid #d1b426;
	display:inline-block;
	cursor:pointer;
	color:#3E3C3A;
	font-family:Arial;
	font-size:19px;
	padding:12px 37px;
	text-decoration:none;
	text-shadow:0px 1px 0px #a36332;
}
.button:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffa02b), color-stop(1, #e0eb17));
	background:-moz-linear-gradient(top, #ffa02b 5%, #e0eb17 100%);
	background:-webkit-linear-gradient(top, #ffa02b 5%, #e0eb17 100%);
	background:-o-linear-gradient(top, #ffa02b 5%, #e0eb17 100%);
	background:-ms-linear-gradient(top, #ffa02b 5%, #e0eb17 100%);
	background:linear-gradient(to bottom, #ffa02b 5%, #e0eb17 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffa02b', endColorstr='#e0eb17',GradientType=0);
	background-color:#ffa02b;
}
.button:active {
	position:relative;
	top:1px;
}


      .demoInputBox1{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
      .status-available1{color:#A569BD;}
      .status-not-available1{color:#E74C3C;}
    }


      
      .demoInputBox2{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
      .status-available2{color:#A569BD;}
      .status-not-available2{color:#E74C3C;}

    p.thick {
    font-weight: bold;
}



/*//////////////////  checkmark /////////*/
	.containerins12 {
			display: flex;
			position: relative;
			padding-left: 35px;
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
</head>



<body class="top-header">

    <!-- LOADER TEMPLATE -->
   
    <!-- /LOADER TEMPLATE -->

    <div class="top-bar bg-dark " id="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="top-bar-left text-white">
                        <span class="ml-2"></span>
                    </div>
                </div>

                <div class="col-lg-4 ml-lg-auto col-md-6">
                    <ul class="d-flex list-unstyled header-socials float-lg-right">
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="logo-bar d-none d-md-block d-lg-block bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo d-none d-lg-block">
                        <!-- Brand -->
                        <a class="navbar-brand js-scroll-trigger" href="index.php">
                                   <img style="width: 300px;" src="assets/img/fav_kainoi - Copy.gif">
                        </a>
                    </div>
                </div>

                
            </div>
        </div>
    </div>

    <!-- NAVBAR
    ================================================= -->
    <div class="main-navigation" id="mainmenu-area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary main-nav navbar-togglable">

                <a class="navbar-brand d-lg-none d-block" href="">
                    <h4></h4>
                </a>
                <!-- Toggler 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>-->

                <!-- Collapse -->
                
            </nav>
        </div> <!-- / .container -->
    </div>
    <br>
    <br>
     <!-- SERVICE-1
    ================================================== -->
    <section class="bg-grey" id="service">
        <div  style="margin: 30px 30px;">
         
            <form   class="form"  name="Reg_result" method="post" action="code_result.php" onSubmit="JavaScript:return fncSubmit();">
             <div style=" padding: 50px 0; background-color: #7AF4CB; margin-top: 20px; border-radius: 6px ; border: 3px solid #000000;padding: 5px;">
              <span>&nbsp;&nbsp;&nbsp;กรุณากรอก LABNUMBER : </span><input style="padding-left: 8px;opacity: 5; border-radius: 20px; height: 60px;"  type="text" id="LABNUMBER" name="LABNUMBER" value="<?PHP echo $stickerhos.'-w-';?>"  class="demoInputBox" required>

                                  
                                 
                                               <!--     <div  style="font-size: 20px; font-weight: bold; padding-top: 5px;"> กรุณาเลือก ลงผลการตรวจ :  </div>
                                                       <label class="containerins123">&nbsp;ผลการตรวจหาการติดเชื้อเอชไอวี <input type="checkbox" id="yesCheck1"  name="Keytest1" value="1" onclick="javascript:yesnoCheck();">
                                                        <span class="checkmarkins123"></span>
                                                       </label>
                                                     <label class="containerins123">&nbsp;ผลการตรวจ viral load<input type="checkbox" id="yesCheck2"  name="Keytest2" value="2" onclick="javascript:yesnoCheck();">
                                                      <span class="checkmarkins123"></span>
                                                       </label>
                                                      <label class="containerins123">&nbsp;ผลการตรวจซิฟิลิส<input type="checkbox" id="yesCheck3"  name="Keytest3" value="3" onclick="javascript:yesnoCheck();">
                                                      <span class="checkmarkins123"></span>
                                                       </label>
                                                       <label class="containerins123">&nbsp;ผลการตรวจไวรัสตับอักเสบ<input type="checkbox" id="yesCheck4"  name="Keytest4" value="4" onclick="javascript:yesnoCheck();">
                                                      <span class="checkmarkins123"></span>
                                                       </label>
                                                          <label class="containerins123">&nbsp;ผลการตรวจ Recency<input type="checkbox" id="yesCheck5"  name="Keytest5" value="5" onclick="javascript:yesnoCheck();">
                                                      <span class="checkmarkins123"></span>
                                                       </label>                           
            </div>-->
             </div>
             <br>
                <!--  <div id= kt1  style="  display: none;">-->
               <div style="padding-left: 15px; padding-top: 15px; padding-bottom: 15px;  border-radius: 6px ; border: 3px solid #000000;">
            
                 
                                      <label style="text-align: left"><b>FINAL RESULT HIV</b></label>
                                        <label  class="containerins12" style="text-align: left;">POSITIVE<input type="radio" id="BMHIVRES_a" name="BMHIVRES" value="1">
                                       <span class="checkmarkins12"></span></label>
                                      
                                       <label class="containerins12" style="text-align: left;">NEGATIVE<input type="radio" id="BMHIVRES_b" name="BMHIVRES" value="2">
                                       <span class="checkmarkins12"></span></label>
                                       
                                         <label class="containerins12" style="text-align: left;">INCONCLUSIVE<input type="radio" id="BMHIVRES_c" name="BMHIVRES" value="3">
                                       <span class="checkmarkins12"></span></label>

                
               </div>
            
              
                              <br>
                       <!--  <div id= kt2  style="  display: none;">-->
                           <div style="padding-left: 15px; padding-top: 15px; padding-bottom: 15px;  border-radius: 6px ; border: 3px solid #000000;">
                               
                                  <label style="text-align: left"><b>Viral load result</b></label>&nbsp;
                                      
                                         
                                                                  โปรดระบุ <input style="padding-left: 8px;opacity: 5; border-radius: 20px; height: 60px;"  type="text" id="BMVLRES_OTH" name="BMVLRES_OTH"><span>&nbsp;&nbsp;copies/mL</span>
                                     
                                  
                         </div>
                        
                            <br>
                         <!-- <div id= kt3  style="  display: none;">-->
                           <div style="padding-left: 15px; padding-top: 15px; border-radius: 6px ; border: 3px solid #000000;">
                               
                           <!--        <label style="text-align: left"><b>Syphilis result</b></label>&nbsp;
                                        <label  class="containerins12" style="text-align: left;">REACTIVE <input type="radio" id="Syphilis_a" name="Syphilis" value="1">
                                       <span class="checkmarkins12"></span></label>
                                      
                                       <label class="containerins12" style="text-align: left;">NONREACTIVE<input type="radio" id="Syphilis_b" name="Syphilis" value="2">
                                       <span class="checkmarkins12"></span></label>
                                       
                                         <label class="containerins12" style="text-align: left;">INDETERMINATE<input type="radio" id="Syphilis_c" name="Syphilis" value="3">
                                       <span class="checkmarkins12"></span></label>-->
                                  <div class="row">
                                   <div class="col-sm-6">
                                  <label style="text-align: left"><b>ผลตรวจวิธี RPR</b></label>&nbsp;
                                        <label  class="containerins12" style="text-align: left;">REACTIVE <input type="radio" id="Syphilis_a" name="Syphilis" value="1">
                                       <span class="checkmarkins12"></span></label>

                                       <label class="containerins12" style="text-align: left;">NONREACTIVE<input type="radio" id="Syphilis_b" name="Syphilis" value="2">
                                       <span class="checkmarkins12"></span></label>
                                        triter 1:<input style="padding-left: 8px;opacity: 5; border-radius: 20px; height: 60px;"  type="text" id="titer_OTH" name="titer_OTH">
                                       
                                  </div>
                                   <div class="col-sm-6">
                                  <label style="text-align: left"><b>ผลตรวจวิธี TP Test</b></label>&nbsp;
                                        <label  class="containerins12" style="text-align: left;">REACTIVE <input type="radio" id="TP_a" name="TP" value="1">
                                       <span class="checkmarkins12"></span></label>
                                      
                                       <label class="containerins12" style="text-align: left;">NONREACTIVE<input type="radio" id="TP_b" name="TP" value="2">
                                       <span class="checkmarkins12"></span></label>
                                       
                                  </div>
                         </div>
                       
                            <br>
                         <!-- <div id= kt4  style="  display: none;">    -->
                           <div style="padding-left: 15px; padding-top: 15px; border-radius: 6px ; border: 3px solid #000000;">
                               
                                  <label style="text-align: left"><b>HBsAg Result</b></label>&nbsp;
                                        <label  class="containerins12" style="text-align: left;">Positive<input type="radio" id="HB_a" name="HB" value="1">
                                       <span class="checkmarkins12"></span></label>
                                      
                                       <label class="containerins12" style="text-align: left;">Negative<input type="radio" id="HB_b" name="HB" value="2">
                                       <span class="checkmarkins12"></span></label>
                                       
                                    <!--     <label class="containerins12" style="text-align: left;">INDETERMINATE<input type="radio" id="HB_c" name="HB" value="3">
                                       <span class="checkmarkins12"></span></label>-->
                                  
                         </div>
                           <br>
                           <div style="padding-left: 15px; padding-top: 15px; border-radius: 6px ; border: 3px solid #000000;">
                               
                                  <label style="text-align: left"><b>Anti-HCV Result</b></label>&nbsp;
                                        <label  class="containerins12" style="text-align: left;">Positive<input type="radio" id="HC_a" name="HC" value="1">
                                       <span class="checkmarkins12"></span></label>
                                      
                                       <label class="containerins12" style="text-align: left;">Negative<input type="radio" id="HC_b" name="HC" value="2">
                                       <span class="checkmarkins12"></span></label>
                                       
                                    <!--       <label class="containerins12" style="text-align: left;">INDETERMINATE<input type="radio" id="HC_c" name="HC" value="3">
                                       <span class="checkmarkins12"></span></label>-->
                                  
                         </div>
                       
                             <br>
                          <!--<div id= kt5  style="  display: none;">-->
                           <div style=" padding-left: 15px; padding-top: 15px; border-radius: 6px ; border: 3px solid #000000;">
                               
                                  <label style="text-align: left"><b>RTRI Result</b></label>&nbsp;
                                        <label  class="containerins12" style="text-align: left;">Recent <input type="radio" id="Recency_a" name="Recency" value="1">
                                       <span class="checkmarkins12"></span></label>
                                      
                                       <label class="containerins12" style="text-align: left;">Long term<input type="radio" id="Recency_b" name="Recency" value="2">
                                       <span class="checkmarkins12"></span></label>
                                       
                                        <label class="containerins12" style="text-align: left;">INCONCLUSIVE<input type="radio" id="Recency_c" name="Recency" value="3">
                                       <span class="checkmarkins12"></span></label>
                                        
                                         <label class="containerins12" style="text-align: left;">INVALID<input type="radio" id="Recency_d" name="Recency" value="4">
                                       <span class="checkmarkins12"></span></label>
                                       
                         </div> 
                     
                  <br>
                       <!-- <center>
                     <button type='submit'   id='submit' class='buttonf' ><h4><font color='#ffffff'>ตกลง</font></h4></button>
                               <center><button type='submit'   id='submit' class='buttonf' style =  'display: none;'><h4>ส่ง</h4></button></center><br>
                      </center>-->
                     
                        <center><button type='submit'   id='submit' class='buttonf'>ส่งผลการตรวจ</button>
                        <button type='button'   id='back' class='buttonf' onclick="location.replace('selects.php');" />กลับไปหน้าหลัก</button></center><br>
                                
               
          </form>
         </div>
          <br>
        <br>
        <br>

       
    </section>
  
    <div class="main-navigation" id="mainmenu-area">
     <div  style="margin: 30px 30px;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary main-nav navbar-togglable">

                <a class="navbar-brand d-lg-none d-block" href="">
                    <h4></h4>
                </a>
                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span ></span>
                </button>

                <!-- Collapse -->
                
            </nav>
        </div> <!-- / .container -->
    </div>
    <br>
    <br>
    



    <!-- FOOTER
    ================================================== -->
    <footer class="section " id="footer">
        <div class="overlay footer-overlay">
        <!--Content -->
        <div class="container" style="color: #FFFFFF;">
       <center><br><br><br>Copyright © 2019 <a href="http://kainoi.net/">kainoi.net</a>. All rights reserved. Designed & developed by <a href="http://kainoi.net/">kainoi.net</a></center>
        </div>
        </div> <!-- / .container -->
    </footer>


    <!--  Page Scroll to Top  -->

    <a class="scroll-to-top js-scroll-trigger" href=".top-header">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Global JS -->
   <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slick JS -->
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <!-- Theme JS -->
    <script src="assets/js/theme.js"></script>
    
        <script>

    
      function checkAvailability() {

        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_labnumber.php",
        data:'LABNUMBER='+$("#LABNUMBER").val(),
        type: "POST", 
        success:function(data){
       
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
     },
        error:function (){
       
        }  
        }
        
        );

      }
      </script>


</body>

</html>