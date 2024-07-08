<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php');
require_once('../connections/utf8.php');

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
                                                
                                                
                                          
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  font-family: 'Sarabun', sans-serif;
  height: 100%;
  margin: 0;
  font-family: Arial;
}
.button {
  background-color: #62f76c; /* Green */
  border: none;
  color: white;
  padding: 2px 4px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 12px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: #61C8F4; 
  color: black;
  border-radius: 12px;
  border: 3px solid black;
}

.button1:hover {
  background-color: #62f76c;
  border-radius: 12px;
  border-color: black;
  color: white;
}
/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: black;
  display: none;
  padding: 5px 20px;
  height: 100%;
}

#module_t {
  font-family: 'Sarabun', sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#module_t td, #customers th {
  border: 1px solid #000000;
  padding: 8px;
}

#module_t tr:nth-child(even){
background-color: #FFFFFF;
border: 1px solid #000000;
padding: 8px;
}

#module_t tr:hover {background-color: #42C7F7;}

#module_t th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  border: 1px solid #000000;
  background-color: #42C7F7;
  color: black;
}

</style>
</head>
<body>
<center><img src="../images/fav_kainoi.gif" alt="kainoi" style="width: 200px; height:50px; "></center>
<center><h1><span style=" color :black; text-shadow: 2px 1px 1px black;white-space: pre;font-weight: bold;">Project Participants</span>&nbsp;<span style=" color :red; text-shadow: 2px 1px 1px black;white-space: pre;font-weight: bold;">Compensation</span></h1></center>
&nbsp;&nbsp;&nbsp;<button type="button" name="button2" style="font-size: 22px;"  class="btn btn-primary btn-lg" onclick="window.location.href='sms_resend.php';" >BACK</button>
<div>
<button class="tablink" onclick="openPage('OVERALL', this, 'DodgerBlue')" id="defaultOpen">OVERALL</button>
<button class="tablink" onclick="openPage('V150', this, 'DodgerBlue')" >บัตร 150 บาท</button>
<button class="tablink" onclick="openPage('V50', this, 'DodgerBlue')">บัตร 50 บาท</button>
<button class="tablink" onclick="openPage('V500', this, 'DodgerBlue')">บัตร 500 บาท</button>
</div>
</br></br></br></br>
<p>
<!--<div style="white-space: pre;font-weight: bold;"></divstyle=">&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลสถานการณ์:&nbsp;<span style=" color :DodgerBlue; white-space: pre;font-weight: bold;"><?php echo "โรงพยาบาลเจริญกรุง"; ?></span></div>
<div style="white-space: pre;font-weight: bold;"></divstyle=">&nbsp;&nbsp;&nbsp;&nbsp;หมายเลขผู้ป่วย:&nbsp;<span style=" color :#F40000; text-shadow: 1px 1px 2px orange;white-space: pre;font-weight: bold;"><?php echo "BKK0001"; ?></span></div>
-->
</p>
<div id="OVERALL" class="tabcontent">
  <table>
  <tr>
    <th><h3>OVERALL</h3></th>
    <th><form method="post" action="export_overall.php">
     &nbsp;&nbsp;<input type="submit" name="export" class="btn btn-success" value="export" />
    </form></th>
     </tr>
  </table>
  <?php
            if ($conn_rds->connect_error) {
             die("Connection failed: " . $conn_rds->connect_error);
             } 
            

            //sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
           //$sql ="SELECT DATE_FORMAT(date_interested, '%d/%b/%Y') AS dtYear, COUNT(date_interested) AS count_year FROM Not_interested  ORDER BY dtYear ASC";
									 	$sqlmax ="SELECT REGMOBILE,pay_for,pay_value,count(pay_value)as g1,sum(pay_value) as s1,ecoupon01,ecoupon02,ecoupon03,ecoupon04 FROM tbpayqueue inner join tbanswer on tbpayqueue.mnumber = tbanswer.REGMOBILE where pay_value > 0 GROUP BY pay_for,pay_value,ecoupon01,ecoupon02,ecoupon03,ecoupon04,REGMOBILE";
											//$sql ="SELECT DATE_FORMAT(date_interested, '%d' ".'-'." '%m' ".'-'." '%Y') AS dtYear, COUNT(date_interested) AS count_year FROM Not_interested GROUP BY dtYear HAVING count_year ORDER BY dtYear DESC";
          // $sql ="SELECT DATE_FORMAT(date_interested, '%d' ".'-'." '%m' ".'-'." '%Y') AS dtYear, COUNT(date_interested) AS count_year FROM Not_interested GROUP BY dtYear HAVING count_year ORDER BY dtYear DESC";
							           $sresultmax = $conn_rds->query($sqlmax);
                         //$row_maxsr = $sresultmax->fetch_assoc();
                          $num_rows = mysqli_num_rows($sresultmax);
                      
 
 if($num_rows  == 0){
  echo "ไม่พบข้อมูล";
 }
 else{    
           ?>
  <p>
    <table id="module_t">
  <tr>
    <th><center>เบอร์โทรศัพท์</center></th>
    <th><center>จ่ายค่า</center></th>
     <th><center>จำนวนเงิน</center></th>
    <th><center>บัตรที่ใช้ใบที่ 1</center></th>
    <th><center>บัตรที่ใช้ใบที่ 2</center></th>
    <th><center>บัตรที่ใช้ใบที่ 3</center></th>
    <th><center>บัตรที่ใช้ใบที่ 4</center></th>
  </tr>
 
  <tr>
     <?php while ($row_maxsr = mysqli_fetch_assoc($sresultmax)) { 
                        $telcode =$row_maxsr['REGMOBILE'];
                         $pay_for =$row_maxsr['pay_for'];
                         $sum1 =$row_maxsr['s1'];
                         $e1 =$row_maxsr['ecoupon01'];
                         $e2 =$row_maxsr['ecoupon02'];
                         $e3 =$row_maxsr['ecoupon03'];
                         $e4 =$row_maxsr['ecoupon04'];
                            $tel_encode_max = decode($telcode,"w-e-b-r-d-s");
      ?>
      <td>
        <center><?php echo $tel_encode_max;?></center>
      </td>
        <td>
           <center><?php
        if($pay_for == 'Q' ){
             echo "<center><b style='color: #FF001D;'>แบบสอบถาม</b></center>";
      }
      elseif($pay_for == 'R'){
            echo "<center><b style='color: #0CA80A;'>ชวนเพื่อน</b></center>";
           }
     elseif($pay_for == 'L'){
            echo "<center><b style='color: #CE6F33;'>Clinic</b></center>";
           }
      else{
       echo "<center><b style='color: #000000;'>NA</b></center>";
      }
       ?></center>
      </td>
        <td>
           <center><?php echo $sum1;?></center>
      </td>
        <td>
           <center><?php echo $e1;?></center>
      </td>
          <td>
           <center><?php echo $e2;?></center>
      </td>
            <td>
           <center><?php echo $e3;?></center>
      </td>
              <td>
          <center><?php echo $e4;?></center>
      </td>
              
  </tr>
      <?php  } } ?>
