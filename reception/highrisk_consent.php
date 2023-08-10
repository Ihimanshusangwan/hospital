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

if(isset($_POST['save'])){
  $name_1 = $_POST['name_1'];
  $name_2 = $_POST['name_2'];
  $name_3 = $_POST['name_3'];
  $name_4 = $_POST['name_4'];
  $name_5 = $_POST['name_5'];
  $date_1 = $_POST['date_1'];
  $date_2 = $_POST['date_2'];
  $date_3 = $_POST['date_3'];
  $date_4 = $_POST['date_4'];
  $date_5 = $_POST['date_5'];
  $time_1 = $_POST['time_1'];
  $time_2 = $_POST['time_2'];
  $time_3 = $_POST['time_3'];
  $time_4 = $_POST['time_4'];
  $time_5 = $_POST['time_5'];
  $sign_1 = $_POST['sign_1'];
  $sign_2 = $_POST['sign_2'];
  $sign_3 = $_POST['sign_3'];
  $sign_4 = $_POST['sign_4'];
  $sign_5 = $_POST['sign_5'];
  $query5 = "UPDATE `highrisk_consent` SET
        `name_1` = '$name_1',
        `name_2` = '$name_2',
        `name_3` = '$name_3',
        `name_4` = '$name_4',
        `name_5` = '$name_5',
        `sign_1` = '$sign_1',
        `sign_2` = '$sign_2',
        `sign_3` = '$sign_3',
        `sign_4` = '$sign_4',
        `sign_5` = '$sign_5',
        `date_1` = '$date_1',
        `date_2` = '$date_2',
        `date_3` = '$date_3',
        `date_4` = '$date_4',
        `date_5` = '$date_5',
        `time_1` = '$time_1',
        `time_2` = '$time_2',
        `time_3` = '$time_3',
        `time_4` = '$time_4',
        `time_5` = '$time_5' WHERE  `id` = '$id'";

    $data5=$conn->query($query5);
    if($data5){
        echo "sucessfully";
    }
 

  
}
$sql6="SELECT * FROM `highrisk_consent` WHERE `id` = '$id' ";
$data6=$conn->query($sql6);
$res6=$data6->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
        <style type="text/css">
    table,th,td {
        border: 1px solid black;
    }
    input[type="text"] {
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 200px;
        height: 40px;
    }

    input[type="text"]:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 5px #4CAF50;
    }

    input[type="text"]:hover {
        border-color: #555;
    }

    /* Style for placeholder text inside the input field */
    input[type="text"]::placeholder {
        color: #aaa;
    }

    body {
        background: lightgray;
        animation: fade-in 1s linear;
    }

    .fl {
        animation: gelatine 1s;
    }

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px;
    }

    input[type="text"]::placeholder,
    input[type="time"]::placeholder,
    input[type="date"]::placeholder {
        color: lightgrey;
    }

    textarea[type="text"]::placeholder {
        color: lightgrey;
    }

    hr {
        border: 1px solid black;
    }

    label {
        animation: gelatine 1s;

    }

    select {
        animation: gelatine 1s;
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;
    }

    input[type="text"],
    input[type="time"],
    input[type="date"] {
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;

    }

    textarea[type="text"] {
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;
    }

    input[type="text"]:focus,
    input[type="time"]:focus,
    input[type="date"]:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
    }

    textarea[type="text"]:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
    }

    select:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes gelatine {
        0% {
            opacity: 0;
            transform: translateX(2000px);
        }

        60% {
            opacity: 1;
            transform: translateX(-30px);
        }

        80% {
            transform: translateX(10px);
        }

        100% {
            transform: translateX(0);
        }
    }
    </style>
</head>

