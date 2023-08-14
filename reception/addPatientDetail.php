<!DOCTYPE html>
<?php
require("../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <title>Document</title>
  <style>
    label {
      font-weight: 600;
    }

    .hidden {
      display: none;
    }
  </style>
</head>

<body style="background-color: #90D0E5;">
  <div class="container mb-4">
    <h1>
      <marquee style="color: purple;" BEHAVIOUR="slide" scrollnount="70" scrolledeley="100">
        <?php echo $title['ro'] ?>
      </marquee>
    </h1>
    <a href="receptionPage.php" class="btn btn-success m-2">Dashboard</a>
    <div class="row p-4 pt-4">
      <div class="col shadow-lg rounded m-2 p-4">
        <h3 class="text-dark text-center ml-2">Patient Details:</h3>
        <?php

        // Check if form is submitted
        if (isset($_POST['submit'])) {

          $nameErr = "";
          // Check if name is entered
          if (empty($_POST['name'])) {
            $nameErr = "Name is required";
          } else {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
          }
          $address = isset($_POST['address']) ? filter_var($_POST['address'], FILTER_SANITIZE_STRING) : '';
          $taluka = isset($_POST['taluka']) ? filter_var($_POST['taluka'], FILTER_SANITIZE_STRING) : '';
          $district = isset($_POST['district']) ? filter_var($_POST['district'], FILTER_SANITIZE_STRING) : '';
          $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
          $dob_date = isset($_POST['dob_date']) ? $_POST['dob_date'] : '';
          $reg_date = isset($_POST['reg_date']) ? $_POST['reg_date'] : '';
          $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
          $consultant = isset($_POST['consultant']) ? $_POST['consultant'] : '';
          $tov = isset($_POST['tov']) ? $_POST['tov'] : '';
          $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
          $pulse = isset($_POST['pulse']) ? $_POST['pulse'] : '';
          $bp = isset($_POST['bp']) ? $_POST['bp'] : '';
          $temp = isset($_POST['temp']) ? $_POST['temp'] : '';
          $age = isset($_POST['age']) ? $_POST['age'] : '';
          $is_old_patient = isset($_POST['flexRadioDefault']) ? $_POST['flexRadioDefault'] : '';
          $name_pwp = isset($_POST['name_pwp']) ? $_POST['name_pwp'] : '';
          $address_pwp = isset($_POST['address_pwp']) ? $_POST['address_pwp'] : '';
          $taluka_pwp = isset($_POST['taluka_pwp']) ? $_POST['taluka_pwp'] : '';
          $district_pwp = isset($_POST['district_pwp']) ? $_POST['district_pwp'] : '';
          $age_pwp = isset($_POST['age_pwp']) ? $_POST['age_pwp'] : '';
          $sex_pwp = isset($_POST['sex_pwp']) ? $_POST['sex_pwp'] : '';
          $relation = isset($_POST['relation']) ? $_POST['relation'] : '';
          $mobile_pwp = isset($_POST['mobile_pwp']) ? $_POST['mobile_pwp'] : '';
          $referred_by = isset($_POST['rb']) ? $_POST['rb'] : '';
          $patient_complaints = isset($_POST['pc']) ? $_POST['pc'] : '';
          if ($tov == "Eye") {
            $is_eye = 1;
            $is_ortho = 0;
          } else if ($tov == "Ortho") {
            $is_eye = 0;
            $is_ortho = 1;
          } else {
            $is_eye = 0;
            $is_ortho = 0;
          }


          // If no errors, insert data into database
          if (empty($nameErr)) {

            $sql = "INSERT INTO patient_records (is_old_patient,name, address, taluka, district, age, sex,dob_date, reg_date, mobile,consultant,type_of_visit,name_pwp,address_pwp,taluka_pwp,district_pwp,age_pwp,relation,sex_pwp,mobile_pwp,referred_by,patient_complaints,is_eye,is_ortho)
            VALUES ('$is_old_patient','$name', '$address', '$taluka', '$district', '$age', '$sex', '$dob_date', '$reg_date', '$mobile','$consultant', '$tov', '$name_pwp', '$address_pwp', '$taluka_pwp', '$district_pwp', '$age_pwp', '$relation','$sex_pwp','$mobile_pwp','$referred_by','$patient_complaints',$is_eye,$is_ortho)";

            if ($conn->query($sql) === TRUE) {
              $inserted_patient_id = $conn->insert_id;
              $sql = "INSERT INTO patient_info(patient_id,weight,pulse,bp,temp) VALUES($inserted_patient_id,'$weight','$pulse','$bp','$temp');";
              $conn->query($sql);
              $sql1 = "INSERT INTO p_insure(id) VALUES($inserted_patient_id);";
              $conn->query($sql1);

              $sql2 = "INSERT INTO p_init(id) VALUES($inserted_patient_id);";
              $conn->query($sql2);

              $sql3 = "INSERT INTO p_general(id) VALUES($inserted_patient_id);";
              $conn->query($sql3);
              $sql1 = "INSERT INTO ortho_p_insure(id) VALUES($inserted_patient_id);";
              $conn->query($sql1);

              $sql2 = "INSERT INTO ortho_p_init(id) VALUES($inserted_patient_id);";
              $conn->query($sql2);

              $sql3 = "INSERT INTO ortho_p_general(id) VALUES($inserted_patient_id);";
              $conn->query($sql3);
              $sql3 = "INSERT INTO ortho_initial_counselling(patient_id) VALUES($inserted_patient_id);";
              $conn->query($sql3);
              $sql3 = "INSERT INTO ortho_pre_op_checklist(patient_id) VALUES($inserted_patient_id);";
              $conn->query($sql3);
              $sql3 = "INSERT INTO eye_pre_op_checklist(patient_id) VALUES($inserted_patient_id);";
              $conn->query($sql3);

              $sql4 = "INSERT INTO ipd_bill1(id) VALUES($inserted_patient_id);";
              $conn->query($sql4);

              $sql5 = "INSERT INTO ipd_bill2(id) VALUES($inserted_patient_id);";
              $conn->query($sql5);

              $sql6 = "INSERT INTO p_log(id) VALUES($inserted_patient_id);";
              $conn->query($sql6);

              $sql7 = "INSERT INTO discharge(id) VALUES($inserted_patient_id);";
              $conn->query($sql7);

              $sql8 = "INSERT INTO vr_surgery(id) VALUES($inserted_patient_id);";
              $conn->query($sql8);

              $sql9 = "INSERT INTO ocu(id) VALUES($inserted_patient_id);";
              $conn->query($sql9);
              $sql9 = "INSERT INTO cor1(id) VALUES($inserted_patient_id);";
              $conn->query($sql9);
              $sql10 = "INSERT INTO counsel(id) VALUES($inserted_patient_id);";
              $conn->query($sql10);

              $sql11 = "INSERT INTO blood(id) VALUES($inserted_patient_id);";
              $conn->query($sql11);

              $sql12 = "INSERT INTO op(id) VALUES($inserted_patient_id);";
              $conn->query($sql12);

              $sql13 = "INSERT INTO ana(id) VALUES($inserted_patient_id);";
              $conn->query($sql13);

              $sql14 = "INSERT INTO acq(id) VALUES($inserted_patient_id);";
              $conn->query($sql14);
              $day = date('d');
              $month = date('m');
              $year = date('Y');

              $sql15 = "INSERT INTO nutritional_ass(id) VALUES($inserted_patient_id);";
              $conn->query($sql15);

              $sql16 = "INSERT INTO histopath(id) VALUES($inserted_patient_id);";
              $conn->query($sql16);

              $sql17 = "INSERT INTO handover(id) VALUES($inserted_patient_id);";
              $conn->query($sql17);

              $sql18 = "INSERT INTO fdata(id) VALUES($inserted_patient_id);";
              $conn->query($sql18);

              $sql19 = "INSERT INTO mlc(id) VALUES($inserted_patient_id);";
              $conn->query($sql19);

              $sql20 = "INSERT INTO ortho_discharge(id) VALUES($inserted_patient_id);";
              $conn->query($sql20);
              $sql21 = "INSERT INTO case_audit_sheet(id) VALUES($inserted_patient_id);";
              $conn->query($sql21);

              $sql22 = "INSERT INTO drug_administration(id) VALUES($inserted_patient_id);";
              $conn->query($sql22);

              $sql23 = "INSERT INTO nurses_daily_record(id) VALUES($inserted_patient_id);";
              $conn->query($sql23);


              $sql25 = "INSERT INTO nurse_intial_assesment(id) VALUES($inserted_patient_id);";
              $conn->query($sql25);

              $sql25 = "INSERT INTO doctor_initail_assesment(id) VALUES($inserted_patient_id);";
              $conn->query($sql25);

              $sql26 = "INSERT INTO opto_ascan(id) VALUES($inserted_patient_id);";
              $conn->query($sql26);

              $sql27 = "INSERT INTO opto_examination(id) VALUES($inserted_patient_id);";
              $conn->query($sql27);

              $sql28 = "INSERT INTO opto_surgery(id) VALUES($inserted_patient_id);";
              $conn->query($sql28);

              $sql29 = "INSERT INTO cc_glass_rx(id) VALUES($inserted_patient_id);";
              $conn->query($sql29);
              $sql30 = "INSERT INTO hiv_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql30);

              $sql31 = "INSERT INTO post_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql31);

              $sql32 = "INSERT INTO general_info_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql32);

              $sql33 = "INSERT INTO inform_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql33);

              $sql34 = "INSERT INTO info_sur_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql34);

              $sql35 = "INSERT INTO pre_operative_anesth(id) VALUES($inserted_patient_id);";
              $conn->query($sql35);
              $sql30 = "INSERT INTO minor_pro_consent (id) VALUES($inserted_patient_id);";
              $conn->query($sql30);

              $sql31 = "INSERT INTO ap_for_document(id) VALUES($inserted_patient_id);";
              $conn->query($sql31);

              $sql32 = "INSERT INTO anesthesia_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql32);

              $sql33 = "INSERT INTO discharge_dama_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql33);

              $sql35 = "INSERT INTO ref_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql35);

              $sql36= "INSERT INTO highrisk_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql36);
              
              $sql37 = "INSERT INTO info_transfusion_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql37);
              
              $sql38 = "INSERT INTO initial_counselling(id) VALUES($inserted_patient_id);";
              $conn->query($sql38);
              
              $sql39 = "INSERT INTO rate_charges(id) VALUES($inserted_patient_id);";
              $conn->query($sql39);
              
              $sql40 = "INSERT INTO general_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql40);
                              
                              
              $sql41 = "INSERT INTO room_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql41);

              $sql44 = "INSERT INTO permission(id) VALUES($inserted_patient_id);";
              $conn->query($sql44);

              $sql42 = "INSERT INTO feedback_english(id) VALUES($inserted_patient_id);";
              $conn->query($sql42);

              $sql43 = "INSERT INTO feedback_marthi(id) VALUES($inserted_patient_id);";
              $conn->query($sql43);

<<<<<<< HEAD
              $sql44 = "INSERT INTO anumati_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql44);

              $sql45 = "INSERT INTO counselling_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql45);

=======
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
              $uhid = $inserted_patient_id . '/' . $day . '/' . $month . '/' . $year;


              //auto generate uhid
              $sql = "update p_insure set uhid = '$uhid' where id = $inserted_patient_id;";
              $conn->query($sql);
              $sql = "update ortho_p_insure set uhid = '$uhid' where id = $inserted_patient_id;";
              $conn->query($sql);

              $description = '{"0":{"name":"Eye Cleaned","value":"off"},"1":{"name":"Dressing with betadine solution done","value":"off"},"2":{"name":"Peribulbar block/LA with 6ml of 2% lignocaine and adreline injected.","value":"off"},"3":{"name":"Dressing with betadine done","value":"off"},"4":{"name":"Eye Drapping Done","value":"off"},"5":{"name":"Pterygium mass excised","value":"off"},"6":{"name":"Mild cautery applied","value":"off"},"7":{"name":"Corneal surface smoothed with crescent blade","value":"off"},"8":{"name":"Amminiotic Membrane Graft applied over bare surface and sutured with 10-0 vicryl","value":"off"},"9":{"name":"Eye draped removed","value":"off"},"10":{"name":"5% betadine eye drop applied","value":"off"},"11":{"name":"Eye Patched","value":"off"},"12":{"name":"Surgery concluded","value":"off"}}';

              $update_last = "UPDATE `cor1` SET  description = '$description' WHERE id = '$inserted_patient_id';";
              $conn->query($update_last);
              echo "<span style='color:green;'>Patient added successfully</span>";
              // redirect to the same page to prevent form resubmission
              // header("Location: " . $_SERVER["PHP_SELF"]);
              // exit();       
            } else {
              echo "Error: ";
            }
          } else {
            echo "<span style='color:red;'> Name is Required</span>";
          }
        }


        ?>
        <form id="form" action="" method="POST" enctype="multipart/form-data">
          <div class="form-group m-2">
            <div class="row">
              <label>Are you an Old Patient of this hospital ?</label>
              <div class="form-check col-3">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                  value="yes" />
                <label class="form-check-label" for="flexRadioDefault1">
                  Yes
                </label>
              </div>
              <div class="form-check col-3">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="no"
                  checked />
                <label class="form-check-label" for="flexRadioDefault2">
                  No
                </label>
              </div>
            </div>
          </div>
          <div class="form-group m-2 col-6 hidden">
            <label for="mobile">Enter Mobile Number:</label>
            <input type="text" class="form-control" placeholder="mobile" id="mobile_search" name="mobile_search"
              autocomplete="off" />
            <div id="mobile_dropdown" class="dropdown-menu" style="max-height: 200px; overflow-y: auto;"></div>
          </div>
          <input type="hidden" name="record_id" value="123" id="record_id">
          <section class="hide">
            <div class="form-group m-2 col-6  ">
              <label for="name">Name of patient:</label>
              <input name="name" id="name" value="" class="form-control" placeholder="Name" />
            </div>
            <div class="form-group m-2 col-6  ">
              <label for="name">Address:</label>
              <input name="address" id="address" value="" class="form-control" placeholder="Address" />
            </div>

            <div class="row  ">
              <div class="form-check col-3">
                <label for="name">Taluka:</label>
                <input name="taluka" id="taluka" value="" class="form-control" placeholder="Taluka" />
              </div>
              <div class="form-check col-3">
                <label for="name">District:</label>
                <input name="district" id="district" value="" class="form-control" placeholder="District" />
              </div>
            </div>


            <div class="row  ">
              <div class="form-check col-3">
                <label for="reg_date">Date of Birth:</label>
                <input type="date" class="form-control" placeholder="dob_date" id="dob_date" name="dob_date"
                  value="15-10-1995" onchange="calculateAge()" />
              </div>
              <div class="form-check col-3">
                <label for="age">Age</label>
                <input class="form-control" placeholder="Age" id="age" name="age" value="" />
              </div>
            </div>
            <div class="row  ">
              <div class="form-check col-3">
                <label for="reg_date">Reg Date:</label>
                <input type="date" class="form-control" placeholder="reg_date" id="reg_date" name="reg_date" />
              </div>
              <div class="form-check col-3">
                <label for="sex">Sex:</label>
                <select class="form-control" name="sex" id="sex">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="form-group m-2 col-6  ">
              <label for="mobile">Mobile Number:</label>
              <input type="number" class="form-control" placeholder="mobile" id="mobile" name="mobile" />
            </div>
            <div class="form-group m-2 col-6  ">
              <label for="consultant">Consultant:</label>
              <select class="form-control" name="consultant" required id="consultant">
                <?php
                $sql = "SELECT name FROM doctors;";
                $res = $conn->query($sql);
                while ($values = $res->fetch_assoc()) {
                  echo '
                  <option value="' . $values['name'] . '">
                    ' . $values['name'] . '
                  </option>
                  ';
                }
                ?>
              </select>
            </div>
            <div class="form-group m-2 col-6  ">
              <label for="tov">Type of Visit:</label>
              <select class="form-control" name="tov" required id='tov'>
                <?php
                $sql = "SELECT * FROM type;";
                $res = $conn->query($sql);
                while ($values = $res->fetch_assoc()) {
                  echo '
                  <option value="' . $values['type'] . '">
                    ' . $values['type'] . '
                  </option>
                  ';
                }
                $conn->close();
                ?>
              </select>
            </div>
            <div class="container mt-4  ">
              <div class="row">
                <h5>Physical Examination:</h5>
                <div class="col-sm-2">
                  <label class="form-label">Weight</label>
                  <input name="weight" type="text" class="form-control" id="weight" placeholder="Enter Weight">
                </div>
                <div class="col-sm-2">
                  <label class="form-label">Pulse</label>
                  <input name="pulse" type="text" class="form-control" id="pulse" placeholder="Enter pulse">
                </div>
                <div class="col-sm-2">
                  <label class="form-label">BP</label>
                  <input name="bp" type="text" class="form-control" id="bp" placeholder="Enter BP">
                </div>
                <div class="col-sm-2">
                  <label class="form-label">Temperature</label>
                  <input name="temp" type="text" class="form-control" id="temp" placeholder="Enter Temperature">
                </div>
              </div>
            </div>
            <h3 class="text-dark text-center ml-2 mt-5  ">Patient Relative Details:</h3>
            <div class="form-group m-2  col-6  ">
              <label for="name">Name of Relative:</label>
              <input name="name_pwp" id="name_pwp" value="" class="form-control" placeholder="Name" />
            </div>
            <div class="form-group m-2  col-6  ">
              <label for="name">Relation with Patient:</label>
              <input name="relation" id="relation" value="" class="form-control" placeholder="Relation" />
            </div>
            <div class="form-group m-2  col-6  ">
              <label for="name">Address:</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="address-copy">
                <label class="form-check-label" for="exampleCheckbox">
                  Same as Patient's Address
                </label>
              </div>

              <input name="address_pwp" id="address_pwp" value="" class="form-control" placeholder="Address" />
            </div>
            <div class="row  ">
              <div class="form-check col-3">
                <label for="name">Taluka:</label>
                <input name="taluka_pwp" id="taluka_pwp" value="" class="form-control" placeholder="Taluka" />
              </div>
              <div class="form-check col-3">
                <label for="name">District:</label>
                <input name="district_pwp" id="district_pwp" value="" class="form-control" placeholder="District" />
              </div>
            </div>
            <div class="row  ">
              <div class="form-check col-3">
                <label for="age">Age</label>
                <input class="form-control" placeholder="Age" id="age_pwp" name="age_pwp" value="" />
              </div>
              <div class="form-check col-3">
                <label for="sex">Sex:</label>
                <select class="form-control" name="sex_pwp" id="sex_pwp">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="form-group m-2  col-6  ">
              <label for="mobile">Mobile Number:</label>
              <input type="number" class="form-control" placeholder="mobile" id="mobile_pwp" name="mobile_pwp" />
            </div>
            <h3 class="text-dark text-center ml-2 mt-5  ">General Details:</h3>
            <div class="form-group m-2  col-6  ">
              <label for="rb">Referred By:</label>
              <input name="rb" id="rb" value="" class="form-control" placeholder="Referred By" />
            </div>
            <div class="form-group m-2  col-6  ">
              <label for="pc">Patient Complaints:</label>
              <textarea name="pc" id="pc" value="" class="form-control" placeholder="Patient Complaint"></textarea>
            </div>
            <div class="form-group m-2  ">
              <button type="submit" name="submit" id="submit" class="btn btn-primary mt-2">
                Submit
              </button>
            </div>
          </section>

        </form>
      </div>
    </div>
  </div>
  <script>
    function calculateAge() {
      var dob = document.getElementById('dob_date').value;
      var today = new Date();
      var birthDate = new Date(dob);
      var age = today.getFullYear() - birthDate.getFullYear();
      document.getElementById('age').value = age;
    }
    var nameInput = document.getElementById('name');
    var addressInput = document.getElementById('address');
    var talukaInput = document.getElementById('taluka');
    var districtInput = document.getElementById('district');
    var ageInput = document.getElementById('age');
    var sexInput = document.getElementById('sex');
    var dobInput = document.getElementById('dob_date');
    var regDateInput = document.getElementById('reg_date');
    var mobileInput = document.getElementById('mobile');
    var consultantInput = document.getElementById('consultant');
    var tovInput = document.getElementById('tov');
    var weightInput = document.getElementById('weight');
    var pulseInput = document.getElementById('pulse');
    var bpInput = document.getElementById('bp');
    var tempInput = document.getElementById('temp');
    var namePwpInput = document.getElementById('name_pwp');
    var relationInput = document.getElementById('relation');
    var addressPwpInput = document.getElementById('address_pwp');
    var talukaPwpInput = document.getElementById('taluka_pwp');
    var districtPwpInput = document.getElementById('district_pwp');
    var agePwpInput = document.getElementById('age_pwp');
    var sexPwpInput = document.getElementById('sex_pwp');
    var mobilePwpInput = document.getElementById('mobile_pwp');
    var rbInput = document.getElementById('rb');
    var pcInput = document.getElementById('pc');
    var currentDate = new Date().toISOString().slice(0, 10);
    document.getElementById("reg_date").value = currentDate;
    const addressCheckbox = document.getElementById("address-copy");
    const patientAddress = document.getElementById("address");
    const patientTaluka = document.getElementById("taluka");
    const patientDistrict = document.getElementById("district");
    const pwpTaluka = document.getElementById("taluka_pwp");
    const pwpDistrict = document.getElementById("district_pwp");
    const pwpAddress = document.getElementById("address_pwp");
    const record_id = document.getElementById("record_id");

    addressCheckbox.addEventListener("change", function () {
      if (this.checked) {
        pwpAddress.value = patientAddress.value;
        pwpTaluka.value = patientTaluka.value;
        pwpDistrict.value = patientDistrict.value;
      } else {
        pwpAddress.value = "";
        pwpTaluka.value = "";
        pwpDistrict.value = "";
      }
    });


    var yesRadio = document.getElementById('flexRadioDefault1');
    var noRadio = document.getElementById('flexRadioDefault2');
    yesRadio.addEventListener('change', handleRadioChange);
    noRadio.addEventListener('change', handleRadioChange);
    function handleRadioChange(event) {
      var value = event.target.value;
      if (value === 'yes') {
        performFunctionForYes();
      } else if (value === 'no') {
        performFunctionForNo();
      }
    }
    function performFunctionForYes() {
      document.querySelector(".hide").style.display = "none";
      document.querySelector(".hidden").style.display = "block";
    }
    function performFunctionForNo() {
      document.querySelector(".hide").style.display = "block";
      document.querySelector(".hidden").style.display = "none";
    }
    var mobileSearchInput = document.getElementById('mobile_search');
    var mobileDropdown = document.getElementById('mobile_dropdown');
    mobileSearchInput.addEventListener('input', handleMobileSearch);

    function handleMobileSearch(event) {
      var searchValue = event.target.value;
      fetch('fetch_mobile_numbers.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'search=' + encodeURIComponent(searchValue)
      })
        .then(response => response.json())
        .then(data => {
          mobileDropdown.innerHTML = '';
          data.forEach(mobileNumber => {
            var dropdownItem = document.createElement('a');
            dropdownItem.classList.add('dropdown-item');
            dropdownItem.href = '#';
            dropdownItem.textContent = mobileNumber;
            dropdownItem.addEventListener('click', function () {
              mobileSearchInput.value = mobileNumber;
              mobileDropdown.innerHTML = '';

              fetch('fetch_record_details.php', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'mobile=' + encodeURIComponent(mobileNumber)
              })
                .then(response => response.json())
                .then(details => {
                  nameInput.value = details.name;
                  addressInput.value = details.address;
                  talukaInput.value = details.taluka;
                  districtInput.value = details.district;
                  ageInput.value = details.age;
                  sexInput.value = details.sex;
                  dobInput.value = details.dob_date;
                  regDateInput.value = details.reg_date;
                  mobileInput.value = details.mobile;
                  consultantInput.value = details.consultant;
                  tovInput.value = details.type_of_visit;
                  weightInput.value = details.weight;
                  pulseInput.value = details.pulse;
                  bpInput.value = details.bp;
                  tempInput.value = details.temp;
                  namePwpInput.value = details.name_pwp;
                  relationInput.value = details.relation;
                  addressPwpInput.value = details.address_pwp;
                  talukaPwpInput.value = details.taluka_pwp;
                  districtPwpInput.value = details.district_pwp;
                  agePwpInput.value = details.age_pwp;
                  sexPwpInput.value = details.sex_pwp;
                  mobilePwpInput.value = details.mobile_pwp;
                  rbInput.value = details.referred_by;
                  pcInput.value = details.patient_complaints;
                  record_id.value = details.id;

                  document.querySelector(".hide").style.display = "block";
                  document.querySelector(".hidden").style.display = "none";

                })
                .catch(error => {
                  console.log('Error:', error);
                });
            });
            mobileDropdown.appendChild(dropdownItem);
          });

          mobileDropdown.style.display = 'block';
        })
        .catch(error => {
          console.log('Error:', error);
        });
    }
    document.addEventListener('click', function (event) {
      if (!mobileDropdown.contains(event.target)) {
        mobileDropdown.innerHTML = '';
        mobileDropdown.style.display = 'none';
      }
    });


  </script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>