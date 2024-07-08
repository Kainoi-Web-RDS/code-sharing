<?php
ob_start();
session_start();
require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php'); 
?>

<?php
                                             
                                             $rds_code = $_SESSION["rds_code"];
                                             $mobilephone = $_SESSION["mobilephone"];
                                             $encode_phone = $_SESSION["encode_phone"];
                                            
                                             //$rds_code = "xxXxx";
                                             //$mobilephone = "";
                                             
                                             error_reporting( error_reporting() & ~E_NOTICE );
                                         

                                              
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
                                               
                
                                                mysqli_set_charset($conn_rds, 'utf8');
                                                
                                                if ($conn_rds->connect_error) {
                                                     die("Connection failed: " . $conn_rds->connect_error);
                                                } 

                                                          echo "<script>";
                                                            // redirect("formmessage02.php", 303);
                                                           echo "window.location='formmessage015.php'";
                                                          
                                                           echo "</script>";
                                                         //}
                                                 $conn_rds->close();          
?>