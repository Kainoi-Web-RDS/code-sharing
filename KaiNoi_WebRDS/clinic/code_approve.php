<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
$USERS = $_SESSION['USERS'];
?>
<?php

error_reporting( error_reporting() & ~E_NOTICE );
 $HOS = $_SESSION["HOS"]; 

                                                    if($conn_rds->connect_error)
                                                    {
                                                        die("Connection failed: " . $conn_rds->connect_error);
                                                    }
                          
                                      $query1 = "SELECT * FROM LABUSER WHERE USERS='$USERS'";
                                      $result = $conn_rds->query($query1);
                                      //$user_count1 = mysqli_num_rows($result);
                                      $row = $result->fetch_assoc();
                                      $h_name = $row["name"];
                                      $h_nbank = " ";
                                      $h_lname = $row["lname"];
                                      
$BMMSG1 = "ยินดีต้อนรับเข้าสู่คลินิคผู้ให้คำปรึกษา";
$BMDATE  = date("Y-m-d");     
$BMTIME =  date("H:i:s",strtotime(date('H:i:s').'7 hours'));
$hos_data = $HOS;
                                  if($hos_data==1){
                                       echo $hos_name = 'รพ.กลาง';
                                       $stickerhos = '11537';
                                      }elseif($hos_data==2){
                                        echo $hos_name = 'รพ.เจริญกรุงประชารักษ์';
                                        $stickerhos = '11541';
                                       }elseif($hos_data==3){
                                       echo $hos_name = 'รพ.ตากสิน';
                                          $stickerhos = '11539';
                                      }elseif($hos_data==4){
                                       echo $hos_name = 'รพ.ราชพิพัฒน์';
                                        $stickerhos = '14641';
                                      }elseif($hos_data==5){
                                      echo  $hos_name = 'รพ.ลาดกระบัง กรุงเทพมหานคร';
                                         $stickerhos = '11538';
                                      }elseif($hos_data==6){
                                       echo $hos_name = 'รพ.เวชการุณย์รัศมิ์';
                                        $stickerhos = '11536';
                                      }elseif($hos_data==7){
                                       echo $hos_name = 'รพ.ศูนย์บริการสาธารณสุข 28 กรุงธนบุรี';
                                          $stickerhos = '13673';
                                      }elseif($hos_data==8){
                                      echo  $hos_name = 'รพ.สิรินธร';
                                          $stickerhos = '15049';
                                      }elseif($hos_data==9){
                                      echo  $hos_name = 'รพ.หลวงพ่อทวีศักดิ์ ชุตินฺธโร อุทิศ';
                                          $stickerhos = '11540';
                                      }elseif($hos_data==10){
                                      echo  $hos_name = 'สภากาชาดไทย : คลินิกนิรนาม';
                                          $stickerhos = '23220';// please update
                                      }elseif($hos_data==11){
                                        $hos_name = 'รพ.สารภี (เชียงใหม่)';
                                      }elseif($hos_data==12){
                                        $hos_name = 'มูลนิธิเอ็มพลัส Mplus+(เชียงใหม่)';
                                      }elseif($hos_data==13){
                                        $hos_name = 'ศูนย์สุขภาพ แคร์แมท CAREMAT(เชียงใหม่)';
                                      }elseif($hos_data==0){
                                      echo  $hos_name = 'ส่วนกลาง';
                                        $stickerhos = '00000';
                                      }
$BMCLID = $stickerhos;

$BMSTID = $h_name.$h_nbank.$h_lname;//ชื่อเจ้าหน้าที่คลินิก
$BMRETEL1 = $_POST['BMRETEL1'];
$_SESSION["BMRETEL1"]  = $BMRETEL1;

