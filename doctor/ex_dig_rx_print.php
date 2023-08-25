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


                    <?php
                    $sql = "SELECT * FROM `opto_examination`  WHERE `id`= '$id' ";
                    $data = $conn->query($sql);
                    $result = $data->fetch_assoc();
                    ?>
                    <div class="col-12 "><strong>Examination:</strong></div>
                    <div class="col-12  mt-3">

                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col"> <input type="checkbox" id="checkbox2" name="wnl" <?php echo (isset($result['wnl']) && $result['wnl'] === 'on') ? 'value = "on" checked' : 'value="off"'; ?>>
                                        WNL
                                    <th scope="col" class="text-center">RE/OD</th>
                                    <th scope="col" class="text-center">LE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">LIDS</th>
                                    <td>
                                        <?php echo $result['lids_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['lids_2']; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">CONJUCTIVE</th>
                                    <td>
                                        <?php echo $result['conjunctive_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['conjunctive_2']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">CORNEA</th>
                                    <td>
                                        <?php echo $result['cornea_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['cornea_2']; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">A/C</th>
                                    <td>
                                        <?php echo $result['ac_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['ac_2']; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">PUPIL</th>
                                    <td>
                                        <?php echo $result['pupil_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['pupil_2']; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">LENS</th>
                                    <td>
                                        <?php echo $result['lens_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['lens_2']; ?>
                                    </td>

                                <tr>
                                    <th scope="row">FUNDUS</th>
                                    <td>
                                        <?php echo $result['fundus_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['fundus_2']; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">SAC</th>
                                    <td>
                                        <?php echo $result['sac_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['sac_2']; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">IOP</th>
                                    <td>
                                        <?php echo $result['iop_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['iop_2']; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">DIAGNOSIS</th>
                                    <td>
                                        <?php echo $result['diagnosis_1']; ?>
                                    </td>
                                    <td>
                                        <?php echo $result['diagnosis_2']; ?>
                                    </td>

                                </tr>
                            </tbody>

                        </table>

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
                                        $sql = "SELECT * FROM opto_pres WHERE patient_id = $id ORDER BY id DESC;";
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
                    <?php
                    $sql = "select dig from opto_examination where id=$id";
                    $res = $conn->query($sql)->fetch_assoc();
                    $dig = $res['dig'];
                    if ($dig != "") {

                        $sql = "select img_add from opto_images where img_desc = '$dig' and patient_id = $id";
                        $res = $conn->query($sql)->fetch_assoc();
                        $img = $res['img_add'];
                        echo <<<data
      <div class="col-1">
               <strong> Diagram:</strong>
            </div>
  <div class="col-10 offset-1" style="height: 500px;"> <img src="$img" alt="can't load image" style="height:100%; width:100%;"> </div>

data;

                    }

                    ?>

                    <h6>Thank You !</h6>
                </div>
                <script>window.print();</script>
</body>

</html>