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
        $paymentMode = $_POST['payment_mode'];

        $patient_name = $_POST['patient_name'];
        $patient_sign = $_POST['patient_sign'];
        $patient_date = $_POST['patient_date'];
        $patient_time = $_POST['patient_time'];

        $witness_name = $_POST['witness_name'];
        $witness_sign = $_POST['witness_sign'];
        $witness_date = $_POST['witness_date'];
        $witness_time = $_POST['witness_time'];

        $councellor_name = $_POST['councellor_name'];
        $councellor_sign = $_POST['councellor_sign'];
        $councellor_date = $_POST['councellor_date'];
        $councellor_time = $_POST['councellor_time'];
        $emr = $_POST['emr'];
        $surgeon = $_POST['surgeon'];
        $proc = $_POST['proc'];



        $tasks = [];
        for ($i = 0; $i < 11; $i++) {
            $taskValue = isset($_POST['taskStatus' . $i]) ? ($_POST['taskStatus' . $i] == 'Yes' ? 'Yes' : 'No') : 'No';
            $tasks[$i] = ['name' => $i, 'value' => $taskValue];
        }
        $description = json_encode($tasks);
        $sql = "UPDATE ortho_initial_counselling
    SET payment_mode = '$paymentMode',
        patient_name = '$patient_name',
        patient_sign = '$patient_sign',
        patient_date = '$patient_date',
        patient_time = '$patient_time',
        witness_name = '$witness_name',
        witness_sign = '$witness_sign',
        witness_date = '$witness_date',
        witness_time = '$witness_time',
        councellor_name = '$councellor_name',
        councellor_sign = '$councellor_sign',
        councellor_date = '$councellor_date',
        councellor_time = '$councellor_time',
        description = '$description',
        emr = '$emr',
        surgeon = '$surgeon',
        proc = '$proc' 
    WHERE patient_id = $id;
    ";
        $conn->query($sql);

        if ($conn->affected_rows > 0) {

            echo "<div class='alert alert-success'> Updated Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'> Not Updated try again</div>";
        }
    }
    ?>
    <?php
    $sql = "select emr,proc,surgeon from ortho_initial_counselling where patient_id = $id;";
    $result = $conn->query($sql)->fetch_assoc();
    ?>
    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>

        <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
        <a href="ortho_initial_counselling_print.php?id=<?php echo $id; ?>" class=" btn btn-success m-2"
            id="dashboard">Print</a>
        <h3 class="text-center text-dark mt-3">Initial Counselling</h3>
        <form action="" method="POST">
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
            <hr>
            <div class="row">
                <label class="form-label"><strong>Counselling About-</strong>
                    <p> You are informed about your / your patients healthcare needs as follows.Please select yes
                        wherever
                        applicable : </p>
                </label>
            </div>
            <?php
            $sql = "select * from ortho_initial_counselling where patient_id = $id;";
            $res = $conn->query($sql)->fetch_assoc();
            ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tbody>
                            <?php
                            $tasks = [
                                "Diagnosis / Reason For Admission",
                                "Any Possible complications Thereof",
                                "The Plan of Treatment",
                                "Any Other Alternatives And Preventive Aspects That You May Have",
                                "The Benefits Of The Alternatives Involved",
                                "Diet, Nutrition And Medication",
                                "That You Can Make Informed Choice Among Available Options",
                                "That Your Patient Has Right To Refuse The Treatment",
                                "Expected Date Of Discharge",
                                "Expected Cost Of Treatment",
                                "Expected Results"
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
            <label for='taskStatus$i' >Yes</label></div>
            <input type='radio'  name='taskStatus$i' value='No' " . ($taskStatus === 'No' ? 'checked' : '') . ">
            <label for='taskStatus$i'>No</label>
        </td>
    </tr>";
                            }
                            ?>
                            <tr>
                                <th scope='row'>12</th>
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

                        </tbody>
                    </table>
                    <p>My / Our all concerns about proposed care and treatment have been satisfactorily addressed by
                        Medical Councilor in a
                        language that | / we understand.</p>
                    <p>| / We understand and agree to all the above information. My / Our signature indicates that | fwe
                        have read the above
                        information and agree with it.
                    </p>
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
                                <th scope="row">Patient</th>
                                <td> <input name="patient_sign" type="text" class="form-control" id="age"
                                        placeholder="signature" value="<?php echo $res['patient_sign']; ?>"></td>
                                <td><input name="patient_name" type="text" class="form-control" id="age"
                                        placeholder="name" value="<?php echo $res['patient_name']; ?>"></td>
                                <td><input name="patient_date" value="<?php echo $res['patient_date']; ?>" type="date"
                                        class="form-control" id="age"></td>
                                <td><input name="patient_time" value="<?php echo $res['patient_time']; ?>" type="time"
                                        class="form-control" id="age"></td>
                            </tr>
                            <tr>
                                <th scope="row">Witness</th>
                                <td> <input name="witness_sign" value="<?php echo $res['witness_sign']; ?>" type="text"
                                        class="form-control" id="age" placeholder="signature"></td>
                                <td><input name="witness_name" value="<?php echo $res['witness_name']; ?>" type="text"
                                        class="form-control" id="age" placeholder="name"></td>
                                <td><input name="witness_date" value="<?php echo $res['witness_date']; ?>" type="date"
                                        class="form-control" id="age"></td>
                                <td><input name="witness_time" value="<?php echo $res['witness_time']; ?>" type="time"
                                        class="form-control" id="age"></td>
                            </tr>
                            <tr>
                                <th scope="row">Name of the councellor</th>
                                <td> <input name="councellor_sign" value="<?php echo $res['councellor_sign']; ?>"
                                        type="text" class="form-control" id="age" placeholder="signature"></td>
                                <td><input name="councellor_name" value="<?php echo $res['councellor_name']; ?>"
                                        type="text" class="form-control" id="age" placeholder="name"></td>
                                <td><input name="councellor_date" value="<?php echo $res['councellor_date']; ?>"
                                        type="date" class="form-control" id="age"></td>
                                <td><input name="councellor_time" value="<?php echo $res['councellor_time']; ?>"
                                        type="time" class="form-control" id="age"></td>
                            </tr>
                        </tbody>
                    </table>

                    <input type="submit" class="btn btn-primary my-5" value="Submit">
        </form>
    </div>
</body>

</html>