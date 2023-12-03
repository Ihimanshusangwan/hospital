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
    <title>    Osteo-odonto Keratoprosthesis (OOKP)   </title>
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
<h1 align="center" class="style33 style40"><strong>  Osteo-odonto Keratoprosthesis (OOKP)        </strong></h1>
<h1 align="center" class="style33"><strong> ( ऑस्टिओ-ओडोन्टो केरेंटोप्रोस्थेसिस ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------ रुग्णाचे संमतीपत्र ------</span> </p>

</p> मला माझ्या मातृभाषेत समजावून सांगण्यात आले आहे की माझ्या डोळ्यांमध्ये विशिष्ट प्रकारे तयार केलेले केरॅटोप्रोस्थेसिस बसवण्यात येणार आहे. हे प्रोस्थेसिस कृत्रिम बुबुळामध्ये खास तयार केलेल्या जैविक चौकटीत (Biological frame) बसविण्यात येईल. ही चौकट (फ्रेम) माझ्या स्वतःच्या सुळ्या (दात) पासून बनविण्यात येईल. ही सोय माझ्या डोळ्याची दृष्टी दीर्घकाळ टिकून रहावी यासाठी करण्यात आलेली आहे. त्याचप्रमाणे ही शस्त्रक्रिया हा माझ्या डोळ्यावरील शेवटचा उपाय म्हणून करण्यात येत आहे ह्याची मला पूर्ण कल्पना आहे. माझ्या डोळ्यांमध्ये खूप कोरडेपणा असल्यामुळे नेत्ररोपणाची शस्त्रक्रिया होऊ शकत नाही याची मला पूर्ण कल्पना आहे.<p>

</p> हे केटोप्रोस्थेसिस माझे अपारदर्शक व पांढरे झालेले बुबुळ बदलून दुर्बिणीप्रमाणे काम करेल त्यामुळे शस्त्रक्रियेनंतर प्रकाशकिरण माझ्या दृष्टिपटलावर (रेटिना) पडून मला दिसण्याची शक्यता आहे. <p>

</p> मला याची पूर्ण जाणीव आहे की या शस्त्रक्रियेमध्ये माझा निरोगी दात ( सुळा ) काढून तो शरीरामध्ये ठेवण्यात येईल. माझ्या तोंडातील आतील आवरण ( गालाच्या बाजूचे) काढून ते डोळ्याला वरून घातले / बसविले / पांघरले जाईल ही शस्त्रक्रिया दोन टप्प्यात केली जाईल. दोन शस्त्रक्रियांमध्ये दोन महिन्यांचा कालावधी असेल. मला याची पूर्ण कल्पना देण्यात आली आहे की पहिल्या शस्त्रक्रियेनंतर दृष्टी पूर्ववत होण्यास बराच कालावधी लागेल.<p>

</p> मला या शस्त्रक्रियेमधील सर्व संभाव्य फायदे तोटे व धोक्याची संपूर्ण कल्पना देण्यात आली आहे. मला हयाची पूर्ण जाणीव आहे की हया शस्त्रक्रियेनंतर माझ्या दृष्टीमध्ये कदाचित काहीही फरक पडणार नाही.<>

</p>  मला याची पूर्ण जाणीव देण्यात आली आहे की हे प्रोस्थेसिस कदाचित बाहेर फेकले जाईल (extrusion), जंतुसंसर्ग होईल किंवा डोळ्याचा दाब वाढेल. मला ह्याची संपूर्ण कल्पना देण्यात आली आहे की माझ्या डोळ्यावर काही कालावधीनंतर पुन्हा शस्त्रक्रिया करावी लागू शकेल .OOKP वर जर पडदा आला किंवा आवरण आले तर ते काढून टाकावे लागेल. <p>

</p> मी असे लिहून देतो / देते की मला हे संमतीपत्र समजले आहे व मान्य आहे. मी माझ्या डॉक्टरांना माझ्या / माझ्या पाल्याच्या उजव्या / डाव्या डोळ्याची OOKP शस्त्रक्रिया करण्याची संमती देत आहे.<p>


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


	