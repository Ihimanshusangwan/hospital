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
        <a href="ortho_pre-operativeChecklist.php?id=<?php echo $id; ?>" class=" btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Pre Operative Checklist</h3>
    <?php include_once("../header/header.php") ?>
    <?php
    $sql = "select * from ortho_pre_op_checklist where patient_id = $id;";
    $res = $conn->query($sql)->fetch_assoc();
    ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                    <?php
                    $tasks = [
                        "General Consent Obtained",
                        "Surgery Procedural Consent Obtained",
                        "Anesthesia Consent Obtained",
                        "Specific Consent (if Applicable)",
                        "Prepared the Area for Operation",
                        "Prepared the Patient for Spinal, Epidural, etc, If Applicable",
                        "Removed",
                        "Reports of Lab, X-ray, ECG, Scan etc Collected & Attached to File",
                        "Premedication Given & Chartered",
                        "Pre Operative Antibiotics Given",
                        "H.S. Medications Given",
                        "Vital Signs Checked",
                        "I.V. Lines Secured",
                        "Bladder Emptied / Catheterization Done with Time",
                        "Mouth Wash / Gargle Given",
                        "Bath Given",
                        "Enema / Bowel Wash Given",
                        "Ryles Tube Passed (if Asked)",
                        "Patient Theater Dress Given",
                        "Blood Arranged, Consent Taken - Mention No. of Units?",
                        "Materials, Drugs, Equipment Sent with the Patient"
                    ];
                    $description = json_decode($res['description'], true);
                    if (!$description) {
                        $description = array_fill(0, count($tasks), array('name' => '', 'value' => 'No'));
                    }

                    for ($i = 0; $i < count($tasks); $i++) {
                        $task = $tasks[$i];
                        $taskStatus = $description[$i]['value'];

                        echo "<tr>
        <th>" . ($i + 1) . "</th>
        <td>$task</td>
        <td> $taskStatus </td>
    </tr>";
                    }
                    ?>
                    <th scope="row">22</th>
                    <td>The Patient is Shifted T OT At - </td>
                    <td>
                        <?php echo $res['input1']; ?>
                    </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Name of the Staff</td>
                        <td>
                            <?php echo $_SESSION['staff_name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Received to the OT By Signature</td>
                        <td>
                            <?php echo $res['input2']; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</body>
<script> window.print(); </script>

</html>