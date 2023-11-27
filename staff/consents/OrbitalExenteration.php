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
    <title>  Orbital Exenteration     </title>
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
<a class="btn btn-primary noprint" href="../eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <button class='btn btn-success noprint' onclick="window.print();">Print</button>

     <h2><h2>
     <?php if($inp_arr[1]=='option1'){
            include_once("../header/images.php");

        } 
       
        ?>
</body>
  
</html>
<h1 align="center" class="style33 style40"><strong> Orbital Exenteration   </strong></h1>
<h1 align="center" class="style33"><strong> ( ऑरबायटल एक्झेन्ट्रेशन  ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>


</p> मला माझ्या मातृभाषेत माझ्या डॉक्टरांनी समजावून सांगितले आहे की, माझ्या उजव्या / डाव्या डोळ्याच्या खोबणीला ( Orbit) कर्करोग / इतर आजार झाला आहे. हया आजारातून जीव वाचवण्यासाठी आणि या आजारावर नियंत्रण मिळवण्यासाठी, मला 'ऑरबायटल एक्झेन्ट्रेशन ' ( डोळा, डोळ्यांची खोबणी व लगतचा भाग काढण्याची शस्त्रक्रिया ) करण्याची आवश्यकता आहे. ही शस्त्रक्रिया संपूर्ण भूल देऊन करण्याची आवश्यकता आहे. या शस्त्रक्रियेमधे संपूर्ण डोळा आणि खोबणीभोवतीचा भाग, त्या जवळील टिश्यु (पेरिऑरबायटल टिश्यू), मांसपेशी, नस, चरबी काढण्याची गरज आहे (रोगाच्या व्याप्तीनुसार रोगग्रस्त टिश्यु काढण्यात येईल). शस्त्रक्रियेनंतर जखम पूर्णपणे भरल्यानंतर मला चेहरा नीट दिसण्यासाठी कृत्रिम डोळा बसवण्याची आवश्यकता भासेल.<p>

</p>शस्त्रक्रियेनंतर टिश्यु सूक्ष्म जैविक तपासणीसाठी (हिस्टोपॅथॉलोजी) पाठविला जाईल आणि चाचणीच्या परिणामावर आधारित काही अतिरिक्त उपचारांची मला नंतर गरज पडू शकते.<p>

</p> <strong > शस्त्रक्रियेसंबंधित किंवा भूल देण्याशी निगडीत संभाव्य गुंतागुंती </strong> <p>

</p> 1. रक्तस्त्राव <p>

</p> 2. जंतुसंसर्ग <p>

</p> 3. उर्वरित राहिलेला किंवा परत उद्भवलेला आजार <p>

</p> 4. सायनो-ऑरबायटल (Sino-orbital) फिस्चुला तयार होणे <p>

</p> 5. डोळ्याच्या सभोवतालची त्वचा आक्रसणे <p>

</p> 6. भुवईची पातळी बदलणे <p>

</p> 7. अपवादात्मक परिस्थितीत मंदुमधील द्रवाची (सेरेब्रोस्पायनल फ्लुईड) गळती होणे. <p>

</p> उपचारादरम्यान काही वेळा अनपेक्षित परिस्थिती उद्भवू शकते याची मला कल्पना दिली आहे. अशा वेळी मूळ निदान करताना आणि उपचार ठरविताना निश्चित केलेल्यापेक्षा वेगळी शस्त्रक्रिया किंवा प्रक्रिया तातडीने करण्याची गरज निर्माण होते. अशा परिस्थितीत आवश्यक सर्व जास्तीच्या प्रक्रिया व शस्त्रक्रिया करण्याची माझ्यावर उपचार करणाऱ्या डॉक्टरांच्या चमूला मी विनंती करत आहे आणि अधिकार देत आहे. <p>

</p> मी संमती देतो/ देते की शस्त्रक्रिया करण्यासाठी आवश्यक ती भूल मला देण्यात यावी. मी संमती देतो/ देते की आवश्यक असणारी औषधे द्रव / रक्त / रक्ताचे घटक मला देण्यात यावेत <p>

</p> मी संमती देतो / देते की माझी ओळख व खाजगी माहिती उघड न करता, या शस्त्रक्रियेबद्दलची माहिती, फोटो, चित्रीकरण, वैद्यकीय नोंदीचा वापर वैद्यकीय संशोधन, वैदयकीय अभ्यास किंवा वैद्यकीय प्रकाशनासाठी उपयोगात आणल्यास माझी हरकत नाही. तसेच माझ्या शस्त्रक्रियेनंतरच्या तपासणी दरम्यान वैद्यकीय नोंदी, फोटो, चित्रीकरणाच्या नोंदी वैद्यकीय संशोधनासाठी वापरायची परवानगी देत आहे.<p>
 
</p> मला माझे सगळे प्रश्न / शंका विचारण्याची संधी दिली गेली आहे तसेच दुसऱ्या डॉक्टरांचा सल्ला घेण्याचा पर्यायही दिला आहे. <p>

</p> मला याची जाणीव आहे की ही शस्त्रक्रिया चांगल्या हेतूने केली जात आहे व त्याच्या परिणामांची हमी देऊ शकत नाही. <p>

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
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	