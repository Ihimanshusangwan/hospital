<?php
require("../admin/connect.php");
$from = $_POST['from'];
$to = $_POST['to'];
$option_val = $_POST['option_val'];
$option_val2 = $_POST['option_val2'];
if (isset($_POST['from'],$_POST['to'])) {
    if ($option_val != "uhid") {
        $sql = "SELECT p_insure.*, patient_records.* FROM patient_records
        JOIN p_insure ON patient_records.id = p_insure.id
        WHERE patient_records.$option_val Like '%$option_val2%'
        AND patient_records.reg_date BETWEEN  '$from' AND '$to' 
        ORDER BY patient_records.id ASC";
    } else {
        $sql = "SELECT p_insure.*, patient_records.* FROM patient_records
        JOIN p_insure ON patient_records.id = p_insure.id
        WHERE p_insure.$option_val like '%$option_val2%'
            AND patient_records.reg_date BETWEEN  '$from' AND '$to' 
            ORDER BY patient_records.id ASC";
    }
} else {
    if ($option_val != "uhid") {
        $sql = "SELECT p_insure.*, patient_records.* FROM patient_records
        JOIN p_insure ON patient_records.id = p_insure.id
        WHERE patient_records.$option_val like '%$option_val2%'
        ORDER BY patient_records.id ASC";
    } else {
        $sql = "SELECT p_insure.*, patient_records.* FROM patient_records
            JOIN p_insure ON patient_records.id = p_insure.id
            WHERE p_insure.$option_val like '%$option_val2%'
            ORDER BY patient_records.id ASC";
    }
}
// echo $sql;
$result = $conn->query($sql);

echo '<div class="text-center"><h4 class="text-primary" align="center"></h4></div>';
echo '<table class="table table-striped table-hover" id="table">
            <thead class="table-dark">
                <th>#</th>
                <th>UHID ID</th>
                <th>REG_DATE</th>
                <th>NAME</th>
                <th>SEX</th>
                <th>AGE</th>
                <th>Details</th>
                
            </thead>
            <tbody>';
            $i =1;
while ($val = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' .$i.'</td>';
    echo '<td>' . $val['uhid'] . '</td>';
    echo '<td>' . $val['reg_date'] . '</td>';
    echo '<td>' . $val['name'] . '</td>';
    echo '<td>' . $val['sex'] . '</td>';
    echo '<td>' . $val['age'] . '</td>';
    echo '<td><a class="btn btn-primary btn-sm" href="details.php?id=' . $val['id'] . '" >Details</a></td>';
    $i++;
}
echo '</tbody>
    </table>';