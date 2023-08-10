<?php
require("../admin/connect.php");
session_start();
if (isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
}
//prevent access of patient page without login
if (!isset($_SESSION['patient_id'])) {
    header("location:login.php");
}
$id = $_SESSION['patient_id'];


$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();


$sql = "SELECT * FROM patient_records WHERE id = '$id';";
// select * from opd where p_id = id;
$data = $conn->query($sql);
$res = $data->fetch_assoc();
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

<body style="background-color: #90D0E5;">

    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <h1>
                <marquee style="color: purple;" BEHAVIOUR="slide" scrollnount="70" scrolledeley="100">
                <?php echo $title['title']?>
                </marquee>
            </h1>
        </h1>
        <form class="form-inline my-2 my-lg-0" action="" method="POST">
            <a class="navbar-brand ">
                <button type="submit" name="logout" class=" btn btn-danger mx-2 px-2 py-1">
                    Logout
                </button>
            </a>
        </form>
        <div class="row text-center mt-5">
            <div class="col-4">Name of Patient:
                <?php echo $res['name']; ?>
            </div>
            <div class="col-4">Age:
                <?php echo $res['age']; ?>
            </div>
            <div class="col-4">Sex:
                <?php echo $res['sex']; ?>
            </div>
        </div>
        <br><br><br>
        <a href="opd_bill.php?id=<?php echo $id; ?>" class="btn btn-success m-2">OPD BILL</a>
        <a href="ipd_bill.php?id=<?php echo $id; ?>" class="btn btn-success m-2">IPD BILL</a>
        <a href="prescription.php?id=<?php echo $id; ?> " class="btn btn-success m-2">Prescription</a>
    </div>


</html>