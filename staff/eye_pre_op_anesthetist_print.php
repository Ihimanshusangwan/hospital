<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
error_reporting(0);
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style>
        body {
            margin: 0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        @media print {

            #button {
                display: none !important;
            }

            @page {
                size: A4;
            }

            .noprint {
                visibility: hidden;
            }
        }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="pre_operative_anesthesia.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Pre Operative Assessment By Anesthetist</h3>
   
    <?php include_once("../header/header.php") ?>



    <div class="row">
        <div class="col-12">
          <label for="" class="form-label">Date and Time of Assesment : <?php echo $row2['date_assessment'];?></label>
          
        </div>
        <div class="col-12">
          <label for="" class="form-label">Date and Time of Surgery : <?php echo $row2['date_surgery'];?></label>
          
        </div>
        <div class="col-12">
          <label for="" class="form-label">Name of Surgery : <?php echo $row2['name_surgery'];?></label>
        </div>
        <div class="col-6">
          <label for="" class="form-label">Name of Anesthetist : <?php echo $row2['name_anesthetist'];?></label>
        </div>
        <div class="col-6">
          <label for="" class="form-label">Name of Surgeon : <?php echo $row2['name_surgeon'];?></label>
        </div>
      </div>

      <hr class="my-2" />
      <div class="row">
        <div class="col-7 mt-3">
          <div class="row">
            <div class="col-12">
              <label for="" class="form-label"
                >Allergic To/ Adverse Drug Event : <?php echo $row2['allergic'];?></label>
            </div>
            <div class="col-12">
              <label for="" class="form-label">Habit to: Alcohol/Tobacco/Smoking/Other : <?php echo $row2['habit'];?></label>
              </div>
            <hr class="my-2" />
            <div class="col-12">
              <label for="" class="form-label"
                >Significant History/Findings:<?php echo $row2['history'];?></label
              > </div>
            <div class="col-12 mt-3 mb-1">
              HTN / DM / IHD / COPD / ASTHMA / THYROID
            </div>
            <hr class="my-2" />
            <div class="col-12">
              <label for="" class="form-label">Medication : <?php echo $row2['medication'];?></label>
            </div>
            <hr class="my-2" />
            <div class="col-12">
              <label for="" class="form-label"
                >Previous Anaesthesia History: <?php echo $row2['pre_anaesthesia'];?></label
              >
             </div>
            <hr class="my-2" />
            <div class="col-12">
              <label for="" name="vital" class="form-label">Vital Signs:</label><br />
              <div class="row">
                <div class="col-6">
                  <label for="">BP: <?php echo $vital[0];?></label>
                </div>
                <div class="col-6">
                  <label for="">Pulse: <?php echo $vital[1];?></label>
                </div>
                <div class="col-6">
                  <label for="">Temp: <?php echo $vital[2];?></label>
                </div>
                <div class="col-6">
                  <label for="">SPO2: <?php echo $vital[3];?></label>
                </div>
                <div class="col-6">
                  <label for="">RS:<?php echo $vital[4];?></label>
                </div>
                <div class="col-6">
                  <label for="">CVS: <?php echo $vital[5];?></label>
                </div>
              </div>
            </div>
            <hr class="my-2" />
            <div class="col-12">
              <label for="" name="systemic_exam" class="form-label">Systemic Examination:</label
              ><br />
              <div class="row">
                <div class="col-12">
                  <label for="">CSV: <?php echo $sys_exam[0];?></label>
                </div>
                <div class="col-12">
                  <label for="">RS: <?php echo $sys_exam[1];?></label>
                </div>
                <div class="col-12">
                  <label for="">GI: <?php echo $sys_exam[2];?></label>
                </div>
                <div class="col-12">
                  <label for="">Renal: <?php echo $sys_exam[3];?></label>
                </div>
                <div class="col-12">
                  <label for="">Metabolic: <?php echo $sys_exam[4];?></label>
                </div>
                <div class="col-12">
                  <label for="">Neuro: <?php echo $sys_exam[5];?></label>
                </div>
                <div class="col-12">
                  <label for="">Spine: <?php echo $sys_exam[6];?></label>
                </div>
              </div>
            </div>
            <hr class="my-2" />
            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <label for="" >Airway: Difficult- <?php echo $row2['airway'];?></label>
                </div>
                <div class="col-12">
                  <label for="">MPC : <?php echo $row2['mpc'];?></label>
                 
                </div>
                <div class="col-12">
                  <label for="" name="">Mouth Opening: <?php echo $row2['mouth'];?></label>
                </div>
                <div class="col-12">
                  <label for="" name="im_distance"
                    >IM Distance: 3 Fingers : <?php echo $row2['im_distance'];?></label
                  >
                </div>
                <div class="col-12">
                  <label for="" >Teeth : Dentures :  <?php echo $row2['teeth'];?></label>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-2" />
          <div class="col-12">
            <label for="" name="">ASA : <?php echo $row2['asa'];?></label>
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
                <td><?php echo $date[0];?></td>
                <td><?php echo $date[1];?></td>
              </tr>
              <tr>
                <td>Blood Group</td>
                <td><?php echo $blood_grp[0];?></td>
                <td><?php echo $blood_grp[1];?></td>
              </tr>
              <tr>
                <td>Hb/H</td>
                <td><?php echo $hb[0];?></td>
                <td><?php echo $hb[1];?></td>
              </tr>
              <tr>
                <td>WBC</td>
                <td><?php echo $wbc[0];?></td>
                <td><?php echo $wbc[1];?></td>
              </tr>
              <tr>
                <td>L/N/E/B/M</td>
                <td><?php echo $lnebm[0];?></td>
                <td><?php echo $lnebm[1];?> </td>
              </tr>
              <tr>
                <td>Platelets</td>
                <td> <?php echo $platelet[0];?> </td>
                <td> <?php echo $platelet[1];?> </td>
              </tr>
              <tr>
                <td>BSL- F/PP</td>
                <td> <?php echo $bsl[0];?> </td>
                <td><?php echo $bsl[1];?> </td>
              </tr>
              <tr>
                <td>Sr.Creatinine</td>
                <td> <?php echo $cr[0];?> </td>
                <td><?php echo $cr[1];?> </td>
              </tr>
              <tr>
                <td>NA/ K / Cl</td>
                <td> <?php echo $na[0];?> </td>
                <td> <?php echo $na[1];?> </td>
              </tr>
              <tr>
                <td>LFT Pro /Alb</td>
                <td> <?php echo $lft[0];?> </td>
                <td> <?php echo $lft[1];?> </td>
              </tr>
              <tr>
                <td>SGOT / SGPT</td>
                <td> <?php echo $sgot[0];?> </td>
                <td> <?php echo $sgot[1];?> </td>
              </tr>
              <tr>
                <td>PT/ APIT</td>
                <td> <?php echo $pt[0];?> </td>
                <td> <?php echo $pt[1];?> </td>
              </tr>
              <tr>
                <td>INR</td>
                <td> <?php echo $inr[0];?> </td>
                <td> <?php echo $inr[1];?> </td>
              </tr>
              <tr>
                <td>Fibrinogen</td>
                <td> <?php echo $fib[0];?> </td>
                <td> <?php echo $fib[1];?> </td>
              </tr>
              <tr>
                <td>ABG</td>
                <td> <?php echo $abg[0];?> </td>
                <td> <?php echo $abg[1];?> </td>
              </tr>
              <tr>
                <td>Vital Markers</td>
                <td> <?php echo $mark[0];?> </td>
                <td> <?php echo $mark[1];?> </td>
              </tr>
              <tr>
                <td>X-Ray</td>
                <td> <?php echo $xray[0];?></td>
                <td><?php echo $xray[1];?></td>
              </tr>
              <tr>
                <td>ECG</td>
                <td><?php echo $ecg[0];?> </td>
                <td> <?php echo $ecg[1];?> </td>
              </tr>
              <tr>
                <td>2D Echo</td>
                <td> <?php echo $echo[0];?> </td>
                <td> <?php echo $echo[1];?> </td>
              </tr>
              <tr>
                <td>Other</td>
                <td><?php echo $other[0];?> </td>
                <td> <?php echo $other[1];?> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label for="" class="form-label">Pre Operative Advice: <?php echo $row2['pre_advice'];?></label>
        </div>
        <div class="col-6">
          <label for="" class="form-label">NBM: <?php echo $row2['nbm'];?></label>
        </div>
        <div class="col-6">
          <label for="" class="form-label">Investigations Adviced: <?php echo $row2['investigations'];?></label>
        </div>
        <div class="col-6">
          <label for="" class="form-label">Reference/Response: <?php echo $row2['reference'];?></label>
        </div>
        <div class="col-6">
          <label for="" class="form-label">Medication: <?php echo $row2['medication2'];?></label>
        </div>
        <div class="col-6">
          <label for="" class="form-label">Blood Request: <?php echo $row2['blood_request'];?></label>
        </div>
        <div class="col-6">
          <label for="" class="form-label"
            >ICU/ Post Op Ventilation / Risk Consent: <?php echo $row2['icu'];?>
          </label>
        </div>
        <div class="col-6 mt-3">
          <label for=""  >Anaesthesia Plan Explained : <?php echo $row2['anaethesia_plan_ex'];?></label>
        </div>
        <div class="col-6 mt-2">
          <label for="">Post Operative Plan Explained : <?php echo $row2['post_operative_plan'];?></label>
        </div>
        <div class="col-6 mt-2">
          <label for="">Post Operative Pain Management Explained : <?php echo $row2['post_operative_pain'];?></label
          >
        </div>
        <hr class="my-2" />
        <div class="col-12">
          <label for=""  class="form-label">Anaesthesia Plan: <?php echo $row2['anae_plan'];?></label>
        </div>
        <div class="col-12">
          <label for="" class="form-label">Pre Medication: <?php echo $row2['premedication'];?></label>
        </div>
        <div class="col-12">
          <label for="" class="form-label"
            >Type: LA/ SA /EA / GA / Nerve Block / Sedation / MAC : <?php echo $row2['typelasa'];?>
          </label>
        </div>
        <div class="col-12">
          <label for="" class="form-label">Special Requirement: <?php echo $row2['special_req'];?></label>
        </div>
        <div class="col-12">
          <label for="" class="form-label">Possibility of Ventilation: <?php echo $row2['possibility_vent'];?> </label>
        </div>
        <div class="col-6 my-2">
          <label for=""  >Post OP - ICU : <?php echo $row2['post_icu'];?></label>
        </div>
        <div class="row " >
        <div style=" margin-left :12px; border: 2px solid black">
          <h5 class="my-3">Immediate Pre Operative Evaluation:</h5>
          <div class="col-12 my-2">
            <label for="" 
              >Identify / Surgery / Surgeon / So : <?php echo $row2['identify'];?></label
            >
          </div>
          <div class="col-6">
            <label for="" class="form-label">NBM: <?php echo $row2['nbm3'];?></label>
          </div>
          <div class="col-6">
            <label for="" class="form-label">Fresh Complaints: <?php echo $row2['fresh_comp'];?></label>
          </div>
          <div class="col-12">
            <label for="" class="form-label">Consent: <?php echo $row2['consent'];?></label>
          </div>
          <div class="col-6">
            <label for="" class="form-label">PAC Chart Review: <?php echo $row2['pac_chart'];?></label>
          </div>
          <div class="col-6">
            <label for="" class="form-label">Comorbid/ Risk Factors: <?php echo $row2['comorbid'];?></label>
          </div>

          <div class="col-12">
            <label for="" class="form-label">Investigation Review: <?php echo $row2['investigation_review'];?></label>
          </div>
          <div class="col-12">
            <label for="" class="form-label">Blood Arranged: <?php echo $row2['blood_arranged'];?></label>
          </div>
          <div class="col-6 my-2">
            <label for="" name="change_plan" >Change in Plan : <?php echo $row2['change_plan'];?></label>
          </div>
          <div class="col-6 my-2">
            <label for="" class="form-label">If YES Describe: <?php echo $row2['describ'];?></label>
          </div>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mt-2">
            <label for="" class="form-label">Pre Operative Advice: <?php echo $row2['pre_op_advice'];?></label>
        </div>
        <div class="col-6 my-3">
            <label for="" class="form-label">Name and Sign of Anaesthestist: <?php echo $row2['name_sign'];?></label>
          </div>
        <div class="col-6 my-3">
            <label for="" class="form-label">Date and Time: <?php echo $row2['date_time'];?></label>
          </div>
      </div>
   
    </div>
    <h6 class="mt-3">Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>