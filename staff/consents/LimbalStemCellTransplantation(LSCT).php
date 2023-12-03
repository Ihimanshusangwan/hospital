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
    <title>    Limbal Stem Cell Transplantation (LSCT)  </title>
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
<h1 align="center" class="style33 style40"><strong>  Limbal Stem Cell Transplantation (LSCT)        </strong></h1>
<h1 align="center" class="style33"><strong> ( लिंबल स्टेम सेल प्रत्यारोपण ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------ रुग्णाचे संमतीपत्र ------</span> </p>

</p> मला माझ्या मातृभाषेत सांगण्यात आले आहे की मला / माझ्या पाल्याला उजव्या / डाव्या डोळ्याच्या बाहेरील आवरणाचा आजार आहे, ज्यामुळे पांढऱ्या भागाच्या वरचा पापुद्रा ज्याला वैद्यकीय भाषेत कंजंक्टायव्हा म्हणतात, बुबुळावर सर्व बाजूनी वाढला आहे ( आजाराचे नाव. ........) व त्यामुळे
दृष्टीला धोका आहे. डोळ्याच्या बाहेरील आवरणाचा हा दोष दूर करण्यासाठी शस्त्रक्रियेद्वारे अनैसर्गिक वाढलेला पापुद्रा, त्याच्या सखोलतेप्रमाणे काढावा लागेल. ह्याच बरोबर हा पापुद्रा परत वाढू नये या करिता, दुसऱ्या चांगल्या डोळ्याच्या किंवा मृत व्यक्तीने नेत्रदान केलेल्या डोळ्याच्या किंवा जवळील नातेवाईकाच्या डोळ्यातील बुबुळाच्या बाहेरील परिघाच्या पेशींचा छोटा तुकडा (लिंबल स्टेम सेल) काढून, प्रत्यारोपण केले जाईल (Limbal Stem Cell Transplantation). प्रत्यारोपण करण्यासाठी गरज असल्यास, पेशींना योग्य पध्दतीने वाढविण्यासाठी, टिश्यू कल्चर पध्दतीचा अवलंब करावा लागू शकतो. प्रत्यारोपणाचा तुकडा टाक्यांनी किंवा जैविक डिंकासारख्या औषधाने (फिब्रीन ग्लू) बसविला जाईल. तसेच ह्या शस्त्रक्रियेमध्ये अॅम्निओटिक मेंब्रेन, म्हणजे अर्भकाच्या नाळेचे वरचे आवरण डोळ्याच्या बाहेरील भागावर बसविण्याची गरज लागू शकते. मला सांगण्यात आले आहे की हा आजार कायम स्वरूपी राहू शकतो व या शस्त्रक्रियेद्वारे फक्त डोळ्याच्या बाहेरील आवरणाचा दोष बरा करण्याचा प्रयत्न केला जाईल.
.<p>

</p> <strong> शस्त्रक्रियेतील व नंतरची संभाव्य गुंतागुंती : </strong><p>


</p> मला सांगण्यात आले आहे की हया शस्त्रक्रियेदरम्यान बुबुळ फाटण्याची किंवा बुबुळाला छिद्र पडण्याची शक्यता आहे, ज्याकरिता पूर्ण बुबुळ प्रत्यारोपण करण्याची गरज लागू शकते. तसेच या शस्त्रक्रियेनंतर जंतुसंसर्ग होणे, प्रत्यारोपण केलेला भाग शरीराने नाकारणे, म्हणजेच ग्राफ्ट रिजेक्शन, टाके सैल होणे किंवा तुटणे, नव्या रक्तवाहिन्या तयार होऊन त्यामुळे रक्तस्त्राव होणे व दृष्टीत सुधारणा न होणे किंवा ती कमी होण्याची शक्यता आहे. बुबुळावरचा डाग / दोष शस्त्रक्रियेनंतर देखील वाढण्याची शक्यता आहे. तसेच मला सांगण्यात आले आहे की डोळ्याला काही अचानक त्रास झाल्यास, जसे अचानक डोळा लाल होणे, उजेड सहन न होणे, डोळा दुखणे किंवा दृष्टी अधू होणे, हया परिस्थितीत माझ्या डॉक्टरांना लगेच दाखविणे गरजेचे आहे, कारण ही संसर्गाची लक्षणे असू शकतात. मला हे देखील सांगितले आहे की सर्व उपचारानंतर देखील दृष्टी कमी होऊ शकते व डोळ्याचा विदुपपणा तसाच राहू शकतो. <p>
> मी हे नमुद करतो / करते की मला या संमतीपत्राचा अर्थ नीट समजलेला आहे व मी माझ्या डॉक्टरांना माझ्या / माझ्या पाल्याच्या उजव्या / डाव्या डोळ्याची अॅम्निओटिक मैब्रेन प्रत्यारोपणाची शस्त्रक्रिया करण्यास संमती देत आहे.<p>

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
  <?php require("../../admin/middleConsentPatientRelativeDetail.php")?>
</div>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	