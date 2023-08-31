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
error_reporting(0);
 
$x=0;
 if(isset($_POST['submit'])){
    
    $a=array();
    for ($i = 0; $i < 35; $i++) {
        $element = $_POST[ $i];
        array_push($a, $element);
    }
    
$a_en=json_encode($a);


$update ="UPDATE pre_room_urinary SET
a='$a_en'
WHERE id =$id;
";
$sql3=mysqli_query($conn,$update);

}
$sql4=mysqli_query($conn,"SELECT * FROM pre_room_urinary WHERE id=$id;");
$row4=mysqli_fetch_assoc($sql4);

if($row4){
    $a_de =  json_decode($row4['a'], true);
}
   
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

<body class="m-2">
    <div class="container">
    <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <h3 class=" fl text-center text-dark">PreAnethesia Evaluation of Patient</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="pre_an_print.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <div class="row">
                
                <div class="col-4">
                  <label class="form-label">Name: <?php echo $row['name'];?></label>
                </div>
                <div class="col-md-3">
          <label class="form-label">Age: <?php echo $row['age'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Sex: <?php echo $row['sex'];?></label>
        </div>
               </div>
            
            <form action="" method="post">
            <div class="row">
                <div class="col-4">Posted For :
                    <input type="text" name="1" id="" value="<?php echo $a_de[1];?>" class="form-control">
                </div>
                <div class="col-4">Surgery Identification Mark
                <input type="text" name="2" id=""value="<?php echo $a_de[2];?>" class="form-control">
                </div>
                <div class="col-4">History of Patient
                <input type="text" name="3" id=""value="<?php echo $a_de[3];?>" class="form-control">
                </div>
                <div class="col-4">H/o of Past Illness
                <input type="text" name="4" id=""value="<?php echo $a_de[4];?>" class="form-control">
                </div>
                <div class="col-4">H/o Blood Tranfusion
                <input type="text" name="5" id="" class="form-control"value="<?php echo $a_de[5];?>">
                </div>
                <div class="col-4">Any Other Significant History
                <input type="text" name="6" id="" value="<?php echo $a_de[6];?>"class="form-control">
                </div>
                <div class="col-4">H/o Drugs
                <input type="text" name="7" id="" value="<?php echo $a_de[7];?>"class="form-control">
                </div>
                <div class="col-4">Habits & Addiction
                <input type="text" name="8" id="" value="<?php echo $a_de[8];?>"class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="text-decoration:underline;">GENERAL
                <!-- <input type="text" name="9" id=""value="<?php echo $a_de[9];?>" class="form-control"> -->
                </div>
                <div class="col-2">Pulse 
                <input type="text" name="10" id=""value="<?php echo $a_de[10];?>" class="form-control">
                </div>
                <div class="col-2">BP  
                <input type="text" name="11" id=""value="<?php echo $a_de[11];?>" class="form-control">
                </div>
                <div class="col-2">CVS  
                <input type="text" name="12" id=""value="<?php echo $a_de[12];?>" class="form-control">
                </div>
                <div class="col-2">CNS  
                <input type="text" name="13" id=""value="<?php echo $a_de[13];?>" class="form-control">
                </div>
                <div class="col-2">RS 
                <input type="text" name="14" id=""value="<?php echo $a_de[14];?>" class="form-control">
                </div>
                <div class="col-2">PA 
                <input type="text" name="15" id=""value="<?php echo $a_de[15];?>" class="form-control">
                </div>
                <div class="col-2">Denture 
                <input type="text" name="16" id=""value="<?php echo $a_de[16];?>" class="form-control">
                </div>
                <div class="col-2">Spine 
                <input type="text" name="17" id=""value="<?php echo $a_de[17];?>" class="form-control">
                </div>
                <div class="col-4">Mouth Opening 
                <input type="text" name="18" id=""value="<?php echo $a_de[18];?>" class="form-control">
                </div>
                <div class="col-4">ASA 
                <input type="text" name="19" id=""value="<?php echo $a_de[19];?>" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="text-decoration:underline;">INVESTIGATION
                <!-- <input type="text" name="20" id=""value="<?php echo $a_de[20];?>" class="form-control"> -->
                </div>
                <div class="col-2">HB
                <input type="text" name="21" id="" value="<?php echo $a_de[21];?>"class="form-control">
                </div>
                <div class="col-2">Blood Group
                <input type="text" name="22" id=""value="<?php echo $a_de[22];?>" class="form-control">
                </div>
                <div class="col-2">Urea
                <input type="text" name="23" id="" value="<?php echo $a_de[23];?>"class="form-control">
                </div>
                <div class="col-2">Creatinine
                <input type="text" name="24" id=""value="<?php echo $a_de[24];?>" class="form-control">
                </div>
                <div class="col-2">BSL Fasting
                <input type="text" name="25" id=""value="<?php echo $a_de[25];?>" class="form-control">
                </div>
                <div class="col-2">PP
                <input type="text" name="26" id=""value="<?php echo $a_de[26];?>" class="form-control">
                </div>
                <div class="col-2">R
                <input type="text" name="27" id=""value="<?php echo $a_de[27];?>" class="form-control">
                </div>
                <div class="col-2">HIV
                <input type="text" name="28" id=""value="<?php echo $a_de[28];?>" class="form-control">
                </div>
                <div class="col-2">Hbs Ag
                <input type="text" name="29" id="" value="<?php echo $a_de[29];?>"class="form-control">
                </div>
                <div class="col-2">ECG
                <input type="text" name="30" id=""value="<?php echo $a_de[30];?>" class="form-control">
                </div>
                <div class="col-2">X-ray
                <input type="text" name="31" id="" value="<?php echo $a_de[31];?>"class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-6">Plan of Anesthesia
                <input type="text" name="32" id=""value="<?php echo $a_de[32];?>" class="form-control">
                </div>
                <div class="col-6">Advice
                <input type="text" name="33" id=""value="<?php echo $a_de[33];?>" class="form-control">
                </div>
                <div class="col-6">Name of Anaesthesiologist
                <input type="text" name="34" id="" value="<?php echo $a_de[34];?>"class="form-control">
                </div>
                <div class="col-6">Signature
                <input type="text" name="0" id=""value="<?php echo $a_de[0];?>" class="form-control">
                </div>
                
            </div>

            <br>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>