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
      html += "<td><input type='text' name='name_" + items + "'></td>";
      html += "<td class='col-md-2' ><input type='number' name='age_" + items + "'></td>";
      html += "<td class='col-md-2'><input type='text' name='sex_" + items + "'></td>";
      html += "<td><input type='text' name='contact_no_" + items + "'></td>";
      html += "<td><input type='text' name='address_" + items + "'></td>";
      html += "<td><input type='time' name='time_" + items + "'></td>";
      html += "<td><input type='text' name='appointment_" + items + "'></td>";
      html += "<td><input type='text' name='department_" + items + "'></td>";
      html += "<td><input type='text' name='doctor_" + items + "'></td>";
      html += "<td><input type='text' name='refer_by_" + items + "'></td>";
      html += "<td><input type='text' name='remarks_" + items + "' value='<?php echo $_SESSION['staff_name'];?>'></td>";
      html +="<td><button class='btn btn-danger' type='button' onclick='deleteRow(this);'>Delete</button></td>";
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
    <input class="form-control" type="date" name="search_date" id="search_date" style="display: inline-block; width: 200px; margin-left: 10px;"
    <?php if (isset($_GET['date'])) {   echo "value='" . $_GET['date'] . "'"; } ?>>
</div>
    <div class="form-group col-6">
    <label for="date" style="display: inline-block; width: 150px;">Search Month:</label>
    <input class="form-control" type="month" name="search_month" id="search_month" style="display: inline-block; width: 200px; margin-left: 10px;" 
    <?php if (isset($_GET['month'])) {  echo "value='" . $_GET['month'] . "'"; } ?>>
</div>
    </div>
    <h3 class="text-center text-dark mt-3">Appointment  Register</h3>
    <?php
    if (isset($_REQUEST['submit_changes'])) {
      $i = 1;
      while (isset($_POST["name_$i"])) {
        if ($_POST["name_$i"] !== "") {
          $date = $_POST["date_$i"];
          $name=  $_POST["name_$i"];
          $age=$_POST["age_$i"]  ;
          $sex=$_POST["sex_$i"];
          $contact_no=$_POST["contact_no_$i"];
          $address=$_POST["address_$i"];
          $time=$_POST["time_$i"]  ;
          $appointment= $_POST["appointment_$i"]  ;
          $department=$_POST["department_$i"]  ;
          $doctor=$_POST["doctor_$i"];
          $refer_by=$_POST["refer_by_$i"];
          $remarks=$_POST["remarks_$i"]  ;
         

          $sql3 = "INSERT INTO `appointment_register`( `date`, `name`, `age`, `sex`, `address`, `contact_no`, `time`, `appointment`, `department`, `doctor`, `refer_by`,  `remarks`) VALUES ( '$date', '$name', '$age', '$sex', '$address', '$contact_no', '$time', '$appointment', '$department', '$doctor', '$refer_by',  '$remarks')";
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
      $sql3 = "DELETE FROM appointment_register WHERE id = {$_POST['scan_id']} ;";
      if ($conn->query($sql3) === TRUE) {
        echo "<div class='alert alert-success'>Deleted Successfully</div>";
      } else {
        echo "<div class='alert alert-danger'>Error Deleting</div>";
      }
    }
    ?><?php  if(isset($_GET['date'])){
      $searchDate= $_GET['date'];
      $sql3 = "SELECT * FROM appointment_register WHERE date = '$searchDate';";
                      $data3 = $conn->query($sql3);
    }
    if(isset($_GET['month'])){
    
      $searchMonth= $_GET['month'];
      $sql3 = "SELECT * FROM appointment_register WHERE date LIKE '%$searchMonth%' order by date;";
                      $data3 = $conn->query($sql3);
    }
    
  ?>

    <form method="POST" action="">
      <div class="container-fluid" style="margin-top: 20px">
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                  <th>Sr.no</th>
                  <th>Date</th>
                  <th>Patient Name </th>
                  <th>Age</th>
                  <th>Sex</th>
                  <th>Phone Number</th>
                  <th>Address </th>
                  <th>Time</th>
                  <th>Type of Appointment </th>
                  <th>Department</th>
                  <th>Doctor Name</th>
                  <th>Refer by</th>
                  <th>Remarks</th>
                  <th>Delete</th>
                </tr>
                <tbody id="tbody">
                <?php
                  $i = 1;
                  $sr = 1;
                  while ($res = $data3->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $sr . '</td>';
                    echo '<td>' . $res['date'] . '</td>';
                    echo '<td>' . $res['name'] . '</td>';
                    echo '<td>' . $res['age'] . '</td>';
                    echo '<td>' . $res['sex'] . '</td>';
                    echo '<td>' . $res['address'] . '</td>';
                    echo '<td>' . $res['contact_no'] . '</td>';
                    echo '<td>' . $res['time'] . '</td>';
                    echo '<td>' . $res['appointment'] . '</td>';
                    echo '<td>' . $res['department'] . '</td>';
                    echo '<td>' . $res['doctor'] . '</td>';
                    echo '<td>' . $res['refer_by'] . '</td>';
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

            <a href="appointment_register_print.php?date=$searchDate" class="btn btn-info btn-lg" id="print">Print</a>
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

                <a href="appointment_register_print.php?month=$searchMonth" class="btn btn-info btn-lg" id="print">Print</a>
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
        window.location.href = `appointment_register.php?date=${searchDate}`;

    })
    document.getElementById('search_month').addEventListener("change",()=>{
        let searchMonth=document.getElementById('search_month').value;
        window.location.href=`appointment_register.php?month=${searchMonth}`;

    })
</script>
</body>

</html>