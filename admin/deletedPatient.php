<?php
require("../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

if (isset($_POST['restore'])) {
    $id=$_POST['id'];
 $update="UPDATE `patient_records` SET `is_deleted`= 0 , delete_reason=''  WHERE `id` = '$id'";
   $conn->query($update);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Document</title>
    <style>
    label {
        font-weight: 600;
    }
    </style>
</head>

<body style="background-color: #90D0E5;">
    <div class="container mb-4">
        <h1>
            <marquee style="color: purple;" BEHAVIOUR="slide" scrollnount="70" scrolledeley="100">
                <?php echo $title['ro']?>
            </marquee>
        </h1>
        <a href="adminLogin.php" class="btn btn-success m-2">Dashboard</a>
        <div class="d-flex justify-content-between">
            <h3 class="mx-3 my-2 inline-heading"> Deleted Patients</h3>
        </div>
        <?php

$sql = "SELECT * FROM patient_records  where is_deleted =1 ORDER BY id desc; ";
$data = $conn->query($sql);
          if($data->num_rows<1){
            echo "<div class='alert alert-danger'>No Deleted Patient</div>";
          }

     ?>

        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" mt-2>
                    <thead class="table-dark">
                        <tr>
                            <th>Patient Id</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>CONSULTANT</th>
                            <th>REG DATE</th>
                            <th>DELETE REASON</th>
                            <th>RESTORE</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">

                        <?php
                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['consultant'] . '</td>';
                            echo ' <form method="POST">
                            <td> <input type="hidden" name="id" value="' . $res['id'] . '">
                            ' . $res['reg_date'] . '</td>';
                            
                            echo '<td>' . $res['delete_reason'] . '</td>';
                            echo '<td> <button type="submit" name="restore" class="btn btn-primary">Restore</button></td>';
                            echo'</form>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>
<script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                // Enable the search feature
                searching: true
            });
        });
    </script>

</html>