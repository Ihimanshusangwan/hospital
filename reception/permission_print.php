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

$sql6="SELECT * FROM `permission` WHERE `id` = '$id' ";
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
    th,
    td {
        font-size: 15px !important;
    }

    body {
        margin: 0;
    }

    .style5 {
        color: #333333
    }

    .style8 {
        font-size: 16px;
        font-weight: bold;
    }

    .style10 {
        font-size: 16px
    }

    .style11 {
        font-size: 15px;
    }

    .style12 {
        font-size: 15px;
        font-weight: bold;
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
        <button type="button" class="btn btn-danger mt-4 noprint" id="print">Print</button>
        <a href="premission.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <p align="center">
    <h1 align="center" class="style3  style5"> -: अनुमतीपत्र :- </h1>\

    <?php include_once("../header/header.php") ?>
    <p align="center">
    <h1>
        <p class=" style10"> १ ) डॉक्टरांनी मला / आम्हाला / माझ्या आमच्या रुग्णांच्या ( रुग्णांचे नाव
            <strong><?php echo $res6['input_1'];?></strong> आजाराच्या व त्याच्या प्रकृतीच्या आताच्या परिस्थितीची संपूर्ण
            माहिती व कल्पना दिली आहे .</p>

        <p class="style10"> २ ) मला / आम्हाला डॉक्टरांनी करावा लागणाऱ्या तपासण्या , औषधउपचार , त्याचे परिणाम व संभाव्य
            दुष्परिणाम किंवा अकल्पित प्रतिक्रिया व संभाव्य विकृती वा विकोप इ. सर्व बाबींची संपूर्ण व स्पष्ट कल्पना दिली
            आहे . </p>

        <p class="style10"> ३ ) गरज भासल्यास रुग्णांच्या बाबतीत जरुरीप्रमाणे अतिरिक्त तज्ञांचा सल्ला घेण्यास माझी / आमची
            संमती आहे. त्या संबधीच्या खर्चाची जबाबदारी माझ्यावर / आमच्यावर राहील .
        <p>

        <p class="style10"> ४) पोलीस केस असल्यास ( मेडिको लीगल केस ) माझे रुग्णालयाला पूर्ण सहकार्य राहील . अशा केसमध्ये
            रुग्णालयातील कार्यवाहीस माझी पूर्ण परवानगी आहे .
        <p>
        <p class="style10"> ५ ) आवश्यकतेनुसार कराव्या लागणाऱ्या तपासण्या व औषधउपचार त्याबद्धल मी / आम्ही संबंधीत
            डॉक्टरांकडून वेळोवेळी माहिती जाणून घेऊ .
        <p>
        <p class="style10"> ६ ) रुग्णालयात वापरण्यात येणारी औषधे , सलाईनच्या बाटल्या , सलाईन सेट इत्यादी वस्तूचे
            रुग्णालयात उत्पादन केले जात नाही व रुग्णालयात वापरण्यात येणारी औषधी प्रमाणित कंपन्यांची असतात . याची मला
            जाणीव आहे.
        <p>
        <p class="style10"> ७ ) रुग्णाच्या प्रकृतीविषयी वेळोवेळी मी डॉक्टरांकडून माहिती करून घेईल .
        <p>
        <p class="style10"> ८ ) रुग्ण अथवा रुग्णाच्या नातेवाईकांकडून रुग्णालयातील वस्तूंची मोडतोड झाल्यास त्याची सर्व
            जबादारी माझ्यावर / आमच्यावर राहील व त्याचा वेगळा आकार मी / आम्ही भरेल / भरू
        <p>
        <p class="style10"> ९ ) ह्या हॉस्पिटल मध्ये असलेल्या सुविधा मला / आम्हाला माहित आहेत . काही प्रकारच्या सुविधा
            सुविधा नसल्याची कल्पना मला / आम्हाला डॉक्टरांनी दिलेली आहे.
        <p>
        <p class="style10"> १० ) वैदकीय ज्ञानाच्या अभिवृद्धीसाठी उपचार / शस्त्रक्रिया करतांना छायाचित्रे (फोटोग्राफ्स /
            ट्रान्सपनीज ) दृश्य किती प्रदर्शित अथवा प्रकाशित करण्यात माझी / आमची अनुमती आहे. मी / आम्ही असे गृहीत धरतो
            कि , अशा प्रकाशनात / प्रदर्शनात माझी / रुग्णाची ओळख दिली जाणार नाही . वरील सर्वे कलमे मी / आम्ही वाचली आहे .
            ती मला / आम्हाला समजली आहेत . व मला / आम्हाला मान्य आहेत व ती माझ्यावर /आम्हावर बंधनकारक आहेत. तरी मी /
            आम्ही रुग्णालयाच्या अधिकाऱ्यांना मला / रुग्णास नाव <strong><?php echo $res6['input_2'];?></strong> वा
            रुग्णालयात दाखल करून घेण्याची विनंती करतो .
        <p>
        <p class="style10"> नाव : <strong><?php echo $res6['input_3'];?></strong>सही / अंगठा
        <p>

        <p class="style10"> रुग्णांशी नाते <strong><?php echo $res6['input_4'];?></strong> &nbsp;तारीख <strong><?php echo $res6['input_5'];?></strong>
        <p>

        <p class="style10"> वरील अनुमती पत्राची कलमे मला माझ्या मातृभाषेत वाचून दाखविण्यात आलेली आहे . ती मला मान्य आहेत
            व माझ्यावर बंधनकारक आहेत .
        <p>
        <p class="style10"> नाव : <strong><?php echo $res6['input_6'];?></strong> &nbsp;सही / अंगठा  <strong><?php echo $res6['input_7'];?></strong>
        <p>

        <p class="style10"> रुग्णांशी नाते  <strong><?php echo $res6['input_8'];?></strong> &nbsp; तारीख  <strong><?php echo $res6['input_9'];?></strong>
        <p>
        <p class="style10"> साक्षीदारांचे नाव व सही :  <strong><?php echo $res6['input_10'];?></strong>
        <p>

        <p class="style10">पत्ता  <strong><?php echo $res6['input_11'];?></strong>
        <p>

            <body>
                <!DOCTYPE html>
                <html>
                <h1 align="center" class="style8"> -: परिशिष्ट - अ :- </h1>
                <p align="center" class="style6"> खर्च व बिले चुकती करण्याची संमती
                <p>
                <h1 class="style10">मला / आम्हाला संभाव्य खर्चाची कल्पना देण्यात आलेली आहे . मी / आम्ही रुग्णालयात
                    येणाऱ्या सर्वसाधारण दैनंदिन खर्च त्याचप्रमाणे तपासण्याचा सर्व उपचार व औषधे यासाठी होणार खर्च
                    भरण्याचे काबुल करतो मी /आम्ही आवश्यक ती अनामत रक्कम भरण्याचे व अंतिम बिल भरण्याचे स्वखुशीने मेनी
                    करतो .</h1>
                <p>
                    <style>
                    table,
                    th,
                    td {
                        border: 1px solid black;
                    }
                    </style>
                <h2></h2>

                <table style="width:100%" style="margin bottom:20px;">
                    <tr>
                        <th><span class="style10"></span><span class="style8">नातेवाईक&nbsp;</span></th>
                        <th><span class="style10">साक्षीदार&nbsp; </span></th>
                        <th><span class="style10">पेशंट&nbsp;</span></th>
                    </tr>
                    <tr>
                        <td><span class="style10">सही / अंगठा &nbsp;<strong><?php echo $res6['t_1'];?></strong></span>
                        </td>
                        <td><span class="style10">सही / अंगठा &nbsp;<strong><?php echo $res6['t_2'];?></strong></span>
                        </td>
                        <td><span class="style10">सही / अंगठा&nbsp;<strong><?php echo $res6['t_3'];?></strong></span>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="style10">नाव : &nbsp;<strong><?php echo $res6['t_4'];?></strong></span></td>
                        <td><span class="style10">नाव :&nbsp;<strong><?php echo $res6['t_5'];?></strong></span></td>
                        <td><span class="style10">तारीख :&nbsp; <strong><?php echo $res6['t_6'];?></strong></span></td>
                    </tr>
                    <tr>
                        <td><span class="style10">पत्ता : &nbsp;<strong><?php echo $res6['t_7'];?></strong> </span></td>
                        <td><span class="style10">पत्ता : &nbsp;<strong><?php echo $res6['t_8'];?></strong> </span></td>
                        <td><span class="style10">पत्ता : &nbsp;<strong><?php echo $res6['t_9'];?></strong> </span></td>

                    </tr>
                    <tr>
                        <td class="style10">वय : वर्ष : &nbsp;<strong><?php echo $res6['t_10'];?></strong></td>
                        <td><span class="style10"> वय : वर्ष : &nbsp;
                                <strong><?php echo $res6['t_11'];?></strong></span></td>
                        <td><span class="style10">वेळ : &nbsp;<strong><?php echo $res6['t_12'];?></strong></span></td>
                    </tr>
                </table>
                <strong style="margin:30px;"> Date:</strong>
                <?php echo $res6['input_12'];?>
                <strong style="margin:30px;">Patient / Relative Signature ) :</strong> <?php echo $res6['input_13'];?>
                <script>
                window.print();
                </script>
            </body>

</html>