<?php
include 'conn.php';


$user_cookie = '';

function setUserCookie(){
	global $db;
	global $user_cookie;
	$user_cookie = $_COOKIE['user'];
	$sql_cookie = "INSERT INTO users(cookie_id) values ('$user_cookie')";
	mysqli_query($db,$sql_cookie);
}

function getCart(){
	global $db;
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		
	}else {
		return false;
	}
	$itemId_arr = array();
	$allItem = array();
	$sql_getcartid = "select * from cart where user_id = $user_id";
	$result_cartid = mysqli_query($db,$sql_getcartid);
	while($row_cart = mysqli_fetch_assoc($result_cartid)){
		$itemId_arr = [
		'product_id' => $row_cart['product_id'],
		'user_id' => $row_cart['user_id'],
		'quant' => $row_cart['quant']
		];
		array_push($allItem,$itemId_arr);
	}
	return $allItem;
	
}

function getUserData(){
	global $db;

	$userData = array();

	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		
	}else {
		return false;
	}
	$sql_getAddr = "SELECT * from users where user_id = $user_id";
	$result_data = mysqli_query($db,$sql_getAddr);
	while($row = mysqli_fetch_assoc($result_data)){
		array_push($userData, array(
			'fname' => $row['username'],
			'lname' => $row['last_name'],
			'email' => $row['email'],
			'phone' => $row['phone_num'],
			'dob' => $row['dob']
		));
	}
	return $userData;
}
function getUserAddress(){

	global $db;

	$addressData = array();
	$totalAddr = array();

	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		
	}
	else {
		return false;
	}

	$sql_addr = "SELECT * from user_info WHERE user_id = $user_id AND status = 1";
	$result_addr = mysqli_query($db,$sql_addr);
	while($row = mysqli_fetch_assoc($result_addr)){
		array_push($addressData, array(
			'infoId' => $row['order_id'],
			'fname' => $row['fname'],
			'lname' => $row['lname'],
			'country' => $row['country_code'],
			'address1' => $row['address_1'],
			'address2' => $row['address_2'],
			'city' => $row['city'],
			'state' => $row['state'],
			'zip' => $row['zip'],
			'phone' => $row['phone'],
			'email' => $row['email']
		));
	}
	return $addressData;
}

if(isset($_COOKIE['user'])){
	$user_cookie = $_COOKIE['user'];
	$sql_getuser = "select * from users where cookie_id = '$user_cookie'";
	$result = mysqli_query($db,$sql_getuser);
	$row_user = mysqli_fetch_assoc($result);
	$user_id = $row_user['user_id'];
	$_SESSION['user_id'] = $user_id;
	$email = $row_user['email'];
	if($email != null || $email != ''){
		
		$_SESSION['login'] = $email;
	}
	//print_r($_COOKIE['user']);
}
else{
	$cookie_value = uniqid().uniqid();
	$cookie_name = 'user';
	if(setcookie($cookie_name,$cookie_value,time() + (3600*48), '/')){
		$user_cookie = $cookie_value;
		$sql_cookie = "INSERT INTO users(cookie_id) values ('$user_cookie')";
		mysqli_query($db,$sql_cookie);
	}
	

}



//------ session
if(isset($_SESSION['user_id'])){
	
	$sql_cartTo = "SELECT * from cart where user_id = $user_id";
	$result_cartTo = mysqli_query($db,$sql_cartTo);
	$cartItem = mysqli_num_rows($result_cartTo);
	$_SESSION['cart_item'] = $cartItem;
	
}
?>