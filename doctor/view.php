<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if (!isset($_SESSION['doctor_id'])) {
    header("location:login.php");
}
require("../admin/connect.php");
error_reporting(0);
$id = $_GET['id'];
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
$sql = "update patient_records set is_viewed = 1 where id =$id;";
$conn->query($sql);

if (isset($_POST['add_follow'])) {

    if (isset($_POST['follow_up']) && $_POST['follow_up'] !== '') {
        $date = $_POST['follow_up'];
        $sql = "UPDATE `patient_records` SET `is_followup`='1', `follow_date`='$date' WHERE `id`='$id';";
        $res = $conn->query($sql);

    }
    //  else{
//     $selectedDuration = intval($_POST['follow_duration']); // Get the selected duration in days

    //     $currentDate = date('Y-m-d'); // Get the current date
//     $newDate = date('Y-m-d', strtotime($currentDate . ' + ' . $selectedDuration . ' days')); 

    //     $sql = "UPDATE `patient_records` SET `is_followup`='1', `follow_date`='$newDate' WHERE `id`='$id';";
//     $res = $conn->query($sql);
//  }
}

if (isset($_POST['template_btn'])) {
    $temp = "SELECT * FROM template WHERE id = '{$_POST['template_id']}'";
    $template = $conn->query($temp)->fetch_assoc();

    $sql = "UPDATE patient_info SET chief_complaint = '{$template['complaints']}' WHERE patient_id = $id;";
    $conn->query($sql);
    $sql = "UPDATE patient_info SET examination = '{$template['examination']}' WHERE patient_id = $id;";
    $conn->query($sql);

    // Unserialize the data to get the PHP array
    $unserializedArray = unserialize($template['prescription']);

    // Iterate through the array and insert data into the prescription table
    foreach ($unserializedArray as $key => $data) {
        $med_name = $data['med_name'];
        $quantity = $data['quantity'];
        $morning = $data['morning'];
        $afternoon = $data['afternoon'];
        $night = $data['night'];
        $days = $data['days'];
        $eat = $data['eat'];
        $type = $data['type'];

        // Assuming $conn is your database connection variable
        $sql = "INSERT INTO prescription (patient_id,med_name,quantity,morning,afternoon,night,days,eat,type) 
            VALUES ($id,'$med_name','$quantity','$morning','$afternoon','$night','$days','$eat','$type')";

        $conn->query($sql);

    }

    $sql = "UPDATE patient_info SET diagnosis = '{$template['diagnosis']}' WHERE patient_id = $id;";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Template Applied Successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error occured</div>";
    }

}

?>
<script> const Id = <?php echo $id; ?>;</script>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="../dropdown_styles.css">
    <link rel="stylesheet" href="../chat.css">
    <script src="../chat.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Full-screen popup */
        .lab-popup {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* Popup content */
        .lab-popup-content {
            position: relative;
            margin: auto;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            background-color: #fefefe;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        /* Close button */
        .lab-popup-close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Checkboxes */
        .lab-checkbox {
            margin-bottom: 10px;
        }

        #selectBoxContainer {
            transition: all 0.5s ease-in-out;
        }

        /* Add this CSS to your stylesheet or style block */
        /* Add this CSS to your stylesheet or style block */



        .modal-header .close {
            padding-right: 9px;
            padding-left: 9px;
            font-size: 1.9rem;
            background-color: white;
            border: none;
            color: black;
            opacity: 0.7;
            transition: opacity 0.2s ease-in-out;
        }

        .modal-header .close:hover {
            opacity: 1;
        }

        #followup-charges select option {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        canvas {
            width: 100%;
            border: 2px solid black;
            height:70vh;
            
        }
        #tools {
            display: flex;
        }
        #colors {
            display: flex;
            margin-left: 10px;
        }
        .color {
            width: 20px;
            height: 20px;
            cursor: pointer;
            margin-right: 5px;
        }
       
    </style>
   


    <script>
        var item2 = 0;
        var arr = ['X-ray', 'CT-SCAN', 'MRI', "Lab", "U.S.G"];
        var used = [];

        function addItem() {
            if (arr.length > 0) {
                item2++;
                var html = "<tr>";
                html += "<td>" + arr[0] + "</td>";
                html += "<input type='hidden' name='test_type_" + item2 + "' value ='" + arr[0] + "' </input>";
                html += "<td><textarea type='text' name='desc_" + item2 + "'></textarea>";
                html += "<td><button class='btn btn-primary' type='button' onclick='deleteRow(this);'>Delete</button></td>"
                html += "</tr>";
                var row = document.getElementById("tbody2").insertRow();
                row.innerHTML = html;
                var valueToRemove = arr[0];
                var index = arr.indexOf(valueToRemove);
                arr.splice(index, 1);
                used.push(valueToRemove);
            }
        }

        function deleteRow(button) {
            var target = button.parentElement.parentElement.children[0];
            var type = target.innerHTML;
            var index = used.indexOf(type);
            used.splice(index, 1);
            arr.push(type);
            button.parentElement.parentElement.children[2].children[0].value = "";
            target.parentElement.style.display = "none";

        }
    </script>
    <title> <?php echo $title['do'] ?></title>
</head>

