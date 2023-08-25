<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

if (isset($_POST['submit'])) {

    $sur = $_POST['sur'];
    $ass = $_POST['ass'];
    $nurse = $_POST['nurse'];
    $hca = $_POST['hca'];
    $visit = $_POST['visit'];
    $date = $_POST['date'];
    $s_time = $_POST['s_time'];
    $e_time = $_POST['e_time'];
    $proc = $_POST['proc'];
    $ana = $_POST['ana'];
    $com = $_POST['com'];
    $refer = $_POST['refer'];
    $eye = $_POST['eye'];
    $ot = $_POST['ot'];
    $case_no = $_POST['case_no'];
    $emr = $_POST['emr'];
    $mpm = $_POST['mpm'];
    $o2 = $_POST['o2'];
    $la = $_POST['la'];
    $yes = $_POST['yes'];
    $lig = $_POST['lig'];
    $ml = $_POST['ml'];
    $con = $_POST['con'];
    $beta = $_POST['beta'];
    $pos = $_POST['pos'];
    $inc = $_POST['inc'];



    $update2 = "UPDATE `cor1` SET 
    `sur` = '$sur',
  `ass` = '$ass',
  `nurse` = '$nurse',
  `hca` = '$hca',
  `visit` = '$visit',
  `date`= '$date',
  `s_time`= '$s_time',
  `e_time`= '$e_time',
  `proc` = '$proc',
  `ana` = '$ana',
  `com` = '$com',
  `refer` = '$refer',
  `eye` = '$eye',
  `ot` = '$ot',
  `case_no` = '$case_no',
  `emr` = '$emr',
  `mpm` =     '$mpm',
  `o2`   =   '$o2',
  `la`   =   '$la',
  `yes`    =  '$yes',
  `lig`    =  '$lig',
  `ml`   =   '$ml',
  `con`    =  '$con',
  `pos`    =  '$pos',
  `inc`    =  '$inc',
  `beta`    = '$beta'
   WHERE `id` = '$id'";
    $conn->query($update2);

    if (isset($_REQUEST['val1'])) {
        $val1 = $_REQUEST['val1'];
    } else {
        $val1 = "off";
    }
    if (isset($_REQUEST['val2'])) {
        $val2 = $_REQUEST['val2'];
    } else {
        $val2 = "off";
    }
    if (isset($_REQUEST['val3'])) {
        $val3 = $_REQUEST['val3'];
    } else {
        $val3 = "off";
    }
    if (isset($_REQUEST['val4'])) {
        $val4 = $_REQUEST['val4'];
    } else {
        $val4 = "off";
    }
    if (isset($_REQUEST['val5'])) {
        $val5 = $_REQUEST['val5'];
    } else {
        $val5 = "off";
    }
    if (isset($_REQUEST['val6'])) {
        $val6 = $_REQUEST['val6'];
    } else {
        $val6 = "off";
    }
    if (isset($_REQUEST['val7'])) {
        $val7 = $_REQUEST['val7'];
    } else {
        $val7 = "off";
    }
    if (isset($_REQUEST['val8'])) {
        $val8 = $_REQUEST['val8'];
    } else {
        $val8 = "off";
    }
    if (isset($_REQUEST['val9'])) {
        $val9 = $_REQUEST['val9'];
    } else {
        $val9 = "off";
    }
    if (isset($_REQUEST['val10'])) {
        $val10 = $_REQUEST['val10'];
    } else {
        $val10 = "off";
    }
    if (isset($_REQUEST['val11'])) {
        $val11 = $_REQUEST['val11'];
    } else {
        $val11 = "off";
    }
    if (isset($_REQUEST['val12'])) {
        $val12 = $_REQUEST['val12'];
    } else {
        $val12 = "off";
    }
    if (isset($_REQUEST['val13'])) {
        $val13 = $_REQUEST['val13'];
    } else {
        $val13 = "off";
    }

    $description = '{"0":{"name":"Eye Cleaned","value":"' . $val1 . '"},"1":{"name":"Dressing with betadine solution done","value":"' . $val2 . '"},"2":{"name":"Peribulbar block/LA with 6ml of 2% lignocaine and adreline injected.","value":"' . $val3 . '"},"3":{"name":"Dressing with betadine done","value":"' . $val4 . '"},"4":{"name":"Eye Drapping Done","value":"' . $val5 . '"},"5":{"name":"Pterygium mass excised","value":"' . $val6 . '"},"6":{"name":"Mild cautery applied","value":"' . $val7 . '"},"7":{"name":"Corneal surface smoothed with crescent blade","value":"' . $val8 . '"},"8":{"name":"Amminiotic Membrane Graft applied over bare surface and sutured with 10-0 vicryl","value":"' . $val9 . '"},"9":{"name":"Eye draped removed","value":"' . $val10 . '"},"10":{"name":"5% betadine eye drop applied","value":"' . $val11 . '"},"11":{"name":"Eye Patched","value":"' . $val12 . '"},"12":{"name":"Surgery concluded","value":"' . $val13 . '"}}';

    $update_last = "UPDATE `cor1` SET  description = '$description' WHERE id = '$id';";
    $conn->query($update_last);

    echo "<div class='alert alert-success'> Updated Successfully</div>";

    $sql4 = "SELECT * FROM cor1 WHERE id = '$id';";
    $data4 = $conn->query($sql4);
    $res4 = $data4->fetch_assoc();


} else {
    $sql4 = "SELECT * FROM cor1 WHERE id = '$id';";
    $data4 = $conn->query($sql4);
    $res4 = $data4->fetch_assoc();
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
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a href="OT.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Patient's Name</label>
                        <input name="regno" value="<?php echo $res['name']; ?>" type="text" class="form-control"
                            id="reg" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Surgeon</label>
                        <input name="sur" value="<?php echo $res4['sur']; ?>" type="text" class="form-control" id="reg">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Assistant</label>
                        <input name="ass" value="<?php echo $res4['ass']; ?>" type="text" class="form-control" id="reg">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Nurse</label>
                        <input name="nurse" value="<?php echo $res4['nurse']; ?>" type="text" class="form-control"
                            id="reg">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">HCA</label>
                        <input name="hca" value="<?php echo $res4['hca']; ?>" type="text" class="form-control"
                            id="name">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Visitors :</label>
                        <input name="visit" value="<?php echo $res4['visit']; ?>" type="text" class="form-control"
                            id="name">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Date :</label>
                        <input name="date" value="<?php echo $res4['date']; ?>" type="date" class="form-control"
                            id="DOA">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="time_ad">Surgery Start TIme :</label>
                        <input name="s_time" value="<?php echo $res4['s_time']; ?>" type="time" class="form-control"
                            id="time_ad" placeholder="Time of Admission" value="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="time_ad">Surgery Ending TIme :</label>
                        <input name="e_time" value="<?php echo $res4['e_time']; ?>" type="time" class="form-control"
                            id="time_ad" placeholder="Time of Admission" value="">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">PROCEDURE</label>
                                <textarea name="proc" value="<?php echo $res4['proc']; ?>" type="text"
                                    class="form-control live-fetch" id="inputAddress"
                                    data-column="proc" data-table="cor1" ><?php echo $res4['proc']; ?></textarea>
                                <div class="dropdown-container"></div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Anaesthesia</label>
                                <input name="ana" value="<?php echo $res4['ana']; ?>" type="tel" class="form-control"
                                    id="inputAddress">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Complication:</label>
                                <input name="com" value="<?php echo $res4['com']; ?>" type="text" class="form-control"
                                    id="inputAddress" placeholder="Consultant Name">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Referred By:</label>
                                <input name="refer" value="<?php echo $res4['refer']; ?>" type="text"
                                    class="form-control" id="inputAddress" placeholder="Referred by">
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label">Eye :</label>
                                <input name="eye" value="<?php echo $res4['eye']; ?>" type="text" class="form-control"
                                    id="weight">

                            </div>
                            <div class="col-md-2">
                                <label class="form-label">O.T. No :</label>
                                <input name="ot" value="<?php echo $res4['ot']; ?>" type="text" class="form-control"
                                    id="weight">

                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Case No :</label>
                                <input name="case_no" value="<?php echo $res4['case_no']; ?>" type="text"
                                    class="form-control" id="weight">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">E.M.R. No :</label>
                                <input name="emr" value="<?php echo $res4['emr']; ?>" type="text" class="form-control"
                                    id="weight">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Position :</label>
                                <input name="pos" value="<?php echo $res4['pos']; ?>" type="text" class="form-control"
                                    id="weight">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Incigen :</label>
                                <input name="inc" value="<?php echo $res4['inc']; ?>" type="text" class="form-control"
                                    id="weight">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Procedure</th>
                                <th scope="col">Description</th>
                                <th scope="col">Complications</th>
                                <th scope="col">Comment</th>
                                <th scope="col">
                                    <label>MPM</label>
                                    <input class="col-2" type="text" name="mpm" value="<?php echo $res4['mpm']; ?> ">
                                </th>
                                <th scope="col">Status</th>
                                <th scope="col">
                                    <label>O2</label>
                                    <input class="col-2" type="text" name="o2" value="<?php echo $res4['o2']; ?> ">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Anasthesia</th>
                                <td>
                                    <select name="la">


                                        <option value="LA" <?php if ($res4['la'] == 'LA') {
                                            echo 'selected';
                                        } ?>>LA</option>
                                        <option value="GA" <?php if ($res4['la'] == 'GA') {
                                            echo 'selected';
                                        } ?>>GA</option>
                                        <option value="TA" <?php if ($res4['la'] == 'TA') {
                                            echo 'selected';
                                        } ?>>TA</option>
                                        <option value="Peribulbar" <?php if ($res4['la'] == 'Peribulbar') {
                                            echo 'selected';
                                        } ?>>Peribulbar</option>
                                        <option value="Supplement" <?php if ($res4['la'] == 'Supplement') {
                                            echo 'selected';
                                        } ?>>Supplement</option>
                                        <option value="Retrobulbar" <?php if ($res4['la'] == 'Retrobulbar') {
                                            echo 'selected';
                                        } ?>>Retrobulbar</option>
                                        <option value="No Anaesthesia" <?php if ($res4['la'] == 'No Anaesthesia') {
                                            echo 'selected';
                                        } ?>>No Anaesthesia</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="yes">


                                        <option value="Yes" <?php if ($res4['yes'] == 'Yes') {
                                            echo 'selected';
                                        } ?>>Yes</option>
                                        <option value="No" <?php if ($res4['yes'] == 'No') {
                                            echo 'selected';
                                        } ?>>No</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="lig">


                                        <option value="2% Lignocane HCL" <?php if ($res4['lig'] == '2% Lignocane HCL') {
                                            echo 'selected';
                                        } ?>>2% Lignocane HCL</option>
                                        <option value="Preservative Free" <?php if ($res4['lig'] == 'Preservative Free') {
                                            echo 'selected';
                                        } ?>>Preservative Free</option>
                                        <option value="2% Lignocane HCL" <?php if ($res4['lig'] == '2% Lignocane HCL') {
                                            echo 'selected';
                                        } ?>>2% Lignocane HCL</option>
                                        <option value="0.5% Sensorcane" <?php if ($res4['lig'] == '0.5% Sensorcane') {
                                            echo 'selected';
                                        } ?>>0.5% Sensorcane</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="col-2" type="text" name="ml" value="<?php echo $res4['ml']; ?>">
                                    <label>ml</label>
                                </td>
                                <td>
                                    <select name="con">


                                        <option value="Concious" <?php if ($res4['con'] == 'Concious') {
                                            echo 'selected';
                                        } ?>>Concious</option>

                                        <option value="Comfortable" <?php if ($res4['con'] == 'Comfortable') {
                                            echo 'selected';
                                        } ?>>Comfortable</option>
                                        <option value="Co-orperation" <?php if ($res4['con'] == 'Co-orperation') {
                                            echo 'selected';
                                        } ?>>Co-orperation</option>
                                        <option value="None" <?php if ($res4['con'] == 'None') {
                                            echo 'selected';
                                        } ?>>None</option>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">ASD & Drape</th>
                                <td>
                                    <select name="beta">


                                        <option value="Betadine" <?php if ($res4['beta'] == 'Betadine') {
                                            echo 'selected';
                                        } ?>>Betadine</option>
                                        <option value="RL" <?php if ($res4['beta'] == 'RL') {
                                            echo 'selected';
                                        } ?>>RL</option>
                                        <option value="NS" <?php if ($res4['beta'] == 'NS') {
                                            echo 'selected';
                                        } ?>>NS</option>
                                        <option value="Poly drape" <?php if ($res4['beta'] == 'Poly drape') {
                                            echo 'selected';
                                        } ?>>Poly drape</option>
                                        <option value="Other" <?php if ($res4['beta'] == 'Other') {
                                            echo 'selected';
                                        } ?>>Other</option>

                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="container">
                    <h2 class="text-center mt-3">Operation Note</h2>
                    <?php
                    $query = "SELECT * FROM cor1 WHERE id=$id;";
                    $result = $conn->query($query);
                    if ($result && $result->num_rows > 0) {
                        $bill = $result->fetch_assoc();
                        $data = $bill['description'];
                        $bills = json_decode($data, true);
                        if ($bills !== null) {
                            $checkboxes = [
                                'Eye Cleaned',
                                'Dressing with betadine solution done',
                                'Peribulbar block/LA with 6ml of 2% lignocaine and adreline injected.',
                                'Dressing with betadine done',
                                'Eye Drapping Done',
                                'Pterygium mass excised',
                                'Mild cautery applied',
                                'Corneal surface smoothed with crescent blade',
                                'Amminiotic Membrane Graft applied over bare surface and sutured with 10-0 vicryl',
                                'Eye draped removed',
                                '5% betadine eye drop applied',
                                'Eye Patched',
                                'Surgery concluded'
                            ];
                            foreach ($checkboxes as $index => $label) {
                                $checkboxName = 'val' . ($index + 1);
                                $checkboxValue = isset($bills[$index]['value']) && $bills[$index]['value'] === 'on' ? 'checked' : '';

                                echo '<div class="col-md-12">';
                                echo '<input type="checkbox" class="m-2" name="' . $checkboxName . '" ' . $checkboxValue . '>';
                                echo '<label>' . $label . '</label>';
                                echo '</div>';
                            }

                        } else {
                            echo "Error decoding JSON: " . json_last_error_msg();
                        }
                    } else {
                        echo "No bill found.";
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col mt-2">
                        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit"
                            id="submit">Submit</button>
                        <a href="cornealProcedure_print.php?id=<?php echo $id; ?> " class="btn btn-info ">Print</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var valuesRetrieved = <?php echo isset($res4['date']) ? 'true' : 'false'; ?>;
        updateDateTimeInputs();
        function formatTime(date) {
            var hours = date.getHours().toString().padStart(2, '0');
            var minutes = date.getMinutes().toString().padStart(2, '0');
            return hours + ':' + minutes;
        }

        function updateDateTimeInputs() {
            if (!valuesRetrieved) {
                var currentDate = new Date().toISOString().slice(0, 10);  // Get current date in YYYY-MM-DD format
                var currentTime = formatTime(new Date());  // Get current time in HH:mm format

                document.getElementById("DOA").value = currentDate;  // Set the value of date input
                document.getElementById("time_ad").value = currentTime;  // Set the value of time inputs
            }
        }

        setInterval(updateDateTimeInputs, 60000);


    </script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#submit').click(function () {
            var examination_finding = $('#examination_finding').val();
            if (examination_finding == 'new') {
                $.ajax({
                    type: 'POST',
                    url: 'suggestion.php',
                    data: {
                        examination_finding_text: $('#examination_finding_text').val()
                    }
                });
            }
        });
        $('#submit').click(function () {
            var examination_finding = $('#treatment').val();
            if (examination_finding == 'new') {
                $.ajax({
                    type: 'POST',
                    url: 'suggestion.php',
                    data: {
                        treatment: $('#treatment_value').val()
                    }
                });
            }
        });
        $('#examination_finding').change(function () {
            var examination_finding = $('#examination_finding').val();
            if (examination_finding != 'new') {
                document.getElementById("examination_finding_text").value = examination_finding;
            }
        });
        $(document).ready(function () {
            var other_com = $('#other_com').val();
            if (other_com == 'custom') {
                $('#other_com_value').show();
                $("#other_com").removeAttr("name");
            }

        });
        $('#other_com').change(function () {
            var other_com = $('#other_com').val();
            if (other_com == 'custom') {
                $('#other_com_value').show();
                $("#other_com").removeAttr("name");
            }
        });
    </script>
    <script src="../fetch_dropdown_script.js"></script>
</body>

</html>