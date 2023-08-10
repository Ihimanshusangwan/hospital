<?php
include("../admin/connect.php");

// Fetch records from the opd_charges table
$sql = "SELECT * FROM opd_charges order by id desc;";
$result = $conn->query($sql);

$charges = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $charges[] = $row;
  }
}

$conn->close();

// Return the charges as JSON data
header("Content-Type: application/json");
echo json_encode($charges);
?>
