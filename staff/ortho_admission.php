<?php
session_start();
  if(isset($_REQUEST['logout'])){
    session_unset();
    session_destroy();
  }
  require("../admin/connect.php");
  $id=$_GET['id'];
  
  

if (isset($_POST['submit'])) {

  $date=$_POST['admissiondate'];
  $name=$_POST['name'];
  $address= $_POST['pc'];
  $contact = $_POST['contactno'];
  $consultant = $_POST['consultant'];
  $refer = $_POST['refer'];
  $age = $_POST['age'];
  $sex = $_POST['sex'];
  $pc = $_POST['pc1'];

  
  $update="UPDATE `patient_records` SET `name` = '$name',`sex` = '$sex', `age` = '$age', `consultant` = '$consultant', `referred_by`='$refer', `address` = '$address',`mobile` = '$contact',`patient_complaints` = '$pc'  WHERE `id` = '$id'";
  $conn->query($update);

  $sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res = $data->fetch_assoc();

  $weight = $_POST['weight1'];
  $pulse = $_POST['pulse1'];
  $bp = $_POST['bp1'];
  $temp = $_POST['temp1'];

  $update1="UPDATE `patient_info` SET  `weight` = '$weight',`pulse` = '$pulse',`bp` = '$bp', `temp` = '$temp'  WHERE `patient_id` = '$id'";
  $conn->query($update1);

  $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
  $data1 = $conn->query($sql1);
  $res1 = $data1->fetch_assoc();


  $uhid = $_POST['uhid'];
  $ipd = $_POST['ipd'];
  $ward = $_POST['ward/icu'];
  $bed = $_POST['bed/room'];
  $aadhar = $_POST['aadhar'];
  $time = $_POST['time'];
  $occ = $_POST['occ'];
  $em_c = $_POST['em_c'];
  $mlc = $_POST['mlc/nmlc'];
  $i_company = $_POST['i_company'];
  $relationship = $_POST['relationship'];
  $ad_c = $_POST['ad_c'];
  $s_discharge = $_POST['dis'];
  $icd = $_POST['icd1'];
  $p_diagnosis = $_POST['p_diagnosis'];
  $f_diagnosis = $_POST['f_diagnosis'];
  $c_death = $_POST['c_death'];
  $insure = $_POST['insured'];

  $update2="UPDATE `ortho_p_insure` SET `date` = '$date',`uhid` = '$uhid',`ipd` = '$ipd',`ward/icu` = '$ward',`uhid` = '$uhid',`bed/room` = '$bed',`aadhar` = '$aadhar',`time` = '$time',`occ` = '$occ',`em_c` = '$em_c',`mlc/nmlc` = '$mlc',`i_company` = '$i_company',`relationship` = '$relationship',`ad_c` = '$ad_c',`icd`='$icd',`s_discharge` = '$s_discharge',`p_diagnosis` = '$p_diagnosis',`f_diagnosis` = '$f_diagnosis',`c_death` = '$c_death',`insure` = '$insure' WHERE `id` = '$id'";
  $conn->query($update2);


  $sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res2 = $data2->fetch_assoc();

  $p_his = $_POST['p_his'];
  $resp = $_POST['resp1'];
  $cvs = $_POST['cvs1'];
  $rs = $_POST['rs1'];
  $height = $_POST['height'];
  $r_his = $_POST['r_his'];
  $r_his = $_POST['r_his'];
  $m_his = $_POST['m_his'];
  $habit = $_POST['habit'];
  $invest = $_POST['invest'];
  $nutrition = $_POST['nutrition'];
  if (($_FILES['img']["size"]>0)) { 

 
    $image = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
    $update1 = "UPDATE `ortho_p_init` SET img='$image' where id = $id";
    $conn->query($update1);
    
    
    
    
  
  }
  if (isset($_POST["imageData"]) && !empty($_POST["imageData"])) {
    // Get the image data from the hidden input
    $imageData = $_POST["imageData"];
    
    $image = base64_decode($imageData);


    // Update the database with the new image data using prepared statements
    $updateQuery = "UPDATE `ortho_p_init` SET img = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $image, $id);

    $stmt->execute();
  }
 
  $update3="UPDATE `ortho_p_init` SET `p_his` = '$p_his',`resp` = '$resp',`cvs` = '$cvs',`rs` = '$rs',`r_his` = '$r_his',`m_his` = '$m_his',`habit` = '$habit', `invest` = '$invest',`nutrition` = '$nutrition',`height`='$height'  WHERE `id` = '$id'";
  $conn->query($update3);

  $sql3 = "SELECT * FROM ortho_p_init WHERE id = '$id';";
  $data3 = $conn->query($sql3);
  $res3 = $data3->fetch_assoc();
  $g_condition = $_POST['g_condition'];
  $skin = $_POST['skin'];
  $ana = $_POST['ana'];
  $nai = $_POST['nai'];
  $cya = $_POST['cya'];
  $any = $_POST['any'];
  $oed = $_POST['oed'];
  $jaun = $_POST['jaun'];
  $thro = $_POST['thro'];
  $toun = $_POST['toun'];
  $lymp = $_POST['lymp'];
  $pain = $_POST['pain'];
  $rs1 = $_POST['rs'];
  $cvs1 = $_POST['cvs'];
  $cns1= $_POST['cns'];
  $pa = $_POST['pa'];
  $other = $_POST['other'];
  $p_diag = $_POST['p_diag'];
  $f_diag = $_POST['f_diag'];
  $p_care = $_POST['p_care'];
  $num_pain_scale = $_POST['num_pain_scale'];
  
  $name_sign = $_POST['name_sign'];
  $date_time = $_POST['date_time'];
  
  $update4="UPDATE `ortho_p_general` SET  `g_condition` = '$g_condition', `skin` = '$skin', `ana` = '$ana', `nai` = '$nai', `cya` = '$cya', `any` = '$any', `oed` = '$oed', `jaun` = '$jaun', `thro` = '$thro', `toun` = '$toun', `lymp` = '$lymp', `pain` = '$pain', `rs1` = '$rs1', `cvs1` = '$cvs1', `cns1` = '$cns1', `pa` = '$pa', `other` = '$other', `p_diag` = '$p_diag',`f_diag` = '$f_diag',`p_care` = '$p_care',`num_pain_scale` = '$num_pain_scale',`name_sign` = '$name_sign',`date_time` = '$date_time' WHERE `id` = '$id'";
  $conn->query($update4);
  echo "<div class='alert alert-success'> Updated Successfully</div>";

  $sql4 = "SELECT * FROM ortho_p_general WHERE id = '$id';";
  $data4 = $conn->query($sql4);
  $res4 = $data4->fetch_assoc();
  
  

}

