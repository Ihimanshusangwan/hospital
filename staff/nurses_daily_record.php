<?php

$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res = $data->fetch_assoc();

  $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
  $data1 = $conn->query($sql1);
  $res1 = $data1->fetch_assoc();

  $sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res2 = $data2->fetch_assoc();

  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  

  if(isset($_POST['submit'])){
    $aller=$_POST['allergy'];
    $special=$_POST['special_care'];
    $time1=array();
    $date1=array();
    $nursing_note1=array();
    $name1=array();
    $signature1=array();
    $remarks1=array();
    for($i=0;$i<25;$i++){
        $element=$_POST['time'.($i)];
        array_push($time1, $element);
    }
    for($i=0;$i<25;$i++){
        $element=$_POST['date'.($i)];
        array_push($date1, $element);
    }
    for($i=0;$i<25;$i++){
        $element=$_POST['nursing_note'.($i)];
        array_push($nursing_note1, $element);
    }
    for($i=0;$i<25;$i++){
        $element=$_POST['name'.($i)];
        array_push( $name1, $element);
    }
    for($i=0;$i<25;$i++){
        $element=$_POST['signature'.($i)];
        array_push($signature1, $element);
    }
    for($i=0;$i<25;$i++){
        $element=$_POST['remarks'.($i)];
        array_push($remarks1, $element);
    }
            $date_json = json_encode($date1);
            $time_json = json_encode($time1);
            $sign_json = json_encode($signature1);
            $nursing_note_json = json_encode($nursing_note1);
            $remarks_json= json_encode($remarks1);
            $name_json= json_encode($name1);

           $query="UPDATE `nurses_daily_record` SET `date`='$date_json',`time`='$time_json',
           `nursing_note`='$nursing_note_json',`name`='$name_json',`signature`='$sign_json',`remarks`='$remarks_json',
           `allergy`='$aller',`special_care`='$special' WHERE `id`='$id'";
           $data = $conn->query($query);
           if ($data) {
            echo "<div class='alert alert-success'> Updated Successfully</div>";
           }
           
        }

           $fet="SELECT * FROM `nurses_daily_record` WHERE `id`='$id'";
           $query_result = $conn->query($fet);
           $result = $query_result->fetch_assoc();
            if ($query_result->num_rows > 0) {
                $all = isset($result['allergy']) ? $result['allergy'] : '';
                $care = isset($result['special_care']) ? $result['special_care'] : '';
                $date_decode = $result['date'];
                $time_decode = $result['time'];
                $nursing_note_decode = $result['nursing_note'];
                $name_decode = $result['name'];
                $signature_decode = $result['signature'];
                $remarks_decode = $result['remarks'];


            $dateValue_norm = json_decode($date_decode, true);
            $timeValue_norm = json_decode($time_decode, true);
            $nursing_note_norm = json_decode($nursing_note_decode, true);
            $name_norm = json_decode($name_decode, true);
            $signature_norm = json_decode($signature_decode, true);
            $remarks_norm = json_decode($remarks_decode, true);

            }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurses Daily record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style>
    body {
        background: lightgray;
        animation: fade-in 1s linear;
        width: 100% !important;
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

    input {
        background-colour: lightgrey;

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
        border: 2px solid black;
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
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-danger mt-3"><?php echo $title['so']?></h1>
        <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
        <a href="nurse_daily_record_print.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Print</a>
        <h3 class="text-center text-dark mt-3">Nurse Daily Record</h3>
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">UHID No: <?php echo $res2['uhid'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">IPD No: <?php echo $res2['ipd'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Date of Admission : <?php echo $res2['date'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="time_ad">Time of Admission : <?php echo $res2['time'];?></label>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Name: <?php echo $res['name'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Age: <?php echo $res['age'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Sex: <?php echo $res['sex'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">ICU/Ward Room No: <?php echo $res2['ward/icu'];?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">Consultant: <?php echo $res['consultant'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Diagnosis: <?php echo $res1['diagnosis'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Bed Number: <?php echo $res2['bed/room'];?></label>
            </div>
        </div>
    </div>
    <hr>
    <form method="POST" class="container">
        <div class="row">
            <div class="col-md-3 ">
                <label for="allergy">ALLERGY</label>
                <textarea type="text" name="allergy" class="form-control"> <?php echo (!empty($all) ? $all : '') ?> </textarea>
            </div>
            <div class="col-md-3">
                <label for="special_care">SPECIAL CARE:</label>
                <textarea type="text" name="special_care" class="form-control"><?php echo (!empty($care) ? $care : '')  ?></textarea>
            </div>
        </div>
        <hr>
        <div>
            <table class="table">
                <thead class="bg-secondary">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col" class="text-center" style="width: 420px;">Nursing Note</th>
                        <th scope="col">Name</th>
                        <th scope="col">Signature</th>
                        <th scope="col">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            for ($i = 0; $i < 25; $i++) {
                                echo '<tr>
                                <td scope="col"><input type="date" class="form-control"  name="date' . $i . '" id="date' . $i . '" value="' . ($dateValue_norm[$i] ?? '') . '"></td>
                                <td scope="col"><input type="time"  class="form-control" name="time' . $i . '" id="time' . $i . '" value="' . ($timeValue_norm[$i] ?? '') . '"></td>
                                <td scope="col"><input type="text"  class="form-control" style="width: 420px;" name="nursing_note' . $i . '" id="nursing_note' . $i . '" value="' . ($nursing_note_norm[$i] ?? '') . '"></td>
                                <td scope="col"><input type="text"  class="form-control" name="name' . $i . '" id="name' . $i . '" value="' . ($name_norm[$i] ?? '') . '"></td>
                                <td scope="col"><input type="text"  class="form-control" name="signature' . $i . '" id="signature' . $i . '" value="' . ($signature_norm[$i] ?? '') . '"></td>
                                <td scope="col"><input type="text"  class="form-control" name="remarks' . $i . '" id="remarks' . $i . '" value="' . ($remarks_norm[$i] ?? '') . '"></td>
                            </tr>';
                            }
                            ?>
                </tbody>
            </table>
            <button class="btn btn-primary m-3" name="submit">Submit</button>
    </form>
</body>

</html>