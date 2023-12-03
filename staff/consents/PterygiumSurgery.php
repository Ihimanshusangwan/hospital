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
    <title> Pterygium Surgery      </title>
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
<h1 align="center" class="style33 style40"><strong> Pterygium Surgery      </strong></h1>
<h1 align="center" class="style33"><strong> (टेरीजियम शस्त्रक्रिया) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------ रुग्णाचे संमतीपत्र ------</span> </p>

</p> मला माझ्या मातृभाषेत समजावण्यात आले आहे की माझ्या / माझ्या पाल्याच्या उजव्या / डाव्या डोळ्याच्या बुबुळावर, पांढऱ्या भागावरील पडदा (ज्याला वैद्यकीय भाषेत कंजंक्टायव्हा म्हणतात) अनैसर्गिकरित्या वाढलेला आहे, ज्याला वैद्यकिय भाषेत टेरीजियम (Pterygium) म्हणतात (ह्याला बोली भाषेत मांस किंवा वेल वाढणे असेही म्हणतात) हा आजार झालेला आहे. हा काढण्यासाठी केवळ शस्त्रक्रिया हाच उपचार आहे. मला या आजाराबद्दल पुढील काही मुद्दे देखील समजावून सांगितले आहेत.<p>

</p> * अनैसर्गिक पडद्यामुळे (टेरीज़ियम) आलेला बुबुळावरचा डाग शस्त्रक्रियेनंतर पूर्ण जाणार नाही. <p>
</p> *  अनैसर्गिक वाढलेला पडदा (टेरीजियम) काढल्यानंतर परत येण्याची शक्यता असते व त्याकरिता परत शस्त्रक्रिया करावी लागू शकते.<p>

</p> * ह्या शस्त्रक्रियेनंतर अस्तित्वातील वक्रदृष्टिदोषामुळे (ॲस्टिगमॅटीझम) दृष्टीत किती फरक पडेल याचा अंदाज देता येणार नाही.<p>
</p> * त्याच अथवा दुसऱ्या डोळ्यातील पांढरा पापुद्रा (कंजंक्टायव्हल ग्राफ्ट) काढून, अनैसर्गिक वाढलेल्या पडद्याच्या (टेरीजियम) जागी बसवला जाईल, ज्यामुळे काढलेला पडदा बुबुळावर परत येण्याची शक्यता कमी होते.<p>

</p> *जर मायटोमायसीन या औषधाचा शस्त्रक्रियेदरम्यान वापर केला (ज्यामुळे काढलेला पडदा परत वाढण्याची शक्यता कमी होते) तर काढलेल्या पापुद्र्याच्या खालचा भाग ज्याला स्क्लेरा म्हणतात, पातळ होण्याची शक्यता असते व त्याकरिता परत वेगळी शस्त्रक्रिया करावी लागू शकते.<p>

</p> * शस्त्रक्रियेनंतर काही दिवस डोळा लाल दिसणे, टोचणे व डोळ्यातून पाणी येण्याचा त्रास होण्याची शक्यता आहे. <p>

</p> * जर काढलेल्या पडद्याच्या (टेरीजियम) जागी पांढऱ्या पापट्ट्याचे प्रत्यारोपण (कंजंक्टायव्हल ऑटोग्राफ्ट) केले तर हा प्रत्यारोपणासाठीचा पापुद्रा टाक्यानी किंवा जैविक डिंकासारख्या औषधाने (टिश्यू ग्लू) बसवला जाईल, ज्यामुळे डोळ्याला टोचण्याचा त्रास होऊ शकतो. तसेच डोळ्याला जंतुसंसर्ग म्हणजेच इन्फेक्शन होऊ शकते, ह्याची मला कल्पना दिली आहे.<p> 

</p> *  काही वेळेस गरज भासल्यास लेझरच्या साहाय्याने बुबुळावरचा डाग कमी करण्यासाठी शस्त्रक्रिया करावी लागू शकते.<p>

</p> *  ही शस्त्रक्रिया डोळ्याला इंजेक्शनद्वारे किंवा थेंबाच्या औषधाने भूल देऊन करण्यात येईल.<p>

</p> <strong>या भूलेचे संभाव्य धोके पुढील प्रमाणे- </strong><p>
</p> 1) इंजेक्शनच्या सुईमुळे डोळ्याच्या पांढऱ्या पडद्याला व आतील नेत्रपटलाला इजा होणे व कायमचा दृष्टीदोष येणे.<p>
</p> 2) डोळ्याच्या मागील शिरेला (ऑप्टिक नव्हे) इजा होणे व दृष्टीदोष होणे. <p>
</p> 3) भुलेच्या औषधाला अॅलर्जीक रिअॅक्शन येणे, ज्यामुळे डोळ्याला किंवा अंगावर सूज येणे, श्वास घेण्यास अडचण होणे, हृदयाची गती अनियमित होणे व क्वचित प्रसंगी हृदय बंद पडणे या सारखे दुष्परिणाम होऊ शकतात.<p>
</p> 4) डोळ्याच्या बाहेरील भागास (ऑर्बिट) जंतुसंसर्ग होणे. <p>
</p> मी वरील नमूद सर्व मुद्द्यांचा नीट विचार करुन माझ्या माझ्या पाल्याच्या उजव्या / डाव्या डोळ्याच्या अनैसर्गिक वाढलेला पडदा (टेरीजियम) काढण्याच्या शस्त्रक्रियेसाठी संमती देत आहे.<p>


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


	-color: #000000">
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


	