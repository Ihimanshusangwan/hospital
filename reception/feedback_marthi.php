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
    $r_12 = isset($_POST['r_12']) ? $_POST['r_12'] : '';
    $r_13 = isset($_POST['r_13']) ? $_POST['r_13'] : '';
    $r_14 = isset($_POST['r_14']) ? $_POST['r_14'] : '';
    $r_15 = isset($_POST['r_15']) ? $_POST['r_15'] : '';
    $r_16 = isset($_POST['r_16']) ? $_POST['r_16'] : '';
  $query5 = "UPDATE `feedback_marthi` SET
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
      `r_12` = '$r_12',
      `r_13` = '$r_13',
      `r_14` = '$r_14',
      `r_15` = '$r_15',
      `r_16` = '$r_16' WHERE  `id` = '$id'";

    $data5=$conn->query($query5);
    if($data5){
        echo "<div class='alert alert-success'> Updated Successfully</div>";
    }
 

  
}
$sql6="SELECT * FROM `feedback_marthi` WHERE `id` = '$id' ";
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
            <a href="more_forms.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
                id="dashboard">Dashboard</a>
            <a href="feedback_marthi_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger"
                id="dashboard">print</a>
        </div>
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class="text-center text-dark my-3 ">रुग्णाचे हॉस्पिटल विषयी मनोग</h3>
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

        <form method="post">
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3">
                        <p class="style10"> दिनांक <input type="date" name="r_11" value="<?php echo $res6['r_11'];?>">
                    </div>
                </div>
        
                <div>

                <table width="100%">
                    <th width="8%"><span class="style8">Sr.No.
                    </th>
                    <th width="52%">
                        <p class=" style10">मनोगत विषयी पॉईंट / मार्क
</p>
                    </th>
                    <th width="8%">A सर्वोत्तम</th>
                    <th width="8%">B 
खुप
चांगले</th>
                    <th width="8%">C चांगले</th>
                    <th width="8%">D साधारण</th>
                    <th width="8%">E वाईट
</th>
                    </tr>

                    <tr>
                        <th scope="row"><span class="style23">1.</span></th>
                        <td><span class="style23">
तुम्हाला नोंदणी / स्वागत कक्षा कडून कसे मार्गदर्शन मिळाले ?

                            </span></td>

                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="r_1" id="inlineRadio1"
                                    <?php echo $res6['r_1']=='A'?'checked':''; ?> value="A">
                                <label class="form-check-label" for="inlineRadio1">A</label>
                            </div>
                        </td>

                        <td>
                            <div class="form-check form-check-inline mx-4">
                                <input class="form-check-input" type="radio" name="r_1" id="inlineRadio2"
                                    <?php echo $res6['r_1']=='B'?'checked':''; ?> value="B">
                                <label class="form-check-label" for="inlineRadio2">B</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-check-inline mx-4">
                                <input class="form-check-input" type="radio" name="r_1" id="inlineRadio2"
                                    <?php echo $res6['r_1']=='C'?'checked':''; ?> value="C">
                                <label class="form-check-label" for="inlineRadio2">C</label>
                            </div>
                        </td>

                        <td>
                            <input class="form-check-input" type="radio" name="r_1" id="inlineRadio1"
                                <?php echo $res6['r_1']=='D'?'checked':''; ?> value="D">
                            <label class="form-check-label" for="inlineRadio1">D</label>
        </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_1" id="inlineRadio2"
                    <?php echo $res6['r_2']=='E'?'checked':''; ?> value="E">
                <label class="form-check-label" for="inlineRadio2">E</label>
            </div>
        </td>

        </tr>
        <tr>
            <th scope="row"><span class="style23">2.</span></th>
            <td><span class="style23">
या दवाखान्यातील डॉक्टरांद्वारे देण्यात येणारी वैद्यकीय सेवा / उपचार या बद्दल तुमचे अनुभव काय आहे ?


                </span></td>

            <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="r_2" id="inlineRadio1"
                        <?php echo $res6['r_2']=='A'?'checked':''; ?> value="A">
                    <label class="form-check-label" for="inlineRadio1">A</label>
                </div>
            </td>

            <td>
                <div class="form-check form-check-inline mx-4">
                    <input class="form-check-input" type="radio" name="r_2" id="inlineRadio2"
                        <?php echo $res6['r_2']=='B'?'checked':''; ?> value="B">
                    <label class="form-check-label" for="inlineRadio2">B</label>
                </div>
            </td>
            <td>
                <div class="form-check form-check-inline mx-4">
                    <input class="form-check-input" type="radio" name="r_2" id="inlineRadio2"
                        <?php echo $res6['r_2']=='C'?'checked':''; ?> value="C">
                    <label class="form-check-label" for="inlineRadio2">C</label>
                </div>
            </td>

            <td>
                <input class="form-check-input" type="radio" name="r_2" id="inlineRadio1"
                    <?php echo $res6['r_2']=='D'?'checked':''; ?> value="D">
                <label class="form-check-label" for="inlineRadio1">D</label>
    </div>
    </td>
    <td>
        <div class="form-check form-check-inline mx-4">
            <input class="form-check-input" type="radio" name="r_2" id="inlineRadio2"
                <?php echo $res6['r_2']=='E'?'checked':''; ?> value="E">
            <label class="form-check-label" for="inlineRadio2">E</label>
        </div>
    </td>
    </tr>
    <tr>
        <th scope="row"><span class="style23">3.</span></th>
        <td><span class="style23">
