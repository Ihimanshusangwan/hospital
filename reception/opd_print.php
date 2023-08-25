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
error_reporting(0);
$sql_2="SELECT * FROM opd_bill_pay WHERE patient_id='$id'";
$query_2=mysqli_query($conn,$sql_2);
$res_2=mysqli_fetch_assoc($query_2);
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

        body{
            font-size:17px;
        }
        @media print {
            .noprint {
                visibility: hidden;
                display:none;
            }
        }
        @page{
            size :A4;
        }
    </style>

    <script>

window.print();
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
            var data = document.getElementById("discount").value;
            var discount = parseFloat(document.getElementById("discount").value);
            if (data == "") {
                document.getElementById("discount").value = 0;
                discount = 0;
                data = 0;
            }
            var subtotal = parseFloat(document.getElementById("subtotal").innerHTML);
            var discount_amount = discount;
            var total = subtotal - discount_amount;
            document.getElementById("discount").innerHTML = discount_amount.toFixed(2);
            document.getElementById("grandtotal").innerHTML = total.toFixed(2);
            var patient_id = document.getElementById('patient_id').value;
            fetch("opd_discount_save.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'discount=' + encodeURIComponent(data) + '&id=' + encodeURIComponent(patient_id)
            }).then((response) => response.text()).then((e) => { console.log(e) }).catch((error) => {
                console.log(error);
            });

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
        <div class="button noprint">
       
            <button type="button" class="btn btn-danger m-1 noprint" onclick="window.print()" id="print">A4 Print</button>
            <a href="a5_opd.php?id=<?php echo $id; ?>" class="btn btn-danger m-1 noprint" id="printa5">A5 Print</a>
            <a href="opd_bill.php?id=<?php echo $id; ?>" class="btn btn-info m-1 noprint" id="dashboard">Dashboard</a>
           
        </div>
        <?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-2 ">OPD Bill</h3>
        <div>
             <div class="row">
        <div class="col-6"><strong>UHID No: </strong><?php echo $res2['uhid'];?>
    </div>
        <div class="col-6"><strong>Name:</strong>
            <?php echo strtoupper($res['name']); ?>
        </div>
        <div class="col-3"><strong>Age:</strong>
            <?php echo strtoupper($res['age']); ?>
        </div>
        <div class="col-3"><strong>Sex:</strong>
            <?php echo $res['sex']; ?>
        </div><br>
        <div class="col-6"><strong>Consultant:</strong>
            <?php echo $res['consultant']; ?>
        </div>
   
       
    </div>
        <strong>Bill No:
            <?php echo date("Y"). "/" .$id ?>
            </strong>
           
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
    <label for="" class="form-label">Payment Mode : <strong>
    <?php echo $res_2['pay_method'];?>
    </strong></label><br>
    <?php 
    $pay_method=$res_2['pay_method'];
    if($pay_method!="CASH"){
        echo '<label for="" class="form-label">Payment Id : <strong>'.$res_2['payment_id'].'
        </strong></label>';
    }?>
    
                        
    
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
                <?php echo isset($res10['lable_1'])?$res10['lable_1']:'Grand Total';?> : 
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
            <?php

function numberToWords($number) {
    $words = [
        1 => "one", 2 => "two", 3 => "three", 4 => "four", 5 => "five", 6 => "six", 7 => "seven", 8 => "eight", 9 => "nine", 10 => "ten",
        11 => "eleven", 12 => "twelve", 13 => "thirteen", 14 => "fourteen", 15 => "fifteen", 16 => "sixteen", 17 => "seventeen", 18 => "eighteen", 19 => "nineteen",
        20 => "twenty", 30 => "thirty", 40 => "forty", 50 => "fifty", 60 => "sixty", 70 => "seventy", 80 => "eighty", 90 => "ninety"
    ];

    if ($number < 20) {
        return $words[$number];
    } 
    elseif ($number < 100) {
        return $words[$number - ($number % 10)] . '-' . $words[$number % 10];
    }
    elseif ($number < 1000) {
        return $words[floor($number / 100)] . " hundred " . numberToWords($number % 100);
    }
    elseif ($number < 100000) {
        return numberToWords(floor($number / 1000)) . " thousand " . numberToWords($number % 1000);
    }
    elseif ($number < 10000000) {
        return numberToWords(floor($number / 100000)) . " lakh " . numberToWords($number % 100000);
    }
    elseif ($number < 1000000000) {
        return numberToWords(floor($number / 10000000)) . " crore " . numberToWords($number % 10000000);
    }
    else {
        return "Number out of range";
    }
}
$number = $subtotal-$res['opd_discount'];
if($number<=0){
    echo '';
}
else{
    
    $textualRepresentation = numberToWords($number);
    echo "Received With Thanks ";
    echo  ucwords($textualRepresentation) .' Only';
}
?>

            <div class=" d-flex justify-content-between mt-4">
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