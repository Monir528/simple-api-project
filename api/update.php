<?php

    header('Content-Type: application/json');
    header('Acess-Control-Allow-Origin: *');
    header('Acess-Control-Allow-Methods: PUT');
    header('Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Headers, Acess-Control-Allow-Methods, Authorization, X-Requested-With');

    include 'config.php';

    $data = json_decode(file_get_contents('php://input'),true);
    $uid = isset($data['uid'])? $data['uid']: '';
    $f_name = isset($data['f_name'])? $data['f_name']: '';
    $l_name = isset($data['l_name'])? $data['l_name']: '';
    $user_name = isset($data['user_name'])? $data['user_name']: '';
    $password = isset($data['password'])? $data['password']: '';
    $gender = isset($data['gender'])? $data['gender']: '';
    $address = isset($data['address'])? $data['address']: '';

    $sql = "UPDATE user SET f_name = '{$f_name}', l_name = '{$l_name}', user_name = '{$user_name}', password = '{$password}', gender = '{$gender}', address = '{$address}' WHERE uid = {$uid}";
    $result = mysqli_query($con,$sql); 

    if($result){
        $sql = "SELECT * FROM user WHERE uid = {$uid}";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            $all_row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode([array("response" => $all_row, "message" => "Succesfully Inserted", "status" => true)]);
            return;
        }else{
        } 
        return;
    }
    echo json_encode(array(["message" => "Operation Failed", "status" => false]));

?>