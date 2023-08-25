<?php
require("../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
if(isset($_GET['date'])){

    $searchDate= $_GET['date'];
    $sql3 = "SELECT * FROM scan WHERE date = '$searchDate';";
                    $data3 = $conn->query($sql3);
  }
  if(isset($_GET['month'])){
  
    $searchMonth= $_GET['month'];
    $sql3 = "SELECT * FROM scan WHERE date LIKE '%$searchMonth%' order by date;";
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
    <title>Document</title>
    <style>
        .header{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: row;
}

.title{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
        @media print {

            #button {
                display: none !important;
            }
            @page {size: A4 landscape; }
            .noprint {
            visibility: hidden;
        }
        }

       
          
    </style>
   
</head>

<body >
<button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
<?php 
            if(isset($searchDate)){
                echo<<<back
                <a href="investigation.php?date=$searchDate" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
back;
            }
            if(isset($searchMonth)){
                echo<<<back
                <a href="investigation.php?month=$searchMonth" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
back;
            }
        ?>   
 <?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">A'Scan Register</h3>
       
       <hr> <div class="row">
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
   
   
   <div class="col-12">
        <div class="container-fluid" style="margin-top: 20px;">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                            <tr>
                            <th>Sr.no</th>
                  <th>Date</th>
                  <th>EMR.No</th>
                  <th>Name of the Patient</th>
                  <th>Eye</th>
                  <th>Test/Procedure</th>
                  <th>Advised By</th>
                  <th>Optimetrist/Technician</th>
                  <th>Remark</th>
                  <th>P/N</th>
                  <th>Sign</th>
                  
                                
                            </tr>
                            <tbody id="tbody">
                            <?php
                 $i = 1;
                  $sr = 1;
                  while ($res = $data3->fetch_assoc()) {
                    echo '<tr>';

                    echo '<td>' . $sr . '</td>';
                    echo '<td>' . $res['date'] . '</td>';
                    echo '<td>' . $res['emr'] . '</td>';
                    echo '<td>' . $res['name'] . '</td>';
                    echo '<td>' . $res['eye'] . '</td>';
                    echo '<td>' . $res['test'] . '</td>';
                    echo '<td>' . $res['advise'] . '</td>';
                    echo '<td>' . $res['opt'] . '</td>';
                    echo '<td>' . $res['remark'] . '</td>';
                    echo '<td>' . $res['pn'] . '</td>';
                    echo '<td>'.$res['sign'] .'</td>';
                    
                    echo '</tr>';
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

    
    <h6>Thank You !</h6>
    </div>
</body>

<script> window.print(); </script>
</html>