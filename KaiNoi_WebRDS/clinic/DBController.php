<?php
class DBController {
    private $host = "your_host";
    private $user = "your_username";
    private $password = "your_password";
    private $database = "your_database_name";

    
    private static $conn;
    
    function __construct() {
        $this->conn = $this->connectDB();
        if(!empty($this->conn)) {
            $this->selectDB();
        }
    }
    
    function connectDB() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }
    
    function selectDB() {
        mysqli_select_db($this->conn, $this->database);
    }
    
    
function runQuery($query) {
    $result = mysqli_query($query);
    while($row=mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
    }       
    if(!empty($resultset))
        return $resultset;
}
    
    function numRows($query) {
        $result  = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
?>