<?php

    include 'config.php';

    header('Content-Type: application/json'); // Tell the browser the response format will be JSON
    header('Acess-Control-Allow-Origin: *'); // To give the access of this API

    $data = json_decode(file_get_contents("php://input"), true);

    $search = isset($data['search']) ? $data['search'] : "";

    $sql = "SELECT * FROM user WHERE f_name LIKE '%{$search}%' OR l_name LIKE '%{$search}%'";
    
    $result = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result) > 0){
        $all_row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode([array("response" => $all_row, "message" => "Succesfully Found", "status" => true)]);
    }else{
        echo json_encode([array('message' => "No records found", 'Status' => false)]);
    }

?>  