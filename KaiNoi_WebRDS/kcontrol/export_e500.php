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
 $query = "SELECT * FROM tbecoupon WHERE cvalue =500 and used_date  is not null";
 $result = mysqli_query($conn_rds, $query);
 if(mysqli_num_rows($result) > 0)
 {
  
  $output .= '
   <table class="table" x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
                    <tr>  
                         <th>รหัสบัตร</th>  
                         <th>จำนวนเงิน</th>  
                         <th>วันที่</th>  
                         <th>Remark</th>
                
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
                         $cnumber =$row['cnumber'];
                         $cvalue =$row['cvalue'];
                         $dateExp=$row['used_date'];
                         $remark =$row['remark'];
                          $used_date = date("d/m/Y", strtotime($dateExp));
    
   $output .= '
    <tr>  
          <td>&nbsp;'.$cnumber.'</td>  
          <td>'.$cvalue.'</td>  
          <td>'.$used_date.'</td>  
          <td>'.$remark.'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=kainoi_e500.xls');
  echo $output;
 }
}
?>
