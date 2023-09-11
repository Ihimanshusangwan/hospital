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
    <style>
        body {
            margin: 0;
        }
        .style5 {color: #333333}
.style10 {font-size: 14px}
.style24 {
	font-size: 14px;
	font-weight: bold;
}
.style25 {color: #FFFFFF}
.style26 {color: #000000}
.style27 {
	font-size: 14px;
	font-weight: bold;
}
.style28 {font-family: "Times New Roman", Times, serif}
.style29 {font-family: Arial, Helvetica, sans-serif}
.style32 {font-size: 14px}
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
        <a href=ap_for_document.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Application For Providing Medical Record / Information / Certificate / Form / Other </h3>
    <h3 class="text-center text-dark my-3 "> वैधकीय रेकॉर्ड / माहिती / प्रमाणपत्र / फॉर्म / इतर उपलब्ध करण्यासाठी अर्ज </h3>
    
    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3"> <p  class="style10" > दिनांक &nbsp;<strong><?php echo $res5['date_h'];?></strong></div>
    </div>
   
<p class="style28"> प्रति , <p>
<p class="style28">रुग्णालय व्यवस्थापक ,<p>
<p class="style29 style28">श्री सिद्धिविनायक नेत्रालय ,<p>
<p class="style28">बीड .  <p>

<p>
<p align-item="justify" class="style27"> महोदय , 
<p>
<p class="style27"> मी / आमचा रुग्ण &nbsp;<strong><?php echo $res5['patient'];?></strong> यु . एच. आय . डी &nbsp;<strong><?php echo $res5['uhid']; ?> </strong>
आय . पी. डी . क्रमांक &nbsp;<strong><?php echo $res5['ipd'];?></strong>   
<p>
<p class="style27"> आपल्या रुग्णालया मध्ये अँडमीट होता / होतो ,
     कृपया मला &nbsp;<strong><?php echo $res5['mala'];?></strong>
      साठी &nbsp;<strong><?php echo $res5['sathi'];?></strong>
      प्राप्त व्हावी हि विनंती .  <p>
<p class="style27">अँडमीशन दिनांक &nbsp;<strong><?php echo $res5['add_date'];?></strong><p>

<p class="style27">डिस्चार्ज दिनांक &nbsp;<strong><?php echo $res5['dis_date'];?></strong> <p>
<p class="style27">डॉक्टरचे नाव -&nbsp;<strong><?php echo $res5['d_name'];?></strong><p>
<p class="style27">रुग्णाचे नाव &nbsp;<strong><?php echo $res5['p_name'];?></strong><p>
<p class="style27">रुग्णाशी असलेले नाते &nbsp;<strong><?php echo $res5['relation'];?></strong><p>
<p class="style27">अर्जदाराची सही&nbsp;<strong><?php echo $res5['applicant'];?></strong><p class="style32">
<p class="style24">----------------------------------------------------------------------- --------------------------------------
<p>
<p>कार्यालयीन नोंद &nbsp;<strong><?php echo $res5['office_re'];?></strong>
<p>मान्य करण्यात येते / नाही &nbsp;<strong><?php echo $res5['agree'];?></strong>
<p>मंजूर करणाऱ्या डॉक्टरचे नाव  &nbsp;<strong><?php echo $res5['aprove_dr'];?></strong>
<p>दिनांक <span class="style25">&nbsp;<strong><?php echo $res5['date'];?></strong> 
<p class="style24">---------------------------------------------------------------------------------------------------------
<p>कागदपत्रे मिळाली / नाही &nbsp;<strong><?php echo $res5['doc_recive'];?>
<p>ज्यांना कागदपत्रे देण्यात अली त्यांचे नाव सही व दिनांक &nbsp;<strong><?php echo $res5['name'];?></strong>
<p>
</body>
<script>
    window.print();
</script>

</html>