<?php
	include '../conn.php';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$action = $_POST['action'];
		if($action == 'searchFilter'){
			$brand_id = json_decode($_POST['brands']);
			$gen_id = $_POST['gen_cat'];
			$arr = array();
			
			array_push($arr,$brand_id);
			array_push($arr,$gen_id);
			echo json_encode($arr);
			
			
		}
		
	}
	
?>