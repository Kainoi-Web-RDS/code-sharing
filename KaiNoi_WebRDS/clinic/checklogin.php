<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
?>
<?php
 

if(isset($_POST['username'])){
                if ($conn_rds->connect_error) {
                                 die("Connection failed: " . $conn_rds->connect_error);
                                           }
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  $sql="SELECT * FROM LABUSER 
                  WHERE  USERS='".$username."' 
                  AND  PASS='".$password."' ";
                  $result= $conn_rds->query($sql);
                 
                
                  if(mysqli_num_rows($result)==1){
                          $row = $result->fetch_assoc();
      
                      $_SESSION["USERS"] = $row["USERS"];
                      $_SESSION["PASS"] = $row["PASS"];
                      $_SESSION["HOS"] = $row["HOS"];
                      $_SESSION["STATUS"] = $row["STATUS"];

                      if($_SESSION["STATUS"]=="0"){ 

                        Header("Location: select.php");
                      }
                  if ($_SESSION["STATUS"]=="1"){ 

                        Header("Location: select.php");
                      }
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
        }else{

             Header("Location: index.php"); //user & password incorrect back to login again
 
        }
?>