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
    <title> Diode Laser Cyclo-Photocoagulation(DLCP)     </title>
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
<h1 align="center" class="style33 style40"><strong> Diode Laser Cyclo-Photocoagulation(DLCP)    </strong></h1>
<h1 align="center" class="style33"><strong> ( डायोड लेझर सायक्लो फोटोकोॲग्युलेशन ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>

<p align="center" class="style9 style23 style27"><span class="style33">-------------------------- प्रस्तावना --------------------------</span> </p>

</p> DLCP ही डोळ्याची शस्त्रक्रिया आहे जी सर्वसाधारणपणे वारंवार वाढत जाणाऱ्या व कायम उच्च, अनियंत्रित डोळ्याचा दाब असणाऱ्या काचबिंदू रुग्णांमध्ये केली जाते, ज्यांना औषधे आणि विविध काचबिंदू उपचार किंवा शस्त्रक्रिया आणि काचबिंदू निचरा साधनांचा (Glaucoma drainage surgery or devices) वापर करूनही डोळ्यातील दाब (Intraocular Pressure) अनियंत्रित राहतो. ही शस्त्रक्रिया डोळ्यातील दाब कमी करण्यासाठी आणि डोळ्यातील उच्च दाबामुळे होणाऱ्या वेदना कमी करण्यात बहुधा प्रभावी ठरते. ही शस्त्रक्रिया सहसा डोळ्याला इंजेक्शनने भूल (Peribulbar Anaesthesia) देऊन केली जाते आणि डोळ्यातील दाब नियंत्रित करण्यासाठी ही शस्त्रक्रिया एकापेक्षा जास्त टप्प्यांत करण्याची आवश्यकता भासू शकते. <p>

<p align="center" class="style9 style23 style27"><span class="style33">-------------------------- शस्त्रक्रियेनंतर घ्यायची काळजी --------------------------</span> </p>

</p> डोळा लाल होणे, सुज येणे आणि डोळा वेदनादायी असणे ज्यासाठी गोळ्या-औषधे आणि डोळ्यात घालावयाचे थेंब असे औषधोपचार वेदना कमी करण्यासाठी दिले जातात. रुग्णांची तपासणी शस्त्रक्रियेच्या दुसऱ्या दिवशी, सातव्या दिवशी आणि त्यानंतर दर दोन किंवा चार आठवड्यांनंतर केली जाते. <p>

</p> रुग्णांची लक्षणे आणि डोळ्यातील दाबाचे मूल्यांकन केल्यावर उपचार करणाऱ्या नेत्रतज्ञांकडून पुन्हा फेरशस्त्रक्रियेची आवश्यकता ठरविली जाते.<p>

</p> <strong> नेहमी आढळून येणारे दुष्परिणाम : </strong> <p>

</p> 1) डोळा दुखणे. <p>

</p> २) डोळा लाल होणे.<p>

</p> 3) डोळ्याला व डोळ्याभोवती सूज येणे.<p>

</p> 4) पुन्हा शस्त्रक्रिया करण्याची गरज भासणे.<p>

</p> 5) शस्त्रक्रियेमुळे डोळ्यातील दाब कमी करणाऱ्या औषधांची गरज कमी करता येऊ शकते परंतु त्यापैकी काही औषधे डोळ्यातील दाब नियंत्रीत ठेवण्यासाठी आवश्यक असू शकतात. <p>

</p> 6) क्वचितच डोळा लहान आणि विकृत होऊ शकतो म्हणजेच डोळा शुष्क / आतून कोरडा होतो (Atrophic bulbi).<p>

</p> 7) काही प्रकरणांमध्ये बुबुळ / नेत्रपटल धुरकट किंवा पांढरे होऊ शकते. <p>

</p> 8) क्वचितच ज्या डोळ्यावर शस्त्रक्रिया केलेली नाही त्या चांगल्या डोळ्याला आतून तीव्र सूज येण्याची शक्यता असते. (Sympathetic Ophthalmia).<p>

</p> 9) अंधत्व येणे.<p>

</p> <strong> रुग्णाला हे समजणे फार महत्वाचे आहे की ही शस्त्रक्रिया सध्या असलेली दृष्टी सुधारण्यासाठी केली गेलेली नाही, हे रुग्णाला समजवण्यात आलेले आहे. </strong><p>

</p> मला वरील शस्त्रक्रियेच्या सर्व मुद्द्यांची माहिती करुन दिली गेली आहे आणि शस्त्रक्रियेच्या संभाव्य फायद्यांविषयी आणि संभाव्य दुष्परिणामांबद्दल मला समजावून सांगण्यात आले आहे आणि सर्व मुद्द्यांबाबत संपूर्णपणे जाणून घेऊन मी हया शस्त्रक्रियेस (DLCP) संमती देत आहे.<p>


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
<h2></h2>	
    <div class="container">
  <?php require("../../admin/middleConsentPatientRelativeDetail.php")?>
</div>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>

</body>
</html>


	