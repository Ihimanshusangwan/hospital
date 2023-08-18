<?php
require("../admin/connect.php");
$from = $_POST['from'];
$to = $_POST['to'];
$option_val=$_POST['option_val'];
$sql = "SELECT p_insure.*, patient_records.*, opd_bill.*, opd_bill_pay.*
        FROM opd_bill
        JOIN patient_records ON opd_bill.patient_id = patient_records.id
        JOIN  p_insure ON  opd_bill.patient_id=p_insure.id 
        JOIN opd_bill_pay ON opd_bill.patient_id= opd_bill_pay.patient_id
        WHERE opd_bill.description = '$option_val'
        AND patient_records.reg_date BETWEEN  '$from' AND '$to' 
        ORDER BY opd_bill.id ASC";
        
    $result = $conn->query($sql);
    echo '<div class="text-center"><h4 class="text-primary" align="center"> '.$option_val.' '. "  ".' '.$from.' - '.$to.' </h4></div>';
    echo '<table class="table table-striped table-hover" id="table">
            <thead class="table-dark">
                <th>#</th>
                <th>UHID ID</th>
                <th>REG_DATE</th>
                <th>NAME</th>
                <th>SEX</th>
                <th>AGE</th>
                <th>AMOUNT</th>
                <th>QTY</th>
                <th>TOTAL</th>
                <th>PAYMENT METHOD</th>
            </thead>
            <tbody>';
    while ($val = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $val['id'] . '</td>';
        echo '<td>' . $val['uhid'] . '</td>';
        echo '<td>' . $val['reg_date'] . '</td>';
        echo '<td>' . $val['name'] . '</td>';
        echo '<td>' . $val['sex'] . '</td>';
        echo '<td>' . $val['age'] . '</td>';
        echo '<td>' . $val['amount'] . '</td>';
        echo '<td>' . $val['qty'] . '</td>';
        echo '<td class="total">' . intval($val['amount']) * intval($val['qty']) . '</td>';
        echo '<td>' . $val['pay_method'] . '</td>';
    }
    echo '</tbody>
    </table>';