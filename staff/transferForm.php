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
error_reporting(0);
$x=0;

if (isset($_POST['submit'])) {
    $treat = $_POST['treat'];
    $copy = $_POST['copy1'];
    

    $vital = $_POST['vital0'] . '&' . $_POST['vital1']. '&' . $_POST['vital2']. '&' . $_POST['vital3']. '&' . $_POST['vital4']. '&' . $_POST['vital5']; 

$attach = $_POST['attach0']. '&' . $_POST['attach1']. '&' . $_POST['attach2']. '&' . $_POST['attach3']. '&' . $_POST['attach4']. '&' . $_POST['attach5'] .'&'.$_POST['attach6'] .'&'.$_POST['attach7'].'&'.$_POST['attach8'] ;

$transfer = $_POST['transfer0']. '&' . $_POST['transfer1']. '&' . $_POST['transfer2']. '&' .$_POST['transfer3'];


$conset = $_POST['conset0']. '&' . $_POST['conset1']. '&' . $_POST['conset2']. '&' . $_POST['conset3']. '&' . $_POST['conset4']. '&' . $_POST['conset5'];

$update="UPDATE `counsel` SET `treat` = '$treat',`vital` = '$vital', `attach` = '$attach', `transfer` = '$transfer', `conset`='$conset',`copy`='$copy' WHERE `id` = '$id'";
  $conn->query($update);
  $x=1;
  


}
$sql3 = "SELECT * FROM counsel WHERE id = '$id';";
$data3 = $conn->query($sql3);
$con = $data3->fetch_assoc();
$vital = explode("&", $con['vital']);
$attach = explode("&", $con['attach']);
$transfer = explode("&", $con['transfer']);
$conset = explode("&", $con['conset']);


session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
</head>

