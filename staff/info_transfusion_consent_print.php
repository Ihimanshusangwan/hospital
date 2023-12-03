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

$sql6="SELECT * FROM `info_transfusion_consent` WHERE `id` = '$id' ";
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
      table,td,th{
        border:1px solid black;
      }
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
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="info_transfusion_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">INFORMED CONSENT FOR TRANSFUSION OF BLOOD / BLOOD COMPONENTS</h3>
    <h3 class="text-center text-dark my-3 "> रक्त किंवा रक्तातील घटक बदलण्या बाबत संमती पात्र </h3>
    
    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3"> <p  class="style10" > दिनांक &nbsp; <strong><?php echo $res6['date'];?>"</strong>&nbsp;</div>
    </div>
    <p class="style24"> My Physician Dr. &nbsp; <strong><?php echo $res6['dr'];?></strong>&nbsp;  has informed me that during treatment .I need or may need transfusion of whole blood and / or Fresh Frozen Plasma , Packed Cell , Platelets or Cryoprecipitate in  interest of my health and proper medical care .    </p>
	 <p class="style24">माझ्या डॉक्टर &nbsp; <strong><?php echo $res6['dr_1'];?></strong>&nbsp; कडून मला सगण्यात आलेले आहे कि, मला आता तात्काळ किंवा वैधकीय उपचार चालू असतांना संपूर्ण रक्त बदलणे किंवा फ्रेश फ्रोझन प्लाझ्मा , पॅकड सेल्स , प्लेटलेट्स किंवा क्रायोप्रिसिपिटेट  बदलणे हे माझ्या स्वास्थ्य , आरोग्य आणि वैधकीय काळजीसाठी गरजेचे आहे. <p> 
 
 <p class="style24">Red Cell &nbsp; <strong><?php echo $res6['red'];?></strong>&nbsp; For  Bleeding or Low Hemoglobin  
 <p>
 <p class="style24"> Platelets &nbsp; <strong><?php echo $res6['platelets'];?></strong>&nbsp; For Bleeding or Low Platelet count 
 <p>
 
 <p class="style24"> Plasma &nbsp; <strong><?php echo $res6['plasma'];?></strong>&nbsp; For Restoring blood volume or providing factors  
 <p>
 <p class="style24">Cryoprecipitate &nbsp; <strong><?php echo $res6['cryo'];?></strong>&nbsp; For Special clotting factors  
 <p>
 
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