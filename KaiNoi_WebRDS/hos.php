<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
      <title>kainoi.net</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />
    <!-- Stylesheets-->
        <style type="text/css">
    /* ใช้ทั้งเว็บไซต์ */
      body {
        font-family: 'Sriracha', cursive;
        
      }
      /* ใช้เฉพาะหัวข้อ */
      h1, h2, h3, h4, h5, h6 {
        font-family: 'Sriracha',
        cursive;
      }
      
         body,td,th {
	font-family: "Open Sans", sans-serif;
}

.container {

}
.container2 {
  display: block;
  position: relative ;
  text-align: left;
  padding-left: 30px;
  margin-bottom: 2px;
  cursor: pointer;
  font-size: 18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
      
  .container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}
.container input #knhiv_oth{
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #fff;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #fff;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}


    #myDIV {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightgreen;
      margin-top: 20px;
      
      border-radius: 6px ;
      border: 3px solid #000000;
      padding: 5px;
    }
    
       #myDIV2 {
      width: 100%;
      padding: 50px 0;
      text-align: center;
      background-color: lightgreen;
      margin-top: 20px;
      display: none;
      border-radius: 6px ;
      border: 3px solid #000000;
      padding: 5px;
    }
    
      .mapboxgl-popup {
      max-width: 400px;
      font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
      }
      .marker {
      display: block;
      border: none;
      border-radius: 50%;
      cursor: pointer;
      padding: 0;
      }
      .table-responsive {
    display: table;
    }

     @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 2px solid #000; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
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
     
  <!--<div id='map' style="width: 100%; height: 800px;"></div>-->
                    <div class="table-responsive" style="background-color: #fff;">
                                                                        <table class="table">
                                                                          <thead>
                                                                            <tr>
                                                                              <th>สถานที่/โรงพยาบาล</th>
                                                                              <th>วัน เวลาที่ให้บริการ</th>
                                                                              <th>เบอร์ติดต่อ</th>
                                                                            </tr>
                                                                          </thead>
                                                                          <tbody>
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">1.รพ.ราชพิพัฒน์
                                                                   
                                                                             </td>
                                                                             <td>ในเวลาราชการ
                                                                                                          จันทร์-ศุกร์ <br>
                                                                                                          เวลา 8.00 -16.00 น.<br>
                                                                                    <br>
                                                                                                          นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน <br>
                                                                                                          จันทร์,พุธ,พฤหัสบดี <br>
                                                                                                          เพิ่ม 16.00 – 20.00 น.
                                                                             </td>
                                                                              <td>โทร 02-444-0138 ต่อ 8846<br>เบอร์มือถือ 061-856-9664</td>
                                                                             </label>
                                                                            </tr>
                                                                            
                                                                             <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">2.รพ.เวชการุณย์รัศมิ์
                                                                       
                                                                             </td>
                                                                              <td>นอกเวลาราชการ<br>
                                                                                                           คลินิกรักษ์เพื่อน<br>
                                                                                                           จันทร์,พุธ-พฤหัสบดี<br>
                                                                                                           เวลา 16.00 - 20.00 น.
                                                                             </td>
                                                                              <td>โทร 02-988-4000-1 ต่อ 255</td>
                                                                             </label>
                                                                            </tr>
                                                                            
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">3. รพ.หลวงพ่อทวีศักดิ์ ชุตินฺธโร อุทิศ
                                                                           
                                                                             </td>
                                                                             <td>นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน<br> 
                                                                                                          จันทร์,พุธ-พฤหัสบดี<br>
                                                                                                          เวลา 16.00 - 20.00 น.
                                                                              </td>
                                                                              <td>โทร 02-429-3575-81 ต่อ 8619</td>
                                                                             </label>
                                                                            </tr>
                                                                            
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">4. รพ.ลาดกระบัง กรุงเทพมหานคร
                                                                         
                                                                             </td>
                                                                                <td>นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน<br> 
                                                                                                          จันทร์,พุธ-พฤหัสบดี<br>
                                                                                                          เวลา 16.00 - 20.00 น.
                                                                              </td>
                                                                               <td>โทร 02-326-9995, 02-326-7711 ต่อ 254, 258<br>เบอร์เมือถือ 086-995-6364</td>
                                                                             </label>
                                                                            </tr>
                                                                            
                                                                              <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">5. รพ.ตากสิน
                                                                       
                                                                             </td>
                                                                               <td>นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน<br> 
                                                                                                          จันทร์,พุธ-พฤหัสบดี<br>
                                                                                                          เวลา 16.00 - 20.00 น.
                                                                              </td>
                                                                                 <td>โทร 02- 437-0123 ต่อ 1136,1140</td>
                                                                             </label>
                                                                            </tr>
                                                                     
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">6. รพ.สิรินธร
                                                                         
                                                                             </td>
                                                                                 <td>นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน<br> 
                                                                                                          จันทร์,พุธ-พฤหัสบดี<br>
                                                                                                          เวลา 16.00 - 20.00 น.
                                                                              </td>
                                                                              <td>โทร 02-328-6900-19 ต่อ 10268,10269<br>เบอร์เมือถือ 083-835-5227</td>
                                                                             </label>
                                                                            </tr>
                                                                    
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">7. รพ.เจริญกรุงประชารักษ์
                                                                           
                                                                             </td>
                                                                               <td>ในเวลาราชการ OPD อายุรกรรม 
                                                                                                          จันทร์-ศุกร์ <br>
                                                                                                          เวลา 8.00 -16.00 น.<br>
                                                                                    <br>
                                                                                                          นอกเวลาราชการ<br>
                                                                                                          - คลินิกรักษ์เพื่อน <br>
                                                                                                          จันทร์,พุธ,พฤหัสบดี <br>
                                                                                                          เพิ่ม 16.00 – 20.00 น.<br><br>
                                                                                                          - คลินิกฟ้าใหม่ <br>
                                                                                                            อังคาร  <br>
                                                                                                          เพิ่ม 16.00 – 20.00 น.<br>                     
                                                                             </td>
                                                                               <td> OPD อายุรกรรม <br> โทร 02-289-7528-9<br><br><br><br>
                                                                                                             คลินิกรักษ์เพื่อน<br> โทร 02-289-7890<br><br><br>
                                                                                                             คลินิกฟ้าใหม่<br> เบอร์เมือถือ 098-923-8714</td>
                                                                             </label>
                                                                            </tr>
                                                                          
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">8. รพ.กลาง
                                                                           
                                                                             </td>
                                                                                    <td>ในเวลาราชการ
                                                                                                          - หน่วยปรึกษาสุขภาพและจิตวิทยา<br>
                                                                                                          จันทร์-ศุกร์ <br>
                                                                                                          เวลา 8.00 -15.00 น.<br>
                                                                                    <br>
                                                                                                          นอกเวลาราชการ<br>
                                                                                                          คลินิกรักษ์เพื่อน <br>
                                                                                                          จันทร์,พุธ,พฤหัสบดี <br>
                                                                                                          เพิ่ม 16.00 – 20.00 น.
                                                                             </td>
                                                                                   <td>โทร 02-220-8000 ต่อ 10210<br>เบอร์เมือถือ 092-342-8942</td>
                                                                             </label>
                                                                            </tr>
                                                                             
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">9. รพ.ศูนย์บริการสาธารณสุข 28 กรุงธนบุรี 
                                                                         
                                                                             </td>
                                                                                    <td>ในเวลาราชการ
                                                                                                          - คลินิกรักปลอดภัย <br>
                                                                                                          จันทร์-ศุกร์ <br>
                                                                                                          เวลา 08.30 – 12.00 น. และ 13.00 -15.30 น.<br>
                                                                                    <br>
                                                                                                          นอกเวลาราชการ<br>
                                                                                                          คลินิคแฟมมิลี่แอนด์เฟรนด์ <br>
                                                                                                          จันทร์ – ศุกร์ <br>
                                                                                                          เพิ่ม 7.00 – 12.00 น.
                                                                             </td>
                                                                                       <td>โทร 02-860-8210 ต่อ 311<br>เบอร์เมือถือ 096-797-1610</td>
                                                                             </label>
                                                                            </tr>
                                                                           
                                                                            
                                                                            <tr>
                                                                            <td><label style="font-size: 16px; font-weight: bold; color:DodgerBlue;" class="containerins12">10. สภากาชาดไทย : คลินิกนิรนาม
                                                                      an>
                                                                             </td>
                                                                                     <td>ในเวลาราชการ<br>
                                                                                                                   คลินิกนิรนาม<br> 
                                                                                                                  จันทร์ – ศุกร์ <br>
                                                                                                                  เวลา 07.30-15.00 น.<br>
                                                                                            <br>                
                                                                                                                  เสาร์ <br>
                                                                                                                  เพิ่ม 8.30-16.00  น.<br>
                                                                                                                  หยุดทุกวันอาทิตย์ และวันนักขัตฤกษ์
                                                                                           </td>
                                                                              <td>โทร 02-2516711-5</td>
                                                                             </label>
                                                                            </tr>

                                                                          </tbody>
                                                                        </table>
                                                                        </div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    
