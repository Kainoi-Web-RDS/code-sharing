<?php
ob_start();
session_start();
require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php'); 
?>

<?php
                                            
                                             $QPICYBLO =  $_POST["QPICYBLO"];
                                            /* echo $QPICYBLO;
                                             echo "<br>";*/
                                             $QPICYBLO_OTHER =  $_POST["QPICYBLO_OTHER"];
                                              /* echo $QPICYBLO_OTHER;
                                             echo "<br>";*/
                                             $CANDINT =  $_POST["CANDINT"];
                                             /*echo $CANDINT;
                                             echo "<br>";*/
                                         
                                            
                                            function get_the_device()
                                             {
                                                     $useragent=$_SERVER['HTTP_USER_AGENT'];
                                                    //echo $useragent . "<br>";
                                                    
                                                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
                                                     { 
                                                         return  "1";//Mobile
                                                     }
                                                     else{
                                                         return "2";//Desktop
                                                     }
                                             }
                                             $device = get_the_device();
                                             
                                              error_reporting( error_reporting() & ~E_NOTICE );
                                              // date_default_timezone_set("Asia/Bangkok");
                                             $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
                                             
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
                                              
                                              //$SEEDINTMSG ="ขอบคุณที่เสียสละเวลาครับ ขอบคุณครับ";
                                              
                                             if ($CANDINT == 2)
                                             {
                                              $SEEDINTMSG ="ขอบคุณที่เสียสละเวลาครับ ขอบคุณครับ";                        
                                             }
                                             else{
                                             $SEEDINTMSG = "";                            
                                             }
                                             
                                             /* echo $SEEDINTMSG;
                                             echo "<br>";*/
                                              
                                                mysqli_set_charset($conn_rds, 'utf8');
                                                
                                                if ($conn_rds->connect_error) {
                                                     die("Connection failed: " . $conn_rds->connect_error);
                                                }
                                                

                                                           // ========================================== Code ====================================================
                                                            $sql = "INSERT INTO seed_candidate (QPICYBLO,QPICYBLO_OTHER,CANDINT,CANDDEVICE,CANDDATE,CANDLOC1,";                                                                                         
                                                            $sql.= " SEEDINTMSG) VALUES";                                                                                                              
                                                            // ==========================================INSERT VALUES====================================================
                                                            $sql.= "('$QPICYBLO','$QPICYBLO_OTHER','$CANDINT','$device','$datenow','$ip_address',";                                                                                                                               
                                                            $sql.= "'$SEEDINTMSG')";
                                                            $conn_rds->query($sql);
                                                            
                                                      /*  if ($conn_rds->query($sql) === TRUE)
                                                        {
                                                        
                                                         }
                                                         else
                                                         {
                                                             echo "Error: " . $sql . "<br>" . $conn_rds->error;                             
                                                         }*/
                                                         
                                            // echo  $CANDINT;
                                             //echo exit(0);
                                 if($CANDINT == 2) //ไม่สนใจ
                                             {
                                                            
                                                            echo "<script>";
                                                            echo "window.location='formmessage010.php'";
                                                            echo "</script>";                
                                                                                          
                                             }
                                             else // สนไจ
                                             
                                                            $findsc_id =  "SELECT MAX(SC_ID) from seed_candidate";
                                                            $result_findsc_id = mysqli_query($conn_rds,$findsc_id);
                                                            $row_sc = $result_findsc_id->fetch_assoc();
                                                            $SC_ID_db = $row_sc['MAX(SC_ID)'];
                                                            
                                                            $_SESSION["SC_ID_db"]  =  $SC_ID_db;
                                              
                    {
                                                            echo "<script>";
                                                            echo "window.location='getcode_hs.php'";
                                                            echo "</script>";         
                     }
                                        
                    
                    $conn_rds->close();          
                                            
                                            
                                   
                                             
?>

