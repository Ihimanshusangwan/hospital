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
  
</head>

<body>
  
    <?php  if(isset($_GET['date'])){
      $searchDate= $_GET['date'];
      $sql3 = "SELECT * FROM evacuation WHERE date = '$searchDate';";
                      $data3 = $conn->query($sql3);
    }
    if(isset($_GET['month'])){
    
      $searchMonth= $_GET['month'];
      $sql3 = "SELECT * FROM evacuation WHERE date LIKE '%$searchMonth%' order by date;";
                      $data3 = $conn->query($sql3);
    }
    
  ?>
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
            
    <h3 class="text-center text-dark mt-3">Evacuation Register</h3>
 </div>

    <form method="POST" action="">
      <div class="container-fluid" style="margin-top: 20px">
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Sr.no</th>
      <th>Date</th>
      <th>Name</th>
      <th>Wife/Daughter of</th>
      <th>Age</th>
      <th>Address</th>
      <th>Uterine Size in weeks</th>
      <th>Diagnosis</th>
      <th>Evacuation Method</th>
      <th>Contraceptive Received</th>
      <th>Name of Doctor</th>
      <th>Remarks</th>     
    </tr>
  </thead>
  <tbody id="tbody">
    <?php
      $sr = 1;
      while ($res = $data3->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $sr . '</td>';
        echo '<td>' . $res['date'] . '</td>';
        echo '<td>' . $res['name'] . '</td>';
        echo '<td>' . $res['wifeof'] . '</td>';
        echo '<td>' . $res['age'] . '</td>';
        echo '<td>' . $res['address'] . '</td>';
        echo '<td>' . $res['uterine'] . '</td>';
        echo '<td>' . $res['diagnosis'] . '</td>';
        echo '<td>' . $res['evac_method'] . '</td>';
        echo '<td>';
        if ($res['contraceptive_tl']) echo 'Tubal Ligation (TL)<br>';
        if ($res['contraceptive_cc']) echo 'Condom (CC)<br>';
        if ($res['contraceptive_ocps']) echo 'Oral Pills (OCPs)<br>';
        if ($res['contraceptive_iucd']) echo 'IUCD/CuT<br>';
        if ($res['contraceptive_other']) {
          echo 'Other (OTH): ' . $res['other_contraceptive'] . '<br>';
        }
        if ($res['contraceptive_none']) echo 'None (NO)<br>';
        echo '</td>';
        echo '<td>' . $res['doctor'] . '</td>';
        echo '<td>' . $res['remark'] . '</td>';
        echo '</tr>';
        $sr++;
      }
    ?>
  </tbody>
</table>

            </div>
            <?php if(isset($searchDate)){
               echo <<<print

            <a href="evacuation_print.php?date=$searchDate" class="btn btn-info btn-lg" id="print">Print</a>
print;
              }
           if(isset($searchMonth)){
                echo <<<print

                <a href="evacuation_print.php?month=$searchMonth" class="btn btn-info btn-lg" id="print">Print</a>
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
        window.location.href = `evacuationRegister.php?date=${searchDate}`;

    })
    document.getElementById('search_month').addEventListener("change",()=>{
        let searchMonth=document.getElementById('search_month').value;
        window.location.href=`evacuationRegister.php?month=${searchMonth}`;

    })
    </script>
</body>

</html>