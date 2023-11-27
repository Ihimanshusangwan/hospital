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
    <title> Laser Iridotomy     </title>
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
<?php if($inp_arr[1]=='option1'){
            include_once("../../header/images.php");

        } 
       
        ?>
</body>
  
</html>
<h1 align="center" class="style33 style40"><strong> Laser Iridotomy     </strong></h1>
<h1 align="center" class="style33"><strong> ( लेझर आयरिडॉटॉमी ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>

<p align="center" class="style9 style23 style27"><span class="style33">-------------------------- प्रस्तावना --------------------------</span> </p>

</p> लेझर आयरिडॉटॉमी ही प्रक्रिया / शस्त्रक्रिया आहे जी अरुंद कोनामुळे होणाऱ्या काचबिंदूच्या (Angle Closure Glaucoma) रुग्णांच्या परितारिका (Iris) म्हणजेच डोळ्याच्या रंगीत पडद्यामध्ये छिद्र केले जाते, ज्यामुळे डोळ्यातील द्रवपदार्थाचा (Aqueous humor) मागील पोकळीतून ( Posterior Chamber) पुढील पोकळीत (Anterior Chamber) मुक्त प्रवाह होण्यास मदत होते, ज्यामुळे डोळ्यातील दाब नियंत्रित राहतो. तसेच परितारिका (Iris) व बुबुळ ( Cornea) एकमेकांना चिकटण्याची (peripheral anterior synaechia) शक्यता कमी होते व काचबिंदूमुळे होणारे दुष्परिणाम नियंत्रित राहू शकतात.
या प्रक्रियेशी संबंधित जोखिमांमध्ये दृष्टीची तात्पुरती अस्पष्टता, लेझर प्रक्रियेनंतर डोळ्यातील दाब वाढणे, डोळ्याच्या पुढील पोकळीत दाह/सूज, डोळ्यातील बाहुली मध्ये विकृती, बुबळाच्या पेशींची कमतरता आणि दाह, रक्तस्त्राव / डोळ्याच्या पोकळीमधे रक्त साकळणे, मोतीबिंदू, तिरळेपणा, लेझर प्रक्रियेने परितारिकेला केलेले छिद्र उशीरा बंद होणे, दृष्टीपटलावर (Retina) / पीतबिंदू (macula) इजा / दाह (burns), डोळ्यातील दाब अतिप्रमाणात असल्याने होणारा काचबिंदू, डोळ्याच्या पोकळीमधे पू (Pus) जमा होणे, दृष्टीपटलावर सूज येणे (Cystoid Macular Oedema) आणि डोळ्याच्या बाहुलीवर पापुद्रा / पडदा येणे. या गुंतागुंतींसाठी अतिरिक्त वैद्यकीय उपचार किंवा शस्त्रक्रिया करणे आवश्यक आहे.
ही प्रक्रिया पूर्ण करण्यासाठी एकापेक्षा जास्त टप्प्यांत करण्याची आवश्यकता भासू शकते. काही व्यक्तींमध्ये या प्रक्रियेला फक्त अंशतः गुण येतो किंवा अजिबात गुण येत नाही आणि काचबिंदूची वाढ रोखण्यासाठी अतिरिक्त औषधोपचार / शस्त्रक्रिया करण्याची आवश्यकता भासू शकते.
हया प्रक्रियेच्या औषधांसहित काचबिंदूची विशिष्ट औषधे चालू/बदल करावी लागू शकतात. मला, ................ (नाव) माझ्या उजव्या / डाव्या डोळ्यातील परिस्थिती मला समजेल अशा भाषेत समजवण्यात आली आहे आणि त्यासाठी मला उजव्या / डाव्या डोळ्याला लेझर आयरीडॉटॉमी करावी लागेल हे मला माहित आहे. मला समाधानकारकरित्या कार्यपद्धती, विकल्प आणि त्यांचे धोके आणि फायदे यांचे तपशील स्पष्ट केले आहेत. उजव्या / डाव्या डोळ्याच्या लेझर आयरिडॉटॉमीसाठी मी माझी संपूर्ण, स्वतंत्र आणि ऐच्छिक संमती देत आहे.
<p>


<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>


</p> सदर शस्त्रक्रियेचे फायदे, तोटे, जोखिमा संभाव्य गुंतागुंती आणि पर्यायी उपचार मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे. ज्याकरिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो / देते. मला शस्त्रक्रियेच्या / उपचाराच्या सगळ्या गुंतागुंतीची (कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, तरी माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे नमूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.<p>

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
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	