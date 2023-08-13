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
        <a href="nursing_intial_assesment.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Nursing Initial Assesment </h3>
    <?php include_once("../header/header.php") ?>
    <?php $query = "SELECT * FROM `nurse_intial_assesment` WHERE `id` = '$id'";
    $dat = $conn->query($query);
    $numRows = $dat->num_rows;
    if ($numRows == 1) {
        $res2 = $dat->fetch_assoc();
    } ?>
    <div class="row">
        <div class="col-4">
            <strong>Mode Of Arrival: </strong>
            <?php  if ($res2['mode_of_arrival'] == 1) {
                echo "Walking";
            } else if ($res2['mode_of_arrival'] == 2) {
                echo "Wheel";
            } else if ($res2['mode_of_arrival'] == 3) {
                echo " Stretcher";
            } else {
                echo "";
            } ?>
        </div>
        <div class="col-4">
            <strong>Patient accompanied on admission : </strong>
            <?php echo ($res2['accompanied'] == "1") ? "Yes" : "No"; ?>
        </div>
        <div class="col-4">
            <strong>Relation: </strong>
            <?php echo $res2['relation'] ?? ''; ?>
        </div>
        <div class="col-4">
            <strong>Contact Person :</strong>
            <?php echo $res2['contact_person'] ?? ''; ?>
        </div>
        <div class="col-4">
            <strong>Phone Number:</strong>
            <?php echo $res2['phone_number'] ?? ''; ?>
        </div>
        <div class="col-4">
            <strong>Primary Language Spoken: </strong>
            <?php echo $res2['language'] ?? ''; ?>
        </div>
        <div class="col-4">
            <strong>Interpreter Need :</strong>
            <?php echo ($res2['interpereter'] == 1) ? "YES" : "NO"; ?>
        </div>
        <div class="col-4">
            <strong>Education Status: </strong>
            <?php
            if ($res2['education_status'] == 1) {
                echo "Primary";
            } else if ($res2['education_status'] == 2) {
                echo "Higher Education";
            } else if ($res2['education_status'] == 3) {
                echo " Graduate";
            } else if ($res2['education_status'] == 4) {
                echo "Post Graduate";
            } else {
                echo "";
            }
            ?>
        </div>
        <div class="col-4">
            <strong>Socio Economic Status: </strong>
            <?php
            if ($res2['economic_status'] == 1) {
                echo "Poor";
            } else if ($res2['economic_status'] == 2) {
                echo "Average";
            } else if ($res2['economic_status'] == 3) {
                echo "Good";
            } else {
                echo "";
            }
            ?>
        </div>
        <div class="col-12">
            <strong>Chief Complaints: </strong>
            <?php echo $res2['compliant'] ?? ''; ?>
        </div>
        <div class="col-4">
            <strong>Weight: </strong>
            <?php echo $res1['weight'] ?>
        </div>
        <div class="col-4">
            <strong>Pulse: </strong>
            <?php echo $res1['pulse'] ?>
        </div>
        <div class="col-4">
            <strong>BP: </strong>
            <?php echo $res1['bp'] ?>
        </div>
        <div class="col-4">
            <strong>Temperature: </strong>
            <?php echo $res1['temp'] ?>
        </div>
        <div class="col-4">
            <strong>Respiration: </strong>
            <?php echo $res2['resperation'] ?>
        </div>
        <div class="col-4">
            <strong>Height: </strong>
            <?php echo $res2['height'] ?>
        </div>
        <div class="text-center col-12 m-2"><strong>Known or Suspected Allergies To</strong></div>

        <div class="col-12">
            <strong>1. Medication & Drugs : </strong>
            <?php echo $res2['allergy_drug'] ?? ''; ?>
        </div>
        <div class="col-12">
            <strong>2. Blood and Transfusion:</strong>
            <?php echo $res2['allergy_blood'] ?? ''; ?>
        </div>
        <div class="col-12">
            <strong>3.food : </strong>
            <?php echo $res2['allergy_food'] ?? ''; ?>
        </div>
        <div class="text-center col-12 m-2"><strong>ABILITY TO PERFORM ACTIVITIES DAILY LIVING</strong></div>
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>Activity</th>
                    <th>Independent</th>
                    <th>Assist</th>
                    <th>Dependent</th>
                </tr>
                <tr>
                    <td>Mobility / Walking</td>
                    <th>
                        <?php echo $res2['tab1'] ?? ''; ?>
                    </th>
                    <th>
                        <?php echo $res2['tab2'] ?? ''; ?>
                    </th>
                    <th>
                        <?php echo $res2['tab3'] ?? ''; ?>
                    </th>
                </tr>
            </table>
        </div>
        <div class="text-center col-12 m-2"><strong>FORM COMPLETED BY :</strong></div>
        <div class="col-3">
            <strong>Name: </strong>
            <?php echo $res2['$submit_name'] ?? ''; ?>
        </div>
        <div class="col-4">
            <strong>Signature: </strong>
            <?php echo $res2['$submit_sign'] ?? ''; ?>
        </div>
        <div class="col-5 ">
            <strong>Date: </strong>
            <?php echo $res2['$submit_date'] ?? ''; ?>
        </div>
    </div>
    <h6 class="mt-3">Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>