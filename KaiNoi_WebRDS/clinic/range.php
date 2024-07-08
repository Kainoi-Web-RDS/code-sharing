<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php'); 
 $HOS = $_SESSION["HOS"];
// Range.php


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
                                                           
                                                           function DateThai($strDate)
                                                           {
                                                           $strYear = date("Y",strtotime($strDate))+543;
                                                           $strMonth= date("n",strtotime($strDate));
                                                           $strDay= date("d",strtotime($strDate));
                                                           $strHour= date("H",strtotime($strDate));
                                                           $strMinute= date("i",strtotime($strDate));
                                                           $strSeconds= date("s",strtotime($strDate));
                                                           $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                                           $strMonthThai=$strMonthCut[$strMonth];
                                                           return "$strDay $strMonthThai $strYear";
                                                           }
	$d1 = $_POST["datepicker1"];
	$d1_day=substr($d1,0,2);
	$d1_month=substr($d1,3,2);
    $d1_year=substr($d1,6,4);
	$d1_year2 = $d1_year-543;
    $d1new ="$d1_year2-$d1_month-$d1_day";

		
	$d2 = $_POST["datepicker2"];
	$d2_day=substr($d2,0,2);
	$d2_month=substr($d2,3,2);
    $d2_year=substr($d2,6,4);
	$d2_year2 = $d2_year-543;
	$d2new ="$d2_year2-$d2_month-$d2_day";
	   

if(isset($_POST["datepicker1"], $_POST["datepicker2"]))
{
    if($conn_rds->connect_error) {
                die("Connection failed: " . $conn_rds->connect_error);
            }
	$result = '';
	$query = "SELECT * FROM tblab WHERE BMCLID='$HOS' and BMDATE BETWEEN '$d1new' AND '$d2new' order by BMDATE asc";
	$sql = mysqli_query($conn_rds, $query);
	$result .='
	<table class="table table-bordered">
	<tr>
	<th><center>วันที่ตรวจ</center></th>
    <th><center>CODE</center></th>
    <th><center>เบอร์โทรศัพท์</center></th>
    <th><center>Lab No.</center></th>
    <th><center>ลงผลการตรวจ</center></th>
    <th><center>ผู้รายงาน</center></th>
    <th><center>แก้ไขผลการตรวจ</center></th>
	</tr>';
	if(mysqli_num_rows($sql) > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			$BMDATE =  $row['BMDATE'];
			$BMDATE_NEW =DateThai($BMDATE);
			$BMRECID =  $row['BMRECID'];
			$BMRETEL1 =  $row['BMRETEL1'];                                                 
		    $mobilephoneEX = decode($BMRETEL1,"w-e-b-r-d-s");
			$BMRECID =  $row['BMRECID'];
			$la1=   $row['BMHIVRES'];
			$la2=   $row['BMVLRES'];
			$la3=   $row['Syphilis'];
			$la4_1=   $row['HB'];
			$la4_2=   $row['HC'];
			$la5=   $row['Recency'];
			$labno =  $row['LABNUMBER'];
			
			$keytest1 =$row['keytest1'];
            $keytest2 =$row['keytest2'];
            $keytest3 =$row['keytest3'];
            $keytest4 =$row['keytest4'];
            $keytest5 =$row['keytest5'];
			$BMSTID=  $row['BMSTID'];
				if($keytest1 == 1 and $keytest2 == 2 and $keytest3 == 3 and $keytest4 == 4 and $keytest5 == 5){
					$s1 ="<b style='color: #0CA80A;'>ผลการตรวจครบถ้วน</b>";
				   }
				   else{
					$s1 ="<b style='color: #FF361C;'>ยังลงผลไม่ครบ </b>";
				   }
			$result .='
			<tr>
			<td><center>'.$BMDATE_NEW.'</center></td>
			<td><center>'.$BMRECID.'</center></td>
			<td><center>'.$mobilephoneEX.'</center></td>
			<td><center>หมายเลขที่ออกจาก  รพ. :<br>"<b style="color: #0046F7;">'.$labno.'</center></td>
			<td><center>'.$s1.'</center></td>
			<td><center>'.$BMSTID.'</center></td>
			<td><center><a href="editresult.php?BMRECID='.$BMRECID.'"><img src="img/onebit_21.png" width="24" height="24"></a></center></td>
			</tr>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No Record Item Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}
?>