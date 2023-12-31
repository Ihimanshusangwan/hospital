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
    <title>Squint/Nystagmus Surgery </title>
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
<h1 align="center" class="style33 style40"><strong> Squint/Nystagmus Surgery  </strong></h1>
<h1 align="center" class="style33"><strong> ( [तिरळेपणा (स्क्विन्ट/ निस्टॅग्मस) ची शस्त्रक्रिया  ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

</p> <strong>   </strong> <p>
</p><strong> </strong><p>


</p> <p align="center" class="style9 style23 style27"><span class="style33">------------------------------- शस्त्रक्रियेची माहिती  ---------------------------- ------</span> </p>

</p> तिरळा डोळा असलेली कुठल्याही वयाची लहान मुले आणि प्रौढ व्यक्ती डोळ्याच्या स्नायूच्या शस्त्रक्रियेचा (Squint Surgery) लाभ घेऊ शकतात, जेणेकरून त्यांचे दोन्ही डोळे सरळ केले जाऊ शकतात. या शस्त्रक्रियेमुळे दृष्टीचे क्षेत्र / दृष्टीची व्याप्ती व्यवस्थित करण्याची व दोन्ही डोळ्यांनी एकत्रित आकलन करण्याची दृष्टीक्षमता वाढते. ही शस्त्रक्रिया केवळ बाह्य सौंदर्यासाठी नसून रुग्णांना डोके तिरपे न करता डोके व मान सरळ ठेवून आरामात बघता यावे यासाठी आहे. तिरळेपणाची शस्त्रक्रिया ही रुग्णांच्या डोके तिरपे करून बघण्याच्या क्रियेस सुधारून त्यांना डोके सरळ ठेवून बघण्यास सक्षम करते तसेच डोळ्यांची जलदगतीने हलण्याची विकृती (Nystagmus / Wriggly eye movements) कमी होते.<p>

</p><strong>या शस्त्रक्रियेतील प्रमुख टप्पे पुढील प्रमाणे आहेत: </strong><p>

</p><strong>1.संपूर्ण भूल (General Anaesthesia) ही काही लहान मुलांमध्ये व विशिष्ट रुग्णांमध्ये दिली जाते.</strong><p>

</p><strong>2. प्रौढ रुग्णांमध्ये स्थानिक भूल (Local Anaesthesia) डोळ्याच्या भोवती इंजेक्शनद्वारे दिली जाते.</strong><p>

</p><strong>3.शस्त्रक्रियेदरम्यान एक डोळा किंवा दोन्ही डोळ्यांचे स्नायू एक तर संकुचित केले जातात (tightened) किंवा शिथिल (loosened) केले जातात आणि डोळ्यांच्या स्नायूची जागा बदलून डोळे सरळ रेषेत आणण्याचा प्रयत्न केला जातो. किती स्नायूंवर शस्त्रक्रिया करावी लागेल यावर शस्त्रक्रियेचा वेळ अवलंबून असतो आणि अंदाजे अर्धा तास ते दीड तास वेळ लागू शकतो.</strong><p>


</p> <p align="center" class="style9 style23 style27"><span class="style33">------------------------------- शस्त्रक्रियेनंतरचा कालावधी ---------------------------- ------</span> </p>

</p> शस्त्रक्रियेनंतर रुग्णाला फेरतपासणीसाठी लगेच दुसऱ्या दिवशी आणि तीन ते चार आठवड्यानंतर परत बाह्यरुग्ण विभागात यावे लागू शकते. शस्त्रक्रियेनंतर सुरुवातीला दुहेरी प्रतिमा दिसू शकते जी कालांतराने कमी होते किंवा पूर्णपणे जाते. ठराविक कालावधीसाठी तोंडातून घेण्याच्या औषधांच्या गोळ्या व डोळ्यात टाकण्यासाठी औषधांचे थेंब दिले जातात. शस्त्रक्रियेनंतर सुरुवातीचे काही दिवस डोळ्यांना त्रास होणे जसे लाली येणे आणि सूज येणे होऊ शकतो व कालांतराने हे कमी नाहीसे होते. आधीपासूनच चष्मा असल्यास शस्त्रक्रिये नंतरही तो लावावा लागेल. बहुतांश वेळा शस्त्रक्रियेचे व्रण राहत नाहीत. या शस्त्रक्रियेत बहुतांश वेळा विरघळणारे टाके वापरले जातात आणि ते काढावे लागत नाहीत.<p>

</p> <p align="center" class="style9 style23 style27"><span class="style33">---- तिरळेपणाच्या ( स्क्विन्ट / निस्टॅगमस) शस्त्रक्रियेनंतरचे अपेक्षित/संभाव्य परिणाम ----</span> </p>

</p><strong>1)तिरळे डोळे सरळ होणे.</strong><p>

</p><strong>2) चेहरा / डोक्याची वक्र स्थिती (Face turn or abnormal head posture) सुधारणे (ज्या रुग्णांमध्ये डोके  तिरपे असते आणि ज्यांमध्ये ही शक्यता असते).</strong><p>

