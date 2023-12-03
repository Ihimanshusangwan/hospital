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

$sql5=mysqli_query($conn,"SELECT * FROM dis_sum WHERE id =$id");
$row5=mysqli_fetch_assoc($sql5);

  
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
        <a href="discharge_summary.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Discharge Summary</h3>

    <?php include_once("../header/header.php") ?>
    <div class="row">
                <table class="table table-bordered border-black">
                    <tr>
                        <th>Date of Admission : </th>
                        <td><?php echo $res2['date'];?></td>
                        <th>Time of Admission :</th>
                        <td><?php echo $res2['time'];?></td>
                    </tr>
                    <tr>
                        <th>Date of Discharge :</th>
                        <td><?php echo $row5['date_dis'];?></td>
                        <th>Time of Discharge :</th>
                        <td><?php echo $row5['time_dis'];?></td>

                    </tr>
                    <tr>
                        <th>Type of Discharge :</th>
                        <td><?php echo $row5['type'];?></td>
                        <th>Bed No. :</th>
                        <td><?php echo $res2['bed/room'];?></td>
                    </tr>
                </table>
            </div>
               <div class="row">
                <div class="col-12" style ="text-decoration:underline;">Admission History</div>
                <div class="col-6">Chief Complaints :<?php echo $row5['cc'];?>
                </div>
                <div class="col-6" >General Examination :
                    <div class="row">
                        <div class="col-6">Pulse :<?php echo $row5['pulse'];?></div>
                        <div class="col-6">BP :<?php echo $row5['bp'];?></div>
                        <div class="col-6">SPO2 :<?php echo $row5['spo'];?></div>
                        <div class="col-6">Height :<?php echo $row5['height'];?></div>
                        <div class="col-6">Weight :<?php echo $row5['weight'];?></div>
                    </div>
                </div>
                <div class="col-12">Systematic Examination
                    <div class="row">
                        <div class="col-6">RS :<?php echo $row5['rs'];?></div>
                        <div class="col-6">CVS :<?php echo $row5['cvs'];?></div>
                        <div class="col-6">CNS :<?php echo $row5['cns'];?></div>
                        <div class="col-6">Per Abdomen :<?php echo $row5['abdomen'];?></div>
                    </div>
                </div>

                <div class="col-6">Treatment Given :<?php echo $row5['treatment'];?></div>
                <div class="col-12">Operative Notes
                    <div class="row">
                        <div class="col-6">Date :<?php echo $row5['date_s'];?></div>
                        <div class="col-6">Surgery :<?php echo $row5['surgery'];?></div>
                        <div class="col-6">Surgeon :<?php echo $row5['surgeon'];?></div>
                        <div class="col-6">Operative Note :<?php echo $row5['notes'];?></div>
                        <div class="col-6">Anaesthetist :<?php echo $row5['an'];?></div>
                        <div class="col-6">Anesthesia :<?php echo $row5['anesthesia'];?></div>
                        <div class="col-6">Delivery Note :<?php echo $row5['del_notes'];?></div>
                        <div class="col-6">Delivery Date & Time :<?php echo $row5['del_dt'];?></div>
                    </div>
                </div>
                <div class="col-6">Condition On Discharge :<?php echo $row5['co'];?></div>
                <div class="col-6">Provisional Diagnosis :<?php echo $row5['diagnosis'];?></div>
               <div class="col-6">Final Diagnosis :<?php echo $row5['final'];?></div>
                <div class="col-6">Special Instructions :<?php echo $row5['special'];?></div>
           
  <?php
    $sql7 = "SELECT * FROM discharge_sum WHERE pt_id = '$id';";
                    $row7 = $conn->query($sql7);
  
?>
                <div class="col-12"style="overflow:auto;">
                Medicine on Discharge
                <table class="table table-bordered border-black" >
                        <tr>
                            <th>Medicine</th>
                            <th>Tablet</th>
                            <th>Dosage</th>
                            <th>Timing</th>
                            <th>Days</th>
                        </tr>
                        <tr><tbody id="tbody">
                            <?php
                  $i = 1;
                  $sr = 1;
                  while ($res = $row7->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $res['a'] . '</td>';
                    echo '<td>' . $res['b'] . '</td>';
                    echo '<td>' . $res['c'] . '</td>';
                    echo '<td>' . $res['d'] . '</td>';
                    echo '<td>' . $res['e'] . '</td>';
                    echo '</tr>';
                    $i++;
                    $sr++;
                }
                  ?>
                        </tbody>
                        </tr>
                </table>
            </div>

            <div class="col-6">Advice :<?php echo $row5['advice'];?></div>
            <div class="col-6">Follow Up date :<?php echo $row5['follow'];?></div>
            <div class="col-6">Emergency Contact No. :<?php echo $row5['emer'];?></div>
            <div class="col-6">Patient / Relatives Sign :<?php echo $row5['sign'];?></div>
            <div class="col-6">Consultant Incharge :<?php echo $row5['incharge'];?></div>
            <div class="col-6">Sister :<?php echo $row5['sis'];?></div>
            <div class="col-6">R.M.O.:<?php echo $row5['rmo'];?></div>
            </div>

    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>