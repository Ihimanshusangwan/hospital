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
    <title> Selective Laser Trabeculoplasty     </title>
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
<h1 align="center" class="style33 style40"><strong> Selective Laser Trabeculoplasty     </strong></h1>
<h1 align="center" class="style33"><strong> ( सिलेक्टीव्ह लेझर ट्रॅबेक्युलोप्लास्टी ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>

</p>  काचबिंदू (ओपन अँगल ग्लॉकोमा) असलेल्या लोकांसाठी ही एक लेझर शस्त्रक्रिया आहे. अशा लेझर शस्त्रक्रियेमुळे डोळ्यातील द्रव निचरा करणाऱ्या नलिका उघडल्या जातात आणि डोळ्यातील द्रवरूप (Aqueous humour) प्रवाह सुधारित करतात. काही व्यक्ती / रुग्ण हया शस्त्रक्रियेस चांगला प्रतिसाद देतात आणि काही रुग्ण या शस्त्रक्रियेस अनुकूल प्रतिसाद देत नाहीत. आपल्याला असलेला काचबिंदूचा प्रकार आणि आपल्या डोळ्याची मूलभूत रचना, हया शस्त्रक्रियेसाठी आपला प्रतिसाद निश्चित करते. लेझरचा प्रतिसाद कसा असेल हे सहसा त्वरीत सांगता येत नाही.<p>


<p align="center" class="style9 style23 style27"><span class="style33">-------------------------- उपचारपद्धती --------------------------</span> </p>

</p> लेझर मशीन हे डोळ्यांची नियमितपणे तपासणी करण्याच्या बायोमायक्रोस्कोपसारखे दिसते जे डॉक्टर प्रत्येक भेटीत आपले डोळे तपासण्यासाठी वापरतात. लेझर प्रक्रिया चालू असताना लेझर मशिनचा थोडा आवाज येतो व कॅमेऱ्यात जसा लखलखीत प्रकाश (Flash) चमकतो तसा प्रकाश चमकतो. लेझर कॉन्टॅक्ट लेन्स वापरण्यासाठी डोळ्याला लेझर प्रक्रियेच्या अगोदर भुलीच्या थेंबांचे औषध (Topical Anaesthetic drops) वापरले जाते. सर्वसाधारणपणे प्रत्येकासाठी ही प्रक्रिया आरामदायक आणि वेदनारहित असते. संपूर्ण प्रक्रियेस सुमारे 10-20 मिनिटे लागतात.<p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- औषधोपचार ---------------------------- ------</span> </p>

</p> आपल्याला लेझरच्या आधी आणि नंतर थेंबांच्या औषधांची (Eye drops) आवश्यकता भासू शकते. बहुतेक लोकांना लेझरनंतर एका तासाने डोळ्याच्या दाबाची तपासणी करणे आवश्यक असते. कारण लेझरच्या उपचारानंतर डोळ्यातील दाब वाढू शकतो, हा या प्रक्रियेचा सर्वात मोठा धोका आहे. डोळ्याचा दाब वाढत असल्यास, दाब कमी करण्यासाठी आपल्याला औषधोपचार करण्याची आवश्यकता असते. क्वचितच, डोळ्यातील दाब खूप उच्च प्रमाणात वाढतो आणि कमी होत नाही. जरी हे दुर्मिळ असले तरी जर हे घडले तर आपणास शस्त्रक्रिया करावी लागेल.<p>


<p align="center" class="style9 style23 style27"><span class="style33"> ---------------------------------- गुंतागुंती ----------------------------------</span> </p>

</p> या प्रक्रियेचा एक महत्वाचा पैलू म्हणजे काचबिंदूच्या औषधांच्या तुलनेत ह्या लेझर प्रक्रियेनंतरही दुष्परिणाम (Side effects) आहेत. बहुतेक लोकांना लेझरनंतर काहीसे अस्पष्ट दिसते. बहुतेक व्यक्तीमध्ये हा धूसरपणा काही तासांत नाहीसा होतो. या प्रक्रियेमुळे आपण कायमचे दृष्टीहीन होण्याची शक्यता खूपच कमी आहे.
डोळ्याची स्थिती पूर्ववत होण्यासाठी लेझरनंतर थेंबांचे औषध (Eye drops) वापरावे लागतील. आपल्याला सुमारे एका आठवड्यासाठी नवीन थंबांची औषधे वापरावी लागतील. बहुतेक वेळा आपल्याला लेझर केल्यानंतर आपली आधी चालू असलेली इतर काचबिंदूची औषधे सुरू ठेवण्यास सांगितले जाते. आपली औषधे सुरू ठेवण्यास काही अपवाद असल्यास डॉक्टर आपल्याला सूचित करतील. आपल्या डोळ्यांचा दाब कमी करण्यासाठी लेझरने किती चांगले कार्य केले आहे / किती फरक पडला आहे हे निश्चित सांगण्यास काही आठवडे लागतील. जरी अत्यंत दुर्मिळ आणि सहसा न होणारे असले तरी डोळ्यामध्ये रक्तस्त्राव, सूज, मोतीबिंदू तसेच डोळ्यातील दाब वाढू शकतो, ज्यासाठी भिन्न आणि अधिक निराळे उपचार आवश्यक असतात. पहिल्या लेझर उपचारानंतर डोळ्यांतील दाब पुरेसा नियंत्रित नसल्यास दाब कमी करण्यासाठी आपल्याला अतिरिक्त लेझर शस्त्रक्रियेची आवश्यकता भासू शकते. <p>




<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>

</p>  शस्त्रक्रियेदरम्यान अचानक गुंतागुंतीची परिस्थिती निर्माण होऊ शकते ह्याची मला पूर्ण कल्पना आहे. अशा स्थितीमध्ये कोणताही निर्णय घेण्याची पूर्ण परवानगी मी माझ्या शल्यचिकित्सकाला देत आहे. मला हे माहित आहे की जर ही शस्त्रक्रिया केली नाही तर माझी दृष्टी खराब होऊ शकते. मी हे संमतीपत्र वाचलेले असून मला ते संपूर्णपणे समजले आहे. <p>


</p> सर्व संभाव्य धोके येथे नमूद करणे अशक्य आहे, परंतु धोके टाळण्यासाठी आवश्यक ती सर्व काळजी घेतली जाईल. <p>

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
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	