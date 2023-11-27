<?php
require("../admin/connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
// select * from opd where p_id = id;
$result = $conn->query($sql);
$res = $result->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql7 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql7);
$res2 = $data2->fetch_assoc();

$sql12="SELECT * FROM `config_print` WHERE 1";
$data12=$conn->query($sql12);
$res12=$data12->fetch_assoc();
if (!isset($res12['inp'])) {
    $inp_arr = array_fill(0, 2, 'option2');
} else {
    $inp = $res12['inp'];
    $inp_arr = json_decode($inp, true);
    $inp_arr = is_array($inp_arr) ? $inp_arr : array_fill(0, 2, '');
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
    .header {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
    }

    th,
    td,
    tr {
        border: 1px solid black;
    }

    .title {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .pad {
        padding: 2px;
    }

    @media print {
        .noprint {
            visibility: hidden;
        }

        body {
            margin: 0;
        }

        .page-break {
            page-break-before: always;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div id="button">
            <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
            <a href="lab_Page.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
        </div>

        <?php if($inp_arr[0]=='option1'){
            include_once("../header/images.php");

        } 
        else{
            echo '<div style="margin-top: 150px;"></div>';
        }
        ?>
        <div class="container text-center mt-4">
            <div class="row">
                <div class="col-4"><strong>Name:</strong>
                    <?php echo strtoupper($res['name']); ?>
                </div>
                <div class="col-4"><strong>UHID No:</strong>
                    <?php echo $res2['uhid']; ?>
                </div>
                <div class="col-4"><strong>Age:</strong>
                    <?php echo strtoupper($res['age']); ?>
                </div>
                <div class="col-4"><strong>Date:</strong>
                    <?php 
                  $timestamp = strtotime($res['reg_date']);
                  $formattedDate = date("d M Y", $timestamp);
                  echo $formattedDate ;
                  ?>
                  </div>
                <div class="col-4  mt-2"><strong>Sex:</strong>
                    <?php echo $res['sex']; ?>
                </div><br>

                <div class="col-4 mt-2" style="width:20px;">
                    <script src="../barcode.js"></script>
                    <canvas id="barcode"></canvas>
                    <script>
                    const canvas = document.getElementById('barcode');
                    const opts = {
                        bcid: 'code39',
                        text: '<?php echo $id; ?>',
                        scale: 2,
                        height: 5,
                        includetext: false,
                    };
                    bwipjs.toCanvas(canvas, opts, function(err) {
                        if (err) {
                            console.error('Error generating barcode:', err);
                        } else {
                            console.log('Barcode generated successfully');
                        }
                    });
                    </script>
                </div>
            </div>
            </div>
        </div>
        <div style="margin-bottom : 5px;  margin-top: 10px;"></div>
    </div>
    <div class="container">
        <strong>Lab: </strong> <?php  echo $res1['investigation']  ?>
    
    </div>
   


    <?php 
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();
?>
   
   <?php 
if($dr['signature']!=""):

?>
    <div style="text-align:right; margin-right:2rem;" >
        <div>
        <img src="<?php echo "../admin/".$dr['signature']; ?> " alt="" style='height: 5rem; width:7rem; '>
        </div>
        
    <div class="col-12 mt-4" style="text-align:right; margin-right:2rem;">
        <strong> <?php echo $res['consultant']; ?></strong>
    </div>
    <?php endif; ?>


    <?php
$sql10 = "SELECT * FROM `change_label` WHERE 1";
$data10 = $conn->query($sql10);
$res10 = $data10->fetch_assoc();
?>
   

    <h6 class="text-center mt-4"><?php echo isset($res10['pre_bottom']); ?></h6>

    <script>
    window.print();
    </script>
</body>

</html>