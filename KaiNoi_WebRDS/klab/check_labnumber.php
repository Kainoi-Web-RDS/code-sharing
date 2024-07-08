<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
$LABNUMBER = $_POST["LABNUMBER"];

if(!empty($_POST["LABNUMBER"])) {
error_reporting( error_reporting() & ~E_NOTICE );
	                                if ($conn_rds->connect_error)
                                           {
                                               die("Connection failed: " . $conn_rds->connect_error);
                                           }

                                  
                                   $query = "SELECT * FROM tbresult WHERE LABNUMBER='" . $LABNUMBER. "'";
                                   $result = $conn_rds->query($query);
                                   $user_count = mysqli_num_rows($result);
                                  
	
	
  if($user_count == 1) {
   echo "<span id=g2 class='status-available'><h4><font color='#A569BD'>ตรวจพบ หมายเลข LABNUBER นี้ในระบบ</font></h4></span>";
         echo "<script>document.getElementById('ps').style.display = 'none'</script>";
      echo "<script>document.getElementById('submit').style.display = 'none'</script>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
			 echo "<script>document.getElementById('back').style.display = 'block'</script>";
  }else{
 echo "<span id=g1 class='status-not-available'><h4><font color='#E74C3C'>หมายเลข LABNUBERใช่ได้</font></h4></span>";
		  echo "<script>document.getElementById('ps').style.display = 'block'</script>";
      echo "<script>document.getElementById('submit').style.display = 'block'</script>";
      echo "<script>$('#submit').prop('disabled',false);</script> ";
      echo "<script>document.getElementById('back').style.display = 'none'</script>";
  }
  }
?>