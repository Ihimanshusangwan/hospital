<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res0 = $data->fetch_assoc();

  $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
  $data1 = $conn->query($sql1);
  $res1 = $data1->fetch_assoc();

  $sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res2 = $data2->fetch_assoc();
  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

if(isset($_POST['submit'])){
    $dis = $_POST['discharge'];
    $aud = $_POST['audit'];
    $arr_yes_no = array();
    $remark = array();
        for ($i = 0; $i < 38; $i++) {
            $element = isset($_POST['check' . $i]) ? $_POST['check' . $i] : '';
            array_push($arr_yes_no, $element);
            $element = isset($_POST['remarks' . $i]) ? $_POST['remarks' . $i] : '';
            array_push($remark, $element);
        }
    $arr_json=json_encode($arr_yes_no);
    $remark_json=json_encode($remark);
    $sql="UPDATE `case_audit_sheet` SET `dischage_date`='$dis',`audit_date`='$aud',`yes_no`='$arr_json',`remarks`='$remark_json' WHERE `id`='$id'";
      $data = $conn->query($sql);
      if ($data) {  echo "<div class='alert alert-success'> Updated Successfully</div>";
      }
      
      }

      $check = "SELECT * FROM `case_audit_sheet` WHERE `id`='$id'";
      $query_result = $conn->query($check);
    $res = $query_result->fetch_assoc();
    $arr_norm = array_fill(0, 38, '');
    $remarks_norm = array_fill(0, 38, '');
    if($res){
        $audit_month = $res['audit_date'];
        $discharge_date= $res['dischage_date'];
        $arr_decode = $res['yes_no'];
        $remarks_decode = $res['remarks'];
        $arr_norm = json_decode($arr_decode, true);
        $remarks_norm = json_decode($remarks_decode, true);
    }
   error_reporting(0);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Case Audit Sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
    .size {
        width: 50px;
        margin: 6px;
    }

    .size1 {
        width: 700px;
        margin: 6px;
    }

    .size2 {
        width: 120px;
    }

    .size3 {
        width: 250px;

    }

    body {
        background: lightgray;
        animation: fade-in 1s linear;
    }

    .fl {
        animation: gelatine 1s;
    }

    th tr td {
        background-color: lightgray
    }

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px;
    }

    input[type="text"]::placeholder,
    input[type="time"]::placeholder,
    input[type="date"]::placeholder {
        color: lightgrey;

    }

    textarea[type="text"]::placeholder {
        color: lightgrey;
    }

    hr {
        border: 2px solid black;
    }

    label {
        animation: gelatine 1s;

    }

    select {
        animation: gelatine 1s;
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;
    }

    input[type="text"],
    input[type="time"],
    input[type="date"] {
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;
        margin: 2px;

    }

    textarea[type="text"] {
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;
    }

    input[type="text"]:focus,
    input[type="time"]:focus,
    input[type="date"]:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
    }

    textarea[type="text"]:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
    }

    select:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes gelatine {
        0% {
            opacity: 0;
            transform: translateX(2000px);
        }

        60% {
            opacity: 1;
            transform: translateX(-30px);
        }

        80% {
            transform: translateX(10px);
        }

        100% {
            transform: translateX(0);
        }
    }
    </style>
</head>

