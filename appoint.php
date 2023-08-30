<!DOCTYPE html>
<html lang="en">
<?php
require("admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
?>

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
  </style>
</head>

<body style="background-color: #90D0E5;">
  <div class="container mb-4">
    <h1>
      <marquee style="color: purple;" BEHAVIOUR="slide" scrollnount="70" scrolledeley="100">
        <?php echo $title['title'] ?>
      </marquee>
    </h1>
    <a href="index.html" class="btn btn-success m-2">Dashboard</a>
    <div class="row p-4 pt-4">
      <div class="col shadow-lg rounded m-2 p-4">
        <h3 class="text-dark text-center ml-2">Patient Details:</h3>
        <?php

        // Check if form is submitted
        if (isset($_POST['submit'])) {

          //initializing error variables
          $nameErr = $addressErr = $talukaErr = $districtErr = $ageErr = $sexErr = $dob_dateErr = $reg_dateErr = $mobileErr = $consultantErr = $tovErr = $bpErr = $pulseErr = $tempErr = $weightErr = "";
          // Check if name is entered
          if (empty($_POST['name'])) {
            $nameErr = "Name is required";
          } else {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
          }

          // Check if address is entered
          if (empty($_POST['address'])) {
            $addressErr = "Address is required";
          } else {
            $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
            ;
          }
          $age = $_POST['age'];

          // Check if taluka is entered
          if (empty($_POST['taluka'])) {
            $talukaErr = "Taluka is required";
          } else {
            $taluka = filter_var($_POST['taluka'], FILTER_SANITIZE_STRING);
          }

          // Check if district is entered
          if (empty($_POST['district'])) {
            $districtErr = "District is required";
          } else {
            $district = filter_var($_POST['district'], FILTER_SANITIZE_STRING);
          }

        

          // Check if sex is selected
          if (empty($_POST['sex'])) {
            $sexErr = "Sex is required";
          } else {
            $sex = $_POST['sex'];
          }

          // Check if dob_date is entered
          if (empty($_POST['dob_date'])) {
            $dob_dateErr = "Date of birth is required";
          } else {
            $dob_date = $_POST['dob_date'];
          }

          // Check if reg_date is entered
          if (empty($_POST['reg_date'])) {
            $reg_dateErr = "Registration date is required";
          } else {
            $reg_date = $_POST['reg_date'];
          }

          // Check if mobile is entered
          if (empty($_POST['mobile'])) {
            $mobileErr = "Mobile number is required";
          } else {
            $mobile = $_POST['mobile'];
          }
          // Check if consultant is entered
          if (empty($_POST['consultant'])) {
            $consultantErr = "consultant is required";
          } else {
            $consultant = $_POST['consultant'];
          }
          // Check if tov is selected
        

          $is_old_patient = $_POST['flexRadioDefault'];
          $referred_by = $_POST['rb'];
          $patient_complaints = $_POST['pc'];
          $tov = $_POST['tov'];

          // If no errors, insert data into database
          if (empty($nameErr) && empty($addressErr) && empty($talukaErr) && empty($districtErr) && empty($ageErr) && empty($sexErr) && empty($dob_dateErr) && empty($reg_dateErr) && empty($mobileErr) && empty($mailErr) && empty($passErr) && empty($tovErr) && empty($consultantErr) && empty($bpErr) && empty($pulseErr) && empty($weightErr) && empty($tempErr)) {

            $sql = "INSERT INTO patient_records (is_old_patient,name, address, taluka, district, age, sex,dob_date, reg_date, mobile,consultant,referred_by,patient_complaints,is_registered,is_eye,is_ortho,type_of_visit)
            VALUES ('$is_old_patient','$name', '$address', '$taluka', '$district', '$age', '$sex', '$dob_date', '$reg_date', '$mobile','$consultant', '$referred_by','$patient_complaints',0,1,1,'$tov')";

            if ($conn->query($sql) === TRUE) {
              $inserted_patient_id = $conn->insert_id;
              $sql = "INSERT INTO patient_info(patient_id) VALUES($inserted_patient_id);";
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

              $sql6 = "INSERT INTO p_log(id,username,password) VALUES($inserted_patient_id,$mobile,$mobile);";
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
                
                $sql26= "INSERT INTO opto_ascan(id) VALUES($inserted_patient_id);";
                $conn->query($sql26);

                $sql27 = "INSERT INTO opto_examination(id) VALUES($inserted_patient_id);";
                $conn->query($sql27);

                $sql28 = "INSERT INTO opto_surgery(id) VALUES($inserted_patient_id);";
                $conn->query($sql28);

                $sql29 = "INSERT INTO cc_glass_rx(id) VALUES($inserted_patient_id);";
                $conn->query($sql29);
                
              $sql29 = "INSERT INTO pres_back(id) VALUES($inserted_patient_id);";
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
                              
              
                              $sql44 = "INSERT INTO permission(id) VALUES($inserted_patient_id);";
                              $conn->query($sql44);
              
                              $sql42 = "INSERT INTO feedback_english(id) VALUES($inserted_patient_id);";
                              $conn->query($sql42);
              
                              $sql43 = "INSERT INTO feedback_marthi(id) VALUES($inserted_patient_id);";
                              $conn->query($sql43);
                              
              $sql41 = "INSERT INTO room_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql41);
                    
              $sql42 = "INSERT INTO operation_record(id) VALUES($inserted_patient_id);";
              $conn->query($sql42);

              $sql44 = "INSERT INTO anumati_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql44);

              $sql45 = "INSERT INTO counselling_consent(id) VALUES($inserted_patient_id);";
              $conn->query($sql45);
              $sql46= "INSERT INTO opd_bill_pay(patient_id) VALUES('$inserted_patient_id');";
              $conn->query($sql46);
              
              $sql47= "INSERT INTO an_record(id) VALUES('$inserted_patient_id');";
              $conn->query($sql47);
              $sql48= "INSERT INTO dis_sum(id) VALUES('$inserted_patient_id');";
              $conn->query($sql48);
              $sql49= "INSERT INTO doctor_inpatient(id) VALUES('$inserted_patient_id');";
              $conn->query($sql49);
              $sql50= "INSERT INTO in_reg(id) VALUES('$inserted_patient_id');";
              $conn->query($sql50);
              $sql51= "INSERT INTO indoor_case(id) VALUES('$inserted_patient_id');";
              $conn->query($sql51);
              $sql52= "INSERT INTO injection_consent(id) VALUES('$inserted_patient_id');";
              $conn->query($sql52);
              $sql53= "INSERT INTO invest_sheet(id) VALUES('$inserted_patient_id');";
              $conn->query($sql53);
              $sql54= "INSERT INTO nutri_assessment(id) VALUES('$inserted_patient_id');";
              $conn->query($sql54);
              $sql29 = "INSERT INTO cc_glass_rx1(id) VALUES($inserted_patient_id);";
              $conn->query($sql29);

              $description = '{"0":{"name":"Eye Cleaned","value":"off"},"1":{"name":"Dressing with betadine solution done","value":"off"},"2":{"name":"Peribulbar block/LA with 6ml of 2% lignocaine and adreline injected.","value":"off"},"3":{"name":"Dressing with betadine done","value":"off"},"4":{"name":"Eye Drapping Done","value":"off"},"5":{"name":"Pterygium mass excised","value":"off"},"6":{"name":"Mild cautery applied","value":"off"},"7":{"name":"Corneal surface smoothed with crescent blade","value":"off"},"8":{"name":"Amminiotic Membrane Graft applied over bare surface and sutured with 10-0 vicryl","value":"off"},"9":{"name":"Eye draped removed","value":"off"},"10":{"name":"5% betadine eye drop applied","value":"off"},"11":{"name":"Eye Patched","value":"off"},"12":{"name":"Surgery concluded","value":"off"}}';

              $update_last = "UPDATE `cor1` SET  description = '$description' WHERE id = '$inserted_patient_id';";
              $conn->query($update_last);
              echo "<span style='color:green;'>Appointment booked successfully</span>";
              // redirect to the same page to prevent form resubmission
              // header("Location: " . $_SERVER["PHP_SELF"]);
              // exit();       
            } else {
              echo "Error: ";
            }
          } else {
            echo "<span style='color:red;'>please fill all required fields correctly!</span>";
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
          <section class="search" style="display: none;">
            <div id="alertContainer" class="alert alert-danger mt-2" style="display: none;">
              No matching records found.
            </div>

            <div class="form-group m-2 col-6">
              <label for="name">Name of patient:</label>
              <input name="search_name" id="search_name" value="" class="form-control" placeholder="Name" />
            </div>
            <div class="form-group m-2 col-6">
              <label for="mobile">Mobile Number:</label>
              <input type="number" class="form-control" placeholder="mobile" id="search_mobile" name="search_mobile" />
            </div>
            <div class="form-group m-2">
              <button type="button" name="search_submit" id="search_submit" class="btn btn-primary mt-2">
                Search
              </button>
            </div>

          </section>
          <section class="hidden">

            <div class="form-group m-2 col-6">
              <label for="name">Name of patient:</label>
              <input name="name" id="name" value="" class="form-control" placeholder="Name" />
            </div>
            <div class="form-group m-2 col-6">
              <label for="name">Address:</label>
              <input name="address" id="address" value="" class="form-control" placeholder="Address" />
            </div>

            <div class="row">
              <div class="form-check col-3">
                <label for="name">Taluka:</label>
                <input name="taluka" id="taluka" value="" class="form-control" placeholder="Taluka" />
              </div>
              <div class="form-check col-3">
                <label for="name">District:</label>
                <input name="district" id="district" value="" class="form-control" placeholder="District" />
              </div>
            </div>


            <div class="row">
              <div class="form-check col-3">
                <label for="reg_date">Date of Birth:</label>
                <input type="date" class="form-control" placeholder="dob_date" id="dob_date" name="dob_date"
                  value="15-10-1995" onchange="calculateAge()" />
              </div>
              <div class="form-check col-3">
                <label for="age">Age</label>
                <input class="form-control" placeholder="Age" id="age" name="age" value=""  />
              </div>

            </div>
            <div class="row">

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
            <div class="form-group m-2 col-6">
              <label for="mobile">Mobile Number:</label>
              <input type="number" class="form-control" placeholder="mobile" id="mobile" name="mobile" />
            </div>
            <div class="form-group m-2 col-6">
              <label for="consultant">Consultant:</label>
              <select class="form-control" name="consultant" id="consultant" required onchange="changeType()">
              <?php
                $sql = "SELECT name,type_of_visit FROM doctors;";
                $res = $conn->query($sql);
                $typeData = array();
                while ($values = $res->fetch_assoc()) {
                  $typeData["{$values['name']}"] = $values['type_of_visit'];
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
             <input type="text" class="form-control" name="tov" id="tov" readonly>
            </div>
              <?php

              $conn->close();
              ?>

            <div class="container mt-4">

            </div>

            <h3 class="text-dark text-center ml-2 mt-5">General Details:</h3>
            <div class="form-group m-2  col-6">
              <label for="rb">Referred By:</label>
              <input name="rb" id="rb" value="" class="form-control" placeholder="Referred By" />
            </div>
            <div class="form-group m-2  col-6">
              <label for="pc">Patient Complaints:</label>
              <textarea name="pc" id="pc" value="" class="form-control" placeholder="Patient Complaint"></textarea>
            </div>
            <div class="form-group m-2">
              <button type="submit" name="submit" id="submit" class="btn btn-primary mt-2">
                Submit
              </button>
            </div>
        </form>

        </section>
      </div>
    </div>
  </div>
  <script>
    var changeType = () => {
      tovInput.value = typeData[consultantInput.value];
    }
    var typeData = <?php echo json_encode($typeData); ?>;
    var consultantInput = document.getElementById('consultant');
    var tovInput = document.getElementById('tov');
    changeType();
    function calculateAge() {
      var dob = document.getElementById('dob_date').value;
      var today = new Date();
      var birthDate = new Date(dob);
      var age = today.getFullYear() - birthDate.getFullYear();
      document.getElementById('age').value = age;
    }
    var searchSection = document.querySelector('.search');
    var hiddenSection = document.querySelector('.hidden');
    document.addEventListener('DOMContentLoaded', function () {
      var submitBtn = document.getElementById('search_submit');

      submitBtn.addEventListener('click', function () {
        var name = document.getElementById('search_name').value;
        var mobile = document.getElementById('search_mobile').value;

        var searchData = {
          name: name,
          mobile: mobile
        };

        // Send the data to the PHP file
        fetch('search.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(searchData)
        })
          .then(function (response) {
            return response.json();
          })
          .then(function (data) {
            if ('error' in data) {
              document.getElementById('alertContainer').style.display = 'block';
            } else {
              // Fill the fetched data into the respective fields
              document.getElementById('name').value = data.name;
              document.getElementById('address').value = data.address;
              document.getElementById('taluka').value = data.taluka;
              document.getElementById('district').value = data.district;
              document.getElementById('age').value = data.age;
              document.getElementById('sex').value = data.sex;
              document.getElementById('dob_date').value = data.dob_date;
              document.getElementById('mobile').value = data.mobile;
              document.getElementById('consultant').value = data.consultant;
              document.getElementById('rb').value = data.referred_by;
              document.getElementById('pc').innerHTML = data.patient_complaints;


              searchSection.style.display = 'none';
              hiddenSection.style.display = 'block';
            }
          })
          .catch(function (error) {
            console.error('Error:', error);
          });
      });
    });

    document.addEventListener('DOMContentLoaded', function () {
      var yesRadio = document.getElementById('flexRadioDefault1');
      var noRadio = document.getElementById('flexRadioDefault2');

      yesRadio.addEventListener('change', function () {
        if (this.checked) {
          searchSection.style.display = 'block';
          hiddenSection.style.display = 'none';
        }
      });

      noRadio.addEventListener('change', function () {
        if (this.checked) {
          searchSection.style.display = 'none';
          hiddenSection.style.display = 'block';
        }
      });
    });
  </script>
  <script>

    var currentDate = new Date().toISOString().slice(0, 10);
    document.getElementById("reg_date").value = currentDate;
    const addressCheckbox = document.getElementById("address-copy");
    const patientAddress = document.getElementById("address");
    const patientTaluka = document.getElementById("taluka");
    const patientDistrict = document.getElementById("district");
    const pwpTaluka = document.getElementById("taluka_pwp");
    const pwpDistrict = document.getElementById("district_pwp");
    const pwpAddress = document.getElementById("address_pwp");

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
  </script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>