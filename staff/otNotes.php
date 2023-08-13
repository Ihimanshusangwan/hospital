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
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="../dropdown_styles.css">
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
        input[type="date"]::placeholder ,
        input[type="tel"]::placeholder,
        input[type="number"]::placeholder{
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
            border-color: #C0C0C0;
            box-shadow: 5px 5px 5px 5px #C0C0C0;
            animation: gelatine 1s;
        }

        input[type="text"],
        input[type="time"],
        input[type="date"],
        input[type="tel"],
        input[type="number"] {
            outline: none !important;
            border-color: #C0C0C0;
            box-shadow: 5px 5px 5px 5px #C0C0C0;
            animation: gelatine 1s;
        }

        textarea[type="text"] {
            outline: none !important;
            border-color: #C0C0C0;
            box-shadow: 5px 5px 5px 5px #C0C0C0;
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
  <script>
    var items = 0;
    function addItem() {
      var today = new Date();
      var time =
        today.getHours() +
        ":" +
        today.getMinutes() +
        ":" +
        today.getSeconds();
      const date2 = new Date().toJSON().slice(0, 10);
      items++;
      var html = "<tr>";
      html += "<td class='col-md-2'><input type='time'  step='2' value=" + time + "  name='time_" + items + "'></td>";
      html += "<td class='col-md-2'><input type='date' value=" + date2 + " name='date_" + items + "'> </td>";
      html += "<td class='col-md-2'><input type='text' name='temp_" + items + "'>  </td>";
      html += "<td><input type='text'  name='pulse_" + items + "'></td>";
      html += "<td><input type='text'  name='resp_" + items + "'></td>";
      html += "<td><input type='text'  name='bp_" + items + "'></td>";
      html += "<td><input type='text'  name='spo2_" + items + "'></td>";
      html += "<td><input type='text'  name='bsl_" + items + "'></td>";

      html += "<td><input type='text'  name='oral_" + items + "'></td>";
      html += "<td><input type='text'  name='intra_" + items + "'></td>";
      html += "<td><input type='text'  name='urine_" + items + "'></td>";
      html += "<td><input type='text'  name='asp_" + items + "'></td>";
      html += "<td><input type='text' name='sign_" + items + "' value=<?php echo $_SESSION['staff_name']; ?> ></td>";
      html +=
        "<td><button class='btn btn-danger' type='button' onclick='deleteRow(this);'>Delete</button></td>";
      html += "</tr>";

      var row = document.getElementById("tbody").insertRow();
      row.innerHTML = html;
    }

    function deleteRow(button) {
      button.parentElement.parentElement.children[2].children[0].value = "";
      button.parentElement.parentElement.style.display = "none";
    }

    var items2 = 0;
    function addItemDrugs() {
      var today = new Date();
      var time =
        today.getHours() +
        ":" +
        today.getMinutes() +
        ":" +
        today.getSeconds();
      const date2 = new Date().toJSON().slice(0, 10);
      items2++;
      var html = "<tr>";
      html += "<td>" + items2 + "</td>";
      html += "<td><input type='text' name='drug_" + items2 + "'></td>";
      html += "<td><input type='text'name='dose_" + items2 + "'></td>";

      html += "<td><input type='text' name='sig_" + items2 + "' value=<?php echo $_SESSION['staff_name']; ?> ></td>";
      html +=
        "<td><button class='btn btn-danger' type='button' onclick='deleteRow2(this);'>Delete</button></td>";
      html += "</tr>";

      var row = document.getElementById("tbody2").insertRow();
      row.innerHTML = html;
    }

    function deleteRow2(button) {
      button.parentElement.parentElement.children[1].children[0].value = "";
      button.parentElement.parentElement.style.display = "none";
    }
  </script>
</head>

<body>
  <div class="container">
    <h1 class="text-center text-danger mt-3">SHRI SIDDHIVINAYAK NETRALAYA</h1>
    <a href="eye_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
    <h3 class="text-center text-dark mt-3">Observation Chart</h3>
    <div class="row">
      <div class="col-md-3">
        <label class="form-label">UHID No:
          <?php echo $res2['uhid']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">IPD No:
          <?php echo $res2['ipd']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Date of Admission :
          <?php echo $res2['date']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label" for="time_ad">Time of Admission :
          <?php echo $res2['time']; ?>
        </label>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-md-3">
        <label class="form-label">Name:
          <?php echo $res['name']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Age:
          <?php echo $res['age']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Sex:
          <?php echo $res['sex']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">ICU/Ward Room No:
          <?php echo $res2['ward/icu']; ?>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <label class="form-label">Consultant:
          <?php echo $res['consultant']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Diagnosis:
          <?php echo $res1['diagnosis']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Bed Number:
          <?php echo $res2['bed/room']; ?>
        </label>
      </div>
    </div>
    <?php
    if (isset($_REQUEST['submit_changes'])) {
      $i = 1;
      while (isset($_POST["temp_$i"])) {

        if ($_POST["temp_$i"] !== "") {


          $time = $_POST["time_$i"];
          $date = $_POST["date_$i"];
          $temp = $_POST["temp_$i"];
          $pulse = $_POST["pulse_$i"];
          $resp = $_POST["resp_$i"];

          $bp = $_POST["bp_$i"];
          $spo2 = $_POST["spo2_$i"];
          $bsl = $_POST["bsl_$i"];
          $oral = $_POST["oral_$i"];
          $intra = $_POST["intra_$i"];
          $urine = $_POST["urine_$i"];
          $asp = $_POST["asp_$i"];
          $sign = $_POST["sign_$i"];


          $id = $_GET['id'];

          $sql3 = "INSERT INTO observe1 (patient_id,time,date,temp,pulse,resp,bp,spo2,bsl,oral,intra,urine,asp,sign) VALUES ('$id','$time','$date','$temp','$pulse','$resp','$bp','$spo2','$bsl','$oral','$intra','$urine','$asp','$sign');";
          if ($conn->query($sql3) === TRUE) {
            $i++;
          } else {
            echo "<div class='alert alert-danger'>Error Updating </div>";
          }

        } else {
          $i++;
        }

      }
      echo "<div class='alert alert-success'>Updated Successfully</div>";
    }
    if (isset($_REQUEST['delete'])) {
      $sql3 = "DELETE FROM observe1 WHERE id = {$_POST['observe1_id']} ;";
      if ($conn->query($sql3) === TRUE) {
        echo "<div class='alert alert-success'>Deleted Successfully</div>";
      } else {
        echo "<div class='alert alert-danger'>Error Deleting</div>";
      }
    }
    $sql3 = "SELECT * FROM observe1 WHERE id = $id;";
    $res3 = $conn->query($sql3)->fetch_assoc();
    ?>

    <form method="POST" action="otNotes.php?id=<?php echo $id; ?>">
      <div class="container-fluid" style="margin-top: 20px">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
              Notes
            </h6>
            <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="Notes" checked>
          </div>
          </div>
          

          <!-- <div class="col-md-3">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">INTAKE</h6>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">OUTPUT</h6>
              </div>
            </div> -->

          <div class="card-body">
            <div class="table-responsive">

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                  <th>Time</th>
                  <th>Date</th>
                  <th>Temp</th>
                  <th>Pulse</th>
                  <th>Resp</th>
                  <th>BP</th>
                  <th>SPO2</th>
                  <th>BSL(R)</th>

                  <th>ORAL</th>
                  <th>INTRAVENOUS</th>
                  <th>URINE</th>
                  <th>ASPIRATE</th>
                  <th>Sign/Initial</th>
                  <th>Delete</th>
                </tr>
                <tbody id="tbody">
                  <?php
                  $sql3 = "SELECT * FROM observe1  WHERE patient_id = $id;";
                  $data3 = $conn->query($sql3);
                  $i = 1;
                  $sr = 1;
                  while ($res = $data3->fetch_assoc()) {
                    echo '<tr>';

                    echo '<td>' . $res['time'] . '</td>';
                    echo '<td>' . $res['date'] . '</td>';
                    echo '<td>' . $res['temp'] . '</td>';
                    echo '<td>' . $res['pulse'] . '</td>';
                    echo '<td>' . $res['resp'] . '</td>';
                    echo '<td>' . $res['bp'] . '</td>';
                    echo '<td>' . $res['spo2'] . '</td>';
                    echo '<td>' . $res['bsl'] . '</td>';
                    echo '<td>' . $res['oral'] . '</td>';
                    echo '<td>' . $res['intra'] . '</td>';
                    echo '<td>' . $res['urine'] . '</td>';
                    echo '<td>' . $res['asp'] . '</td>';
                    echo '<td>' . $res['sign'] . '</td>';



                    echo "<td><form method='POST' action=''>
                                    <input type='hidden' value={$res['id']} name='observe1_id' >
                                    <button type='submit' name = 'delete' class='btn btn-primary'>Delete</button> </form>" . '</td>';
                    echo '</tr>';
                    $i++;
                    $sr++;
                  }
                  ?>

                </tbody>
              </table>
            </div>
            <button type="button" class="btn btn-info btn-lg" onclick="addItem();">
              Add Note
            </button>
            <input type="submit" class="btn btn-info btn-lg" name="submit_changes" value="Save" />
          </div>
        </div>
      </div>
    </form>
    <?php
    if (isset($_REQUEST['submit_changes1'])) {
      $i = 1;
      while (isset($_POST["drug_$i"])) {

        if ($_POST["drug_$i"] !== "") {


          $drug = $_POST["drug_$i"];
          $dose = $_POST["dose_$i"];
          $sign = $_POST["sig_$i"];


          $id = $_GET['id'];

          $sql4 = "INSERT INTO observe2 (patient_id,drug,dose,sign) VALUES ('$id','$drug','$dose','$sign');";
          if ($conn->query($sql4) === TRUE) {
            $i++;
          } else {
            echo "<div class='alert alert-danger'>Error Updating </div>";
          }

        } else {
          $i++;
        }

      }
      echo "<div class='alert alert-success'>Updated Successfully</div>";
    }
    if (isset($_REQUEST['delete1'])) {
      $sql4 = "DELETE FROM observe2 WHERE id = {$_POST['observe2_id']} ;";
      if ($conn->query($sql4) === TRUE) {
        echo "<div class='alert alert-success'>Deleted Successfully</div>";
      } else {
        echo "<div class='alert alert-danger'>Error Deleting</div>";
      }
    }
    $sql4 = "SELECT * FROM observe2 WHERE id = $id;";
    $res4 = $conn->query($sql4)->fetch_assoc();
    ?>

    <form method="POST" action="otNotes.php?id=<?php echo $id; ?>">

      <div class="container-fluid" style="margin-top: 20px">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
              Drugs
            </h6>
            <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="Drugs" checked>
          </div>
          </div>
          <!-- <div class="col-md-5">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  Date-:
                </h6>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Day</h6>
              </div>
            </div> -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                  <th>Sr.No</th>
                  <th>Name of Drug</th>
                  <th>Doses</th>
                  <th>Sign</th>
                </tr>
                <tbody id="tbody2">
                  <?php
                  $sql4 = "SELECT * FROM observe2  WHERE patient_id = $id;";
                  $data4 = $conn->query($sql4);
                  $i = 1;
                  $sr = 1;
                  while ($res = $data4->fetch_assoc()) {
                    echo '<tr>';

                    echo '<td>' . $sr . '</td>';
                    echo '<td>' . $res['drug'] . '</td>';
                    echo '<td>' . $res['dose'] . '</td>';

                    echo '<td>' . $res['sign'] . '</td>';



                    echo "<td><form method='POST' action=''>
                                    <input type='hidden' value={$res['id']} name='observe2_id' >
                                    <button type='submit' name = 'delete1' class='btn btn-primary'>Delete</button> </form>" . '</td>';
                    echo '</tr>';
                    $i++;
                    $sr++;
                  }
                  ?>

                </tbody>
              </table>
            </div>
            <button type="button" class="btn btn-info btn-lg" onclick="addItemDrugs();">
              Add Drugs
            </button>
            <input type="submit" class="btn btn-info btn-lg" name="submit_changes1" value="Save" />
          </div>

        </div>

        <div>
          <?php
          if (isset($_REQUEST['fluidBtn'])) {
            $fluid = $_POST['fluid'];
            $update5 = "UPDATE `patient_info` SET `fluid` = '$fluid'  WHERE `patient_id` = '$id'";
            $conn->query($update5);
            $sql5 = "SELECT * FROM `patient_info` WHERE patient_id = $id;";
            $res5 = $conn->query($sql5)->fetch_assoc();
            echo "<div class='alert alert-success'>Updated Successfully</div>";
          } else {

            $sql5 = "SELECT * FROM `patient_info` WHERE patient_id = $id;";
            $res5 = $conn->query($sql5)->fetch_assoc();
          }
          ?>
          <div class="my-5">
          <h3>IV Fluids:</h3> <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="IV_Fluids" checked>
          </div>
          <textarea name="fluid" class="form-control live-fetch" data-column="fluid" data-table="patient_info"><?php echo $res5['fluid']; ?></textarea><div class="dropdown-container"></div>
        </div>

        </div>
        <input type="submit" class="btn btn-info btn-lg" name="fluidBtn" value="Update" />
        <button class="btn btn-success m-2 receipt" type="button">Print</button>
      </div>
  </div>
  </div>
  </form>

<script>
  document.addEventListener('DOMContentLoaded', function () {

var receiptButton = document.querySelector('.receipt');

receiptButton.addEventListener('click', function () {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    var checkboxValues = Array.from(checkboxes).map(function (checkbox) {
        return checkbox.getAttribute('id');
    });
    var jsonData = JSON.stringify(checkboxValues);
    var encodedData = encodeURIComponent(jsonData);
    var id = '<?php echo $id; ?>';
    var url = 'observation_chart_print.php?id=' + id + '&data=' + encodedData + '&checkboxes=' + checkboxValues.join(',');

    window.location.href = url;
});

});
</script>
<script src="../fetch_dropdown_script.js"></script>
</body>

</html>