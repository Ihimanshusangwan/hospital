<?php
require("../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
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
    <h3 class="mx-3 my-2 inline-heading">Patient Details</h3>
    <?php
          if (isset($_REQUEST['submit'])) {
            $id = $_POST['id'];
            $date = $_POST['date'];
            $update="UPDATE `patient_records` SET reg_date = '$date', is_approved= 1  WHERE `id` = '$id'";
            $conn->query($update);
            $day = date('d');
                $month = date('m');
                $year = date('Y');
                
                $uhid = $id.'/'.$day.'/'.$month.'/'.$year;
              
                
                //auto generate uhid
                $sql = "update p_insure set uhid = '$uhid' where id = $id;";
                $conn->query($sql);
                $sql = "update ortho_p_insure set uhid = '$uhid' where id = $id;";
                $conn->query($sql);
            echo "<div class='alert alert-success'> Updated Successfully</div>";

          }
          $sql = "SELECT * FROM patient_records  where is_registered= 0  and is_approved= 0 ORDER BY id DESC; ";
          $data = $conn->query($sql);
          if(!$res = $data->fetch_assoc()){
            echo "<div class='alert alert-danger'>No Appointment Requets</div>";
          }
          else{


     ?> 


        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-all" mt-2>
                    <thead class="table-dark">
                        <tr>
                            <th>PATIENT ID</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>CONSULTANT</th>
                            <th>REG DATE</th>
                            <th>APPROVE </th>
                            
                            <!-- <th>TOTAL</th> -->
                            

                        </tr>
                    </thead>
                    <tbody>
                      <form method="POST" action="appoint.php">
                        <?php
                        $sql = "SELECT * FROM patient_records  where is_registered= 0  and is_approved= 0 ORDER BY id DESC; ";
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';

                            
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['consultant'] . '</td>';
                            echo '<td> <input type="hidden" name="id" value="' . $res['id'] . '">
                            <input type="date"  name="date" value="' . $res['reg_date'] . '"> </td>';
                            echo '<td> <button  type="submit" name="submit" class="btn btn-primary">Approve</button></td>';
                           
                            
                            echo '</tr>';
                        }
                      }
                        ?>
                    </tbody>
                </table>
  </div>
  <script>
    var currentDate = new Date().toISOString().slice(0, 10);  
    document.getElementById("reg_date").value = currentDate;
    const addressCheckbox = document.getElementById("address-copy");
    const patientAddress = document.getElementById("address");
    const patientTaluka = document.getElementById("taluka");
    const patientDistrict = document.getElementById("district");
    const pwpTaluka = document.getElementById("taluka_pwp");
    const pwpDistrict = document.getElementById("district_pwp");
    const pwpAddress = document.getElementById("address_pwp");

    addressCheckbox.addEventListener("change", function () {
      if (this.checked) {
        pwpAddress.value = patientAddress.value;
        pwpTaluka.value = patientTaluka.value;
        pwpDistrict.value = patientDistrict.value;
      } else {
        pwpAddress.value = "";
        pwpTaluka.value = "";
        pwpDistrict.value = "";
      }
    });
  </script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>