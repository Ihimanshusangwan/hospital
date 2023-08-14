<?php
$id = $_GET['id'];
require("../admin/connect.php");
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
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible content=" IE="edge">
    <meta viewport content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style>
<<<<<<< HEAD
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
=======
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
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
    </style>
</head>

<body>

    <div id="button">
        <button type="button" class=" btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="initialcounselling.php?id=<?php echo $id; ?>" class=" btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Initial Counselling</h3>
<<<<<<< HEAD
    <div>
        <div style="border-bottom: 3px solid black; margin-bottom : 10px;"></div>
        <div class="row">
            <div class="col-3"><strong>UHID No:</strong>
                <?php echo $res2['uhid']; ?>
            </div>
            <div class="col-3"><strong>IPD No:</strong>
                <?php echo $res2['ipd']; ?>
            </div>
            <div class="col-3"><strong>Ward/ICU:</strong>
                <?php echo $res2['ward/icu']; ?>
            </div>
            <div class="col-3"><strong>Bed / Room No:</strong>
                <?php echo $res2['bed/room']; ?>
            </div><br>
            <div class="col-6"><strong>Name:</strong>
                <?php echo strtoupper($res['name']); ?>
            </div>
            <div class="col-3"><strong>Age:</strong>
                <?php echo strtoupper($res['age']); ?>
            </div>
            <div class="col-3"><strong>Sex:</strong>
                <?php echo $res['sex']; ?>
            </div><br>
            <?php
            $sql = "select * from ortho_initial_counselling where patient_id = $id;";
            $res = $conn->query($sql)->fetch_assoc();
            ?>
            <div class="col-6"><strong>EMR NO.: </strong>
                <?php echo $res['emr']; ?>
            </div>
            <div class="col-3"><strong>Surgeon: </strong>
                <?php echo $res['surgeon']; ?>
            </div>
            <div class="col-6"><strong>Procedure: </strong>
                <?php echo $res['proc']; ?>
            </div>
            <br>
            <div class="col mx-3" style="display: flex; justify-content: flex-end;">
                <script src="../barcode.js"></script>
                <canvas id="barcode"></canvas>
                <script>
                    const canvas = document.getElementById('barcode');
                    const opts = {
                        bcid: 'code39',  // Barcode type set to Code 39
                        text: '<?php echo $id; ?>',  // Numeric value with variable length
                        scale: 2,  // Scale factor for the barcode size
                        height: 10,  // Height of the barcode in mm
                        includetext: false,  // Include the barcode text
                    };

                    bwipjs.toCanvas(canvas, opts, function (err) {
                        if (err) {
                            console.error('Error generating barcode:', err);
                        } else {
                            console.log('Barcode generated successfully');
                        }
                    });
                </script>
            </div><br>

        </div>
        <div style="border-bottom: 3px solid black; margin-bottom : 10px;  margin-top: 10px;"></div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                    <?php
