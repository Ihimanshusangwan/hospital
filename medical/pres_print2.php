<?php
session_start();
require("../admin/connect.php");
$id = $_GET['id'];
error_reporting(0);
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
            <a href="medical_Page.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
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
    <?php
        $sql = "SELECT * FROM patient_info WHERE patient_id = '$id';";
        $res = $conn->query($sql)->fetch_assoc();

        ?>
                        <div class="row">
<div class="text-dark m-2 col" ><strong>Weight: </strong><span
            >
                <?php echo $res['weight']; ?>
            </span>
        </div>

<div class="text-dark m-2 col" ><strong>Pulse:  </strong><span
            >
                <?php echo $res['pulse']; ?>
            </span>
        </div>
<div class="text-dark m-2 col" ><strong>BP: </strong> <span
            >
                <?php echo $res['bp']; ?>
            </span>
        </div>
<div class="text-dark m-2 col" ><strong>Temp: </strong><span
            >
                <?php echo $res['temp']; ?>
            </span>
        </div>

</div>
<?php
        $sql12 = "SELECT * FROM `config_print` WHERE 1";
        $data12 = $conn->query($sql12);
        $res12 = $data12->fetch_assoc();
        $sql13 = "SELECT * FROM `patient_info` WHERE patient_id=$id";
        $data13 = $conn->query($sql13);
        $res13 = $data13->fetch_assoc();
        if (!isset($res12['inp'])) {
            $inp_arr = array_fill(0, 4, 'option2');
        } else {
            $inp = $res12['inp'];
            $inp_arr = json_decode($inp, true);
            $inp_arr = is_array($inp_arr) ? $inp_arr : array_fill(0, 4, '');
        }

        if ($inp_arr[2] == 'option1') {

            echo <<<calc
            <div class="text-dark m--4"><strong></strong><span
               >
                {$res13['pregDetails']}
            </span>heade
        </div>
            
            
            
calc;
        }
        ?>

        <div class="col-12">
        <?php if ( $res['chief_complaint'] !=""): ?>
        <strong>Chief Complaint:</strong>
        <?php echo $res['chief_complaint']; ?>
        <?php endif; ?>
    </div>
    <div class="col-12">
        <?php if ($res['history'] !=""): ?>
        <strong>Past History:</strong>
        <?php echo $res['history']; ?>
        <?php endif; ?>
    </div>
    <div class="col-12">
        <?php if ($res['personal_history'] !=""): ?>
        <strong>Personal History:</strong>
        <?php echo $res['personal_history']; ?>
        <?php endif; ?>
    </div>
    <div class="col-12">
        <?php if ($res['diagnosis'] !=""): ?>
        <strong>Diagnosis:</strong>
        <?php echo $res['diagnosis']; ?>
        <?php endif; ?>
    </div>
    <div class="col-12">
        <?php if ($res['examination'] !=""): ?>
        <strong>Examination:</strong>
        <?php echo $res['examination']; ?>
        <?php endif; ?>
    </div>
    
    <div class="col-12">
        <?php if ($res['family_history'] !=""): ?>
        <strong>Family History:</strong>
        <?php echo $res['family_history']; ?>
        <?php endif; ?>
    </div>
    <div class="col-12">
        <?php if ($res['procedure_done'] !=""): ?>
        <strong>Surgical History:</strong>
        <?php echo $res['procedure_done']; ?>
        <?php endif; ?>
    </div>
    <div class="col-12">
        <?php if ($res['medical_history'] !=""): ?>
        <strong>Medical History:</strong>
        <?php echo $res['medical_history']; ?>
        <?php endif; ?>
    </div>

   
    <div class="col-12">
        <?php if ($res['symptoms'] !=""): ?>
        <strong>Symptoms:</strong>
        <?php echo $res['symptoms']; ?>
        <?php endif; ?>
    </div>
   


    <?php if (1): ?>
    <div class="container-fluid" style="margin-top: 10px;">
        <!-- DataTales Example -->
        <div>
            <table class="table border-dark" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th class="col-1">Rx</th>
                    <th class="col-3">Medicine</th>
                    <th class="col-1">सकाळ</th>
                    <th class="col-1">दुपार</th>
                    <th class="col-1">रात्र</th>
                    <th class="col-1">कधी घ्यायच्या </th>
                    <th class="col-1">किती दिवस </th>
                    <!-- <th class="col-1">Qty</th> -->

                </tr>
                <tbody id="tbody">
                    <?php
                                    $sql = "SELECT * FROM prescription WHERE patient_id = '$id' ORDER BY id DESC;";
                                    $data = $conn->query($sql);
                                    $i = 1;
                                    while ($res = $data->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $i . '</td>';
                                        echo '<td>' .$res['type'] .". ". $res['med_name'] . '</td>';
                                        echo '<td>' . $res['morning'] . '</td>';
                                        echo '<td>' . $res['afternoon'] . '</td>';
                                        echo '<td>' . $res['night'] . '</td>';
                                        echo '<td>' . $res['eat'] . '</td>';
                                        echo '<td>' . $res['days'] . '</td>';
                                       // echo '<td>' . $res['quantity'] . '</td>';
                                        echo '</tr>';
                                        $i++;
                                    }
                                    ?>

                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    <?php endif; ?>
    <?php
        $sql = "SELECT * FROM patient_info WHERE patient_id = '$id';";
        $res = $conn->query($sql)->fetch_assoc();

        ?>
    <div class="col-12">
        <?php if ($res['investigation'] !=""): ?>
        <strong>Investigations Lab:</strong>
        <?php echo $res['investigation']; ?>
        <?php endif; ?>
    </div>
    <div class="col-12">
        <?php if ($res['investigation_imaging'] !=""): ?>
        <strong>Investigations Imaging:</strong>
        <?php echo $res['investigation_imaging']; ?>
        <?php endif; ?>
    </div>
    <div class="col-12">
        <?php if ($res['instructions'] !=""): ?>
        <strong>Instruction:</strong>
        <?php echo $res['instructions']; ?>
        <?php endif; ?>
    </div>
   
   <?php
    $sql = "SELECT * FROM patient_records WHERE id = '$id';";
    $data = $conn->query($sql);
    $res = $data->fetch_assoc();
    if(isset($res['follow_date'])){
        echo " <h6>Follow Up "; $timestamp = strtotime($res['follow_date']);
$formattedDate = date("d M Y", $timestamp);
echo $formattedDate ;
    }
 ?></h6>

    <?php 
$sql = "SELECT signature FROM doctors WHERE name = '{$res['consultant']}';";
// echo $sql;
$data = $conn->query($sql);
$dr = $data->fetch_assoc();

// print_r($dr);
//  echo "../admin/".$dr['signature'] ;

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
    </div>


    <?php
$sql10 = "SELECT * FROM `change_label` WHERE 1";
$data10 = $conn->query($sql10);
$res10 = $data10->fetch_assoc();
?>
    <div class="row">
        <div class="col-2">
            <img style="height: 8rem; width: 8rem;"
                src="data:image/jpg;base64,<?php echo base64_encode($res10['pre_barcode']); ?>">

        </div>
        <div class="col-5">

            <h6 style="font-size:12px; margin-top:0.5rem;"><strong>Scan QR Code <br> for Appointment</strong></h6>
        </div>
    </div>

    <h6 class="text-center mt-4"><?php echo isset($res10['pre_bottom']); ?></h6>

    <script>
    window.print();
    </script>
</body>

</html>