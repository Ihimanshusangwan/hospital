<?php
require("connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
if(isset($_POST['submit'])){
    $label=$_POST['time'];
    $sql="UPDATE `change_label` SET `auto_reload`=$label WHERE `id`='1';";
    $data=$conn->query($sql);
    if($data){
        echo "<div class='alert alert-success'> Time Changed Successfully</div>";
    }
}
$sql = "SELECT * FROM change_label WHERE id = 1;";
$data = $conn->query($sql);
if ($data->num_rows < 1) {
    $sql = "insert into change_label (id,lable_1,auto_reload) values(1,'Grand Total',20);";
    $conn->query($sql);
} 
$sql10="SELECT * FROM `change_label` WHERE 1";
$data10=$conn->query($sql10);


$res10=$data10->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Auto Refresh Time</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

</head>

<body>
    <h1 class="text-center text-danger m-3">
        <?php echo $title['ro'] ?>
    </h1>
    <a href="adminLogin.php" class="btn btn-success m-2">Dashboard</a>
    <div class="conatiner text-center" style="display:flex;justify-content:center;">
        <div class="card shadow-lg m-3 text-center" style="width:50rem;">
       
      <h3 class="card-title my-3">Set Auto Refresh Time</h3>
            <form action="" method="POST">

                <div class="row">

                    <div class="col-3">
                        <label for="" class="form-label " style="margin-top:20px;"><strong>Set Time(in Seconds)
                                :</strong> </label>
                    </div>

                    <div class="col-8">
                        <input type="number" class="form-control " style="margin:20px;" name="time"
                            id="" value="<?php if(isset($res10['auto_reload'])){ echo $res10['auto_reload'];}
                    ?>" >
                    </div>
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-outline-success my-2">
                            Submit
                        </button>
            </form>
        </div>
    </div>
    

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>