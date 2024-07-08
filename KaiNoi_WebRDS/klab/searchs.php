<?php
ob_start();
session_start();
require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php');
  $STATUS = $_SESSION['STATUS'];
  $HOS = $_SESSION["HOS"];
	if($STATUS!='2'){
    Header("Location: logout.php");  
  }
                                                 $item2 = $_POST['itemname2'];
                                                 $sea2 = strlen($item2);
                                                 if($sea2 == 0){
                                                    echo "ไม่พบข้อมูล";
                                                    exit(0);
                                                 }
                                                         
                                                         
                                 if ($conn_rds->connect_error) {
                                  die("Connection failed: " . $conn_rds->connect_error);
                                  }
                               
                                                  
                                                 if($sea2 == 0){
                                                    echo "ไม่พบข้อมูล";
                                                    exit(0);
                                                 }
                                                 elseif($sea  != 0 ){
                                                     
                                                         //   w2e464641334w2u2z2u2
                                                       
                                                         $sqlsa = "select * from tbresult where LABNUMBER like '%$item2%'";
                                                  }
                                                  

 $resultsa = $conn_rds->query($sqlsa) ;
 $num_rows1 = mysqli_num_rows($resultsa);
 if($num_rows1 == 0){
  echo "ไม่พบข้อมูล";
 }
 else{
?>

 <table class="table table-bordered">
 <thead>
 <tr>
  <th><center>Lab No.</center></th>
 <th><center>HIV</center></th>
  <th><center>Viral Load</center></th>
 <th><center>ผลตรวจวิธี RPR</center></th>
     <th><center>titer</center></th>
       <th><center>ผลตรวจวิธี TP Test</center></th>
    <th><center>HBsAg Result</center></th>
     <th><center>Anti-HCV Result</center></th>
      <th><center>RTRI Result</center></th>
  <th><center>แก้ไข</center></th>
 </tr>
 </thead>
 <tbody>
 <?php while ($row1 = mysqli_fetch_assoc($resultsa)) { ?>
 <tr>
 
  <td><center>หมายเลขที่ออกจากโรงพยาบาล :<br>"<b style="color: #0046F7;"><?php

  
  $la1=   $row1['BMHIVRES'];
  $la2=   $row1['BMVLRES'];
  $la2_2=   $row1['BMVLRES_OTH'];
   $la3=   $row1['Syphilis_RPR'];
  $la3_1=   $row1['titer'];
  $la3_2=   $row1['Syphilis_TP'];
  $la4_1=   $row1['HB'];
  $la4_2=   $row1['HC'];
  $la5=   $row1['Recency'];
  $labno =  $row1['LABNUMBER'];
  echo $labno; ?></b>"
  </center></td>
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
    <?php
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
   if($la3_1 == '' ){
           echo "<center><b style='color: #000000;'>NA</b><br></center>";
      } 
      else{
              echo "<center><b style='color: #000000;'>มีค่า titer</b><br></center>";
              echo "<center><b style='color: #000000;'>$la3_1</b></center>";
           }
      
      
  ?> 
   
  </td>
    <td  style="width: 15%; ">
    <?php
   if($la3_2 == 1 ){
             echo "<center><b style='color: #FF001D;'>REACTIVE</b></center>";
      }
      elseif($la3_2 == 2){
            echo "<center><b style='color: #0CA80A;'>NONREACTIVE</b></center>";
           }
      elseif($la3_2 == 3){
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
             echo "<center><b style='color: #FF001D;'>Positive</b></center>";
      }
      elseif($la4_1 == 2){
            echo "<center><b style='color: #0CA80A;'>Negative</b></center>";
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
             echo "<center><b style='color: #FF001D;'>Positive</b></center>";
      }
      elseif($la4_2 == 2){
            echo "<center><b style='color: #0CA80A;'>Negative</b></center>";
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
  
  
   
  <?php
  
      ?>
    
  <td> <center><a href="editresults.php?LABNUMBER=<?php echo $row1['LABNUMBER'];?>"><img src="img/onebit_21.png" width="24" height="24"></a></center></td>
 </tr>
 <?php  } } ?>
 </tbody>
 </table>