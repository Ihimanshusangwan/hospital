<?php
require("connect.php");
if(isset($_POST['submit'])){
    $inp_arr=array();
    for($i=1;$i<15;$i++){
        $element=$_POST['inp_'.$i];
        array_push($inp_arr,$element);
    }
    $inp_json=json_encode($inp_arr);

    $sql="UPDATE `change_rate` SET `inp`='$inp_json' WHERE `id`='1';";
    $data=$conn->query($sql);
    if($data){
        echo "<div class='alert alert-success'> rate Change Successfully</div>";
    }
}
$sql = "SELECT * FROM change_rate WHERE id = 1;";
$data = $conn->query($sql);
if ($data->num_rows < 1) {
    $sql = "insert into change_rate (id) values(1);";
    $conn->query($sql);
} 
$sql11="SELECT * FROM `change_rate` WHERE 1";
$data11=$conn->query($sql11);
$res11=$data11->fetch_assoc();
$inp=$res11['inp'];
$inp_arr=json_decode($inp,true);
$inp_arr = is_array($inp_arr) ? $inp_arr: array_fill(0,15, '');


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
        <h5 class="text-center mt-3">Change Rate Charge</h5>
        <div class="row p-4 pt-4">
            <form method="post">
                <div class="col shadow-lg rounded m-2 p-4">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>I.C.U Bed Charge:</td>
                                <td><input type="text" class="form-control" name="inp_1"
                                        value="<?php echo $inp_arr[0]; ?>"></td>
                                <td>I.C.U consulant Doctor:</td>
                                <td><input type="text" class="form-control" name="inp_2"
                                        value="<?php echo $inp_arr[1]; ?>"></td>
                                <td>I.C.U Nursing :</td>
                                <td><input type="text" class="form-control" name="inp_3" 
                                        value="<?php echo $inp_arr[2]; ?>"></td>

                            </tr>
                            <tr>
                                <td>I.C.U Monitor Charge:</td>
                                <td><input type="text" class="form-control" name="inp_4"
                                        value="<?php echo $inp_arr[3]; ?>"></td>
                                <td>I.C.U Oxygen Charge:</td>
                                <td><input type="text" class="form-control" name="inp_5"
                                        value="<?php echo $inp_arr[4]; ?>"></td>
                                <td>I.C.U srup pump:</td>
                                <td><input type="text" class="form-control" name="inp_6"
                                        value="<?php echo $inp_arr[5]; ?>"></td>
                            </tr>
                            </tr>
                            <tr>
                                <td>General Ward Bed Charge:</td>
                                <td><input type="text" class="form-control" name="inp_7"
                                        value="<?php echo $inp_arr[6]; ?>"></td>
                                <td>General Ward consulant Doctor:</td>
                                <td><input type="text" class="form-control" name="inp_8"
                                        value="<?php echo $inp_arr[7]; ?>"></td>
                                <td>General Ward Nursing :</td>
                                <td><input type="text" class="form-control" name="inp_9"
                                        value="<?php echo $inp_arr[8]; ?>"></td>

                            </tr>
                            <tr>
                                <td>General Ward Oxygen Charge:</td>
                                <td><input type="text" class="form-control" name="inp_10"
                                        value="<?php echo $inp_arr[9]; ?>"></td>
                            </tr>
                            </tr>
                            <tr>
                                <td>Delux room Bed Charge:</td>
                                <td><input type="text" class="form-control" name="inp_11"
                                        value="<?php echo $inp_arr[10]; ?>"></td>
                                <td>Delux room consulant Doctor:</td>
                                <td><input type="text" class="form-control" name="inp_12"
                                        value="<?php echo $inp_arr[11]; ?>"></td>
                                <td>Delux room Nursing :</td>
                                <td><input type="text" class="form-control" name="inp_13"
                                        value="<?php echo $inp_arr[12]; ?>"></td>

                            </tr>
                            <tr>
                                <td>Delux room Oxygen Charge:</td>
                                <td><input type="text" class="form-control" name="inp_14" 
                                value="<?php echo $inp_arr[13]; ?>"></td>
                            </tr>
                            </tr>
                    </table>
                    <div class="form-group m-2">
                        <button type="submit" name="submit" id="submit" class="btn btn-outline-danger mt-2">
                            Submit
                        </button>
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