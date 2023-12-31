<?php
session_start();

if (!isset($_SESSION['staff_id'])) {
    header("location:login.php");
}
require("../admin/connect.php");
$id = $_GET['id'];
error_reporting(0);

if (isset($_POST['submit'])) { 

    $register = "select * from needle_injury_record where patient_id = '$id'; ";
    $reg_result = $conn->query($register);
    if ($reg_result->num_rows == 1) {
        // update
        $update = "UPDATE needle_injury_record
        SET
          `name` = '{$_POST['2']}',
          `date_of_exposure` = '{$_POST['1']}',
          `date_of_reporting` = '{$_POST['4']}',
          `hiv` = '{$_POST['5']}',
          `types_of_pep` = '{$_POST['6']}',
          `remark` = '{$_POST['7']}',
          `sign` = '{$_POST['8']}',
          exposure = '{$_POST['3']}'
        WHERE `patient_id` = $id;
        ";

        $conn->query($update);
    } else {
        // insert
        $insert = "INSERT INTO needle_injury_record
        (`name`, `date_of_exposure`, `date_of_reporting`, `hiv`, `types_of_pep`, `remark`, `sign`, `exposure`, `patient_id`)
      VALUES
        ('{$_POST['2']}', '{$_POST['1']}', '{$_POST['4']}', '{$_POST['5']}', '{$_POST['6']}', '{$_POST['7']}', '{$_POST['8']}', '{$_POST['3']}', $id);
      ";
        $conn->query($insert);

    }
    
    echo "<div class='alert alert-success'> Updated Successfully</div>";


} 

    $sql = "SELECT * FROM needle_injury_record WHERE patient_id = '$id';";
    $data2 = $conn->query($sql);
    $res2 = $data2->fetch_assoc();





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
      input[type="date"]::placeholder,
      input[type="tel"]::placeholder,
      input[type="number"]::placeholder {
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
        border-color: #c0c0c0;
        box-shadow: 5px 5px 5px 5px #c0c0c0;
        animation: gelatine 1s;
      }

      input[type="text"],
      input[type="time"],
      input[type="date"],
      input[type="tel"],
      input[type="number"] {
        outline: none !important;
        border-color: #c0c0c0;
        box-shadow: 5px 5px 5px 5px #c0c0c0;
        animation: gelatine 1s;
      }

      textarea[type="text"] {
        outline: none !important;
        border-color: #c0c0c0;
        box-shadow: 5px 5px 5px 5px #c0c0c0;
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
    <title>Document</title>
</head>

<body>
    <div class="container">
        <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
        <div class="col p-4 m-4 shadow-lg rounded">
            
      <h3 class="text-center text-dark mt-3"> Needle Prick Injury Record</h3>
            <form id="form" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Date of Exposure:</label>
                        <input type="date" name="1" class="form-control"
                            placeholder="" value="<?php echo $res2['date_of_exposure']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Employee Name & ID No.:</label>
                        <input type="text" name="2" class="form-control"
                            placeholder="" value="<?php echo $res2['name']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Exposure Type:</label>
                        <input type="text" name="3" class="form-control"
                            placeholder="" value="<?php echo $res2['exposure']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Date of Reporting To Casuality:</label>
                        <input type="date" name="4" class="form-control"
                            placeholder="" value="<?php echo $res2['date_of_reporting']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">HIV Status:</label>
                        <input type="text" name="5" class="form-control"
                            placeholder="" value="<?php echo $res2['hiv']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Types of Given PEP (Basic /Expanded):</label>
                        <input type="text" name="6" class="form-control"
                            placeholder="" value="<?php echo $res2['types_of_pep']; ?>"><br>
                    </div>
                    
                    <div class="col-6">
                        <label class="form-label">Remark:</label>
                        <input type="text" name="7" class="form-control"
                            placeholder="" value="<?php echo $res2['remark']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Sign:</label>
                        <input type="text" name="8" class="form-control"
                            placeholder="" value="<?php echo $res2['sign']; ?>"><br>
                    </div>
                    

                </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit"
                    id="submit">Submit</button>
            </div>
        </div>
        </form>
    </div>

</body>

</html>