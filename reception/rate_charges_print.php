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
$sql6="SELECT * FROM `rate_charges` WHERE `id` = '$id' ";
$data6=$conn->query($sql6);
$res6=$data6->fetch_assoc();
$sql11="SELECT * FROM `change_rate` WHERE 1";
$data11=$conn->query($sql11);
if ($data11->num_rows < 1) {
    $sql11 = "insert into change_rate(id) values(1);";
    $conn->query($sql11);
} 
$res11=$data11->fetch_assoc();

$inp=$res11['inp'];
$inp_arr=json_decode($inp,true);
$inp_arr = is_array($inp_arr) ? $inp_arr: array_fill(0,15, 0);

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
        font-size: 15px
    }

    .style11 {
        font-size: 16px
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

    table,
    th,
    td {
        border: 1px solid black;
    }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="rate_charges.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 "> हॉस्पिटल मधील रूमच्या शुल्का बद्धल संमतीपत्र </h3>
    <h3 class="text-center text-dark my-3 ">या रुग्णालयात खालील दराप्रमाणे प्रतिदिन देयक आकारले जातात याची स्पष्ट कल्पना
        मला / आम्हाला रुग्णालय प्रशासनाने दिलेली आहे </h3>
    <?php include_once("../header/header.php") ?>
    <p class="style10"> याप्रमाणे देय रक्कम देण्यास माझी / आमची संमती आहे. </p>


    <table width="818" cellspacing="8" cellpadding="10">
        <colgroup>
            <col span="2" style="border-color: #000000">
        </colgroup>

        <table width="788" class="table border border-black">
            <tr>
                <td width="265">&nbsp;</td>
                <td width="173"><span class="style10">१. सर्जन चार्जेस</span></td>
                <td width="328"><strong> <?php echo $res6['input_1'];?> </strong></td>
            </tr>
            <tr>
                <td><span class="style10">ऑपरेशन चार्जेस</span></td>
                <td><span class="style10">२. असिस्टंट सर्जन चार्जेस</span></td>
                <td><strong> <?php echo $res6['input_2'];?> </strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><span class="style10">३. अनेस्थेसिस्ट चार्जेस</span></td>
                <td><strong> <?php echo $res6['input_3'];?> </strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><span class="style10">४. ओटी / इन्स्ट्रुमेंट चार्जेस</span></td>
                <td><strong> <?php echo $res6['input_4'];?> </strong></td>
            </tr>
        </table>

        <p class="style10">* प्रतिदिन चार्जेस

        <table width="787" class="table border border-black">
            <tr>
                <td width="104">
                    <p class="style10"> वॉर्ड
                </td>
                <td width="79"><span class="style10">बेड</span></td>
                <td width="91"><span class="style10">कंसल्टंट डॉक्टर</span></td>
                <td width="76"><span class="style10">नर्सिंग</span></td>
                <td width="96"><span class="style10">मॉनिटर</span></td>
                <td width="98"><span class="style10">ऑक्सिजन</span></td>
                <td width="91"><span class="style10">सिरीप पंप</span></td>
                <td width="100"><span class="style10">एकूण</span></td>
            </tr>
            <tr>
                <td><span class="style10">आय सी यु </span></td>
                <td><?php echo $inp_arr[0]; ?></td>
                <td><?php echo $inp_arr[1]; ?></td>
                <td><?php echo $inp_arr[2]; ?></td>
                <td><?php echo $inp_arr[3]; ?></td>
                <td><?php echo $inp_arr[4]; ?></td>
                <td><?php echo $inp_arr[5]; ?>/<span class="style10">पंप</span></td>
                <td><?php echo $inp_arr[1]+$inp_arr[2]+$inp_arr[3]+$inp_arr[4]+$inp_arr[5]; ?>प्रतिदिन </span></td>
            </tr>
            <tr>
                <td><span class="style10">जनरल वॉर्ड </span></td>
                <td><?php echo $inp_arr[6]; ?></td>
                <td><?php echo $inp_arr[7]; ?></td>
                <td><?php echo $inp_arr[8]; ?></td>
                <td>&nbsp;</td>
                <td><?php echo $inp_arr[9]; ?></td>
                <td>&nbsp;</td>
                <td><span class="style10"><?php echo $inp_arr[6]+$inp_arr[7]+$inp_arr[8]+$inp_arr[9]; ?>प्रतिदिन </span>
                </td>
            </tr>
            <tr>
                <td><span class="style10">डिलक्स रूम </span></td>
                <td><?php echo $inp_arr[10]; ?></td>
                <td><?php echo $inp_arr[11]; ?></td>
                <td><?php echo $inp_arr[12]; ?></td>
                <td>&nbsp;</td>
                <td><?php echo $inp_arr[13]; ?></td>
                <td>&nbsp;</td>
                <td><?php echo $inp_arr[10]+$inp_arr[11]+$inp_arr[12]+$inp_arr[13]; ?>प्रतिदिन</td>
            </tr>
            </tr>
        </table>

        <p class="style10">* नोट : डिस्चार्जच्या दिवशी : - दुपारी १२ वाजेपर्यंत अर्धा दिवसाचे रूम चार्जेस आकारले जातील .
            दुपारी १२ नंतर पूर्ण दिवसाचे रूम चार्जेस आकारले जातील .
        <p class="style10">* Ventilator Charges ( व्हेंटिलेटर चार्जेस ) : Non Invasive - ४००० / day Invasive -७०००/day
            <strong> <?php echo $res6['input_5'];?> </strong>
        <p>
        <p class="style10"> * Pharmacy (मेडिकल ) : Extra at actual MRP <strong> <?php echo $res6['input_6'];?> </strong>
        <p>
        <p class="style10"> * Lab Charges ( रक्त तपासणी ) : Extra at actual <strong> <?php echo $res6['input_7'];?>
            </strong>
        <p>
        <p class="style10"> * Radiology ( सोनोग्राफी / सिटी स्कॅन /एक्स - रे ) : at actual <strong>
                <?php echo $res6['input_8'];?> </strong>
        <p>

        <p class="style10"> * Dialysis Charges ( डायलेसिस ) : Emergency ४००० /- Dialysis Routine २००० /- Dialysis
            <strong> <?php echo $res6['input_9'];?> </strong>
        <p>

        <p class="style10"> * Procedure Charges ( प्रोसिजर चार्जेस ) : As per procedure
            <strong> <?php echo $res6['input_10'];?> </strong>
        <p>


        <p class="style10"> * Visiting Doctor Charges ( व्हिजिटिंग डॉक्टर चार्जेस ) : At actual / Extra
            <strong> <?php echo $res6['input_11'];?> </strong>
        <p>

        <p class="style10"> * Emergency Consulting / Outside Consulting Charges / ECG /BSL /Dressing Charges are Extra
            .<strong> <?php echo $res6['input_12'];?> </strong>
        <p>

        <p class="style10"> वर नमूद केलेले चार्जेस हे फक्त अंदाजित चार्जेस आहेत. रुग्णाच्या आजाराच्या स्थिती आणि
            गांभीर्यानुसार चार्जेस वाढू शकतात .
            <strong> <?php echo $res6['input_13'];?> </strong>
        <p>

        <p class="style10"> अनपेक्षित बदल आणि आय सी. यु. चार्जेस यांचा खर्च वेगळा लागेल . सर्जरी पूर्वी ५० % ऍडव्हान्स
            भरावे लागतील .
            वरील प्रकारे देयक पूर्णपणे व वेळेवर देण्याची मी / आम्ही ग्वाही देतो.
            <strong> <?php echo $res6['input_14'];?> </strong>
        <p>

        <p class="style10"> मला / आम्हाला संभाव्ये खर्चाची कल्पना देण्यात आलेली आहे , मी /आम्ही रुग्णालयात येणारा
            सर्वसाधारण दैनंदिन खर्च त्याच प्रमाणे तपासण्या ,सर्व उपचार व औषधी यासाठी होणार खर्च भरण्याचे काबुल करतो . मी
            / आम्ही आवश्यक ती अनामत रक्कम भरण्याचे व स्पाताहिक व अंतिम बिल भरण्याचे स्वखुशीने मान्य करतो.
            <strong> <?php echo $res6['input_15'];?> </strong>
        <p>

        <p class="style10"> याबद्दल आमची रुग्णालयाकडे कसलीही तक्रार असणार नाही .
            <strong><strong> <?php echo $res6['input_16'];?> </strong></strong>
        <table width="787" class="table border border-black">
            <tr>
                <td width="381">
                    <p class="style10">रुग्णाचे नाव : <strong> <?php echo $res6['input_17'];?> </strong> </p>
                    <p class="style10">मो. क्र. :<strong> <?php echo $res6['input_18'];?> </strong> </p>
                    <p class="style10">सही / अंगठा : -<strong> <?php echo $res6['input_19'];?> </strong></p>
                </td>
                <td width="390">
                    <p class="style10">नातेवाईकाचे नाव<strong> <?php echo $res6['input_20'];?> </strong></p>
                    <p class="style10">नाते : -<strong> <?php echo $res6['input_21'];?> </strong></p>
                    <p><span class="style10">सही / अंगठा : <strong> <?php echo $res6['input_22'];?> </strong></p>
                </td>
            </tr>
        </table>


</body>
<script>
window.print();
</script>

</html>