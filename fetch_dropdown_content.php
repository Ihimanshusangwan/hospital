<?php
include("admin/connect.php");

$inputValue = $_GET['input'];
$columnName = $_GET['column'];
$tableName = $_GET['table'];

$query = "SELECT DISTINCT $columnName FROM $tableName WHERE $columnName  LIKE '%$inputValue%' ;";
$result = $conn->query($query);
$results = array();

if ($result) {
    // Fetch the results into an array
    while ($row = $result->fetch_assoc()) {
        $results[] = $row[$columnName];
    }
}

// Return the results as a JSON response
header('Content-Type: application/json');
echo json_encode($results);
?>
