<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $row = $data->fetch_assoc();

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
    $yn=array();
    for($i = 0; $i < 44; $i++){
        $element = isset($_POST['a_' . $i]) ? $_POST['a_' . $i] : '';
            array_push($yn, $element);
    }

    $yn_en=json_encode($yn);
    $ward=$_POST['ward'];
    $nurse=$_POST['nurse'];
    $billing=$_POST['billing'];

    $update="UPDATE in_reg SET
    yn='$yn_en',
    ward='$ward',
    nurse='$nurse',
    billing='$billing'
    WHERE id=$id;
    ";
    $sql3=mysqli_query($conn,$update);

}
$sql4=mysqli_query($conn,"SELECT * FROM in_reg WHERE id=$id");
$row4=mysqli_fetch_assoc($sql4);
$yn_de = array_fill(0, 38, '');
if($row4){
    $yn_de = json_decode($row4['yn'], true);
}
error_reporting(0);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Incidence Register</title>
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
<h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <h3 class="text-center text-dark mt-3">Incidence Register</h3>
            
    <form method="POST">
        <div class="container shadow-lg rounded">
           
            <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
            <a href=".php?id=<?php echo $id; ?>" class="btn btn-success m-2">Print</a>
           <div class="row">
           <div class="col-md-4">
                    <label class="form-label">UHID No:
                        <?php echo $res2['uhid']; ?>
                    </label>
                </div> <div class="col-md-4">
                    <label class="form-label"> Age:
                        <?php echo $row['age']; ?>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="form-label"> Gender:
                        <?php echo $row['sex']; ?>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="form-label">IPD No:
                        <?php echo $res2['ipd']; ?>
                    </label>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Name:
                        <?php echo $row['name']; ?>
                    </label>
                </div>
                
                <div class="col-md-4">
                    <label class="form-label">Consultant:
                        <?php echo $row['consultant']; ?>
                    </label>
                </div>
               
                

            </div>
            <div class=" container">
            <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th>Medication Error</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size1">Is there any medication error? </td>
                       <td class="size3">
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_0" value="Yes" <?php if($yn_de[0]==='Yes'){
                                    echo 'checked';}?>>
                                <label>Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_0" value="No" <?php if($yn_de[0]==='No'){
                                    echo 'checked';}?>>
                                <label>No</label>
                                </div>
                                </td>
                       </tr>
                </table>
                <table class=" mt-4 mb-2">
                    <thead>
                        <tr>
                            <th> Needle Stick Injury</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="size1">Is there any needle sick injury ? </td>
                       <td class="size3">
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_1" value="Yes" <?php if($yn_de[1]==='Yes'){
                                    echo 'checked';}?> >
                                <label>Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_1" value="No" <?php if($yn_de[1]==='No'){
                                    echo 'checked';}?>>
                                <label>No</label>
                                </div>
                                </td>
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
                            <td class="size1">Any blood transfusion for this patient? </td>
                       <td class="size3">
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_2" value="Yes" <?php if($yn_de[2]==='Yes'){
                                    echo 'checked';}?>>
                                <label>Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_2" value="No" <?php if($yn_de[2]==='No'){
                                    echo 'checked';}?>>
                                <label>No</label>
                                </div>
                                </td>
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
                        'Is there any urinary tract infection occured');
                        echo'<tr>';
                       for($j=0 ; $j<2 ; $j++){
                        if($j==0){
                            echo'<td class="form-label size1">'; echo $arr_1[$i] ;'</td>';
                        }
                           else if($j==1){
                            echo '<td class="size3"><div class="form-check form-check-inline">';
                            echo '<input class="form-check-input" type="radio" id="" name="a_'.($i+3).'"   value="Yes" ' . (($yn_de[$i+3] === 'Yes') ? 'checked' : '') . '>';
                            echo '<label>Yes</label>';
                            echo '</div>';
                            echo '<div class="form-check form-check-inline">';
                            echo '<input class="form-check-input" type="radio" id="" name="a_'.($i+3).'"   value="No" ' . (($yn_de[$i+3] === 'No') ? 'checked' : '') . '>';
                            echo '<label>No</label>';
                            echo '</div>';
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
                            <td class="size1">Performed any surgery or procedure? </td>
                       <td class="size3">
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_5" value="Yes" <?php if($yn_de[5]==='Yes'){
                                    echo 'checked';}?>>
                                <label>Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_5" value="No" <?php if($yn_de[5]==='No'){
                                    echo 'checked';}?>>
                                <label>No</label>
                                </div>
                                </td>
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
                                echo '<td class="size3"><div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="" name="a_'.($i+6).'"   value="Yes" ' . (($yn_de[$i+6] === 'Yes') ? 'checked' : '') . '>';
                                echo '<label>Yes</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="" name="a_'.($i+6).'"  value="No" ' . (($yn_de[$i+6] === 'No') ? 'checked' : '') . '>';
                                echo '<label>No</label>';
                                echo '</div>';
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
                            <td class="size1">Is any incidence of fall? </td>
                       <td class="size3">
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_18" value="Yes" <?php if($yn_de[18]==='Yes'){
                                    echo 'checked';}?>>
                                <label>Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_18" value="No" <?php if($yn_de[18]==='No'){
                                    echo 'checked';}?>>
                                <label>No</label>
                                </div>
                                </td>
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
                            <td class="size1">Is bed sore after admission? </td>
                       <td class="size3">
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_19" value="Yes" <?php if($yn_de[19]==='Yes'){
                                    echo 'checked';}?>>
                                <label>Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_19" value="No" <?php if($yn_de[19]==='No'){
                                    echo 'checked';}?>>
                                <label>No</label>
                                </div>
                                </td>
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
                            <td class="size1">Is Re-dose? </td>
                       <td class="size3">
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_20" value="Yes" <?php if($yn_de[20]==='Yes'){
                                    echo 'checked';}?>>
                                <label>Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" name="a_20" value="No" <?php if($yn_de[20]==='No'){
                                    echo 'checked';}?>>
                                <label>No</label>
                                </div>
                                </td>
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
                                echo '<td class="size3"><div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="" name="a_'.($i+21).'"   value="Yes" ' . (($yn_de[$i+21] === 'Yes') ? 'checked' : '') . '>';
                                echo '<label>Yes</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="" name="a_'.($i+21).'"  value="No" ' . (($yn_de[$i+21] === 'No') ? 'checked' : '') . '>';
                                echo '<label>No</label>';
                                echo '</div>';
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
                                echo '<td class="size3"><div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="" name="a_'.($i+36).'"  value="Yes" ' . (($yn_de[$i+36] === 'Yes') ? 'checked' : '') . '>';
                                echo '<label>Yes</label>';
                                echo '</div>';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input" type="radio" id="" name="a_'.($i+36).'"  value="No" ' . (($yn_de[$i+36] === 'No') ? 'checked' : '') . '>';
                                echo '<label>No</label>';
                                echo '</div>';
                                echo'</tr>'; 
                               }
                        }
                        }
                    ?>
                </table>
               
                <div class="row mt-4">
                    <div class="col-4">Ward RMO <input type="text" name="ward"class="form-control" id="" value="<?php echo $row4['ward'];?>"></div>
                    <div class="col-4">Nurse Incharge <input type="text" name="nurse"class="form-control" id="" value="<?php echo $row4['nurse'];?>"></div>
                    <div class="col-4">Billing <input type="text" name="billing"class="form-control" id=""value="<?php echo $row4['billing'];?>"></div>

                </div>
                <button class="btn btn-primary m-3" name="submit">Submit</button>
            </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>