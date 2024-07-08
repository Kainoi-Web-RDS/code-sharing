<?php
ob_start();

require_once('connections/conn_rds.php');
require_once('connections/utf8.php');




		if($conn_rds->connect_error)
		{
			die("Connection failed: " . $conn_rds->connect_error);
		}
                         

			 //STATUS == 1 ผู้ให้คำปรึกษา
			  //STATUS == 2 เจ้าหน้าที่  lab
                                                            $sql = "INSERT INTO LABUSER (name,";                                                                                         // RDS CODE
                                                            $sql.= " lname,";                                                                                                                             // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,QT-PASS,BIO-PASS
                                                            $sql.= " USERS, PASS,";                                                                                                       // Date regis  and seed
                                                            $sql.= " TEL, EMAIL, HOS,";
                                                            $sql.= " STATUS) VALUES";                                                                                                              // Date Update
                                                            // ==========================================INSERT VALUES====================================================
                                                            $sql.= "('',";                                                                                                                                   // RDS CODE
                                                            $sql.= "'',";
                                                            $sql.= "'','',";                                                                                                                             // Date regis  and seed
                                                            $sql.= "'','','10',";
                                                            $sql.= "'1')";                                                                                                                                     // Date Update
                                                                        if ($conn_rds->query($sql) === TRUE)
                                                                          {
                                                                               echo "New record created successfully";
                                                                                      
                                                                                
                                                                           }
                                                                           else
                                                                           {
                                                                               	echo "Error: " . $sql . "<br>" . $conn_rds->error;
                                                                           }
                                         
        
					   $conn_rds->close();
?>