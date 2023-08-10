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


$sql3 = "SELECT * FROM ipd_bill2 WHERE id = '$id';";
$data3 = $conn->query($sql3);
$res3 = $data3->fetch_assoc();

$sql4 = "SELECT * FROM discharge WHERE id = '$id';";
$data4 = $conn->query($sql4);
$res4 = $data4->fetch_assoc();

$query = "SELECT * FROM ipd_bill1 WHERE id='$id'";
$bill = $conn->query($query)->fetch_assoc();
$bills = json_decode($bill['description']);
$year = date("Y");

$sql6=mysqli_query($conn,"SELECT * FROM general_info_consent WHERE id =$id");
$row6=mysqli_fetch_assoc($sql6);

$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style type="text/css">
<!--
.style1 {font-size: 12px}
.style3 {
	font-size: 24px;
	font-weight: bold;
}
.style4 {font-size: 14px}
-->
    </style>
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

        @media print {
            .noprint {
                visibility: hidden;
            }
        }
    </style>
</head>
<body>
<div id="button">
            <a href='general_info_consent.php?id=<?php echo $id;?>' class="btn btn-primary m-2 noprint">Dashboard</a>
            <a class="btn btn-primary m-2 noprint" onclick="window.print()">Print</a>
        </div>

    </p>

    <?php include_once("../header/images.php") ?>
    <p align="center">
<h1 align="center"><span class="style3"> GENERAL INFORMED CONSENT FORM</span></h1>
	   <p align="center"> 
	   <h1>
	   <div align="center">
	     <p><span class="style3 style4">For Authorizatio</span><span class="style4">n of Medical Treatment, Administration of Anesthesia,Performance of Surgery or any procedure,</span></p>
	    
</div>
      <h1 align="center" class="style4">Dignostic/Therapeutic Procedures or any Investigations</h1>
      <?php include_once("../header/header.php") ?>
      
		
	          
		  
		  
		  
</div>
		<p> 1. I Hereby authorize the Hospital and those to whome hospital recognize as"Hospital Staff " to perfonn upon meMedical Treatment, Administration of Anaestesia, Perfonnance of Surgery or any Procedure, Diagnostic!
Therapeutic Procedures or any Investigations or any other as required by my treating Consultant.</p>

        <p> मी वरील हॉस्पिटल आणि हॉस्पिटल तर्फे नियुक्त करण्यात आलेल्या कर्मचाऱ्यास माझ्यावर / माझ्या रुग्णावर चिकित्सेसाठी कुठल्याही प्रकारची भूल देणे , शास्त्रक्रिया करणे ,तपासण्या करणे किंवा इतर कोणत्याही बाबी ज्या माझे डॉक्टर सुचवतील त्या करण्याची संमती देत आहे .</p>
	
	<p>2.   It has been explained to me that during the course of Opration or Procedures,unforeseen conditions may be revealed which may require surgical or other emergency procedures in addition or different form those contemplated at the time of initial diagnosis.I therefore further authorize the above designated staff to perform such additional surgical or other procedures as they deem necessary or desirable.</p>

	<p>शल्य चिकित्सा / चिकित्सा  करताना उद्भवू शकणाऱ्या आपत्कालीन परिस्थिती बाबत मला सविस्तर माहिती देण्यात आलेली आहे. आपत्कालीन परिस्थिती मध्ये आधी निश्चित करण्यात आलेल्या प्रक्रिये पेक्षा इतर शल्य चिकित्सा किंवा इतर आपत्कालीन चिकित्सा करण्यात येऊ शकते या बाबत मला कल्पना देण्यात अली आहे. मी रुग्णालया तर्फे नियुक्त करण्यात आलेल्या कर्मचाऱ्यांना अशा प्रकारची चिकित्सा करण्यास संमती देत आहे.</p>

	<p> 3. I consent to the administration of aneshesai and for such anesthetics may be required or desirableotherthantheprocedurere rcommended for me . <p>
	
	<p> मी माझ्या वर ठरविण्यात आलेल्या चिकित्से  व्यतिरिक्त भूल देणे तसेच इतर गरजेच्या प्रक्रियेस संमती देत आहे.<p> 
	
	<p> 4.  I state that I will not hide my past medical History and Allergic Condition, Drug reactions, any past adverse medical evevents to my consultant .<p>
	
	<p> मी याची खात्री देत आहे , की मी माझा / माझ्या रुग्णाचा मागील वैद्यकीय इतिहास , अलर्जी , औषधाची रिएक्शन या बाबत डॉक्तरांना पूर्ण  कल्पना देईल .<p>
	
	<p> 5. I have been expained in detail about the purpose and nature of procedures proposed to carried out on me.I have also been told the possible alternative methods, the prognosis and possibility of complication . <p>
	<p> मला शस्त्रक्रियेचा  प्रकार , उद्देश ,पद्धत ,आवश्यक अन्य संभाव्य गुंतागुंत या बाबत कल्पना देण्यात आलेली आहे. <p>
	<p> 6. I furder consent to the administration of such drugs , infusions, plasma or blood transfusion or any other procedure that deemed to be necessary.
	<p> मी संपूर्ण माहिती जाणून संबंधित कर्मचाऱ्यास औषध /रक्त /प्लास्मा /ट्रान्सपुजन किंवा अन्य आवश्यक क्रिया करण्यास संमती देत आहे. <p>
