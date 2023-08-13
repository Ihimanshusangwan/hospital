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
$check = "SELECT * FROM `case_audit_sheet` WHERE `id`='$id'";
      $query_result = $conn->query($check);
    $result = $query_result->fetch_assoc();
    $arr_norm = array_fill(0, 38, '');
    $remarks_norm = array_fill(0, 38, '');
    if($res){
        $audit_month = $result['audit_date'];
        $discharge_date= $result['dischage_date'];
        $arr_decode = $result['yes_no'];
        $remarks_decode = $result['remarks'];
        $arr_norm = json_decode($arr_decode, true);
        $remarks_norm = json_decode($remarks_decode, true);
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
        <a href="case_sheet_audit.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Case Audit Sheet</h3>
    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-6">
            <strong>Date of Discharge: </strong> <?php echo $discharge_date ?>
        </div>
        <div class="col-6">
            <strong>Date of Audit: </strong> <?php echo $audit_month ?>
        </div>
        <div class="col-12 mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"> I. Post Admission - 24 to 48 Hours</th>
                            <th scope="col" width="20%">Yes/No/ NA</th>
                            <th scope="col" width="20%">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($i=0;$i<7;$i++){
                        $arr=array('01	Generaladmission consent has been obtained',
                            '02	IP record (front page) - all details have been furnished and signed by the concerned authority',
                            '03	Initial valuation of the patient has been done completely on the same date admission',
                            '04	Nutritionalscreening has been done',
                            '05	Nutritionalscreening is duly filled and signed',
                            '06	Care plan has been documented',
                            '07	If the case sheet is written by Duty Officer has been counter signed by the admitting consultant');

                            echo'<tr>';
                           for($j=0;$j<3;$j++){
                            if($j==0){
                                echo'<td class="form-label size1">'; echo $arr[$i] ;'</td>';
                                
                            }

                               else if($j==1){
                                echo "<td class='size3'>". $arr_norm[$i]."</td>";

                               }
                               else {
                                echo'<td >'.$remarks_norm [$i].'</td>';
                               }
                            }
                            echo'</tr>'; 
                        }
                    ?>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" > II. Continuing Care Phase</th>
                            <th scope="col" width="20%">Yes/No/ NA</th>
                            <th scope="col" width="20%">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $arr=array('08	Temperature chart is duly tracked and filled properly',
                     ' 09. 	BP,Pulse,Respiration chart duly tracked and filled signed by the authorized signatories',
                      '10. 	Reports from labs I radiology have been duly filled and signed by the authorized signatories',
                      '11. 	Doctors order form and progress sheets are dully filled, signed,named & dated',
                     ' 12. 	Progress notes have been written everyday',
                      '13. 	Nurses notes picture a continuity of nursing care at regular intervals',
                      '14. 	Medication charts have been signed by the faculty',
                      '15. 	Medication administration sheet data and doctor"s orders are correlating',
                      '16. 	Medication charts have been filled legibly',
                      '17. 	Medication orders are written in an uniform location',
                      '18. 	Varbal orders are found to be documented and counter signed by the consultant within 24 hours',
                      '19. 	The same verbal order has been brought forward to medication chart',
                      '20. 	Vulnerability assessment is carried out where ever required');
                        for($i=0;$i<13;$i++){
                            echo'<tr>';
                            for($j=0;$j<3;$j++){
                                if($j==0){
                                    echo'<td class="form-label size1">'; echo $arr[$i] ;'</td>';
                                    
                                }
                                   else if($j==1){
                                    echo "<td class='size3'>". $arr_norm[$i+7]."</td>";
    
                                   }
                                   else {
                                    echo'<td >'.$remarks_norm [$i+7].'</td>';
                                   }
                                }
                            echo'</tr>'; 
                    }
                    ?>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th scope="col">III. &nbsp; Surgery and Anaesthesia Related</th>
                            <th scope="col" width="20%">Yes/No/ NA</th>
                            <th scope="col" width="20%">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $arr=array(
                    ' 21	Informed consent has been obtained procedures for procedures with the complications mentioned',
                     '22	Informed consent form has been signed by the surgeon',
                     '23	Informed consent form has been obtained for anaesthesia, with the complications mentioned',
                     '24	Pre-operative checklist is duly filled',
                     '25	Operation record is filled completely',
                     '26	Anaesthes ia consultation form and pre-anaesthesia checkup is duly filled
                     ','27	Anaesthes ia record is properly tracked and duly filled
                     ','28	Patient transfer (from OT I POW) details were filled and signed appropriately
                     ','29	Inter departmental referral forms were complete
                     ','30	The referral was found to be honored the same day
                     ');
                        for($i=0;$i<10;$i++){
                            echo'<tr>';
                            for($j=0;$j<3;$j++){
                                if($j==0){
                                    echo'<td class="form-label size1">'; echo $arr[$i] ;'</td>';
                                    
                                }
                                   else if($j==1){
                                    echo "<td class='size3'>". $arr_norm[$i+20]."</td>";
    
                                   }
                                   else {
                                    echo'<td >'.$remarks_norm [$i+20].'</td>';
                                   }
                                }
                               echo'</tr>'; 
                           
                        }

                    ?>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">IV. &nbsp;Post Discharge</th>
                            <th scope="col" width="20%">Yes/No/ NA</th>
                            <th scope="col" width="20%">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     $arr=array(
                    ' 31	Discharge summary was found in the case sheet',
                    ' 32	All contents in discharge summary are duly filled','23	Informed consent form has been obtained for anaesthesia, with the complications mentioned',
                    ' 33	Condition of the patient during discharge is clearly mentioned in the discharge summary',
                     '34	All contents are duly filled and blank spaces are stroked off or denoted as not applicable',
                     '35	All pages have hospital number I patient ID of the patient mentioned onit',
                     '36	All signatures are with name, date and time',
                     '37	Case sheet is found to be arranged in order',
                     '38	All pages have been numbered');
                        for($i=0;$i<8;$i++){
                            echo'<tr>';
                            for($j=0;$j<3;$j++){
                                if($j==0){
                                    echo'<td class="form-label size1">'; echo $arr[$i] ;'</td>';
                                    
                                }
                                   else if($j==1){
                                    echo "<td class='size3'>". $arr_norm[$i+30]."</td>";
    
                                   }
                                   else {
                                    echo'<td >'.$remarks_norm [$i+30].'</td>';
                                   }
                                }
                               echo'</tr>'; 
                        
                        }
                    ?>
                    </tbody>
                </table>

            </div>
    </div>
   
    <h6>Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>