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
    <title> Astigmatic keratotomy (AK)   </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

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
<h1 align="center" class="style33 style40"><strong> Astigmatic keratotomy (AK)   </strong></h1>
<h1 align="center" class="style33"><strong> (चष्म्याचा सिलिंड्रिकल नंबर कमी करण्याची शस्त्रक्रिया) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

</p> <strong>   </strong> <p>
</p><strong> </strong><p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- प्रस्तावना ---------------------------- ------</span> </p>

</p> ॲस्टिग्मॅटीक केरॅटोटोमी (AK) या शस्त्रक्रियेमध्ये डोळ्याच्या बुबुळ / नेत्रपटलाच्या (cornea) मध्यापासून 6 ते 7 मि. मी. अंतरावर छेद घेतले जातात. डोळ्याचे नेत्रपटल (cornea ) व डोळ्याचा पांढरा भाग (sclera) या दोघांना जोडणाऱ्या (limbus) या भागात दुर्बिणीच्या सहाय्याने सूक्ष्म वक्राकार एक किंवा दोन छेद केले जातात. या शस्त्रक्रियेमुळे बुबुळाचा बाह्य आकार बदलून बुबुळाच्या स्टीप (उंचवटा) असलेल्या भागाला सपाट बनवले जाते. या शस्त्रक्रियेमुळे बुबुळाचा आकार कायमचा बदलतो व रुग्णाचा चष्म्याचा नंबर पूर्णतः जाऊ शकतो परंतु याची शाश्वती देता येत नाही.<p>

<p/> ही आपत्कालीन शस्त्रक्रिया नाही. रुग्णाच्या सोयीनुसार ही शस्त्रक्रिया ठरवली जाऊ शकते. या शस्त्रक्रियेनंतरही रुग्ण चष्मा किंवा कॉन्टॅक्ट लेन्सेस वापरू शकतात. सर्व शस्त्रक्रियेप्रमाणे या शस्त्रक्रियेत देखील केलेल्या छेदाचे व्रण कायमस्वरूपी राहू शकतात. सर्व शस्त्रक्रियेप्रमाणे या शस्त्रक्रियेत देखील काही धोके आहेत, जे खाली नमूद केले आहेत. या धोक्यांव्यतिरिक्त काही इतर धोके शस्त्रक्रियेनंतर उद्भवू शकतात. डॉक्टर या धोक्यांची संपूर्ण माहिती देऊ शकत नाहीत. उत्तमोत्तम पद्धतीने व सर्व प्रकारची काळजी घेतल्यानंतरही शस्त्रक्रियेचे काही धोके असे असतात की त्यामुळे रुग्णाची दृष्टी कमी होऊ शकते.</p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- शस्त्रक्रियेचे पर्याय  ---------------------------- ------</span> </p>

</p>ॲस्टिग्मॅटीक केरॅटोटोमी या शस्त्रक्रियेचा पर्याय म्हणून आपण चष्मा किंवा कॉन्टॅक्ट लेन्सेस वापरू शकता किंवा PRK किंवा लॅसिक अशा शस्त्रक्रिया करून घेऊ शकता.<p>


</p> <p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- संभाव्य धोके आणि गुंतागुंती (कॉम्प्लिकेशन्स) ---------------------------- ------</span> </p>



</p> 1) मला याची कल्पना आहे की शस्त्रक्रियेनंतर माझी नजर (दृष्टी) अपेक्षेप्रमाणे वाढेल अशी खात्री नाही. नजर वाढवण्यासाठी मला दुसऱ्या शस्त्रक्रियेची गरज भासू शकते. मला चष्मा लावण्याचीही गरज भासू शकते. शस्त्रक्रियेनंतर मी कॉन्टॅक्ट लेन्सेस लावू शकेन ही खात्री देता येत नाही.<p>

</p> 2) शस्त्रक्रियेनंतर जंतुसंसर्ग झाल्यास माझी नजर शस्त्रक्रियेच्या पूर्वी होती त्या पेक्षा कमी होऊ शकते किंवा जंतुसंसर्ग प्रतिजैविक औषधांच्या सहाय्याने कमी न झाल्यास माझी नजर पूर्णपणे जाऊ शकते. <p>

