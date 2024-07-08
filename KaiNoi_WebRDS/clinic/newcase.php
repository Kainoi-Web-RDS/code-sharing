<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php');
  $USERS = $_SESSION['USERS'];
  $HOS = $_SESSION["HOS"]; 
  $STATUS = $_SESSION['STATUS'];
	if($STATUS!='1'){
    Header("Location: logout.php");  
  }
          if($conn_rds->connect_error)
                                                    {
                                                        die("Connection failed: " . $conn_rds->connect_error);
                                                    }
                          
                                      $query1 = "SELECT * FROM LABUSER WHERE USERS='$USERS'";
                                      $result = $conn_rds->query($query1);
                                      //$user_count1 = mysqli_num_rows($result);
                                      $row = $result->fetch_assoc();
                                      $h_name = $row["name"];
                                      $h_lname = $row["lname"];
                                      $hos_data = $row["HOS"];
                                      
                                        $hos_data  =$HOS;
                                      
                                      if($hos_data==1){
                                       $hos_name = 'รพ.กลาง';
                                      }elseif($hos_data==2){
                                        $hos_name = 'รพ.เจริญกรุงประชารักษ์';
                                       }elseif($hos_data==3){
                                        $hos_name = 'รพ.ตากสิน';
                                      }elseif($hos_data==4){
                                        $hos_name = 'รพ.ราชพิพัฒน์';
                                      }elseif($hos_data==5){
                                        $hos_name = 'รพ.ลาดกระบัง กรุงเทพมหานคร';
                                      }elseif($hos_data==6){
                                        $hos_name = 'รพ.เวชการุณย์รัศมิ์';
                                      }elseif($hos_data==7){
                                        $hos_name = 'รพ.ศูนย์บริการสาธารณสุข 28 กรุงธนบุรี';
                                      }elseif($hos_data==8){
                                        $hos_name = 'รพ.สิรินธร';
                                      }elseif($hos_data==9){
                                        $hos_name = 'รพ.หลวงพ่อทวีศักดิ์ ชุตินฺธโร อุทิศ';
                                      }elseif($hos_data==10){
                                        $hos_name = 'สภากาชาดไทย : คลินิกนิรนาม';
                                      }elseif($hos_data==11){
                                        $hos_name = 'รพ.สารภี (เชียงใหม่)';
                                      }elseif($hos_data==12){
                                        $hos_name = 'มูลนิธิเอ็มพลัส Mplus+(เชียงใหม่)';
                                      }elseif($hos_data==13){
                                        $hos_name = 'ศูนย์สุขภาพ แคร์แมท CAREMAT(เชียงใหม่)';
                                      }
                                      
                                      
                                      
                                      
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
	font-size:15px;
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
  </style>
</head>


