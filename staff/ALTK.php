<?php 
 require("../admin/connect.php");
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
    <title> Automated Lamellar Therapeutic Keratoplasty (ALTK)</title>
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
<a class="btn btn-primary noprint" href="eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <button class='btn btn-success noprint' onclick="window.print();">Print</button>

     <h2><h2>
     <?php if($inp_arr[1]=='option1'){
            include_once("../header/images.php");

        } 
       
        ?>
    <table width="1124" border="1" align="center" class="style33">
	 <colgroup>
      <tr bgcolor="#A631A9">
	    <td class="style39"></colgroup>
          <th width="1032" class="style39">&nbsp;</th>
        </tr>
    </table>
</body>
  
</html>
<h1 align="center" class="style33 style40"><strong> Automated Lamellar Therapeutic Keratoplasty (ALTK)  </strong></h1>
<h1 align="center" class="style33"><strong> ( थेऑटोमेटेड लॅमेलर थेराप्युटिक केरॅटोप्लास्टी ) </strong></h1>
<table width="997" height="107" border="2">
  <tr>
    <td width="976"><p><strong>श्री /श्रीमती / कुमार / कुमारी :  <?php echo $row['name']; ?>   वय : <?php echo $row['age']; ?>    लिंग :<?php echo $row['sex']; ?>    रुग्ण क्रमांक : <?php echo $row2['uhid']; ?> दिनक: <?php echo $row['reg_date']; ?>  वडील /पाती /आईचे नाव ---------------------------------------------------------------------------------------------------------------------------------पत्ता : <?php echo $row['address']; ?>  </strong></p>
    <p><strong>दूरध्वनी क्रमांक : <?php echo $row['mobile']; ?> </strong></p></td>
  </tr>
</table>
<p align="center" class="style9 style23 style27"><span class="style33">------रुग्णाचे संमतीपत्र------</span> </p>

