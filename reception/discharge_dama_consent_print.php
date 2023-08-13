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
    <style>
    body {
        margin: 0;
    }

    .style5 {
        color: #333333
    }

    .style10 {
        font-size: 14px
    }

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
        <a href="discharge_dama_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">CONSENT FOR DISCHARGE AGAINST MEDICAL ADVICE (DAMA)</h3>
    <h3 class="text-center text-dark my-3 "> वैधकीय सल्ल्याविरुद्ध डिस्चार्ज बाबत सामंती पात्र </h3>

    <?php include_once("../header/header.php") ?>
    <p class=" style10"> I / My patient &nbsp;<strong><?php echo $res6['input_1']?></strong> admitted in SIDDHIVINAYK
        NETRALY In Ded
        No.&nbsp;<strong><?php echo $res6['input_2']?></strong>under Dr.
        &nbsp;<strong><?php echo $res6['input_3']?></strong> from
        -&nbsp;<strong><?php echo $res6['input_4']?></strong>taking discharge against the medical advice of the
        in charge physician / Surgeon and the hospital administration . Doctor has explained us the vital satate of
        patient and seriousness of patient . The explanation by the doctor is understood by us , we do not wish to
        continue the treatment and withhold the consent for treatment of the patient and wish to go discharge sgsinst
        medical advice. If Any Serious Complication Arises No Treating Doctor,Nursing Staff , Para-Medical Or Hospital
        Administration Will be held responsible .We have been explained as per the hospital rles we won't get any
        document and all report will be stored in hospital and instead Xerox copy of documents will be given to us and
        we agree to this , in future if any document needed it will be produced on payment of documentation fee as
        decided by administration . I am fully aware of the risk involved and here by release the incharge and attending
        physician / Surgeon and the hospital administration from all responsibilities for any adverse effect which may
        result from such leave from the hospital . And by signing below I agree to the terms and conditions along with
        ruls and regulation of hospital management for patients taking LAMA / DAMA. </p>

    <p class="style10"> मी खाली स्वाक्षरी करणार &nbsp;<strong><?php echo $res6['input_5']?></strong> असे लिहून देतो
        /देते की , मी /माझा रुग्ण श्री
        सिद्धिविनायक नेत्रालय येथे दिनांक -&nbsp;<strong><?php echo $res6['input_6']?></strong>पासून
        &nbsp;<strong><?php echo $res6['input_7']?></strong>बेड नं .
        &nbsp;<strong><?php echo $res6['input_8']?></strong> मध्ये दाखल
        आहे. तसेच मला /आम्हाला त्याच्या गंभीर व चिंताजनक प्रकृतीची व त्यामुळे पुढे जाऊन होणाऱ्या गंभीर परिणामाची कल्पना
        दिली आहे. व ती आम्हाला पूर्णपणे समजली आहे . पुढे उपचार दरम्यान रुग्णाची प्रकृती सुधारू अथवा अजून गंभीर होऊ शकते
        याचीही आम्हाला पूर्ण कल्पना आहे. . तरी आम्ही आमच्या जबाबदारीवर आमच्या रुग्णाला हॉस्पिटल मधून डॉक्टरांच्या
        परवानगी विरुद्ध डिस्चार्ज घेत आहोत. पुढे रुग्णाच्या प्रकृतीची पूर्ण जबाबदारी घेण्याची आम्ही खात्री देतो. पुढे
        रुग्णाच्या प्रकृती मध्ये काही बरे वाईट झाल्यास आम्ही डॉक्टर , हॉस्पिटल , नर्सिंग स्टाफ , व इतर कर्मचारी याना
        जबाबदार धरणार नाहीत . याची आम्ही खात्री देतो . तसेच आम्ही घेतलेला डिस्चार्ज हा हॉस्पिटल
        व्यवस्थापनाच्या नियमाविरुद्ध असल्याने त्यास LAMA / DAMA डिस्चार्ज ग्राह्य धरला जातो , त्यामुळे आम्हाला आमच्या
        रुग्णाच्या केलेल्या तपासण्याच्या XEROX प्रति दिल्या जातील व इतर X - RAY , CT SCN या तपासण्याच्या दुय्यम प्रती
        हव्या असल्यास आम्ही हॉस्पिटल व्यवस्थापनाच्या नियमानुसार जी रक्कम भरावी लागेल ती भरण्यास तयार आहोत याची आम्ही
        खात्री देतो. </p>

    <p class="style10">
        ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    <p><strong>Reasons for taking LAMA / DAMA : </strong>
    <p>

    <p class="style10"> <input type="checkbox" <?php echo $res6['check_1']=='on'?'checked':''?>> Finacial (आर्थिक कारण )
    <p>
    <p class="style10"> <input type="checkbox" <?php echo $res6['check_2']=='on'?'checked':''?>> Patients condition has
        improved ( रुग्णाच्या आरोग्य स्थितीत सुधारणा )
    <p>
    <p class="style10"><input type="checkbox" <?php echo $res6['check_3']=='on'?'checked':''?>> Transfer to some other
        hospital ( दुसऱ्या रुग्णालयामध्ये पाठवण्यात येत
        असल्यामुळे )
    <p>
    <p class="style10"><input type="checkbox" <?php echo $res6['check_4']=='on'?'checked':''?>> Patient feeling home
        sick ( रुग्णास घरी जाण्याची इच्छा झाल्यामुळे )
    <p>
    <p class="style10"> <input type="checkbox" <?php echo $res6['check_5']=='on'?'checked':''?>> Dissatisfied with
        treatment (चिकीत्सेबाबत असमाधानी असल्यामुळे )
    <p>
    <p class="style10">
        Other (Please specify) (इतर कारणे - कृपया नमूद करणे )&nbsp; <strong><?php echo $res6['other']?></strong>

        <html>
        <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
        </style>

        <body>

            <table width="631" cellspacing="4" cellpadding="4">
                <tr>
                    <th width="270" scope="col">
                        <p class="style11">Signature of patient <?php echo $res6['p_sign'];?></p>
                        <p class="style11">time : <?php echo $res6['p_time'];?> </p>
                    <th width="285" scope="col">
                        <p class="style11">Signature of witness - 1 </p>
                        <p class="style11">Name : <?php echo $res6['wit_name'];?></p>
                        <p class="style11">Relation : -<?php echo $res6['wit_rel'];?></p>
                        <p class="style11">Contact Details : <?php echo $res6['wit_details'];?> </p>
                        <p class="style11">date <?php echo $res6['wit_date'];?></p>
                </tr>

            </table>
            <table width="200" cellspacing="4" cellpadding="4">
        </body>
        <script>
        window.print();
        </script>

        </html>