दवाखान्यातील स्टाफकडून देण्यात येणारी रुग्णांची सेवा / नम्रता याबद्दल तुमचे मत काय आहे ?

            </span></td>

        <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="r_3" id="inlineRadio1"
                    <?php echo $res6['r_3']=='A'?'checked':''; ?> value="A">
                <label class="form-check-label" for="inlineRadio1">A</label>
            </div>
        </td>

        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_3" id="inlineRadio2"
                    <?php echo $res6['r_3']=='B'?'checked':''; ?> value="B">
                <label class="form-check-label" for="inlineRadio2">B</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_3" id="inlineRadio2"
                    <?php echo $res6['r_3']=='C'?'checked':''; ?> value="C">
                <label class="form-check-label" for="inlineRadio2">C</label>
            </div>
        </td>

        <td>
            <input class="form-check-input" type="radio" name="r_3" id="inlineRadio1"
                <?php echo $res6['r_3']=='D'?'checked':''; ?> value="D">
            <label class="form-check-label" for="inlineRadio1">D</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_3" id="inlineRadio2"
                    <?php echo $res6['r_3']=='E'?'checked':''; ?> value="E">
                <label class="form-check-label" for="inlineRadio2">E</label>
            </div>
        </td>
    </tr>
    <tr>
        <th scope="row"><span class="style23">4.</span></th>
        <td><span class="style23">
नर्सिंग स्टाफ व पॅरामेडिकल स्टाफच्या सेवेबद्दल तुमचा अनुभव काय आहे ?

            </span></td>


        <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="r_4" id="inlineRadio1"
                    <?php echo $res6['r_4']=='A'?'checked':''; ?> value="A">
                <label class="form-check-label" for="inlineRadio1">A</label>
            </div>
        </td>

        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_4" id="inlineRadio2"
                    <?php echo $res6['r_4']=='B'?'checked':''; ?> value="B">
                <label class="form-check-label" for="inlineRadio2">B</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_4" id="inlineRadio2"
                    <?php echo $res6['r_4']=='C'?'checked':''; ?> value="C">
                <label class="form-check-label" for="inlineRadio2">C</label>
            </div>
        </td>

        <td>
            <input class="form-check-input" type="radio" name="r_4" id="inlineRadio1"
                <?php echo $res6['r_4']=='D'?'checked':''; ?> value="D">
            <label class="form-check-label" for="inlineRadio1">D</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_4" id="inlineRadio2"
                    <?php echo $res6['r_4']=='E'?'checked':''; ?> value="E">
                <label class="form-check-label" for="inlineRadio2">E</label>
            </div>
        </td>
    </tr>
    <tr>
        <th scope="row"><span class="style23">5.</span></th>
        <td><span class="style23">
        वॉर्डबॉय व आया यांच्या सेवेबद्दल तुमचा अनुभव काय आहे ?

            </span></td>

        <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="r_5" id="inlineRadio1"
                    <?php echo $res6['r_5']=='A'?'checked':''; ?> value="A">
                <label class="form-check-label" for="inlineRadio1">A</label>
            </div>
        </td>

        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_5" id="inlineRadio2"
                    <?php echo $res6['r_5']=='B'?'checked':''; ?> value="B">
                <label class="form-check-label" for="inlineRadio2">B</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_5" id="inlineRadio2"
                    <?php echo $res6['r_5']=='C'?'checked':''; ?> value="C">
                <label class="form-check-label" for="inlineRadio2">C</label>
            </div>
        </td>

        <td>
            <input class="form-check-input" type="radio" name="r_5" id="inlineRadio1"
                <?php echo $res6['r_5']=='D'?'checked':''; ?> value="D">
            <label class="form-check-label" for="inlineRadio1">D</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_5" id="inlineRadio2"
                    <?php echo $res6['r_5']=='E'?'checked':''; ?> value="E">
                <label class="form-check-label" for="inlineRadio2">E</label>
            </div>
        </td>
    </tr>
    <tr>
        <th scope="row"><span class="style23">6.</span></th>
        <td><span class="style23">
        दवाखान्यातील आंतर रूग्ण विभागातील उपलब्ध असलेल्या सोयी सुविधा बाबत तुमचा अनुभव काय आहे ?

            </span>
        </td>

        <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="r_6" id="inlineRadio1"
                    <?php echo $res6['r_6']=='A'?'checked':''; ?> value="A">
                <label class="form-check-label" for="inlineRadio1">A</label>
            </div>
        </td>

        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_6" id="inlineRadio2"
                    <?php echo $res6['r_6']=='B'?'checked':''; ?> value="B">
                <label class="form-check-label" for="inlineRadio2">B</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_6" id="inlineRadio2"
                    <?php echo $res6['r_6']=='C'?'checked':''; ?> value="C">
                <label class="form-check-label" for="inlineRadio2">C</label>
            </div>
        </td>

        <td>
            <input class="form-check-input" type="radio" name="r_6" id="inlineRadio1"
                <?php echo $res6['r_6']=='D'?'checked':''; ?> value="D">
            <label class="form-check-label" for="inlineRadio1">D</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_6" id="inlineRadio2"
                    <?php echo $res6['r_6']=='E'?'checked':''; ?> value="E">
                <label class="form-check-label" for="inlineRadio2">E</label>
            </div>
        </td>
    </tr>
    <tr>
        <th scope="row"><span class="style23">7.</span></th>
        <td>
            <p class="style23">दवाखान्यातील वॉर्ड व परिसर, शौचालयांच्या

