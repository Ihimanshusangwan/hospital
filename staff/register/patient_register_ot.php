<?php
session_start();
require("../../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

  
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
        <style>
          .rotate-text {
      writing-mode: vertical-rl; 
      transform: rotate(180deg); 
      height:170px;
      width:20px;
    }
        </style>
    <script>
    var items = 0;

    function addItem() {
        var today = new Date();
        var time =
            today.getHours() +
            ":" +
            today.getMinutes() +
            ":" +
            today.getSeconds();
        const date2 = new Date().toJSON().slice(0, 10);
        items++;
        var html = "<tr>";
        html += "<td>" + items + "</td>";
        html += "<td class='col-md-2'><input type='date' value=" + date2 + " name='date_" + items + "'> </td>";
        html += "<td class='col-md-2'><input type='text' name='uhid_" + items + "'></td>";
        html += "<td><input type='text' name='ipd_" + items + "'></td>";
        html += "<td><input type='date' name='surgery_" + items + "'></td>";
        html += "<td><input type='text' name='name_" + items + "'></td>";
        html += "<td class='col-md-2' ><input type='number' name='age_" + items + "'></td>";
        html += "<td class='col-md-2'><input type='text' name='sex_" + items + "'></td>";
        html += "<td><input type='text' name='surgery_name_" + items + "'></td>";
        html += "<td><input type='text' name='surgeon_dr_" + items + "'></td>";
        html += "<td><input type='text' name='asstt_dr_" + items + "'></td>";
        html += "<td><input type='text' name='anestheisa_dr_" + items + "'></td>";
        html += "<td><input type='text' name='sister_" + items + "'></td>";
        html += "<td><input type='text' name='hca_" + items + "'></td>";
        html += "<td><input type='text' name='ot_in_time_" + items + "'></td>";
        html += "<td><input type='text' name='ans_type_" + items + "'></td>";
        html += "<td><input type='text' name='ans_induced_" + items + "'></td>";
        html += "<td><input type='text' name='surgery_start_" + items + "'></td>";
        html += "<td><input type='text' name='surgery_end_" + items + "'></td>";
        html += "<td><input type='text' name='ot_out_time_" + items + "'></td>";
        html += "<td><input type='text' name='reshedule_surgery_" + items + "'></td>";
        html += "<td><input type='text' name='change_plan_" + items + "'></td>";
        html += "<td><input type='text' name='return_ot_"+ items + "'></td>";
        html += "<td><input type='text' name='reexploartion_" + items + "'></td>";
        html += "<td><input type='text' name='details_adverse_" + items + "'></td>";
        html += "<td><input type='text' name='ans_plan_" + items + "'></td>";
        html += "<td><input type='text' name='unplanned_venti_" + items + "'></td>";
        html += "<td><input type='text' name='adverse_ans_" + items + "'></td>";
        html += "<td><input type='text' name='ans_related_" + items + "'></td>";
        html += "<td><input type='text' name='p_np_" + items + "'></td>";
        html += "<td><input type='text' name='remarks_" + items + "'></td>";
        html += "<td><button class='btn btn-danger' type='button' onclick='deleteRow(this);'>Delete</button></td>";
        html += "</tr>";
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }

    function deleteRow(button) {
        button.parentElement.parentElement.children[2].children[0].value = "";
        button.parentElement.parentElement.style.display = "none";
    }
    </script>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-danger mt-3"><?php echo $title['so']?></h1>
        <a href="../staff_Page.php" class="btn btn-success m-2">Dashboard</a>
        <div class="row">
            <div class="form-group col-6">
                <label for="date" style="display: inline-block; width: 100px;">Search Date:</label>
                <input class="form-control" type="date" name="search_date" id="search_date"
                    style="display: inline-block; width: 200px; margin-left: 10px;"
                    <?php if (isset($_GET['date'])) {   echo "value='" . $_GET['date'] . "'"; } ?>>
            </div>
            <div class="form-group col-6">
                <label for="date" style="display: inline-block; width: 150px;">Search Month:</label>
                <input class="form-control" type="month" name="search_month" id="search_month"
                    style="display: inline-block; width: 200px; margin-left: 10px;"
                    <?php if (isset($_GET['month'])) {  echo "value='" . $_GET['month'] . "'"; } ?>>
            </div>

        <h3 class="text-center text-dark mt-3">Patient  Register (OT)</h3>
        <?php
    if (isset($_REQUEST['submit_changes'])) {
      $i = 1;
      while (isset($_POST["uhid_$i"])) {

        if ($_POST["uhid_$i"] !== "") {
          $date = $_POST["date_$i"];
          $uhid=$_POST["uhid_$i"];
          $ipd= $_POST["ipd_$i"];
          $surgery=$_POST["surgery_$i"] ;
          $name=$_POST["name_$i"];
          $sign=$_POST["age_$i"];
          $age=$_POST["uhid_$i"];
          $sex= $_POST["sex_$i"];
          $surgery_name=$_POST["surgery_name_$i"] ;
          $surgeon_dr=$_POST["surgeon_dr_$i"];
          $asstt_dr=$_POST["asstt_dr_$i"];
          $anestheisa_dr=$_POST["anestheisa_dr_$i"];
          $sister= $_POST["sister_$i"];
          $hca=$_POST["hca_$i"] ;
          $ot_in_time=$_POST["ot_in_time_$i"];
          $ans_type= $_POST["ans_type_$i"];
          $ans_induced= $_POST["ans_induced_$i"];
          $surgery_start=$_POST["surgery_start_$i"];
          $surgery_end=$_POST["surgery_end_$i"];
          $ot_out_time=$_POST["ot_out_time_$i"];
          $reshedule_surgery=$_POST["reshedule_surgery_$i"];
          $change_plan= $_POST["change_plan_$i"];
          $return_ot=$_POST["return_ot_$i"] ;
          $reexploartion=$_POST["reexploartion_$i"];
          $details_adverse=$_POST["details_adverse_$i"];
          $ans_plan=$_POST["ans_plan_$i"];
          $unplanned_venti=$_POST["unplanned_venti_$i"];
          $adverse_ans_=$_POST["adverse_ans_$i"];
          $ans_related_=$_POST["ans_related_$i"];
          $p_np=$_POST["p_np_$i"] ;
          $remarks=$_POST["remarks_$i"];
         
         

          $sql3  = "INSERT INTO `patient_register_ot` 
          (`date`, `uhid`, `ipd`, `surgery_date`, `patient_name`, `age`, `sex`, `surgery_name`, `surgeon_dr`, `asstt_dr`, `anesthesia_dr`, `sister`, `hca`, `ot_in_time`, `ans_type`, `ans_induced`, `surgery_start`, `surgery_end`, `ot_out_time`, `reschedule_surgery`, `change_plan`, `return_ot`, `reexploration`, `details_adverse`, `ans_plan`, `unplanned_ventilation`, `adverse_ans`, `ans_related`, `p_np`, `remarks`)
          VALUES 
          ('$date', '$uhid', '$ipd', '$surgery', '$name', '$sign', '$sex', '$surgery_name', '$surgeon_dr', '$asstt_dr', '$anestheisa_dr', '$sister', '$hca', '$ot_in_time', '$ans_type', '$ans_induced', '$surgery_start', '$surgery_end', '$ot_out_time', '$reshedule_surgery', '$change_plan', '$return_ot', '$reexploartion', '$details_adverse', '$ans_plan', '$unplanned_venti', '$adverse_ans_', '$ans_related_', '$p_np', '$remarks')";


          if ($conn->query($sql3) === TRUE) {
            $i++;
          } else {
            echo "<div class='alert alert-danger'>Error Updating </div>";
          }

        } else {
          $i++;
        }

      }
      echo "<div class='alert alert-success'>Updated Successfully</div>";
    }
    if (isset($_REQUEST['delete'])) {
      $sql3 = "DELETE FROM patient_register_ot WHERE id = {$_POST['scan_id']} ;";
      if ($conn->query($sql3) === TRUE) {
        echo "<div class='alert alert-success'>Deleted Successfully</div>";
      } else {
        echo "<div class='alert alert-danger'>Error Deleting</div>";
      }
    }
    ?><?php   if(isset($_GET['date'])){
      $searchDate= $_GET['date'];
      $sql3 = "SELECT * FROM patient_register_ot WHERE date = '$searchDate';";
                      $data3 = $conn->query($sql3);
    }
    if(isset($_GET['month'])){
    
      $searchMonth= $_GET['month'];
      $sql3 = "SELECT * FROM patient_register_ot WHERE date LIKE '%$searchMonth%' order by date;";
                      $data3 = $conn->query($sql3);
    }?>

        <form method="POST" action="">
            <div class="container-fluid" style="margin-top: 20px">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
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
                                    <th >Name of Surgery</th>
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
                                    <th >Delete</th>
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
                    echo "<td><form method='POST' action=''>
                                    <input type='hidden' value={$res['id']} name='scan_id' >
                                    <button type='submit' name = 'delete' class='btn btn-primary'>Delete</button> </form>" . '</td>';
                    echo '</tr>';
                    $i++;
                    $sr++;
                  }
                  ?>
                                    </tbody>
                            </table>
                        </div>
                        <?php if(isset($searchDate)){
              if($searchDate == date('Y-m-d')){

                echo '<button type="button" class="btn btn-info btn-lg mx-2" onclick="addItem();">
                        Add Note
                      </button>';
                echo '<input type="submit" class="btn btn-info btn-lg" name="submit_changes" value="Save" />'; 
                }
               echo <<<print

            <a href="patient_register_ot_print.php?date=$searchDate" class="btn btn-info btn-lg" id="print">Print</a>
print;
              }
           if(isset($searchMonth)){
              if($searchMonth == date('Y-m')){

                echo '<button type="button" class="btn btn-info btn-lg mx-2" onclick="addItem();">
                        Add Note
                      </button>';
                echo '<input type="submit" class="btn btn-info btn-lg" name="submit_changes" value="Save" />'; 
                }
                echo <<<print

                <a href="patient_register_ot_print.php?month=$searchMonth" class="btn btn-info btn-lg" id="print">Print</a>
    print;
              }
                ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    </form>

    <script>
    document.getElementById('search_date').addEventListener("change", () => {
        let searchDate = document.getElementById('search_date').value;
        window.location.href = `patient_register_ot.php?date=${searchDate}`;

    })
    document.getElementById('search_month').addEventListener("change",()=>{
        let searchMonth=document.getElementById('search_month').value;
        window.location.href=`patient_register_ot.php?month=${searchMonth}`;

    })
    </script>
    </script>
</body>

</html>