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
    <title> External Dacryocystorhinostomy (DCR)   </title>
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
<h1 align="center" class="style33 style40"><strong> External Dacryocystorhinostomy (DCR)      </strong></h1>
<h1 align="center" class="style33"><strong> (  बाह्य डॅक्रिओसिस्टोव्हायनॉस्टॉमी ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>

</p> मला माझ्या मातृभाषेत समजावून सांगण्यात आले आहे की माझ्या डोळ्याची अश्रू निचरा करणारी प्रणाली बंद असल्यामुळे (लासरु ) माझ्या उजव्या डाव्या डोळ्यातुन पाणी येत आहे. या शस्त्रक्रियेमध्ये नाकाच्या पोकळीत असलेल्या अश्रुपिशवी आणि नाक यांच्यात नवीन मार्ग तयार करण्यात येईल जेणेकरून अश्रुनलिकेचा अडथळा दूर होईल आणि या मार्गे नाकात किंवा घशात अश्रुंचा निचरा होईल. स्थानिक किंवा पूर्ण भूल देऊन ही शस्त्रक्रिया केली जाऊ शकते. नाकाच्या बाजूला त्वचेला छेद दिला जाईल आणि नाकाच्या हाडामध्ये एक छिद्र तयार केले जाईल. काही रुग्णांमध्ये शस्त्रक्रियेदरम्यान ट्यूब घातली जाऊ शकते. शस्त्रक्रियेनंतर, नाकात पॅक ठेवला जाईल.<p>

</p><strong> शस्त्रक्रियेच्या जोखिमांमध्ये भूल देण्यासंबंधित किंवा इतर गुंतागुंती असतात. त्या खालील प्रमाणे आहेत :</strong><p>

</p> <strong> 1.शस्त्रक्रियेच्या छेदाच्या जागेवर व्रण.</strong><p>

</p> <strong>2.शस्त्रक्रियेदरम्यान आणि नंतर रक्तस्त्राव.</strong><p>

</p> <strong>3.गरज भासल्यास अश्रुंची थैली काढावी लागू शकते (Sac removal).</strong><p>

</p> <strong> 4.जखमेच्या जंतुसंसर्गाचा धोका आणि जखम विलग होणे.</strong><p>

</p> <strong>5.मेंदूभोवतीचा द्रव (सेरेब्रोस्पाइनल फ्लुइड) बाहेर येण्याचा धोका .</strong><p>

</p> <strong>6.कॅनालिक्युलर ब्लॉक आणि पापणीच्या नाकाजवळील अश्रू निचरा करणारी नलिका बंद होणे. </strong><p>

</p> <strong>7.ट्यूब बाहेर निघण्याचा धोका. </strong><p>

</p> <strong>8.शस्त्रक्रियेनंतर काही दिवस डोळ्यातून पाणी येणे. </strong><p>

</p> <strong> 9. 'रक्तसंक्रमण आणि त्याच्याशी संबंधित गुंतागुंत होण्याची शक्यता. </strong> <p>

</p> <strong> 10. शस्त्रक्रिया अयशस्वी होणे आणि पुन्हा शस्त्रक्रिया करण्याची आवश्यकता भासू शकते.</strong> <p>


</p> <strong> उपचारादरम्यान मला हे स्पष्ट केले गेले आहे की, अनपेक्षित परिस्थिती उद्भवू शकते. त्यामुळे प्रारंभिक तज्ज्ञांसोबत त्यांच्या सहकाऱ्यांची मदत घेऊन ठरवलेल्या शस्त्रक्रिया उपचारपद्धतीपेक्षा वेगळी आपत्कालीन शस्त्रक्रिया करण्याची गरज भासू शकते. यासाठी मी वरील नियुक्त तज्ज्ञ डॉक्टरांव्यतिरिक्त इतर तज्ज्ञांना शस्त्रक्रिया किंवा इतर उपचार करण्याची संमती देतो/देते.</strong> <p>


</p>  मला सर्व काही प्रश्न विचारण्याची संधी देण्यात आली आहे आणि मला दुसऱ्या नेत्रतज्ज्ञांचे मत घेण्याचा पर्यायदेखील देण्यात आला आहे.<p>

</p> मला पूर्ण कल्पना आहे की ही शस्त्रक्रिया चांगल्या उद्देशाने केली जात आहे आणि शस्त्रक्रियेच्या अंतिम परिणामाबद्दल कोणतीही हमी किंवा आश्वासन दिले गेलेले नाही.<p>

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


	