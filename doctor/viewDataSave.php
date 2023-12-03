<?php
// Handle data from both forms
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function removeExtraSpaces($str)
    {
        return preg_replace('/\s{2,}/', ' ', $str);
    } 
    require("../admin/connect.php");
    $id = $_POST["id"];
    $is_viewed = false;
    $i = 1;
    while (isset($_POST["med_name_$i"])) {
        if ($_POST["med_name_$i"] !== "") {
            $med_name = filter_var($_POST["med_name_$i"], FILTER_SANITIZE_STRING);
            $quantity = $_POST["quantity_$i"];
            $morning = $_POST["morning_$i"];
            $afternoon = $_POST["afternoon_$i"];
            $night = $_POST["night_$i"];
            $type = $_POST["type_$i"];
            $eat = (isset($_POST["eat_$i"])) ? $_POST["eat_$i"] : "";
            $days = $_POST["days_$i"];
            $sql = "INSERT INTO prescription (patient_id,med_name,quantity,morning,afternoon,night,days,eat,type) VALUES ($id,'$med_name','$quantity','$morning','$afternoon','$night','$days','$eat','$type');";
            if ($conn->query($sql) === TRUE) {
                $i++;
            } else {
                echo "<div class='alert alert-danger'>Error Updating Prescription</div>";
            }
            if ($is_viewed == false) {
                $sql = "update patient_records set is_viewed = 1 where id =$id;";
                $conn->query($sql);
                $is_viewed = true;
            }
        } else {
            $i++;
        }
    }
}
$complaints = filter_var($_REQUEST["complaints"], FILTER_SANITIZE_STRING);
$sql = "UPDATE patient_info SET chief_complaint='$complaints' WHERE patient_id=$id;";
if ($conn->query($sql) === TRUE) {
} else {
    echo "<div class='alert alert-danger'>Error Updating Complaints</div>";
}
$history = removeExtraSpaces($_REQUEST['history']);
$sql = "UPDATE patient_info SET history = '$history' WHERE patient_id = $id;";
if ($conn->query($sql) === TRUE) {
} else {
    echo "<div class='alert alert-danger'>Error Updating History</div>";
}
$history = removeExtraSpaces($_REQUEST['personal_history']);
$sql = "UPDATE patient_info SET personal_history = '$history' WHERE patient_id = $id;";
if ($conn->query($sql) === TRUE) {
} else {
    echo "<div class='alert alert-danger'>Error Updating History</div>";
}
$familyHistory = removeExtraSpaces($_REQUEST['family_history']);
$sql = "UPDATE patient_info SET family_history = '$familyHistory' WHERE patient_id = $id;";
if ($conn->query($sql) === TRUE) {
} else {
    echo "<div class='alert alert-danger'>Error Updating Family History</div>";
}
$procedureDone = removeExtraSpaces($_REQUEST['procedure_done']);
$sql = "UPDATE patient_info SET procedure_done = '$procedureDone' WHERE patient_id = $id;";
if ($conn->query($sql) === TRUE) {
} else {
    echo "<div class='alert alert-danger'>Error Updating Operative Procedure Done</div>";
}
$history = removeExtraSpaces($_REQUEST['medical_history']);
$sql = "UPDATE patient_info SET medical_history = '$history' WHERE patient_id = $id;";
if ($conn->query($sql) === TRUE) {
} else {
    echo "<div class='alert alert-danger'>Error Updating History</div>";
}
$examination = removeExtraSpaces($_REQUEST['examination']);
$sql = "UPDATE patient_info SET examination = '$examination' WHERE patient_id = $id;";
if ($conn->query($sql) === TRUE) {
} else {
    echo "<div class='alert alert-danger'>Error Updating examination</div>";
}
$investigation = removeExtraSpaces($_REQUEST['investigation']);
$sql = "UPDATE patient_info SET investigation = '$investigation' WHERE patient_id = $id;";
if ($conn->query($sql) === TRUE) {
} else {
    echo "<div class='alert alert-danger'>Error Updating Investigation</div>";
}
$investigation = removeExtraSpaces($_REQUEST['investigation_imaging']);
$sql = "UPDATE patient_info SET investigation_imaging = '$investigation' WHERE patient_id = $id;";
if ($conn->query($sql) === TRUE) {
} else {
    echo "<div class='alert alert-danger'>Error Updating Investigation Imaging</div>";
}
$symptoms = filter_var($_REQUEST["symptoms"], FILTER_SANITIZE_STRING);
$sql = "UPDATE patient_info SET symptoms='$symptoms' WHERE patient_id=$id;";
if ($conn->query($sql) === TRUE) {

} else {
    echo "<div class='alert alert-danger'>Error Updating Symptoms</div>";
}
$instructions = filter_var($_POST["instructions"], FILTER_SANITIZE_STRING);
$sql = "UPDATE patient_info SET instructions='$instructions' WHERE patient_id=$id; ";
if ($conn->query($sql) === TRUE) {

} else {
    echo "<div class='alert alert-danger'>Error Updating Instructions</div>";
}
$diagnosis = removeExtraSpaces($_REQUEST['diagnosis']);
$sql = "UPDATE patient_info SET diagnosis = '$diagnosis' WHERE patient_id = $id;";
if ($conn->query($sql) === TRUE) {
} else {
    echo "<div class='alert alert-danger'>Error Updating Diagnosis</div>";
}
echo "<div class='alert alert-success'> Updated Successfully</div>";


?>