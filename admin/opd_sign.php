<?php
require("../admin/connect.php");
if(isset($_POST['save'])){
    $opd_sign=$_POST['opd_sign'];
    $bottom=$_POST['bottom'];

    $update="UPDATE opd_admin SET opd_sign='$opd_sign',bottom='$bottom' WHERE id=1 ";
    $sql=mysqli_query($conn,$update);
}
$sql2="SELECT * FROM opd_admin";
$row=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($row);
if($row2==0){
    $insert="INSERT INTO opd_admin id VALUES '(1)'";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    
</head>
<body>
    <div class="conatiner">
        <form action="" method="POST">
        <h1 class="text-center">OPD BILL CONFIGURATION</h1>
        <a href="adminLogin.php" class="btn btn-success m-2">Dashboard</a>

        <div class="row card shadow-lg m-4 p-4">
            <div class="col-12"><label >OPD Signature Configurable :</label>
            <input type="text" name="opd_sign" class="form-control" value="<?php echo $row2['opd_sign'];?>" id=""></div>
            <div class="col-12"><label >Bottom Text For OPD Bill :</label>
            <input type="text" name="bottom" class="form-control"  value="<?php echo $row2['bottom'];?>" id=""></div>
        </div>

        <button type="submit" name="save" class="btn m-3 btn-info">Save</button>
</form>
    </div>

</body>
</html>