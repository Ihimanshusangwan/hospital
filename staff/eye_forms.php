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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>

  <div class="container">
    <h1 class="text-center text-danger mt-3">
      <?php echo $title['so'] ?>
    </h1>
    <button class="btn btn-success m-2" id="dashboard" cookieName="eye-referer">Dashboard</button>
    <h3 class="text-center text-dark mt-3">Eye Forms</h3>
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
    <table class="table table-borderless">

      <tr>

        <td><a href="admission.php?id=<?php echo $id; ?>"><button class="btn btn-primary m-2">Admission
              Form</button></a></td>
        <td><a href="discharge.php?id=<?php echo $id; ?>"><button class="btn btn-primary m-2">Discharge
              Form</button></a></td>
        <td><a href="otNotes.php?id=<?php echo $id; ?>"><button class="btn btn-primary m-2">Observation
              Chart</button></a></td>
        <td><a href="continuation.php?id=<?php echo $id; ?>"> <button class="btn btn-primary m-2">Continuation
              Sheet</button></a></td>

      </tr>
      <tr>
        <td><a href="consumable_acquisition_form.php?id=<?php echo $id; ?>"><button
              class="btn btn-primary m-2">Consumable Acquisition </button></a></td>
        <td><a href="Pre-operative_Checklist.php?id=<?php echo $id; ?>"><button
              class="btn btn-primary m-2">Pre-Operative Checklist</button></a></td>
        <td><a href="OT.php?id=<?php echo $id; ?>"><button class="btn btn-primary m-2">OT Notes</button></a></td>
        <td><a href="pre_operative_anesthesia.php?id=<?php echo $id; ?>"><button
              class="btn btn-primary m-2">Pre-Operative Assessment by Anesthetist</button></a></td>
      </tr>
    </table>
    <h3 class="text-center mb-3">Consent Forms
    </h3>

    <table class="table table-borderless">

      <tr>

        <td><a href="hiv_consent_mar.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">HIV Consent
              Marathi</button></a></td>
        <td><a href="hiv_consent_eng.php?id=<?php echo $id; ?>"> <button class="btn btn-primary mb-2">HIV Consent
              English</button></a></td>
        <td><a href="general_info_consent.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">General Inform
              Consent</button></a></td>
        <td><a href="inform_consent.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">विशेष संमती
              पात्र</button></a></td>
      </tr>
      <tr>

        <td><a href="postConsent.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">ऑपरेशन नंतर पेशंटने
              घ्यावयाची काळजी
            </button></a></td>
        <td><a href="anumati.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">अनुमतीपत्र</button></a></td>
        <td><a href="inform_sur_consent.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Informed Consent
              form for surgery</button></a></td>
        <td><a href="ALTK.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Automated Lamellar Therapeutic Keratoplasty</button></a></td>
      </tr>

    </table>


    <script>
      function getCookieValue(cookieName) {
        const cookies = document.cookie.split("; ");
        for (let i = 0; i < cookies.length; i++) {
          const cookie = cookies[i].split("=");
          if (cookie[0] === cookieName) {
            return cookie[1];
          }
        }
        return null;
      }
      document.getElementById("dashboard").addEventListener("click", () => {
        var page = document.getElementById("dashboard").getAttribute("cookieName");
        var cookieValue = getCookieValue(page);
        document.cookie = `${page}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
        window.location.href = `${cookieValue}.php?id=<?php echo $id; ?>`;

      })
    </script>
</body>

</html>