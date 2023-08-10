<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

if (isset($_POST['submit'])) {

  $sur = $_POST['sur'];
  $ass = $_POST['ass'];
  $nurse = $_POST['nurse'];
  $hca = $_POST['hca'];
  $visit = $_POST['visit'];
  $date = $_POST['date'];
  $s_time = $_POST['s_time'];
  $e_time = $_POST['e_time'];
  $proc = $_POST['proc'];
  $ana = $_POST['ana'];
  $com = $_POST['com'];
  $refer = $_POST['refer'];
  $eye = $_POST['eye'];
  $ot = $_POST['ot'];
  $case_no = $_POST['case_no'];
  $emr = $_POST['emr'];
  $asd = $_POST['asd'];
  $pos = $_POST['pos'];
  $inc = $_POST['inc'];
  $record = $_POST['record'];


  $update2 = "UPDATE `ocu` SET 
    `sur` = '$sur',
  `ass` = '$ass',
  `nurse` = '$nurse',
  `hca` = '$hca',
  `visit` = '$visit',
  `date`= '$date',
  `s_time`= '$s_time',
  `e_time`= '$e_time',
  `proc` = '$proc',
  `ana` = '$ana',
  `com` = '$com',
  `refer` = '$refer',
  `eye` = '$eye',
  `ot` = '$ot',
  `case_no` = '$case_no',
  `emr` = '$emr',
  `asd`= '$asd',
  `pos`= '$pos',
  `inc`= '$inc',
  `record`= '$record'
   WHERE `id` = '$id'";
  $conn->query($update2);

  echo "<div class='alert alert-success'> Updated Successfully</div>";

  $sql4 = "SELECT * FROM ocu WHERE id = '$id';";
  $data4 = $conn->query($sql4);
  $res4 = $data4->fetch_assoc();


} else {
  $sql4 = "SELECT * FROM ocu WHERE id = '$id';";
  $data4 = $conn->query($sql4);
  $res4 = $data4->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
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
    <div class="col p-4 m-4 shadow-lg rounded">
    <a href="OT.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
      <button onclick="location.reload();" class="btn btn-success">Refresh</button>
      <form action="" method="post">
        <div class="row">
          <div class="col-md-3">
            <label class="form-label">Patient's Name</label>
            <input name="regno" value="<?php echo $res['name']; ?>" type="text" class="form-control" id="reg" readonly>
          </div>
          <div class="col-md-3">
            <label class="form-label">Surgeon</label>
            <input name="sur" value="<?php echo $res4['sur']; ?>" type="text" class="form-control" id="reg">
          </div>
          <div class="col-md-3">
            <label class="form-label">Assistant</label>
            <input name="ass" value="<?php echo $res4['ass']; ?>" type="text" class="form-control" id="reg">
          </div>
          <div class="col-md-3">
            <label class="form-label">Nurse</label>
            <input name="nurse" value="<?php echo $res4['nurse']; ?>" type="text" class="form-control" id="reg">
          </div>
        </div>
          <div class="col-md-3">
            <label class="form-label">HCA</label>
            <input name="hca" value="<?php echo $res4['hca']; ?>" type="text" class="form-control" id="name">
          </div>
          <div class="col-md-2">
            <label class="form-label">Visitors :</label>
            <input name="visit" value="<?php echo $res4['visit']; ?>" type="text" class="form-control" id="name">
          </div>
          <div class="col-md-2">
            <label class="form-label">Date :</label>
            <input name="date" value="<?php echo $res4['date']; ?>" type="date" class="form-control" id="DOA">
          </div>
          <div class="col-md-2">
            <label class="form-label" for="time_ad">Surgery Start TIme :</label>
            <input name="s_time" value="<?php echo $res4['s_time']; ?>" type="time" class="form-control" id="time_ad"
              placeholder="Time of Admission" value="">
          </div>
          <div class="col-md-3">
            <label class="form-label" for="time_ad">Surgery Ending TIme :</label>
            <input name="e_time" value="<?php echo $res4['e_time']; ?>" type="time" class="form-control" id="time_ad"
              placeholder="Time of Admission" value="">
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label">PROCEDURE</label>
                <textarea name="proc" value="<?php echo $res4['proc']; ?>" type="text" class="form-control live-fetch"
                  id="inputAddress" data-column="proc" data-table="ocu"><?php echo $res4['proc']; ?></textarea>
                  <div class="dropdown-container"></div>
              </div>
              <div class="col-md-3">
                <label class="form-label">Anaesthesia</label>
                <input name="ana" value="<?php echo $res4['ana']; ?>" type="tel" class="form-control" id="inputAddress">
              </div>
              <div class="col-md-3">
                <label class="form-label">Complication:</label>
                <input name="com" value="<?php echo $res4['com']; ?>" type="text" class="form-control" id="inputAddress"
                  placeholder="Consultant Name">
              </div>
              <div class="col-md-3">
                <label class="form-label">Referred By:</label>
                <input name="refer" value="<?php echo $res4['refer']; ?>" type="text" class="form-control"
                  id="inputAddress" placeholder="Referred by">
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-md-2">
                <label class="form-label">Eye :</label>
                <input name="eye" value="<?php echo $res4['eye']; ?>" type="text" class="form-control" id="weight">

              </div>
              <div class="col-md-2">
                <label class="form-label">O.T. No :</label>
                <input name="ot" value="<?php echo $res4['ot']; ?>" type="text" class="form-control" id="weight">

              </div>
              <div class="col-md-2">
                <label class="form-label">Case No :</label>
                <input name="case_no" value="<?php echo $res4['case_no']; ?>" type="text" class="form-control"
                  id="weight">
              </div>
              <div class="col-md-2">
                <label class="form-label">E.M.R. No :</label>
                <input name="emr" value="<?php echo $res4['emr']; ?>" type="text" class="form-control" id="weight">
              </div>
              <div class="col-md-2">
                <label class="form-label">Position :</label>
                <input name="pos" value="<?php echo $res4['pos']; ?>" type="text" class="form-control" id="weight">
              </div>
              <div class="col-md-2">
                <label class="form-label">Incigen :</label>
                <input name="inc" value="<?php echo $res4['inc']; ?>" type="text" class="form-control" id="weight">
              </div>

            </div>
          </div>
          <div class="col-lg-4">
                <label class="form-label">ASD/Drape :</label>
                <textarea name="asd" value="<?php echo $res4['asd']; ?>" type="text" style="height: 100px;"
                  class="form-control live-fetch" id="treatment"
                  data-column="asd"  data-table="ocu"><?php echo $res4['asd']; ?></textarea>
                <div class="dropdown-container"></div>
              </div>
          <div class="row">
            <div>
            <h4> Post Operative Record</h1>
              <textarea name="record" class="live-fetch form-control" data-column="record"  data-table="ocu"><?php echo $res4['record']; ?></textarea>
              <div class="dropdown-container"></div>
              <div>
          </div>
          <div class="row">
            <div class="col mt-2">
              <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit"
                id="submit">Submit</button>
                
               <a href="ocu_print.php?id=<?php echo $id; ?>" class="btn btn-outline-primary ml-auto" id="print">Print</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
    var valuesRetrieved = <?php echo isset($res4['date']) ? 'true' : 'false'; ?>;
    updateDateTimeInputs();
    function formatTime(date) {
      var hours = date.getHours().toString().padStart(2, '0');
      var minutes = date.getMinutes().toString().padStart(2, '0');
      return hours + ':' + minutes;
    }

    function updateDateTimeInputs() {
      if (!valuesRetrieved) {
        var currentDate = new Date().toISOString().slice(0, 10);  // Get current date in YYYY-MM-DD format
        var currentTime = formatTime(new Date());  // Get current time in HH:mm format

        document.getElementById("DOA").value = currentDate;  // Set the value of date input
        document.getElementById("time_ad").value = currentTime;  // Set the value of time inputs
      }
    }

    setInterval(updateDateTimeInputs, 60000);


  </script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
    $('#submit').click(function () {
      var examination_finding = $('#examination_finding').val();
      if (examination_finding == 'new') {
        $.ajax({
          type: 'POST',
          url: 'suggestion.php',
          data: {
            examination_finding_text: $('#examination_finding_text').val()
          }
        });
      }
    });
    $('#submit').click(function () {
      var examination_finding = $('#treatment').val();
      if (examination_finding == 'new') {
        $.ajax({
          type: 'POST',
          url: 'suggestion.php',
          data: {
            treatment: $('#treatment_value').val()
          }
        });
      }
    });
    $('#examination_finding').change(function () {
      var examination_finding = $('#examination_finding').val();
      if (examination_finding != 'new') {
        document.getElementById("examination_finding_text").value = examination_finding;
      }
    });
    $(document).ready(function () {
      var other_com = $('#other_com').val();
      if (other_com == 'custom') {
        $('#other_com_value').show();
        $("#other_com").removeAttr("name");
      }

    });
    $('#other_com').change(function () {
      var other_com = $('#other_com').val();
      if (other_com == 'custom') {
        $('#other_com_value').show();
        $("#other_com").removeAttr("name");
      }
    });
  </script>
  <script src="../fetch_dropdown_script.js"></script>
</body>

</html>