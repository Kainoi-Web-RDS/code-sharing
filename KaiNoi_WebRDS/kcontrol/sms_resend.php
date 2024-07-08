<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php'); 

  
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

    .demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
      .status-available{color:#000000;}
      .status-not-available{color:#E74C3C;}
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


.buttonh {
	-moz-box-shadow:inset 0px 1px 0px 0px #11F468;
	-webkit-box-shadow:inset 0px 1px 0px 0px #11F468;
	box-shadow:inset 0px 1px 0px 0px #11F468;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #11F468), color-stop(1, #0A8222));
	background:-moz-linear-gradient(top, #0A8222 5%, #11F468 100%);
	background:-webkit-linear-gradient(top, #0A8222 5%, #11F468 100%);
	background:-o-linear-gradient(top, #0A8222 5%, #11F468 100%);
	background:-ms-linear-gradient(top, #0A8222 5%, #11F468 100%);
	background:linear-gradient(to bottom, #0A8222 5%, #11F468 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#11F468', endColorstr='#0A8222',GradientType=0);
	background-color:#11F468;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #0A8222;
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
.buttonh:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #11F468), color-stop(1, #0A8222));
	background:-moz-linear-gradient(top, #0A8222 5%, #11F468 100%);
	background:-webkit-linear-gradient(top, #0A8222 5%, #11F468 100%);
	background:-o-linear-gradient(top, #0A8222 5%, #11F468 100%);
	background:-ms-linear-gradient(top, #0A8222 5%, #11F468 100%);
	background:linear-gradient(to bottom, #0A8222 5%, #11F468 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#11F468', endColorstr='#0A8222',GradientType=0);
	background-color:#0A8222;
}
.buttonh:active {
	position:relative;
	top:1px;
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
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/fonts.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
 
</script>
                  

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
         <center><h3><b style="color: #F90C53;">SMS</b> CHECKER</h3></center>
         <center><h4>FOR WEBRDS</h4></center>
     
     
     <!-- Tab links -->
     
     
       <form class="form-inline" name="searchform" id="searchform">
       <div class="form-group">
       <label for="textsearch" >&nbsp;&nbsp;หมายเลข เบอร์โทรศัพท์ &nbsp;</label>
       <input type="text" name="itemname" id="itemname" class="form-control" placeholder="กรอกเบอร์!!" autocomplete="off">
       </div>
       <button type="button" class="btn btn-primary" id="btnSearch">
       <span class="glyphicon glyphicon-search" style="font-size: 32px;"></span>
             ค้นหา
       </button>
       
        &nbsp;&nbsp;&nbsp;<button type="button" name="button2" style="font-size: 22px;"  class="btn btn-primary btn-lg" onclick="window.location.href='recruitetree.php';" >BACK</button>
        &nbsp;&nbsp;&nbsp;<button type="button" name="button2" style="font-size: 22px;"  class="btn btn-primary btn-lg" onclick="window.location.href='ecoupon.php';" >VIEWPAY</button>
         &nbsp;&nbsp;&nbsp;<button type="button" name="button2" style="font-size: 22px;"  class="btn btn-primary btn-lg" onclick="window.location.href='allpay.php';" >CheckCoupon</button>
       </form>
       </div>
       </div>
       <div class="loading"></div>
       <div class="row" id="list-data" style="margin-top: 10px;">
       
       </div>
 </div>
          
        <br> <br> <br> <br> <br>
        <!-- Modal -->

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
    
    



    <!-- FOOTER
    ================================================== -->
    <footer class="section " id="footer">
        <div class="overlay footer-overlay">
        <!--Content -->
        <div style="margin: 30px 30px;">
       <center><br><br><br>Copyright © 2019 <a href="http://kainoi.net/">kainoi.net</a>. All rights reserved. Designed & developed by <a href="http://kainoi.net/">kainoi.net</a></center>
        </div>
        </div> <!-- / .container -->
    </footer>
    
      <div class="modal fade" id="myModal55" role="dialog" aria-hidden="true">>
                                       <div class="modal-dialog">
                                       
                                         <!-- Modal content-->
                                         <div class="modal-content">
                                           <div class="modal-header"><center><h3><b>kainoi.net</b></h3></center>
                                             <button type="button" class="close buttonf" data-dismiss="modal">&times;</button>
                                           </div>
                                           <div class="modal-body">
                                           <center>
                                               <b>กรุณาใส่<b style="color: #F40055;">รหัส</b>ยืนยัน  เพื่อทำการส่ง SMS อีกครั้ง</b>
                                            <form name= "smsvaild_code" class="form-container" method="post" action="sms_valid.php" onSubmit="JavaScript:return fncSubmit();">
                                           <input type="hidden" id="idmo" name="idmo" class="demoInputBox">
                                          
                                         
                                          <label>ยืนยันรหัส </label>&nbsp;&nbsp;<input type="password" style='width:100px; text-align: center;' name="secure_m" max="4"   maxlength="4" id="secure_m"/>
                                          <br><center> <button type = "button" id="butck"  class = "buttong"  onclick ="checkAvailability()"><h4><font color='#ffffff'>ตรวจสอบ</font></h4></button></center><br>
                                           <p><center><img src="../images/LoaderIcon.gif" id="loaderIcon" style="display:none" /></center></p>
                                           <center><span id="user-availability-status"></span></center>
                                           <center><p id='ps' style = 'font-size: 20px; font color=#000000; display: none;'>ระบบได้ส่ง SMS เรียบร้อยแล้ว</p></center>
                                           <center><p id='fail' style = 'font-size: 20px; font color=#000000; display: none;'>คุณใส่รหัส เกินจำนวนครั้งที่กำหนด</p></center>
                                           <center><button type='submit'  id="ok2"  class='buttonh' style =  'display: none;'data-dismiss="modal" ><h4>ตกลง</h4></button></center><br>
                                           <center><button type='button'   id='back' class='buttonf' style = 'display: none;' onclick="location.replace('sms_resend.php');" />กลับไปหน้าหลัก</button></center><br>
                                         
                                            </form>
                                            <?php
                                            
                                            ?>
                                            
                                            
                                           </center>
                                           </div>
                                           <div class="modal-footer">
                                             <button type="button" class="buttonf" data-dismiss="modal" id="ok" >ปิด</button>
                                           </div>
                                         </div>
                                         
                                       </div>
                     </div>  
    
<script>
 $(".modal").on("hidden.bs.modal", function(){
    $(this).find("input,hidden,select").val('').end();
    document.getElementById('user-availability-status').style.display = 'none';
    document.getElementById('ps').style.display = 'none';
    document.getElementById('fail').style.display = 'none';
     document.getElementById('submit').style.display = 'none';
      document.getElementById('back').style.display = 'none';
});

function testmodal(y)
{
        
        $("#myModal55").modal('show');
        //$("#idmo").text(y);
        $("#idmo").val(y);
}
  
  
            
</script>
 

   <!--<script type="text/javascript" src="jquery-1.11.2.min.js"></script>-->
 <script type="text/javascript">
 $(function () {
 $("#btnSearch").click(function () {
 $.ajax({
 url: "search_sms.php",
 type: "post",
 data: {itemname: $("#itemname").val()},
 beforeSend: function () {
 $(".loading").show();
 },
 complete: function () {
 $(".loading").hide();
 },
 success: function (data) {
 $("#list-data").html(data);
                /*  var T_BMRECID1  =$("#T_BMRECID1").text();
                  var T_BMRECID2  =$("#T_BMRECID2").text();
                  var T_BMRECID3  =$("#T_BMRECID3").text();
                  var T_BMRECID4  =$("#T_BMRECID4").text();
                  var T_BMRECID5  =$("#T_BMRECID5").text();
              //  alert(T_BMRECID);
                 $("#ids_hiv").text(T_BMRECID1);
                 $("#ids_vl").text(T_BMRECID2);
                 $("#ids_sp").text(T_BMRECID3);
                 $("#ids_hbhc").text(T_BMRECID4);
                 $("#ids_re").text(T_BMRECID5);
                 */
 }
 });
 });
 $("#searchform").on("keyup keypress",function(e){
 var code = e.keycode || e.which;
 if(code==13){
 $("#btnSearch").click();
 return false;
 }
 });
 });
 
 

 
 
 </script>
 <!------------------------------------------>
 <script>
      var count = 0;
      function checkAvailability() {
       count += 1;
       
      
      if(count >= 999) {
        $("#butck").hide();
        $("#fail").show();
          $("#back").show();
        
      }else{
           $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_resms.php",
        
       // data:'idmos='+$("#idmo").val(),
        data:  {idmos:$("#idmo").val(),secure_m:$("#secure_m").val()
                },
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
    
      }
      </script>
 <script language="javascript">
					
function fncSubmit()
{
     if(document.smsvaild_code.secure_m.value == "")
     {
         alert('โปรดใส่รหัสของท่าน!');
          return false;
			  }
     else if (document.smsvaild_code.secure_m.value.length < 4) 
					{
	         alert('ระบุเลขจำนวน 4 หลักของท่าน');
									 return false;
					 }
        return true;
document.smsvaild_code.submit();
}
</script>

</body>

</html>