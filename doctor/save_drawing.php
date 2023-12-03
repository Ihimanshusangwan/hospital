<?php
require("../admin/connect.php");

// Get the drawing data from the POST request
$imageData = $_POST['imageData']; 
$id = $conn->real_escape_string($_POST['id']);

// Check if the row with the provided ID exists
$checkSql = "SELECT id FROM media WHERE id = $id";
$result = $conn->query($checkSql);

if ($result->num_rows > 0) {
    // Row with the given ID exists, update the existing row
    $updateSql = "UPDATE media SET drawing = '$imageData' WHERE id = $id";
    
    if ($conn->query($updateSql) === TRUE) {
        echo "Drawing updated successfully!";
    } else {
        echo "Error updating drawing: " . $conn->error;
    }
} else {
    // Row with the given ID doesn't exist, insert a new row
    $insertSql = "INSERT INTO media (id, drawing) VALUES ($id, '$imageData')";

    if ($conn->query($insertSql) === TRUE) {
        echo "Drawing saved successfully!";
    } else {
        echo "Error inserting drawing: " . $conn->error;
    }
}

$conn->close();
?>
