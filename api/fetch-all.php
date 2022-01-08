<?php

    header('Content-Type: application/json'); // Tell the browser the response format will be JSON
    header('Acess-Control-Allow-Origin: *'); // To give the access of this API

    include 'config.php';

    $sql = "SELECT * FROM user";
    
    $result = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result) > 0){
        $all_row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($all_row);
    }else{
        echo json_encode(array('message' => "No records found", 'Status' => false));
    }

?>  