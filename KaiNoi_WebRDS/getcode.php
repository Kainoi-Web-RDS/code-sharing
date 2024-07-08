<?php
$cookie_rds = "webrds_cookie";
if(!isset($_COOKIE[$cookie_rds])) {
	setcookie($cookie_rds, "thailand2019", time() + 3600000, '/');
} else {
	//setcookie($cookie_rds, "thailand2019_olduser", time() + 3600000, '/');
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
      
     
 </style>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,400,500,700">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Itim|Kodchasan|Mali|Sriracha&display=swap" rel="stylesheet">
  
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
 

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
                        	<li><span class="icon mdi mdi-cellphone-android"></span><a href="tel:0922760584">0922760584</a></li>
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
        <section class="section section-lg text-center" style="background-image: url(images/20896.jpg); background-repeat: repeat-y;">
        <div class="container">
          <h3 class="wow-outer">
											<span class="wow slideInUp" style ="background-color :#ffffff; border-style: groove; border-color: #1370F2; opacity: 5; border-radius: 5px; padding: 8px 8px;">พวกเรายินดีอย่างยิ่งครับ ที่คุณให้ความสนใจที่จะเข้าร่วมโครงการ</span></h3>
          <div class="jumbotron"  style ="background-color :#ffffff; border-style: groove; border-color: #1370F2; padding-top: 0px;">
                                                <h4 style=" text-align: center;"><p style="font-size: 20px; font-weight: bold;">โครงการมีวัตถุประสงค์</p>
																																																<p>&nbsp;&nbsp;&nbsp;&nbsp;เพื่อประเมินความเป็นไปได้ในการสำรวจพฤติกรรมสุขภาพทางเพศแบบเครือข่ายผ่านเว็บแอปพลิเคชัน</p>
																																																<p style="font-size: 20px; font-weight: bold;">ประโยชน์</p>
                                                <p>&nbsp;&nbsp;เพื่อใช้พัฒนาและส่งเสริมระบบเฝ้าระวังประจำปีในกลุ่มชายที่มีเพศสัมพันธ์กับชายของประเทศ<br>
                                                      &nbsp;&nbsp;การเข้าร่วมโครงการไม่ต้องระบุชื่อและนามสกุล เพียงแค่ใช้หมายเลขโทรศัพท์ของคุณ<br>
																																																						&nbsp;&nbsp;เพื่อการยืนยันตัวตนเท่านั้นและรับค่าชดเชย โดยจะส่งผ่านข้อความไปยังหมายเลขโทรศัพท์ของคุณ</p>
																																												
                               <center>
																																 <img style="width: 300px;" src="https://kainoi.net/images/kai2-1.png">
																																<div class="container">
                                   <form  name="ReqCheckRDSCode" class="form-container" method="post" action="checkcode.php" onSubmit="JavaScript:return fncSubmit();">
                               
																															  <div class="table-responsive">
                                     <table class="table">
                                         <tbody>
                                           <tr>
                                             <td style= "text-align:center; font-size: 15px; " >ป้อนรหัส (5 หลัก) ที่ได้รับจากเพื่อน:</td>
                                             <td>		<input type="text"  name="rds_code"  id="rds_code"  class="form-control" style="opacity: 5; border-radius: 15px;  width: 150px;height: 40px; font-size: 20px; text-align: center;" maxlength="5" required>
                                             <span style= "text-align:center; font-size: 15px; ">ตัวอย่าง Ab5sM</span></td>
																																											</tr>
                                           <tr>
                                             <td style= "text-align:center;font-size: 15px;" >หมายเลขโทรศัพท์ของท่าน:</td>
                                             <td><input type="number" 	id="mobilephone" name="mobilephone"class="form-control" maxlength="10"  style="opacity: 5; border-radius: 15px;  width: 150px;height: 40px; font-size: 14px; text-align: center;" oninput="this.value=this.value.replace(/[^0-9]/g,'');" onKeyPress="if(this.value.length==10) return false;" required>				
																																													<span style= "text-align:center; font-size: 15px; ">ตัวอย่าง 08XXXXXXXX</span></td>
																																											</tr>
																																												
                                         </tbody>
                                       </table>
																																						<button type="submit"  class="button button-primary button-winona wow fadeIn button-block">ตกลง</button>
																					                 <button type="button"   class="button button-primary button-winona wow fadeIn button-block" onclick="window.location.href='not_coupon_interestcode.php'">กลับไปหน้าหลัก</button>
                                   </div>
																																	  </div>
																						
																						
																	
																																			</form>
																																		</h4>
                               </center>
           </div>
        </div>
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
				<script>
		
</script>
				  <script>
          
        </script>
    <script language="javascript">
					
function fncSubmit()
{
     if(document.ReqCheckRDSCode.rds_code.value == "")
     {
         alert('โปรดใส่รหัสที่เพื่อนให้');
         document.ReqCheckRDSCode.rds_code.focus();
      return false;
     }	

     if(document.ReqCheckRDSCode.mobilephone.value == "")
     {
         alert('โปรดใส่เบอร์โทรศัพท์ของท่าน!');
          return false;
			  }
     else if (document.ReqCheckRDSCode.mobilephone.value.length < 10) 
					{
	         alert('ระบุเลขโทรศัพท์มือถือจำนวน 10 หลักของท่าน');
									 return false;
					 }
        return true;
document.ReqCheckRDSCode.submit();
}
</script>
       <script src="js/jquery.cookie.js"></script>
     
        <script>
            $(function() {

               if ($.cookie('cookieStore')) {
                    var data=JSON.parse($.cookie("cookieStore"));
                    $('#rds_code').val(data[0]);

              }

              $('#submit').on('click', function(){

                    var storeData = new Array();
                    storeData[0] = $('#rds_code').val();
                  

                    $.cookie("cookieStore", JSON.stringify(storeData));
                    var data=JSON.parse($.cookie("cookieStore"));
                    $('#rds_code').val(data[0]);
          
              });
            });
       </script>
             
     <script>
              $(function() {

               if ($.cookie('cookieStore')) {
                    var data=JSON.parse($.cookie("cookieStore"));
                console.log(data);

              }
              });
     </script>
  </body>
  
  
</html>

