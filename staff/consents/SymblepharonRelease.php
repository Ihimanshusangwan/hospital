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
    <title>    Symblepharon Release </title>
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
<h1 align="center" class="style33 style40"><strong>  Symblepharon Release         </strong></h1>
<h1 align="center" class="style33"><strong> ( सिम्ब्लेफेरॉन सोडवणे (रिलीज ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------ रुग्णाचे संमतीपत्र ------</span> </p>

</p> मला माझ्या मातृभाषेत सांगितले आहे की मला / माझ्या पाल्याच्या उजव्या / डाव्या डोळ्याची पापणी व बुबुळ/पांढरा भाग (स्क्लेरा) या भागाच्या आजारामुळे ते एकमेकांना चिकटले आहेत ज्याला वैद्यकिय भाषेत सिम्ब्लेफेरॉन म्हणतात (Symblepharon) हे सोडवण्यायाठी शस्त्रक्रिया करावी लागेल. या शस्त्रक्रियेत अॅम्निओटिक मेंब्रेन, म्हणजे अर्भकाच्या नाळेचे आवरण किंवा तोंडाच्या आतील आवरणाचे म्हणजे म्युकस मेंब्रेनचे प्रत्यारोपण (ग्राफ्ट) डोळ्याच्या बुबुळावर व पांढऱ्या भागावर टाक्यांनी बसविले जाईल. त्यावर तात्पुरत्या स्वरूपाची बॅन्डेज कॉन्टॅक्ट लेन्स बसवली जाईल. <p>

</p> मला सांगण्यात आले आहे की हा आजार उपचार न केल्यास कायमस्वरुपी राहतो व ह्या शस्त्रक्रियेद्वारे डोळ्याच्या बाहेरील आवरणाची परिस्थिती सुधारू शकेल. या शस्त्रक्रियेने दृष्टी मध्ये फरक होणे अपेक्षित नाही. <p>

</p> शस्त्रक्रियेतील संभाव्य गुंतागुंती व धोके : <p>
</p>  मला सांगण्यात आले आहे की ह्या शस्त्रक्रियेदरम्यान बुबुळाला किंवा डोळ्याला छिद्र पडू शकते, तसेच जंतुसंसर्ग (इन्फेक्शन) होऊ शकतो व सोडवलेली पापणी पुन्हा चिकटण्याची शक्यता असते. ह्याकरिता परत शस्त्रक्रिया करण्याची गरज देखील लागू शकते व दृष्टी सुधारण्याची शाश्वती नसते. <p>

</p> मला सांगण्यात आले आहे की याकरिता बऱ्याचदा अनेक वर्षे फेरतपासणी करावी लागते व गरज पडल्यास वेळोवेळी काही विशेष तपासण्यादेखील कराव्या लागू शकतात. मला असे सांगण्यात आले आहे की दिलेल्या औषधांचा योग्य वापर करणे खूप महत्वाचे आहे. मला हे सांगितले आहे की, ही शस्त्रक्रिया व इतर उपचार करून देखील परिस्थिती बिघडू शकते व दृष्टीचा दोष वाढू शकतो, तसेच डोळा विद्रुप दिसू शकतो. <p>

</p>  मी हे नमूद करतो / करते की मला या शस्त्रक्रियेसंबंधी सर्व फायदे, तोट्यांबद्दल सांगितलेली माहिती नौट समजलेली आहे व मी माझ्या (स्वतः च्या ) / माझ्या पाल्याच्या उजव्या / डाव्या डोळ्याची सिम्ब्लेफेरॉन सोडवण्याच्या व त्याबरोबर गरज लागल्यास अॅम्निओटिक मॅब्रेन / म्युकस मेंब्रेनचे प्रत्यारोपण (ग्राफ्ट) ही शस्त्रक्रिया करण्यास संमती देत आहे. <p>

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


	er-color: #000000">
      </colgroup>
      <p> <font size="+1">रुग्ण अल्पवयीन किंवा मानसिकरित्या असक्षम असल्यास, रुग्णाच्या पालकांची सही / अंगठ्याचा ठसा  <p>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"></p>  पालकाचे नाव  :---------------------------------------------------------------------------------------------------- <P>      </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"> रुग्णाशी नाते :----------------------------------------------------------------------------------------------------</p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">पत्ता:---------------------------------------------------------<p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">दूरध्वनी क्रमांक:-----------------------------------------------------------------------------दिनांक: ------------------------</p>        </th>
       
  <tr>
        <th class="style22" scope="row"><p align="left"> <font size="+1">स्थळ  :--------------------------------------------------------------------------------------------------------------------------</p>        </th>
       
  <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">साक्षीदार क्रमांक १ <p align="center"><font size="+1"> साक्षीदार २ </p> <p align="left"><font size="+1"> सही : --------------------<p align="center"><font size="+1"> सही : -------------------- <p align="left"><font size="+1">नाव : --------------------<p> <p align="center"><font size="+1"> नाव : --------------------<p align="left"> <font size="+1">पता : --------------------<p align="center"><font size="+1">पता : --------------------  <p align="left"><font size="+1">दूरध्वनी क्रमांक : -----------------------<p align="center"><font size="+1">दूरध्वनी क्रमांक: -----------------------      </th>
  <tr>
		       
	
  </tr>
</table>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>
</body>
</html>


	