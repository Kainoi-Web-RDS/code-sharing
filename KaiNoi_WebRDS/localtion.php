<?php
session_start();
require_once('connections/conn_rds.php');

    header("content-type: text/html; charset=utf-8");
    /*header ("Expires: Wed, 21 Aug 2029 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");*/

   // include "config.php";
   // conndb();

    $data = $_GET['data'];
    $val = $_GET['val'];


         if ($data=='geo') { 
              echo "<select name='geo' id='geomain' style='opacity: 5; border-radius: 15px;  width: 150px;height: 40px; font-size: 16px; text-align: center;' onChange=\"dochange('province', this.value)\">";
              echo "<option value='0' selected  disabled>- เลือกภาค -</option>\n";
              //$result=mysqli_query("select * from provinces order by PROVINCE_NAME");
             $result =  $conn_rds->query("select * from geography order by GEO_ID");
              while($row = mysqli_fetch_array($result)){
                   echo "<option value=\"$row[GEO_ID]\" >$row[GEO_NAME]</option>" ;
              }
         } else if ($data=='province') {
              echo "<select name='province' style='opacity: 5; border-radius: 15px;  width: 150px;height: 40px; font-size: 16px; text-align: center;' onChange=\"dochange('amphur', this.value)\">";
             // echo "<select name='amphur' style='opacity: 5; border-radius: 15px;  width: 150px;height: 40px; font-size: 20px; text-align: center;' onChange=\"dochange('district', this.value)\">";
              echo "<option value='0' selected  disabled>- เลือกจังหวัด -</option>\n";                             
              //$result=mysqli_query("SELECT * FROM amphures WHERE PROVINCE_ID= '$val' ORDER BY AMPHUR_NAME");
              $result =  $conn_rds->query("SELECT * FROM provinces WHERE GEO_ID= '$val' ORDER BY PROVINCE_ID");
              while($row = mysqli_fetch_array($result)){
                   echo "<option value=\"$row[PROVINCE_ID]\" >$row[PROVINCE_NAME]</option>" ;
              }
         } else if ($data=='amphur') {
              //echo "<select name='district'>\n";
                 echo "<select name='amphur' style='opacity: 5; border-radius: 15px;  width: 150px;height: 40px; font-size: 16px; text-align: center;'  onChange=\"dochange('ELLOCZIP', this.value)\">";
              echo "<option value='0' selected  disabled>- เลือกอำเภอ -</option>\n";
              //$result=mysqli_query("SELECT * FROM districts WHERE AMPHUR_ID= '$val' ORDER BY DISTRICT_NAME");
                $result =  $conn_rds->query("SELECT * FROM amphures WHERE PROVINCE_ID= '$val' ORDER BY AMPHUR_ID");
              while($row = mysqli_fetch_array($result)){
                   echo "<option value=\"$row[AMPHUR_ID]\" >$row[AMPHUR_NAME]</option> \n" ;
              }
         }else if ($data=='ELLOCZIP') {
              //echo "<select name='ELLOCZIP'>\n";
              //echo "<option value='0'>รหัสไปษณีย์</option>\n";
              //$result=mysqli_query("SELECT * FROM districts WHERE AMPHUR_ID= '$val' ORDER BY DISTRICT_NAME");
             //$result// =  $conn->query("select AMPHUR_CODE from amphures WHERE AMPHUR_CODE= '$val' ");
             //$row = mysqli_fetch_assoc($result);
               $result =  $conn_rds->query("SELECT * FROM amphures WHERE AMPHUR_ID= '$val' ORDER BY AMPHUR_ID");
              while($row = mysqli_fetch_array($result)){
             echo "<input style='opacity: 5; border-radius: 15px;  width: 150px;height: 40px; font-size: 16px; text-align: center;'  type='hidden' class='event-details' min='1' max='98' maxlength='5'  name='ELLOCZIP' id='ELLOCZIP' value=\"$row[AMPHUR_CODE]\" >" ;
             //echo "<input type='text' value=\"$row[zipcode]\" >" ;
             //  unset($_SESSION['zipcode']);
             //echo $row['zipcode'];
             // $_SESSION["zipcode"] =  $row['zipcode'];
              }
         }
         echo "</select>\n";
         $conn_rds->close();
         //echo mysql_error();
        //closedb();
?>