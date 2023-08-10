<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style>
        body {
            margin: 0;
        }
        .style5 {color: #333333}
.style10 {font-size: 15px}
.style11 {font-size: 16px}

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

            #button {
                display: none !important;
            }

            @page {
                size: A4;
            }

            .noprint {
                visibility: hidden;
            }
        }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="highrisk_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">HIGHRISK CONSENT FORM </h3>
    <h3 class="text-center text-dark my-3 "> अतिजोखीम संमती पात्र </h3>
    
    <?php include_once("../header/header.php") ?>
    <p class="style11"> 1.	I have been explained about the procedure / Surgery to be performed in this hospital <p class="style11">
<p class="style11">मला / आम्हाला रुग्णावर करण्यात येणाऱ्या उपचार / शस्त्रक्रिये बाबत माहिती देण्यात आलेली आहे.  <p class="style11">
	
	<p class="style11"> २. Ihave been explained about high risk involved in the above procedure / surgery  .  </p>
	<p class="style11"> वरील प्रक्रये / शल्यक्रियेमध्ये  सहभागी झालेल्या उच्च जोखमी बद्दल मला समजावून सांगितले गेले आहे.  <p class="style11">

	<p class="style11"> 3.	I have been explained about treatment options and probable benefits and high risk involved in each by my doctor . <p class="style11">
	
	<p class="style11"> या उपचार / शास्त्र क्रियेचा पद्धतीस उपलब्ध असलेल्या पर्यायी उपचार पद्धती तसेच त्यामुळे होणारे फायदे तसेच धोके या बाबत डॉक्टरांनी मला / आम्हाला माहिती दिलेली आहे.  <p class="style11">
	
	<p class="style11"> ४.	I understand that patients condition can deteriorate further and there is a high risk involved during or after the procedure / surgery including mortality .  <p class="style11">
	
	<p class="style11"> या उपचार / शस्त्रक्रियेच्या दरम्यान किंवा या उपचार / शस्त्रक्रियेच्या पद्धतीच्या नंतर रुग्णाची तब्येत आणखी खालावू शकते व त्यामुळे मृत्यू सुद्धा उध्दभवू शकतो याची मला / आम्हाला कल्पना आहे. .  <p class="style11">
		
		<p class="style11"> ५. I also have been explained that the patient may need prolong ICU/ICCU/PICU care which may include use of ventilator,intra aortic balloon pulsation etc. with an additional mortality and morbidity. </span> <p>		
		<p class="style10 style11"> मला / आम्हाला / अशीही जाणीव करून देण्यात आलेली आहे कि , या उपचार / शस्त्रक्रियेच्या पद्धतीच्या दरम्यान रुग्णास दीर्घकाळ आय. सी. यु . / आय .सी.सी.यु . / एन .आय .सी .यु . मध्ये राहावे लागेल ज्यामध्ये व्हेंटिलेटर व इतर आधुनिक यंत्राचा वापर करावा लागेल ज्यामध्ये मृत्यूचा धोका उध्दभवू शकतो . .  <p class="style11">
		
	<p class="style11"> ६.	I am ready for getiing investigation , administration of medications , Injections , IV fluds , blood and blood products or any other advice suggested by doctor  .<p class="style11">	
	<p class="style11"> डॉक्टरांकडून सांगण्यात आलेल्या सर्व तपासण्या ,औषधउपचार ,इंजेक्शन , रक्त व रक्तघटक बद्धल करण्यास मी तयार आहे. <p class="style11">
	
<p class="style11"> ७.	I have been explained that medical condition of patient is grave and management involves high risk that includes possibilities of loss of life , incapacitation or long / short term disabilities.<p class="style11">

<p class="style11"> रुग्णाची तब्येत गंभीर असल्या बाबत मला कल्पना देण्यात अली असून त्याचे उपचार करताना मृत्यू , असमर्थता किंवा अपंगत्व येण्याची शक्यता आहे याची मला / आम्हाला जाणीव आहे.  <p class="style11">

<p class="style11"> ८.	I have been explained about approximate expected expenditure. <p class="style11">

<p class="style11"> उपचारासाठी लागणाऱ्या अपेक्षित खर्चा बाबत मला / आम्हाला कल्पना देण्यात आलेली आहे.  <p>

<p class="style11"> 9.	I have been given opportunity to ask question about patient's condition , treatment details etc.All question's answers are answered satisfactorily. <p class="style11">

<p class="style11"> रुग्णाच्या शारीरिक स्थिती बाबत तसेच त्याच्या आजार बाबत मला प्रश्न विचारण्याची संधी देण्यात आलेली आहे व त्या संबंधित सर्व शंकाचे निरसन करण्यात आलेले आहे. <p>

<p class="style11"> 10.	I hereby give consent for the above Treatment / Surgery / Procedure out of my own free will. <p class="style11">

<p class="style11"> मी स्वखुशीने माझ्या रुग्णाच्या उपचार / शास्त्रक्रियेस व संबंधित प्रक्रियेस संमती देत आहे .  <p>


<style>
table, th, td {
  border:1px solid black;
}
</style> 
<h2>
<table width="78%" frame="above" id="2" style="width:100%">
  <tr>
    <th width="18%">&nbsp;</th>
    <th width="29%"><p class="style11"><span class="style12">Signature/ सही </span>Name/ नाव</p>        </th>
    <th width="15%"><span class="style11">Name /नाव</span></th>
	<th width="14%"><p class="style11">Date / <span class="style11">दिनांक</span></p>
      </th>
	<th width="24%"><span class="style11">   Time/ वेळ   </span></th>
  </tr>
 
  <tr>
    <td><span class="style11">Patient / Relative रुग्ण / नातेवाईक </span></td>
    <td><span class="style10">       </span></td>
    <td>&nbsp;</td>
	<td><span class="style10">      </span></td>
    <td><span class="style10">      </span></td>
  </tr>
 
  <tr>
  <td><span class="style11">Witness (Relation with Patient / साक्षीदार(रुग्णाशी नाते )) </span></td>
    <td><span class="style10"></span></td>
    <td><span class="style10">         </span></td>
    <td><span class="style10"> </span></td>
    <td><span class="style10">      </span></td>
  </tr>
  <tr>
  <td><span class="style11">Doctor /डॉक्टर</span></td>
  	 <td><span class="style10">   </span></td>
       <td><span class="style10">      </span></td>
       <td><span class="style10">      </span></td>
    <td><span class="style10">       </span></td>
  </tr>
    <tr>
	 <td class="style11">Anesthetist/ भूलतज्ञ  </td>
     <td><span class="style10">      </span></td>
    <td><span class="style10">     </span></td>
    <td><span class="style10"> </span></td>
  <tr>
   <tr> 
   
    <td class="style11">Interpreter /माहिती समजावून सांगणारे </td>
	<td><span class="style10"> </span></td>
    <td><span class="style10">       </span></td>
    <td><span class="style10"> </span></td>
    <td><span class="style10">      </span></td>
  </tr>
</table>
</body>
<script>
    window.print();
</script>

</html>