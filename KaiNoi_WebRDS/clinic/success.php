<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php'); 
  $STATUS = $_SESSION['STATUS'];
	if($STATUS!='1'){
    Header("Location: logout.php");  
  }  
$mobilephoneEX2 = $_SESSION["mobilephoneEX2"]; //encode

        
         
         
          
           $sql = "select * from tbanswer where REGMOBILE ='$mobilephoneEX2'";
           $result_srs = $conn_rds->query($sql);
           $row_sr = $result_srs->fetch_assoc();
           
           $STATUS_LAB =$row_sr['STATUS_LAB'];
           
  
           
                             
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
     <link rel="stylesheet" href="dist2/css/bootstrap/zebra_datepicker.min.css" type="text/css">
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
        <div class="container">  <br>
     
           <br>
           <br>
           <br>
          <center><h2>CODE kainoi.net <b style="color: #FF0000;"><?php ;?> </b>บันทึกเข้าระบบเรียบร้อย </h2></center> <br>
           <center>
          <form   class="form"  name="Reg_result" method="post" action="" onSubmit="JavaScript:return fncSubmit();">
           <div  id="ifpayclose" style="display:show;">
            <b>กดปุ่มเพื่อจ่ายเงินค่าตอบแทน</b><br>
          <button type="button" class="buttonf" data-toggle="modal" data-target="#myModal">จ่ายเงินค่าตอบแทน</button>
           
         
            
                    <div class="modal fade" id="myModal" role="dialog">
                                       <div class="modal-dialog">
                                       
                                         <!-- Modal content-->
                                         <div class="modal-content">
                                           <div class="modal-header"><center><h3><b>kainoi.net</b></h3></center>
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                           </div>
                                           <div class="modal-body">
                                           <center>
                                               <b>ระบบได้ส่งรหัสบัตรเงินสด  True Money ไปยังหมายเลขเรียบร้อยแล้ว</b>
                                               
                                            <?php
                                            
                                           if($STATUS_LAB==2){
                                                  $sql_t500 = "select BMRECID,BMRETEL1,T500 from tblab where BMRETEL1 = '$mobilephoneEX2'";
                                                  $result_t500 = $conn_rds->query($sql_t500);
                                                  $num_rows = mysqli_num_rows($result_t500);
                                                  $row_t = $result_t500->fetch_assoc();
                                                  $ck_t500 =$row_t['T500'];
                                                  $ck_tel =$row_t['BMRETEL1'];
                                                  $rds_code =$row_t['BMRECID'];
                                                   
                                                   error_reporting( error_reporting() & ~E_NOTICE );
                                                 function decode($string,$key) {
                                                  $key = sha1($key);
                                                  $strLen = strlen($string);
                                                  $keyLen = strlen($key);
                                                  for ($i = 0; $i < $strLen; $i+=2) {
                                                   $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
                                                   if ($j == $keyLen) { $j = 0; }
                                                   $ordKey = ord(substr($key,$j,1));
                                                   $j++;
                                                   $hash .= chr($ordStr - $ordKey);
                                                  }
                                                  return $hash;
                                                 }
                                                
                                                 $datenow = date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
                                                 $mobilephoneEX = decode($ck_tel,"w-e-b-r-d-s");

																																																 $tel_users = $mobilephoneEX;
																																														 		$change_moblie = substr($tel_users,1,9);
																																																 $new_moblie = 66000000000+$change_moblie;
                                                  
                                                
                                                  if($ck_t500 == NULL){
                                                    /////////////////////////////////
                                                       
                                                                                   $T500 = 1;
                                                                                  
                                                                                   $sql_t = "UPDATE tblab SET";                                                                                                          
                                                                                   $sql_t.= " T500='$T500',";                                                                                                                
                                                                                   $sql_t.= " LASTUPDATE='$datenow'";                                                                                                                                                               
                                                                                   $sql_t.= "WHERE BMRETEL1 ='$mobilephoneEX2'";
                                                                                   $result_t = $conn_rds->query($sql_t);
                                                                                   
                                      
                                        $url = "https://www.kainoi.net/incentive.php";
                                        //$encode_phone = encode('0811422485',"w-e-b-r-d-s") ;
                                        //$encode_phone =  $ck_tel;
                                        $encode_phone =  $mobilephoneEX2;
                                        $fields = [
                                            'rds_code' => $rds_code,
                                            'm_phone' => $encode_phone,
                                            'pay_type' => 'L',
                                            //'pay_type' => 'L',   
                                            'pay_value' => '500'
                                        ];
                                        
                                        $fields_string = http_build_query($fields);
                                         
                                       /*  echo $url;
                                         echo "<BR>";
                                        echo $rds_code;
                                         echo "<BR>";
                                        echo $encode_phone;
                                        echo "<BR>";
                                       
                                         echo "<BR>";
                                        echo $fields_string;
                                        echo "<BR>";*/

                                        //open connection
                                      
                                        
                                        //So that curl_exec returns the contents of the cURL; rather than echoing it
                                     
                                        //echo $result;
                                      
                                
                                        
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                                        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                                        
                                        $httpCode = curl_getinfo($ch , CURLINFO_HTTP_CODE); // this results 0 every time
                                        $response = curl_exec($ch);
                                        
                                        if ($response === false) 
                                            $response = curl_error($ch);
                                        
                                       // echo stripslashes($response);
                                        
                                        curl_close($ch);
                                                                
                                                                                   
                                                    echo "<br>";
                                                    echo  "<b>$mobilephoneEX<b>";
                                      //  curl_close($ch);            
                                                  }
                                           else{
                                                    echo "<br>";
                                                    echo  "<b>$mobilephoneEX<b>";
                                                   }
                                            }
                                            ?>
                                           </center>
                                           </div>
                                           <div class="modal-footer">
                                             <button type="button" class="buttonf" data-dismiss="modal" id="ok" >ปิด</button>
                                           </div>
                                         </div>
                                         
                                       </div>
                     </div>
           </div>
                                <br>
                                        <div  id="ifpay" style="display:none;">
                                            <br>
                                               <button type="button" name="button"  class="buttong" onclick="window.location.href='select.php'">กลับไปหน้าแรก</button>
                                           </div>
                 </center>
          </form>
         </div>
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
 ]
    <script>
 
  
      $("#ok").click(function(){
      $("#ifpay").show();
       $("#ifpayclose").hide();

      });
            
</script>

  

</body>

</html>