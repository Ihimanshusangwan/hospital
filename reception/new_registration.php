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
                <h3 class="text-dark text-center ml-2"> Patient Details:</h3>
                <?php

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
        $opd_no=1;
        $sql = "select opd_no from opd_tracker where date='$reg_date'";
        $result = $conn->query($sql);
        if($result->num_rows >0){
            $row=$result->fetch_assoc();
            $opd_no = $row['opd_no'] + 1;
            
        $sql = "update opd_tracker set opd_no = $opd_no where date='$reg_date'";
        $conn->query($sql);
        }else{
      
          $sql = "insert into opd_tracker(date,opd_no) values('$reg_date',1)";
          $conn->query($sql);
        }

        $sql = "INSERT INTO patient_records (is_old_patient,name, address, taluka, district, age, sex,dob_date, reg_date, mobile,consultant,type_of_visit,name_pwp,address_pwp,taluka_pwp,district_pwp,age_pwp,relation,sex_pwp,mobile_pwp,referred_by,patient_complaints,is_eye,is_ortho,opd_no)
        VALUES ('$is_old_patient','$name', '$address', '$taluka', '$district', '$age', '$sex', '$dob_date', '$reg_date', '$mobile','$consultant', '$tov', '$name_pwp', '$address_pwp', '$taluka_pwp', '$district_pwp', '$age_pwp', '$relation','$sex_pwp','$mobile_pwp','$referred_by','$patient_complaints',$is_eye,$is_ortho,$opd_no)";

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
              $sql55= "INSERT INTO samtipatra1(id) VALUES('$inserted_patient_id');";
              $conn->query($sql55);
              $sql56= "INSERT INTO dama_dis(id) VALUES('$inserted_patient_id');";
              $conn->query($sql56);
              $sql57= "INSERT INTO im_reval(id) VALUES('$inserted_patient_id');";
              $conn->query($sql57);
              $sql58= "INSERT INTO nursing_assessment(id) VALUES('$inserted_patient_id');";
              $conn->query($sql58);
              $sql60= "INSERT INTO surgery_safety(id) VALUES('$inserted_patient_id');";
              $conn->query($sql60);
              $sql61= "INSERT INTO pt_rel_feedback(id) VALUES('$inserted_patient_id');";
              $conn->query($sql61);
              $sql62= "INSERT INTO pre_room_urinary(id) VALUES('$inserted_patient_id');";
              $conn->query($sql62);

              

              $sql29 = "INSERT INTO cc_glass_rx1(id) VALUES($inserted_patient_id);";
              $conn->query($sql29);
       
        
              $uhid = $_REQUEST['uhid'];
              $sql = "select patient_records.visit_count from patient_records join p_insure on patient_records.id = p_insure.id where p_insure.uhid = '$uhid' order by p_insure.id desc;";
              $row = $conn->query($sql)->fetch_assoc();
              $count = $row['visit_count'];
              $count += 1;
              $sql = "UPDATE patient_records
              SET visit_count = $count
              WHERE id = $inserted_patient_id;";
              $conn->query($sql);
        //auto generate uhid
        $sql = "update p_insure set uhid = '$uhid' where id = $inserted_patient_id;";
        $conn->query($sql);
        $sql = "update ortho_p_insure set uhid = '$uhid' where id = $inserted_patient_id;";
        $conn->query($sql);

        $description = '{"0":{"name":"Eye Cleaned","value":"off"},"1":{"name":"Dressing with betadine solution done","value":"off"},"2":{"name":"Peribulbar block/LA with 6ml of 2% lignocaine and adreline injected.","value":"off"},"3":{"name":"Dressing with betadine done","value":"off"},"4":{"name":"Eye Drapping Done","value":"off"},"5":{"name":"Pterygium mass excised","value":"off"},"6":{"name":"Mild cautery applied","value":"off"},"7":{"name":"Corneal surface smoothed with crescent blade","value":"off"},"8":{"name":"Amminiotic Membrane Graft applied over bare surface and sutured with 10-0 vicryl","value":"off"},"9":{"name":"Eye draped removed","value":"off"},"10":{"name":"5% betadine eye drop applied","value":"off"},"11":{"name":"Eye Patched","value":"off"},"12":{"name":"Surgery concluded","value":"off"}}';

        $update_last = "UPDATE `cor1` SET  description = '$description' WHERE id = '$inserted_patient_id';";
        $conn->query($update_last);
        echo "<span style='color:green;'>New Registration Successfull </span>";
           
      } else {
        echo "Error: ";
      }
    } else {
      echo "<span style='color:red;'> Name is Required</span>";
    }
  }

                ?>
                <form id="form" action="" method="POST" enctype="multipart/form-data">
                    <?php 
    $sql = "select * from patient_records join patient_info on patient_records.id = patient_info.patient_id where patient_records.id = $id;";
    $res=$conn->query($sql)->fetch_assoc();
    $sql = "select uhid from p_insure where id =$id;";
    $res2= $conn->query($sql)->fetch_assoc();
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
                    <input type="hidden" name="uhid" value="<?php echo $res2['uhid'];?>">
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
                                    name="reg_date" value="<?php echo date('Y-m-d'); ?>"  />
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
                            <select class="form-control" name="consultant" required id="consultant" onchange="changeType()">
                                <?php
                                $sql = "SELECT name,type_of_visit FROM doctors;";
                                $result = $conn->query($sql);
                                $typeData = array();
                                while ($values = $result->fetch_assoc()) {
                                    
                  $typeData["{$values['name']}"] =  $values['type_of_visit']; 
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
            <div class="form-group m-2 col-6  ">
              <label for="tov">Type of Visit:</label>
             <input type="text" class="form-control" name="tov" id="tov" readonly>
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
                        <section style="display:none;">
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
                            </section>
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
                                Submit
                            </button>
                        </div>
                    </section>

                </form>
            </div>
        </div>
    </div>
    <script>
          var changeType = ()=>{
      tovInput.value = typeData[consultantInput.value];
    }
    var typeData = <?php echo json_encode($typeData);?>;
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