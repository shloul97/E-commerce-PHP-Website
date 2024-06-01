<?php
include '../userdata.php';

function getdata($table){
	global $db;
	$col = '';
	$col_id = '';
	$colNames = array();
	switch($table){
		case 'brands':
		$col = 'brand_name';
		$col_id = 'brand_id';
		break;
		case 'category':
		$col = 'category_name';
		$col_id = 'category_id';
		break;
		case 'category2':
		$col_id = 'category2_id';
		$col = 'category_name';
		break;
		
	}
	
	$sql = "SELECT * FROM ".$table;
	$result = mysqli_query($db,$sql);
	while($row = mysqli_fetch_assoc($result)){
		 array_push($colNames , array('name' => $row[$col], 'id' => $row[$col_id]));
	}
	return $colNames;
}
$brands = getdata('brands');
$genCategory = getdata('category');
$category = getdata('category2');
?>