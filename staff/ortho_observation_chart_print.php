<?php
require("../admin/connect.php");
session_start();
$id = $_GET['id'];
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
// select * from opd where p_id = id;
$data = $conn->query($sql);
$res = $data->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$data = $_GET['data'];
$checkboxes = isset($_GET['checkboxes']) ? explode(',', $_GET['checkboxes']) : [];

$values = json_decode(urldecode($data), true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Document</title>
    <style>
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
<<<<<<< HEAD
                size: A4 landscape;
=======
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                margin-top: 0;
            }

            .noprint {
                visibility: hidden;
            }
        }
    </style>
</head>

<body>

    <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
    <a href="ortho_observation_chart.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    <?php include_once("../header/images.php") ?>
<<<<<<< HEAD
    <h3 class="text-center text-dark my-3 ">Observation Chart</h3>
    <?php include_once("../header/header.php") ?>

    <?php if (in_array('Notes', $checkboxes)): ?>
        <div class="card shadow mb-4">
=======
    <h3 class="text-center text-dark ml-3">Observation Chart</h3>
    <?php include_once("../header/header.php") ?>
    
    <?php if (in_array('Notes', $checkboxes)): ?>
        <div class="card  mb-4">
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Notes
                </h6>
            </div>
<<<<<<< HEAD
            <div class="card-body">
                <div class="table-responsive">
=======
            <div>
                <div>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Temp</th>
                            <th>Pulse</th>
                            <th>Resp</th>
                            <th>BP</th>
                            <th>SPO2</th>
                            <th>BSL(R)</th>
                            <th>ORAL</th>
                            <th>INTRAVENOUS</th>
                            <th>URINE</th>
                            <th>ASPIRATE</th>
                            <th>Sign/Initial</th>
                        </tr>
                        <tbody id="tbody">
                            <?php
                            $sql3 = "SELECT * FROM ortho_observe1  WHERE patient_id = $id;";
                            $data3 = $conn->query($sql3);
                            $i = 1;
                            $sr = 1;
                            while ($res = $data3->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $res['time'] . '</td>';
                                echo '<td>' . $res['date'] . '</td>';
                                echo '<td>' . $res['temp'] . '</td>';
                                echo '<td>' . $res['pulse'] . '</td>';
                                echo '<td>' . $res['resp'] . '</td>';
                                echo '<td>' . $res['bp'] . '</td>';
                                echo '<td>' . $res['spo2'] . '</td>';
                                echo '<td>' . $res['bsl'] . '</td>';
                                echo '<td>' . $res['oral'] . '</td>';
                                echo '<td>' . $res['intra'] . '</td>';
                                echo '<td>' . $res['urine'] . '</td>';
                                echo '<td>' . $res['asp'] . '</td>';
                                echo '<td>' . $res['sign'] . '</td>';
                                $i++;
                                $sr++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if (in_array('Drugs', $checkboxes)): ?>
<<<<<<< HEAD
        <div class="card shadow mb-4">
=======
        <div class="card mb-4">
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Drugs
                </h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Sr.No</th>
                            <th>Name of Drug</th>
                            <th>Doses</th>
                            <th>Sign</th>
                        </tr>
                        <tbody id="tbody">
                            <?php
                            $sql4 = "SELECT * FROM ortho_observe2  WHERE patient_id = $id;";
                            $data4 = $conn->query($sql4);
                            $i = 1;
                            $sr = 1;
                            while ($res = $data4->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $sr . '</td>';
                                echo '<td>' . $res['drug'] . '</td>';
                                echo '<td>' . $res['dose'] . '</td>';
                                echo '<td>' . $res['sign'] . '</td>';
                                echo '</tr>';
                                $i++;
                                $sr++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php endif; ?>
    <div class="col-12 my-5">
        <?php if (in_array('IV_Fluids', $checkboxes)): ?>
            <strong>IV Fluids:</strong>
            <?php $sql = "select ortho_fluid from patient_info where patient_id = $id;";
            $res = $conn->query($sql)->fetch_assoc();
            echo $res['ortho_fluid']; ?>
        <?php endif; ?>
    </div>

<<<<<<< HEAD
    <h6>Thank You !</h6>
=======
    <h6 class="text-center mt-4">Thank You !</h6>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
    </div>
</body>
<script> window.print(); </script>

</html>