</p> मला माझ्या मातृभाषेत समजावले आले आहे की माझ्या / माझ्या पाल्याच्या बुबुळाला ( comnea) फूल पडले आहे / बुबुळ पातळ होऊन एका बाजूला फुगीर झाले आहे / बुबुळाच्या पुढच्या भागाचे अन्य आजार (corneal opacity, corneal ectasia, keratoconus etc) (निर्दिष्ट करा. --------------------------------------------- व त्यासाठी ही शस्त्रक्रिया केली जाते. यामध्ये बुबुळाचा पुढचा भाग, मध्य व थोड़ा खोलवरचा भाग (एपिथिलियम, बेसमेंट मेम्ब्रेन, मिडस्ट्रोमा पर्यंत) काढला जातो. त्याठिकाणी नेत्रदानातून मिळालेल्या बुबुळाचा भाग टाक्यांच्या सहाय्याने बसवला जातो. <p>

</p> माझ्या माझ्या पाल्याच्या बबुळाचा आजार बुबुळाला पडलेले फूल हे कायमस्वरूपी आहे व दृष्टी सुधारण्यासाठी हे काढावे लागेल हे मला पूर्णपणे समजावले गेले आहे. या शस्त्रक्रियेदरम्यान स्वतः च्या बुबुळाला छिद्र पडण्याचा संभाव्य धोका आहे व ते झाल्यास पूर्ण बुबुळ बदलावे लागेल ( फुल थिकनेस कॉर्नियल ट्रान्सप्लांट) या शस्त्रक्रियेमध्ये उद्भवणाऱ्या संभाव्य गुंतागुंती जंतुसंसर्ग, रिजेक्शन, टाके सैल होणे, टाके परत घ्यावे लागणे, माझ्या स्वतःच्या बुबुळाच्या व बसवलेल्या बुबुळाच्यामध्ये बारीक रक्तवाहिन्या निर्माण होणे व त्यातून रक्तस्त्राव होणे, दृष्टी न सुधारणे किंवा असलेली दृष्टी अधिक कमी होणे, शस्त्रक्रिया किंवा औषधांमुळे काचबिंदू होणे, मोतीबिंदू होणे, जास्त विषम दृष्टीचा चष्म्याचा नंबर ( astigmatism) लागणे, शस्त्रक्रिया परत करावी लागणे आणि त्यानंतरसुद्धा दृष्टी मध्ये सुधारणा होऊ शकते अथवा नाही, याची मला माहिती दिली गेली आहे. शस्त्रक्रियेनंतर फेरतपासणीसाठी डॉक्टरांच्या सल्ल्यानुसार वेळोवेळी यावे लागेल (काही महिने ते काही वर्ष ) व तेव्हा काही तपासण्या आवश्यक असू शकतील याची मला कल्पना दिलेली आहे. मला समजावले आहे की शस्त्रक्रियेच्या सफलतेसाठी मी नियमितपणे औषधे वापरणे गरजेचे आहे. मला समजावून सांगितले आहे की मला काही परिस्थितीत तातडीने दवाखान्यात येणे गरजेचे आहे, जसे की डोळे अचानक लाल होणे, प्रकाश किरण सहन न होणे, डोळ्यात टोचल्यासारखे वाटणे, डोळा दुखणे किंवा दृष्टी मंदावणे, कारण ही ग्राफ्टसंसर्ग किंवा ग्राफ्ट रिजेक्शनची लक्षणे असू शकतात. मला समजले आहे की सर्व प्रयत्न करूनसुद्धा दृष्टी कमी होऊ शकते अथवा डोळ्याचे दर्शनीय बाह्यस्वरूप बदलू शकते.<p>

</p>सदर शस्त्रक्रियेचे फायदे, तोटे, जोखिमा संभाव्य गुंतागुंती आणि पर्यायी उपचार मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे, ज्याकरिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो / देते. मला शस्त्रक्रियेच्या उपचाराच्या सगळ्या गुंतागुंतींची ( कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, तरी माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे नमूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.
तसेच, माझी ओळख ( छायाचित्र किंवा लेखी स्वरुपात) उघड न करता, शास्त्रीय संशोधन, वैद्यकीय शिक्षण, वैद्यकीय नोंदी, शास्त्रीय मासिकांमध्ये प्रकाशन या कारणांसाठी व या शस्त्रक्रियेचा अभ्यास करणे, छायाचित्र घेणे, व्हिडिओ रेकॉर्डिंग करणे याला मी संमती देतो/ देते.<p>

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
<table width="997" border="1" cellspacing="8" cellpadding="10" >
      <colgroup>
      <col span="2" style="border-color: #000000">
      </colgroup>
      
      <tr>
        <th class="style22" scope="row"><p align="left"> <font size="+1"></p> रुग्णाची सही / अंगठ्याचा ठसा  :<?php echo $row['name']; ?><P>      </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"> रुग्णाचे  नाव :<?php echo $row['name']; ?></p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">पत्ता <?php echo $row['address']; ?></p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">दूरध्वनी क्रमांक <?php echo $row['mobile']; ?>दिनांक <?php echo $row['reg_date']; ?></p>        </th>
       
  <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"> स्थळ : <?php echo $row['address'] ." ".$row['taluka']." ".$row['district']; ?></p>        </th>
		
       
  </tr>
</table>
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
        <th class="style22" scope="row"><p align="left"><font size="+1"></p>  पालकाचे नाव : <?php echo $row['name_pwp']; ?> </p>      </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"> रुग्णाशी नाते :   <?php echo $row['relation']; ?> </p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">पत्ता:  <?php echo $row['address_pwp']; ?></p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">दूरध्वनी क्रमांक: <?php echo $row['mobile_pwp']; ?> दिनांक: <?php echo $row['reg_date']; ?> </p>        </th>
       
  <tr>
        <th class="style22" scope="row"><p align="left"> <font size="+1">स्थळ  : <?php echo $row['address_pwp'] ." ".$row['taluka_pwp']." ".$row['district_pwp']; ?></p>        </th>
       
  <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">साक्षीदार क्रमांक १ <p align="center"><font size="+1"> साक्षीदार २ </p> <p align="left"><font size="+1"> सही : --------------------<p align="center"><font size="+1"> सही : -------------------- <p align="left"><font size="+1">नाव : --------------------<p> <p align="center"><font size="+1"> नाव : --------------------<p align="left"> <font size="+1">पता : --------------------<p align="center"><font size="+1">पता : --------------------  <p align="left"><font size="+1">दूरध्वनी क्रमांक : -----------------------<p align="center"><font size="+1">दूरध्वनी क्रमांक: -----------------------      </th>
  <tr>
		       
	
  </tr>
</table>
<p align="center" class="style33"><font size="+1"> -----डॉक्टरांचे घोषणापत्र----- <p>
</p><font size="+1"> मी. डॉ. <?php echo $row['consultant']; ?>
. असे घोषित करतो / करते की, मी या उपचार / शस्त्रक्रिये बद्दलच्या सर्व परिणामांची व संभाव्य धोक्यांची पूर्ण कल्पना रुग्णास नातेवाईकास समजेल अशा भाषेत समजाविली आहे. मी रुग्णास / नातेवाईकास त्यांच्या सर्व शंकानिरसन करण्याची संधी दिलेली आहे.<p>
</p><font size="+1">डॉक्टरांचे नाव व सही<?php echo $row['consultant']; ?>  <p>
</p> दिनांक : <?php echo $row['reg_date']; ?> स्थळ : <?php echo $row['address']; ?></p>
<tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">साक्षीदार क्रमांक १ <p align="center"><font size="+1"> साक्षीदार २ </p> <p align="left"> <font size="+1">सही : --------------------<p align="center"><font size="+1"> सही : -------------------- <p align="left"><font size="+1">नाव : --------------------<p> <p align="center"><font size="+1"> नाव : --------------------<p align="left"><font size="+1"> पता : --------------------<p align="center">पता : --------------------  <p align="left"><font size="+1">दूरध्वनी क्रमांक : -----------------------<p align="center"><font size="+1">दूरध्वनी क्रमांक: -----------------------      </th>
<tr>

</body>
</html>


	