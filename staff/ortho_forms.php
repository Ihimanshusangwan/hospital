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
    <button class="btn btn-success m-2" id="dashboard" cookieName="ortho-referer">Dashboard</button>
    <h3 class="text-center text-dark mt-3">Ortho Forms</h3>
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
        <td>
          <a href="case_sheet_audit.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Case Audit Sheet
            </button></a>
        </td>
        <td>
          <a href="ortho_admission.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Admission
              Form</button></a>
        </td>
        <td>
          <a href="doctor_inpatient.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Doctor Inpatient
              Initial Assessment</button></a>
        </td>
        <td>

          <a href="indoor_case.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Indoor Case Paper
            </button></a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="room_check.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2"> Room Check List
            </button></a>
        </td>
        <td> <a href="patient_family_education.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2"> Patient
              & Family Education Record </button></a></td>
        <td>
          <a href="injection_consent.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">IM /IV SC Injection
              Consent </button></a>
        </td>
        <td>
          <a href="nursing_assessment.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Nursing Assessment
            </button></a>
        </td>
      <tr>
        <td>
          <a href="invest_sheet.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Investigation Sheet
            </button></a>
        </td>
        <td>
          <a href="urinary_cather.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Urinary Catheter
              Bundle
              Follow Up</button></a>
        </td>
        <td>
          <a href="bloodTransfusion.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Blood
              Transfusion Monitering</button></a>
        </td>
        <td>
          <a href="ortho_pre-operativeChecklist.php?id=<?php echo $id; ?>"><button
              class="btn btn-primary mb-2">Pre-Operative
              Checklist</button></a>
        </td>
      </tr>
      <td>
        <a href="immediate_reval.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Immediate pre-operative
            re-evaluation form </button></a>
      </td>
      <td>
        <a href="pre_an_eval.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2"> Pre Anesthesia Evaluation
          </button></a>
      </td>
      <td>
        <a href="anesthesia_record.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Anesthesia
            Record</button></a>
      </td>
      <td>
        <a href="surgery_safety.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Surgical Safety
            Checklist
          </button></a>
      </td>
      </tr>
      <tr>
        <td>

          <a href="on-notes.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Operative Notes
            </button></a>
        </td>
        <td>
          <a href="post_opnotes.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Post Operative
              Notes</button></a>
        </td>
        <td>
          <a href="incidence_register.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Incidence Form
            </button></a>
        </td>
        <td>
          <a href="ortho_discharge.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Discharge
              Card</button></a>
        </td>
        
      </tr>
      <tr>
        <td><a href="ortho_observation_chart.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Observation
              Chart</button></a></td>
        <td><a href="ortho_continuation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Continuation
              Sheet</button></a></td>
        <td><a href="postAnaesthesiaObservation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Post
              Anaesthesia Observation</button></a></td>
              
        <td><a href="pre_an_eval.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2"> Pre Anesthesia
              Evaluation</button></a></td>
      </tr>
      <tr>
        <td><a href="transferForm.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Transfer
              Form</button></a></td>
        <td><a href="ortho_nutrition.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Nutritional
              Assessment</button></a></td>
        <td><a href="ortho_emer.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Emergency
              Room</button></a></td>

        <td><a href="drug_administration.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Drug
              Administration</button></a></td>
      </tr>
      <tr>

        <td><a href="ortho_histopath.php?id=<?php echo $id; ?>"><button
              class="btn btn-primary mb-2">Histopathology</button></a></td>
        <td><a href="nursing_intial_assesment.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Nursing
              Intial Assesment</button></a></td>
        <td><a href="doctor_inital_asssesment.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Doctor
              Initial Assesment</button></a></td>
              
        <td><a href="acc_maternity.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Accident And
              Maternity Homes</button></a></td>
      </tr>
      <tr>


        <td><a href="discharge_summary.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Discharge
              Summary</button></a></td>
        <td><a href="ambulance.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Ambulance
              Summary</button></a></td>
        <td><a href="dama.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">DAMA
              </button></a></td>
        <td><a href="ssi.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Surgical Site Injection (SSI)
              </button></a></td>
       
        
      </tr>
      <tr>
      <td><a href="incident.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Incident</button></a></td>
      <td><a href="npi.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Needle Prick Injury Record</button></a></td>
  
      <td></td>
      <td></td>

      </tr>

    </table>
    <h3 class="text-center mb-3">Consent Forms</h3>
    <table class="table table-borderless">

      <tr>

        <td><a href="initialcounselling.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Initial
              Counselling</button></a></td>
        <td><a href="immediate_reval.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Immediate
              pre-operative re-evaluation form</button></a></td>

        <td><a href="ortho_mlc.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">M.L.C. नोंद करणे
              बाबत</button></a></td>

        <td><a href="dama_discharge.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">DAMA
              Discharge</button></a></td>
      </tr>
      <tr>
        <td><a href="handover_itm.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Handover Patient's
              Item</button></a></td>
        <td><a href="nurses_daily_record.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Nurse daily
              Record</button></a></td>
              <td>
      <a href="minor_pro_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Minor Procedures Consent</button></a></td>
      <td>
    <a href="ap_for_document.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Application for Document</button></a></td>
      </tr>
      <tr>
        <td><a href="nutritional_assessment.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Nutritional
              Assessment</button></a></td>
        <td><a href="surgery_safety.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Surgical Safety
              Checklist</button></a></td>
              <td>
    <a href="anesthesia_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Anesthesia Consent</button></a></td>
      
      <td>
        
    <a href="discharge_dama_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Discharge Dama Consent</button></a>
      </td>
        </tr>
      <tr>
        <td><a href="samatipatra0.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">
              Samatipatra</button></a></td>
        <td><a href="samatipatra.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Samatipatra
              1</button></a></td>
        <td><a href="samatipatra2.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2"> Samatipatra
              2</button></a></td>
        <td><a href="samatipatra3.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2"> Samatipatra
              3</button></a></td>
      </tr>
      <tr>
        <td><a href="samatipatra4.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Samatipatra
              4</button></a></td>
        <td><a href="patient_relative_feedback.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2"> Patient
              & Relative Feedback ORM</button></a></td>
              <td>
                
    <a href="ref_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Refusal Treatment Consent</button></a>
              </td>
              <td>
                
    <a href="general_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">General Informed Consent</button></a>
              </td>
      </tr>
      <tr>
        <td>
          
    <a href="highrisk_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">High Risk Consent</button></a>
        </td>
        <td>
          
    <a href="info_transfusion_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Transfusion of Blood Consent</button></a>
        </td>
        <td>
    <a href="initial_counselling.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Initial Counselling Form</button></a></td>
    <td>
    <a href="rate_charges.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Rate Charges Samatipatra</button></a></td>
      </tr>

      <tr>
        <td>
          
    <a href="room_consent.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Room Consent</button></a>
        </td>
        <td>
    <a href="counselling.php?id=<?php echo $id;?>"><button class="btn btn-primary mb-1">Counselling Consent</button></a></td>
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