<?php
    header('Content-Type: application/json');
    header('Acess-Control-Allow-Origin: *');
    header('Acess-Control-Allow-Methods: POST');
    header('Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Headers, Acess-Control-Allow-Methods, Authorization, X-Requested-With');

    include 'config.php';

    $data = json_decode(file_get_contents('php://input'),true);
    $f_name = isset($data['f_name'])? $data['f_name']: '';
    $l_name = isset($data['l_name'])? $data['l_name']: '';
    $user_name = isset($data['user_name'])? $data['user_name']: '';
    $password = isset($data['password'])? $data['password']: '';
    $gender = isset($data['gender'])? $data['gender']: '';
    $address = isset($data['address'])? $data['address']: '';

    $sql = "INSERT INTO user(f_name, l_name, user_name, password, gender, address) VALUES('{$f_name}', '{$l_name}', '{$user_name}', '{$password}', '{$gender}', '{$address}');";
    $result = mysqli_query($con,$sql); 

    if($result){
        $sql = "SELECT * FROM user ORDER BY uid DESC LIMIT 1";
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