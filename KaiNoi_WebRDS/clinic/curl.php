<?php
ob_start();
session_start();
require_once('../connections/conn_rds.php'); 
require_once('../connections/utf8.php');

 $sql_t500 = "select BMRECID,BMRETEL1,T500 from tblab where BMRETEL1 = 'w2f4a4d41314v2v2y2t2'";
                                                  $result_t500 = $conn_rds->query($sql_t500);
                                                  $num_rows = mysqli_num_rows($result_t500);
                                                  $row_t = $result_t500->fetch_assoc();
                                                  $ck_t500 =$row_t['T500'];
                                                  $ck_tel =$row_t['BMRETEL1'];
                                                  $rds_code =$row_t['BMRECID'];
                                                   


                                        $url = "https://www.kainoi.net/incentive.php";
                                   
                                        $encode_phone =  $ck_tel;
                                        $fields = [
                                            'rds_code' => $rds_code,
                                            'm_phone' => $encode_phone,
                                            'pay_type' => 'L',  
                                            'pay_value' => '500'
                                        ];
                                        
                                        $fields_string = http_build_query($fields);
                                        
                                        
                                         echo $url;
                                         echo "<BR>";
                                        echo $rds_code;
                                         echo "<BR>";
                                        echo $encode_phone;
                                        echo "<BR>";
                                       
                                         echo "<BR>";
                                        echo $fields_string;
                                        echo "<BR>";

                                        //open connection
                                      
                                        
                                        //So that curl_exec returns the contents of the cURL; rather than echoing it
                                     
                                        //echo $result;
                                      
                                
                                        
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                                        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                                        
                                        $httpCode = curl_getinfo($ch , CURLINFO_HTTP_CODE); // this results 0 every time
                                        $response = curl_exec($ch);
                                        
                                        if ($response === false) 
                                            $response = curl_error($ch);
                                        
                                        echo stripslashes($response);
                                        
                                        curl_close($ch);
                                        
                                        /*
                                         $ch = curl_init();
                                        curl_setopt( $ch, CURLOPT_URL, $url );
                                        curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields_string );
                                        curl_setopt( $ch, CURLOPT_POST, true );
                                        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
                                        $content = curl_exec( $ch );
                                       
                                        curl_close($ch);

//////////////////////////////////////////////////////////
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "https://kainoi.net/incentive.php");
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);*/

/*
  $ch = curl_init();
  $url = "https://www.kainoi.net/incentive.php";
  //$url = "https://scanurl.net/";

  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST, 0);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
  $response = curl_exec($ch);
  print "curl response is:" . $response;
  curl_close ($ch);

?>