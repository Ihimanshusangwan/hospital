<?php

require("../admin/connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();
$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
$x=0;
if (isset($_POST['submit'])) {
    
    $name = $_POST['name0']. '&' . $_POST['name1']. '&' . 
  $_POST['name2']. '&' . $_POST['name3']. '&' . 
  $_POST['name4']. '&' . $_POST['name5'] .'&'.$_POST['name6'];

  $op = $_POST['op0']. '&' . $_POST['op1']. '&' . 
  $_POST['op2']. '&' . $_POST['op3']. '&' . 
  $_POST['op4']. '&' . $_POST['op5'] .'&'.$_POST['op6'];

  $sur = $_POST['sur0']. '&' . $_POST['sur1']. '&' . 
  $_POST['sur2']. '&' . $_POST['sur3'];

$update="UPDATE `op` SET `name` = '$name',`op`='$op',`sur`='$sur' WHERE `id` = '$id'";
  $conn->query($update);
  $x=1;


}
$sql3 = "SELECT * FROM op WHERE id = '$id';";
$data3 = $conn->query($sql3);
$op1 = $data3->fetch_assoc();
$name = explode("&", $op1['name']);
$op = explode("&", $op1['op']);
$sur = explode("&", $op1['sur']);

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
        <h1 class="fl text-center text-danger mt-3">SHRI SIDDHIVINAYAK NETRALAYA</h1>
        <h5 class=" fl text-center text-dark mt-3"> Address</h5>
        <h3 class=" fl text-center text-dark"> Operative Notes By Surgeon</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>

    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a class="btn btn-primary m-2" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="ortho_on_notes_print.php?id=<?php echo $id; ?>" class=" btn btn-success m-2"
            id="dashboard">Print</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>
            <div class="row">
      <div class="col-md-3">
        <label class="form-label">UHID No:
          <?php echo $res2['uhid']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">IPD No:
          <?php echo $res2['ipd']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Date of Admission :
          <?php echo $res2['date']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label" for="time_ad">Time of Admission :
          <?php echo $res2['time']; ?>
        </label>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-md-3">
        <label class="form-label">Name:
          <?php echo $res['name']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Age:
          <?php echo $res['age']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Sex:
          <?php echo $res['sex']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">ICU/Ward Room No:
          <?php echo $res2['ward/icu']; ?>
        </label>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <label class="form-label">Consultant:
          <?php echo $res['consultant']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Diagnosis:
          <?php echo $res1['diagnosis']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Bed Number:
          <?php echo $res2['bed/room']; ?>
        </label>
      </div>
    </div>
            <form action="" method="post">

                <div class="row">
                    
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="form-label text-primary">Name of Surgeon :</label>
                                <input  type="text" class="form-control" id="age"
                                    placeholder="Enter Name of Surgeon"  name="name0"    value="<?php  echo $name[0]; ?>">
                            </div>
                            <div class="col-lg-5">
                                <label class="form-label text-primary">Name of Anaesthesist :</label>
                                <input  type="text" class="form-control" id="age"
                                    placeholder="Enter Name of Anaesthesist" name="name1"    value="<?php echo $name[1];?>">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label text-primary">Type of Anaesthesist:</label>
                                <input  type="text" class="form-control" id="age" placeholder="type" name="name2"    value="<?php  echo $name[2]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label text-primary">Operation Started Date :</label>
                                <input  type="date" class="form-control" id="DOA"
                                    placeholder="Date of Admission" name= "name3"    value="<?php echo $name[3];?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-primary" for="time_ad">Operation Started Time :</label>
                                <input  type="time" class="form-control" id="time_ad"
                                    placeholder="Time of Admission" name= "name4"    value="<?php echo $name[4]; ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-primary">Operation Ended Date :</label>
                                <input  type="date" class="form-control" id="DOA"
                                    placeholder="Date of Admission" name= "name5"    value="<?php echo $name[5]; ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text-primary" for="time_ad">Operation Ended Time :</label>
                                <input  type="time" class="form-control" id="time_ad"
                                    placeholder="Time of Admission" name="name6"    value="<?php echo $name[6]; ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="form-label text-primary">Name of OT Assistant :</label>
                                <input  type="text" class="form-control" id="age"
                                    placeholder="Enter Name of OT Assistant" name="op0"    value="<?php echo $op[0]; ?>">
                            </div>
                            <div class="col-lg-5">
                                <label class="form-label text-primary">Scrb Nurse :</label>
                                <input type="text" class="form-control" id="age" placeholder="scrub-nurse" name="op1"    value="<?php echo $op[1]; ?>">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label text-primary">Circulating Nurse / HCA:</label>
                                <input type="text" class="form-control" id="age"
                                    placeholder="circulating/hca" name="op2"    value="<?php echo $op[2]; ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label text-primary">Pre-operative Diagnosis :</label>
                                <textarea  type="text" class="form-control" id="age"
                                    placeholder="Enter Name of OT Assistant" name="op3"><?php echo $op[3]; ?></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-primary">Post-operative Diagnosis:</label>
                                <textarea  type="text" class="form-control" id="age"
                                    placeholder="scrub-nurse" name="op4"><?php echo $op[4]; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label text-primary">Operative Notes :</label>
                                <textarea  type="text" class="form-control" id="age"
                                    placeholder="Enter Name of OT Assistant" name="op5"><?php echo $op[5]; ?></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label text-primary">Post Operative Plan of care:</label>
                                <textarea  type="text" class="form-control" id="age"
                                    placeholder="scrub-nurse" name="op6"><?php echo $op[6]; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Signature</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Surgeon</th>
                                <td> <input  type="text" class="form-control" id="age" placeholder="signature" name="sur0"    value="<?php echo $sur[0]; ?>"></td>
                                <td><input type="text" class="form-control" id="age" placeholder="name" name="sur1"    value="<?php echo $sur[1]; ?>"></td>
                                <td><input  type="date" class="form-control" id="age" name="sur2"    value="<?php echo $sur[2]; ?>"></td>
                                <td><input  type="time" class="form-control" id="age" name="sur3"    value="<?php echo $sur[3]; ?>"></td>

                            </tr>
                        </tbody>
                    </table>
                    
            
        </div>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
            
        </form>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</body>

</html>