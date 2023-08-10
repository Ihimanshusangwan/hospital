<?php
$id = $_GET['id'];
require("../admin/connect.php");
$surgery_advice = $_POST["surgery_advice"];
$surgery_plan_date = $_POST["surgery_plan_date"];
$surgery_status = $_POST["surgery_status"];
$surgery_re = $_POST["surgery_re"];
$surgery_le = $_POST["surgery_le"];
$lens = $_POST["lens"];
$power = $_POST["power"];
$batch = $_POST["batch"];
$other_1 = $_POST["other_1"];
$other_2 = $_POST["other_2"];
$final_diagonsis = $_POST["final_diagonsis"];
$condition_discharge = $_POST["condition_discharge"];
$admission_date = $_POST["admission_date"];
$admission_time = $_POST["admission_time"];
$surgery_date = $_POST["surgery_date"];
$surgery_time = $_POST["surgery_time"];
$discharge_date = $_POST["discharge_date"];
$discharge_time = $_POST["discharge_time"];
$notes = $_POST["notes"];

$sql = "UPDATE `opto_surgery` SET 
`surgery_advice`='$surgery_advice',
`surgery_plan_date`='$surgery_plan_date',
`surgery_status`='$surgery_status',
`surgery_re`='$surgery_re',
`surgery_le`='$surgery_le',
`lens`='$lens',
`power`='$power',
`batch`='$batch',
`other_1`='$other_1',
`other_2`='$other_2',
`final_diagonsis`='$final_diagonsis',
`condition_discharge`='$condition_discharge',
`admission_date`='$admission_date',
`admission_time`='$admission_time',
`surgery_date`='$surgery_date',
`surgery_time`='$surgery_time',
`discharge_date`='$discharge_date',
`discharge_time`='$discharge_time',
`notes`='$notes'
WHERE `id`='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully.";
        } else {
            echo "Error updating data: " . $conn->error;
        }
        $conn->close();


?>