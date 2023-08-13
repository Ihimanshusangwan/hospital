<?php
$id = $_GET['id'];
session_start();
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

?>\
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style type="text/css">
        body {
            background: lightgray;
            animation: fade-in 1s linear;
        }

        .fl {
            animation: gelatine 1s;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }

        input[type="text"]::placeholder,
        input[type="time"]::placeholder,
        input[type="date"]::placeholder,
        input[type="tel"]::placeholder,
        input[type="number"]::placeholder {
            color: lightgrey;
        }

        textarea[type="text"]::placeholder {
            color: lightgrey;
        }

        hr {
            border: 1px solid black;
        }

        label {
            animation: gelatine 1s;

        }

        select {
            animation: gelatine 1s;
            outline: none !important;
            border-color: #C0C0C0;
            box-shadow: 5px 5px 5px 5px #C0C0C0;
            animation: gelatine 1s;
        }

        input[type="text"],
        input[type="time"],
        input[type="date"],
        input[type="tel"],
        input[type="number"] {
            outline: none !important;
            border-color: #C0C0C0;
            box-shadow: 5px 5px 5px 5px #C0C0C0;
            animation: gelatine 1s;
        }

        textarea[type="text"] {
            outline: none !important;
            border-color: #C0C0C0;
            box-shadow: 5px 5px 5px 5px #C0C0C0;
            animation: gelatine 1s;
        }

        input[type="text"]:focus,
        input[type="time"]:focus,
        input[type="date"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus {
            outline: none !important;
            border-color: grey;
            box-shadow: 2px 2px 2px 2px grey;
        }

        textarea[type="text"]:focus {
            outline: none !important;
            border-color: grey;
            box-shadow: 2px 2px 2px 2px grey;
        }

        select:focus {
            outline: none !important;
            border-color: grey;
            box-shadow: 2px 2px 2px 2px grey;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes gelatine {
            0% {
                opacity: 0;
                transform: translateX(2000px);
            }

            60% {
                opacity: 1;
                transform: translateX(-30px);
            }

            80% {
                transform: translateX(10px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input1 = $_POST['input1'];
        $input2 = $_POST['input2'];

        $tasks = [];
        for ($i = 0; $i < 21; $i++) {
            $taskValue = isset($_POST['taskStatus' . $i]) ? ($_POST['taskStatus' . $i] == 'Yes' ? 'Yes' : 'No') : 'No';
            $tasks[$i] = ['name' => $i, 'value' => $taskValue];
        }


        $description = json_encode($tasks);

        $sql = "UPDATE ortho_pre_op_checklist 
SET input1 = '$input1',
    input2 = '$input2',
    description = '$description'
WHERE patient_id = $id";
        $conn->query($sql);

        if ($conn->affected_rows > 0) {

            echo "<div class='alert alert-success'> Updated Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'> Not Updated try again</div>";
        }
    }
    ?>
    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>

        <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
        <a href="ortho_pre_op_checklist_print.php?id=<?php echo $id; ?>" class=" btn btn-success m-2"
            id="dashboard">Print</a>
        <h3 class="text-center text-dark mt-3">Pre Operative Checklist</h3>
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">UHID No:
                    <?php echo $res2['uhid']; ?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="form-label">IPD No:
                    <?php echo $res2['ipd']; ?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Date of Admission :
                    <?php echo $res2['date']; ?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="time_ad">Time of Admission :
                    <?php echo $res2['time']; ?>
                </label>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Name:
                    <?php echo $res['name']; ?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Age:
                    <?php echo $res['age']; ?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Sex:
                    <?php echo $res['sex']; ?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="form-label">ICU/Ward Room No:
                    <?php echo $res2['ward/icu']; ?>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label class="form-label">Consultant:
                    <?php echo $res['consultant']; ?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Diagnosis:
                    <?php echo $res1['diagnosis']; ?>
                </label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Bed Number:
                    <?php echo $res2['bed/room']; ?>
                </label>
            </div>
        </div>
        <?php
        $sql = "select * from ortho_pre_op_checklist where patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        ?>
        <form action="" method="POST">
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
        <td><div class='mx-3' style='display: inline;'>
            <input type='radio' name='taskStatus$i' value='Yes' " . ($taskStatus === 'Yes' ? 'checked' : '') . ">
            <label for='taskStatus$i'>Yes</label></div>
            <input type='radio' name='taskStatus$i' value='No' " . ($taskStatus === 'No' ? 'checked' : '') . ">
            <label for='taskStatus$i'>No</label>
        </td>
    </tr>";
                            }
                            ?>

                            <th scope="row">22</th>
                            <td>The Patient is Shifted T OT At - </td>
                            <td>
                                <input type="text" name="input1" value="<?php echo $res['input1']; ?>"
                                    class="form-control">
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
                                    <input type="text" name="input2" value="<?php echo $res['input2']; ?>"
                                        class="form-control">
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <input type="submit" class="btn btn-primary my-5" value="Submit">
        </form>
    </div>
</body>

</html>