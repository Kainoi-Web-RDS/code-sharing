<?php
ob_start();
session_start();
require_once('connections/conn_rds.php'); 
require_once('connections/utf8.php');
if (isset($_SESSION['rds_code']) == "") {
    header("location: index.php");
    exit();
}
?>
<?php
$rds_code = $_SESSION["rds_code"];
$status = "Wait";  // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,JOIN,QT-PASS,BIO-PASS

 error_reporting( error_reporting() & ~E_NOTICE );

      $datenow=date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));
//-----------------------------------------------Question Screen-----------------------------------------------
$mobilephone = $_SESSION["mobilephone"];
$ELKNOW =  $_POST["ELKNOW"];
$ELRECPART=  $_POST["ELRECPART"];
$ELRECMSM =  $_POST["ELRECMSM"];
$ELDUP =  $_POST["ELDUP"];
$ELCOUP =  $_POST["ELCOUP"];
$ELSXBORN =  $_POST["ELSXBORN"];
$ELTGNOW =  $_POST["ELTGNOW"];
$ELAGE =  $_POST["ELAGE"];
$_SESSION["ELAGE"]  =  $ELAGE;
$ELLOCZIP =  $_POST["ELLOCZIP"];
$ELMSMEV =  $_POST["ELMSMEV"];
$ELMSMREC =  $_POST["ELMSMREC"];
$NATION =  $_POST["NATION"];  /// new add
$NATION_OTH =  $_POST["NATION_OTH"];  /// new add

$sub_pro =substr("$ELLOCZIP",0,2);
/*echo $sub_pro;
echo "<br>จังหวัด";*/
$incity='0';
if($sub_pro == 10){
 $ELLOCBM = 1;
 if($incity == 01){
 $ELLOC5 = 1;
}else{
  $ELLOC5 = 1;
  }
/*}elseif($sub_pro == 50){
 $ELLOCBM = 2;
 if($incity == 01){
 $ELLOC5 = 1;
}else{
  $ELLOC5 = 2;
  }*/
}else{
  $ELLOCBM = 3;
   if($incity == 01){
 $ELLOC5 = 1;
}else{
  $ELLOC5 = 2;
  }
}

$incity =substr("$ELLOCZIP",2);
/*echo $incity;
echo "<br>ในเมืองไหม";*/

/*echo $ELLOC5;
echo "<br>";*/

                if ($conn_rds->connect_error) {
                            die("Connection failed: " . $conn_rds->connect_error);
                        }

                     $sql_findgeo = "SELECT GEO_ID FROM amphures WHERE AMPHUR_CODE= '$ELLOCZIP'";
                     $result_geo = $conn_rds->query($sql_findgeo);
                     $num_rows_geo = mysqli_num_rows($result_geo);
                     $row_geo = $result_geo->fetch_assoc();
																																																
                      $get_geo =$row_geo['GEO_ID'];


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
                                                   
            

