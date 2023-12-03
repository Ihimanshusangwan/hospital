<?php
require("admin/connect.php");
$jsonData = file_get_contents('php://input');

$data = json_decode($jsonData, true);

$checkboxes = $data['checkboxes'];
$senderId = $data['senderId'];
$SenderName = $data['SenderName'];
$SenderType = $data['SenderType'];
$msgBody = $data['msgBody'];

foreach($checkboxes as $checkbox){
    $r_id = $checkbox['rec_id'];
    $r_type = $checkbox['rec_type'];

    $sql = "INSERT INTO messages(sender_id, sender_name, sender_type, r_id, r_type, msg_body) 
            VALUES ($senderId, '$SenderName', '$SenderType', $r_id, '$r_type', '{$msgBody}')";
    $result = $conn->query($sql);

    if (!$result) {
        $response = "error";
        echo $response;
        exit(); 
    }
}

$conn->close();
$response = "success";
echo $response;
?>