</p>
  </table>
    
 </div>

<div id="V150" class="tabcontent">
 <table>
  <tr>
    <th><h3>บัตร 150 บาท</h3></th>
    <th><form method="post" action="export_e150.php">
     &nbsp;&nbsp;<input type="submit" name="export" class="btn btn-success" value="export" />
    </form></th>
     </tr>
  </table>
  <?php
            if ($conn_rds->connect_error) {
             die("Connection failed: " . $conn_rds->connect_error);
             } 
            

            //sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
           //$sql ="SELECT DATE_FORMAT(date_interested, '%d/%b/%Y') AS dtYear, COUNT(date_interested) AS count_year FROM Not_interested  ORDER BY dtYear ASC";
									 	$sqlmax1 ="
SELECT * FROM tbecoupon WHERE cvalue =150 and used_date  is not null ";
											//$sql ="SELECT DATE_FORMAT(date_interested, '%d' ".'-'." '%m' ".'-'." '%Y') AS dtYear, COUNT(date_interested) AS count_year FROM Not_interested GROUP BY dtYear HAVING count_year ORDER BY dtYear DESC";
          // $sql ="SELECT DATE_FORMAT(date_interested, '%d' ".'-'." '%m' ".'-'." '%Y') AS dtYear, COUNT(date_interested) AS count_year FROM Not_interested GROUP BY dtYear HAVING count_year ORDER BY dtYear DESC";
							           $sresultmax1 = $conn_rds->query($sqlmax1);
                         //$row_maxsr = $sresultmax->fetch_assoc();
                          $num_rows1 = mysqli_num_rows($sresultmax1);
                      
 
 if($num_rows1  == 0){
  echo "ไม่พบข้อมูล";
 }
 else{    
           ?>
  <p>
    <table id="module_t">
  <tr>
    <th><center>รหัสบัตร</center></th>
    <th><center>จำนวนเงิน</center></th>
    <th><center>วันที่</center></th>
    <th><center>Remark</center></th>
  </tr>
 
  <tr>
   <?php while ($row_maxsr1 = mysqli_fetch_assoc($sresultmax1)) { 
                         $cnumber =$row_maxsr1['cnumber'];
                         $cvalue =$row_maxsr1['cvalue'];
                         $dateExp=$row_maxsr1['used_date'];
                         $remark =$row_maxsr1['remark'];
                          $used_date = date("d/m/Y", strtotime($dateExp));
      ?>
      <td>
        <center><?php echo $cnumber;?></center>
      </td>
        <td>
           <center><?php echo $cvalue;?></center>
      </td>
        <td>
           <center><?php echo  $used_date;?></center>
      </td>
        <td>
           <center><?php echo $remark;?></center>
      </td>
            
  </tr>
      <?php  } } ?>
