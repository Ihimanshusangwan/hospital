<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res0 = $data->fetch_assoc();

  $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
  $data1 = $conn->query($sql1);
  $res1 = $data1->fetch_assoc();

  $sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res2 = $data2->fetch_assoc();
  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

  if(isset($_POST['submit'])){
    $sign=$_POST['sign'];
    $checklist=array();
    for($i=0;$i<30;$i++){
        $element = isset($_POST['check'.$i]) ? $_POST['check'.$i] : '';
        array_push($checklist,$element);
    }

    $check_json=json_encode($checklist);
      $query="UPDATE `preoperative_checklist` SET `check_box`='$check_json',`sign`='$sign' WHERE `id`='$id'";
      $data=$conn->query($query);
      if($data){
        echo "<script>alert('data update sucessfully')</script>";
      }
    }
    $check="SELECT * FROM `preoperative_checklist` WHERE `id`='$id'";
    $query_result=$conn->query($check);
    $res = $query_result->fetch_assoc();
    if($res){
        $ch_json=$res['check_box'];
        $sign=$res['sign'];
        $check_value=json_decode($ch_json,true);
    }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Pre Operative Checklist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
    .scroll {
        width: 100%;
        overflow: auto;
        white-space: nowrap;
    }
    input{
        width:50px;
    }

    body {
        background: lightgray;
        animation: fade-in 1s linear;
    }

    .fl {
        animation: gelatine 1s;
    }

    th tr td {
        background-color: lightgray
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
    
        <div class="container shadow-lg rounded">
            <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>

            <a href="eye_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
            <h3 class="text-center text-dark mt-3">Pre Operative Checklist</h3>
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
            <hr>

            <?php
                $arr=array(
                    '1.	General Consent Obtained',
                    '2.	Surgery Procedural Consent Obtained',
                    ' 3.	Anesthesia Consent Obtained',
                      ' 4.	Specific Consent (If Applicable)',
                        ' 5.	Prepared The Area For Operation',
                        ' 6.	Prepared The Patient For Spinal,EpiduralEtc, If Applicable',
                        '7.	Removed Jewellary D	Dentures D	Spectacles I Contact Lenses D Nails Cut o	Nail Polish & Make Up o	Hair Pins I Clips o',
                        '8.	Reports Of Lab,X Ray,ECG, Scan Etc Collected & Attached To File',
                        '9.	Pre Medication Given & Charted',
                        '10.	Pre Operative Antibiotics Given.Test Done D	Full Dose D',
                         '11.	H. S. Medications Given',
                      '12.	VitalSigns Checked',
                      '13.	I. V. Lines Secured',
                      '14.	Bladder Emptied D   I Catheterization Done With nme o',
                      '15.	Mouth Wash D  I Gargle Given D',
                       '16.	Bath Given',
                       '17.	Enema I Bowel Wash Given (If Indicated)',
                       '18.	Ryles Tube Passed (If Asked)',
                        '19.	Patient Theater Dress Given',
                        '20.	Blood Arranged,Consent Taken - Mention No.Of Units?',
                         '21.	Materials,Drugs, Equipment Sent With The Patient',
                         '22.	The Patient Is Shifted T OT At -'

                )
                ?>
            <form method="POST">
    <table style="margin-left:200px;">
        <thead>
            <tr>
                <th class="col">If yes mark ✔</th>
                <td class="col"></td>
            </tr>
        </thead>
        <tbody>
            <?php
              $checkboxValues = array_fill(0, 30, 0); 
              if ($check_value) {
                for ($i = 0; $i < 30; $i++) {
                    if (isset($check_value[$i]) && $check_value[$i] == 'on') {
                        $checkboxValues[$i] = 1;
                    }
                }
            }
            for ($i = 0; $i < 22; $i++) {
                echo '<tr>';
                if ($i == 6) {
                    echo '<td scope="row" >
                            <label for="">7. Removed Jewellary </label>
                            <input type="checkbox" name="check'.$i.'"  ' . ($checkboxValues[$i] == 1 ? 'checked' : '') . '>
                            <label for="">Dentures</label>
                            <input type="checkbox" name="check'.($i+16).'" ' . ($checkboxValues[$i+16] == 1 ? 'checked' : '') . '>
                            <label for=""> Spectacles /Contact Lenses</label>
                            <input type="checkbox" name="check'.($i+17).'" ' . ($checkboxValues[$i+17] == 1 ? 'checked' : '') . '>
                            <label for=""> Nails Cut</label>
                            <input type="checkbox" name="check'.($i+18).'" ' . ($checkboxValues[$i+18] == 1 ? 'checked' : '') . '>
                            <label for="" style="margin-left:18px;">   Nail Polish & Make Up</label>
                            <input type="checkbox" name="check'.($i+19).'" ' . ($checkboxValues[$i+19] == 1 ? 'checked' : '') . '>
                            <label for="">   Hair Pins /Clips</label>
                            <input type="checkbox" name="check'.($i+20).'" ' . ($checkboxValues[$i+20] == 1 ? 'checked' : '') . '>
                          </td>';
                } else if ($i == 9) {
                    echo '<td scope="row" >
                            <label for="">10.Pre Operative Antibiotics Given. </label>
                            <input type="checkbox">
                            <label for="">Test Done</label>
                            <input type="checkbox" name="check.'.($i+18).'" ' . ($checkboxValues[$i+18] == 1 ? 'checked' : '') . '>
                            <label for=""> Full Dose </label>
                          </td>';
                } else if ($i == 13) {
                    echo '<td scope="row">
                            <label for="">14.Bladder Emptied</label>
                            <input type="checkbox">
                            <label for="">Catheterization Done With time</label>
                            <input type="checkbox" name="check'.($i+15).'"  ' . ($checkboxValues[$i+15] == 1 ? 'checked' : '') . '>
                          </td>';
                } else if ($i == 14) {
                    echo '<td scope="row">
                            <label for="">15.Mouth Wash</label>
                            <input type="checkbox" name="check.'.$i.'">
                            <label for="">Gargle Given</label>
                            <input type="checkbox" name="check.'.($i+15).'"  ' . ($checkboxValues[$i+15] == 1 ? 'checked' : '') . '>
                          </td>';
                } else {
                    echo '<td scope="row">' . $arr[$i] . '</td>
                          <td><input type="checkbox" name="check'.$i.'"  ' . ($checkboxValues[$i] == 1 ? 'checked' : '') . ' ></td>';
                }
                echo '</tr>';
            }
            ?>
                </table>
            <div class="text-center" style="margin-bottam:10px">
                <label for="signature">Sign:</label>
                <input type="text" class="form-control " name="sign" style="width: 150px; margin:auto" value="<?php echo $sign ?>" >
            </div>
            <div style="margin:20px">
            <button class=" d-flex m-auto" name="submit" >Submit</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>