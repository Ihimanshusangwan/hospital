<?php
include("admin/connect.php");

// Get the JSON data sent from the JavaScript
$jsonData = file_get_contents('php://input');
$searchData = json_decode($jsonData);

$searchName = $searchData->name;
$searchMobile = $searchData->mobile;

$query = "SELECT * FROM patient_records WHERE name LIKE '%$searchName%' AND mobile = '$searchMobile'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $searchResult = $result->fetch_assoc();

    // Set the response content type to JSON
    header('Content-Type: application/json');

    // Return the search result as JSON
    echo json_encode($searchResult);
} else {
    // Set the response content type to JSON
    header('Content-Type: application/json');

    // Return an error message as JSON
    echo json_encode(['error' => 'No matching records found']);
}

$conn->close();
?>