<p> 7. I have been given an ooportunity to ask all questions and I also have been given opportunity to ask for second opinion.<p>
    
	<p> शस्रक्रिया / चिकीत्से संबंधी प्रश्न विचारण्याची व त्याची उत्तरे जाणण्याची पूर्ण संधी मला देण्यात आलेली आहे. <p>
	
	<p> 8. I acknowledge that no guarantee and promises have been made concerning yhe result of any procedure treatment. <p>
	
	<p> शस्रक्रिया / उपचार बाबत कोणती हि खात्री देता येत नाही . याबाबत मला जाणीव करून देण्यात आलेली आहे. <p>
	
	<p> 9. I consent to photographing or recording of opration or procedures for medical,scientific or  educational purpose provideed that my identity is not revealed by the pictures or by descriptive texts accompanying them . <p>
	
	<p> माझी ओळख उघड न करण्याच्या अटीवर वैज्ञानिक किंवा शैक्षणिक कारणासाठी माझ्यावर करण्यात येणाऱ्या शास्त्रक्रया / उपचाराचे चित्रीकरण करण्यास किंवा फोटो काढण्यास मी संमती देत आहे.  <p> 
	
	<p> 10 .For the purpose of advanced medical education, I hereby give consent to the attendance of observers to the oprating Room. <p>
	<p> वैद्यकीय शिक्षणाच्या दृष्टीने माझ्या शस्र्क्रियेच्या / उपचाराच्या दरम्यान निरीक्षका 
सउपस्थित राहण्याची परवानगी देत आहे. <p>

<p> 11.  I also give consent to the disposal by hospital authorities any tissues or part , which may be removed during the course of oprative procedure / treatment .<p>
	
<p> शस्त्रक्रियेच्या दरम्यान काढलेला शरीराचा निकामी अवयव / मासलभाग  नष्ट करण्याची परवानगी मी रूग्णालयास देत आहे. <p>

<p> 12. I certify that the statments made in above consent letter have been read over and explained to me in the language I undderstand.I totally understood the implications of the above consent and agree for it.<p>	
<p> मी प्रमाणित  करतो कि , उपरोक्त संमती पत्रकातील मजकूर संपूर्णपणे समजावून घेतला आहे . संतीच्या परिणाम बाबत  मला खात्री असून मी  या बाबत पूर्णपणे सहमत आहे .<p>

<p> I understand that all papers related to my treatment in this hospital wold be kept safe custody of hospital which is also legally esential for the hospital. I give consent that if I require , I will get the summery and / or attested photocopy of the same. <p>

<p> माझ्या चिकित्से संबंधित सर्व कागद पत्रे सुरक्षित ठेवतील या बाबत मला खात्री आहे . जे कि कायद्याच्या तरतुदी नुसार आवश्यक आहे. मला संबंधित कागदपत्रांची गरज भासल्यास हॉस्पिटल प्रशासनाकडून मला ती संक्षिप्त स्वरूपात किंवा छायांकित स्वरूपात स्वीकारण्याची मी संमती देत आहे.  <p>

<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>


<table class="text-center" style="width:100%">
<tr>
    <th></th></th>
    <th>Signature </th> 
	<th>Name</th>
	<th>Date</th>
  </tr>
  <tr>
    <td>Patient / Relative :</td>
    <?php 
    ?>
    <td><?php echo $row6['sign1'];?></td>
    <td><?php echo $row6['name1'];?></td>
    <td><?php echo $row6['date1'];?></td>
      </tr>
  <tr>
    <td>Witness ( Relation with patient ):</td>
    <td><?php echo $row6['sign2'];?></td>
    <td><?php echo $row6['name2'];?></td>
    <td><?php echo $row6['date2'];?></td>
  </tr>
  <tr>
    <td>Doctor :</td>
    <td><?php echo $row6['sign3'];?></td>
    <td><?php echo $row6['name3'];?></td>
    <td><?php echo $row6['date3'];?></td>
  </tr>
  <tr>
    <td>Interpreter:</td>
    <td><?php echo $row6['sign4'];?></td>
    <td><?php echo $row6['name4'];?></td>
    <td><?php echo $row6['date4'];?></td>
	</tr>
</table>

<script>
    window.print();
</script>
</body>
</html>
