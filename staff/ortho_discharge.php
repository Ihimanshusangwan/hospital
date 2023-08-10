<?php
 require("../admin/connect.php");
 $id = $_GET['id'];

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
error_reporting(0);

 if(isset($_POST['submit'])){
    $mlc=$_POST['mlc'];
    $department=$_POST['depart'];
    $religion=$_POST['religion'];
    $occupation=$_POST['occupation'];
    $dateofs=$_POST['dateofs'];
    $timeofs=$_POST['timeofs'];
    $dateofd=$_POST['dateofd'];
    $timeofd=$_POST['timeofd'];
    $primary=$_POST['ptc'];
    $typeofd=$_POST['typeofd'];
    $diagno=$_POST['diagnosis'];
    $icd=$_POST['icd'];
    $followup=$_POST['followup'];
    $date0=$_POST['date0'];
    $sign=$_POST['sign'];

    $update="UPDATE `ortho_discharge` SET
    `mlc`='$mlc',
    `department`='$department',
    `religion`='$religion',
    `occupation`='$occupation',
    `dateofs`='$dateofs',
    `timeofs`='$timeofs',
    `dateofd`='$dateofd',
    `timeofd`='$timeofd',
    `ptc`='$primary',
    `typeofd`='$typeofd',
    `diagnosis`='$diagno',
    `icd`='$icd',
    `followup`='$followup',
    `date0`='$date0',
    `sign`='$sign'
    WHERE `id`=$id
    ";

    $sql3=mysqli_query($conn,$update);
   $x=1;
    
 }
 $sql4=mysqli_query($conn,"SELECT * FROM   `ortho_discharge` WHERE id=$id");
 $row4=mysqli_fetch_assoc($sql4);
 

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Document</title>
</head>

