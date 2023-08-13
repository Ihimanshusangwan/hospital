<?php
$id = $_GET['id'];
require("../admin/connect.php");
$k1_1 = $_POST["k1_1"];
$k1_2 = $_POST["k1_2"];
$k2_1 = $_POST["k2_1"];
$k2_2 = $_POST["k2_2"];
$avg_1 = $_POST["avg_1"];
$avg_2 = $_POST["avg_2"];
$axl_1 = $_POST["axl_1"];
$axl_2 = $_POST["axl_2"];
$acd_1 = $_POST["acd_1"];
$acd_2 = $_POST["acd_2"];
$aconst_1 = $_POST["aconst_1"];
$aconst_2 = $_POST["aconst_2"];
$formula_1 = $_POST["formula_1"];
$formula_2 = $_POST["formula_2"];
$iol_1 = $_POST["iol_1"];
$iol_2 = $_POST["iol_2"];

$sql = "UPDATE `opto_ascan`
        SET 
            `k1_1` = '$k1_1',
            `k1_2` = '$k1_2',
            `k2_1` = '$k2_1',
            `k2_2` = '$k2_2',
            `avg_1` = '$avg_1',
            `avg_2` = '$avg_2',
            `axl_1` = '$axl_1',
            `axl_2` = '$axl_2',
            `acd_1` = '$acd_1',
            `acd_2` = '$acd_2',
            `aconst_1` = '$aconst_1',
            `aconst_2` = '$aconst_2',
            `formula_1` = '$formula_1',
            `formula_2` = '$formula_2',
            `iol_1` = '$iol_1',
            `iol_2` = '$iol_2'
        WHERE `id` = '$id'";





        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully.";
        } else {
            echo "Error updating data: " . $conn->error;
        }
        $conn->close();


?>