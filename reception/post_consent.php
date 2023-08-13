<?php
error_reporting(0);
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();

$sql6=mysqli_query($conn,"SELECT * FROM post_consent WHERE id =$id");
$row6=mysqli_fetch_assoc($sql6);


$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style type="text/css">
.style3 {
	font-size: 24px;
	font-weight: bold;
}
.style5 {color: #333333}
.style6 {
	font-size: 16px;
	font-weight: bold;
} .header {
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
<body>
<div id="button">
            <a href='postConsent.php?id=<?php echo $id;?>' class="btn btn-primary m-2 noprint">Dashboard</a>
            <a class="btn btn-primary m-2 noprint" onclick="window.print()">Print</a>
        </div>

    </p>
	<?php include_once("../header/images.php") ?>
    <p align="center">
<h1 align="center"><span class="style3"> ऑपरेशन नंतर पेशंटने घ्यावयाची काळजी</span></h1>
	   <p align="center"> 
	
	  <?php include_once("../header/header.php") ?>
      
    </p>
 
    <p align="center">
<h1 class="style3  style5"> </h1>
	   <p align="center"> 
	   <h1>
	    <p class="style6"> १ तीन आठवडे मानेखालून अंघोळ घेणे , डोळ्यात पाणी जाऊ देऊ नये .</p>
	
	<p class="style6">  २. तीन आठवडे ऑपरेशन झालेल्या कुशीवर झोपू नये . </p>

	<p class="style6"> ३. प्रखर उजेड व धूर टाळण्यासाठी काळा चष्मा लावावा . (चष्माचा नंबर मिळेपर्यंत )	<p>
	
	
	<p class="style6"> ४. धाणेरडे हात किंवा रुमाल डोळ्याला लावू नये , पाणी आल्यास गालावरच टिपू घ्यावे .<p>
	
	<p class="style6"> ५. जाड वजन उचलू नये , जोरात खोकला , गुळण्या करू नये . <p>
	<p class="style6"> ६. ऑपरेशन नंतर दोन दिवस हलका आहार आणि नंतर नेहमीचा आहार घ्यावा .<p>
<p class="style6">७. लहान मुलांना जवळ घेऊ नये. कारण खेळताना डोळ्याला हात लागू शकतो . <p>
<p class="style6"> ८. डोळ्यात ड्रॉप्स टाकण्याआधी हात साबणाने स्वच्छ धुऊन खालची पापणी ओढून टाकणे . <p>
	<p class="style6">१०. आठवड्यानंतर फेरतपासणीस येणे .   
<p class="style6">११. ऑपरेशन झालेल्या डोळ्याला लाली , वेदना , किंवा घाण आल्यास त्वरित हॉस्पिटलमध्ये संपर्क साधावा . <p>
<p class="style6"> १२. बैलगाडीवर प्रवास करू नये .<p>
	
	<p class="style6"> १३. कापसाचा बोळा भिजून अलगद बाहेरूनच घाण साफ करणे.<p>
	<p class="style6"> १४. गोळ्या जेवणानंतर घेणे.<p>
<p class="style6"> १५. बी. पी., डायबेटिज, दमा , इ. पेशन्टने  आपली औषधी नेहमीप्रमाणे घेणे .<p>

	  <div class="row">
        <div class="col-7"></div>
        <div class="col-5"><p class="style6">Date : <?php echo $row6['date'];?></div>
        <div class="col-7"></div>
        <div class="col-5"><p class="style6">( Patient / Relative Signature ) :<?php echo $row6['sign'];?></p></div>
    </div>

    <script>
    window.print();
</script>
</body>
</html>


	