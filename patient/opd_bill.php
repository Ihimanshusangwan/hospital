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
        }
    </style>
    <script>
        var items = 0;
        function addItem() {
            items++;
            var html = "<tr>";
            html += "<td>" + items + "</td>";
            html += "<td><input type='text' name='description_" + items + "' ></td>";
            html += "<td><input class='amount' type='number' name='amount_" + items + "' onchange='on_amount_change()'></td>";
            html += "<td><input  class='qty' type='number' name='qty_" + items + "' onchange='on_qty_change()'></td>";
            html += "<td><input  class='total' type='number' name='total_" + items + "' readonly></td>";
            html += "<td><button class='btn btn-danger' type='button' onclick='deleteRow(this);'>Delete</button></td>"
            html += "</tr>";

            var row = document.getElementById("tbody").insertRow();
            row.innerHTML = html;
            on_amount_change();
        }

        function on_amount_change() {
            var amounts = document.getElementsByClassName("amount");
            var qtys = document.getElementsByClassName("qty");
            var totals = document.getElementsByClassName("total");
            var subtotal = initial_subtotal;
            for (var i = 0; i < amounts.length; i++) {
                totals[i].value = amounts[i].value * qtys[i].value;
                subtotal += parseFloat(totals[i].value);
            }
            document.getElementById("subtotal").innerHTML = subtotal;
            on_discount_change();
        }
        function on_qty_change() {
            var amounts = document.getElementsByClassName("amount");
            var qtys = document.getElementsByClassName("qty");
            var totals = document.getElementsByClassName("total");
            var subtotal = initial_subtotal;
            for (var i = 0; i < amounts.length; i++) {
                totals[i].value = amounts[i].value * qtys[i].value;
                subtotal += parseFloat(totals[i].value);
            }
            document.getElementById("subtotal").innerHTML = subtotal;
            on_discount_change();
        }
        function on_discount_change() {
            var discount = parseFloat(document.getElementById("discount").innerHTML);
            var subtotal = parseFloat(document.getElementById("subtotal").innerHTML);
            var discount_amount = subtotal * (discount / 100);
            var total = subtotal - discount_amount;
            document.getElementById("discount").innerHTML = discount_amount.toFixed(2);
            document.getElementById("grandtotal").innerHTML = total.toFixed(2);
        }


        function deleteRow(button) {
            button.parentElement.parentElement.children[1].children[0].value = "";
            button.parentElement.parentElement.children[2].children[0].value = "";
            button.parentElement.parentElement.children[3].children[0].value = "";
            button.parentElement.parentElement.children[4].children[0].value = "";
            button.parentElement.parentElement.style.display = "none";
            on_amount_change();
            // first parentElement will be td and second will be tr.
        }
    </script>
</head>

<body >
<div class="container">
        <div id="button">
            <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
            <a href="patient.php?id=<?php echo $id; ?>?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
        </div>
        <?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">OPD Bill</h3>
        <?php include_once("../header/header.php") ?>
        <strong>Bill No:
            <?php echo date("Y"). "/" .$id ?>
            </strong>
    <?php
    if (isset($_REQUEST['submit_changes'])) {
        $i = 1;
        while (isset($_POST["description_$i"])) {

            if ($_POST["description_$i"] !== "") {


                $description = $_POST["description_$i"];
                $amount = $_POST["amount_$i"];
                $qty = $_POST["qty_$i"];
                $total = $_POST["total_$i"];
                $id = $_GET['id'];
                $sql10 = "SELECT * FROM patient_records WHERE id = '$id';";
                $data10 = $conn->query($sql10);
                $res10 = $data10->fetch_assoc();
                $username = $res10['name'];
                $password = $res10['mobile'];   
                $is_opd = 1; 
                $update2="UPDATE `p_log` SET `is_opd` = '$is_opd',`username`='$username',`password`='$password' WHERE `id` = '$id'";
                $conn->query($update2);

                $sql = "INSERT INTO opd_bill (patient_id,description,amount,qty,total) VALUES ($id,'$description','$amount','$qty','$total');";
                if ($conn->query($sql) === TRUE) {
                    $i++;
                } else {
                    echo "<div class='alert alert-danger'>Error Updating Bill</div>";
                }

            } else {
                $i++;
            }

        }
        echo "<div class='alert alert-success'>Bill Updated Successfully</div>";
    }
    if (isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM opd_bill WHERE id = {$_POST['bill_id']} ;";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Bill Deleted Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error Deleting Bill</div>";
        }
    }
    $sql = "SELECT * FROM opd_bill WHERE id = $id;";
    $res = $conn->query($sql)->fetch_assoc();
    ?>

    <form method="POST" action="opd_bill.php?id=<?php echo $id; ?>">
        <div class="container-fluid" style="margin-top: 20px;">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">OPD BILL</h6>
                </div>
                <div class="card-body">
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
                                    $subtotal += (float)$res['total'];
                                    
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
    <h5 style="text-align: right; margin-right: 2em;">SubTotal : <span id="subtotal"><?php echo $subtotal;?></span></h5>
    <h5 style="text-align: right; margin-right: 2em;">Discount : <span id="discount">0</span></h5>
    <h5 style="text-align: right; margin-right: 2em;">Grand Total : <span id="grandtotal"><?php echo $subtotal;?></span></h5> <br><br><br>
    <h6 style="text-align: right; margin-right: 3em;">Signature</h6>
    <h6>Thank You !</h6>
    </div>
</body>
<script>  
    var initial_subtotal = parseFloat(document.getElementById("subtotal").innerHTML);
</script>
<script>

    function tot() {

        var x = 0;
        x = $('.consulteddoctorfees').val();
        var y = 0;
        y = $('.totalconsulteddays').val();
        var totalconsultedfees = parseInt(x) * parseInt(y);
        $('.totalconsultedfees').val(totalconsultedfees);
        payble_total();
    }
</script>

</html>