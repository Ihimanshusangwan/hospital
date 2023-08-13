<?php
require("../admin/connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
// select * from opd where p_id = id;
$result = $conn->query($sql);
$res = $result->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

// $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
// $data1 = $conn->query($sql1);
// $res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Document</title>
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
            .noprint {
                visibility: hidden;
            }

            body {
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="button">
            <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
            <a href="opto.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
        </div>

        <?php include_once("../header/images.php") ?>
        <div>
            <div style="border-bottom: 3px solid black; margin-bottom : 10px;"></div>
            <div class="row">
                <div class="col-6"><strong>UHID No:</strong>
                    <?php echo $res2['uhid']; ?>
                </div>
                <div class="col-6"><strong>Name:</strong>
                    <?php echo strtoupper($res['name']); ?>
                </div>
                <div class="col-6"><strong>Age:</strong>
                    <?php echo strtoupper($res['age']); ?>
                </div>
                <div class="col-6"><strong>Sex:</strong>
                    <?php echo $res['sex']; ?>
                </div><br>
                <div class="col-8"><strong>Consultant:</strong>
                    <?php echo $res['consultant']; ?>
                </div>
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
            <div class="row">
                <div class="col-12 ">
                    <?php
                    $sql5 = "SELECT * FROM `cc_glass_rx`  WHERE `id`= '$id'";
                    $data5 = $conn->query($sql5);
                    $result5 = $data5->fetch_assoc();
                    // print_r($result5);
                    ?>

                    <div class="row">
                        <div class="col"><strong>Glass details:</strong></div>
                        <div class="col"><strong>RE:</strong></div>
                        <div class="col offset-1"><strong>LE:</strong></div>
                    </div>

                    <table class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th class="w-2">SPH</th>
                                <th scope="col">CYL</th>
                                <th scope="col">AXIS</th>
                                <th scope="col">Vision</th>
                                <th scope="col">SPH</th>
                                <th scope="col">CYL</th>
                                <th scope="col">AXIS</th>
                                <th scope="col">Vision</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col">DIST</th>
                                <?php for ($i = 1; $i < 9; $i++) {
                                    echo <<<data
                                    <td>{$result5["dist_input_$i"]}</td>
data;
                                } ?>

                            </tr>
                            <tr>
                                <th scope="col">NEAR</th>
                                <?php for ($i = 1; $i < 9; $i++) {
                                    echo <<<data
                                    <td>{$result5["near_input_$i"]}</td>
data;
                                } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
            <div class="col-md-2 ">
                <strong>Glass Type:</strong>
                <?php echo $result5['glass_type']; ?>
            </div>
            <div class="col-md-2">
                <strong>Glass Color:</strong>
                <?php echo $result5['glass_colour']; ?>
            </div>
            <div class="col-md-2">
                <strong>Glass Use:</strong>
               <?php echo $result5['glass_use']; ?>
            </div>
            <div class="col-md-2">
                <strong>PD:</label>
                <?php echo $result5['pd']; ?>
            </div>
        </div>
                
                <h6>Thank You !</h6>
            </div>
            <script>window.print();</script>
</body>

</html>