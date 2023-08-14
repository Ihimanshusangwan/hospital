<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
error_reporting(0);
$x=0;
if (isset($_POST['submit'])) {
  $dr = $_POST['dr0']. '&' . $_POST['dr1']. '&' . 
  $_POST['dr2']. '&' . $_POST['dr3']. 
  '&' . $_POST['dr4']. '&' . $_POST['dr5'] 
  .'&'.$_POST['dr6'] .'&'.$_POST['dr7']
  .'&'.$_POST['dr8'] ;
  
   $nur = $_POST['nur0']. '&' . $_POST['nur1']. '&' . 
  $_POST['nur2']. '&' . $_POST['nur3']. 
  '&' . $_POST['nur4'] ;

  $cros =$_POST['cros'];
  $trans =$_POST['trans'];
  $blooa = $_POST['blooa0']. '&' . $_POST['blooa1']
  . '&' . $_POST['blooa2']. '&' .
  $_POST['blooa3']. '&' . $_POST['blooa4']. '&' . 
  $_POST['blooa5'] .'&'.$_POST['blooa6'] 
  .'&'.$_POST['blooa7'].'&'.$_POST['blooa8'].'&'.$_POST['blooa9']
  . '&' .$_POST['blooa10']. '&' . $_POST['blooa11']
  . '&' . $_POST['blooa12']. '&' .
  $_POST['blooa13']. '&' . $_POST['blooa14']. '&' . 
  $_POST['blooa15'].'&'.$_POST['blooa16'] 
  .'&'.$_POST['blooa17'].'&'.$_POST['blooa18'].'&'.$_POST['blooa19']
  . '&' .$_POST['blooa20']. '&' . $_POST['blooa21']
  . '&' . $_POST['blooa22']. '&' .
  $_POST['blooa23']. '&' . $_POST['blooa24']. '&' . 
  $_POST['blooa25'].'&'.$_POST['blooa26'] 
  .'&'.$_POST['blooa27'].'&'.$_POST['blooa28'].'&'.$_POST['blooa29']
  . '&' .$_POST['blooa30']. '&' . $_POST['blooa31']
  . '&' . $_POST['blooa32']. '&' .
  $_POST['blooa33']. '&' . $_POST['blooa34']. '&' . 
  $_POST['blooa35'].'&'.$_POST['blooa36'] 
  .'&'.$_POST['blooa37'].'&'.$_POST['blooa38'].'&'.$_POST['blooa39']
  . '&' .$_POST['blooa40']. '&' . $_POST['blooa41']
  . '&' . $_POST['blooa42']. '&' .
  $_POST['blooa43']. '&' . $_POST['blooa44']. '&' . 
  $_POST['blooa45'].'&'.$_POST['blooa46'] 
  .'&'.$_POST['blooa47'].'&'.$_POST['blooa48'].'&'.$_POST['blooa49']
  . '&' .$_POST['blooa50'];

  $bloob = $_POST['bloob0']. '&' . $_POST['bloob1']
  . '&' . $_POST['bloob2']. '&' .
  $_POST['bloob3']. '&' . $_POST['bloob4']. '&' . 
  $_POST['bloob5'] .'&'.$_POST['bloob6'] 
  .'&'.$_POST['bloob7'].'&'.$_POST['bloob8'].'&'.$_POST['bloob9']
  . '&' .$_POST['bloob10']. '&' . $_POST['bloob11']
  . '&' . $_POST['bloob12']. '&' .
  $_POST['bloob13']. '&' . $_POST['bloob14']. '&' . 
  $_POST['bloob15'].'&'.$_POST['bloob16'] 
  .'&'.$_POST['bloob17'].'&'.$_POST['bloob18'].'&'.$_POST['bloob19']
  . '&' .$_POST['bloob20']. '&' . $_POST['bloob21']
  . '&' . $_POST['bloob22']. '&' .
  $_POST['bloob23']. '&' . $_POST['bloob24']. '&' . 
  $_POST['bloob25'].'&'.$_POST['bloob26'] 
  .'&'.$_POST['bloob27'].'&'.$_POST['bloob28'].'&'.$_POST['bloob29']
  . '&' .$_POST['bloob30']. '&' . $_POST['bloob31']
  . '&' . $_POST['bloob32']. '&' .
  $_POST['bloob33']. '&' . $_POST['bloob34']. '&' . 
  $_POST['bloob35'].'&'.$_POST['bloob36'] 
  .'&'.$_POST['bloob37'].'&'.$_POST['bloob38'].'&'.$_POST['bloob39']
  . '&' .$_POST['bloob40']. '&' . $_POST['bloob41']
  . '&' . $_POST['bloob42']. '&' .
  $_POST['bloob43']. '&' . $_POST['bloob44']. '&' . 
  $_POST['bloob45'].'&'.$_POST['bloob46'] 
  .'&'.$_POST['bloob47'].'&'.$_POST['bloob48'].'&'.$_POST['bloob49'];

  $update="UPDATE `blood` SET `dr` = '$dr',`nur` = '$nur',`trans`='$trans',`cros`='$cros',`blooa`='$blooa',`bloob`='$bloob' WHERE `id` = '$id'";
  $conn->query($update);
  $x=1;


}
$sql3 = "SELECT * FROM `blood`  WHERE id = '$id';";
$data3 = $conn->query($sql3); 
=======
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
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
$blood = $data3->fetch_assoc();
$dr = explode("&", $blood['dr']);
$nur = explode("&", $blood['nur']);
$blooa = explode("&", $blood['blooa']);
$bloob = explode("&", $blood['bloob']);
<<<<<<< HEAD
=======
$newValue = json_decode($blood['new'],true);
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24

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
<<<<<<< HEAD
      <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
