<?php
session_start();
if (!isset($_SESSION['staff_id'])) {
    header("location:login.php");
}
require("../admin/connect.php");
$id = $_GET['id'];
error_reporting(0);
if (isset($_POST['submit'])) {

    $register = "select * from evacuation where id = '$id'; ";
    $reg_result = $conn->query($register);
    if ($reg_result->num_rows == 1) {
        // update
        $update = "UPDATE `evacuation`
SET
  `date` = '{$_POST['date']}',
  `name` = '{$_POST['name']}',
  `wifeof` = '{$_POST['wifeof']}',
  `age` = '{$_POST['age']}',
  `address` = '{$_POST['address']}',
  `uterine` = '{$_POST['uterine']}',
  `diagnosis` = '{$_POST['diagnosis']}',
  `evac_method` = '{$_POST['evac_method']}',
  `other_method` = '{$_POST['other_method']}',
  `contraceptive_tl` = '{$_POST['contraceptive_tl']}',
  `contraceptive_ocps` = '{$_POST['contraceptive_ocps']}',
  `contraceptive_cc` = '{$_POST['contraceptive_cc']}',
  `contraceptive_iucd` = '{$_POST['contraceptive_iucd']}',
  `contraceptive_other` = '{$_POST['contraceptive_other']}',
  `contraceptive_none` = '{$_POST['contraceptive_none']}',
  `other_contraceptive` = '{$_POST['other_contraceptive']}',
  `doctor` = '{$_POST['doctor']}',
  `remark` = '{$_POST['remark']}'
WHERE `id` = $id;";
        $conn->query($update);
    } else {
        // insert
        $insert = "INSERT INTO `evacuation`
        (`date`, `name`, `wifeof`, `age`, `address`, `uterine`, `diagnosis`, `evac_method`, `other_method`, `contraceptive_tl`, `contraceptive_ocps`, `contraceptive_cc`, `contraceptive_iucd`, `contraceptive_other`, `contraceptive_none`, `other_contraceptive`, `doctor`, `remark`, `id`)
        VALUES
        (
          '{$_POST['date']}',
          '{$_POST['name']}',
          '{$_POST['wifeof']}',
          '{$_POST['age']}',
          '{$_POST['address']}',
          '{$_POST['uterine']}',
          '{$_POST['diagnosis']}',
          '{$_POST['evac_method']}',
          '{$_POST['other_method']}',
          '{$_POST['contraceptive_tl']}',
          '{$_POST['contraceptive_ocps']}',
          '{$_POST['contraceptive_cc']}',
          '{$_POST['contraceptive_iucd']}',
          '{$_POST['contraceptive_other']}',
          '{$_POST['contraceptive_none']}',
          '{$_POST['other_contraceptive']}',
          '{$_POST['doctor']}',
          '{$_POST['remark']}',
          $id
        );";

        $conn->query($insert);

    }
    echo "<div class='alert alert-success'> Updated Successfully</div>";
}
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();
$sql = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
$data1 = $conn->query($sql);
$res1 = $data1->fetch_assoc();
$sql = "SELECT * FROM evacuation WHERE id = '$id';";
$data2 = $conn->query($sql);
$res2 = $data2->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="../dropdown_styles.css">
    <style type="text/css">
        body {
            margin: 30px;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }
    </style>
    <style type="text/css">
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
        input[type="date"]::placeholder,
        input[type="tel"]::placeholder,
        input[type="number"]::placeholder {
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
    <title>Evacuation Register</title>
</head>

<body>
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a href="gynec_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>
            <h1 class="text-center mb-5 text-primary">Evacuation Register</h1>
<form action="" method='POST'>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Date</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="date"
                            value="<?php echo $res2['date']; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name of Patient:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                            value="<?php echo $res['name']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Wife / Daughter of</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name='wifeof'
                            value="<?php echo $res2['wifeof']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Age(in years)</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="age"
                            value="<?php echo $res['age']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="address"
                            value="<?php echo $res['address']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Uterine Size (in weeks)</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name='uterine'
                            value="<?php echo $res2['uterine']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="text-center">Diagnosis (Tick only one appropriate option)</h4>
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="diagnosis" id="incomplete"
                            value="Incomplete / Spontaneous Abortion" <?php if ($res2['diagnosis'] === 'Incomplete / Spontaneous Abortion')
                                echo 'checked'; ?>>
                        <label class="form-check-label" for="incomplete">
                            Incomplete / Spontaneous Abortion
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="diagnosis" id="missed"
                            value="Missed Abortion" <?php if ($res2['diagnosis'] === 'Missed Abortion')
                                echo 'checked'; ?>>
                        <label class="form-check-label" for="missed">
                            Missed Abortion
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="diagnosis" id="septic"
                            value="Septic Abortion" <?php if ($res2['diagnosis'] === 'Septic Abortion')
                                echo 'checked'; ?>>
                        <label class="form-check-label" for="septic">
                            Septic Abortion
                        </label>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="diagnosis" id="molar"
                            value="Molar Pregnancy / Others" <?php if ($res2['diagnosis'] === 'Molar Pregnancy / Others')
                                echo 'checked'; ?>>
                        <label class="form-check-label" for="molar">
                            Molar Pregnancy / Others
                        </label>
                    </div>
                </div>

            </div>
            <div class="row">
                <h4 class="text-center">Uterine Evacuation Method</h4>
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="evac_method" id="mva" value="MVA" <?php if ($res2['evac_method'] === 'MVA')
                            echo 'checked'; ?>>
                        <label class="form-check-label" for="mva">
                            MVA
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="evac_method" id="eva" value="EVA" <?php if ($res2['evac_method'] === 'EVA')
                            echo 'checked'; ?>>
                        <label class="form-check-label" for="eva">
                            EVA
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="evac_method" id="dc" value="D & C" <?php if ($res2['evac_method'] === 'D & C')
                            echo 'checked'; ?>>
                        <label class="form-check-label" for="dc">
                            D & C
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="evac_method" id="others" value="Others" <?php if ($res2['evac_method'] === 'Others')
                            echo 'checked'; ?>>
                        <label class="form-check-label" for="others">
                            Others
                        </label>
                        <input type="text" class="form-control" id="otherMethod" name="other_method"
                            value="<?php echo ($res2['evac_method'] === 'Others') ? $res2['other_method'] : ''; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
    <h4 class="text-center">Contraceptive Received</h4>
    <div class="col-md-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="contraceptive_tl" value="Tubal Ligation (TL)" id="tl" <?php if (isset($res2['contraceptive_tl']) && $res2['contraceptive_tl'] == 'Tubal Ligation (TL)') echo 'checked'; ?>>
            <label class="form-check-label" for="tl">
                Tubal Ligation (TL)
            </label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="contraceptive_cc" value="Condom (CC)" id="cc" <?php if (isset($res2['contraceptive_cc']) && $res2['contraceptive_cc'] == 'Condom (CC)') echo 'checked'; ?>>
            <label class="form-check-label" for="cc">
                Condom (CC)
            </label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="contraceptive_ocps" value="Oral Pills (OCPs)" id="ocps" <?php if (isset($res2['contraceptive_ocps']) && $res2['contraceptive_ocps'] == 'Oral Pills (OCPs)') echo 'checked'; ?>>
            <label class="form-check-label" for="ocps">
                Oral Pills (OCPs)
            </label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="contraceptive_iucd" value="IUCD/CuT" id="iucd" <?php if (isset($res2['contraceptive_iucd']) && $res2['contraceptive_iucd'] == 'IUCD/CuT') echo 'checked'; ?>>
            <label class="form-check-label" for="iucd">
                IUCD/CuT
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="contraceptive_other" value="Other (OTH)" id="other" <?php if (isset($res2['contraceptive_other']) && $res2['contraceptive_other'] == 'Other (OTH)') echo 'checked'; ?>>
            <label class="form-check-label" for="other">
                Other (OTH)
            </label>
            <input type="text" class="form-control" id="otherContraceptive" name="other_contraceptive" value="<?php echo (isset($res2['contraceptive_other'])) ? $res2['other_contraceptive'] : ''; ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="contraceptive_none" value="None (NO)" id="none" <?php if (isset($res2['contraceptive_none']) && $res2['contraceptive_none'] == 'None (NO)') echo 'checked'; ?>>
            <label class="form-check-label" for="none">
                None (NO)
            </label>
        </div>
    </div>
</div>


            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name of the Doctor By whom the
                            procedure is conducted</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="doctor"
                            value="<?php echo $res2['doctor']; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Remark</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="remark"
                            value="<?php echo $res2['remark']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mt-2">
                    <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit"
                        id="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>