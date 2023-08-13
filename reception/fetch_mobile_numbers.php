<?php
include("../admin/connect.php");
$searchValue = $_POST['search'];
$stmt = $conn->prepare("SELECT mobile FROM patient_records WHERE mobile LIKE ?");
$searchValue = '%' . $searchValue . '%';
$stmt->bind_param("s", $searchValue);
$stmt->execute();
$result = $stmt->get_result();
$mobileNumbers = array();
while ($row = $result->fetch_assoc()) {
    $mobileNumbers[] = $row['mobile'];
}
header('Content-Type: application/json');
echo json_encode($mobileNumbers);
$stmt->close();
$conn->close();
?>
