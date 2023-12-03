<?php
session_start();

if (!isset($_SESSION['staff_id'])) {
    header("location:login.php");
}
require("../admin/connect.php");
$id = $_GET['id'];
error_reporting(0);

if (isset($_POST['submit'])) { 

    $register = "select id from surgical_site_injection_register where patient_id = '$id'; ";
    $reg_result = $conn->query($register);
    if ($reg_result->num_rows == 1) {
        // update
        $update = "UPDATE `surgical_site_injection_register`
        SET
          `date` = '{$_POST['1']}',
          `uhid` = '{$_POST['10']}',
          `ipd` = '{$_POST['11']}',
          `ward` = '{$_POST['12']}',
          `name` = '{$_POST['13']}',
          `surgical_proc` = '{$_POST['2']}',
          `date_of_surgery` = '{$_POST['3']}',
          `date_of_ssi` = '{$_POST['4']}',
          `wound` = '{$_POST['5']}',
          `remarks` = '{$_POST['8']}',
          `sign` = '{$_POST['9']}'
        WHERE `patient_id` = $id;
        ";

        $conn->query($update);
    } else {
        // insert
        $insert = "INSERT INTO `surgical_site_injection_register`
        (`date`, `uhid`, `ipd`, `ward`, `name`, `surgical_proc`, `date_of_surgery`, `date_of_ssi`, `wound`, `remarks`, `sign`,patient_id)
      VALUES
        ('{$_POST['1']}', '{$_POST['10']}', '{$_POST['11']}', '{$_POST['12']}', '{$_POST['13']}', '{$_POST['2']}', '{$_POST['3']}', '{$_POST['4']}', '{$_POST['5']}', '{$_POST['8']}', '{$_POST['9']}',$id);
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
    $sql = "SELECT * FROM surgical_site_injection_register WHERE patient_id = '$id';";
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
            
      <h3 class="text-center text-dark mt-3"> Surgical Site Injection (SSI)</h3>
            <form id="form" action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="10" value="<?php echo $res1['uhid'] ?>">
      <input type="hidden" name="11" value="<?php echo $res1['ipd'] ?>">
      <input type="hidden" name="12" value="<?php echo $res1['ward/icu'] ?>">
      <input type="hidden" name="13" value="<?php echo $res['name'] ?>">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Date:</label>
                        <input type="date" name="1" class="form-control"
                            placeholder="" value="<?php echo $res2['date']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Name of Surgical Procedure:</label>
                        <input type="text" name="2" class="form-control"
                            placeholder="" value="<?php echo $res2['surgical_proc']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Date of Surgery:</label>
                        <input type="date" name="3" class="form-control"
                            placeholder="" value="<?php echo $res2['date_of_surgery']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Detection Date of SSI:</label>
                        <input type="date" name="4" class="form-control"
                            placeholder="" value="<?php echo $res2['date_of_ssi']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Evidence Of Pus and Gapping of Wound:</label>
                        <input type="text" name="5" class="form-control"
                            placeholder="" value="<?php echo $res2['wound']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Remarks:</label>
                        <input type="text" name="8" class="form-control"
                            placeholder="" value="<?php echo $res2['remarks']; ?>"><br>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Sign:</label>
                        <input type="text" name="9" class="form-control"
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