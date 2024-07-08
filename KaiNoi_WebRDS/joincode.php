<?php
ob_start();
session_start();
require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php'); 
?>
<?php
$rds_code = $_SESSION["rds_code"];
$status = "Join";  // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,JOIN,QT-PASS,BIO-PASS
$isconsent = 1;
$isJoin = 1;  
//$regphone =  $_POST["regphone"];

 error_reporting( error_reporting() & ~E_NOTICE );
    // date_default_timezone_set("Asia/Bangkok");
                                             $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));


if ($conn_rds->connect_error) {
    die("Connection failed: " . $conn_rds->connect_error);
} 

	         $sql = "UPDATE tbanswer SET";                                                                                                          
                                                            $sql.= " STATUSCODE= '$status',";                                                                                                      
                                                            $sql.= " ISCONSENT ='$isconsent',";                                                                                                
                                                            $sql.= " ISJOIN='$isJoin',";                                                                      
                                                          //  $sql.= " REGMOBILE='$regphone',";                                                        
	                                                          $sql.= " LASTUPDATE='$datenow'";                                                                                                                                                               
                                                            $sql.= "WHERE RDSCODE='$rds_code'";

if ($conn_rds->query($sql) === TRUE) {
	if( $status == "Join")
	{
			                                                    ////////////////////////////////
                                                $sql = "select ISSEED,ELPROVINCE from tbanswer where RDSCODE = '" . $rds_code . "'";
                                                $result = $conn_rds->query($sql);
                                                $num_rows = mysqli_num_rows($result);
                                                $row = $result->fetch_assoc();
                                                 
                                                    $E1 =$row['ELPROVINCE'];
                                                    
                                                    
                                                    $s1 =$row['ISSEED'];
                                                    if($s1 =='seed'){
                                                      $ISSEED = 1;
                                                    }else{
                                                      $ISSEED = 2;
                                                    }
                                                    
                                                    
                                                    $_SESSION["ISSEED"] = $ISSEED;
                                                    //$E1area =  0;
                                                    
                                                 if($E1 == 10){
                                                     $trick = 1;// goto BKK 
                                                  /*}elseif($E1 == 50){
                                                    $trick = 2;*/// goto CM
                                                  }else
                                                     $trick = 0;// Skip question
                                                          
                                                           $_SESSION["trick"] = $trick;
                                                          
                                                       
                                                          
                                                          /////////////////////////////////////////////////////////////////////////////////////////////////
                                                           function RunSQL($sqlstring){
                                        // Create connection
                                        //$conn_rds =  mysqli_connect("localhost","root","","wrds");
                                       $conn_rds =  mysqli_connect("xxxxxxxxxxxxxxxxx","xxxxxxxxxxx","xxxxxxxxxxxx","xxxxxxxxxxx");
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
                                  
                                    function isAlreadyAddCoupon($code2token){
                                        //$conn_rds = mysqli_connect("localhost","root","","wrds");
                                        $conn_rds =  mysqli_connect("xxxxxxxxxxxxxxxxx","xxxxxxxxxxx","xxxxxxxxxxxx","xxxxxxxxxxx");
                                        if ($conn_rds->connect_error) {
                                             return "errorconnect";
                                        } 	
                                        mysqli_set_charset($conn_rds, 'utf8');
                                    
                                        $sql = "select token from lime_tokens_663922 where token = '" . $code2token . "'";
                                      // mysqli_query($conn_rds,$sql) or die(mysql_error());
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
                                        $basecode = "0123456789";
                                        $rndcode = array() ;
                                        $length = mb_strlen($basecode) - 1;
                                        $allcode = "" ;
                                        $i = 0;
                                        $i = $inum - 1 ;
                                        do {
                                            $allcode = "";
                                            for ($x = 0; $x < $i + 1; $x++) {
                                                $rndcode[$x] = substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1) . substr($basecode,rand(0,$length),1);
                                                if ($x < $i){
                                                    $allcode = $allcode . "'" . $rndcode[$x] . "'," 	;
                                                } else {
                                                    $allcode = $allcode . "'" . $rndcode[$x] . "'"  	;
                                                }
                                    
                                            }
                                            $tokencode = IsDuplicateCode($allcode);
                                        } 
                                        while ( $tokencode== "dup" );
                                        return $rndcode;
                                    }
                                    function IsDuplicateCode($code2token){
                                    
                                         $conn_rds =  mysqli_connect("xxxxxxxxxxxxxxxxx","xxxxxxxxxxx","xxxxxxxxxxxx","xxxxxxxxxxx");
                                        // Check connection
                                        if ($conn_rds->connect_error) {
                                             return "errorconnect";
                                        } 	
                                        mysqli_set_charset( $conn_rds, 'utf8');
                                        $sql = "select * from tbcoupon where Coupon in (" . $code2token . ") ";
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
                                    
                                    if($tokencode <> "readonly" or $tokencode <> "") {
                                            /*if(isOTPMatch($rdscode,$ootp) == "yes"){
                                                echo "OTP Matched<br><br>";*/
                                                if(isAlreadyAddCoupon($tokencode) == "no"){
                                                    /*echo "Self Interviewing<br>";
                                                    echo "Self Interviewing<br>";
                                                    echo "Self Interviewing done<br>";
                                                    echo "Assign code for distribution<br>";*/
                                                     $array = genrdscode(1);
                                                       //echo "Token : ";
                                                      
                                                       //echo  $array[0];
                                                        
                                                       $last_tk =  $array[0]; 
                                                       $_SESSION["last_tk"] = $last_tk;
                                                 
                                                    
                                                }
                                                else {
                                               }
                                           
                                       
                                    } else {
                                            redirect("formmessage80.php",303);
                                    
                                    }

                                                          
                                                          
                                                          
                                                          /////////////////////////////////////////////////////////////////////////////////////
                                                        
                                                          $datestart= date("Y-m-d h:i:s");
                                                          $dateEND= date('Y-m-d H:i:s', strtotime('+2 years'));
                                                          $lang = "th";
                                                        
                                                                ///non-duplicate
                                                                 $sq_insert_tk = "INSERT INTO lime_tokens_663922 (participant_id,";                                                                                      // Token ID                                                                                                                        
                                                                 //$sq_insert_tk.= " firstname, lastname,";                                                                                                                 
                                                                 //$sq_insert_tk.= " email, emailstatus,";
                                                                 $sq_insert_tk.= " token, language,";                                                                                              //token
                                                                 //$sq_insert_tk.= " remindersent, remindercount, completed, usesleft,";                                                               
                                                                 $sq_insert_tk.= " validfrom, validuntil) VALUES";                                                                                                                                               
                                                                // ==========================================INSERT VALUES====================================================
                                                                 $sq_insert_tk.= "('$rds_code',";                                                                                                                                 
                                                                 //$sq_insert_tk.= "'rad','rad',";
                                                                 //$sq_insert_tk.= "'rad@mail.com','OK',";                                                                                                                      
                                                                 $sq_insert_tk.= "'$last_tk','$lang',";                                                                                               
                                                                 //$sq_insert_tk.= "'N','N','N','1',";                                                                                                                                                                                                                                                              
                                                                 $sq_insert_tk.= "'$datestart','$dateEND')";
                                                
                                                                if ($conn_rds->query($sq_insert_tk) === TRUE) {

                                                                $use_tk = 'use';
                                                                $sql_uptk = "UPDATE tbtoken SET";                                                                                                          
                                                                $sql_uptk.= " statusToken= '$use_tk'";                                                                                                                                                                                                                                                          
                                                                $sql_uptk.= " WHERE Token='$last_tk'";

                                                            if ($conn_rds->query($sql_uptk) === TRUE) {
                                                                // http://eteam.ou.edu/survey/index.php?lang=en&sid=83689&token=7bgma49ipptxjfw
                                                                //echo "<meta http-equiv='refresh' content='0;URL=../limesurvey/index.php/663922/newtest/Y/?rcode=<?php echo  $rds_code;
                                                                echo "<meta http-equiv='refresh' content='0;URL=../limesurvey/index.php/663922/newtest/Y/?lang=th&rcode=".$_SESSION['rds_code']."&AGE=".$_SESSION['ELAGE']."&trick=".$_SESSION['trick']."&ISSEED=".$_SESSION['ISSEED']."&token=".$_SESSION['last_tk']."'>";
                                                                //echo "<meta http-equiv='refresh' content='0;URL=../limesurvey/index.php?lang=th&sid=663922&token=".$_SESSION['last_tk']."&rcode=".$_SESSION['rds_code']."'>";
	
  }}}
	else
	{
	echo "Error updating record: " . $conn_rds->error;
 // echo "Error updating record: " . $conn_lime->error;
	 }
	}
$conn_rds->close();


?>
