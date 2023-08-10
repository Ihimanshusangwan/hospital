<!DOCTYPE html>
<?php
$id=$_GET['id'];
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
        <a href="details.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
        <div class="row p-4 pt-4">
            <div class="col shadow-lg rounded m-2 p-4">
                <h3 class="text-dark text-center ml-2"> Update Patient Details:</h3>
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

                    if (empty($nameErr)) {

                        $sql = "UPDATE patient_records SET
              is_old_patient = '$is_old_patient',
              name = '$name',
              address = '$address',
              taluka = '$taluka',
              district = '$district',
              age = '$age',
              sex = '$sex',
              dob_date = '$dob_date',
              reg_date = '$reg_date',
              mobile = '$mobile',
              consultant = '$consultant',
              type_of_visit = '$tov',
              name_pwp = '$name_pwp',
              address_pwp = '$address_pwp',
              taluka_pwp = '$taluka_pwp',
              district_pwp = '$district_pwp',
              age_pwp = '$age_pwp',
              relation = '$relation',
              sex_pwp = '$sex_pwp',
              mobile_pwp = '$mobile_pwp',
              referred_by = '$referred_by',
              patient_complaints = '$patient_complaints',
              is_eye = $is_eye,
              is_ortho = $is_ortho
            WHERE id = '$id';";
                        $conn->query($sql);

                        $sql = "UPDATE patient_info SET weight='$weight', pulse='$pulse', bp='$bp', temp='$temp' WHERE patient_id='$id';";
                        $conn->query($sql);

                        echo "<span style='color:green;'>Patient updated successfully</span>";
                    } else {
                        echo "<span style='color:red;'>Name is required</span>";
                    }
                }
                ?>
                <form id="form" action="" method="POST" enctype="multipart/form-data">
                    <?php 
    $sql = "select * from patient_records join patient_info on patient_records.id = patient_info.patient_id where patient_records.id = $id;";
    $res=$conn->query($sql)->fetch_assoc();
    // print_r($res);
                    ?>
                    <div class="form-group m-2">
                        <div class="row">
                            <label>Are you an Old Patient of this hospital ?</label>
                            <div class="form-check col-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" value="yes" <?php echo($res['is_old_patient']=="yes")?"checked": "";?>  />
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check col-3">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" value="no" <?php echo($res['is_old_patient']=="no")?"checked": "";?>  />
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="record_id" value="123" id="record_id">
                    <section class="hide">
                        <div class="form-group m-2 col-6  ">
                            <label for="name">Name of patient:</label>
                            <input name="name" id="name" value="<?php echo $res['name'];?>" class="form-control" placeholder="Name"  />
                        </div>
                        <div class="form-group m-2 col-6  ">
                            <label for="name">Address:</label>
                            <input name="address" id="address" value="<?php echo $res['address'];?>" class="form-control" placeholder="Address" />
                        </div>

                        <div class="row  ">
                            <div class="form-check col-3">
                                <label for="name">Taluka:</label>
                                <input name="taluka" id="taluka" value="<?php echo $res['taluka'];?>" class="form-control" placeholder="Taluka" />
                            </div>
                            <div class="form-check col-3">
                                <label for="name">District:</label>
                                <input name="district" id="district" value="<?php echo $res['district'];?>"  class="form-control"
                                    placeholder="District" />
                            </div>
                        </div>


                        <div class="row  ">
                            <div class="form-check col-3">
                                <label for="reg_date">Date of Birth:</label>
                                <input type="date" class="form-control" placeholder="dob_date" id="dob_date"
                                    name="dob_date" value="<?php echo $res['dob_date'];?>"  onchange="calculateAge()" />
                            </div>
                            <div class="form-check col-3">
                                <label for="age">Age</label>
                                <input class="form-control" placeholder="Age" id="age" name="age"value="<?php echo $res['age'];?>"  />
                            </div>
                        </div>
                        <div class="row  ">
                            <div class="form-check col-3">
                                <label for="reg_date">Reg Date:</label>
                                <input type="date" class="form-control" placeholder="reg_date" id="reg_date"
                                    name="reg_date" value="<?php echo $res['reg_date'];?>"  />
                            </div>
                            <div class="form-check col-3">
                                <label for="sex">Sex:</label>
                                <select class="form-control" name="sex" id="sex">
                                    <option value="Male" <?php ($res['sex']=="Male")?"selected":""; ?>>Male</option>
                                    <option value="Female" <?php ($res['sex']=="Female")?"selected":""; ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-2 col-6  ">
                            <label for="mobile">Mobile Number:</label>
                            <input type="number" class="form-control" placeholder="mobile" id="mobile" name="mobile" value="<?php echo $res['mobile'];?>" />
                        </div>
                        <div class="form-group m-2 col-6  ">
                            <label for="consultant">Consultant:</label>
                            <select class="form-control" name="consultant" required id="consultant">
                                <?php
                                $sql = "SELECT name FROM doctors;";
                                $result = $conn->query($sql);
                                while ($values = $result->fetch_assoc()) {
                                    $selected = ($res['consultant']==$values['name'])? "selected":"";

                                    echo '
                  <option value="' . $values['name'] . '" '.$selected.' >
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
                                $result = $conn->query($sql);
                                while ($values = $result->fetch_assoc()) {
                                    $selected = ($res['type_of_visit']==$values['type'])? "selected":"";
                                    echo '
                  <option value="' . $values['type'] . '" '.$selected.'>
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
                                    <input name="weight" type="text" class="form-control" id="weight" value="<?php echo $res['weight'];?>"
                                        placeholder="Enter Weight">
                                </div>
                                <div class="col-sm-2">
                                    <label class="form-label">Pulse</label>
                                    <input name="pulse" type="text" class="form-control" id="pulse" value="<?php echo $res['pulse'];?>"
                                        placeholder="Enter pulse">
                                </div>
                                <div class="col-sm-2">
                                    <label class="form-label">BP</label>
                                    <input name="bp" type="text" class="form-control" value="<?php echo $res['bp'];?>" id="bp" placeholder="Enter BP">
                                </div>
                                <div class="col-sm-2">
                                    <label class="form-label">Temperature</label>
                                    <input name="temp" type="text" class="form-control" id="temp" value="<?php echo $res['temp'];?>"
                                        placeholder="Enter Temperature">
                                </div>
                            </div>
                        </div>
                        <h3 class="text-dark text-center ml-2 mt-5  ">Patient Relative Details:</h3>
                        <div class="form-group m-2  col-6  ">
                            <label for="name">Name of Relative:</label>
                            <input name="name_pwp" id="name_pwp" value="<?php echo $res['name_pwp'];?>"class="form-control" placeholder="Name" />
                        </div>
                        <div class="form-group m-2  col-6  ">
                            <label for="name">Relation with Patient:</label>
                            <input name="relation" id="relation"value="<?php echo $res['relation'];?>" class="form-control" placeholder="Relation" />
                        </div>
                        <div class="form-group m-2  col-6  ">
                            <label for="name">Address:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="address-copy">
                                <label class="form-check-label" for="exampleCheckbox">
                                    Same as Patient's Address
                                </label>
                            </div>

                            <input name="address_pwp" id="address_pwp" value="<?php echo $res['address_pwp'];?>"class="form-control"
                                placeholder="Address" />
                        </div>
                        <div class="row  ">
                            <div class="form-check col-3">
                                <label for="name">Taluka:</label>
                                <input name="taluka_pwp" id="taluka_pwp" value="<?php echo $res['taluka_pwp'];?>" class="form-control"
                                    placeholder="Taluka" />
                            </div>
                            <div class="form-check col-3">
                                <label for="name">District:</label>
                                <input name="district_pwp" id="district_pwp" value="<?php echo $res['district_pwp'];?>" class="form-control"
                                    placeholder="District" />
                            </div>
                        </div>
                        <div class="row  ">
                            <div class="form-check col-3">
                                <label for="age">Age</label>
                                <input class="form-control" placeholder="Age" id="age_pwp" name="age_pwp" value="<?php echo $res['age_pwp'];?>" />
                            </div>
                            <div class="form-check col-3">
                                <label for="sex">Sex:</label>
                                <select class="form-control" name="sex_pwp" id="sex_pwp">
                                    <option value="Male" <?php ($res['sex_pwp']=="Male")?"selected":""; ?>>Male</option>
                                    <option value="Female" <?php ($res['sex_pwp']=="Female")?"selected":""; ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-2  col-6  ">
                            <label for="mobile">Mobile Number:</label>
                            <input type="number" class="form-control" placeholder="mobile" value="<?php echo $res['mobile_pwp'];?>" id="mobile_pwp"
                                name="mobile_pwp" />
                        </div>
                        <h3 class="text-dark text-center ml-2 mt-5  ">General Details:</h3>
                        <div class="form-group m-2  col-6  ">
                            <label for="rb">Referred By:</label>
                            <input name="rb" id="rb" value="<?php echo $res['referred_by'];?>" class="form-control" placeholder="Referred By" />
                        </div>
                        <div class="form-group m-2  col-6  ">
                            <label for="pc">Patient Complaints:</label>
                            <textarea name="pc" id="pc"  class="form-control"
                                placeholder="Patient Complaint"><?php echo $res['patient_complaints'];?></textarea>
                        </div>
                        <div class="form-group m-2  ">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary mt-2">
                                Update
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
        const patientAddress = document.getElementById("address");
        const patientTaluka = document.getElementById("taluka");
        const patientDistrict = document.getElementById("district");
        const pwpTaluka = document.getElementById("taluka_pwp");
        const pwpDistrict = document.getElementById("district_pwp");
        const pwpAddress = document.getElementById("address_pwp");
        
    const addressCheckbox = document.getElementById("address-copy");

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