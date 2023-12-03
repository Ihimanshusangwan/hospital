<?php
require("../../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
if(isset($_GET['date'])){

    $searchDate= $_GET['date'];
    $sql3 = "SELECT * FROM fumigation WHERE date = '$searchDate';";
                    $data3 = $conn->query($sql3);
  }
  if(isset($_GET['month'])){
  
    $searchMonth= $_GET['month'];
    $sql3 = "SELECT * FROM fumigation WHERE date LIKE '%$searchMonth%';";
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
            size: A4 ;
        }

        .noprint {
            visibility: hidden;
        }

        body {
            margin: 0;
        }

    }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <?php 
            if(isset($searchDate)){
                echo<<<back
                <a href="fumigationRegister.php?date=$searchDate" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
back;
            }
            if(isset($searchMonth)){
                echo<<<back
                <a href="fumigationRegister.php?month=$searchMonth" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
back;
            }
        ?>
    </div>
    <?php include_once("../../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Fumigation Register</h3>
    <hr />
    <div class="row">
        <div class="col-12">
            <?php if(isset($_GET['date'])){
                echo<<<back
                <strong> Date: </strong> $searchDate
back;
            }
            if(isset($_GET['month'])){
                echo<<<back
                <strong> Month: </strong> $searchMonth
back;
            }?>
        </div>
        <div class="col-12">
            <div class="container-fluid" style="margin-top: 20px">
                <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                  <th rowspan="2">Sr.no</th>
                  <th rowspan="2">Date</th>
                  <th rowspan="2">OT. NO.</th>
                  <th rowspan="2">Fumigation Method</th>
                  <th rowspan="1" colspan="3">Started By</th>
                  <th rowspan="1" colspan="3">Supervised By</th>
                  <th rowspan="2">Remark</th>
                </tr>
                <tr>
                    <th>Time</th>
                    <th>Name</th>
                    <th>Sign</th>
                    <th>Time</th>
                    <th>Name</th>
                    <th>Sign</th>
                    
                </tr>
                <tbody id="tbody">
                <?php
                  $sr = 1;
                  while ($res = $data3->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $sr . '</td>';
                    echo '<td>' . $res['date'] .'</td>';
                    echo '<td>' . $res['ot'] . '</td>';
                    echo '<td>' . $res['method'] . '</td>';
                    echo '<td>' . $res['s_time'] . '</td>';
                    echo '<td>' . $res['s_name'] . '</td>';
                    echo '<td>' . $res['s_sign'] . '</td>';
                    echo '<td>' . $res['f_time'] . '</td>';
                    echo '<td>' . $res['f_name'] . '</td>';
                    echo '<td>' . $res['f_sign'] . '</td>';
                    echo '<td>' . $res['remarks'] . '</td>';
                    echo '</tr>';
                    $sr++;
                  }
                  ?>
                </tbody>
              </table>
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