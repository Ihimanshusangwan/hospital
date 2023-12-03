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
    <title>    Excision Biopsy    </title>
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
     
    <table width="1124" border="1" align="center" class="style33">
	 <colgroup>
      <tr bgcolor="#A631A9">
	    <td class="style39"></colgroup>
        <th width="1032" class="style39">&nbsp;</th>
      </tr>
    </table>
</body>
  
</html>
<h1 align="center" class="style33 style40"><strong>  Excision Biopsy         </strong></h1>
<h1 align="center" class="style33"><strong> ( तपासणीसाठी तुकडा काढणे व तुकड्याची तपासणी) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------ रुग्णाचे संमतीपत्र ------</span> </p>

</p> मला माझ्या मातृभाषेत समजावून सांगण्यात आले आहे की माझ्या उजव्या डाव्या डोळ्याला --------------------- हा आजार झालेला असून त्यामुळे माझ्या उजव्या डाव्या डोळ्याची --------------------

ही शस्त्रक्रिया करण्याची गरज आहे. <p>

</p> मला हे समजले आहे की या शस्त्रक्रियेमध्ये बाधा झालेला भाग पूर्णपणे किंवा थोडा काढून तो सूक्ष्म तपासणीसाठी पाठवण्यात येईल. या तपासणीतून आजाराचे स्वरूप व गांभीर्य लक्षात येईल. शस्त्रक्रियेमुळे झालेली जखम त्वरित भरुन येण्यासाठी टाके घालावे लागतील किंवा त्याच्यावर अॅम्नीऑटीक मेम्ब्रेन किंवा कंजंक्टायवा याचे आवरण घालावे / बसवावे / पांघरावे लागेल. या आजाराचा योग्य उपचार तपासणीच्या अंतिम निर्णयानंतर ठरेल. (Depending on Histopathological report)<p>

</p>मला हे पूर्ण माहित आहे की ही शस्त्रक्रिया जरी छोटी असली तरी त्यामध्ये खालील धोके संभवतात<p>

</p> 1. शस्त्रक्रियेच्या जागी वेदना होणे,<p>
</p> 2. जंतुसंसर्ग व त्यामुळे प्रतिजैविकांची आवश्यकता भासणे. <p>
</p> 3. शस्त्रक्रियेच्या जागी व्रण तयार होणे.<p>
</p> 4. शस्त्रक्रियेच्या जागी डाग पडणे किंवा रंग बदलणे.<p>
</p> 5. परत शस्त्रक्रियेची आवश्यकता निर्माण होणे. <p>
</p> मला या शस्त्रक्रियेची गरज तसेच शस्त्रक्रियेचे स्वरूप धोके फायदे तसेच इतर उपचार पद्धतीची संपूर्ण कल्पना देण्यात आली असून हे सर्व मला पूर्ण पणे समजले आहे.मला हे पूर्णपणे समजले आहे की ही शस्त्रक्रिया चांगल्या हेतूने केलेली आहे आणि यामध्ये कोणत्याही स्वरुपाची हमी दिलेली नाही. <p>
</p> या शस्त्रक्रियेमध्ये काढलेल्या भागाची विल्हेवाट घालून दिलेल्या निर्देशानुसार केली जाईल याची मला कल्पना आहे.<p>


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
	
<table width="997" border="1" cellspacing="8" cellpadding="10" >
      <colgroup>
      <col span="2" style="border-color: #000000">
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


	