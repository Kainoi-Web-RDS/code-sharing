<?php

	//กำหนดค่า Access-Control-Allow-Origin ให้ เครื่อง อื่น ๆ สามารถเรียกใช้งานหน้านี้ได้
	header("Access-Control-Allow-Origin: *");
	
	header("Content-Type: application/json; charset=UTF-8");
	
	header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
	
	header("Access-Control-Max-Age: 3600");
	
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
	//ตั้งค่าการเชื่อมต่อฐานข้อมูล
	require_once('connections/conn_rds.php');
	mysqli_set_charset($conn_rds, 'utf8');
	if ($conn_rds->connect_error) {
    	die("Connection failed: " . $conn_rds->connect_error);
    } 
	
	$requestMethod = $_SERVER["REQUEST_METHOD"];

	$readable_table = array("tbcoupon", "amphures", "geography", "districts","provinces","seed_candidate","tbanswer","tbanswer_s","tbcouponlog","tbpaylog","tbpayqueue","tbseed","vw_coupon","zipcodes","Not_swarm_code","Not_coupon_interested","Not_telephone_duplicate");

	//ตรวจสอบหากใช้ Method GET
	if($requestMethod == 'GET'){
		//ตรวจสอบการส่งค่า id
		if(isset($_GET['tb']) && !empty($_GET['tb']) && in_array($_GET['tb'], $readable_table) ){
			//$tb = $_GET['tb'];
			$tb = mysqli_real_escape_string($conn_rds,$_GET['tb']);
			//คำสั่ง SQL กรณี มีการส่งค่า id มาให้แสดงเฉพาะข้อมูลของ id นั้น
			$sql = "SELECT * FROM $tb ";
			
		}else{
			//คำสั่ง SQL แสดงข้อมูลทั้งหมด
			$sql = "SELECT 'Do not do this !'";
		}
		
		$result = mysqli_query($conn_rds, $sql);
	
		//สร้างตัวแปร array สำหรับเก็บข้อมูลที่ได้
		$arr = array();
		
		while ($row = mysqli_fetch_assoc($result)) {
			 
			 $arr[] = $row;
		}
		
		echo json_encode($arr);
	}