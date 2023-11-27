<?php
require("../admin/connect.php");
error_reporting(0);
$id = $_GET['id'];
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = array();
    for ($i = 1; $i <= 19; $i++) {
        $data[$i] = $_POST[$i];
    }
    $dataToStore = json_encode($data);
    $sql = "select * from new_gynec_form where id = $id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //update
        $sql = "update new_gynec_form set data = '$dataToStore' where id = $id";
        $conn->query($sql);
        echo '<div class="alert alert-success" role="alert">
    <strong>Success!</strong> Your data has been updated successfully.
  </div>
  ';
    } else {
        //insert
        $sql = "insert into new_gynec_form(id,data) values($id,'$dataToStore')";
        $conn->query($sql);
        echo '<div class="alert alert-success" role="alert">
    <strong>Success!</strong> Your data has been submitted successfully.
  </div>
  ';
    }
}
$sql = "select * from new_gynec_form where id=$id";
$res = $conn->query($sql)->fetch_assoc();
$data = json_decode($res['data'], true);
// print_r($data);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
        tboody,
        th,
        td {
            border: 1px solid black;
        }

        input[type="text"] {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 200px;
            height: 35px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px #4CAF50;
        }

        input[type="text"]:hover {
            border-color: #555;
        }

        /* Style for placeholder text inside the input field */
        input[type="text"]::placeholder {
            color: #aaa;
        }

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
        input[type="date"]::placeholder {
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
        input[type="date"] {
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
        input[type="date"]:focus {
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
    <style type="text/css">
        tbody,
        th,
        td {
            border: 1px solid black;
        }

        input[type="text"] {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 200px;
            height: 35px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px #4CAF50;
        }

        input[type="text"]:hover {
            border-color: #555;
        }

        /* Style for placeholder text inside the input field */
        input[type="text"]::placeholder {
            color: #aaa;
        }

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
        input[type="date"]::placeholder {
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
        input[type="date"] {
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
        input[type="date"]:focus {
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
    <a href="staff_Page.php" class="btn btn-primary m-2">Dashboard</a>
    <a href='newGynecFormPrint.php?id=<?php echo $id; ?>' class="btn btn-primary noprint">Print</a>
    <div class="container">
        <form action="" method="post">
            <h3 class="text-center m-4">New Form :</h3>
            <div class="row">
            <div class="col">
                    <strong for="deliveryDate">Baby of Mother Name:</strong>
                    <input type="text" class="form-control" id="deliveryDate" name="1" value='<?php echo $data[1]; ?>'>
                </div>
                <div class="col">
                    <strong for="deliveryDate">Date:</strong>
                    <input type="date" class="form-control" id="deliveryDate" name="2" value='<?php echo $data[2]; ?>'>
                </div>
                <div class="col">
                    <strong for="deliveryTime">Time:</strong>
                    <input type="time" class="form-control" id="deliveryTime" name="3" value='<?php echo $data[3]; ?>'>
                </div>
            </div>
            <div class="col">
                    <strong for="deliveryDate">Name of Pediatration:</strong>
                    <textarea name="4" id=""  class="form-control"><?php echo $data[4]; ?></textarea>
                </div>
            <div class="col">
                    <strong for="deliveryDate">Note:</strong>
                    <textarea name="5" id=""  class="form-control"><?php echo $data[5]; ?></textarea>
                </div>



            <h3 class="text-center m-4">Baby Notes</h3>
            <div class="form-group">
                <strong>Sex of the baby:</strong>
                <div class="radio">
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['6'] == "Male") ? "checked" : ""; ?> name="6" value="Male">
                        Male
                    </strong>
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['6'] == "Female") ? "checked" : ""; ?> name="6"
                            value="Female"> Female
                    </strong>
                </div>
            </div>

            <div class="form-group">
                <strong>Skin-to-skin contact done:</strong>
                <div class="radio">
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['7'] == "Yes") ? "checked" : ""; ?> name="7" value="Yes"> Yes
                    </strong>
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['7'] == "No") ? "checked" : ""; ?> name="7" value="No"> No
                    </strong>
                </div>
            </div>

            <div class="form-group">
                <strong>Birth Weight:</strong>
                <input type="text" class="form-control" name="8" value='<?php echo $data[8]; ?>'>
                <span class="">in Kgs</span>
                <strong>Preterm:</strong>
                <div class="radio">
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['9'] == "Yes") ? "checked" : ""; ?> name="9" value="Yes"> Yes
                    </strong>
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['9'] == "No") ? "checked" : ""; ?> name="9" value="No"> No
                    </strong>
                </div>
            </div>

            <div class="form-group">
                <strong>Did the baby cry immediately after birth:</strong>
                <div class="radio">
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['10'] == "Yes") ? "checked" : ""; ?> name="10" value="Yes"> Yes
                    </strong>
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['10'] == "No") ? "checked" : ""; ?> name="10" value="No"> No
                    </strong>
                </div>
            </div>

            <div class="form-group">
                <strong>If yes, was it initiated in labor room:</strong>
                <div class="radio">
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['11'] == "Yes") ? "checked" : ""; ?> name="11" value="Yes"> Yes
                    </strong>
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['11'] == "No") ? "checked" : ""; ?> name="11" value="No"> No
                    </strong>
                </div>
            </div>

            <div class="form-group">
                <strong>Breastfeeding initiated:</strong>
                <div class="radio">
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['12'] == "Yes") ? "checked" : ""; ?> name="12" value="Yes"> Yes
                    </strong>
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['12'] == "No") ? "checked" : ""; ?> name="12" value="No"> No
                    </strong>
                </div>
            </div>

            <div class="form-group">
                <strong>Time of initiation:</strong>
                <input type="text" class="form-control" name="13" value='<?php echo $data[13]; ?>'>
            </div>

            <div class="form-group">
                <strong>Any congenital anomaly (Please specify):</strong>
                <input type="text" class="form-control" name="14" value='<?php echo $data[14]; ?>'>
            </div>

            <div class="form-group">
                <strong>Any other complication (Please specify):</strong>
                <input type="text" class="form-control" name="15" value='<?php echo $data[15]; ?>'>
            </div>

            <div class="form-group">
                <strong>Injection Vitamin K1 administered:</strong>
                <div class="radio">
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['16'] == "Yes") ? "checked" : ""; ?> name="16" value="Yes"> Yes
                    </strong>
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['16'] == "No") ? "checked" : ""; ?> name="16" value="No"> No
                    </strong>
                </div>
                <span class="text-muted">If yes, Dose <input type="text" class="form-control-sm" name="17"
                        value='<?php echo $data[17]; ?>'></span>
            </div>

            <div class="form-group">
                <strong>Vaccination done:</strong>
                <div class="radio">
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['18'] == "BCG") ? "checked" : ""; ?> name="18" value="BCG"> BCG
                    </strong>
                    <strong class="radio-inline">
                        <input type="radio" <?php echo ($data['18'] == "Hep B") ? "checked" : ""; ?> name="18" value="Hep B">
                        Hep B
                    </strong>
                </div>
            </div>

            <div class="form-group">
                <strong>Temperature of baby:</strong>
                <div class="radio">
                    <strong class="radio-inline">
                        <input type="text" class="form-control" name="19" value='<?php echo $data[19]; ?>'>
                    </strong>
                </div>
            </div>

            <p>धन्यवाद ...!</p>




            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>