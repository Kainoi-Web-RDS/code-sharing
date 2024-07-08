<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php'); 

  
                                                 $item = $_POST['itemname'];
                                                 $sea = strlen($item);
                                                 if($sea == 0){
                                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ไม่พบข้อมูล";
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
                                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ไม่พบข้อมูล";
                                                    exit(0);
                                                 }
                                                 elseif($sea  != 0 ){
                                                     
                                                         //   w2e464641334w2u2z2u2
                                                       
                                                         //$sql = "select * from tblab where BMCLID='$HOS' and  ((BMRETEL1 like '%$mobilephoneEX%') or (LABNUMBER like '%$item%'))";
                                                         $sql = "SELECT REGMOBILE,pay_for,pay_value,count(pay_value)as g1,sum(pay_value) as s1,ecoupon01,ecoupon02,ecoupon03,ecoupon04 FROM tbpayqueue inner join tbanswer on tbpayqueue.mnumber = tbanswer.REGMOBILE where pay_value > 0 and (REGMOBILE like '%$mobilephoneEX%')  GROUP BY pay_for,pay_value,ecoupon01,ecoupon02,ecoupon03,ecoupon04,REGMOBILE ";
                                                         
                                                  }
                                                  

 $result = $conn_rds->query($sql) ;
 $num_rows = mysqli_num_rows($result);
 if($num_rows  == 0){
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ไม่พบข้อมูล";
 }
 else{
?>
<br>
 <table class="table table-bordered table-hover">
 <thead>
 <tr>
 <th><center>TEL No.</center></th>
 <th><center>จ่ายค่า</center></th>
 <th><center>จำนวนเงิน (บาท)</center></th>
  <th><center>SEND</center></th>
 </tr>
 </thead>
 <tbody>
 <?php
 
 while ($row = mysqli_fetch_assoc($result)) {
 
  ?>
 <tr>
 
  <td style="padding-left: 20px"><center><b style="color: #0046F7;"><?php
  
  $telno=   $row['REGMOBILE'];
  $mobilephoneEX_seacrh = decode($telno,"w-e-b-r-d-s");
  echo $mobilephoneEX_seacrh;
  ?></b>
  </center></td>
 <td><center><?php $pay_for = $row['pay_for'];
  if($pay_for == "Q"){
    echo "ค่าตอบแบบสอบถาม";
  }
  elseif($pay_for == "R"){
    echo "ค่าเชวนเพื่อนเข้าร่วมโครงการ";
  }
  elseif($pay_for == "L"){
    echo "ค่ามาตรวจเลือด";
  }
  
 ?>
 </center></td>
 <td><center><?php echo $row['pay_value'];?>
 </center></td>
 

  <td> <center>
  <?php
  $a1 =$row['pay_for'];
  $a2 =$row['REGMOBILE'];
  $a3 =$row['pay_value'];
  $idmodal= "$a1$a2$a3";
  
  ?>
         <button type="button" class="buttonf" onclick="testmodal('<?php echo $idmodal ?>');"/>จ่ายเงินค่าตอบแทน</button>
          
  </center></td>
 </tr>
 <?php  } } ?>
 </tbody>
 </table>
 
 