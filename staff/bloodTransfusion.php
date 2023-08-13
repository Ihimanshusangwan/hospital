<?php
require("../admin/connect.php");
$id = $_GET['id'];
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
// error_reporting(0);
$x = 0;
if (isset($_POST['submit'])) {
  $new = array();
  for($i =1;$i<=8;$i++){
    $new[$i] = $_POST['new_'.$i]; 
   }
    $newValue = json_encode($new);

  $dr = $_POST['dr0'] . '&' . $_POST['dr1'] . '&' .
    $_POST['dr2'] . '&' . $_POST['dr3'] .
    '&' . $_POST['dr4'] . '&' . $_POST['dr5']
    . '&' . $_POST['dr6'] . '&' . $_POST['dr7']
    . '&' . $_POST['dr8'];

  $nur = $_POST['nur0'] . '&' . $_POST['nur1'] . '&' .
    $_POST['nur2'] . '&' . $_POST['nur3'] .
    '&' . $_POST['nur4'];

  $cros = isset($_POST['cros'])?$_POST['cros']:"";
  $trans = isset($_POST['trans'])?$_POST['trans']:"";
  $blooa = $_POST['blooa0'] . '&' . $_POST['blooa1']
    . '&' . $_POST['blooa2'] . '&' .
    $_POST['blooa3'] . '&' . $_POST['blooa4'] . '&' .
    $_POST['blooa5'] . '&' . $_POST['blooa6']
    . '&' . $_POST['blooa7'] . '&' . $_POST['blooa8'] . '&' . $_POST['blooa9']
    . '&' . $_POST['blooa10'] . '&' . $_POST['blooa11']
    . '&' . $_POST['blooa12'] . '&' .
    $_POST['blooa13'] . '&' . $_POST['blooa14'] . '&' .
    $_POST['blooa15'] . '&' . $_POST['blooa16']
    . '&' . $_POST['blooa17'] . '&' . $_POST['blooa18'] . '&' . $_POST['blooa19']
    . '&' . $_POST['blooa20'] . '&' . $_POST['blooa21']
    . '&' . $_POST['blooa22'] . '&' .
    $_POST['blooa23'] . '&' . $_POST['blooa24'] . '&' .
    $_POST['blooa25'] . '&' . $_POST['blooa26']
    . '&' . $_POST['blooa27'] . '&' . $_POST['blooa28'] . '&' . $_POST['blooa29']
    . '&' . $_POST['blooa30'] . '&' . $_POST['blooa31']
    . '&' . $_POST['blooa32'] . '&' .
    $_POST['blooa33'] . '&' . $_POST['blooa34'] . '&' .
    $_POST['blooa35'] . '&' . $_POST['blooa36']
    . '&' . $_POST['blooa37'] . '&' . $_POST['blooa38'] . '&' . $_POST['blooa39']
    . '&' . $_POST['blooa40'] . '&' . $_POST['blooa41']
    . '&' . $_POST['blooa42'] . '&' .
    $_POST['blooa43'] . '&' . $_POST['blooa44'] . '&' .
    $_POST['blooa45'] . '&' . $_POST['blooa46']
    . '&' . $_POST['blooa47'] . '&' . $_POST['blooa48'] . '&' . $_POST['blooa49']
    . '&' . $_POST['blooa50'];

  $bloob = $_POST['bloob0'] . '&' . $_POST['bloob1']
    . '&' . $_POST['bloob2'] . '&' .
    $_POST['bloob3'] . '&' . $_POST['bloob4'] . '&' .
    $_POST['bloob5'] . '&' . $_POST['bloob6']
    . '&' . $_POST['bloob7'] . '&' . $_POST['bloob8'] . '&' . $_POST['bloob9']
    . '&' . $_POST['bloob10'] . '&' . $_POST['bloob11']
    . '&' . $_POST['bloob12'] . '&' .
    $_POST['bloob13'] . '&' . $_POST['bloob14'] . '&' .
    $_POST['bloob15'] . '&' . $_POST['bloob16']
    . '&' . $_POST['bloob17'] . '&' . $_POST['bloob18'] . '&' . $_POST['bloob19']
    . '&' . $_POST['bloob20'] . '&' . $_POST['bloob21']
    . '&' . $_POST['bloob22'] . '&' .
    $_POST['bloob23'] . '&' . $_POST['bloob24'] . '&' .
    $_POST['bloob25'] . '&' . $_POST['bloob26']
    . '&' . $_POST['bloob27'] . '&' . $_POST['bloob28'] . '&' . $_POST['bloob29']
    . '&' . $_POST['bloob30'] . '&' . $_POST['bloob31']
    . '&' . $_POST['bloob32'] . '&' .
    $_POST['bloob33'] . '&' . $_POST['bloob34'] . '&' .
    $_POST['bloob35'] . '&' . $_POST['bloob36']
    . '&' . $_POST['bloob37'] . '&' . $_POST['bloob38'] . '&' . $_POST['bloob39']
    . '&' . $_POST['bloob40'] . '&' . $_POST['bloob41']
    . '&' . $_POST['bloob42'] . '&' .
    $_POST['bloob43'] . '&' . $_POST['bloob44'] . '&' .
    $_POST['bloob45'] . '&' . $_POST['bloob46']
    . '&' . $_POST['bloob47'] . '&' . $_POST['bloob48'] . '&' . $_POST['bloob49'];

  $update = "UPDATE `blood` SET `dr` = '$dr',`nur` = '$nur',`trans`='$trans',`cros`='$cros',`blooa`='$blooa',`bloob`='$bloob',`new` = '$newValue' WHERE `id` = '$id'";
  $conn->query($update);
  $x = 1;


}
error_reporting(0); 
$sql3 = "SELECT * FROM `blood`  WHERE id = '$id';";
$data3 = $conn->query($sql3);
$blood = $data3->fetch_assoc();
$dr = explode("&", $blood['dr']);
$nur = explode("&", $blood['nur']);
$blooa = explode("&", $blood['blooa']);
$bloob = explode("&", $blood['bloob']);
$newValue = json_decode($blood['new'],true);

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
    <style type="text/css">
      body {
        background: lightgray;
        animation: fade-in 1s linear;
      }

      .fl {
        animation: gelatine 1s;
      }

      .center {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px;
      }

      input[type="text"]::placeholder,
      input[type="time"]::placeholder,
      input[type="date"]::placeholder,
      input[type="tel"]::placeholder,
      input[type="number"]::placeholder {
        color: lightgrey;
      }

      textarea[type="text"]::placeholder {
        color: lightgrey;
      }

      hr {
        border: 1px solid black;
      }

      label {
        animation: gelatine 1s;
      }

      select {
        animation: gelatine 1s;
        outline: none !important;
        border-color: #c0c0c0;
        box-shadow: 5px 5px 5px 5px #c0c0c0;
        animation: gelatine 1s;
      }

      input[type="text"],
      input[type="time"],
      input[type="date"],
      input[type="tel"],
      input[type="number"] {
        outline: none !important;
        border-color: #c0c0c0;
        box-shadow: 5px 5px 5px 5px #c0c0c0;
        animation: gelatine 1s;
      }

      textarea[type="text"] {
        outline: none !important;
        border-color: #c0c0c0;
        box-shadow: 5px 5px 5px 5px #c0c0c0;
        animation: gelatine 1s;
      }

      input[type="text"]:focus,
      input[type="time"]:focus,
      input[type="date"]:focus,
      input[type="tel"]:focus,
      input[type="number"]:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
      }

      textarea[type="text"]:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
      }

      select:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
      }

      @keyframes fade-in {
        from {
          opacity: 0;
        }

        to {
          opacity: 1;
        }
      }

      @keyframes gelatine {
        0% {
          opacity: 0;
          transform: translateX(2000px);
        }

        60% {
          opacity: 1;
          transform: translateX(-30px);
        }

        80% {
          transform: translateX(10px);
        }

        100% {
          transform: translateX(0);
        }
      }
    </style>
  </head>

  <body>
    <div class="container">
      <h1 class="text-center text-danger mt-3">SHRI SIDDHIVINAYAK NETRALAYA</h1>
      <h3 class="text-center text-dark mt-3">BLOOD  TRANSFUSION</h3>
      <?php if ($x == 1) {
        echo "<div class='alert alert-success'> Updated Successfully</div>";
      } ?>
      <a class="btn btn-primary m-2" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
      <a href="ortho_blood_transfusion_print.php?id=<?php echo $id; ?>" class=" btn btn-success m-2"
            id="dashboard">Print</a>

      <div class="row" >
      <div class="col-md-3" >
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
        <div class="col-md-3">
          <label class="form-label">Bed Number: <?php echo $res2['bed/room']; ?></label>
        </div>
    </div> 
    <form action="" method="post">
      <hr />
      <div class="row">
        <div class="col-12"><strong>Blood Transfusion order by:</strong></div>
      </div>
      <div class="row mt-4">
        <div class="col-3">
          <label class="form-label text-primary">Dr</label>
          <input  type="text" class="form-control" id="" name="dr0"    value="<?php echo $dr[0]; ?>"/>
        </div>
        <div class="col-3"> 
          <label class="form-label text-primary">Bloodgroup of Patient</label>
          <input  type="text" class="form-control" id="" name="dr1"    value="<?php echo $dr[1]; ?>"/>
        </div>
        <div class="col-3">
          <label class="form-label text-primary">Cross matched</label><br />
          <input type="radio" name="cros" value="Yes" <?php if ($blood['cros'] == 'Yes') {
            echo "checked";
          } ?>/>
          <label style="margin-left: 0.5rem; margin-right: 1rem">Yes</label>
          <input type="radio" name="cros" value="No" <?php if ($blood['cros'] == 'No') {
            echo "checked";
          } ?>/><label style="margin-left: 0.5rem">No</label>
        </div>
        <div class="col-3">
          <label class="form-label text-danger">(If No:reason)</label>
          <input  type="text" class="form-control" id="" name="dr2"    value="<?php echo $dr[2]; ?>"/>
        </div>
      </div>
      <div class="row">
        <h6 class="mt-4 fl">Type:</h6>
        <table class="table table-bordered">
          <thead>
            <tr>
              <td >WB</td>
              <td > 
