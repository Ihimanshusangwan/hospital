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
    <title> डीप अँटिरियर लॅमेलर केरॅटोप्लास्टी</title>
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
<h1 align="center" class="style33 style40"><strong> Deep Anterior Lamellar Keratoplasty (DALK)  </strong></h1>
<h1 align="center" class="style33"><strong> ( डीप अँटिरियर लॅमेलर केरॅटोप्लास्टी ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------रुग्णाचे संमतीपत्र------</span> </p>

</p> मला माझ्या मातृभाषेत समजावले आहे की माझ्या माझ्या पाल्याच्या बुबुळाला (cornea) फूल पडले आहे / बुबुळ पातळ होऊन एका बाजूला फुगीर झाले आहे / बुबुळाच्या पुढच्या भागाचे अन्य आजार (corneal opacity.commeal ectasia, keratoconus etc.. (निर्दिष्ट करा. _) व त्यासाठी ही शस्त्रक्रिया केली जाते. यामध्ये बुबुळाचा पुढचा भाग, मध्य व खोलवरचा भाग (एपिथिलियम, बेसमेंट मेम्ब्रेन स्ट्रोमा डेसेमेट मेंब्रेन पर्यंत) काढला जातो. त्याठिकाणी नेत्रदानातून मिळालेल्या बुबुळाचा भाग टाक्यांच्या सहाय्याने बसवला जातो.<p>

</p> माझ्या/ माझ्या पाल्याच्या बबुळाचा आजार/ बुबुळाला पडलेले फूल हे कायमस्वरूपी आहे व दृष्टी सुधारण्यासाठी हे लागेल हे मला पूर्णपणे समजावले गेले आहे. या शस्त्रक्रियेदरम्यान स्वतःच्या बुबुळाला छिद्र पडण्याचा संभाव्य धोका आहे व तसे झाल्यास, पूर्ण बुबुळ बदलावे लागेल (फुल थिकनेस कॉर्नियल ट्रान्सप्लांट) या शस्त्रक्रियेमध्ये उद्भवणाऱ्या संभाव्य गुंतागुंती- जंतुसंसर्ग, ग्राफ्ट रिजेक्शन, टाके सैल होणे, टाके परत घ्यावे लागणे, स्वतःच्या बुबुळाच्या व बसवलेल्या बुबुळाच्या मध्ये बारीक रक्तवाहिन्या निर्माण होणे व त्यातून रक्तस्त्राव होणे, दृष्टी न सुधारणे किंवा असलेली दृष्टी अधिक कमी होणे, शस्त्रक्रिया किंवा औषधांमुळे काचबिंदू होणे, मोतीबिंदू होणे, जास्त विषम दृष्टीचा चष्म्याचा नंबर ( astigmatism) लागणे, शस्त्रक्रिया परत करावी लागू शकणे आणि त्यानंतरसुद्धा दृष्टी मध्ये सुधारणा होऊ शकते अथवा नाही, याची मला माहिती दिली गेली आहे. शस्त्रक्रियेनंतर फेरतपासणीसाठी डॉक्टरांच्या <p>

</p>तसेच, माझी ओळख ( छायाचित्र किंवा लेखी स्वरुपात) उघड न करता, शास्त्रीय संशोधन, वैद्यकीय शिक्षण, वैद्यकीय नोंदी, शास्त्रीय मासिकांमध्ये प्रकाशन या कारणांसाठी व या शस्त्रक्रियेचा अभ्यास करणे, छायाचित्र घेणे, व्हिडिओ रेकॉर्डिंग करणे याला मी संमती देतो/देते.<p>

</p> तसेच, या शस्त्रक्रियेची किंवा परत कराव्या लागणाऱ्या शस्त्रक्रियेची माहिती, छायाचित्र किंवा व्हिडिओ रेकॉर्डिंग, है सर्व वैद्यकीय ज्ञानाच्या वृद्धीसाठी प्रकाशित करण्यासाठी मी संमती देतो/देते.
मी हे संमतीपत्र वाचले आहे मला ते वाचून दाखविले आहे, मला ते समजले आहे आणि माझ्या सर्व प्रश्नांची मला उत्तरे मिळालेली आहेत आणि मी माझे नेत्रतज्ज्ञ ----------------------- यांना माझ्या उजव्या डाव्या डोळ्यावर ------------------------- शस्त्रक्रिया करण्यासाठी संमती देतो/ देते. शस्त्रक्रियेसाठीच्या या वैध संमतीपत्रावर मी स्वेच्छेने सही करत आहे. <p>


	<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<div class="container">
  <?php require("../../admin/middleConsentPatientRelativeDetail.php")?>
</div>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	