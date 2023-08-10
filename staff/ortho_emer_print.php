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
error_reporting(0);

$sql3=mysqli_query($conn,"SELECT * FROM fdata WHERE id={$id}");
$row=mysqli_fetch_assoc($sql3);

$time_de=isset($row['timevs'])? json_decode($row['timevs'], true):['','','','','',''];
  $temp_de=isset($row['tempvs'])? json_decode($row['tempvs'], true):['','','','','',''];
  $bp_de=isset($row['bpvs'])? json_decode($row['bpvs'], true):['','','','','',''];
  $resp_de=isset($row['respvs'])? json_decode($row['respvs'], true):['','','','','',''];
  $hr_de=isset($row['hrvs'])? json_decode($row['hrvs'], true):['','','','','',''];
  $spo_de=isset($row['spovs'])? json_decode($row['spovs'], true):['','','','','',''];
  $bsl_de=isset($row['bslvs'])? json_decode($row['bslvs'], true):['','','','','',''];
  
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
        <a href="ortho_emer.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">EMERGENCY ROOM ASSESSMENT FORM</h3>
   
    <?php include_once("../header/header.php") ?>
    <div class="row">
                            <div class="col-12 mt-2">
                            <strong>Casualty/OPD No. : </strong><?php echo $row['opd'] ?>
                            </div>
                            <div class="col-3 mt-2">
                            <strong>Date : </strong><?php echo $row['date0'] ?>
                            </div><div class="col-5"></div>
                            <div class="col-4 mt-2">
                            <strong>Time of Arrival : </strong><?php echo $row['time0'] ?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Relative's Name , Address & Telephone No. : </strong><?php echo $row['relative'] ?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Emergency care prior arrival : </strong><?php echo $row['emergency'];?>
                            </div>
                            <div class="col-6 mt-2 ">
                            <strong>Mode of arrival : </strong><?php echo $row['modeofarr'];?>
                            </div>
                            <div class="col-3 mt-2">
                            <strong>Allergic : </strong><?php echo $row['allergic'];?>
                            </div>
                            <div class="col-9 mt-2">
                            <strong>If Yes, Describe : </strong><?php echo $row['descallergy'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Present Complaints & Duration : </strong><?php echo $row['complaints'];?>
                            </div>

    
                    <div class="text-center mt-2"><strong>Vital Signs</strong>
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
                                for( $i = 0 ; $i<6 ; $i++){
                                    echo '<tbody>';
                                    echo '<td>'.$time_de[$i].'</td>';
                                    echo '<td>'.$temp_de[$i].'</td>';
                                    echo '<td>'.$bp_de[$i].'</td>';
                                    echo '<td>'.$resp_de[$i].'</td>';
                                    echo '<td>'.$hr_de[$i].'</td>';
                                    echo '<td>'.$spo_de[$i].'</td>';
                                    echo '<td>'.$bsl_de[$i].'</td>';
                                    echo '</tbody>';
                                }
                            ?>
                            </table>
                            </div>
                            
                            <div class="row">
                           <div class="col-6 mt-2">
                            <strong>In case of Mass casually : </strong><?php echo $row['mass'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Triage Code : </strong><?php echo $row['triage'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Past History : </strong><?php echo $row['past'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Significant Tests done /Laboratory reports : </strong><?php echo $row['labreports'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Physical Examination : </strong><?php echo $row['phyexam'];?>
                            </div>
                            <div class="col-12 mt-2 ">
                            <strong>Head/Eyes/Ears/Throat/Neck : </strong><?php echo $row['head'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Heart : </strong><?php echo $row['heart'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Chest/Lungs : </strong><?php echo $row['chest'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Abdomen : </strong><?php echo $row['abdomen'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Extremities/Spine : </strong><?php echo $row['spine'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Neurological Examination : </strong><?php echo $row['neuroexam'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Any other findings : </strong><?php echo $row['anyother'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Pain : </strong><?php echo $row['pain'];?>
                            </div>  
                            <div class="col-6 mt-2">
                            <strong>Pain Intensity: (Visual Analog Scale)  : </strong><?php echo $row['vascale'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Location : </strong><?php echo $row['location'];?>
                            </div><img src="vascale.jpg" alt="" style="width: 150px; height: auto; margin-left: 100px; padding: 5px; border: 1px solid #000;">
                             
                            <div class="col-6 mt-2">
                            <strong>Duration : </strong><?php echo $row['duration'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Quality : </strong><?php echo $row['quality'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Character : </strong><?php echo $row['characterlbr'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Aggravating factors : </strong><?php echo $row['aggfactor'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Relieving Factors : </strong><?php echo $row['relivfactor'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Treatment Given : </strong><?php echo $row['treatment'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Procedures Given : </strong><?php echo $row['proceduregiven'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Provisional Diagnosis : </strong><?php echo $row['provisional'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Advice on further Treatment/Discharge : </strong><?php echo $row['advice'];?>
                            </div>
                            <div class="col-12 mt-2 mb-2">
                            <strong>Mode of Discharge : </strong><?php echo $row['discharge'];?>
                            </div>
                            <div class="text-center tca">
                            <div style="overflow:auto">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <th scope="col">Time of completion of assessment</th>
                                    <th scope="col">Physician Name & Sign</th>
                                    <th scope="col">Nurses Name & Sign</th>
                                    
                                </thead>
                                <tbody>
                                    <td><?php echo $row['timecomp'] ?></td>
                                    <td><?php echo $row['phyname'] ?></td>
                                    <td><?php echo $row['nursesname'] ?></td>
                                   
                                </tbody>
                                
                            </table>
                                </div>
                        </div>
                            
                            </div>
    <h6 class="mt-3">Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>