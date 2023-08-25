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
    $specimen=$_POST['speciname'];
    $clinical=$_POST['clinicalh'];
    $exam=$_POST['examination'];
    $investigation=$_POST['investigate'];
    $imaging=$_POST['imag'];
    $diagnosis=$_POST['prodia'];
    $reference=$_POST['pbref'];
    $opnotes=$_POST['opnotes'];
    $refered=$_POST['refbdoc'];
    $rcontainer=$_POST['rcontainer'];
    $relative=$_POST['relative'];
    $relsign=$_POST['signr'];
    $date=$_POST['dater'];
    $time=$_POST['timer'];

    $update="UPDATE `histopath` SET
    `specimen`='$specimen',
    `clinical`='$clinical',
    `exam`='$exam',
    `investi`='$investigation',
    `imaging`='$imaging',
    `diagno`='$diagnosis',
    `ref`='$reference',
    `opnote`='$opnotes',
    `refered`='$refered',
    `rcontainer`='$rcontainer',
    `relative`='$relative',
    `relsign`='$relsign',
    `date`='$date',
    `time`='$time'
    WHERE id=$id
    ";
    
    $sql3=mysqli_query($conn,$update);
$x=1;
 }
 

 $sql4=mysqli_query($conn,"SELECT * FROM `histopath` WHERE id = $id");
 $row3=mysqli_fetch_assoc($sql4);
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
         <h3 class=" fl text-center text-dark">HISTOPATHOLOGY SAMPLE HANDOVER FORM</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
       
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="ortho_histo_print.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>

            <div class="row">
      <div class="col-md-3">
        <label class="form-label mt-2">UHID No: <?php echo $row2['uhid'];?></label>
       </div>
      <div class="col-md-3">
        <label class="form-label mt-2">IPD No: <?php echo $row2['ipd']; ?>  </label>
        </div>
      <div class="col-md-3">
        <label class="form-label mt-2">Date of Admission :<?php echo $row2['date']; ?>  </label>
        </div>
      <div class="col-md-3">
        <label class="form-label mt-2">Time of Admission : <?php echo $row2['time']; ?></label>
       </div>
    </div>
    <div class="row ">
      <div class="col-md-3">
        <label class="form-label">Name:<?php echo $row['name']; ?></label>
       </div>
      <div class="col-md-3">
        <label class="form-label">Age:<?php echo $row['age']; ?> </label>
         
      </div>
      <div class="col-md-3">
        <label class="form-label">Sex:<?php echo $row['sex']; ?></label>
        </div>
      <div class="col-md-3">
        <label class="form-label">ICU/Ward Room No:<?php echo $row2['ward/icu']; ?></label>
       </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <label class="form-label">Consultant:<?php echo $row['consultant']; ?> </label>
        </div>
      <div class="col-md-3">
        <label class="form-label">Diagnosis:<?php echo $row1['diagnosis']; ?></label>
           </div>
      <div class="col-md-3">
        <label class="form-label">Bed Number: <?php echo $row2['bed/room']; ?> </label>
        </div>
    </div>
    <br>
            <form action="" method="post">
                <div class="row">
                    <hr>
                    <div class="container">
                    <div class="col-lg-5">
                    <label class="form-label ">Name of Specimen Fixative :</label>
                                <input  type="text" class="form-control" id="fixname"
                                    placeholder="Enter Name of Specimen Fixative"  name="speciname"    value="<?php echo $row3['specimen'];?>">
                        
                    </div>
                    <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="form-label ">Clinical History :</label>
                                <textarea  type="text" class="form-control" id="chistory" placeholder="Enter Clinical History"  name="clinicalh"><?php echo $row3['clinical'];?></textarea>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Examination:</label>
                                <textarea type="text" class="form-control" id="exam" placeholder="Enter Examination" name="examination"><?php echo $row3['exam'];?></textarea>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Investigation:</label>
                                <textarea  type="text" class="form-control" id="investigation" placeholder="Enter Investigation" name="investigate"><?php echo $row3['investi'];?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label ">Imaging(X-Ray/CT Scan/MRI):</label>
                                <textarea  type="text" class="form-control" id="imaging" name= "imag"   placeholder="Imaging(X-Ray/CT Scan/MRI)" ><?php echo $row3['imaging'];?></textarea>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" >Provisional Diagnosis :</label>
                                <textarea  type="text" class="form-control" id="pd"
                                    placeholder="Provisional Diagnosis" name= "prodia"><?php echo $row3['diagno'];?></textarea>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label ">Previous Biospy Reference(If any):</label>
                                <textarea  type="text" class="form-control" id="pbr"
                                    placeholder="Previous Biospy Reference(If any)" name= "pbref"><?php echo $row3['ref'];?></textarea>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label ">Operative Notes:</label>
                                <textarea  type="text" class="form-control" id="onotes"
                                    placeholder="Operative Notes" name="opnotes"><?php echo $row3['opnote'];?></textarea>
                                    <br>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                            <div class="col-lg-4">
                                <label class="form-label ">Referred By Doctor:</label>
                                <input  type="text" class="form-control" id="rbd" value="<?php echo $row3['refered'];?>"
                                    placeholder="Referred By Doctor" name="refbdoc">
                                    <br>
                    </div>
                                <label class="form-label ">Received Container (1/2/3) For Histopathology Examination:</label>  
                            <div class="col-lg-4">
                                <input  type="text" class="form-control" id="received" value="<?php echo $row3['rcontainer'];?>"
                                    placeholder="Referred By Doctor" name="rcontainer">
                                    <br>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="form-label ">Relative Name:</label>
                                <input  type="text" class="form-control" id="rn" value="<?php echo $row3['relative'];?>"
                                    placeholder="Referred By Doctor" name="relative">
                                    <br>
                            </div>
                           
                        </div>
                    </div>
                    <div style="overflow:auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Relative's Signature</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <input  type="text" class="form-control" id="signrel" placeholder="Signature" name="signr" value="<?php echo $row3['relsign'];?>"></td>
                                <td><input  type="date" class="form-control" id="dr" name="dater"  value="<?php echo $row3['date'];?>"></td>
                                <td><input  type="time" class="form-control" id="tr" name="timer" value="<?php echo $row3['time'];?>"></td>
                            </tr>
                        </tbody>
                    </table>
    </div>
                    
            
        </div>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
            
        </form>
    </div>
</body>

</html>