//-----------------------------------------------CHECK-----------------------------------------------
                                      if($ELKNOW == 2)
	{	
	       $sc1 = 1;
	}
	else
	{
	      $sc1 = 0;
	}
	
                                       if($ELDUP == 1)
	{	
	       $sc2 = 1;
	}
	else
	{
	      $sc2= 0;
	}
	
                                       if($ELSXBORN == 2)
	{	
	       $sc3 = 1;
	}
	else
	{
	      $sc3 = 0;
	}

 
                                       if($ELTGNOW == 2)
	{	
	       $sc4 = 1;
	}
	else
	{
	      $sc4 = 0;
	}
 
 
 
 if($ELAGE < 15)
	{	
	       $sc5 = 1;
	}
	else
	{
	      $sc5= 0;
	}
	
                                      if($ELMSMEV == 2  or $ELMSMEV  == 3  or $ELMSMEV  == 97)
	{	
	       $sc6 = 1;
	}
	else
	{
	      $sc6= 0;
	}
	
                                          if($ELMSMREC == 2  or $ELMSMREC  == 97  or $ELMSMREC  == 98)
	{	
	       $sc7 = 1;
	}
	else
	{
	      $sc7= 0;
	}
	
                                          $scfinal =  $sc1 + $sc2 + $sc3 + $sc4 + $sc5 + $sc6 + $sc7;
                                          //$scfinal = 0;//dry runopen
                                         
                                          
   if($scfinal   == 0 )
	{	
    $ELIGIB = 1;
    $status = "SC-PASS";    // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,JOIN,QT-PASS,BIO-PASS
	//////////////////////////////skip limesurvey
if($ELLOCZIP >= 1001 && $ELLOCZIP <= 1351){
    $trick=1;// goto BKK
 }elseif($ELLOCZIP >= 7301 && $ELLOCZIP <= 7403){
   $trick=1;// goto BKK
/* }elseif($ELLOCZIP >= 5001 && $ELLOCZIP <= 5053){
   $trick=2;*/// goto CM
 }else
$trick=3;// Skip question

if ($conn_rds->connect_error) {
    die("Connection failed: " . $conn_rds->connect_error);
} 

//$sql = "UPDATE tbanswer SET lastname='Doe' WHERE RDSCODE='$rds_code'";

	         $sql = "UPDATE tbanswer SET";                                                                                                          
                                                            $sql.= " STATUSCODE= '$status',";
                                                            $sql.= " NATION='$NATION',";                             //                                                                     
                                                            $sql.= " NATION_OTH='$NATION_OTH',";                  //
                                                            $sql.= " ELKNOW='$ELKNOW',";                                                                                                
                                                            $sql.= " ELRECPART='$ELRECPART',";                                                                      
                                                            $sql.= " ELRECMSM='$ELRECMSM',";                                                        
                                                            $sql.= " ELDUP='$ELDUP',";                                 
                                                            $sql.= " ELCOUP='$ELCOUP',";                                                                                                    
                                                            $sql.= " ELSXBORN='$ELSXBORN',";                                                                                                                               
                                                            $sql.= " ELTGNOW='$ELTGNOW',";
                                                            $sql.= " ELAGE='$ELAGE',";                                                                      
                                                            $sql.= " ELLOCZIP='$ELLOCZIP',";                                                                                                                   
                                                            $sql.= " ELMSMEV='$ELMSMEV',";                                                                                                                       
                                                            $sql.= " ELMSMREC='$ELMSMREC',";                                                
                                                            $sql.= " ELIGIB ='$ELIGIB',";
                                                            $sql.= " ELREGION='$get_geo',";
                                                            $sql.= " ELPROVINCE='$sub_pro',";
                                                            $sql.= " ELDISTRICT='$ELLOCZIP',";
                                                            $sql.= " ELLOCBM='$ELLOCBM',";
                                                            $sql.= " ELLOC5='$ELLOC5',";          
	                                                        $sql.= " LASTUPDATE='$datenow'";                                                                                                                                                               
                                                         $sql.= "WHERE RDSCODE='$rds_code'";
															if ($conn_rds->query($sql) === TRUE) {
	       // echo "ok";
	     //   echo "<meta http-equiv='refresh' content='0;URL=consent.php'>";
			  echo "<meta http-equiv='refresh' content='0;URL=screenpass.php'>";
	}
else
	{
	echo "Error updating record: " . $conn_rds->error;
	 }
	}
	else
	{
	      $ELIGIB= 2;
	      $status = "SC-NOPASS";    // Status : Wait,Expire,SC-NOPASS,SC-PASS,QT-NOPASS,JOIN,QT-PASS,BIO-PASS
		    $sql = "UPDATE tbanswer SET";                                                                                                          
                                                            $sql.= " STATUSCODE= '$status',";
                                                            $sql.= " NATION='$NATION',";                             //                                                                     
                                                            $sql.= " NATION_OTH='$NATION_OTH',";                  //
                                                            $sql.= " ELKNOW='$ELKNOW',";                                                                                                
                                                            $sql.= " ELRECPART='$ELRECPART',";                                                                      
                                                            $sql.= " ELRECMSM='$ELRECMSM',";                                                        
                                                            $sql.= " ELDUP='$ELDUP',";                                 
                                                            $sql.= " ELCOUP='$ELCOUP',";                                                                                                    
                                                            $sql.= " ELSXBORN='$ELSXBORN',";                                                                                                                               
                                                            $sql.= " ELTGNOW='$ELTGNOW',";
                                                          //  $sql.= " ELTGNOW_OTH='$ELTGNOW_OTH',";                           //
                                                            $sql.= " ELAGE='$ELAGE',";                                                                      
                                                            $sql.= " ELLOCZIP='$ELLOCZIP',";                                                                                                                   
                                                            $sql.= " ELMSMEV='$ELMSMEV',";                                                                                                                       
                                                            $sql.= " ELMSMREC='$ELMSMREC',";                                                
                                                            $sql.= " ELIGIB ='$ELIGIB',";
                                                            $sql.= " ELREGION='$get_geo',";
                                                            $sql.= " ELPROVINCE='$sub_pro',";
                                                            $sql.= " ELDISTRICT='$ELLOCZIP',";
                                                            $sql.= " ELLOCBM='$ELLOCBM',";
                                                            $sql.= " ELLOC5='$ELLOC5',";          
	                                                           $sql.= " LASTUPDATE='$datenow'";                                                                                                                                                               
                                                            $sql.= "WHERE RDSCODE='$rds_code'";

if ($conn_rds->query($sql) === TRUE) {

	       // echo "ok";
	     //   echo "<meta http-equiv='refresh' content='0;URL=consent.php'>";
			  echo "<meta http-equiv='refresh' content='0;URL=formmessage03.php'>";
	}
else
	{
	echo "Error updating record: " . $conn_rds->error;
	 }
	}
$conn_rds->close();

?>


