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

$sql5=mysqli_query($conn,"SELECT * FROM nutri_assessment WHERE id=$id");
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
        <a href="nutritional_assessment.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Nutritional Assessement Form </h3>
    <?php include_once("../header/header.php") ?>
    <div class="row">
                    <div class="col-4">Weight :<?php echo $row5['weight'];?></div>
                    <div class="col-4">Height :<?php echo $row5['height'];?></div>
                    <div class="col-4">BMI :<?php echo $row5['bmi'];?></div>
                    <div class="col-9 mt-3">[A] Has food intake declined over the past 3 months due to loss
                        of appetite ,digestive problems, chewing or swallowing difficulties</div>
                    <div class="col-3 mt-3">
                        <input type="text" id="" name="a" value="<?php echo $row5['a'];?>" class="form-control">
                    </div>
                    <div class="col-12">0 = severe decrease in food intake <br>1 = moderate decrease in food intake
                        <br>2 = no decrease in food intake</div>

                    <div class="col-9 mt-4">[B] Weight loss during the last 3 months</div>
                    <div class="col-3 mt-4"><input type="text" value="<?php echo $row5['b'];?>" name="b" id=""
                            class="form-control"></div>
                    <div class="col-12">0 = weight loss greater than 3 kg (6.6 lbs)<br>1 = does not know <br>2 = weight
                        loss between 1 and 3 kg (2.2 and 6.6 lbs) <br>3= no weight loss</div>

                    <div class="col-9 mt-4">[C] Mobility</div>
                    <div class="col-3 mt-4"><input type="text" value="<?php echo $row5['c'];?>" name="c" id=""
                            class="form-control"></div>
                    <div class="col-12">0 = bed or chair bound<br>1 = able to get out of bed/chair but does not go
                        out<br>2 = goes out</div>

                    <div class="col-9 mt-4">[D] Has suffered psychological stress or acute disease in the past 3 months?
                    </div>
                    <div class="col-3 mt-4"><input type="text" value="<?php echo $row5['d'];?>" name="d" id=""
                            class="form-control"></div>
                    <div class="col-12">0 = Yes <br>1 = No </div>

                    <div class="col-9 mt-4">[E] Neuropsychological problems</div>
                    <div class="col-3 mt-4"><input type="text" value="<?php echo $row5['e'];?>" name="e" id=""
                            class="form-control"></div>
                    <div class="col-12">0 = severe dementia or depression<br>1 = mild dementia <br>2 = no psychological
                        problems</div>

                    <div class="col-9 mt-4">[F] Body Mass Index (BMI) (24.89)</div>
                    <div class="col-3 mt-4"><input type="text" value="<?php echo $row5['f'];?>" name="f" id=""
                            class="form-control"></div>
                    <div class="col-12">0 = BMI less than 19 <br>1 = BMI 19 to less than 21 <br>2 = BMI 21 to less than
                        23<br>3 = BMI 23 or greater</div>

                    <div class="col-12 mt-4">Screening Score (max. 14 points)</div>
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-4 mt-2"><input type="text" value="<?php echo $row5['point1'];?>"
                                    name="point1" id="" class="form-control"></div>
                            <div class="col-8 mt-2">12 - 14 points : Normal nutritional status</div>
                            <div class="col-4 mt-2"><input type="text" value="<?php echo $row5['point2'];?>"
                                    name="point2" id="" class="form-control"></div>
                            <div class="col-8 mt-2">8 - 11 points : At risk malnutrition</div>
                            <div class="col-4 mt-2"><input type="text" value="<?php echo $row5['point3'];?>"
                                    name="point3" id="" class="form-control"></div>
                            <div class="col-8 mt-2">0 - 7 points : Malnourished</div>
                        </div>
                    </div>

                    <div class="col-12 text-center m-4" style="text-decoration:underline">Immunization Assessment Form
                    </div>
                    <div class="col-3">Child - Below 12 yr </div>
                    <div class="col-3">
                        DPT
                        <input type="radio" name="dptRadio" id="dptYes" value="Yes" <?php if($row5['dpt']=="Yes"){
                            echo 'checked';
                        }?>>
                        <label for="dptYes">Yes</label>
                        <input type="radio" name="dptRadio" id="dptNo" value="No" <?php if($row5['dpt']=="No"){
                            echo 'checked';
                        }?>>
                        <label for="dptNo">No</label>
                    </div>
                    <div class="col-3">Polio
                         <input type="radio" name="polioRadio" id="polioYes" value="Yes" <?php if($row5['polio']=="Yes"){
                            echo 'checked';
                        }?>>
                        <label for="polioYes">Yes</label>
                        <input type="radio" name="polioRadio" id="polioNo" value="No" <?php if($row5['polio']=="No"){
                            echo 'checked';
                        }?>>
                        <label for="polioNo">No</label>
                    </div>
                    <div class="col-3">MMR
                         <input type="radio" name="mmrRadio" id="mmrYes"  value="Yes" <?php if($row5['mmr']=="Yes"){
                            echo 'checked';
                        }?>>
                        <label for="mmrYes">Yes</label>
                        <input type="radio" name="mmrRadio" id="mmrNo" value="No" <?php if($row5['mmr']=="No"){
                            echo 'checked';
                        }?>>
                        <label for="mmrNo">No</label>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-3">TT Last Booster :</div>
                            <div class="col-3"><?php echo $row5['tt'];?></div>
                            <div class="col-3">Hepatitis B Last Booster :</div>
                            <div class="col-3"><?php echo $row5['hepatitis'];?></div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-3">Adult - TT Last Booster :</div>
                            <div class="col-3"><?php echo $row5['adult'];?></div>
                            <div class="col-3">Hepatitis B Last Booster : </div>
                            <div class="col-3"><?php echo $row5['hepatitis_ad'];?></div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-3">Ward Sister Name :</div>
                            <div class="col-3"><?php echo $row5['sis'];?></div>
                            <div class="col-3">Sign :</div>
                            <div class="col-3"><?php echo $row5['sign'];?></div>
                        </div>
                    </div>

                </div>
                <br>
    <h6 class="mt-2" >Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>