<body style="background-color: #90D0E5;">
,
    <?php require("../chat.php"); ?>
    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <h1>
                <marquee style="color: purple;" BEHAVIOUR="slide" scrollnount="70" scrolledeley="100">
                    <?php echo $title['do'] ?>
                </marquee>
            </h1>
        </h1>
        <div class="row">
            <div class="col-6">
                <a href="doctorPage.php" class="btn btn-primary m-2">Dashboard</a>
                <a href="image_gallery.php" class="btn btn-primary m-2">Image Gallery</a>

                <button class="btn btn-primary m-2 receipt" type="button">Print</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Use Templates
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Open Canvas
  </button>


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="tools">
        <button id="pen" class="btn btn-primary btn-sm m-2">Pen</button>
        <button id="eraser"  class="btn btn-danger btn-sm m-2">Eraser</button>
        <div id="colors" class="m-2">
            <div class="color" style="background-color: red;"></div>
            <div class="color" style="background-color: green;"></div>
            <div class="color" style="background-color: blue;"></div>
            <div class="color" style="background-color: yellow;"></div>
            <div class="color" style="background-color: black;"></div>
        </div>
    </div>
    <canvas id="drawingCanvas" width="100" height="100"></canvas>
        <div class="modal-footer">
          <button type="button" id="saveButton" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
  <?php

  // Fetch uploaded files for the user from the database
  $sql = "SELECT * FROM reports WHERE patient_id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo '<div class="col-5">
    <h4>Reports</h4>
     <ul class="list-group">';
      while ($row = $result->fetch_assoc()) {
          $fileName = basename($row["path"]);
          $filePath = $row["path"];

          echo '<li class="list-group-item">
                <a href="#" class="file-link" data-file="' . $filePath . '">' . $fileName . '</a>
             </li>';
      }
      echo '</ul></div>';
  }
  ?>
                <?php
                $sql = "select uhid from p_insure where id = $id;";
                $result = $conn->query($sql)->fetch_assoc();
                $uhid = $result['uhid'];
                $sql = "select patient_records.reg_date,patient_records.visit_count,p_insure.id from patient_records join p_insure on patient_records.id = p_insure.id where p_insure.uhid = '$uhid' and p_insure.id < $id and patient_records.is_deleted = 0 order by patient_records.visit_count desc;";
                $previousVisit = $conn->query($sql);
                if ($previousVisit->num_rows > 0) {
                    echo '<div class="form-group ">
                    <div class="form-label "><strong>Previous visits: </strong></div> <select class="form-control-sm " onchange="previousVisit(this)"><option  ">Select</option>';
                    while ($row = $previousVisit->fetch_assoc()) {
                        echo "<option value='{$row['id']}' >Visit No. {$row['visit_count']} on {$row['reg_date']}</option>";
                    }
                    echo '</select></div>';
                }

                ?>
                



            </div>
            <div class="col-4">
                <form method="POST">
                    <?php
                    $sql = "SELECT * FROM patient_records WHERE id = $id;";
                    $res = $conn->query($sql)->fetch_assoc();
                    if ($res['is_followup'] == 0) {
                        echo '<div class="row">
                                       <div class="col-5">
                                       <input type="date" name="follow_up" class="m-1 form-control-sm" id="follow-up-date" onchange="showDay(this)" >
                                       </div>
                                       <div class="col-5">
                                       <select name="follow_duration" class="m-1 form-control-sm" onchange="calculateFollowUpDate()" >
                                       <option value="none" disabled selected>none</option>
                                       <option value="1">1 day</option>
                                       <option value="2">2 days</option>
                                       <option value="3">3 days</option>
                                       <option value="5">5 days</option>
                                       <option value="7">1 week</option>
                                       <option value="10">10 days</option>
                                       <option value="15">15 days</option>
                                       <option value="20">20 days</option>
                                       <option value="30">1 month</option>
                                       <option value="45">1.5 months</option>
                                       <option value="60">2 months</option>
                                       <option value="90">3 months</option>
                                   </select>
                                       </div> 
                                       <div class="col-5">
                                       <span id="follow-up-day" ></span>
                                       </div>          
                                       <div class="col-6">
                                       <button class="btn btn-success" name="add_follow">Add Follow Up</button>
                                       </div>          
                                   </div>';

                    } else {
                        echo '<div>
                                    <button  class="btn btn-success" disabled>
                                Follow Up Date</button><input type="text" class="mx-3"  value="' . $res['follow_date'] . '" readonly>
                                    </div>';

                    }


                    $sql = "SELECT is_admited FROM patient_records WHERE id = $id;";
                    $res = $conn->query($sql)->fetch_assoc();
                    if ($res['is_admited'] == 0) {
                        echo '<input type="submit" class="btn btn-secondary  my-2" name="admit_patient" value="Admit Patient">';

                    } else {
                        echo '<input type="button" class="btn btn-success  my-2"  value="Patient Admited" disabled>';
                    }
                    echo '<div class="row" >
                                <select id="selectBoxContainer" style="display: none; class="form-control ">
                                ';

                    $sql = "SELECT name FROM doctors WHERE type_of_visit != '{$_SESSION['doctor_type']}'";
                    $res = $conn->query($sql);
                    while ($values = $res->fetch_assoc()) {
                        echo '
                                  <option value="' . $values['name'] . '">
                                    ' . $values['name'] . '
                                  </option>
                                  ';
                    }

                    echo '
                                </select><button id="final-referButton" class="btn btn-primary " style="display: none;" p-id="' . $id . '" >Refer </button></div>
                            <button id="referButton" class="btn btn-warning  " >Refer Patient</button>';
                    ?>
                </form>



            </div>
            <div class="col-2">
                <div class=" shadow-lg rounded-3 p-2">
                    <h6>
                        Add Opd Charge:
                    </h6>

                    <div id="charge-save-alert">
                        <?php
                        $opd = "select * from opd_bill where patient_id = $id;";
                        $opd_res = $conn->query($opd);
                        if ($opd_res->num_rows > 0) {
                            echo '<div class="alert alert-success" role="alert">Charges Added </div>';

                        }


                        ?>

                    </div>
                    <select class="form-control-sm" id="followup-charge" style="width: 100%;">
                        <?php
                        $opd = "select * from opd_charges where 1;";
                        $opd_res = $conn->query($opd);
                        while ($row = $opd_res->fetch_assoc()) {
                            echo <<<data
                    <option value="{$row['id']}" >{$row['description']}</option>
data;

                        }


                        ?>
                    </select>
                    <button class="btn btn-sm btn-success m-2 " id="charge-add-btn">Add</button>
                </div>


            </div>
        </div>
        <!-- Modal -->


        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"> Available Templates (click to use)</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php
                        $template = "SELECT id,name FROM template WHERE doctor_id = '{$_SESSION['doctor_id']}'";
                        $result_of_template = $conn->query($template);
                        if ($result_of_template->num_rows > 0) {
                            echo "<div class='row'>";
                            while ($row = $result_of_template->fetch_assoc()) {
                                $template_id = $row['id'];
                                $template_name = htmlspecialchars($row['name']);
                                ?>
                                                                                                <div class="col">
                                                                                                    <form action="" method="post">
                                                                                                        <input type="hidden" name="template_id" value="<?php echo $template_id; ?>">
                                                                                                        <button class="btn btn-outline-success m-2 template" type="submit" name="template_btn">
                                                                                                            <?php echo $template_name; ?>
                                                                                                        </button>

                                                                                                    </form>
                                                                                                </div>
                                                                                                <?php
                            }
                            echo "</div>";
                        } else {
                            echo "<p>No templates found.</p>";
                        }
                        ?>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST["submit_pres_back"])) {
            // Sanitize and prepare data
            function sanitizeData($data)
            {
                return htmlspecialchars(trim($data));
            }
            $past_history = sanitizeData($_POST["past_history"]);
            $pgp_od = sanitizeData($_POST["pgp_od"]);
            $pgp_os = sanitizeData($_POST["pgp_os"]);
            $Add_col = sanitizeData($_POST["Add_col"]);
            $allergic_to = sanitizeData($_POST["allergic_to"]);
            $vision_refraction = sanitizeData($_POST["vision_refraction"]);
            $distant_od = sanitizeData($_POST["distant_od"]);
            $distant_os = sanitizeData($_POST["distant_os"]);
            $near_od = sanitizeData($_POST["near_od"]);
            $near_os = sanitizeData($_POST["near_os"]);
            $flash_od = sanitizeData($_POST["flash_od"]);
            $flash_os = sanitizeData($_POST["flash_os"]);
            $unaided_od = sanitizeData($_POST["unaided_od"]);
            $unaided_os = sanitizeData($_POST["unaided_os"]);
            $cyclo_flash_od = sanitizeData($_POST["cyclo_flash_od"]);
            $cyclo_flash_os = sanitizeData($_POST["cyclo_flash_os"]);
            $slit_lamp_examination_od = sanitizeData($_POST["slit_lamp_examination_od"]);
            $slit_lamp_examination_os = sanitizeData($_POST["slit_lamp_examination_os"]);
            $ocular_adnexa_od = sanitizeData($_POST["ocular_adnexa_od"]);
            $ocular_adnexa_os = sanitizeData($_POST["ocular_adnexa_os"]);
            $roplas_od = sanitizeData($_POST["roplas_od"]);
            $roplas_os = sanitizeData($_POST["roplas_os"]);
            $lids_od = sanitizeData($_POST["lids_od"]);
            $lids_os = sanitizeData($_POST["lids_os"]);
            $conjuctiva_od = sanitizeData($_POST["conjuctiva_od"]);
            $conjuctiva_os = sanitizeData($_POST["conjuctiva_os"]);
            $anti_chamber_od = sanitizeData($_POST["anti_chamber_od"]);
            $anti_chamber_os = sanitizeData($_POST["anti_chamber_os"]);
            $iris_od = sanitizeData($_POST["iris_od"]);
            $iris_os = sanitizeData($_POST["iris_os"]);
            $pupil_od = sanitizeData($_POST["pupil_od"]);
            $pupil_os = sanitizeData($_POST["pupil_os"]);
            $lens_od = sanitizeData($_POST["lens_od"]);
            $lens_os = sanitizeData($_POST["lens_os"]);
            $iop_od = sanitizeData($_POST["iop_od"]);
            $iop_os = sanitizeData($_POST["iop_os"]);


            // Creating the SQL UPDATE query using string interpolation
            $sql = "UPDATE pres_back SET 
    past_history = '$past_history', 
    Add_data = '$Add_col',
    pgp_od = '$pgp_od',
    pgp_os = '$pgp_os',
    allergic_to = '$allergic_to',
    vision_refraction = '$vision_refraction',
    distant_od = '$distant_od',
    distant_os = '$distant_os',
    near_od = '$near_od',
    near_os = '$near_os',
    flash_od = '$flash_od',
    flash_os = '$flash_os',
    unaided_od = '$unaided_od',
    unaided_os = '$unaided_os',
    cyclo_flash_od = '$cyclo_flash_od',
    cyclo_flash_os = '$cyclo_flash_os',
    slit_lamp_examination_od = '$slit_lamp_examination_od',
    slit_lamp_examination_os = '$slit_lamp_examination_os',
    ocular_adnexa_od = '$ocular_adnexa_od',
    ocular_adnexa_os = '$ocular_adnexa_os',
    roplas_od = '$roplas_od',
    roplas_os = '$roplas_os',
    lids_od = '$lids_od',
    lids_os = '$lids_os',
    conjuctiva_od = '$conjuctiva_od',
    conjuctiva_os = '$conjuctiva_os',
    anti_chamber_od = '$anti_chamber_od',
    anti_chamber_os = '$anti_chamber_os',
    iris_od = '$iris_od',
    iris_os = '$iris_os',
    pupil_od = '$pupil_od',
    pupil_os = '$pupil_os',
    lens_od = '$lens_od',
    lens_os = '$lens_os',
    iop_od = '$iop_od',
    iop_os = '$iop_os'
    WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'> Updated Successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Error Updating </div>";
            }
        }
        if (isset($_REQUEST['admit_patient'])) {
            $sql = "UPDATE patient_records SET is_admited = 1 WHERE id = $id;";
            $conn->query($sql);

        }
        $sql = "SELECT * FROM patient_records WHERE id = $id;";
        $result = $conn->query($sql)->fetch_assoc();
        ?>
        <div class="row text-center mt-5">
            <div class="col-4">Name of Patient: <span style="font-weight: bold;" id="p_name">
                    <?php echo $result['name']; ?>
                </span></div>
            <div class="col-4">Age: <span style="font-weight: bold;">
                    <?php echo $result['age']; ?>
                </span></div>
            <div class="col-4">Sex: <span style="font-weight: bold;">
                    <?php echo $result['sex']; ?>
                </span></div>
        </div>

        <div class="text-dark mt-4" style="margin-left:7rem;font-weight:bold;">Complaint: <span
                style="font-weight: bold;">
                <?php echo $result['patient_complaints']; ?>
            </span>
        </div>
        <?php
        $sql13 = "SELECT * FROM `patient_info` WHERE patient_id=$id";
        $data13 = $conn->query($sql13);
        $res13 = $data13->fetch_assoc();

        $sql12 = "SELECT * FROM `config_print` WHERE 1";
        $data12 = $conn->query($sql12);
        $res12 = $data12->fetch_assoc();
        if (!isset($res12['inp'])) {
            $inp_arr = array_fill(0, 4, 'option2');
        } else {
            $inp = $res12['inp'];
            $inp_arr = json_decode($inp, true);
            $inp_arr = is_array($inp_arr) ? $inp_arr : array_fill(0, 4, '');
        }

        if ($inp_arr[2] == 'option1') {

            echo <<<calc
            <div class="text-dark mt-4" style="margin-left:7rem;font-weight:bold;">Pregnancy: <span
                style="font-weight: bold;">
                {$res13['pregDetails']}
            </span>
        </div>
            
            
            
calc;
        }
        ?>
