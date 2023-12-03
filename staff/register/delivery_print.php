<?php
require("../../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
if(isset($_GET['date'])){

    $searchDate= $_GET['date'];
    $sql3 = "SELECT * FROM delivery WHERE form_date = '$searchDate';";
                    $data3 = $conn->query($sql3);
  }
  if(isset($_GET['month'])){
  
    $searchMonth= $_GET['month'];
    $sql3 = "SELECT * FROM delivery WHERE form_date LIKE '%$searchMonth%';";
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
            size: A4 Landscape ;
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
                <a href="deliveryRegister.php?date=$searchDate" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
back;
            }
            if(isset($searchMonth)){
                echo<<<back
                <a href="deliveryRegister.php?month=$searchMonth" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
back;
            }
        ?>
    </div>
    <?php include_once("../../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Delivery Register</h3>
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
                                    <th rowspan="2">Reg.no</th>
                                    <th rowspan="2">Date and Time of Admission</th>
                                    <th rowspan="2">Date and Time of Discharge</th>
                                    <th rowspan="2">Name</th>
                                    <th rowspan="2">Address</th>
                                    <th rowspan="2">Age</th>
                                    <th rowspan="2">Husband Name and Edu.</th>
                                    <th rowspan="1" colspan="3">Obstetrics History</th>
                                    <th rowspan="1" colspan="6">Details of Child Birth</th>
                                    <th rowspan="2">Type of Delivery and Implecation of intervention(If Any)</th>
                                    <th rowspan="1" colspan="2">Birth Notification To Municipal Authorities</th>
                                    <th rowspan="2">Mother's religion Education</th>
                                </tr>
                                <tr>
                                    <th>Male</th>
                                    <th>Female</th>
                                    <th>Abortion</th>
                                    <th>Date</th>
                                    <th>Sex</th>
                                    <th>Time</th>
                                    <th>Wt.</th>
                                    <th>Day</th>
                                    <th>O/E</th>
                                    <th>Form No.</th>
                                    <th>Date</th>
                                </tr>
                                <tbody id="tbody">
                                    <?php
                                    while ($res = $data3->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $res['reg'] . '</td>';
                                        echo '<td>' . $res['addmission'] . '</td>';
                                        echo '<td>' . $res['discharge'] . '</td>';
                                        echo '<td>' . $res['name'] . '</td>';
                                        echo '<td>' . $res['address'] . '</td>';
                                        echo '<td>' . $res['age'] . '</td>';
                                        echo '<td>' . $res['husband'] . '</td>';
                                        echo '<td>' . $res['male'] . '</td>';
                                        echo '<td>' . $res['female'] . '</td>';
                                        echo '<td>' . $res['abortion'] . '</td>';
                                        echo '<td>' . $res['child_date'] . '</td>';
                                        echo '<td>' . $res['child_sex'] . '</td>';
                                        echo '<td>' . $res['child_time'] . '</td>';
                                        echo '<td>' . $res['child_weight'] . '</td>';
                                        echo '<td>' . $res['child_day'] . '</td>';
                                        echo '<td>' . $res['oe'] . '</td>';
                                        echo '<td>' . $res['type'] . '</td>';
                                        echo '<td>' . $res['form'] . '</td>';
                                        echo '<td>' . $res['form_date'] . '</td>';
                                        echo '<td>' . $res['religion'] . '</td>';
                                        echo '</tr>';
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