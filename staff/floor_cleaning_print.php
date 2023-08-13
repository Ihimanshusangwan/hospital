<?php
$month = $_GET['month'];
require("../admin/connect.php");

$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
$check = "SELECT * FROM `floor_cleaning` WHERE `month`='$month' ";
$query_result = $conn->query($check);
$res = $query_result->fetch_assoc();

if ($res) {
    $loca = $res['location'];
    $arr_decode = $res['yes_no'];
    $remarks_decode = $res['remark'];
    $arr_norm = json_decode($arr_decode, true);
    $remarks_norm = json_decode($remarks_decode, true);

    // Check if arrays are empty and initialize with default values if necessary
    if (empty($arr_norm)) {
        $arr_norm = array_fill(0, 124, '');
    }
    if (empty($remarks_norm)) {
        $remarks_norm = array_fill(0, 31, '');
    }
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
                margin-top: 30px;
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
        <a href="floor_cleaning.php?month=<?php echo $month; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Washroom and Floor Cleaning Check-List</h3>
    <hr />
    <div class="row">
        <div class="col-6">
            <strong>Location: </strong>
            <?php echo $loca; ?>
        </div>
        <div class="col-6">
            <strong>Month & Year: </strong>
            <?php echo $month; ?>
        </div>
        <div class="col-11 m-3 table-responsive">
            <table class="table table-bordered table-responsive">
                <thead class="bg-secondary">
                    <tr>
                        <th scope="col"  >Date</th>
                        <th scope="col"  >8:00 AM</th>
                        <th scope="col"  >2:00 PM</th>
                        <th scope="col"  >6:00 PM</th>
                        <th scope="col"  >8:00 PM</th>
                        <th scope="col"  >House keeping Supervisor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < 31; $i++) {
                        echo '<tr>';
                        for ($j = 0; $j < 6; $j++) {
                            if ($j == 0) {
                                echo '<td>' . ($i + 1) . '</td>';
                            } else if ($j == 1) {
                                echo '<td>' . $arr_norm[$i] . '</td>';
                            } else if ($j == 2) {
                                echo '<td>' . $arr_norm[$i + 31] . '</td>';
                            } else if ($j == 3) {
                                echo '<td>' . $arr_norm[$i + 62] . '</td>';
                            } else if ($j == 4) {
                                echo '<td>' . $arr_norm[$i + 93] . '</td>';
                            } else {
                                echo '<td>' . $remarks_norm[$i] . '</td>';
                            }
                        }
                        echo '</tr>';

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <h6>Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>