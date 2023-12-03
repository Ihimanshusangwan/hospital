<?php
require("../admin/connect.php");

$patientIdToDelete = $_POST['id'];
$deleteReason = $_POST['deleteReason'];
 // Replace with the patient ID you want to delete

    $sql = "update patient_records set is_deleted =1 , delete_reason='$deleteReason' where id = $patientIdToDelete";
    $conn->query($sql);
    

?>