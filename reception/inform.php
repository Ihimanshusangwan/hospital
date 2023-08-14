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

$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  
  
  $sql6=mysqli_query($conn,"SELECT * FROM inform_consent WHERE id =$id");
  $row6=mysqli_fetch_assoc($sql6);

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
<!--
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
.style3 {
	font-size: 24px;
	font-weight: bold;
}
.style5 {color: #0000CC}
.style6 {
	font-size: 16px;
	font-weight: bold;
}
    </style>
</head>
<body>
<div id="button">
            <a href='inform_consent.php?id=<?php echo $id;?>' class="btn btn-primary m-2 noprint">Dashboard</a>
            <a class="btn btn-primary m-2 noprint" onclick="window.print()">Print</a>
        </div>
<?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">विशेष संमती पात्र </h3>
        <?php include_once("../header/header.php") ?>

    
 
    <p align="center">

	   <p align="center"> 
	   <h1>
	   
	  	<h6>रुग्णाचे नाव :  <strong><?php echo $res['name']; ?></strong>  
        यु एच आय डी नं  : <strong><?php echo $res2['uhid']; ?></strong> 
        आय पी डी नं :  <strong><?php echo $res2['ipd']; ?></strong> 
        दिनांक :  <strong><?php echo $res2['date']; ?></strong> 
        वय : <strong><?php echo $res['age']; ?></strong> 
        लिंग : <strong><?php echo $res['sex']; ?></strong></h6>	
		<h1 class="style6">मी <strong><?php echo $res['name']; ?> माझे स्वतः वर / वरील पेशंट वर उपरिनिर्दिष्ट शस्त्रक्रिया व औषधउपचार / तपासण्या / भुल उपचारपद्धती इत्यादी करता पुढील प्रमाणे माझे संमतीपत्र . </h1>
	   </p>
 
    

     	<p class="style6"> १. सदर औषधउपचार / तपासण्या / भुल उपचारपद्धतीची आवश्यकता , न केल्यास होणारे परिणाम , आणि ऑपरेशन    खेरीज अन्य उपचारामधील धोके व तोटे हे सर्व मला डॉ. यांनी समजावून सांगितले .</p>
	
	<p class="style6">  २. कोणत्याही ऑपरेशन संपूर्ण सुरक्षित नसते व  औषधउपचार / तपासण्या / शस्त्रक्रिया / उपचारपद्धती वा भुलेमुळे जीवाला धोका वा इजा होण्याची शक्यता सर्वसाधारण निरोगी असणाऱ्याला ( व्यक्तीला ) सुद्धा असते याची मला स्वच्छ कल्पना दिली गेली आहे .  </p>

	<p class="style6"> ३.जादा रक्तस्रव जंतुबाधा हृदय बंद पडणे व फुफूसात रक्ताची गुठळी अडकणे हे यांसारखे अकल्पित / आकस्मित इतर ही काही धोके शस्त्रक्रियेतुन वा भूदेण्यातून उद्धभवू शकतात याची मला कल्पना डॉक्टरांनी दिली आहे .	<p>
	
	
	<p class="style6"> ४. औषधउपचार / तपासण्या /शस्त्रक्रिया  / उपचारपद्धती करताना डॉक्टरांना काही कारणाने शस्त्रक्रिया  वा भुलेचे स्वरूप बदलावे लागले तर तसेच अत्यावश्यक वाटल्यास एखाद्या अवयव वा भाग काढून टाकावा लागल्यास अशा बदलास माझी संमती गृहीत आहे व तशी कल्पना मला दिली आहे .  
	<p>
	
	<p class="style6"> ५. वरील ऑपरेशन व संबंधित भूल यांच्यानंतर क्वचित , इच्छित फायदा होण्याऐवजी अन्य त्रास चालू शकतो . <p>
	<p class="style6"> उदा .<?php echo $row6['uda'];?><p>
<p class="style6"> पण तो टाळण्यासठी व झाल्यास सुधारण्यासाठी आवश्यक ती काळजी डॉक्टर ( सर्जन ) व डॉक्टर ( भुलतज्ञ )  <?php echo $row6['doctor'];?> आणि जरूर वाटल्यास त्यांनी सुचविलेले इतर डॉक्टर घेतील याचा मला विश्वास आहे व संभाव्य धोक्याची मला कल्पना आहे. वरील मजकूर मी वाचला आहे / मला वाचून दाखवण्यात आला  आहे.   मला ते समाजाला आहे व त्यास माझी संपूर्ण मान्यता आहे. <p>
<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<table class="table  table-hover text-center">
                            <tr>
                                <th></th>
    <th><span class="style6">नातेवाईक</span></th>
    <th><span class="style6">साक्षीदार</span></th>
    <th><span class="style6">पेशंट</span></th>
  </tr>
  <tr>
    <td><span class="style6">सही / अंगठा :</span></td>
    <td> <?php echo $row6['sahi1'];?></td>
    <td><?php echo $row6['sahi2'] ;?></td>
    <td><?php echo $row6['sahi3']; ?></td>
  </tr>
  <tr>
    <td><span class="style6">नाव : </span></td>
    <td><span class="style6"><?php echo $row6['name1'];?></span></td>
    <td> <?php echo $row6['name2'];?></td>
    <td><span class="style6">तारीख : <?php echo $row6['date'];?></span></td>
  </tr>
  <tr>
    <td><span class="style6">पत्ता :  </span></td>
    <td><span class="style6"> <?php echo $row6['add1'];?> </span></td>
    <td> <?php echo $row6['add2'];?></td>
<<<<<<< HEAD
    <td>  </td>
=======
    <td> <?php echo $row6['add3'];?></td>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
  </tr>
  <tr>
    <td class="style6">वय :    वर्ष : </td>
    <td><?php echo $row6['vay1'];?> <?php echo $row6['varsh1'];?></td>
    <td><?php echo $row6['vay2'];?> <?php echo $row6['varsh2'];?></td>
    <td><span class="style6">वेळ :  <?php echo $row6['time'];?> </span></td>
  </tr>
                            </table>

                            <script>
    window.print();
</script>
</body>
</html>


	