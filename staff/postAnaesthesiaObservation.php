<?php 
require("../admin/connect.php");
$id = $_GET['id'];
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
$x=0;
error_reporting(0);
if (isset($_POST['submit'])) {
    $ana = $_POST['ana0']. '&' . $_POST['ana1']. '&' . $_POST['ana2']
  . '&' . $_POST['ana3']. '&' . $_POST['ana4']
  . '&' . $_POST['ana5'] .'&'.$_POST['ana6'] ;
  $inv = $_POST['inv0']. '&' . $_POST['inv1']. '&' . 
  $_POST['inv2']. '&' . $_POST['inv3']. 
  '&' . $_POST['inv4']. '&' . $_POST['inv5'] 
  .'&'.$_POST['inv6'] .'&'.$_POST['inv7']
  .'&'.$_POST['inv8'] .'&'.$_POST['inv9'] ;
  $icu = $_POST['icu0']. '&' . $_POST['icu1']. '&' . 
  $_POST['icu2']. '&' . $_POST['icu3']. 
  '&' . $_POST['icu4'] ;
  $pat = $_POST['pat0']. '&' . $_POST['pat1']
  . '&' . $_POST['pat2']. '&' .
  $_POST['pat3']. '&' . $_POST['pat4']. '&' . 
  $_POST['pat5'] .'&'.$_POST['pat6'] 
  .'&'.$_POST['pat7'].'&'.$_POST['pat8'].'&'.$_POST['pat9']
  . '&' .$_POST['pat10']. '&' . $_POST['pat11']
  . '&' . $_POST['pat12']. '&' .
  $_POST['pat13']. '&' . $_POST['pat14']. '&' . 
  $_POST['pat15'];
  $dis = $_POST['dis0']. '&' . $_POST['dis1']
  . '&' . $_POST['dis2']. '&' . $_POST['dis3']
  . '&' . $_POST['dis4']. '&' . $_POST['dis5'] 
  .'&'.$_POST['dis6'] .'&'.$_POST['dis7'].'&'.$_POST['dis8'] ;

  $dis1 = $_POST['disa'];

  $update="UPDATE `ana` SET `ana` = '$ana',`inv` = '$inv', `icu` = '$icu', `pat` = '$pat', `dis`='$dis',`dis1`='$dis1' WHERE `id` = '$id'";
  $conn->query($update);
  $x=1;
}
$sql3 = "SELECT * FROM `ana`  WHERE id = '$id';";
$data3 = $conn->query($sql3);
$ana1 = $data3->fetch_assoc();
$ana = explode("&", $ana1['ana']);
$inv = explode("&", $ana1['inv']);
$icu = explode("&", $ana1['icu']);
$pat = explode("&", $ana1['pat']);
$dis = explode("&", $ana1['dis']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
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
        input[type="date"]::placeholder,
        input[type="tel"]::placeholder,
        input[type="number"]::placeholder {
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
            border-color: #c0c0c0;
            box-shadow: 5px 5px 5px 5px #c0c0c0;
            animation: gelatine 1s;
        }

        input[type="text"],
        input[type="time"],
        input[type="date"],
        input[type="tel"],
        input[type="number"] {
            outline: none !important;
            border-color: #c0c0c0;
            box-shadow: 5px 5px 5px 5px #c0c0c0;
            animation: gelatine 1s;
        }

        textarea[type="text"] {
            outline: none !important;
            border-color: #c0c0c0;
            box-shadow: 5px 5px 5px 5px #c0c0c0;
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
</head>

<body>
    <div class="container">
        <h1 class="text-center text-danger mt-3">SHRI SIDDHIVINAYAK NETRALAYA</h1>
        <h3 class="text-center text-dark mt-3">POST ANAESTHESIA OBSERVATON</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
        <a class="btn btn-primary m-2" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
        <a href="post_anasthesia_observation_print.php?id=<?php echo $id; ?>" class=" btn btn-success m-2"
            id="dashboard">Print</a>
        <div class="row" >
            
        <div class="col-md-3" >
          <label class="form-label">UHID No: <?php echo $res2['uhid'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">IPD No: <?php echo $res2['ipd'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Date of Admission : <?php echo $res2['date'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label" for="time_ad">Time of Admission : <?php echo $res2['time'];?></label>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Name: <?php echo $res['name'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Age: <?php echo $res['age'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Sex: <?php echo $res['sex'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">ICU/Ward Room No: <?php echo $res2['ward/icu'];?></label>
        </div>
      </div>
      

      <div class="row">
        <div class="col-md-3">
          <label class="form-label">Consultant: <?php echo $res['consultant'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Diagnosis: <?php echo $res1['diagnosis'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Bed Number: <?php echo $res2['bed/room'];?></label>
        </div>
        </div> 
        </div>
        <form action="" method="post">
        <div class="container">
            <p>1. O2 Therapy : <input type="text" name="ana0"    value="<?php  echo $ana[0]; ?>"> L/min for <input type="text" name="ana1"    value="<?php  echo $ana[1]; ?>"> hrs</p>
        
        
        <div class="row">
            <h6>2.Prescribed :</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Analgesics</th>
                        <th scope="col">Anti emetics</th>
                        <th scope="col">Epidural Infusion</th>
                        <th scope="col">IV Fluids</th>
                        <th scope="col">Blood Products</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="ana2"    value="<?php  echo $ana[2]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="ana3"    value="<?php  echo $ana[3]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="ana4"    value="<?php  echo $ana[4]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="ana5"    value="<?php  echo $ana[5]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="ana6"    value="<?php  echo $ana[6]; ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <h6>3.Investigations :</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Blood Glucose</th>
                        <th scope="col">Hb</th>
                        <th scope="col">ECG</th>
                        <th scope="col">CXR</th>
                        <th scope="col">Others</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="inv0"    value="<?php  echo $inv[0]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="inv1"    value="<?php  echo $inv[1]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="inv2"    value="<?php  echo $inv[2]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="inv3"    value="<?php  echo $inv[3]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="inv4"    value="<?php  echo $inv[4]; ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <h6>4.Watch out for :</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Airway Obstructions</th>
                        <th scope="col">Inadequate Respiration</th>
                        <th scope="col">Excessive bleeding</th>
                        <th scope="col">Arrythmias</th>
                        <th scope="col">Others</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <input  type="text" class="form-control" id="age"  name="inv5"    value="<?php  echo $inv[5]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age"  name="inv6"    value="<?php  echo $inv[6]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age"  name="inv7"    value="<?php  echo $inv[7]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age"  name="inv8"    value="<?php  echo $inv[8]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age"  name="inv9"    value="<?php  echo $inv[9]; ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <h6>5.ICU Care :</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Monitoring</th>
                        <th scope="col">Sedation/Ventilation</th>
                        <th scope="col">Muscle Relaxation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="icu0"    value="<?php  echo $icu[0]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="icu1"    value="<?php  echo $icu[1]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="icu2"    value="<?php  echo $icu[2]; ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"><strong>6.Oral Feeds From</strong></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" placeholder="" name="icu3"    value="<?php  echo $icu[3]; ?>">
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="inputPassword" class="col-sm-2 col-form-label"><strong>7.Recovery Observation
                        chart</strong></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" placeholder="" name="icu4"    value="<?php  echo $icu[4]; ?>">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Patient Sign</th>
                        <th scope="col"></th>
                        <th scope="col">Expected Score</th>
                        <th scope="col">Achieved Score</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">Consciousness</th>
                        <td>Awake. responds easily, Alert & Oriented x 3 (or returned to baseline)</td>
                        <td>3</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat0"    value="<?php  echo $pat[0]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Responds readily, but easily falls asleep</td>
                        <td>2</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat1"    value="<?php  echo $pat[1]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Arousable, but not readily</td>
                        <td>1</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat2"    value="<?php  echo $pat[2]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Not responding</td>
                        <td>0</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat3"    value="<?php  echo $pat[3]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row">Respiratory</th>
                        <td>Breathes easily with adequate volume</td>
                        <td>3</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat4"    value="<?php  echo $pat[4]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Slightly decreased rate and/or volume</td>
                        <td>2</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat5"    value="<?php  echo $pat[5]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Labored or limited respiration</td>
                        <td>1</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat6"    value="<?php  echo $pat[6]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Apnea or inadequate ventilation</td>
                        <td>0</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat7"    value="<?php  echo $pat[7]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="col">Circulatory</th>
                        <td>BP and pulse approaching baseline limits</td>
                        <td>2</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat8"    value="<?php  echo $pat[8]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Abnormally high or low BP and/or abnormally fast or slow pulse</td>
                        <td>1</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat9"    value="<?php  echo $pat[9]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Able to move extremities voluntarily or on command (or returned to 2
                            baseline)</td>
                        <td>0</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat10"    value="<?php  echo $pat[10]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="col">Activity</th>
                        <td>Able to move extremities voluntarily or on command (or returned to 2
                            baseline)</td>
                        <td>2</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat11"    value="<?php  echo $pat[11]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Voluntary movement - non purposeful</td>
                        <td>1</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat12"    value="<?php  echo $pat[12]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>Unable to lift head or move extremities</td>
                        <td>0</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat13"    value="<?php  echo $pat[13]; ?>"></td>
                    </tr>
                    <tr>
                        <th scope="col">Total Score</th>
                        <td>Maximum Score should be 10 to shift from recovery</td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat14"    value="<?php  echo $pat[14]; ?>"></td>
                        <td> <input  type="text" class="form-control" id="age" placeholder="" name="pat15"    value="<?php  echo $pat[15]; ?>"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-3">
                <h6 class="fl">Discharge To</h6>
                
                <select  name="disa">
                  
                  <option value="ICU" <?php if ($ana1['dis1'] == 'ICU') {
                                      echo 'selected';
                                    } ?>>ICU</option>
                  <option value="Ward" <?php if ($ana1['dis1'] == 'Ward') {
                                        echo 'selected';
                                      } ?>>Ward</option>
                  
                </select>
            </div>
            <div class="col-3">
                <h6 class="fl">Time</h6>
                <input  type="time" class="form-control" id="age" placeholder="" name="dis0"    value="<?php  echo $dis[0]; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label class="form-label text-primary">Conscious and oriented</label>
                <input  type="text" class="form-control" id="weight" placeholder="" name="dis1"    value="<?php  echo $dis[1]; ?>">
            </div>
            <div class="col-3">
                <label class="form-label text-primary">Mild or no pain</label>
                <input  type="text" class="form-control" id="weight" placeholder="" name="dis2"    value="<?php  echo $dis[2]; ?>">
            </div>
            <div class="col-3">
                <label class="form-label text-primary">Spinal Wearing off</label>
                <input  type="text" class="form-control" id="weight" placeholder="" name="dis3"    value="<?php  echo $dis[3]; ?>">
            </div>
            <div class="col-3">
                <label class="form-label text-primary">Vitals Stable</label>
                <input  type="text" class="form-control" id="weight" placeholder="" name="dis4"    value="<?php  echo $dis[4]; ?>">
            </div>
        </div>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Signature</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Anaesthetist</th>
                    <td> <input  type="text" class="form-control" id="age" placeholder="signature" name="dis5"    value="<?php  echo $dis[5]; ?>"></td>
                    <td><input  type="text" class="form-control" id="age" placeholder="name" name="dis6"    value="<?php  echo $dis[6]; ?>"></td>
                    <td><input  type="date" class="form-control" id="age" name="dis7"    value="<?php  echo $dis[7]; ?>"></td>
                    <td><input  type="time" class="form-control" id="age" name="dis8"    value="<?php  echo $dis[8]; ?>"></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
    </div>
    </form>

    
</body>

</html>