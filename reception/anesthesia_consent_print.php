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

$sql6="SELECT * FROM `anesthesia_consent` WHERE `id` = '$id' ";
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
        .style3 {
	font-size: 16px;
	font-weight: bold;
}
.style5 {color: #333333}
.style10 {font-size: 16px}
.style22 {font-size: 16px; color: #000000; }
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
    <h3 class="text-center text-dark my-3 ">INFORMED CONSENT FOR ANESTHESIA </h3>
    
    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3"> <p  class="style10" >तारीख  <strong><?php echo $res6['date']; ?></strong></div>
    </div>
<p class=" style10"> 1. I understand that anesthesia services are needed so that my doctor can perform the operation and procedure.<p>
	    		<p class=" style10">माझ्या डॉक्टरांना शस्त्रक्रिया करण्यासाठी भूल देण्याची गरज आहे याची मला जाणीव आहे.  </p>
				
				<p class="style10"> Patients receiving general anaesthesia may require wind pipe (Endotracheal Intubation ), the intubation may cause sore throat or hoarseness of voice and also teeth or denture may become loose . If they develop repiratory complications, they may put ventilator to support lungs. accidental death is extremely rare. however a remote possibility of this always exists in any surgery or anaesthesaia.
		
	

	<p class="style10"> धन्यवाद ...!</p>
	<html>
<style>
table, th, td {
  border:1px solid black;
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
</body>
<script>
    window.print();
</script>

</html>