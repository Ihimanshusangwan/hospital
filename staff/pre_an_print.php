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


$sql4=mysqli_query($conn,"SELECT * FROM pre_room_urinary WHERE id=$id;");
$row4=mysqli_fetch_assoc($sql4);

if($row4){
    $a_de =  json_decode($row4['a'], true);
}
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
        <a href="pre_an_eval.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">PreAnethesia Evaluation of Patient</h3>
    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-6"><STRONG>Posted For 
                 : </STRONG><?php echo $a_de[1];?>
        </div>
        <div class="col-6"><STRONG>Surgery Identification Mark
               : </STRONG><?php echo $a_de[2];?>
        </div>
        <div class="col-6"><STRONG>History of Patient
               : </STRONG><?php echo $a_de[3];?>
        </div>
        <div class="col-6"><STRONG>H/o of Past Illness
               : </STRONG><?php echo $a_de[4];?>
        </div>
        <div class="col-6"><STRONG>H/o Blood Tranfusion
               : </STRONG><?php echo $a_de[5];?>
        </div>
        <div class="col-6"><STRONG>Any Other Significant History
               : </STRONG><?php echo $a_de[6];?>
        </div>
        <div class="col-6"><STRONG>H/o Drugs
               : </STRONG><?php echo $a_de[7];?>
        </div>
        <div class="col-6"><STRONG>Habits & Addiction
               : </STRONG><?php echo $a_de[8];?>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="text-decoration:underline;">GENERAL
            <!--   9"     : </STRONG><?php //echo $a_de[9];?>   -->
        </div>
        <div class="col-4"><STRONG>Pulse
               : </STRONG><?php echo $a_de[10];?>
        </div>
        <div class="col-4"><STRONG>BP
               : </STRONG><?php echo $a_de[11];?>
        </div>
        <div class="col-4"><STRONG>CVS
               : </STRONG><?php echo $a_de[12];?>
        </div>
        <div class="col-4"><STRONG>CNS
               : </STRONG><?php echo $a_de[13];?>
        </div>
        <div class="col-4"><STRONG>RS
               : </STRONG><?php echo $a_de[14];?>
        </div>
        <div class="col-4"><STRONG>PA
               : </STRONG><?php echo $a_de[15];?>
        </div>
        <div class="col-4"><STRONG>Denture
               : </STRONG><?php echo $a_de[16];?>
        </div>
        <div class="col-4"><STRONG>Spine
               : </STRONG><?php echo $a_de[17];?>
        </div>
        <div class="col-4"><STRONG>Mouth Opening
               : </STRONG><?php echo $a_de[18];?>
        </div>
        <div class="col-4"><STRONG>ASA
               : </STRONG><?php echo $a_de[19];?>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="text-decoration:underline;">INVESTIGATION
            <!--   20"     : </STRONG><?php echo $a_de[20];?>   -->
        </div>
        <div class="col-4"><STRONG>HB
               : </STRONG><?php echo $a_de[21];?>
        </div>
        <div class="col-4"><STRONG>Blood Group
               : </STRONG><?php echo $a_de[22];?>
        </div>
        <div class="col-4"><STRONG>Urea
               : </STRONG><?php echo $a_de[23];?>
        </div>
        <div class="col-4"><STRONG>Creatinine
               : </STRONG><?php echo $a_de[24];?>
        </div>
        <div class="col-4"><STRONG>BSL Fasting
               : </STRONG><?php echo $a_de[25];?>
        </div>
        <div class="col-4"><STRONG>PP
               : </STRONG><?php echo $a_de[26];?>
        </div>
        <div class="col-4"><STRONG>R
               : </STRONG><?php echo $a_de[27];?>
        </div>
        <div class="col-4"><STRONG>HIV
               : </STRONG><?php echo $a_de[28];?>
        </div>
        <div class="col-4"><STRONG>Hbs Ag
               : </STRONG><?php echo $a_de[29];?>
        </div>
        <div class="col-4"><STRONG>ECG
               : </STRONG><?php echo $a_de[30];?>
        </div>
        <div class="col-4"><STRONG>X-ray
               : </STRONG><?php echo $a_de[31];?>
        </div>
    </div>
    <div class="row">
        <div class="col-6"><STRONG>Plan of Anesthesia
               : </STRONG><?php echo $a_de[32];?>
        </div>
        <div class="col-6"><STRONG>Advice
               : </STRONG><?php echo $a_de[33];?>
        </div>
        <div class="col-6"><STRONG>Name of Anaesthesiologist
               : </STRONG><?php echo $a_de[34];?>
        </div>
        <div class="col-6"><STRONG>Signature
               : </STRONG><?php echo $a_de[0];?>
        </div>

    </div>

    <br>
    <h6 class="mt-2">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>