<body>
    <div class="container">
        <h1 class="text-center text-danger mt-3">SHRI SIDDHIVINAYAK NETRALAYA</h1>
        <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
        <a href="ortho_transfer_print.php?id=<?php echo $id; ?>" class=" btn btn-success m-2"
            id="dashboard">Print</a>
        <h3 class="text-center text-dark mt-3">TRANSFER FORM</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
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
        <hr />
        <div class="row">
        <form id="form" action="" method="post" enctype="multipart/form-data">
            <h6>Treatment Details :</h6>
            <textarea name="treat" type="text" style="height: 100px" class="form-control" id="treatment"
                placeholder=""><?php echo $con['treat'];?></textarea>
        </div>
        <hr>
       
        <div class="row">
            <h6 class="fl text-center">Vitals at Transfer</h6>
            <div class="col-3">
                <label class="form-label text-primary">B.P</label>
                <input name="vital0" type="text" class="form-control" id="" value="<?php echo $vital[0]?>"/>
            </div>
            <div class="col-3">
                <label class="form-label text-primary">Pulse</label>
                <input name="vital1" type="text" class="form-control" id="" value = "<?php  try{echo $vital[1];} catch(Excetion $e){}?>"/>
            </div>
            <div class="col-3">
                <label class="form-label text-primary">R.R</label>
                <input name="vital2" type="text" class="form-control" id="" value = "<?php  try{echo $vital[2];} catch(Excetion $e){}?>" />
            </div>
            <div class="col-3">
                <label class="form-label text-primary">Other</label>
                <input name="vital3" type="text" class="form-control" id="" value = "<?php  try{echo $vital[3];} catch(Excetion $e){}?>" />
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <label class="form-label text-primary">Mental Status :</label>
                <input name="vital4" type="text" class="form-control" id="" value = "<?php  try{echo $vital[4];} catch(Excetion $e){}?>"/>
            </div>
            <div class="col-6">
                <label class="form-label text-primary">Condition of Patient At The Time Of Transfer :</label>
                <input name="vital5" type="text" class="form-control" id="" value = "<?php  try{echo $vital[5];} catch(Excetion $e){}?>"/>
            </div>
        </div>
        <hr>
        <div class="col-5">
            <label class="form-label text-primary">Copy of Treatment Documentation Attached :</label><br />
            <input type="radio" name="copy1" value = "Yes" <?php if($con['copy']=='Yes'){echo "checked";}?>/>
            <label style="margin-left: 0.5rem; margin-right: 1rem">Yes</label>
            <input type="radio" name="copy1" value = "No" <?php if($con['copy']=='No'){echo "checked";}?>/><label style="margin-left: 0.5rem">No</label>
        </div>
        <div class="row">
            <h6 class="fl text-center">Attachments with Patient</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input name="attach0" type="text" class="form-control" id="" value = "<?php  try{echo $attach[0];} catch(Excetion $e){}?>"/></td>
                        <td><input name="attach1" type="text" class="form-control" id="" value = "<?php  try{echo $attach[1];} catch(Excetion $e){}?>"/></td>
                        <td><input name="attach2" type="text" class="form-control" id="" value = "<?php  try{echo $attach[2];} catch(Excetion $e){}?>"/></td>
                    </tr>
                    <tr>
                        <td><input name="attach3" type="text" class="form-control" id="" value = "<?php  try{echo $attach[3];} catch(Excetion $e){}?>"/></td>
                        <td><input name="attach4" type="text" class="form-control" id="" value = "<?php  try{echo $attach[4];} catch(Excetion $e){}?>"/></td>
                        <td><input name="attach5" type="text" class="form-control" id="" value = "<?php  try{echo $attach[5];} catch(Excetion $e){}?>"/></td>
                    </tr>
                    <tr>
                        <td><input name="attach6" type="text" class="form-control" id="" value = "<?php  try{echo $attach[6];} catch(Excetion $e){}?>"/></td>
                        <td><input name="attach7" type="text" class="form-control" id="" value = "<?php  try{echo $attach[7];} catch(Excetion $e){}?>"/></td>
                        <td><input name="attach8" type="text" class="form-control" id="" value = "<?php  try{echo $attach[8];} catch(Excetion $e){}?>"/></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-6">
                <label class="form-label text-primary">Reason For Transfer :</label>
                <input name="transfer0" type="text" class="form-control" id="" value = "<?php  try{echo $transfer[0];} catch(Excetion $e){}?>" />
            </div>
            <div class="col-6">
                <label class="form-label text-primary">Transfer To :</label>
                <input name="transfer1" type="text" class="form-control" id="" value = "<?php  try{echo $transfer[1];} catch(Excetion $e){}?>" />
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <label class="form-label text-primary">Transfer Adviced By :</label>
                <input name="transfer2" type="text" class="form-control" id="" value = "<?php  try{echo $transfer[2];} catch(Excetion $e){}?>"/>
            </div>
            <div class="col-6">
                <label class="form-label text-primary">Attending Staff :</label>
                <input name="transfer3" type="text" class="form-control" id="" value = "<?php  try{echo $transfer[3];} catch(Excetion $e){}?>"/>
            </div>
        </div>
        <hr>
        <div class="row">
            <h6 class="fl text-center">CONSENT FOR TRANSFER</h6>
            <p class="text-danger">I/we,am/are willing to transfer the patient name <?php echo $res['name'];?>.As per advise of Doctor.The reason for transfer,condition of Patient,treatment,risks and consequences etc.Have been explained to me/us and understood by me/us</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Signature of Patient</th>
                        <th scope="col">Signature of Witness</th>
                        <th scope="col">Signature of Medical Officer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Date</th>
                        <td><input name="conset0" type="text" class="form-control" id="age" value = "<?php  try{echo $conset[0];} catch(Excetion $e){}?>"></td>
                        <td><input name="conset1" type="date" class="form-control" id="age" value = "<?php  try{echo $conset[1];} catch(Excetion $e){}?>"></td>
                        <td><input name="conset2" type="date" class="form-control" id="age" value = "<?php  try{echo $conset[2];} catch(Excetion $e){}?>"></td>
                    </tr>
                    <tr>
                        <th scope="row">Time</th>
                        <td><input name="conset3" type="text" class="form-control" id="age"value = "<?php  try{echo $conset[3];} catch(Excetion $e){}?>"></td>
                        <td><input name="conset4" type="time" class="form-control" id="age"value = "<?php  try{echo $conset[4];} catch(Excetion $e){}?>"></td>
                        <td><input name="conset5" type="time" class="form-control" id="age"value = "<?php  try{echo $conset[5];} catch(Excetion $e){}?>"></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
            
        </form>
    </div>
</body>

</html>