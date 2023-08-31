<?php
require("../admin/connect.php");
$id=$_GET['id'];
$instructionsn=$_POST['instructions'];
$symptoms=$_POST['symptoms'];
$investigation_imaging=$_POST['investigation_imaging'];
$instructions=$_POST['instructions'];
$chief_complaint=$_POST['chief_complaint'];
$examination=$_POST['examination'];
$diagnosis=$_POST['diagnosis'];
$history=$_POST['history'];
$family_history=$_POST['family_history'];
$procedure_done=$_POST['procedure_done'];

$sql="UPDATE `patient_info` SET `diagnosis`='$diagnosis', `examination`='$examination',`history`='$history',
`chief_complaint`='$chief_complaint',`family_history`='$family_history',
`procedure_done`='$procedure_done',`investigation`='$instructions',
`symptoms`='$symptoms',`instructions`='$instructions',`investigation_imaging`='$investigation_imaging'
WHERE `patient_id`='$id'";
$res=$conn->query($sql);
if($res){
    echo "data update sucessfully";
}
else{
    echo "data update unsucessful due to" .$conn->error;
}
?>