</p><strong>3) काही रुग्णांमध्ये दुहेरी प्रतिमा दिसण्याचा दोष सुधारणे.</strong><p>

</p><strong>4)काही रुग्णांमध्ये निस्टॅगमसचे (चलदृष्टीचे चलत्व) कमी होणे.</strong><p>

</p><strong>5)दोन्ही डोळ्यांनी एकत्रित व्यवस्थित दिसण्याची शक्यता ( ठराविक रुग्णांमध्ये जेथे शक्यता वर्तवली असेल).</strong><p>

</p><strong>6) इतर काही असल्यास--------------------------------------</strong><p>





</p> <p align="center" class="style9 style23 style27"><span class="style33">----- तिरळेपणाच्या (स्क्विन्ट/ निस्टॅगमस) शस्त्रक्रियेनंतरच्या संबंधित जोखिमा व गुंतागुंती -----</span> </p>

</p>या शस्त्रक्रियेच्या सर्व संभाव्य गुंतागुंती येथे नमूद करणे शक्य नसले तरी त्यातील प्रमुख संभाव्य जोखिमा आणि गुंतागुंती  खालीलप्रमाणे आहेत.<p>

</p> <strong>1.भूले संबंधित जोखिमा (पूर्ण भूल आणि स्थानिक भूल, दोन्हींमधील):  </strong>  यात श्वास घेण्यास अडचणी येणे,
उलट्या होणे, घसा खवखवणे, हृदयविकाराचा धोका किंवा मृत्यु इत्यादी समाविष्ट आहेत. डोळ्याभोवती इंजेक्शनने स्थानिक भूल देण्याच्या गुंतागुंती पुढील प्रमाणे आहेत, डोळ्याला छिद्र पडणे, नसेला (ऑप्टिक नर्व्ह ) इजा होणे, डोळ्याच्या दृष्टीपटलात रक्ताभिसरणात अडथळा येणे, पापणी खाली येणे, रक्तदाब कमी होणे व श्वसनास बाधा येणे.<p>

</p><strong>2. डोळ्याच्या तिरळेपणामध्ये अपेक्षेप्रमाणे दुरुस्ती न होणे (Suboptimal results)  : </strong>: दहा टक्के रुग्णांमध्ये तिरळेपणामध्ये अपेक्षेपेक्षा कमी किंवा जास्त बदल होणे (under correction or over correction). तिरळेपणा कायम राहू शकतो किंवा वेगळ्या प्रकारचा तिरळेपणा उद्भवू शकतो. चेहऱ्याचे अनैसर्गिक वळणे कायम राहू शकते किंवा डोक्याचा पवित्रा पूर्वीपेक्षा बदलू शकतो. शस्त्रक्रियेनंतर डोक्याचा व मानेचा तिरकसपणा तसेच डोळ्याची अनैसर्गिक हालचाल (निस्टॅमस) कायम राहू शकते. विविध दिशांना बघताना दुहेरी प्रतिमा दिसण्याचा त्रास आहे तो तसाच राहू शकतो किंवा तो वाढू देखील शकतो. डोळ्याच्या काही विशिष्ट हालचालींवर थोडी मर्यादा येऊ शकते. पापणीच्या स्थितीत तात्पुरता किंवा कायमस्वरूपी बदल होऊ शकतो.<p>