<body class="top-header">

    <!-- LOADER TEMPLATE -->
    <div id="page-loader">
        <div class="loader-icon fa fa-spin colored-border"></div>
    </div>
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

                <div class="col-lg-8 justify-content-end ml-lg-auto d-flex col-12">
                    <div class="top-info-block d-inline-flex">
                        <div class="icon-block">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="info-block">
                            <h5 class="font-weight-500">087-7711666</h5>
                            <p> วัชรพล ผู้จัดการโครงการ</p>
                        </div>
                    </div>

                    <div class="top-info-block d-inline-flex">
                        <div class="icon-block">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="info-block">
                            <h5 class="font-weight-500">081-1422485</h5>
                            <p>ภาณุพิชญ์ โปรแกรมเมอร์</p>
                        </div>
                    </div>
                    <div class="top-info-block d-inline-flex">
                        <div class="icon-block">
                            <i class="ti-time"></i>
                        </div>
                        <div class="info-block">
                            <h5 class="font-weight-500">Mon-Fri 9:00-16.00 </h5>
                            <p>Sat,Sun Closed</p>
                        </div>
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
                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                
            </nav>
        </div> <!-- / .container -->
    </div>
    <br>
    <br>
    <!-- SERVICE-1
    ================================================== -->
    <section class="bg-grey" id="service">
        <div class="container">
            <form   class="form-inline"  name="Reg_isjoin" method="post" action="code_approve.php" onSubmit="JavaScript:return fncSubmit();">
            <div class="row ">
                <div class="col-lg-4">
                    <div class="service-img-responsive">
                        <img src="assets/img/p9new.png" alt="" class="img-fluid">
                    </div>
                </div>
           
                <div class="col-lg-8" >
                    <center> <h2>ยินดีต้อนรับ<br>เจ้าหน้าที่ให้การปรึกษา</h2>
                <p>สวัสดีครับ กรุณากรอกข้อมูลผู้มาตรวจเลือด kainoi.net เพื่อ <b style="color: #FF0000;">ตรวจสอบ </b>ข้อมูล</p></center><br>
                <br>
                
             
                
                 <div class="table-responsive">          
                     <table class="table">
                       <thead>
                         <tr>
                           <td><label style="text-align: left">ชื่อคลินิก</label></td>
                           
                           <td><b style="opacity: 5; border-radius: 15px;  width: 200px;height: 40px; font-size: 16px; text-align: center;"><?php echo $hos_name; ?></b>
             
                           </td>
                         </tr>
                       </thead>
                       <tbody>
                            <tr>
                           <td><label style="text-align: left">หมายเลขโทรศัพท์ผู้มาตรวจเลือด</label></td>
                           <td><input type ="tel" class="form-control demoInputBox1"  style="opacity: 5; border-radius: 15px;  width: 200px;height: 40px; font-size: 20px; text-align: center;" maxlength="10" id ="BMRETEL1" name="BMRETEL1" onkeypress="isInputNumber(event)"  required placeholder="----------"></td>
                         </tr>
                            <tr>
                           <td><label style="text-align: left">* ยืนยันหมายเลขโทรศัพท์</label></td>
                           <td><input type ="tel" class="form-control"  style="opacity: 5; border-radius: 15px;  width: 200px;height: 40px; font-size: 20px; text-align: center;" maxlength="10" id ="BMRETEL2" name="BMRETEL2" onkeypress="isInputNumber(event)"  required placeholder="----------"></td>
                         </tr>
                            <tr>
                          
                           <td><label style="text-align: left">ชื่อเจ้าหน้าที่คลินิก</label></td>
                           <td><?php echo $h_name;echo " "; echo $h_lname; ?></td> </tr>
                            <tr>
                           <td></td>
                           <td>
                                 
                                  <button type="button" class="buttonf" onclick ="checkAvailability()" >ตรวจสอบ</button>
                                 <img width= "75px" height="60px" src="img/LoaderIcon.gif" id="loaderIcon" style="display:none" />
                                 
                                     <div class="modal fade" id="myModal" role="dialog">
                                       <div class="modal-dialog">
                                       
                                         <!-- Modal content-->
                                         <div class="modal-content">
                                           <div class="modal-header"><center><h3><b>kainoi.net</b></h3></center>
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                           </div>
                                           <div class="modal-body">
                                            <form name="chkotpform" id="chkotpform" method="POST" action="" onSubmit="JavaScript:return fncSubmit2();">
                                             <center><span id="user-availability-status1"></span>
                                              <p id='ps' style = 'font-size: 20px; font color=#000000; display: none;'>กรุณากรอก OTP ของผู้เข้าร่วมโครงการ  <br></p>
                                              
                                              <input type="text"  maxlength="4" style="display:none; opacity: 5; border-radius: 15px;  width: 200px;height: 40px; font-size: 20px; text-align: center;" onkeypress="isInputNumber(event)"  class="form-control demoInputBox2" id="otpinput" name="otpinput" placeholder="--4 หลัก--" style="opacity: 5; border-radius: 15px;  width: 200px;height: 40px; font-size: 16px; text-align: center;">
                                              <br>
                                               <button type='button'   id='submit1' class='buttonf' style =  'display: none;' onclick ="checkAvailability2()"><h4><font color='#ffffff'>ยืนยัน</font></h4></button>
                                               </form>
                                               
                                               <p><center><img width= "75px" height="60px" src="img/LoaderIcon2.gif" id="loaderIcon2" style="display:none" /></center></p>
                                                  <br>
                                                <center><span id="user-availability-status2"></span></center>
                                                   <p id='ps2' style = 'font-size: 20px; font color=#000000; display: none;'>โปรดขอคำยินยอม<br>เพื่อเข้าสู่กระบวนการ
                                                     <!-----------------------form ยินยอม----------------------------------------------------------->
                                                  <br>
                                                  <div  id='ps3'  style=" display: none; padding: 50px 0; background-color: #FFF9FA; margin-top: 20px; border-radius: 6px ; border: 3px solid #000000;padding: 5px;">
                                                     
                                                     <table class="table">
                                                    <tbody>
                                                    <tr>
                                                    <td>
                                                      <div  style="font-size: 20px; font-weight: bold; padding-top: 5px;">ขอคำยินยอม เจาะเลือด:  </div>
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                    <td>
                                                      <label class="containerins12" style="font-size: 20px; font-weight: bold; justify-content: left;">&nbsp;ยินดี
                                                       <input type="radio" name="BMCONS" id="yesCheck"  value="1" onclick="javascript:yesnoCheck();">
                                                      <span class="checkmarkins12"></span>
                                                       </label>
                                                    </td>
                                                    <td>
                                                        <label class="containerins12" style="font-size: 20px; font-weight: bold; justify-content: left;">&nbsp;ไม่ยินดี
                                                        <input type="radio" name="BMCONS" id="noCheck" value="2" onclick="javascript:yesnoCheck();"><br>
                                                        <span class="checkmarkins12"></span>
                                                        </label>
                                                          <div id="ifNo" style="display:none; padding: 50px 0; background-color: #F77B94; margin-top: 20px; border-radius: 6px ; border: 3px solid #000000;padding: 5px;">
                                                                <div  style="font-size: 20px; font-weight: bold; padding-top: 5px;">กรุณาระบุสาเหตุหลักที่คุณไม่ตรวจเลือด :  </div>
                                                                   <label class="containerins12" style="font-size: 20px; font-weight: bold; justify-content: left;">&nbsp;ทราบผลตรวจแล้ว <input type="radio" id="yesCheck1"  name="RFBIO" value="1" onclick="javascript:yesnoCheck2();">
                                                                    <span class="checkmarkins12"></span>
                                                                   </label>
                                                                 <label class="containerins12" style="font-size: 20px; font-weight: bold; justify-content: left;">&nbsp;รับการรักษาด้วยยาต้านไวรัสอยู่<input type="radio" id="yesCheck2"  name="RFBIO" value="2" onclick="javascript:yesnoCheck2();">
                                                                  <span class="checkmarkins12"></span>
                                                                   </label>
                                                                  <label class="containerins12" style="font-size: 20px; font-weight: bold; justify-content: left;">&nbsp;ไม่มีเวลา<input type="radio" id="yesCheck3"  name="RFBIO" value="3" onclick="javascript:yesnoCheck2();">
                                                                  <span class="checkmarkins12"></span>
                                                                   </label>
                                                                   <label class="containerins12" style="font-size: 20px; font-weight: bold; justify-content: left;">&nbsp;ค่าตอบแทนน้อย<input type="radio" id="yesCheck4"  name="RFBIO" value="4" onclick="javascript:yesnoCheck2();">
                                                                  <span class="checkmarkins12"></span>
                                                                   </label>
                                                                  <label class="containerins12" style="font-size: 20px; font-weight: bold; justify-content: left;">&nbsp;อื่นๆ<input type="radio" id="noCheck1" name="RFBIO" value="5" onclick="javascript:yesnoCheck2();">
                                                                  <span class="checkmarkins12"></span>
                                                                   </label>
                                                                 
                                                                <div id="ifNo2" style="display:none; font-size: 20px; font-weight: bold; justify-content: left;"> อื่นๆ โปรดระบุ<input style="opacity: 5; border-radius: 20px; height: 35px;"  type="text" id="RFBIO_OTH" name="RFBIO_OTH"><br>
                                                                </div>
                                                           </div>
                                                     
                                                    </td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                                     
                                                    
                                                  </div>
                                                  </p>
                                                   <br>
                                                 <button type='submit2'   id='submit2' class='buttonf' style =  'display: none;'><h4><font color='#ffffff'>ตกลง</font></h4></button>
                                            
                                              </center>
                                          
                                           </div>
                                         
                                         </div>
                                         
                                       </div>
                                     </div><!-- close modal-->
                             </td>
                            </tr>
                       </tbody>
                     </table>
                     
                 </div>
                  <br>
                     <center>
                    
                     </center>
               </div>
             </div>
          </form>
         </div>
          <br>
        <br>
        <br>
          <br>
        <br>
        <br>
        
    </section>
    <!-- SERVICE-2
    ================================================== 
  
      <section class="bg-grey" id="service">
        <div class="container">
         <div class="form-group">
                                            <div  id="myDIV" class="sec-title text-center">
                                               <center><font color='#000000'>กรุณาใส่เบอร์ที่ตรวจสอบ</font></center>
                                        
                                            </div>
                                        </div>
        </div>
        <br>
        <br>
        <br>
    </section>-->
     <!-- NAVBAR
    ================================================= -->
    <div class="main-navigation" id="mainmenu-area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary main-nav navbar-togglable">

                <a class="navbar-brand d-lg-none d-block" href="">
                    <h4></h4>
                </a>
                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
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
     
                var x = document.forms["Reg_isjoin"]["BMRETEL1"].value;
                var y = document.forms["Reg_isjoin"]["BMRETEL2"].value;
              
                 if(x  == "")
                {
                  alert('โปรดใส่เบอร์โทรศัพท์ช่องที่1');
                  document.Reg_isjoin.BMRETEL1.focus();
                  return false;
                }
               else if ( x.length < 10) {
                      alert('ระบุเลขโทรศัพท์มือถือจำนวน 10 หลัก');
                      document.Reg_isjoin.BMRETEL1.focus();
                      return false;
                    }
                if(y  == "")
                {
                  alert('โปรดใส่เบอร์โทรศัพท์ช่องที่2');
                  document.Reg_isjoin.BMRETEL2.focus();
                  return false;
                }
               else if ( y.length < 10) {
                      alert('ระบุเลขโทรศัพท์มือถือจำนวน 10 หลัก');
                      document.Reg_isjoin.BMRETEL2.focus();
                      return false;
                    }
                 if(x  != y){
                  alert('เบอร์โทรศัพท์ที่ระบุุ กรอกไม่เหมือนกัน');

                      return false;
                 }else
                   
             $('#myModal').modal('show');
    
      
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'BMRETEL1='+$("#BMRETEL1").val(),
        type: "POST", 
        success:function(data){
       
        $("#user-availability-status1").html(data);
       $("#loaderIcon").hide();
     },
        error:function (){
       
        }  
        }
        
        );
        
      }
      </script>
        <script>
      function checkAvailability2() {
     
        $("#loaderIcon2").show();
        jQuery.ajax({
        url: "check_availability2.php",
        data:'otpinput='+$("#otpinput").val(),
        type: "POST", 
        success:function(data){
       
        $("#user-availability-status2").html(data);
       $("#loaderIcon2").hide();
     },
        error:function (){
       
        }  
        }
        
        );
      }
      </script>
      <script language="javascript">
              function fncSubmit()
              {
                 var 
                     radio1 = document.Reg_isjoin.BMCONS_a,
                     radio2 = document.Reg_isjoin.BMCONS_b,
                     
             
           
           
               if( radio1.checked==false && radio2.checked==false ){
                   alert('โปรดเลือกคำตอบของท่าน.');
                   return false;
                   }
                   return true;
             
              else
                document.Reg_isjoin.submit();
              }
      </script>
    <script>
   

