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
    <title> Phakic IOL   </title>
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
<h1 align="center" class="style33 style40"><strong> Phakic IOL   </strong></h1>
<h1 align="center" class="style33"><strong> (फेकिक आय ओ एल) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

</p> <strong>   </strong> <p>
</p><strong> </strong><p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- फेकिक आयओएल शस्त्रक्रियेची प्राथमिक माहिती ---------------------------- ------</span> </p>

</p> प्रामुख्याने हस्वदृष्टीचा एक उपचार म्हणून फेकिक आयओएल ही शस्त्रक्रिया केली जाते. या शस्त्रक्रियेमध्ये डोळ्याच्या आत कृत्रिम भिंग बसवले जाते. मोतीबिंदू शस्त्रक्रियेमध्ये टाकण्यात येणाऱ्या कृत्रिम भिंगाप्रमाणे हे भिंग असते. मोतिबिंदू शस्त्रक्रियेप्रमाणे या शस्त्रक्रियेमध्ये डोळ्यातील भिंग काढले जात नाही. नैसर्गिक भिंगापुढे कृत्रिम भिंग (phakic intraocular lens) बसवले जाते. ही शस्त्रक्रिया डोळ्याला इंजेक्शनद्वारे स्थानिक भूल (local Anesthesia) देऊन केली जाते.<p>

<p/> या शस्त्रक्रियेसोबत डोळ्याच्या परिपटलामध्ये ( iris) एक किंवा दोन छिद्र केले जाऊ शकतात. डोळ्याच्या आतील द्रवाचा (aqueus) प्रवाह सुरळीत रहावा व डोळ्यातील दाब वाढू नये या करिता हे छिद्र केले जाते. काही रुग्णांमध्ये शस्त्रक्रियेच्या दोन आठवड्यांपूर्वी प्रकाशकिरणांच्या सहाय्याने (yag laser) डोळ्याच्या परिपटलावर ( iris) छिद्र केले जाते.</p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- शस्त्रक्रियेचे फायदे व गरज  ---------------------------- ------</span> </p>

</p>तुम्हाला स्वदृष्टी (myopia), दीर्घदृष्टी (hyperopia) किंवा विषम / वक्रदृष्टी ( astigmatism) असेल तर चष्मा किंवा कॉन्टॅक्ट लेन्स न वापरता तुमची नैसर्गिक दृष्टी सुधारण्यासाठी फेकिक आयओएल ही शस्त्रक्रिया केली जाते. बुबुळाचा आकार कायम ठेवला जातो. या शस्त्रक्रियेमुळे बुबुळाचा आकार बदलत नाही आणि भासल्यास फेकीक लेन्स (आयओएल) काढता येते. हे या शस्त्रक्रियेचे फायदे आहेत. फेकिक आयओएलची अतिरिक्त काळजी रुग्णांना घ्यावी लागत नाही. कॉन्टॅक्ट लेन्स प्रमाणे फेकिक आयओएल बाहेरून दिसत नाही. Lasik किंवा PRK या शस्त्रक्रियेमुळे बुबुळाचा आकार कायमचा बदलतो. फेकिक लेन्समुळे असे कायमचे डोळ्यामध्ये होत नाहीत.<p>


</p> <p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- शस्त्रक्रियेचे पर्यायी उपचार ---------------------------- ------</span> </p>

</p> चष्मा किंवा कॉन्टॅक्ट लेन्सच्या सहाय्याने नजर सुधारली जाते. चष्मा व कॉन्टॅक्ट लेन्स नको असेल तर फेकिक आयओएल ही शस्त्रक्रिया केली जाते.<p>

</p> <strong> <p  align="center">शस्त्रक्रियेचे संभाव्य धोके, दुष्परिणाम आणि गुंतागुंती</p></strong> 

</p> <strong> <p  align="center">दृष्टीस धोका पोहोचविणाऱ्या गुंतागुंती (कॉम्प्लिकेशन्स)</p></strong> 

</p> 1) <strong>भूलीच्या औषधांचे दुष्परिणाम (कॉम्प्लिकेशन्स) : </strong>डोळा बधिर करण्याकरिता डोळ्याभोवती मूलीचे इंजेक्शन दिले जाते, क्वचित प्रसंगी डोळ्याच्या स्नायूंना दृष्टीपटलाला (retina) अथवा डोळ्याच्या नसेला (optic nerve) इजा झाल्यामुळे किंवा डोळ्याला छिद्र पडल्यामुळे नजर जाऊ शकते.<p>

</p> 2) <strong>जंतुसंसर्ग :</strong> जंतुसंसर्ग झाल्यास प्रतिजैविक औषधाच्या आधारे उपचार केले जातात. सौम्य जतुसंसर्ग असल्यास बरा होऊ शकतो. जंतुसंसर्ग तीव्र प्रमाणात असल्यास दृष्टी जाण्याचा धोका संभवतो.<p>

