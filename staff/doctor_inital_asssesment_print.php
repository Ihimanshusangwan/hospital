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

$sql = "SELECT * FROM `doctor_initail_assesment` WHERE `id` = '$id' ";
$data = $conn->query($sql);
$result = $data->fetch_assoc();


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

    .btr {
        border-top: 1px solid black;
        border-right: 1px solid black;
    }

    .bl {
        border-left: 1px solid black;

    }

    .bb {
        border-bottom: 1px solid black;
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
        <a href="doctor_inital_asssesment.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Doctor Inital Assesment</h3>

    <?php include_once("../header/header.php") ?>
    <div class="row mt-2">
        <div class="col-6">
            <strong class="form-label">Contact No:</strong>
            <?php echo $result['contact_no']; ?>
        </div>
        <div class="col-6">
            <strong class="form-label">Address:</strong>
            <?php echo $result['address']; ?>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <strong class="form-label">MLC Number:</strong>
            <?php echo $result['omlic_number']; ?>
        </div>
        <div class="col-6">
            <strong class="form-label">Reimbursement:</strong>
            <?php echo $result['reimbursement']; ?>
        </div>

    </div>
    <div class="row mt-2">
        <div class="col-6">
            <strong class="form-label">Discharge:</strong>
            <?php echo $result['discharge']; ?>
        </div>
        <div class="col-6">
            <strong class="form-label">Weight:</strong>
            <?php echo $result['weight']; ?>
        </div>


    </div>

    <div class="row mt-2 ">
        <div class="col-6">
            <strong>Incharge Doctor</strong>
            <?php echo $result['incharge_doctor']; ?>
        </div>
        <div class="col-6">
            <strong>Provisional Diagnosis</strong>
            <?php echo $result['provisional_diagnosis']; ?>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <strong>Date:</strong>
            <?php echo $result['date']; ?>
        </div>
        <div class="col-6">
            <strong>Time:</strong>
            <?php echo $result['time']; ?>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <strong>Presenting Complaint:</strong>
            <?php echo $result['presenting-complaint']; ?>
        </div>
        <div class="col-6">
            <strong>Duration:</strong>
            <?php echo $result['duration']; ?>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <strong>History (Past/Present):</strong>
            <?php echo $result['history']; ?>
        </div>
        <div class="col-6">
            <strong>Obstetric H<sub>x</sub>:</strong>
            <?php echo $result['obstetric-history']; ?>
        </div>
    </div>

    <div class="row m-1">
        <div class="col-3 bb bl btr">
            <strong>menarche:</strong>
            <?php echo $result['menarche']; ?>
        </div>
        <div class="col-3 bb btr">
            <strong>LMP:</strong>
            <?php echo $result['LMP']; ?>
        </div>
        <div class="col-3 bb btr">
            <strong>Para:</strong>
            <?php echo $result['Para']; ?>
        </div>
        <div class="col-3 bb btr">
            <strong>Gavida:</strong>
            <?php echo $result['Gavdia']; ?>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <strong>Allergies:</strong>
            <?php echo $result['allergies']; ?>
        </div>
        <div class="col-6">
            <strong>Family History:</strong>
            <?php echo $result['family-history']; ?>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <strong>Previous Operations/Accidents:</strong>
            <?php echo $result['operation-accidents']; ?>
        </div>
        <div class="col-6">
            <strong>Education Status:</strong>
            <?php echo $result['education-status']; ?>
        </div>
    </div>

    <div class="row mt-2 mx-3">
        <div class="col-4  bl bb btr">
            <strong>Build:</strong>
            <?php echo $result['build']; ?>
        </div>
        <div class="col-4 bb btr">
            <strong>Pulse:</strong>
            <?php echo $result['pulse']; ?>
        </div>
        <div class="col-4 bb btr">
            <strong>Anemia:</strong>
            <?php echo $result['anemia']; ?>
        </div>
    </div>

    <div class="row mt-2 mx-2">
        <div class="col-3 bl bb btr">
            <strong>Edema:</strong>
            <?php echo $result['edema']; ?>
        </div>
        <div class="col-3 bb btr">
            <strong>BP:</strong>
            <?php echo $result['bp']; ?>
        </div>
        <div class="col-3 bb btr">
            <strong>TH:</strong>
            <?php echo $result['th']; ?>
        </div>
        <div class="col-3 bb btr">
            <strong>Cyanosis:</strong>
            <?php echo $result['cyanosis']; ?>
        </div>
    </div>

    <div class="row mx-2">
        <div class="col-3 bl bb btr">
            <strong>RR:</strong>
            <?php echo $result['rr']; ?>
        </div>
        <div class="col-3 bb btr">
            <strong>Weight:</strong>
            <?php echo $result['weight1']; ?>
        </div>
        <div class="col-3 bb btr">
            <strong>JVP:</strong>
            <?php echo $result['jvp']; ?>
        </div>
        <div class="col-3 bb btr">
            <strong>Skin:</strong>
            <?php echo $result['skin']; ?>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-3 bl bb btr">
            <strong for="">RS</strong>
            <?php echo $result['rs'] ?>
        </div>
        <div class="col-3 bb btr">
            <strong for="">CVS</strong>
            <?php echo  $result['cvs'] ?>
        </div>
        <div class="col-3 bb btr">
            <strong for="">CNS</strong>
            <?php echo $result['cns']  ?>
        </div>
        <div class="col-3 bb btr">
            <strong for="">PA</strong>
            <?php echo  $result['pa'] ?>

        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <strong>Provisional Diagnosis:</strong>
            <?php echo $result['provisional-diagnosis1']; ?>
        </div>
        <div class="col-12">
            <strong>Differential Diagnosis:</strong>
            <?php echo $result['differential-diagnosis1']; ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-6">
            <strong>Name:</strong>
            <?php echo $result['submit_name']; ?>
        </div>
    </div>


    <h4 class="mt-3 text-center">Thank You !</h4>
</body>
<script>
window.print();
</script>

</html>