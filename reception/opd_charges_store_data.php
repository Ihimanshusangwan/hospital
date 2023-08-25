<?php
// Retrieve the form data
$data = json_decode(file_get_contents("php://input"), true);
include("../admin/connect.php");

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO opd_charges (description, amount, qty) VALUES (?, ?, ?)");
$stmt->bind_param("sii", $data['description'], $data['amount'], $data['quantity']);
$stmt->execute();

$stmt->close();
$conn->close();

// Return a response (optional)
echo "Data stored successfully!";
?>
