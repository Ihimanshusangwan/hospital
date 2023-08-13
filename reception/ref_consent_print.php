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
$sql6="SELECT * FROM `ref_consent` WHERE `id` = '$id' ";
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
    <style>
    body {
        margin: 0;
    }

    .style5 {
        color: #333333
    }

    .style10 {
        font-size: 14px
    }

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

        #button {
            display: none !important;
        }

        @page {
            size: A4;
        }

        .noprint {
            visibility: hidden;
        }
    }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="ortho_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">CONSENT FOR REFUSAL OF TREATMENT</h3>
    <h3 class="text-center text-dark my-3 ">चिकित्सा / तपासणी नाकारण्या बाबत संमती</h3>

    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3">
            <p class="style10"> दिनांक <span class="style25">------<span class="style26">/</span>--------</span>/
        </div>
    </div>

    <p class=" style10"> I am / My Patient &nbsp; <strong><?php echo $res6['patient_1']; ?></strong>
        Have / has been advised for Treatment / Admission / Surgery /
        Investigation&nbsp; <strong><?php echo $res6['invest_1']; ?></strong> on (Date )
        &nbsp; <strong><?php echo $res6['d_1']; ?></strong> at SHRI SIDDHIVINAYK NETRALAYA.
        I / we do not wish to undergo the tretment that has been advised to me. The Pros and Cons of refusal of
        treatment including possibility of death have been explained to me in the language that I understand. I/we are
        responsible for the outscomes after refusing the treatment advised by my consultant.I will not hold the hospital
        or any staff member of the hospital responsible for the outcoms of refusal of Treatment .

    <p class=" style10">मला / आमच्या रुग्णाला नाव &nbsp; <strong><?php echo $res6['patient_2']; ?></strong> चिकित्सा / भरती
        होणे / शल्यचिकित्सा / तपासणी&nbsp; <strong><?php echo $res6['invest_2']; ?></strong> ही श्री सिद्धिविनायक नेत्रालय या रुग्णालयात
        करण्याचा सल्ला दिनांक&nbsp; <strong><?php echo $res6['d_2']; ?></strong> रोजी उपरोक्त नमूद केलेल्या आमच्या डॉक्टरांनी दिलेल्या आहे. सादर चिकित्सा
        नाकारल्यामुळे उध्दभवणारे धोके क्वचित मृत्यूची शक्यता याबाबत डॉक्टरांनी मला समजणाऱ्या भाषेमध्ये जाणीव करून दिलेली
        आहे. सल्ला नाकारल्यामुळे उध्दभवणाऱ्या धोक्याची मी / आम्ही स्वतः जबाबदार असू याची आम्हाला जाणीव आहे. या बाबत
        रुग्णालय किंवा रुग्णालय कर्मचारी हे जबाबदार असणार नाहीत. याची मला जाणीव आहे. </p>


    <p class="style10"> धन्यवाद ...!
        <html>
        <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
        </style>

        <body>

            <h2></h2>
            <table width="818"  cellspacing="8" cellpadding="10" class="border boder_black">
      <colgroup>
      <col span="2" style="border-color: #000000">
      </colgroup>
      <tr>
        <th width="137" class="style22" scope="col"><p>&nbsp;</p></th>
        <th width="105" class="style10" scope="col"><p>Signature सही</p></th>
        <th width="169" class="style10" scope="col"><p>Name नाव</p></th>
        <th width="109" class="style10" scope="col"><p>Date दिनांक</p></th>
        <th width="102" class="style10" scope="col"><p>Time वेळ</p></th>
      </tr>
      <tr>
        <th class="style22" scope="row"><p>Patient / Relative</p>
            <p>रुग्ण / नातेवाईक</p></th>
        <td class="style10"><strong><?php echo $res6['sign_1']; ?></strong></td>
        <td class="style10"><strong><?php echo $res6['name_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['date_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['time_1']; ?></td>
      </tr>
      <tr>
        <th class="style22" scope="row"><p>Witness (Relation with patient) </p>
            <p>साक्षीदार (रुग्णाशी नाते )</p></th>
        <td class="style10"><strong><?php echo $res6['sign_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['name_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['date_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['time_1']; ?></td>
      </tr>
      <tr>
        <th class="style22" scope="row"><p>Doctor</p>
            <p>डॉक्टर</p></th>
    
        <td class="style10"><strong><?php echo $res6['sign_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['name_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['date_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['time_1']; ?></td>
      </tr>
      <tr>
        <th class="style22" scope="row"><p>Interpreter </p>
            <p>माहिती समजावून सांगणारे</p></th>
        <td class="style10"><strong><?php echo $res6['sign_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['name_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['date_1']; ?></td>
        <td class="style10"><strong><?php echo $res6['time_1']; ?></td>
      </tr>
    </table>
                <table width="631" cellspacing="4" cellpadding="4">
                    <tr>
                        <th width="270" scope="col">
                            <p class="style11">Signature of patient <?php echo $res6['p_sign'];?></p>
                            <p class="style11">time : <?php echo $res6['p_time'];?> </p>
                        <th width="285" scope="col">
                            <p class="style11">Signature of witness - 1 </p>
                            <p class="style11">Name : <?php echo $res6['wit_name'];?></p>
                            <p class="style11">Relation : -<?php echo $res6['wit_rel'];?></p>
                            <p class="style11">Contact Details : <?php echo $res6['wit_details'];?> </p>
                            <p class="style11">date <?php echo $res6['wit_date'];?></p>
                    </tr>

                </table>
                <table width="200" cellspacing="4" cellpadding="4">

            </body>
            <script>
            window.print();
            </script>

            </html>