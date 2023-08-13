<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
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

if(isset($_POST['save'])){
    $date_h = $_POST['date_h'];
    $patient = $_POST['patient'];
    $uhid = $_POST['uhid'];
    $ipd = $_POST['ipd'];
    $mala = $_POST['mala'];
    $sathi = $_POST['sathi'];
    $vinti = $_POST['vinti'];
    $add_date = $_POST['add_date'];
    $dis_date = $_POST['dis_date'];
    $d_name = $_POST['d_name'];
    $p_name = $_POST['p_name'];
    $relation = $_POST['relation'];
    $applicant = $_POST['applicant'];
    $office_re = $_POST['office_re'];
    $agree = $_POST['agree'];
    $aprove_dr = $_POST['aprove_dr'];
    $date = $_POST['date'];
    $doc_recive = $_POST['doc_recive'];
    $name = $_POST['name'];

    $sql6 = "UPDATE ap_for_document SET
    `date_h`='$date_h',
    patient='$patient',
    uhid='$uhid',
    ipd='$ipd',
    mala='$mala',
    sathi='$sathi',
    vinti='$vinti',
    add_date='$add_date',
    dis_date='$dis_date',
    d_name='$d_name',
    p_name='$p_name',
    relation='$relation',
    applicant='$applicant',
    office_re='$office_re',
    agree='$agree',
    aprove_dr='$aprove_dr',
    date='$date',
    doc_recive='$doc_recive',
    name='$name'
    WHERE  id='$id'";
    
    $data6=$conn->query($sql6);
    if($data6){
        echo "<div class='alert alert-success'> Updated Successfully</div>";
    }

}
$sql5="SELECT * FROM `ap_for_document`  WHERE  id='$id' ";
$data5=$conn->query($sql5);
$res5=$data5->fetch_assoc();

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
    input[type="text"] {
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 200px;
        height: 40px;
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

<body class="m-2">
    <div class="container shadow-lg rounded">

        <div id="button">
            <a href="ortho_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
                id="dashboard">Dashboard</a>
            <a href="ap_for_document_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger">Print</a>
        </div>
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h4 class="text-center text-dark my-3 ">Application For Providing Medical Record / Information / Certificate /
            Form
            / Other </h4>
        <h4 class="text-center text-dark my-3 "> वैधकीय रेकॉर्ड / माहिती / प्रमाणपत्र / फॉर्म / इतर उपलब्ध करण्यासाठी
            अर्ज
        </h4>

        <div class="row">
            <div class="col-md-3">
                <label class="form-label">UHID No: <?php echo $res2['uhid'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">IPD No: <?php echo $res2['ipd'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Date of Admission : <?php echo $res2['date'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="time_ad">Time of Admission : <?php echo $res2['time'];?></label>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Name: <?php echo $res['name'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Age: <?php echo $res['age'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Sex: <?php echo $res['sex'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">ICU/Ward Room No: <?php echo $res2['ward/icu'];?></label>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <label class="form-label">Consultant: <?php echo $res['consultant'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Diagnosis: <?php echo $res1['diagnosis'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Bed Number: <?php echo $res2['bed/room'];?></label>
            </div>
        </div>
        <hr>
        <form method="POST">
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
                <p class="style10"> दिनांक <input type="date" name="date_h" value="<?php echo $res5['date_h']; ?>">
            </div>
        </div>

        <p class="style28"> प्रति ,
        <p>
        <p class="style28">रुग्णालय व्यवस्थापक ,
        <p>
        <p class="style29 style28">श्री सिद्धिविनायक नेत्रालय ,
        <p>
        <p class="style28">बीड .
        <p>

        <p>
        <p align-item="justify" class="style27"> महोदय ,
        <p>
       

            <p class="style27"> मी / आमचा रुग्ण <input type="text" name="patient" value="<?php echo $res5['patient']; ?>">
                <label for=""> यु. एच. आय . डी .</label><input type="text" name="uhid" value="<?php echo $res5['uhid']; ?>">
                <label for="">आय . पी. डी . क्रमांक</label> <input type="text" name="ipd" value="<?php echo $res5['ipd']; ?>">
            <p>
                <label for="">आपल्या रुग्णालया मध्ये अँडमीट होता / होतो , कृपया मला</label> <input type="text"
                    name="mala" value="<?php echo $res5['mala']; ?>">
                <label for=""> साठी </label> <input type="text" name="sathi" value="<?php echo $res5['sathi']; ?>">
            <div><label for="">प्राप्त व्हावी हि विनंती .</label><input type="text" name="vinti"
                    value="<?php echo $res5['vinti']; ?>">
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-5">
                    <label for="">अँडमीशन दिनांक</label>
                    <input type="date" name="add_date" value="<?php echo $res5['add_date']; ?>">
                </div>
                <div class="col-5">
                    <label for="">डिस्चार्ज दिनांक</label>
                    <input type="date" name="dis_date" value="<?php echo $res5['dis_date']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-5">
                    <label for="">डॉक्टरचे नाव</label>
                    <input type="text" name="d_name" value="<?php echo $res5['d_name']; ?>">
                </div>
                <div class="col-5">
                    <label for="">रुग्णाचे नाव</label>
                    <input type="text" name="p_name" value="<?php echo $res5['p_name']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-5">
                    <label for="">रुग्णाशी असलेले नाते</label>
                    <input type="text" name="relation" value="<?php echo $res5['relation']; ?>">
                </div>
                <div class="col-5">
                    <label for="">अर्जदाराची सही-</label>
                    <input type="text" name="applicant" value="<?php echo $res5['applicant']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-5">
                    <label for="">कार्यालयीन नोंद </label>
                    <input type="text" name=" office_re" value="<?php echo $res5['office_re']; ?>">
                </div>
                <div class="col-5">
                    <label for="">मान्य करण्यात येते / नाही</label>
                    <input type="text" name="agree" value="<?php echo $res5['agree']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-5">
                    <label for="">मंजूर करणाऱ्या डॉक्टरचे नाव</label>
                    <input type="text" name="aprove_dr" value="<?php echo $res5['aprove_dr']; ?>">
                </div>
                <div class="col-5">
                    <label for="">दिनांक</label>
                    <input type="date" name="date" value="<?php echo $res5['date']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-5">
                    <label for="">कागदपत्रे मिळाली / नाही</label>
                    <input type="text" name="doc_recive" value="<?php echo $res5['doc_recive']; ?>">
                </div>
                <div class="col-7">
                    <label for="">ज्यांना कागदपत्रे देण्यात अली त्यांचे नाव सही व दिनांक </label>
                    <input type="text" name="name" value="<?php echo $res5['name']; ?>">
                </div>
            </div>
            <button class="btn btn-primary d-flex mx-auto" name="save">save</button>
        </form>

    </div>
</body>


</html>