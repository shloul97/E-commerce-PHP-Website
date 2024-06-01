<?php
include '../userdata.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['action'] == 'addNew'){
        
        $params = array();
        parse_str($_POST['data1'], $params);


        $userDataArr = getUserData();


        //$un = unserialize($_POST['data1']); 
        $fullArr[] = $params;

        $fname = $userDataArr[0]['fname'];
        $lname = $userDataArr[0]['lname'];
        $email = $userDataArr[0]['email'];
        $phone = $userDataArr[0]['phone'];
        $address1 = $params['address1'];
        $address2 = $params['address2'];
        $city = $params['city'];
        $state = $params['state'];
        $zip =  $params['zip'];
        $country = $params['country'];




        $sql_insertData = "INSERT INTO user_info(user_id,fname,lname,email,phone,address_1,address_2,city,state,zip,country_code) VALUES 
        ($user_id,
        '$fname',
        '$lname',
        '$email',
        $phone,
        '$address1',
        '$address2',
        '$city',
        '$state',
        '$zip',
        '$country')";
        mysqli_query($db,$sql_insertData);


        $json_arr = json_encode($fullArr, true);
        $filename = "data.json";

        file_put_contents($filename, $json_arr);
        echo json_encode($params);
    }

    if($_POST['action'] == 'removeAddr'){
        
        $address_id = $_POST['item_id'];

        $sql_remove = "UPDATE user_info set status = 0 where order_id = $address_id";
        mysqli_query($db,$sql_remove);
    }

}

?>