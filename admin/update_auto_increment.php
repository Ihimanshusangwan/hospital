<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startValue = $_POST['start_value'];

    require("connect.php");

    $sql = "ALTER TABLE patient_records AUTO_INCREMENT = $startValue";
    if ($conn->query($sql) === TRUE) {
        $response = "Auto-increment start value updated successfully.";
    } else {
        $response = "Error updating auto-increment start value: " . $conn->error;
    }
    $conn->close();
    echo $response;
}
?>
