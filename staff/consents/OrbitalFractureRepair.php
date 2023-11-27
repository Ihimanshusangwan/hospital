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
    <title> Orbital Fracture Repair    </title>
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
<h1 align="center" class="style33 style40"><strong> Orbital Fracture Repair   </strong></h1>
<h1 align="center" class="style33"><strong> ( ऑर्बिटल फ्रैक्चर दुरुस्ती ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

</p> <strong>   </strong> <p>
</p><strong> </strong><p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>

</p> मला माझ्या मातृभाषेत समजावून सांगण्यात आले आहे की, माझ्या (उजव्या / डाव्या डोळयाच्या खोबणीला फ्रैक्चर आहे. यासाठी संभाव्य उपचाराचे पर्याय मला सांगितले आहेत. सर्व पर्यायी उपचारामध्ये ही शस्त्रक्रिया सर्वात योग्य आहे. माझ्याशी चर्चा केली गेली आहे की माझ्या (उजव्या / डाव्या) खोबणीची फ्रेंक्चर दुरुस्ती निर्जतुक पद्धतीने संपूर्ण भूल देऊन केली जाईल.<p>

</p> मला हे समजावून सांगितले आहे की ही शस्त्रक्रिया खोबणीच्या मोडलेल्या हाडांमुळे होणारा दोष दुरुस्त करण्याचा प्रयत्न आहे. फ्रेंक्चर झालेल्या डोळ्याच्या खोबणीचे हाड दुरुस्त करण्यासाठी कृत्रिम जाळी ( Synthetic sheet) / खुब्याचे (Hip) किंवा कवटीच्या ( Skull) हाडापासून केलेली जाळी वापरता येईल. इतर वेळी, हाडांमध्ये स्कु वापरुन धातूची प्लेट लावावी लागते आणि ते पक्के बसवले जाते. शस्त्रक्रियेसाठी छेद डोळ्याच्या पापणी मधून घेतला जातो. शस्त्रक्रियेनंतर छेद बंद करण्यासाठी एक किंवा अधिक टाके घेतले जातात. मला स्पष्ट केले आहे की खोबणीच्या फ्रेंक्चर दुरुस्ती शस्त्रक्रियेत दृष्टीत सुधारणा होत नाही. डोळ्यावर कोणतीही शस्त्रक्रिया केली जात नाही.<p>

</p><strong> मला हे स्पष्ट केले आहे की खोबणीच्या ( Orbital) फ्रेंक्चर दुरुस्तीच्या शस्त्रक्रियेत या जोखिमांव्यतिरिक्तही इतर जोखिमा होऊ शकतात.:</strong><p>

</p> <strong> 1.रक्तस्त्राव.</strong><p>

</p> <strong>2.जंतुसंसर्गे.</strong><p>

</p> <strong>3.त्वचा काळी निळी होणे.  (Sac removal).</strong><p>

</p> <strong> 4.चेह-यावर विद्रुपता आणि असमानता येणे . </strong><p>

</p> <strong> 5.व्रण . </strong><p>
</p> <strong> 6.डोळा बंद करण्यात अडचण ज्यामुळे बुबुळाच्या ( Corneal surface) पृष्ठभागाचे नुकसान होऊ शकते) . </strong><p>

</p> <strong> 7. डोळ्याची खालची पापणी शस्त्रक्रियेनंतर खाली लटकणे. </strong> <p>

</p> <strong> 8.जखमेमुळे व व्रणामुळे शस्त्रक्रियेनंतर दुहेरी दृष्टी कायम राहू शकते किंवा वाढू शकते .</strong> <p>

</p> <strong> 9.दुहेरी दृष्टी कायम राहिल्यास नवीन उपचारांची आवश्यकता भासू शकते.</strong> <p>

</p> <strong> 10.जर शस्त्रक्रियेपूर्वी डोळा खोल गेलेला असेल तर तो शस्त्रक्रियेनंतरही खोल गेलेला व्यवस्थित झालेला किंवा बाहेर आलेला दिसू शकतो. </strong> <p>

</p> <strong> 11.डोळ्यात अधिक पाणी येणे किंवा कोरड्या डोळ्याची समस्या होऊ शकते.</strong> <p>

</p> <strong> 12.कॉन्टॅक्ट लेन्सेस वापरण्यास अडचण येते.</strong> <p>

</p> <strong> 13.डोळ्याच्या जवळ किंवा चेहेऱ्यावर बधिरपणा आणि / किंवा मुंग्या येणे .</strong> <p>

</p> <strong> 14.क्वचित प्रसंगी दृष्टी कमी होते किंवा अंधत्वही येते.</strong> <p>

</p> <strong> 15.इम्प्लांटमुळे अंतर्भूत जोखिमा आहेत.</strong> <p>

</p> <strong> 16.इम्प्लांट डोळ्याच्या खोबणीच्या मध्ये फिरु शकतो, त्यास जंतुसंसर्ग होऊ शकतो, तो जागेवरुन सरकु शकतो, विरघळू शकतो आणि काही वेळा तो काढून टाकण्याची आवश्यकता भासू शकते. </strong><p>

</p> <strong> 17.या गुंतागुंतींवर उपचार करण्यासाठी अतिरिक्त उपचार किंवा शस्त्रक्रिया करण्याची गरज भासू शकते.</strong>.<p>



</p><strong> हा आजार कायमस्वरुपी आहे याची मला कल्पना दिली आहे आणि अश्रू निचरा करण्याच्या मार्ग उघडून या उपचारातून लाक्षणिक आराम मिळू शकतो.</strong> <p>

</p>या शस्त्रक्रियेत मूळ कारण (Canalicular block ) बरे होत नाही, डोळ्याच्या बाहयभागाची ( Ocular surface) परिस्थिती तपासण्यासाठी आणि त्यानुसार औषधोपचार ठरवण्यासाठी फेरतपासणी करावी लागेल.<p>

</p> मी प्रमाणित करतो की वरील संमतीपत्रात नमूद केलेले मुद्दे मला पूर्णपणे समजले आहेत आणि डॉक्टरांनी माझ्या / माझ्या पाल्याचे पापणीच्या नाकाजवळील अश्रू निचरा करण्यासाठीचे छिद्र मोठे उजवी पापणी खालच्या--- वरच्या खालच्या --- वरच्या---- • बाजूला / डावी पापणी बाजूला) करुन ट्यूब बसवण्याच्या शस्त्रक्रियेसाठी संमती देत आहे. <p>

