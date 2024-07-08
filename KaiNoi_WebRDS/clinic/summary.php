<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php'); 
  $STATUS = $_SESSION['STATUS'];
	if($STATUS!='1'){
    Header("Location: logout.php");  
  }  
 $HOS = $_SESSION["HOS"];
 
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
                                                           
                                                           function DateThai($strDate)
                                                           {
                                                           $strYear = date("Y",strtotime($strDate))+543;
                                                           $strMonth= date("n",strtotime($strDate));
                                                           $strDay= date("d",strtotime($strDate));
                                                           $strHour= date("H",strtotime($strDate));
                                                           $strMinute= date("i",strtotime($strDate));
                                                           $strSeconds= date("s",strtotime($strDate));
                                                           $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                                           $strMonthThai=$strMonthCut[$strMonth];
                                                           return "$strDay $strMonthThai $strYear";
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
    <link rel="stylesheet" href="dist2/css/bootstrap/zebra_datepicker.min.css" type="text/css">
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
  
  .loading{
 background-image: url("img/LoaderIcon.gif");
 background-repeat: no-repeat;
 display: none;
 height: 120px;
 width: 120px;
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
/*	border:1px solid #d83526;*/
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	/*padding:6px 24px;*/
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
        <div style="margin: 30px 30px;">
       <div class="row">
       <div class="col-md-12"><b>คลินิก :&nbsp;<?php
         if($HOS== 1){
           echo "รพ.กลาง";
         } elseif($HOS== 2){
          echo "รพ.เจริญกรุงประชารักษ์";
         }elseif($HOS== 3){
          echo "รพ.ตากสิน";
         }elseif($HOS == 4){
          echo "รพ.ราชพิพัฒน์";
         }elseif($HOS== 5){
          echo "รพ.ลาดกระบัง กรุงเทพมหานคร";
         }elseif($HOS == 6){
          echo "รพ.เวชการุณย์รัศมิ์";
         }elseif($HOS == 7){
          echo "รพ.ศูนย์บริการสาธารณสุข 28 กรุงธนบุรี";
         }elseif($HOS == 8){
          echo "รพ.สิรินธร";
        }elseif($HOS == 9){
          echo "รพ.หลวงพ่อทวีศักดิ์ ชุตินฺธโร อุทิศ";
        } elseif($HOS == 10){
          echo "สภากาชาดไทย : คลินิกนิรนาม";
        } elseif($HOS == 11){
          echo "รพ.สารภี (เชียงใหม่)";
        } elseif($HOS == 12){
          echo "มูลนิธิเอ็มพลัส Mplus+(เชียงใหม่)";
        } elseif($HOS == 13){
          echo "ศูนย์สุขภาพ แคร์แมท CAREMAT(เชียงใหม่)";
        }else{ echo "";}
        ?></b>
      <form id="regForm" class="form-inline" method="POST" action="">
         <div class="row">
         <div class="col-sm-6">
          <input name="datepicker1" id="datepicker1" type="text" class="form-control" data-zdp_readonly_element="false" style="opacity: 5; border-radius: 15px;  width: 250px;height: 40px; font-size: 20px; ">
          </div>
         <div class="col-sm-6">
          <input name="datepicker2" id="datepicker2" type="text" class="form-control" data-zdp_readonly_element="false" style="opacity: 5; border-radius: 15px;  width: 250px;height: 40px; font-size: 20px; ">
         </div></div>
         <div class="row">
         <div class="col-sm-12">
         <input type="button" name="range" id="range" value="SEARCH" class="btn btn-success"/>
         </div></div>
         <div class="clearfix"></div>
      </form>
					<br/>
					<div id="purchase_order">
       
        <?php
       $sql = "select * from tblab where BMCLID='$HOS' order by BMDATE asc ";
       $result = $conn_rds->query($sql) ;
       $num_rows = mysqli_num_rows($result);
       if($num_rows  == 0){
       echo "ไม่พบข้อมูล";
       }
       else{
?>
 <div>จำนวนทั้งหมด :&nbsp;&nbsp;<?php echo $num_rows; ?></div>
 <table class="table table-bordered ">
 <thead>
 <tr>
  <th><center>วันที่ตรวจ</center></th>
  <th><center>CODE</center></th>
  <th><center>เบอร์โทรศัพท์</center></th>
  <th><center>Lab No.</center></th>
  <th><center>ลงผลการตรวจ</center></th>
  <th><center>ผู้รายงาน</center></th>
  <th><center>แก้ไขผลการตรวจ</center></th>
 </tr>
 </thead>
 <tbody>
 <?php while ($row = mysqli_fetch_assoc($result)) { ?>
 <tr>
  <td> <center><?php
  $BMDATE =  $row['BMDATE'];
  $BMDATE_NEW =DateThai($BMDATE);
  echo $BMDATE_NEW; ?></center></td>
  
  <td><center><?php $BMRECID =  $row['BMRECID'];
  echo $BMRECID; ?></center></td>
  
  <td><center><?php
  $BMRETEL1 =  $row['BMRETEL1'];                                                 
  $mobilephoneEX = decode($BMRETEL1,"w-e-b-r-d-s");
  echo $mobilephoneEX; ?></center></td>
  
  <td><center>หมายเลขที่ออกจาก  รพ. :<br>"<b style="color: #0046F7;"><?php
  $BMRECID =  $row['BMRECID'];
  $la1=   $row['BMHIVRES'];
  $la2=   $row['BMVLRES'];
  $la3=   $row['Syphilis'];
  $la4_1=   $row['HB'];
  $la4_2=   $row['HC'];
  $la5=   $row['Recency'];
  $labno =  $row['LABNUMBER'];
  echo $labno; ?></b>"
  </center></td>
 <td><center>
   <?php
           $keytest1 =$row['keytest1'];
           $keytest2 =$row['keytest2'];
           $keytest3 =$row['keytest3'];
           $keytest4 =$row['keytest4'];
           $keytest5 =$row['keytest5'];
           
           if($keytest1 == 1 and $keytest2 == 2 and $keytest3 == 3 and $keytest4 == 4 and $keytest5 == 5){
            echo "<b style='color: #0CA80A;'>ผลการตรวจครบถ้วน</b>";
           }
           else{
            echo "<b style='color: #FF361C;'>ยังลงผลไม่ครบ </b>";
           }
           ?></center>
</td>
  <td><center><?php $BMSTID=  $row['BMSTID'];
  echo $BMSTID; ?></center></td>
  <td> <center><a href="editresult.php?BMRECID=<?php echo $row['BMRECID'];?>"><img src="img/onebit_21.png" width="24" height="24"></a></center></td>
 </tr>
 <?php  } } ?>
 </tbody>
 </table>
     </div>
       </div>
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
    <div class="main-navigation" id="mainmenu-area">
        <div style="margin: 30px 30px;">
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
        <div style="margin: 30px 30px;">
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
    
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <!-- Theme JS -->
    <script src="assets/js/theme.js"></script>
    
     <script src="https://cdn.jsdelivr.net/npm/zebra_pin@2.0.0/dist/zebra_pin.min.js"></script>
      <script src="dist2/zebra_datepicker.min.js"></script>
     <script src="dist2/examples.js"></script>
     <script>

   $(document).ready(function(){
     $.fn.datepicker1.defaults.language = 'th';

   });
 
   $(document).ready(function(){
     $.fn.datepicker2.defaults.language = 'th';

   });
     $(document).ready(function() {
     $('#datepicker1').Zebra_DatePicker({
      format: 'd-m-Y'
      });
  
      $('#datepicker2').Zebra_DatePicker({
     format: 'd-m-Y'
      });
    });
 </script>
     
 <script>
$(document).ready(function(){
	$('#range').click(function(){
		var datepicker1 = $('#datepicker1').val();
		var datepicker2 = $('#datepicker2').val();
		if(datepicker1 != '' && datepicker2 != '')
		{
			$.ajax({
				url:"range.php",
				method:"POST",
				data:{datepicker1:datepicker1, datepicker2:datepicker2},
				success:function(data)
				{
					$('#purchase_order').html(data);
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});
</script>
 <!------------------------------------------>

 


</body>

</html>