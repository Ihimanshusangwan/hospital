<?php
require("connect.php");
if(isset($_POST['submit'])){
    $inp_arr=array();
    for($i=1;$i<2;$i++){
        $element=$_POST['inp_'.$i];
        array_push($inp_arr,$element);
    }
    $inp_json=json_encode($inp_arr);
    $sql="UPDATE `config_print` SET `inp`='$inp_json' WHERE `id`='1';";
    $data=$conn->query($sql);
    if($data){
        echo "<div class='alert alert-success'>Print Page Configure Successfully</div>";
    }
}
$sql = "SELECT * FROM config_print WHERE id = 1;";
$data = $conn->query($sql);
if ($data->num_rows < 1) {
    $sql = "insert into config_print (id) values(1);";
    $conn->query($sql);
}
$sql12="SELECT * FROM `config_print` WHERE 1";
$data12=$conn->query($sql12);
$res12=$data12->fetch_assoc();
$inp=$res12['inp'];
$inp_arr=json_decode($inp,true);
<<<<<<< HEAD
$inp_arr = is_array($inp_arr) ? $inp_arr: array_fill(0,2, '');
=======
$inp_arr = is_array($inp_arr) ? $inp_arr: array_fill(0,2,'');
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24


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
        <h5 class="text-center mt-3">Select those Print Pages that Inculde Header</h5>
        <div class="row p-4 pt-4">
            <form method="post">
                <div class="col shadow-lg rounded m-2 p-4">
                    <table class="table border border-dark">
                        <tr>
                            <td>Medicine Perscription</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inp_1" id="inlineRadio1"
                                        value="option1" <?php echo $inp_arr[0]=='option1'?'checked':'';?>>
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inp_1"
                                        value="option2" <?php echo $inp_arr[0]=='option2'?'checked':'';?>>
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </td>
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