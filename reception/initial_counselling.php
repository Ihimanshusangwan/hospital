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
    $r_1 = isset($_POST['r_1']) ? $_POST['r_1'] : ''; // Set a default value if the checkbox is unchecked
    $r_2 = isset($_POST['r_2']) ? $_POST['r_2'] : '';
    $r_3 = isset($_POST['r_3']) ? $_POST['r_3'] : '';
    $r_4 = isset($_POST['r_4']) ? $_POST['r_4'] : '';
    $r_5 = isset($_POST['r_5']) ? $_POST['r_5'] : '';
    $r_6 = isset($_POST['r_6']) ? $_POST['r_6'] : '';
    $r_7 = isset($_POST['r_7']) ? $_POST['r_7'] : '';
    $r_8 = isset($_POST['r_8']) ? $_POST['r_8'] : '';
    $r_9 = isset($_POST['r_9']) ? $_POST['r_9'] : '';
    $r_10 = isset($_POST['r_10']) ? $_POST['r_10'] : '';
    $r_11 = isset($_POST['r_11']) ? $_POST['r_11'] : '';
  $name_1 = $_POST['name_1'];
  $name_2 = $_POST['name_2'];
  $name_3 = $_POST['name_3'];
  $name_4 = $_POST['name_4'];
  $name_5 = $_POST['name_5'];
  $date_1 = $_POST['date_1'];
  $date_2 = $_POST['date_2'];
  $date_3 = $_POST['date_3'];
  $date_4 = $_POST['date_4'];
  $date_5 = $_POST['date_5'];
  $time_1 = $_POST['time_1'];
  $time_2 = $_POST['time_2'];
  $time_3 = $_POST['time_3'];
  $time_4 = $_POST['time_4'];
  $time_5 = $_POST['time_5'];
  $sign_1 = $_POST['sign_1'];
  $sign_2 = $_POST['sign_2'];
  $sign_3 = $_POST['sign_3'];
  $sign_4 = $_POST['sign_4'];
  $sign_5 = $_POST['sign_5'];
  $query5 = "UPDATE `initial_counselling` SET
      `r_1` = '$r_1',
        `r_2` = '$r_2',
        `r_3` = '$r_3',
        `r_4` = '$r_4',
        `r_5` = '$r_5',
        `r_6` = '$r_6',
        `r_7` = '$r_7',
        `r_8` = '$r_8',
        `r_9` = '$r_9',
        `r_10` = '$r_10',
        `r_11` = '$r_11',
        `name_1` = '$name_1',
        `name_2` = '$name_2',
        `name_3` = '$name_3',
        `name_4` = '$name_4',
        `name_5` = '$name_5',
        `sign_1` = '$sign_1',
        `sign_2` = '$sign_2',
        `sign_3` = '$sign_3',
        `sign_4` = '$sign_4',
        `sign_5` = '$sign_5',
        `date_1` = '$date_1',
        `date_2` = '$date_2',
        `date_3` = '$date_3',
        `date_4` = '$date_4',
        `date_5` = '$date_5',
        `time_1` = '$time_1',
        `time_2` = '$time_2',
        `time_3` = '$time_3',
        `time_4` = '$time_4',
        `time_5` = '$time_5' WHERE  `id` = '$id'";

    $data5=$conn->query($query5);
    if($data5){
        echo "<div class='alert alert-success'> Updated Successfully</div>";
    }
 

  
}
$sql6="SELECT * FROM `initial_counselling` WHERE `id` = '$id' ";
$data6=$conn->query($sql6);
$res6=$data6->fetch_assoc();


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
</head>

<body class="m-2">
    <div class="container shadow-lg rounded">
        <div id="button">
            <a href="ortho_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
                id="dashboard">Dashboard</a>
            <a href="initial_counselling_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger"
                id="dashboard">print</a>
        </div>
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class="text-center text-dark my-3 "> INITIAL COUNSELING FORM </h3>
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

        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
                <p class="style10"> दिनांक <input type="date">
            </div>
        </div>
        <strong> Counseling About समुपदेशन :- </strong>
     

        <div >
<form  method="post">
    
