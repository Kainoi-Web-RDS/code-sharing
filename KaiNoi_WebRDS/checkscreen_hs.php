<?php
ob_start();
session_start();

require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php');

//require_once('check_seed.php');

if (isset($_SESSION['mobilephone']) == "") {
    header("location: index_hs.php");
    exit();
}
?>
<?php
    //whether ip is from share internet

                                        
$mobilephone = $_SESSION["mobilephone"];

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

// error_reporting( error_reporting() & ~E_NOTICE );

                                             $datereg=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
                                             $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));

//-----------------------------------------------Question Screen-----------------------------------------------

$NATION = $_SESSION["NATION"];
$NATION_OTH = $_SESSION["NATION_OTH"];
$ELSXBORN = $_SESSION["ELSXBORN"];
$ELTGNOW = $_SESSION["ELTGNOW"];
$ELAGE = $_SESSION["ELAGE"];
$ELLOCZIP = $_SESSION["ELLOCZIP"];
$ELMSMEV = $_SESSION["ELMSMEV"];
$ELMSMREC = $_SESSION["ELMSMREC"];
$ELDG = $_SESSION["ELDG"];
$ELFRREC = $_SESSION["ELFRREC"];
$DGCOUP = $_SESSION["DGCOUP"];



$seed_pass = $_SESSION["seed_pass"];

if($seed_pass = "PASS" ){
     $seed_pass_sc = 0;
}else{
    $seed_pass_sc = 1;
  
}

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



                        if ($conn_rds->connect_error) {
                            die("Connection failed: " . $conn_rds->connect_error);
                        }

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
                     
 if($ELSXBORN == 2)
	{	
	       $sc1 = 1;
	}
	else
	{
	       $sc1 = 0;
	}
  if($ELTGNOW == 2 or $ELTGNOW  == 3)
	{	
	       $sc2 = 1;
	}
	else
	{
	       $sc2 = 0;
	}

 if($ELAGE < 15)
	{	
	       $sc3 = 1;
	}
	else
	{
	       $sc3= 0;
	}
	
 if($ELMSMEV == 2  or $ELMSMEV  == 3  or $ELMSMEV  == 97 or $ELMSMEV  == 98)
	{	
	       $sc4 = 1;
	}
	else
	{
	       $sc4 = 0;
	}
	
 if($ELMSMREC == 2  or $ELMSMREC  == 97  or $ELMSMREC  == 98)
	{	
	       $sc5 = 1;
	}
	else
	{
	       $sc5= 0;
	}
	
if($ELDG == 1)
	{	
	       $sc6 = 1;
	}
	else
	{
	       $sc6= 0;
	}
	
if($ELFRREC == 1 )
	{	
	       $sc7 = 1;
	}
	else
	{
	       $sc7= 0;
	}
 
 

 
$scfinal = $sc1 + $sc2 + $sc3 + $sc4 + $sc5 + $sc6 + $sc7 + $seed_pass_sc; 
//$scfinal = 0;//dry runopen

//whether ip is from share internet
                                            if (!empty($_SERVER['HTTP_CLIENT_IP']))   
                                               {
                                                 $ip_address = $_SERVER['HTTP_CLIENT_IP'];
                                               }
                                             //whether ip is from proxy
                                             elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
                                               {
                                                 $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                               }
                                             //whether ip is from remote address
                                             else
                                               {
                                                 $ip_address = $_SERVER['REMOTE_ADDR'];
                                               }
                                              $ip_address;

