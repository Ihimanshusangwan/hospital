<?php

$postData = json_decode(file_get_contents('php://input'), true);
require("../admin/connect.php");
// Access the values from the JSON data
$pId = $postData['pId'];
$doctor = $postData['doctor'];

$sql ="select type_of_visit from doctors where name = '{$doctor}';";
$res = $conn->query($sql)->fetch_assoc();
$type = $res['type_of_visit'];

$sql ="select consultant from patient_records where id = $pId;";
$res = $conn->query($sql)->fetch_assoc();
$initial_dr = $res['consultant'];
$sql = "update patient_records set consultant = '$doctor' , type_of_visit = '$type',is_refered = 1, refered_by = '$initial_dr' where id = $pId;";
$conn->query($sql);
if($conn->affected_rows > 0){
    echo 'success';
}else{
    echo 'failed';
}

?>
