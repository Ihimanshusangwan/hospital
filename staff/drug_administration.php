<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res0 = $data->fetch_assoc();

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
            $signature=$_POST['signature'];
            $table_time=array();
            $table_date=array();
            $dosage=array();
            $drug_name=array();
            $frequency=array();
            $table_sign=array();
            for ($tab = 0; $tab < 4; $tab++) {
                for ($i = 0; $i < 8; $i++){
                    $element=$_POST['time'.($tab*8 +$i)];
                    array_push($table_time, $element);
                }  
            }
             for ($tab = 0; $tab < 4; $tab++) {
                for ($i = 0; $i < 8; $i++){
                    $element=$_POST['date'.($tab*8 +$i)];
                    array_push($table_date, $element);
                }  
            }
           
             for ($tab = 0; $tab < 4; $tab++) {
                for ($i = 0; $i < 8; $i++){
                    $element=$_POST['drugName'.($tab*8 +$i)];
                    array_push($drug_name, $element);
                }  
            }
             for ($tab = 0; $tab < 4; $tab++) {
                for ($i = 0; $i < 8; $i++){
                    $element=$_POST['dosage'.($tab*8 +$i)];
                    array_push($dosage, $element);
                }  
            }
           
             for ($tab = 0; $tab < 4; $tab++) {
                for ($i = 0; $i < 8; $i++){
                    $element=$_POST['frequency'.($tab*8 +$i)];
                    array_push($frequency, $element);
                }  
            }
            for ($tab = 0; $tab < 4; $tab++) {
                for ($i = 0; $i < 8; $i++){
                    $element=$_POST['sign'.($tab*8 +$i)];
                    array_push($table_sign, $element);
                }  
            }
            //encode this array into json
            $date_json = json_encode($table_date);
            $time_json = json_encode($table_time);
            $sign_json = json_encode($table_sign);
            $dosage_json = json_encode($dosage);
            $frequency_json= json_encode($frequency);
            $drug_name_json= json_encode($drug_name);


        $sql = "UPDATE `drug_administration` SET `table_time`='$time_json',`table_date`='$date_json ',
        `drug_name`='$drug_name_json',`frequency`='$frequency_json',`table_sign`='$sign_json' ,`dosage`='$dosage_json' ,`signature`=' $signature' WHERE `id`=$id ";
        $data = $conn->query($sql);
        if ($data) {
            echo "<div class='alert alert-success'> Updated Successfully</div>";
        }
        
        }
            
