<?php
$requestBody = file_get_contents('php://input');
$updatedCharge = json_decode($requestBody);

// Extract the charge ID and updated values
$chargeId = $updatedCharge->chargeId;
$description = $updatedCharge->description;
$amount = $updatedCharge->amount;
$qty = $updatedCharge->qty;

// Update the charge in the database
include("../admin/connect.php");
$stmt = $conn->prepare("UPDATE opd_charges SET description=?, amount=?, qty=? WHERE id=?");
$stmt->bind_param("sssi", $description, $amount, $qty, $chargeId);
$stmt->execute();
$stmt->close();
$conn->close();

$response = array("status" => "success", "message" => "Charge updated successfully");
header("Content-Type: application/json");
echo json_encode($response);
?>
