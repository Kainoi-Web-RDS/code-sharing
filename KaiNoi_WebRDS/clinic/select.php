<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php'); 
   $USERS= $_SESSION['USERS'];
   $HOS = $_SESSION['HOS'];
  $STATUS = $_SESSION['STATUS'];
	if($STATUS!='1'){
    Header("Location: logout.php");  
  }
  
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
                                      }elseif($hos_data==0){
                                        $hos_name = 'ส่วนกลาง';
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


    #myDIV {
      width: 100%;
      font-size: 20px;
      padding: 50px 0;
      text-align: center;
      background-color: lightgreen;
      margin-top: 20px;
     /*display: none;*/
      border-radius: 6px ;
      border: 3px solid #000000;
      padding: 5px;
      
      .demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
      .status-available{color:#A569BD;}
      .status-not-available{color:#E74C3C;}
    }

    #myDIV2 {
   width: 100%;
      font-size: 20px;
      padding: 50px 0;
      text-align: center;
      background-color: lightyellow;
      margin-top: 20px;
     /*display: none;*/
      border-radius: 6px ;
      border: 3px solid #000000;
      padding: 5px;
      
      .demoInputBox2{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
      .status-available2{color:#A569BD;}
      .status-not-available2{color:#E74C3C;}
    }
    p.thick {
    font-weight: bold;
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
        <div class="container">
        <form action="logout.php">
       <h3><?php // echo $name; ?>  </h3>
       <input type="submit" class="btn btn-danger" style="opacity: 5; border-radius: 20px;" value="ออกจากระบบ">
       </form><br>
        <center><h3>เจ้าหน้าที่โปรดเลือก ดังนี้</h3></center>
            <div class="row ">
                <div class="col-lg-6">
                            <a href="newcase.php"><div class="service-content"   <div class="container" style=" background: linear-gradient(-60deg, rgb(0, 144, 255) 0%, rgb(0, 204, 249) 0%, rgb(255, 255, 255) 100%); opacity: 5px;  border-radius: 20px ; border: 3px solid #000000;">
                           <center><font color='#3E3C3A'><h2>เจ้าหน้าที่ให้การปรึกษา<br>
                                     ตรวจสอบตัวตน ของผู้เข้าร่วมโครงการ </h2></font>
                           	<img width="150px" src="assets/img/p1.png"></a>
                   
                                       
                           <br><br>
                    </div>
                </div>
             
             <div class="col-lg-6">
                       <a href="accept.php"><div class="service-content"   <div class="container" style=" background: linear-gradient(-60deg, rgb(237, 166, 0) 0%, rgb(255, 225, 56) 0%, rgb(255, 255, 255) 100%); opacity: 5px;  border-radius: 20px ; border: 3px solid #000000;">
                      
                           <center><font color='#3E3C3A'><h2>
                                  เจ้าหน้าที่จ่ายค่าตอบแทน </h2></font>
                        <img width="150px" src="assets/img/kai8-1.png"></a>
                      	
                                       
                           <br><br>
                    </div>
                    
              </div>
             </div>
            <br>
            <div class="row ">
                <div class="col-lg-12">
                          <!--summary <a href="caseresult.php"><div class="service-content"   <div class="container" style=" background: linear-gradient(-60deg, rgb(237, 166, 0) 0%, rgb(255, 225, 56) 0%, rgb(255, 255, 255) 100%); opacity: 5px;  border-radius: 20px ; border: 3px solid #000000;">-->
                      
                            <a href="caseresult.php"><div class="service-content"   <div class="container" style="  background: linear-gradient(60deg, rgb(1, 147, 40) 0%, rgb(0, 247, 90) 0%, rgb(255, 255, 255) 100%); opacity: 5px;  border-radius: 20px ; border: 3px solid #000000;">
                           <center><font color='#3E3C3A'><h2> ค้นหา ผู้เข้าร่วมโครงการ <br>"<?php echo $hos_name; ?>"</h2></font>
                         
                           	<img width="150px" src="assets/img/p9new.png"></a>
                   
                                       
                           <br><br>
                    </div>
                </div> 
             </div>
                      
         </div>
    </section><br><br><br><br>
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
        <div class="container">
<center><br><br><br>Copyright © 2019 <a href="http://kainoi.net/">kainoi.net</a>. All rights reserved. Designed & developed by <a href="http://kainoi.net/">kainoi.net</a></center>
        </div></div> <!-- / .container -->
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
    

</body>

</html>