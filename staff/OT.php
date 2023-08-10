<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res = $data->fetch_assoc();

  $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
  $data1 = $conn->query($sql1);
  $res1 = $data1->fetch_assoc();

  $sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res2 = $data2->fetch_assoc();
  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
</head>
<body>

    <div class="container">
      <h1 class="text-center text-danger mt-3"><?php echo $title['so']?></h1>
      <a href="eye_forms.php?id=<?php echo $id;?>" class="btn btn-success">Dashboard</a>
      <h3 class="text-center text-dark mt-3">OT NOTES</h3>
      <div class="row">
        <div class="col-md-3">
          <label class="form-label">UHID No: <?php echo $res2['uhid'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">IPD No: <?php echo $res2['ipd'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Date of Admission : <?php echo $res2['date'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label" for="time_ad">Time of Admission : <?php echo $res2['time'];?></label>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Name: <?php echo $res['name'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Age: <?php echo $res['age'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Sex: <?php echo $res['sex'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">ICU/Ward Room No: <?php echo $res2['ward/icu'];?></label>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <label class="form-label">Consultant: <?php echo $res['consultant'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Diagnosis: <?php echo $res1['diagnosis'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Bed Number: <?php echo $res2['bed/room'];?></label>
        </div>
      </div>

    <a href="vr-surgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary">Vr-Surgery</button></a>
    <a href="OculoPlasty.php?id=<?php echo $id; ?>"> <button class="btn btn-primary">OcuPlasty</button></a>
    <a href="cornealProcedure.php?id=<?php echo $id; ?>"><button class="btn btn-primary">Corneal Procedure</button></a>
    <a href="operation_record.php?id=<?php echo $id; ?>"><button class="btn btn-primary">Operation Record</button></a>

</body>
</html>