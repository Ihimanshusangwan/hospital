<?php
require("../admin/connect.php");
error_reporting(0);
$id = $_GET['id'];
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $data = array();
for ($i=1;$i<=28;$i++){
    $data[$i] = $_POST[$i];
}
$dataToStore = json_encode($data);
$sql= "select * from delivery_notes where id = $id;";
$result = $conn->query($sql);
if($result->num_rows >0){
    //update
    $sql = "update delivery_notes set data = '$dataToStore' where id = $id";
    $conn->query($sql);
    echo '<div class="alert alert-success" role="alert">
    <strong>Success!</strong> Your data has been updated successfully.
  </div>
  ';
}else{
    //insert
    $sql = "insert into delivery_notes(id,data) values($id,'$dataToStore')";
    $conn->query($sql);
    echo '<div class="alert alert-success" role="alert">
    <strong>Success!</strong> Your data has been submitted successfully.
  </div>
  ';
}
} 
    $sql = "select * from delivery_notes where id=$id";
    $res = $conn->query($sql)->fetch_assoc();
    $data = json_decode($res['data'],true);
    // print_r($data);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
    tboody,
    th,
    td {
        border: 1px solid black;
    }

    input[type="text"] {
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 200px;
        height: 35px;
    }
    table,
            th,
            td {
                border: 1px solid black;
            }

    input[type="text"]:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 5px #4CAF50;
    }

    input[type="text"]:hover {
        border-color: #555;
    }

    /* Style for placeholder text inside the input field */
    input[type="text"]::placeholder {
        color: #aaa;
    }

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
    </style><style type="text/css">
    tbody,
    th,
    td {
        border: 1px solid black;
    }

    input[type="text"] {
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 200px;
        height: 35px;
    }
    table,
            th,
            td {
                border: 1px solid black;
            }

    input[type="text"]:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 5px #4CAF50;
    }

    input[type="text"]:hover {
        border-color: #555;
    }

    /* Style for placeholder text inside the input field */
    input[type="text"]::placeholder {
        color: #aaa;
    }

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
</head>
<body>
<a href="staff_Page.php" class="btn btn-primary m-2">Dashboard</a>
    <a href='deliveryNotesPrint.php?id=<?php echo $id;?>' class="btn btn-primary noprint">Print</a>
    <div class="container">
        <form action="" method="post">
            <h3 class="text-center m-4">Delivery Notes:</h3>
            <div class="row">
                <div class="col">
                    <strong for="deliveryDate">Delivery Date:</strong>
                    <input type="date" class="form-control" id="deliveryDate" name="1" value='<?php echo $data[1];?>'>
                </div>
                <div class="col">
                    <strong for="deliveryTime">Time:</strong>
                    <input type="time" class="form-control" id="deliveryTime" name="2" value='<?php echo $data[2];?>'>
                </div>
            </div>
            
            <div class="form-group">
                <strong>Type of Delivery:</strong>
                <div class="form-check">
                    <input type="radio"  <?php echo ($data['3']=="Normal")?"checked":""; ?>  class="form-check-input" id="normalDelivery" name='3' value='Normal' <?php echo ($data['3']=="Normal")?"checked":""; ?>>
                    <strong class="form-check-strong" for="normalDelivery">Normal</strong>
                </div>
                <div class="form-check">
                    <input type="radio"  <?php echo ($data['3']=="Forceps")?"checked":""; ?>  class="form-check-input" id="forcepsDelivery" name='3' value='Forceps' <?php echo ($data['3']=="Normal")?"checked":""; ?>>
                    <strong class="form-check-strong" for="forcepsDelivery">Forceps</strong>
                </div>
                <div class="form-check">
                    <input type="radio"  <?php echo ($data['3']=="LSCS")?"checked":""; ?>  class="form-check-input" id="lscsDelivery" name='3' value='LSCS'>
                    <strong class="form-check-strong" for="lscsDelivery">LSCS</strong>
                </div>
                <div class="form-group">
                    <strong for="otherDelivery">Others (specify):</strong>
                    <input type="text" class="form-control" id="otherDelivery" name="4" value='<?php echo $data[4];?>'>
                </div>
            </div>
            
            <div class="form-group">
    <strong for="outcome">Outcome:</strong>
    <div class="form-check">
        <input type="radio"  <?php echo ($data['5']=="Live birth")?"checked":""; ?>  class="form-check-input" id="liveBirth" name="5" value="Live birth">
        <strong class="form-check-strong" for="liveBirth">Live birth</strong>
    </div>
    <div class="form-check">
        <input type="radio"  <?php echo ($data['5']=="Abortion")?"checked":""; ?>  class="form-check-input" id="abortion" name="5" value="Abortion">
        <strong class="form-check-strong" for="abortion">Abortion</strong>
    </div>
    <div class="form-check">
        <input type="radio"  <?php echo ($data['5']=="Fresh Still Birth")?"checked":""; ?>  class="form-check-input" id="freshStillBirth" name="5" value="Fresh Still Birth">
        <strong class="form-check-strong" for="freshStillBirth">Fresh Still Birth</strong>
    </div>
    <div class="form-check">
        <input type="radio"  <?php echo ($data['5']=="Macerated Still Birth")?"checked":""; ?>  class="form-check-input" id="maceratedStillBirth" name="5" value="Macerated Still Birth">
        <strong class="form-check-strong" for="maceratedStillBirth">Macerated Still Birth</strong>
    </div>
    <div class="form-check">
        <input type="radio"  <?php echo ($data['5']=="Single")?"checked":""; ?>  class="form-check-input" id="single" name="5" value="Single">
        <strong class="form-check-strong" for="single">Single</strong>
    </div>
    <div class="form-check">
        <input type="radio"  <?php echo ($data['5']=="Twin / Multiple")?"checked":""; ?>  class="form-check-input" id="twinMultiple" name="5" value="Twin / Multiple">
        <strong class="form-check-strong" for="twinMultiple">Twin / Multiple</strong>
    </div>
