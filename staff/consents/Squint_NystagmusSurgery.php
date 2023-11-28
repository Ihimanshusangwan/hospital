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
    <title>Optic Nerve Sheath Fenestration </title>
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
<h1 align="center" class="style33 style40"><strong> Optic Nerve Sheath Fenestration  </strong></h1>
<h1 align="center" class="style33"><strong> ( ऑप्टिक नर्व्ह शीथ फेनेस्ट्रेशन  ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

</p> <strong>   </strong> <p>
</p><strong> </strong><p>


</p> <p align="center" class="style9 style23 style27"><span class="style33">------------------------------- ऑप्टिक नर्व्ह शीथ फेनेस्ट्रेशन विषयी सामान्य माहिती ---------------------------- ------</span> </p>

</p> मेंदूभोवतीचा द्रव म्हणजे सेरेब्रोस्पायनल फ्ल्यूईडचा (Cerebrospinal Fluid) दाब वाढल्याने ऑप्टिक नर्व्हवरचा (Optic Nerve) परिणाम: ऑप्टिक नर्व्ह भोवती असलेले आवरण हे मेंदूभोवतीच्या आवरणाशी संलग्न असते. इडियोपॅथिक इंट्राकॅनियल हायपरटेन्शन (Idiopathic Intracranial Hypertension) या आजारामध्ये सेरेब्रो स्पायनल फ्ल्यूईडचा (जे द्रव ऑप्टिक नर्व्ह व मेंदूभोवती असते) दाब वाढतो व त्याचा परिणाम ऑप्टिक नर्व्ह वर होतो, ज्यामुळे ऑप्टिक नर्व्हला सूज येते आणि इजा होते. इडियोपॅथिक इंट्राकॅनियल हायपरटेन्शनमुळे होणाऱ्या ऑप्टिक नर्व्हच्या सूजेला पॅपिलिडिमा (Papilledema) म्हणतात, ज्यामुळे दृष्टी लगेच किंवा कालांतराने कमी होऊ शकते आणि अशा परिस्थितीमध्ये वैद्यकीय उपचारांना दाद न मिळाल्याने ऑप्टिक नर्व्हवरचे आवरणाचे फेनेस्ट्रेशन म्हणजे त्यावर छेद घेऊन त्यातील दाब कमी करणे आवश्यक असते. या शस्त्रक्रियेचा परिणाम फक्त शस्त्रक्रिया केलेल्या ऑप्टिक नर्व्ह वरच होईल. ही शस्त्रक्रिया ऑप्टिक नर्व्हला इजा झाली असेल किंवा नर्व्ह भोवती रक्ताच्या गाठी साठल्या असल्यास त्याकरिता देखील केली जाते.<p>


</p> <p align="center" class="style9 style23 style27"><span class="style33">------------------------------- शस्त्रक्रियेची पद्धत ---------------------------- ------</span> </p>

</p> ही शस्त्रक्रिया संपूर्ण किंवा स्थानिक भूलेखाली केली जाते. या शस्त्रक्रियेत ऑप्टिक नर्व्हच्या आवरणावर छेद दिला जातो, ज्यामुळे आवरणातील सेरेब्रो स्पायनल फ्लुईडचा वाढलेला दाब कमी होऊ शकतो. शस्त्रक्रियेचा परिणाम दिर्घ  काळ रहावा म्हणून ऑप्टिक नर्व्हचा छोटा तुकडा काढण्यात येतो.<p>

</p> <p align="center" class="style9 style23 style27"><span class="style33">---- शस्त्रक्रियेचे संभाव्य परिणाम ----</span> </p>

</p><strong>1)मेंदूतील द्रवाचा (सेरेब्रो स्पायनल फ्लुईड) दाब कमी होणे.</strong><p>

</p><strong>2) एक किंवा दोन्ही डोळ्यांच्या दृष्टीत किंवा दृष्टी क्षेत्रात (Visual Fields) सुधारणा होणे.</strong><p>

</p><strong>3) वैद्यकिय औषधोपचाराची गरज कमी होणे.</strong><p>



