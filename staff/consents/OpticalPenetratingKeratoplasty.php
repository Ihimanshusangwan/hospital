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
    <title> Optical Penetrating Keratoplasty </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style type="text/css">
<!--
.style10 {font-size: 11px}
.style22 {font-size: 11px; color: #000000; }
.style24 {font-size: 14px; color: #000000; }
.style27 {font-size: 12px}
.style30 {font-size: 12px; font-weight: bold; }
    .style33 {
	color: #660066;
	font-size: x-large;
	font-weight: bold;
}
    .style36 {font-family: "Times New Roman", Times, serif}
    .style38 {color: #330066}
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
<h1 align="center" class="style33"><strong> Optical Penetrating Keratoplasty </strong></h1>
<h1 align="center" class="style33"><strong> ( ऑप्टिकल पेनेट्रेटिंग केरॅटोप्लास्टी ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------रुग्णाचे संमतीपत्र------</span> </p>
</p> मला माझ्या मातृभाषेत सांगितले आहे की माझ्या / माझ्या पाल्याच्या बुबुळाला (पारपटल, cornea) आजार (फूल पडणे, जंतुसंसर्ग इत्यादी) झाला आहे. त्यासाठी बुबुळाची शस्त्रक्रिया करणे आवश्यक आहे. बुबुळाचा बाधित भाग व त्याभोवतीचा थोडा भाग काढून तिथे नेत्रदानातून मिळालेले बुबुळ टाके घेऊन बसविण्यात येईल.
माझ्या बुबुळाला पडलेले फूल कायमस्वरूपी आहे व दृष्टी सुधारण्यासाठी ते काढून टाकणे आवश्यक आहे. या शस्त्रक्रियेमध्ये उद्भवणाऱ्या संभाव्य गुंतागुंती पुढील प्रमाणे आहेत- जंतुसंसर्ग, रिजेक्शन (graft rejection), टाके सैल होणे, टाके परत घ्यावे लागणे, दृष्टी न सुधारणे किंवा असलेली दृष्टी अधिक कमी होणे, शस्त्रक्रिया किंवा औषधांमुळे काचबिंदू होणे, मोतीबिंदू होणे, जास्त विषम दृष्टीचा (Astigmatism) नंबर लागणे, शस्त्रक्रिया परत करावी लागू शकते आणि त्यानंतर सुद्धा दृष्टी मध्ये सुधारणा होऊ शकते अथवा नाही. शस्त्रक्रियेनंतर फेरतपासणीसाठी डॉक्टरांच्या सल्ल्यानुसार वेळोवेळी यावे लागेल ( काही महिने ते काही वर्ष ) व तेव्हा काही तपासण्या आवश्यक असू शकतील याची मला कल्पना दिलेली आहे. मला समजावले आहे की शस्त्रक्रियेच्या सफलतेसाठी मी नियमितपणे औषधे वापरणे गरजेचे आहे. मला समजावून सांगितले आहे की मला काही परिस्थितीत तातडीने दवाखान्यात येणे गरजेचे आहे, जसे की डोळे अचानक लाल होणे, प्रकाश किरण सहन न होणे, डोळ्यात टोचल्यासारखे वाटणे, डोळा दुखणे किंवा दृष्टी मंदावणे, कारण ही ग्राफ्ट संसर्ग किंवा ग्राफ्ट • रिजेक्शनची लक्षणे असू शकतात. मला समजले आहे की सर्व प्रयत्न करून सुद्धा दृष्टी कमी होऊ शकते अथवा डोळ्याचे दर्शनीय/ बाह्यस्वरूप विद्रूप होऊ शकते.<p>
</p>सदर शस्त्रक्रियेचे फायदे, तोटे, जोखिमा संभाव्य गुंतागुंती आणि पर्यायी उपचार मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे, ज्याकरिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो (देते. मला शस्त्रक्रियेच्या / उपचाराच्या सगळ्या गुंतागुंतींची ( कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, तरी<p>

</p> माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे नमूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.<p> 

</p>तसेच, माझी ओळख ( छायाचित्र किंवा लेखी स्वरुपात) उघड न करता, शास्त्रीय संशोधन, वैद्यकीय शिक्षण, वैद्यकीय नोंदी, शास्त्रीय मासिकांमध्ये प्रकाशन या कारणांसाठी व या शस्त्रक्रियेचा अभ्यास करणे, छायाचित्र घेणे, व्हिडिओ रेकॉर्डिंग करणे याला मी संमती देतो/देते.<p>

</p> तसेच, या शस्त्रक्रियेची किंवा परत कराव्या लागणाऱ्या शस्त्रक्रियेची माहिती, छायाचित्र किंवा व्हिडिओ रेकॉर्डिंग, है सर्व वैद्यकीय ज्ञानाच्या वृद्धीसाठी प्रकाशित करण्यासाठी मी संमती देतो/देते.<p>
</p> मी संमतीपत्र वाचले आहे / मला ते वाचून दाखविले आहे, मला ते समजले आहे आणि माझ्या सर्व प्रश्नांची मला उत्तरे मिळालेली आहेत आणि मी माझे नेत्रतज्ज --------------------------------- ्ञ या वैध संमतीपत्रावर मी स्वेच्छेने सही करत आहे. _ यांना माझ्या उजव्या / डाव्या डोळ्यावर ----------------------------- शस्त्रक्रिया करण्यासाठी संमती देतो/ देते. शस्त्रक्रियेसाठीच्या या वैध संमतीपत्रावर मी स्वेच्छेने सही करत आहे.<p>



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


	rder-color: #000000">
      </colgroup>
      <p> <font size="+1">रुग्ण अल्पवयीन किंवा मानसिकरित्या असक्षम असल्यास, रुग्णाच्या पालकांची सही / अंगठ्याचा ठसा  <p>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"></p>  पालकाचे नाव  :---------------------------------------------------------------------------------------------------- <P>      </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"> रुग्णाशी नाते :----------------------------------------------------------------------------------------------------</p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">पत्ता:---------------------------------------------------------<p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">दूरध्वनी क्रमांक:-----------------------------------------------------------------------------दिनांक: ------------------------</p>        </th>
       
		 <tr>
        <th class="style22" scope="row"><p align="left"> <font size="+1">स्थळ  :--------------------------------------------------------------------------------------------------------------------------</p>        </th>
       
	   <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">साक्षीदार क्रमांक १ <p align="center"><font size="+1"> साक्षीदार २ </p> <p align="left"><font size="+1"> सही : --------------------<p align="center"><font size="+1"> सही : -------------------- <p align="left"><font size="+1">नाव : --------------------<p> <p align="center"><font size="+1"> नाव : --------------------<p align="left"> <font size="+1">पता : --------------------<p align="center"><font size="+1">पता : --------------------  <p align="left"><font size="+1">दूरध्वनी क्रमांक : -----------------------<p align="center"><font size="+1">दूरध्वनी क्रमांक: -----------------------      </th>
		<tr>
		       
	
      </tr>
</table>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	