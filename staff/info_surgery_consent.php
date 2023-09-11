<?php
error_reporting(0);
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();


$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  
  $sql6=mysqli_query($conn,"SELECT * FROM info_sur_consent WHERE id =$id");
  $row6=mysqli_fetch_assoc($sql6);
  if ($row6) {
      $sign_norm = json_decode($row6['sign'], true);
      $name_norm = json_decode($row6['name'], true);
      $date_norm = json_decode($row6['date'], true);
      $time_norm = json_decode($row6['time'], true);
  
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFORMED CONSENT FORM FOR SURGERY / PROCEDURE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style type="text/css">
<!--
.style10 {font-size: 11px}
.style22 {font-size: 11px; color: #000000; }
.style24 {font-size: 14px; color: #000000; }
.style27 {font-size: 12px}
.style28 {font-size: 14px}
.style29 {font-weight: bold}
.style30 {font-size: 12px; font-weight: bold; }

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

        @media print {
            .noprint {
                visibility: hidden;
            }
        }
        
table, th, td {
  border:1px solid black;
}
    </style>
</head>
<body>
<div id="button">
            <a href='inform_sur_consent.php?id=<?php echo $id;?>' class="btn btn-primary m-2 noprint">Dashboard</a>
            <a class="btn btn-primary m-2 noprint" onclick="window.print()">Print</a>
        </div>

        <?php include_once("../header/images.php") ?>
    <p align="center">
<h3 align="center"><span> INFORMED CONSENT FORM FOR SURGERY/ PROCEDURE</span></h1>
	 
	   <div align="center">
	     <h3><span class="style3 style4"> शस्त्रक्रिया किंवा तत्सम प्रक्रियेसाठी संमतीपत्र </span></h3>
	    
</div>
      <?php include_once("../header/header.php") ?>
      
		
<p align="left" class="style24"> 1. I hereby authorize Dr.<strong><?php echo $row6['doctor']; ?></strong> or his associates to perform surgery/Oprative upon me/above named patient.The name of procedure is <strong><?php echo $row6['pro']; ?></strong> <p>
<p align="left" class="style24">डॉ . <strong><?php echo $row6['doctor']; ?></strong> किंवा त्यांचे सहकारी यांना माझ्यावर/माझ्या रुग्णावर शस्त्रक्रिया/तत्सम प्रक्रिया करण्यास परवानगी देत आहे. शस्त्रक्रिया / तत्सम प्रक्रियेचे नाव: <strong><?php echo $row6['pro']; ?></strong> <p> 
<p> 2. I have been fully explained in the language I understand about the kind of procedure the Surgeon will perform . I have been given an opportunity to ask question and all my question have been answered satisfactorily . He/ She answered my questions about my condition and the procedure to my satisfaction.<p> 
<p class="style24">प्रक्रिये बाबत मला/आम्हाला समजणाऱ्या सरळ आणि सोप्या भाषेत मला/आम्हाला समजेल अशा पद्धतीने समजावून सांगण्यात आलेले आहे. त्याचप्रमाणे मला प्रश्न विचारण्याची संधी देण्यात अली व माझ्या शंका / कुशंका आणि प्रत्येक प्रश्नांचे समाधान होई पर्यंत मला कळविण्यात आलेले आहे. <p>

 <p>3.  Dr. has fully explained to me the nature and purpose of opration/procedure and has also informed me of expected benefits and complications, attendant discomfort and risks that may arise , as well as possible alternatives to the proposed treatment. <p>
 <p>डॉक्टरांनी मला ऑपरेशनचा उद्देश आणि त्याची प्रक्रिया याबाबत माहिती दिलेली आहे. तसेच ऑपरेशन करण्याचे फायदे ,तोटे ,अडचणी , उद्भवू शकणारे धोके तसेच पर्यायी चिकित्सा पद्धती याबाबत माहिती दिलेली आहे.<p>    

<p>4. The Doctor explained the likelihood of major risk or complications that may occur during this procedure including but not limited to loss of limb function,brain damage,paralysis,hemorrhage,infection , drug reaction, blood clots or sometimes loss of life I undersatand those risks and I am willing to undergo the procedure. I have been explained about the risk of not undergoing this procedure.The doctor has explained to me the possible problems related to recovery. 

<p>शत्रक्रिये दरम्यान अचानक उद्भवणारे धोके किंवा गुंतागुंत जसे कि ,हात पाय बधिर होणे किंवा अपंगत्व येणे , लकवा मारणे, मेंदूमध्ये बिघाड , रक्तस्राव होणे, जंतुसंसर्ग होणे , औषधाची रिअक्शन होणे , रक्ताची गुठळी होणे, काही वेळा मृत्यू येणे किंवा तत्सम इतर धोके या बाबत मला विवरण आणि समाज देण्यात आलेली आहे. त्याचप्रमांणे डॉक्टरांनी शस्त्रक्रियेनंतर उद्भवू शकणाऱ्या विविध समस्या आणि संपूर्ण बरा होईपर्यंत काय होऊ शकेल याबाबत मला समजावून सांगितले आहे.    <p>
<p>5. I understand that during the course of procedure or operation, unforeseen condition may arise the procedurse different form those planned . I therefore consent to the performance of additional procedure above named physician or his/her associates may consider necessary.<p>

<p>मला याची ही जाणीव करून देण्यात आहे की , ऑपरेशन दरम्यान अचानक उध्दभवणाऱ्या परिस्थितीनुसार निश्चित केलेल्या प्रक्रियेपेक्षा इतर प्रक्रिया / ऑपरेशन करण्याची करण्याची गरज पडू शकते . त्यामुळे अशापरीस्थिती मध्ये उपयोक्त नमूद केलेल्या शल्य चिकित्सकाला किंवा त्यांच्या सहाय्यकाला अशा प्रकारची प्रक्रिया करण्यास मी / आम्ही संमती देत आहे. <p>

<p>6. I ferther consent to the administration of such anesthesia as may be considered necessary . I recognize that there are occasional risks associated with anesthesia and such have been fully explained to me/us. <p>

<p>शस्त्रक्रिया किंवा प्रक्रियेसाठी गरजेच्या असलेल्या भूल प्रकार देण्यास मी / आम्ही संमती देत अहे . भूल देतांना क्वचित प्रसंगी उध्दभवू शकणाऱ्या धोक्या बद्दल ,आला / आम्हाला पूर्ण समजावण्यात आलेले आहे. <p>

<p>7. I hereby consent to the procedure being performed on me.

<p>उपयोक्त बाबी समजावून घेतल्यानंतर मी माझ्यावर शस्त्रक्रिया करण्याची संमती देत आहे. <p>

<p class="style24"> धन्यवाद ...!<p align="left">
 <table class="table  table-hover text-center">
                            <?php
   
    echo '<tr><th></th>';
    echo '<th>Patient/Relative रुग्ण / नातेवाईक</th>';
    echo '<th>Witness (Relation with patient साक्षीदार (रुग्णाशी नाते )</th>';
    echo '<th> Doctor डॉक्टर</th>';
    echo '<th>Interpreter माहिती समजावून सांगणारे</th>';

    
    echo '</tr>';
    echo '<tr><th>Signature सही </th>';
    
    for ($i = 0; $i < 4; $i++) {
        $signValue = isset($sign_norm[$i]) ? $sign_norm[$i] : ''; 
        echo '<th>'. $signValue . '</th>';
    }
    
    echo '</tr>';
    echo '<tr><th>Name नाव </th>';
    
    for ($i = 0; $i < 4; $i++) {
        $nameValue = isset($name_norm[$i]) ? $name_norm[$i] : ''; 
        echo '<th>' . $nameValue . '</th>';
    }
    
    echo '</tr>';
    echo '<tr><th>Date दिनांक</th>';
    for ($i = 0; $i < 4; $i++) {
        $dateValue = isset($date_norm[$i]) ? $date_norm[$i] : ''; 
          echo '<th>' . $dateValue . '</th>';
    }
    
    echo '</tr>';
    echo '<tr><th>Time वेळ </th>';

    for ($i = 0; $i < 4; $i++) {
        $timeValue = isset($time_norm[$i]) ? $time_norm[$i] : ''; 
         echo '<th>' . $timeValue . '</th>';
    }
    
    echo '</tr>';
    
        
  ?> </table>
  
<script>
    window.print();
</script>
</body>
</html>


	