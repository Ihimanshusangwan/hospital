<?php
require("../../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
if(isset($_GET['date'])){

    $searchDate= $_GET['date'];
    $sql3 = "SELECT * FROM patient_register_ot WHERE date = '$searchDate';";
                    $data3 = $conn->query($sql3);
  }
  if(isset($_GET['month'])){
  
    $searchMonth= $_GET['month'];
    $sql3 = "SELECT * FROM patient_register_ot WHERE date LIKE '%$searchMonth%';";
                    $data3 = $conn->query($sql3);
  }

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
    .rotate-text {
        font-size:12px;
      writing-mode: vertical-rl; 
      transform: rotate(180deg); 
      height:170px;
      width:20px;
    }

    @media print {

        #button {
            display: none !important;
        }

        @page {
            size: A4 Landscape;
        }

        .noprint {
            visibility: hidden;
        }

        body {
            margin: 0;
        }

    }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <?php 
            if(isset($searchDate)){
                echo<<<back
                <a href="patient_register_ot.php?date=$searchDate" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
back;
            }
            if(isset($searchMonth)){
                echo<<<back
                <a href="patient_register_ot.php?month=$searchMonth" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
back;
            }
        ?>
    </div>
    <?php include_once("../../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Ambulance Register</h3>
    <hr />
    <div class="row">
        <div class="col-12">
            <?php if(isset($_GET['date'])){
                echo<<<back
                <strong> Date: </strong> $searchDate
back;
            }
            if(isset($_GET['month'])){
                echo<<<back
                <strong> Month: </strong> $searchMonth
back;
            }?>
        </div>
        <div class="col-12">
            <div class="container-fluid" style="margin-top: 20px">
                <div class="table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                        <th >Sr.no</th>
                                    <th >Date</th>
                                    <th >UHID NO.</th>
                                    <th >IPD NO.</th>
                                    <th >Date of Surgery</th>
                                    <th >Patient Name </th>
                                    <th >Age</th>
                                    <th >Sex</th>
                                    <th class="rotate-text" >Name of Surgery</th>
                                    <th class="rotate-text">Surgeon (Dr.)</th>
                                    <th class="rotate-text">Asstt. Surgeon(Dr.)</th>
                                    <th class="rotate-text">Anesthesiologist Dr.</th>
                                    <th class="rotate-text">Sister /OA</th>
                                    <th class="rotate-text">HCA</th>
                                    <th class="rotate-text">OT in Time</th> 
                                    <th class="rotate-text">Type of Anesthesthesia </th>
                                    <th class="rotate-text">Anesthesthesia Induced</th>
                                    <th class="rotate-text">Surgery Start Time</th>
                                    <th class="rotate-text">Surgery Finish Time</th>
                                    <th class="rotate-text">OT in Time</th> 
                                    <th class="rotate-text">Rescheduling  of Surgery</th>
                                    <th class="rotate-text">Change in  Plan of Surgery</th>
                                    <th class="rotate-text">Return of OT</th>
                                    <th class="rotate-text">Re-Exploartion</th>
                                    <th class="rotate-text">Details of adverse events(if any)</th>
                                    <th class="rotate-text">Anesthesia Plan   Modified(if any)</th>
                                    <th class="rotate-text">Unplanned Vetilation  following anesthesia</th>
                                    <th class="rotate-text">Adverse Anesthesiaenents</th>
                                    <th class="rotate-text">Anesthesia Related Mortailty</th>
                                    <th class="rotate-text">P/NP</th>
                                    <th >Remarks with Signature</th>
                        </tr>
                        <tbody id="tbody">
                            <?php
                  $i = 1;
                  $sr = 1;
                  while ($res = $data3->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $sr . '</td>';
                    echo '<td>' . $res['date'] . '</td>';
                    echo '<td>' . $res['uhid'] . '</td>';
                    echo '<td>' . $res['ipd'] . '</td>';
                    echo '<td>' . $res['surgery_date'] . '</td>';
                    echo '<td>' . $res['patient_name'] . '</td>';
                    echo '<td>' . $res['age'] . '</td>';
                    echo '<td>' . $res['sex'] . '</td>';
                    echo '<td>' . $res['surgery_name'] . '</td>';
                    echo '<td>' . $res['surgeon_dr'] . '</td>';
                    echo '<td>' . $res['asstt_dr'] . '</td>';
                    echo '<td>' . $res['anesthesia_dr'] . '</td>';
                    echo '<td>' . $res['sister'] . '</td>';
                    echo '<td>' . $res['hca'] . '</td>';
                    echo '<td>' . $res['ot_in_time'] . '</td>';
                    echo '<td>' . $res['ans_type'] . '</td>';
                    echo '<td>' . $res['ans_induced'] . '</td>';
                    echo '<td>' . $res['surgery_start'] . '</td>';
                    echo '<td>' . $res['surgery_end'] . '</td>';
                    echo '<td>' . $res['ot_out_time'] . '</td>';
                    echo '<td>' . $res['reschedule_surgery'] . '</td>';
                    echo '<td>' . $res['change_plan'] . '</td>';
                    echo '<td>' . $res['return_ot'] . '</td>';
                    echo '<td>' . $res['reexploration'] . '</td>';
                    echo '<td>' . $res['details_adverse'] . '</td>';
                    echo '<td>' . $res['ans_plan'] . '</td>';
                    echo '<td>' . $res['unplanned_ventilation'] . '</td>';
                    echo '<td>' . $res['adverse_ans'] . '</td>';
                    echo '<td>' . $res['ans_related'] . '</td>';
                    echo '<td>' . $res['p_np'] . '</td>';
                    echo '<td>' . $res['remarks'] . '</td>';
                    $i++;
                    $sr++;
                  }
                  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <h6 class="mt-3 text-center">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>