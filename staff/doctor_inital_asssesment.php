<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res0 = $data->fetch_assoc();

  $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
  $data1 = $conn->query($sql1);
  $res1 = $data1->fetch_assoc();

  $sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res3 = $data2->fetch_assoc();

  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  
  if(isset($_POST['submit'])){
    $contactNo = $_POST['contact_no'];
    $address = $_POST['address'];
    $reimbursement = $_POST['reimbursement'];
    $weight = $_POST['weight'];
    $omlicNumber = $_POST['omlic_number'];
    $inchargeDoctor = $_POST['incharge_doctor'];
    $provisionalDiagnosis = $_POST['provisional_diagnosis'];
    $finalDiagnosis = $_POST['final_diagnosis'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $obstetricHistory = $_POST['obstetric-history'];
    $menarche = $_POST['menarche'];
    $lmp = $_POST['LMP'];
    $para = $_POST['Para'];
    $gavida = $_POST['Gavdia'];
    $allergies = $_POST['allergies'];
    $rs = $_POST['rs'];
$cvs = $_POST['cvs'];
$cns = $_POST['cns'];
$pa = $_POST['pa'];
    $familyHistory = $_POST['family-history'];
    $previousOperationsAccidents = $_POST['operation-accidents'];
    $educationStatus = $_POST['education-status'];
    $build = $_POST['build'];
    $anemia = $_POST['anemia'];
    $edema = $_POST['edema'];
    $rr = $_POST['rr'];
    $cyanosis = $_POST['cyanosis'];
    $bp = $_POST['bp'];
    $th = $_POST['th'];
    $weight1 = $_POST['weight1'];
    $pulse = $_POST['pulse'];
    $discharge = $_POST['discharge'];
    $jvp = $_POST['jvp'];
    $skin = $_POST['skin'];
    $duration = $_POST['duration'];
    $presentingComplaint = $_POST['presenting-complaint'];
    $history = $_POST['history'];
    $provisionalDiagnosis1 = $_POST['provisional-diagnosis1'];
    $differentialDiagnosis1 = $_POST['differential-diagnosis1'];
    $submitName = $_POST['submit_name'];
    $occupation = $_POST['occupation'];
    $lcterus = $_POST['lcterus'];
    
    $sql = "UPDATE doctor_initail_assesment
        SET contact_no = '$contactNo',
            address = '$address',
            reimbursement = '$reimbursement',
            weight = '$weight',
            omlic_number = '$omlicNumber',
            incharge_doctor = '$inchargeDoctor',
            occupation = '$occupation',
            provisional_diagnosis = '$provisionalDiagnosis',
            final_diagnosis = '$finalDiagnosis',
            date = '$date',
            time = '$time',
            discharge = '$discharge',
            `obstetric-history` = '$obstetricHistory',
            menarche = '$menarche',
            LMP = '$lmp',
            Para = '$para',
            Gavdia = '$gavida',
            allergies = '$allergies',
            `family-history` = '$familyHistory',
            `operation-accidents` = '$previousOperationsAccidents',
            `education-status` = '$educationStatus',
            `build` = '$build',
            anemia = '$anemia',
            edema = '$edema',
            pulse = '$pulse',
            lcterus = '$lcterus',
            rr = '$rr',
            cyanosis = '$cyanosis',
            rs = '$rs',
        cvs = '$cvs',
        cns = '$cns',
        pa = '$pa',
            bp = '$bp',
            th = '$th',
            weight1 = '$weight1',
            jvp = '$jvp',
            skin = '$skin',
            `provisional-diagnosis1` = '$provisionalDiagnosis1',
            `differential-diagnosis1` = '$differentialDiagnosis1',
            duration = '$duration',
            `presenting-complaint` = '$presentingComplaint',
            history = '$history',
            submit_name = '$submitName'
        WHERE id = '$id'";
    
    $result = $conn->query($sql);
    
    if ($result === TRUE) {
        echo "<div class='alert alert-success'>Updated Successfully</div>";
    }
  }    
$sql = "SELECT * FROM `doctor_initail_assesment` WHERE `id` = '$id' ";
$result = $conn->query($sql);
$numRows = $result->num_rows;
if ($numRows == 1) {
  $res2 = $result->fetch_assoc();
}
 else {
  echo "<div class='alert alert-success'>No data found</div>";
}
  
?>
<!DOCTYPE html>
<html>

<head>
    <title>Doctor Intial Assesment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    .scroll {
        width: 100%;
        overflow: auto;
        white-space: nowrap;
    }

    body {
        background: lightgray;
        animation: fade-in 1s linear;
    }

    .fl {
        animation: gelatine 1s;
    }

    th tr td {
        background-color: lightgray
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
    input[type="date"] {
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;
        margin: 2px;

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
    <form method="POST">
        <div class="container shadow-lg rounded">
            <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
            <a href="doctor_inital_asssesment_print.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Print</a>
            <h3 class="text-center text-dark mt-3">Doctor Inital Assesment</h3>
            <div class="row">
                <div class="col-4">
                    <label class="form-label ">Name:</label>
                    <?php echo $res0['name']??''; ?>
                </div>
                <div class="col-2">
                    <label class="form-label ">Age:</label>
                    <?php echo $res0['age']??''; ?>
                </div>
                <div class="col-2">
                    <label class="form-label ">Sex:</label>
                    <?php echo $res0['sex']??''; ?>
                </div>
                <div class="col-3">
                    <label class="form-label ">Consultant: </label>
                    <?php echo $res0['consultant'];?>
                </div>

            </div>
            <div class="row">
                <div class="col-3">
                    <label class="form-label ">Diagnosis:</label>
                    <?php echo $res1['diagnosis'];?>
                </div>
                <div class="col-3">
                    <label class="form-label ">ICU/Ward Room No: </label>
                    <?php echo $res3['ward/icu']; ?>
                </div>
                <div class="col-3">
                    <label class="form-label ">Bed Number:</label>
                    <?php echo $res3['bed/room'];?>
                </div>
                <div class="col-3">
                    <label class="form-label ">UHID No:</label>
                    <?php echo $res3['uhid'];?>
                </div>

            </div>

            <div class="row">
                <div class="col-3">
                    <label class="form-label ">IPD No: </label>
                    <?php echo $res3['ipd']; ?>
                </div>

                <div class="col-3">
                    <label class="form-label">Date of Admission:</label>

                </div>
                <div class="col-2">
                    <label class="form-label">Date of Discharge:</label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <label class="form-label">Contact No:</label>
                    <input type="text" name="contact_no" class="form-control"
                        value="<?php echo $res2['contact_no']; ?>">
                </div>
                <div class="col-3">
                    <label class="form-label">Address:</label>
                    <input type="text" name="address" class="form-control" value="<?php echo $res2['address']; ?>">
                </div>
                <div class="col-3">
                    <label class="form-label">Occupation:</label>
                    <input type="text" name="occupation" class="form-control"
                        value="<?php echo $res2['occupation']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label class="form-label">Discharge:</label>
                    <select name="discharge" class="form-select">
                        <option value="transfer" <?php if ($res2['discharge'] == 'transfer') echo 'selected'; ?>>
                            Transfer</option>
                        <option value="ama" <?php if ($res2['discharge'] == 'ama') echo 'selected'; ?>>AMA (Against
                            Medical Advice)</option>
                        <option value="absoconded" <?php if ($res2['discharge'] == 'absoconded') echo 'selected'; ?>>
                            Absoconded</option>
                        <option value="expire" <?php if ($res2['discharge'] == 'expire') echo 'selected'; ?>>Expired
                        </option>
                    </select>
                </div>
                <div class="col-3">
                    <label class="form-label">Reimbursement:</label>
                    <select name="reimbursement" class="form-select">
                        <option value="reimbursible"
                            <?php if ($res2['reimbursement'] == 'reimbursible') echo 'selected'; ?>>Reimbursible
                        </option>
                        <option value="non-reimbursible"
                            <?php if ($res2['reimbursement'] == 'non-reimbursible') echo 'selected'; ?>>Non-Reimbursible
                        </option>
                    </select>
                </div>
                <div class="col-3">
                    <label class="form-label">Weight:</label>
                    <input type="text" name="weight" class="form-control" value="<?php echo $res2['weight']; ?>">
                </div>
                <div class="col-3">
                    <label class="form-label">OMLC Number:</label>
                    <input type="text" name="omlic_number" class="form-control"
                        value="<?php echo $res2['omlic_number']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="">Incharge Doctor</label>
                    <input type="text" name="incharge_doctor" class="form-control"
                        value="<?php echo $res2['incharge_doctor']; ?>">
                </div>
                <div class="col-4">
                    <label for="">Provisional Diagnosis</label>
                    <input type="text" name="provisional_diagnosis" class="form-control"
                        value="<?php echo $res2['provisional_diagnosis']; ?>">
                </div>
                <div class="col-4">
                    <label for="">Final Diagnosis</label>
                    <input type="text" name="final_diagnosis" class="form-control"
                        value="<?php echo $res2['final_diagnosis']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" class="form-control" value="<?php echo $res2['date']; ?>">
                </div>
                <div class="col-4">
                    <label for="time">Time:</label>
                    <input type="time" id="time" name="time" class="form-control" value="<?php echo $res2['time']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="presenting-complaint">Presenting Complaint:</label>
                    <textarea id="presenting-complaint" class="form-control"
                        name="presenting-complaint"><?php echo $res2['presenting-complaint']; ?></textarea>
                </div>
                <div class="col-6">
                    <label for="duration">Duration:</label>
                    <textarea type="text" id="duration" class="form-control"
                        name="duration"><?php echo $res2['duration']; ?></textarea>
                </div>
            </div>
            <!-- Continue updating the rest of the HTML code with corresponding values -->
            <div class="row">
                <div class="col-6">
                    <label for="history">History (Past/Present):</label>
                    <textarea id="history" name="history"
                        class="form-control"><?php echo $res2['history']; ?></textarea>
                </div>
                <div class="col-6">
                    <label for="obstetric-history">Obstetric H<sub>x</sub>:</label>
                    <textarea id="obstetric-history" class="form-control"
                        name="obstetric-history"><?php echo $res2['obstetric-history']; ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label for="">menarche</label>
                    <input type="text" name="menarche" class="form-control" value="<?php echo $res2['menarche']; ?>">
                </div>
                <div class="col-3">
                    <label for="">LMP</label>
                    <input type="text" name="LMP" class="form-control" value="<?php echo $res2['LMP']; ?>">
                </div>
                <div class="col-3">
                    <label for="">Para</label>
                    <input type="text" name="Para" class="form-control" value="<?php echo $res2['Para']; ?>">
                </div>
                <div class="col-3">
                    <label for="">Gravida</label>
                    <input type="text" name="Gavdia" class="form-control" value="<?php echo $res2['Gavdia']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="allergies">Allergies:</label>
                    <textarea id="allergies" name="allergies"
                        class="form-control"><?php echo $res2['allergies']; ?></textarea>
                </div>
                <div class="col-6">
                    <label for="family-history">Family History:</label>
                    <textarea id="family-history" name="family-history"
                        class="form-control"><?php echo $res2['family-history']; ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-7">
                    <label for="operation-accidents">Previous Operations/Accidents:</label>
                    <textarea id="operation-accidents" name="operation-accidents"
                        class="form-control"><?php echo $res2['operation-accidents']; ?></textarea>
                </div>
                <div class="col-5">
                    <label for="education-status">Education Status:</label>
                    <input type="text" id="education-status" class="form-control" name="education-status"
                        value="<?php echo $res2['education-status']; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label for="">Build</label>
                    <input type="text" name="build" class="form-control" value="<?php echo $res2['build']; ?>">
                </div>
                <div class="col-3">
                    <label for="">Pulse</label>
                    <input type="text" name="pulse" class="form-control" value="<?php echo $res2['pulse']; ?>">
                </div>
                <div class="col-3" <label for="">Anemia</label>
                    <input type="text" name="anemia" class="form-control" value="<?php echo $res2['anemia']; ?>">
                </div>
                <div class="col-3">
                    <label for="">Edema</label>
                    <input type="text" name="edema" class="form-control" value="<?php echo $res2['edema']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="">RR</label>
                    <input type="text" name="rr" class="form-control" value="<?php echo $res2['rr']; ?>">
                </div>
                <div class="col-3">
                    <label for="">Cyanosis</label>
                    <input type="text" name="cyanosis" class="form-control" value="<?php echo $res2['cyanosis']; ?>">
                </div>
                <div class="col-3">
                    <label for="">Ht</label>
                    <input type="text" name="th" class="form-control" value="<?php echo $res2['th']; ?>">
                </div>
                <div class="col-3">
                    <label for="">BP</label>
                    <input type="text" name="bp" class="form-control" value="<?php echo $res2['bp']; ?>">
                </div>
            </div>

            <div class="row">

                <div class="col-3">
                    <label for="">Lcterus</label>
                    <input type="text" name="lcterus" class="form-control" value="<?php echo $res2['lcterus']; ?>">
                </div>
                <div class="col-3">
                    <label for="">Weight</label>
                    <input type="text" name="weight1" class="form-control" value="<?php echo $res2['weight1']; ?>">
                </div>
                <div class="col-3">
                    <label for="">JVP</label>
                    <input type="text" name="jvp" class="form-control" value="<?php echo $res2['jvp']; ?>">
                </div>
                <div class="col-3">
                    <label for="">Skin</label>
                    <input type="text" name="skin" class="form-control" value="<?php echo $res2['skin']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="">RS</label>
                    <input type="text" name="rs" class="form-control" value="<?php echo $res2['lcterus']; ?>">
                </div>
                <div class="col-3">
                    <label for="">CVS</label>
                    <input type="text" name="cvs" class="form-control" value="<?php echo $res2['weight1']; ?>">
                </div>
                <div class="col-3">
                    <label for="">CNS</label>
                    <input type="text" name="cns" class="form-control" value="<?php echo $res2['jvp']; ?>">
                </div>
                <div class="col-3">
                    <label for="">PA</label>
                    <input type="text" name="pa" class="form-control" value="<?php echo $res2['skin']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="provisional-diagnosis1">Provisional Diagnosis:</label>
                    <textarea id="provisional-diagnosis1" name="provisional-diagnosis1"
                        class="form-control"><?php echo $res2['provisional-diagnosis1']; ?></textarea>
                </div>
                <div class="col-6">
                    <label for="differential-diagnosis">Differential Diagnosis:</label>
                    <textarea id="differential-diagnosis" name="differential-diagnosis1"
                        class="form-control"><?php echo $res2['differential-diagnosis1']; ?></textarea>
                </div>
            </div>

            <div class="text-center" style="margin:10px">
                <label for="submit_name">Name</label>
                <input type="text" name="submit_name" value="<?php echo $res2['submit_name']; ?>">
            </div>
            <button class="btn btn-primary m-3" name="submit" type="submit">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>