</p> <p align="center" class="style9 style23 style27"><span class="style33">----- ऑप्टिक नर्व्ह शीथ फेनेस्ट्रेशन शस्त्रक्रियेसंबंधीच्या जोखिमा व गुंतागुंती------</span> </p>

</p>स्थानिक भूल देण्याच्या गुंतागुंती पुढील प्रमाणे आहेत, डोळ्याला छिद्र पडणे, नसेला (ऑप्टिक नर्व्ह) इजा होणे, डोळ्याच्या दृष्टीपटलात (retina) रक्ताभिसरणात अडथळा येणे, पापणी खाली येणे, रक्तदाब कमी होणे व श्वसनास बाधा येणे.<p>

</p> <strong>1.अपेक्षेपेक्षा कमी परिणाम:  </strong>  शस्त्रक्रियेनंतर दृष्टीत किंवा दृष्टीक्षेत्रात वाढ न होणे. मेंदूतील द्रवाचा दाब अपेक्षेएवढा कमी होणार नाही किंवा कमी झाल्यास तात्पुरता होईल. ही शस्त्रक्रिया ३०% रुग्णांमध्ये असफल होते.<p>

</p><strong>2. दृष्टी जाणे : </strong> शस्त्रक्रियेनंतर अचानक दृष्टी जाण्याचा धोका असतो ( रक्तपुरवठ्यात बाधा आल्यामुळे, ऑप्टिक नर्व्हला इजा झाल्यामुळे, ऑप्टिक नर्व्हच्या आवरणात रक्तस्त्राव झाल्यामुळे).<p>

</p><strong>3.जंतुसंसर्गः </strong> शस्त्रक्रियेनंतर डोळ्याला, डोळ्याच्या खोबणीला किंवा मेंदूला क्वचित प्रसंगी जंतुसंसर्ग होऊ शकतो.. यामुळे दृष्टीला धोका निर्माण होऊ शकतो.<p>

</p><strong>4.दुहेरी प्रतिमा दिसणे : </strong>: शस्त्रक्रियेनंतर काही वेळेस तात्पुरती दुहेरी प्रतिमा दिसू शकते.<p>

</p><strong> 5. बाहुलीतील (Pupil) अनैसर्गिक बदल:</strong> पॅरॅसिंपथेटीक नर्व्हस सिस्टीमला इजा झाल्यामुळे दोन्ही डोळ्यांच्या बाहुल्यांच्या आकारात किंवा त्यांच्या आकुंचन/मोठ्या होण्याच्या प्रक्रियेत ( प्युपिलरी रिअॅक्शन) बदल होऊ शकतो.<p>

</p><strong> 6.. किरकोळ जोखिमाः : </strong> जोखिमाः डोळ्याच्या पांढऱ्या भागावर सूज येणे (conjuntival / scleral inflammation), टाक्यांमुळे सूज येणे, तात्पुरती दुहेरी प्रतिमा दिसणे, तात्पुरती धूसर दृष्टी, पापणीच्या स्थितीत बदल, व्रण तयार होणे व गाठ (implantation cyst) तयार होणे.<p>



</p> <p align="center" class="style9 style23 style27"><span class="style33">----------------- पर्यायी उपचारपध्दती  --------------</span> </p>

</p>या शस्त्रक्रियेस पुढील पर्यायी उपचारपध्दती आहेत:<p>

</p><strong> 1. वैद्यकीय उपचार.</strong><p>

</p> <strong>2. व्हेंट्रिक्युलो पेरिटोनियल किंवा लंबो पेरिटोनियल शंट.</strong><p>

</p> <strong>3.इतर काही ------------------------------------------------ </strong> <p>



</p> <p align="center" class="style9 style23 style27"><span class="style33">------------------------------- रुग्णाचे संमतीपत्र  ---------------------------- ------</span> </p>


