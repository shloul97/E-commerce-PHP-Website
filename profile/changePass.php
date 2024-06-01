<?php 
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_SESSION['login'])){
        $user_id = $_SESSION['user_id'];
        $sql_check = "SELECT * from users where user_id = $user_id";
        $result_check = mysqli_query($db,$sql_check);
        if(mysqli_num_rows($result_check)  > 0){
            $row_user = mysqli_fetch_assoc($result_check);
            $act_pass = $row_user['password'];
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];

            if($act_pass == $old_pass ){
                $sql_change = "UPDATE users set password = '$new_pass' where user_id = $user_id";
                mysqli_query($db,$sql_change);
                echo json_encode(array('response' => 1));
            }
            else{
                echo json_encode(array('response' => 0));
            }

        }

    }
    
}
?>