<?php
//------------------------------------------------------------------------------seed
/*
$sql = "INSERT INTO tbanswer (STATUSCODE,";   // Status : WAIT,JOIN,SC-NOPASS,SC-PASS,QT-PASS,BIO-PASS     
$sql = "ISSEED,";       //  seed                                                                                               
$sql = "SC_ID,";       // seed_candidate id
$sql = "ELCIDN,";   // RDSCODE  ผ่านค่อยแจก
$sql.= "QPTTL,QPVER,QPDE,";
$sql.= "QPIDATE,QPITIME,QPPID,";          
$sql.= "ELLOC1,ELLOC2,";  
$sql.= "ELLOC3,ELLOC4,ELLOC5,";  
$sql.= "ELNOMSG1,ELMSG1,";                               
$sql.= "TEL_ID,";  // mobile
$sql.= "ELSNAT,ELSNAT_OTHER,ELSXBORN,";                                                                      // 
$sql.= "ELTGNOW,ELAGE,";
$sql.= "ELSREGION,ELPROVINCE,ELDISTRICT,";                                                                      // 
$sql.= "ELLOCBM,"; // ไปตรวจ
$sql.= "ELMSMEV,ELMSMREC,";
$sql.= "ELDG,ELFRREC,";
$sql.= "ELIGIB,";  //eligible
$sql.= "ELNOMSG2,ELEND,";
$sql.= "ISCONSENT,ISJOIN,";
$sql.= "ISQUES,";
$sql.= "PEERCODE01,PEERCODE02,PEERCODE03,";                                                                      // Friend 3 
$sql.= "PEERCODE04,PEERCODE05,PEERCODE06,";                                                                      // Friend 6    ## add more ##
$sql.= "OTP_ACT_QUES,";                                                                                                                         //  OTP for Question 
$sql.= "OTP_ACT_TEST,";                                                                                                                          //  OTP for Lab  check
$sql.= "BMDEC,BMCLINICNAME,";                                                  
$sql.= "RFBIO,RFBIO_OTH,";                                                                                   
$sql.= "STATUS_LAB,";
$sql.= "LASTUPDATE,";  
$sql.= "REMARK) VALUES";                                                                                                            
// ==========================================INSERT VALUES====================================================

$sql.= "('$status',";                                                                                                                              
$sql.= "'seed',";
$sql.= "'NULL',";
$sql.= "'NULL',";     // RDS CODE
$sql.= "'NULL','NULL','NULL',";
$sql.= "'NULL','NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL',";   // mobile
$sql.= "'NULL','NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL','NULL',";
$sql.= "'NULL',";// ไปตรวจ
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL',";   //check (pass  x no pass) Eligible
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL',"; // token lime survey
$sql.= "'NULL','NULL','NULL',"; // Friend 3 
$sql.= "'NULL','NULL','NULL',";        // Friend 6    ## add more ##
$sql.= "'NULL',";  //  OTP for Question 
$sql.= "'NULL',";  //  OTP for Lab  check
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL',";    //  Status LAB TEST       
$sql.= "'$datenow',";  // Date Update
$sql.= "'NULL')";                                                                                                                                      
                                             
                                             
?>
*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//  ------------------------------------------------------------------------------peer
/*
$sql = "INSERT INTO tbanswer (STATUSCODE,";   // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,QT-PASS,BIO-PASS
$sql = "ISSEED,";       //  ,   peer                                                                                                 
$sql = "ELCIDN,";   // RDSCODE  ผ่านค่อยแจก
$sql.= "ELCIDN2,ELCIDN3,";  
$sql.= "QPTIL,QPVER,QPDE,";
$sql.= "QPIDATE,QPITIME,";
$sql.= "QP6M,QP12M,";
$sql = "QPPID,"; // head
$sql.= "ELLOC1,ELLOC2,";  
$sql.= "ELLOC3,ELLOC4,ELLOC5,";  
$sql.= "ELNOMSG1,ELMSG1,";                               
$sql.= "TEL_ID,";  // mobile
$sql.= "ELSNAT,ELSNAT_OTHER,ELKNOW,";                                         
$sql.= "ELRECPART,ELRECMSM,";
$sql.= "ELDUP,ELCOUP,";
$sql.= "ELSXBORN,ELTGNOW,ELAGE,";
$sql.= "ELSREGION,ELPROVINCE,ELDISTRICT,";
$sql.= "ELLOCBM,"; // ไปตรวจ
$sql.= "ELMSMEV,ELMSMREC,";
$sql.= "ELDG,ELFRREC,";
$sql.= "ELIGIB,";  //eligible
$sql.= "ELNOMSG2,ELEND,";
$sql.= "ISCONSENT,ISJOIN,";
$sql.= "ISQUES,";
$sql.= "PEERCODE01,PEERCODE02,PEERCODE03,";                                                                      // Friend 3 
$sql.= "PEERCODE04,PEERCODE05,PEERCODE06,";                                                                      // Friend 6    ## add more ##
$sql.= "OTP_ACT_QUES,";                                                                                                                         //  OTP for Question 
$sql.= "OTP_ACT_TEST,";                                                                                                                          //  OTP for Lab  check
$sql.= "BMDEC,BMCLINICNAME,";                                                  
$sql.= "RFBIO,RFBIO_OTH,";                                                                                   
$sql.= "STATUS_LAB,";
$sql.= "LASTUPDATE,";  
$sql.= "REMARK) VALUES";                                                                                                            
// ==========================================INSERT VALUES====================================================

$sql.= "('$status',";                                                                                                                              
$sql.= "'peer',";
$sql.= "'NULL',";     // RDS CODE
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL',";   // head
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL',";   // mobile
$sql.= "'NULL','NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL','NULL',"; 
$sql.= "'NULL','NULL','NULL',";      
$sql.= "'NULL',";// ไปตรวจ
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL',";   //check (pass  x no pass) Eligible
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL',"; // token lime survey
$sql.= "'NULL','NULL','NULL',"; // Friend 3 
$sql.= "'NULL','NULL','NULL',";        // Friend 6    ## add more ##
$sql.= "'NULL',";  //  OTP for Question 
$sql.= "'NULL',";  //  OTP for Lab  check
$sql.= "'NULL','NULL',";
$sql.= "'NULL','NULL',";
$sql.= "'NULL',";    //  Status LAB TEST       
$sql.= "'$datenow',";  // Date Update
$sql.= "'NULL')";                                                                                                                                      
                                             
                   */                          
?>