</p> सदर शस्त्रक्रियेचे फायदे, तोटे, जोखिमा, संभाव्य गुंतागुंती आणि पर्यायी उपचार, मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे, ज्या करिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो/ देते. मला शस्त्रक्रियेच्या / उपचाराच्या सगळ्या गुंतागुंतींची ( कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, तरी माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे मूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.<p>


</p> मला या तपासणीचे होणारे संभाव्य परिणाम समजले आहेत आणि माझ्या डॉक्टरांनी दिलेल्या स्पष्टीकरणावर मी समाधानी आहे. उपचारादरम्यान काही विपरीत झाल्यास रुग्णालय किंवा डॉक्टर त्यासाठी जबाबदार राहणार नाहीत. दुर्दैवाने काही विपरीत झाल्यास, मी त्याचा परतावा / भरपाई मागणार नाही... अशा परिस्थितीमध्ये रुग्णालयातील प्रशासनाचा निर्णय अंतिम राहील. मी हे कबूल करतो / करते की, मी हे सर्व नीट समजूनच स्वेच्छेने आणि निकोप मनाने स्वाक्षरी करून संमती दिली आहे.<p>

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
		
		</p><strong> </strong><p>
		


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
	        </p> <font size="+1"><strong>रुग्ण अल्पवयीन किंवा मानसिकरित्या असक्षम असल्यास, रुग्णाच्या पालकांची सही / अंगठ्याचा ठसा . </strong> <p>
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
	       
 

</p> <p align="center" class="style9 style23 style27"><span class="style33">------------------------------- रुग्णाच्या सहाय्यकाचे विशेष संमतीपत्र ---------------------------- ------</span> </p>

</p>रुग्ण पुढील कारणांमुळे------------------------------------------------या संमतीपत्रावर स्वाक्षरी न करू शकल्यास (अल्पवयीन/ बेशुद्ध अवस्थेत / भूलेच्या औषधाच्या प्रभावाखाली / मानसिकरित्या असक्षम / असंतुलित अवस्थेत / इतर काही कारणे असल्यास .------------------------------------------------------------) मी ह्या विशेष संमतीपत्रावर स्वाक्षरी करत आहे.<p>

</p>सहाय्यकाचे नाव----------------------------------------------------------------<p>

</p>रुग्णाशी नाते -----------------------------------------------------------------<p>

</p>सही ---------------------------------दिनांक ----------------------------------<p>

</p>वेळ------------------------------------------

</p> <p align="center" class="style9 style23 style27"><span class="style33">------------------------------- दुभाषाचे घोषणापत्र ---------------------------- ------</span> </p>

</p> वरील संमतीपत्र डॉक्टरांनी नीट समजावून सांगितले आहे व सर्व माहिती रुग्णास व तिच्या / त्याच्या सहाय्यकास त्यांना समजेल अशा भाषेत सांगितली आहे व त्यांना ती नीट व संपूर्ण समजली आहे याची खात्री केली आहे.<p>

</p>दुभाषाचे नाव: ---------------------------------------------------------------<p>

</p> सही -------------------------------दिनांक ---------------------------वेळ----------<p>

</p> दूरध्वनी क्रमांक : -------------------------------------------------<p>

</p> <p align="center" class="style9 style23 style27"><span class="style33">------------------------------- अतिजोखिमेच्या परिस्थितीसाठी विशेष संमतीपत्र ---------------------------- ------</span> </p>

</p> मी / रुग्ण --------------------------------(रुग्णाचे नाव) यास समजावून सांगितले आहे की या आजारात/ उपचारपद्धतीत काही अतिजोखिमांचे प्रसंग----------------------या कारणांमुळे उद्भवू शकतात.<p>

</p> रुग्णाची सही : -----------------------------दिनांक ---------------वेळ -------------------<p>

</p> डॉक्टरांचे नाव --------------------------------सही --------------------दिनांक-------------वेळ ------------<p>

</p> साक्षीदाराचे नाव :----------------------------------------------सही -----------------------दिनांक ------------------वेळ----------<p>

</p> साक्षीदाराचा दूरध्वनी क्रमांक :----------------------------पत्ता ---------------------------------------------------------------------<p>

 </tr>
</table>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>





</body>
</html>


	