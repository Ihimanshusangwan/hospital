<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
$x=0;
error_reporting(0);
if(isset($_POST['submit'])){
  $date_assessment=$_POST['date_assessment'];
  $date_surgery=$_POST['date_surgery'];
  
  $name_surgery=$_POST['name_surgery'];
  $name_anesthetist=$_POST['name_anesthetist'];
  $name_surgeon=$_POST['name_surgeon'];
  $allergic=$_POST['allergic'];
  $habit=$_POST['habit'];
  $history=$_POST['history'];
  $medication=$_POST['medication'];
  $pre_anaesthesia=$_POST['pre_anaesthesia'];
  
  $vital=$_POST['bp'].'&'. $_POST['pulse'].'&'. $_POST['temp'] .'&'. $_POST['spo'] .'&'. $_POST['rs'].'&'. $_POST['cvs'] ;
  $sys_exam=$_POST['csv2'] .'&'. $_POST['rs2'].'&'. $_POST['gi'] .'&'. $_POST['renal'] .'&'. $_POST['metabolic'].'&'. $_POST['neuro'].'&'. $_POST['spine'] ;
  $airway=isset($_POST['airway']) ?$_POST['airway'] :'';
  $mpc=isset($_POST['mpc']) ?$_POST['mpc'] :'';
  $mouth=isset($_POST['mouth']) ?$_POST['mouth'] :'';
  $im_distance=isset($_POST['im_distance']) ?$_POST['im_distance'] :'';
  $teeth=isset($_POST['teeth']) ?$_POST['teeth'] :'';
  $asa=isset($_POST['asa']) ?$_POST['asa'] :'';

  $date=$_POST['date1'] .'&'. $_POST['date2'];
  $blood_grp=$_POST['blood_grp1'] .'&'. $_POST['blood_grp2'];
  $hb=$_POST['hb1'] .'&'. $_POST['hb2'];
  $wbc=$_POST['wbc1'] .'&'. $_POST['wbc2'];
  $lnebm=$_POST['lnebm1'] .'&'. $_POST['lnebm2'];
  $platelet=$_POST['platelet1'] .'&'. $_POST['platelet2'];
  $bsl=$_POST['bsl1'] .'&'. $_POST['bsl2'];
  $cr=$_POST['cr1'] .'&'. $_POST['cr2'];
  $na=$_POST['na1'] .'&'. $_POST['na2'];
  $lft=$_POST['lft1'] .'&'. $_POST['lft2'];
  $sgot=$_POST['sgot1'] .'&'. $_POST['sgot2'];
  $pt=$_POST['pt1'] .'&'. $_POST['pt2'];
  $inr=$_POST['inr1'] .'&'. $_POST['inr2'];
  $fib=$_POST['fib1'] .'&'. $_POST['fib2'];
  $abg=$_POST['abg1'] .'&'. $_POST['abg2'];
  $mark=$_POST['mark1'] .'&'. $_POST['mark2'];
  $xray=$_POST['xray1'] .'&'. $_POST['xray2'];
  $ecg=$_POST['ecg1'] .'&'. $_POST['ecg2'];
  $echo=$_POST['echo1'] .'&'. $_POST['echo2'];
  $other=$_POST['other1'] .'&'. $_POST['other2'];
  
  $pre_advice=$_POST['pre_advice'];
  $nbm=$_POST['nbm'];
  $investigations=$_POST['investigations'];
  $reference=$_POST['reference'];
  $medication2=$_POST['medication2'];
  $blood_request=$_POST['blood_request'];
  $icu=$_POST['icu'];
  $anaethesia_plan_ex=isset($_POST['anaethesia_plan_ex']) ?$_POST['anaethesia_plan_ex'] :'';
  $post_operative_plan=isset($_POST['post_operative_plan']) ?$_POST['post_operative_plan'] :'';
  $post_operative_pain=isset($_POST['post_operative_pain']) ?$_POST['post_operative_pain'] :'';
  $anae_plan=$_POST['anae_plan'];
  $premedication=$_POST['premedication'];
  $typelasa=$_POST['typelasa'];
  $special_req=$_POST['special_req'];
  $possibility_vent=$_POST['possibility_vent'];
  $post_icu=isset($_POST['post_icu']) ?$_POST['post_icu'] :'';
  $identify=isset($_POST['identify']) ?$_POST['identify'] :'';
  $nbm3=$_POST['nbm3'];
  $fresh_comp=$_POST['fresh_comp'];
  $consent=$_POST['consent'];
  $pac_chart=$_POST['pac_chart'];
  $comorbid=$_POST['comorbid'];
  $investigation_review=$_POST['investigation_review'];
  $blood_arranged=$_POST['blood_arranged'];
  $change_plan=isset($_POST['change_plan']) ?$_POST['change_plan'] :'';
  $describe=$_POST['describe'];
  $pre_op_advice=$_POST['pre_op_advice'];
  $name_sign=$_POST['name_sign'];
  $date_time=$_POST['date_time'];

  $update="UPDATE pre_operative_anesth SET 
  date_assessment='$date_assessment', date_surgery='$date_surgery', name_surgery='$name_surgery',name_anesthetist='$name_anesthetist',
  name_surgeon='$name_surgeon',allergic='$allergic',habit='$habit', history='$history', medication='$medication',
  pre_anaesthesia='$pre_anaesthesia',
  vital='$vital',sys_exam='$sys_exam',airway='$airway', mpc='$mpc', mouth='$mouth', im_distance='$im_distance', teeth='$teeth',
  asa='$asa', date='$date', blood_grp='$blood_grp', hb='$hb', wbc='$wbc', lnebm='$lnebm', platelet='$platelet', bsl='$bsl',
  cr='$cr', na='$na', lft='$lft', sgot='$sgot', pt='$pt', inr='$inr', fib='$fib', abg='$abg', mark='$mark', xray='$xray',
  ecg='$ecg',echo='$echo', other='$other', pre_advice='$pre_advice', nbm='$nbm', investigations='$investigations', reference='$reference',
  medication2='$medication2',blood_request='$blood_request',icu='$icu', anaethesia_plan_ex='$anaethesia_plan_ex',
  post_operative_plan='$post_operative_plan', post_operative_pain='$post_operative_pain', anae_plan='$anae_plan',
  premedication='$premedication',typelasa='$typelasa', special_req='$special_req', possibility_vent='$possibility_vent',
  post_icu='$post_icu', identify='$identify', nbm3='$nbm3', fresh_comp='$fresh_comp', consent='$consent', pac_chart='$pac_chart',
  comorbid='$comorbid', investigation_review='$investigation_review', blood_arranged='$blood_arranged', change_plan='$change_plan',
  describ='$describe', pre_op_advice='$pre_op_advice', name_sign='$name_sign', date_time='$date_time'
  WHERE id = '$id';
  ";
  $sql1=mysqli_query($conn,$update);
  
  $x=1;
}
$query="SELECT * FROM pre_operative_anesth WHERE id=$id";
$sql2=mysqli_query($conn,$query);
$row2=mysqli_fetch_assoc($sql2);

