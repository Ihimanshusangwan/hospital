<?php
require("../../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
if (isset($_GET['date'])) {

    $searchDate = $_GET['date'];
    $sql3 = "SELECT * FROM post_operative_surgical WHERE date = '$searchDate';";
    $data3 = $conn->query($sql3);
}
if (isset($_GET['month'])) {

    $searchMonth = $_GET['month'];
    $sql3 = "SELECT * FROM post_operative_surgical WHERE date LIKE '%$searchMonth%';";
    $data3 = $conn->query($sql3);
}

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
                size: A4 Landscape;
            }

            .noprint {
                visibility: hidden;
            }

            body {
                margin: 0;
            }

        }

        .main-header {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <?php
        if (isset($searchDate)) {
            echo <<<back
                <a href="post_operative_surgical.php?date=$searchDate" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
back;
        }
        if (isset($searchMonth)) {
            echo <<<back
                <a href="post_operative_surgical.php?month=$searchMonth" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
back;
        }
        ?>
    </div>
    <?php include_once("../../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">POST OPERATIVE SURGICAL</h3>
    <hr />
    <div class="row">
        <div class="col-12">
            <?php if (isset($_GET['date'])) {
                echo <<<back
                <strong> Date: </strong> $searchDate
back;
            }
            if (isset($_GET['month'])) {
                echo <<<back
                <strong> Month: </strong> $searchMonth
back;
            } ?>
        </div>
        <div class="col-12">
            <div class="container-fluid" style="margin-top: 20px">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="main-header">
                                <th rowspan="2">Sr.no</th>
                                <th rowspan="2">Date</th>
                                <th rowspan="2">UHID NO.</th>
                                <th rowspan="2">IPD NO.</th>
                                <th rowspan="2">Bed (ICU/WARD) NO.</th>
                                <th rowspan="2">Patient Name </th>
                                <th rowspan="2">Dignosis</th>
                                <th rowspan="2">Surgery Description</th>
                                <th rowspan="2">Description of Surgical Compilcation</th>
                                <th colspan="5" rowspan="1">Outcome of Complication</th>
                            </tr>
                            <tr>
                                <th>No Treatment</th>
                                <th>Medical</th>
                                <th>Surgical</th>
                                <th>ICU</th>
                                <th>Death</th>
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
                                echo '<td>' . $res['uhid'] . '</td>';
                                echo '<td>' . $res['ipd'] . '</td>';
                                echo '<td>' . $res['ward'] . '</td>';
                                echo '<td>' . $res['name'] . '</td>';
                                echo '<td>' . $res['digonsis'] . '</td>';
                                echo '<td>' . $res['description'] . '</td>';
                                echo '<td>' . $res['complication'] . '</td>';
                                echo '<td>' . $res['no_treatment'] . '</td>';
                                echo '<td>' . $res['medical'] . '</td>';
                                echo '<td>' . $res['surgical'] . '</td>';
                                echo '<td>' . $res['icu'] . '</td>';
                                echo '<td>' . $res['death'] . '</td>';
                                $i++;
                                $sr++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <h6 class="mt-3 text-center">Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>