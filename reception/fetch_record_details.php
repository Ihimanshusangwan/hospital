<?php
include("../admin/connect.php");
$mobileNumber = $_POST['mobile'];
$stmt = $conn->prepare("SELECT * FROM patient_records inner join patient_info on  patient_records.id = patient_info.patient_id WHERE patient_records.mobile = ?");
$stmt->bind_param("s", $mobileNumber);
$stmt->execute();
$result = $stmt->get_result();
$recordDetails = $result->fetch_assoc();
header('Content-Type: application/json');
echo json_encode($recordDetails);
$stmt->close();
$conn->close();
?>
