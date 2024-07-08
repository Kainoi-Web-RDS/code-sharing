<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php');
  $STATUS = $_SESSION['STATUS'];
  $HOS = $_SESSION["HOS"];
/*	if($STATUS!='1'){
    Header("Location: logout.php");  
  }*/
                                                 $item = $_POST['itemname'];
                                                 $sea = strlen($item);
                                                 if($sea == 0){
                                                    echo "ไม่พบข้อมูล";
                                                    exit(0);
                                                 }
  
    error_reporting( error_reporting() & ~E_NOTICE );
                                                         function encode($string,$key) {
                                                         
                                                             $key = sha1($key);
                                                             $strLen = strlen($string);
                                                             $keyLen = strlen($key);
                                                             for ($i = 0; $i < $strLen; $i++) {
                                                                 $ordStr = ord(substr($string,$i,1));
                                                                 if ($j == $keyLen) { $j = 0; }
                                                                 $ordKey = ord(substr($key,$j,1));
                                                                 $j++;
                                                                 $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
                                                             }
                                                             return $hash;
                                                         }
                                                         
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
                                                         $mobilephoneEX = encode($item,"w-e-b-r-d-s");
                                                         
                                 if ($conn_rds->connect_error) {
                                  die("Connection failed: " . $conn_rds->connect_error);
                                  }
                               
                                                  
                                                 if($sea == 0){
                                                    echo "ไม่พบข้อมูล";
                                                    exit(0);
                                                 }
                                                 elseif($sea  != 0 ){
                                                     
                                                         //   w2e464641334w2u2z2u2
                                                       
                                                         //$sql = "select * from tblab where BMCLID='$HOS' and  ((BMRETEL1 like '%$mobilephoneEX%') or (LABNUMBER like '%$item%'))";
                                                          $sql = "select * from tbresult where LABNUMBER like '%$item%'"; 
                                                  }
                                                  

 $result = $conn_rds->query($sql) ;
 $num_rows = mysqli_num_rows($result);
 if($num_rows  == 0){
  echo "ไม่พบข้อมูล";
 }
 else{
?>

 <table class="table table-bordered">
 <thead>
 <tr>
  <th><center>Lab No.</center></th>
 <th><center>ผล HIV</center></th>
  <th><center>ค่า Viral Load</center></th>
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
 <?php while ($row = mysqli_fetch_assoc($result)) { ?>
 <tr>
 
  <td><center>"<b style="color: #0046F7;"><?php
 // $BMRECID =  $row['BMRECID'];
  /*
  $_SESSION["BMRECID"] = $BMRECID;
  $BMRECID= $_SESSION["BMRECID"];*/
  /*
           $keytest1 =$row['keytest1'];
           $keytest2 =$row['keytest2'];
           $keytest3 =$row['keytest3'];
           $keytest4 =$row['keytest4'];
           $keytest5 =$row['keytest5'];
           
           if($keytest1 == 1 and $keytest2 == 2 and $keytest3 == 3 and $keytest4 == 4 and $keytest5 == 5){
           $open = "style='display: none;'";
           }
           else{
            $open = "style='display: block;'";
           }
  */
  
  $la1=   $row['BMHIVRES'];
  $la2=   $row['BMVLRES'];
  $la2_2=   $row['BMVLRES_OTH'];
  $la3=   $row['Syphilis_RPR'];
  $la3_1=   $row['titer'];
  $la3_2=   $row['Syphilis_TP'];
  $la4_1=   $row['HB'];
  $la4_2=   $row['HC'];
  $la5=   $row['Recency'];
  $labno =  $row['LABNUMBER'];
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
            echo "<center><b style='color: #CE6F33;'>INDETERMINATE</b></center>";
           }
      else{
       echo "<center><b style='color: #000000;'>NA</b></center>";
      }
  ?> 
 </td>
  <td  style="width: 15%;">
    <?php
   if($la2_2 == '' ){
           echo "<center><b style='color: #000000;'>NA</b><br></center>";
      } 
      else{
              echo "<center><b style='color: #000000;'>มีค่า Viral load</b><br></center>";
              echo "<center><b style='color: #000000;'>$la2_2</b></center>";
           }
      
      
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
  
  
   

    
  <td> <center><a href="editresult.php?LABNUMBER=<?php echo $labno;?>"><img src="img/onebit_21.png" width="24" height="24"></a></center></td>
 </tr>
 <?php  } } ?>
 </tbody>
 </table>