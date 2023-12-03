<?php 
//  require("../admin/connect.php");
//  $id = $_GET['id'];
//  session_start();
// //  error_reporting(0);

//  $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
//  $row=mysqli_fetch_assoc($sql);

//  $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
//  $row1=mysqli_fetch_assoc($sql1);

//  $sql2=mysqli_query($conn,"SELECT * FROM p_insure WHERE id = '$id';");
//  $row2=mysqli_fetch_assoc($sql2);
 

//  $sql = "SELECT * FROM titles WHERE id = 1;";
//  $data = $conn->query($sql);
//  $title = $data->fetch_assoc();
//  $sql12="SELECT * FROM `config_print` WHERE 1";
// $data12=$conn->query($sql12);
// $res12=$data12->fetch_assoc();
// if (!isset($res12['inp'])) {
//     $inp_arr = array_fill(0, 3, 'option2');
// } else {
//     $inp = $res12['inp'];
//     $inp_arr = json_decode($inp, true);
//     $inp_arr = is_array($inp_arr) ? $inp_arr : array_fill(0, 3, '');
// }
// ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
<div class="row">
    <div class="col-md-6">
        <strong>श्री /श्रीमती / कुमार / कुमारी :<?php echo $row['name'];?></strong>
    </div>
    <div class="col-md-3">
        <strong> वय : <?php echo $row['age'];?></strong>
    </div>
    <div class="col-md-3">
        <strong> लिंग :<?php echo $row['sex'];?></strong>
    </div>
     </div>
     <div class="row">
    <div class="col-md-5">
        <strong> रुग्ण क्रमांक :<?php echo $row2['uhid'];?></strong>
    </div>
    <div class="col-md-3">
        <strong> दिनांक : <?php echo $row['reg_date'];?></strong>
    </div>
    <div class="col-md-4">
        <strong> पत्ता :<?php echo $row['address'];?></strong>
    </div>
     </div>
    <div class="row">
    <div class="col-md-5">
        <strong> दूरध्वनी क्रमांक :<?php echo $row['mobile'];?></strong>
    </div>
    <div class="col-md-7">
        <strong>  वडील /पाती /आईचे : <?php $row['name_pwp'];?></strong>
    </div>
     </div>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

