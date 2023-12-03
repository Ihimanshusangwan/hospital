<?php
include("../admin/connect.php");
$searchValue = $_POST['search'];

$stmt = $conn->prepare("SELECT name, mobile, MIN(id) 
FROM patient_records 
WHERE mobile LIKE ? 
GROUP BY name, mobile;
");
$searchValue = '%' . $searchValue . '%';
$stmt->bind_param("s", $searchValue);
$stmt->execute();
$result = $stmt->get_result();
$mobileData = array();
$id = array();  // Adding an array to store patient IDs
$name = array();  // Adding an array to store patient IDs
while ($row = $result->fetch_assoc()) {
    $mobileData[] = $row['mobile'];
    $id[] = $row['MIN(id)'];
    $name[] = $row['name'];
}
$data = array('mobileNumbers' => $mobileData, 'ids' => $id, 'names' => $name);  // Return mobile numbers and IDs
header('Content-Type: application/json');
echo json_encode($data);
$stmt->close();
$conn->close();
?>
