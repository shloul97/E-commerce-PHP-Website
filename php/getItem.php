<?php
include '../conn.php';
		
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$action = $_POST['action'];
	$products = array();
	$allproducts = array();
	if($action == 'newArrive'){
		$sql_item = "SELECT * from products order by product_id desc LIMIT 0,12";
		$result_item = mysqli_query($db,$sql_item);
		while($row_item = mysqli_fetch_assoc($result_item)){
			$product_id = $row_item['product_id'];
			$folder = '../products/'.$product_id.'/';
			$image = 'null';
			if(file_exists($folder)){
				$images = glob($folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
				if($images != null){
					$image = $images[0];
				}
			}
			//var_dump($images);
			//GLOB_BRACE
			$products = [
			'product_id' => $row_item['product_id'],
			'image' => $image,
			'title' => $row_item['product_name'],
			'oldPrice' => $row_item['price'],
			'newPrice' => $row_item['price_sale']
			];
			
			array_push($allproducts,$products);
			
		}
		//echo json_encode(array('status'=>'hello'));
		echo json_encode($allproducts,JSON_PRETTY_PRINT);
		
	}


	if($action == 'bestSale'){
		$sql_item = "SELECT * from products order by price_perc desc LIMIT 0,12";
		$result_item = mysqli_query($db,$sql_item);
		while($row_item = mysqli_fetch_assoc($result_item)){
			$product_id = $row_item['product_id'];
			$folder = '../products/'.$product_id.'/';
			$image = 'null';
			if(file_exists($folder)){
				$images = glob($folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
				if($images != null){
					$image = $images[0];
				}
			}
			//var_dump($images);
			//GLOB_BRACE
			$products = [
			'product_id' => $row_item['product_id'],
			'image' => $image,
			'title' => $row_item['product_name'],
			'oldPrice' => $row_item['price'],
			'newPrice' => $row_item['price_sale']
			];
			
			array_push($allproducts,$products);
			
		}
		//echo json_encode(array('status'=>'hello'));
		echo json_encode($allproducts,JSON_PRETTY_PRINT);
		
	}
	
	
}


?>