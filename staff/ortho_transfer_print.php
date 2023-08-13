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
$sql3 = "SELECT * FROM counsel WHERE id = '$id';";
$data3 = $conn->query($sql3);
$con = $data3->fetch_assoc();
$vital = explode("&", $con['vital']);
$attach = explode("&", $con['attach']);
$transfer = explode("&", $con['transfer']);
$conset = explode("&", $con['conset']);
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
        <a href="transferForm.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Transfer Form </h3>
    <?php include_once("../header/header.php") ?>
    <hr />
    <div class="row">
        <div class="col-12">
            <strong>Treatment Details : </strong>
            <?php echo $con['treat']; ?>
        </div>
        <div class="col-12 text-center">
            <strong>Vitals at Transfer</strong>
        </div>
        <div class="col-3">
            <strong>B.P: </strong>
            <?php echo $vital[0] ?>
        </div>
        <div class="col-3">
            <strong>Pulse: </strong>
            <?php try {
                echo $vital[1];
            } catch (Excetion $e) {
            } ?>
        </div>
        <div class="col-3">
            <strong>R.R: </strong>
            <?php try {
                echo $vital[2];
            } catch (Excetion $e) {
            } ?>
        </div>
        <div class="col-3">
            <strong>Other: </strong>
            <?php try {
                echo $vital[3];
            } catch (Excetion $e) {
            } ?>
        </div>


        <div class="col-12">
            <strong>Mental Status :</strong>
            <?php try {
                echo $vital[4];
            } catch (Excetion $e) {
            } ?>
        </div>
        <div class="col-12">
            <strong>Condition of Patient At The Time Of Transfer :</strong>
            <?php try {
                echo $vital[5];
            } catch (Excetion $e) {
            } ?>
        </div>
        <div class="col-12">
            <strong>Copy of Treatment Documentation Attached : </strong><?php echo $con['copy'];?>
        </div>
        <div class="col-12 text-center">
            <strong>Attachments with Patient</strong>
        </div>
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php  try{echo $attach[0];} catch(Excetion $e){}?></td>
                        <td><?php  try{echo $attach[1];} catch(Excetion $e){}?></td>
                        <td><?php  try{echo $attach[2];} catch(Excetion $e){}?></td>
                    </tr>
                    <tr>
                        <td><?php  try{echo $attach[3];} catch(Excetion $e){}?></td>
                        <td><?php  try{echo $attach[4];} catch(Excetion $e){}?></td>
                        <td><?php  try{echo $attach[5];} catch(Excetion $e){}?></td>
                       
                    </tr>
                    <tr>
                    <td><?php  try{echo $attach[6];} catch(Excetion $e){}?></td>
                    <td><?php  try{echo $attach[7];} catch(Excetion $e){}?></td>
                    <td><?php  try{echo $attach[8];} catch(Excetion $e){}?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-8">
            <strong>Reason For Transfer :</strong><?php  try{echo $transfer[0];} catch(Excetion $e){}?>
        </div>
        <div class="col-4">
            <strong>Transfer To :</strong><?php  try{echo $transfer[1];} catch(Excetion $e){}?>
        </div>
        <div class="col-6">
            <strong>Transfer Adviced By : </strong><?php  try{echo $transfer[2];} catch(Excetion $e){}?>
        </div>
        <div class="col-6">
            <strong>Attending Staff : </strong><?php  try{echo $transfer[3];} catch(Excetion $e){}?>
        </div>
        <div class="col-12 text-center">
            <strong>CONSENT FOR TRANSFER</strong>
        </div>
        <div class="col-12">
        <p class="text-danger">I/we,am/are willing to transfer the patient name <?php echo $res['name'];?>.As per advise of Doctor.The reason for transfer,condition of Patient,treatment,risks and consequences etc.Have been explained to me/us and understood by me/us</p>
        </div>
        <div class="col-12">
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Signature of Patient</th>
                        <th scope="col">Signature of Witness</th>
                        <th scope="col">Signature of Medical Officer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Date</th>
                        <td><?php  try{echo $conset[0];} catch(Excetion $e){}?></td>
                        <td><?php  try{echo $conset[1];} catch(Excetion $e){}?></td>
                        <td><?php  try{echo $conset[2];} catch(Excetion $e){}?></td>
                        
                    </tr>
                    <tr>
                        <th scope="row">Time</th>
                        <td><?php  try{echo $conset[3];} catch(Excetion $e){}?></td>
                        <td><?php  try{echo $conset[4];} catch(Excetion $e){}?></td>
                        <td><?php  try{echo $conset[5];} catch(Excetion $e){}?></td>
                    </tr>
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