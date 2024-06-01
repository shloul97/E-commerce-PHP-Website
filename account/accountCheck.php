<?php 
include '../userdata.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$action = $_POST['action'];
	
	if($action == 'login'){
		$params = array();
		$dataUn = $_POST['values'];
		$dataUn = trim($dataUn,"\"");
		$dataArr = parse_str($dataUn,$params);
		
		
		print_r($dataArr);
		$password = $params['password'];
		$username = $params['username'];
		$sql_check = "SELECT * FROM users where email = '$username' and password = '$password'";
		
		$result_login = mysqli_query($db,$sql_check);
		$check_row = mysqli_num_rows($result_login);
		if($check_row > 0){
			echo json_encode(array('status' => 1 , 'dis' => $params));
			$row_login = mysqli_fetch_assoc($result_login);
			//print_r($dataArr['remember']);

			$oldCart = array();
			$newUser_id = $row_login['user_id'];
			$oldUserId = $_SESSION['user_id'];
			$cookieOld = $_COOKIE['user'];
			

			//----- CART EDIT -----

			$sql_shifted = "UPDATE cart set user_id = $newUser_id WHERE user_id = $oldUserId";
			mysqli_query($db,$sql_shifted);

			$sql_cookieShift = "UPDATE users SET cookie_id = '$cookieOld' WHERE user_id = $newUser_id";
			mysqli_query($db,$sql_cookieShift);

			$sql_deleteUser = "DELETE FROM users WHERE user_id = $oldUserId";
			mysqli_query($db,$sql_deleteUser);

			//----- END CART EDIT ----


			if(array_key_exists('remember',$params)){
				//print_r($params['remember']);
				$cookie_value = uniqid().uniqid();
				$cookie_name = 'user';
				setcookie($cookie_name,$cookie_value,time() + (86400 * 30), '/');
				$sql_cookieUpdate = "UPDATE users set cookie_id = '$cookie_value' where email = '$username'";
				mysqli_query($db,$sql_cookieUpdate);
			
			}
			

			$_SESSION['user_id'] = $newUser_id;
			$_SESSION['login'] = $username;
			$_SESSION['username_uss'] = $row_login['username'];
		}
		else {
			
			echo json_encode(array('status' => 0));
		}
	}
	if($action == 'register'){
		$username = $_POST['name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		$sql_lookup = "SELECT * from users where email = '$email'";
		$result_lookup = mysqli_query($db,$sql_lookup);
		$row_lookup= mysqli_num_rows($result_lookup);
		
		if($row_lookup > 0){
			echo json_encode(array('status' => 0));
		}
		else{
			$sql_insert = "UPDATE users set username = '$username' , password = '$password' , email = '$email' 
			WHERE cookie_id = '$user_cookie'";
			//$sql_insert = "INSERT INTO users(username,password,email) VALUES ('$username','$password','$email')";
			mysqli_query($db,$sql_insert);
			$_SESSION['login'] = $email;
			echo json_encode(array('status' => 1));
		}
		
	}
}
?>