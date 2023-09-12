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
        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            background-color: #fff;
            margin: 7% auto;
            padding: 20px;
            width: 70%;
            min-height: 200px;
            text-align: center;
            position: relative;
        }

        .close {
            color: #888;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .form-container {
            display: none;
        }

        .form-container.active {
            display: block;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-group label {
            margin-right: 10px;
        }

        .form-group input,
        .form-group button {
            flex: 1;
        }
    </style>

    <script>
        var items = 0;

        function addItem() {
            items++;

            // Fetch the available options for description from opd_charges table
            fetch("fetch_opd_data.php")
                .then(response => response.json())
                .then(data => {
                    var html = "<tr>";
                    html += "<td>" + items + "</td>";
                    html += "<td><select name='description_" + items + "' onchange='onDescriptionChange(this)' class='desc'>";
                    data.forEach((charge, index) => {
                        var selected = index === 0 ? "selected" : "";
                        html += "<option value='" + charge.description + "' data-amount='" + charge.amount + "' data-qty='" + charge.qty + "' " + selected + ">" + charge.description + "</option>";
                    });
                    html += "</select></td>";
                    html += "<td><input class='amount' type='number' name='amount_" + items + "' onchange='on_amount_change()' readonly></td>";
                    html += "<td><input class='qty' type='number' name='qty_" + items + "' onchange='on_qty_change()'></td>";
                    html += "<td><input class='total' type='number' name='total_" + items + "' readonly></td>";
                    html += "<td><button class='btn btn-danger' type='button' onclick='deleteRow(this);'>Delete</button></td>"
                    html += "</tr>";
                    var row = document.getElementById("tbody").insertRow();
                    row.innerHTML = html;
                    var firstOption = row.querySelector("select[name^='description_'] option");
                    var amountInput = row.querySelector("input[name^='amount_']");
                    var qtyInput = row.querySelector("input[name^='qty_']");
                    var totalInput = row.querySelector("input[name^='total_']");

                    amountInput.value = firstOption.dataset.amount;
                    qtyInput.value = firstOption.dataset.qty;
                    totalInput.value = parseFloat(amountInput.value) * parseFloat(qtyInput.value);
                    on_amount_change();
                    on_qty_change();
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
        function onDescriptionChange(selectElement) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var amountInput = selectElement.parentNode.parentNode.querySelector(".amount");
            var qtyInput = selectElement.parentNode.parentNode.querySelector(".qty");
            var totalInput = selectElement.parentNode.parentNode.querySelector(".total");
            var amount = parseFloat(selectedOption.dataset.amount);
            var qty = parseFloat(selectedOption.dataset.qty);
            amountInput.value = isNaN(amount) ? '' : amount;
            qtyInput.value = isNaN(qty) ? '' : qty;
            on_amount_change();
            on_qty_change();
        }

        function on_amount_change() {
            var amounts = document.getElementsByClassName("amount");
            var qtys = document.getElementsByClassName("qty");
            var totals = document.getElementsByClassName("total");
            var subtotal = parseFloat(initial_subtotal);

            for (var i = 0; i < amounts.length; i++) {
                totals[i].value = parseFloat(amounts[i].value) * parseFloat(qtys[i].value);
                subtotal += parseFloat(totals[i].value);
            }

            document.getElementById("subtotal").innerHTML = subtotal.toFixed(2);
            on_discount_change();
        }

        function on_qty_change() {
            var amounts = document.getElementsByClassName("amount");
            var qtys = document.getElementsByClassName("qty");
            var totals = document.getElementsByClassName("total");
            var subtotal = parseFloat(initial_subtotal);

            for (var i = 0; i < amounts.length; i++) {
                totals[i].value = parseFloat(amounts[i].value) * parseFloat(qtys[i].value);
                subtotal += parseFloat(totals[i].value);
            }

            document.getElementById("subtotal").innerHTML = subtotal.toFixed(2);
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
            var row = button.parentElement.parentElement;
            var amountInput = row.querySelector(".amount");
            var qtyInput = row.querySelector(".qty");
            var totalInput = row.querySelector(".total");
            var subtotal = parseFloat(document.getElementById("subtotal").innerHTML);
            var grandtotal = parseFloat(document.getElementById("grandtotal").innerHTML);

            if (!isNaN(parseFloat(totalInput.value))) {
                subtotal -= parseFloat(totalInput.value);
                grandtotal -= parseFloat(totalInput.value);
            }

            amountInput.value = "";
            qtyInput.value = 0;
            totalInput.value = "";
            row.style.display = "none";
            document.getElementById("subtotal").innerHTML = subtotal;
            document.getElementById("grandtotal").innerHTML = grandtotal;

            on_discount_change();
        }
    </script>
    <script>
        function toggleFormVisibility() {
            var formContainer = document.getElementById("formContainer");
            if (formContainer.style.display === "none") {
                formContainer.style.display = "block";
            } else {
                formContainer.style.display = "none";
            }
        }
        function closeForm() {
            var formContainer = document.getElementById("formContainer");
            formContainer.style.display = "none";
        }
        function openPopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "block";
            populateChargesTable();
        }

        function closePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "none";
        }
    </script>
</head>

<body style="background-color: #90D0E5;">

    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <h1>
                <marquee style="color: purple;" BEHAVIOUR="slide" scrollnount="70" scrolledeley="100">
                    <?php echo $title['ro'] ?>
                </marquee>
            </h1>
        </h1>
        <button class="btn btn-success m-2" id="dashboard" cookieName="opd-referer">Dashboard</button>
        <button class="btn btn-warning" type="button" onclick="openPopup()">Manage Charges</button>


        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <h2 class="my-3">Manage Charges</h2>
                <div id="successAlert" class="alert alert-success mt-3" style="display: none;">
                    Charge updated successfully.
                </div>

                <div id="errorAlert" class="alert alert-danger mt-3" style="display: none;">
                    Error updating charge. Please try again.
                </div>
                <div id="successAlert1" class="alert alert-success mt-3" style="display: none;">
                    Charge deleted successfully.
                </div>

                <div id="errorAlert1" class="alert alert-danger mt-3" style="display: none;">
                    Error deleting charge. Please try again.
                </div>

                <button class="btn btn-primary" onclick="toggleFormVisibility()">Add New</button>
                <div id="formContainer" style="display: none;">
                    <h3 class="my-2">Add New Item</h3>
                    <form id="addForm">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" id="description" name="description" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="number" id="amount" name="amount" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Default Quantity:</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" onclick="submitForm(event)">Submit</button>
                        </div>
                    </form>
                </div>

                <h3 class="my-3">Available Charges</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="chargesTableBody">
                        <!-- Table rows will be dynamically added here using JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="row text-center mt-5">
        <div class="col-3">Name of Patient:
            <?php echo $res['name']; ?>
        </div>
        <div class="col-3">Age:
            <?php echo $res['age']; ?>
        </div>
        <div class="col-3">Sex:
            <?php echo $res['sex']; ?>
        </div>
        <div class="col-3">Bill No:
            <?php echo date("Y") . "/" . $id; ?>
        </div>
    </div>
    </div>
    <?php
    if (isset($_REQUEST['submit_changes'])) {
        $is_billed=false;
        $i = 1;
        while (isset($_POST["description_$i"])) {
            if ($_POST["description_$i"] != "none"  &&  $_POST["qty_$i"] != 0 ) {
                $description = $_POST["description_$i"];
                $amount = $_POST["amount_$i"];
                $qty = $_POST["qty_$i"];
                $total = $_POST["total_$i"];
                $id = $_GET['id'];
                $sql10 = "SELECT * FROM patient_records WHERE id = '$id';";
                $data10 = $conn->query($sql10);
                $res10 = $data10->fetch_assoc();
                $username = $res10['mobile'];
                $password = $res10['mobile'];
                $is_opd = 1;
                $update2 = "UPDATE `p_log` SET `is_opd` = '$is_opd',`username`='$username',`password`='$password' WHERE `id` = '$id'";
                $conn->query($update2);

                $sql = "INSERT INTO opd_bill (patient_id,description,amount,qty,total) VALUES ($id,'$description','$amount','$qty','$total');";
                if ($conn->query($sql) === TRUE) {
                    $i++;
                } else {
                    echo "<div class='alert alert-danger'>Error Updating Bill</div>";
                }
                if($is_billed == false){
                    $sql = "update patient_records set is_billed = 1 where id =$id;";
                    $conn->query($sql);
                    $is_billed = true;
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
                                <th>Delete</th>
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
                                    echo "<td><form method='POST' action=''>
                                    <input type='hidden' value={$res['id']} name='bill_id' >
                                    <button type='submit' name = 'delete' class='btn btn-primary'>Delete</button> </form>" . '</td>';
                                    echo '</tr>';
                                    $i++;
                                    $sr++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addItem();">Add</button>
                    <button type="submit" class="btn btn-success" name="submit_changes" value="Save">Save</button>
                    <a href="opd_print.php?id=<?php echo $id; ?>" class="btn btn-success" id="print">Print</a>
                </div>
            </div>
        </div>

    </form>

    
<form action='' method="POST">
    <div class="col-3 mx-3 text-center bg-green">
        <?php
        if(isset($_POST['submit'])){
            echo "<label style=' background-color: lightgreen; border-radius :3px;' class='p-2'>PAYMENT DETAILS UPDATED SUCCESSFULLY</label>";
        }
        ?>
    </div>
        <div class="col-3 mx-3">
            <?php
            if(isset($_POST['submit'])){
               $pay_method=$_POST['pay_method'];
               $payment_id=$_POST['Pi'];
               $update="UPDATE opd_bill_pay SET  pay_method='$pay_method', payment_id='$payment_id' WHERE patient_id='$id'";
               $sql_1=mysqli_query($conn,$update);

            }
            $sql_2="SELECT * FROM opd_bill_pay WHERE patient_id='$id' ";
            $query_2=mysqli_query($conn,$sql_2);
            $res_2=mysqli_fetch_assoc($query_2);
            error_reporting(0);

            ?>
                        <label for="" class="form-label">Payment Mode</label>
                        <select class="form-control" name="pay_method" onchange="Payment_method_control(this)" id="pay_method">
                     
                     
                            <option value="CASH" <?php if ($res_2['pay_method'] == 'CASH') {
                                      echo 'selected';
                                    } ?>>CASH</option>

                            <option value="CHECK" <?php if ($res_2['pay_method'] == 'CHECK') {
                                      echo 'selected';
                                    } ?>>CHECK</option>

                            <option value="NEFT" <?php if ($res_2['pay_method'] == 'NEFT') {
                                      echo 'selected';
                                    } ?>>NEFT</option>
                           
                            <option value="CARD" <?php if ($res_2['pay_method'] == 'CARD') {
                                      echo 'selected';
                                    } ?>>CARD</option>

                            <option value="GOOGLE PAY" <?php if ($res_2['pay_method'] == 'GOOGLE PAY') {
                                      echo 'selected';
                                    } ?>>GOOGLE PAY</option>

                            <option value="PHONEPE" <?php if ($res_2['pay_method'] == 'PHONEPE') {
                                      echo 'selected';
                                    } ?>>PHONEPE</option>
                        </select>
        </div>
        
    <div class="col-3 mx-3" style="display:none;" id="Payment_id">
                        <label for="Pi" class="form-label">Payment Id</label>
                        <input type="text"   value="<?php echo $res_2['payment_id']; ?>" name="Pi" class="form-control ad"  placeholder="Payment Id" id="Pi"    >
                    </div>

    <div class="col-3 text-center">
                    <button type="submit" class="btn btn-danger m-3 " name="submit" id="submit">Submit Payment Details</button>
                    </div>
                                </form>
    <h5 style="text-align: right; margin-right: 2em;">SubTotal : <span id="subtotal">
            <?php echo $subtotal; ?>
        </span></h5>
    <h5 style="text-align: right; margin-right: 2em; row">
        <label for="ad" class="form-label">Discount : </label>
        <input type="hidden" name="patient_id" value="<?php echo $id ?>" id="patient_id">
        <?php
        $sql = "select opd_discount from p_log where id = '$id';";
        $res = $conn->query($sql)->fetch_assoc();
        ?>
        <input type="number" style="border: 0px; " name="discount" class="col-1 ad " placeholder="Discount"
            id="discount" onchange="on_discount_change()" value="<?php echo $res['opd_discount']; ?>">

    </h5>
    <h5 style="text-align: right; margin-right: 2em;"><?php  echo isset($res10['lable_1'])?$res10['lable_1']:'Grand Total';?> : <span id="grandtotal">
            <?php echo $subtotal; ?>
        </span></h5> <br><br><br>
    <h6 style="text-align: right; margin-right: 3em;">Signature</h6>
    <h6>Thank You !</h6>
    </div>

</body>
<script>
    function getCookieValue(cookieName) {
    const cookies = document.cookie.split("; ");
    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].split("=");
      if (cookie[0] === cookieName) {
        return cookie[1];
      }
    }
    return null;
  }
      document.getElementById("dashboard").addEventListener("click",()=>{
          var page= document.getElementById("dashboard").getAttribute("cookieName");
          var cookieValue = getCookieValue(page);
          document.cookie = `${page}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
          window.location.href=`${cookieValue}.php?id=<?php echo $id; ?>`;
  
      })
</script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 Payment_method_control(document.getElementById("pay_method"));
    function Payment_method_control(e) {
        console.log("Function called");
        let val = e.value;
        console.log("Selected value: " + val);
        
        if (val !== "CASH") {
            $('#Payment_id').show("slow");
        } else {
            $('#Payment_id').hide('slow');
        }
    };
    var initial_subtotal = document.getElementById("subtotal").innerHTML;
    on_discount_change();

    function submitForm(event) {
        event.preventDefault(); // Prevent form submission

        // Get form data
        var description = document.getElementById("description").value;
        var amount = document.getElementById("amount").value;
        var quantity = document.getElementById("quantity").value;

        // Create an object to hold the form data
        var formData = {
            description: description,
            amount: amount,
            quantity: quantity
        };

        // Send the form data to the PHP file using Fetch API
        fetch("opd_charges_store_data.php", {
            method: "POST",
            body: JSON.stringify(formData)
        })
            .then(response => response.text())
            .then(data => {
                // Reset the form
                document.getElementById("addForm").reset();
                // Close the form container
                closeForm();
                populateChargesTable();
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }
    // Function to fetch and populate the charges table
    function populateChargesTable() {
        fetch("fetch_opd_data.php")
            .then(response => response.json())
            .then(data => {
                // Clear the existing table rows
                var tableBody = document.getElementById("chargesTableBody");
                tableBody.innerHTML = "";

                // Iterate through the data and create table rows
                data.forEach(charge => {
                    var row = document.createElement("tr");
                    row.innerHTML = `
  <td><input type="text" class="form-control" id="description_${charge.id}" value="${charge.description}"></td>
  <td><input type="text" class="form-control" id="amount_${charge.id}" value="${charge.amount}"></td>
  <td><input type="text" class="form-control" id="qty_${charge.id}" value="${charge.qty}"></td>
  <td>
    <button class="btn btn-info" onclick="updateCharge(${charge.id})">Update</button>
    <button class="btn btn-danger" onclick="deleteCharge(${charge.id})">Delete</button>
  </td>
`;

                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }
    function updateCharge(chargeId) {
        const description = document.getElementById(`description_${chargeId}`).value;
        const amount = document.getElementById(`amount_${chargeId}`).value;
        const qty = document.getElementById(`qty_${chargeId}`).value;

        const updatedCharge = {
            chargeId: chargeId,
            description: description,
            amount: amount,
            qty: qty
        };

        fetch("update_opd_charges.php", {
            method: "POST",
            body: JSON.stringify(updatedCharge),
            headers: {
                "Content-Type": "application/json"
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    // Show success alert
                    const successAlert = document.getElementById("successAlert");
                    successAlert.style.display = "block";
                    const errorAlert = document.getElementById("errorAlert");
                    errorAlert.style.display = "none";

                    populateChargesTable();
                } else {
                    // Show error alert
                    const errorAlert = document.getElementById("errorAlert");
                    errorAlert.style.display = "block";
                    const successAlert = document.getElementById("successAlert");
                    successAlert.style.display = "none";
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }

    // Function to delete a charge
    function deleteCharge(chargeId) {
        fetch("delete_opd_charges.php", {
            method: "POST",
            body: JSON.stringify({ chargeId: chargeId }),
            headers: {
                "Content-Type": "application/json"
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    // Show success alert
                    const successAlert = document.getElementById("successAlert1");
                    successAlert.style.display = "block";
                    const errorAlert = document.getElementById("errorAlert1");
                    errorAlert.style.display = "none";
                    populateChargesTable();
                } else {
                    // Show error alert
                    const errorAlert = document.getElementById("errorAlert1");
                    errorAlert.style.display = "block";
                    const successAlert = document.getElementById("successAlert1");
                    successAlert.style.display = "none";
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }
</script>

</html>