<div class="row">
<div class="text-dark m-2 col" >Weight:<span
                style="font-weight: bold;">
                <?php echo $res13['weight']; ?>
            </span>
        </div>

<div class="text-dark m-2 col" >Pulse: <span
                style="font-weight: bold;">
                <?php echo $res13['pulse']; ?>
            </span>
        </div>
<div class="text-dark m-2 col" >BP: <span
                style="font-weight: bold;">
                <?php echo $res13['bp']; ?>
            </span>
        </div>
<div class="text-dark m-2 col" >Temp:<span
                style="font-weight: bold;">
                <?php echo $res13['temp']; ?>
            </span>
        </div>

</div>
<?php
if (isset($_REQUEST['all-view-data'])) {
    $complaints = filter_var($_REQUEST["complaints"], FILTER_SANITIZE_STRING);
    $sql = "UPDATE patient_info SET chief_complaint='$complaints' WHERE patient_id=$id;";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<div class='alert alert-danger'>Error Updating Complaints</div>";
    }
    $history = removeExtraSpaces($_REQUEST['history']);
    $sql = "UPDATE patient_info SET history = '$history' WHERE patient_id = $id;";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<div class='alert alert-danger'>Error Updating History</div>";
    }
    $history = removeExtraSpaces($_REQUEST['personal_history']);
    $sql = "UPDATE patient_info SET personal_history = '$history' WHERE patient_id = $id;";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<div class='alert alert-danger'>Error Updating History</div>";
    }
    $familyHistory = removeExtraSpaces($_REQUEST['family_history']);
    $sql = "UPDATE patient_info SET family_history = '$familyHistory' WHERE patient_id = $id;";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<div class='alert alert-danger'>Error Updating Family History</div>";
    }
    $procedureDone = removeExtraSpaces($_REQUEST['procedure_done']);
    $sql = "UPDATE patient_info SET procedure_done = '$procedureDone' WHERE patient_id = $id;";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<div class='alert alert-danger'>Error Updating Operative Procedure Done</div>";
    }
    $history = removeExtraSpaces($_REQUEST['medical_history']);
    $sql = "UPDATE patient_info SET medical_history = '$history' WHERE patient_id = $id;";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<div class='alert alert-danger'>Error Updating History</div>";
    }
    $examination = removeExtraSpaces($_REQUEST['examination']);
    $sql = "UPDATE patient_info SET examination = '$examination' WHERE patient_id = $id;";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<div class='alert alert-danger'>Error Updating examination</div>";
    }
    $investigation = removeExtraSpaces($_REQUEST['investigation']);
    $sql = "UPDATE patient_info SET investigation = '$investigation' WHERE patient_id = $id;";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<div class='alert alert-danger'>Error Updating Investigation</div>";
    }
    $investigation = removeExtraSpaces($_REQUEST['investigation_imaging']);
    $sql = "UPDATE patient_info SET investigation_imaging = '$investigation' WHERE patient_id = $id;";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<div class='alert alert-danger'>Error Updating Investigation Imaging</div>";
    }
    $symptoms = filter_var($_REQUEST["symptoms"], FILTER_SANITIZE_STRING);
    $sql = "UPDATE patient_info SET symptoms='$symptoms' WHERE patient_id=$id;";
    if ($conn->query($sql) === TRUE) {

    } else {
        echo "<div class='alert alert-danger'>Error Updating Symptoms</div>";
    }
    $instructions = filter_var($_POST["instructions"], FILTER_SANITIZE_STRING);
    $sql = "UPDATE patient_info SET instructions='$instructions' WHERE patient_id=$id; ";
    if ($conn->query($sql) === TRUE) {

    } else {
        echo "<div class='alert alert-danger'>Error Updating Instructions</div>";
    }
    $diagnosis = removeExtraSpaces($_REQUEST['diagnosis']);
    $sql = "UPDATE patient_info SET diagnosis = '$diagnosis' WHERE patient_id = $id;";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "<div class='alert alert-danger'>Error Updating Diagnosis</div>";
    }
    echo "<div class='alert alert-success'> Updated Successfully</div>";
} ?>

