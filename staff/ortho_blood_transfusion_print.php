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
$sql3 = "SELECT * FROM `blood`  WHERE id = '$id';";
$data3 = $conn->query($sql3);
$blood = $data3->fetch_assoc();
$dr = explode("&", $blood['dr']);
$nur = explode("&", $blood['nur']);
$blooa = explode("&", $blood['blooa']);
$bloob = explode("&", $blood['bloob']);

$newValue = json_decode($blood['new'],true);

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
        <a href="bloodTransfusion.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Blood Transfusion</h3>
    <?php include_once("../header/header.php") ?>
    <hr />
    <div class="row">
        <div class="col-12"><strong>Blood Transfusion order by:</strong></div>
    </div>
    <div class="row mt-4">
        <div class="col-6">
            <strong>Dr : </strong>
            <?php echo $dr[0]; ?>
        </div>
        <div class="col-6">
            <strong>Cross matched </strong>
            <?php echo $blood['cros']; ?>
        </div>
        <div class="col-6">
            <strong>Bloodgroup of Patient:</strong>
            <?php echo $dr[1]; ?>
        </div>
        <div class="col-6">
            <label class="form-label">(If No: reason)</strong>
                <?php echo $dr[2]; ?>
        </div>
    </div>

    <div class="row ">
        <h6 class=" col-12 mt-4 fl"><strong>Type:</strong></h6>
        <table class=" col-12 table table-bordered">
            <thead>
                <tr>
                    <th scope="col">WB</th>
                    <td scope="col"><?php echo $newValue['1']; ?></td>
                    <th scope="col">PRP</th>
                    <td scope="col"><?php echo $newValue['2']; ?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>PRC</th>
                    <td scope="row"><?php echo $newValue['3']; ?></td>
                    <th>Crypt</th>
                    <td><?php echo $newValue['4']; ?></td>
                </tr>
                <tr>
                    <th>FFP</th>
                    <td scope="row"><?php echo $newValue['5']; ?></td>
                    <th>Plasma</th>
                    <td><?php echo $newValue['6']; ?></td>
                </tr>
                <tr>
                    <th>PLT</th>
                    <td scope="row"><?php echo $newValue['7']; ?></td>
                    <th>Other</th>
                    <td><?php echo $newValue['8']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12">
            <strong>Fluid Volume Infused: </strong> <?php echo $dr[3]; ?>
        </div>
        <div class="col-12">
            <strong>Blood bag details checked & B.T. Started by Dr : </strong><?php echo $dr[4]; ?>
        </div>
    </div>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Started At</th>
                <td>
                    <?php echo $dr[5]; ?>
                </td>
                <td>
                    <?php echo $dr[6]; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">Completed At</th>
                <td>
                    <?php echo $dr[7]; ?>
                </td>
                <td>
                    <?php echo $dr[8]; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th scope="col">Frequency of Monitoring</th>
                <th scope="col">Time</th>
                <th scope="col">Temp</th>
                <th scope="col">Pulse</th>
                <th scope="col">R.R</th>
                <th scope="col">B.P</th>
                <th scope="col">Urine Output</th>
                <th scope="col">Observations / Reaction</th>
                <th scope="col">Remarks</th>
                <th scope="col">Sign</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Pre Transfusion Vital</th>
                <td>
                    <?php echo $blooa[8]; ?>
                </td>
                <td>
                    <?php echo $blooa[0]; ?>
                </td>
                <td>
                    <?php echo $blooa[1]; ?>
                </td>
                <td>
                    <?php echo $blooa[2]; ?>

                </td>
                <td>
                    <?php echo $blooa[3]; ?>
                </td>
                <td>
                    <?php echo $blooa[4]; ?>
                </td>
                <td>
                    <?php echo $blooa[5]; ?>
                </td>
                <td>
                    <?php echo $blooa[6]; ?>
                </td>
                <td>
                    <?php echo $blooa[7]; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">After 10 min</th>
                <?php
                $code = '';
                for ($i = 9; $i <= 17; $i++) {
                    $code .= '<td>';
                    $code .= $blooa[$i];
                    $code .= '</td>';


                }

                echo $code;
                ?>


            </tr>
            <tr>
                <th scope="row">After 20 min</th>
                <?php
                $code = '';
                for ($i = 18; $i <= 26; $i++) {
                    $code .= '<td>';
                    $code .= $blooa[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?>
            </tr>
            <tr>
                <th scope="row">After 30 min</th>
                <?php
                $code = '';
                for ($i = 27; $i <= 35; $i++) {
                    $code .= '<td>';
                    $code .= $blooa[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?>
            </tr>
            <tr>
                <th scope="row">After 1 hr.</th>
                <?php
                $code = '';
                for ($i = 36; $i <= 44; $i++) {
                    $code .= '<td>';
                    $code .= $blooa[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?>
            </tr>
            <tr>
                <th scope="row">After 2 hrs.</th>
                <?php
                $code = '';
                for ($i = 45; $i <= 50; $i++) {
                    $code .= '<td>';
                    $code .= $blooa[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?>
                <?php
                $code = '';
                for ($i = 0; $i <= 2; $i++) {
                    $code .= '<td>';
                    $code .= $bloob[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?>

            </tr>
            <tr>
                <th scope="row">After 3 hrs.</th>
                <?php
                $code = '';
                for ($i = 3; $i <= 11; $i++) {
                    $code .= '<td>';
                    $code .= $bloob[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?>
            </tr>
            <tr>
                <th scope="row">After 4 hrs.</th>
                <?php
                $code = '';
                for ($i = 12; $i <= 20; $i++) {
                    $code .= '<td>';
                    $code .= $bloob[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?>
            </tr>
            <tr>
                <th scope="row">
                    <?php echo $bloob[21]; ?>
                </th>
                <?php
                $code = '';
                for ($i = 22; $i <= 30; $i++) {
                    $code .= '<td>';
                    $code .= $bloob[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?>
            </tr>
            <tr>
                <th scope="row">
                    <?php echo $bloob[31]; ?>
                </th>
                <?php
                $code = '';
                for ($i = 32; $i <= 40; $i++) {
                    $code .= '<td>';
                    $code .= $bloob[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?>
            </tr>
            <tr>
                <th scope="row">After Completion</th>
                <?php
                $code = '';
                for ($i = 41; $i <= 44; $i++) {
                    $code .= '<td>';
                    $code .= $bloob[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?><td>
                    <?php echo $bloob[49]; ?>
                </td>
                <?php
                $code = '';
                for ($i = 45; $i <=48; $i++) {
                    $code .= '<td>';
                    $code .= $bloob[$i];
                    $code .= '</td>';


                }
                echo $code;
                ?>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-12"><strong>Any nursing / medical interventions undertaken due to transfusion: </strong>
        <?php echo $nur[0]; ?></div>
        
    </div>
    <div class="row">
    <div class="col-12">
        <strong>Blood transfusion reaction: </strong><?php echo $blood['trans']; ?>
    </div>
    <div class="table-responsive col-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Sign</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">RMO</th>
                    <td><?php echo $nur[1]; ?></td>
                    <td><?php echo $nur[2]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Nursing In-Charge</th>
                    <td><?php echo $nur[3]; ?></td>
                    <td><?php echo $nur[4]; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <h6 class="text-danger">
        <strong>Note: Follow transfusion guidelines on blood bag label</strong>
    </h6>
    <h6 class="text-danger">
        Any reaction should be immediately informed to RMO & Quality dept.
    </h6>
</div>

   
    <h6>Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>