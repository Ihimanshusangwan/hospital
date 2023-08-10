<?php
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

$sql4=mysqli_query($conn,"SELECT * FROM   `ortho_discharge` WHERE id=$id");
$row4=mysqli_fetch_assoc($sql4);
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
        <a href="ortho_discharge.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Discharge Card </h3>
    <?php include_once("../header/header.php") ?>
    <hr />
   <div class="row">
    <div class="col-4">
        <strong>MLC No.: </strong> <?php echo $row4['mlc']; ?>
    </div>
    <div class="col-4">
        <strong>Department : </strong> <?php echo $row4['department']; ?>
    </div>
    <div class="col-4">
        <strong>Religion : </strong> <?php echo $row4['occupation']; ?>
    </div>
    <div class="col-4">
        <strong>Occupation : </strong> <?php echo $row4['religion']; ?>
    </div>
    <div class="col-8">
        <strong>Date & Time of Admission : : </strong> <?php echo $res2['date']." ".$res2['time']; ?>
    </div>
    <div class="col-6">
        <strong>Date of Surgery/Procedure : </strong> <?php echo $row4['dateofs']; ?>
    </div>
    <div class="col-6">
        <strong>Time of Surgery/Procedure : </strong> <?php echo $row4['timeofs'];?>
    </div>
    <div class="col-6">
        <strong>Date of Discharge : </strong> <?php echo $row4['dateofd']; ?>
    </div>
    <div class="col-6">
        <strong>Time of Discharge : </strong> <?php echo $row4['timeofd'];?>
    </div>
    <div class="col-6">
        <strong>Primary Treating Consultant : </strong> <?php echo $row4['ptc']; ?>
    </div>
    <div class="col-6">
        <strong>Type of Discharge :</strong> <?php echo $row4['typeofd'];?>
    </div>
    <div class="col-12">
        <strong>Diagnosis: </strong> <?php echo $row4['diagnosis'];?>
    </div>
    <div class="col-12">
        <strong>ICD Code : </strong> <?php echo $row4['icd'];?>
    </div>
    <div class="col-12">
        <strong>Follow Up : </strong> <?php echo $row4['followup'];?>
    </div>
    <div class="col-6">
        <strong>Date : </strong> <?php echo $row4['date0'];?>
    </div>
    <div class="col-6">
        <strong>Signature , Name & Stamp: </strong> <?php echo $row4['sign'];?>
    </div>
    <div class="col-12 mt-3 text-center border border-black">
                    <h4 class="form-label m-4" > PLEASE BRING THIS CARD DURING FOLLOW UP</h4>
                    </div></div>
   </div>
    <h6>Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>