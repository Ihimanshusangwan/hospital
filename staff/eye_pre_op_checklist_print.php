<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible content=" IE="edge">
    <meta viewport content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
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
                size: A4;

            }

            .noprint {
                visibility: hidden;
            }
        }
    </style>
</head>

<body>

    <div id="button">
        <button type="button" class=" btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="Pre-operative_Checklist.php?id=<?php echo $id; ?>" class=" btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Pre Operative Checklist</h3>
    <div>
        <div style="border-bottom: 3px solid black; margin-bottom : 10px;"></div>
        <div class="row">
            <div class="col-3"><strong>UHID No:</strong>
                <?php echo $res2['uhid']; ?>
            </div>
            <div class="col-3"><strong>IPD No:</strong>
                <?php echo $res2['ipd']; ?>
            </div>
            <div class="col-3"><strong>Ward/ICU:</strong>
                <?php echo $res2['ward/icu']; ?>
            </div>
            <div class="col-3"><strong>Bed / Room No:</strong>
                <?php echo $res2['bed/room']; ?>
            </div><br>
            <div class="col-6"><strong>Name:</strong>
                <?php echo strtoupper($res['name']); ?>
            </div>
            <div class="col-3"><strong>Age:</strong>
                <?php echo strtoupper($res['age']); ?>
            </div>
            <div class="col-3"><strong>Sex:</strong>
                <?php echo $res['sex']; ?>
            </div><br>
            <?php $sql = "select * from eye_pre_op_checklist where patient_id = $id;";
            $res = $conn->query($sql)->fetch_assoc(); ?>
            <div class="col-6"><strong>EMR NO.: </strong>
                <?php echo $res['emr']; ?>
            </div>
            <div class="col-3"><strong>Surgeon: </strong>
                <?php echo $res['surgeon']; ?>
            </div>
            <div class="col-6"><strong>Procedure: </strong>
                <?php echo $res['proc'];?>
            </div>
            <div class="col-3"><strong>EYE: </strong>
                <?php echo $res['eye']; ?>
            </div>
            <br>
            <div class="col mx-3" style="display: flex; justify-content: flex-end;">
                <script src="../barcode.js"></script>
                <canvas id="barcode"></canvas>
                <script>
                    const canvas = document.getElementById('barcode');
                    const opts = {
                        bcid: 'code39',  // Barcode type set to Code 39
                        text: '<?php echo $id; ?>',  // Numeric value with variable length
                        scale: 2,  // Scale factor for the barcode size
                        height: 10,  // Height of the barcode in mm
                        includetext: false,  // Include the barcode text
                    };

                    bwipjs.toCanvas(canvas, opts, function (err) {
                        if (err) {
                            console.error('Error generating barcode:', err);
                        } else {
                            console.log('Barcode generated successfully');
                        }
                    });
                </script>
            </div><br>

        </div>
        <div style="border-bottom: 3px solid black; margin-bottom : 10px;  margin-top: 10px;"></div>
        <div class="col-md-12">
            <table id="task-table" class="table table-bordered">
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Reporting Time </td>
                        <td><?php echo $res['reporting_time']; ?></td>
                    </tr>
                    <?php
                    $tasks = [
                        "Pre Admission Eye Check Up",
                        "Pre Operative Fitness Done",
                        "Consent Taken",
                        "Special Consent Taken",
                        "Blood Pressure Control",
                        "Blood Sugar Control",
                        "Eye Lash Trimming",
                        "Lab Report Collection",
                        "Face Wash Done",
                        "Leg Wash Done",
                        "Mouth Wash Done",
                        "Pupil Dialatation OD Done",
                        "Pupil Dialatation OS Done",
                        "Wearing OT Dress",
                        "Physician Clearance",
                        "Consultant Clearance",
                        "Pre Operative Medicine"
                    ];

                    $description = json_decode($res['description'], true);
                    if (!$description) {
                        $description = array_fill(0, count($tasks), array('name' => '', 'value' => 'No'));
                    }

                    for ($i = 0; $i < count($tasks); $i++) {
                        $task = $tasks[$i];
                        $taskStatus = $description[$i]['value'];

                        echo "<tr>
        <th>" . ($i + 2) . "</th>
        <td>$task</td>
        <td>$taskStatus</td>
    </tr>";
                    }
                    ?>

                    <tr>
                        <th scope='row'>19</th>
                        <td>Payment Mode :</td>
                        <td> <?php echo $res['payment_mode']; ?>
                        </td>
                    </tr>

                    <tr>
                        <th scope='row'>20</th>
                        <td>ICU</td>
                        <td>
                            In Time: <?php echo $res['icu_in_time']; ?><br>
                            Out Time: <?php echo $res['icu_out_time'];?>
                        </td>
                    </tr>

                    <tr>
                        <th scope='row'>21</th>
                        <td>OT</td>
                        <td>
                            In Time: <?php echo $res['ot_in_time']; ?><br>
                            Out Time: <?php echo $res['ot_out_time']; ?>
                        </td>
                    </tr>

                    <tr>
                        <th scope='row'>22</th>
                        <td>Discharge Time</td>
                        <td>
                         <?php echo $res['discharge_time']; ?>
                        </td>
                    </tr>


                </tbody>
            </table>

        </div>
        <div class="row my-3">
            <div class="col-4">
                <div><strong>Instruction from OT :</strong><?php echo $res['instruction_from_ot']; ?></div>
            </div>
            <div class="col-4">
                <div><strong>SI . No</strong></div><?php echo $res['si_no'];?>
            </div>
            <div class="col-4">
                <div><strong>Proposed Discharge Time</strong></div>
                <?php echo $res['proposed_discharge_time']; ?>
            </div>
        </div>
        <div class="row">
        <div class="col-6">
                <div><strong>Sign of Ward Sister :</strong><?php echo $res['ward_sign']; ?></div>
            </div>
        <div class="col-6">
                <div><strong>Sign of ICU Sister :</strong><?php echo $res['icu_sign']; ?></div>
            </div>
        </div>

    </div>
    </body>
<script> window.print(); </script>

</html>