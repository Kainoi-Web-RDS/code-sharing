<?php
ob_start();
session_start();


if (isset($_SESSION['mobilephone']) == "") {
    header("location: index_hs.php");
    exit();
}

	require_once('connections/conn_rds.php');
	mysqli_set_charset($conn_rds, 'utf8');
	if ($conn_rds->connect_error) {
    	die("Connection failed: " . $conn_rds->connect_error);
    }
	      $datereg=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
       $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
                                        
$mobilephone = $_SESSION["mobilephone"];
	
$NATION =  $_POST["NATION"];  /// new add
$_SESSION["NATION"] = $NATION;

$NATION_OTH =  $_POST["NATION_OTH"];  /// new add
$_SESSION["NATION_OTH"] = $NATION_OTH;

$ELSXBORN =  $_POST["ELSXBORN"];
$_SESSION["ELSXBORN"] = $ELSXBORN;

$ELTGNOW =  $_POST["ELTGNOW"];
$_SESSION["ELTGNOW"] = $ELTGNOW;

$ELAGE =  $_POST["ELAGE"];
$_SESSION["ELAGE"] = $ELAGE;

$ELLOCZIP =  $_POST["ELLOCZIP"];
$_SESSION["ELLOCZIP"] = $ELLOCZIP;

$ELMSMEV =  $_POST["ELMSMEV"];
$_SESSION["ELMSMEV"] = $ELMSMEV;


$ELMSMREC =  $_POST["ELMSMREC"];
$_SESSION["ELMSMREC"] = $ELMSMREC;

$ELDG =  $_POST["ELDG"];
$_SESSION["ELDG"] = $ELDG;

$ELFRREC =  $_POST["ELFRREC"];
$_SESSION["ELFRREC"] = $ELFRREC;

$_SESSION["DGCOUP"]  =  $ELFRREC;


$sub_pro =substr("$ELLOCZIP",0,2);
//echo $sub_pro;
//echo "<br>";

