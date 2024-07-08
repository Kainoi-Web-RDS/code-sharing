<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');

?>
<?php
$BMRECID = $_SESSION["BMRECID"];
error_reporting(~E_NOTICE);

           $sql = "select * from tblab where BMRECID ='$BMRECID'";
           $result = $conn_rds->query($sql) ;
           $num_rows = mysqli_num_rows($result);
           $row_sr = $result->fetch_assoc();
           
           $keytest1 =$row_sr['keytest1'];
           $keytest2 =$row_sr['keytest2'];
           $keytest3 =$row_sr['keytest3'];
           $keytest4 =$row_sr['keytest4'];
           $keytest5 =$row_sr['keytest5'];

           if($keytest1 == 1)
           {
            $kt1 =1;
           }
           else
           {
            $kt1 = isset($_POST['Keytest1']) ? $_POST['Keytest1'] : 0;
           }
           
          if($keytest2 == 2)
           {
            $kt2 =2;
           }
           else
           {
           $kt2 = isset($_POST['Keytest2']) ? $_POST['Keytest2'] : 0;
           }
           
           if($keytest3 == 3)
           {
            $kt3 =3;
           }
           else
           {
           $kt3 = isset($_POST['Keytest3']) ? $_POST['Keytest3'] : 0;
           }
           
            if($keytest4 == 4)
           {
            $kt4 =4;
           }
           else
           {
           $kt4 = isset($_POST['Keytest4']) ? $_POST['Keytest4'] : 0;
           }
           
           if($keytest5 == 5)
           {
            $kt5 =5;
           }
           else
           {
           $kt5 = isset($_POST['Keytest5']) ? $_POST['Keytest5'] : 0;
           }
           


      $datenow = date('Y-m-d H:i:s',strtotime(date('H:i:s').'7 hours'));

		if($conn_rds->connect_error)
		{
			die("Connection failed: " . $conn_rds->connect_error);
		}
			                                                          $sql_up = "UPDATE tblab SET";
                                                                            $sql_up.= " keytest1='$kt1',";
                                                                            $sql_up.= " keytest2='$kt2',";
                                                                            $sql_up.= " keytest3='$kt3',";
                                                                            $sql_up.= " keytest4='$kt4',";
                                                                            $sql_up.= " keytest5='$kt5',";
                                                                            $sql_up.= " LASTUPDATE='$datenow'";                    
                                                                            $sql_up.= " WHERE BMRECID ='$BMRECID'";                                          
								if ($conn_rds->query($sql_up) === TRUE)
								      {
								           // echo "Error: " . $sql_up . "<br>" . $conn_rds->error;
										        echo "<meta http-equiv='refresh' content='0;URL=result.php'>";																	
								   }
								   else
								   {
									     // echo "Error: " . $sql_up . "<br>" . $conn_rds->error;
                                           // redirect("formmessage05.php",303);
								   }
					   $conn_rds->close();
?>