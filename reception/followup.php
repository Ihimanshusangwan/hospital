<?php
require("../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

  if (isset($_POST['approve'])) {
    $name=$_POST['name'];
    $id=$_POST['id'];
    $upd="UPDATE  `patient_records` SET follow_approve=1 WHERE id ='$id'";
    $conn->query($upd);
    $date = $_POST['date'];
    $sql="SELECT * FROM `patient_records` WHERE id='$id' ";
    $data=$conn->query($sql);
    $res=$data->fetch_assoc();
    $address = isset($res['address']) ? filter_var($res['address'], FILTER_SANITIZE_STRING) : '';
    $taluka = isset($res['taluka']) ? filter_var($res['taluka'], FILTER_SANITIZE_STRING) : '';
    $district = isset($res['district']) ? filter_var($res['district'], FILTER_SANITIZE_STRING) : '';
    $sex = isset($res['sex']) ? $res['sex'] : '';
    $dob_date = isset($res['dob_date']) ? $res['dob_date'] : '';
    $reg_date =  $date;
    $mobile = isset($res['mobile']) ? $res['mobile'] : '';
    $consultant = isset($res['consultant']) ? $res['consultant'] : '';
    $tov = isset($res['tov']) ? $res['tov'] : '';
    $weight = isset($res['weight']) ? $res['weight'] : '';
    $pulse = isset($res['pulse']) ? $res['pulse'] : '';
    $bp = isset($res['bp']) ? $res['bp'] : '';
    $temp = isset($res['temp']) ? $res['temp'] : '';
    $age = isset($res['age']) ? $res['age'] : '';
    $is_old_patient = isset($res['flexRadioDefault']) ? $res['flexRadioDefault'] : '';
    $name_pwp = isset($res['name_pwp']) ? $res['name_pwp'] : '';
    $address_pwp = isset($res['address_pwp']) ? $res['address_pwp'] : '';
    $taluka_pwp = isset($res['taluka_pwp']) ? $res['taluka_pwp'] : '';
    $district_pwp = isset($res['district_pwp']) ? $res['district_pwp'] : '';
    $age_pwp = isset($res['age_pwp']) ? $res['age_pwp'] : '';
    $sex_pwp = isset($res['sex_pwp']) ? $res['sex_pwp'] : '';
    $relation = isset($res['relation']) ? $res['relation'] : '';
    $mobile_pwp = isset($res['mobile_pwp']) ? $res['mobile_pwp'] : '';
    $referred_by = isset($res['rb']) ? $res['rb'] : '';
    $patient_complaints = isset($res['pc']) ? $res['pc'] : '';
    $tov = isset($res['type_of_visit']) ? $res['type_of_visit'] : '';
    if ($tov == "Eye") {
        $is_eye = 1;
        $is_ortho = 0;
      } 
      else if ($tov == "Ortho") {
        $is_eye = 0;
        $is_ortho = 1;
      } 
      else {
        $is_eye = 0;
        $is_ortho = 0;
      }
      $follow_reg=1;
    
    $sql = "INSERT INTO patient_records (name, address, taluka, district, age, sex,dob_date, reg_date, mobile,consultant,type_of_visit,name_pwp,address_pwp,taluka_pwp,district_pwp,age_pwp,relation,sex_pwp,mobile_pwp,referred_by,patient_complaints,follow_reg)
    VALUES ('$name', '$address', '$taluka', '$district', '$age', '$sex', '$dob_date', '$reg_date', '$mobile','$consultant','$tov', '$name_pwp', '$address_pwp', '$taluka_pwp', '$district_pwp', '$age_pwp', '$relation','$sex_pwp','$mobile_pwp','$referred_by','$patient_complaints','$follow_reg')";

    if ($conn->query($sql) === TRUE) {
      $inserted_patient_id = $conn->insert_id;
      $sql = "INSERT INTO patient_info(patient_id,weight,pulse,bp,temp) VALUES($inserted_patient_id,'$weight','$pulse','$bp','$temp');";

        $inserted_patient_id = $conn->insert_id;
        $sql = "INSERT INTO patient_info(patient_id,weight,pulse,bp,temp)
         VALUES($inserted_patient_id,'$weight','$pulse','$bp','$temp');";
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

        $sql44 = "INSERT INTO anumati_consent(id) VALUES($inserted_patient_id);";
        $conn->query($sql44);

        $sql45 = "INSERT INTO counselling_consent(id) VALUES($inserted_patient_id);";
        $conn->query($sql45);

        $sql46= "INSERT INTO opd_bill_pay(patient_id) VALUES('$inserted_patient_id');";
        $conn->query($sql46);

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
            
      }
       else {
        echo "<div class='alert'> No Insertaion</div>";
      }
}

if (isset($_POST['reject'])) {
    $id=$_POST['id'];
 $update="UPDATE `patient_records` SET is_followup= 0  WHERE `id` = '$id'";
   $conn->query($update);
}
if (isset($_POST['hold'])) {
    $id=$_POST['id'];
    $date=$_POST['date'];
 $update="UPDATE `patient_records` SET follow_date='$date'  WHERE `id` = '$id'";
   $conn->query($update);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
                <?php echo $title['ro']?>
            </marquee>
        </h1>
        <a href="receptionPage.php" class="btn btn-success m-2">Dashboard</a>
        <div class="d-flex justify-content-between">
            <h3 class="mx-3 my-2 inline-heading">View FollowUp</h3>
            <div><label class="form-label mx-2">Search:</label><input id="filterDate" type="date"></div>
        </div>
        <?php

$sql = "SELECT * FROM patient_records  where  is_followup= 1  AND follow_approve=0 ORDER BY id ASC; ";
$data = $conn->query($sql);
          if(!$res = $data->fetch_assoc()){
            echo "<div class='alert alert-danger'>No Fellow</div>";
          }
          else{
          }

     ?>

        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-all" mt-2>
                    <thead class="table-dark">
                        <tr>
                            <th>PATIENT ID</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>CONSULTANT</th>
                            <th>FOLLOWUP DATE</th>
                            <th>APPROVE </th>
                            <th>HOLD </th>
                            <th>REJECT</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">

                        <?php
                        $sql = "SELECT * FROM patient_records  where  is_followup= 1  AND follow_approve=0 ORDER BY id ASC; ";
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['consultant'] . '</td>';
                            echo ' <form method="POST"><td> <input type="hidden" name="id" value="' . $res['id'] . '">
                            <input type="hidden" name="name" value="' . $res['name'] . '">
                            <input type="date"  name="date" value="' . $res['follow_date'] . '" > </td>';
                            echo '<td> <button type="submit" name="approve" class="btn btn-primary"' ; 
                            echo $res['follow_approve']==1?'disabled':'';
                            echo'>Approve</button></td>';
                            echo '<td> <button  name="hold" class="btn btn-success">Hold</button></td>';
                            echo '<td> <button  type="submit" name="reject" class="btn btn-danger">Reject</button></td></form>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#filterDate").on("change", function() {
                var selectedDate = $(this).val();
                $.ajax({
                    url: "follow_handle.php",
                    method: "POST",
                    data: {
                        date: selectedDate
                    },
                    success: function(data) {
                        $("#tableBody").html(data);
                    }
                });
            });
        });
        </script>
</body>

</html>