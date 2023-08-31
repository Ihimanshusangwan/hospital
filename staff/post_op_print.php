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
$sql3 = "SELECT * FROM post_opnotes WHERE pt_id = '$id';";
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
        <a href="post_opnotes.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Post Operative Notes</h3>
    <?php include_once("../header/header.php") ?>
<div class="text-center"  style="overflow:auto;">
            <table class="table table-bordered  border-secondary">
                <thead >
                <tr class="main-header">
                    <th>Sno</th>
                    <th >Time</th>
                    <th >Pulse</th>
                    <th>BP</th>
                    <th>IV Fluid</th>
                    <th>Relaxant</th>
                    <th>IV Drugs</th>
                    <th>Urine Output</th>
                </tr>
               
               
                </thead>
                <tbody id="tbody">
                <?php
                  $i = 1;
                  $sr = 1;
                  while ($res = $data3->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $sr . '</td>';
                    echo '<td>' . $res['time'] . '</td>';
                    echo '<td>' . $res['pulse'] . '</td>';
                    echo '<td>' . $res['bp'] . '</td>';
                    echo '<td>' . $res['fluid'] . '</td>';
                    echo '<td>' . $res['relaxant'] . '</td>';
                    echo '<td>' . $res['drug'] . '</td>';
                    echo '<td>' . $res['urine_output'] . '</td>';
                   echo '</tr>';
                    $i++;
                    $sr++;
                  }
                  ?>
                </tbody>
            </table>
           
                <br>
    <h6 class="mt-2" >Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>