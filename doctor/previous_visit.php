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
error_reporting(0);
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
            <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button><a href="javascript:window.location.href=document.referrer;" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>

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
   
    <div class="col-12">
        
        <strong>Past History:</strong>
        <?php echo $res['history']; ?>
         
    </div>
    <div class="col-12">
       
        <strong>Personal History:</strong>
        <?php echo $res['personal_history']; ?>
         
    </div>
    <div class="col-12">
        
        <strong>Diagnosis:</strong>
        <?php echo $res['diagnosis']; ?>
         
    </div>
    <div class="col-12">
        
        <strong>Examination:</strong>
        <?php echo $res['examination']; ?>
         
    </div>
    <div class="col-12">
       
        <strong>Chief Complaint:</strong>
        <?php echo $res['chief_complaint']; ?>
         
    </div>
    <div class="col-12">
       
        <strong>Family History:</strong>
        <?php echo $res['family_history']; ?>
         
    </div>
    <div class="col-12">
        
        <strong>Surgical History:</strong>
        <?php echo $res['procedure_done']; ?>
         
    </div>
    <div class="col-12">
       
        <strong>Medical History:</strong>
        <?php echo $res['medical_history']; ?>
         
    </div>

    <div class="col-12">
       
        <strong>Investigations Lab:</strong>
        <?php echo $res['investigation']; ?>
         
    </div>
    <div class="col-12">
      
        <strong>Investigations Imaging:</strong>
        <?php echo $res['investigation_imaging']; ?>
         
    </div>
    <div class="col-12">
      
        <strong>Symptoms:</strong>
        <?php echo $res['symptoms']; ?>
         
    </div>
    <div class="col-12">
      
        <strong>Instruction:</strong>
        <?php echo $res['instructions']; ?>
         
    </div>


   
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
     
   
    <div class="container-fluid" style="margin-top: 20px;">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Advices</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th class="col-1">Types</th>
                            <th class="col-3">Description</th>
                        </tr>
                        <tbody id="tbody">
                            <?php
                                    $sql = "SELECT * FROM test_advice WHERE patient_id = '$id' ORDER BY id DESC;";
                                    $data = $conn->query($sql);
                                    $i = 1;
                                    while ($res = $data->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $res['type'] . '</td>';
                                        echo '<td>' . $res['description'] . '</td>';
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
     


    
    <?php
            $sql = "SELECT * FROM patient_info WHERE patient_id = '$id';";
            $res = $conn->query($sql)->fetch_assoc();
            ?>
    <div class="container mt-2">
        <table class="table-bordered border-dark ">
            <tbody>
                <tr>
                    <td colspan="5" rowspan="2">
                        <strong>Chief Complaints:</strong>
                        <?php echo $res['chief_complaint'] ?>

                    </td>
                    <td colspan="3" rowspan="1">
                        <strong>Personal H/o:</strong>
                        <?php echo $res['history'] ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="3" rowspan="1">
                        <strong>Family H/o:</strong>
                        <?php echo $res['family_history'] ?>

                    </td>
                </tr>
                <?php
                        $sql = "select * from pres_back where id = $id;";
                        $res = $conn->query($sql)->fetch_assoc();
                        ?>
                <tr>
                    <td colspan="5" rowspan="1">
                        <strong> Past H/o:</strong>
                        <?php echo $res['history']?$res['history']:''; ?>

                    </td>

                    <td colspan="1" rowspan="2" class="text-center">
                        P.G.P
                    </td>
                    <td colspan="1" rowspan="1">
                        OD:
                        <?php echo $res['pgp_od'] ?? ''; ?>

                    </td>
                    <td colspan="1" rowspan="2" class="text-center">
                        <strong>Add: </strong>
                        <?php echo $res['Add_data'] ?? ''; ?>

                    </td>
                </tr>
                <tr>
                    <td class="text-center vertical-center">
                        Diabetic
                    </td>
                    <td class="text-center vertical-center">
                        Hypertensive
                    </td>
                    <td class="text-center vertical-center">
                        I.H.D
                    </td>
                    <td class="text-center vertical-center">
                        Asthmatic
                    </td>
                    <td class="text-center vertical-center">
                        Other
                    </td>
                    <td colspan="1" rowspan="1">
                        OS:
                        <?php echo $res['pgp_os'] ?? ''; ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="8" rowspan="1">
                        <strong>Allergic to:</strong>
                        <?php echo $res['allergic_to'] ?? ''; ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="1">
                        <strong>Vision & Refraction:</strong>
                        <?php echo $res['vision_refraction'] ?? ''; ?>

                    </td>
                    <td colspan="3" class="text-center" style="width: 25rem">
                        OD
                    </td>
                    <td colspan="3" class="text-center" style="width: 25rem">
                        OS
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Unaided/ Adaid Vision
                    </td>
                    <td colspan="3">
                        <?php echo $res['unaided_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['unaided_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Flash
                    </td>
                    <td colspan="3">
                        <?php echo $res['flash_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['flash_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Cycolo Flash
                    </td>
                    <td colspan="3">
                        <?php echo $res['cyclo_flash_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['cyclo_flash_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" rowspan="2" class="text-center">
                        Acceptance
                    </td>
                    <td colspan="1">
                        Distant
                    </td>
                    <td colspan="3">
                        <?php echo $res['distant_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['distant_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="1">
                        Near
                    </td>
                    <td colspan="3">
                        <?php echo $res['near_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['near_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Extra Ocular Muscles
                    </td>
                    <td colspan="3" class="text-center">
                        <img src="star.jpg" alt="" style="width: 3rem; height: 3rem" />
                    </td>
                    <td colspan="3" class="text-center">
                        <img src="star.jpg" alt="" style="width: 3rem; height: 3rem" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Slit-Lamp Examination
                    </td>
                    <td colspan="3">
                        <?php echo $res['slit_lamp_examination_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['slit_lamp_examination_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Ocular Adnexa
                    </td>
                    <td colspan="3">
                        <?php echo $res['ocular_adnexa_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['ocular_adnexa_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        ROPLAS
                    </td>
                    <td colspan="3">
                        <?php echo $res['roplas_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['roplas_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Lids
                    </td>
                    <td colspan="3">
                        <?php echo $res['lids_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['lids_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Conjuctiva
                    </td>
                    <td colspan="3">
                        <?php echo $res['conjuctiva_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['conjuctiva_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Cornea
                    </td>
                    <td colspan="3" class="text-center">
                        <img src="cornea.jpg" alt="" style="width: 4rem; height: 4rem; transform: scaleX(-1)" />
                    </td>
                    <td colspan="3" class="text-center">
                        <img src="cornea.jpg" alt="" style="width: 4rem; height: 4rem">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Anti. Chamber
                    </td>
                    <td colspan="3">
                        <?php echo $res['anti_chamber_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['anti_chamber_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Iris
                    </td>
                    <td colspan="3">
                        <?php echo $res['iris_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['iris_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Pupil
                    </td>
                    <td colspan="3">
                        <?php echo $res['pupil_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['pupil_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Lens
                    </td>
                    <td colspan="3">
                        <?php echo $res['lens_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['lens_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        IOP
                    </td>
                    <td colspan="3">
                        <?php echo $res['iop_od'] ?? ''; ?>
                    </td>
                    <td colspan="3">
                        <?php echo $res['iop_os'] ?? ''; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Gonioscopy
                    </td>
                    <td colspan="3" class="text-center">
                        <img src="goni.jpg" alt="" style="width: 3.5rem; height: 3.5rem; transform: scaleX(-1)" />
                    </td>
                    <td colspan="3" class="text-center">
                        <img src="goni.jpg" alt="" style="width: 4rem; height: 4rem" />
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-3">
                Fundus Examination:
            </div>
            <div class="col-4 mt-2">
                <img src="fundus.jpg" alt="" style="width: 13rem; height: 11rem" />
            </div>
            <div class="col-4 offset-1 mt-2">
                <img src="fundus.jpg" alt="" style="width: 13rem; height: 11rem; transform: scaleX(-1)" />
            </div>
        </div>
    </div>
     
    <h6>Follow Up <?php
    $sql = "SELECT * FROM patient_records WHERE id = '$id';";
    $data = $conn->query($sql);
    $res = $data->fetch_assoc();
    if(isset($res['follow_date'])){
 $timestamp = strtotime($res['follow_date']);
$formattedDate = date("d M Y", $timestamp);
echo $formattedDate ;
    }
 ?></h6>
    <div class="col-12 mt-4" style="text-align:right; margin-right:2rem;">
        <strong> <?php echo $res['consultant']; ?></strong>
    </div>

</body>

</html>