if($sub_pro==10){
 $ELLOCBM = 1;
//}elseif($sub_pro==50){
// $ELLOCBM = 2;
}else{
  $ELLOCBM = 3;
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
											 
                                             $encode_phone = encode($mobilephone,"w-e-b-r-d-s");
											 
					 $sql_findqpi = "SELECT seed_candidate.SC_ID FROM seed_candidate inner join tbseed on seed_candidate.SC_ID = tbseed.SC_ID WHERE REGMOBILE = '" . $encode_phone . "'";
                     $result_qpi = $conn_rds->query($sql_findqpi);
                     $num_rows_qpi = mysqli_num_rows($result_qpi);
                     $row_qpi= $result_qpi->fetch_assoc();
																																																
                     $get_SC_ID =$row_qpi['SC_ID'];
					 
					 
					 $sql_findgeo = "SELECT GEO_ID FROM amphures WHERE AMPHUR_CODE= '$ELLOCZIP'";
                     $result_geo = $conn_rds->query($sql_findgeo);
                     $num_rows_geo = mysqli_num_rows($result_geo);
                     $row_geo = $result_geo->fetch_assoc();
																																																
                      $get_geo =$row_geo['GEO_ID'];
                      
                      if($get_geo == 2 and  $sub_pro == 10){
                         $get_geo = 10;
                        // $max_seed = 5;
                       }elseif($get_geo == 2 and  $sub_pro > 10 ){ 
                          $get_geo = $get_geo;
                        //  $max_seed = 5;
                        }else{
                          $get_geo == $get_geo;
                        //  $max_seed = 5;
                         }
	
	//$requestMethod = $_SERVER["REQUEST_METHOD"];
	//กำหนดค่าต่างๆ

	$max_seed_bkk = 12;   //6+3+3

////////////////////////////////////
	$max_seed_n = 9; //geo_id = 1 /3+3+3
 $max_seed_c = 9; //geo_id = 2 /3+3+3
	$max_seed_ne = 6; //geo_id = 3+3
	$max_seed_w = 9; //geo_id = 4  /3+3+3
	$max_seed_e = 9; //geo_id = 5 /3+3+3
	$max_seed_s = 9; //geo_id = 6 /3+3+3

	
	$max_seed_province = 1;


	$total_seed_required = $max_seed_bkk + $max_seed_n + $max_seed_c + $max_seed_ne + $max_seed_w  + $max_seed_e + $max_seed_s; 

$max_internet_source = $total_seed_required * 2 / 3;
	$max_age_group = $total_seed_required * 2 / 3;
	
	$check1 = "FAIL";
	$check2 = "FAIL";
	$check3 = "FAIL";
	$check4 = "FAIL";
	$check5 = "FAIL";
	$check_seed = "FAIL";


	//Parameters required = QPICYBLO, ELREGION , ELAGE ,ELPROVINCE

	//ตรวจสอบหากใช้ Method GET
//	if($requestMethod == 'GET'){
		//ตรวจสอบการส่งค่า id
		//if(isset($_GET['isource']) && !empty($_GET['isource']) && isset($_GET['age']) && !empty($_GET['age']) && isset($_GET['region']) && !empty($_GET['region']) && isset($_GET['province']) && !empty($_GET['province']) ){
		if(isset($get_SC_ID) && !empty($get_SC_ID) && isset($ELAGE) && !empty($ELAGE) && isset($get_geo) && !empty($get_geo) && isset($sub_pro) && !empty($sub_pro) ){
			
			/*	
			$isource = $_GET['isource'];
			$age = $_GET['age'];
			$region = $_GET['region'];
			$province = $_GET['province'];*/
			
			$isource = $get_SC_ID;
			$age = $ELAGE;
			$region = $get_geo;
			$province = $sub_pro;
			
			$max_in_province = $max_seed_province;
			
			switch ($region) {
				case 1:
					$max_region = $max_seed_n;
					break;
				case 2:
					$max_region = $max_seed_c;
					break;
				case 3:
					$max_region = $max_seed_ne;
					break;
				case 4:
					$max_region = $max_seed_w;
					break;
				case 5:
					$max_region = $max_seed_e;
					break;
				case 6:
					$max_region = $max_seed_s;
					break;
				case 10:
					$max_region = $max_seed_bkk;
					$max_in_province = $max_seed_bkk ;
					break;
				default:
					$max_region = 0;
					$max_in_province = 0;
			}
   
	switch ($province) { //ไม่เพิ่มภาค อีสาน
    case "10"://กทม
					$max_in_province = $max_seed_bkk  ;
					break;
     case "14"://อยุธยา
					$max_in_province = $max_seed_province + 1  ;
					break;
    case "15"://อ่างทอง
					$max_in_province = $max_seed_province + 1  ;
					break;
     case "18"://ชัยนาท
					$max_in_province = $max_seed_province + 1  ;
					break;
    case "20"://ชลบุรี
					$max_in_province = $max_seed_province + 1  ;
					break;
     case "50"://เชียงใหม่
					$max_in_province = $max_seed_province + 1  ;
					break;
     case "56"://พะเยา
					$max_in_province = $max_seed_province + 1  ;
					break;
    case "57": //เชียงราย
					$max_in_province = $max_seed_province + 1  ;
					break;
     case "70": //ราชบุรี   
					$max_in_province = $max_seed_province + 1  ;
					break;
      case "76": //เพชรบุรี   
					$max_in_province = $max_seed_province + 1  ;
					break;
      case "77": //ประจวบคีรีขันธ์   
					$max_in_province = $max_seed_province + 1  ;
					break;
      case "92": //ตรัง 
					$max_in_province = $max_seed_province + 1  ;
					break;
				default:
					$max_in_province = $max_seed_province;
 }
   
   
   

			// Check if all seed reach maximum seed required
			$sql = "select count(RDSCODE) from tbanswer where ISSEED = 'seed' and STATUSCODE in ('QT-PASS','BIO-PASS')";
			$result = mysqli_query($conn_rds, $sql);
			$row = $result->fetch_row();
  			$value = $row[0];
			if ($value >= $total_seed_required){
				$check1 = "FAIL";
			} else {
				$check1 = "PASS";
			}
			// Check if seed from each internet source not exceed 2/3 of total seed required
			$sql = "select QPICYBLO, count(tbanswer.RDSCODE) from tbanswer left join seed_candidate on tbanswer.sc_id = seed_candidate.sc_id where tbanswer.STATUSCODE in ('QT-PASS','BIO-PASS') and ISSEED = 'seed' and QPICYBLO = " . $isource ;
			$result = mysqli_query($conn_rds, $sql);
			$row = $result->fetch_row();
  			$value = $row[1];
			if ($value >= $max_internet_source){
				$check2 = "FAIL";
			} else {
				$check2 = "PASS";
			}	

		
			// Check if seed not more than quota for each Region and BKK
			$sql = "select ELREGION, count(RDSCODE) from tbanswer where ISSEED = 'seed' and STATUSCODE in ('QT-PASS','BIO-PASS') and ISSEED = 'seed' and ELREGION = " . $region ;
			$result = mysqli_query($conn_rds, $sql);
			$row = $result->fetch_row();
  			$value = $row[1];
			if ($value >= $max_region){
				$check3 = "FAIL";
			} else {
				$check3 = "PASS";
			}				
			
			// Check if seed not more than quota for each Region and BKK
			if ($age > 30) {
				$sql = "select count(RDSCODE) from tbanswer where ISSEED = 'seed' and STATUSCODE in ('QT-PASS','BIO-PASS') and ISSEED = 'seed' and ELAGE >= 30" ;				
			} else {
				$sql = "select count(RDSCODE) from tbanswer where ISSEED = 'seed' and STATUSCODE in ('QT-PASS','BIO-PASS') and ISSEED = 'seed' and ELAGE < 30" ;			
			}
			$result = mysqli_query($conn_rds, $sql);
			$row = $result->fetch_row();
  			$value = $row[0];
			if ($value >= $max_age_group){
				$check4 = "FAIL";
			} else {
				$check4 = "PASS";
			}	

			// Check if seed not more than quota for each Province and BKK
			$sql = "select ELPROVINCE, count(RDSCODE) from tbanswer where ISSEED = 'seed' and STATUSCODE in ('QT-PASS','BIO-PASS') and ISSEED = 'seed' and ELPROVINCE = " . $province ;
			$result = mysqli_query($conn_rds, $sql);
			$row = $result->fetch_row();
  			$value = $row[1];
			if ($value >= $max_in_province){
				$check5 = "FAIL";
			} else {
				$check5 = "PASS";
			}
		
			if($check1 == 'PASS' && $check2 == 'PASS' &&  $check3 == 'PASS' &&  $check4 == 'PASS' &&  $check5 == 'PASS'){
				
				$seed_pass = "PASS";
				$_SESSION["seed_pass"] = $seed_pass;
			    echo "<meta http-equiv='refresh' content='0;URL=checkscreen_hs.php'>";
				  
				//echo 'PASS';
			} else {
				//echo 'FAIL with ' . $check1 . "," . $check2 . "," . $check3 . "," . $check4 . "," . $check5 ;
				
				 $seed_pass = "'FAIL with '" . $check1 . "," . $check2 . "," . $check3 . "," . $check4 . "," . $check5 ;
				//$seed_pass = "FAIL with";
				 $_SESSION["seed_pass"] = $seed_pass;
     
      $status2 = "OVER_SEED";
      $ELIGIB = 2;
                  $conpon_use = "UPDATE tbcoupon SET";                                                                                                          
                  $conpon_use.= " DateUsed = NULL,";                                                                                                      
                  $conpon_use.= " IsUsed = NULL";                                                                                                                                                                                                                             
                  $conpon_use.= " WHERE Coupon='" . $rds_code . "'";
                  $conn_rds->query($conpon_use);
                 if ($conn_rds->query($conpon_use) === TRUE)
                      {
                              $seed_update = "UPDATE tbseed SET";                                                                                                          
                              $seed_update.= " STATUSCODE = '$status2',";
                              $seed_update.= " NATION='$NATION',";                                 
                              $seed_update.= " NATION_OTH='$NATION_OTH',";
                              $seed_update.= " ELSXBORN='$ELSXBORN',";                                 
                              $seed_update.= " ELTGNOW='$ELTGNOW',";
                              $seed_update.= " ELAGE='$ELAGE',";                                 
                              $seed_update.= " ELLOCZIP='$ELLOCZIP',";
                              $seed_update.= " ELMSMEV='$ELMSMEV',";                                 
                              $seed_update.= " ELMSMREC='$ELMSMREC',";
                              $seed_update.= " ELDG='$ELDG',";                                 
                              $seed_update.= " ELFRREC='$ELFRREC',";
                              $seed_update.= " ELIGIB='$ELIGIB',";                                 
                              $seed_update.= " ELREGION='$get_geo',";
                              $seed_update.= " ELPROVINCE='$sub_pro',";
                              $seed_update.= " ELDISTRICT='$ELLOCZIP',";
                              $seed_update.= " ELLOCBM='$ELLOCBM',";             
                              $seed_update.= " LASTUPDATE='$datenow'";                    
                              $seed_update.= " WHERE STATUSCODE= 'Wait' and REGMOBILE = '" . $encode_phone . "'";            
                              $resultnotseed = $conn_rds->query($seed_update);
				 echo "<meta http-equiv='refresh' content='0;URL=formmessage014.php'>";
      }
			}
		}else{
			//echo "Parametars are not provided";
			
			  $seed_pass = "Parametars are not provided";
			  $_SESSION["seed_pass"] = $seed_pass;
     
      $status2 = "NOT_PROVIDED";
      $ELIGIB = 2;
                  $conpon_use = "UPDATE tbcoupon SET";                                                                                                          
                  $conpon_use.= " DateUsed = NULL,";                                                                                                      
                  $conpon_use.= " IsUsed = NULL";                                                                                                                                                                                                                             
                  $conpon_use.= " WHERE Coupon='" . $rds_code . "'";
                  $conn_rds->query($conpon_use);
                 if ($conn_rds->query($conpon_use) === TRUE)
                      {
                              $seed_update = "UPDATE tbseed SET";                                                                                                          
                              $seed_update.= " STATUSCODE = '$status2',";
                              $seed_update.= " NATION='$NATION',";                                 
                              $seed_update.= " NATION_OTH='$NATION_OTH',";
                              $seed_update.= " ELSXBORN='$ELSXBORN',";                                 
                              $seed_update.= " ELTGNOW='$ELTGNOW',";
                              $seed_update.= " ELAGE='$ELAGE',";                                 
                              $seed_update.= " ELLOCZIP='$ELLOCZIP',";
                              $seed_update.= " ELMSMEV='$ELMSMEV',";                                 
                              $seed_update.= " ELMSMREC='$ELMSMREC',";
                              $seed_update.= " ELDG='$ELDG',";                                 
                              $seed_update.= " ELFRREC='$ELFRREC',";
                              $seed_update.= " ELIGIB='$ELIGIB',";                                 
                              $seed_update.= " ELREGION='$get_geo',";
                              $seed_update.= " ELPROVINCE='$sub_pro',";
                              $seed_update.= " ELDISTRICT='$ELLOCZIP',";
                              $seed_update.= " ELLOCBM='$ELLOCBM',";             
                              $seed_update.= " LASTUPDATE='$datenow'";                    
                              $seed_update.= " WHERE STATUSCODE= 'Wait' and REGMOBILE = '" . $encode_phone . "'";            
                              $resultnotseed = $conn_rds->query($seed_update);
				 echo "<meta http-equiv='refresh' content='0;URL=formmessage014.php'>";
      }
		}
	/*}*/