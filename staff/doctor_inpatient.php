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
    $copain=$_POST['copain'];
    $nolpv=$_POST['nolpv'];
    $lmp=$_POST['lmp'];
    $ga=$_POST['ga'];
    $edd=$_POST['edd'];
    $dysmenorrhea=$_POST['dysmenorrhea'];
    $bp=$_POST['bp'];
    $spo2=$_POST['spo2'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $resp=$_POST['resp'];
    $cardio=$_POST['cardio'];
    $cns=$_POST['cns'];
    $abdomen=$_POST['abdomen'];
    $radiology=$_POST['radiology'];
    $pathology=$_POST['pathology'];
    $diagnosis=$_POST['diagnosis'];
    $plan=$_POST['plan'];
    $pulse=$_POST['pulse'];

    $update="UPDATE doctor_inpatient SET
    copain='$copain',
    nolpv='$nolpv',
    lmp='$lmp',
    ga='$ga',
    edd='$edd',
    dysmenorrhea='$dysmenorrhea',
    bp='$bp',
    spo2='$spo2',
    height='$height',
    weight='$weight',
    resp='$resp',
    cardio='$cardio',
    cns='$cns',
    abdomen='$abdomen',
    radiology='$radiology',
    pathology='$pathology',
    diagnosis='$diagnosis',
    plan='$plan',
    pulse='$pulse'
    WHERE id=$id;

    ";

$sql3=mysqli_query($conn,$update);
 }
 $sql4=mysqli_query($conn,"SELECT * FROM doctor_inpatient WHERE id=$id");
 $row4=mysqli_fetch_assoc($sql4);

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Inpatient Initial Assessment</title>
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
            <h3 class=" fl text-center text-dark"> Doctor Inpatient Initial Assessment</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="doctor_in_print.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            
            <div class="row">
            <div class="col-md-4">
        <label class="form-label mt-2">UHID No : <?php echo $row2['uhid'];?></label>
        </div>
        <div class="col-md-4">
          <label class="form-label">IPD No: <?php echo $row2['ipd'];?></label>
        </div>
      <div class="col-md-4">
        <label class="form-label mt-2">Date : <?php echo $row2['date'];?></label>
        </div>
      <div class="col-md-4">
        <label class="form-label mt-2">Patient's Name : <?php echo $row['name']; ?></label>
       </div>
     
        <div class="col-md-4">
          <label class="form-label">Sex: <?php echo $row['sex'];?></label>
        </div>
        <div class="col-md-4">
        <label class="form-label">Address :  <?php echo $row['address']." , ".$row['taluka']." , ".$row['district']; ?></label>
        <br>
        </div>
      
    </div>
            <form action="" method="post">
              <div class="row">
                <div class="col-12 mt-3" style="text-decoration:underline;">
                Complaints :
                </div>
              <div class="col-3">
                 C/O Pain in ABDO since 1hr:
                <input type="text" value="<?php echo $row4['copain'];?>" name="copain" class="form-control">
              </div>
              <div class="col-3">No LPV /BPV /Decreased FM
              <input type="text" value="<?php echo $row4['nolpv'];?>"  name="nolpv"class="form-control">
              </div>
              </div>
              <div class="row">
                <div class="col-12 mt-3" style="text-decoration:underline;">Obstetric History</div>
                <div class="col-4"> LMP
                <input type="text"  value="<?php echo $row4['lmp'];?>" name="lmp"class="form-control">
                </div>
                <div class="col-4">GA
                <input type="text"name="ga"  value="<?php echo $row4['ga'];?>" class="form-control">
                </div>
                <div class="col-4">EDD
                <input type="text" name="edd" value="<?php echo $row4['edd'];?>" class="form-control">
                </div>
    </div>

                <div class="row">
                    <div class="col-12 mt-3" style="text-decoration:underline;">Menstrual History :</div>
                    <div class="col-6">Dysmenorrhea
                    <input type="text"name="dysmenorrhea" value="<?php echo $row4['dysmenorrhea'];?>"  class="form-control">
                    </div>
                   
                </div>

                    <div class="row">
                        <div class="col-12 mt-3 " style="text-decoration:underline;">General Examination :</div>
                       <div class="col-2">Pulse
                        <input type="text"name="pulse" value="<?php echo $row4['pulse'];?>"  class="form-control">
                        </div>
                        <div class="col-2">BP
                        <input type="text" name="bp" value="<?php echo $row4['bp'];?>" class="form-control">
                        </div>
                        <div class="col-2"> SPO2
                        <input type="text"name="spo2" value="<?php echo $row4['spo2'];?>"  class="form-control">
                        </div>
                        <div class="col-2">Height
                        <input type="text"name="height" value="<?php echo $row4['height'];?>"  class="form-control">
                        </div>
                        <div class="col-2 "> Weight
                        <input type="text" name="weight" value="<?php echo $row4['weight'];?>" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-12 mt-3 " style="text-decoration:underline;">Systematic Examination :</div>
                       <div class="col-3">Respiratory System
                        <input type="text" name="resp" value="<?php echo $row4['resp'];?>" class="form-control">
                        </div>
                        <div class="col-3">Cardiovascular System
                        <input type="text" name="cardio" value="<?php echo $row4['cardio'];?>" class="form-control">
                        </div>
                        <div class="col-3"> CNS
                        <input type="text" name="cns" value="<?php echo $row4['cns'];?>" class="form-control">
                        </div>
                        <div class="col-3">Per Abdomen
                        <input type="text" name="abdomen" value="<?php echo $row4['abdomen'];?>" class="form-control">
                        </div>
                        
                        </div>

                        <div class="row">
                        <div class="col-12 mt-3 mb-3 " style="text-decoration:underline;">Old Reports :</div>
                       <div class="col-6">Radiology
                        <input type="text"name="radiology" value="<?php echo $row4['radiology'];?>"  class="form-control">
                        </div>
                        <div class="col-6 mb-3">Pathology
                        <input type="text"name="pathology" value="<?php echo $row4['pathology'];?>"  class="form-control">
                        </div>
                        <div class="col-6"  >
                        <label for=""style="text-decoration:underline;">Provisional Diagnosis :</label>
                        <textarea type="text"name="diagnosis" class="form-control"><?php echo $row4['diagnosis'];?> </textarea>
                        </div>
                        <div class="col-6 " >
                               <label for="" style="text-decoration:underline;"> Plan Treatment :</label>
                                <textarea type="text" name="plan"class="form-control"><?php echo $row4['plan'];?></textarea>
                            </div>
                        </div>
                        
                      <br>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>