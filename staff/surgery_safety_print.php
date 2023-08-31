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

$sql4=mysqli_query($conn,"SELECT * FROM surgery_safety WHERE id=$id");
$row4=mysqli_fetch_assoc($sql4);
$a_de = array_fill(0, 22, '');
if($row4){
    $a_de = json_decode($row4['a'], true);
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
        <a href="surgery_safety.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Surgical Safety Checklist </h3>
    <?php include_once("../header/header.php") ?>
    <div class="row">
                <div class="col-4 p-2 text-center border text-white bg-secondary">BEFORE INDUCTION OF ANESTHESIA</div>
                <div class="col-4 p-2 text-center text-white border  bg-secondary">BEFORE SKIN INCISION</div>
                <div class="col-4 p-2 text-center text-white border bg-secondary">BEFORE PATIENT LEAVES OPERATING ROOM
                </div>

                <div class="col-4 p-2 text-center text-white border bg-secondary">SIGN IN</div>
                <div class="col-4 p-2 text-center text-white border bg-secondary">TIME OUT</div>
                <div class="col-4 p-2 text-center  text-white border bg-secondary"></div>

                <div class="col-4 border border-secondary">
                    <div class="row">
                        <div class="col-12 m-2">
                            <input type="checkbox" name="1" id="" value="Yes" <?php if($a_de[1]==='Yes'){
                                    echo 'checked';}?>>
                            PATIENT HAS CONFIRMED
                        </div>
                        <div class="col-12">-IDENTITY</div>
                        <div class="col-12">-SITE</div>
                        <div class="col-12">-PROCEDURE</div>
                        <div class="col-12">-IDENTITY</div>
                        <div class="col-12">-CONSENT</div>
                        <hr>
                        <div class="div col-12">
                            <input type="checkbox" name="2" id=""value="Yes" <?php if($a_de[2]==='Yes'){
                                    echo 'checked';}?>>
                            SITE MARKED/NOT APPLICABLE
                        </div>
                        <hr>
                        <div class="div col-12">
                            <input type="checkbox" name="3" id=""value="Yes" <?php if($a_de[3]==='Yes'){
                                    echo 'checked';}?>>
                            ANAESTHESIA SAFETY CHECK COMPLETED
                        </div>
                        <hr>
                        <div class="div col-12">
                            <input type="checkbox" name="4" id=""value="Yes" <?php if($a_de[4]==='Yes'){
                                    echo 'checked';}?>>
                            PULSE OXIMETER ON PATIENT AND FUNCTIONING
                        </div>
                        <hr>

                        <div class="div col-12"><strong>
                            DOES PATIENT HAVE A:</strong></div>

                        <div class="div col-12"><strong>
                            KNOWN ALLERGY? </strong></div>

                        <div class="col-12">
                            <input type="radio" name="5" id=""value="Yes" <?php if($a_de[5]==='Yes'){
                                    echo 'checked';}?>><label for="">YES</label><br>
                            <input type="radio" name="5" id=""value="No" <?php if($a_de[5]==='No'){
                                    echo 'checked';}?>><label for="">NO</label>
                        </div>
                        <hr>
                        <div class="div col-12"><strong>
                            DIFFICULT AIRWAY/ASPIRATION RISK?</strong> </div>

                        <div class="col-12">
                            <input type="radio" name="6" id=""value="No" <?php if($a_de[6]==='No'){
                                    echo 'checked';}?>><label for="">NO</label><br>
                            <input type="radio" name="6" id=""value="Yes" <?php if($a_de[6]==='Yes'){
                                    echo 'checked';}?>><label for="">YES, AND EQUIPMENT / ASSISTANCE
                                AVAILABLE</label>
                        </div>
                        <hr>
                        <div class="div col-12"><strong>
                            RISK OF >500ML BLOOD LOSS </strong></div>
                        <div class="col-12"><strong>(7ML/KG IN CHILDREN)?</strong></div>

                        <div class="col-12">
                            <input type="radio" name="22" id=""value="No" <?php if($a_de[22]==='No'){
                                    echo 'checked';}?>><label for="">NO</label><br>
                            <input type="radio" name="22" id=""value="Yes" <?php if($a_de[22]==='Yes'){
                                    echo 'checked';}?>>YES, AND ADEQUATE INTRAVENOUS
                                ACCESS AND FLUIDS
                        </div>
                    </div>
                </div>

                <div class="col-4 border border-secondary">
                    <div class="row">
                        <div class="col-12 m-2">
                            <input type="checkbox" name="7" id=""value="Yes" <?php if($a_de[7]==='Yes'){
                                    echo 'checked';}?>>
                            CONFIRM ALL TEAM MEMBERS HAVE INTRODUCED THEMSELVES BY NAME AND ROLE
                        </div>
                        <hr>
                        <div class="col-12">
                            <input type="checkbox" name="8" id=""value="Yes" <?php if($a_de[8]==='Yes'){
                                    echo 'checked';}?>>
                            SURGEON, ANAESTHESIA PROFESSIONAL AND NURSE VERBALLY CONFIRM
                            <div class="col-row">
                                <div class="col-12">
                                    <input type="checkbox" name="9" id=""value="Yes" <?php if($a_de[9]==='Yes'){
                                    echo 'checked';}?>>
                                    PATIENT
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="10" id=""value="Yes" <?php if($a_de[10]==='Yes'){
                                    echo 'checked';}?>>
                                    SITE
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="11" id=""value="Yes" <?php if($a_de[11]==='Yes'){
                                    echo 'checked';}?>>
                                    PROCEDURE
                                </div>
                            </div>
                            <hr>
                            <div class="col-12"><strong>  ANTICIPATED CRITICAL EVENTS</strong>
                              </div>
                            <div class="col-12">
                                <input type="checkbox" name="12" id=""value="Yes" <?php if($a_de[12]==='Yes'){
                                    echo 'checked';}?>>
                                SURGEON REVIEWS: WHAT ARE THE CRITICAL OR UNEXPECTED STEPS, OPERATIVE DURATION,
                                ANTICIPATED
                                BLOOD LOSS?
                            </div><br>
                            <div class="col-12">
                                <input type="checkbox" name="13" id=""value="Yes" <?php if($a_de[13]==='Yes'){
                                    echo 'checked';}?>>
                                ANAESTHESIA TEAM REVIEWS: ARE THERE ANY PATIENT-SPECIFIC CONCERNS?
                            </div><br>
                            <div class="col-12">
                                <input type="checkbox" name="14" id=""value="Yes" <?php if($a_de[14]==='Yes'){
                                    echo 'checked';}?>>

                                NURSING TEAM REVIEWS: HAS STERILITY

                                (INCLUDING INDICATOR RESULTS) BEEN CONFIRMED? ARE THERE EQUIPMENT ISSUES OR ANY
                                CONCERNS?
                            </div>
                            <hr>
                            <div class="col-12"><strong> HAS ANTIBIOTIC PROPHYLAXIS BEEN GIVEN WITHIN THE LAST 60 MINUTES?
                            </strong></div>
                            <div class="col-12">
                                <input type="radio" name="15" id=""value="Yes" <?php if($a_de[15]==='Yes'){
                                    echo 'checked';}?>><label for="">YES</label><br>
                                <input type="radio" name="15" id=""value="No" <?php if($a_de[15]==='No'){
                                    echo 'checked';}?>><label for="">NOT APPLICABLE</label>
                            </div><br>
                            <div class="col-12"><strong> IS ESSENTIAL IMAGING DISPLAYED?</strong>
                               </div>
                            <div class="col-12">
                                <input type="radio" name="16" id=""value="Yes" <?php if($a_de[16]==='Yes'){
                                    echo 'checked';}?>><label for="">YES</label><br>
                                <input type="radio" name="16" id=""value="No" <?php if($a_de[16]==='No'){
                                    echo 'checked';}?>><label for="">NOT APPLICABLE</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-4">
                    <div class="row">
                        <div class="col-12 m-2">
                        <div class="col-12"><strong> NURSE VERBALLY CONFIRMS WITH THE
                            TEAM:</strong></div><br>
                        <div class="col-12 ">
                            <input type="checkbox" name="17" id=""value="Yes" <?php if($a_de[17]==='Yes'){
                                    echo 'checked';}?>>
                            THE NAME OF THE PROCEDURE RECORDED
                        </div><br>
                        <div class="col-12">
                            <input type="checkbox" name="18" id=""value="Yes" <?php if($a_de[18]==='Yes'){
                                    echo 'checked';}?>>
                            THAT INSTRUMENT, SPONGE AND NEEDLE COUNTS ARE CORRECT (OR NOT APPLICABLE)
                        </div><br>
                        <div class="col-12">
                            <input type="checkbox" name="19" id=""value="Yes" <?php if($a_de[19]==='Yes'){
                                    echo 'checked';}?>>
                            HOW THE SPECIMEN IS LABELLED (INCLUDING PATIENT NAME)
                        </div><br>
                        <div class="col-12">
                            <input type="checkbox" name="20" id=""value="Yes" <?php if($a_de[20]==='Yes'){
                                    echo 'checked';}?>>
                            WHETHER THERE ARE ANY EQUIPMENT
                            PROBLEMS TO BE ADDRESSED
                        </div><br>
                        <hr>
                        <div class="col-12">
                            <input type="checkbox" name="21" id=""value="Yes" <?php if($a_de[21]==='Yes'){
                                    echo 'checked';}?>>
                            SURGEON, ANAESTHESIA PROFESSIONAL AND NURSE REVIEW THE KEY CONCERNS FOR RECOVERY AND
                            MANAGEMENT OF THIS PATIENT
                        </div>
                    </div>
                    </div>
                </div>

            </div>
    <h6 class="mt-2" >Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>