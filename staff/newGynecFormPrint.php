<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
error_reporting(0);
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
$sql = "select * from new_gynec_form where id=$id";
$res = $conn->query($sql)->fetch_assoc();
$data = json_decode($res['data'],true);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
        <style type="text/css">
   
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
            .noprint {
                visibility: hidden;
            }
        }
    </style>

</head>

<body class="m-2">

    <div id="button " class="noprint">
    <a href='newGynecForm.php?id=<?php echo $id;?>' class="btn btn-primary noprint">Dashboard</a>
    <a class="btn btn-primary  noprint" onclick="window.print()">Print</a>
    </div>
<?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">New Form </h3>
        <?php include_once("../header/header.php") ?>
        <div class="col">
                    <strong for="deliveryDate">Baby of Mother Name:</strong>
                   <?php echo $data[1]; ?>
                </div>
                <div class="col">
                    <strong for="deliveryDate">Date:</strong>
                    <?php echo $data[2]; ?>
                </div>
                <div class="col">
                    <strong for="deliveryTime">Time:</strong>
                    <?php echo $data[3]; ?>
                </div>
            </div>
            <div class="col">
                    <strong for="deliveryDate">Name of Pediatration:</strong>
                   <?php echo $data[4]; ?>
                </div>
            <div class="col">
                    <strong for="deliveryDate">Note:</strong>
                    <?php echo $data[5]; ?>
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
                <?php echo $data[8]; ?>
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
                <?php echo $data[13]; ?>
            </div>

            <div class="form-group">
                <strong>Any congenital anomaly (Please specify):</strong>
              <?php echo $data[14]; ?>
            </div>

            <div class="form-group">
                <strong>Any other complication (Please specify):</strong>
               <?php echo $data[15]; ?>
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
                <span class="text-muted">If yes, Dose <?php echo $data[17]; ?></span>
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
                    <?php echo $data[19]; ?>
                    </strong>
                </div>
            </div>

            <p>धन्यवाद ...!</p>

        
    
    <script>
        window.print();
    </script>
</body>

</html>