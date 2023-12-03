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
            <div class="row">
                <div class="col-12 ">
                    <?php
                    $sql5 = "SELECT * FROM `cc_glass_rx1`  WHERE `id`= $id";
                    $data5 = $conn->query($sql5);
                    $result5 = $data5->fetch_assoc();
                    error_reporting(0);
                    // print_r($result5);
                    ?>

                    <div class="row">
                        <div class="col"><strong>TYCLO TLIGC:</strong></div>
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
                                    <td>{$result5["dist2_input_$i"]}</td>
data;
                                } ?>

                            </tr>
                            <tr>
                                <th scope="col">NEAR</th>
                                <?php for ($i = 1; $i < 9; $i++) {
                                    echo <<<data
                                    <td>{$result5["near2_input_$i"]}</td>
data;
                                } ?>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                    <div class="col-3">
                        <strong>Glass Type:</strong>
                        <?php echo $result5['glass2_type']; ?>
                    </div>
                    <div class="col-3">
                        <strong>Glass Color:</strong>
                        <?php echo $result5['glass2_colour']; ?>
                    </div>
                    <div class="col-3">
                        <strong>Glass Use:</strong>
                        <?php echo $result5['glass2_use']; ?>
                    </div>
                    <div class="col-3">
                        <strong>PD:</label></strong>
                            <?php echo $result5['pd2']; ?>
                    </div>
                </div>


                </div>
                <div class="col-12 mt-5">
                    <strong>Medicines:</strong>
                </div>
                <div class="col-12 mt-1">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="col-1">Types</th>
                                        <th class="col-3">Medicine</th>
                                        <th class="col-1">सकाळ</th>
                                        <th class="col-1">दुपार</th>
                                        <th class="col-1">रात्र</th>
                                        <th class="col-1">कधी घ्यायच्या </th>
                                        <th class="col-1">किती दिवस </th>
                                        <th class="col-1">Qty</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php
                                        $sql = "SELECT * FROM opto_pres WHERE patient_id = $id ORDER BY id ;";
                                        $data = $conn->query($sql);
                                        $i = 1;
                                        while ($res = $data->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $res['type'] . '</td>';
                                            echo '<td>' . $res['med_name'] . '</td>';
                                            echo '<td>' . $res['morning'] . '</td>';
                                            echo '<td>' . $res['afternoon'] . '</td>';
                                            echo '<td>' . $res['night'] . '</td>';
                                            echo '<td>' . $res['eat'] . '</td>';
                                            echo '<td>' . $res['days'] . '</td>';
                                            echo '<td>' . $res['quantity'] . '</td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h6>Thank You !</h6>
            </div>
            <script>
            window.print();
            </script>
</body>

</html>