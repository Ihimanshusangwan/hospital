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
    $input_1 = isset($_POST['input_1']) ? $_POST['input_1'] : '';
    $input_2 = isset($_POST['input_2']) ? $_POST['input_2'] : '';
    $input_3 = isset($_POST['input_3']) ? $_POST['input_3'] : '';
    $input_4 = isset($_POST['input_4']) ? $_POST['input_4'] : '';
    $input_5 = isset($_POST['input_5']) ? $_POST['input_5'] : '';
    $input_6 = isset($_POST['input_6']) ? $_POST['input_6'] : '';
    $input_7 = isset($_POST['input_7']) ? $_POST['input_7'] : '';
    $input_8 = isset($_POST['input_8']) ? $_POST['input_8'] : '';
    $check_1 = isset($_POST['check_1']) ? $_POST['check_1'] : ''; 
    $check_2 = isset($_POST['check_2']) ? $_POST['check_2'] : '';
    $check_3 = isset($_POST['check_3']) ? $_POST['check_3'] : '';
    $check_4 = isset($_POST['check_4']) ? $_POST['check_4'] : '';
    $check_5 = isset($_POST['check_5']) ? $_POST['check_5'] : '';
    $other=$_POST['other'];
    $p_sign = $_POST['p_sign'];
    $p_time = $_POST['p_time'];
    $wit_name = $_POST['wit_name'];
    $wit_details = $_POST['wit_details'];
    $wit_date = $_POST['wit_date'];
    $wit_rel = $_POST['wit_rel'];


  $query5 = "UPDATE `discharge_dama_consent` SET
        `input_1` = '$input_1',
        `input_2` = '$input_2',
        `input_3` = '$input_3',
        `input_4` = '$input_4',
        `input_5` = '$input_5',
        `input_6` = '$input_6',
        `input_7` = '$input_7',
        `input_8` = '$input_8',
        `check_1` = '$check_1',
        `check_2` = '$check_2',
        `check_3` = '$check_3',
        `check_4` = '$check_4',
        `check_5` = '$check_5',
        `other`='$other',
        `p_sign`='$p_sign',
        `p_time`='$p_time',
        `wit_name`='$wit_name',
        `wit_details`='$wit_details',
        `wit_rel`='$wit_rel',
        `wit_date`='$wit_date'
                WHERE  `id` = '$id' ";

    $data5=$conn->query($query5);
    if($data5){
        echo "<div class='alert alert-success'> Updated Successfully</div>";
    }
 

  
}
$sql6="SELECT * FROM `discharge_dama_consent` WHERE `id` = '$id' ";
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
    input[type="text"] {
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 200px;
        height: 30px;
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
            <a href="discharge_dama_consent_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger"
                id="dashboard">print</a>
        </div>
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class="text-center text-dark my-3 ">CONSENT FOR DISCHARGE AGAINST MEDICAL ADVICE (DAMA)</h3>
        <h3 class="text-center text-dark my-3 "> वैधकीय सल्ल्याविरुद्ध डिस्चार्ज बाबत सामंती पात्र </h3>
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
        <form method="post">

            <p class=" style10" style="margin-top:40px;"> I / My patient &nbsp;<input type="text" name="input_1"
                    value="<?php echo $res6['input_1']?>">&nbsp; admitted in SIDDHIVINAYK NETRALY In Bed
                No. &nbsp;<input type="text" name="input_2" value="<?php echo $res6['input_2']?>">&nbsp;-under Dr.
                &nbsp;<input type="text" name="input_3" value="<?php echo $res6['input_3']?>">&nbsp; from &nbsp;<input
                    type="date" name="input_4" value="<?php echo $res6['input_4']?>">&nbsp;taking discharge against the medical advice of
            the in charge physician / Surgeon and the hospital administration . Doctor has explained us the vital satate
            of patient and seriousness of patient . The explanation by the doctor is understood by us , we do not wish
            to continue the treatment and withhold the consent for treatment of the patient and wish to go discharge
            sgsinst medical advice. If Any Serious Complication Arises No Treating Doctor,Nursing Staff , Para-Medical
            Or Hospital Administration Will be held responsible .We have been explained as per the hospital rles we
            won't get any document and all report will be stored in hospital and instead Xerox copy of documents will be
            given to us and we agree to this , in future if any document needed it will be produced on payment of
            documentation fee as decided by administration . I am fully aware of the risk involved and here by release
            the incharge and attending physician / Surgeon and the hospital administration from all responsibilities for
            any adverse effect which may result from such leave from the hospital . And by signing below I agree to the
            terms and conditions along with ruls and regulation of hospital management for patients taking LAMA / DAMA.
        </p>

        <p class=" style10"> मी खाली स्वाक्षरी करणार &nbsp;
            <input type="text" name="input_5" value="<?php echo $res6['input_5']?>"> &nbsp;असे लिहून देतो /देते की , मी /माझा रुग्ण
                श्री सिद्धिविनायक नेत्रालय येथे दिनांक&nbsp; <input type="date" name="input_6"
                    value="<?php echo $res6['input_6']?>">&nbsp; पासून&nbsp; <input type=" text" name="input_7"
                    value="<?php echo $res6['input_7']?>"> &nbsp;बेड नं .&nbsp; <input type=" text" name="input_8" value="<?php echo $res6['input_8']?>">&nbsp;
            मध्ये दाखल आहे. तसेच मला /आम्हाला त्याच्या गंभीर व चिंताजनक प्रकृतीची व त्यामुळे पुढे जाऊन होणाऱ्या गंभीर
            परिणामाची कल्पना दिली आहे. व ती आम्हाला पूर्णपणे समजली आहे . पुढे उपचार दरम्यान रुग्णाची प्रकृती सुधारू अथवा
            अजून गंभीर होऊ शकते याचीही आम्हाला पूर्ण कल्पना आहे. . तरी आम्ही आमच्या जबाबदारीवर आमच्या रुग्णाला हॉस्पिटल
            मधून डॉक्टरांच्या परवानगी विरुद्ध डिस्चार्ज घेत आहोत. पुढे रुग्णाच्या प्रकृतीची पूर्ण जबाबदारी घेण्याची
            आम्ही खात्री देतो. पुढे रुग्णाच्या प्रकृती मध्ये काही बरे वाईट झाल्यास आम्ही डॉक्टर , हॉस्पिटल , नर्सिंग
            स्टाफ , व इतर कर्मचारी याना जबाबदार धरणार नाहीत . याची आम्ही खात्री देतो . तसेच आम्ही घेतलेला डिस्चार्ज हा
            हॉस्पिटल
            व्यवस्थापनाच्या नियमाविरुद्ध असल्याने त्यास LAMA / DAMA डिस्चार्ज ग्राह्य धरला जातो , त्यामुळे आम्हाला
            आमच्या रुग्णाच्या केलेल्या तपासण्याच्या XEROX प्रति दिल्या जातील व इतर X - RAY , CT SCN या तपासण्याच्या
            दुय्यम प्रती हव्या असल्यास आम्ही हॉस्पिटल व्यवस्थापनाच्या नियमानुसार जी रक्कम भरावी लागेल ती भरण्यास तयार
            आहोत याची आम्ही खात्री देतो. </p>

        <p class=" style10">
                ------------------------------------------------------------------------------------------------------------------------------------------------------------------
            <p><strong>Reasons for taking LAMA / DAMA : </strong>
            <p>

            <p class="style10"> <input type="checkbox"  name="check_1" <?php echo $res6['check_1']=='on'?'checked':''?>> Finacial (आर्थिक कारण )
            <p>
            <p class="style10"> <input type="checkbox" name="check_2" <?php echo $res6['check_2']=='on'?'checked':''?>> Patients condition has improved ( रुग्णाच्या आरोग्य स्थितीत
                सुधारणा
                )
            <p>
            <p class="style10"><input type="checkbox" name="check_3" <?php echo $res6['check_3']=='on'?'checked':''?>> Transfer to some other hospital ( दुसऱ्या रुग्णालयामध्ये
                पाठवण्यात
                येत असल्यामुळे )
            <p>
            <p class="style10"><input type="checkbox" name="check_4" <?php echo $res6['check_4']=='on'?'checked':''?>> Patient feeling home sick ( रुग्णास घरी जाण्याची इच्छा झाल्यामुळे
                )
            <p>
            <p class="style10"> <input type="checkbox" name="check_5" <?php echo $res6['check_5']=='on'?'checked':''?>> Dissatisfied with treatment (चिकीत्सेबाबत असमाधानी असल्यामुळे )
            <p>
            <p class="style10">
                Other (Please specify) (इतर कारणे - कृपया नमूद करणे )
                <input type="text" name="other" value="<?php echo $res6['other']?>">
            <div class="detail">
                <div class="row">
                    <div class="col-2">Signature of patient</div>
                    <div class="col-3"><input type="text" name="p_sign" value="<?php echo $res6['p_sign'];?>"></div>
                    <div class="col-2">Time</div>
                    <div class="col-3"><input type="time" name="p_time" value="<?php echo $res6['p_time'];?>"></div>
                </div>
                <h4 class="text-center">Signature of witness - 1</h4>
                <div class="row">
                    <div class="col-2">Name </div>
                    <div class="col-3"><input type="text" name="wit_name" value="<?php echo $res6['wit_name'];?>"></div>
                    <div class="col-2">Relation :</div>
                    <div class="col-3"><input type="text" name="wit_details" value="<?php echo $res6['wit_details'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 mt-2">Contact Details :</div>
                    <div class="col-3 mt-2"><input type="text" name="wit_rel" value="<?php echo $res6['wit_rel'];?>">
                    </div>
                    <div class="col-2 mt-2">date</div>
                    <div class="col-3 mt-2"><input type="text" name="wit_date" value="<?php echo $res6['wit_date'];?>">
                    </div>
                </div>
                <button class="btn btn-primary d-flex mx-auto" name="save">save</button>
            </div>
        </form>
</body>

</html>