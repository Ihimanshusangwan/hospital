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
    <title> Electroepilation        </title>
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
<h1 align="center" class="style33 style40"><strong> Electroepilation        </strong></h1>
<h1 align="center" class="style33"><strong> (  इलेक्ट्रोइपायलेशन ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>


</p> मला माझ्या मातृभाषेत समजावून सांगितले आहे की माझ्या उजव्या डाव्या दोन्ही डोळ्यांच्या वरच्या / खालच्या दोन्ही पापण्यांमध्ये एक दोष आहे. या दोषामुळे माझ्या डोळ्याच्या पापण्यांचे केस आत वळून आतील पृष्ठभागास इजा करीत आहेत. या आत जाणाऱ्या पापण्यांचे केस काढण्याची शस्त्रक्रिया केली जात आहे. यामुळे माझ्या पापणीच्या कडेची स्थिती किंवा माझ्या नजरेत सुधारणा होणार नाही है। मला स्पष्ट केले आहे. मला हे देखील स्पष्ट करण्यात आले आहे की यासाठी नियमित अंतराने पापण्यांचे केस काढणे किंवा पापण्यांच्या केसांना क्रायोथेरपी करणे ही पर्यायी उपचारपध्दती आहे. सर्व पर्यायांच्या पार्श्वभूमीवर सध्या हा सर्वात योग्य पर्याय आहे हे मला समजले आहे. पापणीचे केस काढण्याची ही शस्त्रक्रिया स्थानिक / पूर्ण भूल देऊन माझ्या उजव्या डाव्या / दोन्ही पापण्यांवर केली जाईल याची माझ्याशी चर्चा केली आहे.<p>

</p> <strong> शस्त्रक्रियेच्या जोखिमांबद्दल देखील चर्चा केली गेली आहे. यामध्ये भूलीसंबंधित तसेच शस्त्रक्रियेसंबंधित गुंतागुंती असतात :</strong><p>

</p> 1.जंतुसंसर्ग.<p>

</p> 2.पापणीची सूज.<p>

</p> 3.बुबुळाला इजा होणे किंवा जखम होणे .<p>

</p> रक्तस्त्राव आणि रक्ताची गाठ तयार होणे .<p>

</p> डोळ्यातून वारंवार पाणी येणे / डोळा कोरडा होणे . <p>

</p> डोळ्याच्या पापणीवर खाच पडणे . <p>

</p> डोळ्यांच्या पापणीचे केस झडणे . <p>

</p> पापण्यांचे अनैसर्गिक केस वाढणे . <p>

</p> मला हे स्पष्ट केले आहे की जर पापण्यांचे केस परत डोळ्याच्या आत गेल्यास ही प्रक्रिया (Electroepilation) पुन्हा करण्याची गरज भासू शकते. <p>

</p> मी याद्वारे संमती देत आहे की डॉ ----------------------- यांना माझ्या उजव्या / डाव्या दोन्ही पापणीची शस्त्रक्रिया करण्यासाठी रुग्णालय जे कर्मचारी, सहकारी किंवा सहाय्यक म्हणून नियुक्त करतील त्यासाठी मी तयार आहे.<p>

</p> उपचारादरम्यान मला हे स्पष्ट केले गेले आहे की, अनपेक्षित परिस्थिती उद्भवू शकते. त्यामुळे नेत्रतज्ज्ञ व त्यांच्या सहकाऱ्यांची मदत घेऊन ठरवलेल्या शस्त्रक्रिया / उपचारपद्धतीपेक्षा वेगळी आपत्कालीन शस्त्रक्रिया करण्याची गरज भासू शकते. यासाठी मी वरील नियुक्त तज्ज्ञ डॉक्टरांव्यतिरिक्त इतर तज्ज्ञांना शस्त्रक्रिया किंवा इतर उपचार करण्याची संमती देतो/ देते.<p>

</p> भूलेच्या औषधांच्या वापरासाठी आणि आवश्यक वाटेल अशा प्रकारची भूल देण्यास मी संमती देतो/ देते.<p>

</p>  माझी ओळख ( छायाचित्र किंवा लेखी स्वरुपात) उघड न करता, शास्त्रीय संशोधन, वैद्यकीय शिक्षण, वैद्यकीय नोंदी, शास्त्रीय मासिकांमध्ये प्रकाशन या कारणांसाठी व या शस्त्रक्रियेचा अभ्यास करणे, छायाचित्र घेणे, व्हिडिओ रेकॉर्डिंग करणे याला मी संमती देतो / देते. तसेच, या शस्त्रक्रियेची किंवा परत कराव्या लागणाऱ्या शस्त्रक्रियेची माहिती, छायाचित्र किंवा व्हिडिओ रेकॉर्डिंग हे सर्व वैद्यकीय ज्ञानाच्या वृद्धीसाठी प्रकाशित करण्यासाठी मी संमती देतो/ देते.<p>

</p>  मला सर्व काही प्रश्न विचारण्याची संधी देण्यात आली आहे आणि मला दुसऱ्या नेत्रतज्ज्ञांचे मत घेण्याचा पर्यायदेखील देण्यात आला आहे .<p>

</p>  मला पूर्ण कल्पना आहे की ही शस्त्रक्रिया चांगल्या उद्देशाने केली जात आहे आणि जे परिणाम मिळतील. त्याबद्दल कोणतीही हमी किंवा आश्वासन दिले गेलेले नाही.<p>

</p>  शस्त्रक्रियेत काढून टाकलेला भाग नियमानुसार संस्थेद्वारे विल्हेवाट लावली जाऊ शकते.<p>

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
      <p> <font size="+1"><strong>रुग्ण अल्पवयीन किंवा मानसिकरित्या असक्षम असल्यास, रुग्णाच्या पालकांची सही / अंगठ्याचा ठसा . </strong> <p>
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


	