<script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibWFpcmVpbmEiLCJhIjoiY2syZm5nOWduMDk4ZDNocWdobHR2NmxhbiJ9.WI9H08vRgnFNVphJHjWH6w';
 
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [100.5310656, 13.7263409 ],
zoom: 9.18
});
 
map.on('load', function () {
  
map.loadImage('images/gmap_marker_active.png', function(error, image) {
if (error) throw error;
map.addImage('cat', image);
// Add a layer showing the places.
map.addLayer({
"id": "places",
"type": "symbol",
"source": {
"type": "geojson",
"data": {
"type": "FeatureCollection",
"features": [{
"type": "Feature",
"properties": {
"description": "<strong style='color:DodgerBlue;'>คลินิกรักษ์เพื่อน : รพ.ราชพิพัฒน์</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\"></a>เปิด จันทร์,พุธ,พฤหัสบดี<br>เวลา  16.00 - 20.00 น.</p><p>ติดต่อได้ที่เบอร์ <br>02-444-0138 ต่อ 8846<br>หรือ เบอร์เมือถือ<br>เบอร์เมือถือ 086-995-6364</p>"
},
"geometry": {
"type": "Point",
"coordinates": [100.366998, 13.7305709]
}
}, {
"type": "Feature",
"properties": {
"description": "<strong style='color:DodgerBlue;'>คลินิกรักษ์เพื่อน : รพ.เวชการุณย์รัศมิ์</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\"></a>เปิด จันทร์,พุธ,พฤหัสบดี<br>เวลา  16.00 - 20.00 น.</p><p>ติดต่อได้ที่เบอร์ <br>02-988-4000-1 ต่อ 255</p>"

},
"geometry": {
"type": "Point",
"coordinates": [100.8587767, 13.8559863]
}
}, {
"type": "Feature",
"properties": {
"description":"<strong style='color:DodgerBlue;'>คลินิกรักษ์เพื่อน :  รพ.หลวงพ่อทวีศักดิ์ ชุตินฺธโร อุทิศ</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\"></a>เปิด จันทร์,พุธ,พฤหัสบดี<br>เวลา  16.00 - 20.00 น.</p><p>ติดต่อได้ที่เบอร์ <br>02-429-3576  ต่อ 8522<br>02-429-3576 ต่อ 8527  ต่อ 8609</p>"
},
"geometry": {
"type": "Point",
"coordinates": [100.3451608, 13.656257]
}
}, {
"type": "Feature",
"properties": {
"description":"<strong style='color:DodgerBlue;'>คลินิกรักษ์เพื่อน :  รพ.ลาดกระบัง กรุงเทพมหานคร</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\"></a>เปิด จันทร์,พุธ,พฤหัสบดี<br>เวลา  16.00 - 20.00 น.</p><p>ติดต่อได้ที่เบอร์ <br>02-326-9995<br>02-326-7711 ต่อ 254, 258 <br>เบอร์เมือถือ 086-995-6364</p>"
},
"geometry": {
"type": "Point",
"coordinates": [100.7839619, 13.7223801]
}
}, {
"type": "Feature",
"properties": {
"description":"<strong style='color:DodgerBlue;'>คลินิกรักษ์เพื่อน :  รพ.ตากสิน</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\"></a>เปิด จันทร์,พุธ,พฤหัสบดี<br>เวลา  16.00 - 20.00 น.</p><p>ติดต่อได้ที่เบอร์ <br>02- 437-0123 ต่อ 1136,1140</p>"
},
"geometry": {
"type": "Point",
"coordinates": [100.5085964, 13.7305097]
}
}, {
"type": "Feature",
"properties": {
"description":"<strong style='color:DodgerBlue;'>คลินิกรักษ์เพื่อน :   รพ.สิรินธร</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\"></a>เปิด จันทร์,พุธ,พฤหัสบดี<br>เวลา  16.00 - 20.00 น.</p><p>ติดต่อได้ที่เบอร์ <br>02-328-6900-19 ต่อ 10270<br>เบอร์เมือถือ 083-835-5227 <br>087-915-3162</p>"
},
"geometry": {
"type": "Point",
"coordinates": [ 100.7057794, 13.7170142]
}
}, {
"type": "Feature",
"properties": {
"description":"<strong style='color:DodgerBlue;'>คลินิกรักษ์เพื่อน  : รพ.เจริญกรุงประชารักษ์</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\"></a>เปิด จันทร์,พุธ,พฤหัสบดี<br>เวลา  16.00 - 20.00 น.</p><p>ติดต่อได้ที่เบอร์ <br>02-289-7890<br>02-289-7823-4</p>"
},
"geometry": {
"type": "Point",
"coordinates": [100.4945226, 13.6943709]
}
}, {
"type": "Feature",
"properties": {
 "description":"<strong style='color:DodgerBlue;'>คลินิกรักษ์เพื่อน :  รพ.กลาง</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\"></a>เปิด จันทร์,พุธ,พฤหัสบดี<br>เวลา  16.00 - 20.00 น.</p><p>ติดต่อได้ที่เบอร์ <br>02-220-8000 ต่อ 10210<br>เบอร์เมือถือ 092-342-8942</p>"
},
"geometry": {
"type": "Point",
"coordinates": [100.5091634, 13.746529]
}
}, {
"type": "Feature",
"properties": {
 "description":"<strong style='color:DodgerBlue;'>คลินิกรักปลอดภัย :  ศูนย์บริการสาธารณสุข 28 กรุงธนบุรี</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\"></a>จันทร์ – ศุกร์<br>เวลา 08.30 – 12.00 น. <br>และ 13.00 -15.30 น. <br>-การให้บริการ PrEP และ PEP<br>จันทร์ – ศุกร์ <br>เวลา 08.30 – 12.00 น.<br>และ 13.00 -15.30 น.<br>-บริการนอกเวลาราชการ พฤหัสบดี เวลา 16.00-20.00 น.</p><p>ติดต่อได้ที่เบอร์ <br>02-8608210 ต่อ 311</p>"
},
"geometry": {
"type": "Point",
"coordinates": [100.5006285, 13.7205081]
}
}, {
"type": "Feature",
"properties": {
 "description":"<strong style='color:DodgerBlue;'>คลินิกนิรนาม :  สภากาชาดไทย</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\"></a>ในเวลาราชการ – จันทร์-ศุกร์ <br>เวลา 07.30-15.00<br>และ เสาร์ 8.30-16.00 หยุดทุกวันอาทิตย์ และวันนักขัตฤกษ์</p><p>ติดต่อได้ที่เบอร์ <br>02-2516711-5</p>"
},
"geometry": {
"type": "Point",
"coordinates": [100.5382722, 13.734508]
}
}]
}
},
"layout": {
"icon-image": "cat",
"icon-size": 0.5
}
});
 });
// When a click event occurs on a feature in the places layer, open a popup at the
// location of the feature, with description HTML from its properties.
map.on('click', 'places', function (e) {
var coordinates = e.features[0].geometry.coordinates.slice();
var description = e.features[0].properties.description;
 
// Ensure that if the map is zoomed out such that multiple
// copies of the feature are visible, the popup appears
// over the copy being pointed to.
while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
}
 
new mapboxgl.Popup()
.setLngLat(coordinates)
.setHTML(description)
.addTo(map);
});
 
// Change the cursor to a pointer when the mouse is over the places layer.
map.on('mouseenter', 'places', function () {
map.getCanvas().style.cursor = 'pointer';
});
 
// Change it back to a pointer when it leaves.
map.on('mouseleave', 'places', function () {
map.getCanvas().style.cursor = '';
});
});
 
</script>


  </body>
</html>


