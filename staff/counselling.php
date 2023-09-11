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

if(isset($_POST['submit'])){
    $date = $_POST['date'];
    $a=$_POST['1'];
    $b=$_POST['2']; 
    $c=$_POST['3'];
    $d=$_POST['4'];
      $query5 = "UPDATE `counselling_consent` SET
            `date` = '$date',
            a=$a,
            b=$b,
            c=$c,
            d=$d
            
            WHERE  `id` = '$id'";
    
        $data5=$conn->query($query5);
       
    }
    $sql6="SELECT * FROM `counselling_consent` WHERE `id` = '$id' ";
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
    </style><style type="text/css">
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
        <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
        <a href="counselling_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger" id="dashboard">Print</a>
    </div>
    <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
    <h3 class="text-center text-dark my-3 "> काऊस्लिंग  </h3>
  
<form method="POST">
        
    <div class="row mt-4">
        <div class="col-9"></div>
        <div class="col-3 mt-3"> <p  class="style10" > दिनांक <input  class="form-control" type="date" name="date" value="<?php echo $res6['date'];?>"></div>
    </div>
    <p class=" style10">मी नाव ( नातेवाईकाचे नाव )  &nbsp; <input type="text" name="1" value="<?php echo $res6['a'];?>"> </p>
    <p class=" style10">रुग्णाचे नाव (पेशन्टचे नाव )   &nbsp; <input type="text" name="" value="<?php echo $res['name'];?>" readonly></p>
	
	<p class="style10"> महात्मा ज्योतिराव जन आरोग्य योजना / प्रधानमंत्री जन आरोग्य योजना अंतर्गत शस्त्रक्रिया / उपचार (Procedures ) साठी समंती देत आहोत . सदर उपचार महात्मा ज्योतिराव जन आरोग्य योजना / प्रधानमंत्री जन आरोग्य योजनेमध्ये अंतर्भूत नसल्यास उपचाराचा खर्च करण्याची आमची तयारी आहे. तसेच उपचाराचा खर्च महात्मा ज्योतिराव जन आरोग्य योजना / प्रधानमंत्री जन आरोग्य योजनेमधून रुग्णालयास न मिळाल्यास मी /आम्ही सदर खर्च भरण्यास तयार आहोत . योजनेच्या शस्त्रक्रियेची सविस्तर माहिती मला / आम्हाला आमच्या भाषेत समजावून सांगण्यात अली आहे . <p>
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">

            <p class="style10">नातेवाईक / रुग्णाची सही  &nbsp;<input type="text" name="2" value="<?php echo $res6['b'];?>"><p>
<p class="style10">नातेवाईकाचे रुग्णाशी नाते  <input type="text" name="3" value="<?php echo $res6['c'];?>"> <p>

<p class="style10">नातेवाईकाचा मोबाईल नंबर <input type="text" name="4" value="<?php echo $res6['d'];?>"> <p>

            </div>
        </div>


                    <button class="btn btn-primary d-flex mx-auto" name="submit">Submit</button>
    </form>
    </div>
</body>

</html>