<table width="100%">
                    <th width="8%"><span class="style8">Sr.No.
                    </th>
                    <th width="74%">
                    <p class=" style10"> You are informed about your / your patients healthcare needs as follows. Please Tick (✓ )
            wherever applicable:
        <p class="style10">आपण आपल्या / आपल्या रुग्णाच्या आरोग्याबाबत खालील माहिती देण्यात येत आहे. योग्य ठिकाणी (✓) अशी
            खून करण्यात यावी .
        <p>
                    </th>
                    <th width="22%">checkbox</th>
                </tr>

                <tr>
                    <th scope="row"><span class="style23">1.</span></th>
                    <td><span class="style23">Diagosis / Reason For Admission (
                            (निदान व रुग्णालयात भरती होण्याचे कारण ) </span></td>
                    <td>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_1" id="inlineRadio1"
                            <?php echo $res6['r_1']=='option1'?'checked':''; ?>    value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_1" id="inlineRadio2"
                            <?php echo $res6['r_1']=='option2'?'checked':''; ?>   value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">2.</span></th>
                    <td><span class="style23">Any Possible Complication There Of
                            ( उध्दभवू शकणाऱ्या गुंतागुंत बाबत माहिती )</span></td>
                    <td>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_2" id="inlineRadio1"
                            <?php echo $res6['r_2']=='option1'?'checked':''; ?>   value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_2" id="inlineRadio2"
                            <?php echo $res6['r_2']=='option2'?'checked':''; ?>    value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">3.</span></th>
                    <td><span class="style23">The plan of Treatment ( चिकित्सेचे विवरण )</span></td>
                    <td>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_3" id="inlineRadio1"
                            <?php echo $res6['r_3']=='option1'?'checked':''; ?>    value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_3" id="inlineRadio2"
                            <?php echo $res6['r_3']=='option2'?'checked':''; ?> value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">4.</span></th>
                    <td><span class="style23">Any other alternatives and preventive aspects that you may have
                            (उपलब्ध पर्यायी चिकित्सा पद्धती )</span></td>

                    <td>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_4" id="inlineRadio1"
                            value="option1" <?php echo $res6['r_4']=='option1'?'checked':''; ?> >
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_4" id="inlineRadio2"
                            <?php echo $res6['r_4']=='option2'?'checked':''; ?>  value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">5.</span></th>
                    <td><span class="style23">The benifits of the altrnatives involved ( पर्यायी चिकित्सापद्धतीचे
                            फायदे आणि तोटे )</span></td>
                    <td>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_5" id="inlineRadio1"
                            <?php echo $res6['r_5']=='option1'?'checked':''; ?>   value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_5" id="inlineRadio2"
                            <?php echo $res6['r_5']=='option2'?'checked':''; ?>    value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">6.</span></th>
                    <td><span class="style23">Diet , Nutrition and Medication (आहार ,पोषण औषध बाबत माहिती )</span>
                    </td>
                    <td>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_6" id="inlineRadio1"
                            <?php echo $res6['r_6']=='option1'?'checked':''; ?>    value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_6" id="inlineRadio2"
                            <?php echo $res6['r_6']=='option2'?'checked':''; ?>    value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">7.</span></th>
                    <td>
                        <p class="style23">That you can make informed choice among available opttions(उपलब्ध
                            पर्यायांपैकी निवड करण्याचा अधिकार )</p>
                    </td>

                    <td>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_7" id="inlineRadio1"
                            <?php echo $res6['r_7']=='option1'?'checked':''; ?>    value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_7" id="inlineRadio2"
                            <?php echo $res6['r_7']=='option2'?'checked':''; ?>   value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">8.</span></th>
                    <td><span class="style23">That your patient has right to refuse the treatment (उपलब्ध
                            पर्यायांपैकी निवड करण्याचा अधिकार )</span></td>
                    <td>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_8" id="inlineRadio1"
                            <?php echo $res6['r_8']=='option1'?'checked':''; ?>   value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_8" id="inlineRadio2"
                            <?php echo $res6['r_8']=='option2'?'checked':''; ?>   value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">9.</span></th>
                    <td><span class="style23">Expected date of Dischage (डिसचार्ज अंदाजे तारीख )</span></td>
                   <td>
                   <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_9" id="inlineRadio1"
                            <?php echo $res6['r_9']=='option1'?'checked':''; ?>   value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_9" id="inlineRadio2"
                            <?php echo $res6['r_9']=='option2'?'checked':''; ?>    value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                   </td>
                </tr>
                <tr>

                    <th scope="row"><span class="style23">10.</span></th>
                    <td><span class="style23">Expected cost Treatment (उपचाराचा अंदाजे खर्च )</span></td>
                    <td>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_10" id="inlineRadio1"
                            <?php echo $res6['r_10']=='option1'?'checked':''; ?>   value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_10" id="inlineRadio2"
                            <?php echo $res6['r_10']=='option2'?'checked':''; ?>   value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">11.</span></th>
                    <td><span class="style23">Expected Results (अपेक्षित निदान व चिकित्सा )</span></td>
                    <td>
                    <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="r_11" id="inlineRadio1"
                            <?php echo $res6['r_11']=='option1'?'checked':''; ?>    value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div3 class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="radio" name="r_11" id="inlineRadio2"
                            <?php echo $res6['r_11']=='option2'?'checked':''; ?>   value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div3
                    </td>
                </tr>
            </table>
        </div>

        <p class="style10" style="margin-top:30px;">My / Our all concerns about proposed care and treatment have been satisfactorily
            addressed by Medical councilor in a language that I / We understand.
        <p>
        <p class="style10"> I / We understand and agree to all the above information . My/ Our signature
            indicates that I / We have read the above information and agree with it.
        <p>

        <p>उपचारांबाबतच्या माझ्या / आमच्या सर्व शंकाचे मला / आम्हाला समजेल अशा भाषेमध्ये समाधान
            करण्यात आलेले आहे.
            मला / आम्हाला उपरोक्त सर्व माहिती समजली आहे. मी / आम्ही केलेली स्वाक्षरी ही उपरोक्त माहिती मी /
            आम्ही वाचून ती मला / आम्हाला समजल्यानंतर
            केलेली आहे व मी / आम्ही त्याच्याशी सहमत आहे / आहोत. हो नाही</p>
        </h1>
        <p>
        <p class="style10"> धन्यवाद ...!

        <table class="table border border-dark">
            <tr>
                <th></th>
                <th><label class="style12">Signature/ सही </label> </th>
                <th><label class="style11">Name /</label></th>
                <th><label class="style11">Date/ दिनांक </label></th>
                <th><label class="style11"> Time/ वेळ </label></th>
            </tr>
            <tr>
                <td><label class="style11">Patient / Relative रुग्ण / नातेवाईक </label> </td>
                <td> <input class="form-control" type="text" value="<?php echo $res6['sign_1']; ?>" name="sign_1"></td>
                <td> <input class="form-control" type="text" value="<?php echo $res6['name_1']; ?>" name="name_1"></td>
                <td> <input class="form-control" type="date" value="<?php echo $res6['date_1']; ?>" name="date_1"></td>
                <td> <input class="form-control" type="time" value="<?php echo $res6['time_1']; ?>" name="time_1"></td>
            </tr>
            <tr>
                <td> <label class="style11">Witness (Relation with Patient / साक्षीदार(रुग्णाशी नाते ))
                </td>
                <td> <input class="form-control" type="text" value="<?php echo $res6['sign_2']; ?>" name="sign_2"></td>
                <td> <input class="form-control" type="text" value="<?php echo $res6['name_2']; ?>" name="name_2"></td>
                <td> <input class="form-control" type="date" value="<?php echo $res6['date_2']; ?>" name="date_2"></td>
                <td> <input class="form-control" type="time" value="<?php echo $res6['time_2']; ?>" name="time_2"></td>
            </tr>
            <tr>
                <td><label class="style11">Doctor /डॉक्टर</label> </td>
                <td> <input class="form-control" type="text" value="<?php echo $res6['sign_3']; ?>" name="sign_3"></td>
                <td> <input class="form-control" type="text" value="<?php echo $res6['name_3']; ?>" name="name_3"></td>
                <td> <input class="form-control" type="date" value="<?php echo $res6['date_3']; ?>" name="date_3"></td>
                <td> <input class="form-control" type="time" value="<?php echo $res6['time_3']; ?>" name="time_3"></td>
            </tr>
            <tr>
                <td class="style11">Anesthetist / भूलतज्ञ </td>
                <td> <input class="form-control" type="text" type="text" value="<?php echo $res6['sign_4']; ?>"
                        name="sign_4"></td>
                <td> <input class="form-control" type="text" type="text" value="<?php echo $res6['name_4']; ?>"
                        name="name_4"></td>
                <td> <input class="form-control" type="date" type="text" value="<?php echo $res6['date_4']; ?>"
                        name="date_4"></td>
                <td> <input class="form-control" type="time" type="text" value="<?php echo $res6['time_4']; ?>"
                        name="time_4"></td>
            </tr>
            <tr>
                <td class="style11">Interpreter / माहिती समजावून सांगणारे </td>
                <td> <input class="form-control" type="text" type="text" value="<?php echo $res6['sign_5']; ?>"
                        name="sign_5"></td>
                <td> <input class="form-control" type="text" type="text" value="<?php echo $res6['name_5']; ?>"
                        name="name_5"></td>
                <td> <input class="form-control" type="date" type="text" value="<?php echo $res6['date_5']; ?>"
                        name="date_5"></td>
                <td> <input class="form-control" type="time" type="text" value="<?php echo $res6['time_5']; ?>"
                        name="time_5"></td>
            </tr>
        </table>
        <button class="btn btn-primary d-flex mx-auto" name="save">save</button>
</form>
       
    </div>

</html>