=======
      <?php if ($x == 1) {
        echo "<div class='alert alert-success'> Updated Successfully</div>";
      } ?>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
      <a class="btn btn-primary m-2" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
      <a href="ortho_blood_transfusion_print.php?id=<?php echo $id; ?>" class=" btn btn-success m-2"
            id="dashboard">Print</a>

      <div class="row" >
      <div class="col-md-3" >
<<<<<<< HEAD
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
=======
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
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-3">
<<<<<<< HEAD
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
=======
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
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
        </div>
      </div>
      

      <div class="row">
        <div class="col-md-3">
<<<<<<< HEAD
          <label class="form-label">Consultant: <?php echo $res['consultant'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Diagnosis: <?php echo $res1['diagnosis'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Bed Number: <?php echo $res2['bed/room'];?></label>
=======
          <label class="form-label">Consultant: <?php echo $res['consultant']; ?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Diagnosis: <?php echo $res1['diagnosis']; ?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Bed Number: <?php echo $res2['bed/room']; ?></label>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
          <input  type="text" class="form-control" id="" name="dr0"    value="<?php  echo $dr[0]; ?>"/>
        </div>
        <div class="col-3"> 
          <label class="form-label text-primary">Bloodgroup of Patient</label>
          <input  type="text" class="form-control" id="" name="dr1"    value="<?php  echo $dr[1]; ?>"/>
        </div>
        <div class="col-3">
          <label class="form-label text-primary">Cross matched</label><br />
          <input type="radio" name="cros" value="Yes" <?php if($blood['cros']=='Yes'){echo "checked";}?>/>
          <label style="margin-left: 0.5rem; margin-right: 1rem">Yes</label>
          <input type="radio" name="cros" value="No" <?php if($blood['cros']=='No'){echo "checked";}?>/><label style="margin-left: 0.5rem">No</label>
        </div>
        <div class="col-3">
          <label class="form-label text-danger">(If No:reason)</label>
          <input  type="text" class="form-control" id="" name="dr2"    value="<?php  echo $dr[2]; ?>"/>
        </div>
      </div>

=======
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
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
      <div class="row">
        <h6 class="mt-4 fl">Type:</h6>
        <table class="table table-bordered">
          <thead>
            <tr>
<<<<<<< HEAD
              <th scope="col"></th>
              <th scope="col">WB</th>
              <th scope="col"></th>
              <th scope="col">PRP</th>
=======
              <td >WB</td>
              <td > 
<input type="text" class="form-control" name="new_1" value="<?php echo $newValue['1']; ?>"> </td>
              <td >PRP</td>
              <td >
<input type="text" class="form-control" name="new_2" value="<?php echo $newValue['2']; ?>"></td>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
            </tr>
          </thead>
          <tbody>
            <tr>
<<<<<<< HEAD
              <th scope="row"></th>
              <td>PRC</td>
              <td></td>
              <td>Crypt</td>
            </tr>
            <tr>
              <th scope="row"></th>
              <td>FFP</td>
              <td></td>
              <td>Plasma</td>
            </tr>
            <tr>
              <th scope="row"></th>
              <td>PLT</td>
              <td></td>
              <td>Other</td>
=======
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
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
            </tr>
          </tbody>
        </table>
      </div>

      <div class="row">
        <div class="col-3">
          <label class="form-label text-primary">Fluid Volume Infused</label>
<<<<<<< HEAD
          <input  type="text" class="form-control" id="" name="dr3"    value="<?php  echo $dr[3]; ?>"/>
=======
          <input  type="text" class="form-control" id="" name="dr3"    value="<?php echo $dr[3]; ?>"/>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
        </div>
        <div class="col-5">
          <label class="form-label text-primary"
            >Blood bag details checked & B.T. Started by Dr :</label
          >
<<<<<<< HEAD
          <input  type="text" class="form-control" id="" name="dr4"    value="<?php  echo $dr[4]; ?>"/>
=======
          <input  type="text" class="form-control" id="" name="dr4"    value="<?php echo $dr[4]; ?>"/>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              <input  type="date" class="form-control" id="age" name="dr5"    value="<?php  echo $dr[5]; ?>"/>
            </td>
            <td>
              <input  type="time" class="form-control" id="age" name="dr6"    value="<?php  echo $dr[6]; ?>"/>
=======
              <input  type="date" class="form-control" id="age" name="dr5"    value="<?php echo $dr[5]; ?>"/>
            </td>
            <td>
              <input  type="time" class="form-control" id="age" name="dr6"    value="<?php echo $dr[6]; ?>"/>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
            </td>
          </tr>
          <tr>
            <th scope="row">Completed At</th>
            <td>
<<<<<<< HEAD
              <input  type="date" class="form-control" id="age" name="dr7"    value="<?php  echo $dr[7]; ?>"/>
            </td>
            <td>
              <input  type="time" class="form-control" id="age" name="dr8"    value="<?php  echo $dr[8]; ?>"/>
=======
              <input  type="date" class="form-control" id="age" name="dr7"    value="<?php echo $dr[7]; ?>"/>
            </td>
            <td>
              <input  type="time" class="form-control" id="age" name="dr8"    value="<?php echo $dr[8]; ?>"/>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              <input name="blooa8"    value="<?php  echo $blooa[8]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa0"    value="<?php  echo $blooa[0]; ?>"
=======
              <input name="blooa8"    value="<?php echo $blooa[8]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa0"    value="<?php echo $blooa[0]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa1"    value="<?php  echo $blooa[1]; ?>"
=======
              name="blooa1"    value="<?php echo $blooa[1]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa2"    value="<?php  echo $blooa[2]; ?>"
=======
              name="blooa2"    value="<?php echo $blooa[2]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa3"    value="<?php  echo $blooa[3]; ?>"
=======
              name="blooa3"    value="<?php echo $blooa[3]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa4"    value="<?php  echo $blooa[4]; ?>"
=======
              name="blooa4"    value="<?php echo $blooa[4]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa5"    value="<?php  echo $blooa[5]; ?>"
=======
              name="blooa5"    value="<?php echo $blooa[5]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa6"    value="<?php  echo $blooa[6]; ?>"
=======
              name="blooa6"    value="<?php echo $blooa[6]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa7"    value="<?php  echo $blooa[7]; ?>"
=======
              name="blooa7"    value="<?php echo $blooa[7]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              <input name="blooa9"    value="<?php  echo $blooa[9]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa10"    value="<?php  echo $blooa[10]; ?>"
=======
              <input name="blooa9"    value="<?php echo $blooa[9]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa10"    value="<?php echo $blooa[10]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa11"    value="<?php  echo $blooa[11]; ?>"
=======
              name="blooa11"    value="<?php echo $blooa[11]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa12"    value="<?php  echo $blooa[12]; ?>"
=======
              name="blooa12"    value="<?php echo $blooa[12]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa13"    value="<?php  echo $blooa[13]; ?>"
=======
              name="blooa13"    value="<?php echo $blooa[13]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa14"    value="<?php  echo $blooa[14]; ?>"
=======
              name="blooa14"    value="<?php echo $blooa[14]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa15"    value="<?php  echo $blooa[15]; ?>"
=======
              name="blooa15"    value="<?php echo $blooa[15]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa16"    value="<?php  echo $blooa[16]; ?>"
=======
              name="blooa16"    value="<?php echo $blooa[16]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa17"    value="<?php  echo $blooa[17]; ?>"
=======
              name="blooa17"    value="<?php echo $blooa[17]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              <input name="blooa18"    value="<?php  echo $blooa[18]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa19"    value="<?php  echo $blooa[19]; ?>"
=======
              <input name="blooa18"    value="<?php echo $blooa[18]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa19"    value="<?php echo $blooa[19]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa20"    value="<?php  echo $blooa[20]; ?>"
=======
              name="blooa20"    value="<?php echo $blooa[20]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa21"    value="<?php  echo $blooa[21]; ?>"
=======
              name="blooa21"    value="<?php echo $blooa[21]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa22"    value="<?php  echo $blooa[22]; ?>"
=======
              name="blooa22"    value="<?php echo $blooa[22]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa23"    value="<?php  echo $blooa[23]; ?>"
=======
              name="blooa23"    value="<?php echo $blooa[23]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa24"    value="<?php  echo $blooa[24]; ?>"
=======
              name="blooa24"    value="<?php echo $blooa[24]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa25"    value="<?php  echo $blooa[25]; ?>"
=======
              name="blooa25"    value="<?php echo $blooa[25]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa26"    value="<?php  echo $blooa[26]; ?>"
=======
              name="blooa26"    value="<?php echo $blooa[26]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              <input name="blooa27"    value="<?php  echo $blooa[27]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa28"    value="<?php  echo $blooa[28]; ?>"
=======
              <input name="blooa27"    value="<?php echo $blooa[27]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa28"    value="<?php echo $blooa[28]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa29"    value="<?php  echo $blooa[29]; ?>"
=======
              name="blooa29"    value="<?php echo $blooa[29]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa30"    value="<?php  echo $blooa[30]; ?>"
=======
              name="blooa30"    value="<?php echo $blooa[30]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa31"    value="<?php  echo $blooa[31]; ?>"
=======
              name="blooa31"    value="<?php echo $blooa[31]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa32"    value="<?php  echo $blooa[32]; ?>"
=======
              name="blooa32"    value="<?php echo $blooa[32]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa33"    value="<?php  echo $blooa[33]; ?>"
=======
              name="blooa33"    value="<?php echo $blooa[33]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa34"    value="<?php  echo $blooa[34]; ?>"
=======
              name="blooa34"    value="<?php echo $blooa[34]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa35"    value="<?php  echo $blooa[35]; ?>"
=======
              name="blooa35"    value="<?php echo $blooa[35]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              <input name="blooa36"    value="<?php  echo $blooa[36]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa37"    value="<?php  echo $blooa[37]; ?>"
=======
              <input name="blooa36"    value="<?php echo $blooa[36]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa37"    value="<?php echo $blooa[37]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa38"    value="<?php  echo $blooa[38]; ?>"
=======
              name="blooa38"    value="<?php echo $blooa[38]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa39"    value="<?php  echo $blooa[39]; ?>"
=======
              name="blooa39"    value="<?php echo $blooa[39]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa40"    value="<?php  echo $blooa[40]; ?>"
=======
              name="blooa40"    value="<?php echo $blooa[40]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa41"    value="<?php  echo $blooa[41]; ?>"
=======
              name="blooa41"    value="<?php echo $blooa[41]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa42"    value="<?php  echo $blooa[42]; ?>"
=======
              name="blooa42"    value="<?php echo $blooa[42]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa43"    value="<?php  echo $blooa[43]; ?>"
=======
              name="blooa43"    value="<?php echo $blooa[43]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa44"    value="<?php  echo $blooa[44]; ?>"
=======
              name="blooa44"    value="<?php echo $blooa[44]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              <input  name="blooa45"    value="<?php  echo $blooa[45]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa46"    value="<?php  echo $blooa[46]; ?>"
=======
              <input  name="blooa45"    value="<?php echo $blooa[45]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="blooa46"    value="<?php echo $blooa[46]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa47"    value="<?php  echo $blooa[47]; ?>"
=======
              name="blooa47"    value="<?php echo $blooa[47]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa48"    value="<?php  echo $blooa[48]; ?>"
=======
              name="blooa48"    value="<?php echo $blooa[48]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa49"    value="<?php  echo $blooa[49]; ?>"
=======
              name="blooa49"    value="<?php echo $blooa[49]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="blooa50"    value="<?php  echo $blooa[50]; ?>"
=======
              name="blooa50"    value="<?php echo $blooa[50]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob0"    value="<?php  echo $bloob[0]; ?>"
=======
              name="bloob0"    value="<?php echo $bloob[0]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob1"    value="<?php  echo $bloob[1]; ?>"
=======
              name="bloob1"    value="<?php echo $bloob[1]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob2"    value="<?php  echo $bloob[2]; ?>"
=======
              name="bloob2"    value="<?php echo $bloob[2]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              <input name="bloob3"    value="<?php  echo $bloob[3]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob4"    value="<?php  echo $bloob[4]; ?>"
=======
              <input name="bloob3"    value="<?php echo $bloob[3]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob4"    value="<?php echo $bloob[4]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob5"    value="<?php  echo $bloob[5]; ?>"
=======
              name="bloob5"    value="<?php echo $bloob[5]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob6"    value="<?php  echo $bloob[6]; ?>"
=======
              name="bloob6"    value="<?php echo $bloob[6]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob7"    value="<?php  echo $bloob[7]; ?>"
=======
              name="bloob7"    value="<?php echo $bloob[7]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob8"    value="<?php  echo $bloob[8]; ?>"
=======
              name="bloob8"    value="<?php echo $bloob[8]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob9"    value="<?php  echo $bloob[9]; ?>"
=======
              name="bloob9"    value="<?php echo $bloob[9]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob10"    value="<?php  echo $bloob[10]; ?>"
=======
              name="bloob10"    value="<?php echo $bloob[10]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob11"    value="<?php  echo $bloob[11]; ?>"
=======
              name="bloob11"    value="<?php echo $bloob[11]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              <input name="bloob12"    value="<?php  echo $bloob[12]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob13"    value="<?php  echo $bloob[13]; ?>"
=======
              <input name="bloob12"    value="<?php echo $bloob[12]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob13"    value="<?php echo $bloob[13]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob14"    value="<?php  echo $bloob[14]; ?>"
=======
              name="bloob14"    value="<?php echo $bloob[14]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob15"    value="<?php  echo $bloob[15]; ?>"
=======
              name="bloob15"    value="<?php echo $bloob[15]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob16"    value="<?php  echo $bloob[16]; ?>"
=======
              name="bloob16"    value="<?php echo $bloob[16]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob17"    value="<?php  echo $bloob[17]; ?>"
=======
              name="bloob17"    value="<?php echo $bloob[17]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob18"    value="<?php  echo $bloob[18]; ?>"
=======
              name="bloob18"    value="<?php echo $bloob[18]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob19"    value="<?php  echo $bloob[19]; ?>"
=======
              name="bloob19"    value="<?php echo $bloob[19]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob20"    value="<?php  echo $bloob[20]; ?>"
=======
              name="bloob20"    value="<?php echo $bloob[20]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              name="bloob21"    value="<?php  echo $bloob[21]; ?>"
=======
              name="bloob21"    value="<?php echo $bloob[21]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Monitoring"
              />
            </th>
            <td>
<<<<<<< HEAD
              <input name="bloob22"    value="<?php  echo $bloob[22]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob23"    value="<?php  echo $bloob[23]; ?>"
=======
              <input name="bloob22"    value="<?php echo $bloob[22]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob23"    value="<?php echo $bloob[23]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob24"    value="<?php  echo $bloob[24]; ?>"
=======
              name="bloob24"    value="<?php echo $bloob[24]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob25"    value="<?php  echo $bloob[25]; ?>"
=======
              name="bloob25"    value="<?php echo $bloob[25]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob26"    value="<?php  echo $bloob[26]; ?>"
=======
              name="bloob26"    value="<?php echo $bloob[26]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob27"    value="<?php  echo $bloob[27]; ?>"
=======
              name="bloob27"    value="<?php echo $bloob[27]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob28"    value="<?php  echo $bloob[28]; ?>"
=======
              name="bloob28"    value="<?php echo $bloob[28]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob29"    value="<?php  echo $bloob[29]; ?>"
=======
              name="bloob29"    value="<?php echo $bloob[29]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob30"    value="<?php  echo $bloob[30]; ?>"
=======
              name="bloob30"    value="<?php echo $bloob[30]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              name="bloob31"    value="<?php  echo $bloob[31]; ?>"
=======
              name="bloob31"    value="<?php echo $bloob[31]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Monitoring"
              />
            </th>
            <td>
<<<<<<< HEAD
              <input name="bloob32"    value="<?php  echo $bloob[32]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob33"    value="<?php  echo $bloob[33]; ?>"
=======
              <input name="bloob32"    value="<?php echo $bloob[32]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob33"    value="<?php echo $bloob[33]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob34"    value="<?php  echo $bloob[34]; ?>"
=======
              name="bloob34"    value="<?php echo $bloob[34]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob35"    value="<?php  echo $bloob[35]; ?>"
=======
              name="bloob35"    value="<?php echo $bloob[35]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob36"    value="<?php  echo $bloob[36]; ?>"
=======
              name="bloob36"    value="<?php echo $bloob[36]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob37"    value="<?php  echo $bloob[37]; ?>"
=======
              name="bloob37"    value="<?php echo $bloob[37]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob38"    value="<?php  echo $bloob[38]; ?>"
=======
              name="bloob38"    value="<?php echo $bloob[38]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob39"    value="<?php  echo $bloob[39]; ?>"
=======
              name="bloob39"    value="<?php echo $bloob[39]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob40"    value="<?php  echo $bloob[40]; ?>"
=======
              name="bloob40"    value="<?php echo $bloob[40]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
              <input name="bloob41"    value="<?php  echo $bloob[41]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob42"    value="<?php  echo $bloob[42]; ?>"
=======
              <input name="bloob41"    value="<?php echo $bloob[41]; ?>" type="time" class="form-control" id="age" />
            </td>
            <td>
              <input
              name="bloob42"    value="<?php echo $bloob[42]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Temp"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob43"    value="<?php  echo $bloob[43]; ?>"
=======
              name="bloob43"    value="<?php echo $bloob[43]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Pulse"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob44"    value="<?php  echo $bloob[44]; ?>"
=======
              name="bloob44"    value="<?php echo $bloob[44]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="R.R"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob49"    value="<?php  echo $bloob[49]; ?>"
=======
              name="bloob49"    value="<?php echo $bloob[49]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="B.P"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob45"    value="<?php  echo $bloob[45]; ?>"
=======
              name="bloob45"    value="<?php echo $bloob[45]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Urine Output"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob46"    value="<?php  echo $bloob[46]; ?>"
=======
              name="bloob46"    value="<?php echo $bloob[46]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Observations"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob47"    value="<?php  echo $bloob[47]; ?>"
=======
              name="bloob47"    value="<?php echo $bloob[47]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                type="text"
                class="form-control"
                id="age"
                placeholder="Remarks"
              />
            </td>
            <td>
              <input
<<<<<<< HEAD
              name="bloob48"    value="<?php  echo $bloob[48]; ?>"
=======
              name="bloob48"    value="<?php echo $bloob[48]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
        ><?php  echo $nur[0]; ?></textarea>
=======
        ><?php echo $nur[0]; ?></textarea>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
      </div>
      <div class="row mt-4">
        <div class="col-3">
          <h6 class="fl text-primary">
            <strong>Blood transfusion reaction:</strong>
          </h6>
<<<<<<< HEAD
          <input type="radio" name="trans" value="Yes" <?php if($blood['trans']=='Yes'){echo "checked";}?>/>
          <label style="margin-left: 0.5rem; margin-right: 1rem">Yes</label>
          <input type="radio" name="trans" value="No" <?php if($blood['trans']=='No'){echo "checked";}?>/><label style="margin-left: 0.5rem">No</label>
=======
          <input type="radio" name="trans" value="Yes" <?php if ($blood['trans'] == 'Yes') {
            echo "checked";
          } ?>/>
          <label style="margin-left: 0.5rem; margin-right: 1rem">Yes</label>
          <input type="radio" name="trans" value="No" <?php if ($blood['trans'] == 'No') {
            echo "checked";
          } ?>/><label style="margin-left: 0.5rem">No</label>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
                  name="nur1"    value="<?php  echo $nur[1]; ?>"
=======
                  name="nur1"    value="<?php echo $nur[1]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                />
              </td>
              <td>
                <input
<<<<<<< HEAD
                name="nur2"    value="<?php  echo $nur[2]; ?>"
=======
                name="nur2"    value="<?php echo $nur[2]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
<<<<<<< HEAD
                name="nur3"    value="<?php  echo $nur[3]; ?>"
=======
                name="nur3"    value="<?php echo $nur[3]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                  type="text"
                  class="form-control"
                  id="age"
                  placeholder="Name"
                />
              </td>
              <td>
                <input
<<<<<<< HEAD
                name="nur4"    value="<?php  echo $nur[4]; ?>"
=======
                name="nur4"    value="<?php echo $nur[4]; ?>"
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
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
