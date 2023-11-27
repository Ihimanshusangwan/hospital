<?php
$id = $_GET['id'];
require("../admin/connect.php");
// error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Patient Details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <h2>Patient Details
      <a href="update_patient_details.php?id=<?php echo $id; ?>" class="btn btn-info btn-outline">Edit
        Details</a>
      <a href="new_registration.php?id=<?php echo $id; ?>" class="btn btn-primary btn-outline">New
        Registration</a>
    </h2>

    <a href="receptionPage.php" class="btn btn-success m-2">Dashboard</a>
    <div class="forms">
      <?php
       if (isset($_POST['admit_patient'])) {
        $sql = "UPDATE patient_records SET is_admited = 1 WHERE id = $id;";
        $conn->query($sql);

      }
       if (isset($_POST['pregDate'])) {
        
        $sql = "UPDATE patient_info SET pregDate = '{$_POST['pregDate']}' , pregDetails = '{$_POST['pregDetails']}' WHERE patient_id = $id;";
       $conn->query($sql);

      }
      ?>

      <form method="POST" action="" class="col">
        <?php
        $sql = "select * from patient_records where id = $id;";
        $data = $conn->query($sql);
        if ($data->num_rows > 0) {
          $row = $data->fetch_assoc();
          if ($row['is_admited'] == 0) {
            echo '<input type="submit" class="btn btn-secondary btn m-2" name="admit_patient" value="Admit Patient">';
          } else {
            echo '<input type="button" class="btn btn-success btn m-2"  value="Patient Admited" disabled>';
          }
          ?>
        </form>
        <button class="btn btn-primary m-2 multi-reference" id="details" destination="opd_bill"
          cookieName='opd-referer'>OPD Bill</button>
        <button class="btn btn-primary m-2 multi-reference" id="details" destination="more_forms"
          cookieName='other-form-referer'>More Forms</button>
        <?php
        if ($row['is_admited'] == 1) {
          ?>

          <button class="btn btn-primary m-2 multi-reference" id="details" destination="ipd_bill"
            cookieName='ipd-referer'>IPD Bill</button>

          <?php if ($row['is_eye'] == 1) { ?>
            <!--<button class="btn btn-primary m-2 multi-reference" id="details" destination="consent"
            cookieName='consent-referer'>Eye Consent Forms</button>-->
            <button class="btn btn-primary m-2 multi-reference" id="../reception/details" destination="../staff/eye_forms"
              cookieName='eye-referer'>Eye Forms</button>
          <?php } ?>

          <?php if ($row['is_ortho'] == 1) { ?>
            <!--<button class="btn btn-primary m-2 multi-reference" id="details" destination="ortho_consent"
            cookieName='ortho-consent-referer'>Ortho Consent Forms</button>-->
            <button class="btn btn-primary m-2 multi-reference" id="../reception/details" destination="../staff/ortho_forms"
              cookieName='ortho-referer'>Ortho Forms</button>
          <?php } ?>
          <?php
        }
        ?>


      </div>
      <?php
  $sql12="SELECT * FROM `config_print` WHERE 1";
$data12=$conn->query($sql12);
$res12=$data12->fetch_assoc();
  $sql13="SELECT pregDate,pregDetails FROM `patient_info` WHERE patient_id=$id";
$data13=$conn->query($sql13);
$res13=$data13->fetch_assoc();
if (!isset($res12['inp'])) {
    $inp_arr = array_fill(0, 4, 'option2');
} else {
    $inp = $res12['inp'];
    $inp_arr = json_decode($inp, true);
    $inp_arr = is_array($inp_arr) ? $inp_arr : array_fill(0, 4, '');
} 

if($inp_arr[2]=='option1' && !$res13['pregDate']){

    echo<<<calc
    <div class="container">
        <h4 class="mt-2">Pregnancy Calculator</h4>
        <div class="form-group mt-4">
            <label for="lmp">Enter Last Menstrual Period:</label>
            <input type="date" class="form-control-sm" id="lmp">
        </div>
        <button id="calculateButton" class="btn btn-primary btn-sm m-2">Calculate Due Date and Duration</button>
        <p id="result" class="mt-3"></p>
    </div>
calc;
} else if($res13['pregDate']){
  
  echo<<<calc
  <div class="container">
  {$res13['pregDetails']}
  </div>
  <div class="container">
      <h4 class="mt-2">Pregnancy Calculator</h4>
      <div class="form-group mt-4">
          <label for="lmp">Enter Last Menstrual Period:</label>
          <input type="date" class="form-control-sm" id="lmp" value='{$res13['pregDate']}'>
      </div>
      <button id="calculateButton" class="btn btn-primary btn-sm m-2">ReCalculate Due Date and Duration</button>
      <p id="result" class="mt-3"></p>
  </div>
calc;
}
?>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Patient Information</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Is Old Patient:</strong>
              <?php echo $row['is_old_patient']; ?>
            </li>
            <li class="list-group-item"><strong>Name:</strong>
              <?php echo $row['name']; ?>
            </li>
            <li class="list-group-item"><strong>Address:</strong>
              <?php echo $row['address']; ?>
            </li>
            <li class="list-group-item"><strong>Taluka:</strong>
              <?php echo $row['taluka']; ?>
            </li>
            <li class="list-group-item"><strong>District:</strong>
              <?php echo $row['district']; ?>
            </li>
            <li class="list-group-item"><strong>Age:</strong>
              <?php echo $row['age']; ?>
            </li>
            <li class="list-group-item"><strong>Sex:</strong>
              <?php echo $row['sex']; ?>
            </li>
            <li class="list-group-item"><strong>Date of Birth:</strong>
              <?php echo $row['dob_date']; ?>
            </li>
            <li class="list-group-item"><strong>Registration Date:</strong>
              <?php echo $row['reg_date']; ?>
            </li>
            <li class="list-group-item"><strong>Mobile:</strong>
              <?php echo $row['mobile']; ?>
            </li>
            <li class="list-group-item"><strong>Consultant:</strong>
              <?php echo $row['consultant']; ?>
            </li>
            <li class="list-group-item"><strong>Type of Visit:</strong>
              <?php echo $row['type_of_visit']; ?>
            </li>
            <li class="list-group-item"><strong>Patient with Person (PWP) Name:</strong>
              <?php echo $row['name_pwp']; ?>
            </li>
            <li class="list-group-item"><strong>PWP Address:</strong>
              <?php echo $row['address_pwp']; ?>
            </li>
            <li class="list-group-item"><strong>PWP Taluka:</strong>
              <?php echo $row['taluka_pwp']; ?>
            </li>
            <li class="list-group-item"><strong>PWP District:</strong>
              <?php echo $row['district_pwp']; ?>
            </li>
            
            <li class="list-group-item"><strong>PWP Age:</strong>
              <?php echo $row['age_pwp']; ?>
            </li>
            <li class="list-group-item"><strong>Relation:</strong>
              <?php echo $row['relation']; ?>
            </li>
            <li class="list-group-item"><strong>PWP Sex:</strong>
              <?php echo $row['sex_pwp']; ?>
            </li>
            <li class="list-group-item"><strong>PWP Mobile:</strong>
              <?php echo $row['mobile_pwp']; ?>
            </li>
            <li class="list-group-item"><strong>Referred By:</strong>
              <?php echo $row['referred_by']; ?>
            </li>
            <li class="list-group-item"><strong>Patient Complaints:</strong>
              <?php echo $row['patient_complaints']; ?>
            </li>
          </ul>

        <?php } else {
          echo <<<data
      <div class="alert alert-danger" role="alert">
  NO Patient Record Found
</div>

data;
        }
        ?>
      </div>
    </div>
    <!-- <script src="../multi_reference_btn.js"></script> -->
    <script>
      const setCookie = (name, value, days) => {
        const expirationDate = new Date();
        expirationDate.setDate(expirationDate.getDate() + days);
        document.cookie = `${name}=${value}; expires=${expirationDate.toUTCString()}; path=/`;
      };
      document.querySelectorAll(".multi-reference").forEach((element) => {
        element.addEventListener("click", (event) => {
          var id = element.getAttribute("id");
          var cookieName = element.getAttribute("cookieName");
          setCookie(cookieName, id, 7);
          var destination = element.getAttribute("destination");
          window.location.href = destination + ".php?id=" + "<?php echo $id; ?>";
        });
      });
    </script>
    <script>
        document.getElementById('calculateButton').addEventListener('click', calculateDueDate);

        function calculateDueDate() {
            const lmpInput = document.getElementById('lmp').value;
            const lmpDate = new Date(lmpInput);

            if (isNaN(lmpDate.getTime())) {
                alert('Invalid date format. Please select a date.');
                return;
            }

            const currentDate = new Date();
            const diffInMilliseconds = currentDate - lmpDate;
            const diffInDays = Math.floor(diffInMilliseconds / (1000 * 60 * 60 * 24));

            const weeks = Math.floor(diffInDays / 7);
            const days = diffInDays % 7;

            const dueDate = new Date(lmpDate);
            dueDate.setDate(lmpDate.getDate() + 280); // 280 days is the average pregnancy duration

            const dueDateString = dueDate.toDateString();
            const durationString = `<strong>Duration:</strong> ${weeks} weeks and ${days} days`;
            
            const dataToSave = lmpInput;

            document.getElementById('result').innerHTML = `<strong>Estimated Due Date:</strong> ${dueDateString}<br>${durationString}<br>
            <form method='POST'>
            <input type='hidden' name ='pregDate' value = '${dataToSave}'>
            <input type='hidden' name ='pregDetails' value = '<strong>Estimated Due Date:</strong> ${dueDateString}<br>${durationString}'>
            <button class= 'btn btn-success' type='submit'>Save</button>
            </form>`;
        }
       
    </script>
</body>

</html>