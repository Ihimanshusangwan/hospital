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


$sql4=mysqli_query($conn,"SELECT * FROM doctor_inpatient WHERE id=$id");
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
        <a href="doctor_inpatient.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Doctor Inpatient Initial Assessment</h3>

    <?php include_once("../header/header.php") ?>
    <div class="row">
                <div class="col-12 mt-3" style="text-decoration:underline;">
                Complaints :
                </div>
              <div class="col-12">
                 C/O Pain in ABDO since 1hr:<?php echo $row4['copain'];?>
              </div>
              <div class="col-12">No LPV /BPV /Decreased FM:<?php echo $row4['nolpv'];?>
              </div>
              </div>
              <div class="row">
                <div class="col-12 mt-3" style="text-decoration:underline;">Obstetric History</div>
                <div class="col-4"> LMP :<?php echo $row4['lmp'];?>
                </div>
                <div class="col-4">GA :<?php echo $row4['ga'];?>
                </div>
                <div class="col-4">EDD :<?php echo $row4['edd'];?>
                </div>
    </div>

                <div class="row">
                    <div class="col-12 mt-3" style="text-decoration:underline;">Menstrual History :</div>
                    <div class="col-6">Dysmenorrhea :<?php echo $row4['dysmenorrhea'];?>
                    </div>
                   
                </div>

                    <div class="row">
                        <div class="col-12 mt-3 " style="text-decoration:underline;">General Examination :</div>
                       <div class="col-4">Pulse :<?php echo $row4['pulse'];?>
                        </div>
                        <div class="col-4">BP :<?php echo $row4['bp'];?>
                        </div>
                        <div class="col-4"> SPO2 :<?php echo $row4['spo2'];?>
                        </div>
                        <div class="col-4">Height :<?php echo $row4['height'];?>
                        </div>
                        <div class="col-4 "> Weight :<?php echo $row4['weight'];?>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-12 mt-3 " style="text-decoration:underline;">Systematic Examination :</div>
                       <div class="col-6">Respiratory System :<?php echo $row4['resp'];?>
                        </div>
                        <div class="col-6">Cardiovascular System :<?php echo $row4['cardio'];?>
                        </div>
                        <div class="col-6"> CNS :<?php echo $row4['cns'];?>
                        </div>
                        <div class="col-6">Per Abdomen :<?php echo $row4['abdomen'];?>
                        </div>
                        
                        </div>

                        <div class="row">
                        <div class="col-12 mt-3 mb-3 " style="text-decoration:underline;">Old Reports :</div>
                       <div class="col-6">Radiology :<?php echo $row4['radiology'];?>
                        </div>
                        <div class="col-6 mb-3">Pathology :<?php echo $row4['pathology'];?>
                        </div>
                        <div class="col-6"  >
                        <label for=""style="text-decoration:underline;">Provisional Diagnosis :</label><?php echo $row4['diagnosis'];?>
                        </div>
                        <div class="col-6 " >
                               <label for="" style="text-decoration:underline;"> Plan Treatment :</label><?php echo $row4['plan'];?>
                            </div>
                        </div>
    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>