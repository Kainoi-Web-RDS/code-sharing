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
//export.php  

$output = '';
if(isset($_POST["export"]))
{
            if ($conn_rds->connect_error) {
             die("Connection failed: " . $conn_rds->connect_error);
             } 
 $query = "SELECT REGMOBILE,pay_for,pay_value,count(pay_value)as g1,sum(pay_value) as s1,ecoupon01,ecoupon02,ecoupon03,ecoupon04 FROM tbpayqueue inner join tbanswer on tbpayqueue.mnumber = tbanswer.REGMOBILE where pay_value > 0 GROUP BY pay_for,pay_value,ecoupon01,ecoupon02,ecoupon03,ecoupon04,REGMOBILE";
 $result = mysqli_query($conn_rds, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  $output .= '
   <table class="table" x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <tr>  
                         <th>เบอร์โทรศัพท์</th>  
                         <th>จ่ายค่า</th>  
                         <th>จำนวนเงิน</th>  
                         <th>บัตรที่ใช้ใบที่ 1</th>
                         <th>บัตรที่ใช้ใบที่ 2</th>
                         <th>บัตรที่ใช้ใบที่ 3</th>
                        <th>บัตรที่ใช้ใบที่ 4</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
      $telcode = $row["REGMOBILE"];
    $pay_for =$row['pay_for'];
    
     if($pay_for == 'Q' ){
             $pay = "<center><b style='color: #FF001D;'>แบบสอบถาม</b></center>";
      }
      elseif($pay_for == 'R'){
            $pay = "<center><b style='color: #0CA80A;'>ชวนเพื่อน</b></center>";
           }
     elseif($pay_for == 'L'){
            $pay =  "<center><b style='color: #CE6F33;'>Clinic</b></center>";
           }
      else{
          $pay =  "<center><b style='color: #000000;'>NA</b></center>";
      }
    $tel_encode_max = decode($telcode,"w-e-b-r-d-s");
   $output .= '
    <tr>  
                         <td>&nbsp;'.$tel_encode_max.'</td>  
                         <td>'.$pay.'</td>  
          <td>'.$row["s1"].'</td>  
       <td>'.$row["ecoupon01"].'</td>  
       <td>'.$row["ecoupon02"].'</td>
        <td>'.$row["ecoupon03"].'</td>
         <td>'.$row["ecoupon04"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=kainoi_overall.xls');
  echo $output;
 }
}
?>
