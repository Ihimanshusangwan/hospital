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
$check = "SELECT * FROM `drug_administration` WHERE  `id`=$id";
$query_result = $conn->query($check);
$result = $query_result->fetch_assoc();
if ($res) {
    $signature_pre = $result['signature'];
    $table_date_decode = $result['table_date'];
    $table_time_decode = $result['table_time'];
    $dosage_decode = $result['dosage'];
    $drug_name_decode = $result['drug_name'];
    $frequency_decode = $result['frequency'];
    $table_sign_decode = $result['table_sign'];
    $dateValue_norm = json_decode($table_date_decode, true);
    $timeValue_norm = json_decode($table_time_decode, true);
    $dosage_norm = json_decode($dosage_decode, true);
    $drugName_norm = json_decode($drug_name_decode, true);
    $frequency_norm = json_decode($frequency_decode, true);
    $table_sign_norm = json_decode($table_sign_decode, true);

}
// error_reporting(0);
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
                size: A4 ;
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
        <a href="drug_administration.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Drug Administration</h3>
    <?php include_once("../header/header.php") ?>
    <hr />
    <div class="row">
        <div class="col-12">
            <?php
            for ($tab = 0; $tab < 4; $tab++) {
                echo '<table class = "table table-bordered" style="table-layout: fixed;"><h6 class="text-center m-3"><strong>Drug details:</strong></h6>';

                echo '<tr><th>Time</th>';

                for ($i = 0; $i < 8; $i++) {
                    $timeValue = isset($timeValue_norm[$tab * 8 + $i]) ? $timeValue_norm[$tab * 8 + $i] : '';
                    echo "<td>$timeValue</td>";
                }

                echo '</tr>';
                echo '<tr><th>date</th>';

                for ($i = 0; $i < 8; $i++) {
                    $dateValue = isset($dateValue_norm[$tab * 8 + $i]) ? $dateValue_norm[$tab * 8 + $i] : '';
                    echo "<td>$dateValue</td>";
                }

                echo '</tr>';
                echo '<tr><th>Name of Drug</th>';

                for ($i = 0; $i < 8; $i++) {
                    $drugNameValue = isset($drugName_norm[$tab * 8 + $i]) ? $drugName_norm[$tab * 8 + $i] : '';
                    echo "<td>$drugNameValue</td>";
                }

                echo '</tr>';
                echo '<tr><th>Dosage</th>';
                for ($i = 0; $i < 8; $i++) {
                    $dosageValue = isset($dosage_norm[$tab * 8 + $i]) ? $dosage_norm[$tab * 8 + $i] : ''; // Check if the value is set, otherwise assign an empty string
                    echo "<td>$dosageValue</td>";
                }

                echo '</tr>';
                echo '<tr><th>Frequency</th>';

                for ($i = 0; $i < 8; $i++) {
                    $frequencyValue = isset($frequency_norm[$tab * 8 + $i]) ? $frequency_norm[$tab * 8 + $i] : ''; // Check if the value is set, otherwise assign an empty string
                    echo "<td>$frequencyValue</td>";
                }

                echo '</tr>';
                echo '<tr><th>Sign</th>';

                for ($i = 0; $i < 8; $i++) {
                    $tableSignValue = isset($table_sign_norm[$tab * 8 + $i]) ? $table_sign_norm[$tab * 8 + $i] : ''; // Check if the value is set, otherwise assign an empty string
                    echo "<td>$tableSignValue</td>";
                }

                echo '</tr>';

                echo '</table>';
            }
            ?>
        </div>
        <div class="col-6 m-3">
            <strong>Sign: </strong> <?php echo $signature_pre; ?>
        </div>
    </div>

    <h6>Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>