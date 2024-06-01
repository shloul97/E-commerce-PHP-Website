<?php
include 'userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$action = $_POST['action'];
	$user_id = $_SESSION['user_id'];
	if(isset($_POST['id'])){
		$product_id = $_POST['id'];
	}
	if(isset($_POST['productsId'])){
		$product_id = json_decode($_POST['productsId']);
	}
	if($action == 'addCart'){
		$quant = $_POST['quant'];
		$sql_check_cart = "select * from cart where product_id = '$product_id' and user_id = $user_id";
		$result_check = mysqli_query($db,$sql_check_cart);
		$num_row_check = mysqli_num_rows($result_check);
		if($num_row_check > 0){
			$row_check = mysqli_fetch_assoc($result_check);
			$quant_update = $row_check['quant'];
			$quant_update = $quant_update + $quant;
			$sql_update_cart = "UPDATE cart set quant = $quant_update where product_id = '$product_id' and user_id = $user_id";
			mysqli_query($db,$sql_update_cart);
		}
		else{
			$sql_cart = "INSERT INTO cart(product_id, user_id, quant) VALUES ('$product_id',$user_id , $quant)";
			mysqli_query($db,$sql_cart);
		}
		
	}
	if($action == 'removeCart'){
		$sql_deleteCart = "DELETE from cart where product_id ='$product_id' and user_id =$user_id";
		mysqli_query($db,$sql_deleteCart);
		
	}
	
	if($action == 'updateCart'){
		$quant = json_decode($_POST['values']);
		for($i = 0 ; $i < count($product_id) ; $i++){
			$quantUpdate = 0;
			$singleP = $product_id[$i];
			$sql_check_cart = "select * from cart where product_id = '$singleP' and user_id = $user_id";
			$result_check = mysqli_query($db,$sql_check_cart);
			$row_check = mysqli_fetch_assoc($result_check);
			$newQuant = $quant[$i] -$row_check['quant'];
			if($newQuant != 0){
				$quantUpdate = $row_check['quant'] + $newQuant;
				$sql_updateCart = "UPDATE cart set quant = $quantUpdate where product_id = '$singleP' AND user_id = $user_id";
				mysqli_query($db,$sql_updateCart);
			}
			
		}
		
	}

	if($action == 'updateCart1'){
		$quant = $_POST['values'];
		
		$quantUpdate = 0;
		$singleP = $product_id;
		$sql_check_cart = "select * from cart where product_id = '$singleP' and user_id = $user_id";
		$result_check = mysqli_query($db,$sql_check_cart);
		$row_check = mysqli_fetch_assoc($result_check);
		$newQuant = $quant - $row_check['quant'];
		if($newQuant != 0){
			$quantUpdate = $row_check['quant'] + $newQuant;
			$sql_updateCart = "UPDATE cart set quant = $quantUpdate where product_id = '$singleP' AND user_id = $user_id";
			mysqli_query($db,$sql_updateCart);
		}
	}


	if($action == "get_product"){
		$product_id = $_POST['id'];

		$product = array();
		$sql_get = "SELECT * FROM products WHERE product_id = '$product_id'";
		$result_get = mysqli_query($db,$sql_get);

		$folder = 'products/'.$product_id.'/';
		$images = glob($folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

		$row_get = mysqli_fetch_assoc($result_get);

		$product = array(
			'productId' => $row_get['product_id'],
			'productName' => $row_get['product_name'],
			'productImage' => $images[0]
		);

		echo json_encode($product);

	}
	
	
}

if(isset($_COOKIE['user'])){
	
}
?>