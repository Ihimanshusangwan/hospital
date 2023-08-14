<?php 

require("../admin/connect.php");
$id = $_GET['id'];
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
        <button class="btn btn-success m-2" id="dashboard" cookieName="ortho-consent-referer">Dashboard</button>
      <h1 class="text-center text-danger mt-3"><?php echo $title['rm']?></h1>
      <h3 class="text-center text-dark mt-3">Ortho Consent Forms</h3>
      <div class="row">
        <div class="col-md-3">
          <label class="form-label">UHID No: <strong><?php echo $res2['uhid'];?></strong></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">IPD No:<strong> <?php echo $res2['ipd'];?></strong></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Date of Admission :<strong> <?php echo $res2['date'];?></strong></label>
        </div>
        <div class="col-md-3">
          <label class="form-label" for="time_ad">Time of Admission :<strong> <?php echo $res2['time'];?></strong></label>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Name:  <strong> <?php echo $res['name'];?></strong></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Age:<strong> <?php echo $res['age'];?></strong></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Sex:<strong> <?php echo $res['sex'];?></strong></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">ICU/Ward Room No:<strong> <?php echo $res2['ward/icu'];?></strong></label>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <label class="form-label">Consultant:<strong> <?php echo $res['consultant'];?></strong></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Diagnosis:<strong> <?php echo $res1['diagnosis'];?></strong></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Bed Number:<strong> <?php echo $res2['bed/room'];?></strong></label>
        </div>
      </div>
      <a href="minor_pro_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Minor Procedures Consent</button></a>
    <a href="ap_for_document.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Application for Document</button></a>
    <a href="anesthesia_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Anesthesia Consent</button></a>
    <a href="discharge_dama_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Discharge Dama Consent</button></a>
    <a href="ref_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Refusal Treatment Consent</button></a>
    <a href="general_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">General Informed Consent</button></a>
    <a href="highrisk_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">High Risk Consent</button></a>
    <a href="info_transfusion_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Transfusion of Blood Consent</button></a>
    <a href="initial_counselling.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Initial Counselling Form</button></a>
    <a href="rate_charges.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Rate Charges Samatipatra</button></a>
    <a href="room_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Room Consent</button></a>
<<<<<<< HEAD
    <a href="counselling.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Counselling Consent</button></a>
=======
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
    



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