<?php
require("../admin/connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql4 = "SELECT * FROM discharge WHERE id = '$id';";
$data4 = $conn->query($sql4);
$res4 = $data4->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
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
    <title>Discharge Form</title>
    <style>
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
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="button">
            <a href="discharge.php?id=<?php echo $id; ?>" class="btn btn-info noprint" id="dashboard">Dashboard</a>
            <a class="btn btn-primary m-2" onclick="window.print()">Print</a>
        </div>
        <?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">Discharge Form</h3>
        
    </div>
    <div class="container">
        
        
        <div class="row">
        <div style="border-bottom: 3px solid black; margin-bottom : 10px;"></div>
            <div class="col-6"><strong>Name:</strong>
                <?php echo strtoupper($res['name']); ?>
            </div>
            <div class="col-6"><strong>Date of Admission:</strong>
                <?php echo $res2['date']; ?>
            </div>
            <div class="col-6"><strong>D.O.A Time</strong>
                <?php echo $res2['time']; ?>
            </div>
            <div class="col-6"><strong>Date of Discharge / Death:</strong>
                <?php echo $res4['date']; ?>
            </div>
            <div class="col-3"><strong>D.O.D Time</strong>
                <?php echo $res4['time']; ?>
            </div>
            <div class="col-3"><strong>Age:</strong>
                <?php echo strtoupper($res['age']); ?>
            </div>
            <div class="col-3"><strong>Sex:</strong>
                <?php echo $res['sex']; ?>
            </div>
            <div class="row">
                <div class="col-12"><strong>Address</strong>
                    <?php echo $res['address'] . " " . $res['taluka'] . " " . $res['district']; ?>
                </div>
                <div class="col-3"><strong>MLC. NO</strong>
                    <?php echo $res4['mlc']; ?>
                </div>
                <div class="col-3"><strong>M. / .I</strong>
                    <?php echo $res4['mi']; ?>
                </div>
                <br>
                <div style="border-bottom: 3px solid black; margin-bottom : 10px;"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12"><strong>Provisonal Diagnosis </strong>
                        <?php echo $res4['pd']; ?>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12"><strong>History : </strong>
                        <?php echo $res4['history']; ?>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12"><strong>Primary Complaint :</strong>
                        <?php echo $res['patient_complaints']; ?>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12"><strong>Examination Finding :</strong>
                        <?php echo $res4['exam']; ?>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12"><strong>Treatment :</strong>
                        <?php echo $res4['treat']; ?>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12"><strong>Follow Up Date:</strong>
                        <?php echo $res4['date1']; ?>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12"><strong>Follow Up:</strong>
                        <?php echo $res4['follow']; ?>
                    </div>
                </div><br>

            </div>
</body>
<script>
    window.print();
</script>

</html>