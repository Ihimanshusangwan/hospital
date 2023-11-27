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
    <title>    Amniotic Membrane Transplantation (AMT) </title>
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
         
     <?php if($inp_arr[1]=='option1'){
            include_once("../../header/images.php");

        } 
       
        ?>
</body>
  
</html>
<h1 align="center" class="style33 style40"><strong>  Amniotic Membrane Transplantation (AMT)        </strong></h1>
<h1 align="center" class="style33"><strong> ( अॅम्निओटिक मेंब्रेन प्रत्यारोपण ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------ रुग्णाचे संमतीपत्र ------</span> </p>

</p> मला माझ्या मातृभाषेत सांगण्यात आले आहे की मला/ माझ्या पाल्याच्या उजव्या / डाव्या डोळ्याच्या बाहेरील आवरणाचा आजार आहे ( आजाराचे नाव --------------------------) ज्याकरिता शस्त्रक्रियेद्वारे अॅम्निओटिक मेंब्रेन अर्भकाच्या नाळेच्या आवरणाचे प्रत्यारोपण डोळ्याच्या बाहेरील भागावर करावे लागणार आहे (Amniotic Membrane Transplantation-AMT). हे आवरण ठराविक प्रकारच्या, १०० मोनोफिलामेंट नायलॉन या टाक्यानी बसविले जाईल व काही भाग ८-० पॉलीगॅलेक्टीन या प्रकारच्या टाक्यांने बसविले जाईल. तसेच डोळ्यावर तात्पुरती बॅण्डेज कॉन्टॅक्ट लेन्स बसवण्यात येईल. ह्या नंतर अॅम्निओटिक मेंब्रेनचा गरजेपेक्षा अधिक भाग काढून टाकण्यात येईल.<p>

</p> मला सांगण्यात आले आहे की माझ्या बुबुळावरचा डाग / आजार कायमचा राहु शकतो व ह्या शस्त्रक्रियेनंतर तो बरा होईलच असे नाही. मला सांगण्यात आले आहे की ह्या शस्त्रक्रियेदरम्यान बुबुळ फाटण्याची किंवा बुबुळाला छिद्र पडण्याची शक्यता आहे, ज्याकरिता पूर्ण बुबुळ प्रत्यारोपण करण्याची गरज लागू शकते. तसेच जंतुसंसर्ग, टाके तुटणे सैल होणे, नवीन रक्तवाहिन्यांचे जाळे तयार होणे व त्यामुळे रक्तस्त्राव होणे, दृष्टीत सुधारणा न होणे किंवा कमी होणे, डोळा दुखणे, काचबिंदू होणे या सारखे संभाव्य धोके किंवा गुंतागुंती( कॉप्लीकेशन्स) या
शस्त्रक्रियेमुळे किंवा नंतर दिलेल्या औषधांमुळे होऊ शकतात. तसेच हे प्रत्यारोपण केलेले आवरण वेळेआधी विरघळु शकते व त्याकरिता परत प्रत्यारोपणाची आवश्यकता लागू शकते. मला सांगण्यात आले आहे की या शस्त्रक्रियेनंतर अनेक महिने / वर्षे फेरतपासणी व औषधोपचार डॉक्टरांच्या सल्ल्याने करावा लागेल. मला सांगितले आहे की माझ्या डोळ्यावर बसविलेली तात्पुरती बॅण्डेज कॉन्टॅक्ट लेन्स निसटल्यास ती परत बसवावी लागू शकेल. तसेच मला सांगण्यात आले आहे की डोळ्याला काही अचानक त्रास झाल्यास जसे अचानक डोळा लाल होणे, उजेड सहन न होणे, डोळा दुखणे किंवा दृष्टी अधू होणे, अशा वेळेस, लगेच माझ्या डॉक्टरांना दाखवणे गरजेचे आहे. कारण ही अॅम्निओटिक मॅब्रेनच्या संसर्गाची लक्षणे असू शकतात. मला हे देखील सांगितले आहे की सर्व उपचारांनंतर सुध्दा दृष्टी कमी होऊ शकते व डोळ्याचा विदुपपणा तसाच राहू शकतो.
<p>

</p> मी हे नमुद करतो / करते की मला या संमतीपत्राचा अर्थ नीट समजलेला आहे व मी माझ्या डॉक्टरांना माझ्या / माझ्या पाल्याच्या उजव्या / डाव्या डोळ्याची अॅम्निओटिक मैब्रेन प्रत्यारोपणाची शस्त्रक्रिया करण्यास संमती देत आहे.<p>

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
<h2></h2>	
    <div class="container">
  <?php require("../../admin/middleConsentPatientRelativeDetail.php")?>
</div>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>

</body>
</html>


	