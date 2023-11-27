<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
error_reporting(0);
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
$sql = "select * from delivery_notes where id=$id";
$res = $conn->query($sql)->fetch_assoc();
$data = json_decode($res['data'], true);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <style type="text/css">
    .header {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: row;
    }

    .title {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    @media print {
      .noprint {
        visibility: hidden;
      }
    }
  </style>

</head>

<body class="m-2">

  <div id="button " class="noprint">
    <a href='deliveryNotes.php?id=<?php echo $id; ?>' class="btn btn-primary noprint">Dashboard</a>
    <a class="btn btn-primary  noprint" onclick="window.print()">Print</a>
  </div>
  <?php include_once("../header/images.php") ?>
  <h3 class="text-center text-dark my-3 ">Delivery Notes </h3>
  <?php include_once("../header/header.php") ?>
  <div class="row">
    <div class="col">
      <strong for="deliveryDate">Delivery Date:</strong>
      <?php echo $data[1]; ?>
    </div>
    <div class="col">
      <strong for="deliveryTime">Time:</strong>
      <?php echo $data[2]; ?>
    </div>
  </div>

  <div class="form-group">
    <strong>Type of Delivery:</strong>
    <div class="form-check">
      <input type="radio" <?php echo ($data['3'] == "Normal") ? "checked" : ""; ?> class="form-check-input"
        id="normalDelivery" name='3' value='Normal' <?php echo ($data['3'] == "Normal") ? "checked" : ""; ?>>
      <strong class="form-check-strong" for="normalDelivery">Normal</strong>
    </div>
    <div class="form-check">
      <input type="radio" <?php echo ($data['3'] == "Forceps") ? "checked" : ""; ?> class="form-check-input"
        id="forcepsDelivery" name='3' value='Forceps' <?php echo ($data['3'] == "Normal") ? "checked" : ""; ?>>
      <strong class="form-check-strong" for="forcepsDelivery">Forceps</strong>
    </div>
    <div class="form-check">
      <input type="radio" <?php echo ($data['3'] == "LSCS") ? "checked" : ""; ?> class="form-check-input"
        id="lscsDelivery" name='3' value='LSCS'>
      <strong class="form-check-strong" for="lscsDelivery">LSCS</strong>
    </div>
    <div class="form-group">
      <strong for="otherDelivery">Others (specify):</strong>
      <?php echo $data[4]; ?>
    </div>
  </div>

  <div class="form-group">
    <strong for="outcome">Outcome:</strong>
    <div class="form-check">
      <input type="checkbox" <?php echo ($data['5'] == "Live birth") ? "checked" : ""; ?> class="form-check-input"
        id="liveBirth" name="5" value="Live birth">
      <strong class="form-check-strong" for="liveBirth">Live birth</strong>
    </div>
    <div class="form-check">
      <input type="checkbox" <?php echo ($data['29'] == "Abortion") ? "checked" : ""; ?> class="form-check-input"
        id="abortion" name="29" value="Abortion">
      <strong class="form-check-strong" for="abortion">Abortion</strong>
    </div>
    <div class="form-check">
      <input type="checkbox" <?php echo ($data['30'] == "Fresh Still Birth") ? "checked" : ""; ?> class="form-check-input"
        id="freshStillBirth" name="30" value="Fresh Still Birth">
      <strong class="form-check-strong" for="freshStillBirth">Fresh Still Birth</strong>
    </div>
    <div class="form-check">
      <input type="checkbox" <?php echo ($data['31'] == "Macerated Still Birth") ? "checked" : ""; ?>
        class="form-check-input" id="maceratedStillBirth" name="31" value="Macerated Still Birth">
      <strong class="form-check-strong" for="maceratedStillBirth">Macerated Still Birth</strong>
    </div>
    <div class="form-check">
      <input type="checkbox" <?php echo ($data['32'] == "Single") ? "checked" : ""; ?> class="form-check-input"
        id="single" name="32" value="Single">
      <strong class="form-check-strong" for="single">Single</strong>
    </div>
    <div class="form-check">
      <input type="checkbox" <?php echo ($data['33'] == "Twin / Multiple") ? "checked" : ""; ?> class="form-check-input"
        id="twinMultiple" name="33" value="Twin / Multiple">
      <strong class="form-check-strong" for="twinMultiple">Twin / Multiple</strong>
    </div>
  </div>
  <div class="form-group">
    <strong for="episiotomy">Episiotomy:</strong>
    <div class="radio">
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['6'] == "No") ? "checked" : ""; ?> name="6" value="No"> No
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['6'] == "Yes") ? "checked" : ""; ?> name="6" value="Yes"> Yes
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['6'] == "Delayed Cord Clamping") ? "checked" : ""; ?> name="6"
          value="Delayed Cord Clamping"> Delayed Cord Clamping
      </strong>
    </div>
  </div>

  <div class="form-group">
    <strong for="amtsl">AMTSL Performed:</strong>
    <div class="radio">
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['7'] == "No") ? "checked" : ""; ?> name="7" value="No"> No
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['7'] == "Yes") ? "checked" : ""; ?> name="7" value="Yes"> Yes
      </strong>
    </div>
  </div>

  <div class="form-group">
    <strong for="uterotonic">Uterotonic administered:</strong>
    <div class="radio">
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['8'] == "Inj.Oxytocin") ? "checked" : ""; ?> name="8" value="Inj.Oxytocin">
        Inj.Oxytocin
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['8'] == "tab Misoprostol") ? "checked" : ""; ?> name="8"
          value="tab Misoprostol"> tab Misoprostol
      </strong>
    </div>
  </div>

  <div class="form-group">
    <strong for="cct">CCT:</strong>
    <div class="radio">
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['9'] == "Yes") ? "checked" : ""; ?> name="9" value="Yes"> Yes
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['9'] == "No") ? "checked" : ""; ?> name="9" value="No"> No
      </strong>
    </div>
  </div>

  <div class="form-group">
    <strong for="10">Uterine Massage:</strong>
    <div class="radio">
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['10'] == "Yes") ? "checked" : ""; ?> name="10" value="Yes"> Yes
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['10'] == "No") ? "checked" : ""; ?> name="10" value="No"> No
      </strong>
    </div>
  </div>

  <div class="form-group">
    <strong for="complications">Complications, if any:</strong>
    <div class="radio">
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['11'] == "PPH") ? "checked" : ""; ?> name="11" value="PPH"> PPH
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['11'] == "Sepsis") ? "checked" : ""; ?> name="11" value="Sepsis"> Sepsis
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['11'] == "PE/E") ? "checked" : ""; ?> name="11" value="PE/E"> PE/E
      </strong>
    </div>
    <div class="radio">
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['12'] == "Prolonged labor") ? "checked" : ""; ?> name="12"
          value="Prolonged labor"> Prolonged labor
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['12'] == "Obstructed labor") ? "checked" : ""; ?> name="12"
          value="Obstructed labor"> Obstructed labor
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['12'] == "Fetal distress") ? "checked" : ""; ?> name="12"
          value="Fetal distress"> Fetal distress
      </strong>
    </div>
    <div class="radio">
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['13'] == "Maternal death") ? "checked" : ""; ?> name="13"
          value="Maternal death"> Maternal death
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['13'] == "Others") ? "checked" : ""; ?> name="13" value="Others"> Others
        (Specify)
      </strong>
    </div>
  </div>

  <div class="form-group">
    <strong for="ppiucd">PPIUCD Inserted:</strong>
    <div class="radio">
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['14'] == "Yes") ? "checked" : ""; ?> name="14" value="Yes"> Yes
      </strong>
      <strong class="radio-inline">
        <input type="radio" <?php echo ($data['14'] == "No") ? "checked" : ""; ?> name="14" value="No"> No
      </strong>
    </div>

    <h3 class="text-center  ">Baby Notes</h3>
    <div class="form-group">
      <strong>Sex of the baby:</strong>
      <div class="radio">
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['15'] == "Male") ? "checked" : ""; ?> name="15" value="Male"> Male
        </strong>
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['15'] == "Female") ? "checked" : ""; ?> name="15" value="Female"> Female
        </strong>
      </div>
    </div>

    <div class="form-group">
      <strong>Skin-to-skin contact done:</strong>
      <div class="radio">
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['16'] == "Yes") ? "checked" : ""; ?> name="16" value="Yes"> Yes
        </strong>
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['16'] == "No") ? "checked" : ""; ?> name="16" value="No"> No
        </strong>
      </div>
    </div>

    <div class="form-group">
      <strong>Birth Weight:</strong>
      <?php echo $data[17]; ?>
      <span class="">in Kgs</span>
      <strong>Preterm:</strong>
      <div class="radio">
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['18'] == "Yes") ? "checked" : ""; ?> name="18" value="Yes"> Yes
        </strong>
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['18'] == "No") ? "checked" : ""; ?> name="18" value="No"> No
        </strong>
      </div>
    </div>

    <div class="form-group">
      <strong>Did the baby cry immediately after birth:</strong>
      <div class="radio">
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['19'] == "Yes") ? "checked" : ""; ?> name="19" value="Yes"> Yes
        </strong>
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['19'] == "No") ? "checked" : ""; ?> name="19" value="No"> No
        </strong>
      </div>
    </div>

    <div class="form-group">
      <strong>If yes, was it initiated in labor room:</strong>
      <div class="radio">
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['20'] == "Yes") ? "checked" : ""; ?> name="20" value="Yes"> Yes
        </strong>
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['20'] == "No") ? "checked" : ""; ?> name="20" value="No"> No
        </strong>
      </div>
    </div>

    <div class="form-group">
      <strong>Breastfeeding initiated:</strong>
      <div class="radio">
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['21'] == "Yes") ? "checked" : ""; ?> name="21" value="Yes"> Yes
        </strong>
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['21'] == "No") ? "checked" : ""; ?> name="21" value="No"> No
        </strong>
      </div>
    </div>

    <div class="form-group">
      <strong>Time of initiation:</strong>
      <?php echo $data[22]; ?>
    </div>

    <div class="form-group">
      <strong>Any congenital anomaly (Please specify):</strong>
      <?php echo $data[23]; ?>
    </div>

    <div class="form-group">
      <strong>Any other complication (Please specify):</strong>
      <?php echo $data[24]; ?>
    </div>

    <div class="form-group">
      <strong>Injection Vitamin K1 administered:</strong>
      <div class="radio">
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['25'] == "Yes") ? "checked" : ""; ?> name="25" value="Yes"> Yes
        </strong>
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['25'] == "No") ? "checked" : ""; ?> name="25" value="No"> No
        </strong>
      </div>
      <span class="text-muted">If yes, Dose
        <?php echo $data[26]; ?>
      </span>
    </div>

    <div class="form-group">
      <strong>Vaccination done:</strong>
      <div class="radio">
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['27'] == "BCG") ? "checked" : ""; ?> name="27" value="BCG"> BCG
        </strong>
        <strong class="radio-inline">
          <input type="radio" <?php echo ($data['27'] == "Hep B") ? "checked" : ""; ?> name="27" value="Hep B"> Hep B
        </strong>
      </div>
    </div>

    <div class="form-group">
      <strong>Temperature of baby:</strong>
      <div class="radio">
        <strong class="radio-inline">
          <?php echo $data[28]; ?>
        </strong>
      </div>
    </div>


    <h3 class="text-center m-4">Identification for Baby </h3>
    <div class="container row">
      <div class="col-6">
        <label for="leftThumb">Left Thumb:</label>

        <?php if (!empty($data['leftThumb'])): ?>
          <img id="leftThumbPreview" src="<?php echo $data['leftThumb']; ?>" alt="Left Thumb Preview"
            style="max-width: 100px; max-height: 100px;"><br>
        <?php endif; ?>
      </div>


      <!-- File input for Right Thumb with Preview -->
      <div class="col-6">
        <label for="rightThumb">Right Thumb:</label>

        <?php if (!empty($data['rightThumb'])): ?>
          <img id="rightThumbPreview" src="<?php echo $data['rightThumb']; ?>" alt="Right Thumb Preview"
            style="max-width: 100px; max-height: 100px;"><br>
        <?php endif; ?>

      </div>

      <!-- File input for Left Toe with Preview -->
      <div class="col-6">
        <label for="leftToe">Left Toe:</label>
        <?php if (!empty($data['leftToe'])): ?>
          <img id="leftToePreview" src="<?php echo $data['leftToe']; ?>" alt="Left Toe Preview"
            style="max-width: 100px; max-height: 100px;"><br>
        <?php endif; ?>
      </div>


      <!-- File input for Right Toe with Preview -->
      <div class="col-6">
        <label for="rightToe">Right Toe:</label>
        <?php if (!empty($data['rightToe'])): ?>
          <img id="rightToePreview" src="<?php echo $data['rightToe']; ?>" alt="Right Toe Preview"
            style="max-width: 100px; max-height: 100px;"><br>
        <?php endif; ?>
      </div>


      <p>धन्यवाद ...!</p>

      <script>
        window.print();
      </script>
</body>

</html>