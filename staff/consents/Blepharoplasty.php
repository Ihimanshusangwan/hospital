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
    <title> Blepharoplasty      </title>
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
<h1 align="center" class="style33 style40"><strong> Blepharoplasty     </strong></h1>
<h1 align="center" class="style33"><strong> ( ब्लेफरोप्लास्टी ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>


</p> मला माझ्या मातृभाषेत, डोळ्याच्या पापणीच्या (उजव्या डाव्या ) आजाराबद्दल आणि संभाव्य पर्यायी उपचाराबद्दल सांगितले आहे. सर्व पर्यायी उपचारांमध्ये ही शस्त्रक्रिया सर्वात योग्य आहे. माझ्याशी चर्चा केली गेली आहे की माझ्या (उजव्या / डाव्या) पापणीची शस्त्रक्रिया निर्जंतुक पद्धतीने स्थानिक / संपूर्ण भूल देऊन केली जाईल.<p>

</p> वरच्या आणि / किंवा खालच्या पापण्यांची त्वचा, स्नायू आणि चरबी काढून किंवा ठेवून ही शस्त्रक्रिया केली जाईल. वरच्या पापणीच्या शस्त्रक्रियेसाठी छेद असा घेतला जाईल की जो पापणीच्या नैसर्गिक सुरकुत्यामध्ये लपवला जाईल. डोळ्याच्या खालच्या पापणीसाठी, छेद त्वचेच्या थोडा खाली किंवा डोळ्याच्या आतील पृष्ठभागावर ( Conjunctiva ) घेतला जाईल. <p>

</p> या शस्त्रक्रियेच्या जोखिमांबद्दल देखील चर्चा केली गेली आहे. यामध्ये भूलीसंबंधित गुंतागुंती असतात, रक्तस्त्राव, जंतुसंसर्ग, शस्त्रक्रियेच्या जागेवर गाठ (Granuloma) येणे, पापणीचा आजार पुन्हा उध्दभवणे / उर्वरित पापणीचा आजार, डोळ्याच्या पापणीचे विकृतीकरण [ पापणी आत वळणे (एन्ट्रोपिऑन ) /पापणी बाहेर वळणे (एक्ट्रॉपिऑन) / पापणीला खाच पडणे (नॉचिंग) इत्यादी), व्रण तयार होणे, व्रण मोठा होणे (scar hypertrophy) / केलॉईड (Keloid), डोळा पूर्णपणे बंद करण्यास असमर्थता येऊ शकते, डोळ्याचा पृष्ठभाग उघड झाल्यामुळे कोरडेपणा येऊ शकतो, खालची पापणी आत जाणे, वरची पापणी खाली येणे, डोळ्यांच्या पापणीची अनियमित ( Eyelid crease) विकृती, अपेक्षेपेक्षा जास्त किंवा कमी परिणाम (Overcorrection or Undercorrection), कैंथसच्या स्थितीत बदल होणे आणि दुहेरी दृष्टी येऊ शकते.<p>

</p> मी याद्वारे हे नमूद करू इच्छितो की या शस्त्रक्रियेचे सर्व संभाव्य परिणाम मला समजले आहेत आणि उपचार करणाऱ्या नेत्रतज्ज्ञांनी दिलेल्या स्पष्टीकरणावर मी समाधानी आहे. रुग्णालय / रुग्णालयातील कर्मचारी / उपचार करणारे डॉक्टर आणि त्यांचे सहाय्यक उपचाराशी संबंधित कोणत्याही नुकसानीसाठी जबाबदार असणार नाहीत. अशा दुर्दैवी दुर्घटनांमध्ये मी कोणत्याही परतावा / भरपाईसाठी दावा करणार नाही. अशा सर्व परिस्थितीमध्ये रुग्णालय प्रशासनाचा निर्णय अंतिम असेल. मी कबूल करतो की मी निकोप मनाने या संमतीपत्रावर स्वाक्षरी करून संमती देत आहे.<p>

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
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>

</body>
</html>


	