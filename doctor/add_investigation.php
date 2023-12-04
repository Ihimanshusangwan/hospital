<?php
require("../admin/connect.php");
session_start();
if (!isset($_SESSION['doctor_id']) && !isset($_SESSION['doctor_type'])) {
    header("location:login.php");
}
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

// Insert new investigation
if(isset($_POST['description'])){
    $description = $_POST['description'];

    $sql = "INSERT INTO investigation_view (description, dr_id) VALUES ('$description', {$_SESSION['doctor_id']});";
    $query = mysqli_query($conn, $sql);
}

// Delete investigation
if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM investigation_view WHERE id = $delete_id AND dr_id = {$_SESSION['doctor_id']}";
    $delete_query = mysqli_query($conn, $delete_sql);
}

// Fetch added investigations
$sql1 = mysqli_query($conn, "SELECT * FROM investigation_view where dr_id = {$_SESSION['doctor_id']}");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Investigations Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>
<body>
    <h1 class="text-center text-danger m-3">
       <?php echo $title['ro'] ?>
    </h1>
    <a href="doctorPage.php" class="btn btn-success m-2">Dashboard</a>
    <div class="container text-center" style="display:flex;justify-content:center;">
        <div class="card shadow-lg m-3 text-center" style="width:50rem;">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-3">
                        <label for="" class="form-label" style="margin-top:20px;"><strong>Add Investigations Lab:</strong></label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" style="margin:20px;" name="description" id="">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" style="margin:20px;margin-right:47px;" value="Add Investigations">
            </form>
        </div>
    </div>
    <div class="container" style="display:flex;justify-content:center;">
        <div class="card shadow-lg m-3" style="width:50rem;">
            <p class="m-3 text-center"><strong>Added Investigations</strong></p>
            <table class="mx-3 mb-3">
                <tr>
                    <th>Sno</th>
                    <th>Investigations</th>
                    <th>Action</th>
                </tr>
                
                <?php
                $i = 1;
                while($res = mysqli_fetch_assoc($sql1)){
                    echo '<tr>
                            <td>'.$i.'</td>
                            <td>'.$res['description'].'</td>
                            <td><a href="?delete_id='.$res['id'].'" class="btn btn-danger btn-sm">Delete</a></td>
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
