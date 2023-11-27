<?php
session_start();

if (!isset($_SESSION['staff_id'])) {
    header("location:login.php");
}
require("../admin/connect.php");
$id = $_GET['id'];
error_reporting(0);


if (isset($_POST['submit'])) {

    $register = "select * from delivery where id = '$id'; ";
    $reg_result = $conn->query($register);
    if ($reg_result->num_rows == 1) {
        // update
        $update = "UPDATE `delivery`
SET
  `reg` = '{$_POST['reg']}',
  `addmission` = '{$_POST['addmission']}',
  `discharge` = '{$_POST['discharge']}',
  `name` = '{$_POST['name']}',
  `address` = '{$_POST['address']}',
  `husband` = '{$_POST['husband']}',
  `age` = '{$_POST['age']}',
  `male` = '{$_POST['male']}',
  `female` = '{$_POST['female']}',
  `abortion` = '{$_POST['abortion']}',
  `child_date` = '{$_POST['child_date']}',
  `child_time` = '{$_POST['child_time']}',
  `child_day` = '{$_POST['child_day']}',
  `child_sex` = '{$_POST['child_sex']}',
  `child_weight` = '{$_POST['child_weight']}',
  `oe` = '{$_POST['oe']}',
  `type` = '{$_POST['type']}',
  `blood` = '{$_POST['blood']}',
  `score` = '{$_POST['score']}',
  `form` = '{$_POST['form']}',
  `form_date` = '{$_POST['form_date']}',
  `religion` = '{$_POST['religion']}'
WHERE `id` = $id;";
        $conn->query($update);
    } else {
        // insert
        $insert = "INSERT INTO `delivery` (
            `id`,
            `reg`,
            `addmission`,
            `discharge`,
            `name`,
            `address`,
            `husband`,
            `age`,
            `male`,
            `female`,
            `abortion`,
            `child_date`,
            `child_time`,
            `child_day`,
            `child_sex`,
            `child_weight`,
            `oe`,
            `type`,
            `blood`,
            `score`,
            `form`,
            `form_date`,
            `religion`
          ) VALUES (
            $id,
            '{$_POST['reg']}',
            '{$_POST['addmission']}',
            '{$_POST['discharge']}',
            '{$_POST['name']}',
            '{$_POST['address']}',
            '{$_POST['husband']}',
            '{$_POST['age']}',
            '{$_POST['male']}',
            '{$_POST['female']}',
            '{$_POST['abortion']}',
            '{$_POST['child_date']}',
            '{$_POST['child_time']}',
            '{$_POST['child_day']}',
            '{$_POST['child_sex']}',
            '{$_POST['child_weight']}',
            '{$_POST['oe']}',
            '{$_POST['type']}',
            '{$_POST['blood']}',
            '{$_POST['score']}',
            '{$_POST['form']}',
            '{$_POST['form_date']}',
            '{$_POST['religion']}'
          );
          ";
        $conn->query($insert);

    }

    echo "<div class='alert alert-success'> Updated Successfully</div>";
}
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();
$sql = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
$data1 = $conn->query($sql);
$res1 = $data1->fetch_assoc();
$sql = "SELECT * FROM delivery WHERE id = '$id';";
$data2 = $conn->query($sql);
$res2 = $data2->fetch_assoc();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="../dropdown_styles.css">
  <style type="text/css">
    body {
      margin: 30px;
    }

    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 40px;
    }
  </style>
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
        input[type="date"]::placeholder ,
        input[type="tel"]::placeholder,
        input[type="number"]::placeholder{
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
        input[type="date"],
        input[type="tel"],
        input[type="number"] {
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
        input[type="date"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus {
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
    <title>Delivery Register</title>
</head>

<body>
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a href="gynec_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
          <h1 class="text-center mb-5 text-primary">Delivery Register</h1>
          <form action="" method="POST">
          <div class="row">
            <div class="col-md-3">
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Reg No. Serial</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="reg" value="<?php echo $res2['reg'];?>">
                  </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date and Time of Admission</label>
                    <input type="datetime-local" class="form-control" id="exampleFormControlInput1" name="addmission" value="<?php echo $res2['addmission'];?>">
                  </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date and Time of Discharge</label>
                    <input type="datetime-local" class="form-control" id="exampleFormControlInput1" name="discharge" value="<?php echo $res2['discharge'];?>">
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name of Patient</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?php echo $res['name'];?>">
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="address" value="<?php echo $res['address'];?>">
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name and Edu. of Husband</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="husband" value="<?php echo $res2['husband'];?>">
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Age:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="age" value="<?php echo $res2['age'];?>">
                  </div>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center">Obstetrics History</h3>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Male</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="male" value="<?php echo $res2['male'];?>"male >
                  </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Female</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="female" value="<?php echo $res2['female'];?>">
                  </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Abortion</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="abortion" value="<?php echo $res2['abortion'];?>">
                  </div>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center">Details of Child Birth</h3>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="child_date" value="<?php echo $res2['child_date'];?>">
                  </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Time</label>
                    <input type="time" class="form-control" id="exampleFormControlInput1" name="child_time" value="<?php echo $res2['child_time'];?>">
                  </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Day</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="child_day" value="<?php echo $res2['child_day'];?>">
                  </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Sex</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="child_sex" value="<?php echo $res2['child_sex'];?>">
                  </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Weight</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="child_weight" value="<?php echo $res2['child_weight'];?>">
                  </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">O/E</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="oe" value="<?php echo $res2['oe'];?>">
                  </div>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center">Types of Delivery & Implecation of intervention (if any)</h3>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Types of Delivery & Implecation of intervention (if any)</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="type" value="<?php echo $res2['type'];?>">
                  </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Child's Blood Group</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="blood" value="<?php echo $res2['blood'];?>">
                  </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Apgar Score</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="score" value="<?php echo $res2['score'];?>">
                  </div>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center">Birth Notification To Municipal Authorities</h3>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Form No.</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="form" value="<?php echo $res2['form'];?>">
                  </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="form_date" value="<?php echo $res2['form_date'];?>">
                  </div>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center">Mother's religion Education</h3>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mother's religion Education</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="religion" value="<?php echo $res2['religion'];?>"religion>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
              <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
            </div>
          </div>
        </div>
      </div></form>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>