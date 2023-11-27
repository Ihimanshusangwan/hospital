<?php
session_start();
require("../../admin/connect.php");
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

    <?php if (isset($_GET['date'])) {
        $searchDate = $_GET['date'];
        $sql3 = "SELECT * FROM delivery WHERE form_date = '$searchDate';";
        $data3 = $conn->query($sql3);
    }
    if (isset($_GET['month'])) {

        $searchMonth = $_GET['month'];
        $sql3 = "SELECT * FROM delivery WHERE form_date LIKE '%$searchMonth%' order by form_date;";
        $data3 = $conn->query($sql3);
    }

    ?>
    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <a href="../staff_Page.php" class="btn btn-success m-2">Dashboard</a>
        <div class="row">
            <div class="form-group col-6">
                <label for="date" style="display: inline-block; width: 100px;">Search Date:</label>
                <input class="form-control" type="date" name="search_date" id="search_date"
                    style="display: inline-block; width: 200px; margin-left: 10px;" <?php if (isset($_GET['date'])) {
                        echo "value='" . $_GET['date'] . "'";
                    } ?>>
            </div>
            <div class="form-group col-6">
                <label for="date" style="display: inline-block; width: 150px;">Search Month:</label>
                <input class="form-control" type="month" name="search_month" id="search_month"
                    style="display: inline-block; width: 200px; margin-left: 10px;" <?php if (isset($_GET['month'])) {
                        echo "value='" . $_GET['month'] . "'";
                    } ?>>
            </div>

            <h3 class="text-center text-dark mt-3">delivery Register</h3>
        </div>

        <form method="POST" action="">
            <div class="container-fluid" style="margin-top: 20px">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
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
                        <?php if (isset($searchDate)) {
                            echo <<<print

            <a href="delivery_print.php?date=$searchDate" class="btn btn-info btn-lg" id="print">Print</a>
print;
                        }
                        if (isset($searchMonth)) {
                            echo <<<print
                <a href="delivery_print.php?month=$searchMonth" class="btn btn-info btn-lg" id="print">Print</a>
    print;
                        }
                        ?>
                    </div>
                </div>
            </div>
    </div>
    </div>

    </form>

    <script>
        document.getElementById('search_date').addEventListener("change", () => {
            let searchDate = document.getElementById('search_date').value;
            window.location.href = `deliveryRegister.php?date=${searchDate}`;

        })
        document.getElementById('search_month').addEventListener("change", () => {
            let searchMonth = document.getElementById('search_month').value;
            window.location.href = `deliveryRegister.php?month=${searchMonth}`;

        })
    </script>
</body>

</html>