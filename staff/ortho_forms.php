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
        <button class="btn btn-success m-2" id="dashboard" cookieName="ortho-referer">Dashboard</button>
      <h3 class="text-center text-dark mt-3">Ortho Forms</h3>
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
    
    
    <a href="ortho_admission.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Admission Form</button></a>
    <a href="ortho_discharge.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-2">Discharge Form</button></a>
    <a href="ortho_observation_chart.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Observation Chart</button></a>
    <a href="ortho_continuation.php?id=<?php echo $id; ?>"> <button class="btn btn-primary mb-2">Continuation Sheet</button></a>
    <a href="bloodTransfusion.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Blood Transfusion</button></a>
    <a href="initialcounselling.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Initial Counselling</button></a>
    <a href="on-notes.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Operative Notes </button></a>
    <a href="postAnaesthesiaObservation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Post Anaesthesia Observation </button></a>
    <a href="transferForm.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Transfer Form</button></a>
    <a href="ortho_pre-operativeChecklist.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Pre-Operative Checklist</button></a>
    <a href="ortho_nutrition.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Nutritional Assessment</button></a>
    <a href="ortho_emer.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2 ">Emergency Room</button></a>
    <a href="ortho_mlc.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">M.L.C. नोंद करणे बाबत</button></a>
    <a href="ortho_histopath.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Histopathology</button></a>
    <a href="handover_itm.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Handover Patient's Item </button></a>
    <a href="drug_administration.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Drug Adminstartion</button></a>
    <a href="nurses_daily_record.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Nurse daily Record</button></a>
    <a href="case_sheet_audit.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Case Audit Sheet </button></a>
    <a href="nursing_intial_assesment.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Nursing Intial Assesment </button></a>
    <a href="doctor_inital_asssesment.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Doctor Initial Assesment</button></a>

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
      document.getElementById("dashboard").addEventListener("click",()=>{
          var page= document.getElementById("dashboard").getAttribute("cookieName");
          var cookieValue = getCookieValue(page);
          document.cookie = `${page}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
          window.location.href=`${cookieValue}.php?id=<?php echo $id; ?>`;
  
      })
</script>
</body>
</html>