<body>
    <div class="container">
    <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
       <h3 class=" fl text-center text-dark">DISCHARGE CARD</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
       
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a class="btn btn-primary m-2" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a class="btn btn-primary m-2" href="ortho_discharge_print.php?id=<?php echo $id; ?>">Print</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>

            <form action="" method="post">
            <div class="row">
                    <div class="col-md-3">
                <label class="form-label">IPD No:</label>
                <input  type="text" class="form-control readonly" id="" name="" value=" <?php echo $row2['ipd']; ?>" readonly><br>
                </div>

                <div class="col-md-6"></div>
                <div class="col-md-3">
        <label class="form-label">UHID No: </label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row2['uhid'];?>" readonly><br>
                            
       </div>

            </div>
            <div class="row">
            <div class="col-md-4">
        <label class="form-label">Name of Consultant:</label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row['consultant']; ?> " readonly><br>
        </div>
      
        <div class="col-md-4">
        <label class="form-label">MLC No.:</label>
        <input  type="text" class="form-control" id="" name="mlc" placeholder="MLC No." value="<?php echo $row4['mlc']; ?> " ><br>
        
        </div>
        <div class="col-md-4">
        <label class="form-label">Department:</label>
        <input  type="text" class="form-control" id="" name="depart" placeholder="Department"  value="<?php echo $row4['department']; ?> " ><br>
        </div>
    </div>

        <div class="row">
        <div class="col-md-4">
        <label class="form-label">Name of patient:</label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row['name']; ?>" readonly><br>
       </div>
       <div class="col-md-4">
        <label class="form-label">Age :</label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row['age']; ?> " readonly><br>
      </div>
      <div class="col-md-4">
        <label class="form-label">Sex :</label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row['sex']; ?>" readonly><br>
        </div>
        <div class="col-md-13">
        <label class="form-label">Address :</label>
        <input  type="text" class="form-control" id="" name=""  value=" <?php echo $row['address']." , ".$row['taluka']." , ".$row['district']; ?>" readonly><br>
        </div>
        </div>

     
    <div class="row ">
        
        <div class="col-md-4">
        <label class="form-label">Religion:</label>
        <input  type="text" class="form-control" id="" name="religion" placeholder="Religion" value="<?php echo $row4['religion']; ?>" ><br>
        </div>
        <div class="col-md-4">
        <label class="form-label">Occupation:</label>
        <input  type="text" class="form-control" id="" name="occupation" placeholder="Occupation" value="<?php echo $row4['occupation']; ?>" ><br>
        </div>

    <div class="col-md-4">
        <label class="form-label">Date & Time of Admission :  </label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row2['date']." ".$row2['time']; ?>" readonly><br>
        </div>
       <div class="col-md-3">
        <label class="form-label">Date of Surgery/Procedure :</label>
        <input  type="date" class="form-control" id="" name="dateofs"  value="<?php echo $row4['dateofs']; ?>"><br>
        </div>
      <div class="col-md-3">
        <label class="form-label">Time of Surgery/Procedure :</label>
        <input  type="time" class="form-control" id="" name="timeofs"  value="<?php echo $row4['timeofs']; ?>" ><br>
       </div>
       <div class="col-md-3">
        <label class="form-label">Date of Discharge :</label>
        <input  type="date" class="form-control" id="" name="dateofd"  value="<?php echo $row4['dateofd']; ?>"><br>
        </div>
      <div class="col-md-3">
        <label class="form-label">Time of Discharge : </label>
        <input  type="time" class="form-control" id="" name="timeofd"  value="<?php echo $row4['timeofd']; ?>" ><br>
       </div>
       <div class="col-md-4">
        <label class="form-label">Primary Treating Consultant : </label>
        <input  type="text" class="form-control" id="" name="ptc"  placeholder="Primary Treating Consultant" value="<?php echo $row4['ptc']; ?>"><br>
       </div>
      
      <div class="col-md-4">
        <label class="form-label">Type of Discharge :</label>
        <select class="form-control" name="typeofd" id="">
            <option value="Regular Discharge"<?php if($row4['typeofd']=='Regular Discharge'){
                echo 'selected';
                }?>>Regular Discharge</option>
            <option value="DAMA"<?php if($row4['typeofd']=='DAMA'){
                echo 'selected';
                }?>>DAMA</option>
            <option value="Transfer"<?php if($row4['typeofd']=='Transfer'){
                echo 'selected';
                }?>>Transfer</option>
        </select>
        
       </div>
       <div class="col-md-4">
        <label class="form-label">Diagnosis:</label>
        <textarea type="text" class="form-control" id="" name="diagnosis" placeholder="Diagnosis" ><?php echo $row4['diagnosis']; ?></textarea>
           </div>
           <div class="col-lg-6">
                    <label class="form-label ">ICD Code :</label>
                    <textarea  type="text" class="form-control" id="" placeholder="ICD Code" name="icd"><?php echo $row4['icd']; ?></textarea>
                    </div>
                     <div class="col-lg-6">
                      <label class="form-label ">Follow Up :</label>
                      <textarea type="text" class="form-control" id="" placeholder="Follow Up" name="followup"><?php echo $row4['followup']; ?></textarea>
                     </div>

    </div>      <div class="p-3">
                    <div class="row mt-3 text-center border border-black">
                    <h4 class="form-label m-4" > PLEASE BRING CARD DURING FOLLOW UP</h4>
                    </div></div>

                    <div class="row text-center">
                        <p>In Case of Emergency Please Contact on Mob. : 9422587543 , 9422587542</p>
                        <p>Shri Siddhivinayak Netralaya , Nagar Road , Beed - 431122.</p>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                            <label class="form-label">Date :</label>
                            <input  type="date" class="form-control" id="" name="date0"  value="<?php echo $row4['date0']; ?>" ><br>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-4">
                            <label class="form-label">Signature , Name & Stamp:</label>
                            <input  type="text" class="form-control" id="" name="sign"  value="<?php echo $row4['sign']; ?>"><br>
                            </div> 
                    </div>
        <button type="submit" class="btn btn-primary mt-3 " name="submit" value="submit" id="submit"  >Submit</button>
            
        </form>
    </div>
</body>

</html>