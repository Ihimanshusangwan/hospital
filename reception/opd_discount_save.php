<?php
include("../admin/connect.php");
 $discount = $_POST['discount'];
 $id = $_POST['id'];
 $sql = "update p_log set opd_discount = '$discount' where id = '$id';";

 if ($conn->query($sql) === true) {
     echo "Discount value saved successfully";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }
 
 $conn->close();
 ?>