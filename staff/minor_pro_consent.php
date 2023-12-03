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
    $input_1 = isset($_POST['input_1']) ? $_POST['input_1'] : ''; // Set a default value if the checkbox is unchecked
    $input_2 = isset($_POST['input_2']) ? $_POST['input_2'] : '';
    $input_3 = isset($_POST['input_3']) ? $_POST['input_3'] : '';
    $input_4 = isset($_POST['input_4']) ? $_POST['input_4'] : '';
    $input_5 = isset($_POST['input_5']) ? $_POST['input_5'] : '';
    $input_6 = isset($_POST['input_6']) ? $_POST['input_6'] : '';
    $input_7 = isset($_POST['input_7']) ? $_POST['input_7'] : '';
    $input_8 = isset($_POST['input_8']) ? $_POST['input_8'] : '';
    $input_9 = isset($_POST['input_9']) ? $_POST['input_9'] : '';
    $input_10 = isset($_POST['input_10']) ? $_POST['input_10'] : '';
    $input_11 = isset($_POST['input_11']) ? $_POST['input_11'] : '';
    $input_12 = isset($_POST['input_12']) ? $_POST['input_12'] : '';
    $input_13 = isset($_POST['input_13']) ? $_POST['input_13'] : '';    
  $dr_name_1=$_POST['dr_name_1'];
  $dr_name_2=$_POST['dr_name_2'];
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
  $query5 = "UPDATE `minor_pro_consent` SET
        `input_1` = '$input_1',
        `input_2` = '$input_2',
        `input_3` = '$input_3',
        `input_4` = '$input_4',
        `input_5` = '$input_5',
        `input_6` = '$input_6',
        `input_7` = '$input_7',
        `input_8` = '$input_8',
        `input_9` = '$input_9',
        `input_10` = '$input_10',
        `input_11` = '$input_11',
        `input_12` = '$input_12',
        `input_13` = '$input_13',
        `dr_name_1` = '$dr_name_1',
        `dr_name_2` = '$dr_name_2',
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
$sql6="SELECT * FROM `minor_pro_consent` WHERE `id` = '$id' ";
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
            <a href="minor_pro_consent_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger">Print</a>
        </div>
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class="fl text-center text-dark">INFORMED CONSENT FOR MINOR PROCEDURE</h3>
        <h3 class="text-center text-dark my-3 ">किरकोळ प्रक्रियेसाठी संमती पात्र</h3>


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
        <h6 class="text-center text-dark my-3 "> Name of procedure : (Tick as Applicable) : प्रक्रियेचे नाव - ( योग्य
            ठिकाणी
            खून करावी )</h6>
        <form method="POST">
            <table width="95%" style="width:100%" style="font-size:50px;">

                <tr>
                    <th width="7%"><span class="style8">Sr.No.
                    </th>

                    <th width="30%">
                        Name of Procedure(प्रक्रियेचे नाव)
                    </th>
                    <th width="12%">checkbox</th>
                    <th width="9%"><span class="style8">Sr.No.</th>
                    <th width="30%">
                        Name of Procedure(प्रक्रियेचे
                        नाव)
                    </th>
                    <th width="12%">
                        checkbox
                    </th>
                </tr>
                <tr>
                    <td class="mt-3">
                        01
                    </td>
                    <td>
                        Aspiration(एस्पिरेशन)
                    </td>
                    <td><input type="checkbox" class="form-check-input" <?php echo $res6['input_1']=='on'?'checked':''; ?> name="input_1"></td>
                    <td>
                        08
                    </td>
                    <td>
                        Biopsy(बायोप्सी)
                    <td> <input type="checkbox" class="form-check-input" <?php echo $res6['input_8']=='on'?'checked':''; ?> name="input_8"></td>
                </tr>
                <tr>
                    <td>
                        02
                    </td>
                    <td>
                        Lumbar Puncture(लुम्बारपंचार)
                    <td> <input type="checkbox" class="form-check-input" <?php echo $res6['input_2']=='on'?'checked':''; ?> name="input_2"></td>
                    <td>
                        09
                    </td>
                    <td>
                        Bronchoscopy(ब्रोन्कोस्कोपी)
                    <td> <input type="checkbox" class="form-check-input" <?php echo $res6['input_9']=='on'?'checked':''; ?> name="input_9"></td>
                </tr>
                <tr>
                    <td>
                        03
                    </td>
                    <td>
                        Central Venous Access(सेंट्रल व्हेन्स ऍक्सेस)
                    <td> <input type="checkbox" class="form-check-input" <?php echo $res6['input_3']=='on'?'checked':''; ?> name="input_3"></td>
                    <td>
                        10
                    </td>
                    <td>
                        Arterial Line (अर्टेरियल लाईन)
                    <td> <input type="checkbox" class="form-check-input" <?php echo $res6['input_10']=='on'?'checked':''; ?> name="input_10"></td>
                </tr>
                <tr>
                    <td>04 </td>
                    <td>
                        F.N.A.C.(एफ. एन. ए. सी .)
                    <td>
                        <input type="checkbox" class="form-check-input" <?php echo $res6['input_4']=='on'?'checked':''; ?> name="input_4">
                    </td>
                    <td>11</td>
                    <td>Dialysis (डायलेसिस)
                    <td> <input type="checkbox" class="form-check-input" <?php echo $res6['input_11']=='on'?'checked':''; ?> name="input_11"></td>
                <tr>
                    <td>
                        05
                    </td>
                    <td>
                        Endo tracheal Intubation(इंडोट्रकियाला इंटुबेशन)
                    </td>
                    <td> <input type="checkbox" class="form-check-input" <?php echo $res6['input_5']=='on'?'checked':''; ?> name="input_5"></td>
                    <td>12</td>
                    <td>Ascitic Paracentesis(असायटीक पॅरासेन्सटीसिस)
                    <td> <input type="checkbox" class="form-check-input" <?php echo $res6['input_12']=='on'?'checked':''; ?> name="input_12"></td>
                <tr>
                    <td>
                        06
                    </td>
                    <td>
                        Vein Cut Down(वेन कटडाऊन) >
                    </td>
                    <td> <input type="checkbox" class="form-check-input" <?php echo $res6['input_6']=='on'?'checked':''; ?> name="input_6"></td>
                    <td>13</td>
                    <td>Catheterization(कॅथेटरायजेशन)
                    <td><input type="checkbox" class="form-check-input" <?php echo $res6['input_13']=='on'?'checked':''; ?> name="input_13"></td>
                </tr>
                <tr>
                    <td>
                        07
                    </td>
                    <td>
                        Other(इतर)
                    <td> <input type="checkbox" class="form-check-input" <?php echo $res6['input_7']=='on'?'checked':''; ?> name="input_7">
                </tr>
            </table <br>
            <p class="style11">
            <p class="style11">

            <p class="style11"> 1. I have been advised of my medical condition the benefits , reason for procedure as
                indicated
                by the clinical observations and / or diagnostics performed , the risk of not having the procedure,
                alternative
                test I could have and their risk.
            <p class="style11">
            <p class="style11">माझ्या आरोग्य स्थिती नुसार व करण्यात आलेल्या तपासणी आणि निदान नुसार माझ्यावर करण्यात
                येणाऱ्या
                प्रक्रियेची माहिती देण्यात आलेली आहे. तसेच हि प्रक्रिया करून नाही घेतल्यास ऊध्वनारे संभाव्ये धोके ,
                पर्यायी
                तपासण्या आणि त्यांचे धोके याबाबत माहिती देण्यात आलेली आहे.
            <p class="style11">

            <p class="style11"> २. I recognize that no guarantee have been made regarding like hood of success or
                outcomes
                and
                also whether the procedures will give my doctor any further information and further test may be needed .
            </p>
            <p class="style11"> मला / आम्हाला हे सूचित केले आहे कि येणाऱ्या प्रक्रियेच्या यशस्वितेची पूर्ण खात्री देता
                येत
                नाही
                तसेच या प्रक्रियेनंतर माझ्या डॉक्टरांच्या सल्ल्यानुसार काही तपासण्या करण्यात येऊ शकतात याची मला कल्पना
                देण्यात
                आलेली आहे.
            <p class="style11">

            <p class="style11"> 3. I authorize Dr. <input  type="text" value="<?php echo $res6['dr_name_1']; ?>" name="dr_name_1"> and / or his
                assistants to perform
                above
                mentioned procedure upon me .
            <p class="style11">

            <p class="style11"> मी डॉ .
                <input  type="text" value="<?php echo $res6['dr_name_2']; ?>" name="dr_name_2">
                 आणि त्यांचे सहाय्य्क यांना
                माझ्यावर उपरोक्त
                नमूद
                केलेली
                प्रक्रिया करण्यासाठी संमती देत आहे.
            <p class="style11">

            <p class="style11"> ४. As with any procedure , I am aware that risks as blood loss , infection ,change in
                blood
                pressure , heart failure, anesthetic / allergic reaction ,blood clots in leg etc. may arise which may
                require
                attention . Therefore besides consenting the performance of the procedure , I also consent and authorize
                the
                rendering of such other care and treatment as my doctor and his associates believes necessary.
            <p class="style11">
            <p class="style11"> प्रक्रये दरम्यान रक्तस्राव ,जंतुसंसर्ग,रक्तदाबात फरक हृदय निकामी होण,रक्तात गुठळी
                होणे,अनेस्थेशिया तसेच अलर्जीक रिएक्शन येणे या प्रकारचे धोके उद्भवू शकतात. म्हणून या प्रक्रियेस संमती
                देताना
                यामुळे होणाऱ्या धोक्यांपैकी काही घडल्यास त्यावर लागणाऱ्या उपचारासाठी डॉक्टर व त्यांच्या सहकार्यांना
                संमती
                देतो .
            <p class="style11">
            <p class="style11"><span class="style11"> ५. I agree that biopsy tissue taken during the
                    procedure will be kept for a period of time.

                    <p class="style11"> प्रक्रयेमध्ये काढण्यात आलेला अवयवाचा तुकडा तपासणीसाठी काही जतन करण्यात
                        येऊ शकतो
                        याबाबत
                        मी सहमत आहे.
                    <p class="style11">

                    <p class="style11"> ६. I consent and agree to the sedation to above mentioned anesthetist for
                        performance of
                        the
                        procedure. I am aware that risk of sedation and also consent to supplementation with any other
                        mode of
                        anesthesia if necessary .
                    <p class="style11">
                    <p class="style11"> ६. उपरोक्त नमूद करण्यात आलेल्या प्रक्रियेसाठी बधिरीकरण करण्यासाठी मी उपरोक्त
                        नमूद
                        करण्यात
                        आलेल्या भूल तज्ञयांना संमती देत आहे. मला भूल देण्या मधील धोके याबाबत कल्पना देण्यात आलेली आहे .
                        गरजेनुसार
                        भूल
                        प्रकारात होणाऱ्या बदलास मी संमती देत आहे.
                    <p class="style11">

                    <p class="style11"> ७. I have informed the doctor about all my previous illnesses , allergies , drug
                        reactions ,
                        surgical procedures and any other relevant information relevant to my treatment . I shall not
                        hold the
                        Hospital
                        ,doctor or any staff responsible for any consequence which may arise from the non disclosure of
                        the
                        same.
                    <p class="style11">

                    <p class="style11"> माझ्या डॉक्टरांना माझे आधीचे आजार , एलर्जी , औषधाची रिएक्शन ,शस्त्रक्रिया तसेच
                        माझ्या
                        चिकीत्सेशी
                        संबंधित माहिती दिलेली आहे. याबाबत माहिती न दिल्यामुळे उध्दभवणाऱ्या परिणामा बाबत मी रुग्णालय
                        यातील
                        कर्मचारी
                        यांना
                        जबाबदार ठरवणार नाही.
                    <p class="style11">
                    <p class="style11"> ८. My queries and concerns about my condition , the procedure , cost, risk and
                        treatment
                        options
                        have been discussed with my doctor and answered to my satisfaction.
                    <p class="style11">

                    <p class="style11"> माझ्यावर करण्यात येणाऱ्या प्रक्रिये बाबत माझी शारीरिक स्थिती ,प्रक्रियेची माहिती
                        ,अंदाजे
                        खर्च
                        तसेच उध्दभवू शकणारा धोका व पर्यायी चिकीत्सा पद्धती या बाबत माझ्या शंकाचे मला समाधान होई पर्यंत
                        निरासन
                        करण्यात
                        आलेले आहे.
                    <p>

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