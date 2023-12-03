<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
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

$sql4=mysqli_query($conn,"SELECT * FROM pre_room_urinary WHERE id=$id;");
$row4=mysqli_fetch_assoc($sql4);

if($row4){
    $b_de =  json_decode($row4['b'], true);
    $detail_de =json_decode($row4['detail_urinary'],true);
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

        @media print {

            #button {
                display: none !important;
            }

            @page {
                size: A4;
            }

            .noprint {
                visibility: hidden;
            }
        }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="urinary_cather.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Urinary Catheter Bundle Follow Up</h3>
    <?php include_once("../header/header.php") ?>
    <div class="row">
                
                <div class="col-6">
                  <label class="form-label"><strong>MRD No :</strong><?php echo $detail_de[0];?></label>
                </div>
                <div class="col-6">
                  <label class="form-label"><strong>Department:</strong><?php echo $detail_de[1];?></label>
                </div>
                <div class="col-6">
                  <label class="form-label"><strong>Urinary Catheter Inserted On: </strong><?php echo $detail_de[2];?></label>
                </div>
                <div class="col-6">
                  <label class="form-label"><strong>>Urinary Catheter Removed On:</strong><?php echo $detail_de[3];?></label>
                </div></div>
            
    <table class="table table-bordered border-black  text-center">
        <tr>
            <th rowspan="2">S No.</th>
            <th rowspan="2">Criteria</th>
            <th rowspan="1" colspan="3">Day 1</th>
            <th rowspan="1" colspan="3">Day 2</th>
            <th rowspan="1" colspan="3">Day 3</th>
        </tr>
        <tr>
            <th>Shift 1</th>
            <th>Shift 2</th>
            <th>Shift 3</th>
            <th>Shift 1</th>
            <th>Shift 2</th>
            <th>Shift 3</th>
            <th>Shift 1</th>
            <th>Shift 2</th>
            <th>Shift 3</th>
        </tr>
        
        <?php
        $tableHeaders = array(
            'Hand Hygiene performed before and after manipulating the catheter & Uro bag',
            'Proper fixing of catheter on time',
            'Uro bag not touching the floor',
            'Urine flow should remain unobstructed',
            'Perform routin hygiene meatal care',
            'Maintaining closed drainage system',
            'Uro bag emptied every 6 hours',
            'Proper disinfection of sample collection site',
            'Urine aspirated for culture using sterile needle and syringe',
            'Specimen transported to the lab within 2 hours of collection',
            'Sterility maintain throughout the procedure',
            'Hand washing done after removal of gloves',
            'Catheter or uro bag labeled with date and time of  insertion & should change on due date basis'
        );

        for ($i = 0; $i < 13; $i++) {
            echo '<tr>';
            echo '<th>'.($i+1).'</th>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 9; $j++) {

                echo '<td>'.$b_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>
       
       
    </table>



    <h6 class="mt-2" >Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>