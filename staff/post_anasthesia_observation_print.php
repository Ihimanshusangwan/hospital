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
$sql3 = "SELECT * FROM `ana`  WHERE id = '$id';";
$data3 = $conn->query($sql3);
$ana1 = $data3->fetch_assoc();
$ana = explode("&", $ana1['ana']);
$inv = explode("&", $ana1['inv']);
$icu = explode("&", $ana1['icu']);
$pat = explode("&", $ana1['pat']);
$dis = explode("&", $ana1['dis']);
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
        <a href="postAnaesthesiaObservation.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Post Anasthesia Observation</h3>
    <?php include_once("../header/header.php") ?>
    <hr />
    <div class="row">
                            <div class="col-12">
                               <strong>1. O2 Therapy : </strong>"<?php echo $ana[0]; ?>" <strong> L/min for </strong> "<?php  echo $ana[1]; ?> " <strong> hrs </strong>
                            </div>
                            <div class="col-12">
                            <strong>2.Prescribed :</strong>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Analgesics</th>
                        <th scope="col">Anti emetics</th>
                        <th scope="col">Epidural Infusion</th>
                        <th scope="col">IV Fluids</th>
                        <th scope="col">Blood Products</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php  echo $ana[2]; ?></td>
                        <td><?php  echo $ana[3]; ?></td>
                        <td><?php  echo $ana[4]; ?></td>
                        <td><?php  echo $ana[5]; ?></td>
                        <td><?php  echo $ana[6]; ?></td>
                    </tr>
                </tbody>
            </table>
                            </div>
                            <div class="col-12">
                            <strong>3.Investigations :</strong>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Blood Glucose</th>
                        <th scope="col">Hb</th>
                        <th scope="col">ECG</th>
                        <th scope="col">CXR</th>
                        <th scope="col">Others</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php  echo $inv[0]; ?></td>
                        <td><?php  echo $inv[1]; ?></td>
                        <td><?php  echo $inv[2]; ?></td>
                        <td><?php  echo $inv[3]; ?></td>
                        <td><?php  echo $inv[4]; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <strong>4.Watch out for :</strong>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Airway Obstructions</th>
                        <th scope="col">Inadequate Respiration</th>
                        <th scope="col">Excessive bleeding</th>
                        <th scope="col">Arrythmias</th>
                        <th scope="col">Others</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php  echo $inv[5]; ?></td>
                        <td><?php  echo $inv[6]; ?></td>
                        <td><?php  echo $inv[7]; ?></td>
                        <td><?php  echo $inv[8]; ?></td>
                        <td><?php  echo $inv[9]; ?></td>
                    </tr>
                </tbody>
            </table>
                            </div>
                            <div class="col-12">
            <strong>5.ICU Care :</strong>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Monitoring</th>
                        <th scope="col">Sedation/Ventilation</th>
                        <th scope="col">Muscle Relaxation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php  echo $icu[0]; ?></td>
                        <td><?php  echo $icu[1]; ?></td>
                        <td><?php  echo $icu[2]; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
                            <div class="col-12">
                               <strong>6.Oral Feeds From</strong><?php  echo $icu[3]; ?>
                            </div>
                            <div class="col-12">
                               <strong> 7.Recovery Observation
                        chart: </strong><?php  echo $icu[4]; ?>
                            </div>
                            <div class="col-12">
                            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Patient Sign</th>
                        <th scope="col"></th>
                        <th scope="col">Expected Score</th>
                        <th scope="col">Achieved Score</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">Consciousness</th>
                        <td>Awake. responds easily, Alert & Oriented x 3 (or returned to baseline)</td>
                        <td>3</td>
                        <td> <?php  echo $pat[0]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Responds readily, but easily falls asleep</td>
                        <td>2</td>
                        <td> <?php  echo $pat[1]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Arousable, but not readily</td>
                        <td>1</td>
                        <td> <?php  echo $pat[2]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Not responding</td>
                        <td>0</td>
                        <td> <?php  echo $pat[3]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Respiratory</th>
                        <td>Breathes easily with adequate volume</td>
                        <td>3</td>
                        <td> <?php  echo $pat[4]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Slightly decreased rate and/or volume</td>
                        <td>2</td>
                        <td> <?php  echo $pat[5]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Labored or limited respiration</td>
                        <td>1</td>
                        <td> <?php  echo $pat[6]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Apnea or inadequate ventilation</td>
                        <td>0</td>
                        <td> <?php  echo $pat[7]; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Circulatory</th>
                        <td>BP and pulse approaching baseline limits</td>
                        <td>2</td>
                        <td> <?php  echo $pat[8]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Abnormally high or low BP and/or abnormally fast or slow pulse</td>
                        <td>1</td>
                        <td> <?php  echo $pat[9]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Able to move extremities voluntarily or on command (or returned to 2
                            baseline)</td>
                        <td>0</td>
                        <td> <?php  echo $pat[10]; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Activity</th>
                        <td>Able to move extremities voluntarily or on command (or returned to 2
                            baseline)</td>
                        <td>2</td>
                        <td>  <?php  echo $pat[11]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Voluntary movement - non purposeful</td>
                        <td>1</td>
                        <td> <?php  echo $pat[12]; ?></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Unable to lift head or move extremities</td>
                        <td>0</td>
                        <td> <?php  echo $pat[13]; ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Total Score</th>
                        <td>Maximum Score should be 10 to shift from recovery</td>
                        <td> <?php  echo $pat[14]; ?></td>
                        <td> <?php  echo $pat[15]; ?></td>
                    </tr>
                </tbody>
            </table>
                            </div>
                            <div class="col-6">
                               <strong>Discharge To: </strong><?php  echo $ana1['dis1']; ?>
                            </div>
                            <div class="col-6">
                               <strong>Time :</strong><?php  echo $dis[0]; ?>
                            </div>
                            <div class="col-6">
                               <strong>Conscious and oriented: </strong><?php   echo $dis[1]; ?>
                            </div>
                            <div class="col-6">
                               <strong>Mild or no pain :</strong><?php  echo $dis[2];  ?>
                            </div>
                            <div class="col-6">
                               <strong>Spinal Wearing off: </strong><?php   echo $dis[3]; ?>
                            </div>
                            <div class="col-6">
                               <strong>Vitals Stable :</strong><?php  echo $dis[4];  ?>
                            </div>
                            <div class="col-12">
                            <table class="table table-bordered mt-4">
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
                    <th scope="row">Anaesthetist</th>
                    <td><?php  echo $dis[5]; ?></td>
                    <td><?php  echo $dis[6]; ?></td>
                    <td><?php  echo $dis[7]; ?></td>
                    <td><?php  echo $dis[8]; ?></td>
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