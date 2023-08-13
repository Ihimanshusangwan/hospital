<?php
$month = $_GET['month'];
require("../admin/connect.php");

$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

if (isset($_POST['submit'])) {
    $loc = $_POST['location'];
    $remark = array();
    $arr_yes_no = array();

    for ($i = 0; $i < 124; $i++) {
        $element = $_POST['yes_no' . $i];
        array_push($arr_yes_no, $element);
    }
    for ($i = 0; $i < 31; $i++) {
        $element = $_POST['remarks' . $i];
        array_push($remark, $element);
    }
    $arr_json = json_encode($arr_yes_no);
    $remark_json = json_encode($remark);
    $sql1 = "UPDATE `floor_cleaning` SET `location`='$loc', `yes_no`='$arr_json', `remark`='$remark_json' WHERE `month`='$month' ";
    $data = $conn->query($sql1);
    if ($data) {
        echo "<div class='alert alert-success'>Updated Successfully</div>";
    }
}
    $check = "SELECT * FROM `floor_cleaning` WHERE `month`='$month' ";
    $query_result = $conn->query($check);
    if ($query_result->num_rows > 0) {
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
    } else {
        $sql = "insert into floor_cleaning (month) values('$month');";
        $conn->query($sql);
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


    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>floor cleaning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style>
        body {
            background: lightgray;
            animation: fade-in 1s linear;
            width: 100% !important;
        }

        .fl {
            animation: gelatine 1s;
        }

        /* .size {
        width: 80px;
        margin: 6px;
    }

    .size1 {
        width: 100px;
        margin: 6px;
    } */

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }

        input {
            background-color: lightgrey;
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
            border: 2px solid black;
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
    </style>
</head>

<body>
    <div class="container">
        <form method="POST">
            <h1 class="text-center text-danger mt-3">
                <?php echo $title['so']; ?>
            </h1>
            <a href="staff_Page.php" class="btn btn-success m-2">Dashboard</a>
            <a href="floor_cleaning_print.php?month=<?php echo $month; ?>" class="btn btn-success m-2">Print</a>
            <h3 class="text-center text-dark mt-3">Wash room and Floor cleaning Check-List</h3>
            <div class="row">
            <div class="col-md-3" style="margin-left: 200px;">
                    <label for=""> Search Month & Year:</label>
                    <input type="month" class="form-control" id="month" placeholder="Month & Year"
                        value="<?php echo $month; ?>">
                </div>
                <div class="col-md-3" style="margin-left: 200px;">
                    <label for="">Location:</label>
                    <input type="text" class="form-control" name="location" placeholder="Location"
                        value="<?php echo $loca; ?>">
                </div>
               
            </div>
            <hr>
            <div>
                <table>
                    <thead class="bg-secondary">
                        <tr>
                            <th scope="col" class="size">Date</th>
                            <th scope="col" class="size">8:00 AM</th>
                            <th scope="col" class="size">2:00 PM</th>
                            <th scope="col" class="size">6:00 PM</th>
                            <th scope="col" class="size">8:00 PM</th>
                            <th scope="col" class="size">House keeping Supervisor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < 31; $i++) {
                            echo '<tr>';
                            for ($j = 0; $j < 6; $j++) {
                                if ($j == 0) {
                                    echo '<td><input type="text" class="form-control size" value="' . ($i + 1) . '"></td>';
                                } else if ($j == 1) {
                                    echo '<td><input type="text" class="form-control size" placeholder="yes/no" name="yes_no' . $i . '" value="' . $arr_norm[$i] . '"></td>';
                                } else if ($j == 2) {
                                    echo '<td><input type="text" class="form-control size" placeholder="yes/no" name="yes_no' . ($i + 31) . '" value="' . $arr_norm[$i + 31] . '"></td>';
                                } else if ($j == 3) {
                                    echo '<td><input type="text" class="form-control size" placeholder="yes/no" name="yes_no' . ($i + 62) . '" value="' . $arr_norm[$i + 62] . '"></td>';
                                } else if ($j == 4) {
                                    echo '<td><input type="text" class="form-control size" placeholder="yes/no" name="yes_no' . ($i + 93) . '" value="' . $arr_norm[$i + 93] . '"></td>';
                                } else {
                                    echo '<td><input type="text" class="form-control size1" name="remarks' . $i . '" value="' . $remarks_norm[$i] . '"></td>';
                                }
                            }
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-primary m-3" name="submit">Submit</button>
            </div>
        </form>
    </div>
    <script>
        document.querySelector("#month").addEventListener("change",()=>{
            var month = document.getElementById("month").value;
            window.location.href=`floor_cleaning.php?month=${month}`;
        })
    </script>
</body>

</html>