<?php
require("../admin/connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();
error_reporting(0);
$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
$x = 0;
if (isset($_POST['submit'])) {

  $ward_sign = $_POST['ward_sign'];
  $icu_sign = $_POST['icu_sign'];


  $acqa = $_POST['acqa0'] . '&' . $_POST['acqa1']
    . '&' . $_POST['acqa2'] . '&' .
    $_POST['acqa3'] . '&' . $_POST['acqa4'] . '&' .
    $_POST['acqa5'] . '&' . $_POST['acqa6']
    . '&' . $_POST['acqa7'] . '&' . $_POST['acqa8'] . '&' . $_POST['acqa9']
    . '&' . $_POST['acqa10'] . '&' . $_POST['acqa11']
    . '&' . $_POST['acqa12'] . '&' .
    $_POST['acqa13'] . '&' . $_POST['acqa14'] . '&' .
    $_POST['acqa15'] . '&' . $_POST['acqa16']
    . '&' . $_POST['acqa17'] . '&' . $_POST['acqa18'] . '&' . $_POST['acqa19']
    . '&' . $_POST['acqa20'] . '&' . $_POST['acqa21']
    . '&' . $_POST['acqa22'] . '&' .
    $_POST['acqa23'] . '&' . $_POST['acqa24'] . '&' .
    $_POST['acqa25'] . '&' . $_POST['acqa26']
    . '&' . $_POST['acqa27'] . '&' . $_POST['acqa28'] . '&' . $_POST['acqa29']
    . '&' . $_POST['acqa30'] . '&' . $_POST['acqa31']
    . '&' . $_POST['acqa32'] . '&' .
    $_POST['acqa33'] . '&' . $_POST['acqa34'] . '&' .
    $_POST['acqa35'] . '&' . $_POST['acqa36']
    . '&' . $_POST['acqa37'] . '&' . $_POST['acqa38'] . '&' . $_POST['acqa39']
    . '&' . $_POST['acqa40'] . '&' . $_POST['acqa41']
    . '&' . $_POST['acqa42'] . '&' .
    $_POST['acqa43'] . '&' . $_POST['acqa44'] . '&' .
    $_POST['acqa45'] . '&' . $_POST['acqa46']
    . '&' . $_POST['acqa47'] . '&' . $_POST['acqa48'] . '&' . $_POST['acqa49'];


  $acqb = $_POST['acqb0'] . '&' . $_POST['acqb1']
    . '&' . $_POST['acqb2'] . '&' .
    $_POST['acqb3'] . '&' . $_POST['acqb4'] . '&' .
    $_POST['acqb5'] . '&' . $_POST['acqb6']
    . '&' . $_POST['acqb7'] . '&' . $_POST['acqb8'] . '&' . $_POST['acqb9']
    . '&' . $_POST['acqb10'] . '&' . $_POST['acqb11']
    . '&' . $_POST['acqb12'] . '&' .
    $_POST['acqb13'] . '&' . $_POST['acqb14'] . '&' .
    $_POST['acqb15'] . '&' . $_POST['acqb16']
    . '&' . $_POST['acqb17'] . '&' . $_POST['acqb18'] . '&' . $_POST['acqb19']
    . '&' . $_POST['acqb20'] . '&' . $_POST['acqb21']
    . '&' . $_POST['acqb22'] . '&' .
    $_POST['acqb23'] . '&' . $_POST['acqb24'] . '&' .
    $_POST['acqb25'] . '&' . $_POST['acqb26']
    . '&' . $_POST['acqb27'] . '&' . $_POST['acqb28'] . '&' . $_POST['acqb29']
    . '&' . $_POST['acqb30'] . '&' . $_POST['acqb31']
    . '&' . $_POST['acqb32'] . '&' .
    $_POST['acqb33'] . '&' . $_POST['acqb34'] . '&' .
    $_POST['acqb35'] . '&' . $_POST['acqb36']
    . '&' . $_POST['acqb37'] . '&' . $_POST['acqb38'] . '&' . $_POST['acqb39']
    . '&' . $_POST['acqb40'] . '&' . $_POST['acqb41']
    . '&' . $_POST['acqb42'] . '&' .
    $_POST['acqb43'] . '&' . $_POST['acqb44'] . '&' .
    $_POST['acqb45'] . '&' . $_POST['acqb46']
    . '&' . $_POST['acqb47'] . '&' . $_POST['acqb48'] . '&' . $_POST['acqb49'];


  $acqc = $_POST['acqc0'] . '&' . $_POST['acqc1']
    . '&' . $_POST['acqc2'] . '&' .
    $_POST['acqc3'] . '&' . $_POST['acqc4'] . '&' .
    $_POST['acqc5'] . '&' . $_POST['acqc6']
    . '&' . $_POST['acqc7'] . '&' . $_POST['acqc8'] . '&' . $_POST['acqc9']
    . '&' . $_POST['acqc10'] . '&' . $_POST['acqc11']
    . '&' . $_POST['acqc12'] . '&' .
    $_POST['acqc13'] . '&' . $_POST['acqc14'] . '&' .
    $_POST['acqc15'] . '&' . $_POST['acqc16']
    . '&' . $_POST['acqc17'] . '&' . $_POST['acqc18'] . '&' . $_POST['acqc19']
    . '&' . $_POST['acqc20'] . '&' . $_POST['acqc21']
    . '&' . $_POST['acqc22'] . '&' .
    $_POST['acqc23'] . '&' . $_POST['acqc24'] . '&' .
    $_POST['acqc25'] . '&' . $_POST['acqc26']
    . '&' . $_POST['acqc27'] . '&' . $_POST['acqc28'] . '&' . $_POST['acqc29']
    . '&' . $_POST['acqc30'] . '&' . $_POST['acqc31']
    . '&' . $_POST['acqc32'] . '&' .
    $_POST['acqc33'] . '&' . $_POST['acqc34'] . '&' .
    $_POST['acqc35'] . '&' . $_POST['acqc36']
    . '&' . $_POST['acqc37'] . '&' . $_POST['acqc38'] . '&' . $_POST['acqc39']
    . '&' . $_POST['acqc40'] . '&' . $_POST['acqc41']
    . '&' . $_POST['acqc42'] . '&' .
    $_POST['acqc43'] . '&' . $_POST['acqc44'] . '&' .
    $_POST['acqc45'] . '&' . $_POST['acqc46']
    . '&' . $_POST['acqc47'] . '&' . $_POST['acqc48'] . '&' . $_POST['acqc49'];


  $acqd = $_POST['acqd0'] . '&' . $_POST['acqd1']
    . '&' . $_POST['acqd2'] . '&' .
    $_POST['acqd3'] . '&' . $_POST['acqd4'] . '&' .
    $_POST['acqd5'] . '&' . $_POST['acqd6']
    . '&' . $_POST['acqd7'] . '&' . $_POST['acqd8'] . '&' . $_POST['acqd9']
    . '&' . $_POST['acqd10'] . '&' . $_POST['acqd11']
    . '&' . $_POST['acqd12'] . '&' .
    $_POST['acqd13'] . '&' . $_POST['acqd14'] . '&' .
    $_POST['acqd15'] . '&' . $_POST['acqd16']
    . '&' . $_POST['acqd17'] . '&' . $_POST['acqd18'] . '&' . $_POST['acqd19']
    . '&' . $_POST['acqd20'] . '&' . $_POST['acqd21'];

  $update = "UPDATE `acq` SET `acqa` = '$acqa',`acqb` = '$acqb',`acqc`='$acqc',`acqd`='$acqd',
  ward_sign = '$ward_sign',
  icu_sign = '$icu_sign' WHERE `id` = '$id'";
  $conn->query($update);
  $x = 1;
}

$sql3 = "SELECT * FROM `acq`  WHERE id = '$id';";
$data3 = $conn->query($sql3);
$acq = $data3->fetch_assoc();
$acqa = explode("&", $acq['acqa']);
$acqb = explode("&", $acq['acqb']);
$acqc = explode("&", $acq['acqc']);
$acqd = explode("&", $acq['acqd']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
  </head>
  <body>
  <form action="" method="post">
    <div class="container">
      <h1 class="text-center text-danger mt-3">SHRI SIDDHIVINAYAK NETRALAYA</h1>
      <h3 class="text-center text-dark mt-3">Acquisition Form</h3>
      <?php if ($x == 1) {
        echo "<div class='alert alert-success'> Updated Successfully</div>";
      } ?>
      <a class="btn btn-primary m-2" href="eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
      <a href="consumable_acquisition_print.php?id=<?php echo $id; ?>" class="btn btn-success ">Print </a>
      <div class="row">
        <div class="col-md-3">
          <label class="form-label">UHID No: <?php echo $res2['uhid']; ?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">IPD No: <?php echo $res2['ipd']; ?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Date of Admission : <?php echo $res2['date']; ?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label" for="time_ad">Time of Admission : <?php echo $res2['time']; ?></label>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Name: <?php echo $res['name']; ?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Age: <?php echo $res['age']; ?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Sex: <?php echo $res['sex']; ?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">ICU/Ward Room No: <?php echo $res2['ward/icu']; ?></label>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <label class="form-label">Consultant: <?php echo $res['consultant']; ?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Diagnosis: <?php echo $res1['diagnosis']; ?></label>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label class="form-label">Bed Number: <?php echo $res2['bed/room']; ?></label>
          </div>
        </div>
        
        <div class="col-md-6">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">SR.</th>
                <th scope="col">PARTICULAR</th>
                <th scope="col">SIZE</th>
                <th scope="col">QTY</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">01</th>
                <td>Mask</td>
                <td><input type="text" 
          
                name="acqa0"    value="<?php echo $acqa[0]; ?>"                                        /></td>
                <td><input type="text" 
          
                name="acqa1"    value="<?php echo $acqa[1]; ?>"                                       /></td>
              </tr>
              <tr>
                <th scope="row">02</th>
                <td>Cap</td>
                <td><input type="text" 
          
                name="acqa2"    value="<?php echo $acqa[2]; ?>"                                     /></td>
                <td><input type="text" 
          
                name="acqa3"    value="<?php echo $acqa[3]; ?>"                                        /></td>
              </tr>
              <tr>
                <th scope="row">03</th>
                <td>Meditape</td>
                <td><input type="text" 
          
                name="acqa4"    value="<?php echo $acqa[4]; ?>"                                        /></td>
                <td><input type="text" 
          
                name="acqa5"    value="<?php echo $acqa[5]; ?>"                                         /></td>
              </tr>
              <tr>
                <th scope="row">04</th>
                <td>Eye Shield</td>
                <td><input type="text" 
          
                name="acqa6"    value="<?php echo $acqa[6]; ?>"                                         /></td>
                <td><input type="text" 
          
                name="acqa7"    value="<?php echo $acqa[7]; ?>"                                         /></td>
              </tr>
              <tr>
                <th scope="row">05</th>
                <td>Eye Patch</td>
                <td><input type="text" 
          
                name="acqa8"    value="<?php echo $acqa[8]; ?>"                                     /></td>
                <td><input type="text" 
          
                name="acqa9"    value="<?php echo $acqa[9]; ?>"                                       /></td>
              </tr>
              <tr>
                <th scope="row">06</th>
                <td>J & J Ear Buds</td>
                <td><input type="text" 
                name="acqa10"    value="<?php echo $acqa[10]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa11"    value="<?php echo $acqa[11]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">07</th>
                <td>E/D. Paracine</td>
                <td><input type="text" 
                name="acqa12"    value="<?php echo $acqa[12]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa13"    value="<?php echo $acqa[13]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">08</th>
                <td>E/D. Apidine</td>
                <td><input type="text" 
                name="acqa14"    value="<?php echo $acqa[14]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa15"    value="<?php echo $acqa[15]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">09</th>
                <td>Eye Drape</td>
                <td><input type="text" 
                name="acqa16"    value="<?php echo $acqa[16]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa17"    value="<?php echo $acqa[17]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">10</th>
                <td>Trolley Drape</td>
                <td><input type="text" 
                name="acqa18"    value="<?php echo $acqa[18]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa19"    value="<?php echo $acqa[19]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">11</th>
                <td>Surgical Gloves 6.5</td>
                <td><input type="text" 
                name="acqa20"    value="<?php echo $acqa[20]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa21"    value="<?php echo $acqa[21]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">12</th>
                <td>Surgical Gloves 7.0</td>
                <td><input type="text" 
                name="acqa22"    value="<?php echo $acqa[22]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa23"    value="<?php echo $acqa[23]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">13</th>
                <td>Surgical Gloves 7.5</td>
                <td><input type="text" 
                name="acqa24"    value="<?php echo $acqa[24]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa25"    value="<?php echo $acqa[25]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">14</th>
                <td>Surgical Gloves 8.0</td>
                <td><input type="text" 
                name="acqa26"    value="<?php echo $acqa[26]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa27"    value="<?php echo $acqa[27]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">15</th>
                <td>I.V. Set</td>
                <td><input type="text" 
                name="acqa28"    value="<?php echo $acqa[28]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa29"    value="<?php echo $acqa[29]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">16</th>
                <td>BT Set</td>
                <td><input type="text" 
                name="acqa30"    value="<?php echo $acqa[30]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa31"    value="<?php echo $acqa[31]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">17</th>
                <td>RL</td>
                <td><input type="text" 
                name="acqa32"    value="<?php echo $acqa[32]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa33"    value="<?php echo $acqa[33]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">18</th>
                <td>NS</td>
                <td><input type="text" 
                name="acqa34"    value="<?php echo $acqa[34]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa35"    value="<?php echo $acqa[35]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">19</th>
                <td>BSS</td>
                <td><input type="text" 
                name="acqa36"    value="<?php echo $acqa[36]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa37"    value="<?php echo $acqa[37]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">20</th>
                <td>Contasol</td>
                <td><input type="text" 
                name="acqa38"    value="<?php echo $acqa[38]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa39"    value="<?php echo $acqa[39]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">21</th>
                <td>Dyspo Van 1CC</td>
                <td><input type="text" 
                name="acqa40"    value="<?php echo $acqa[40]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa41"    value="<?php echo $acqa[41]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">22</th>
                <td>Dyspo Van 2CC</td>
                <td><input type="text" 
                name="acqa42"    value="<?php echo $acqa[42]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa43"    value="<?php echo $acqa[43]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">23</th>
                <td>Dyspo Van 5CC</td>
                <td><input type="text" 
                name="acqa44"    value="<?php echo $acqa[44]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa45"    value="<?php echo $acqa[45]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">24</th>
                <td>Dyspo Van 10CC</td>
                <td><input type="text" 
                name="acqa46"    value="<?php echo $acqa[46]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa47"    value="<?php echo $acqa[47]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">25</th>
                <td>Dyspo Van 20CC</td>
                <td><input type="text" 
                name="acqa48"    value="<?php echo $acqa[48]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqa49"    value="<?php echo $acqa[49]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">26</th>
                <td>15 Degree LANS TIP</td>
                <td><input type="text" 
                name="acqb0"    value="<?php echo $acqb[0]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb1"    value="<?php echo $acqb[1]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">27</th>
                <td>15 Degree LANS MVR</td>
                <td><input type="text" 
                name="acqb2"    value="<?php echo $acqb[2]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb3"    value="<?php echo $acqb[3]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">28</th>
                <td>2.8mm Keratome</td>
                <td><input type="text" 
                name="acqb4"    value="<?php echo $acqb[4]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb5"    value="<?php echo $acqb[5]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">29</th>
                <td>5.2mm Keratome</td>
                <td><input type="text" 
                name="acqb6"    value="<?php echo $acqb[6]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb7"    value="<?php echo $acqb[7]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">30</th>
                <td>2.2mm Cresent</td>
                <td><input type="text" 
                name="acqb8"    value="<?php echo $acqb[8]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb9"    value="<?php echo $acqb[9]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">31</th>
                <td>Surgical Blade 11 No</td>
                <td><input type="text" 
                name="acqb10"    value="<?php echo $acqb[10]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb11"    value="<?php echo $acqb[11]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">32</th>
                <td>Surgical Blade 15 No</td>
                <td><input type="text" 
                name="acqb12"    value="<?php echo $acqb[12]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb13"    value="<?php echo $acqb[13]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">33</th>
                <td>Intracath</td>
                <td><input type="text" 
                name="acqb14"    value="<?php echo $acqb[14]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb15"    value="<?php echo $acqb[15]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">34</th>
                <td>Intracath Three way Cannula</td>
                <td><input type="text" 
                name="acqb16"    value="<?php echo $acqb[16]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb17"    value="<?php echo $acqb[17]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">35</th>
                <td>Three way Cannula</td>
                <td><input type="text" 
                name="acqb18"    value="<?php echo $acqb[18]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb19"    value="<?php echo $acqb[19]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">36</th>
                <td>Merocel PVA Sponge</td>
                <td><input type="text" 
                name="acqb20"    value="<?php echo $acqb[20]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb21"    value="<?php echo $acqb[21]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">37</th>
                <td>PVA Segment</td>
                <td><input type="text" 
                name="acqb22"    value="<?php echo $acqb[22]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb23"    value="<?php echo $acqb[23]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">38</th>
                <td>CTR</td>
                <td><input type="text" 
                name="acqb24"    value="<?php echo $acqb[24]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb25"    value="<?php echo $acqb[25]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">39</th>
                <td>Irirs Hooks</td>
                <td><input type="text" 
                name="acqb26"    value="<?php echo $acqb[26]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb27"    value="<?php echo $acqb[27]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">40</th>
                <td>B- Hex Ring</td>
                <td><input type="text" 
                name="acqb28"    value="<?php echo $acqb[28]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb29"    value="<?php echo $acqb[29]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">41</th>
                <td>BCL</td>
                <td><input type="text" 
                name="acqb30"    value="<?php echo $acqb[30]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb31"    value="<?php echo $acqb[31]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">42</th>
                <td>Fibrin Glue Baxter</td>
                <td><input type="text" 
                name="acqb32"    value="<?php echo $acqb[32]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb33"    value="<?php echo $acqb[33]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">43</th>
                <td>Fibrin Glue Reliseal</td>
                <td><input type="text" 
                name="acqb34"    value="<?php echo $acqb[34]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb35"    value="<?php echo $acqb[35]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">44</th>
                <td>Suture Material</td>
                <td><input type="text" 
                name="acqb36"    value="<?php echo $acqb[36]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb37"    value="<?php echo $acqb[37]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">45</th>
                <td>Trypan Blue Dye</td>
                <td><input type="text" 
                name="acqb38"    value="<?php echo $acqb[38]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb39"    value="<?php echo $acqb[39]; ?>"
                                                           /></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">SR.</th>
                <th scope="col">PARTICULAR</th>
                <th scope="col">SIZE</th>
                <th scope="col">QTY</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">01</th>
                <td>Inj. Lox 2% wuth Adrenaline</td>
                <td><input type="text" 
                name="acqb40"    value="<?php echo $acqb[40]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb41"    value="<?php echo $acqb[41]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">02</th>
                <td>Inj. Lox 2%</td>
                <td><input type="text" 
                name="acqb42"    value="<?php echo $acqb[42]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb43"    value="<?php echo $acqb[43]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">03</th>
                <td>Inj. Loxicard 2%</td>
                <td><input type="text" 
                name="acqb44"    value="<?php echo $acqb[44]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb45"    value="<?php echo $acqb[45]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">04</th>
                <td>Inj. Bupicacaine 0.5%</td>
                <td><input type="text" 
                name="acqb46"    value="<?php echo $acqb[46]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb47"    value="<?php echo $acqb[47]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">05</th>
                <td>Inj. Hynidase</td>
                <td><input type="text" 
                name="acqb48"    value="<?php echo $acqb[48]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqb49"    value="<?php echo $acqb[49]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">06</th>
                <td>Inj. Entodase</td>
                <td><input type="text" 
                name="acqc0"    value="<?php echo $acqc[0]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc1"    value="<?php echo $acqc[1]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">07</th>
                <td>Inj. Lox 4% Topical</td>
                <td><input type="text" 
                name="acqc2"    value="<?php echo $acqc[2]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc3"    value="<?php echo $acqc[3]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">08</th>
                <td>Inj. Oculan</td>
                <td><input type="text" 
                name="acqc4"    value="<?php echo $acqc[4]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc5"    value="<?php echo $acqc[5]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">09</th>
                <td>HPMC 2%</td>
                <td><input type="text" 
                name="acqc6"    value="<?php echo $acqc[6]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc7"    value="<?php echo $acqc[7]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">10</th>
                <td>Visco</td>
                <td><input type="text" 
                name="acqc8"    value="<?php echo $acqc[8]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc9"    value="<?php echo $acqc[9]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">11</th>
                <td>Inj. Hylucoat</td>
                <td><input type="text" 
                name="acqc10"    value="<?php echo $acqc[10]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc11"    value="<?php echo $acqc[11]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">12</th>
                <td>Inj. Aurocoat</td>
                <td><input type="text" 
                name="acqc12"    value="<?php echo $acqc[12]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc13"    value="<?php echo $acqc[13]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">13</th>
                <td>Inj. Adrenaline</td>
                <td><input type="text" 
                name="acqc14"    value="<?php echo $acqc[14]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc15"    value="<?php echo $acqc[15]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">14</th>
                <td>Inj.. Auromox</td>
                <td><input type="text" 
                name="acqc16"    value="<?php echo $acqc[16]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc17"    value="<?php echo $acqc[17]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">15</th>
                <td>Inj. Vancomycin</td>
                <td><input type="text" 
                name="acqc18"    value="<?php echo $acqc[18]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc19"    value="<?php echo $acqc[19]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">16</th>
                <td>Inj. Pilocarpine</td>
                <td><input type="text" 
                name="acqc20"    value="<?php echo $acqc[20]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc21"    value="<?php echo $acqc[21]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">17</th>
                <td>Inj. Pilomin</td>
                <td><input type="text" 
                name="acqc22"    value="<?php echo $acqc[22]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc23"    value="<?php echo $acqc[23]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">18</th>
                <td>Inj. Diclofenac</td>
                <td><input type="text" 
                name="acqc24"    value="<?php echo $acqc[24]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc25"    value="<?php echo $acqc[25]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">19</th>
                <td>Inj. Aurocort</td>
                <td><input type="text" 
                name="acqc26"    value="<?php echo $acqc[26]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc27"    value="<?php echo $acqc[27]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">20</th>
                <td>Inj. Razumab</td>
                <td><input type="text" 
                name="acqc28"    value="<?php echo $acqc[28]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc29"    value="<?php echo $acqc[29]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">21</th>
                <td>Inj. Accentrix</td>
                <td><input type="text" 
                name="acqc30"    value="<?php echo $acqc[30]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc31"    value="<?php echo $acqc[31]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">22</th>
                <td>Inj. Avastin</td>
                <td><input type="text" 
                name="acqc32"    value="<?php echo $acqc[32]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc33"    value="<?php echo $acqc[33]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">23</th>
                <td>Inj. Ceftazidine</td>
                <td><input type="text" 
                name="acqc34"    value="<?php echo $acqc[34]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc35"    value="<?php echo $acqc[35]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">24</th>
                <td>Inj.Amicacin</td>
                <td><input type="text" 
                name="acqc36"    value="<?php echo $acqc[36]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc37"    value="<?php echo $acqc[37]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">25</th>
                <td>Inj. Vozole</td>
                <td><input type="text" 
                name="acqc38"    value="<?php echo $acqc[38]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc39"    value="<?php echo $acqc[39]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">26</th>
                <td>Inj. Gentamycin</td>
                <td><input type="text" 
                name="acqc40"    value="<?php echo $acqc[40]; ?>"

                                                           /></td>
                <td><input type="text" 
                name="acqc41"    value="<?php echo $acqc[41]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">27</th>
                <td>Inj. Dexa</td>
                <td><input type="text" 
                name="acqc42"    value="<?php echo $acqc[42]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc43"    value="<?php echo $acqc[43]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">28</th>
                <td>Inj. Ampho B</td>
                <td><input type="text" 
                name="acqc44"    value="<?php echo $acqc[44]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc45"    value="<?php echo $acqc[45]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">29</th>
                <td>Inj. Mannitol</td>
                <td><input type="text" 
                name="acqc46"    value="<?php echo $acqc[46]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc47"    value="<?php echo $acqc[47]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">30</th>
                <td>Inj. Ceftriaxone 1gm</td>
                <td><input type="text" 
                name="acqc48"    value="<?php echo $acqc[48]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqc49"    value="<?php echo $acqc[49]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">31</th>
                <td>Inj. Mitomycin - C</td>
                <td><input type="text" 
                name="acqd0"    value="<?php echo $acqd[0]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd1"    value="<?php echo $acqd[1]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">32</th>
                <td>Inj. Optineuron</td>
                <td><input type="text" 
                name="acqd2"    value="<?php echo $acqd[2]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd3"    value="<?php echo $acqd[3]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">33</th>
                <td>Inj. Pan 40</td>
                <td><input type="text" 
                name="acqd4"    value="<?php echo $acqd[4]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd5"    value="<?php echo $acqd[5]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">34</th>
                <td>Inj. Tramadol</td>
                <td><input type="text" 
                name="acqd6"    value="<?php echo $acqd[6]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd7"    value="<?php echo $acqd[7]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">35</th>
                <td>Inj. IV Methyl Prednisolone</td>
                <td><input type="text" 
                name="acqd8"    value="<?php echo $acqd[8]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd9"    value="<?php echo $acqd[9]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">36</th>
                <td><input type="text" 
                name="acqd10"    value="<?php echo $acqd[10]; ?>"
                                                           /></td>

                <td><input type="text" 
                name="acqd11"    value="<?php echo $acqd[11]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd12"    value="<?php echo $acqd[12]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">37</th>
                <td><input type="text" 
                name="acqd13"    value="<?php echo $acqd[13]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd14"    value="<?php echo $acqd[14]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd15"    value="<?php echo $acqd[15]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">38</th>
                <td><input type="text" 
                name="acqd16"    value="<?php echo $acqd[16]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd17"    value="<?php echo $acqd[17]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd18"    value="<?php echo $acqd[18]; ?>"
                                                           /></td>
              </tr>
              <tr>
                <th scope="row">39</th>
                <td><input type="text" 
                name="acqd19"    value="<?php echo $acqd[19]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd20"    value="<?php echo $acqd[20]; ?>"
                                                           /></td>
                <td><input type="text" 
                name="acqd21"    value="<?php echo $acqd[21]; ?>"
                                                           /></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
                    <div class="col-6">
                        <label class="form-label">Sign of Ward Sister :</label>
                        <input type="text" name="ward_sign" id="consultant" class="form-control" placeholder="Sign"
                            value="<?php echo $acq['ward_sign']; ?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Sign of ICU Sister :</label>
                        <input type="text" name="icu_sign" id="consultant" class="form-control" placeholder="Sign"
                            value="<?php echo $acq['icu_sign']; ?>">
                    </div>

                </div>
      <button type="submit" name="submit"  class="btn btn-primary mt-3">Submit</button>
      
    </div>
</form>
  </body>
</html>
