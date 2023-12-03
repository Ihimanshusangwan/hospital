<?php 
 require("../../admin/connect.php");
 $id = $_GET['id'];
 session_start();
//  error_reporting(0);

 $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
 $row=mysqli_fetch_assoc($sql);

 $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
 $row1=mysqli_fetch_assoc($sql1);

 $sql2=mysqli_query($conn,"SELECT * FROM p_insure WHERE id = '$id';");
 $row2=mysqli_fetch_assoc($sql2);
 

 $sql = "SELECT * FROM titles WHERE id = 1;";
 $data = $conn->query($sql);
 $title = $data->fetch_assoc();
 $sql12="SELECT * FROM `config_print` WHERE 1";
$data12=$conn->query($sql12);
$res12=$data12->fetch_assoc();
if (!isset($res12['inp'])) {
    $inp_arr = array_fill(0, 3, 'option2');
} else {
    $inp = $res12['inp'];
    $inp_arr = json_decode($inp, true);
    $inp_arr = is_array($inp_arr) ? $inp_arr : array_fill(0, 3, '');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  Corneal Collagen Crosslinking     </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <style>
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

    .pad {
        padding: 2px;
    }

   
    </style>

    <style type="text/css">
<!--
.style10 {font-size: 11px}
.style22 {font-size: 11px; color: #000000; }
.style27 {font-size: 12px}
    .style33 {
	color: #660066;
	font-size: x-large;
	font-weight: bold;
}
.style39 {color: #058CFA}
@media print {
            .noprint {
                visibility: hidden;
            }
        }
    </style>

    
<p align="right" class="style10">  तारीख -------/-----/------<p>
	</head>
  </style>
</head>
<body>
<a class="btn btn-primary noprint" href="../eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <button class='btn btn-success noprint' onclick="window.print();">Print</button>

     <h2><h2>
     <?php if($inp_arr[1]=='option1'){
            include_once("../header/images.php");

        } 
       
        ?>
</body>
  
</html>
<h1 align="center" class="style33 style40"><strong> Corneal Collagen Crosslinking      </strong></h1>
<h1 align="center" class="style33"><strong> ( कॉर्नियल कोलॅजेन क्रॉसलिंकींग ) </strong></h1>
 <?php require("../../admin/consentHeaderDetails.php");?>
<p align="center" class="style9 style23 style27"><span class="style33">------ रुग्णाचे संमतीपत्रे ------</span> </p>

</p>मला माझ्या मातृभाषेत समजावले आहे की मला / माझ्या पाल्याच्या उजव्या डाव्या डोळ्याच्या बुबुळात कमकुवतपणा बुबुळाची जाडी कमी होणे (कॅरेटोकोनस)/ बुबुळाच्या पुढील भागाचा दोष (जो पुढील प्रमाणे निर्दिष्ट केला आहे). मला हे सांगण्यात आले आहे की हा आजार / दोष भविष्यात वाढण्याची शक्यता आहे व बुबुळ अधिक पातळ झाल्या मुळे फाटण्याची शक्यता आहे.<p>

</p> मला हे सांगण्यात आले आहे की हे टाळण्यासाठी सीएक्सएल (CXL) म्हणजेच कॉर्नियल कोलॅजेन क्रॉसलिंकींग (Corneal Collagen Crosslinking) ही बुबुळाची शस्त्रक्रिया करावी लागेल. या शस्त्रक्रियेत थेंबाच्या औषधाने डोळ्याला भूल दिली जाते व बुबुळाच्या वरचा पापुद्रा (एपिथिलीयम) काढला जातो. ह्या नंतर बुबुळावर रायबोफ्लेविन नावाचे औषध २० मिनिटे टाकण्यात येते व बुबुळावर ६ मिनिटांकरता अल्ट्राव्हायोलेट किरण (अतिनील प्रकाशकिरणे) सोडले जातात. ह्या नंतर बुबुळावर तात्पुरत्या स्वरुपाची बॅन्डेज कॉन्टॅक्ट लेन्स बसवली जाते.<p>

</p> मला हे सांगण्यात आले आहे की ह्या शस्त्रक्रियेद्वारे बुबुळाचा दोष बरा किंवा घालवता येणार नाही तर केवळ हा दोष वाढू नये व बुबुळाची स्थिती स्थिर रहावी यासाठी हा उपचार आहे. मला शस्त्रक्रियेनंतर नियमित, म्हणजे साधारण दर ३ महिन्यानी माझ्या डॉक्टरांना दाखवणे गरजेचे आहे. तसेच ह्या शस्त्रक्रियेनंतर देखील हा दोष वाढू शकतो, ज्याकरिता परत अशी शस्त्रक्रिया करावी लागू शकेल.<p>
</p> 3. मला समजले आहे की आधीपेक्षा दृष्टी कमी पण होऊ शकते. पुढील गुंतागुंत होण्याची शक्यता आहे जसे की दृष्टीची स्पष्टता कमी होणे, बुबुळाचा व्रण वाढणे, प्रकाशाचा त्रास होणे, जंतुसंसर्ग होणे. शस्त्रक्रियेनंतर दिलेल्या औषधामुळे आधीपासून विद्यमान असलेले विषाणूचे संसर्ग परत उद्भवू शकणे, व्रण जास्त प्रमाणात असल्यास, बुबुळाला छिद्र पडू शकते, ज्यामध्ये जंतुसंसर्ग होणे, मोतीबिंदू होणे किंवा अतिरिक्त शस्त्रक्रिया कराव्या लागू शकतात. मला समजले आहे की योग्य उपचार होण्यासाठी मला फेरतपासणीसाठी येणे गरजेचे आहे.<p>

<p align="center" class="style9 style23 style27"><span class="style33">------ शस्त्रक्रियेतील संभाव्य गुंतागुंती व धोके  ------</span> </p>

</p> या शस्त्रक्रियेत काही संभाव्य धोके किंवा गुंतागुंती आहेत जसे बुबुळाला जंतुसंसर्ग (इन्फेक्शन) होणे, बुबुळाच्या काढलेल्या वरच्या पापुद्र्याची जखम न भरणे, बुबुळाला सूज येणे व दृष्टी कमी होणे.
मी हे नमूद करतो / करते की डॉक्टरांनी मला केरॅटोकोनस या आजाराबद्दलची व कॉर्नियल कोलॅजेन क्रॉसलिंकींग (Corneal Collagen Crosslinking) ह्या शस्त्रक्रियेबद्दलची सर्व माहिती नीट सांगितली आहे व त्या संबंधी सर्व फायदे, तोट्यां बद्दल माहिती नीट समजलेली आहे व मी माझ्या (स्वतःच्या ) / माझ्या पाल्याच्या उजव्या डाव्या डोळ्याची ही शस्त्रक्रिया करण्यास संमती देत आहे.<p>


</p> सदर शस्त्रक्रियेचे फायदे, तोटे, जोखिमा संभाव्य गुंतागुंती आणि पर्यायी उपचार मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे. ज्याकरिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो / देते. मला शस्त्रक्रियेच्या / उपचाराच्या सगळ्या गुंतागुंतीची (कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, तरी माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे नमूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.<p>

</p> तसेच, या शस्त्रक्रियेची किंवा परत कराव्या लागणाऱ्या शस्त्रक्रियेची माहिती, छायाचित्र किंवा व्हिडिओ रेकॉर्डिंग, है सर्व वैद्यकीय ज्ञानाच्या वृद्धीसाठी प्रकाशित करण्यासाठी मी संमती देतो/देते.
मी हे संमतीपत्र वाचले आहे मला ते वाचून दाखविले आहे, मला ते समजले आहे आणि माझ्या सर्व प्रश्नांची मला उत्तरे मिळालेली आहेत आणि मी माझे नेत्रतज्ज्ञ ----------------------- यांना माझ्या उजव्या डाव्या डोळ्यावर ------------------------- शस्त्रक्रिया करण्यासाठी संमती देतो/ देते. शस्त्रक्रियेसाठीच्या या वैध संमतीपत्रावर मी स्वेच्छेने सही करत आहे. <p>


	<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<div class="container">
        <?php require("../../admin/middleConsentPatientRelativeDetail.php")?>
</div>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	