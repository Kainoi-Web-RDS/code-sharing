﻿<?php
ob_start();
session_start();
require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php'); 
?>

<?php
                                             $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
                                         
                                             $pins =  $_POST["pins"];
                                             
                                             $pins_oth =  $_POST["pins_oth"];
                                    
                                             
                                             
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

                                                           // ========================================== Code ====================================================
                                                            $sql = "INSERT INTO Not_interested (date_interested,ninterest,ninterest_oth,";                                                                                         
                                                            $sql.= " IP) VALUES";                                                                                                              
                                                            // ==========================================INSERT VALUES====================================================
                                                            $sql.= "('$datenow','$pins','$pins_oth',";                                                                                                                               
                                                            $sql.= "'$ip_address')";                                                                                                                                    
                                                        if ($conn_rds->query($sql) === TRUE)
                                                        {
                                                            echo "<script>";
                                                            echo "window.location='index.php'";
                                                            echo "</script>";
                                                         }
                                                 $conn_rds->close();          
?>