स्वच्छतेबाबत तुमचे मत काय आहे ?
</p>
        </td>


        <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="r_7" id="inlineRadio1"
                    <?php echo $res6['r_7']=='A'?'checked':''; ?> value="A">
                <label class="form-check-label" for="inlineRadio1">A</label>
            </div>
        </td>

        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_7" id="inlineRadio2"
                    <?php echo $res6['r_7']=='B'?'checked':''; ?> value="B">
                <label class="form-check-label" for="inlineRadio2">B</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_7" id="inlineRadio2"
                    <?php echo $res6['r_7']=='C'?'checked':''; ?> value="C">
                <label class="form-check-label" for="inlineRadio2">C</label>
            </div>
        </td>

        <td>
            <input class="form-check-input" type="radio" name="r_7" id="inlineRadio1"
                <?php echo $res6['r_7']=='D'?'checked':''; ?> value="D">
            <label class="form-check-label" for="inlineRadio1">D</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_7" id="inlineRadio2"
                    <?php echo $res6['r_7']=='E'?'checked':''; ?> value="E">
                <label class="form-check-label" for="inlineRadio2">E</label>
            </div>
        </td>
    </tr>
    <tr>
        <th scope="row"><span class="style23">8.</span></th>
        <td><span class="style23">
        दवाखान्यातील चहा, आहाराची सेवा व गुणवत्ते बद्दल तुमचे मत काय आहे ?
            </span></td>

        <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="r_8" id="inlineRadio1"
                    <?php echo $res6['r_8']=='A'?'checked':''; ?> value="A">
                <label class="form-check-label" for="inlineRadio1">A</label>
            </div>
        </td>

        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_8" id="inlineRadio2"
                    <?php echo $res6['r_8']=='B'?'checked':''; ?> value="B">
                <label class="form-check-label" for="inlineRadio2">B</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_8" id="inlineRadio2"
                    <?php echo $res6['r_8']=='C'?'checked':''; ?> value="C">
                <label class="form-check-label" for="inlineRadio2">C</label>
            </div>
        </td>

        <td>
            <input class="form-check-input" type="radio" name="r_8" id="inlineRadio1"
                <?php echo $res6['r_8']=='D'?'checked':''; ?> value="D">
            <label class="form-check-label" for="inlineRadio1">D</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_8" id="inlineRadio2"
                    <?php echo $res6['r_8']=='E'?'checked':''; ?> value="E">
                <label class="form-check-label" for="inlineRadio2">E</label>
            </div>
        </td>
    </tr>
    <tr>
        <th scope="row"><span class="style23">9.</span></th>
        <td><span class="style23">दवाखान्यातील चौकशी विभाग, नोंदणी व बिलींग विभागाच्या सेवा व गुणवत्तेबद्दल तुमचे मत काय आहे ?
            </span></td>

        <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="r_9" id="inlineRadio1"
                    <?php echo $res6['r_9']=='A'?'checked':''; ?> value="A">
                <label class="form-check-label" for="inlineRadio1">A</label>
            </div>
        </td>

        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_9" id="inlineRadio2"
                    <?php echo $res6['r_9']=='B'?'checked':''; ?> value="B">
                <label class="form-check-label" for="inlineRadio2">B</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_9" id="inlineRadio2"
                    <?php echo $res6['r_9']=='C'?'checked':''; ?> value="C">
                <label class="form-check-label" for="inlineRadio2">C</label>
            </div>
        </td>

        <td>
            <input class="form-check-input" type="radio" name="r_9" id="inlineRadio1"
                <?php echo $res6['r_9']=='D'?'checked':''; ?> value="D">
            <label class="form-check-label" for="inlineRadio1">D</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_9" id="inlineRadio2"
                    <?php echo $res6['r_9']=='E'?'checked':''; ?> value="E">
                <label class="form-check-label" for="inlineRadio2">E</label>
            </div>
        </td>
    </tr>
    <tr>

        <th scope="row"><span class="style23">10.</span></th>
        <td><span class="style23">दवाखान्यातील ऑप्टीकल व मेडीकलच्या सेवा व गुणवत्ते विषयी तुमचे मत काय आहे 
            </span></td>

        <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="r_10" id="inlineRadio1"
                    <?php echo $res6['r_10']=='A'?'checked':''; ?> value="A">
                <label class="form-check-label" for="inlineRadio1">A</label>
            </div>
        </td>

        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_10" id="inlineRadio2"
                    <?php echo $res6['r_10']=='B'?'checked':''; ?> value="B">
                <label class="form-check-label" for="inlineRadio2">B</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_10" id="inlineRadio2"
                    <?php echo $res6['r_10']=='C'?'checked':''; ?> value="C">
                <label class="form-check-label" for="inlineRadio2">C</label>
            </div>
        </td>

        <td>
            <input class="form-check-input" type="radio" name="r_10" id="inlineRadio1"
                <?php echo $res6['r_10']=='D'?'checked':''; ?> value="D">
            <label class="form-check-label" for="inlineRadio1">D</label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <input class="form-check-input" type="radio" name="r_10" id="inlineRadio2"
                    <?php echo $res6['r_10']=='E'?'checked':''; ?> value="E">
                <label class="form-check-label" for="inlineRadio2">E</label>
            </div>
        </td>
    </tr>
    </table>
    <div class="mt-4">
        <label for="">11. तुम्हाला दवाखान्याबाबत कुणाकडून माहिती मिळाली ? डॉक्टरांकडून / मित्राकडून / नातेवाईकाकडून / सामाजिक माध्यम / प्रसार माध्यमांकडून / स्वतः

        </label> <input type="text" name="r_12" value="<?php echo $res6['r_12'];?>">
    </div>
    <div class="mt-3">
        <label for="">
