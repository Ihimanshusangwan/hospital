<?php
    require("../admin/connect.php");
    $id = $_GET['id'];
    session_start();

    $sql0=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
    $row0=mysqli_fetch_assoc($sql0);

    $sql3=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
    $row3=mysqli_fetch_assoc($sql3);

    $sql4=mysqli_query($conn,"SELECT * FROM ortho_p_insure WHERE id = '$id';");
    $row4=mysqli_fetch_assoc($sql4);
    $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  
    $x=0;
error_reporting(0);
if (isset($_POST['submit'])) {
 
  $opd=isset($_POST['casual'])?mysqli_real_escape_string($conn, $_POST['casual']) : '';
  $date=$_POST['date0'];
  $time=$_POST['time0'];
  
  $reldetail=$_POST['relate'];
  $emergency=isset($_POST['emeryn'])? mysqli_real_escape_string($conn, $_POST['emeryn']) : '';
  $modeofarr=$_POST['modeofa'];
  
  $allergic=isset($_POST['alleryno']) ? mysqli_real_escape_string($conn, $_POST['alleryno']) : '';
  $desallergic=$_POST['ydescribe'];
  
  $complain=$_POST['complaint'];

  $timev=array();
  $tempv=array();
  $bpv=array();
  $respv=array();
  $hrv=array();
  $spov=array();
  $bslv=array();

  for($i=0;$i<6;$i++){

  $element1=$_POST['timevs'.$i];
  array_push($timev, $element1);

  $element2=$_POST['tempvs'.$i];
  array_push($tempv, $element2);

  $element3=$_POST['bpvs'.$i];
  array_push($bpv, $element3);

  $element4=$_POST['respvs'.$i];
  array_push($respv, $element4);

  $element5=$_POST['hrvs'.$i];
  array_push($hrv, $element5);

  $element6=$_POST['spovs'.$i];
  array_push($spov, $element6);

  $element7=$_POST['bslvs'.$i];
  array_push($bslv, $element7);

  }
  $timev_json=json_encode($timev);
  $temp_json=json_encode($tempv);
  $bp_json=json_encode($bpv);
  $resp_json=json_encode($respv);
  $hr_json=json_encode($hrv);
  $spo_json=json_encode($spov); 
  $bsl_json=json_encode($bslv);
  


  $masscasual=$_POST['masscasual'];
  $triage=$_POST['triage'];
  $pasthistory=$_POST['pasthistory'];
  
  $labreport=$_POST['labreport'];
  $physiexam=$_POST['physiexam'];
  
  $headeye=$_POST['headeye'];
  $heart=$_POST['iheart'];
  
  $chest=$_POST['ichest'];
  $abdomen=$_POST['iabdomen'];
  
  $spine=$_POST['extrespine'];
  $neuroexam=$_POST['neuroexam'];
  
  $otherfind=$_POST['aofind'];
  $pain=isset($_POST['painyn'])? mysqli_real_escape_string($conn, $_POST['painyn']) : '';
  $intensity=$_POST['vas'];
  
  
  $location=isset($_POST['ilocation']) ? mysqli_real_escape_string($conn, $_POST['ilocation']) : '';
  $duration=$_POST['iduration'];
  
  $quality=isset($_POST['quality']) ? mysqli_real_escape_string($conn, $_POST['quality']) : '';
  $character=isset($_POST['character']) ? mysqli_real_escape_string($conn, $_POST['character']) : '';
  
  $agfactor=isset($_POST['agfactor']) ? mysqli_real_escape_string($conn, $_POST['agfactor']) : '';
  $relievfactor=isset($_POST['relievfact'])? mysqli_real_escape_string($conn, $_POST['relievfact']) : '';
  
  $treatment=$_POST['treatmentg'];
  $procedure=$_POST['procedure'];
  $provisional=$_POST['provisiondia'];
  $advdischarge=$_POST['discharge'];
  $modofdischarge=$_POST['modofdis'];
  
  $timecompletion=$_POST['timecompletion'];
  $phyname=$_POST['phyname'];
  $nursename=$_POST['nursename'];
  
  $query = "UPDATE fdata SET
      
      `opd` = '$opd', 
      `date0`='$date',
      `time0`='$time',
      `relative` = '$reldetail', 
      `emergency` = '$emergency', 
      `modeofarr` = '$modeofarr', 
      `allergic` = '$allergic', 
      `descallergy` = '$desallergic', 
      `complaints` = '$complain', 
      `timevs` = '$timev_json', 
      `tempvs`= '$temp_json', 
      `bpvs` = '$bp_json', 
      `respvs` = '$resp_json', 
      `hrvs` = '$hr_json', 
      `spovs` = '$spo_json', 
      `bslvs` = '$bsl_json', 
      
      `mass` = '$masscasual', 
      `triage` = '$triage', 
      `past` = '$pasthistory', 
      `labreports` = '$labreport', 
      `phyexam` = '$physiexam', 
      `head` = '$headeye', 
      `heart` = '$heart', 
      `chest` = '$chest', 
      `abdomen` = '$abdomen', 
      `spine` = '$spine', 
      `neuroexam` = '$neuroexam', 
      `anyother` = '$otherfind', 
      `pain` = '$pain', 
      `vascale` = $intensity, 
      `location` = '$location', 
      `duration` = '$duration', 
      `quality` = '$quality', 
      `characterlbr` = '$character', 
      `aggfactor` = '$agfactor', 
      `relivfactor` = '$relievfactor', 
      `treatment` = '$treatment', 
      `proceduregiven` = '$procedure', 
      `provisional` = '$provisional', 
      `advice` = '$advdischarge', 
      `discharge` = '$modofdischarge', 
      `timecomp` = '$timecompletion', 
      `phyname` = '$phyname', 
      `nursesname` = '$nursename'
  WHERE `id`={$id}";
  $sql = mysqli_query($conn, $query);
$x=1;
}
  

   $sql2=mysqli_query($conn,"SELECT * FROM fdata WHERE id={$id}");
   $row=mysqli_fetch_assoc($sql2);

  if($row){
    
  $time_de=isset($row['timevs'])? json_decode($row['timevs'], true):['','','','','',''];
  $temp_de=isset($row['tempvs'])? json_decode($row['tempvs'], true):['','','','','',''];
  $bp_de=isset($row['bpvs'])? json_decode($row['bpvs'], true):['','','','','',''];
  $resp_de=isset($row['respvs'])? json_decode($row['respvs'], true):['','','','','',''];
  $hr_de=isset($row['hrvs'])? json_decode($row['hrvs'], true):['','','','','',''];
  $spo_de=isset($row['spovs'])? json_decode($row['spovs'], true):['','','','','',''];
  $bsl_de=isset($row['bslvs'])? json_decode($row['bslvs'], true):['','','','','',''];
  

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
        input[type="date"]::placeholder {
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
        input[type="date"] {
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
    <header>
    
       
        <div class="container  ">
            <div class="container">
            <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
           <h3 class=" fl text-center text-dark">EMERGENCY ROOM ASSESSMENT FORM</h3>
            <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
       
    </div>
            <div class="container">
            <div class="row justify-content-center">
              <div class="">
              <div class="col m-4 p-4 shadow-lg rounded ">
              <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="ortho_emer_print.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>
            <div class="row">
              <form action="" method="POST" id="form-field" autocomplete="on">
                
                    <div class="row">
                      <div class="col-md-3">
                        <div class="mb-1 mt-2">
                          <label class="form-label">Name :<?php echo $row0['name']; ?></label>
 </div>
                      </div>

                      <div class="col-md-3">
                        <div class="mb-1 mt-2">
                          <label class="form-label">Age : <?php echo $row0['age']; ?></label>
                           </div>
                      </div>

                      <div class="col-md-3">
                        <div class="mb-1 mt-2">
                          <span class="form-label" id="gen">Gender :<?php echo $row0['sex']; ?></span>
                 
                            </div>
                      </div>
                      <div class="col-md-3">
                          <div class="mb-3 mt-2">
                            <label class="form-label">UHID : <?php echo $row4['uhid'];?> </label>
                           </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Casualty/OPD No.:</label>
                            <input type="text" name="casual" class="form-control" value="<?php echo $row['opd'] ?>" id="casuality">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Date :</label>
                            <input type="date" name="date0" class="form-control" value="<?php echo $row['date0'] ?>" id="">
                          
                             </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Time of Arrival :</label>
                            <input type="time" name="time0" class="form-control" value="<?php echo $row['time0'] ?>" id="">
                          
                             </div>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Relative's Name , Address & Telephone No.</label>
                        <textarea name="relate" class="form-control" id="relative" ><?php echo $row['relative'] ?></textarea>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <span class="form-label">Emergency care prior arrival</span>
                            <div class="form-check">

                                
                          <?php
            $options = array(
                array('id' => 'emeryes', 'value' => 'Yes', 'label' => 'Yes'),
                array('id' => 'emerno', 'value' => 'No', 'label' => 'No')
            );
            foreach ($options as $option) {
                $optionId = $option['id'];
                $optionValue = $option['value'];
                $optionLabel = $option['label'];
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='emeryn' value='$optionValue' id='$optionId'";
                if (($row['emergency']) === $optionValue) {
                    echo " checked";
                }
                echo ">";
                echo "<span>$optionLabel</span>";
                echo "</div>";
            }
            ?>
</div>

                          </div>
                        </div>
                      
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Mode of arrival</label>
                            <select class="form-control" name="modeofa" id="modeofa">
                              <option selected>Select mode of arrival</option>
                              <option value="AMB" <?php if ($row['modeofarr'] == 'AMB') {
                                      echo 'selected';
                                    } ?>>AMB</option>
                              <option value="Strecher" <?php if ($row['modeofarr'] == 'Strecher') {
                                      echo 'selected';
                                    } ?>>Strecher</option>
                              <option value="Walk" <?php if ($row['modeofarr'] == 'Walk') {
                                      echo 'selected';
                                    } ?>>Walk</option>
                              <option value="Wheel Chair" <?php if ($row['modeofarr'] == 'Wheel Chair') {
                                      echo 'selected';
                                    } ?>>Wheel Chair</option>
                              <option value="Crutches" <?php if ($row['modeofarr'] == 'Crutches') {
                                      echo 'selected';
                                    } ?>>Crutches</option>
                              <option value="Other" <?php if ($row['modeofarr'] == 'Other') {
                                      echo 'selected';
                                    } ?>>Other</option>
                            </select>
                            
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                        <div class="mb-3">
                          <span class="form-label">Allergic</span>
                          <div class="form-check">
                          <?php
            $options = array(
                array('id' => 'alleryes', 'value' => 'Yes', 'label' => 'Yes'),
                array('id' => 'allerno', 'value' => 'No', 'label' => 'No')
            );

            echo "<form method='POST' action='".$_SERVER['PHP_SELF']."'>";
            foreach ($options as $option) {
                $optionId = $option['id'];
                $optionValue = $option['value'];
                $optionLabel = $option['label'];
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='alleryno' value='$optionValue' id='$optionId'";
                if (($row['allergic']) === $optionValue) {
                    echo " checked";
                }
                echo ">";
                echo "<span>$optionLabel</span>";
                echo "</div>";
            }
            
            ?>

                          </div>
                            </div>
                      </div>

                      <div class="form-check">
                            <span>If Yes, Describe</span>
                            <input type="text" name="ydescribe" class="form-control"value="<?php echo $row['descallergy'] ?>" id="allergic">
                          </div>

                        <div class="mb-3">
                          <label class="form-label">Present Complaints & Duration</label>
                          <textarea name="complaint" class="form-control" id="complain"><?php echo $row['complaints'] ?></textarea>
                        </div>

                        <div class="vital text-center border border-dark">
                            <span class="form-label">Vital Signs</span>
                            <div style=" overflow: auto;">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <th scope="col">Time</th>
                                    <th scope="col">Temp</th>
                                    <th scope="col">BP</th>
                                    <th scope="col">Resp</th>
                                    <th scope="col">HR</th>
                                    <th scope="col">SpO2</th>
                                    <th scope="col">BSL</th>
                                </thead>
                                <?php
                                        for($i=0;$i<6;$i++){
                                         echo '<tbody>';
                                    echo '<td><input type="time" name="timevs'.$i.'" value="'.$time_de[$i].'" class="form-control text-center" id="timevsi'.$i.'"></td>';
                                    echo '<td><input type="text" name="tempvs'.$i.'" value=" '.$temp_de[$i].' " class="form-control text-center" id="tempvsi'.$i.'"></td>';
                                    echo '<td><input type="text" name="bpvs'.$i.'" value=" '.$bp_de[$i].' " class="form-control text-center" id="bpvsi'.$i.'"></td>';
                                    echo '<td><input type="text" name="respvs'.$i.'" value=" '.$resp_de[$i].' " class="form-control text-center" id="respvsi'.$i.'"></td>';
                                    echo '<td><input type="text" name="hrvs'.$i.'" value=" '.$hr_de[$i].' " class="form-control text-center" id="hrvsi'.$i.'"></td>';
                                    echo '<td><input type="text" name="spovs'.$i.'" value=" '.$spo_de[$i].'  " class="form-control text-center" id="spovsi'.$i.'"></td>';
                                    echo '<td><input type="text" name="bslvs'.$i.'" value=" '.$bsl_de[$i].' " class="form-control text-center" id="bslvsi'.$i.'"></td>';
                                     echo '</tbody>';
                                        }
                                ?>
                            </table>
</div>
                        </div>
                        <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="form-label">In case of Mass casually</label>
                            <input type="text" name="masscasual" value="<?php echo $row['mass'] ?>" class="form-control" id="mass" >
                          </div>

                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label">Triage Code</label>
                              <select class="form-control" name="triage" id="triage">
                                <option selected>Select triage code</option>
                                <option value="Red" <?php if ($row['triage'] == 'Red') {
                                      echo 'selected';
                                    } ?>>Red</option>
                                <option value="Yellow"  <?php if ($row['triage'] == 'Yellow') {
                                      echo 'selected';
                                    } ?>>Yellow</option>
                                <option value="Green"  <?php if ($row['triage'] == 'Green') {
                                      echo 'selected';
                                    } ?>>Green</option>
                                <option value="Black"  <?php if ($row['triage'] == 'Black') {
                                      echo 'selected';
                                    } ?>>Black</option>
                                 </select>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <label class="form-label">Past History</label>
                            <textarea name="pasthistory"  class="form-control" id="past" ><?php echo $row['past'] ?></textarea>
                          </div>

                          <div class="col-md-6">
                            <label  class="form-label">Significant Tests done /Laboratory reports</label>
                            <textarea name="labreport" class="form-control" id="report" ><?php echo $row['labreports'] ?></textarea>
                          </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Physical Examination</label>
                            <input type="text" name="physiexam" value="<?php echo $row['phyexam'] ?>" class="form-control" id="phexam" >
                          </div>



                          <div class="row">
                            <div class="col-md-3">
                                  <div class="mb-3">
                                    <label class="form-label">Head/Eyes/Ears/Throat/Neck</label>
                                    <input type="text" name="headeye" value="<?php echo $row['head'] ?>" class="form-control" id="head">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="mb-3">
                                    <label class="form-label">Heart</label>
                                    <input type="text" name="iheart" value="<?php echo $row['heart'] ?>" class="form-control" id="heart">
                                  </div>
                            </div>

                            <div class="col-md-3">
                                  <div class="mb-3">
                                    <label class="form-label">Chest/Lungs</label>
                                    <input type="text" name="ichest" value="<?php echo $row['chest'] ?>" class="form-control" id="chest">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="mb-3">
                                    <label  class="form-label">Abdomen</label>
                                    <input type="text" name="iabdomen" value="<?php echo $row['abdomen'] ?>" class="form-control" id="abdomen">
                                  </div>
                            </div>
                          </div>

                          

                          <div class="row">
                            <div class="col-md-6">
                                  <div class="mb-3">
                                    <label class="form-label">Extremities/Spine</label>
                                    <input type="text" name="extrespine" value="<?php echo $row['spine'] ?>" class="form-control" id="spine">
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label">Neurological Examination</label>
                                    <input type="text" name="neuroexam" value="<?php echo $row['neuroexam'] ?>" class="form-control" id="neurological">
                                  </div>
                            </div>
                          </div>

                          <div class="mb-3">
                            <label class="form-label">Any other findings</label>
                            <input type="text" name="aofind" value="<?php echo $row['anyother'] ?>" class="form-control" id="findings">
                          </div>


                          <div class="row">
                          <div class="col-md-6">
                              <div class="mb-3">
                                <span class="form-label">Pain</span>
                                <div class="form-check">
                                <?php
            $options = array(
                array('id' => 'painyes', 'value' => 'Yes', 'label' => 'Yes'),
                array('id' => 'painno', 'value' => 'No', 'label' => 'No')
            );

            foreach ($options as $option) {
                $optionId = $option['id'];
                $optionValue = $option['value'];
                $optionLabel = $option['label'];
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='painyn' value='$optionValue' id='$optionId'";
                if (($row['pain'])=== $optionValue) {
                    echo " checked";
                }
                echo ">";
                echo "<span>$optionLabel</span>";
                echo "</div>";
            }
          
            ?></div>
                                </div>
                              </div>
                              <img src="vascale.jpg" alt="" style="width: 150px; height: auto; margin-left: 100px; padding: 5px; border: 1px solid #000;">
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="mb-3">
                                    <span class="form-label">Intensity:(Rate your pain using the pain scale)</span>
                                  </div>
                                </div>
                                
                                <div class="col-md-4">
                                  <div class="mb-3">
                                    <label class="form-label">Visual Analogue Scale</label>
                                    <select class="form-control" name="vas" id="vascale">
                                      <option selected>0</option>
                                      <option value="1" <?php if ($row['vascale'] == 1) {
                                          echo 'selected';
                                    } ?>>1</option>
                                      <option value="2" <?php if ($row['vascale'] == 2) {
                                      echo 'selected';
                                    } ?>>2</option>
                                      <option value="3" <?php if ($row['vascale'] == 3) {
                                      echo 'selected';
                                    } ?>>3</option>
                                      <option value="4" <?php if ($row['vascale'] == 4) {
                                      echo 'selected';
                                    } ?>>4</option>
                                      <option value="5" <?php if ($row['vascale'] == 5) {
                                      echo 'selected';
                                    } ?>>5</option>
                                      <option value="6" <?php if ($row['vascale'] == 6) {
                                      echo 'selected';
                                    } ?>>6</option>
                                      <option value="7" <?php if ($row['vascale'] == 7) {
                                      echo 'selected';
                                    } ?>>7</option>
                                      <option value="8" <?php if ($row['vascale'] == 8) {
                                      echo 'selected';
                                    } ?>>8</option>
                                      <option value="9" <?php if ($row['vascale'] == 9) {
                                      echo 'selected';
                                    } ?>>9</option>
                                      <option value="10" <?php if ($row['vascale'] == 10) {
                                      echo 'selected';
                                    } ?>>10</option>
                                    </select>
                                  </div>
                                </div>
                              
                              </div>
                              
                         
                              <div class="p-2">
                          <div class="nwpain border border-dark p-2">
                            
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" name="ilocation" value="<?php echo $row['location'] ?>" class="form-control" id="location">
                                      </div>
                                  </div>
                                      <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label">Duration</label>
                                <input type="text" name="iduration" value="<?php echo $row['duration'] ?>" class="form-control" id="duration">
                              </div>
                                  </div>
                                </div>

                                
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="mb-3">
                                        <span class="form-label">Quality</span>
                                        <div class="form-check">


                                              <?php
                            $options = array(
                                array('id' => 'constantqua', 'value' => 'Constant', 'label' => 'Constant'),
                                array('id' => 'interqua', 'value' => 'Intermittent', 'label' => 'Intermittent')
                            );

                            foreach ($options as $option) {
                                $optionId = $option['id'];
                                $optionValue = $option['value'];
                                $optionLabel = $option['label'];
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='quality' value='$optionValue' id='$optionId'";
                                if (($row['quality'])=== $optionValue) {
                                    echo " checked";
                                }
                                echo ">";
                                echo "<span>$optionLabel</span>";
                                echo "</div>";
                            }
                          
            ?>

                                          </div>
                                      </div>
                                  </div>

                                      <div class="col-md-6">
                              <div class="mb-3">
                                <span class="form-label">Character</span>
                                <div class="form-check">
                                <?php
                            $options = array(
                                array('id' => 'charlac', 'value' => 'Lacerating', 'label' => 'Lacerating'),
                                array('id' => 'charburn', 'value' => 'Burning', 'label' => 'Burning'),
                                array('id' => 'charrad', 'value' => 'Radiating', 'label' => 'Radiating')
                            );

                            foreach ($options as $option) {
                                $optionId = $option['id'];
                                $optionValue = $option['value'];
                                $optionLabel = $option['label'];
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='character' value='$optionValue' id='$optionId'";
                                if (($row['characterlbr'])=== $optionValue) {
                                    echo " checked";
                                }
                                echo ">";
                                echo "<span>$optionLabel</span>";
                                echo "</div>";
                            }
                           
            ?>
                                  </div>
                              </div>
                                  </div>

                                </div>
                                  
                                <div class="mb-3">
                                    <label class="form-label">Aggravating factors</label>
                                    <input type="text" name="agfactor"  value="<?php echo $row['age'] ?>" class="form-control" id="aggravating">
                                  </div>
                           

                                  <div class="mb-3">
                                    <span class="form-label">Relieving Factors</span>
                                    <div class="form-check">

                                    <?php
                            $options = array(
                                array('id' => 'restfact', 'value' => 'Rest', 'label' => 'Rest'),
                                array('id' => 'medfact', 'value' => 'Medication', 'label' => 'Medication'),
                                array('id' => 'otherfact', 'value' => 'Others', 'label' => 'Others')
                            );

                            foreach ($options as $option) {
                                $optionId = $option['id'];
                                $optionValue = $option['value'];
                                $optionLabel = $option['label'];
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='relievfact' value='$optionValue' id='$optionId'";
                                if (($row['relivfactor']) === $optionValue) {
                                    echo " checked";
                                }
                                echo ">";
                                echo "<span>$optionLabel</span>";
                                echo "</div>";
                            }
                            
            ?>
                                        
                                      </div>
                                  </div>
                              </div>
                            </div>
                              
                          </div>
                              <div class="row">
                          <div class="col-md-4">
                            <label class="form-label">Treatment Given</label>
                            <textarea type="text" name="treatmentg"  class="form-control" id="treatment" ><?php echo $row['treatment'] ?></textarea>
                          </div>

                          <div class="col-md-4">
                            <label class="form-label">Procedures Given</label>
                            <textarea type="text" name="procedure" class="form-control" id="procedures" ><?php echo $row['proceduregiven'] ?></textarea>
                          </div>

                          <div class="col-md-4">
                            <label  class="form-label">Provisional Diagnosis</label>
                            <input type="text" name="provisiondia" value="<?php echo $row['provisional'] ?>" class="form-control" id="provisional" >
                          </div>

                         
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="mt-3 mb-3">
                            <label class="form-label">Advice on further Treatment/Discharge</label>
                            <input type="text" name="discharge" value="<?php echo $row['advice'] ?>" class="form-control" id="advice" >
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mt-3 mb-3">
                              <label class="form-label">Mode of Discharge</label>
                              <select class="form-control" name="modofdis" id="mod">
                                <option selected>Select mode of discharge</option>
                                <option value="Sent Home"  <?php if ($row['discharge'] == 'Sent Home') {
                                      echo 'selected';
                                    } ?>>Sent Home</option>
                                <option value="Expired" <?php if ($row['discharge'] == 'Expired') {
                                      echo 'selected';
                                    } ?>>Expired</option>
                                <option value="Admit" <?php if ($row['discharge'] == 'Admit') {
                                      echo 'selected';
                                    } ?>>Admit</option>
                                <option value="Transfer To" <?php if ($row['discharge'] == 'Transfer To') {
                                      echo 'selected';
                                    } ?>>Transfer To</option>
                              
                              </select>
                            </div>
                          </div>

                          </div>
                       


                          
                        <div class="text-center tca ">
                            <div style="overflow:auto">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <th scope="col">Time of completion of assessment</th>
                                    <th scope="col">Physician Name & Sign</th>
                                    <th scope="col">Nurses Name & Sign</th>
                                    
                                </thead>
                                <tbody>
                                    <td><input type="time" name="timecompletion" value="<?php echo $row['timecomp'] ?>" class="form-control" id=""></td>
                                    <td><input type="text" name="phyname" value="<?php echo $row['phyname'] ?>" class="form-control" id=""></td>
                                    <td><input type="text" name="nursename" value="<?php echo $row['nursesname'] ?>" class="form-control" id=""></td>
                                   
                                </tbody>
                                
                            </table>
                                </div>
                        </div>
                          <div class="text-center my-3">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit" >
                       </div>
         
</form>           
</div>
    </header>

</body>
</html>