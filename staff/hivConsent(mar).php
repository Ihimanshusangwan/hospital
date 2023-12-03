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


$sql6=mysqli_query($conn,"SELECT * FROM hiv_consent WHERE id =$id");
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
.style1 {font-size: 16px}
.style3 {
	font-size: 24px;
	font-weight: bold;
}
    </style>
</head>
<body>

<div id="button">
            <a href='hiv_consent_mar.php?id=<?php echo $id;?>' class="btn btn-primary m-2 noprint">Dashboard</a>
            <a class="btn btn-primary m-2 noprint" onclick="window.print()">Print</a>
        </div>

<?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">एच आय व्ही तपासणी संबंधीचे संमतीपत्र  </h3>
        <?php include_once("../header/header.php") ?>

    </p>
 
    <p align="center">

	   <p align="center"> 
	   <h1>
	   
	  	<h1 class="style1">  <p class="form-label mt-2">रुग्णाचे नाव :  <strong><?php echo $res['name']; ?></strong>  
        यु एच आय डी नं  : <strong><?php echo $res2['uhid']; ?></strong> 
        आय पी डी नं :  <strong><?php echo $res2['ipd']; ?></strong> 
        दिनांक :  <strong><?php echo $res2['date']; ?></strong> 
        वय : <strong><?php echo $res['age']; ?></strong> 
        लिंग : <strong><?php echo $res['sex']; ?></strong>
     </p></h1>
		<h1 class="style1">एच आय व्ही तपासणी बद्दल पुढील माहिती मला समजावून सांगण्यात अली आहे.</h1> 
    </p>    

     	<p> १.	एच आय व्ही हा एक जिवाणू असून त्यामुळे एड्स होऊ शकतो . संसर्ग झाल्यानंतर जिवाणूंचा प्रतिकार करण्यासाठी शरीरामध्ये अँटीबॉडीज तयार होतात . एच आय व्ही अँटीबॉडी टेस्टचा रिपोर्ट पॉसिटीव्ह आला तर त्याचा अर्थ या जिवाणूंचा संसर्ग झाला आहे असा होतो. परंतु त्या व्यक्तीस एड्स आहेच असे होत नाही.े .</p>
	
	<p>  २.	आधुनिक तंत्रज्ञानाच्या वापरानंतर देखील काही जणांचा रिपोर्ट जंतुसंसर्ग नसतानाही पॉझिटिव्ह येऊ शकतो असे मला डॉक्टरांनी सांगितले आहे. (False - Positive ) . तसेच जंतुसंसर्ग झाल्यानंतरही अँटोबॉडीज तयार होण्यासाठी काही काळ लागतो , म्हणून काही केसेसमध्ये जंतुसंसर्ग असतानाही निगेटिव्ह रिपोर्ट येऊ शकतो ( False - Negative ).</p>

	<p>३.	एच आय व्ही अँटीबॉडी टेस्टचा रिपोर्ट डॉक्टरांना माहित असेल तर , त्यांच्याशी संबंधित आजारावर डॉक्टर चांगल्या पद्धतीने उपचार करू शकतात. एच आय व्ही संसर्ग होण्याचा धोका किंवा माझ्यामुळे इतरांना एच आय व्ही संसर्ग होण्याबद्दल चा धोका या गोष्टीबद्दलचा वैयक्तिक निर्णय यांच्यानंतर मला घेता येईल .   <p>
	
	
	<p>४.	माझ्या टेस्टचा रिझल्ट पॉझिटिव्ह असेल आणि जर तो मी इतरांना सांगितला जसे की ,जसे की मित्र , कुटुंबातील व्यक्ती , एम्प्लॉयर , घर मालक इन्शुरन्स कंपनी व इतर , तर माझ्यासोबत भेदभाव होऊ शकतो .म्हणून या टेस्ट चा रिपोर्ट दुसर्यांना सांगताना मी अतिशय काळजी घेतली पाहिजे . पॉझिटिव्ह रिझल्टची नोंद हि लॅब / हॉस्पिटलमधील रेकॉर्डमध्ये राहील .<p>
	
	<p> ५.	एच आय व्ही टेस्टच्या रिझल्टच्या गोपनीयतेबद्दल हॉस्पिटल चे नियम खूप कडक आहेत.<p>
	<p> ६.	माझ्या तपासणीचा रिपोर्ट गोपनीय राखण्यासाठी हॉस्पिटल पूर्ण प्रयत्नशील असेल. अनधिकृतपणे हि माहिती बाहेर पडण्याचा धोका असतो. यामुळे भेदभाव होण्याचा धिक असतो . तसेच या तपासणीचा रिझल्ट पॉझिटिव्ह आला किंवा पुढील काही तपासण्या केल्यानंतर एड्स  असल्याचे आढळले तर ते शासकीय यंत्रणेस कळवावे लागते. (NACO ). <p>
<p>  <strong>मला हेही समजते कि,</strong><p>
	
<p> १)	मी चाचणी घेण्यास नकार देऊ शकतो आणि माझा नकार हॉस्पिटल मध्ये माझ्या भविष्यातील काळजीवर परिणाम करणार नाही.   <p>
	
	<p> २ ) तपासणीचा   रिपोर्ट पॉझिटिव्ह आला तर , रिपोर्टचा परिणामांबाबत माझे तपासणी पश्चात समुपदेशन केले जाईल.  <p>
	<p> ३ ) मला रक्त काढण्याच्या प्रक्रियेबद्दल व त्यात असणाऱ्या किरकोळ धोक्याबद्दलही सांगण्यात आले आहे.   <p>
	<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

	<h2></h2>   <table class="table table-hover text-center">
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
    <td><span class="style6"><?php echo $row6['name2'];?></span></td>
    <td>तारीख: <?php echo $row6['date'];?> </span></td>
  </tr>
  <tr>
    <td><span class="style6">पत्ता :  </span></td>
    <td><span class="style6"><?php echo $row6['add1'];?> </span></td>
    <td><?php echo $row6['add2'];?></td>
    <td><?php echo $row6['add3'];?></td>
  </tr>
  <tr>
    <td class="style6">वय :    वर्ष : </td>
    <td><?php echo $row6['vay1'];?></td>
    <td><?php echo $row6['vay2'];?> </td>
    <td><span class="style6">वेळ :  <?php echo $row6['time'];?> </span></td>
  </tr>
                            </table>
		
<script>
    window.print();
</script>
</body>
</html>