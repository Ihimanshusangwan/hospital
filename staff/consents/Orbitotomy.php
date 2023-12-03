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
    <title> Orbitotomy   </title>
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
<h1 align="center" class="style33 style40"><strong> Orbitotomy     </strong></h1>
<h1 align="center" class="style33"><strong> ( ऑर्बिटोटॉमी ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
</p> <strong>   </strong> <p>
</p><strong> </strong><p>

</p> <strong>   </strong> <p>
</p><strong> </strong><p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>

</p> मला माझ्या मातृभाषेत माझ्या डॉक्टरांनी समजावून सांगितले आहे की, माझ्या / माझ्या पाल्याच्या उजव्या / डाव्या डोळ्याच्या आजूबाजूला एक अनैसर्गिक गाठ आहे. या गाठीचे परिणाम खालील प्रमाणे आहेत जसे: डोळे आपल्या जागेवरून सरकणे, डोळ्यांच्या हालचालींवर बाधा येणे, अंधत्व येणे, दुहेरी प्रतिमा दिसणे, डोळा बाहेर येणे (Protrusion), डोळे पूर्णपणे बंद न होणे, डोळ्यांची पापणी खाली येणे.<p>

</p> या शस्त्रक्रियेमध्ये (ऑर्बिटोटॉमी) डोळ्याच्या बाहेरील खोबणी कापून खोबणीच्या आतील गाठ काढण्यात येईल. <p>

</p> <strong> शस्त्रक्रिया संपूर्ण भूल (जनरल अॅनेस्थेशिया) देऊन करण्यात येईल. भूलीशी निगडित आणि इतर गुंतागुंती खालील प्रमाणे आहेत: रक्तस्त्राव, जंतुसंसर्ग (इन्फेक्शन), डोळ्याच्या भोवती सूज, त्वचा काळी निळी पडणे आणि महत्वाच्या भागांवर परिणाम जसे डोळ्याची नस (ऑप्टिक नर्व्हे), डोळ्याच्या स्नायू पेशी; ज्यामुळे दृष्टी कमी होणे किंवा डोळ्यांची हालचाल करण्यास बाधा येणे, आजूबाजूच्या त्वचेची संवेदनशीलता कमी होणे, पापणी खाली येणे, असे दुष्परिणाम उद्भवू शकतात.</strong> <p>


</p>  या गाठीचे योग्य निदान सूक्ष्म जैविक तपासणी (हिस्टोपॅथोलॉजी) नंतर केले जाईल आणि त्याप्रमाणे उपचार ठरवण्यात येतील. त्याचप्रमाणे मला औषधे देण्यात येतील आणि नियमित तपासणीसाठी बोलावले जाईल.</strong><p>

</p> मला समजले आहे की, डॉक्टरांनी पूर्ण प्रयत्न केले तरीही संपूर्ण गाठ निघेलच असे नाही, अशा वेळी दुसरी शस्त्रक्रिया किंवा उपचारपद्धतीची गरज पडू शकते. शस्त्रक्रियेनंतर ही गाठ परत येण्याची शक्यता टाळता येत नाही. या शस्त्रक्रियेमध्ये रक्तस्त्राव झाल्यास रक्त द्यावे लागू शकते.<p>

</p> हे मला समजावून सांगितले आहे की, शस्त्रक्रियेच्या दरम्यान काही गुंतागुंत झाल्यास योग्य ती शस्त्रक्रिया किंवा उपचार करण्यात येईल. म्हणूनच मी डॉक्टर व त्यांच्या चमूला विनंती करतो / करते आणि संमती देतो / देते की त्यांनी योग्य निर्णय घेऊन आवश्यक ती शस्त्रक्रिया व उपचार करावेत.<p>

</p> मी संमती देतो/ देते की शस्त्रक्रियेसाठी आवश्यक ती भूल व भूलीशी निगडित औषधे मला देण्यात यावीत.<p>

</p> मी संमती देतो/ देते की आवश्यक असणारी औषधे / द्रव/ रक्त/ रक्ताचे घटक मला देण्यात यावेत. तसेच गरजेनुरूप इतर उपचारपद्धती कराव्यात.<p>
</p> मी संमती देतो/ देते की माझी ओळख (छायाचित्र किंवा लेखी स्वरुपात) उघड न करता या शस्त्रक्रियेचे निरीक्षण, छायाचित्रण, चित्रीकरण, वैद्यकीय, वैज्ञानिक किंवा अभ्यासासाठी उपयोगात आणल्यास माझी हरकत नाही.<p>


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
	
<table width="997" border="1" cellspacing="8" cellpadding="10" >
      <colgroup>
      <col span="2" style="border-color: #000000">
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


	