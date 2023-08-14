<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res0 = $data->fetch_assoc();

  $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
  $data1 = $conn->query($sql1);
  $res1 = $data1->fetch_assoc();

  $sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res3 = $data2->fetch_assoc();

  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

  if(isset($_POST['submit'])){
    $mode_of_arrival = $_POST['mode_of_arrival'];
    $accompanied = isset($_POST['accompanied']) ;
    $relation = $_POST['relation'];
    $contact_person = $_POST['contact_person'];
    $phone_number = $_POST['phone_number'];
    $language = $_POST['language'];
    $interpreter = $_POST['interpereter'];
    $economic_status = $_POST['economic_status'];
    $education_status = $_POST['education_status'];
    $compliant = $_POST['compliant'];
    $weight=$_POST['weight'];
    $pulse=$_POST['pulse'];
    $bp=$_POST['bp'];
    $temp=$_POST['temp'];
    $respiration = $_POST['respiration'];
    $height = $_POST['height'];
    $allergy_drug = $_POST['allergy_drug'];
    $allergy_food = $_POST['allergy_food'];
    $allergy_blood = $_POST['allergy_blood'];
    $tab1 = $_POST['tab1'];
    $tab2 = $_POST['tab2'];
    $tab3 = $_POST['tab3'];
    $submit_name = $_POST['submit_name'];
    $submit_date = $_POST['submit_date'];
    $submit_sign = $_POST['submit_sign'];

    $updateSql = "UPDATE `nurse_intial_assesment` SET 
                 `mode_of_arrival` = '$mode_of_arrival',
                  `accompanied` = '$accompanied',
                 `relation` = '$relation',
                  `contact_person` = '$contact_person',
                  `phone_number` = '$phone_number',
                  `language` = '$language',
                  `interpereter` = '$interpreter',
                  `economic_status` = '$economic_status',
                  `education_status` = '$education_status',
                  `compliant` = '$compliant',
                  `weight`='$weight',
                  `pulse`='$pulse',
                  `bp`='$pulse',
                  `temp`='$pulse',
                  `resperation`= '$respiration',
                  `height` = '$height',
                  `allergy_drug` = '$allergy_drug',
                  `allergy_food` = '$allergy_food',
                  `allergy_blood`= '$allergy_blood',
                  `tab1` = '$tab1',
                  `tab2` = '$tab2',
                  `tab3` = '$tab3',
                  `submit_name` = '$submit_name',
                  `submit_date` = '$submit_date',
                  `submit_sign` = '$submit_sign'
                  WHERE id = '$id'; ";
                  $result=$conn->query($updateSql);
                  if($result){
                    echo "<div class='alert alert-success'>Updated Successfully'</div>";
                }
  }
  
  $query = "SELECT * FROM `nurse_intial_assesment` WHERE `id` = '$id'";
  $dat = $conn->query($query);
  $numRows = $dat->num_rows;
  
  if ($numRows == 1) {
      $res2 = $dat->fetch_assoc();
  } else {
      echo "<div class='alert alert-success'>No data found</div>";
  }
 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Nurse Intial Assesment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    .scroll {
        width: 100%;
        overflow: auto;
        white-space: nowrap;
    }

    body {
        background: lightgray;
        animation: fade-in 1s linear;
    }

    .fl {
        animation: gelatine 1s;
    }

    th tr td {
        background-color: lightgray
    }

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px;
    }

    input[type="text"]::placeholder,
    input[type="time"]::placeholder,
    input[type="date"]::placeholder {
        color: lightgrey;

    }

    textarea[type="text"]::placeholder {
        color: lightgrey;
    }

    hr {
        border: 2px solid black;
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
    input[type="date"] {
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;
        margin: 2px;

    }

    textarea[type="text"] {
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;
    }

    input[type="text"]:focus,
    input[type="time"]:focus,
    input[type="date"]:focus {
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
</head>

<body>
    <form method="POST">
        <div class="container shadow-lg rounded">
            <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
            <a href="nursing_intial_assesment_print.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Print</a>
            <h3 class="text-center text-dark mt-3">Nursing Inital Assesment</h3>
            <div class="row g-3">
                <div class="col-md-2">
                    <label class="form-label ">Name:</label>
                    <?php echo $res0['name']??''; ?>
                </div>
                <div class="col-md-2">
                    <label class="form-label ">Age:</label>
                    <?php echo $res0['age']??''; ?>
                </div>
                <div class="col-md-2">
                    <label class="form-label ">Sex:</label>
                    <?php echo $res0['sex']??''; ?>
                </div>
                <div class="col-md-3">
                    <label class="form-label ">Consultant: </label>
                    <?php echo $res0['consultant'];?>
                </div>
                <div class="col-md-3">
                    <label class="form-label ">Diagnosis:</label>
                    <?php echo $res1['diagnosis'];?>
                </div>
            </div>
            <div class="row">

                <div class="col-md-3">
                    <label class="form-label ">UHID No:</label>
                    <?php echo $res3['uhid'];?>
                </div>
                <div class="col-md-3">
                    <label class="form-label ">IPD No: </label>
                    <?php echo $res3['ipd']; ?>
                </div>
                <div class="col-md-3">
                    <label class="form-label ">ICU/Ward Room No: </label>
                    <?php echo $res3['ward/icu']; ?>
                </div>
                <div class="col-md-3">
                    <label class="form-label ">Bed Number:</label>
                    <?php echo $res3['bed/room'];?>
                </div>
                <div class="col-md-2">
                    <label class="form-label">date:
                    </label>
                    <?php echo $res3['date'];?>
                </div>
            </div>
            <div class="row ">

                <div class="col-md-2">
                    <label class="form-label text-primary">Mode Of Arrival:
                    </label>
                    <select class="form-select" name="mode_of_arrival">
                        <option value="1" <?php if (($res2['mode_of_arrival'] ?? '') == 1) echo 'selected'; ?>>Walking
                        </option>
                        <option value="2" <?php if (($res2['mode_of_arrival'] ?? '') == 2) echo 'selected'; ?>>Wheel
                            Chair</option>
                        <option value="3" <?php if (($res2['mode_of_arrival'] ?? '') == 3) echo 'selected'; ?>>Stretcher
                        </option>
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-4">
                    <div class=" text-danger" style="font-size:20px;display:inline">Patient accompanied on admission :
                    </div>
                    <input type="checkbox" id="myCheckbox" name="accompanied"
                        <?php echo ($res2['accompanied'] == "1") ? "checked" : ""; ?>>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    <label class="form-label text-primary">Relation:</label>
                    <input name="relation" type="text" class="form-control" placeholder="Enter Relation"
                        value="<?php echo $res2['relation'] ?? ''; ?>">


                </div>
                <div class="col-md-3">
                    <label class="form-label text-primary" for="time_ad">Contact Person :</label>
                    <input type="text" class="form-control" name="contact_person" placeholder="Contact Person"
                        value="<?php echo $res2['contact_person'] ?? ''; ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label text-primary">Phone Number:</label>
                    <input name="phone_number" type="number" class="form-control" placeholder="Enter Phone Number"
                        value="<?php echo $res2['phone_number'] ?? ''; ?>">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label text-primary">Primary Language Spoken:</label>
                            <input name="language" id="pc" class="form-control" placeholder="Language Spoken"
                                value="<?php echo $res2['language'] ?? ''; ?>">
                        </div>
                        <div class="col-md-3">

                            <label class="form-label text-primary">Interpreter Need :</label>
                            <select class="form-select" name="interpereter">
                                <option value="1" <?php if (($res2['interpereter'] ?? '') == 1) echo 'selected'; ?>>Yes
                                </option>
                                <option value="3" <?php if (($res2['interpereter'] ?? '') == 3) echo 'selected'; ?>>No
                                </option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label text-primary">Education Status:
                            </label>
                            <select class="form-select" name="education_status">
                                <option value="1" <?php if (($res2['education_status'] ?? '') == 1) echo 'selected'; ?>>
                                    Primary</option>
                                <option value="2" <?php if (($res2['education_status'] ?? '') == 2) echo 'selected'; ?>>
                                    Higher Education</option>
                                <option value="3" <?php if (($res2['education_status'] ?? '') == 3) echo 'selected'; ?>>
                                    Graduate</option>
                                <option value="4" <?php if (($res2['education_status'] ?? '') == 4) echo 'selected'; ?>>
                                    Post Graduate</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label text-primary">Socio Economic Status:
                            </label>
                            <select class="form-select" name="economic_status">
                                <option value="1" <?php if (($res2['economic_status'] ?? '') == 1) echo 'selected'; ?>>
                                    Poor</option>
                                <option value="2" <?php if (($res2['economic_status'] ?? '') == 2) echo 'selected'; ?>>
                                    Average</option>
                                <option value="3" <?php if (($res2['economic_status'] ?? '') == 3) echo 'selected'; ?>>
                                    Good</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-primary">Chief Complaints:</label>
                            <textarea name="compliant" type="text" class="form-control"
                                style="width: 400px; height:100px"><?php echo $res2['compliant'] ?? ''; ?></textarea>

                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-sm-2">
                            <label class="form-label text-primary">Weight</label>
                            <input type="text" name="weight" class="form-control" value=" <?php echo $res2['weight']?? ''; ?>">
                        </div>
                        <div class="col-sm-2">
                            <label class="form-label text-primary">Pulse</label>
                            <input type="text" name="pulse" class="form-control" value=" <?php echo $res2['pulse']?? '';?>">
                        </div>
                        <div class="col-sm-2">
                            <label class="form-label text-primary">BP</label>
                            <input type="text" name="bp" class="form-control" value=" <?php echo $res2['bp']?? '';?>">
                        </div>
                        <div class="col-sm-2">
                            <label class="form-label text-primary">Temperature : </label>
                            <input type="text" name="temp" class="form-control" value="<?php echo $res2['temp']?? '';?>">
                        </div>
                        <div class="col-sm-2">
                            <label class="form-label text-primary">Respiration</label>
                            <input type="text" class="form-control" name="respiration"
                                value="<?php echo $res2['resperation'] ?? ''; ?>">

                        </div>
                        <div class="col-lg-2">
                            <label class="form-label text-primary">Height</label>
                            <input type="text" class="form-control" name="height"
                                value="<?php echo $res2['height'] ?? ''; ?>">

                        </div>
                    </div>
                </div>
                <div class="text-center" style="color:red; margin:15px;">Known or Suspected Allergies To</div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label text-primary">1. Medication & Drugs </label>
                            <textarea name="allergy_drug" type="text" style="height: 100px;"
                                class="form-control"><?php echo $res2['allergy_drug'] ?? ''; ?></textarea>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label text-primary">2. Blood and Transfusion:</label>
                            <textarea name="allergy_blood" type="text" style="height: 100px;"
                                class="form-control"><?php echo $res2['allergy_blood'] ?? ''; ?></textarea>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label text-primary">3.food :</label>
                            <textarea name="allergy_food" type="text" style="height: 100px;"
                                class="form-control"><?php echo $res2['allergy_food'] ?? ''; ?></textarea>

                        </div>
                    </div>
                </div>
            </div class="container">
            <div class="text-center" style="color:red; margin:15px;">ABILITY TO PERFORM ACTIVITIES DAILY LIVING</div>
            <table>
                <tr>
                    <th>Activity</th>
                    <th>Independent</th>
                    <th>Assist</th>
                    <th>Dependent</th>
                </tr>
                <tr>
                    <td>Mobility / Walking</td>
                    <th><input type="text" class="form-control" name="tab1" value="<?php echo $res2['tab1'] ?? ''; ?>">
                    </th>
                    <th><input type="text" class="form-control" name="tab2" value="<?php echo $res2['tab2'] ?? ''; ?>">
                    </th>
                    <th><input type="text" class="form-control" name="tab3" value="<?php echo $res2['tab3'] ?? ''; ?>">
                    </th>
                </tr>
            </table>

            <div class="container">
                <div class="text-center" style="color:red; margin:15px;">FORM COMPLETED BY :</div>
                <div class="row">
                    <div class="col-sm-2">
                        <label class="form-label text-primary">Name</label>
                        <input type="text" class="form-control" name="submit_name"
                            value="<?php echo isset($res2['submit_name'] )?$res2['submit_name'] : '';?>">
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label text-primary">Signature</label>
                        <input type="text" class="form-control" name="submit_sign"
                            value="<?php echo $res2['submit_sign'] ?? ''; ?>">

                    </div>
                    <div class="col-sm-2">
                        <label class="form-label text-primary">Date :</label>
                        <input type="date" class="form-control" name="submit_date"
                            value="<?php echo $res2['submit_date'] ?? ''; ?>">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary m-2" name="submit">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>