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
    <a href='counselling.php?id=<?php echo $id;?>' class="btn btn-primary noprint">Dashboard</a>
    <a class="btn btn-primary  noprint" onclick="window.print()">Print</a>
    </div>
<?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">काऊस्लिंग </h3>
        <?php include_once("../header/header.php") ?>
        
    <div class="row mt-4">
        <div class="col-9"></div>
        <div class="col-3 mt-3"> <p  class="style10" > दिनांक :<strong><?php echo $res6['date'];?></strong></div>
    </div>
    <p class=" style10">मी नाव ( नातेवाईकाचे नाव )  :&nbsp; <strong><?php echo $res6['a'];?></strong></p>
    <p class=" style10">रुग्णाचे नाव (पेशन्टचे नाव )  : &nbsp; <strong><?php echo $res['name'];?></strong></p>
	
	<p class="style10"> महात्मा ज्योतिराव जन आरोग्य योजना / प्रधानमंत्री जन आरोग्य योजना अंतर्गत शस्त्रक्रिया / उपचार (Procedures ) साठी समंती देत आहोत . सदर उपचार महात्मा ज्योतिराव जन आरोग्य योजना / प्रधानमंत्री जन आरोग्य योजनेमध्ये अंतर्भूत नसल्यास उपचाराचा खर्च करण्याची आमची तयारी आहे. तसेच उपचाराचा खर्च महात्मा ज्योतिराव जन आरोग्य योजना / प्रधानमंत्री जन आरोग्य योजनेमधून रुग्णालयास न मिळाल्यास मी /आम्ही सदर खर्च भरण्यास तयार आहोत . योजनेच्या शस्त्रक्रियेची सविस्तर माहिती मला / आम्हाला आमच्या भाषेत समजावून सांगण्यात अली आहे . <p>
        <div class="row">
            <div class="col-7"></div>
            <div class="col-5">

            <p class="style10">नातेवाईक / रुग्णाची सही :  &nbsp;<strong><?php echo $res6['b'];?></strong><p>
<p class="style10">नातेवाईकाचे रुग्णाशी नाते : <strong> <?php echo $res6['c'];?></strong><p>

<p class="style10">नातेवाईकाचा मोबाईल नंबर ;<strong><?php echo $res6['d'];?></strong><p>

            </div>
        </div>


                    
    </div>
    <script>
        window.print();
    </script>
</body>

</html>