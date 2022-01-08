<?php

    header('Content-Type: application/json');
    header('Acess-Control-Allow-Origin: *');
    header('Acess-Control-Allow-Methods: DELETE');
    header('Acess-Control-Allow-Headers: Content-Type, Acess-Control-Allow-Headers, Acess-Control-Allow-Methods, Authorization, X-Requested-With');

    include 'config.php';

    $data = json_decode(file_get_contents('php://input'),true);
    $uid = isset($data['uid'])? $data['uid']: '';

    $sql = "DELETE FROM user WHERE uid = {$uid}";

    if(mysqli_query($con,$sql)){
        echo json_encode(array(["message" => "Successfully deleted!", "status" => true]));
    }else{
        echo json_encode(array(["message" => "Failed to delete", "status" => false]));
    }

?>