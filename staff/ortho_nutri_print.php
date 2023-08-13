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

$sql4=mysqli_query($conn,"SELECT * FROM `nutritional_ass` WHERE id = $id");
    $row3=mysqli_fetch_assoc($sql4);
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
        <a href="ortho_nutrition.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">NUTRITIONAL ASSESSMENT</h3>
   
    <?php include_once("../header/header.php") ?>
    
                            <div class="row">
                           <div class="col-12 mt-2">
                            <strong>Allergy To (Drug / Food Other) :</strong><?php echo $row3['allergy'];?>
                            </div>
                            <div class="col-12 mt-2">
                            <strong>Name of Dietitian : </strong><?php echo $row3['namediet'];?>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>Diagnosis : </strong><?php echo $row3['diagnosis'];?>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>Present Complaints : </strong><?php echo $row3['complaints'];?>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>Clinical Symptoms : </strong><?php echo $row3['csymptm'];?>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>Treatment : </strong><?php echo $row3['treatment'];?>
                            </div>
                            </div>

                            <div class="text-center mt-4 mb-1"><strong >Objective Information</strong></div><hr>
                            <div class="row">
                            <div class="col-4 mt-1">
                            <strong>Height : </strong><?php echo $row3['height'];?>
                            </div>
                            <div class="col-4 mt-2">
                            <strong>Weight : </strong><?php echo $row3['weight'];?>
                            </div>
                            <div class="col-4 mt-2">
                            <strong>BMI : </strong><?php echo $row3['bmi'];?>
                            </div>
                            <div class="row">
                            <div class="col-6 mt-2">
                            <strong>Weight : </strong><?php echo $row3['wenou'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Weight Change or Loss : </strong><?php echo $row3['weichange'];?>
                            </div>
                            </div>
                            </div>

                            <div class="text-center mt-4 mb-1"><strong >Nutritional History/Therapy</strong></div><hr>
                            <div class="row">
                            <div class="row">
                            <div class="col-12 mt-1">
                            <strong>Diet Prior to Admission : </strong><?php echo $row3['dietprior'];?>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>Appetite Prior to Admission : </strong><?php echo $row3['appetite'];?>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>Food Allergies : </strong><?php echo $row3['foodaller'];?>
                            </div>
                            </div>
                            </div>

                            <div class="text-center mt-4 mb-1"><strong>Food Habits</strong></div><hr>
                            <div class="row">
                            <div class="row">
                            <div class="col-12 mt-1">
                            <strong>1. Vegetarian or Non-vegetarian? : </strong><?php echo $row3['vegnon'];?>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>2. Home Food or Outside Food? : </strong><?php echo $row3['hofood'];?>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>3. Do you have food at proper intervals? : </strong><?php echo $row3['proper'];?>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>4. Do you have snacks/junk food frequently? : </strong><?php echo $row3['junk'];?>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>5. Cooking Medium : </strong><?php echo $row3['cookm'];?>
                            </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class="row">
                            <div class="col-6 mt-2">
                            <strong>Water Intake : </strong><?php echo $row3['waterin'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Salt Intake : </strong><?php echo $row3['saltin'];?>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2">
                            <strong>Recommendations : </strong><?php echo $row3['recomm'];?>
                            </div>
                            </div>
                            
                            <div class="col-12 mt-2">
                            <strong>Name of Dietitian : </strong><?php echo $row3['nameofdiet'];?>
                            </div>
                            <div class="col-4 mt-2">
                            <strong>Date : </strong><?php echo $row3['date'];?>
                            </div><div class="col-6"></div>
                            <div class="col-2 mt-2">
                            <strong>Time : </strong><?php echo $row3['time'];?>
                            
                            </div>
                            </div>
                            </div>
                    
    <h6 class="mt-3">Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>