<input type="text" class="form-control" name="new_1" value="<?php echo $newValue['1']; ?>"> </td>
              <td >PRP</td>
              <td >
<input type="text" class="form-control" name="new_2" value="<?php echo $newValue['2']; ?>"></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>PRC</td>
              <th >
<input type="text" class="form-control" name="new_3" value="<?php echo $newValue['3']; ?>"></th>
              <td>Crypt</td>
              <td>
<input type="text" class="form-control" name="new_4" value="<?php echo $newValue['4']; ?>"></td>
            </tr>
            <tr>
              <td>FFP</td>
              <th >
<input type="text" class="form-control" name="new_5" value="<?php echo $newValue['5']; ?>"></th>
              <td>Plasma</td>
              <td>
<input type="text" class="form-control" name="new_6" value="<?php echo $newValue['6']; ?>"></td>
            </tr>
            <tr>
              <td>PLT</td>
              <th >
<input type="text" class="form-control" name="new_7" value="<?php echo $newValue['7']; ?>"></th>
              <td>Other</td>
              <td>
<input type="text" class="form-control" name="new_8" value="<?php echo $newValue['8']; ?>"></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="row">
        <div class="col-3">
          <label class="form-label text-primary">Fluid Volume Infused</label>
          <input  type="text" class="form-control" id="" name="dr3"    value="<?php echo $dr[3]; ?>"/>
        </div>
        <div class="col-5">
          <label class="form-label text-primary"
            >Blood bag details checked & B.T. Started by Dr :</label
          >
          <input  type="text" class="form-control" id="" name="dr4"    value="<?php echo $dr[4]; ?>"/>
        </div>
      </div>
      <table class="table table-bordered mt-4">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Started At</th>
            <td>
              <input  type="date" class="form-control" id="age" name="dr5"    value="<?php echo $dr[5]; ?>"/>
            </td>
            <td>
              <input  type="time" class="form-control" id="age" name="dr6"    value="<?php echo $dr[6]; ?>"/>
            </td>
          </tr>
          <tr>
            <th scope="row">Completed At</th>
            <td>
              <input  type="date" class="form-control" id="age" name="dr7"    value="<?php echo $dr[7]; ?>"/>
            </td>
            <td>
              <input  type="time" class="form-control" id="age" name="dr8"    value="<?php echo $dr[8]; ?>"/>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Frequency of Monitoring</th>
            <th scope="col">Time</th>
            <th scope="col">Temp</th>
            <th scope="col">Pulse</th>
            <th scope="col">R.R</th>
            <th scope="col">B.P</th>
            <th scope="col">Urine Output</th>
            <th scope="col">Observations / Reaction</th>
            <th scope="col">Remarks</th>
            <th scope="col">Sign</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Pre Transfusion Vital</th>
            <td>
              <input name="blooa8"    value="<?php echo $blooa[8]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa0"    value="<?php echo $blooa[0]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="blooa1"    value="<?php echo $blooa[1]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="blooa2"    value="<?php echo $blooa[2]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="blooa3"    value="<?php echo $blooa[3]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="blooa4"    value="<?php echo $blooa[4]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="blooa5"    value="<?php echo $blooa[5]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="blooa6"    value="<?php echo $blooa[6]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="blooa7"    value="<?php echo $blooa[7]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
          <tr>
            <th scope="row">After 10 min</th>
            <td>
              <input name="blooa9"    value="<?php echo $blooa[9]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa10"    value="<?php echo $blooa[10]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="blooa11"    value="<?php echo $blooa[11]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="blooa12"    value="<?php echo $blooa[12]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="blooa13"    value="<?php echo $blooa[13]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="blooa14"    value="<?php echo $blooa[14]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="blooa15"    value="<?php echo $blooa[15]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="blooa16"    value="<?php echo $blooa[16]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="blooa17"    value="<?php echo $blooa[17]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
          <tr>
            <th scope="row">After 20 min</th>
            <td>
              <input name="blooa18"    value="<?php echo $blooa[18]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa19"    value="<?php echo $blooa[19]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="blooa20"    value="<?php echo $blooa[20]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="blooa21"    value="<?php echo $blooa[21]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="blooa22"    value="<?php echo $blooa[22]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="blooa23"    value="<?php echo $blooa[23]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="blooa24"    value="<?php echo $blooa[24]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="blooa25"    value="<?php echo $blooa[25]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="blooa26"    value="<?php echo $blooa[26]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
          <tr>
            <th scope="row">After 30 min</th>
            <td>
              <input name="blooa27"    value="<?php echo $blooa[27]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa28"    value="<?php echo $blooa[28]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="blooa29"    value="<?php echo $blooa[29]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="blooa30"    value="<?php echo $blooa[30]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="blooa31"    value="<?php echo $blooa[31]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="blooa32"    value="<?php echo $blooa[32]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="blooa33"    value="<?php echo $blooa[33]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="blooa34"    value="<?php echo $blooa[34]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="blooa35"    value="<?php echo $blooa[35]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
          <tr>
            <th scope="row">After 1 hr.</th>
            <td>
              <input name="blooa36"    value="<?php echo $blooa[36]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa37"    value="<?php echo $blooa[37]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="blooa38"    value="<?php echo $blooa[38]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="blooa39"    value="<?php echo $blooa[39]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="blooa40"    value="<?php echo $blooa[40]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="blooa41"    value="<?php echo $blooa[41]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="blooa42"    value="<?php echo $blooa[42]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="blooa43"    value="<?php echo $blooa[43]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="blooa44"    value="<?php echo $blooa[44]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
          <tr>
            <th scope="row">After 2 hrs.</th>
            <td>
              <input  name="blooa45"    value="<?php echo $blooa[45]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa46"    value="<?php echo $blooa[46]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="blooa47"    value="<?php echo $blooa[47]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="blooa48"    value="<?php echo $blooa[48]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="blooa49"    value="<?php echo $blooa[49]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="blooa50"    value="<?php echo $blooa[50]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="bloob0"    value="<?php echo $bloob[0]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="bloob1"    value="<?php echo $bloob[1]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="bloob2"    value="<?php echo $bloob[2]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
          <tr>
            <th scope="row">After 3 hrs.</th>
            <td>
              <input name="bloob3"    value="<?php echo $bloob[3]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob4"    value="<?php echo $bloob[4]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="bloob5"    value="<?php echo $bloob[5]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="bloob6"    value="<?php echo $bloob[6]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="bloob7"    value="<?php echo $bloob[7]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="bloob8"    value="<?php echo $bloob[8]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="bloob9"    value="<?php echo $bloob[9]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="bloob10"    value="<?php echo $bloob[10]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="bloob11"    value="<?php echo $bloob[11]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
          <tr>
            <th scope="row">After 4 hrs.</th>
            <td>
              <input name="bloob12"    value="<?php echo $bloob[12]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob13"    value="<?php echo $bloob[13]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="bloob14"    value="<?php echo $bloob[14]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="bloob15"    value="<?php echo $bloob[15]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="bloob16"    value="<?php echo $bloob[16]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="bloob17"    value="<?php echo $bloob[17]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="bloob18"    value="<?php echo $bloob[18]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="bloob19"    value="<?php echo $bloob[19]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="bloob20"    value="<?php echo $bloob[20]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
          <tr>
            <th scope="row">
              <input
              name="bloob21"    value="<?php echo $bloob[21]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Monitoring"
              />
            </th>
            <td>
              <input name="bloob22"    value="<?php echo $bloob[22]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob23"    value="<?php echo $bloob[23]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="bloob24"    value="<?php echo $bloob[24]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="bloob25"    value="<?php echo $bloob[25]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="bloob26"    value="<?php echo $bloob[26]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="bloob27"    value="<?php echo $bloob[27]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="bloob28"    value="<?php echo $bloob[28]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="bloob29"    value="<?php echo $bloob[29]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="bloob30"    value="<?php echo $bloob[30]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
          <tr>
            <th scope="row">
              <input
              name="bloob31"    value="<?php echo $bloob[31]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Monitoring"
              />
            </th>
            <td>
              <input name="bloob32"    value="<?php echo $bloob[32]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob33"    value="<?php echo $bloob[33]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="bloob34"    value="<?php echo $bloob[34]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="bloob35"    value="<?php echo $bloob[35]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="bloob36"    value="<?php echo $bloob[36]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="bloob37"    value="<?php echo $bloob[37]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="bloob38"    value="<?php echo $bloob[38]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="bloob39"    value="<?php echo $bloob[39]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="bloob40"    value="<?php echo $bloob[40]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
          <tr>
            <th scope="row">After Completion</th>
            <td>
              <input name="bloob41"    value="<?php echo $bloob[41]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob42"    value="<?php echo $bloob[42]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
              name="bloob43"    value="<?php echo $bloob[43]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
              name="bloob44"    value="<?php echo $bloob[44]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
              name="bloob49"    value="<?php echo $bloob[49]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
              name="bloob45"    value="<?php echo $bloob[45]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
              name="bloob46"    value="<?php echo $bloob[46]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
              name="bloob47"    value="<?php echo $bloob[47]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
              name="bloob48"    value="<?php echo $bloob[48]; ?>"
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
          </tr>
        </tbody>
      </table>
      <div class="row">
        <h6 class="fl text-primary">
          <strong
            >Any nursing / medical interventions undertaken due to transfusion
            :</strong
          >
        </h6>
        <textarea
        name="nur0"
          type="text"
          style="height: 100px"
          class="form-control"
          id="treatment"
          placeholder=""
        ><?php echo $nur[0]; ?></textarea>
      </div>
      <div class="row mt-4">
        <div class="col-3">
          <h6 class="fl text-primary">
            <strong>Blood transfusion reaction:</strong>
          </h6>
          <input type="radio" name="trans" value="Yes" <?php if ($blood['trans'] == 'Yes') {
            echo "checked";
          } ?>/>
          <label style="margin-left: 0.5rem; margin-right: 1rem">Yes</label>
          <input type="radio" name="trans" value="No" <?php if ($blood['trans'] == 'No') {
            echo "checked";
          } ?>/><label style="margin-left: 0.5rem">No</label>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Name</th>
              <th scope="col">Sign</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">RMO</th>
              <td>
                <input
                  
                  type="text"
                  class="form-control"
                  id="age"
                  placeholder="Name"
                  name="nur1"    value="<?php echo $nur[1]; ?>"
                />
              </td>
              <td>
                <input
                name="nur2"    value="<?php echo $nur[2]; ?>"
                  type="text"
                  class="form-control"
                  id="age"
                  placeholder="Sign"

                />
              </td>
            </tr>
            <tr>
              <th scope="row">Nursing In-Charge</th>
              <td>
                <input
                name="nur3"    value="<?php echo $nur[3]; ?>"
                  type="text"
                  class="form-control"
                  id="age"
                  placeholder="Name"
                />
              </td>
              <td>
                <input
                name="nur4"    value="<?php echo $nur[4]; ?>"
                  type="text"
                  class="form-control"
                  id="age"
                  placeholder="Sign"
                />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row">
        <h6 class="text-danger">
          <strong
            >Note: Follow transfusion guidelines on blood bag label</strong
          >
        </h6>
        <h6 class="text-danger">
          Any reaction should be immediately informed to RMO & Quality dept.
        </h6>
        
      </div>
      <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
    </form>
    </div>
  </body>
</html>
