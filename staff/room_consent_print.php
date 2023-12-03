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
    <style>
        body {
            margin: 0;
        }
        .style5 {color: #333333}
.style10 {font-size: 15px}
.style11 {font-size: 16px}

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
                
table, th, td {
  border:1px solid black;
}
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="ortho_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 "> संमतीपत्र </h3>
    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3"> <p  class="style10" > दिनांक &nbsp; <strong><?php echo $res6['date'];?></strong> &nbsp;</div>
    </div>
    <p class=" style10"> मी आमचा पेशंट नाव &nbsp; <strong><?php echo $res6['inp_1'];?></strong> &nbsp; वय &nbsp; <strong><?php echo $res6['inp_1'];?></strong> &nbsp; लिंग आमच्या पेशंटला &nbsp; <strong><?php echo $res6['inp_1'];?></strong> &nbsp; आजार असून त्यासाठी डॉक्टरांनी ऑपरेशन सांगितले आहे .  </p>
	
	<p class="style10"> आमच्या पेशंटचे ऑपरेशन पूर्णपणे महात्मा ज्योतिराव फुले जन आरोग्य योजना  / प्रधानमंत्री जन आरोग्य योजना यातून झाले / होणार असून आम्हाला जनरल वॉर्डमध्ये न राहता आम्ही आमच्या स्वइच्छाने स्पेशेल रुम / सेमी स्पेशेल रुम / डिलक्स रुम / सुपर डिलक्स रुमची मागणी केली आहे / केली होती. 
त्यासाठी लागणार अवांतर खर्च आम्ही देण्यासाठी तयार आहोत . <p>
<p class="style10">त्यासाठी आमची कुठल्याही प्रकारची तक्रार नसेल. <p>


	<p class="style10"> धन्यवाद ...!
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
</body>
<script>
    window.print();
</script>

</html>