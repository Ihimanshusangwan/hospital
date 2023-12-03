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
    <title> Medial Canthoplasty      </title>
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
     <h2><h2>
   <body>
<a class="btn btn-primary noprint" href="../eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <button class='btn btn-success noprint' onclick="window.print();">Print</button>

     <h2><h2>
     <?php if($inp_arr[1]=='option1'){
            include_once("../header/images.php");

        } 
       
        ?>
</body>
</body>
  
</html>
<h1 align="center" class="style33 style40"><strong> Medial Canthoplasty      </strong></h1>
<h1 align="center" class="style33"><strong> (  मिडियल कँथोप्लास्टी ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>


</p> मला माझ्या मातृभाषेत, डोळ्याच्या पापणीच्या (उजव्या डाव्या आजाराबद्दल आणि संभाव्य पर्यायी उपचाराबद्दल सांगितले आहे. सर्व पर्यायी उपचारांमध्ये ही शस्त्रक्रिया सर्वात योग्य आहे. माझ्याशी चर्चा केली गेली आहे की माझ्या (उजव्या डाव्या पापणीची पुनर्रचना निर्जंतुक पद्धतीने स्थानिक / संपूर्ण भूल देऊन केली जाईल आणि आवश्यकता भासल्यास पापणीचा ट्यूमर नसलेला भाग काढून गोठवलेल्या पद्धतीने ( Frozen section) पॅथॉलॉजी तपासणीसाठी पाठविला जाईल.<p>

</p> पुनर्रचना पुढील एक एकापेक्षा अधिक सर्व पद्धतीने केली जाईल.<p>

</p> <strong> संभाव्य गुंतागुंत (सामान्य विशिष्ट) यावर देखील चर्चा केली गेली आहे :</strong><p>

</p> <strong>1. स्किन ग्राफ्ट/ फ्लॅप / दोन्ही : </strong> ही शस्त्रक्रिया एक किंवा दोन टप्प्यात करावी लागू शकते त्यामध्ये दुसरीकडून त्वचेचा भाग घेऊन लावावा लागू शकतो, प्रत्यारोपण घेतलेल्या जागेवर व्रण येणे, रंग न जुळणे ( Color mismatch), नेक्रोसिस, पापणीवर रंग द्रव्य जमा होणे (Pigmentation) तात्पुरती पापणी बंद करून ठेवणे (Tarsorrhaphy) ह्याची गरज भासू शकते.<p>

</p> <strong> 2. तोंडांतून पापुद्रा (Mucous membrane) घेऊन जागेवर लावणे : </strong> यासाठी तोंडाची स्वच्छता आवश्यक आहे. तोंडाला जखम होऊ शकते. जखमेचा व्रण राहू शकतो, संपूर्ण भूलेदरम्यान घशात पॅक घालावा लागू शकतो, शस्त्रक्रियेनंतर पातळ / अर्ध-घन आहार ( Semi-solid) घ्यावा लागू शकतो. <p>

</p> <strong> 3. चरबीचे प्रत्यारोपण : </strong>प्रत्यारोपण घेतलेल्या जागेवर व्रण येणे, नेक्रोसिस होणे .<p>

</p> <strong> 4. कूर्चा ( Cartilage) प्रत्यारोपण : </strong> प्रत्यारोपण घेतलेल्या जागेवर व्रण येणे, नेक्रोसिस होणे, बुबुळावर जखम होऊ शकते ( Corneal erosion).<p>

</p><strong>  5. पापण्यांच्या गाठीची / आजाराची शस्त्रक्रिया : </strong> गाठ परत येऊ शकते फ्रोजन सेक्शन तंत्राची गरज भासू शकते / मॅप बायोप्सी / दोन्ही घेण्याची आवश्यकता भासू शकते.<p>

</p> <strong> 6. सामान्य गुंतागुंत : </strong> भुलेसंबंधित गुंतागुंती, रक्तस्त्राव, जंतुसंसर्ग, ग्रॅन्युलोमा तयार होणे, गाठ परत येणे / पूर्ण न निघणे, पापणी आत किंवा बाहेर वळणे व्रण तयार होणे, स्कार हायपरट्रॉफी / केलॉईड, डोळ्यांच्या पांढऱ्या भागावर रक्तस्त्राव (subconjunctival haemorrhage) होऊ शकतो.<p>


</p> मी याद्वारे हे नमूद करू इच्छितो की या शस्त्रक्रियेचे सर्व संभाव्य परिणाम मला समजले आहेत आणि उपचार करणाऱ्या नेत्रतज्ज्ञांनी दिलेल्या स्पष्टीकरणावर मी समाधानी आहे. रुग्णालय / रुग्णालयातील कर्मचारी / उपचार करणारे डॉक्टर आणि त्यांचे सहाय्यक उपचाराशी संबंधित कोणत्याही नुकसानीसाठी जबाबदार असणार नाहीत. अशा दुर्दैवी दुर्घटनांमध्ये मी कोणत्याही परतावा / भरपाईसाठी दावा करणार नाही. अशा सर्व परिस्थितीमध्ये रुग्णालय प्रशासनाचा निर्णय अंतिम असेल. मी कबूल करतो की मी निकोप मनाने या संमतीपत्रावर स्वाक्षरी करून संमती देत आहे.<p>

</p>सदर शस्त्रक्रियेचे फायदे, तोटे, जोखिमा संभाव्य गुंतागुंती आणि पर्यायी उपचार मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे. 
ज्याकरिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो / देते. मला शस्त्रक्रियेच्या / उपचाराच्या सगळ्या गुंतागुंतीची (कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, 
तरी माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे नमूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.<p>

</p> तसेच, माझी ओळख ( छायाचित्र किंवा लेखी स्वरुपात) उघड न करता, शास्त्रीय संशोधन, वैद्यकीय शिक्षण, वैद्यकीय नोंदी, शास्त्रीय मासिकांमध्ये प्रकाशन या कारणांसाठी व या शस्त्रक्रियेचा अभ्यास करणे, छायाचित्र घेणे, व्हिडिओ रेकॉर्डिंग करणे याला मी संमती देतो/देते.<p>

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


	