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
    $date = $_POST['date'];
    $inp_1 = $_POST['inp_1'];
$inp_2 = $_POST['inp_2'];
$inp_3 = $_POST['inp_3'];
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
      $query5 = "UPDATE `room_consent` SET
            `date` = '$date',
            `inp_1`='$inp_1',
            `inp_2`='$inp_2',
            `inp_3`='$inp_3',
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
            echo "sucessfully";
        }
     
    
      
    }
    $sql6="SELECT * FROM `room_consent` WHERE `id` = '$id' ";
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
        <a href="ortho_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
        <a href="room_consent_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger" id="dashboard">Print</a>
    </div>
    <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
    <h3 class="text-center text-dark my-3 "> संमतीपत्र </h3>
    
    <div class="row" >
      <div class="col-md-3" >
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
    <hr><form method="POST">
        
    <div class="row mt-4">
        <div class="col-9"></div>
        <div class="col-3 mt-3"> <p  class="style10" > दिनांक <input type="date" name="date" value="<?php echo $res6['date'];?>"></div>
    </div>
    <p class=" style10"> मी आमचा पेशंट नाव &nbsp; <input type="text" name="inp_1" value="<?php echo $res6['inp_1'];?>"> &nbsp;वय  &nbsp;<input type="text" name="inp_2" value="<?php echo $res6['inp_2'];?>"> &nbsp; लिंग आमच्या पेशंटला  &nbsp;<input type="text" name="inp_3" value="<?php echo $res6['inp_3'];?>"> &nbsp; आजार असून त्यासाठी डॉक्टरांनी ऑपरेशन सांगितले आहे .  </p>
	
	<p class="style10"> आमच्या पेशंटचे ऑपरेशन पूर्णपणे महात्मा ज्योतिराव फुले जन आरोग्य योजना  / प्रधानमंत्री जन आरोग्य योजना यातून झाले / होणार असून आम्हाला जनरल वॉर्डमध्ये न राहता आम्ही आमच्या स्वइच्छाने स्पेशेल रुम / सेमी स्पेशेल रुम / डिलक्स रुम / सुपर डिलक्स रुमची मागणी केली आहे / केली होती. 
त्यासाठी लागणार अवांतर खर्च आम्ही देण्यासाठी तयार आहोत . <p>
<p class="style10">त्यासाठी आमची कुठल्याही प्रकारची तक्रार नसेल. <p>


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
                            <td> <input class="form-control" type="text"  value="<?php echo $res6['sign_1']; ?>" name="sign_1"></td>
                            <td> <input class="form-control" type="text" value="<?php echo $res6['name_1']; ?>"  name="name_1"></td>
                            <td> <input class="form-control" type="date"  value="<?php echo $res6['date_1']; ?>" name="date_1"></td>
                            <td> <input class="form-control" type="time" value="<?php echo $res6['time_1']; ?>"  name="time_1"></td>
                        </tr>
                        <tr>
                            <td> <label class="style11">Witness (Relation with Patient / साक्षीदार(रुग्णाशी नाते ))
                            </td>
                            <td> <input class="form-control" type="text"  value="<?php echo $res6['sign_2']; ?>" name="sign_2"></td>
                            <td> <input class="form-control" type="text" value="<?php echo $res6['name_2']; ?>"  name="name_2"></td>
                            <td> <input class="form-control" type="date"  value="<?php echo $res6['date_2']; ?>" name="date_2"></td>
                            <td> <input class="form-control" type="time" value="<?php echo $res6['time_2']; ?>"  name="time_2"></td>
                        </tr>
                        <tr>
                            <td><label class="style11">Doctor /डॉक्टर</label> </td>
                            <td> <input class="form-control" type="text" value="<?php echo $res6['sign_3']; ?>"  name="sign_3"></td>
                            <td> <input class="form-control" type="text" value="<?php echo $res6['name_3']; ?>"  name="name_3"></td>
                            <td> <input class="form-control" type="date" value="<?php echo $res6['date_3']; ?>"  name="date_3"></td>
                            <td> <input class="form-control" type="time" value="<?php echo $res6['time_3']; ?>"  name="time_3"></td>
                        </tr>
                        <tr>
                            <td class="style11">Anesthetist / भूलतज्ञ </td>
                            <td> <input class="form-control" type="text"    type="text" value="<?php echo $res6['sign_4']; ?>" name="sign_4"></td>
                            <td> <input class="form-control" type="text"  type="text" value="<?php echo $res6['name_4']; ?>" name="name_4"></td>
                            <td> <input class="form-control" type="date"   type="text" value="<?php echo $res6['date_4']; ?>" name="date_4"></td>
                            <td> <input class="form-control" type="time"   type="text" value="<?php echo $res6['time_4']; ?>" name="time_4"></td>
                        </tr>
                        <tr>
                            <td class="style11">Interpreter / माहिती समजावून सांगणारे </td>
                            <td> <input class="form-control" type="text"   type="text" value="<?php echo $res6['sign_5']; ?>" name="sign_5"></td>
                            <td> <input class="form-control" type="text"   type="text" value="<?php echo $res6['name_5']; ?>" name="name_5"></td>
                            <td> <input class="form-control" type="date"   type="text" value="<?php echo $res6['date_5']; ?>" name="date_5"></td>
                            <td> <input class="form-control" type="time"   type="text" value="<?php echo $res6['time_5']; ?>" name="time_5"></td>
                        </tr>
                    </table>
                    <button class="btn btn-primary d-flex mx-auto" name="save">save</button>
    </form>
    </div>
</body>

</html>