<body>
    <form method="POST">
        <div class="container shadow-lg rounded">
            <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
            <a href="case_audit_sheet_print.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Print</a>
            <h3 class="text-center text-dark mt-3">Case Audit Sheet</h3>
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label">Name:
                        <?php echo $res0['name']; ?>
                    </label>
                </div>

            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">UHID No:
                        <?php echo $res2['uhid']; ?>
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">IPD No:
                        <?php echo $res2['ipd']; ?>
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Bed Number: <?php echo $res2['bed/room'];?></label>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-md-3">
                    <label class="form-label">Date of Admission:
                        <?php   $d = date("d-m-Y", strtotime($res2['date'])); echo $d;?></label>

                </div>
                <div class="col-md-5">
                    <label class="form-label">Date of Discharge:
                        <input type="date" name="discharge" value="<?php echo $discharge_date ?>">
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Date of Audit:
                        <input type="date" name="audit" value="<?php echo $audit_month ?>" >
                    </label>
                </div>
            </div>
            <div class=" container">
                <div class="bg-secondary  text-white" style="width:100% ">
                    <span class="text-end" style="padding-left: 700px;">Yes &nbsp; &nbsp; No &nbsp;&nbsp; N/A</span>
                    <span class="text-end" style="padding-left: 150px;">Remarks</span>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col"> I. Post Admission - 24 to 48 Hours</th>
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
                                echo '<td class="size3"><div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio1" name="check' . ($i) . '"  value="Yes" ' . (($arr_norm[$i] === 'Yes') ? 'checked' : '') . '>';
                                echo '<label>Yes</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio2" name="check' . ($i) . '" value="No" ' . (($arr_norm[$i] === 'No') ? 'checked' : '') . '>';
                                echo '<label>No</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio3" name="check' . ($i) . '" value="N/A" ' . (($arr_norm[$i] === 'N/A') ? 'checked' : '') . '>';
                                echo '<label>N/A</label>';
                                echo '</div>';
                                echo '</td>';

                               }
                               else {
                                echo'<td ><input type="text"  name="remarks'.($i). '"  class="form-control" value="'.$remarks_norm [$i].'"></td>';
                               }
                            }
                            echo'</tr>'; 
                        }
                    ?>
                </table>
                <table>
                    <thead>
                        <tr>

                            <th scope="col"> II. Continuing Care Phase</th>
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
                                echo'<td class
                                ="form-label size1">'; echo $arr[$i] ; echo'</td>';
                               }
                               else if($j==1){
                                echo '<td class="size3"><div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio1" name="check' . ($i + 7) . '" value="Yes" ' . (($arr_norm[$i + 7] === 'Yes') ? 'checked' : '') . '>';
                                echo '<label>Yes</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio2" name="check' . ($i + 7) . '" value="No" ' . (($arr_norm[$i + 7] === 'No') ? 'checked' : '') . '>';
                                echo '<label>No</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio3" name="check' . ($i + 7) . '" value="N/A" ' . (($arr_norm[$i + 7] === 'N/A') ? 'checked' : '') . '>';
                                echo '<label>N/A</label>';
                                echo '</div>';
                                echo '</td>';
                                
                               }
                               else {
                                echo'<td ><input type="text"   name="remarks'.($i+7). '"  class="form-control" value="'.$remarks_norm [$i+7].'"></td>';
                            }
                               }
                            
                            echo'</tr>'; 
                        }
                    ?>
                </table>
                <table>
                    <thead>
                        <tr>

                            <th scope="col">III. &nbsp; Surgery and Anaesthesia Related</th>
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
                                echo'<td class="form-label size1">'; echo $arr[$i] ; echo'</td>';
                               }
                               else if($j==1){
                                echo '<td class="size3"><div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio1" name="check' . ($i + 20) . '" value="Yes" ' . (($arr_norm[$i + 20] === 'Yes') ? 'checked' : '') . '>';
                                echo '<label>Yes</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio2" name="check' . ($i + 20) . '" value="No" ' . (($arr_norm[$i + 20] === 'No') ? 'checked' : '') . '>';
                                echo '<label>No</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio3" name="check' . ($i + 20) . '" value="N/A" ' . (($arr_norm[$i + 20] === 'N/A') ? 'checked' : '') . '>';
                                echo '<label>N/A</label>';
                                echo '</div>';
                                echo '</td>';

                               }
                               else {
                                echo'<td ><input type="text"  name="remarks'.($i+20). '"  class="form-control" value="'.$remarks_norm [$i+20].'"></td>';
                            }
                        }
                          
                            echo'</tr>'; 
                        }

                    ?>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">IV. &nbsp;Post Discharge</th>
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
                                echo'<td class="form-label size1">'; echo $arr[$i] ; echo'</td>';
                               }
                               else if($j==1){
                                echo '<td class="size3"><div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio1" name="check' . ($i + 30) . '" value="Yes" ' . (($arr_norm[$i + 30] === 'Yes') ? 'checked' : '') . '>';
                                echo '<label>Yes</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio2" name="check' . ($i + 30) . '" value="No" ' . (($arr_norm[$i + 30] === 'No') ? 'checked' : '') . '>';
                                echo '<label>No</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="inlineRadio3" name="check' . ($i + 30) . '" value="N/A" ' . (($arr_norm[$i + 30] === 'N/A') ? 'checked' : '') . '>';
                                echo '<label>N/A</label>';
                                echo '</div>';
                                echo '</td>';
                                
                               }
                               else {
                                echo'<td ><input type="text"   name="remarks'.($i+30). '" class="form-control" value="'.$remarks_norm [$i+30].'"></td>';
                               }
                            }
                            echo'</tr>'; 
                        }
                    ?>
                </table>
                <button class="btn btn-primary m-3" name="submit">Submit</button>
            </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>