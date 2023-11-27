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
    <title>Therapeutic Deep Anterior Lamellar Keratoplasty </title>
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
<h1 align="center" class="style33 style40"><strong> Therapeutic Deep Anterior Lamellar Keratoplasty (Th. DALK)   </strong></h1>
<h1 align="center" class="style33"><strong> ( थेराप्युटिक डीप अँटिरियर लॅमेलर केरॅटोप्लास्टी ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------उपचारपद्धती------</span> </p>

</p> ज्या रुग्णांस डोळ्याच्या बुबुळाला (पारपटल) (cornea) जंतुसंसर्ग झाला आहे व तो पसरल्यामुळे बुबुळाला छिद्र पडण्याची शक्यता निर्माण झाली आहे अथवा छिद्र पडले आहे अथवा योग्य तेवढे जास्तीत जास्त औषधोपचार करून सुद्धा जंतुसंसर्ग बरा होत नसल्यास अथवा संसर्ग बुबुळाच्या आत खोलवर पसरलाय, त्या रुग्णा थेराप्युटिक DALK /थेराप्युटिक कैरॅटोप्लास्टी शस्त्रक्रिया केली जाते . Th. DALK, यामध्ये बुबुळाचा पुढचा भाग, मध्य व खोलवरचा भाग (एपिथिलियम, बेसमेंट मेम्ब्रेन स्ट्रोमा, डेसेमेट मेंब्रेन पर्यंत) काढला जातो. त्याठिकाणी नेत्रदानातून मिळालेल्या बुबुळाचा भाग टाक्यांच्या सहाय्याने बसवला जातो. या शस्त्रक्रियेदरम्यान स्वतःच्या बुबुळाला छिद्र पडण्याचा संभाव्य धोका आहे व तसे झाल्यास पूर्ण बुबुळ बदलावे लागेल (फुल थिकनेस कॉर्नियल ट्रान्सप्लांट)<p>

</p> Th.DALK करायचे किंवा पूर्ण नेत्रपटलरोपण (full thickness therapeutic corneal transplant) करायचे, याचा निर्णय नेत्रतज्ज्ञ शस्त्रक्रिया करताना घेतात. ही शस्त्रक्रिया रुग्णाला पूर्ण भूल देऊन केली जाते किंवा फक्त डोळ्याला भूल देऊन केली जाऊ शकते व याचा निर्णय रुग्णाच्या डोळ्याची परिस्थिती व रुग्णाची एकूण तब्येत विचारात घेऊन, घेतला जातो. <p>

<p align="center" class="style9 style23 style27"><span class="style33">------शस्त्रक्रियेनंतर घेण्याची काळजी------</span> </p>

</p> शस्त्रक्रिया झाल्यानंतर डोळा लाल असणे, डोळ्याला सूज असणे, किंवा डोळा दुखणे या तक्रारींच्या निवारणासाठी  औषधे व डोळ्यात घालण्याचे औषध (थेंब) दिले जातील. फेरतपासणीसाठी शस्त्रक्रियेनंतरच्या पहिल्या दिवशी, तिसऱ्या दिवशी सातव्या दिवशी आणि त्यानंतर दर पंधरा दिवसांनी येणे आवश्यक आहे. रुग्णानी हे लक्षात घेतले पाहिजे की ही शस्त्रक्रिया मुख्यतः डोळा वाचवण्यासाठी व डोळ्याच्या आत जंतुसंसर्ग पसरण्यापासून रोखण्यासाठी (कारण तसे न केल्यास ते डोळ्यासाठी अत्यंत धोकादायक असू शकते) केली गेली आहे. दृष्टीसुधार हा या शस्त्रक्रियेचा दुय्यम उद्देश आहे. दृष्टी सुधारण्यासाठी जंतुसंसर्ग आटोक्यात आल्यावर अतिरिक्त उपचार, जसे की पुन्हा ही शस्त्रक्रिया करावी लागू शकते (रिपीट करॅटोप्लास्टी) <p>

<p align="center" class="style9 style23 style27"><span class="style33">------शस्त्रक्रियेनंतरचा कालावधी आणि संभाव्य गुंतागुंती------</span> </p>

</p> 1. शस्त्रक्रियेदरम्यान केलेला छेद नीट भरून न येणे (पर्सिस्टंट एपिथीलियल डिफेक्ट )<p>
</p> 2. काचबिंदू (सेकंडरी ग्लॉकोमा) <p>
</p> 3. बसवलेला बुबुळाचा भाग ( डोनर कॉर्निया) पांढरा पडणे किंवा रुग्णाच्या शरीराकडून त्याचा स्वीकार न होणे (ग्राफ्ट रिजेक्शन)<p>
</p> 4. घेतलेले टाके सैल पडणे, तुटणे किंवा टाक्याभोवती जंतुसंसर्ग होणे <p>
</p> 5. शस्त्रक्रियेपूर्वीचे जंतुसंसर्ग परत होणे<p>
</p> 6. डोळ्याच्या आतील भागांमध्ये जंतुसंसर्ग पसरणे किंवा डोळ्याचा आकार आक्रसून जाणे (या शक्यता दुर्मिळ असतात)<p>
</p> रुग्णानी हे समजून घेणे महत्त्वाचे आहे की या शस्त्रक्रियेच्या सफलतेसाठी बऱ्याच काळासाठी डोळ्यातील औषधांचा थेंब (अँटीबायोटीक अँटी फंगल, अँटी इन्फ्लामेट्री लुब्रिकंट इत्यादी) घालणे अतिशय आवश्यक आहे. नेत्रतज्ज्ञांनी सुचवलेल्या फेरतपासण्या अचूक पाळणे अत्यंत गरजेचे आहे. या शस्त्रक्रियेच्या सफलतेसाठी रुग्णाचाही सहभाग व सहकार्य अत्यंत महत्त्वाचे आहे.<p>

<p align="center" class="style9 style23 style27"><span class="style33">------रुग्णाचे संमतीपत्र------</span> </p>

</p>सदर शस्त्रक्रियेचे फायदे तोटे, जोखिमा संभाव्य गुंतागुंती आणि पर्यायी उपचार मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे. ज्याकरिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो / देते. मला शस्त्रक्रियेच्या / उपचाराच्या सगळ्या गुंतागुंतींची ( कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, तरी माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे नमूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.<p>

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


	