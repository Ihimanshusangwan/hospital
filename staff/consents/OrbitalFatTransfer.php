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
    <title>  Orbital Fat Transfer     </title>
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
<h1 align="center" class="style33 style40"><strong> Orbital Fat Transfer    </strong></h1>
<h1 align="center" class="style33"><strong> ( कऑरबायटल फॅट ट्रान्सफर   ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>


</p> मला माझ्या मातृभाषेत माझ्या डॉक्टरांनी समजावून सांगितले आहे की माझ्या / माझ्या पाल्याच्या उजव्या / डाव्या डोळ्याच्या खोबणीचा आकार लहान झाला आहे. त्यामुळे वरून लावलेला कृत्रिम डोळा खोल गेलेला वाटतो. डोळ्याची खोबणी आक्रसल्यामुळे त्या खोबणीमध्ये नवीन कृत्रिम डोळा नीट बसवता येत नाही. या आक्रसलेल्या डोळ्याच्या खोबणीचा आकार वाढविण्यासाठी, डोळ्याच्या खोबणीमध्ये ऑरबायटल फॅट ट्रान्सफरची शस्त्रक्रिया करण्याची गरज आहे. या शस्त्रक्रियेदरम्यान आवश्यकता पडल्यास प्रत्यारोपण / ग्राफ्टिंग आणि डोळ्याच्या आणि पापणीमधील जागा / फॉनिक्स तयार करण्यासाठी टाके घातले जातील, जेणेकरून कृत्रिम डोळा नीट बसवता येईल. ही शस्त्रक्रिया संपूर्ण भूल देऊन किंवा फक्त डोळा बधीर करून करण्यात येईल. मला हे पूर्णपणे समजावले आहे की यामधे फक्त डोळ्याच्या खोबणीचे आकारमान वाढेल, दृष्टी प्राप्त होणार नाही. या शस्त्रक्रियेतून पोट/ मांडी / दंड या भागातून फक्त चरबीचे प्रत्यारोपण डोळ्याच्या खोबणीत करण्यात येईल.<p>

</p> <strong > भूलेशी निगडित आणि इतर गुंतागुंती खालील प्रमाणे आहेत. </strong> <p>

</p> 1. रक्तस्त्राव . <p>

</p> 2. जंतुसंसर्ग.<p>

</p> 3. त्वचेवर जखम होणे.<p>

</p> 4. त्वचेवरील संवेदनेमधे कायमस्वरूपी बदल.<p>

</p> 5. त्वचेखालील रक्तवाहिनी, नस, मांसपेशी, फुफ्फुस आणि पोटातील अवयवांना इजा . <p>

</p> 6. रक्तवाहिन्यांमधे गाठी तयार होणे ( Deep vein thrombosis), ह्रदय आणि फुफ्फुस निगडित गुंतागुंती . <p>

</p> 7. त्वचा / अवयवांमध्ये द्रव जमा होणे . <p>

</p> 8. ग्राफ्ट घेतलेला शरीराचा भाग असमान वाटणे . <p>

</p> 9. चरबी किंवा रक्ताची गुठळी तयार होऊन मेंदू किंवा फुफ्फुसांत जाणे.<p>

</p> 10. काही वेळेस तोंडाच्या आतील आवरण, अर्भकाच्या नाळेचे आवरण (अॅम्नीऑटिक मेम्ब्रेन), त्वचेतील चरबीच्या आवरणाचे प्रत्यारोपण करण्याची गरज पडू शकते.<p>

</p> <strong > अशी गरज पडल्यास खालील गोष्टी मला समजावून सांगण्यात आलेल्या आहेत- </strong> <p>

		</p> अ) प्रत्यारोपण केलेल्या आवरणाचा अस्वीकार, जंतुसंसर्ग, त्वचा आकुंचन पावणे ( फायब्रोसिस) या सारख्या समस्या येऊ शकतात. <p> 
		</p> ब) म्युकस मेंब्रेन ग्राफ्ट / प्रत्यारोपण जर ओठ किंवा तोंडाच्या आतील भागातून घेतले असेल तर त्या ग्राफ्टचे नियमित निर्जंतुकीकरण करावे लागेल. तसेच तोंडाची स्वच्छता राखून त्या भागाची नियमित काळजी घ्यावी लागेल.<p>
		</p> क) मांडी किंवा पोटाच्या जवळील त्वचेखालील चरबी काढून रोपण / ग्राफ्टींग केले जाऊ शकते तसे असल्यास हया भागावरील जखमेची काळजी घेण्याचे मला समजावले आहे.<p>
		

</p> 11. पापणीच्या आतील भागातील टाके ३ आठवड्यानंतर काढले जातील.  <p>

</p> 12. डोळ्याच्या पापणीच्या आत कृत्रिम कन्फरमर हा २ महिन्यांसाठी घालावा लागू शकतो. <p>

</p> 13. कृत्रिम डोळा 2 महिन्यांनंतर दिला जाईल. कृत्रिम डोळा कदाचित व्यवस्थित बसणार नाही याची शक्यता असू शकते.<p>

</p> 14. कृत्रिम डोळ्याची हालचाल अतिशय कमी राहील. <p>

</p> 15. डोळ्याच्या खोबणीचा आकार हा पूर्णपणे एकाच शस्त्रक्रियेमध्ये योग्य होईल असे सांगता येत नाही आणि अशा वेळी अतिरिक्त शस्त्रक्रिया करण्याची किंवा खोबणी अजून विस्तारित करण्याची आणि त्याचा आकार वाढविण्याची गरज पडू शकते.<p>


</p> उपचारादरम्यान काही वेळा अनपेक्षित परिस्थिती उद्भवू शकते याची मला कल्पना दिली आहे. अशा वेळी मूळ निदान करताना आणि उपचार ठरविताना निश्चित केल्यापेक्षा वेगळी शस्त्रक्रिया किंवा उपचारपध्दती तातडीने करण्याची गरज निर्माण होते. अशा परिस्थितीत आवश्यक सर्व जास्तीच्या उपचारपध्दती व शस्त्रक्रिया करण्याची माझ्यावर उपचार करणाऱ्या डॉक्टरांच्या चमूला मी विनंती करतो / करते आणि संमती देतो/देते.<p>

</p> मला माझे सगळे प्रश्न / शंका विचारण्याची संधी दिली गेली आहे तसेच दुसऱ्या डॉक्टरांचा सल्ला घेण्याचा पर्याय दिला आहे.<p>

</p> मी संमती देतो / देते की माझी ओळख व खाजगी माहिती उघड न करता, या शस्त्रक्रियेबद्दलची माहिती, फोटो, चित्रीकरण, वैद्यकीय नोंदीचा वापर वैद्यकीय संशोधन, वैदयकीय अभ्यास किंवा वैद्यकीय प्रकाशनासाठी उपयोगात आणल्यास माझी हरकत नाही. तसेच माझ्या शस्त्रक्रियेनंतरच्या तपासणी दरम्यान वैद्यकीय नोंदी, फोटो, चित्रीकरणाच्या नोंदी वैद्यकीय संशोधनासाठी वापरायची परवानगी देत आहे.<p>
 
</p>मला याची जाणीव आहे की ही शस्त्रक्रिया चांगल्या हेतूने केली जात आहे व त्याच्या परिणामांची हमी देऊ शकत नाही.<p>

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


	