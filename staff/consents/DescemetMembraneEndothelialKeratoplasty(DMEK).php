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
    <title>Descemet Membrane Endothelial Keratoplasty (DMEK)   </title>
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
<h1 align="center" class="style33 style40"><strong> Descemet Membrane Endothelial Keratoplasty (DMEK)    </strong></h1>
<h1 align="center" class="style33"><strong> ( डेसिमेट मेंब्रेन एंडोथिलियल केरॅटोप्लास्टी ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------डी एम इ के या शस्त्रक्रियेमधील गुंतागुंती व संभाव्य धोके------</span> </p>

</p>यात संभाव्य धोके, कोणत्याही पूर्ण नेत्रपटल (कॉर्निया) प्रत्यारोपणासारखे (full thickness corneal transplantation) असतात, जसे की डोळ्यात रक्तस्त्राव, जंतुसंसर्ग, दृष्टिपटल (रेटिना) पडदा सुटून येणे, ग्राफ्ट रिजेक्शन, दीर्घकाळ सूज, दोन प्रतिमा दिसणे, कॉर्नियाची पारदर्शकता कमी होणे, दृष्टीसुधार न होणे किंवा असलेली दृष्टी मंदावणे, शस्त्रक्रियेनंतर किंवा औषधांमुळे काचबिंदू आणि मोतीबिंदू होणे.<p>

</p><strong> डी एम इ के या शस्त्रक्रियेच्या विशिष्ट संभाव्य गुंतागुंती : </strong><p>

</p> शस्त्रक्रिया करून बसवलेल्या (कॉर्निया) बुबुळाच्या आतील थराचा भाग (डेसिमेंट मेंब्रेन विथ एंडोथिलियल बटन) काही दिवसात आठवड्यात सरकल्यास, तो परत जागेवर बसवण्याची शस्त्रक्रिया करावी लागते. शस्त्रक्रियेनंतर योग्य तो परिणाम न मिळाल्यास ती परत करावी लागू शकते. पर्यायी उपचार म्हणून पूर्ण कॉर्निया प्रत्यारोपण करावे लागू शकते. परत केलेल्या शस्त्रक्रियेनंतर दृष्टीत सुधारणा होतेच असे नाही. शस्त्रक्रियेसाठी दिलेल्या भुलीच्या संभाव्य गुंतागुंती- इंजेक्शनमुळे डोळ्याला छिद्र पडणे, डोळ्याच्या नसेला इजा होणे, वरची पापणी खाली येणे, डोळ्याच्या दृष्टिपटलाच्या (रेटिना) रक्तवाहिन्यांच्या रक्ताभिसरणामध्ये अडथळे, श्वसनाचे त्रास, रक्तदाब कमी होणे.<p>

</p> शस्त्रक्रियेनंतर फेरतपासणीसाठी डॉक्टरांच्या सल्ल्यानुसार वेळोवेळी यावे लागेल (काही महिने ते काही वर्ष) व तेव्हा काही तपासण्या आवश्यक असू शकतील याची मला कल्पना दिलेली आहे. मला समजावले आहे की शस्त्रक्रियेच्या सफलतेसाठी मी नियमितपणे औषधे वापरणे गरजेचे आहे. मला समजावून सांगितले आहे की मला काही परिस्थितीत तातडीने दवाखान्यात येणे गरजेचे आहे, जसे की डोळे अचानक लाल होणे, प्रकाश किरण सहन न होणे, डोळ्यात टोचल्यासारखे वाटणे, डोळा दुखणे किंवा दृष्टी मंदावणे, कारण ही ग्राफ्टसंसर्ग किंवा ग्राफ्ट रिजेक्शनची लक्षणे असू शकतात. <p>
 </p> मला समजले आहे की वर नमूद केलेल्या संभाव्य गुंतागुंतींच्या व्यतिरिक्त काही अनपेक्षित धोके किंवा गुंतागुंतीचे प्रसंग असू शकतात. शस्त्रक्रियेदरम्यान ते लक्षात आल्यास, माझ्या माझ्या पाल्यासाठी योग्य असलेले उपचार / शस्त्रक्रिया करण्यासाठी मी माझ्या नेत्रतज्ज्ञांना संमती देत आहे. मी कबूल करतो/करते की शस्त्रक्रियेच्या सफलतेविषयी मला कोणत्याही प्रकारची हमी दिली गेलेली नाही.<p>

</p> मला पर्यायी उपचारांची माहिती दिली गेलेली आहे.<p>
</p>मी प्रमाणित करतो / करते की मला वरील संमतीपत्र समजले आहे. मी माझ्या नेत्रतज्ज्ञ--------------------- यांना माझ्या उजव्या डाव्या डोळ्यावर एंडोथिलियल केरॅटोप्लास्टी करण्यासाठी संमती देतो/ देते .<p>



<p align="center" class="style9 style23 style27"><span class="style33">------रुग्णाचे संमतीपत्र------</span> </p>

</p>मला माझ्या मातृभाषेत सांगितले गेले आहे की माझ्या डोळ्याला आजार आहे ( निर्दिष्ट करा --------------------------- फ्युक्स डिस्ट्रॉफी, आधी केलेली डोळ्यांची शस्त्रक्रिया,
असफल कॉर्निया (नेत्रपटल) प्रत्यारोपण, आधी लागलेला मार) ज्यामुळे माझ्या कॉर्नियाच्या आतील थराच्या पेशी (endothelial cell count) किमान संख्येपेक्षा खालावल्यामुळे माझ्या कार्नियाला सूज आली आहे व त्याची पारदर्शकता कमी झालेली आहे. माझ्या कॉर्नियाचे इतर थर सक्षम आहेत. <p>

</p> डी एस इ के डी एस ए इ के या शस्त्रक्रियेद्वारे माझ्या कॉर्नियाचा सर्वात आतला थर, नेत्रदानातून मिळालेल्या कॉर्नियामधून घेऊन बसवला जाणार आहे. पूर्ण कॉर्निया प्रत्यारोपण यापेक्षा ही शस्त्रक्रिया जलद होते व केलेला छेद छोटा असतो, जास्त स्थिर असतो व डोळ्याला चुकून मार लागल्यास तो विस्थापित होण्याची शक्यता कमी असते. एकूण टाके कमी असल्यामुळे शस्त्रक्रियेनंतर विषम दृष्टीचा नंबर ( astigmatism) कमी प्रमाणात लागतो. कॉर्नियाचा फक्त आतील थर बदललेला असतो व 90 %  कॉर्निया स्वतःचा (आधीचाच असतो त्यामुळे ग्राफ्ट रिजेक्शनचे प्रमाण कमी असते व डोळ्याची संरचनात्मक अखंडता जास्त चांगली राहू शकते.<p>

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
   <div class="container">
  <?php require("../../admin/middleConsentPatientRelativeDetail.php")?>
</div>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	