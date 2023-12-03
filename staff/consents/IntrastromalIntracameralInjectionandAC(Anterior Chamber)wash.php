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
    <title>    Intrastromal/Intracameral Injection and AC (Anterior Chamber) wash    </title>
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
     
    <table width="1124" border="1" align="center" class="style33">
	 <colgroup>
      <tr bgcolor="#A631A9">
	    <td class="style39"></colgroup>
        <th width="1032" class="style39">&nbsp;</th>
      </tr>
    </table>
</body>
  
</html>
<h1 align="center" class="style33 style40"><strong>  Intrastromal/Intracameral Injection and AC (Anterior Chamber) wash         </strong></h1>
<h1 align="center" class="style33"><strong> ( इन्ट्रास्ट्रॉमल/ इंट्राकॅमेरल इंजेक्शन आणि A C वॉश (धुणे / स्वच्छ करणे ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------ रुग्णाचे संमतीपत्र ------</span> </p>

</p> मला माझ्या मातृभाषेत समजावून सांगण्यात आले आहे व मला असे पूर्णपणे माहित आहे की माझ्या बुबुळाला ( Cornea) मोठ्या प्रमाणात जंतुसंसर्ग झाला असून तो कोणत्याही उपचारांना दाद देत नाही. खाली नमूद केलेल्या गोष्टी मला नीट समजावून सांगण्यात आल्या आहेत.<p>

</p> ह्या शस्त्रक्रियेमध्ये माझ्या बुबुळात व माझ्या डोळ्यात औषधे योग्य त्या प्रमाणात व योग्य त्या मार्गे घातली जातील. याद्वारे तीव्र जंतुसंसर्ग कमी केला जाईल.<p>

</p> AC wash (डोळा आतून स्वच्छ करणे) ही शस्त्रक्रिया डोळ्याच्या आतील जैविकपदार्थ सूक्ष्मजैविकशास्त्रीय (microbiological) तपासणीसाठी तसेच जंतुसंसर्ग कमी करण्यासाठी केली जाईल. <p>

</p> मला पूर्ण कल्पना आहे की ही शस्त्रक्रिया फक्त जंतुसंसर्ग कमी करण्यासाठी असून त्यामुळे दृष्टीत काहीही फरक पडणार नाही, तसेच नंतर अजून काही शस्त्रक्रिया कराव्या लागू शकतील.<p>
</p> मला या शस्त्रक्रियेत डोळ्यात मोठे छिद्र, तसेच जंतुसंसर्ग डोळ्यात सर्वत्र पसरणे (endophthalmitis) हे धोके आहेत याची पूर्ण कल्पना आहे. <p>
</p> ह्या सर्व प्रयत्नांनंतरही, बुबुळाला रक्तपुरवठा नसल्यामुळे, जंतुसंसर्ग तसाच राहील किंवा तो वाढूही शकतो. <p>
</p> ही शस्त्रक्रिया योग्य त्या भूल / बधिरीकरणात केली जाईल (Local / Topical. / General Anaesthetia)<p>
</p> वरील सर्व गोष्टी मला संपूर्णपणे समजल्या असून मी स्वखुशीने माझ्या उजव्या / डाव्या डोळ्यावर इंट्रास्ट्रोमल इंजेक्शन इंट्राकॅमेरल इंजेक्शन / AC wash ही शस्त्रक्रिया करून घेण्यास संमती देत आहे.<p>

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
	
<table width="997" border="1" cellspacing="8" cellpadding="10" >
      <colgroup>
      <col span="2" style="border-color: #000000">
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


	