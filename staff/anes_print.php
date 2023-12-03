<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();


$sql4=mysqli_query($conn,"SELECT * FROM an_record WHERE id=$id ");
$row4=mysqli_fetch_assoc($sql4);

  error_reporting(0);
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
        <a href="anesthesia_record.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Anesthesia Record</h3>

    <?php include_once("../header/header.php") ?>
   
    <div class="row">
                <div class="col-6 " style="text-decoration:underline;">
                <strong>Pre-Anesthesia Status :</strong>
                </div>
              <div class="col-6">
                <strong>ASA Grade :</strong><?php echo $row4['asa'];?>
              </div>
              </div>
              <div class="row">
                <div class="col-6"><strong>Complaints if any :</strong> <?php echo $row4['complaint'];?>
                </div>
                <div class="col-6"><strong>Previous History :</strong><?php echo $row4['history'];?>
                </div>
                <div class="col-6"><strong>Other significant history :</strong><?php echo $row4['other_his'];?>
                </div>
                <div class="col-6"><strong>NBM status :</strong><?php echo $row4['nbm'];?>
                </div>
                <div class="col-6"><strong>Investigations :</strong><?php echo $row4['inve'];?>
                </div>
                <div class="col-6"><strong>Examination :</strong><?php echo $row4['exam'];?>
                </div>
                <div class="col-6">Hb% :<?php echo $row4['hb'];?>
                </div>
                <div class="col-6">Pulse :<?php echo $row4['pulse'];?>
                </div>
                <div class="col-6">Urine :<?php echo $row4['urine'];?>
                </div>
                <div class="col-6">BP :<?php echo $row4['bp'];?>
                </div>
                <div class="col-6">BSL :<?php echo $row4['bsl'];?>
                </div>
                <div class="col-6">CVS :<?php echo $row4['cvs'];?>
                </div>
                <div class="col-6">BUL :<?php echo $row4['bul'];?>
                </div>
                <div class="col-6">RS : <?php echo $row4['rs'];?>
                </div>
                <div class="col-6">S creat : <?php echo $row4['s'];?>
                </div>
                <div class="col-6">Other :<?php echo $row4['other'];?>
                </div>
                <div class="col-6">X-ray chest : <?php echo $row4['xray'];?>
                </div>
                <div class="col-6">Consent :<?php echo $row4['consent'];?>
                </div>
                <div class="col-6">ECG : <?php echo $row4['ecg'];?>
                </div>
                <div class="col-6">Fitness : <?php echo $row4['fitness'];?>
                </div>
                <div class="col-6">Other : <?php echo $row4['o'];?>
                </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-3" style="text-decoration:underline;">Anaesthesia Notes :</div>
                    <div class="col-6">Premedication :<?php echo $row4['premed'];?>

                    </div>
                    <div class="col-6">Type of Anaesthesia :<?php echo $row4['type'];?>

                    </div>
                </div>
                    <div class="row">
                        <div class="col-6 mt-3 mb-3" style="text-decoration:underline;">General Anaesthesia :</div>
                        <div class="col-6 mt-3 mb-3" style="text-decoration:underline;">Regional Anaesthesia :</div>
                        <div class="col-6">Induction :<?php echo $row4['induction'];?>
                        </div>
                        <div class="col-6">Spinal /Epidural Anaesthesia given :<?php echo $row4['spinal'];?>
                        </div>
                        <div class="col-6">Muscle relaxant :<?php echo $row4['muscle'];?>
                        </div>
                        <div class="col-6 mt-4"> <div class="row">
                                <div class="col-3"> At level <?php echo $row4['atlevel'];?> with <?php echo $row4['w'];?></div>

                            </div>
                        
                        </div>
                        <div class="col-6 ">Intubation :<?php echo $row4['intu'];?>
                        </div>
                        <div class="col-6 mt-4">  <div class="row">
                                <div class="col-3"> Needle no <?php echo $row4['needle'];?> with <?php echo $row4['withco'];?></div>

                            </div>
                        
                        </div>
                        <div class="col-6">Anaesthetic agent :<?php echo $row4['agent'];?>
                        </div>
                        <div class="col-6 mt-4">
                            <div class="row">
                                <div class="col-3"> Catheter no <?php echo $row4['catheter'];?> with <?php echo $row4['withcat'];?></div>

                            </div>
                        
                        </div>
                        <div class="col-6">Type of respiration :<?php echo $row4['typeres'];?>
                        </div>
                        <div class="col-6">Drug :<?php echo $row4['drug'];?>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-6">Level of anaesthesia :<?php echo $row4['an'];?>
                        </div>

                    </div>
  <?php
    $sql7 = "SELECT * FROM anes_reco WHERE pt_id = '$id';";
                    $row7 = $conn->query($sql7);
  
?>
<div class="row  p-3 " style="overflow: auto;">
    <div class="col-12  mt-3 mb-3" style="text-decoration:underline">Intraoperative Monitering :</div>
    <table class="table  table-bordered border-black text-center">
        <tr>
            <th>Time</th>
            <th>Pulse</th>
            <th>BP mm Hg</th>
            <th>SPO2</th>
            <th>IV fluids</th>
            <th>Relaxant</th>
            <th>IV Drugs</th>
            <th>Urine Output</th>
        </tr>
        <tbody id="tbody">
                            <?php
                  $i = 1;
                  $sr = 1;
                  while ($res = $row7->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $res['a'] . '</td>';
                    echo '<td>' . $res['b'] . '</td>';
                    echo '<td>' . $res['c'] . '</td>';
                    echo '<td>' . $res['d'] . '</td>';
                    echo '<td>' . $res['e'] . '</td>';
                    echo '<td>' . $res['f'] . '</td>';
                    echo '<td>' . $res['g'] . '</td>';
                    echo '<td>' . $res['h'] . '</td>';

                    $i++;
                    $sr++;
                }
             
                  ?>
                        </tbody>
    </table>
   
</div>

                        <div class="col-12">
                            Extubation done after adequate suction and adequate reversal at <?php echo $row4['ex'];?>
                       </div>

                        <div class="col-12 mb-3 mt-3" style="text-decoration:underline;">Postoperative :</div>
                        <div class="col-12">Patient is out of General Anaesthesia / Spinal Anaesthesia effect is wearing off  Resp <?php echo $row4['resp'];?> SpO2 on air</div>
                   
                        <div class="col-12">
                           Postop orders : <?php echo $row4['postop'];?>
                       </div>
                        <div class="col-12">
                            NBM <?php echo $row4['nb'];?> hrs. Head low / propped up position . IVF  <?php echo $row4['ivf'];?> ml/hr ,W/F T , P,R ,BP ,I/O.</div>
                       
                        <div class="col-12">Name & Sign of Anesthesiologist<?php echo $row4['sign'];?>
                      
                    </div>
    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>