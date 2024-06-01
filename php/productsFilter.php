<?php
include '../conn.php';

		
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$action = $_POST['action'];
	$products = array();
	$allproducts = array();

	if($action == 'latestOffer'){
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


	/*if($action == 'noFilter'){

		
		
		$sql_item = "SELECT * from products";
		if(isset($_SESSION['search_filter']) && $_SESSION['search_filter'] != ''){
			$sql_item .= " WHERE product_name LIKE '%".$_SESSION['search_filter']."%'";
		}

		

		$result_item = mysqli_query($db,$sql_item);
		while($row_item = mysqli_fetch_assoc($result_item)){
			$product_id = $row_item['product_id'];
			$folder = '../products/'.$product_id.'/';
			$images = glob($folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
			$products = [
			'product_id' => $row_item['product_id'],
			'image' => $images[0],
			'title' => $row_item['product_name'],
			'oldPrice' => $row_item['price'],
			'newPrice' => $row_item['price']
			];

			
			
			array_push($allproducts,$products);
			
		}
		
		echo json_encode($allproducts,JSON_PRETTY_PRINT);
		
	}*/
	
	if($action == 'searchFilter'){
		$brand_id = json_decode($_POST['brands']);
		$gen_id = $_POST['gen_cat'];
		$category_ids = json_decode($_POST['category']);


		//$page = $_POST['page'];

		
		$sql_item = "SELECT * from products ";

		if(!empty($brand_id) || $gen_id != '' || (isset($_SESSION['search_filter']) && $_SESSION['search_filter'] != '') || !empty($category_ids)){
			$sql_item .= " where ";
		}
		if(!empty($brand_id)){
			$sql_item .= "brand_id IN(";
			for($i = 0 ; $i < count($brand_id) ; $i++){
				if($i == (count($brand_id) - 1)){
					$sql_item.= "$brand_id[$i]) ";
					break;
				}
				$sql_item.= "$brand_id[$i],";
			}	
		}
		

		
		if($gen_id !=  ''){
			if(!empty($brand_id)){$sql_item.= " and category_id = $gen_id";}
			else{$sql_item.= " category_id = $gen_id";}			
		}

		if(!empty($category_ids)){
			if(!empty($brand_id) || !empty($gen_id)){
				$sql_item.= " and ";
			}

			$sql_item.= " category2_id IN(";
			for($i = 0; $i < count($category_ids); $i++){
				if($i == (count($category_ids) -1)){
					$sql_item .= "$category_ids[$i])";
					break;
				}
				$sql_item .= "$category_ids[$i],";
			}
				
		}

		if(isset($_SESSION['search_filter']) && $_SESSION['search_filter'] != ''){
			if(empty($brand_id) && empty($gen_id) && empty($category_ids)){
				$sql_item .= " product_name LIKE '%".$_SESSION['search_filter']."%'";
			}
			else{
				$sql_item .= " and product_name LIKE '%".$_SESSION['search_filter']."%'";
			}
			
		}

		
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
			
			
			$products = [
			'product_id' => $row_item['product_id'],
			'image' => $image,
			'title' => $row_item['product_name'],
			'oldPrice' => $row_item['price'],
			'newPrice' => $row_item['price_sale']
			];
			
			
			array_push($allproducts,$products);
			
		}
		echo json_encode($allproducts,JSON_PRETTY_PRINT);
		
		
	}
}


?>