</p>वैद्यकीय, वैज्ञानिक किंवा शैक्षणिक हेतूने पार पाडल्या जाण्याऱ्या शस्त्रक्रियेचे निरीक्षण, छायाचित्रण किंवा प्रसारण करण्यास मी संमती देत आहे, परंतु चित्र किंवा त्यांच्या बरोबर असलेल्या वर्णनात्मक मजकूराद्वारे ही ओळख उघड होणार नाही याची काळजी घेतली जाईल. <p>



</p>  मला सर्व काही प्रश्न विचारण्याची संधी देण्यात आली आहे आणि मला दुसऱ्या नेत्रतज्ज्ञांचे मत घेण्याचा पर्यायदेखील देण्यात आला आहे.<p>

</p> मला पूर्ण कल्पना आहे की ही शस्त्रक्रिया चांगल्या उद्देशाने केली जात आहे आणि शस्त्रक्रियेच्या अंतिम परिणामाबद्दल कोणतीही हमी किंवा आश्वासन दिले गेलेले नाही.<p>

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


	color: #000000">
      </colgroup>
	        </p> <font size="+1"><strong>रुग्ण अल्पवयीन किंवा मानसिकरित्या असक्षम असल्यास, रुग्णाच्या पालकांची सही / अंगठ्याचा ठसा . </strong> <p>
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


	