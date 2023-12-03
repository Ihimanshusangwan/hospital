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
    <title> Fundus Fluorescein Angiography/FA Scopy/ Indocyanine Green Angiography </title>
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
<h1 align="center" class="style33 style40"><strong> Fundus Fluorescein Angiography/FA Scopy/ Indocyanine Green Angiography </strong></h1>
<h1 align="center" class="style33"><strong> (फन्डस फ्ल्युरेसीन अँजिओग्राफी / एफ ए स्कोपी / इंडोसायनिन ग्रीन अँजिओग्राफी) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

</p> <strong>   </strong> <p>
</p><strong> </strong><p>

<p align="center" class="style9 style23 style27"><span class="style33">------------------ उपचारपद्धती -----------------------</span> </p>

</p> फ्ल्युरेसीन किंवा इंडोसायनीन ग्रीन नावाचे एक रंगीत औषध हाताच्या शिरेमध्ये (Vein) इंजेक्शनद्वारे दिले जाते. त्यानंतर रेटिना आणि कोरॉईड म्हणजेच दृष्टिपटलावरील सर्व रक्तवाहिन्यांतील प्रवाहाची छायाचित्रे घेतली जातात. काही वेळा डोळ्याच्या आतील भागाची तपासणी इंडिरेक्ट ऑफ्याल्मोस्कोपला फिल्टर लावून केली जाते. या तपासणीदरम्यान तुमच्या सोबत कोणी जबाबदार व्यक्ती असणे गरजेचे आहे.<p>

</p> या तपासणीद्वारे अचूक निदान करुन सर्वात उत्तम उपचाराचे नियोजन करता येते. तसेच ट्रिटमेंटचा परिणाम देखील तपासता येतो. हाताचे इंजेक्शन किंवा कॅमेराने फोटो घेताना काही त्रास होत नाही. फ्ल्युरेसीन किंवा इंडोसायनीन ग्रीन हे एक सुरक्षित औषध आहे. तरीही त्याचे थोडेफार दुष्परिणाम होऊ शकतात.<p>


<p align="center" class="style9 style23 style27"><span class="style33">--------------------------- साईड इफेक्टस् - दुष्परिणाम ---------------------------- ---</span> </p>

</p><strong> 1)5 टक्के रुग्णांमध्ये मळमळणे व उलटी होणे हा त्रास फारच थोडा वेळ असू शकतो- लांब श्वास घेतल्याने तसेच तपासणीच्या तीन तास आधीपर्यंत काही न खाल्ल्यास हा त्रास कमी होऊ शकतो.</strong><p>

</p> <strong> 2) फ्ल्युरेसीन डाय हातावर (इंजेक्शनच्या जागी) आजूबाजूला पसरून काही भागचे नेक्रोसिस (Necrosis) होऊ शकते. </strong><p>

</p> <strong> 3) अनावधानाने इंजेक्शन रक्तवाहिनी (आर्टरी) मध्ये जाणे.</strong><p>

</p> <strong> 4) फिटस् /आकडी/ झटके येणे.</strong><p>

</p> <strong> 5) अॅलर्जी त्वचेवर पुरळ येणे व खाज सुटणे.</strong><p>

</p> <strong> 6) चक्कर येणे व बेशुद्ध पडणे. हाताच्या शीरेवर सूज येणे.ताप येणे.</strong><p>
</p> <strong> फ्ल्युरेसीन डाय मुळे त्वचा व लघवी दोन दिवसापर्यंत पिवळी राहू शकते पण त्याचा काहीही दुष्परिणाम हो नाही.</strong><p>



</p> <p align="center" class="style9 style23 style27"><span class="style33">------------------------------- रुग्णाचे संमतीपत्र  ---------------------------- ------</span> </p>

</p> फन्डस फ्ल्युरेसीन अँजिओग्राफी / एफ एस्कोपी / इंडोसायनिन ग्रीन अँजिओग्राफी या चाचण्यांची आवश्यकता, दुष्परिणाम आणि उपचारपद्धती मला समजली आहे व मी त्याकरिता संमती देत आहे. मी इथे तो / करते की माझ्या नेत्रतज्ज्ञांनी माझ्या डोळयाचा आजार व त्यावरील उपचारपद्धतींची विस्तृत चर्चा माझ्याशी केली आहे.<p>


</p> सदर शस्त्रक्रियेचे फायदे, तोटे, जोखिमा, संभाव्य गुंतागुंती आणि पर्यायी उपचार, मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे, ज्या करिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो/ देते. मला शस्त्रक्रियेच्या / उपचाराच्या सगळ्या गुंतागुंतींची ( कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, तरी माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे मूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.<p>

</p> तसेच, माझी ओळख ( छायाचित्र किंवा लेखी स्वरुपात ) उघड न करता, शास्त्रीय संशोधन, वैद्यकीय शिक्षण, वैद्यकीय नोंदी, शास्त्रीय मासिकांमध्ये प्रकाशन या कारणांसाठी व या शस्त्रक्रियेचा अभ्यास करणे, छायाचित्र घेणे, व्हिडिओ रेकॉर्डिंग करणे याला मी संमती देतो / देते.<p>



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


	