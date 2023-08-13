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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

</head>

<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $eye = $_POST['eye'];
        $reportingTime = $_POST['reporting_time'];
        $instructionFromOT = $_POST['instruction_from_ot'];
        $siNo = $_POST['si_no'];
        $proposedDischargeTime = $_POST['proposed_discharge_time'];
        $paymentMode = $_POST['payment_mode'];
        $icuInTime = $_POST['icu_in_time'];
        $icuOutTime = $_POST['icu_out_time'];
        $otInTime = $_POST['ot_in_time'];
        $otOutTime = $_POST['ot_out_time'];
        $dischargeTime = $_POST['discharge_time'];
        $emr = $_POST['emr'];
        $surgeon = $_POST['surgeon'];
        $proc = $_POST['proc'];
        $ward_sign = $_POST['ward_sign'];
        $icu_sign = $_POST['icu_sign'];

        $tasks = [];
        for ($i = 0; $i < 17; $i++) {
            $taskValue = isset($_POST['taskStatus' . $i]) ? ($_POST['taskStatus' . $i] == 'Yes' ? 'Yes' : 'No') : 'No';
            $tasks[$i] = ['name' => $i, 'value' => $taskValue];
        }


        $description = json_encode($tasks);

        $sql = "UPDATE eye_pre_op_checklist 
    SET eye = '$eye',
        reporting_time = '$reportingTime',
        instruction_from_ot = '$instructionFromOT',
        si_no = '$siNo',
        proposed_discharge_time = '$proposedDischargeTime',
        payment_mode = '$paymentMode',
        icu_in_time = '$icuInTime',
        icu_out_time = '$icuOutTime',
        ot_in_time = '$otInTime',
        ot_out_time = '$otOutTime',
        discharge_time = '$dischargeTime',
        description = '$description', emr = '$emr',
        surgeon = '$surgeon',
        proc = '$proc',
        ward_sign = '$ward_sign',
        icu_sign = '$icu_sign' 
    WHERE patient_id = $id ";
        $conn->query($sql);

        if ($conn->affected_rows > 0) {

            echo "<div class='alert alert-success'> Updated Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'> Not Updated try again</div>";
        }
    }
    ?>
    <?php
    $sql = "select emr,proc,surgeon from eye_pre_op_checklist where patient_id = $id;";
    $result = $conn->query($sql)->fetch_assoc();
    ?>
    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>

        <a href="eye_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
        <a href="eye_pre_op_checklist_print.php?id=<?php echo $id; ?>" class="btn btn-success ">Print </a>
        <h3 class="text-center text-dark mt-3">Pre Operaive Checklist</h3>
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
            <div class="col-md-3 form-group">
                <form action="" method="post">
                    <label for="inputField" class="sr-only">EMR NO. : </label>
                    <input type="text" class="form-control-sm inline" id="inputField" placeholder="Enter EMR" name="emr"
                        value="<?php echo $result['emr']; ?>">

            </div>
            <div class="col-md-3 form-group">

                <label for="inputField" class="sr-only">Surgeon : </label>
                <input type="text" class="form-control-sm inline" id="inputField" placeholder="Enter Surgeon"
                    name="surgeon" value="<?php echo $result['surgeon']; ?>">

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
                <label class="form-label">Bed Number:
                    <?php echo $res2['bed/room']; ?>
                </label>
            </div>
            <div class="col-12 form-group">

                <label for="inputField" class="sr-only">Procedure : </label>
                <textarea class="form-control" id="inputField" placeholder="Enter procedure"
                    name="proc"><?php echo $result['proc']; ?></textarea>

            </div>
        </div>
        <div class="row mt-2">

            <?php
            $sql = "select * from eye_pre_op_checklist where patient_id = $id;";
            $res = $conn->query($sql)->fetch_assoc();
            ?>
            <div class="col-md-3">
                <label class="form-label">EYE:</label>
                <select name="eye">
                    <option value="OD" <?php if ($res['eye'] === 'OD')
                        echo 'selected'; ?>>OD</option>
                    <option value="OS" <?php if ($res['eye'] === 'OS')
                        echo 'selected'; ?>>OS</option>
                </select>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <table id="task-table" class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Reporting Time</td>
                                <td><input type="text" id="timeField" name="reporting_time"
                                        value=" <?php echo $res['reporting_time']; ?>"></td>
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
        <td>
            <input type='radio' name='taskStatus$i' value='Yes' " . ($taskStatus === 'Yes' ? 'checked' : '') . ">
            <label for='taskStatus$i'>Yes</label>
            <input type='radio' name='taskStatus$i' value='No' " . ($taskStatus === 'No' ? 'checked' : '') . ">
            <label for='taskStatus$i'>No</label>
        </td>
    </tr>";
                            }
                            ?>

                            <tr>
                                <th scope='row'>19</th>
                                <td>Payment Mode :</td>
                                <td>
                                    <select name='payment_mode'>
                                        <option value='None' <?php if ($res['payment_mode'] === 'None')
                                            echo 'selected'; ?>>None</option>
                                        <option value='Cashless' <?php if ($res['payment_mode'] === 'Cashless')
                                            echo 'selected'; ?>>Cashless</option>
                                        <option value='Scheme' <?php if ($res['payment_mode'] === 'Scheme')
                                            echo 'selected'; ?>>Scheme</option>
                                        <option value='TPA' <?php if ($res['payment_mode'] === 'TPA')
                                            echo 'selected'; ?>>TPA</option>
                                        <option value='Cash' <?php if ($res['payment_mode'] === 'Cash')
                                            echo 'selected'; ?>>Cash</option>
                                        <option value='Online' <?php if ($res['payment_mode'] === 'Online')
                                            echo 'selected'; ?>>Online</option>
                                        <option value='Cheque' <?php if ($res['payment_mode'] === 'Cheque')
                                            echo 'selected'; ?>>Cheque</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th scope='row'>20</th>
                                <td>ICU</td>
                                <td>
                                    In Time: <input type='time' name='icu_in_time'
                                        value="<?php echo $res['icu_in_time']; ?>"><br>
                                    Out Time: <input type='time' name='icu_out_time'
                                        value="<?php echo $res['icu_out_time']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <th scope='row'>21</th>
                                <td>OT</td>
                                <td>
                                    In Time: <input type='time' name='ot_in_time'
                                        value="<?php echo $res['ot_in_time']; ?>"><br>
                                    Out Time: <input type='time' name='ot_out_time'
                                        value="<?php echo $res['ot_out_time']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <th scope='row'>22</th>
                                <td>Discharge Time</td>
                                <td>
                                    <input type='time' name='discharge_time'
                                        value="<?php echo $res['discharge_time']; ?>">
                                </td>
                            </tr>


                        </tbody>
                    </table>

                </div>
                <div class="row m-3">
                    <div class="col-md-4">
                        <div>Instruction from OT : <input type="text" class="form-control" name="instruction_from_ot"
                                value="<?php echo $res['instruction_from_ot']; ?>"></div>
                    </div>
                    <div class="col-md-4">
                        <div>SI . No</div>
                        <input type="text" class="form-control" name="si_no" value="<?php echo $res['si_no']; ?>">
                    </div>
                    <div class="col-md-4">
                        <div>Proposed Discharge Time</div>
                        <input type="datetime-local" class="form-control" name="proposed_discharge_time"
                            value="<?php echo $res['proposed_discharge_time']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Sign of Ward Sister :</label>
                        <input type="text" name="ward_sign" id="consultant" class="form-control" placeholder="Sign"
                            value="<?php echo $res['ward_sign']; ?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Sign of ICU Sister :</label>
                        <input type="text" name="icu_sign" id="consultant" class="form-control" placeholder="Sign"
                            value="<?php echo $res['icu_sign']; ?>">
                    </div>

                </div>
            </div>
        </div>
            <input type="submit" class="btn btn-primary my-5" value="Submit">
            </form>
        </div>
        <script>

            var timeField = document.getElementById("timeField");
            if (timeField.value == " ") {
                function updateTime() {
                    var currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                    timeField.value = currentTime;
                }
                updateTime();
                setInterval(updateTime, 60000);
            }

        </script>
</body>

</html>