</div>
<div class="form-group">
  <strong for="episiotomy">Episiotomy:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['6']=="No")?"checked":""; ?>  name="6" value="No"> No
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['6']=="Yes")?"checked":""; ?>  name="6" value="Yes"> Yes
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['6']=="Delayed Cord Clamping")?"checked":""; ?>  name="6" value="Delayed Cord Clamping"> Delayed Cord Clamping
    </strong>
  </div>
</div>

<div class="form-group">
  <strong for="amtsl">AMTSL Performed:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['7']=="No")?"checked":""; ?>  name="7" value="No"> No
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['7']=="Yes")?"checked":""; ?>  name="7" value="Yes"> Yes
    </strong>
  </div>
</div>

<div class="form-group">
  <strong for="uterotonic">Uterotonic administered:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['8']=="Inj.Oxytocin")?"checked":""; ?>  name="8" value="Inj.Oxytocin"> Inj.Oxytocin
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['8']=="tab Misoprostol")?"checked":""; ?>  name="8" value="tab Misoprostol"> tab Misoprostol
    </strong>
  </div>
</div>

<div class="form-group">
  <strong for="cct">CCT:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['9']=="Yes")?"checked":""; ?>  name="9" value="Yes"> Yes
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['9']=="No")?"checked":""; ?>  name="9" value="No"> No
    </strong>
  </div>
</div>

<div class="form-group">
  <strong for="10">Uterine Massage:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['10']=="Yes")?"checked":""; ?>  name="10" value="Yes"> Yes
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['10']=="No")?"checked":""; ?>  name="10" value="No"> No
    </strong>
  </div>
</div>

<div class="form-group">
  <strong for="complications">Complications, if any:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['11']=="PPH")?"checked":""; ?>  name="11" value="PPH"> PPH
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['11']=="Sepsis")?"checked":""; ?>  name="11" value="Sepsis"> Sepsis
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['11']=="PE/E")?"checked":""; ?>  name="11" value="PE/E"> PE/E
    </strong>
  </div>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['12']=="Prolonged labor")?"checked":""; ?>  name="12" value="Prolonged labor"> Prolonged labor
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['12']=="Obstructed labor")?"checked":""; ?>  name="12" value="Obstructed labor"> Obstructed labor
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['12']=="Fetal distress")?"checked":""; ?>  name="12" value="Fetal distress"> Fetal distress
    </strong>
  </div>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['13']=="Maternal death")?"checked":""; ?>  name="13" value="Maternal death"> Maternal death
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['13']=="Others")?"checked":""; ?>  name="13" value="Others"> Others (Specify)
    </strong>
  </div>
