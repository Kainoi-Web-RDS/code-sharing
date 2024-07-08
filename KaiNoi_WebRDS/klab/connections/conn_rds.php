
<?php 
//เชื่อมต่อ
ini_set('display_errors', 1);
error_reporting(~0);





$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name"; 


// Create connection
$conn_rds= new mysqli($servername, $username, $password, $dbname);
 // Change character set to utf8
 mysqli_set_charset($conn_rds,"utf8");
// Check connection
if ($conn_rds->connect_error) {
    die("Connection failed: " . $conn_rds->connect_error);
}
?>