$BMRECID = $_SESSION["BMRECID"];//RDSCODE
$BMCONS = $_POST['BMCONS'];// ยินดี // ไม่ยินดี
//ไม่ยินดี
$RFBIO = $_POST['RFBIO'];
$RFBIO_OTH= $_POST['RFBIO_OTH'];






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
$encode_phone = encode($BMRETEL1,"w-e-b-r-d-s");

                                            if($conn_rds->connect_error)
                                                    {
                                                        die("Connection failed: " . $conn_rds->connect_error);
                                                    }
                                     $query1 = "SELECT * FROM tbanswer WHERE REGMOBILE='" . $encode_phone . "' and RDSCODE='" . $BMRECID . "'";
                                      $result1 = mysqli_query($conn_rds,$query1);
                                      $user_count1 = mysqli_num_rows($result1);
                                      if($user_count1  == 0) {   
                                              echo "<meta http-equiv='refresh' content='0;URL=formmessage01.php'>";//หมายเลขโทรศัพท์ และ รหัสไม่ตรงกัน
                                      }
                                      else{


$datenow = date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
//$statuslap = "1";
		
		if($conn_rds->connect_error)
		{
			die("Connection failed: " . $conn_rds->connect_error);
		}
                                      $querydu = "SELECT * FROM tblab WHERE BMRETEL1='" . $encode_phone . "' and BMRECID='" . $BMRECID . "'";
                                      $resultdu = mysqli_query($conn_rds,$querydu);
                                      $user_countdu = mysqli_num_rows($resultdu);
                                      if($user_countdu== 0)
                                      {
                                      
                                      
                                            if($BMCONS == '2')  //  ไม่ยินยอม     
                                            {
                                                            $sql = "INSERT INTO tblab (BMMSG1,";                                                                                         // RDS CODE
                                                            $sql.= " BMDATE,";                                                                                                                             // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,QT-PASS,BIO-PASS
                                                            $sql.= " BMTIME, BMCLID,";                                                                                                       // Date regis  and seed
                                                            $sql.= " BMSTID, BMRETEL1, BMRETEL2, BMRECID,";
                                                            $sql.= " BMCONS, RFBIO, RFBIO_OTH,";      //  
                                                            $sql.= " LASTUPDATE) VALUES";                                                                                                              // Date Update
                                                            // ==========================================INSERT VALUES====================================================
                                                            $sql.= "('$BMMSG1',";                                                                                                                                   // RDS CODE
                                                            $sql.= "'$BMDATE',";
                                                            $sql.= "'$BMTIME','$BMCLID',";                                                                                                                             // Date regis  and seed
                                                            $sql.= "'$BMSTID','$encode_phone','$encode_phone','$BMRECID',";
                                                            $sql.= "'$BMCONS','$RFBIO','$RFBIO_OTH',";      // 
                                                            $sql.= "'$datenow')";                                                                                                                                     // Date Update
                                                                        if ($conn_rds->query($sql) === TRUE)
                                                                              {
                                                                               
                                                                                      
                                                                                    echo "<meta http-equiv='refresh' content='0;URL=nextstep.php'>";							//nextstep old	///accept.php									
                                                                           }
                                                                           else
                                                                           {
                                                                              // redirect("formmessage05.php",303);
                                                                           }
                                            }
                                            else  //ยินยอม
                                            {
                                                            $sql = "INSERT INTO tblab (BMMSG1,";                                                                                         // RDS CODE
                                                            $sql.= " BMDATE,";                                                                                                                             // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,QT-PASS,BIO-PASS
                                                            $sql.= " BMTIME, BMCLID,";                                                                                                       // Date regis  and seed
                                                            $sql.= " BMSTID, BMRETEL1, BMRETEL2, BMRECID,";
                                                             $sql.= "BMCONS,";      //  /  
                                                            $sql.= " LASTUPDATE) VALUES";                                                                                                              // Date Update
                                                            // ==========================================INSERT VALUES====================================================
                                                            $sql.= "('$BMMSG1',";                                                                                                                                   // RDS CODE
                                                            $sql.= "'$BMDATE',";
                                                            $sql.= "'$BMTIME','$BMCLID',";                                                                                                                             // Date regis  and seed
                                                            $sql.= "'$BMSTID','$encode_phone','$encode_phone','$BMRECID',";
                                                            $sql.= "'$BMCONS',";      //  // 
                                                            $sql.= "'$datenow')";                                                                                                                                     // Date Update
                                                                        if ($conn_rds->query($sql) === TRUE)
                                                                              {
                                                                        
                                                                                      $status_lab =1;
                                                                                      $sql_up2 = "UPDATE tbanswer SET";                                                                                                          
                                                                                      $sql_up2.= " STATUS_LAB = '$status_lab',";                                                                                                      
                                                                                      $sql_up2.= " LASTUPDATE = '$datenow'";                                                                                                                                                               
                                                                                      $sql_up2.= "WHERE REGMOBILE='" . $encode_phone . "'";
                                                                                      $conn_rds->query($sql_up2);
                                                                                      
                                                                                    echo "<meta http-equiv='refresh' content='0;URL=nextstep.php'>";							//nextstep old	///accept.php									
                                                                           }
                                                                           else
                                                                           {
                                                                              // redirect("formmessage05.php",303);
                                                                           }
                                             
                                            }
			                                                        
                                    }else
                                    {
                                             echo "<meta http-equiv='refresh' content='0;URL=formmessage02.php'>";
                                    }
        }
					   $conn_rds->close();
?>