</p><strong>3. पुन्हा शस्त्रक्रियेची गरज लागणे : </strong> प्रत्येक रुग्णात अपेक्षित परिणाम न मिळाल्यामुळे पुन्हा शस्त्रक्रियेची गरज भासू शकते. ज्या रुग्णांमध्ये आधी शस्त्रक्रिया झालेली असेल यांना पुन्हा शस्त्रक्रियेची गरज पुढील प्रसंगी भासू शकते- तिरळेपणा शस्त्रक्रिया गुंतागुंतीची झाली असेल, स्नायू निसटल्यामुळे किंवा जास्त रक्तस्त्राव झाल्यामुळे . काही वेळा योग्य परिणाम साध्य करण्यासाठी दुसऱ्या डोळ्यावरही शस्त्रक्रिया करण्याची गरज भासू शकते.<p>

</p><strong>4. दृष्टी कमी होणे  : </strong>हे खूप दुर्मिळ आहे, पण ही कारणे भूलेशी संबंधित असू शकतात जसे, रक्तस्त्राव होणे, दृष्टीपटल सरकणे, इंजेक्शनमुळे होणारा जंतुसंसर्ग किंवा डोळ्याचा रक्तपुरवठा थांबणे यासारखे व इतर कारणे 'असू शकतात.<p>

</p><strong> 5. जंतूसंसर्ग :</strong> शस्त्रक्रियेनंतर कधीकधी डोळा किंवा डोळ्याच्या खोबणीला जंतुसंसर्ग होऊ शकतो. यामुळे दृष्टीस धोका निर्माण होऊ शकतो.<p>

</p><strong> 6. किरकोळ धोका  : </strong> डोळ्याच्या पुढील भागावर सूज येणे (conjunctival / scleral inflammation), डोळा लाल दिसणे, टाक्यांना जंतुसंसर्ग होणे, डोळा दुखणे, तात्पुरती दुहेरी प्रतिमा दिसणे, पापण्यांची असमानता आणि डोळ्याच्या पांढऱ्या भागावर गाठ (implantation cyst) तयार होणे.<p>


</p><strong> 7. समायोजित किंवा अॅडजेस्टेबल टाक्यासंबंधीच्या जोखिमा   : </strong> <p>
		</p> i )हे टाके तुटल्यास फेरशस्त्रक्रियेद्वारे ऑपरेशन थिएटरमध्ये स्नायू सुरक्षित करण्याची गरज पडू शकते.<p>
		</p> ii ) टाके योग्य स्थितीत आणताना डोळ्यांच्या पांढऱ्या भागावर स्नायू चिकटल्यास स्नायूंमध्ये व्रण तयार होतो तसेच स्नायूंची लवचिकता कमी होऊ शकते आणि हालचाल कमी होते.<p>
		</p> iii )टाक्यांचे समायोजन किंवा अॅडजेस्टमेंट करताना रुग्णाच्या हृदयाचे ठोके कमी होऊ शकतात (oculocardiac reflex) ज्यामुळे चक्कर येणे व मळमळ होण्याचा त्रासही होऊ शकतो.<p>
		</p> iv ) टाके समायोजित किंवा अॅडजेस्ट करताना रुग्णांना प्रतिमा अस्पष्ट दिसल्यामुळे किंवा डोळा दुखत असल्याने अपेक्षित परिणाम मिळणार नाही (over correction or under correction).<p>
		</p> v )) शस्त्रक्रियेनंतर डोळा लाल होणे व दुखण्याची शक्यता जास्त असते कारण, समायोजनासाठी घेतलेल्या टाक्यांची गाठ टोचू शकते.<p>
		



</p> <p align="center" class="style9 style23 style27"><span class="style33">----------------- संभाव्य पर्याय --------------</span> </p>

</p>तिरळेपणा / निस्टॅगमस शस्त्रक्रियेसाठी संभाव्य पर्याय पुढीलप्रमाणे आहेत.<p>

</p><strong> 1. कोणताही हस्तक्षेप न करणे.</strong><p>

</p> <strong>2. विशिष्ट प्रिझमचा चष्मा वापरणे (काही रुग्णांमध्ये).</strong><p>

</p> <strong>3.इतर काही असल्यास.------------------------------------------------ </strong> <p>



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


	