</p> 3) <strong>डोळ्यातील रंगीत पडद्याची झीज (आयरिस अॅट्रॉफी) :</strong> डोळ्यातील रंगीत पडद्याला इजा पोहोचू शकते किंवा डोळ्यातील दाब वाढून काचबिंदू होऊ शकतो. अशा वेळेस डोळ्याचा दाब कमी करण्याची औषधे दिली जातात किंवा आयरिडोटोमी ही शस्त्रक्रिया प्रकाशकिरणांच्या (laser) सहाय्याने केली जाते.<p>

</p> 4) <strong> पडदा / दृष्टीपटल (retina) सरकणे :</strong> यामध्ये दृष्टीपटलाचे (retina) पर विलग होतात. रेटिनाला छिद्र C असल्यामुळे किंवा फाटल्यामुळे रेटिनाचे थर विलग होऊ शकतात. मध्यम अथवा तीव्र हस्वदृष्टी (myopia) असणाऱ्या व्यक्तीमध्ये पडदा निसटण्याची शक्यता जास्त असते. फेकिक आयओएलनंतर ही शक्यता वाढते.<p>

</p> 5)<strong>मोतिबिंदू :</strong>फेकिक आयओएल या शस्त्रक्रियेनंतर रुग्णाला मोतीबिंदू होऊ शकतो आणि सामान्य दृष्टी पूर्ववत येण्याकरिता मोतीबिंदू व फेकिक आयओएल काढून कृत्रिम नेत्र अंगारोपण करण्याची गरज भासू शकते.<p>

</p> 6) <strong>बुबुळावर होणारे दुष्परिणाम :</strong> बुबुळ सुजणे, बुबुळाच्या आतील थरांची झीज (endothelial cell loss) अशा गुंतागुंती होऊ शकतात. बुबुळाच्या आतील थराच्या पेशी (endothelial cells) बुबुळ निरोगी व पारदर्शक ठेवण्यास मदत करतात. या गुंतागुंतीमुळे (कॉम्प्लिकेशन्स) बुबुळ पांढरे पडल्यास व दृष्टी अधू झाल्यास बुबुळ बदलण्याच्या शस्त्रक्रियेची (comeal transplant) गरज भासू शकते.<p>

</p> 7) <strong>काचबिंदू  :</strong>या शस्त्रक्रियेनंतर डोळ्यातील दाब वाढून काचबिंदू होऊ शकतो. काचबिंदूचे उपचार, डोळ्यातील बाची औषधे किंवा शस्त्रक्रियेची गरज भासू शकते. काचबिंदूमुळे अंधत्व येण्याची शक्यता असते.<p>

</p> डोळ्याच्या परीपटलाची (iris) सूज ( शस्त्रक्रियेनंतर लगेच किंवा काही कालावधीनंतर), रक्तस्त्राव, पीतबिंदू (macula) वरील सूज अशा गुंतागुंती (कॉम्प्लिकेशन्स) शस्त्रक्रियेनंतर संभवू शकतात. शस्त्रक्रियेनंतर अंधत्व येण्याचे प्रमाण दुर्मिळ असले तरी काही गुंतागुंतीमुळे अंधत्व येऊ शकते.<p>

</p> वर नमूद केलेल्या शस्त्रक्रियेच्या गुंतागुंती काही दिवस, आठवडे, महिने किंवा वर्षानंतरही दिसू शकतात.<p>

</p> <p align="center" class="style9 style23 style27"><span class="style33">-------------------------- दृष्टीस धोका न पोहोचविणाऱ्या गुंतागुंती (कॉम्प्लिकेशन्स) ---------------------------- ----</span> </p>


</p> 1.तीव्र प्रकाशझोत सहन करण्याची क्षमता कमी होणे: दिव्याभोवती वर्तुळं दिसणे, प्रकाश सहन न होणे ही गुंतागुंत (कॉम्प्लिकेशन) बाहुलीच्या आकारावर अवलंबून असते. छोटी बाहुली असेल तर प्रकाशाचा त्रास कमी होतो आणि मोठी असेल तर जास्त होतो.<p>

</p> 2. चष्म्याचा नंबर पूर्णतः जाईल याची खात्री नसते. दूरचा जवळचा किंवा सिलेंड्रिकल चष्मा लागू शकतो. हा दृष्टिदोष चष्मा, कॉन्टॅक्ट लेन्स किंवा फेरशस्त्रक्रिया करून बरा करता येतो.<p>