<div class="row">
    <div class="col-md-3 shadow-lg rounded-3 mt-4 mb-4 mx-1">
       <?php

       $sql = "SELECT chief_complaint FROM patient_info WHERE patient_id = $id;";
       $res = $conn->query($sql)->fetch_assoc();
       $chiefComplaintValue = $res['chief_complaint'];
       ?>
        <label class="font-weight-bold" for="" class="text-danger">Chief Complaints :</label>
        <div class="card-body p-2">
            <form action="" method="POST" id="form1">
                <textarea class="form-control mt-3" id="selected-complaints"
                    name="complaints"><?php echo $res['chief_complaint']; ?></textarea>

                <div class="row">
                  
                    <div class="col-6 mt-2">
                        <button type="button" id="complaints" class="btn btn-primary ">Complaints</button>
                    </div>
                    <div class="col-1 mt-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="complaints_checkbox"
                                id="complaints_checkbox">
                        </div>
                    </div>

                </div>

                <div class="modal" id="complaintsModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Chief Complaints</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><strong>
                                            &times;
                                        </strong></span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <table class="mx-3">
                                    <tr>
                                        <th>Checkbox</th>
                                        <th>Chief Complaints</th>
                                    </tr>

                                    <?php
                                    $i = 1;
                                    $sql1 = mysqli_query($conn, "SELECT * FROM chief_complaints where dr_id = {$_SESSION['doctor_id']};");

                                    while ($res = mysqli_fetch_assoc($sql1)) {
                                        echo '<tr>
                <td>
                    <input class="form-check-input checkbox-complaints" type="checkbox" name="complaints_checkbox_' . $i . '"
                    id="complaints_checkbox_' . $i . '">
                </td>
                <td>' . $res['complaints'] . '</td>
            </tr>';
                                        $i++;
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <?php
    function removeExtraSpaces($str)
    {
        return preg_replace('/\s{2,}/', ' ', $str);
    } ?>
    <div class="col-md-2 shadow-lg rounded-3 m-4">

        <?php


        $sql = "SELECT history FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        $historyValue = $res['history'];
        ?>
        <div class="form-group m-2">
            <label class="font-weight-bold" for="history" class="text-danger">Past History:</label>
            <textarea type="text" name="history" id="history" class="form-control live-fetch" data-column="history"
                data-table="patient_info"><?php echo $res['history']; ?></textarea>
            <div class="dropdown-container"></div>
        </div>
        <div class="form-group m-2 d-flex justify-content-between align-items-center">
           
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="history_checkbox" id="history_checkbox">
            </div>
        </div>

    </div>
    <div class="col-md-2 shadow-lg rounded-3 m-4">

        <?php


        $sql = "SELECT personal_history FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        $historyValue = $res['personal_history'];
        ?>
        <div class="form-group m-2">
            <label class="font-weight-bold" for="history" class="text-danger">Personal History:</label>
            <textarea type="text" name="personal_history" id="history" class="form-control live-fetch"
                data-column="personal_history"
                data-table="patient_info"><?php echo $res['personal_history']; ?></textarea>
            <div class="dropdown-container"></div>
        </div>
        <div class="form-group m-2 d-flex justify-content-between align-items-center">
          
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="personal_history_checkbox"
                    id="personal_history_checkbox">
            </div>
        </div>
    </div>

    <div class="col-md-2 shadow-lg rounded-3 m-4">
        <?php

        $sql = "SELECT family_history FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        $familyHistoryValue = $res['family_history'];
        ?>
        <div class="form-group m-2">
            <label class="font-weight-bold" for="family_history" class="text-danger">Family/Drug
                History:</label>
            <textarea type="text" name="family_history" id="family_history" class="form-control live-fetch"
                data-column="family_history" data-table="patient_info"><?php echo $res['family_history']; ?></textarea>
            <div class="dropdown-container"></div>
        </div>
        <div class="form-group m-2 d-flex justify-content-between align-items-center">
           
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="family_history_checkbox"
                    id="family_history_checkbox">
            </div>
        </div>
    </div>
    <div class="col-md-2 shadow-lg rounded-3 m-4">
        <?php

        $sql = "SELECT procedure_done FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        ?>
        <div class="form-group m-2">
            <label class="font-weight-bold" for="procedure_done" class="text-danger">Surgical History:</label>
            <textarea type="text" name="procedure_done" id="procedure_done" class="form-control live-fetch"
                data-column="procedure_done" data-table="patient_info"><?php echo $res['procedure_done']; ?></textarea>
            <div class="dropdown-container"></div>
        </div>
        <div class="form-group m-2 d-flex justify-content-between align-items-center">
            
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="procedure_done_checkbox"
                    id="procedure_done_checkbox">
            </div>
        </div>

    </div>
    <div class="col-md-2 shadow-lg rounded-3 m-4">

        <?php


        $sql = "SELECT medical_history FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        $historyValue = $res['medical_history'];
        ?>
        <div class="form-group m-2">
            <label class="font-weight-bolmedicalhistory" class="text-danger">Medical History:</label>
            <textarea type="text" name="medical_history" id="history" class="form-control live-fetch"
                data-column="medical_history"
                data-table="patient_info"><?php echo $res['medical_history']; ?></textarea>
            <div class="dropdown-container"></div>
        </div>
        <div class="form-group m-2 d-flex justify-content-between align-items-center">
            
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="medical_history_checkbox"
                    id="medical_history_checkbox">
            </div>
        </div>
    </div>

    <div class="col-md-3 shadow-lg rounded-3 mt-4 mb-4">
        <?php

        $i = 1;


        $sql = "SELECT examination FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        ?>
        <label class="font-weight-bold" for="" class="text-danger">Examinations :</label>
        <div class="card-body p-2">
            <textarea class="form-control mt-3" id="selected-examination"
                name="examination"><?php echo $res['examination']; ?></textarea>


            <div class="row">
                
                <div class="col-6 mt-2">
                    <button type="button" id="examination" class="btn btn-primary ">Examinations</button>
                </div>
                <div class="col-1 mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="exam_checkbox" id="exam_checkbox">
                    </div>
                </div>

            </div>

            <div class="modal" id="examinationModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Examinations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><strong>
                                        &times;
                                    </strong></span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <table class="mx-3">
                                <tr>
                                    <th>Checkbox</th>
                                    <th>Examinations</th>
                                </tr>

                                <?php


                                $sql1 = mysqli_query($conn, "SELECT * FROM examinations where dr_id = {$_SESSION['doctor_id']};");

                                while ($res = mysqli_fetch_assoc($sql1)) {
                                    echo '<tr>
                <td>
                    <input class="form-check-input checkbox-examination" type="checkbox" name="examination_checkbox_' . $i . '"
                    id="examination_checkbox_' . $i . '">
                </td>
                <td>' . $res['examination'] . '</td>
            </tr>';
                                    $i++;
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 shadow-lg rounded-3 mt-4 mb-4">
        <?php
        $sql = "SELECT investigation FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        ?>
        <label class="font-weight-bold" for="" class="text-danger">Investigation Lab :</label>
        <div class="card-body p-2">
            <textarea class="form-control mt-3" id="selected-investigation"
                name="investigation"><?php echo $res['investigation']; ?></textarea>


            <div class="row">
                
                <div class="col-6 mt-2">
                    <button type="button" id="invest" class="btn btn-primary "> Lab</button>
                </div>
                <div class="col-1 mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="investigation_checkbox"
                            id="investigation_checkbox">
                    </div>
                </div>

            </div>

            <div class="modal" id="investigationModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Investigations Lab</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><strong>
                                        &times;
                                    </strong></span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <table class="mx-3">
                                <tr>
                                    <th>Checkbox</th>
                                    <th>Investigation Lab</th>
                                </tr>

                                <?php


                                $sql1 = mysqli_query($conn, "SELECT * FROM investigation_view where dr_id = {$_SESSION['doctor_id']};");

                                while ($res = mysqli_fetch_assoc($sql1)) {
                                    echo '<tr>
                <td>
                    <input class="form-check-input checkbox-investigation" type="checkbox" name="inve_checkbox_' . $i . '"
                    id="inves_checkbox_' . $i . '">
                </td>
                <td>' . $res['description'] . '</td>
            </tr>';
                                    $i++;
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" col-md-3 shadow-lg rounded-3 mt-4 mb-4 mx-1">
        <?php

        $sql = "SELECT investigation_imaging FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        ?>
        <label class="font-weight-bold" for="" class="text-danger">Investigation Imaging:</label>
        <div class="card-body p-2">
            <textarea class="form-control mt-3" id="selected-investigation_imaging"
                name="investigation_imaging"><?php echo $res['investigation_imaging']; ?></textarea>


            <div class="row">
                
                <div class="col-6 mt-2">
                    <button type="button" id="invest_imaging" class="btn btn-primary "> Imaging</button>
                </div>
                <div class="col-1 mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="investigation_imaging_checkbox"
                            id="investigation_imaging_checkbox">
                    </div>
                </div>

            </div>

            <div class="modal" id="investigationImagingModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Investigation Imaging</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><strong>
                                        &times;
                                    </strong></span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <table class="mx-3">
                                <tr>
                                    <th>Checkbox</th>
                                    <th>Investigations Imaging</th>
                                </tr>

                                <?php
                                $i = 1;
                                $sql1 = mysqli_query($conn, "SELECT * FROM add_invest_imaging where dr_id = {$_SESSION['doctor_id']};");

                                while ($res = mysqli_fetch_assoc($sql1)) {
                                    echo '<tr>
                <td>
                    <input class="form-check-input checkbox-investigation_imaging" type="checkbox" name="inve_imaging_checkbox_' . $i . '"
                    id="inves_imaging_checkbox_' . $i . '">
                </td>
                <td>' . $res['description'] . '</td>
            </tr>';
                                    $i++;
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 shadow-lg rounded-3 mt-4 mb-4 mx-1">
        <?php
        $sql = "SELECT symptoms FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        ?>
        <label class="font-weight-bold" for="" class="text-danger">Symptoms :</label>
        <div class="card-body p-2">
            <textarea class="form-control mt-3" id="selected-symptoms"
                name="symptoms"><?php echo $res['symptoms']; ?></textarea>
            <div class="row">     
                <div class="col-6 mt-2">
                    <button type="button" id="symptom" class="btn btn-primary ">Symptoms</button>
                </div>
                <div class="col-1 mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="symptoms_checkbox" id="symptoms_checkbox">
                    </div>
                </div>
            </div>
            <div class="modal" id="symptomsModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Symptoms</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><strong>
                                        &times;
                                    </strong></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="mx-3">
                                <tr>
                                    <th>Checkbox</th>
                                    <th>Symptoms</th>
                                </tr>
                                <?php
                                $i = 1;
                                $sql1 = mysqli_query($conn, "SELECT * FROM symptoms_view where dr_id = {$_SESSION['doctor_id']};");

                                while ($res = mysqli_fetch_assoc($sql1)) {
                                    echo '<tr>
                <td>
                    <input class="form-check-input checkbox-symptoms" type="checkbox" name="sym_checkbox_' . $i . '"
                    id="symp_checkbox_' . $i . '">
                </td>
                <td>' . $res['desc_sym'] . '</td>
            </tr>';
                                    $i++;
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 shadow-lg rounded-3 mt-4 mb-4 mx-1">
        <?php
        $sql = "SELECT instructions FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        ?>
        <label class="font-weight-bold" for="" class="text-danger">Instructions :</label>
        <div class="card-body p-2">
            <textarea class="form-control mt-3" id="selected-instructions"
                name="instructions"><?php echo $res['instructions']; ?></textarea>
            <div class="row"> 
                <div class="col-6 mt-2">
                    <button type="button" id="instru" class="btn btn-primary ">Instructions</button>
                </div>
                <div class="col-1 mt-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="instructions_checkbox"
                            id="instructions_checkbox">
                    </div>
                </div>
            </div>
            <div class="modal" id="instructionModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Instructions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><strong>
                                        &times;
                                    </strong></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="mx-3">
                                <tr>
                                    <th>Checkbox</th>
                                    <th>Instructions</th>
                                </tr>

                                <?php
                                $i = 1;
                                $sql1 = mysqli_query($conn, "SELECT * FROM in_view where dr_id = {$_SESSION['doctor_id']};");

                                while ($res = mysqli_fetch_assoc($sql1)) {
                                    echo '<tr>
                <td>
                    <input class="form-check-input checkbox-instruction" type="checkbox" name="in_checkbox_' . $i . '"
                    id="inst_checkbox_' . $i . '">
                </td>
                <td>' . $res['instruction'] . '</td>
            </tr>';
                                    $i++;
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 shadow-lg rounded-3 my-4 mx-1">
        <?php
        $sql = "SELECT diagnosis FROM patient_info WHERE patient_id = $id;";
        $res = $conn->query($sql)->fetch_assoc();
        ?>
        <div class="form-group m-2">
            <label class="font-weight-bold" for="diagnosis" class="text-danger">Diagnosis:</label>
            <textarea type="text" name="diagnosis" id="diagnosis" class="form-control live-fetch"
                data-column="diagnosis" data-table="patient_info"><?php echo $res['diagnosis']; ?></textarea>
            <div class="dropdown-container"></div>
        </div>
        <div class="form-group m-2 d-flex justify-content-between align-items-center">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="diagnosis_checkbox" id="diagnosis_checkbox">
            </div>
        </div>
    </div>
</div>
</div>
</form>
    <!-- medicine save -->
    <?php

    if (isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM prescription WHERE id = {$_POST['pres_id']} ;";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Prescription Deleted Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error Deleting Prescription</div>";
        }
    }
    $sql = "SELECT * FROM patient_records WHERE id = $id;";
    $res = $conn->query($sql)->fetch_assoc();
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add medicines</h6>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="med_checkbox" id="med_checkbox" checked>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST" id="form2">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th class="col-1">Types</th>
                            <th class="col-3">Medicine</th>
                            <th class="col-1">सकाळ</th>
                            <th class="col-1">दुपार</th>
                            <th class="col-1">रात्र</th>
                            <th class="col-1">कधी घ्यायच्या </th>
                            <th class="col-1">किती दिवस </th>
                            <th class="col-1">Qty</th>
                            <th class="col-1">Delete</th>
                        </tr>
                        <tbody id="tbody">
                            <?php
                            $sql = "SELECT * FROM prescription WHERE patient_id = $id ORDER BY id ;";
                            $data = $conn->query($sql);
                            $i = 1;
                            while ($res = $data->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $res['type'] . '</td>';
                                echo '<td>' . $res['med_name'] . '</td>';
                                echo '<td>' . $res['morning'] . '</td>';
                                echo '<td>' . $res['afternoon'] . '</td>';
                                echo '<td>' . $res['night'] . '</td>';
                                echo '<td>' . $res['eat'] . '</td>';
                                echo '<td>' . $res['days'] . '</td>';
                                echo '<td>' . $res['quantity'] . '</td>';
                                echo "<td><form method='POST' action=''>
                                    <input type='hidden' value={$res['id']} name='pres_id' >
                                    <button type='submit' name = 'delete' class='btn btn-primary'>Delete</button></form>" . '</td>';
                                echo '</tr>';
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- <button type="submit" class="btn  btn-success " name="submit_changes">Save Changes</button> -->
                <button type="button" class="btn btn-info" onclick="addItem1();">Add Medicine</button>
            </form>
        </div>
    </div>
    <div>
    <button onclick="saveForms()" class="btn btn-success m-3">Save</button>
</div>
    <!-- pres back -->
    <?php
    $sql = "select * from pres_back where id = $id;";
    $res = $conn->query($sql)->fetch_assoc();
    ?>
    <div class="card shadow my-4 container">
        <div class="card-header py-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="pres_back_checkbox" id="pres_back_checkbox">
            </div>
        </div>
        <div class="card-body">
            <form method="post">
                <table class="table table-bordered border-dark">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td colspan="5" rowspan="2">
                                <strong><label class="font-weight-bold" for="chief_complaints">Chief Complaints:
                                    </label></strong>
                                <?php echo $chiefComplaintValue; ?>
                            </td>
                            <td colspan="3" rowspan="1">
                                <strong><label class="font-weight-bold" for="personal_history">Personal H/o:
                                    </label></strong>
                                <?php echo $historyValue; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="1">
                                <strong><label class="font-weight-bold" for="family_history">Family H/o:
                                    </label></strong>
                                <?php echo $familyHistoryValue; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" rowspan="1">
                                <strong><label class="font-weight-bold" for="past_history">Past H/o:</label></strong>
                                <input type="text" value="<?php echo $res['past_history'] ?? ''; ?>" name="past_history"
                                    class="form-control" style="width: 80%"
                                    value="<?php echo $res['past_history'] ?? ''; ?>" />
                            </td>

                            <td colspan="1" rowspan="2" class="text-center">
                                <strong><label for="pgp_label" class="mt-4">P.G.P</label></strong>
                            </td>
                            <td colspan="1" rowspan="1">
                                <strong><label class="font-weight-bold" for="pgp_od">OD:</label></strong>
                                <input type="text" value="<?php echo $res['past_history'] ?? ''; ?>" name="pgp_od"
                                    class=" inline" style="width: 3.5rem" value="<?php echo $res['pgp_od'] ?? ''; ?>" />
                            </td>
                            <td colspan="1" rowspan="2" class="text-center">
                                <strong><label class="font-weight-bold" for="pgp_os">Add: </label></strong>
                                <textarea name="Add_col"
                                    class="form-control"><?php echo $res['Add_data'] ?? ''; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center vertical-center">
                                <strong><label class="font-weight-bold" for="diabetic">Diabetic</label></strong>
                            </td>
                            <td class="text-center vertical-center">
                                <strong><label class="font-weight-bold" for="hypertensive">Hypertensive</label></strong>
                            </td>
                            <td class="text-center vertical-center">
                                <strong><label class="font-weight-bold" for="ihd">I.H.D</label></strong>
                            </td>
                            <td class="text-center vertical-center">
                                <strong><label class="font-weight-bold" for="asthmatic">Asthmatic</label></strong>
                            </td>
                            <td class="text-center vertical-center">
                                <strong><label class="font-weight-bold" for="other">Other</label></strong>
                            </td>
                            <td colspan="1" rowspan="1">
                                <strong><label class="font-weight-bold" for="pgp_os">OS:</label></strong>
                                <input type="text" value="<?php echo $res['pgp_os'] ?? ''; ?>" name="pgp_os"
                                    class=" inline" style="width: 3.8rem" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" rowspan="1">
                                <strong><label class="font-weight-bold" for="allergic_to">Allergic to:</label></strong>
                                <input type="text" value="<?php echo $res['allergic_to'] ?? ''; ?>" name="allergic_to"
                                    class=" inline" style="width: 90%" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" rowspan="1">
                                <strong><label class="font-weight-bold" for="vision_refraction">Vision &
                                        Refraction:</label></strong>
                                <input type="text" value="<?php echo $res['vision_refraction'] ?? ''; ?>"
                                    name="vision_refraction" class=" inline" style="width: 50%" />
                            </td>
                            <td colspan="3" class="text-center" style="width: 25rem">
                                <strong><label class="font-weight-bold" for="vision_od">OD</label></strong>
                            </td>
                            <td colspan="3" class="text-center" style="width: 25rem">
                                <strong><label class="font-weight-bold" for="vision_os">OS</label></strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="unaided_vision">Unaided/ Adaid
                                        Vision</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['unaided_od'] ?? ''; ?>"
                                    name="unaided_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['unaided_os'] ?? ''; ?>"
                                    name="unaided_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="flash">Flash</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['flash_od'] ?? ''; ?>"
                                    name="flash_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['flash_os'] ?? ''; ?>"
                                    name="flash_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="cyclo_flash">Cycolo Flash</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['cyclo_flash_od'] ?? ''; ?>"
                                    name="cyclo_flash_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['cyclo_flash_os'] ?? ''; ?>"
                                    name="cyclo_flash_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="1" rowspan="2" class="text-center">
                                <strong><label for="acceptance_label" class="mt-4">Acceptance</label></strong>
                            </td>
                            <td colspan="1">
                                <strong><label class="font-weight-bold" for="distant">Distant</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['distant_od'] ?? ''; ?>"
                                    name="distant_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['distant_os'] ?? ''; ?>"
                                    name="distant_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <strong><label class="font-weight-bold" for="near">Near</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['near_od'] ?? ''; ?>"
                                    name="near_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['near_os'] ?? ''; ?>"
                                    name="near_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="extra_ocular_muscles">Extra Ocular
                                        Muscles</label></strong>
                            </td>
                            <td colspan="3" class="text-center">
                                <img src="star.jpg" alt="" style="width: 4rem; height: 4rem" />
                            </td>
                            <td colspan="3" class="text-center">
                                <img src="star.jpg" alt="" style="width: 4rem; height: 4rem" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="slit_lamp_examination">Slit-Lamp
                                        Examination</label></strong>
                            </td>
                            <td colspan="3"><input type="text"
                                    value="<?php echo $res['slit_lamp_examination_od'] ?? ''; ?>"
                                    name="slit_lamp_examination_od" class="form-control" />
                            </td>
                            <td colspan="3"><input type="text"
                                    value="<?php echo $res['slit_lamp_examination_os'] ?? ''; ?>"
                                    name="slit_lamp_examination_os" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="ocular_adnexa">Ocular
                                        Adnexa</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['ocular_adnexa_od'] ?? ''; ?>"
                                    name="ocular_adnexa_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['ocular_adnexa_os'] ?? ''; ?>"
                                    name="ocular_adnexa_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="roplas">ROPLAS</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['roplas_od'] ?? ''; ?>"
                                    name="roplas_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['roplas_os'] ?? ''; ?>"
                                    name="roplas_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="lids">Lids</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['lids_od'] ?? ''; ?>"
                                    name="lids_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['lids_os'] ?? ''; ?>"
                                    name="lids_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="conjuctiva">Conjuctiva</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['conjuctiva_od'] ?? ''; ?>"
                                    name="conjuctiva_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['conjuctiva_os'] ?? ''; ?>"
                                    name="conjuctiva_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="cornea">Cornea</label></strong>
                            </td>
                            <td colspan="3" class="text-center">
                                <img src="cornea.jpg" alt=""
                                    style="width: 5.7rem; height: 5.7rem; transform: scaleX(-1)" />
                            </td>
                            <td colspan="3" class="text-center">
                                <img src="cornea.jpg" alt="" style="width: 5.7rem; height: 5.7rem" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="anti_chamber">Anti.
                                        Chamber</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['anti_chamber_od'] ?? ''; ?>"
                                    name="anti_chamber_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['anti_chamber_os'] ?? ''; ?>"
                                    name="anti_chamber_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="iris">Iris</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['iris_od'] ?? ''; ?>"
                                    name="iris_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['iris_os'] ?? ''; ?>"
                                    name="iris_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="pupil">Pupil</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['pupil_od'] ?? ''; ?>"
                                    name="pupil_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['pupil_os'] ?? ''; ?>"
                                    name="pupil_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="lens">Lens</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['lens_od'] ?? ''; ?>"
                                    name="lens_od" class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['lens_os'] ?? ''; ?>"
                                    name="lens_os" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="iop">IOP</label></strong>
                            </td>
                            <td colspan="3"><input type="text" value="<?php echo $res['iop_od'] ?? ''; ?>" name="iop_od"
                                    class="form-control" /></td>
                            <td colspan="3"><input type="text" value="<?php echo $res['iop_os'] ?? ''; ?>" name="iop_os"
                                    class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong><label class="font-weight-bold" for="gonioscopy">Gonioscopy</label></strong>
                            </td>
                            <td colspan="3" class="text-center">
                                <img src="goni.jpg" alt=""
                                    style="width: 5.7rem; height: 5.7rem; transform: scaleX(-1)" />
                            </td>
                            <td colspan="3" class="text-center">
                                <img src="goni.jpg" alt="" style="width: 5.7rem; height: 5.7rem" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-3">
                        <strong><label class="font-weight-bold" for="fundus_examination">Fundus Examination:
                            </label></strong>
                    </div>
                    <div class="col-4">
                        <img src="fundus.jpg" alt="" style="width: 20rem; height: 20rem" />
                    </div>
                    <div class="col-4 offset-1">
                        <img src="fundus.jpg" alt="" style="width: 20rem; height: 20rem; transform: scaleX(-1)" />
                    </div>
                </div>
                <button type="submit" name="submit_pres_back" class="btn btn-primary m-4">Submit</button>
            </form>
        </div>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel"> Success</h5>
                </div>
                <div id="modal-body" class="mx-2">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="prescription.js"></script>
    <script src="alert.js"></script>
    <script>
        function saveForms() {
            const idFromURL = new URLSearchParams(window.location.search).get('id');
            const form1Data = new FormData(document.getElementById('form1'));
            const form2Data = new FormData(document.getElementById('form2'));

            const combinedData = new FormData();

            // Append form data from both forms to a single FormData object
            for (const pair of form1Data.entries()) {
                combinedData.append(pair[0], pair[1]);
            }

            for (const pair of form2Data.entries()) {
                combinedData.append(pair[0], pair[1]);
            }
            combinedData.append('id', idFromURL);

            // Send combined form data to PHP using fetch
            fetch('viewDataSave.php', {
                method: 'POST',
                body: combinedData
            })
            .then(response => {
                if (response.ok) {
                    return response.text();
                }
                throw new Error('Network response was not ok.');
            })
            .then(data => {
                // Handle the response from the PHP script
                // console.log(data);
                swal({
    title: "Data Saved Successfully!",
    text: "Your operation was successful.",
    icon: "success",
    button: false, // Set the button to false to hide it
    timer: 1500 
}).then(() => {
    window.location.reload();
});

            })
            .catch(error => {
                // Handle errors here
                console.error('There was a problem with the fetch operation:', error);
            });
        }
        document.addEventListener("DOMContentLoaded", function () {
            var referButton = document.getElementById("referButton");
            var finalReferButton = document.getElementById("final-referButton");
            var selectBoxContainer = document.getElementById("selectBoxContainer");

            referButton.addEventListener("click", function (e) {
                e.preventDefault();
                referButton.style.display = "none";
                finalReferButton.style.display = "inline-block";
                finalReferButton.classList.add("col-2");
                finalReferButton.classList.add("mx-2");
                selectBoxContainer.style.display = "inline-block";
                selectBoxContainer.classList.add("col-8");
                selectBoxContainer.classList.add("mx-2");

            });

            finalReferButton.addEventListener("click", function (e) {
                e.preventDefault();
                var pId = finalReferButton.getAttribute("p-id");
                var doctor = selectBoxContainer.value;

                var data = {
                    pId: pId,
                    doctor: doctor
                };

                // Send the data to the PHP file using the fetch method
                fetch('refer.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                    .then(response => response.text()).then((data) => {
                        if (data == 'success') {
                            $('#successModal').modal('show'); // Show the success modal
                            var pName = document.getElementById("p_name").innerHTML;
                            var successMessage =
                                `<strong>${pName}</strong> Successfully Refered to <strong> ${doctor}</strong>`;
                            document.querySelector("#modal-body > p").innerHTML = successMessage;
                            document.addEventListener("click", () => {
                                window.location.href = "doctorPage.php";
                            })

                        } else {
                            console.log("error aa gya");
                        }
                    })
                    .catch(function (error) {
                        // Handle any errors that occurred during the fetch request
                        console.error('Error:', error);
                    });
            });
        });
    </script>
    <script src="../fetch_dropdown_script.js"></script>
    <script src="fetch_medicine.js"></script>
    <script src="chargeSave.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    let canvas = document.getElementById("drawingCanvas");
    let context = canvas.getContext("2d");
    let penButton = document.getElementById("pen");
    let eraserButton = document.getElementById("eraser");
    let colors = document.querySelectorAll(".color");
    let drawing = false;
    let erasing = false;
    let currentColor = "black";
    let lineWidth = 1;

    // Function to get the correct mouse position
    function getMousePos(canvas, e) {
    const rect = canvas.getBoundingClientRect();
    const scaleX = canvas.width / rect.width;
    const scaleY = canvas.height / rect.height;
    return {
        x: (e.clientX - rect.left) * scaleX,
        y: (e.clientY - rect.top) * scaleY
    };
}


    function startDrawing(e) {
        e.preventDefault();
        drawing = true;
        const pos = getMousePos(canvas, e);
        context.beginPath();
        context.moveTo(pos.x, pos.y);
    }

    function draw(e) {
        if (!drawing) return;
        e.preventDefault();
        const pos = (e.type === "touchmove") ? getMousePos(canvas, e.touches[0]) : getMousePos(canvas, e);

        if (erasing) {
            context.globalCompositeOperation = "destination-out";
            context.strokeStyle = "rgba(255,255,255,1)";
            context.lineWidth = lineWidth + 15; // Make the eraser slightly larger
        } else {
            context.globalCompositeOperation = "source-over";
            context.strokeStyle = currentColor;
            context.lineWidth = lineWidth;
        }

        context.lineTo(pos.x, pos.y);
        context.stroke();
    }

    function stopDrawing() {
        drawing = false;
        context.closePath();
    }

    function resizeCanvas() {
        // Preserve the current drawing
        const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        context.putImageData(imageData, 0, 0);
    }

    // Event listeners
    canvas.addEventListener("mousedown", startDrawing);
    canvas.addEventListener("mousemove", draw);
    canvas.addEventListener("mouseup", stopDrawing);
    canvas.addEventListener("mouseleave", stopDrawing);

    canvas.addEventListener("touchstart", startDrawing);
    canvas.addEventListener("touchmove", draw);
    canvas.addEventListener("touchend", stopDrawing);

    window.addEventListener("resize", resizeCanvas);

    penButton.addEventListener("click", () => {
        erasing = false;
    });

    eraserButton.addEventListener("click", () => {
        erasing = true;
    });

    colors.forEach((color) => {
        color.addEventListener("click", () => {
            currentColor = color.style.backgroundColor;
        });
    });

    // Initialize canvas size
    resizeCanvas();
    
    const saveButton = document.getElementById("saveButton");
const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id'); // Extract the ID from the URL parameter


function fetchAndDrawDrawing(id) {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                const imageData = this.responseText;

                // Create a new image object
                const img = new Image();
                img.onload = function() {
                    // Clear the canvas
                    context.clearRect(0, 0, canvas.width, canvas.height);

                    // Draw the image on the canvas
                    context.drawImage(img, 0, 0, canvas.width, canvas.height);
                };
                img.src = imageData;
            } else {
                console.error("Error fetching drawing:", this.statusText);
            }
        }
    };
    xhttp.open("GET", `fetch_drawing.php?id=${id}`, true);
    xhttp.send();
}
fetchAndDrawDrawing(id);


saveButton.addEventListener("click", () => {
    const imageData = canvas.toDataURL();  // Convert canvas to base64 image data
    saveDrawing(imageData, id); // Pass the imageData and ID to the saveDrawing function
});

function saveDrawing(imageData, id) {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                alert("Drawing saved successfully!");
                $('#exampleModal').modal('hide');



            } else {
                alert("Error saving drawing.");
            }
        }
    };
    xhttp.open("POST", "save_drawing.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("imageData=" + encodeURIComponent(imageData) + "&id=" + encodeURIComponent(id)); // Include the ID in the request
}

