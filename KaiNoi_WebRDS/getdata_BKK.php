<?php 
require_once('connections/conn_rds.php');
mysqli_set_charset($conn_rds, 'utf8');
                                                
                                                if ($conn_rds->connect_error) {
                                                     die("Connection failed: " . $conn_rds->connect_error);
                                                } 
    $val = $_POST['selectv'];
    if($val == 10){
        $val =1;
    }elseif($val == 38){
        $val = 38;
    }
   
    $sql = "SELECT * FROM amphures WHERE PROVINCE_ID= '$val' ORDER BY  AMPHUR_ID";
     $result = $conn_rds->query($sql);
    echo '<option value="saab" selected="" disabled="">-เลือกเขต-</option>';
              while($row = mysqli_fetch_array($result)){
                   echo "<option id='s1'".$row[AMPHUR_ID]." value=\"$row[AMPHUR_CODE]\" >$row[AMPHUR_NAME]</option> \n" ;
              }
              
              
?>