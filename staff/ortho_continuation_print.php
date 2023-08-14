<?php
$id = $_GET['id'];
require("../admin/connect.php");
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
  session_start();
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
<<<<<<< HEAD
@page {size: A4 landscape; }
=======
@page
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
.noprint {
visibility: hidden;
}
}

    </style>
</head>

<body>
    
        <div id="button">
            <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
            <a href="ortho_continuation.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
                id="dashboard">Dashboard</a>
        </div>
        <?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">Continuation Sheet</h3>
        <?php include_once("../header/header.php") ?>
            <?php
            $sql3 = "SELECT * FROM cont WHERE id = $id;";
            $res3 = $conn->query($sql3)->fetch_assoc();
            ?>

            
                    
                        <div class="card-body">
<<<<<<< HEAD
                            <div class="table-responsive">
=======
                            <div>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Notes</th>
                                        <th>Treatment/Advice</th>
                                        <th>Pulse</th>
                  <th>Temp</th>
                  <th>Resp</th>
                  <th>BP</th>
                  <th>SPO2</th>
                  <th>pa</th>
                  <th>cns</th>
                  <th>b/b</th>
                  <th>dmtb</th>
                                        <th>Sign</th>
                                    </tr>
                                    <tbody id="tbody">
                                        <?php
                                        $sql3 = "SELECT * FROM ortho_cont  WHERE patient_id = $id;";
                                        $data3 = $conn->query($sql3);
                                        $i = 1;
                                        $sr = 1;
                                        while ($res = $data3->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $res['date'] . '</td>';
                                            echo '<td>' . $res['time'] . '</td>';
                                            echo '<td>' . $res['note'] . '</td>';
                                            echo '<td>' . $res['treat'] . '</td>';
                                            echo '<td>' . $res['pulse'] . '</td>';
                                echo '<td>' . $res['temp'] . '</td>';
                                echo '<td>' . $res['resp'] . '</td>';
                                echo '<td>' . $res['bp'] . '</td>';
                                echo '<td>' . $res['sp'] . '</td>';
                                echo '<td>' . $res['pa'] . '</td>';
                                echo '<td>' . $res['cns'] . '</td>';
                                echo '<td>' . $res['bb'] . '</td>';
                                echo '<td>' . $res['dmtb'] . '</td>';
                                            echo '<td>'. $res['sign']  .'</td>';
                                            echo '</tr>';
                                            $i++;
                                            $sr++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
            


<<<<<<< HEAD
            <h6>Thank You !</h6>
=======
            <h6 class="text-center mt-4">Thank You !</h6>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
        </div>
</body>
<script>
    window.print();
</script>

</html>