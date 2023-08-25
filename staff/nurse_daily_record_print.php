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
$fet="SELECT * FROM `nurses_daily_record` WHERE `id`='$id'";
$query_result = $conn->query($fet);
$result = $query_result->fetch_assoc();
 if ($query_result->num_rows > 0) {
     $all = isset($result['allergy']) ? $result['allergy'] : '';
     $care = isset($result['special_care']) ? $result['special_care'] : '';
     $date_decode = $result['date'];
     $time_decode = $result['time'];
     $nursing_note_decode = $result['nursing_note'];
     $name_decode = $result['name'];
     $signature_decode = $result['signature'];
     $remarks_decode = $result['remarks'];


 $dateValue_norm = json_decode($date_decode, true);
 $timeValue_norm = json_decode($time_decode, true);
 $nursing_note_norm = json_decode($nursing_note_decode, true);
 $name_norm = json_decode($name_decode, true);
 $signature_norm = json_decode($signature_decode, true);
 $remarks_norm = json_decode($remarks_decode, true);

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
        <a href="nurses_daily_record.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Nurse Daily Record</h3>
    <?php include_once("../header/header.php") ?>
    <div class="row m-3">
        <div class="col-12 mb-1">
            <strong>Allergy: </strong> <?php echo (!empty($all) ? $all : '') ?>
        </div>
        <div class="col-12 mb-1">
            <strong>Special Care: </strong> <?php echo (!empty($care) ? $care : '')  ?>
        </div>
        <div class="col-12">
        <table class="table table-bordered">
                <thead class="bg-secondary">
                    <tr>
                        <th scope="col" class="col-2">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col" class="text-center col-5" >Nursing Note</th>
                        <th scope="col">Name</th>
                        <th scope="col">Signature</th>
                        <th scope="col">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            for ($i = 0; $i < 25; $i++) {
                                echo '<tr>
                                <td scope="col">'. ($dateValue_norm[$i] ?? '') . '</td>
                                <td scope="col">'. ($timeValue_norm[$i] ?? '') . '</td>
                                <td scope="col">'. ($nursing_note_norm[$i] ?? '') . '</td>
                                <td scope="col">'. ($name_norm[$i] ?? '') . '</td>
                                <td scope="col">'. ($name_norm[$i] ?? '') . '</td>
                                <td scope="col">'. ($remarks_norm[$i] ?? '') . '</td>
                            </tr>';
                            }
                            ?>
                </tbody>
            </table>
        </div>
    </div>
   
    <h6>Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>