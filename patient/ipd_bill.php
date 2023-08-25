<?php
error_reporting(0);
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql3 = "SELECT * FROM ipd_bill2 WHERE id = '$id';";
$data3 = $conn->query($sql3);
$res3 = $data3->fetch_assoc();
$sql4 = "SELECT * FROM discharge WHERE id = '$id';";
$data4 = $conn->query($sql4);
$res4 = $data4->fetch_assoc();

$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

$query = "SELECT * FROM ipd_bill1 WHERE id='$id'";
$bill = $conn->query($query)->fetch_assoc();
$bills = json_decode($bill['description']);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>BILL RECEIPT</title>
</head>
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
        }
    </style>

<body>
<div class="container">
    <div id="button">
                <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
                <a href="patient.php?id=<?php echo $id; ?>?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
            </div>
<?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">IPD Bill</h3>
        <?php include_once("../header/header.php") ?>
        <strong>Bill No:
            <?php echo date("Y"). "/" .$id ?>
            </strong>
    </div>

    
    </div>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">Charges</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($bills as $val) {
                    $j = 1;
                    foreach ($val as $value) {
                        if (!empty($value)) {
                            $j++;
                        }
                        if ($j > 4) {
                            echo '<tr>';
                            foreach ($val as $value) {
                                $j = 1;
                                echo '<th>' . strtoupper($value) . '</th>';
                            }
                            echo '</tr>';
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <span>Total Amount Deposited:
                    <?php echo $res3['adv']; ?>.00
                </span>
                <span><strong style="font-size" :20px;>Total Payment Due:
                        <?php echo $res3['pay_due']; ?>.00
                    </strong></span>
                <span>Payment Mode:
                    <?php echo $res3['pay_method']; ?>
                </span>
            </div>
        </div>
        <h5 style="text-align: right; margin-right: 2em;">SubTotal :
            <?php echo $res3['tot_pay']; ?>.00
        </h5>
        <h5 style="text-align: right; margin-right: 2em;">Discount : .00</h5>
        <h5 style="text-align: right; margin-right: 2em;">Grand Total :
            <?php echo intval($res3['tot_pay']) - intval($bill['discount']); ?>.00
        </h5> <br><br><br>
        <h6 style="text-align: right; margin-right: 3em;">Signature</h6>
        <h6>Thank You !</h6>
        <p>Note: No Second Bill will be generated</p>
        <hr>
        <p style="text-align: center;">Invoice was created on a computer and is not valid without signature.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</body>

</html>