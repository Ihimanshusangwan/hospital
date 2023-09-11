<?php
if (isset($_POST['selectedValue'])) {
    require("../admin/connect.php");
    $selectedValue = $_POST['selectedValue'];   
    $id = $_POST['p_id']; 

    $sql = "select * from opd_charges where id = $selectedValue; ";
    $res = $conn->query($sql)->fetch_assoc();

    $description = $res["description"];
    $amount = $res["amount"];
    $qty = $res["qty"];
    $total = $amount * $qty;
    

    $sql = "INSERT INTO opd_bill (patient_id,description,amount,qty,total) VALUES ($id,'$description','$amount','$qty','$total');";
    if($conn->query($sql) == true){
        $sql = "update patient_records set is_billed = 1 where id =$id;";
        $conn->query($sql);

        $response = array("status" => "success");
    }else{
        $response = array("status" => "failure");
    }
    
    echo json_encode($response);
}
?>
