<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
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
$sql3 = "SELECT * FROM acc_maternity WHERE pt_id = '$id';";
$data3 = $conn->query($sql3);

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
        <a href="acc_maternity.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Accident And Maternity Homes</h3>

    <?php include_once("../header/header.php") ?>
    <table class="table table-bordered text-center border-secondary">
                <thead >
                <tr class="main-header">
                    <th rowspan="2">Sno</th>
                    <th rowspan="2">Date</th>
                    <th rowspan="2">Time</th>
                    <th rowspan="2">Temp</th>
                    <th rowspan="2">Pulse</th>
                    <th rowspan="2">BP</th>
                    <th rowspan="2">SPO2</th>
                    <th rowspan="2">Time</th>
                    <th colspan="3" rowspan="1">Intake</th>
                    <th colspan="3" rowspan="1">Outputs</th>
                </tr>
                <tr>
                    <th>IV Fluids</th>
                    <th>Oral</th>
                    <th>Total Intake</th>
                    <th>Urine Output</th>
                    <th>Others</th>
                    <th>Total Output</th>
                </tr>
               
                </thead>
                <tbody id="tbody">
                <?php
                  $i = 1;
                  $sr = 1;
                  while ($res = $data3->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $sr . '</td>';
                    echo '<td>' . $res['date'] . '</td>';
                    echo '<td>' . $res['time'] . '</td>';
                    echo '<td>' . $res['temp'] . '</td>';
                    echo '<td>' . $res['pulse'] . '</td>';
                    echo '<td>' . $res['bp'] . '</td>';
                    echo '<td>' . $res['spo'] . '</td>';
                    echo '<td>' . $res['time2'] . '</td>';
                    echo '<td>' . $res['fluid'] . '</td>';
                    echo '<td>' . $res['oral'] . '</td>';
                    echo '<td>' . $res['intake'] . '</td>';
                    echo '<td>' . $res['urine_output'] . '</td>';
                    echo '<td>' . $res['others'] . '</td>';
                    echo '<td>' . $res['total_output'] . '</td>';
                    echo '</tr>';
                    $i++;
                    $sr++;
                  }
                  ?>
                </tbody>
            </table>
    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>