</p> 3.फेरशस्त्रक्रिया: कृत्रिम भिंगाची स्थिती बदलण्यासाठी, भिंग बदलण्यासाठी किंवा भिंग काढून टाकण्यासाठी फेरशस्त्रक्रियेची गरज भासू शकते. कृत्रिम भिंगाची स्थिती आवश्यकतेनुसार नसल्यास फेकिक लेन्सचा नंबर किंवा माप बदलण्याची आवश्यकता असल्यास फेरशस्त्रक्रिया करावी लागते. फेरशस्त्रक्रियेच्या सर्व गुंतागुंती (कॉम्प्लिकेशन्स) ह्या प्रथम शस्त्रक्रियेसारख्याच असतात.<p>

</p> 4.संरक्षक चष्मे: शस्त्रक्रियेनंतरचा डोळा नाजूक असल्याकारणाने शस्त्रक्रियेनंतर मला डोळ्याला इजा होऊ नये याकरिता काळजी घ्यावी लागेल. खेळताना किंवा डोळ्याला इजा होण्याची शक्यता असल्यास संरक्षक चष्मा (goggle) वापरावा लागेल.<p>

</p> 5.) जर मला सध्या वाचनासाठी चष्मा वापरावा लागत असेल तर शस्त्रक्रियेनंतरही वापरावा लागेल. चाळीस वर्षे वयानंतर वाचण्यासाठी मला चष्मा वापरावा लागेल याची मला कल्पना आहे. या शस्त्रक्रियेनंतर वाचनाच्या चष्म्यावर मला जास्त अवलंबून रहावे लागेल.<p>
</p> या शस्त्रक्रियेचे परिणाम पूर्णतः निर्दोष असतील व शस्त्रक्रियेनंतर माझी दृष्टी अपेक्षेप्रमाणे राहील याची खात्री देता येत नाही. मला शस्त्रक्रियेनंतरही लगेच किंवा काही कालावधीनंतर चष्मा लावण्याची गरज भासू शकते.<p>


</p> <p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र  ---------------------------- ------</span> </p>

</p>मला याची कल्पना आहे की शस्त्रक्रियेनंतरच्या सगळ्या गुंतागुंती या संमतीपत्रात नमूद करणे शक्य नाही.<p>

</p>माझ्या नेत्रतज्ज्ञांच्या सल्ल्यानुसार या शस्त्रक्रियेनंतर मला फेरतपासणीसाठी यावे लागेल. फेकिक आयओएल या शस्त्रक्रियेची संपूर्ण माहिती ( मला समजेल अशा भाषेत) सांगण्यात आली आहे. माझ्या नेत्रतज्ज्ञांनी या शस्त्रक्रियेबाबत असणाऱ्या माझ्या सर्व प्रश्नांची उत्तरे समाधानकारक पद्धतीने दिली आहेत. या शस्त्रक्रियेचे फायदे, धोके व गुंतागुंती (कॉम्प्लिकेशन्स) याची पूर्ण माहिती मला देण्यात आली आहे.<p>

</p>मी माझ्या उजव्या डाव्या /दोन्ही डोळ्याची फेकिक आयओएल ही शस्त्रक्रिया करण्यास संमती देत आहे.<p>

</p> सदर शस्त्रक्रियेचे फायदे, तोटे, जोखिमा, संभाव्य गुंतागुंती आणि पर्यायी उपचार, मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे, ज्या करिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो/ देते. मला शस्त्रक्रियेच्या / उपचाराच्या सगळ्या गुंतागुंतींची ( कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, तरी माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे मूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.<p>

</p> तसेच, माझी ओळख ( छायाचित्र किंवा लेखी स्वरुपात ) उघड न करता, शास्त्रीय संशोधन, वैद्यकीय शिक्षण, वैद्यकीय नोंदी, शास्त्रीय मासिकांमध्ये प्रकाशन या कारणांसाठी व या शस्त्रक्रियेचा अभ्यास करणे, छायाचित्र घेणे, व्हिडिओ रेकॉर्डिंग करणे याला मी संमती देतो / देते.<p>


</p> सदर शस्त्रक्रियेच्या संभाव्य गुंतागुंतीबद्दल माझ्याशी चर्चा केली आहे जसे: भूलीशी निगडित गुंतागुंती, रक्तस्त्राव, जंतुसंसर्ग (इन्फेक्शन), डोळ्याभोवती गाठ (ग्रॅनुलोमा), पापण्यांची अनैसर्गिक ठेवणं (पापणी आत किंवा बाहेर वळणे, खाच पडणे), जखमेचा व्रण, व्रणाची अनैसर्गिक वाढ (हायपरट्रॉफी) / किलॉईड, किंवा डोळ्याच्या भोवती रक्त साकळणे, दुहेरी प्रतिमा दिसणे, अंधत्व येणे, तिरळेपणा आणि डोळ्याची पापणी खाली येणे.<p>

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
	       
  </tr>
</table>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	