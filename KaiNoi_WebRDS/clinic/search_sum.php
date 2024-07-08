<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php');
  $STATUS = $_SESSION['STATUS'];
  $HOS = $_SESSION["HOS"];
	if($STATUS!='1'){
    Header("Location: logout.php");  
  }
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
                                                       
                                                         $sql = "select * from tblab where BMCLID='$HOS' and  ((BMRETEL1 like '%$mobilephoneEX%') or (LABNUMBER like '%$item%'))";
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
 <th><center>ลงผลการตรวจ</center></th>
  <th><center>แก้ไข</center></th>
 </tr>
 </thead>
 <tbody>
 <?php while ($row = mysqli_fetch_assoc($result)) { ?>
 <tr>
 
  <td><center>หมายเลขที่ออกจากโรงพยาบาล :<br>"<b style="color: #0046F7;"><?php
  $BMRECID =  $row['BMRECID'];
  
  $_SESSION["BMRECID"] = $BMRECID;
  $BMRECID= $_SESSION["BMRECID"];
  
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
  
  
  $la1=   $row['BMHIVRES'];
  $la2=   $row['BMVLRES'];
  $la3=   $row['Syphilis'];
  $la4_1=   $row['HB'];
  $la4_2=   $row['HC'];
  $la5=   $row['Recency'];
  $labno =  $row['LABNUMBER'];
  echo $labno; ?></b>"
  </center></td>
 <td  style="width: 60%;">
   <form  class='form'name='Reg_select' method='post' action='code_selectresult.php'>
  <?php
  if($la1 ==0 or $la1 == NULL ){
       echo "<label class='containerins123'>&nbsp;ผลการตรวจหาการติดเชื้อเอชไอวี <input type='checkbox' id='yesCheck1'  name='Keytest1' value='1'>";
       echo "<span class='checkmarkins123'></span>";
       echo "</label>";
      }
      else{
       echo "<b style='color: #0CA80A;'>ลงผลการตรวจ เอชไอวี แล้ว</b>";
       echo "<br>";echo "<br>";
      }
     if($la2 ==0 or $la2 == NULL ){
      echo "<label class='containerins123'>&nbsp;ผลการตรวจ viral load<input type='checkbox' id='yesCheck2'  name='Keytest2' value='2'>";
      echo "<span class='checkmarkins123'></span>";
      echo "</label>";
       }
      else{
       echo "<b style='color: #0CA80A;'>ลงผลการตรวจviral loadแล้ว</b>";
       echo "<br>";echo "<br>";
      }
       if($la3 ==0 or $la3 == NULL ){
      echo "<label class='containerins123'>&nbsp;ผลการตรวจ ซิฟิลิส<input type='checkbox' id='yesCheck3'  name='Keytest3' value='3'>";
      echo "<span class='checkmarkins123'></span>";
      echo "</label>";
       }
      else{
       echo "<b style='color: #0CA80A;'>ลงผลการตรวจ ซิฟิลิสแล้ว</b>";
       echo "<br>";echo "<br>";
      }
      if($la4_1 ==0 or $la4_1 == NULL and $la4_2 ==0 or $la4_2 == NULL){
        echo "<label class='containerins123'>&nbsp;ผลการตรวจไวรัสตับอักเสบ<input type='checkbox' id='yesCheck4'  name='Keytest4' value='4'>";
        echo "<span class='checkmarkins123'></span>";
        echo "</label>";
         }
      else{
       echo "<b style='color: #0CA80A;'>ลงผลการตรวจ ไวรัสตับอักเสบแล้ว</b>";
       echo "<br>";echo "<br>";
      }
      if($la5 ==0 or $la5 == NULL ){
      echo "<label class='containerins123'>&nbsp;ผลการตรวจ Recency<input type='checkbox' id='yesCheck5'  name='Keytest5' value='5'>";
      echo "<span class='checkmarkins123'></span>";
      echo "</label>";
           }
      else{
       echo "<b style='color: #0CA80A;'>ลงผลการตรวจRecencyแล้ว</b>";
       echo "<br>";echo "<br>";
      }
      ?>
   <div id="open" <?php echo $open; ?>>
    <center>
    <button type='submit' id='submit' class='buttonf' ><h4><font color='#ffffff'>ตกลง</font></h4></button>
    </center>
   </div>
    </form>
   
   </td>
  <td> <center><a href="editresult.php?BMRECID=<?php echo $row['BMRECID'];?>"><img src="img/onebit_21.png" width="24" height="24"></a></center></td>
 </tr>
 <?php  } } ?>
 </tbody>
 </table>