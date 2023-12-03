<?php
include("../admin/connect.php");

$sql = "SELECT * FROM opd_charges order by id desc;";
$result = $conn->query($sql);

$charges = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $charges[] = $row;
  }
}

$conn->close();

header("Content-Type: application/json");
echo json_encode($charges);
?>
