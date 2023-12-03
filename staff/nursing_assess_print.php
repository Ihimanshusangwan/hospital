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

$sql5=mysqli_query($conn,"SELECT * FROM nursing_assessment WHERE id =$id");
$row5=mysqli_fetch_assoc($sql5);

if($row5){
   $a_de = json_decode($row5['a'], true);
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
        <a href="nursing_assessment.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Nursing Assessment </h3>
    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-6">Date :<?php echo $a_de[1];?></div>
        <div class="col-6">Mode of arrival :<?php echo $a_de[2];?></div>
        <div class="col-6">Patient accompained on admission
            <input type="radio" name="3" id="" value="Yes" <?php if($a_de[3]=="Yes"){
                            echo 'checked';
                        }?>>
            Yes
            <input type="radio" name="3" id="" value="No" <?php if($a_de[3]=="No"){
                            echo 'checked';
                        }?>>
            No if yes
        </div>
        <div class="col-6">Name :<?php echo $a_de[4];?></div>
        <div class="col-6">Relation :<?php echo $a_de[5];?></div>
        <div class="col-6">Contact Person :<?php echo $a_de[6];?></div>
        <div class="col-6">Relation :<?php echo $a_de[7];?></div>
        <div class="col-6">Phone No :<?php echo $a_de[8];?></div>
        <div class="col-12">Primary language spoken interpreter needed :<?php echo $a_de[9];?>
            
        </div>
        <div class="col-6">Educational status :<?php echo $a_de[10]; ?></div>
        <div class="col-6">Socio economic status :<?php echo $a_de[11]?></div>
        <div class="col-6">Chief Complaints :<?php echo $a_de[12];?></div>
        <div class="col-6">Temperature:<?php echo $a_de[13];?></div>
        <div class="col-6">Pulse :<?php echo $a_de[14];?></div>
        <div class="col-6">BP:<?php echo $a_de[15];?></div>
        <div class="col-6">Respiration :<?php echo $a_de[16];?></div>
        <div class="col-6">Height:<?php echo $a_de[17];?></div>
        <div class="col-6">Weight:<?php echo $a_de[18];?></div>
        <div class="col-6">Valuable / Belongings :<?php echo $a_de[19];?></div>
        <div class="col-6 mt-3">
            <div class="row">
                <div class="col-6">Dentures :<?php echo $a_de[20];?></div>
            </div>
        </div>

        <div class="col-6 mt-3">
            <div class="row">
                <div class="col-6">Hearing aid </div>
                <div class="col-6">
                    <input type="radio" name="22" id="" value="Yes" <?php if($a_de[22]=="Yes"){
                            echo 'checked';
                        }?>> Yes
                    <input type="radio" name="22" id="" value="no" <?php if($a_de[22]=="No"){
                            echo 'checked';
                        }?>>No
                </div>
                <div class="col-6">
                    <?php echo $a_de[23];?></option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-6 mt-3">Eyeglasses
            <input type="radio" name="24" id="" value="Yes" <?php if($a_de[24]=="Yes"){
                            echo 'checked';
                        }?>> Yes
            <input type="radio" name="24" id="" value="No" <?php if($a_de[24]=="No"){
                            echo 'checked';
                        }?>>No
        </div>
        <div class="col-6 mt-3">Contact lens
            <input type="radio" name="25" id="" value="Yes" <?php if($a_de[25]=="Yes"){
                            echo 'checked';
                        }?>> Yes
            <input type="radio" name="25" id="" value="No" <?php if($a_de[25]=="No"){
                            echo 'checked';
                        }?>>No
        </div>
        <div class="col-6 mt-3">Prosthesis
            <input type="radio" name="26" id="" value="Yes" <?php if($a_de[26]=="Yes"){
                            echo 'checked';
                        }?>> Yes
            <input type="radio" name="26" id="" value="No" <?php if($a_de[26]=="No"){
                            echo 'checked';
                        }?>>No
        </div>
        <div class="col-12 mt-4">
            <div class="row">
                <div class="col-4">Orientation to patient environment</div>
                <div class="col-2"><input type="checkbox" name="27" id="" value="room" <?php if($a_de[27]=="room"){
                            echo 'checked';
                        }?>>Room</div>
                <div class="col-2"><input type="checkbox" name="28" id="" value="light" <?php if($a_de[28]=="light"){
                            echo 'checked';
                        }?>>Light control</div>
                <div class="col-2"><input type="checkbox" name="29" id="" value="television" <?php if($a_de[29]=="television"){
                            echo 'checked';
                        }?>>Television</div>
                <div class="col-2"><input type="checkbox" name="30" id="" value="bathroom" <?php if($a_de[30]=="bathroom"){
                            echo 'checked';
                        }?>>Bathroom</div>
                <div class="col-2"><input type="checkbox" name="31" id="" value="side" <?php if($a_de[31]=="side"){
                            echo 'checked';
                        }?>>Side rails</div>
                <div class="col-1"><input type="checkbox" name="32" id="" value="visitor" <?php if($a_de[32]=="visitor"){
                            echo 'checked';
                        }?>>Visitor</div>
                <div class="col-1"><input type="checkbox" name="33" id="" value="policy" <?php if($a_de[33]=="policy"){
                            echo 'checked';
                        }?>>Policy</div>
                <div class="col-2"><input type="checkbox" name="34" id="" value="bed" <?php if($a_de[34]=="bed"){
                            echo 'checked';
                        }?>>Bed control</div>
                <div class="col-2"><input type="checkbox" name="35" id="" value="emergency" <?php if($a_de[35]=="emergency"){
                            echo 'checked';
                        }?>>Emergency exit</div>
                <div class="col-2"><input type="checkbox" name="36" id="" value="nursecall" <?php if($a_de[36]=="nursecall"){
                            echo 'checked';
                        }?>>Nurse call</div>
                <div class="col-2"><input type="checkbox" name="37" id="" value="religiousneed" <?php if($a_de[37]=="religiousneed"){
                            echo 'checked';
                        }?>>Religious needs</div>
            </div>
        </div>

        <div class="col-6 mt-3">
            <div class="row">
                <div class="col-12">Allergies /Adverse Reaction</div>
                <div class="col-12">Known or suspected allergies to</div>
                <div class="col-12">1. Medication /drugs
                    <input type="radio" name="38" id="" value="Yes" <?php if($a_de[38]=="Yes"){
                            echo 'checked';
                        }?>> Yes
                    <input type="radio" name="38" id="" value="No" <?php if($a_de[38]=="No"){
                            echo 'checked';
                        }?>>No
                </div>
                <div class="col-12">2. Blood tranfusion
                    <input type="radio" name="39" id="" value="Yes" <?php if($a_de[39]=="Yes"){
                            echo 'checked';
                        }?>> Yes
                    <input type="radio" name="39" id="" value="No" <?php if($a_de[39]=="No"){
                            echo 'checked';
                        }?>>No
                </div>
                <div class="col-12">3. Food
                    <input type="radio" name="40" id="" value="Yes" <?php if($a_de[40]=="Yes"){
                            echo 'checked';
                        }?>> Yes
                    <input type="radio" name="40" id="" value="No" <?php if($a_de[40]=="No"){
                            echo 'checked';
                        }?>>No
                </div>
            </div>
        </div>

        <div class="col-12">
            <table class="table table-bordered border-black">
                <tr>
                    <th>Risk Factor</th>
                    <th>0</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>Score</th>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>0-19 years</td>
                    <td>20-59 years</td>
                    <td>60-70 years</td>
                    <td>>70 years</td>
                    <td><?php echo $a_de[41];?></td>
                </tr>
                <tr>
                    <td>Fall History</td>
                    <td>No fall in last year</td>
                    <td>Single fall in last 6 month</td>
                    <td>Single fall in last 3 month</td>
                    <td>Single fall in last month or multiple fall in last year</td>
                    <td><?php echo $a_de[42];?></td>
                </tr>
                <tr>
                    <td>Mental State</td>
                    <td>Orientated to time ,place & person</td>
                    <td>Orientated to place & person</td>
                    <td>Orientated to person only</td>
                    <td>Disoriented & or impaired judgment or impulsive or depression</td>
                    <td><?php echo $a_de[43];?></td>
                </tr>
                <tr>
                    <td>Vision</td>
                    <td>Normal</td>
                    <td>Wear glasses</td>
                    <td>Maculopathu, blurred vision, cataract or glaucoma</td>
                    <td>Severe visual disturbance or blindness</td>
                    <td><?php echo $a_de[44];?></td>
                </tr>
                <tr>
                    <td>Incontinence</td>
                    <td>Non (Normal)</td>
                    <td>Increased frequency</td>
                    <td>Nocturia or stress incontinence</td>
                    <td>Urge incontinence</td>
                    <td><?php echo $a_de[45];?></td>
                </tr>
                <tr>
                    <td>Speech & communication</td>
                    <td>Normal</td>
                    <td>Speech deficit but understood</td>
                    <td>Dysphasia / language /communication barrier</td>
                    <td>Severe deficit, severe language /communication barrier</td>
                    <td><?php echo $a_de[46];?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total Score</td>
                    <td><?php echo $a_de[47];?></td>
                </tr>
            </table>
            <div class="col-12">Score-key : 0-No fall risk , 1-6 : Mild fall risk , 7-12 : Moderate fall risk , 13-18 :
                High fall risk</div>
        </div>

        <div class="col-12 mt-4">
            <table class="table table-bordered border-black">
                <tr>
                    <th>Risk Factor</th>
                    <th>0</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>Score</th>
                </tr>
                <tr>
                    <td>Sensory Perception</td>
                    <td>Completely Limited</td>
                    <td>Very Limited</td>
                    <td>Slightly Limited</td>
                    <td>>No impaiment</td>
                    <td><?php echo $a_de[48];?></td>
                </tr>
                <tr>
                    <td>Moisture</td>
                    <td>Constantly Moist</td>
                    <td>Very Moist</td>
                    <td>Occasionally</td>
                    <td>Rarely Moist</td>
                    <td><?php echo $a_de[49];?></td>
                </tr>
                <tr>
                    <td>Activity</td>
                    <td>Bedfast</td>
                    <td>Chairfast</td>
                    <td>Walks Occasionally</td>
                    <td>Walks Frequently</td>
                    <td><?php echo $a_de[50];?></td>
                </tr>
                <tr>
                    <td>Mobility</td>
                    <td>Completely immobile</td>
                    <td>Very Limited</td>
                    <td>Slightly Limited</td>
                    <td>No Limitation</td>
                    <td><?php echo $a_de[51];?></td>
                </tr>
                <tr>
                    <td>Nutrition</td>
                    <td>Very Poor</td>
                    <td>Probably Inadequate</td>
                    <td>Adequate</td>
                    <td>Excellent</td>
                    <td><?php echo $a_de[52];?></td>
                </tr>
                <tr>
                    <td>Friction & shear</td>
                    <td>Problem</td>
                    <td>Potential Problem</td>
                    <td>No Apparent Problem</td>
                    <td></td>
                    <td><?php echo $a_de[53];?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total Score</td>
                    <td><?php echo $a_de[54];?></td>
                </tr>
            </table>
            <div class="col-12">Score-key : 15-18 : Mild risk , 13-14 : Moderate risk , 10-12 : High risk , < 9 : Very
                    High Risk</div>
            </div>

            <div class="col-12 mt-4">Ability to perform activities of daily living</div>

            <div style="overflow: auto;">
                <table class="table table-bordered border-black table-hover text-center">
                    <?php
   
                    echo '<tr><th>Activity</th>';
                    echo '<th>Independent</th>';
                    echo '<th>Assist</th>';
                    echo '<th>Dependent</th>';
                    echo '</tr>';
                    echo '<tr><th>Bathing </th>';
                    
                    for ($i = 0; $i < 3; $i++) {
                        echo '<td>'.$a_de[$i+55].'</td>';
                    }
                    
                    echo '</tr>';
                    echo '<tr><th>Dressing</th>';
                    
                    for ($i = 0; $i < 3; $i++) { 
                        echo '<td>'.$a_de[$i+58].'</td>';
                    }
                    
                    echo '</tr>';

                    echo '<tr><th>Eating</th>';
                    
                    for ($i = 0; $i < 3; $i++) { 
                        echo '<td>'.$a_de[$i+61].'</td>';
                    }
                    
                    echo '</tr>';

                    echo '<tr><th>Mobility / Walking</th>';
                    
                    for ($i = 0; $i < 3; $i++) { 
                        echo '<td>'.$a_de[$i+64].'</td>';
                    }
                    
                    echo '</tr>';

                    echo '<tr><th>Stair Climbing</th>';
                    
                    for ($i = 0; $i < 3; $i++) { 
                        echo '<td>'.$a_de[$i+67].'</td>';
                    }
                    
                    echo '</tr>';

                    echo '<tr><th>Toilet Use</th>';
                    
                    for ($i = 0; $i < 3; $i++) { 
                        echo '<td>'.$a_de[$i+70].'</td>';
                    }
                    
                    echo '</tr>'; 
                ?> </table>
            </div>

            <div class="col-6">Form Completed By :<?php echo $a_de[73];?></div>
            <div class="col-3">Date : <?php echo $a_de[74];?></div>
            <div class="col-3">Time : <?php echo $a_de[75];?></div>



        </div>
        <h6 class="mt-2">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>