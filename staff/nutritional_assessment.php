<?php
 require("../admin/connect.php");
 $id = $_GET['id'];
 session_start();

 $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
 $row=mysqli_fetch_assoc($sql);

 $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
 $row1=mysqli_fetch_assoc($sql1);

 $sql2=mysqli_query($conn,"SELECT * FROM ortho_p_insure WHERE id = '$id';");
 $row2=mysqli_fetch_assoc($sql2);
 
 $sql = "SELECT * FROM titles WHERE id = 1;";
 $data = $conn->query($sql);
 $title = $data->fetch_assoc();
 
$x=0;
 if(isset($_POST['submit'])){
    $weight=$_POST['wei'];
    $height=$_POST['hei'];
    $bmi=$_POST['bmi'];
    $a=$_POST['a'];
    $b=$_POST['b'];
    $c=$_POST['c'];
    $d=$_POST['d'];
    $e=$_POST['e'];
    $f=$_POST['f'];
    $point1=$_POST['point1'];
    $point2=$_POST['point2'];
    $point3=$_POST['point3'];
    $tt=$_POST['tt'];
    $hepatitis=$_POST['hepatitis'];
    $adult=$_POST['adult'];
    $hepatitis_ad=$_POST['hepatitis_ad'];
    $sis=$_POST['sis'];
    $sign=$_POST['sign'];
    $dpt=isset($_POST['dptRadio']) ? $_POST['dptRadio'] :'';
    $polio=isset($_POST['polioRadio']) ? $_POST['polioRadio'] :'';
    $mmr=isset($_POST['mmrRadio']) ? $_POST['mmrRadio'] : '';


    $update="UPDATE nutri_assessment SET
    weight='$weight',
    height='$height',
    bmi='$bmi',
    a='$a',
    b='$b',
    c='$c',
    d='$d',
    e='$e',
    f='$f',
    point1='$point1',
    point2='$point2',
    point3='$point3',
    tt='$tt',
    hepatitis='$hepatitis',
    adult='$adult',
    hepatitis_ad='$hepatitis_ad',
    sis='$sis',
    sign='$sign',
    dpt='$dpt',
    polio='$polio',
    mmr='$mmr'
    WHERE id=$id;
    ";
    $sql4=mysqli_query($conn,$update);

 }
$sql5=mysqli_query($conn,"SELECT * FROM nutri_assessment WHERE id=$id");
$row5=mysqli_fetch_assoc($sql5);
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritional Assessement Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style type="text/css">
    body {
        background: lightgray;
        animation: fade-in 1s linear;
    }

    .fl {
        animation: gelatine 1s;
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
        border: 1px solid black;
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

<body class="m-2">
    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class=" fl text-center text-dark">Nutritional Assessement Form </h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>

    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href=".php?id=<?php echo $id; ?>" class=" btn btn-success" id="dashboard">Print</a>
            <div class="row">

                <div class="col-md-3">
                    <label class="form-label">UHID No: <?php echo $row2['uhid'];?></label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Date of Admission : <?php echo $row2['date'];?></label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Age: <?php echo $row['age'];?></label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Sex: <?php echo $row['sex'];?></label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Name: <?php echo $row['name'];?></label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">IPD: <?php echo $row2['ipd'];?></label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Consultant: <?php echo $row['consultant'];?></label>
                </div>
            </div>

            <form action="" method="post">
                <div class="row">
                    <div class="col-4">Weight<input type="text" value="<?php echo $row5['weight'];?>" name="wei"
                            class="form-control"></div>
                    <div class="col-4">Height<input type="text" value="<?php echo $row5['height'];?>" id="" name="hei"
                            class="form-control"></div>
                    <div class="col-4">BMI<input type="text" value="<?php echo $row5['bmi'];?>" id="" name="bmi"
                            class="form-control"></div>
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
                            <div class="col-3">TT Last Booster </div>
                            <div class="col-3"><input type="text" value="<?php echo $row5['tt'];?>" name="tt" id=""
                                    class="form-control"></div>
                            <div class="col-3">Hepatitis B Last Booster </div>
                            <div class="col-3"><input type="text" value="<?php echo $row5['hepatitis'];?>"
                                    name="hepatitis" id="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-3">Adult - TT Last Booster </div>
                            <div class="col-3"><input type="text" value="<?php echo $row5['adult'];?>" name="adult"
                                    id="" class="form-control"></div>
                            <div class="col-3">Hepatitis B Last Booster </div>
                            <div class="col-3"><input type="text" value="<?php echo $row5['hepatitis_ad'];?>"
                                    name="hepatitis_ad" id="" class="form-control"></div>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-3">Ward Sister Name </div>
                            <div class="col-3"><input type="text" value="<?php echo $row5['sis'];?>" name="sis" id=""
                                    class="form-control"></div>
                            <div class="col-3">Sign </div>
                            <div class="col-3"><input type="text" value="<?php echo $row5['sign'];?>" name="sign" id=""
                                    class="form-control"></div>
                        </div>
                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit"
                    id="submit">Submit</button>

            </form>
        </div>
</body>

</html>