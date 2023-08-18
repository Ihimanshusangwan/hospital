<?php
require("../admin/connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
// select * from opd where p_id = id;
$data = $conn->query($sql);
$res = $data->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();


$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();

$sql10="SELECT * FROM `change_label` WHERE 1";
$data10=$conn->query($sql10);
$res10=$data10->fetch_assoc();
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

    body {
        font-size: 17px;
    }

    .mt4 {
        margin-top: 90px;
    }

    @media print {
        .noprint {
            visibility: hidden;
            display: none;
        }
    }

    @page {
        size: A4;
    }
    </style>
    <script>
    window.print();
    </script>
</head>

<body>
    <div class="container">
        <div class="button noprint">

            <button type="button" class="btn btn-danger m-1 noprint" onclick="window.print()" id="print">A4
                Print</button>
            <a href="a5_opd.php?id=<?php echo $id; ?>" class="btn btn-danger m-1 noprint" id="printa5">A5 Print</a>
            <a href="opd_bill.php?id=<?php echo $id; ?>" class="btn btn-info m-1 noprint" id="dashboard">Dashboard</a>

        </div>
        <?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-2 ">OPD Bill</h3>
        <div>
            <div style="margin-bottom : 10px;"></div>
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
                <div class="col-4"><strong>UHID No: </strong><?php echo $res2['uhid'];?>
                </div>
                <div class="col-4"><strong>Consultant:</strong>
                    <?php echo $res['consultant']; ?>
                </div>
                <div class="col-4">
                    <strong>Bill No:
                        <?php echo date("Y"). "/" .$id ?>
                    </strong>

                </div>
            </div>
            <div style=" margin-bottom : 10px;  margin-top: 10px;"></div>


            <form method="POST" action="opd_bill.php?id=<?php echo $id; ?>">
                <div class="container-fluid" style="margin-top: 20px;">
                    <!-- DataTales Example -->
                    <div class="card mb-3">
                        <div class="card-header py-2">
                            <h6 class="font-weight-bold text-center">OPD BILL</h6>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Description</th>
                                        <th>Amount(Rs.)</th>
                                        <th>Qty</th>
                                        <th>Total</th>

                                    </tr>
                                    <tbody id="tbody">
                                        <?php
                                $subtotal = 0;
                                $sql = "SELECT * FROM opd_bill  WHERE patient_id = $id;";
                                $data = $conn->query($sql);
                                $i = 1;
                                $sr = 1;
                                while ($res = $data->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $sr . '</td>';
                                    echo '<td>' . $res['description'] . '</td>';
                                    echo '<td>' . $res['amount'] . '</td>';
                                    echo '<td>' . $res['qty'] . '</td>';
                                    echo '<td>' . $res['total'] . '</td>';
                                    $subtotal += (float) $res['total'];

                                    echo '</tr>';
                                    $i++;
                                    $sr++;
                                }
                                ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </form>


            <input type="hidden" name="patient_id" value="<?php echo $id ?>" id="patient_id">
            <?php
        $sql = "select opd_discount from p_log where id = '$id';";
        $res = $conn->query($sql)->fetch_assoc();
        if($res['opd_discount']!=0){
            echo ' <h6 style="margin-left:  33rem;">SubTotal : <span id="subtotal">';
            echo $subtotal; 
            echo ' </span></h6>';
            echo ' <h6 style="margin-left:  33rem;"> Discount : ';
            echo $res['opd_discount'];echo '</h6>';
        }
        ?>
            <h6 style="margin-left: 33rem;">
                <?php echo isset($res10['lable_1'])?$res10['lable_1']:'Grand Total';?>
                <span id="grandtotal">
                    <?php if($res['opd_discount']!=0){
                        echo $subtotal-$res['opd_discount'];
                    }
                    else{
                         echo $subtotal;
                    }
                      ?>
                </span>
            </h6>

            <div class=" d-flex justify-content-between mt4">
                <div>
                    <script src="../barcode.js"></script>
                    <canvas id="barcode"></canvas>
                    <script>
                    const canvas = document.getElementById('barcode');
                    const opts = {
                        bcid: 'code39', // Barcode type set to Code 39
                        text: '<?php echo $id; ?>', // Numeric value with variable length
                        scale: 2, // Scale factor for the barcode size
                        height: 7, // Height of the barcode in mm
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
                </div>

                <div>
                    <label>Signature</label>
                </div>
            </div>
        </div>
</body>
<script>
on_discount_change();
window.print();
</script>

</html>