</div>

<div class="form-group">
  <strong for="ppiucd">PPIUCD Inserted:</strong>
  <div class="radio">
  <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['14']=="Yes")?"checked":""; ?>  name="14" value="Yes"> Yes
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['14']=="No")?"checked":""; ?>  name="14" value="No"> No
    </strong>
    </div>

    <h3 class="text-center m-4">Baby Notes</h3>
    <div class="form-group">
  <strong>Sex of the baby:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['15']=="Male")?"checked":""; ?>  name="15" value="Male"> Male
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['15']=="Female")?"checked":""; ?>  name="15" value="Female"> Female
    </strong>
  </div>
</div>

<div class="form-group">
  <strong>Skin-to-skin contact done:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['16']=="Yes")?"checked":""; ?>  name="16" value="Yes"> Yes
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['16']=="No")?"checked":""; ?>  name="16" value="No"> No
    </strong>
  </div>
</div>

<div class="form-group">
  <strong>Birth Weight:</strong>
  <input type="text" class="form-control" name="17" value='<?php echo $data[17];?>'>
  <span class="">in Kgs</span>
  <strong>Preterm:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['18']=="Yes")?"checked":""; ?>  name="18" value="Yes"> Yes
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['18']=="No")?"checked":""; ?>  name="18" value="No"> No
    </strong>
  </div>
</div>

<div class="form-group">
  <strong>Did the baby cry immediately after birth:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['19']=="Yes")?"checked":""; ?>  name="19" value="Yes"> Yes
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['19']=="No")?"checked":""; ?>  name="19" value="No"> No
    </strong>
  </div>
</div>

<div class="form-group">
  <strong>If yes, was it initiated in labor room:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['20']=="Yes")?"checked":""; ?>  name="20" value="Yes"> Yes
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['20']=="No")?"checked":""; ?>  name="20" value="No"> No
    </strong>
  </div>
</div>

<div class="form-group">
  <strong>Breastfeeding initiated:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['21']=="Yes")?"checked":""; ?>  name="21" value="Yes"> Yes
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['21']=="No")?"checked":""; ?>  name="21" value="No"> No
    </strong>
  </div>
</div>

<div class="form-group">
  <strong>Time of initiation:</strong>
  <input type="text" class="form-control" name="22" value='<?php echo $data[22];?>'>
</div>

<div class="form-group">
  <strong>Any congenital anomaly (Please specify):</strong>
  <input type="text" class="form-control" name="23" value='<?php echo $data[23];?>'>
</div>

<div class="form-group">
  <strong>Any other complication (Please specify):</strong>
  <input type="text" class="form-control" name="24" value='<?php echo $data[24];?>'>
</div>

<div class="form-group">
  <strong>Injection Vitamin K1 administered:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['25']=="Yes")?"checked":""; ?>  name="25" value="Yes"> Yes
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['25']=="No")?"checked":""; ?>  name="25" value="No"> No
    </strong>
  </div>
  <span class="text-muted">If yes, Dose <input type="text" class="form-control-sm" name="26" value='<?php echo $data[26];?>'></span>
</div>

<div class="form-group">
  <strong>Vaccination done:</strong>
  <div class="radio">
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['27']=="BCG")?"checked":""; ?>  name="27" value="BCG"> BCG
    </strong>
    <strong class="radio-inline">
      <input type="radio"  <?php echo ($data['27']=="Hep B")?"checked":""; ?>  name="27" value="Hep B"> Hep B
    </strong>
  </div>
</div>

<div class="form-group">
  <strong>Temperature of baby:</strong>
  <div class="radio">
    <strong class="radio-inline">
    <input type="text" class="form-control" name="28" value='<?php echo $data[28];?>'>
    </strong>
  </div>
</div>


<h3 class="text-center m-4">Identification for Baby </h3>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6" style='border:1px solid black; height:30rem;'>
      
    </div>
  </div>
</div>

<p>धन्यवाद ...!</p>

  


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>
