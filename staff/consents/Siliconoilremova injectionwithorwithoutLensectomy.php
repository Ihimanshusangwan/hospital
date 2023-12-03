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
    <title> Silicon oil removal/injection with or without Lensectomy </title>
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
<h1 align="center" class="style33 style40"><strong> Silicon oil removal/injection with or without Lensectomy  </strong></h1>
<h1 align="center" class="style33"><strong> ( सिलीकॉन ऑईल काढणे / भरणे व डोळ्यातील भिंग काढण्याची शस्त्रक्रिया ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

</p> <strong>   </strong> <p>
</p><strong> </strong><p>



</p> <p align="center" class="style9 style23 style27"><span class="style33">------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>

</p>मला माझ्या मातृभाषेत समजावण्यात आले आहे की, माझ्या उजव्या / डाव्या डोळ्याची सिलीकॉन ऑईल काढण्याची/भरण्याची शस्त्रक्रिया करावी लागणार आहे. माझ्या डोळ्यात आधीच्या शस्त्रक्रियेत सिलीकॉन ऑईल भरण्यात आले होते. पण हे डोळ्याच्या पुढील भागात आले आहे व त्यामुळे डोळ्याचा दाब वाढणे तसेच बुबुळ खराब होण्याचा धोका आहे. मला हे देखिल सांगण्यात आले आहे की, ह्या शस्त्रक्रियेदरम्यान माझ्या डोळ्यातील भिंग काढण्याची गरज लागू शकेल. असे केल्यास शस्त्रक्रियेनंतर माझी दृष्टी कमी होईल. भविष्यात दुसऱ्या शस्त्रक्रियेने कृत्रिम भिंग डोळ्यात बसवले जाईल. गरज असल्यास डोळ्यात परत ऑईल भरण्यात येईल. सिलीकॉन ऑईल भरल्यानंतर काही महिन्यांनी ते शस्त्रक्रियेने परत काढावे लागेल.<p>

</p><strong> ह्या शस्त्रक्रियेतील काही संभाव्य गुंतागुंती पुढील प्रमाणे आहेत.</strong><p>

</p><strong>  1. पूर्वनियोजित उद्दिष्ट पूर्ण न करता येणे </strong><p>

</p><strong> 2. निसटलेले नेत्रपटल जागेवर न बसवता आल्यामुळे परत शस्त्रक्रिया करावी लागणे अथवा क्वचित प्रसंगी शस्त्रक्रिया करु न शकणे.</strong> <p>

</p><strong> 3. काही वेळा डोळ्यातील आजार वाढल्यामुळे उपचार करूनदेखील दृष्टी न सुधारणे</strong><p>

</p><strong> 4. हा आजार परत भविष्यात होऊ शकतो.</strong><p>

</p><strong> 5. कधी कधी डोळ्याला खूप जास्त सूज येणे, डोळ्यात पू होणे, डोळ्यात रक्तस्त्राव होणे, डोळ्याचा ताण खूप कमी
किंवा जास्त होणे, काचबिंदू होणे, बुबुळाला इजा होणे, डोळ्याची पापणी खाली सरकणे, डोळ्याच्या आतील रक्तवाहिन्या बंद होणे अशा अनेक शक्यता आहेत.</strong><p>

</p><strong> 6. दुसऱ्या चांगल्या डोळ्याला सूज येऊन त्याच्या दृष्टीस धोका निर्माण होण्याची शक्यता असते (possibility of sympathetic ophthalmia 1:17000)</strong><p>

</p> ही शस्त्रक्रिया डोळ्याला इंजेक्शनद्वारे स्थानिक भूल देऊन केली जाईल.<p>

</p> मी----------------------------------------------रुग्ण श्री/श्रीमती --------------------------------------------------ह्यांच्याशी ---------------------------------------- नात्यानी संबंधित आहे. मला ह्या शस्त्रक्रियेतील संभाव्य परिणामांबद्दल मला समजेल असे सांगितलेले आहे व मी ह्या शस्त्रक्रियेसाठी डॉक्टरांना संमती देत आहे.<p>



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
	       
 

 </tr>
</table>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>




</body>
</html>


	