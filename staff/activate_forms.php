<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require("../admin/connect.php");
    $success= false;
    $data = json_decode(file_get_contents('php://input'), true);
    $pId = $data['pId'];
    $pCol = $data['pCol'];
    $sql = "Update patient_records set $pCol = 1 where id = $pId; ";
    $conn->query($sql);
    if ($conn->affected_rows >0){
        $success = true;
    }

    $response = [
        'success' => $success
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
} 
?>
