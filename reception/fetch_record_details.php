<?php
include("../admin/connect.php");

$mobileNumber = $_POST['mobile'];
$patientId = $_POST['id'];  // Retrieve patient ID from the POST request

$stmt = $conn->prepare("SELECT patient_records.*,patient_info.*,p_insure.uhid FROM patient_records 
                        INNER JOIN patient_info ON patient_records.id = patient_info.patient_id 
                        INNER JOIN p_insure ON patient_records.id = p_insure.id 
                        WHERE patient_records.id = ?");
$stmt->bind_param("i",$patientId);
$stmt->execute();
$result = $stmt->get_result();
$recordDetails = $result->fetch_assoc();
header('Content-Type: application/json');
echo json_encode($recordDetails);
$stmt->close();
$conn->close();
?>
