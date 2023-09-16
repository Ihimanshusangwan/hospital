<?php
require("../admin/connect.php");

$patientIdToDelete = $_POST['id'];
 // Replace with the patient ID you want to delete

    $sql = "update patient_records set is_deleted =1 where id = $patientIdToDelete";
    $conn->query($sql);
    

?>