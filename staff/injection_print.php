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


$sql4=mysqli_query($conn,"SELECT *  FROM injection_consent WHERE id =$id");
$row4=mysqli_fetch_assoc($sql4);
  error_reporting(0);
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
        <a href="injection_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">IM /IV SC Injection Consent </h3>

    <?php include_once("../header/header.php") ?>
    <div class="row">
                <div class="col-12 text-center"><strong>CONSENT FOR INTRAMUSCULAR (IM) INTRA VENOUS (IV) AND SUBCUTANEOUS
                     (SUB Q) INJECTION</strong></div>
                <div class="col-12 mt-3">
IM IV and SUBQ Injection are treatments that deliver medications directly into a muscle or vein or into the tissue
 under the skin respectively treatments are typically well tolerated without any adverse reactions. Sometimes a 
 series of injection are recommended for satisfactory outcome.</div>
<br>
            <div class="col-12 mt-4">
            Potential side effects include but are not limited to. 
            
            <ul>
                <li>Local skin irritation and bruising.</li>
                <li>Swelling and/ or pain at the injection sites.</li>
                <li>Infection is very rare but possible. All standard precautions. (gloves, alcohol cleaning) are
taken to prevent infection.</li>
                <li>Nerve damage. From improper injections is also very rare but possible.</li>
                <li> Allergic reaction potential for anaphylaxis is low however there have been cases where patients have reacted to the medication administered</li>
                <li> By signing this document, i am agreeing to treatment with m, iv and/ or sub q injection. I have been informed of the risks and benefits involved with this treatment and understand
the potential effects.</li>
                <li>I have informed the administrators of any allergies, medication that am taking and all past negative experiences with foods, medications and previous injections.
<br>(वरील मजकुर मला माझ्या भाषेत रूपांतरित करून समजावुन सांगण्यात आला आहे व मला तो समजला आहे. )</li>
            </ul>
            </div>
             </div>

             <div class="row">
                <div class="col-4">Patient name :<?php echo $res['name']; ?>
                </div>
                <div class="col-4">Parents guardian name :<?php echo $row4['guardian_name']; ?>
                </div>
                <div class="col-4" > Translators name :<?php echo $row4['translator']; ?>
                </div>
             </div>
    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>