<body class="m-2">

   <div class="container shadow-lg rounded">
   <div id="button">
    
   <a href="ortho_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
        <a href="highrisk_consent_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger" >print</a>
    </div>
    <h3 class="text-center text-dark my-3 ">HIGHRISK CONSENT FORM </h3>
    <h3 class="text-center text-dark my-3 "> अतिजोखीम संमती पात्र </h3>
    <div class="row" >
      <div class="col-md-3" >
          <label class="form-label">UHID No: <?php echo $res2['uhid'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">IPD No: <?php echo $res2['ipd'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Date of Admission : <?php echo $res2['date'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label" for="time_ad">Time of Admission : <?php echo $res2['time'];?></label>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Name: <?php echo $res['name'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Age: <?php echo $res['age'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Sex: <?php echo $res['sex'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">ICU/Ward Room No: <?php echo $res2['ward/icu'];?></label>
        </div>
      </div>
      

      <div class="row">
        <div class="col-md-3">
          <label class="form-label">Consultant: <?php echo $res['consultant'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Diagnosis: <?php echo $res1['diagnosis'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Bed Number: <?php echo $res2['bed/room'];?></label>
        </div>
    </div> 
    <hr>
   
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

<form method="POST">
<table class="table border border-dark">
                        <tr>
                            <th></th>
                            <th><label class="style12">Signature/ सही </label> </th>
                            <th><label class="style11">Name /</label></th>
                            <th><label class="style11">Date/ दिनांक </label></th>
                            <th><label class="style11"> Time/ वेळ </label></th>
                        </tr>
                        <tr>
                            <td><label class="style11">Patient / Relative रुग्ण / नातेवाईक </label> </td>
                            <td> <input class="form-control" type="text"  value="<?php echo $res6['sign_1']; ?>" name="sign_1"></td>
                            <td> <input class="form-control" type="text" value="<?php echo $res6['name_1']; ?>"  name="name_1"></td>
                            <td> <input class="form-control" type="date"  value="<?php echo $res6['date_1']; ?>" name="date_1"></td>
                            <td> <input class="form-control" type="time" value="<?php echo $res6['time_1']; ?>"  name="time_1"></td>
                        </tr>
                        <tr>
                            <td> <label class="style11">Witness (Relation with Patient / साक्षीदार(रुग्णाशी नाते ))
                            </td>
                            <td> <input class="form-control" type="text"  value="<?php echo $res6['sign_2']; ?>" name="sign_2"></td>
                            <td> <input class="form-control" type="text" value="<?php echo $res6['name_2']; ?>"  name="name_2"></td>
                            <td> <input class="form-control" type="date"  value="<?php echo $res6['date_2']; ?>" name="date_2"></td>
                            <td> <input class="form-control" type="time" value="<?php echo $res6['time_2']; ?>"  name="time_2"></td>
                        </tr>
                        <tr>
                            <td><label class="style11">Doctor /डॉक्टर</label> </td>
                            <td> <input class="form-control" type="text" value="<?php echo $res6['sign_3']; ?>"  name="sign_3"></td>
                            <td> <input class="form-control" type="text" value="<?php echo $res6['name_3']; ?>"  name="name_3"></td>
                            <td> <input class="form-control" type="date" value="<?php echo $res6['date_3']; ?>"  name="date_3"></td>
                            <td> <input class="form-control" type="time" value="<?php echo $res6['time_3']; ?>"  name="time_3"></td>
                        </tr>
                        <tr>
                            <td class="style11">Anesthetist / भूलतज्ञ </td>
                            <td> <input class="form-control" type="text"    type="text" value="<?php echo $res6['sign_4']; ?>" name="sign_4"></td>
                            <td> <input class="form-control" type="text"  type="text" value="<?php echo $res6['name_4']; ?>" name="name_4"></td>
                            <td> <input class="form-control" type="date"   type="text" value="<?php echo $res6['date_4']; ?>" name="date_4"></td>
                            <td> <input class="form-control" type="time"   type="text" value="<?php echo $res6['time_4']; ?>" name="time_4"></td>
                        </tr>
                        <tr>
                            <td class="style11">Interpreter / माहिती समजावून सांगणारे </td>
                            <td> <input class="form-control" type="text"   type="text" value="<?php echo $res6['sign_5']; ?>" name="sign_5"></td>
                            <td> <input class="form-control" type="text"   type="text" value="<?php echo $res6['name_5']; ?>" name="name_5"></td>
                            <td> <input class="form-control" type="date"   type="text" value="<?php echo $res6['date_5']; ?>" name="date_5"></td>
                            <td> <input class="form-control" type="time"   type="text" value="<?php echo $res6['time_5']; ?>" name="time_5"></td>
                        </tr>
                    </table>
                    <button class="btn btn-primary d-flex mx-auto" name="save">save</button>
</form>
   </div>
</body>

</html>