<?php
require("../admin/connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

$query = "SELECT * FROM p_general JOIN p_init ON p_general.id = p_init.id JOIN patient_info ON p_general.id = patient_info.patient_id  JOIN patient_records ON p_general.id = patient_records.id JOIN p_insure ON p_general.id = p_insure.id WHERE p_general.id = $id;";
$res = $conn->query($query)->fetch_assoc();
//   print_r($res);
$query2 = "SELECT * FROM discharge WHERE id = $id;";
$res2 = $conn->query($query2)->fetch_assoc();
//   print_r($res2);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Admission Form</title>
    <style>
        .table1{
            border:1px solid black;
        }
    .str {
        margin-left: 25px;
    }

    .str1 {
        margin-left: 20px;
    }

    .str2 {
        margin-left: 65px;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
    }
    .row1{
        border-top:1px solid black;
        border-left:1px solid black;
    }
    .br{
        border-right:1px solid black;
    }
    .bb{
        border-bottom:1px solid black;

    }
    .bl{
        border-left:1px solid black;
    }

    .highm {
        margin-left: 65px;
    }

    .title {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .mr {
        margin-right: 30px;
    }

    .mr2 {
        margin-right: 60px;
    }

    .mr3 {
        margin-right: 90px;
    }

    .mt {
        margin-top: 40px;

    }

    .end {
        display: flex;
        justify-content: space-between;
        algin-items: center;
    }

    @media print {

        #button {
            display: none !important;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div id="button">
            <a href='ortho_admission.php?id=<?php echo $id; ?>' class="btn btn-primary m-2">Dashboard</a>
            <a class="btn btn-primary m-2" onclick="window.print()">Print</a>
        </div>
        <div class="header">
            <div class="img-logo">
                <img style="height: 4rem; width: 4rem;"
                    src="data:image/jpeg;base64, <?php echo base64_encode($title['logo']) ?>">
            </div>
            <div class="title">
                <h2 style="text-align: center; color: red; width: 100%;"><strong class="str">
                        <?php echo $title['title'] ?>
                    </strong>
                </h2>
                <p style="text-align: center;">
                    <?php echo $title['address'] ?> Mob:
                    <?php echo $title['mobile'] ?>
                </p>
            </div>
            <div class="img-logo">
                <img style="height: 4rem; width: 4rem; margin-left:20px;"
                    src="data:image/jpeg;base64, <?php echo base64_encode($title['logo']) ?>">
            </div>
        </div>
    </div>
    <div class="container">
        <h3 class="text-center text-dark">Admission Form</h3>
        <div style="border-bottom: 3px soblack; margin-bottom : 10px;"></div>
        <div class="d-flex justify-content-between">
            <div>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($res['img']) ?>"
                    style="height: 5rem; width: 5rem; margin-right:5px;">
            </div>
            <div class="table">
                <div class="row">
                    <div class="col-4"><strong>Name:</strong>
                        <?php echo strtoupper($res['name']); ?></div>
                    <div class="col-4"> <strong>Age:</strong>
                        <?php echo strtoupper($res['age']); ?></div>
                    <div class="col-4"> <strong>Sex:</strong>
                        <?php echo $res['sex']; ?></div>
                </div>

                <div class="row">
                    <div class="col-6"> <strong>UHID No.:</strong>
                        <?php echo $res['uhid']; ?></div>
                    <div class="col-6"> <strong> IPD No:</strong>
                        <?php echo $res['ipd']; ?></div>
                </div>
                <div class="row">
                    <div class="col-6"> <strong>Ward/ICU:</strong>
                        <?php echo $res['ward/icu']; ?></div>
                    <div class="col-6"><strong>Bed / Room No:</strong>
                        <?php echo $res['bed/room']; ?></div>
                </div>
                <div class="row">
                <div class="col-6"><strong>Date of Admission:</strong>
                    <?php echo $res['reg_date']; ?>
                </div>
                <div class="col-6"><strong>Time:</strong>
                    <?php echo $res['time']; ?></div>
            </div>

            </div>
            <div>
                <script src="../barcode.js"></script>
                <canvas id="barcode"></canvas>
                <script>
                const canvas = document.getElementById('barcode');
                const opts = {
                    bcid: 'code39', // Barcode type set to Code 39
                    text: '<?php echo $id; ?>', // Numeric value with variable length
                    scale: 2, // Scale factor for the barcode size
                    height: 10, // Height of the barcode in mm
                    includetext: false, // Include the barcode text
                };

                bwipjs.toCanvas(canvas, opts, function(err) {
                    if (err) {
                        console.error('Error generating barcode:', err);
                    } else {
                        console.log('Barcode generated successfully');
                    }
                });
                </script>
            </div>
        </div>



        <!-- <strong>Date of Discharge / Death:</strong>
        <?php echo $res2['date']; ?>

        <strong class="str">Time:</strong>
        <?php echo $res2['time']; ?> -->
        <div class="table">
            <div class="row">
                <div class="col-6"> <strong>Aadhar No:</strong>
                    <?php echo $res['aadhar']; ?>
                </div>
                <div class="col-6">
                    <strong>Occupation:</strong>
                    <?php echo $res['occ']; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6"> <strong>Referring Doctor:</strong>
                    Lokesh Thakare
                </div>
                <div class="col-6"><strong>Relationship:</strong>
                    <?php echo $res['relation'].'fadserwer'; ?>></div>
            </div>
            <div class="row">
                <div class="col-6"> <strong>Patient Brought BY:</strong>
                    <?php echo $res['referred_by']; ?></div>

                <div class="col-6"> <strong>Status of Discharge:</strong>
                    <?php echo $res['s_discharge']; ?></div>
            </div>

            <div class="row">
                <div class="col-6">
                    <strong>Address</strong>
                    <?php echo $res['address'] . " " . $res['taluka'] . " " . $res['district']; ?>
                </div>
                <div class="col-6">
                    <strong>Address</strong>
                    <?php echo $res['address'] . " " . $res['taluka'] . " " . $res['district']; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-6"> <strong>Emergency Contact:</strong>
                    <?php echo $res['mobile_pwp']; ?></div>
                <div class="col-6">
                    <strong>MLC No & Police Station:</strong>
                    <?php echo $res['mlc/nmlc']; ?>
                </div>
            </div>
        </div>

        <div style="border-bottom: 3px solid black; margin-bottom : 10px;"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12"><strong>Provisonal Diagnosis </strong>
                <?php echo $res['p_diag']; ?>
            </div>
        </div><br>
        <div class="row">
            <div class="col-12"><strong> Final Diagnosis: </strong>
                <?php echo $res['f_diag']; ?>
            </div>
        </div><br>
        <div class="row">
            <div class="col-12"><strong> Cause of Death: </strong>
                <?php echo $res['c_death']; ?>
            </div>
        </div><br>
        <div class="row">
            <div><strong>Chief Condition and Complaint at the Time of Admission: </strong>
                <?php echo $res['patient_complaints']; ?>
            </div>
        </div><br>

        <div> <strong class="mr"> Physical Examination: </strong>
            <br>
            <table class="table table1">
                <div class="row ">
                    <div class="col-4 row1"> <strong>Weight:</strong> <?php echo $res['weight']; ?></div>
                    <div class="col-4 row1"> <strong>B.P.:</strong> <?php echo $res['bp'].'dfasd'; ?></div>
                    <div class="col-4 row1 br"><strong>Temp:</strong> <?php echo $res['temp'].'dfad'; ?></div>

                </div>
                <div class="row">
                    <div class="col-4  row1"> <strong>Pulse:</strong>
                        <?php echo $res['pulse']; ?></div>
                    <div class="col-4  row1"><strong>Resp:</strong>
                        <?php echo $res['resp'];?></div>
                    <div class="col-4  row1 bb br"> <strong>C.V.S:</strong>
                        <?php echo $res['cvs']; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 row1 bb"><strong>R.S:</strong>
                        <?php echo $res['rs']; ?></div>
                    <div class="col-4  row1 bb br"><strong>Height:</strong>
                        <?php echo $res['height']; ?></div>
                </div>

            </table>
            <strong> Relevant Family History: </strong>
            <?php echo $res['r_his']; ?>
            <br><br>
            <strong> Medication History:</strong>
            <?php echo $res['m_his']; ?>
            <br> <br>
            <strong>Any Habit-(Tobacco/Alcohol/Smoking/Other): </strong>
            <?php echo $res['habit']; ?>
            <br> <br>
            <strong>Relevant Previous Investigation/Report: </strong>
            <?php echo $res['invest']; ?>
            <br> <br>
            <strong>Immunization Record and Nutritional & Growth History:</strong>
            <?php echo $res['nutrition']; ?>
            <br> <br>

            <div> <strong> General Examination on Admission: </strong></div>
            <table class="table border border-dark">
                <div class="row">
                    <div class="col-4 row1"><strong>General Condition</strong>
                        <?php echo $res['skin']; ?>
                    </div>
                    <div class="col-4 row1"><strong>Skin:</strong>
                        <?php echo $res['skin']; ?></div>
                    <div class="col-4  row1 br"> <strong>Anaemia:</strong>
                        <?php echo $res['ana'];?></div>
                    <div class="col-4 row1"></div>
                </div>

                <div class="row">
                    <div class="col-4 bl"><strong>Nails:</strong>
                        <?php echo $res['nai']; ?>
                    </div>
                    <div class="col-4 row1"><strong>Cyanosis:</strong>
                        <?php echo $res['cya']; ?></div>
                    <div class="col-4 row1 br"> <strong> Any others:</strong>
                        <?php echo $res['any']; ?></div>
                </div>
                <div class="row">
                    <div class="col-4 row1"><strong>Jaundice:</strong>
                        <?php echo $res['jaun']; ?>
                    </div>
                    <div class="col-4 row1"><strong> Throat:</strong>
                        <?php echo $res['thro']; ?></div>
                    <div class="col-4 row1 br bb"><strong>Lymph Nodes:</strong>
                        <?php echo $res['lymp']; ?></div>
                </div>

                <div class="row ">
                    <div class="col-4 row1 bb">
                        <strong>Pain Score:</strong>
                        <?php echo $res['pain']; ?>
                    </div>
                    <div class="col-4 row1 bb br"><strong>Numeric Pain Scale:</strong>
                        <?php echo $res['num_pain_scale']; ?></td>
                    </div>
                </div>
            </table>
            <strong> Systemic Examination: </strong>
            <br>
            <table class="table">
                <div class="row">
                    <div class="col-4 row1"><strong>R.S: </strong><?php echo $res['rs1']; ?></div>
                    <div class="col-4 row1"><strong>C.V.S: </strong><?php echo $res['cvs1']; ?></div>
                    <div class="col-4 row1 br bb"><strong>C.N.S: </strong><?php echo $res['cns1']; ?></div>
                </div>
                <div class="row">
                    <div class="col-4  row1 bb"><strong>PA: </strong><?php echo $res['pa']; ?></div>
                    <div class="col-4  row1 br bb"><strong>Other:</strong> <?php echo $res['other']; ?></div>
                </div>


            </table>
            <br>
            <strong>Provisonal Diagnosis </strong>
            <?php echo $res['p_diagnosis']; ?>
            <br><br>
            <strong> Final Diagnosis: </strong>
            <?php echo $res['f_diagnosis']; ?>
            <br>
            <br>
            <strong> Plan of Care Rx: </strong>
            <?php echo $res['p_care']; ?>
            <br>
            <br>
            <strong> Name and Sign of Consultant:</strong>
            <?php echo $res['name_sign']; ?>
            <br><br>
            <strong> Date and Time: </strong>
            <?php echo $res['date_time']; ?><br>
        </div>
</body>
<script>
window.print();
</script>

</html>