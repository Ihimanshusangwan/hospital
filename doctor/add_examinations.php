<?php
require("../admin/connect.php");
session_start();
if (!isset($_SESSION['doctor_id']) && !isset($_SESSION['doctor_type'])) {
    header("location:login.php");
}
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

if(isset($_POST['examination'])){
    $examination=$_POST['examination'];

    $sql = "INSERT INTO  examinations (examination,dr_id) VALUES ('$examination',{$_SESSION['doctor_id']});";
     $query=mysqli_query($conn, $sql);
     
}
$sql1=mysqli_query($conn,"SELECT * FROM examinations  where dr_id = {$_SESSION['doctor_id']};");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Examinations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    
</head>
<body>
     <h1 class="text-center text-danger m-3">
       <?php echo $title['ro'] ?>
    </h1>
    <a href="doctorPage.php" class="btn btn-success m-2">Dashboard</a>
    <div class="conatiner text-center" style="display:flex;justify-content:center;">
   <div class="card shadow-lg m-3 text-center" style="width:50rem;">
   <form action="" method="POST">

   <div class="row">

        <div class="col-3">
            <label for="" class="form-label " style="margin-top:20px;" ><strong>Add Examinations :</strong> </label>
        </div>

        <div class="col-8">
            <input type="text" class="form-control " name="examination" style="margin:20px;" name="" id="">
        </div>
   </div>

   <input type="submit" class="btn btn-primary" style="margin:20px;margin-right:47px;"value="Add Examinations">
</form>
   </div>
   </div>
   <div class="conatiner" style="display:flex;justify-content:center;">
   <div class="card shadow-lg m-3" style="width:50rem;">
        <p class="mx-3 text-center"><strong>Added Examinations</strong></p>
        <table  class="mx-3  mb-3">
            <tr>
                <th>Sno</th>
                <th>Examinations</th>
            </tr>
            
<?php
$i=1;
        while($res =mysqli_fetch_assoc($sql1)){
           echo '<tr>
                    <td>'.$i.'</td>
                    <td>'.$res['examination'].'</td>
                    
                </tr>';
                $i++;
        }
?>
</table>
   </div>
</div>
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>