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


$sql4=mysqli_query($conn,"SELECT * FROM in_reg WHERE id=$id");
$row4=mysqli_fetch_assoc($sql4);
$yn_de = array_fill(0, 38, '');
if($row4){
    $yn_de = json_decode($row4['yn'], true);
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
        <a href="incidence_register.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Incidence Register </h3>

    <?php include_once("../header/header.php") ?>
    <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th>Medication Error</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size1">Is there any medication error? &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $yn_de[0];?></td>
                     
                       </tr>
                </table>
                <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th> Needle Stick Injury </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size1">Is there any needle sick injury ? &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $yn_de[1];?></td>
                       </tr>
                </table>

                <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th>Blood Transfusion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size1">Any blood transfusion for this patient? &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $yn_de[2];?></td>
                       </tr>
                </table>

                <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th>Urinary Cathetarization Processed</th>
                        </tr>
                    </thead>
                    <tbody>   
                    <?php
                    for( $i = 0 ; $i < 2 ; $i++){
                    $arr_1=array(
                        'Is urinary catherization processed?',
                        'Is there any urinary tract infection occured?');
                        echo'<tr>';
                       for($j=0 ; $j<2 ; $j++){
                        if($j==0){
                            echo'<td class="form-label size1">'; echo $arr_1[$i] ;'</td>';
                        }
                           else if($j==1){
                            echo '<td class="size3"> ' . $yn_de[$i+3] .'';
                            echo '</td>';
                            echo'</tr>'; 
                           }
                        }
                    }
                ?>
            </table>

            <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th>Surgery OR procedure </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size1">Performed any surgery or procedure? &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $yn_de[5];?></td>
                       </tr>
                </table>
                <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th scope="col"> Surgery I</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for( $i = 0 ; $i < 12 ; $i++){
                        $arr_1=array(
                            'Did you prescribe prophylactic antibiotic',
                            'Any surgery site infection occured ?',
                            'Any anesthesia given ?',
                            'Any change in anesthesia ?',
                            'Pre Anesthesia Check Done',
                            'Rescheduled Surgery ?',
                            'Operation Cancelled',
                            'Wrong Site Surgery',
                            'Wrong Patient Surgery',
                            'Post op Death',
                            'Repeat Surgery',
                            'PCML Case');
                            echo'<tr>';
                           for($j=0 ; $j<2 ; $j++){
                            if($j==0){
                                echo'<td class="form-label size1">'; echo $arr_1[$i] ;'</td>';
                            }
                               else if($j==1){
                                echo '<td class="size3">' . $yn_de[$i+6]  . '';
                                echo '</td>';
                                echo'</tr>'; 
                               }
                            }
                        }
                    ?>
                </table>

                
            <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th>Incidence of fall</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size1">Is any incidence of fall? &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $yn_de[18];?></td>
                       </tr>
                </table>

                
            <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th>Bed Sore</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size1">Is bed sore after admission? &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $yn_de[19];?></td>
                       </tr>
                </table>

                <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th>Re-dose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size1">Is Re-dose? &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $yn_de[20];?></td>
                       </tr>
                </table>

                <table  class=" mt-4 mb-2">
                    <thead>
                        <tr>

                            <th scope="col">Advers Drug Reaction OR Event</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $arr=array('Advers Drug Reaction OR Event ?',
                      'Patient reaadmission within 14 days',
                      'Patient return to OT within 7 days',
                      'Patient return to ICU within 7 days',
                      'Patient return to Emergency within 7 days?',
                      'Is any infection out break?',
                      'Is any nosocomial infection?',
                      'Is hypoglycemia (less than 70 mg/dl)',
                      'Is any identification error?',
                      'Acute Limb ischemia?',
                      'Is discrepancy in sponge/gauge count?',
                      'Is cautery burns?',
                      'Is needle left inside porta cath?',
                      'Is sentinel events?');
                        for($i=0;$i<14;$i++){
                            echo'<tr>';
                           for($j=0;$j<2;$j++){
                             if($j==0){
                                echo'<td class="form-label size1">'; echo $arr[$i] ; echo'</td>';
                               }
                               else if($j==1){
                                echo '<td class="size3">' . $yn_de[$i+21]  . '';
                                echo '</td>';
                                echo'</tr>';  
                               }
                              
                               }
                            
                        }
                    ?>
                </table>
                <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th >MRD Check List</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $arr=array(
                        'Any missig clinical record',
                        'Discharge card attached',
                        'All consent proper',
                        'Feedback collected?',
                        'ICD coding done?',
                        'Feedback negative remark?',
                        'Discharge status?'
                     );
                        for($i=0;$i<7;$i++){
                            echo'<tr>';
                           for($j=0;$j<2;$j++){
                             if($j==0){
                                echo'<td class="form-label size1">'; echo $arr[$i] ; echo'</td>';
                               }
                               else if($j==1){
                                echo '<td class="size3"> ' . $yn_de[$i+36]. '</td>';
                               echo'</tr>'; 
                               }
                        }
                        }
                    ?>
                </table>
               
                <div class="row mt-4">
                    <div class="col-4">Ward RMO :<?php echo $row4['ward'];?></div>
                    <div class="col-4">Nurse Incharge :<?php echo $row4['nurse'];?></div>
                    <div class="col-4">Billing :<?php echo $row4['billing'];?></div>
                </div>
    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>