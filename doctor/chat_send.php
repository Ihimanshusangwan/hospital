<?php
require("../admin/connect.php");
$jsonData = file_get_contents('php://input');

$data = json_decode($jsonData, true);

$checkboxes = $data['checkboxes'];
$dr_id = $data['dr_id'];
$msgBody = $data['msgBody'];
foreach($checkboxes as $key => $value){
    $sql = "insert into messages(dr_id,r_id,msg_body) values($dr_id,$value,'{$msgBody}');";
    $conn->query($sql);
}

$conn->close();
$response = "success";
echo $response;
?>
