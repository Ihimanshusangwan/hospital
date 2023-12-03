<?php
error_reporting(0);
$id = $_GET['id'];
require("../admin/connect.php");
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

$sql = "select * from gynec_discharge where id=$id";
$result = $conn->query($sql)->fetch_assoc();
$data = json_decode($result['data'], true);

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
.mat-12{
    margin-top:300px;
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
        <a href="gynec_discharge.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Discharge Card </h3>
    <?php include_once("../header/header.php") ?>
    <hr />
    <div class="row">
        <div class="col-6">
            <strong>Name of Consultant: </strong> <?php echo  $res['consultant']; ?>
        </div>
        <div class="col-6">
            <strong>Date of Admission :</strong> <?php echo $res2['date']; ?>
        </div>
        <div class="col-6"> <strong>Time of Admission :</strong><?php echo$res2['time'];?>
        </div>
        <div class="col-6">
            <strong>Date of Discharge : </strong> <?php echo $data['1']; ?>
        </div>
        <div class="col-6">
            <strong>Time of Discharge : </strong> <?php echo $data['2'];?>
        </div>
        <div class="col-12">
            <strong>Diagnosis: </strong> <?php echo  $data['3'];?>
        </div>
        <div class="col-12">
            <strong>Clinical Findings and Treatment During Admission : </strong> <?php echo $data['4'];?>
        </div>
        <div class="col-12">
            <strong>Operative Notes: </strong> <?php echo $data['5'];?>
        </div>
        <div class="col-12">
            <strong>Investigations: : </strong> <?php echo $data['6'];?>
        </div>
        <div class="col-12">
            <strong>Treatment Given:</strong> <?php echo  $data['7'];?>
        </div>
        <div class="col-12">
            <strong>Course in ward:</strong> <?php echo  $data['8'];?>
        </div>
        <div class="col-12">
            <strong>Treatment on Discharge:</strong> <?php echo  $data['9'];?>
        </div>
        <div class="col-12">
            <strong>Follow Up:</strong> <?php echo  $data['10'];?>
        </div>
        <div class="mat-12"></div>
        <div class="col-12 mt-3  border border-black">
            <h5 class="form-label  text-center m-3"> PLEASE BRING THIS CARD DURING FOLLOW UP</h5>
        </div>
    </div>
    </div>
    <h6 class="text-center">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>