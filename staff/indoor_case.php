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
    $doa=$_POST['doa'];
    $doo=$_POST['doo'];
    $dod=$_POST['dod'];
    $refby=$_POST['refby'];
    $diagnosis=$_POST['diagnosis'];
    $treatment=$_POST['treatment'];

    $update="UPDATE indoor_case SET 
    doa='$doa',
    doo='$doo',
    dod='$dod',
    refby='$refby',
    diagnosis='$diagnosis',
    treatment='$treatment'
    WHERE id=$id;
    ";
    
    $sql=mysqli_query($conn,$update);
 }
$sql4=mysqli_query($conn,"SELECT * FROM indoor_case WHERE id=$id");
$row4=mysqli_fetch_assoc($sql4);
   error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indoor Case Paper</title>
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
            <h3 class=" fl text-center text-dark">Indoor Case Paper</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="indoor_print.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            
            <form action="" method="post">
                <div class="row">
                <div class="col-6">
                     <label class="form-label mt-2">Patient's Name : <?php echo $row['name']; ?></label>
                </div>
            
                <div class="col-6">
                     <label class="form-label">Sex: <?php echo $row['sex'];?></label>
                </div>
                <div class="col-6">
                    <label class="form-label">Address :  <?php echo $row['address']." , ".$row['taluka']." , ".$row['district']; ?></label>
                </div>
                <div class="col-6">Ph.No. : <?php echo $row['mobile'];?></div>

                <div class="col-3">DOA : <input type="text" class="form-control" name="doa"value="<?php echo $row4['doa'];?>" id=""></div>
                <div class="col-3">DOO : <input type="text" class="form-control" name="doo"value="<?php echo $row4['doo'];?>"  id=""></div>
                <div class="col-3">DOD : <input type="text" class="form-control"name="dod" value="<?php echo $row4['dod'];?>" id=""></div>
                <div class="col-3">Ref By : <input type="text" class="form-control"name="refby" value="<?php echo $row4['refby'];?>" id=""></div>
                <div class="col-6">Diagnosis : <textarea name="diagnosis" class="form-control" ><?php echo $row4['diagnosis'];?></textarea></div>
                <div class="col-6">Treatment : <textarea name="treatment" class="form-control"><?php echo $row4['treatment'];?></textarea></div>

            </div>
            
            <br>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>