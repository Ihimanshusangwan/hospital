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
      html += "<td class='col-md-2'><input type='text' name='uhid_" + items + "'></td>";
      html += "<td><input type='text' name='ipd_" + items + "'></td>";
      html += "<td><input type='text' name='name_" + items + "'></td>";
      html += "<td><input type='text' name='dept_" + items + "'></td>";
      html += "<td><input type='date' name='date_of_initial_surgery_" + items + "'></td>";
      html += "<td><input type='text' name='indication_" + items + "'></td>";
      html += "<td><input type='date' name='date_of_repeat_" + items + "'></td>";
      html += "<td><input type='text' name='sign_" + items + "' ></td>";

      html +=
        "<td><button class='btn btn-danger' type='button' onclick='deleteRow(this);'>Delete</button></td>";
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
    <input class="form-control" type="date" name="search_date" id="search_date" style="display: inline-block; width: 200px; margin-left: 10px;">
</div>
<div class="form-group col-6">
        <label for="date" style="display: inline-block; width: 150px;">Search Month:</label>
        <input class="form-control" type="month" name="search_month" id="search_month"
          style="display: inline-block; width: 200px; margin-left: 10px;" <?php if (isset($_GET['month'])) {
            echo "value='" . $_GET['month'] . "'";
          } ?>>
      </div>
</div>
    <h3 class="text-center text-dark mt-3">Repeat Surgery Record</h3>
    <?php
    if (isset($_REQUEST['submit_changes'])) {
      $i = 1;
      while (isset($_POST["uhid_$i"])) {

        if ($_POST["uhid_$i"] !== "") {


          $date = $_POST["date_$i"];
        $uhid = $_POST["uhid_$i"];
        $ipd = $_POST["ipd_$i"];
          $name = $_POST["name_$i"];
          $dept = $_POST["dept_$i"];
          $date_of_initial_surgery = $_POST["date_of_initial_surgery_$i"];
          $indication = $_POST["indication_$i"];
          $date_of_repeat=$_POST["date_of_repeat_$i"];
          $sign = $_POST["sign_$i"];
         



          $sql3 = "INSERT INTO repeat_surgery_record (date,uhid,ipd,name,dept,date_of_initial_surgery,indication,date_of_repeat,sign)
           VALUES ('$date','$uhid','$ipd','$name','$dept','$date_of_initial_surgery','$indication','$date_of_repeat','$sign');";
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
      $sql3 = "DELETE FROM repeat_surgery_record WHERE srno = {$_POST['scan_id']} ;";
      if ($conn->query($sql3) === TRUE) {
        echo "<div class='alert alert-success'>Deleted Successfully</div>";
      } else {
        echo "<div class='alert alert-danger'>Error Deleting</div>";
      }
    }
    ?>  <?php if (isset($_GET['date'])) {

      $searchDate = $_GET['date'];
      $sql3 = "SELECT * FROM repeat_surgery_record WHERE date = '$searchDate';";
      $data3 = $conn->query($sql3);
      }
      if (isset($_GET['month'])) {

      $searchMonth = $_GET['month'];
      $sql3 = "SELECT * FROM repeat_surgery_record WHERE date LIKE '%$searchMonth%' order by date;";
      $data3 = $conn->query($sql3);
      } ?>

    <form method="POST" action="">
      <div class="container-fluid" style="margin-top: 20px">
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                  <th>Sr.no</th>
                  <th>Date</th>
                  <th>UHID NO.</th>
                  <th>IPD NO.</th>
                  <th>Patient Name</th>
                  <th>Dept. of Surgery</th>
                  <th>Date of Initial Surgery</th>
                  <th>Indication of Repeat Surgery</th>
                  <th>Date of Repeat Surgery</th>
                  <th>Sign of MD/MS</th>
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
                    echo '<td>' . $res['uhid'] . '</td>';
                    echo '<td>' . $res['ipd'] . '</td>';
                    echo '<td>' . $res['name'] . '</td>';
                    echo '<td>' . $res['dept'] . '</td>';
                    echo '<td>' . $res['date_of_initial_surgery'] . '</td>';
                    echo '<td>' . $res['indication'] . '</td>';
                    echo '<td>' . $res['date_of_repeat'] . '</td>';
                    echo '<td>' . $res['sign'] . '</td>';

                    echo "<td><form method='POST' action=''>
                                    <input type='hidden' value={$res['srno']} name='scan_id' >
                                    <button type='submit' name = 'delete' class='btn btn-primary'>Delete</button> </form>" . '</td>';
                    echo '</tr>';
                    $i++;
                    $sr++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <?php 
            if(isset($searchDate)){if($searchDate == date('Y-m-d')){
                echo '<button type="button" class="btn btn-info btn-lg mx-2" onclick="addItem();">
                        Add Note
                      </button>';
                echo '<input type="submit" class="btn btn-info btn-lg" name="submit_changes" value="Save" />'; 
                } echo <<<print
    
                <a href="repeat_surgery_print.php?date=$searchDate" class="btn btn-info btn-lg" id="print">Print</a>
    print;
              }
              if (isset($searchMonth)) {
                if ($searchMonth == date('Y-m')) {
  
                  echo '<button type="button" class="btn btn-info btn-lg mx-2" onclick="addItem();">
                          Add Note
                        </button>';
                  echo '<input type="submit" class="btn btn-info btn-lg" name="submit_changes" value="Save" />';
                }
                echo <<<print
  
                  <a href="repeat_surgery_print.php?month=$searchMonth" class="btn btn-info btn-lg" id="print">Print</a>
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
    document.getElementById('search_date').addEventListener("change",()=>{
        let searchDate=document.getElementById('search_date').value;
        window.location.href=`repeat_surgery_record.php?date=${searchDate}`;

    })
    
    document.getElementById('search_month').addEventListener("change", () => {
      let searchMonth = document.getElementById('search_month').value;
      window.location.href = `repeat_surgery_record.php?month=${searchMonth}`;

    })
</script>
</body>

</html>