=======
        <div style="border-bottom: 3px solid black; margin-bottom : 10px;"></div>
        <div class="row">
            <div class="col-4"><strong>Name:</strong>
                <?php echo strtoupper($res['name']); ?>
            </div>
            <div class="col-4"><strong>Age:</strong>
                <?php echo strtoupper($res['age']); ?>
            </div>
            <div class="col-4"><strong>Sex:</strong>
                <?php echo $res['sex']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-4"><strong>UHID No:</strong>
                <?php echo $res2['uhid']; ?>
            </div>
            <div class="col-4"><strong>IPD No:</strong>
                <?php echo $res2['ipd']; ?>
            </div>
            <div class="col-4"><strong>Ward/ICU:</strong>
                <?php echo $res2['ward/icu']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <strong>Bed / Room No:</strong>
                <?php echo $res2['bed/room']; ?>
            </div>
        <?php
            $sql = "select * from ortho_initial_counselling where patient_id = $id;";
            $res = $conn->query($sql)->fetch_assoc();
            ?>
        <div class="col-4"><strong>EMR NO.: </strong>
            <?php echo $res['emr']; ?>
        </div>
        <div class="col-4"><strong>Surgeon: </strong>
            <?php echo $res['surgeon']; ?>
        </div>
        <div class="row">
        <div class="col-6"><strong>Procedure: </strong>
            <?php echo $res['proc']; ?>
        </div>
        </div>
        <br>
        <div class="col mx-3" style="display: flex; justify-content: flex-end;">
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
        </div><br>

    </div>
    <div style="border-bottom: 3px solid black; margin-bottom : 10px;  margin-top: 10px;"></div>
    <div class="col-md-12">
        <table class="table table-bordered">
            <tbody>
                <?php
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                    $tasks = [
                        "Diagnosis / Reason For Admission",
                        "Any Possible complications Thereof",
                        "The Plan of Treatment",
                        "Any Other Alternatives And Preventive Aspects That You May Have",
                        "The Benefits Of The Alternatives Involved",
                        "Diet, Nutrition And Medication",
                        "That You Can Make Informed Choice Among Available Options",
                        "That Your Patient Has Right To Refuse The Treatment",
                        "Expected Date Of Discharge",
                        "Expected Cost Of Treatment",
                        "Expected Results"
                    ];

                    $description = json_decode($res['description'], true);
                    if (!$description) {
                        $description = array_fill(0, count($tasks), array('name' => '', 'value' => 'No'));
                    }

                    for ($i = 0; $i < count($tasks); $i++) {
                        $task = $tasks[$i];
                        $taskStatus = $description[$i]['value'];

                        echo "<tr>
        <th>" . ($i + 1) . "</th>
        <td>$task</td>
        <td>$taskStatus</td>
    </tr>";
                    }
                    ?>
<<<<<<< HEAD
                    <tr>
                        <th scope='row'>12</th>
                        <td>Payment Mode :</td>
                        <td><?php echo $res['payment_mode']; ?>
                        </td>
                    </tr>

                </tbody>
            </table>
            <p>My / Our all concerns about proposed care and treatment have been satisfactorily addressed by Medical
                Councilor in a
                language that | / we understand.</p>
            <p>| / We understand and agree to all the above information. My / Our signature indicates that | fwe have
                read the above
                information and agree with it.
            </p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Signature</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Patient </th>
                        <td> <?php echo $res['patient_sign'];  ?></td>
                        <td><?php echo $res['patient_name'];  ?></td>
                        <td><?php echo $res['patient_date']; ?></td>
                        <td><?php echo $res['patient_time']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Witness </th>
                        <td><?php echo $res['witness_sign']; ?></td>
                        <td><?php echo $res['witness_name']; ?></td>
                        <td><?php echo $res['witness_date']; ?></td>
                        <td><?php echo $res['witness_time']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Name of the councellor </th>
                        <td><?php echo $res['councellor_sign']; ?></td>
                        <td><?php echo $res['councellor_name']; ?></td>
                        <td><?php echo $res['councellor_date']; ?></td>
                        <td><?php echo $res['councellor_time']; ?></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</body>
<script> window.print(); </script>
=======
                <tr>
                    <th scope='row'>12</th>
                    <td>Payment Mode :</td>
                    <td><?php echo $res['payment_mode']; ?>
                    </td>
                </tr>

            </tbody>
        </table>
        <p>My / Our all concerns about proposed care and treatment have been satisfactorily addressed by Medical
            Councilor in a
            language that | / we understand.</p>
        <p>| / We understand and agree to all the above information. My / Our signature indicates that | fwe have
            read the above
            information and agree with it.
        </p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Signature</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Patient </th>
                    <td> <?php echo $res['patient_sign'];  ?></td>
                    <td><?php echo $res['patient_name'];  ?></td>
                    <td><?php echo $res['patient_date']; ?></td>
                    <td><?php echo $res['patient_time']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Witness </th>
                    <td><?php echo $res['witness_sign']; ?></td>
                    <td><?php echo $res['witness_name']; ?></td>
                    <td><?php echo $res['witness_date']; ?></td>
                    <td><?php echo $res['witness_time']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Name of the councellor </th>
                    <td><?php echo $res['councellor_sign']; ?></td>
                    <td><?php echo $res['councellor_name']; ?></td>
                    <td><?php echo $res['councellor_date']; ?></td>
                    <td><?php echo $res['councellor_time']; ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    </div>

</body>
<script>
window.print();
</script>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24

</html>