if ($conn_rds->connect_error) {
    die("Connection failed: " . $conn_rds->connect_error);
}

               
          //------------------------------------------------END area BKK----------------------------------------------------------
                   if($scfinal   == 0 )
                   {	
                         $ELIGIB = 1;
                         $status = "SC-PASS";    // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,JOIN,QT-PASS,BIO-PASS

                            $sqlcode = "select * from tbcoupon where DateActivated is null and IsUsed is null order by coupon asc";
                                                                     $result = $conn_rds->query($sqlcode);
                                                                     $num_rows = mysqli_num_rows($result);
                                                                     $row = $result->fetch_assoc();
                                                                     $rds_code = $row['Coupon'];
                                                                  
                                                                     $_SESSION["rds_code"] = $rds_code;
                 
                     $sql_push = "select * from tbseed where ISSEED = 'seed' and REGMOBILE = '" . $encode_phone . "'";
                     $result = $conn_rds->query($sql_push);
                     $num_rows = mysqli_num_rows($result);
                     $row = $result->fetch_assoc();
																																																
                      $s1 =$row['STATUSCODE'];
                      $s2 =$row['DATE_REGISTER'];
                      $s3 =$row['ISSEED'];
                      $s4 =$row['ELCIDN'];
                      $s5 =$row['ELLOC1'];
                      $s6 =$row['ELLOC2'];
                      $s7 =$row['ELCIDN2'];
                      $s8 =$row['ELCIDN3'];
                      $s9 =$row['REGMOBILE'];
                      $s10 =$row['OTP_ACT_QUES'];
                      $s11 =$row['OTP_ACT_TEST'];
                      $s12 =$row['DEVICE_TYPE'];
                      $s13 =$row['BROWSER_TYPE'];
                      $s14 =$row['LASTUPDATE'];
                      
                      $s15 =$row['SC_ID'];
                      $s16 =$row['T100'];
                      
                  

                                                                                 $sql = "INSERT INTO tbanswer (RDSCODE,";                                                                                         // RDS CODE
                                                                                 $sql.= " STATUSCODE,";                                                                                                                             // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,QT-PASS,BIO-PASS
                                                                                 $sql.= " DATE_REGISTER, ISSEED,";                                                                                                       // Date regis  and seed
                                                                                 $sql.= " ELCIDN, ELLOC1, ELLOC2, ELCIDN2, ELCIDN3,";
                                                                                 $sql.= " NATION, NATION_OTH,";                                                                                                       // Date regis  and seed//  IP ADDRESS
                                                                                 $sql.= " ELSXBORN, ELTGNOW, ELAGE, ELLOCZIP, ELMSMEV, ELMSMREC,";
                                                                                 $sql.= " ELDG, ELFRREC,";                                                                                                                       //screening SEED
                                                                                 $sql.= " ELIGIB,";                                                                                                    //check (pass  x no pass) Eligible
                                                                                 $sql.= " REGMOBILE,";                                                                                                                               // mobile               
                                                                                 $sql.= " OTP_ACT_QUES, OTP_ACT_TEST,";                                                                                        //  OTP for Question 
                                                                                 $sql.= " DEVICE_TYPE, BROWSER_TYPE,";                                                                                           // Detect  device
                                                                                 $sql.= " SC_ID,";                                                                                                                               // SC_ID               
                                                                                 $sql.= " ELREGION, ELPROVINCE,";                                                                                           // Detect map1
                                                                                 $sql.= " ELDISTRICT, ELLOCBM,";                                                                                           // Detect map2
                                                                                 $sql.= " T100,";                 
                                                                                 $sql.= " LASTUPDATE) VALUES";                                                                                                              // Date Update
                                                                                 // ==========================================INSERT VALUES====================================================
                                                                                 
                                                                                 $sql.= "('$rds_code',";                                                                                                                                   // RDS CODE
                                                                                 $sql.= "'$status',";
                                                                                 $sql.= "'$s2','seed',";                                                                                                                             // Date regis  and seed
                                                                                 $sql.= "'$rds_code','$s5','$s6','1','1',";
                                                                                 $sql.= "'$NATION','$NATION_OTH',";   //  IP ADDRESS
                                                                                 $sql.= "'$ELSXBORN','$ELTGNOW','$ELAGE','$ELLOCZIP','$ELMSMEV','$ELMSMREC',";                                                                                 //screening2
                                                                                 $sql.= "'$ELDG','$ELFRREC',";
                                                                                 $sql.= "'$ELIGIB',";                                                                                                                                           // eligilble   
                                                                                 $sql.= "'$s9',";                                                                                                                                           // mobile      
                                                                                 $sql.= "'$s10','$s11',";                                                                                                                                  //  OTP for Question 
                                                                                 $sql.= "'$s12','$s13',";                                                                                                                                // Detect Device
                                                                                 $sql.= "'$s15',";                                                                                                                           // SC_ID               
                                                                                 $sql.= "'$get_geo','$sub_pro',";                                                                                           // Detect map1
                                                                                 $sql.= "'$ELLOCZIP','$ELLOCBM',";                                                                                      // Detect map2
                                                                                  $sql.= "'$s16',";          
                                                                                 $sql.= "'$datenow')";                                                                                                                                     // Date Update
                                                                             if ($conn_rds->query($sql) === TRUE) {
                                                                              
                                                                                         $conpon_use = "UPDATE tbcoupon SET";                                                                                                          
                                                                                         $conpon_use.= " DateUsed= '$datenow',";                                                                                                      
                                                                                         $conpon_use.= " IsUsed ='y'";                                                                                                                                                                                                                             
                                                                                         $conpon_use.= "WHERE Coupon='" . $rds_code . "'";
                                                                                if ($conn_rds->query($conpon_use) === TRUE)
                                                                                               {
                                                                                                      echo "<meta http-equiv='refresh' content='0;URL=screenpass.php'>";
                                                                                                  
                                                                                                }
                                                                                                else
                                                                                               {
                                                                                                     echo "Error: " . $sql . "<br>" . $conn_rds->error;
                                                                                               }
                                                                            }
                                                                             else
                                                                                               {
                                                                                                     echo "Error: " . $sql . "<br>" . $conn_rds->error;
                                                                                               }
                   }
                    else
                   {  
                                  // $ELIGIB= 2;
                                  $status2 = "SC-NOPASS";
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
                                                                                                           
                                                                                                            echo "<meta http-equiv='refresh' content='0;URL=formmessage04.php'>";
                                                                                                            
                                                                                                                                                       
                                                                                               }
                    }
                   
                   
                  
   
$conn_rds->close();

?>