</script>
    

    <script>

     
     
              $("#BMRETEL1").keypress(function(event){
                       var keycode = event.which;
                           if( $(this).val().length === 10 ) { 
                                       return false;
                           }else{
                                       if (!(keycode >= 48 && keycode <= 57)) {
                                           event.preventDefault();   
                                       }
                           }      
               
                       
                   });
     </script>
      <script>
              $("#BMRETEL2").keypress(function(event){
                       var keycode = event.which;
                           if( $(this).val().length === 10 ) { 
                                       return false;
                           }else{
                                       if (!(keycode >= 48 && keycode <= 57)) {
                                           event.preventDefault();   
                                       }
                           }      
               
                       
                   });
     </script>
   <script language="javascript">
       /*       function fncSubmit2()
              {
                var x = document.forms["chkotpform"]["otpinput"].value;
                if(x  == "")
                {
                  alert('โปรดใส่ รหัส OTP');
                  document.chkotpform.otpinput.focus();
                  return false;
                }
               else if ( x.length < 4) {
                      alert('ระบุเลขจำนวน 4 หลัก');
                      document.chkotpform.otpinput.focus();
                      return false;
                    }
              else
                document.chkotpform.submit2();
              }*/
      </script>
    <script>
              $("#otpinput").keypress(function(event){
                       var keycode = event.which;
                           if( $(this).val().length === 4) { 
                                       return false;
                           }else{
                                       if (!(keycode >= 48 && keycode <= 57)) {
                                           event.preventDefault();   
                                       }
                           }      
               
                       
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
</body>

</html>