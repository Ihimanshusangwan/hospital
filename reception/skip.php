<?php
require("../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();


if (isset($_POST['unskip'])) {
    $id=$_POST['id'];
 $update="UPDATE `patient_records` SET `skip`= 0  WHERE `id` = '$id'";
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
        <a href="receptionPage.php" class="btn btn-success m-2">Dashboard</a>
        <div class="d-flex justify-content-between">
            <h3 class="mx-3 my-2 inline-heading">View Skip Patient</h3>
        </div>
        <?php

$sql = "SELECT * FROM patient_records  where   skip=1  AND follow_approve=0 ORDER BY id ASC; ";
$data = $conn->query($sql);
          if(!$res = $data->fetch_assoc()){
            echo "<div class='alert alert-danger'>No Skip Patient</div>";
          }
          else{
          }

     ?>

        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-all" mt-2>
                    <thead class="table-dark">
                        <tr>
                            <th>OPD NO.</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>CONSULTANT</th>
                            <th>REG DATE</th>
                            <th>UNSKIP</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">

                        <?php
                        $sql = "SELECT * FROM patient_records  where  skip=1 and is_deleted = 0 ORDER BY id ASC; ";
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['opd_no'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['consultant'] . '</td>';
                            echo ' <form method="POST">
                            <td> <input type="hidden" name="id" value="' . $res['id'] . '">
                            <input type="date"  name="date" value="' . $res['reg_date'] . '" > </td>';
                            echo '<td> <button type="submit" name="unskip" class="btn btn-primary">Unskip</button></td>';
                            echo '<td> <button type="submit" data-id="' . $res['id'] . '" name="delete" class="btn btn-danger delete_record">Delete</button></td>';
                            echo'</form>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script>
        $(document).ready(function() {
            $(".delete_record").on("click", function(e) {
                e.preventDefault(); // Prevent the default form submission

                var id = $(this).data("id");
                $.ajax({
                    type: "POST",
                    url: "delete_patient.php",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        location.reload(); // Refresh the page
                    }
                });
            });
        });
        </script>
</body>

</html>