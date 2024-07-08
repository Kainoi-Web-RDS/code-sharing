<?php
ob_start();
session_start();
require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php'); 



                                         $_SESSION["mobilephone"]  =  $_POST["mobilephone"];
                                              
                                        $mobilephone = $_SESSION["mobilephone"];
                                             
                                          $datenow= date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));    
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
                                             
                                             
                                             
                                         
                                            $SC_ID_db = $_SESSION["SC_ID_db"];
                                            
                                           
                                          
                                             function getVisIpAddr() { 
      
                                                 if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
                                                     return $_SERVER['HTTP_CLIENT_IP']; 
                                                 } 
                                                 else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
                                                     return $_SERVER['HTTP_X_FORWARDED_FOR']; 
                                                 } 
                                                 else { 
                                                     return $_SERVER['REMOTE_ADDR']; 
                                                 } 
                                             } 
                                              
                                            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $vis_ip));  ;
                                            $c_detect_geo =  $ipdat->geoplugin_countryName;
                                           //$c_detect_geo = "lao";
                                   
                                            $c = 0;
                                            if($c_detect_geo == "Thailand"){
                                             $c = 1;
                                            }
                                            else{
                                             $c = 2;
                                            }
                                          $ELLOC2 = $c;
                                          //   $ELLOC2 = 2;
                                             
                                             
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
                                             
                                      if(!empty($_POST["mobilephone"])) {
				  $query_ntele = "SELECT * FROM Not_telephone_duplicate WHERE telephone='" . $encode_phone . "'";
                                      $result_ntele = mysqli_query($conn_rds,$query_ntele);
                                      $user_ntele_count  = mysqli_num_rows($result_ntele);
                                      if($user_ntele_count  > 1) {  //  insert เข้ามาแล้ว +1   
                                           $sed_ntele = 1;
                                       
                                      }
                                      else{
                                            $sed_ntele = 0;
                                      }
                                      $query_olduser = "SELECT * FROM Not_swarm_oldusers WHERE telephone='" . $encode_phone . "'";
                                      $result_olduser = mysqli_query($conn_rds,$query_olduser);
                                      $user_olduser_count  = mysqli_num_rows($result_olduser);
                                      if($user_olduser_count  > 1) {  //  insert เข้ามาแล้ว +1 
                                       $sed_olduser = 1;
                                       
                                      }
                                      else{
                                       $sed_olduser = 0;
                                      }
                                      
				
                                      $query1 = "SELECT * FROM tbanswer WHERE REGMOBILE='" . $encode_phone . "'";
                                      $result1 = mysqli_query($conn_rds,$query1);
                                      $user_count1 = mysqli_num_rows($result1);
                                      if($user_count1  > 0) {
                                       $sed1 = 1;
                                      }
                                      else{
                                       $sed1 = 0;
                                      }
                                      
                                       $query2 = "SELECT * FROM tbseed WHERE REGMOBILE='" . $encode_phone . "'";
                                      $result2 = mysqli_query($conn_rds,$query2);
                                      $user_count2 = mysqli_num_rows($result2);
                                      if($user_count2  > 0) {
                                       $sed2 = 1;
                                      }
                                      else{
                                        $sed2 = 0;
                                      }
                                       $sed_ck =  $sed1 +  $sed2 + $sed_olduser + $sed_ntele;
                                       
                                       if($sed_ck > 0)
                                       {

                                             //whether ip is from share internet
                                                mysqli_set_charset($conn_rds, 'utf8');
                                                
                                                if ($conn_rds->connect_error) {
                                                     die("Connection failed: " . $conn_rds->connect_error);
                                                } 

                                                           // ========================================== Code ====================================================
                                                            $sql = "INSERT INTO Not_telephone_duplicate (rdscode, date_dup, telephone,";                                                                  
                                                            $sql.= " IP) VALUES";                                                                                                              
                                                            // ==========================================INSERT VALUES====================================================
                                                            $sql.= "('Seed','$datenow','$encode_phone',";                                                                                                                               
                                                            $sql.= "'$ip_address')";                                                                                                                            
                                                            $dubresult = $conn_rds->query($sql);
                                                            
		  echo "<meta http-equiv='refresh' content='0;URL=formmessage011.php'>";
                                                }
                                                        else	
                                                {
                                        
                                       
                                             
                                   $status = "Wait";   // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,JOIN,QT-PASS,BIO-PASS
			    //$datenow = date('Y-m-d h:i:s',strtotime(date('h:i:s').'7 hours'));
			    $datereg = date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
                                  
                                   // ================ Code ====================         
                                   function generatePIN1($digits = 4){
                                      $i = 0; //counter
                                      $pin = ""; //our default pin is blank.
                                      while($i < $digits){
                                          //generate a random number between 0 and 9.
                                          $pin .= mt_rand(0, 9);
                                          $i++;
                                      }
                                      return $pin;
                                  }
                                  //================ Code ====================
                                  //If I want a 4-digit PIN code.
                                  $pin = generatePIN1();

                               function generatePIN2($digits2 = 4){
                                   $v = 0; //counter
                                   $pin2 = ""; //our default pin is blank.
                                   while($v < $digits2){
                                       //generate a random number between 0 and 9.
                                       $pin2 .= mt_rand(0, 9);
                                       $v++;
                                   }
                                   return $pin2;
                               }
                               
                               //If I want a 4-digit PIN code.
                               $pin2 = generatePIN2();
                      
                                             //////////////////--------------------you Browser-------------------------------------------------------
                                             function get_the_browser()
                                              {
                                              if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
                                                 return 'Internet explorer';
                                               elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false)
                                                  return 'Internet explorer';
                                               elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false)
                                                 return 'Mozilla Firefox';
                                               elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false)
                                                 return 'Google Chrome';
                                               elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false)
                                                 return "Opera Mini";
                                               elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== false)
                                                 return "Opera";
                                               elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false)
                                                 return "Safari";
                                               else
                                                 return 'Other';
                                              }
                                             $browser = get_the_browser();
                                             // echo get_the_browser();
                                            //////////////////--------------------------you Device------------------------------------------
                                              function get_the_device()
                                              {
                                                      $useragent=$_SERVER['HTTP_USER_AGENT'];
                                                     //echo $useragent . "<br>";
                                                     
                                                     if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
                                                      { 
                                                          return  "Mobile";
                                                      }
                                                      else{
                                                          return "Desktop";
                                                      }
                                              }
                                              $device = get_the_device();
                                              //echo get_the_device();
                                              //////////////////----------------Reserve Code RDS-----------------------------------------------------------
                                                mysqli_set_charset($conn_rds, 'utf8');
                                                
                                                if ($conn_rds->connect_error) {
                                                     die("Connection failed: " . $conn_rds->connect_error);
                                                } 
                                                //$sql = "select Coupon,ifnull(IsActivated,""),ifnull(DateActivated,""),ifnull(IsUsed,""),ifnull(DateUsed,""),ifnull(IsCancel,""),ifnull(DateCancel,""),ifnull(IsFail2Regist,""),ifnull(Recruiter,"") from tbcoupon where Coupon = '" . $rds_code . "'";
                                           

                                                           // ========================================== Code PASS====================================================
                                                            $sql = "INSERT INTO tbseed (RDSCODE,";                                                                                         // RDS CODE
                                                            $sql.= " STATUSCODE,";                                                                                                                             // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,QT-PASS,BIO-PASS
                                                            $sql.= " DATE_REGISTER, ISSEED,";                                                                                                       // Date regis  and seed
                                                            $sql.= " ELCIDN, ELLOC1, ELLOC2, ELCIDN2, ELCIDN3,";                                                                      //  IP ADDRESS
                                                            $sql.= " REGMOBILE,";
                                                            $sql.= " OTP_ACT_QUES, OTP_ACT_TEST,";    
                                                            $sql.= " DEVICE_TYPE, BROWSER_TYPE,";                                                                                       // Detect Device
                                                            $sql.= " SC_ID,";   
                                                            $sql.= " LASTUPDATE) VALUES";                                                                                                              // Date Update
                                                            // ==========================================INSERT VALUES====================================================
                                                            $sql.= "('Wait',";                                                                                                                                   // RDS CODE
                                                            $sql.= "'$status',";
                                                            $sql.= "'$datereg','seed',";                                                                                                                             // Date regis  and seed
                                                            $sql.= "'Wait','$ip_address','$ELLOC2','1','1',";                                                                                               //  IP ADDRESS
                                                            $sql.= "'$encode_phone',";
                                                            $sql.= "'$pin','$pin2',"; 
                                                            $sql.= "'$device','$browser',";        // Detect Device
                                                            $sql.= "'$SC_ID_db',";   
                                                            $sql.= "'$datenow')"; // Date Update
                                                            if ($conn_rds->query($sql) === TRUE)
                                                                                                    {
                                                                                                    
                                                                                                     }
                                                                                                     else
                                                                                                     {
                                                                                                         echo "Error: " . $sql . "<br>" . $conn_rds->error;
                                                                                                         exit(0);
                                                                                                     }
                                                                                            
                                                          if($ELLOC2 == "2"){ //นอกประเทศ
                                                                     if ($conn_rds->connect_error) {
                                                                           die("Connection failed: " . $conn_rds->connect_error);
                                                                      } 
                                                       
                                                             $status_c =  "NOT-COUNTRY";
                                                             
                                                              $cno_sql = "UPDATE tbseed SET";
                                                              $cno_sql.= " STATUSCODE= '$status_c',"; 
                                                              $cno_sql.= " LASTUPDATE='$datenow'";                                                                                               
                                                              $cno_sql.= "WHERE SC_ID = '" . $SC_ID_db . "'";
                                                              //$cno_result  = $conn_rds->query($cno_sql);
                                                            if ($conn_rds->query($cno_sql) === TRUE)
                                                                                                    {
                                                                                                       echo "<script>";
                                                                                                         echo "window.location='formmessage011.php'";
                                                                                                       echo "</script>";           
                                                                                                     }
                                                              else
                                                                                                     {
                                                                                                         echo "Error: " . $cno_sql . "<br>" . $conn_rds->error;
                                                                                             
                                                                                                     }

                                                                                 
                                             }else{     // ประเทศ
                                               
                                                                                                     echo "<script>";
                                                                                                     echo "window.location='selfcheck_hs.php'";
                                                                                                     echo "</script>";
                                                                                              
                                              }
                                                     
                                                                        
                                       }

                                    }
                                                
                                          
                   $conn_rds->close();
?>  