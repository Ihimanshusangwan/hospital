<?php
// Retrieve the chargeId from the request body
$data = json_decode(file_get_contents("php://input"));
$chargeId = $data->chargeId;

// Perform the delete operation
include("../admin/connect.php");
$stmt = $conn->prepare("DELETE FROM opd_charges WHERE id = ?");
$stmt->bind_param("i", $chargeId);
$stmt->execute();
$stmt->close();
$conn->close();

$response = array();
$response["status"] = "success";
header("Content-Type: application/json");
echo json_encode($response);
?>

