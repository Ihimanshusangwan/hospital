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
    <script>
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
</head>

<body >
<div class="container">
        <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
    <a href="patient.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
        </div>
        <div class="header">
            <div class="img-logo">
                <img style="height: 8rem; width: 8rem;" src="data:image/jpeg;base64, <?php echo base64_encode($title['logo'])?>">
            </div>
            <div class="title">
                <h2 style="text-align: center; color: red; width: 100%;"><strong>SHRI SIDDIVINAYAK NETRALAYA</strong>
                </h2>
                <p style="text-align: center;">JADHAVWADI SIGNAL,JALGAON ROAD,AURANGABAD</p>

            </div>
            <div class="img-logo">
                <img style="height: 8rem; width: 8rem;" src="data:image/jpeg;base64, <?php echo base64_encode($title['logo'])?>">
            </div>
        </div>
    </div>
    <div class="row text-center mt-5">
    <!-- <h2 style="text-align:center;">PRESCRIPTIONS</h2> -->
            <div class="col-4">Name of Patient:
                <?php echo strtoupper($res['name']); ?>
            </div>
            <div class="col-4">Age:
                <?php echo strtoupper($res['age']); ?>
            </div>
            <div class="col-4">Sex:
                <?php echo strtoupper($res['sex']); ?>
            </div>
        </div>
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

    <form method="POST" action="prescription.php?id=<?php echo $id; ?>">
        <div class="container-fluid" style="margin-top: 20px;">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Prescriptions</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


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
                            <tbody id="tbody">
                                <?php
                                $sql = "SELECT * FROM prescription WHERE patient_id = $id ORDER BY id DESC;";
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
        </div>

    </form>
    
    
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