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
    <title> Syringing and Probing         </title>
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
<h1 align="center" class="style33 style40"><strong> Syringing and Probing    </strong></h1>
<h1 align="center" class="style33"><strong> (  सिरिंजिंग आणि प्रोबिंग ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>


</p> मला माझ्या मातृभाषेत समजावून सांगण्यात आले आहे की माझ्या / माझ्या पाल्याच्या उजव्या डाव्या दोन्ही डोळ्याच्या अश्रू निचरा करणाऱ्या प्रणालीमध्ये अडथळा असल्यामुळे डोळ्यातून पाणी येत आहे. हा अडथळा दूर करण्यासाठी अश्रूनळी मध्ये एक प्रोब टाकला जाईल (प्रोबिंग) जेणेकरून अडथळा दूर होईल. स्थानिक किंवा पूर्ण भूल देऊन ही शस्त्रक्रिया केली जाऊ शकते. या शस्त्रक्रियेमध्ये एंडोस्कोपचा
(Endoscope) पण वापर केला जाऊ शकतो, या शस्त्रक्रियेमध्ये ज्या नळी मध्ये अडथळा आहे तो काढून मार्ग मोकळा करण्याचा प्रयत्न केला जाईल. ही प्रक्रिया संपूर्ण किंवा स्थानिक भूल देऊन केली जाईल. काही वेळा हा मार्ग फार आकुंचित / बारीक (स्टेनोसिस ) असतो. तसे असल्यास नेत्रतज्ज्ञ त्यात एक नळी घालून ठेऊ शकतात. ही नळी 13 महिन्यांनंतर काढली जाईल. <p>

</p> <strong> 1.जेव्हा साधा अडथळा असतो तेव्हा ही शस्त्रक्रिया ९५% लोकांमध्ये यशस्वी होऊ शकते.</strong><p>

</p> <strong>2.अडथळा दूर झाला नाही तर शस्त्रक्रिया पुन्हा करावी लागू शकते. </strong><p>

</p> <strong>3.अश्रुनलिकेमध्ये गुंतागुंतीचा अडथळा असू शकतो किंवा अश्रुनलिका कदाचित विकसित झालेली नसते. काही वेळा ही परिस्थिती शस्त्रक्रियेच्या वेळी लक्षात येते. त्यानंतर दुसऱ्या शस्त्रक्रियेची आवश्यकता भासू शकते.</strong><p>

</p> <strong> 4.शस्त्रक्रियेनंतर नाकातून रक्तस्त्राव होऊ शकतो.</strong><p>

</p> <strong>5.शस्त्रक्रियेनंतर अपेक्षेपेक्षा वेगळा मार्ग तयार होऊ शकतो आणि ह्या मार्गात सलाईन साचून डोळ्याच्या पापणीच्या आजूबाजूला सूज येऊ शकते.</strong><p>

</p> <strong> 6.उपरोक्त नमूद केलेली तथ्ये जाणून घेऊन, मी माझ्या / माझ्या पाल्याच्या सिरिंजिंग - आणि प्रोबिंगसाठी संमती देतो/देते.</strong> <p>



</p>  मला सर्व काही प्रश्न विचारण्याची संधी देण्यात आली आहे आणि मला दुसऱ्या नेत्रतज्ज्ञांचे मत घेण्याचा पर्यायदेखील देण्यात आला आहे .<p>


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


	