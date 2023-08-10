<?php
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$treat = $data['treat'];
include "../admin/connect.php";
// Prepare and execute the update query
$stmt = $conn->prepare('UPDATE ortho_cont SET treat = ? WHERE id = ?');
$stmt->bind_param('si', $treat, $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $response = array('status' => 'success', 'message' => 'Data updated successfully');
} else {
    $response = array('status' => 'error', 'message' => 'Failed to update data');
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
