<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php'); 
  $STATUS = $_SESSION['STATUS'];
	if($STATUS!='2'){
    Header("Location: logout.php");  
  }  
 $HOS = $_SESSION["HOS"];
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
  
  
      .demoInputBox1{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
      .status-available1{color:#A569BD;}
      .status-not-available1{color:#E74C3C;}
    }
  </style>
</head>


<body class="top-header">


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

    <br>
    <!-- SERVICE-1
    ================================================== -->
    <section class="bg-grey" id="service">
        <!--<div style="margin: 30px 30px;">-->
        <b>คลินิก :&nbsp;<?php
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
        }elseif($hos_data==14){
           echo "สำนักงานชันสูตรสาธารณสุข";
        }elseif($HOS == 12){
          echo "มูลนิธิเอ็มพลัส Mplus+(เชียงใหม่)";
        } elseif($HOS == 13){
          echo "ศูนย์สุขภาพ แคร์แมท CAREMAT(เชียงใหม่)";
        }else{ echo "";}
        ?></b>
       
       
    

<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Keyword
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>

<?php
if($_GET["txtKeyword"] != "")
	{
	if ($conn_rds->connect_error)
                                  {
                                  die("Connection failed: " . $conn_rds->connect_error);
                                  }
  
	$strSQL = "SELECT * FROM tbresult WHERE (LABNUMBER LIKE '%".$_GET["txtKeyword"]."%' )";
 
 $objQuery = $conn_rds->query($strSQL);
 $num_rows1 = mysqli_num_rows($resultsa);

	?>
<table class="table table-bordered">
 <thead>
 <tr>
  <th><center>Lab No.</center></th>
 <th><center>ผล HIV</center></th>
  <th><center>ค่า Viral Load</center></th>
   <th><center>ผล Syphilis</center></th>
    <th><center>ผล HB</center></th>
     <th><center>ผล HC</center></th>
      <th><center>ผล Recency</center></th>
  <th><center>แก้ไข</center></th>
 </tr>
 </thead>
 <tbody>
	<?php
	while($objResult -> mysqli_fetch_assoc($objQuery))
	{
	?>
	 


<tr>
 
  <td><center>หมายเลขที่ออกจากโรงพยาบาล :<br>"<b style="color: #0046F7;">
  <?php
 
  $la1=   $objResult['BMHIVRES'];
  $la2=   $objResult['BMVLRES'];
  $la2_2=   $objResult['BMVLRES_OTH'];
  $la3=   $objResult['Syphilis'];
  $la4_1=   $objResult['HB'];
  $la4_2=   $objResult['HC'];
  $la5=   $objResult['Recency'];
  $labno =  $objResult['LABNUMBER'];
  echo $labno; ?>
  </b>"
  </center>
  </td>
 <td  style="width: 15%;">
  <?php
   if($la1 == 1 ){
             echo "<center><b style='color: #FF001D;'>POSITIVE</b></center>";
      }
      elseif($la1 == 2){
            echo "<center><b style='color: #0CA80A;'>NEGATIVE</b></center>";
           }
     elseif($la1 == 3){
            echo "<center><b style='color: #CE6F33;'>INCONCLUSIVE</b></center>";
           }
      else{
       echo "<center><b style='color: #000000;'>NA</b></center>";
      }
  ?> 
 </td>
  <td  style="width: 15%;">
    <?php/*
     if($la2 == 1 ){
             echo "<center><b style='color: #000000;'>NOT DONE</b></center>";
      }
      elseif($la2 == 2){
            echo "<center><b style='color: #000000;'>UNDETECTABLE</b></center>";
           }
       elseif($la2 == 3){
             echo "<center><b style='color: #000000;'>มีค่า Viral load</b><br></center>";
              echo "<center><b style='color: #000000;'>$la2_2</b></center>";
           }
      else{
       echo "<center><b style='color: #000000;'>NA</b><br></center>";
      
      }*/
    
              echo "<center><b style='color: #000000;'>มีค่า Viral load</b><br></center>";
              echo "<center><b style='color: #000000;'>$la2_2</b></center>";
  ?> 
   
  </td>
   <td  style="width: 15%; ">
    <?php
   if($la3 == 1 ){
             echo "<center><b style='color: #FF001D;'>REACTIVE</b></center>";
      }
      elseif($la3 == 2){
            echo "<center><b style='color: #0CA80A;'>NONREACTIVE</b></center>";
           }
      elseif($la3 == 3){
            echo "<center><b style='color: #CE6F33;'>INDETERMINATE</b></center>";
           }
      else{
       echo "<center><b style='color: #000000;'>NA</b></center>";
      }
  ?> 
    
   </td>
    <td  style="width: 15%;">
        <?php
   if($la4_1 == 1 ){
             echo "<center><b style='color: #FF001D;'>REACTIVE</b></center>";
      }
      elseif($la4_1 == 2){
            echo "<center><b style='color: #0CA80A;'>NONREACTIVE</b></center>";
           }
      elseif($la4_1 == 3){
            echo "<center><b style='color: #CE6F33;'>INDETERMINATE</b></center>";
           }
      else{
       echo "<center><b style='color: #000000;'>NA</b></center>";
      }
  ?> 
     
    </td>
     <td  style="width: 15%;">
         <?php
   if($la4_2 == 1 ){
             echo "<center><b style='color: #FF001D;'>REACTIVE</b></center>";
      }
      elseif($la4_2 == 2){
            echo "<center><b style='color: #0CA80A;'>NONREACTIVE</b></center>";
           }
      elseif($la4_2 == 3){
            echo "<center><b style='color: #CE6F33;'>INDETERMINATE</b></center>";
           }
      else{
       echo "<center><b style='color: #000000;'>NA</b></center>";
      }
  ?> 
      
     </td>
      <td  style="width: 15%;">
         <?php
   if($la5 == 1 ){
             echo "<center><b style='color: #FF001D;'>Recent</b></center>";
      }
        elseif($la5 == 2){
            echo "<center><b style='color: #0CA80A;'>Long term</b></center>";
           }
            elseif($la5 == 3){
               echo "<center><b style='color: #CE6F33;'>INCONCLUSIVE</b></center>";
           }
            elseif($la5 == 4){
               echo "<center><b style='color: #CE6F33;'>INVALID</b></center>";
           }
      else{
       echo "<center><b style='color: #000000;'>NA</b></center>";
      }
  ?> 
       
      </td>
  
  

    
  <td> <center><a href="editresults.php?LABNUMBER=<?php echo $objResult['LABNUMBER'];?>"><img src="img/onebit_21.png" width="24" height="24"></a></center></td>
 </tr>
 <?php   } ?>
 </tbody>  </table
 <?php
 $conn_rds->close();
}
?>


          
        <br> <br> <br> <br> <br>
 
 
    </section>
 
    <!-- FOOTER
    ================================================== -->
    <footer class="section " id="footer">
      
        <!--Content -->
        <div style="margin: 10px 10px;">
       <center><br><br><br>Copyright © 2019 <a href="http://kainoi.net/">kainoi.net</a>. All rights reserved. Designed & developed by <a href="http://kainoi.net/">kainoi.net</a></center>
        </div>
   
    </footer>


    <!--  Page Scroll to Top  -->

    

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
   <!--<script type="text/javascript" src="jquery-1.11.2.min.js"></script>-->
 
 

 


</body>

</html>