</script>


    <script>
        function previousVisit(option){
            let id = option.value;
            window.location.href = "previous_visit.php?id="+id;

        }
        const addFollow = () => {
            let element = document.getElementById("fellow_inp");
            element.innerHTML = "<input type='date' class='form-control'>";
            let addButton = document.getElementById("addFellowButton");
            addButton.disabled = true;

        }
    </script>
    <script>
        function showDay(dateInput) {
            const followUpDay = document.getElementById('follow-up-day');
            const followUpDate = new Date(dateInput.value);  
            if (isNaN(followUpDate)) {
                followUpDay.innerText = 'Invalid date';
                return;
            }

            const dayOfWeek = followUpDate.toLocaleDateString('en-US', { weekday: 'long' });
            followUpDay.innerText = ` (${dayOfWeek})`;
        }

        function calculateFollowUpDate() {
            const selectBox = document.querySelector('select[name="follow_duration"]');
            const followUpDateInput = document.getElementById('follow-up-date');
            const followUpDay = document.getElementById('follow-up-day');
            const selectedValue = parseInt(selectBox.value, 10);

            if (selectedValue) {
                const currentDate = new Date();
                const followUpDate = new Date(currentDate.getTime() + selectedValue * 24 * 60 * 60 * 1000);
                const formattedDate = followUpDate.toISOString().split('T')[0];  // Format as YYYY-MM-DD
                const dayOfWeek = followUpDate.toLocaleDateString('en-US', { weekday: 'long' });

                followUpDateInput.value = formattedDate;
                followUpDay.innerText = ` (${dayOfWeek})`;
            } else {
                followUpDateInput.value = '';
                followUpDay.innerText = '';
            }
        }

        $(document).ready(function () {
            $(".checkbox-instruction").change(function () {
                var selectedInstructions = [];
                $(".checkbox-instruction:checked").each(function () {
                    var instruction = $(this).closest("tr").find("td:last").text();
                    selectedInstructions.push(instruction);
                });
                $("#selected-instructions").val(selectedInstructions.join(" , "));
            });
        });
        $(document).ready(function () {
            $(".checkbox-examination").change(function () {
                var selectedexamination = [];
                $(".checkbox-examination:checked").each(function () {
                    var examination = $(this).closest("tr").find("td:last").text();
                    selectedexamination.push(examination);
                });
                $("#selected-examination").val(selectedexamination.join(" , "));
            });
        });

        $(document).ready(function () {
            $(".checkbox-investigation").change(function () {
                var selectedInvestigation = [];
                $(".checkbox-investigation:checked").each(function () {
                    var investigation = $(this).closest("tr").find("td:last").text();
                    selectedInvestigation.push(investigation);
                });
                $("#selected-investigation").val(selectedInvestigation.join(" , "));
            });
        });
        $(document).ready(function () {
            $(".checkbox-symptoms").change(function () {
                var selectedSymptoms = [];
                $(".checkbox-symptoms:checked").each(function () {
                    var symptoms = $(this).closest("tr").find("td:last").text();
                    selectedSymptoms.push(symptoms);
                });
                $("#selected-symptoms").val(selectedSymptoms.join(" , "));
            });
        });
        $(document).ready(function () {
            $(".checkbox-complaints").change(function () {
                var selectedSymptoms = [];
                $(".checkbox-complaints:checked").each(function () {
                    var symptoms = $(this).closest("tr").find("td:last").text();
                    selectedSymptoms.push(symptoms);
                });
                $("#selected-complaints").val(selectedSymptoms.join(" , "));
            });
        });


        $(document).ready(function () {
            $(".checkbox-investigation_imaging").change(function () {
                var selectedInvestigationImaging = [];
                $(".checkbox-investigation_imaging:checked").each(function () {
                    var investigationImaging = $(this).closest("tr").find("td:last").text();
                    selectedInvestigationImaging.push(investigationImaging);
                });
                $("#selected-investigation_imaging").val(selectedInvestigationImaging.join(" , "));
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("instructionModal");
            const instuctionButton = document.getElementById("instru");
            const closeButton = modal.querySelector(".close");

            instuctionButton.addEventListener("click", function () {
                modal.style.display = "block";
            });

            closeButton.addEventListener("click", function () {
                modal.style.display = "none";
            });

            window.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("examinationModal");
            const instuctionButton = document.getElementById("examination");
            const closeButton = modal.querySelector(".close");

            instuctionButton.addEventListener("click", function () {
                modal.style.display = "block";
            });

            closeButton.addEventListener("click", function () {
                modal.style.display = "none";
            });

            window.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("investigationModal");
            const investigationButton = document.getElementById("invest");
            const closeButton = modal.querySelector(".close");

            investigationButton.addEventListener("click", function () {
                modal.style.display = "block";
            });

            closeButton.addEventListener("click", function () {
                modal.style.display = "none";
            });

            window.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("investigationImagingModal");
            const investigationImagingButton = document.getElementById("invest_imaging");
            const closeButton = modal.querySelector(".close");

            investigationImagingButton.addEventListener("click", function () {
                modal.style.display = "block";
            });

            closeButton.addEventListener("click", function () {
                modal.style.display = "none";
            });

            window.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("symptomsModal");
            const symptomsButton = document.getElementById("symptom");
            const closeButton = modal.querySelector(".close");

            symptomsButton.addEventListener("click", function () {
                modal.style.display = "block";
            });

            closeButton.addEventListener("click", function () {
                modal.style.display = "none";
            });

            window.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("complaintsModal");
            const symptomsButton = document.getElementById("complaints");
            const closeButton = modal.querySelector(".close");

            symptomsButton.addEventListener("click", function () {
                modal.style.display = "block";
            });

            closeButton.addEventListener("click", function () {
                modal.style.display = "none";
            });

            window.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $(".receipt").click(function () {

                const checkboxValues = $("input[type='checkbox']:checked")
                    .map(function () {
                        return this.getAttribute('id');
                    })
                    .get();

                const jsonData = JSON.stringify(checkboxValues);

                const encodedData = encodeURIComponent(jsonData);

                window.location.href = 'prescription_print.php?id=<?php echo $id; ?>&data=' + encodedData +
                    '&checkboxes=' + checkboxValues.join(',');

            });
        });

</script>
    <script>
    // Add click event listener to all elements with the 'file-link' class
    document.querySelectorAll('.file-link').forEach(function(link) {
        link.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default link behavior

            // Get the data-file attribute value (file path)
            var filePath = link.getAttribute('data-file');

            // Use JavaScript to initiate file download
            var anchor = document.createElement('a');
            anchor.href = '../lab/download.php?file=' + filePath;
            anchor.download = filePath.split('/').pop(); // Extract filename from path
            document.body.appendChild(anchor);
            anchor.click();
            document.body.removeChild(anchor);
        });
    });
</script>
    <script src="checkbox.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
</body>

</html>