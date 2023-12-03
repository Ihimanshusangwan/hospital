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
    <title>    Simple/Cultured Limbal Epithelial Transplant Surgery (SLET /CLET)    </title>
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
   <a class="btn btn-primary noprint" href="../eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <button class='btn btn-success noprint' onclick="window.print();">Print</button>

     <h2><h2>
     <?php if($inp_arr[1]=='option1'){
            include_once("../header/images.php");

        } 
       
        ?>
</body>
  
</html>
<h1 align="center" class="style33 style40"><strong>  Simple/Cultured Limbal Epithelial Transplant Surgery (SLET /CLET)    </strong></h1>
<h1 align="center" class="style33"><strong> ( लिम्बल एपीथेलीअल प्रत्यारोपण शस्त्रक्रिया  ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------ रुग्णाचे संमतीपत्र ------</span> </p>

</p> मला माझ्या मातृभाषेत समजेल असे सांगण्यात आले आहे की माझ्या उजव्या / डाव्या डोळ्याच्या पृष्ठभागावर बाह्यभागावर (Ocular Surface) लिम्बल पेशींची कमतरता आहे. ह्या शस्त्रक्रियेमध्ये माझ्या निरोगी डोळ्यातील लिम्बल पेशी, माझ्या आजारी डोळ्यावर बसविल्या जातील. या पेशी कदाचित थेट ( directly) किंवा प्रयोगशाळेत कल्चर करून (culturing into mono layer) प्रत्यारोपण करण्यात येतील. <p>

</p> <strong>खालील गोष्टींची मला संपूर्ण कल्पना देण्यात आली आहे.</strong><p>

</p> 1. ही शस्त्रक्रिया फक्त डोळ्याचा पृष्ठभाग / बाह्यभाग (ocular surface) निरोगी करण्यासाठी असून त्यामुळे दृष्टीत काहीही फरक पडणार नाही.<p>

</p> 2. माझ्या दुसऱ्या निरोगी डोळ्यामधून छोटा लिम्बल पेशींचा तुकडा काढून तो आजारी डोळ्यात वापरला जाईल. <p>
</p> 3. SLET या शस्त्रक्रियेमध्ये पेशींचा तुकडा माझ्या डोळ्यावर, पृष्ठभाग / बाह्यभाग दुरुस्त करून (smoothening surface) औषधी पदार्थाच्या (tissue glue) सहाय्याने चिकटविण्यात येईल. त्यासाठी अर्भकाच्या नाळेचे आवरण अॅम्निओटिक ब्रेन (Amniotic membrane) वापरण्यात येईल. <p>
</p>4. CLET या शस्त्रक्रियेमध्ये पेशींचे तुकडे संपूर्ण निर्जंतूक वातावरणात प्रयोगशाळेत वाढवून ( GMP facility) डोळ्याचा पृष्ठभाग दुरुस्त करून अर्भकाच्या नाळेचे आवरण उपयोगात आणून वापरले जातील.<p>
</p> 5. अर्भकाच्या नाळेचे आवरण डोळ्यावर टाके घालून किंवा चिकटवून बसविले जाईल त्यामुळे डोळ्यात चुरचुरणे व अस्वस्थता जाणवू शकेल. <p>
</p> 6. डोळ्यावर बॅण्डेज कॉन्टॅक्ट लेन्स (bandage contact lens) बसविली जाईल.<p>
</p> 7. शस्त्रक्रियेनंतर काही दिवस डोळा चुरचुरणे, पाणी येणे व लाल होण्याची शक्यता असते.<p>
</p> 8. आजार पुन्हा उदभवणे व त्यामुळे शस्त्रक्रिया परत करावी लागण्याची शक्यता असू शकते.<p>
</p> 9. जंतुसंसर्गाचा धोका असतो. <p>
</p> 10. शस्त्रक्रियेसाठी डोळा बधिर करावा लागतो. <p>

</p> शस्त्रक्रियेतील सर्व धोके व गुंतागुंती येथे नमूद करणे शक्य नसल्यामुळे इतर सर्व धोक्यांची मला पूर्ण कल्पना माझ्या नेत्रतज्ज्ञांनी दिलेली आहे.<p>
</p> मला डॉक्टरांनी या शस्त्रक्रियेची संपूर्ण माहिती, त्यातील धोके, गुंतागुंती तसेच इतर उपचारपद्धतींविषयी कल्पना दिलेली असून हे सर्व मला संपूर्णपणे समजले आहे. <p>
</p> मी माझ्या / माझ्या पाल्याच्या उजव्या डाव्या दोन्ही डोळ्यात SLET / CLET ही शस्त्रक्रिया करून घेण्यास संमती देत आहे.<p>

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


	