12. आपली काही तक्रार आहे काय ?

        </label> <input type="text" name="r_13" value="<?php echo $res6['r_13'];?>">
    </div>
    <div class="mt-3">
        <label for=""> 
13. आपल्या काही बहुमुल्य सुचना आहेत का ?


        </label> <input type="text" name="r_14" value="<?php echo $res6['r_14'];?>">
        <div class="mt-3">
            <label for="">नांव:</label>
            <input type="text" name="r_15" value="<?php echo $res6['r_15'];?>">
        </div>
        <hr>
        <h5 class="text-center">For office use only</h5>
        <table width="70%" align="center">
            <tr>
                <th style="padding:10px;">E
                    10 Poor <input class="form-check-input mx-3" type="radio" name="r_16" id="inlineRadio1"
                        <?php echo $res6['r_16']=='E'?'checked':''; ?> value="E">

                </th>
                <th style="padding:10px;">
                    D
                    &nbsp;&nbsp;
                    11-20 Average
                    <input class="form-check-input mx-3" type="radio" name="r_16" id="inlineRadio1"
                        <?php echo $res6['r_16']=='D'?'checked':''; ?> value="D">

                    </thstyle=>
                <th>
                    C
                    &nbsp;&nbsp;
                    21-30 Good
                    <input class="form-check-input mx-3" type="radio" name="r_16" id="inlineRadio1"
                        <?php echo $res6['r_16']=='C'?'checked':''; ?> value="C">

                </th>
                <th style="padding:10px;">
                    B
                    &nbsp;&nbsp;
                    31-40 Very Good
                    <input class="form-check-input mx-3" type="radio" name="r_16" id="inlineRadio1"
                        <?php echo $res6['r_16']=='B'?'checked':''; ?> value="B">
                </th>
                <th style="padding:10px;">
                    A&nbsp;
                    41-50 Excellent
                    <input class="form-check-input mx-3" type="radio" name="r_16" id="inlineRadio1"
                        <?php echo $res6['r_16']=='A'?'checked':''; ?> value="A">
                </th>
            </tr>
        </table>
        <button class="btn btn-primary d-flex mx-auto mt-4" name="save">save</button>
        </form>

    </div>

</html>