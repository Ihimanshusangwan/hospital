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

  $sql6 = "SELECT drug FROM observe2 WHERE patient_id = '$id';";
  $data6 = $conn->query($sql6);

  $sql7 = "SELECT fluid FROM patient_info WHERE patient_id = '$id';";
$data7 = $conn->query($sql7);
$flu = $data7->fetch_assoc();
  





if (isset($_POST['submit'])) {
    
    $date = $_POST['date'];
    $time = $_POST['time'];
    $mlc = $_POST['mlc'];
    $mi = $_POST['mi'];
    $pd = $_POST['pd'];
    $history = $_POST['history'];
    $exam = $_POST['exam'];
    $treat = $_POST['treat'];
    $date1 = $_POST['date1'];
    $follow = $_POST['follow'];

    $update2="UPDATE `discharge` SET `date` = '$date',`time` = '$time',`mlc` = '$mlc',`mi` = '$mi',`pd` = '$pd',`history` = '$history',`exam` = '$exam',`treat` = '$treat',`date1` = '$date1',`follow` = '$follow' WHERE `id` = '$id'";
    $conn->query($update2);


    $update3="UPDATE `patient_info` SET diagnosis = '$pd',history='$history',examination='$exam'  WHERE `patient_id` = '$id'";
    $conn->query($update3);


    echo "<div class='alert alert-success'> Updated Successfully</div>";

    $sql4 = "SELECT * FROM discharge WHERE id = '$id';";
$data4 = $conn->query($sql4);
$res4 = $data4->fetch_assoc();

$sql3 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data3 = $conn->query($sql3);
$res3 = $data3->fetch_assoc();


}
else{
  $sql4 = "SELECT * FROM discharge WHERE id = '$id';";
$data4 = $conn->query($sql4);
$res4 = $data4->fetch_assoc();
$sql3 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data3 = $conn->query($sql3);
$res3 = $data3->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="../dropdown_styles.css">
  <style type="text/css">
    body {
      margin: 30px;
    }

    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 40px;
    }
  </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
    <a href="eye_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
           <form class="row g-3" method="post" action="">
             <div class="col-md-4">
               <label class="form-label">Name </label>
               <input  type="text" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $res['name']; ?>" readonly>
             </div>
             <div class="col-md-4">
               <label class="form-label">Date of Admission :</label>
               <input  type="date" class="form-control" id="DOA" placeholder="Date of Admission" value="<?php echo $res2['date']; ?>" readonly>
             </div>
             <div class="col-md-4">
               <label class="form-label">D.O.A Time</label>
               <input  type="time" class="form-control" id="time" value="<?php echo $res2['time']; ?>" readonly>
             </div>
             <div class="col-md-4">
               <label class="form-label">Date of Discharge</label>
               <input  name = "date" value = "<?php echo $res4['date']; ?>" type="date" class="form-control" id="DOD"    placeholder="Date of Discharge">
             </div>
             <div class="col-md-4">
               <label class="form-label">D.O.D Time</label>
               <input  name = "time" value = "<?php echo $res4['time']; ?>" type="time" class="form-control" id="time"   >
             </div>
             <div class="col-md-4">
               <label class="form-label">Age</label>
               <input name="Age" type="text" class="form-control" id="age" placeholder="Enter Age" value="<?php echo $res['age']; ?>" readonly>
             </div>
             <div class="container">
               <div class="row">
                 <div class="col-md-4">
                   <label class="form-label">Address</label>
                   <textarea name="Address" type="text" class="form-control" id="inputAddress" placeholder="Address" readonly><?php echo $res['address']; ?></textarea>
                 </div>
       
                 <div class="col-md-3">
                   <label class="form-label">Sex</label>
                   <select name="Sex" id="sex" class="form-select" readonly>
                     <?php if ($res['sex'] == 'Male') {?>
                     <option>Male</option>
                     <?php  } else{ ?>
                        <option>Female</option>   <?php } ?>   
                   </select>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <label class="form-label">MLC. NO</label>
               <input  name = "mlc" value = "<?php echo $res4['mlc']; ?>" type="text" class="form-control" id="mlc"    placeholder="MLC. NO">
             </div>
       
             <div class="col-md-3">
               <label class="form-label">M. / .I</label>
               <input  name = "mi" value = "<?php echo $res4['mi']; ?>" type="text" class="form-control" id="mi" placeholder="M. / .I">
             </div>
             <div class="container">
               <div class="row">
                 <div class="col-lg-12">
                   <label class="form-label">Provisional Diagnosis :</label>
                   <textarea  type="text" style="height: 100px;" class="form-control live-fetch" id="hist" placeholder="Provisional Diagnosis" name = "pd"  data-column="diagnosis" data-table="patient_info"><?php echo $res3['diagnosis'];  ?></textarea><div class="dropdown-container"></div>
                 </div>
                 <div class="col-lg-12">
                   <label class="form-label">History :</label>
                   <textarea  type="text" style="height: 100px;" class="form-control live-fetch" id="investigation" placeholder="History" name = "history"  data-column="history" data-table="patient_info"><?php echo $res3['history']; ?></textarea><div class="dropdown-container"></div>
                 </div>
                 <div class="col-lg-12">
                   <label class="form-label">Primary Complaint :</label>
                   <textarea  type="text" style="height: 100px;" class="form-control" id="diagnosis" placeholder="Primary Complaint" readonly><?php echo $res['patient_complaints']; ?></textarea>
                 </div>
                 <div class="col-lg-12">
                   <label class="form-label">Examination Finding :</label>
                   <textarea  type="text" style="height: 100px;" class="form-control live-fetch" id="treatment" placeholder="Examination Finding" name = "exam"  data-column="examination" data-table="patient_info"><?php echo $res3['examination']; ?></textarea><div class="dropdown-container"></div>
                 </div>
                 <div class="col-lg-12">
                   <label class="form-label">Treatment :</label>
                   <textarea   type="text" style="height: 100px;" class="form-control" id="treatment" placeholder="Treatment" name = "treat" readonly><?php $i = 0; while($med = $data6->fetch_assoc()) {if($i>0){echo " ,";}echo $med['drug'];$i++;} echo " ,".$flu['fluid'];?></textarea>
                 </div>
               </div>
             </div>
             <h6>Follow Up :</h6>
             <div class="col-md-4">
               <label class="form-label">Date</label>
               <input  name = "date1" value = "<?php echo $res4['date1']; ?>" type="date" class="form-control" id="date"   >
             </div>
             <div>
             <textarea  type="text" style="height: 100px;" class="form-control live-fetch" id="tick" placeholder="Follow Up" name = "follow" data-column="follow" data-table="discharge"><?php echo $res4['follow']; ?></textarea><div class="dropdown-container"></div>
             </div>
             <div class="row">
               <div class="col mt-2">
                 <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit">Submit</button>
                 <a href="discharge_print.php?id=<?php echo $id; ?> " class="btn btn-info">Print</a>
               </div>
             </div>
           </form>
         </div>
         <script src="../fetch_dropdown_script.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></scrip>

</body>
</html>