$check = "SELECT * FROM `drug_administration` WHERE  `id`=$id";
$query_result = $conn->query($check);
$res = $query_result->fetch_assoc();
if ($res) {
    $signature_pre=$res['signature'];
    $table_date_decode = $res['table_date'];
    $table_time_decode = $res['table_time'];
    $dosage_decode = $res['dosage'];
    $drug_name_decode = $res['drug_name'];
    $frequency_decode = $res['frequency'];
    $table_sign_decode = $res['table_sign'];
    $dateValue_norm = json_decode($table_date_decode, true);
    $timeValue_norm = json_decode($table_time_decode, true);
    $dosage_norm = json_decode($dosage_decode, true);
    $drugName_norm = json_decode($drug_name_decode, true);
    $frequency_norm = json_decode($frequency_decode, true);
    $table_sign_norm = json_decode($table_sign_decode, true);

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Drug Administration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
         .scroll {
        width: 100%;
        overflow: auto;
        white-space: nowrap;
    }

    body {
    background: lightgray;
    animation: fade-in 1s linear;
}

.fl {
    animation: gelatine 1s;
}
th tr td{
    background-color:lightgray
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
input[type="date"] {
    outline: none !important;
    border-color: #C0C0C0;
    box-shadow: 5px 5px 5px 5px #C0C0C0;
    animation: gelatine 1s;
    margin: 2px;

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
    <form method="POST">
        <div class="container shadow-lg rounded">
            <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>

            <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
            <a href="drug_administration_print.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Print</a>
            <h3 class="text-center text-dark mt-3">Drug Administration</h3>
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
                        <?php   $d = date("d-m-Y", strtotime($res2['date'])); echo $d;?></label>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="time_ad">Time of Admission : <?php echo $res2['time'];?></label>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Name:
                        <?php echo $res0['name']; ?>
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Age:
                        <?php echo $res0['age']; ?>
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Sex:
                        <?php echo $res0['sex']; ?>
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
                    <label class="form-label">Consultant: <?php echo $res0['consultant'];?></label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Diagnosis: <?php echo $res1['diagnosis'];?></label>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Bed Number: <?php echo $res2['bed/room'];?></label>
                </div>
            </div>
       
            <?php
 for ($tab = 0; $tab < 4; $tab++) {
   
    echo '<div class="scroll container" >';
    echo '<table ><h6 class="text-center">Drug details:</h6>';
    
    echo '<tr><th>Time</th>';

    for ($i = 0; $i < 8; $i++) {
        $timeValue = isset($timeValue_norm[$tab*8+$i]) ? $timeValue_norm[$tab*8+$i] : ''; 
        echo '<th><input type="time" class="form-control" name="time' . ($tab*8 + $i) . '" id="time' . ($tab*8 + $i) . '" value="' . $timeValue . '"></th>';
    }
    
    echo '</tr>';
    echo '<tr><th>date</th>';
    
    for ($i = 0; $i < 8; $i++) {
        $dateValue = isset($dateValue_norm[$tab*8+$i]) ? $dateValue_norm[$tab*8+$i] : ''; 
        echo '<th><input type="date" class="form-control" name="date' . ($tab*8 + $i) . '" id="date' . ($tab*8 + $i) . '" value="' . $dateValue . '"></th>';
    }
    
    echo '</tr>';
    echo '<tr><th>Name of Drug</th>';
    
    for ($i = 0; $i < 8; $i++) {
        $drugNameValue = isset($drugName_norm[$tab*8+$i]) ? $drugName_norm[$tab*8+$i] : ''; 
        echo '<th><input type="text" class="form-control" name="drugName' . ($tab*8 + $i) . '" id="drugName' . ($tab*8 + $i) . '" value="' . $drugNameValue . '"></th>';
    }
    
    echo '</tr>';
    echo '<tr><th>Dosage</th>';
    for ($i = 0; $i < 8; $i++) {
        $dosageValue = isset($dosage_norm[$tab*8+$i]) ? $dosage_norm[$tab*8+$i] : ''; // Check if the value is set, otherwise assign an empty string
        echo '<th><input type="text" class="form-control" name="dosage' . ($tab*8 + $i) . '" id="dosage' . ($tab*8 + $i) . '" value="' . $dosageValue . '"></th>';
    }
    
    echo '</tr>';
    echo '<tr><th>Frequency</th>';

    for ($i = 0; $i < 8; $i++) {
        $frequencyValue = isset($frequency_norm[$tab*8+$i]) ? $frequency_norm[$tab*8+$i] : ''; // Check if the value is set, otherwise assign an empty string
        echo '<th><input type="text" class="form-control" name="frequency' . ($tab*8 + $i) . '" id="frequency' . ($tab*8 + $i) . '" value="' . $frequencyValue . '"></th>';
    }
    
    echo '</tr>';
    echo '<tr><th>Sign</th>';
    
    for ($i = 0; $i < 8; $i++) {
        $tableSignValue = isset($table_sign_norm[$tab*8+$i]) ? $table_sign_norm[$tab*8+$i] : ''; // Check if the value is set, otherwise assign an empty string
        echo '<th><input type="text" class="form-control" name="sign' . ($tab*8 + $i) . '" id="table_sign' . ($tab*8 + $i) . '" value="' . $tableSignValue . '"></th>';
    }
    
    echo '</tr>';
  
    echo '</table>';
    echo ' </div>';
    
}       
  ?>
 
            <div class="col-4 my-3 ">
                <label for="signature" class="form-label">Sign:</label>
                <input type="text" class="form-control" value="<?php echo $signature_pre;  ?>" name="signature">
            </div>
            <button class="btn btn-success m-3" name="submit">Submit</button>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>