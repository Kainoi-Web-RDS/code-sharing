<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php');
require_once('../connections/utf8.php');

  error_reporting( error_reporting() & ~E_NOTICE );
                                  function RunSQL($sqlstring){
                                     
                                        $conn_rds =  mysqli_connect("xxxxxxxxxxxxx","xxxxxxxxxxxx","xxxxxxxxxxx","xxxxxxxxxxxxx");
                                        if ($conn_rds->connect_error) {
                                             return "errorconnect";
                                        } 	
                                        mysqli_set_charset( $conn_rds, 'utf8');
                                        if (mysqli_query($conn_rds, $sqlstring)) {
                                            return "success";
                                        } else {
                                            return "failed" . mysqli_error($conn_rds);
                                        }
                                        mysqli_close($conn_rds);
                                    }
                                  
                                    function isAlreadyAddCoupon($code2check){
                                        
                                        $conn_rds =  mysqli_connect("xxxxxxxxxxxxx","xxxxxxxxxxxx","xxxxxxxxxxx","xxxxxxxxxxxxx");
                                        if ($conn_rds->connect_error) {
                                             return "errorconnect";
                                        } 	
                                        mysqli_set_charset($conn_rds, 'utf8');
                                    
                                        $sql = "select * from tbcoupon where recruiter = '" . $code2check . "'";
                                     
                                        $result = $conn_rds->query($sql);
                                        $num_rows = mysqli_num_rows($result);
                                        $row = $result->fetch_assoc();
                                        if ($result->num_rows > 0) {
                                            $conn_rds->close();	
                                            return "yes";
                                        } else {
                                            $conn_rds->close();	
                                            return "no";
                                        }
                                    }
                                    
                                    //Check is already done a questionnaire 
                                    
                                    
                                    function genrdscode($inum){
                                        $basecode = "abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789";
                                        $rndcode = array() ;
                                        $length = mb_strlen($basecode) - 1;
                                        $allcode = "" ;
                                        $i = 0;
                                        $i = $inum - 1 ;
                                        do {
                                            $allcode = "";
                                            for ($x = 0; $x < $i + 1; $x++) {
                                                $rndcode[$x] = substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1);
                                                if ($x < $i){
                                                    $allcode = $allcode . "'" . $rndcode[$x] . "'," 	;
                                                } else {
                                                    $allcode = $allcode . "'" . $rndcode[$x] . "'"  	;
                                                }
                                    
                                            }
                                            $rdscode = IsDuplicateCode($allcode);
                                        } 
                                        while ( $rdscode== "dup" );
                                        return $rndcode;
                                    }
                                    function IsDuplicateCode($code2check){
                                    
                                      
                                       $conn_rds =  mysqli_connect("xxxxxxxxxxxxx","xxxxxxxxxxxx","xxxxxxxxxxx","xxxxxxxxxxxxx");
                                        // Check connection
                                        if ($conn_rds->connect_error) {
                                             return "errorconnect";
                                        } 	
                                        mysqli_set_charset( $conn_rds, 'utf8');
                                        $sql = "select * from tbcoupon where Coupon in (" . $code2check . ") ";
                                        $result = $conn_rds->query($sql);
                                        //$row = $result->fetch_assoc();	
                                        $num_rows = mysqli_num_rows($result);
                                        if ($num_rows == 0){
                                            $conn_rds->close();
                                            return "nodup";
                                        } else {
                                            $conn_rds->close();
                                            return "dup";
                                        }
                                    }
                                    
                                    if($rdscode <> "readonly" or $rdscode <> "") {
                                            /*if(isOTPMatch($rdscode,$ootp) == "yes"){
                                                echo "OTP Matched<br><br>";*/
                                                if(isAlreadyAddCoupon($rdscode) == "no"){
                                                    /*echo "Self Interviewing<br>";
                                                    echo "Self Interviewing<br>";
                                                    echo "Self Interviewing done<br>";
                                                    echo "Assign code for distribution<br>";*/
                                                     $array = genrdscode(3);
                                                       // RunSQL("Update tbanswer set peercode01 = '" . $array[0] . "',lastupdate = now() where rdscode = '" . $rdscode . "' and peercode01 is null" );
                                                       // RunSQL("Update tbanswer set peercode02 = '" . $array[1] . "',lastupdate = now() where rdscode = '" . $rdscode . "' and peercode02 is null" );
                                                       // RunSQL("Update tbanswer set peercode03 = '" . $array[2] . "',lastupdate = now() where rdscode = '" . $rdscode . "' and peercode03 is null" );
                                                        RunSQL("Insert into tbcoupon (Coupon,isActivated,DateExpire,DateActivated,Recruiter) Values('" . $array[0] . "','y','2022-12-25 00:00:00',NULL,NULL)");
                                                        RunSQL("Insert into tbcoupon (Coupon,isActivated,DateExpire,DateActivated,Recruiter) Values('" . $array[1] . "','y','2022-12-25 00:00:00',NULL,NULL)");
                                                        RunSQL("Insert into tbcoupon (Coupon,isActivated,DateExpire,DateActivated,Recruiter) Values('" . $array[2] . "','y','2022-12-25 00:00:00',NULL,NULL)");
                                                     
                                                    echo "Code 1 = " . $array[0] . "<br>";
                                                    echo "Code 2 = " . $array[1] . "<br>";
                                                    echo "Code 3 = " . $array[2] . "<br>";
                                                    
                           
                                                    
                                                } 
                                            /* }else {
                                                echo "OTP not matched";	
                                            }*/
                                        
                                    } else {
                                            redirect("formmessage80.php",303);
                                    
                                    }                             
?>
