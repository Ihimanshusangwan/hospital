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
session_start();
$sql3 = "SELECT * FROM op WHERE id = '$id';";
$data3 = $conn->query($sql3);
$op1 = $data3->fetch_assoc();
$name = explode("&", $op1['name']);
$op = explode("&", $op1['op']);
$sur = explode("&", $op1['sur']);
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
        body{
            margin:0;
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
        <a href="on-notes.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Operative Notes by Surgeon</h3>
    <?php include_once("../header/header.php") ?>
    <hr />
    <div class="row">
                            <div class="col-12">
                               <strong> Name of Surgeon: </strong><?php  echo $name[0]; ?>
                            </div>
                            <div class="col-7">
                               <strong> Name of Anaesthesist : </strong><?php echo $name[1];?>
                            </div>
                            <div class="col-5">
                               <strong> Type of Anaesthesist: </strong><?php  echo $name[2]; ?>
                            </div>
                            <div class="col-6">
                               <strong> Operation Started Date :</strong><?php  echo $name[3]; ?>
                            </div>
                            <div class="col-6">
                               <strong> Operation Started Time :</strong><?php  echo $name[4]; ?>
                            </div>
                            <div class="col-6">
                               <strong> Operation Ended Date :</strong><?php  echo $name[5]; ?>
                            </div>
                            <div class="col-6">
                               <strong> Operation Ended Time :</strong><?php  echo $name[6]; ?>
                            </div>
                            <div class="col-4 mt-2">
                               <strong> Name of OT Assistant :</strong><?php  echo $op[0]; ?>
                            </div>
                            <div class="col-4 mt-2">
                               <strong>Scrb Nurse :</strong><?php  echo $op[1]; ?>
                            </div>
                            <div class="col-4 mt-2">
                               <strong>Circulating Nurse / HCA:</strong><?php  echo $op[2]; ?>
                            </div>
                            <div class="col-12 mt-2">
                               <strong>Pre-operative Diagnosis : </strong><?php  echo $op[3]; ?>
                            </div>
                            <div class="col-12 ">
                               <strong>Post-operative Diagnosis : </strong><?php  echo $op[4]; ?>
                            </div>
                            <div class="col-12 mt-2">
                               <strong>Operative Notes :</strong><?php  echo $op[5]; ?>
                            </div>
                            <div class="col-12 mb-2">
                               <strong>Post Operative Plan of care:</strong><?php  echo $op[6]; ?>
                            </div>
                            <div class="col-12 table-responsive">
                            <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Signature</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Surgeon</th>
                                <td> <?php echo $sur[0]; ?></td>
                                <td><?php echo $sur[1]; ?></td>
                                <td><?php echo $sur[2]; ?></td>
                                <td><?php echo $sur[3]; ?></td>

                            </tr>
                        </tbody>
                    </table>


                            </div>
                            
    </div>
    <h6>Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>