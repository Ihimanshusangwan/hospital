<?php
 require("../admin/connect.php");
 $id = $_GET['id'];
 session_start();

 $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
 $row=mysqli_fetch_assoc($sql);

 $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
 $row1=mysqli_fetch_assoc($sql1);

 $sql2=mysqli_query($conn,"SELECT * FROM p_insure WHERE id = '$id';");
 $row2=mysqli_fetch_assoc($sql2);

 $sql3=mysqli_query($conn,"SELECT * FROM patient_images WHERE uhid = '{$row2['uhid']}';");
 $row3=mysqli_fetch_assoc($sql3);
 

 $sql = "SELECT * FROM titles WHERE id = 1;";
 $data = $conn->query($sql);
 $title = $data->fetch_assoc();
 
$x=0;
if(isset($_POST['submit'])){

    $sign1=$_POST['sign1'];
    $sign2=$_POST['sign2'];
    $sign3=$_POST['sign3'];
    $sign4=$_POST['sign4'];
    $name1=$_POST['name1'];
    $name2=$_POST['name2'];
    $name3=$_POST['name3'];
    $name4=$_POST['name4'];
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];
    $date3=$_POST['date3'];
    $date4=$_POST['date4'];


    $update="UPDATE general_info_consent SET
    sign1='$sign1',
    sign2='$sign2',
    sign3='$sign3',
    sign4='$sign4',
    name1='$name1',
    name2='$name2',
    name3='$name3',
    name4='$name4',
    date1='$date1',
    date2='$date2',
    date3='$date3',
    date4='$date4'
    WHERE id =$id;
    ";
    
$sql5=mysqli_query($conn,$update);
    $x=1;
}
    $sql6=mysqli_query($conn,"SELECT * FROM general_info_consent WHERE id =$id");
    $row6=mysqli_fetch_assoc($sql6);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style type="text/css">
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
        
table, th, td {
  border:1px solid black;
}
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
    <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
        <h3 class=" fl text-center text-dark">GENERAL INFORMED CONSENT FORM</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="generalINformConsent.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <div class="row">
      <div class="col-md-12">
      <p> 1. I Hereby authorize the Hospital and those to whom hospital recognize as"Hospital Staff " to perfonn upon meMedical Treatment, Administration of Anaestesia, Perfonnance of Surgery or any Procedure, Diagnostic!
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
<form method="POST" action="">

<table style="width:100%">
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
    <td>
    <img src="<?php echo"../reception/{$row3['path']}" ;?>" alt="">
        <!-- <input  type="text" class="form-control" id="" placeholder="Patient/ Relative Sign" name="sign1" value=" -->
        <?php 
        // echo $row6['sign1'];
        ?>
        <!-- "> -->
</td>
    <td><input  type="text" class="form-control" id="" placeholder="Patient/ Relative Name" name="name1" value="<?php echo $row6['name1'];?>"></td>
    <td><input  type="date" class="form-control" id="" placeholder="Date" name="date1" value="<?php echo $row6['date1'];?>"></td>
      </tr>
  <tr>
    <td>Witness ( Relation with patient ):</td>
    <td><input  type="text" class="form-control" id="" placeholder="Witness Sign" name="sign2" value="<?php echo $row6['sign2'];?>"></td>
    <td><input  type="text" class="form-control" id="" placeholder="Witness Name" name="name2" value="<?php echo $row6['name2'];?>"></td>
    <td><input  type="date" class="form-control" id="" placeholder="Date" name="date2" value="<?php echo $row6['date2'];?>"></td>
  </tr>
  <tr>
    <td>Doctor :</td>
    <td><input  type="text" class="form-control" id="" placeholder="Doctor Sign" name="sign3" value="<?php echo $row6['sign3'];?>"></td>
    <td><input  type="text" class="form-control" id="" placeholder="Doctor Name" name="name3" value="<?php echo $row6['name3'];?>"></td>
    <td><input  type="date" class="form-control" id="" placeholder="Date" name="date3" value="<?php echo $row6['date3'];?>"></td>
  </tr>
  <tr>
    <td>Interpreter:</td>
    <td><input  type="text" class="form-control" id="" placeholder="Interpreter Sign" name="sign4" value="<?php echo $row6['sign4'];?>"></td>
    <td><input  type="text" class="form-control" id="" placeholder="Interpreter Name" name="name4" value="<?php echo $row6['name4'];?>"></td>
    <td><input  type="date" class="form-control" id="" placeholder="Date" name="date4" value="<?php echo $row6['date4'];?>"></td>
	</tr>
</table>  <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
                            </form>

</body>

</html>