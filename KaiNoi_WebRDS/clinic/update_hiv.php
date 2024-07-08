<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
 /* $STATUS = $_SESSION['STATUS'];
	if($STATUS!='1'){
    Header("Location: logout.php");  
  }  */
 
 if(!empty($_POST))  
 {
 $BMRECID= $_SESSION["BMRECID"];
 error_reporting( error_reporting() & ~E_NOTICE );

 if ($conn_rds->connect_error) {
  die("Connection failed: " . $conn_rds->connect_error);
 }


                       // $message = '';  
                       $ids_hiv =  $_POST['ids_hiv'];
                       $BMASSAY1  =  $_POST['BMASSAY1'];
                       $BMASSAY1RES =  $_POST['BMASSAY1RES'];
                       $BMASSAY2 =  $_POST['BMASSAY2'];
                       $BMASSAY2RES =  $_POST['BMASSAY2RES'];
                       $BMASSAY3 =  $_POST['BMASSAY3'];
                       $BMASSAY3RES =  $_POST['BMASSAY3RES'];
                       $BMHIVRES =  $_POST['BMHIVRES'];
                       echo $ids_hiv;
                      
                       $datenow = date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));

                                                                            $sql_hiv = "UPDATE tblab SET";
                                                                            $sql_hiv.= " BMASSAY1='$BMASSAY1',";                                 
                                                                            $sql_hiv.= " BMASSAY1RES='$BMASSAY1RES',";
                                                                            $sql_hiv.= " BMASSAY2='$BMASSAY2',";                                 
                                                                            $sql_hiv.= " BMASSAY2RES='$BMASSAY2RES',";
                                                                            $sql_hiv.= " BMASSAY3='$BMASSAY3',";                                 
                                                                            $sql_hiv.= " BMASSAY3RES='$BMASSAY3RES',";
                                                                            $sql_hiv.= " BMHIVRES='$BMHIVRES',";                                 
                                                                            $sql_hiv.= " LASTUPDATE='$datenow'";                    
                                                                            $sql_hiv.= " WHERE BMRECID = '" . $BMRECID . "'";                                          
                    if ($conn_rds->query($sql_hiv) === TRUE)
                          {
                                echo "Error: " . $sql_hiv . "<br>" . $conn_rds->error; 
               echo "<span id=g1 class='status-available1'><h4><font color='#A569BD'>&nbsp;&nbsp;&nbsp;UPDATE เรียบร้อย</font></h4></span>";
            
                       }
                       else
                       {
                               echo "Error: " . $sql_up . "<br>" . $conn_rds->error;
               echo "<span id=g1 class='status-available1'><h4><font color='#A569BD'>&nbsp;&nbsp;&nbsp;UPDATE ไม่ได้</font></h4></span>";
            
                       }
					   
             
                            //code to be executed
}

?>