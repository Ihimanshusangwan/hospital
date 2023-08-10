<?php
$id = $_GET['id'];
require("../admin/connect.php");
$complaints = $_POST["complaints"];
$past_his = $_POST["past_his"];
$fees = $_POST["fees"];
$visit_no = $_POST["visit_no"];
$dist_input_1 = $_POST["dist_input_1"];
$dist_input_2 = $_POST["dist_input_2"];
$dist_input_3 = $_POST["dist_input_3"];
$dist_input_4 = $_POST["dist_input_4"];
$dist_input_5 = $_POST["dist_input_5"];
$dist_input_6 = $_POST["dist_input_6"];
$dist_input_7 = $_POST["dist_input_7"];
$dist_input_8 = $_POST["dist_input_8"];
$near_input_1 = $_POST["near_input_1"];
$near_input_2 = $_POST["near_input_2"];
$near_input_3 = $_POST["near_input_3"];
$near_input_4 = $_POST["near_input_4"];
$near_input_5 = $_POST["near_input_5"];
$near_input_6 = $_POST["near_input_6"];
$near_input_7 = $_POST["near_input_7"];
$near_input_8 = $_POST["near_input_8"];
$be_add = $_POST["be_add"];
$re = $_POST["re"];
$le_add = $_POST["le_add"];
$glass_type = $_POST["glass_type"];
$glass_colour = $_POST["glass_colour"];
$glass_use = $_POST["glass_use"];
$pd = $_POST["pd"];
$advice = $_POST["advice"];
$fer = $_POST["fer"];

$sql = "UPDATE cc_glass_rx SET 
fees = '$fees',
visit_no='$visit_no',
dist_input_1 = '$dist_input_1',
dist_input_2 = '$dist_input_2',
dist_input_3 = '$dist_input_3',
dist_input_4 = '$dist_input_4',
dist_input_5 = '$dist_input_5',
dist_input_6 = '$dist_input_6',
dist_input_7 = '$dist_input_7',
dist_input_8 = '$dist_input_8',
near_input_1 = '$near_input_1',
near_input_2 = '$near_input_2',
near_input_3 = '$near_input_3',
near_input_4 = '$near_input_4',
near_input_5 = '$near_input_5',
near_input_6 = '$near_input_6',
near_input_7 = '$near_input_7',
near_input_8 = '$near_input_8',
be_add = '$be_add',
re = '$re',
le_add = '$le_add',
glass_type = '$glass_type',
glass_colour = '$glass_colour',
glass_use = '$glass_use',
pd = '$pd',
advice='$advice',
complaints='$complaints',
past_his='$past_his',
fer='$fer'
WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully.";
        } else {
            echo "Error updating data: " . $conn->error;
        }
        $conn->close();


?>