</p>
  </table>
 </div>

<div id="V50" class="tabcontent">
<table>
  <tr>
    <th><h3>บัตร 50 บาท</h3></th>
    <th><form method="post" action="export_e50.php">
     &nbsp;&nbsp;<input type="submit" name="export" class="btn btn-success" value="export" />
    </form></th>
     </tr>
  </table>
    <?php
            if ($conn_rds->connect_error) {
             die("Connection failed: " . $conn_rds->connect_error);
             } 
            

            //sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
           //$sql ="SELECT DATE_FORMAT(date_interested, '%d/%b/%Y') AS dtYear, COUNT(date_interested) AS count_year FROM Not_interested  ORDER BY dtYear ASC";
									 	$sqlmax2 ="
SELECT * FROM tbecoupon WHERE cvalue =50 and used_date  is not null ";
											//$sql ="SELECT DATE_FORMAT(date_interested, '%d' ".'-'." '%m' ".'-'." '%Y') AS dtYear, COUNT(date_interested) AS count_year FROM Not_interested GROUP BY dtYear HAVING count_year ORDER BY dtYear DESC";
          // $sql ="SELECT DATE_FORMAT(date_interested, '%d' ".'-'." '%m' ".'-'." '%Y') AS dtYear, COUNT(date_interested) AS count_year FROM Not_interested GROUP BY dtYear HAVING count_year ORDER BY dtYear DESC";
							           $sresultmax2 = $conn_rds->query($sqlmax2);
                         //$row_maxsr = $sresultmax->fetch_assoc();
                          $num_rows2 = mysqli_num_rows($sresultmax2);
                      
 
 if($num_rows2  == 0){
  echo "ไม่พบข้อมูล";
 }
 else{    
           ?>
  <p>
    <table id="module_t">
  <tr>
    <th><center>รหัสบัตร</center></th>
    <th><center>จำนวนเงิน</center></th>
    <th><center>วันที่</center></th>
    <th><center>Remark</center></th>
  </tr>
 
  <tr>
   <?php while ($row_maxsr2 = mysqli_fetch_assoc($sresultmax2)) { 
                         $cnumber1 =$row_maxsr2['cnumber'];
                         $cvalue1 =$row_maxsr2['cvalue'];
                         $dateExp1  =$row_maxsr2['used_date'];
                         $remark1 =$row_maxsr2['remark'];
                         
                          $used_date1 = date("d/m/Y", strtotime($dateExp1));
      ?>
      <td>
        <center><?php echo $cnumber1;?></center>
      </td>
        <td>
           <center><?php echo $cvalue1;?></center>
      </td>
        <td>
           <center><?php echo  $used_date1;?></center>
      </td>
        <td>
           <center><?php echo $remark1;?></center>
      </td>
            
  </tr>
      <?php  } } ?>
</p>
  </table>
 </div>

<div id="V500" class="tabcontent">
  <table>
  <tr>
    <th><h3>บัตร 500 บาท</h3></th>
    <th><form method="post" action="export_e500.php">
     &nbsp;&nbsp;<input type="submit" name="export" class="btn btn-success" value="export" />
    </form></th>
     </tr>
  </table>
  <?php
            if ($conn_rds->connect_error) {
             die("Connection failed: " . $conn_rds->connect_error);
             } 
            

          $sqlmax3 ="SELECT * FROM tbecoupon WHERE cvalue =500 and used_date  is not null ";
										 $sresultmax3 = $conn_rds->query($sqlmax3);
                         //$row_maxsr = $sresultmax->fetch_assoc();
                          $num_rows3 = mysqli_num_rows($sresultmax3);
                      
 
 if($num_rows3  == 0){
  echo "ไม่พบข้อมูล";
 }
 else{    
           ?>
  <p>
    <table id="module_t">
  <tr>
    <th><center>รหัสบัตร</center></th>
    <th><center>จำนวนเงิน</center></th>
    <th><center>วันที่</center></th>
    <th><center>Remark</center></th>
  </tr>
 
  <tr>
   <?php while ($row_maxsr3 = mysqli_fetch_assoc($sresultmax3)) { 
                         $cnumber2 =$row_maxsr3['cnumber'];
                         $cvalue2 =$row_maxsr3['cvalue'];
                         $dateExp2  =$row_maxsr3['used_date'];
                         $remark2 =$row_maxsr3['remark'];
                         
                          $used_date2 = date("d/m/Y", strtotime($dateExp2));
      ?>
      <td>
        <center><?php echo $cnumber2;?></center>
      </td>
        <td>
           <center><?php echo $cvalue2;?></center>
      </td>
        <td>
           <center><?php echo  $used_date2;?></center>
      </td>
        <td>
           <center><?php echo $remark2;?></center>
      </td>
            
  </tr>
      <?php  } } ?>
</p>
  </table>
 </div>


<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
