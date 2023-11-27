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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = array();
    for ($i = 1; $i <= 10; $i++) {
        $data[$i] = $_POST[$i];
    }
    $dataToStore = json_encode($data);
    $sql = "select * from gynec_discharge where id = $id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //update
        $sql = "update gynec_discharge set data = '$dataToStore' where id = $id";
        $conn->query($sql);
        echo '<div class="alert alert-success" role="alert">
    <strong>Success!</strong> Your data has been updated successfully.
  </div>
  ';
    } else {
        //insert
        $sql = "insert into gynec_discharge(id,data) values($id,'$dataToStore')";
        $conn->query($sql);
        echo '<div class="alert alert-success" role="alert">
    <strong>Success!</strong> Your data has been submitted successfully.
  </div>
  ';
    }
}
$sql = "select * from gynec_discharge where id=$id";
$res = $conn->query($sql)->fetch_assoc();
$data = json_decode($res['data'], true);
// print_r($data);


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
            <a class="btn btn-primary m-2" href="gynec_discharge_print.php?id=<?php echo $id; ?>">Print</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>

            <form action="" method="post">
            <div class="row">
                   


            </div>
            <div class="row">
            <div class="col-md-4">
        <label class="form-label">Name of Consultant:</label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row['consultant']; ?> " readonly><br>
        </div>
        <div class="col-md-4">
        <label class="form-label">Name of patient:</label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row['name']; ?>" readonly><br>
       </div>
       <div class="col-md-4">
        <label class="form-label">Age :</label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row['age']; ?> " readonly><br>
      </div>
      
    
    </div>

        <div class="row">
       
       
      <div class="col-md-4">
        <label class="form-label">Sex :</label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row['sex']; ?>" readonly><br>
        </div>
        <div class="col-6">
        <label class="form-label">Address :</label>
        <input  type="text" class="form-control" id="" name=""  value=" <?php echo $row['address']." , ".$row['taluka']." , ".$row['district']; ?>" readonly><br>
        </div>
        </div>

     
    <div class="row ">
        
    

    <div class="col-md-4">
        <label class="form-label">Date & Time of Admission :  </label>
        <input  type="text" class="form-control" id="" name=""  value="<?php echo $row2['date']." ".$row2['time']; ?>" readonly><br>
        </div>
       
       <div class="col-md-3">
        <label class="form-label">Date of Discharge :</label>
        <input  type="date" class="form-control" id="" name="1"  value="<?php echo $data['1']; ?>"><br>
        </div>
      <div class="col-md-3">
        <label class="form-label">Time of Discharge : </label>
        <input  type="time" class="form-control" id="" name="2"  value="<?php echo $data['2']; ?>" ><br>
       </div>
    
       <div class="col-12">
        <label class="form-label">Diagnosis:</label>
        <textarea type="text" class="form-control" id="" name="3"  ><?php echo $data['3']; ?></textarea>
           </div>
       <div class="col-12">
        <label class="form-label">Clinical Findings and Treatment During Admission:</label>
        <textarea type="text" class="form-control" id="" name="4"  ><?php echo $data['4']; ?></textarea>
           </div>
       <div class="col-12">
        <label class="form-label">Operative Notes:</label>
        <textarea type="text" class="form-control" id="" name="5"  ><?php echo $data['5']; ?></textarea>
           </div>
       <div class="col-12">
        <label class="form-label"> Investigations:</label>
        <textarea type="text" class="form-control" id="" name="6"  ><?php echo $data['6']; ?></textarea>
           </div>
       <div class="col-12">
        <label class="form-label"> Treatment Given:</label>
        <textarea type="text" class="form-control" id="" name="7"  ><?php echo $data['7']; ?></textarea>
           </div>
       <div class="col-12">
        <label class="form-label"> Course in ward:</label>
        <textarea type="text" class="form-control" id="" name="8"  ><?php echo $data['8']; ?></textarea>
           </div>
       <div class="col-12">
        <label class="form-label"> Treatment on Discharge:</label>
        <textarea type="text" class="form-control" id="" name="9"  ><?php echo $data['9']; ?></textarea>
           </div>
       <div class="col-12">
        <label class="form-label"> Follow Up:</label>
        <textarea type="text" class="form-control" id="" name="10"  ><?php echo $data['10']; ?></textarea>
           </div>
             <div class="p-3">
                    <div class="row mt-3 text-center border border-black">
                    <h4 class="form-label m-4" > PLEASE BRING CARD DURING FOLLOW UP</h4>
                    </div></div>

                    
                    <div class="row">
                   
        <button type="submit" class="btn btn-primary mt-3 " name="submit" value="submit" id="submit"  >Submit</button>
            
        </form>
    </div>
</body>

</html>