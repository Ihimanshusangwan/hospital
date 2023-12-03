<?php
session_start();

if (!isset($_SESSION['staff_id'])) {
    header("location:login.php");
}
require("../admin/connect.php");
$id = $_GET['id'];
error_reporting(0);


if (isset($_POST['submit'])) { 

    $register = "select * from autoclave where id = '$id'; ";
    $reg_result = $conn->query($register);
    if ($reg_result->num_rows == 1) {
        // update
        $update= "UPDATE `autoclave`
SET
  `date` = '{$_POST['date']}',
  `drum` = '{$_POST['drum']}',
  `name` = '{$_POST['name']}',
  `sign` = '{$_POST['sign']}'
WHERE `id` = $id;";
        $conn->query($update);
    } else {
        // insert
        $insert = "INSERT INTO `autoclave`
        (`date`, `drum`, `name`, `sign`,`id`)
      VALUES
        ('{$_POST['date']}', '{$_POST['drum']}', '{$_POST['name']}', '{$_POST['sign']}',$id);";
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
    $sql = "SELECT * FROM autoclave WHERE id = '$id';";
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
    <title>AutoClave Register</title>
</head>

<body>
    <form action="" method="POST">
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a href="gynec_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
          <button onclick="location.reload();" class="btn btn-success">Refresh</button>
          <h1 class="text-center mb-5 text-primary">AutoClave  Register</h1>
        <div class="row">
            <h6 class="text-center">Date & Drum No</h6>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name='date' value="<?php echo $res2['date'] ?>">
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Drum No.</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name='drum'  value="<?php echo $res2['drum'] ?>">
                  </div>
            </div>
        </div>
        <div class="row">
            <h6 class="text-center">Drum Started and Supervised By - Name,Signature</h6>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name='name'  value="<?php echo $res2['name'] ?>">
                  </div>
            </div>
        </div>
        <div class="row">
            <h6 class="text-center">Signature</h6>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Signature</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name='sign'  value="<?php echo $res2['sign'] ?>">
                  </div>
                </div>
        </div>
        <div class="row">
            <div class="col mt-2">
              <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>