else{
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

  

  $sql3 = "SELECT * FROM ortho_p_init WHERE id = '$id';";
  $data3 = $conn->query($sql3);
  $res3 = $data3->fetch_assoc();

  $sql4 = "SELECT * FROM ortho_p_general WHERE id = '$id';";
  $data4 = $conn->query($sql4);
  $res4 = $data4->fetch_assoc();
  
  

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="../dropdown_styles.css">
  <style type="text/css">
    body {
      margin: 30px;
    }

    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 40px;
    }
  </style>
  <style type="text/css">
        body {
            background: lightgray;
            animation: fade-in 1s linear;
        }

        .fl {
            animation: gelatine 1s;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }

        input[type="text"]::placeholder,
        input[type="time"]::placeholder,
        input[type="date"]::placeholder ,
        input[type="tel"]::placeholder,
        input[type="number"]::placeholder{
            color: lightgrey;
        }

        textarea[type="text"]::placeholder {
            color: lightgrey;
        }

        hr {
            border: 1px solid black;
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
        input[type="date"],
        input[type="tel"],
        input[type="number"] {
            outline: none !important;
            border-color: #C0C0C0;
            box-shadow: 5px 5px 5px 5px #C0C0C0;
            animation: gelatine 1s;
        }

        textarea[type="text"] {
            outline: none !important;
            border-color: #C0C0C0;
            box-shadow: 5px 5px 5px 5px #C0C0C0;
            animation: gelatine 1s;
        }

        input[type="text"]:focus,
        input[type="time"]:focus,
        input[type="date"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus {
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
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
          <button onclick="location.reload();" class="btn btn-success">Refresh</button>
          <form id="form" action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2">
                <label class="form-label text-primary">INSURED
                </label>
                <select class="form-control" name="insured">
                  
                  <option value="INSURED" <?php if ($res2['insure'] == 'INSURED') {
                                      echo 'selected';
                                    } ?>>INSURED</option>
                  <option value="NON INSURED" <?php if ($res2['insure'] == 'NON INSURED') {
                                        echo 'selected';
                                      } ?>>NON INSURED</option>
                  <option value="Not Selected" <?php if ($res2['insure'] == 'Not Selected') {
                                        echo 'selected';
                                      } ?>>Not Selected</option>
                </select>
              </div>
              <div class="col-md-2">
                <label class="form-label text-primary">UHID.No</label>
                <input name="uhid" type="text" class="form-control" id="reg" value="<?php echo $res2['uhid']; ?>">
              </div>
              <div class="col-md-2">
                <label class="form-label text-primary">IPD.No</label>
                <input name="ipd" type="text" class="form-control" id="reg" value="<?php echo $res2['ipd']; ?>">
              </div>
              <div class="col-md-2">
                <label class="form-label text-primary">Ward/ICU:</label>
                <input name="ward/icu" type="text" class="form-control" id="reg" value="<?php echo $res2['ward/icu']; ?>">
              </div>
              <div class="col-md-2">
                <label class="form-label text-primary">Bed/Room.No</label>
                <input name="bed/room" type="text" class="form-control" id="reg" value="<?php echo $res2['bed/room']; ?>">
              </div>
            </div>
            <div class="row g-3">
              <div class="col-md-3">
                <label class="form-label text-primary">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $res['name']; ?>">
              </div>
              <div class="col-md-3">
                <label class="form-label text-primary">Aadhar.No :</label>
                <input name="aadhar" type="text" class="form-control" id="aadhar" placeholder="Enter Aadhar Number" value="<?php echo $res2['aadhar']; ?>">
              </div>
              <div class="col-md-2">
                <label class="form-label text-primary">Date of Admission :</label>
                <input name="admissiondate" type="date" class="form-control" id="DOA" placeholder="Date of Admission" value="<?php echo $res2['date']; ?>">
              </div>
              <div class="col-md-2">
                <label class="form-label text-primary" for="time_ad">Time of Admission :</label>
                <input name="time" type="time" class="form-control" id="time_ad" placeholder="Time of Admission" value="<?php echo $res2['time']; ?>">
              </div>
              <div class="col-md-2">
                <label class="form-label text-primary">Occupation:</label>
                <input name="occ" type="text" class="form-control" id="occupation" placeholder="Occupation" value="<?php echo $res2['occ']; ?>">
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label text-primary">Address</label>
                    <textarea name="pc" id="pc" value="" class="form-control" placeholder="Patient Complaint"><?php echo $res['address']; ?></textarea>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label text-primary">Contact no</label>
                    <input name="contactno" type="tel" class="form-control" id="inputAddress" placeholder="Contact no" value="<?php echo $res['mobile']; ?>">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label text-primary">Consultant Name:</label>
                    <input name="consultant" type="text" class="form-control" id="consultant" placeholder="Consultant Name" value="<?php echo $res['consultant']; ?>">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label text-primary">Referred By:</label>
                    <input name="refer" type="text" class="form-control" id="inputAddress" placeholder="refer" value="<?php echo $res['referred_by']; ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-1">
                <label class="form-label text-primary">Age</label>
                <input name="age" type="text" class="form-control" id="age" placeholder="Age" value="<?php echo $res['age']; ?>">
              </div>
              <div class="col-md-2">
                <label class="form-label text-primary">Sex</label>
                <select name="sex" id="sex" class="form-select">
                <option value="Male" <?php if ($res['sex'] == 'Male') {
                                      echo 'selected';
                                    } ?>>Male</option>
                <option value="Female" <?php if ($res['sex'] == 'Female') {
                                        echo 'selected';
                                      } ?>>Female</option>
                </select>
              </div>
              <div class="col-md-2">
              <label class="form-label text-primary">Emergency Contact:</label>
                <input name="em_c" type="text" class="form-control" id="age" placeholder="Contact" value="<?php echo $res2['em_c']; ?>">
              </div>
              <div class="col-md-2">
                <label class="form-label text-primary">MLC/NMLC</label>
                <input name="mlc/nmlc" type="text" class="form-control" id="MLC/NMLC" value="<?php echo $res2['mlc/nmlc']; ?>">
              </div>
              <div class="col-md-3">
                <label class="form-label text-primary">Name Of Insured Company</label>
                <input name="i_company" type="text" class="form-control" id="reg" value="<?php echo $res2['i_company']; ?>">
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label text-primary">Relationship</label>
                    <input name="relationship" type="text" class="form-control" id="inputAddress" placeholder="Relationship" value="<?php echo $res2['relationship']; ?>"/>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label text-primary"> Address & Contact no</label>
                    <textarea name="ad_c" type="tel" class="form-control" id="inputAddress" placeholder="Contact no"><?php echo $res2['ad_c']; ?></textarea>
                  </div>
                  <div class="col-md-2">
                    <label class="form-label text-primary">Status of Discharge</label>
                    <select name="dis" id="dis" class="form-select">
                      <option value="Curved" <?php if ($res2['s_discharge'] == 'Curved') {
                                      echo 'selected';
                                    } ?>>Curved</option>
                      <option value="Improved" <?php if ($res2['s_discharge'] == 'Improved') {
                                      echo 'selected';
                                    } ?>>Improved</option>
                      <option value="Relieved" <?php if ($res2['s_discharge'] == 'Relieved') {
                                      echo 'selected';
                                    } ?>>Relieved</option>
                      <option value="Status Quo." <?php if ($res2['s_discharge'] == 'Status Quo.') {
                                      echo 'selected';
                                    } ?>>Status Quo.</option>
                      <option value="Transferred" <?php if ($res2['s_discharge'] == 'Transferred') {
                                      echo 'selected';
                                    } ?>>Transferred</option>
                      
                      <option value="DAMA" <?php if ($res2['s_discharge'] == 'DAMA') {
                                      echo 'selected';
                                    } ?>>DAMA</option>
                      <option value="Absconded" <?php if ($res2['s_discharge'] == 'Absconded') {
                                      echo 'selected';
                                    } ?>>Absconded</option>
                      <option value="Expired" <?php if ($res2['s_discharge'] == 'Expired') {
                                      echo 'selected';
                                    } ?>>Expired</option>

                    </select>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label text-primary">ICD Code:</label>
                    <input name="icd1" type="text" class="form-control" id="inputAddress" placeholder="Referred by" value="<?php echo $res2['icd']; ?>">
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-4">
                    <label class="form-label text-primary">Provisional Diagnosis :</label>
                    <textarea name="p_diagnosis" type="text" style="height: 100px;" class="form-control live-fetch" id="diagnosis" placeholder="Provisional Diagnosis" value="" data-column="p_diagnosis" data-table="p_insure"><?php echo $res2['p_diagnosis']; ?></textarea><div class="dropdown-container"></div>
                  </div>
                  <div class="col-lg-4">
                    <label class="form-label text-primary">Final Diagnosis :</label>
                    <textarea name="f_diagnosis" type="text" style="height: 100px;" class="form-control live-fetch" id="final" placeholder="Final Diagnosis"  data-column="f_diagnosis" data-table="p_insure"><?php echo $res2['f_diagnosis']; ?></textarea><div class="dropdown-container"></div>
                  </div>
                  <div class="col-lg-4">
                    <label class="form-label text-primary">Cause of Death :</label>
                    <textarea name="c_death" type="text" style="height: 100px;" class="form-control live-fetch" id="cause" placeholder="Cause of Death"  data-column="c_death" data-table="p_insure"><?php echo $res2['c_death']; ?></textarea><div class="dropdown-container"></div>
                  </div>
                  <h2 class="text-center mt-3">PATIENT INITIAL ASSESMENT RECORD</h2>
                  <div class="col-lg-4">
                    <label class="form-label text-primary">Past History(Medical & Surgical) :</label>
                    <textarea name="p_his" type="text" style="height: 100px;" class="form-control live-fetch" id="treatment" placeholder="Treatment"  data-column="p_his" data-table="ortho_p_init"><?php echo $res3['p_his']; ?></textarea><div class="dropdown-container"></div>
                  </div>
                  <div class="col-lg-4">
                    <label class="form-label text-primary">Primary Complaint :</label>
                    <textarea name="pc1" type="text" style="height: 100px;" class="form-control live-fetch" id="comp" placeholder="Complaint & History" value=""  data-column="patient_complaints" data-table="patient_records"><?php echo $res['patient_complaints']; ?></textarea><div class="dropdown-container"></div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <h5>Physical Examination:</h5>
                  <div class="col-sm-2">
                    <label class="form-label text-primary">Weight</label>
                    <input name="weight1" type="text" class="form-control" id="weight" placeholder="Enter Weight" value="<?php echo $res1['weight']; ?>">
                  </div>
                  <div class="col-sm-2">
                    <label class="form-label text-primary">Pulse</label>
                    <input name="pulse1" type="text" class="form-control" id="pulse" placeholder="Enter pulse" value="<?php echo $res1['pulse']; ?>">
                  </div>
                  <div class="col-sm-2">
                    <label class="form-label text-primary">BP</label>
                    <input name="bp1" type="text" class="form-control" id="bp" placeholder="Enter BP" value="<?php echo $res1['bp']; ?>">
                  </div>
                  <div class="col-sm-2">
                    <label class="form-label text-primary">Temperature</label>
                    <input name="temp1" type="text" class="form-control" id="temp" placeholder="Enter Temperature" value="<?php echo $res1['temp']; ?>">
                  </div>
                  <div class="col-sm-2">
                    <label class="form-label text-primary">Resp</label>
                    <input name="resp1" type="text" class="form-control" id="resp" placeholder="Enter Resp" value="<?php echo $res3['resp']; ?>">
                  </div>
                  <div class="col-lg-2">
                    <label class="form-label text-primary">C.V.S</label>
                    <input name="cvs1" type="text" class="form-control" id="name" placeholder="Enter CSV" value="<?php echo $res3['cvs']; ?>">
                  </div>
                  <div class="col-lg-2">
                    <label class="form-label text-primary">R.S.</label>
                    <input name="rs1" type="text" class="form-control" id="name" placeholder="Enter RS" value="<?php echo $res3['rs']; ?>">
                  </div>
                  <div class="col-lg-2">
                    <label class="form-label text-primary">Height</label>
                    <input name="height" type="text" class="form-control" id="height" placeholder="Height" value="<?php echo $res3['height']; ?>">
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                <div class="col-lg-4">
                  <label class="form-label text-primary">Relevant Family History:</label>
                  <textarea name="r_his" type="text" style="height: 100px;" class="form-control live-fetch" id="examination_finding_text" placeholder=""  data-column="r_his" data-table="ortho_p_init"><?php echo $res3['r_his']; ?></textarea><div class="dropdown-container"></div>
                </div>
                <div class="col-lg-4">
                  <label class="form-label text-primary">Medication History:</label>
                  <textarea name="m_his" type="text" style="height: 100px;" class="form-control live-fetch" id="treatment" placeholder=""  data-column="m_his" data-table="ortho_p_init"><?php echo $res3['m_his']; ?></textarea><div class="dropdown-container"></div>
                </div>
                <div class="col-lg-4">
                  <label class="form-label text-primary">Any Habit-(Tobacco/Alcohol/Smoking/Other):</label>
                  <textarea name="habit" type="text" style="height: 100px;" class="form-control live-fetch" id="localexam" placeholder="Any Habit"  data-column="habit" data-table="ortho_p_init"><?php echo $res3['habit']; ?></textarea><div class="dropdown-container"></div>
                </div>
                <div class="col-lg-4">
                  <label class="form-label text-primary">Relevant Previous Investigation/Report:</label>
                  <textarea name="invest" type="text" style="height: 100px;" class="form-control live-fetch" id="localexam" placeholder="Relevant Previous Investigation/Report"  data-column="invest" data-table="ortho_p_init"><?php echo $res3['invest']; ?></textarea><div class="dropdown-container"></div>
                </div>
                <div class="col-lg-4">
                  <label class="form-label text-primary">Immunization Record and Nutritional & Growth History:</label>
                  <textarea name="nutrition" type="text" style="height: 100px;" class="form-control live-fetch" id="localexam" placeholder="Immunization Record and Nutritional & Growth History"  data-column="nutrition" data-table="ortho_p_init"><?php echo $res3['nutrition']; ?></textarea><div class="dropdown-container"></div>
                </div>
              </div>
            </div>
          </div>


          <div class="container mt-3">
            <div class="row">
              <h5>General Examination on Admission:</h5>
              <div class="col-sm-2">
                <label class="form-label text-primary">General Condition</label>
                <input name="g_condition" type="text" class="form-control" id="weight" placeholder="Condition" value="<?php echo $res4['g_condition']; ?>">
              </div>
              <div class="col-sm-2">
                <label class="form-label text-primary">Skin</label>
                <input name="skin" type="text" class="form-control" id="pulse" placeholder="Skin" value="<?php echo $res4['skin']; ?>">
              </div>
              <div class="col-sm-2">
                <label class="form-label text-primary">Anaemia</label>
                <input name="ana" type="text" class="form-control" id="bp" placeholder="Anaemia" value="<?php echo $res4['ana']; ?>">
              </div>
              <div class="col-sm-2">
                <label class="form-label text-primary">Nails</label>
                <input name="nai" type="text" class="form-control" id="temp" placeholder="Nails" value="<?php echo $res4['nai']; ?>">
              </div>
              <div class="col-sm-2">
                <label class="form-label text-primary">Cyanosis</label>
                <input name="cya" type="text" class="form-control" id="resp" placeholder="Cyanosis" value="<?php echo $res4['cya']; ?>">
              </div>
              <div class="col-lg-2">
                <label class="form-label text-primary">Any others</label>
                <input name="any" type="text" class="form-control" id="name" placeholder="Any others" value="<?php echo $res4['any']; ?>">
              </div>
              <div class="col-lg-2">
                <label class="form-label text-primary">Oedema</label>
                <input name="oed" type="text" class="form-control" id="name" placeholder="Oedema" value="<?php echo $res4['oed']; ?>">
              </div>
              <div class="col-lg-2">
                <label class="form-label text-primary">Jaundice</label>
                <input name="jaun" type="text" class="form-control" id="height" placeholder="Jaundice" value="<?php echo $res4['jaun']; ?>">
              </div>
              <div class="col-lg-2">
                <label class="form-label text-primary">Throat</label>
                <input name="thro" type="text" class="form-control" id="height" placeholder="Throat" value="<?php echo $res4['thro']; ?>">
              </div>
              <div class="col-lg-2">
                <label class="form-label text-primary">Toungue</label>
                <input name="toun" type="text" class="form-control" id="height" placeholder="Toungue" value="<?php echo $res4['toun']; ?>">
              </div>
              <div class="col-lg-2">
                <label class="form-label text-primary">Lymph Nodes</label>
                <input name="lymp" type="text" class="form-control" id="height" placeholder="Lymph Nodes" value="<?php echo $res4['lymp']; ?>" >
              </div>
              <div class="col-lg-2">
                <label class="form-label text-primary">Pain Score</label>
                <input name="pain" type="text" class="form-control" id="height" placeholder="Pain Score" value="<?php echo $res4['pain']; ?>">
              </div>
          
            </div>
            
          </div>
          <div class="container mt-3">
            <div class="col-md-2">
            <label class="form-label text-primary">Numeric Pain Scale</label>
            <input name="num_pain_scale" type="number" class="form-control" id="height" placeholder="Pain Scale"  value="<?php echo $res4['num_pain_scale']; ?>">
        </div>

          <div class="container mt-3">
            <div class="row">
              <h5>Systemic Examination:</h5>
              <div class="col-sm-2">
                <label class="form-label text-primary">R.S:</label>
                <input name="rs" type="text" class="form-control" id="weight" placeholder="R.S" value="<?php echo $res4['rs1']; ?>">
              </div>
              <div class="col-sm-2">
                <label class="form-label text-primary">C.V.S:</label>
                <input name="cvs" type="text" class="form-control" id="pulse" placeholder="C.V.S" value="<?php echo $res4['cvs1']; ?>">
              </div>
              <div class="col-sm-2">
                <label class="form-label text-primary">C.N.S:</label>
                <input name="cns" type="text" class="form-control" id="bp" placeholder="C.N.S" value="<?php echo $res4['cns1']; ?>">
              </div>
              <div class="col-sm-2">
                <label class="form-label text-primary">PA:</label>
                <input name="pa" type="text" class="form-control" id="temp" placeholder="PA" value="<?php echo $res4['pa']; ?>">
              </div>
              <div class="col-sm-2">
                <label class="form-label text-primary">Other</label>
                <input name="other" type="text" class="form-control" id="resp" placeholder="Other" value="<?php echo $res4['other']; ?>">
              </div>
            </div>
          </div>

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <label class="form-label text-primary">Provisional Diagnosis: </label>
      <textarea name="p_diag" type="text" style="height: 100px;" class="form-control live-fetch" id="diagnosis" placeholder="Provisional Diagnosis" data-column='p_diag' data-table="p_general" ><?php echo $res4['p_diag'];?></textarea><div class="dropdown-container"></div>
    </div>
    <div class="col-lg-4">
      <label class="form-label text-primary">Final Diagnosis :</label>
      <textarea name="f_diag" type="text" style="height: 100px;" class="form-control live-fetch" id="final" placeholder="Final Diagnosis" data-column='f_diag' data-table="p_general"><?php echo $res4['f_diag']; ?></textarea><div class="dropdown-container"></div>
    </div>
    <div class="col-lg-4">
      <label class="form-label text-primary">Plan of Care Rx :</label>
      <textarea name="p_care" type="text" style="height: 100px;" class="form-control live-fetch" id="cause" data-column='p_care' data-table="p_general"><?php echo $res4['p_care'];?></textarea><div class="dropdown-container"></div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <label class="form-label text-primary">Image :</label><br>
      <img  src="data:image/jpeg;base64, <?php echo base64_encode($res3['img'])?>" style="height: 8rem; width: 8rem;"  >
    </div>
    <div class="col-lg-6">
      <div class="row">
        <div class="col-7">
        <label class="form-label">Upload Image:</label>
    
    <input type="file" name="img" id="image" class="form-control" placeholder="Mobile"><div class="form-group text-center">
      
        </div>
        <div class="col-5">
        <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#cameraModal">Open Camera</button>
        </div>
      </div>
    
      </div>
    
    <input type="hidden" id="imageData" name="imageData" />
</div>
<div class="col-lg-6">
<div id="capturedImageContainer" class="form-group text-center" style="display: none;">
        <h3 class="mb-3">Captured Image:</h3>
        <img id="capturedImage" src="" alt="Captured Image" class="img-thumbnail mx-auto d-block">
      </div>
</div>

  <!-- Camera Modal -->
  <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cameraModalLabel">Camera Preview</h5>
        
        </div>
        <div class="modal-body text-center">
          <video id="cameraPreview" style="max-width: 100%;" autoplay></video>
        </div>
        <div class="modal-footer">
          <button type="button" id="captureBtn" class="btn btn-primary">Capture Image</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


    
  </div>
  <div class="row">
    <div class="col-6">
       <label class="form-label">Name And Sign of Consultant :</label>
      <input type="text" name="name_sign" id="consultant" class="form-control" placeholder="Sign" value="<?php echo $res4['name_sign']; ?>"><br>
    </div>
    <div class="col-6">
       <label class="form-label">Date and Time :</label>
      <input type="datetime-local" name="date_time" id="consultant" class="form-control" placeholder="" value="<?php echo $res4['date_time']; ?>" ><br>
    </div>
  </div>
</div>
            <div class="row">
              <div class="col mt-2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                <a href="ortho_admission_print.php?id=<?php echo $id; ?>" class="btn btn-outline-primary ml-auto">Print</a>
              </div>
            </div>
          </form>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script>
    document.addEventListener('DOMContentLoaded', function () {
      const cameraModal = document.getElementById('cameraModal');
      const cameraPreview = document.getElementById('cameraPreview');
      const captureBtn = document.getElementById('captureBtn');
      const capturedImageContainer = document.getElementById('capturedImageContainer');
      const capturedImage = document.getElementById('capturedImage');
      const imageDataInput = document.getElementById('imageData');
      let mediaStream;

      // Event listener to open the camera modal
      $('#cameraModal').on('shown.bs.modal', function () {
        navigator.mediaDevices.getUserMedia({ video: true })
          .then(stream => {
            mediaStream = stream;
            cameraPreview.srcObject = stream;
          })
          .catch(error => {
            console.error('Error accessing the camera: ', error);
            $('#cameraModal').modal('hide');
          });
      });

      // Event listener to close the camera modal
      $('#cameraModal').on('hidden.bs.modal', function () {
        if (mediaStream) {
          mediaStream.getVideoTracks().forEach(track => track.stop());
          mediaStream = null;
        }
      });

      captureBtn.addEventListener('click', () => {
        if (!mediaStream) return;

        const imageCapture = new ImageCapture(mediaStream.getVideoTracks()[0]);

        imageCapture.takePhoto()
          .then(blob => {
            const url = URL.createObjectURL(blob);

            capturedImage.src = url;
            capturedImageContainer.style.display = 'block';
            $('#cameraModal').modal('hide');

            // Convert the captured image to base64 and set it as the value of the hidden input
            const reader = new FileReader();
            reader.onloadend = () => {
              const base64String = reader.result.replace('data:', '').replace(/^.+,/, '');
              imageDataInput.value = base64String;
            };
            reader.readAsDataURL(blob);
          })
          .catch(error => {
            console.error('Error capturing the image: ', error);
          });
      });

  
    });
    </script>
    <script src="../fetch_dropdown_script.js"></script>
</body>
</html>