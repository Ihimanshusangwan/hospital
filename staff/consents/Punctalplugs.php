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
    <title> Punctal plugs    </title>
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
<h1 align="center" class="style33 style40"><strong> Punctal plugs     </strong></h1>
<h1 align="center" class="style33"><strong> (  पंक्टल प्लग्ज ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>


</p> मला माझ्या मातृभाषेत समजावून सांगण्यात आले आहे की माझ्या / माझ्या पाल्याच्या उजव्या / डाव्या दोन्ही डोळ्यातील अश्रू कमी झाल्यामुळे कोरड्या डोळ्याच्या आजाराने मी / माझा पाल्य त्रस्त आहे. अश्रू निचरा करण्याच्या मार्गात कृत्रिम पक्टल प्लग बसवल्याने डोळ्यात अश्रू टिकून राहून माझी लक्षणे सुधारू शकतात. ही एक तात्पुरती प्रक्रिया आहे आणि कदाचित ती परत येऊ शकेल. मला हे स्पष्ट केले गेले आहे की वैकल्पिक उपचारांच्यापद्धती मध्ये कृत्रिम अश्रू किंवा मलमाचा सतत वापर स्थितीच्या तीव्रतेवर अवलंबून असतो, सायक्लोस्पोरिनचे ड्रॉप्स किंवा थर्मल कॉट्रीद्वारे अश्रुनलिकेचे तोंड (पंक्टम) आणि अश्रुनलिकेची नळी (कॅनालिक्युलस) कायमचे बंद करणे हे उपाय आहेत.<p>

</p><strong>उपचारपद्धतीशी संबंधित जोखिमांमध्ये खालील गोष्टी समाविष्ट आहेत:</strong><p>

</p> <strong> 1.जंतुसंसर्ग.</strong><p>

</p> <strong>2.अश्रुस्त्राव होणे, अती पाणी वाहणे .</strong><p>

</p> <strong>3.पंक्टल प्लग नाहीसे होणे आणि क्वचितच, अश्रू निचरा करण्याच्या मार्गात ((कॅनालिक्यूलस) प्लग अडकल्यामुळे अश्रू निचरा करणारा मार्ग बंद होऊ शकतो.</strong><p>

</p> <strong> 4.अश्रुमार्ग पूनर्स्थापित करण्यासाठी ही शस्त्रक्रिया पुन्हा करावी लागू शकते.</strong><p>

</p> <strong>5.पंक्टल प्लग बदलण्याची किंवा काढण्याची आवश्यकता भासू शकते.</strong><p>

</p> <strong> हा आजार कायमस्वरूपी आहे याची मला कल्पना दिली आहे आणि या उपचारातून डोळ्यात अश्रू टिकून राहून त्रास कमी होऊ शकतो.
ह्या शस्त्रक्रियेत मूळ कारण (डोळा कोरडा होणे) बरे होत नाही, डोळ्याच्या बाहयभागाची (Ocular surface) परिस्थिती तपासण्यासाठी आणि त्यानुसार औषधोपचार ठरवण्यासाठी फेरतपासणी करावी लागेल.
</strong> <p>



</p>  मी हे प्रमाणित करतो / करते की वरील संमतीपत्रात नमूद केलेले मुद्दे मला पूर्णपणे समजले आहेत आणि डॉक्टरांनी माझ्या / माझ्या पाल्याच्या पापणीच्या नाकाजवळील अश्रूं निचरा करण्यासाठीचे छिद्र बंद करण्यासाठी पंक्टल प्लग बसवण्याच्या शस्त्रक्रियेसाठी संमती देत आहे.<p>

</p> <strong> (उजवी पापणी--- ; खालच्या-- ; वरच्या ---- बाजूला / डावी पापणी ----; खालच्या ------- ; वरच्या...बाजूला).</strong><p>

</p>वैद्यकीय, वैज्ञानिक किंवा शैक्षणिक हेतूने पार पाडल्या जाण्याऱ्या शस्त्रक्रियेचे निरीक्षण, छायाचित्रण किंवा प्रसारण करण्यास मी संमती देत आहे, परंतु चित्र किंवा त्यांच्या बरोबर असलेल्या वर्णनात्मक मजकूराद्वारे ही ओळख उघड होणार नाही याची काळजी घेतली जाईल .<p>
</p> मला सदर शस्त्रक्रियेबद्दल सर्व / काही प्रश्न विचारण्याची संधी देण्यात आली आहे आणि मला दुसऱ्या नेत्रतज्ज्ञांचे मत घेण्याचा पर्यायदेखील देण्यात आला आहे.<p>

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


	