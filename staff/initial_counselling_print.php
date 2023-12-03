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

$sql6="SELECT * FROM `initial_counselling` WHERE `id` = '$id' ";
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
    table,
    th,
    td {
        border: 1px solid black;
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
        <a href="initial_counselling.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">INITIAL COUNSELING FORM</h3>
    <?php include_once("../header/header.php") ?>
    <table width="100%">
        <th width="8%"><span class="style8">Sr.No.
        </th>
        <th width="74%">
            <p class=" style10"> You are informed about your / your patients healthcare needs as follows. Please Tick (✓
                )
                wherever applicable:
            <p class="style10">आपण आपल्या / आपल्या रुग्णाच्या आरोग्याबाबत खालील माहिती देण्यात येत आहे. योग्य ठिकाणी (✓)
                अशी
                खून करण्यात यावी .
            <p>
        </th>
        <th width="22%">Yes/No</th>
        </tr>

        <tr>
            <th scope="row"><span class="style23">1.</span></th>
            <td><span class="style23">Diagosis / Reason For Admission (
                    (निदान व रुग्णालयात भरती होण्याचे कारण ) </span></td>
            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_1']=='option1'?'yes':'no'; ?>
                </div>

            </td>
        </tr>
        <tr>
            <th scope="row"><span class="style23">2.</span></th>
            <td><span class="style23">Any Possible Complication There Of
                    ( उध्दभवू शकणाऱ्या गुंतागुंत बाबत माहिती )</span></td>
            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_2']=='option1'?'yes':'no'; ?>
                </div>

            </td>
        </tr>
        <th scope="row"><span class="style23">3.</span></th>
        <td><span class="style23">The plan of Treatment ( चिकित्सेचे विवरण )</span></td>
        <td>
            <div class="form-check form-check-inline">
                <?php echo $res6['r_2']=='option1'?'yes':'no'; ?>
            </div>

        </td>
        </tr>
        <tr>
            <th scope="row"><span class="style23">4.</span></th>
            <td><span class="style23">Any other alternatives and preventive aspects that you may have
                    (उपलब्ध पर्यायी चिकित्सा पद्धती )</span></td>

            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_4']=='option1'?'yes':'no'; ?>
                </div>

            </td>
        </tr>
        <tr>
            <th scope="row"><span class="style23">5.</span></th>
            <td><span class="style23">The benifits of the altrnatives involved ( पर्यायी चिकित्सापद्धतीचे
                    फायदे आणि तोटे )</span></td>
            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_5']=='option1'?'yes':'no'; ?>
                </div>

            </td>
        </tr>
        <tr>
            <th scope="row"><span class="style23">6.</span></th>
            <td><span class="style23">Diet , Nutrition and Medication (आहार ,पोषण औषध बाबत माहिती )</span>
            </td>
            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_6']=='option1'?'yes':'no'; ?>
                </div>

            </td>
        </tr>
        <tr>
            <th scope="row"><span class="style23">7.</span></th>
            <td>
                <p class="style23">That you can make informed choice among available opttions(उपलब्ध
                    पर्यायांपैकी निवड करण्याचा अधिकार )</p>
            </td>

            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_7']=='option1'?'yes':'no'; ?>
                </div>

            </td>
        </tr>
        <tr>
            <th scope="row"><span class="style23">8.</span></th>
            <td><span class="style23">That your patient has right to refuse the treatment (उपलब्ध
                    पर्यायांपैकी निवड करण्याचा अधिकार )</span></td>
            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_8']=='option1'?'yes':'no'; ?>
                </div>

            </td>
        </tr>
        <tr>
            <th scope="row"><span class="style23">9.</span></th>
            <td><span class="style23">Expected date of Dischage (डिसचार्ज अंदाजे तारीख )</span></td>
            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_9']=='option1'?'yes':'no'; ?>
                </div>

            </td>
        </tr>
        <tr>

            <th scope="row"><span class="style23">10.</span></th>
            <td><span class="style23">Expected cost Treatment (उपचाराचा अंदाजे खर्च )</span></td>
            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_10']=='option1'?'yes':'no'; ?>
                </div>

            </td>
        </tr>
        <tr>
            <th scope="row"><span class="style23">11.</span></th>
            <td><span class="style23">Expected Results (अपेक्षित निदान व चिकित्सा )</span></td>
            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_11']=='option1'?'yes':'no'; ?>
                </div>
            </td>
        </tr>
    </table>
    <table style="margin-top:100px;" width="100%">
        <tr>
            <th width="137" class="style22" scope="col">
                <p>&nbsp;</p>
            </th>
            <th width="105" class="style10" scope="col">
                <p>Signature सही</p>
            </th>
            <th width="169" class="style10" scope="col">
                <p>Name नाव</p>
            </th>
            <th width="109" class="style10" scope="col">
                <p>Date दिनांक</p>
            </th>
            <th width="102" class="style10" scope="col">
                <p>Time वेळ</p>
            </th>
        </tr>
        <tr>
            <th class="style22" scope="row">
                <p>Patient / Relative</p>
                <p>रुग्ण / नातेवाईक</p>
            </th>
            <td><strong><?php echo $res6['sign_1']; ?></strong></>
            <td><strong><?php echo $res6['name_1']; ?></td>
            <td><strong><?php echo $res6['date_1']; ?></td>
            <td><strong><?php echo $res6['time_1']; ?></td>
        </tr>
        <tr>
            <th class="style22" scope="row">
                <p>Witness (Relation with patient) </p>
                <p>साक्षीदार (रुग्णाशी नाते )</p>
            </th>
            <td><strong><?php echo $res6['sign_2']; ?></td>
            <td><strong><?php echo $res6['name_2']; ?></td>
            <td><strong><?php echo $res6['date_2']; ?></td>
            <td><strong><?php echo $res6['time_2']; ?></td>
        </tr>
        <tr>
            <th class="style22" scope="row">
                <p>Doctor</p>
                <p>डॉक्टर</p>
            </th>

            <td><strong><?php echo $res6['sign_3']; ?></td>
            <td><strong><?php echo $res6['name_3']; ?></td>
            <td><strong><?php echo $res6['date_3']; ?></td>
            <td><strong><?php echo $res6['time_3']; ?></td>
        </tr>
        <tr>
            <th class="style22" scope="row">
                <p>Interpreter </p>
                <p>माहिती समजावून सांगणारे</p>
            </th>
            <td><strong><?php echo $res6['sign_4']; ?></td>
            <td><strong><?php echo $res6['name_4']; ?></td>
            <td><strong><?php echo $res6['date_4']; ?></td>
            <td><strong><?php echo $res6['time_4']; ?></td>
        </tr>
    </table>

    <script>
    window.print();
    </script>
</body>


</html>