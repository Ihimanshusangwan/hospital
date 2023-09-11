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
  $query5 = "UPDATE `general_consent` SET
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
        echo "<div class='alert alert-success'> Updated Successfully</div>";
    }
}
$sql6="SELECT * FROM `general_consent` WHERE `id` = '$id' ";
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
    tboody,
    th,
    td {
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
            <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
                id="dashboard">Dashboard</a>
            <a href="general_consent_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger"
                id="dashboard">Print</a>
        </div>
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class="text-center text-dark my-3 ">GENERAL INFORMED CONSENT FORM</h3>
        <div class="row">
            <div class="col-md-3">
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

        <h6 class="text-center text-dark my-3 ">For Authorization of Medical Trestmrnt ,Administration of Anesthesia,
            Performance of Surgery or any Procedure,</h6>
        <h6 class="text-center text-dark my-3">Diagnostic / Therapeutic Procedures or any investigations.</h6>


        <p> 1. I Hereby authorize the hospital and those to whome hospital recognize as "Hospital Staff" to perform upon
            medical Tretment , Administration of Anaestesia, Performance of Surgery or any Procedure,Doagnostic /
            Therapeutic Procedures or any Investigations or any other as required by my treating Consultant.
        <p class="style24">मी / आम्ही वरील हॉस्पिटल आणि हॉस्पिटल तर्फे नियुक्त करण्यात आलेल्या कर्मचाऱ्यास माझ्यावर /
            माझ्या रुग्णावर चिकित्सेसाठी कुठल्याही प्रकारची भूल देणे , शास्त्रकिया करणे , तपासण्या करणे किंवा इतर
            कोणत्याही बाबी ज्या माझे डॉक्टर सुचवतील त्या करण्याची संमती देत आहे.
        <p>2. It has been explained to me that during the course of operation or procedures,unforeseen conditions may be
            revaled which may require surgical or other emergency procedures in addition or diffrrent from
            thosecontemplated at the time of initial diagnosis.I therefore further authorize the above designated staff
            to perform such additional surgical or other procedures as they deem necessary or desirable.

        <p>शल्य चिकित्सा / चिकित्सा करताना उध्दभवू शकणाऱ्या आपत्कालीन परिस्थिती बाबत मला सविस्तर माहिती देण्यात आलेली
            आहे. आपत्कालीन परिस्थिती मध्ये आधी निश्चित करण्यात आलेल्या प्रक्रिये पेक्षा इतर शल्य चिकित्सा किंवा इतर
            आपत्कालीन चिकित्सा करण्यात येऊ शकते याबाबत मला कल्पना देण्यात आलेली आहे. मी रुग्णालया तर्फे नियुक्त करण्यात
            आलेल्या कर्मचाऱ्यांना अशा प्रकारची चिकित्सा करण्यास संमती देत आहे.

        <p>3. I consent to the administration of anesthesia and for such anesthesthecs may be required or desirable
            other than the procedure recommended for me.

        <p>मी माझ्यावर ठरविण्यात आलेल्या चिकीत्से व्यतिरिक्त भूल देणे तसेच इतर गरजेच्या प्रक्रियेस संमती देत आहे .

        <p>4. I state that I will not hide my past medical History and Allergic Conditions , Drug reactions, any past
            adverse medical events to my consultant.

        <p>मी याची खात्री देत आहे . की , मी माझा / माझ्या रुग्णाचा मागील इतिहास , अलर्जी , औषधाची रिअक्शन या बाबत
            डॉक्टरांना पूर्ण कल्पना देईल.

        <p>5. I have been explained in detail about the purpose and nature of procedures proposed to carried out on me.
            I have also been told the possible alternative methods, the prognosis and possibility of complication.

        <p>मला शस्त्रक्रियेचा प्रकार ,उद्धेश ,पद्धत , आवश्यक अन्य संभाव्ये वैकल्पिक प्रक्रिया ,चिकित्सेचे धोके तसेच
            संभाव्ये गुंतागुंत या बाबत कल्पना देण्यात आलेली आहे.

        <p>6. I further consent to the administration of such durg,infusion,plasmaor blood transfusion or any other
            procedure that deemed to be necessary .

        <p>मी संपूर्ण माहिती जाणून संबंधित कर्मचाऱ्यास औषधी / रक्त / प्लास्मा / ट्रान्सपुजन किंवा अन्य आवश्यक क्रिया
            करण्यास संमती देत आहे.

        <p>7. I have been given an oppportunity to ask all questions and I also have been given opportunity to ask for
            any second opinion.

        <p>शस्त्रक्रिया / चिकित्से संबधी प्रश्न विचारण्याची व त्याची उत्तरे जाणण्याची पूर्ण संधी मला देण्यात आलेली आहे.

        <p>8. I acknowledge that no guarantee and promises have been made concerning the result of any procedyre or
            treatment.

        <p>शस्त्रक्रिया / उपचारा बाबत कोणतीही खात्री देता येत नाही . या बाबत मला जाणीव करून देण्यात आलेली आहे.

        <p>9. I consent to photographing or recording of the opration or procedurs for medical , scientific or
            educational purpose provided that my identity is not revealed by the pictures or by descriptive texts
            accompanying them .

        <p>माझी ओळख उघड न करण्याच्या अटीवर वैज्ञानिक किंवा शैक्षणिक कारणासाठी माझ्या वर करण्यात येणाऱ्या शास्त्रकिया /
            उपचाराचे चित्रीकरण करण्यास किंवा फोटो काढण्यास मी संमती देत आहे.

        <p>10. For the purpose of advanced medical education , I hereby give consent to the attendance of observers to
            the oprating room.

        <p>वैद्यकीय शिक्षणाच्या दृष्टीने माझ्या शस्त्रक्रियेच्या / उपचाराच्या दरम्यान निरीक्षकास उपस्थित राहण्याची
            परवानगी देत आहे.

        <p>11 . I also give consent to the disposal by hospital authorities any tissues or parts , which may be removed
            during the course of oprative procedure / treatment.

        <p>शस्त्रक्रियेच्या दरम्यान काढलेला शरारीचा निकामी अवयव / मासलभाग नष्ट करण्याची परवानगी देत आहे.

        <p>12. I certify that satatements made in above consent letter have been read over and explained to me in the
            language I understand . I totally understood the implications of the above consent and agree for it.

        <p>मी प्रमाणित करतो की , उपरोक्त संमती पात्रातील मजकूर संपूर्णपणे समजावून घेतला आहे. संमतीच्या परिणामां बाबत मला
            खात्री असून मी याबाबत पूर्णपणे सहमत आहे.

        <p>13. I understand that all papers related to my treatment in this hospital would be kept safe custody of
            hospital which is also legally essential for the hospital. I give consent that if I require , I will get
            summery and / or attested photocopy of the same.

        <p>माझ्या चिकीत्से संबंधित सर्व कागद पत्रे सुरक्षित ठेवतील याबाबत मला खात्री आहे. जे की कायद्याच्या तरतुदी नुसार
            आवश्यक आहे. मला संबंधित कागदपत्रांची गरज भासल्यास हॉस्पिटल प्रशासनाकडून मला ती संक्षिप्त स्वरूपात किंवा
            छायांकित स्वरूपात स्वीकारण्याची मी संमती देत आहे.

        <p>



        <p class="style10"> धन्यवाद ...!

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
                    <td> <input class="form-control" type="text" value="<?php echo $res6['sign_1']; ?>" name="sign_1">
                    </td>
                    <td> <input class="form-control" type="text" value="<?php echo $res6['name_1']; ?>" name="name_1">
                    </td>
                    <td> <input class="form-control" type="date" value="<?php echo $res6['date_1']; ?>" name="date_1">
                    </td>
                    <td> <input class="form-control" type="time" value="<?php echo $res6['time_1']; ?>" name="time_1">
                    </td>
                </tr>
                <tr>
                    <td> <label class="style11">Witness (Relation with Patient / साक्षीदार(रुग्णाशी नाते ))
                    </td>
                    <td> <input class="form-control" type="text" value="<?php echo $res6['sign_2']; ?>" name="sign_2">
                    </td>
                    <td> <input class="form-control" type="text" value="<?php echo $res6['name_2']; ?>" name="name_2">
                    </td>
                    <td> <input class="form-control" type="date" value="<?php echo $res6['date_2']; ?>" name="date_2">
                    </td>
                    <td> <input class="form-control" type="time" value="<?php echo $res6['time_2']; ?>" name="time_2">
                    </td>
                </tr>
                <tr>
                    <td><label class="style11">Doctor /डॉक्टर</label> </td>
                    <td> <input class="form-control" type="text" value="<?php echo $res6['sign_3']; ?>" name="sign_3">
                    </td>
                    <td> <input class="form-control" type="text" value="<?php echo $res6['name_3']; ?>" name="name_3">
                    </td>
                    <td> <input class="form-control" type="date" value="<?php echo $res6['date_3']; ?>" name="date_3">
                    </td>
                    <td> <input class="form-control" type="time" value="<?php echo $res6['time_3']; ?>" name="time_3">
                    </td>
                </tr>
                <tr>
                    <td class="style11">Anesthetist / भूलतज्ञ </td>
                    <td> <input class="form-control" type="text" type="text" value="<?php echo $res6['sign_4']; ?>"
                            name="sign_4"></td>
                    <td> <input class="form-control" type="text" type="text" value="<?php echo $res6['name_4']; ?>"
                            name="name_4"></td>
                    <td> <input class="form-control" type="date" type="text" value="<?php echo $res6['date_4']; ?>"
                            name="date_4"></td>
                    <td> <input class="form-control" type="time" type="text" value="<?php echo $res6['time_4']; ?>"
                            name="time_4"></td>
                </tr>
                <tr>
                    <td class="style11">Interpreter / माहिती समजावून सांगणारे </td>
                    <td> <input class="form-control" type="text" type="text" value="<?php echo $res6['sign_5']; ?>"
                            name="sign_5"></td>
                    <td> <input class="form-control" type="text" type="text" value="<?php echo $res6['name_5']; ?>"
                            name="name_5"></td>
                    <td> <input class="form-control" type="date" type="text" value="<?php echo $res6['date_5']; ?>"
                            name="date_5"></td>
                    <td> <input class="form-control" type="time" type="text" value="<?php echo $res6['time_5']; ?>"
                            name="time_5"></td>
                </tr>
            </table>
            <button class="btn btn-primary d-flex mx-auto" name="save">save</button>
        </form>
    </div>
</body>

</html>