$vital = explode("&", $row2['vital']);
$sys_exam=explode("&", $row2['sys_exam']);
$date=explode("&", $row2['date']);
$blood_grp=explode("&", $row2['blood_grp']);
$hb=explode("&", $row2['hb']);
$wbc=explode("&", $row2['wbc']);
$lnebm=explode("&", $row2['lnebm']);
$platelet=explode("&", $row2['platelet']);
$bsl=explode("&", $row2['bsl']);
$cr=explode("&", $row2['cr']);
$na=explode("&", $row2['na']);
$lft=explode("&", $row2['lft']);
$sgot=explode("&", $row2['sgot']);
$pt=explode("&", $row2['pt']);
$inr=explode("&", $row2['inr']);
$fib=explode("&", $row2['fib']);
$abg=explode("&", $row2['abg']);
$mark=explode("&", $row2['mark']);
$xray=explode("&", $row2['xray']);
$ecg=explode("&", $row2['ecg']);
$echo=explode("&", $row2['echo']);
$other=explode("&", $row2['other']);



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Included HTML</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
  </head>

  <body>
    <div class="container my-4">
    <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>

        <form action="" method="POST">
        <a href="eye_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
        <a href="eye_pre_op_anesthetist_print.php?id=<?php echo $id; ?>" class="btn btn-success ">Print </a>
        <h3 class="text-center text-dark m-3">Pre Operative Assessment By Anesthetist</h3>
      <div class="row">
      <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
       
        <div class="col-6">

          <label for="" class="form-label">Date and Time of Assesment:</label>
          <input
            type="datetime-local"
            class="form-control"
            name="date_assessment"
            id=""
            value="<?php echo $row2['date_assessment'];?>"
            placeholder=""
          />
        </div>
        <div class="col-6">
          <label for="" class="form-label">Date and Time of Surgery:</label>
          <input
            type="datetime-local"
            class="form-control"
            name="date_surgery"
            id=""
            value="<?php echo $row2['date_surgery'];?>"
            placeholder=""
          />
        </div>
        <div class="col-12">
          <label for="" class="form-label">Name of Surgery:</label>
          <input type="text" class="form-control" name="name_surgery" value="<?php echo $row2['name_surgery'];?>" id="" placeholder="" />
        </div>
        <div class="col-6">
          <label for="" class="form-label">Name of Anesthetist:</label>
          <input type="text" class="form-control" name="name_anesthetist" value="<?php echo $row2['name_anesthetist'];?>"id="" placeholder="" />
        </div>
        <div class="col-6">
          <label for="" class="form-label">Name of Surgeon:</label>
          <input type="text" class="form-control" name="name_surgeon"value="<?php echo $row2['name_surgeon'];?>" id="" placeholder="" />
        </div>
      </div>

      <hr class="my-2" />
      <div class="row">
        <div class="col-7 mt-3">
          <div class="row">
            <div class="col-12">
              <label for="" class="form-label"
                >Allergic To/ Adverse Drug Event:</label
              >
              <input type="text" class="form-control" value="<?php echo $row2['allergic'];?>"name="allergic" id="" placeholder="" />
            </div>
            <div class="col-12">
              <label for="" class="form-label"
                >Habit to: Alcohol/Tobacco/Smoking/Other:</label
              >
              <input type="text" class="form-control" value="<?php echo $row2['habit'];?>"name="habit" id="" placeholder="" />
            </div>
            <hr class="my-2" />
            <div class="col-12">
              <label for="" class="form-label"
                >Significant History/Findings:</label
              >
              <textarea  id="" name="history" class="form-control"><?php echo $row2['history'];?></textarea>
            </div>
            <div class="col-12 mt-3 mb-1">
              HTN / DM / IHD / COPD / ASTHMA / THYROID
            </div>
            <hr class="my-2" />
            <div class="col-12">
              <label for="" class="form-label">Medication:</label>
              <textarea id="" name="medication" class="form-control"><?php echo $row2['medication'];?></textarea>
            </div>
            <hr class="my-2" />
            <div class="col-12">
              <label for="" class="form-label"
                >Previous Anaesthesia History:</label
              >
              <textarea id="" name="pre_anaesthesia" class="form-control"><?php echo $row2['pre_anaesthesia'];?></textarea>
            </div>
            <hr class="my-2" />
            <div class="col-12">
              <label for="" name="vital" class="form-label">Vital Signs:</label><br />
              <div class="row">
                <div class="col-4">
                  <label for="">BP:</label>
                  <input type="text" name="bp" value="<?php echo $vital[0];?>"class="form-control" />
                </div>
                <div class="col-4">
                  <label for="">Pulse:</label>
                  <input type="text" name="pulse"value="<?php echo $vital[1];?>" class="form-control" />
                </div>
                <div class="col-4">
                  <label for="">Temp:</label>
                  <input type="text" name="temp"value="<?php echo $vital[2];?>" class="form-control" />
                </div>
                <div class="col-4">
                  <label for="">SPO2:</label>
                  <input type="text"value="<?php echo $vital[3];?>" name="spo" class="form-control" />
                </div>
                <div class="col-4">
                  <label for="">RS:</label>
                  <input value="<?php echo $vital[4];?>" type="text" name="rs" class="form-control" />
                </div>
                <div class="col-4">
                  <label for="">CVS:</label>
                  <input type="text" value="<?php echo $vital[5];?>" name="cvs" class="form-control" />
                </div>
              </div>
            </div>
            <hr class="my-2" />
            <div class="col-12">
              <label for="" name="systemic_exam" class="form-label">Systemic Examination:</label
              ><br />
              <div class="row">
                <div class="col-3">
                  <label for="">CSV:</label>
                  <input type="text" value="<?php echo $sys_exam[0];?>" name="csv2" class="form-control" />
                </div>
                <div class="col-3">
                  <label for="">RS:</label>
                  <input type="text" name="rs2"value="<?php echo $sys_exam[1];?>" class="form-control" />
                </div>
                <div class="col-3">
                  <label for="">GI:</label>
                  <input type="text" value="<?php echo $sys_exam[2];?>"name="gi" class="form-control" />
                </div>
                <div class="col-3">
                  <label for="">Renal:</label>
                  <input type="text"value="<?php echo $sys_exam[3];?>" name="renal" class="form-control" />
                </div>
                <div class="col-3">
                  <label for="">Metabolic:</label>
                  <input type="text" value="<?php echo $sys_exam[4];?>"name="metabolic" class="form-control" />
                </div>
                <div class="col-3">
                  <label for="">Neuro:</label>
                  <input type="text"value="<?php echo $sys_exam[5];?>" name="neuro" class="form-control" />
                </div>
                <div class="col-3">
                  <label for="">Spine:</label>
                  <input type="text" value="<?php echo $sys_exam[6];?>"name="spine" class="form-control" />
                </div>
              </div>
            </div>
            <hr class="my-2" />
            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <label for="" >Airway: Difficult- &nbsp;&nbsp;&nbsp; </label>
                  <input type="radio" name="airway" value="Yes" <?php if($row2['airway']=='Yes'){
                    echo 'checked';
                  }  ?> />
                  <label for="">Yes</label>&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="airway" value="No"<?php if($row2['airway']=='No'){
                    echo 'checked';
                  }  ?>/>
                  <label for="">No</label>
                  
                </div>
                <div class="col-12">
                  <label for="" name="" >MPC :</label>
                  <select name="mpc" id="" class="form-control-sm">
                    <option value="I"<?php if ($row2['mpc'] == 'I') {
                                          echo 'selected';
                                    } ?>>I</option>
                    <option value="II" <?php if($row2['mpc']=='II'){
                      echo 'selected';
                      }?>>II</option>
                    <option value="III" <?php if($row2['mpc']=='III'){
                      echo 'selected';
                      }?>>III</option>
                    <option value="IV" <?php if($row2['mpc']=='IV'){
                      echo 'selected';
                      }?>>IV</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="" name="">Mouth Opening:</label>
                  <select name="mouth" id="" class="form-control-sm">
                    <option value="Full" <?php if($row2['mouth']=='Full'){
                      echo 'selected';
                      }?>>Full</option>
                    <option value="Restricted" <?php if($row2['mouth']=='Restricted'){
                      echo 'selected';
                      }?>>Restricted</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="" name="im_distance"
                    >IM Distance: 3 Fingers &nbsp;&nbsp;&nbsp;</label
                  >
                  <input type="radio" name="im_distance" value="Yes"
                  <?php if($row2['im_distance']=='Yes'){
                    echo 'checked';
                  }  ?>  />
                  <label for="">Yes</label>&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="im_distance" value="No"
                  <?php if($row2['im_distance']=='No'){
                    echo 'checked';
                  }  ?> />
                  <label for="">No</label>
                </div>
                <div class="col-12">
                  <label for="" >Teeth : Dentures &nbsp;&nbsp;&nbsp;</label>
                  <input type="radio" name="teeth" value="Yes"  <?php if($row2['teeth']=='Yes'){
                    echo 'checked';
                  }  ?> />
                  <label for="">Yes</label>&nbsp;&nbsp;&nbsp;
                  <input type="radio"name="teeth" value="No" <?php if($row2['teeth']=='No'){
                    echo 'checked';
                  }  ?>  />
                  <label for="">No</label>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-2" />
          <div class="col-12">
            <label for="" name="">ASA :</label>
            <select name="asa" id="" class="form-control-sm">
              <option value="1"<?php if($row2['asa']==1){
                echo 'selected';
              }?>>1</option>
              <option value="2"<?php if($row2['asa']==2){
                echo 'selected';
              }?>>2</option>
              <option value="3"<?php if($row2['asa']==3){
                echo 'selected';
              }?>>3</option>
              <option value="4"<?php if($row2['asa']==4){
                echo 'selected';
              }?>>4</option>
              <option value="5"<?php if($row2['asa']==5){
                echo 'selected';
              }?>>5</option>
              <option value="E"<?php if($row2['asa']=='E'){
                echo 'selected';
              }?>>E</option>
            </select>
          </div>
          <hr class="my-2" />
        </div>
        <div class="col-5 mt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th colspan="3">Investigations:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Date</td>
                <td><input type="date" value="<?php echo $date[0];?>"name="date1" class="form-control" /></td>
                <td><input type="date" value="<?php echo $date[1];?>"name="date2" class="form-control" /></td>
              </tr>
              <tr>
                <td>Blood Group</td>
                <td><input type="text" value="<?php echo $blood_grp[0];?>"name="blood_grp1" class="form-control" /></td>
                <td><input type="text" value="<?php echo $blood_grp[1];?>"name="blood_grp2" class="form-control" /></td>
              </tr>
              <tr>
                <td>Hb/H</td>
                <td><input type="text"value="<?php echo $hb[0];?>" name="hb1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $hb[1];?>" name="hb2" class="form-control" /></td>
              </tr>
              <tr>
                <td>WBC</td>
                <td><input type="text"value="<?php echo $wbc[0];?>" name="wbc1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $wbc[1];?>" name="wbc2" class="form-control" /></td>
              </tr>
              <tr>
                <td>L/N/E/B/M</td>
                <td><input type="text"value="<?php echo $lnebm[0];?>" name="lnebm1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $lnebm[1];?>" name="lnebm2" class="form-control" /></td>
              </tr>
              <tr>
                <td>Platelets</td>
                <td><input type="text"value="<?php echo $platelet[0];?>" name="platelet1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $platelet[1];?>" name="platelet2" class="form-control" /></td>
              </tr>
              <tr>
                <td>BSL- F/PP</td>
                <td><input type="text"value="<?php echo $bsl[0];?>" name="bsl1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $bsl[1];?>" name="bsl2" class="form-control" /></td>
              </tr>
              <tr>
                <td>Sr.Creatinine</td>
                <td><input type="text"value="<?php echo $cr[0];?>" name="cr1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $cr[1];?>" name="cr2" class="form-control" /></td>
              </tr>
              <tr>
                <td>NA/ K / Cl</td>
                <td><input type="text"value="<?php echo $na[0];?>" name="na1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $na[1];?>" name="na2" class="form-control" /></td>
              </tr>
              <tr>
                <td>LFT Pro /Alb</td>
                <td><input type="text"value="<?php echo $lft[0];?>" name="lft1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $lft[1];?>" name="lft2" class="form-control" /></td>
              </tr>
              <tr>
                <td>SGOT / SGPT</td>
                <td><input type="text"value="<?php echo $sgot[0];?>" name="sgot1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $sgot[1];?>" name="sgot2" class="form-control" /></td>
              </tr>
              <tr>
                <td>PT/ APIT</td>
                <td><input type="text"value="<?php echo $pt[0];?>" name="pt1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $pt[1];?>" name="pt2" class="form-control" /></td>
              </tr>
              <tr>
                <td>INR</td>
                <td><input type="text"value="<?php echo $inr[0];?>" name="inr1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $inr[1];?>" name="inr2" class="form-control" /></td>
              </tr>
              <tr>
                <td>Fibrinogen</td>
                <td><input type="text"value="<?php echo $fib[0];?>" name="fib1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $fib[1];?>" name="fib2" class="form-control" /></td>
              </tr>
              <tr>
                <td>ABG</td>
                <td><input type="text"value="<?php echo $abg[0];?>" name="abg1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $abg[1];?>" name="abg2" class="form-control" /></td>
              </tr>
              <tr>
                <td>Vital Markers</td>
                <td><input type="text"value="<?php echo $mark[0];?>" name="mark1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $mark[1];?>" name="mark2" class="form-control" /></td>
              </tr>
              <tr>
                <td>X-Ray</td>
                <td><input type="text"value="<?php echo $xray[0];?>" name="xray1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $xray[1];?>" name="xray2" class="form-control" /></td>
              </tr>
              <tr>
                <td>ECG</td>
                <td><input type="text" value="<?php echo $ecg[0];?>"name="ecg1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $ecg[1];?>" name="ecg2" class="form-control" /></td>
              </tr>
              <tr>
                <td>2D Echo</td>
                <td><input type="text"value="<?php echo $echo[0];?>" name="echo1" class="form-control" /></td>
                <td><input type="text" value="<?php echo $echo[1];?>"name="echo2" class="form-control" /></td>
              </tr>
              <tr>
                <td>Other</td>
                <td><input type="text" value="<?php echo $other[0];?>"name="other1" class="form-control" /></td>
                <td><input type="text"value="<?php echo $other[1];?>" name="other2" class="form-control" /></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label for="" class="form-label">Pre Operative Advice:</label>
          <input type="text" value="<?php echo $row2['pre_advice'];?>" name="pre_advice" class="form-control" />
        </div>
        <div class="col-6">
          <label for="" class="form-label">NBM: </label>
          <input type="text" value="<?php echo $row2['nbm'];?>" name="nbm" class="form-control" />
        </div>
        <div class="col-6">
          <label for="" class="form-label">Investigations Adviced: </label>
          <input type="text" value="<?php echo $row2['investigations'];?>"name="investigations"  class="form-control" />
        </div>
        <div class="col-6">
          <label for="" class="form-label">Reference/Response: </label>
          <input type="text" value="<?php echo $row2['reference'];?>" name="reference" class="form-control" />
        </div>
        <div class="col-6">
          <label for="" class="form-label">Medication: </label>
          <input type="text" value="<?php echo $row2['medication2'];?>" name="medication2" class="form-control" />
        </div>
        <div class="col-6">
          <label for="" class="form-label">Blood Request: </label>
          <input type="text" value="<?php echo $row2['blood_request'];?>" name="blood_request" class="form-control" />
        </div>
        <div class="col-6">
          <label for="" class="form-label"
            >ICU/ Post Op Ventilation / Risk Consent:
          </label>
          <input type="text"value="<?php echo $row2['icu'];?>" name="icu"  class="form-control" />
        </div>
        <div class="col-6 mt-3">
          <label for=""  >Anaesthesia Plan Explained &nbsp;&nbsp;&nbsp;</label>
          <input type="radio"name="anaethesia_plan_ex" value="Yes" <?php if($row2['anaethesia_plan_ex']=='Yes'){
            echo 'checked';}?> />
          <label for="">Yes</label>&nbsp;&nbsp;&nbsp;
          <input type="radio"name="anaethesia_plan_ex" value="No" <?php if($row2['anaethesia_plan_ex']=='No'){
            echo 'checked';}?> />
          <label for="">No</label>
        </div>
        <div class="col-6 mt-2">
          <label for="">Post Operative Plan Explained &nbsp;&nbsp;&nbsp;</label>
          <input type="radio" name="post_operative_plan" value="Yes" <?php if($row2['post_operative_plan']=='Yes'){
            echo 'checked';}?>/>
          <label for="">Yes</label>&nbsp;&nbsp;&nbsp;
          <input type="radio"name="post_operative_plan" value="No" <?php if($row2['post_operative_plan']=='No'){
            echo 'checked';}?> />
          <label for="">No</label>
        </div>
        <div class="col-6 mt-2">
          <label for="">Post Operative Pain Management Explained &nbsp;&nbsp;&nbsp;</label
          >
          <input type="radio" name="post_operative_pain" value="Yes" <?php if($row2['post_operative_pain']=='Yes'){
            echo 'checked';}?>/>
          <label for="">Yes</label>&nbsp;&nbsp;&nbsp;
          <input type="radio"name="post_operative_pain" value="No" <?php if($row2['post_operative_pain']=='No'){
            echo 'checked';}?> />
          <label for="">No</label>
        </div>
        <hr class="my-2" />
        <div class="col-12">
          <label for=""  class="form-label">Anaesthesia Plan: </label>
          <textarea name="anae_plan" id="" class="form-control"><?php echo $row2['anae_plan'];?></textarea>
        </div>
        <div class="col-12">
          <label for="" class="form-label">Pre Medication: </label>
          <textarea name="premedication" id="" class="form-control"><?php echo $row2['premedication'];?></textarea>
        </div>
        <div class="col-12">
          <label for="" class="form-label"
            >Type: LA/ SA /EA / GA / Nerve Block / Sedation / MAC
          </label>
          <textarea name="typelasa" id="" class="form-control"><?php echo $row2['typelasa'];?></textarea>
        </div>
        <div class="col-12">
          <label for="" class="form-label">Special Requirement: </label>
          <textarea name="special_req" id="" class="form-control"><?php echo $row2['special_req'];?></textarea>
        </div>
        <div class="col-12">
          <label for="" class="form-label">Possibility of Ventilation: </label>
          <textarea name="possibility_vent" id="" class="form-control"><?php echo $row2['possibility_vent'];?></textarea>
        </div>
        <div class="col-6 my-2">
          <label for=""  >Post OP - ICU &nbsp;&nbsp;&nbsp;</label>
          <input type="radio" name="post_icu" value="Yes" <?php if($row2['post_icu']=='Yes'){
            echo 'checked';}?>/>
          <label for="">Yes</label>&nbsp;&nbsp;&nbsp;
          <input type="radio" name="post_icu" value="No" <?php if($row2['post_icu']=='No'){
            echo 'checked';}?>/>
          <label for="">No</label>
        </div>
        <div class="row" style="border: 2px solid black">
          <h5 class="my-3">Immediate Pre Operative Evaluation:</h5>
          <div class="col-12 my-2">
            <label for="" 
              >Identify / Surgery / Surgeon / So &nbsp;&nbsp;&nbsp;</label
            >
            <input type="radio"name="identify" value="Yes" <?php if($row2['identify']=='Yes'){
            echo 'checked';}?> />
            <label for="">Yes</label>&nbsp;&nbsp;&nbsp;
            <input type="radio"name="identify" value="No" <?php if($row2['identify']=='No'){
            echo 'checked';}?> />
            <label for="">No</label>
          </div>
          <div class="col-6">
            <label for="" class="form-label">NBM: </label>
            <input type="text" value="<?php echo $row2['nbm3'];?>" name="nbm3" class="form-control" />
          </div>
          <div class="col-6">
            <label for="" class="form-label">Fresh Complaints: </label>
            <input type="text"value="<?php echo $row2['fresh_comp'];?>" name="fresh_comp"  class="form-control" />
          </div>
          <div class="col-12">
            <label for="" class="form-label">Consent: </label>
            <input type="text"value="<?php echo $row2['consent'];?>" name="consent"  class="form-control" />
          </div>
          <div class="col-6">
            <label for="" class="form-label">PAC Chart Review: </label>
            <input type="text"value="<?php echo $row2['pac_chart'];?>"  name="pac_chart" class="form-control" />
          </div>
          <div class="col-6">
            <label for="" class="form-label">Comorbid/ Risk Factors: </label>
            <input type="text"value="<?php echo $row2['comorbid'];?>" name="comorbid"  class="form-control" />
          </div>

          <div class="col-12">
            <label for="" class="form-label">Investigation Review: </label>
            <textarea name="investigation_review" id="" class="form-control"><?php echo $row2['investigation_review'];?></textarea>
          </div>
          <div class="col-12">
            <label for="" class="form-label">Blood Arranged: </label>
            <textarea name="blood_arranged" id="" class="form-control"><?php echo $row2['blood_arranged'];?></textarea>
          </div>
          <div class="col-6 my-2">
            <label for="" name="change_plan" >Change in Plan : &nbsp;&nbsp;&nbsp;</label>
            <input type="radio" name="change_plan" value="Yes" <?php if($row2['change_plan']=='Yes'){
            echo 'checked';}?>/>
            <label for="">Yes</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" name="change_plan" value="No" <?php if($row2['change_plan']=='No'){
            echo 'checked';}?>/>
            <label for="">No</label>
          </div>
          <div class="col-6 my-2">
            <label for="" class="form-label">If YES Describe: </label>
            <textarea name="describe" id="" class="form-control"><?php echo $row2['describ'];?></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
            <label for="" class="form-label">Pre Operative Advice: </label>
            <textarea name="pre_op_advice" id="" class="form-control"><?php echo $row2['pre_op_advice'];?></textarea>
        </div>
        <div class="col-6 my-3">
            <label for="" class="form-label">Name and Sign of Anaesthestist: </label>
           <input type="text" value="<?php echo $row2['name_sign'];?>" name="name_sign" class="form-control">
          </div>
        <div class="col-6 my-3">
            <label for="" class="form-label">Date and Time: </label>
            <input type="datetime-local" value="<?php echo $row2['date_time'];?>" name="date_time"  class="form-control">
          </div>
      </div>
    <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>

    </div>
</form>

    <!-- Bootstrap JavaScript (requires jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>
