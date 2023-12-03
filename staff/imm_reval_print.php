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

$sql5=mysqli_query($conn,"SELECT * FROM im_reval WHERE id=$id");
$row5=mysqli_fetch_assoc($sql5);
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
        <a href="immediate_reval.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Immediate Pre-Operative Re-Evaluation Form </h3>

    <?php include_once("../header/header.php") ?>
    <div class="row mt-3">
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-4">T :<?php echo $row5['t'];?></div>
                            <div class="col-4">BP :<?php echo $row5['bp'];?></div>
                            <div class="col-4">P :<?php echo $row5['p'];?></div>
                            <div class="col-3">R :<?php echo $row5['r'];?></div>
                            <div class="col-3">O2 Sat :<?php echo $row5['osat'];?></div>
                            <div class="col-3">FBS :<?php echo $row5['fbs'];?></div>
                            <div class="col-3">@ :<?php echo $row5['a'];?></div>
                            <table class="mt-4 mb-3 table table-bordered border-black">
                                <tr>
                                    <th>WBC</th>
                                    <th>Hct</th>
                                    <th>Pits</th>
                                </tr>
                                <tr>
                                    <td><?php echo $row5['wbc'];?></td>
                                    <td> <?php echo $row5['hct'];?></td>
                                    <td> <?php echo $row5['pits'];?></td>
                                </tr>
                            </table>
                            <table class=" mb-3 table table-bordered border-black">
                                <tr>
                                    <th>Na</th>
                                    <th>Cl</th>
                                    <th>Glucose</th>
                                    <th>BUN</th>
                                </tr>
                                <tr>
                                    <td><?php echo $row5['na'];?></td>
                                    <td><?php echo $row5['cl'];?></td>
                                    <td> <?php echo $row5['glucose'];?></td>
                                    <td> <?php echo $row5['bun'];?></td>
                                </tr>
                            </table>
                            <table class=" mb-3 table table-bordered border-black">
                                <tr>
                                    <th>K</th>
                                    <th>CO2</th>
                                    <th>Cr</th>
                                </tr>
                                <tr>
                                    <td><?php echo $row5['k'];?></td>
                                    <td> <?php echo $row5['co'];?></td>
                                    <td><?php echo $row5['cr'];?></td>

                                </tr>
                            </table>
                            <table class=" mb-3 table table-bordered border-black">
                                <tr>
                                    <th>INR</th>
                                    <th>PT</th>
                                    <th>PTT</th>
                                </tr>
                                <tr>
                                    <td> <?php echo $row5['inr'];?></td>
                                    <td> <?php echo $row5['pt'];?></td>
                                    <td><?php echo $row5['ptt'];?></td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <div class="col-12 border border-black">
                        <div class="row ">
                            <div class="d-flex flex-row">
                                <div class="col-2">UPT/SPT:</div>
                                <div class="col-2">
                                    <input type="radio" name="uptRadio" id="uptNeg" value="Neg"
                                        <?php if($row5['upt']=="Neg"){ echo 'checked'; }?>>
                                    <label for="uptNeg">Neg</label>
                                </div>
                                <div class="col-2">
                                    <input type="radio" name="uptRadio" id="uptPos" value="Pos"
                                        <?php if($row5['upt']=="Pos"){ echo 'checked'; }?>>
                                    <label for="uptPos">Pos</label>
                                </div>
                                <div class="col-4">Date :<?php echo $row5['date'];?></div>
                            </div>

                            <div class="col-6">LFT's : <?php echo $row5['lft'];?></div>
                            <div class="col-6">Ca : <?php echo $row5['ca'];?></div>
                            <div class="col-6">CXR :<?php echo $row5['cxr'];?></div>
                            <div class="col-6">Date :<?php echo $row5['date2'];?></div>
                            <div class="col-6">ECG :<?php echo $row5['ecg'];?></div>
                            <div class="col-6">Date :<?php echo $row5['date3'];?></div>
                            <div class="col-6">Echo :<?php echo $row5['echo'];?></div>
                            <div class="col-6">Date :<?php echo $row5['date4'];?></div>
                            <div class="col-6">Stress Test :<?php echo $row5['stress'];?></div>
                            <div class="col-6">Date :<?php echo $row5['date5'];?></div>
                            <div class="col-6"></div>
                            <div class="col-6">Signature Nurse :<?php echo $row5['sign'];?></div>

                        </div>
                    </div>
                </div>
                <div class="row border border-black ">
                    <div class="col-12 p-2 text-center"><strong>Physician Only</strong></div>
                    <div class="col-6 border border-black">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li class="mt-2">NBM , status reaffirmed
                                        <input type="radio" name="nbmRadio" id="" value="Yes" <?php if($row5['nbm']=="Yes"){
                            echo 'checked';
                        }?>>
                                        <label>Yes</label>
                                        <input type="radio" name="nbmRadio" id="" value="No" <?php if($row5['nbm']=="No"){
                            echo 'checked';
                        }?>>
                                        <label>No</label>
                                    </li>

                                    <li class="mt-1">Advised pre-op medications taken
                                        <input type="radio" name="adRadio" id="" value="Yes" <?php if($row5['ad']=="Yes"){
                            echo 'checked';
                        }?>>
                                        <label>Yes</label>
                                        <input type="radio" name="adRadio" id="" value="No" <?php if($row5['ad']=="No"){
                            echo 'checked';
                        }?>>
                                        <label>No</label>
                                    </li>
                                    <li class="mt-1">Consent taken
                                        <input type="radio" name="consentRadio" id="" value="Yes" <?php if($row5['consent']=="Yes"){
                            echo 'checked';
                        }?>>
                                        <label>Yes</label>
                                        <input type="radio" name="consentRadio" id="" value="No" <?php if($row5['consent']=="No"){
                            echo 'checked';
                        }?>>
                                        <label>No</label>
                                    </li>
                                    <li class="mt-1">The risks , benefits , and alternatives of GA , Reg. and Loc/Sed
                                        have been discussed
                                        <input type="checkbox" name="riskRadio" id="" value="risk" <?php if($row5['risk']=="risk"){
                            echo 'checked';
                        }?>>
                                    </li>
                                    <li class="mt-1">The plan is :
                                        <input type="checkbox" name="ga" id="" value="ga" <?php if($row5['ga']=="ga"){
                            echo 'checked';
                        }?>> GA
                                        <input type="checkbox" name="regional" value="regional" <?php if($row5['regional']=="regional"){
                            echo 'checked';
                        }?> id="">Regional

                                        <input type="checkbox" name="sed" id="" value="sed" <?php if($row5['sed']=="sed"){
                            echo 'checked';
                        }?>> IV Sedation
                                        <input type="checkbox" name="spinal" value="spinal" <?php if($row5['spinal']=="spinal"){
                            echo 'checked';
                        }?> id="">Spinal Or
                                       :<?php echo $row5['plan'];?>
                                    </li>
                                    <li class="mt-1">
                                        <input type="checkbox" name="hpRadio" id="" value="hp" <?php if($row5['hp']=="hp"){
                            echo 'checked';
                        }?>>H&P Reviewed , Patient assessed; fit for planned anesthesia.
                                    </li>
                                </ol>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 border border-black">
                        <div class="row">
                            <div class="col-12">Intubation Assessment</div>
                            <div class="col-12">I :<?php echo $row5['I'];?></div>
                            <div class="col-12">II :<?php echo $row5['II'];?>  </div>
                            <div class="col-12">III :<?php echo $row5['III'];?>  </div>
                            <div class="col-12">IV :<?php echo $row5['IV'];?>  </div>
                            <div class="col-3 mt-2"><input type="checkbox" name="caps" id="" value="caps" <?php if($row5['caps']=="caps"){
                            echo 'checked';
                        }?>> Caps</div>
                            <div class="col-4 mt-2"><input type="checkbox" name="overbite" id="" value="overbite" <?php if($row5['overbite']=="overbite"){
                            echo 'checked';
                        }?>> Overbite</div>
                            <div class="col-5 mt-2"><input type="checkbox" name="loose" id="" value="overbite" <?php if($row5['loose']=="loose"){
                            echo 'checked';
                        }?>> Loose Teeth</div>
                            <div class="col-12">ROM :
                                <input type="radio" name="romRadio" id="" value="Full" <?php if($row5['rom']=="Full"){
                            echo 'checked';
                        }?>>
                                <label>Full</label>
                                <input type="radio" name="romRadio" id="" value="Limited" <?php if($row5['rom']=="Limited"){
                            echo 'checked';
                        }?>>
                                <label for="">Limited</label>
                                <input type="radio" name="romRadio" id="" value="None" <?php if($row5['rom']=="None"){
                            echo 'checked';
                        }?>>
                                <label for="">None</label>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">Lungs : clear to ausculation OR :<?php echo $row5['lungs'];?></div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-12">Heart : regular rhythm with no murmurs OR :<?php echo $row5['heart'];?></div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12">ASA :<?php echo $row5['asa'];?></div>
                    </div>
                            </div>

                        </div>
                    </div>

                </div>
    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>