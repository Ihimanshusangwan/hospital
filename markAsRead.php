<?php
if(isset($_POST['msgId'])){
    require("admin/connect.php");
    $msgId = $_POST['msgId'];

    $sql = "UPDATE messages SET is_read = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $msgId);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo "success"; 
    } else {
        echo "failure";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}

?>

