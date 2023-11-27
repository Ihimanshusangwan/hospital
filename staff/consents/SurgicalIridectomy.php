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
    <title> Surgical Iridectomy </title>
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
     <h2><h2>
    <table width="1124" border="1" align="center" class="style33">
	 <colgroup>
        <tr bgcolor="#A631A9">
		 </colgroup>
            <th width="1032">&nbsp;</th>
                   
        </tr>
</table>
</body>
  
</html>
<h1 align="center" class="style33"><strong> Surgical Iridectomy </strong></h1>
<h1 align="center" class="style33"><strong> (शस्त्रक्रियेव्दारे परिपटलामध्ये (आयरिस) केलेला छेद ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------शस्त्रक्रिया करण्यासाठीची कारणे------</span> </p>
<p align="left" class="style30"> मला माझ्या मातृभाषेत समजावून सांगितले आहे की माझ्या / माझ्या पाल्याच्या उजव्या डाव्या डोळ्याला ------------------------------ आजार दोष आहे ज्या
करिता डोळ्याच्या पुढील भागातील रंगीत पडदा, म्हणजे परिपटलामध्ये (Iris ) शस्त्रक्रियेव्दारे छिद्र करावे लागेल. या शस्त्रक्रियेत डोळ्याच्या बुबुळावर छोटा छेद घेतला जाईल व त्यातून परिपटलाच्या परीघामध्ये (Peripheral Iris) एक छोटे छिद्र केले जाईल. बुबुळावरील छेदाला १००० नायलॉनच्या टाक्यानी बंद केले जाईल.<p>
</p><strong>शस्त्रक्रियेद्वारे केल्या जाणाऱ्या आयरिडेक्टोमी मध्ये खालील पर्याय उपलब्ध आहेत</strong><p>

</p> १. पेरिफेरल बटनहोल ( परीघाजवळील छिद्ररुपी आयरिडेक्टोमी)<p> 

</p> २. सेक्टर आयरिडेक्टोमी ( बाहुलीपासून परीघापर्यंत एक पूर्ण त्रिकोणाकार हिस्सा काढणे)<p>

</p> 3. की होल आयरिडेक्टोमी (किल्लीच्या आकाराचा आयरिसचा तुकडा काढणे)<p>
</p> ४. ऑप्टिकल आयरिडेक्टोमी ( दृष्टी सुधारण्याच्या अपेक्षेने केलेली आयरिडेक्टोमी)<p>
</p> ५. इतर काही. पुढील प्रमाणे ----------------------------------------<p>
</p> ही शस्त्रक्रिया संपूर्ण डोळ्याला स्थानिक भूल देऊन करण्यात येईल. <p> 


<p align="center" class="style33"> -----शस्त्रक्रियेतील संभाव्य धोके व गुंतागुंती----- <p>

</p>ह्या शस्त्रक्रियेत काही धोके व गुंतागुंती उद्भवू शकतात, ज्या पुढील प्रमाणे आहेत<p>

<p> 1. डोळ्याच्या परिपटलावर तसेच परिपटलाच्या समोरील भागात (Anterior chamber) सूज येणे<p> 

</p>2. डोळ्याच्या परिपटलाच्या समोरील (Anterior chamber) किंवा नेत्रभिंगाच्या मागील भागात (Posterior<p>

</p> 3. डोळ्याचा दाब (Intraocular pressure) वाढणे. <p>
</p>4. नेत्रभिंगास इजा होऊन त्यास मोतीबिंदू होणे किंवा ते जागेवरून सरकणे <p>
</p>5. कृत्रिम भिंग (Intraocular lens) जागवरून सरकण <p>
</p>6. परिपटल अनपेक्षितरित्या फाटणे (Iridodialysis ) <p>
</p>7. डोळ्याच्या आत जंतुसंसर्ग होणे <p>
</p>8. डोळ्याच्या मागील आगातील चिकट द्रवरुपी पदार्थ (Vitreous humour) बाहेर येणे <p>
</p> 9. परिपटलामध्ये केलेले छिद्र आरपार / पूर्ण न होणे, व त्याकरिता परत शस्त्रक्रिया करावी लागू शकते <p>
</p>10. बुबुळाच्या आतील आवरणास (Corneal endothelium) इजा होणे किंवा त्यास सूज येणे व त्यामुळे बुबुळावर कायमचा डाग येणे (फूल पडणे).<p> 
</p> 11. शस्त्रक्रियेनंतर तात्पुरती किंवा कायमस्वरूपी दृष्टी कमी होणे . <p>
 </p> मला हे सांगण्यात आले आहे की ही शस्त्रक्रिया माझ्या / माझ्या पाल्याच्या उजव्या डाव्या डोळ्याच्या ---------------- आजाराकरिता केली जात आहे व या शस्त्रक्रियेनंतर सध्याच्या दृष्टीत सुधारणा होण्याची खात्री देता येत नाही.<p>
 </p> मी याद्वारे हे नमूद करू इच्छितो की या शस्त्रक्रियेचे सर्व संभाव्य परिणाम मला समजले आहेत आणि उपचार करणाऱ्या नेत्रतज्ज्ञांनी दिलेल्या स्पष्टीकरणावर मी समाधानी आहे. रुग्णालय रुग्णालयातील कर्मचारी / उपचार करणारे डॉक्टर आणि त्यांचे सहाय्यक उपचाराशी संबंधित कोणत्याही नुकसानीसाठी जबाबदार असणार नाहीत. अशा दुर्दैवी दुर्घटनांमध्ये मी कोणत्याही परतावा / भरपाईसाठी दावा करणार नाही. अशा सर्व परिस्थितीमध्ये रुग्णालय प्रशासनाचा निर्णय अंतिम असेल. मी कबूल करतो / करते की मी स्वेच्छेने या संमतीपत्रावर स्वाक्षरी करून संमती देत आहे. <p>

<p align="center" class="style33"> ----- रुग्णाचे संमतीपत्र ----- <p>

</p> सदर शस्त्रक्रियेचे फायदे, तोटे, जोखिमा, संभाव्य गुंतागुंती आणि पर्यायी उपचार, मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे, ज्या करिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो/देते. मला शस्त्रक्रियेच्या / उपचाराच्या सगळ्या गुंतागुंतींचे ( कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, तरी माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे नमूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.
तसेच, माझी ओळख ( छायाचित्र किंवा लेखी स्वरुपात) उघड न करता, शास्त्रीय संशोधन, वैद्यकीय शिक्षण, वैद्यकीय नोंदी, शास्त्रीय मासिकांमध्ये प्रकाशन या कारणांसाठी व या शस्त्रक्रियेचा अभ्यास करणे,छायाचित्र घेणे,व्हिडिओ रेकॉर्डिंग करणे याला मी संमती देतो/देते.
तसेच, या शस्त्रक्रियेची किंवा परत कराव्या लागणाऱ्या शस्त्रक्रियेची माहिती, छायाचित्र किंवा व्हिडिओ रेकॉर्डिंग, हे सर्व वैद्यकीय ज्ञानाच्या वृद्धीसाठी प्रकाशित करण्यासाठी मी संमती देतो/ देते.<p>
</p>संमतीपत्र वाचले आहे / मला ते वाचून दाखविले आहे, मला ते समजले आहे आणि माझ्या सर्व प्रश्नांची मला उत्तरे मिळालेली आहेत आणि मी माझे नेत्रतज्ज्ञ ह्या वैध संमतीपत्रावर मी स्वेच्छेने सही करत आहे.
 <p>


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
</p>       <p>
		</p>  <p>


<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<h2></h2>
	
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	