</p> 3) शस्त्रक्रियेमुळे बुबुळावर तयार केलेले छेद व्यवस्थित न भरल्यामुळे बुबुळाचा पृष्ठभाग खडबडीत होऊ शकतो. नजर सुधारण्यासाठी मला कॉन्टॅक्ट लेन्सेस लावण्याची गरज भासू शकते. माझी नजर पूर्ववत होण्याची खात्री अशा परिस्थितीत राहत नाही.<p>

</p> 4) मला याची कल्पना आहे की माझ्या डोळ्यांची तीव्र प्रकाश सहन करण्याची क्षमता ठराविक कालावधीकरता किंवा कायमस्वरूपी कमी होऊ शकते.<p>

</p> 5) संध्याकाळी किंवा रात्री वाहन चालवताना समोरून येणाऱ्या प्रकाशाभोवती वर्तुळ दिसणे, प्रकाश सहन न होणे, असा त्रास शस्त्रक्रियेनंतर होऊ शकतो. शस्त्रक्रियेनंतर माझी नजर योग्य होईपर्यंत मला दिवसा अथवा रात्री वाहन चालविता येणार नाही.<p>

</p> 6) शस्त्रक्रियेनंतर 3 महिने किंवा त्यापेक्षा जास्त कालावधीपर्यंत दिवसा अथवा रात्री माझ्या डोळ्यांची कार्यक्षमता कमी - जास्त राहू शकते.<p>

</p> 7) सर्व शस्त्रक्रियांप्रमाणे या शस्त्रक्रियेतही केलेल्या जखमांचे व्रण कायमस्वरूपी राहू शकतात.<p>

</p> 8) सामान्य बुबुळाच्या तुलनेत या शस्त्रक्रियेनंतर माझे बुबुळ नाजूक असल्या कारणाने डोळ्याला इजा झाल्या त्याचा धोका जास्त संभवतो. म्हणून खेळताना अथवा डोळ्याला इजा होण्याची शक्यता असल्यास मला संरक्षक चष्मे (goggle) लावण्याची गरज आहे.<p>

</p> 9) वर नमूद केलेल्या गुंतागुंतीव्यतिरिक्त बुबुळाला छेद पडणे, बुबुळावर नवीन रक्तवाहिन्या तयार होणे, बुबुळाचा जंतुसंसर्ग, बुबुळाच्या आतील थरांची झीज (endothelial loss ), बुबुळाच्या वरच्या थराला इजा (epithelial defect) अशा शस्त्रक्रियेच्या गुंतागुंती (कॉम्प्लिकेशन्स) होऊ शकतात. क्वचित रुग्णांमध्ये shoया अंतर्भागात जंतुसंसर्ग (endophthalmitis) झाल्यास कायमस्वरूपी अंधत्व येऊ शकते.<p>

</p> 10) सर्व शस्त्रक्रियांप्रमाणे भूलप्रक्रियेमुळे, औषधांच्या दुष्परिणामांमुळे किंवा शरीरावर परिणाम करणाऱ्या इतर बाबींमुळे काही धोके संभवू शकतात.<p>

</p> या व्यतिरिक्त या शस्त्रक्रियेच्या ज्या मला सांगितल्या गेल्या नाहीत अशा काही संभाव्य गुंतागुंती (कॉम्प्लिकेशन्स) होऊ शकतात.<p>

</p>मला अॅस्टिग्मॅटीक केरॅटोटोमी शस्त्रक्रियेची संपूर्ण माहिती (मला समजेल अशा भाषेत) सांगण्यात आली आहे. माझ्या नेत्रतज्ज्ञांनी या शस्त्रक्रियेबाबत माझ्या सर्व प्रश्नांची उत्तरे समाधानकारक पद्धतीने दिली आहेत.<p>

</p> या शस्त्रक्रियेचे फायदे, धोके व गुंतागुंती (कॉम्प्लिकेशन्स) याची पूर्ण माहिती मला देण्यात आली आहे. ॲस्टिग्मॅटीक केरॅटोटोमी (AK) या शस्त्रक्रियेकरिता पूर्ण संमती देत आहे.<p>

</p> ॲस्टिग्मॅटीक केरॅटोटोमी ही शस्त्रक्रिया मी माझ्या उजव्या / डाव्या / दोन्ही डोळ्यावर करून घेण्यास तयार आहे.<p>


</p> <p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र  ---------------------------- ------</span> </p>

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
	

<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>

</body>
</html>


	