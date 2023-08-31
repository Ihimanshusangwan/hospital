<?php
require("connect.php");
if(isset($_POST['submit'])){
    $label=$_POST['label_1'];
    $pre_bottom=$_POST['pre_bottom'];
    $image = addslashes(file_get_contents($_FILES["pre_barcode"]["tmp_name"]));
    $sql="UPDATE `change_label` SET `lable_1`='$label' ,pre_bottom='$pre_bottom',pre_barcode='$image' WHERE `id`='1';";
    $data=$conn->query($sql);
    if($data){
        echo "<div class='alert alert-success'> Label Change Successfully</div>";
    }
}

$sql = "SELECT * FROM change_label WHERE id = 1;";
$data = $conn->query($sql);
if ($data->num_rows < 1) {
   
    $sql = "insert into change_label (id,lable_1) values(1,'Grand Total');";
    $conn->query($sql);
} 
$sql10="SELECT * FROM `change_label` WHERE 1";
$data10=$conn->query($sql10);


$res10=$data10->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="container mb-4">
        <h1 class="text-center text-danger mt-3">SHRI SIDDHIVINAYAK NETRALAYA</h1>
        <a href="adminLogin.php" class="btn btn-success m-2">Dashboard</a>
        <h5 class="text-center mt-3">Change Label</h5>
        <div class="row p-4 pt-4">
            <form method="post"  enctype="multipart/form-data">
                <div class="col shadow-lg rounded m-2 p-4">
                    <label for="">Grand total:</label>
                    <input type="text" name="label_1" 
                    value="<?php if($data10){ echo $res10['lable_1'];}
                    ?>" placeholder="replace of Grand total">
<br>
                
<label for="" class="mt-3">Prescription Bottom:</label>
                    <input type="text" name="pre_bottom" 
                    value="<?php if($data10){ echo $res10['pre_bottom'];}
                    ?>" placeholder="Prescription Bottom Title">
<br>
                    
<label for="" class="mt-3">Prescription Appointment Bar Code:</label>
                    <input type="file" name="pre_barcode">
                   <div class="col-5">
                   <img style="height: 8rem; width: 8rem;" src="data:image/jpg;base64,<?php echo base64_encode($res10['pre_barcode']); ?>">
 
                   </div>
                    <div class="form-group m-2">
                        <button type="submit" name="submit" id="submit" class="btn btn-outline-danger mt-2">
                            Submit
                        </button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
$conn->close();
?>