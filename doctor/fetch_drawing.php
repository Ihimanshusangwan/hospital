<?php
require("../admin/connect.php");

$id = $conn->real_escape_string($_GET['id']); // Assuming you pass the id as a GET parameter

// Fetch the drawing data based on the provided id
$sql = "SELECT drawing FROM media WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['drawing']; // Output the drawing data
} else {
    echo "No drawing found for the provided ID.";
}

$conn->close();
?>
