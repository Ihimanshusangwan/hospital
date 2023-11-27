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
    <title>  Phototherapeutic Keratectomy (PTK)    </title>
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
<h1 align="center" class="style33 style40"><strong> Phototherapeutic Keratectomy (PTK)     </strong></h1>
<h1 align="center" class="style33"><strong> (फोटोथेराप्युटिक केरॅटेक्टॉमी (पी.टी.के.) ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">------ रुग्णाचे संमतीपत्रे ------</span> </p>

</p>या शस्त्रक्रियेसाठी संमती देण्याआधी मला खालील मुद्दे समजले आहेत.<p>

</p> 1. माझ्या बुबुळाच्या / कॉर्नियाच्या (पारपटलाच्या) वरचे / बाह्य थर काढण्यासाठी मी इतर पर्यायी उपाययोजना / शस्त्रक्रियांपेक्षा एक्झायमर लेझरची निवड केली आहे.<p>

</p> 2. कोणत्याही इतर शस्त्रक्रियेप्रमाणे सफलतेची हमी देता येत नाही हे मला समजले आहे.<p>
</p> 3. मला समजले आहे की आधीपेक्षा दृष्टी कमी पण होऊ शकते. पुढील गुंतागुंत होण्याची शक्यता आहे जसे की दृष्टीची स्पष्टता कमी होणे, बुबुळाचा व्रण वाढणे, प्रकाशाचा त्रास होणे, जंतुसंसर्ग होणे. शस्त्रक्रियेनंतर दिलेल्या औषधामुळे आधीपासून विद्यमान असलेले विषाणूचे संसर्ग परत उद्भवू शकणे, व्रण जास्त प्रमाणात असल्यास, बुबुळाला छिद्र पडू शकते, ज्यामध्ये जंतुसंसर्ग होणे, मोतीबिंदू होणे किंवा अतिरिक्त शस्त्रक्रिया कराव्या लागू शकतात. मला समजले आहे की योग्य उपचार होण्यासाठी मला फेरतपासणीसाठी येणे गरजेचे आहे.<p>

</p> 4. मला समजले आहे की शस्त्रक्रियेमुळे माझी चष्मा अथवा लेन्सेस वापरण्याची गरज वाढू शकते.े.<p>
</p> 5. मला समजले आहे की जरी आधीपेक्षा नजर वाढणे व प्रकाशाचा त्रास कमी होणे या दोन्ही गोष्टी या शस्त्रक्रियेनंतर अपेक्षित असल्या तरी काही वेळा या आधीपेक्षा बिघडण्याची शक्यता असते.<p>
</p> 6. मला समजले आहे की जेव्हा काही बुबुळाचे आजार तीव्र प्रमाणात असतात तेव्हा बुबुळ ( कॉर्निया) प्रत्यारोपण (corneal transplant) हा पर्याय असतो व या लेझर मुळे प्रत्यारोपण करावे लागण्याची शक्यता टळतेच असे नाही.<p>
</p> 7. मला समजले आहे की या उपाययोजनांमुळे होणारे सर्व संभाव्य धोके किंवा गुंतागुंत, या संमतीपत्रात समाविष्ट करणे शक्य नाही.<p>
</p> 8. मला समजले आहे की पी.टी.के. चे सर्व फायदे अद्याप समजलेले नाहीत.<p>
</p> 9. मला समजले आहे की पी.टी.के. चे सर्व संभाव्य धोके आणि गुंतागुंती या अद्याप माहिती नाहीत.<p>
</p> 10. मी नमूद करतो / करते की वरील माहिती मला सांगितली गेली आहे व माझ्या सगळ्या शंकांचे निरसन माझ्या नेत्रतज्ज्ञांनी समाधानकारकरित्या केले आहे. मी हे संमतीपत्र वाचले आहे ( मला वाचून दाखवण्यात आले आहे) आणि मला सर्व फायदे व संभाव्य धोके, गुंतागुंती समजल्या आहेत. मला कळले आहे की पी टी के शस्त्रक्रियेच्या सफलतेची कोणतीच हमी देणे शक्य नाही. तरीही मी माझ्या उजव्या डाव्या दोन्हीही डोळ्यावर पी. टी. के. लेझर करण्याची निवड करतो / करते. <p>

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


	