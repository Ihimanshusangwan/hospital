<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

$sql4=mysqli_query($conn,"SELECT * FROM pre_room_urinary WHERE id=$id;");
$row4=mysqli_fetch_assoc($sql4);

if($row4){
    $c_de =  json_decode($row4['c'], true);
    $detail_room_de=json_decode($row4['detail_room'],true);
}
   
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style>
        body {
            margin: 0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        @media print {

            #button {
                display: none !important;
            }

            @page {
                size: A4;
            }

            .noprint {
                visibility: hidden;
            }
        }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="room_check.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Room Checklist</h3>
    <?php include_once("../header/header.php") ?>
    <table class="table table-bordered border-black table-hover text-center">

<tr>
    <th></th>
    <th>Admission</th>
    <th> Discharge</th>
    <th></th>
</tr>

<?php
$tableHeaders = array(
'Consent Record',
'IV Stand',
'Stool',
'Urine Pot',
'Latrine Pot',
'Mirror',
'Mug',
'Bucket',
'Bulb',
'Tap',
'Remotes',
'Side Locker',
'Door Mat',
'',
'Done By'
);

for ($i = 0; $i < 15; $i++) {
echo '<tr>';
echo '<th>' . $tableHeaders[$i] . '</th>';
for ($j = 0; $j < 2; $j++) {

echo '<td>'.$c_de[$i][$j] .'</td>';
if($i==0 && $j==1){
echo '<td><strong>Hospital Bill :</strong></td>';
}
if($i==3 && $j==1){
echo '<td><strong>Medical Bill :</strong></td>';
} 
if($i==6 && $j==1){
echo '<td><strong>Discharge Card :</strong></td>';
}
if($i==9 && $j==1){
echo '<td rowspan="2"><strong>Patient Explanation :</strong></td>';
}
if($i==13 && $j==1){
echo '<td><strong> ISO Forms :</strong></td>';
}
if($i==1 && $j==1){
echo '<td>   '.$detail_room_de[3].' </td>';
}
if($i==2 && $j==1 ){
echo '<td>     '.$detail_room_de[4].' </td>';
}
if($i==4 && $j==1 ){
echo '<td>     '.$detail_room_de[5].' </td>';
}            
if($i==5  && $j==1){
echo '<td>     '.$detail_room_de[6].' </td>';
}                
if($i==7 && $j==1){
echo '<td>     '.$detail_room_de[7].' </td>';
}              
if($i==8  && $j==1){
echo '<td>     '.$detail_room_de[8].' </td>';
}              
if($i==11 && $j==1){
echo '<td>    '.$detail_room_de[9].' </td>';
}          
if($i==12 && $j==1){
echo '<td>     '.$detail_room_de[10].' </td>';
}
if($i==14 && $j==1){
echo '<td>     '.$detail_room_de[2].' </td>';
}
}



echo '</tr>';
}
?>


</table>
<br>
<table class="table table-bordered border-black table-hover text-center">
<tr>
    <th colspan="5">Services</th>
</tr>
<?php
$tableHeaders = array(
'ECG',
'Nebulisation',
'Monitor',
'GLucometer',
'Physio',
'Medicines',
'Dressings',
'X-Ray',
'NST'
);

for ($i = 0; $i < 9; $i++) {
echo '<tr>';
echo '<th>' . $tableHeaders[$i] . '</th>';
for ($j = 0; $j < 2; $j++) {
echo '<td>  '.$c_de[$i+15][$j].' </td>';
}

echo '</tr>';
}
?>


</table>

    <h6 class="mt-2" >Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>