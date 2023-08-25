<?php
 require("../admin/connect.php");
 $id = $_GET['id'];
 session_start();

 $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
 $row=mysqli_fetch_assoc($sql);

 $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
 $row1=mysqli_fetch_assoc($sql1);

 $sql2=mysqli_query($conn,"SELECT * FROM ortho_p_insure WHERE id = '$id';");
 $row2=mysqli_fetch_assoc($sql2);
 
 $sql = "SELECT * FROM titles WHERE id = 1;";
 $data = $conn->query($sql);
 $title = $data->fetch_assoc();
 
$x=0;
 if(isset($_POST['submit'])){
    $date_dis=$_POST['date_dis'];
    $time_dis=$_POST['time_dis'];
    $type=$_POST['type'];
    $cc=$_POST['cc'];
    $pulse=$_POST['pulse'];
    $bp=$_POST['bp'];
    $spo=$_POST['spo'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $rs=$_POST['rs'];
    $cvs=$_POST['cvs'];
    $cns=$_POST['cns'];
    $abdomen=$_POST['abdomen'];
    $treatment=$_POST['treatment'];
    $date_s=$_POST['date_s'];
    $surgery=$_POST['surgery'];
    $surgeon=$_POST['surgeon'];
    $notes=$_POST['notes'];
    $an=$_POST['an'];
    $anesthesia=$_POST['anesthesia'];
    $del_notes=$_POST['del_notes'];
    $del_dt=$_POST['del_dt'];
    $condition=$_POST['condition'];
    $diagnosis=$_POST['diagnosis'];
    $final=$_POST['final'];
    $special=$_POST['special'];
    $advice=$_POST['advice'];
    $follow=$_POST['follow'];
    $emer=$_POST['emer'];
    $sign=$_POST['sign'];
    $incharge=$_POST['incharge'];
    $sis=$_POST['sis'];
    $rmo=$_POST['rmo'];

    $update="UPDATE dis_sum SET
    date_dis='$date_dis',
    time_dis='$time_dis',
    type='$type',
    cc='$cc',
    pulse='$pulse',
    bp='$bp',
    spo='$spo',
    height='$height',
    weight='$weight',
    rs='$rs',
    cvs='$cvs',
    cns='$cns',
    abdomen='$abdomen',
    treatment='$treatment',
    date_s='$date_s',
    surgery='$surgery',
    surgeon='$surgeon',
    notes='$notes',
    an='$an',
    anesthesia='$anesthesia',
    del_notes='$del_notes',
    del_dt='$del_dt',
    co='$condition',
    diagnosis='$diagnosis',
    final='$final',
    special='$special',
    advice='$advice',
    follow='$follow',
    emer='$emer',
    sign='$sign',
    incharge='$incharge',
    sis='$sis',
    rmo='$rmo'
    WHERE id =$id;
    ";
$sql4=mysqli_query($conn,$update);
 }
 $sql5=mysqli_query($conn,"SELECT * FROM dis_sum WHERE id =$id");
 $row5=mysqli_fetch_assoc($sql5);

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discharge Summary </title>
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
    <script>
    var items = 0;

    function addItem() {
        items++;
        var html = "<tr>";
        html += "<td><input type='text' class='form-control' placeholder='Medicine Name' name='a_" + items + "'></td>";
        html += "<td><input type='text'  class='form-control' placeholder='i.e. 1 Tab' name='b_" + items + "'></td>";
        html += "<td><input type='text'  class='form-control' placeholder='i.e. 1-0-1 ' name='c_" + items + "'></td>";
        html += "<td><input type='text'  class='form-control' placeholder='i.e. After lunch' name='d_" + items + "'></td>";
        html += "<td><input type='text'  class='form-control' placeholder='i.e. 4 Days' name='e_" + items + "'></td>";
        html +=  "<td><button class='btn btn-danger' type='button' onclick='deleteRow(this);'>Delete</button></td>";
        html += "</tr>";

        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }

    function deleteRow(button) {
        button.parentElement.parentElement.children[2].children[0].value = "";
        button.parentElement.parentElement.style.display = "none";
    }
    </script>
    <title>Document</title>
</head>

<body class="m-2">
    <div class="container">
    <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <h3 class=" fl text-center text-dark">Discharge Summary  </h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href=".php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <div class="row">
            <div class="col-md-4">
        <label class="form-label mt-2">UHID No : <?php echo $row2['uhid'];?></label>
        </div>
        <div class="col-md-4">
          <label class="form-label">IPD No: <?php echo $row2['ipd'];?></label>
        </div>
      <div class="col-md-4">
        <label class="form-label mt-2">Date : <?php echo $row2['date'];?></label>
        </div>
      <div class="col-md-4">
        <label class="form-label mt-2">Patient's Name : <?php echo $row['name']; ?></label>
       </div>
       <div class="col-4">
          <label class="form-label">Age: <?php echo $row['age'];?></label>
        </div>
        <div class="col-md-4">
          <label class="form-label">Sex: <?php echo $row['sex'];?></label>
        </div>
        <div class="col-md-4">
          <label class="form-label">Mobile: <?php echo $row['mobile'];?></label>
        </div>
        <div class="col-md-4">
        <label class="form-label">Address :  <?php echo $row['address']." , ".$row['taluka']." , ".$row['district']; ?></label>
        <br>
        </div></div>
            <form action="" method="post">

            <div class="row">
                <table class="table table-bordered border-black">
                    <tr>
                        <th>Date of Admission : </th>
                        <td><?php echo $row2['date'];?></td>
                        <th>Time of Admission :</th>
                        <td><?php echo $row2['time'];?></td>
                    </tr>
                    <tr>
                        <th>Date of Discharge :</th>
                        <td><input type="date" class="form-control"name="date_dis" id="" value="<?php echo $row5['date_dis'];?>"></td>
                        <th>Time of Discharge :</th>
                        <td><input type="time"class="form-control" name="time_dis" id="" value="<?php echo $row5['time_dis'];?>"></td>

                    </tr>
                    <tr>
                        <th>Type of Discharge :</th>
                        <td><input type="text"  class="form-control"name="type" id="" value="<?php echo $row5['type'];?>"></td>
                        <th>Bed No. :</th>
                        <td><?php echo $row2['bed/room'];?></td>
                    </tr>
                </table>
            </div>
               <div class="row">
                <div class="col-12" style ="text-decoration:underline;">Admission History</div>
                <div class="col-6">Chief Complaints
                    <textarea type="text" class="form-control"name="cc" id="" ><?php echo $row5['cc'];?></textarea>
                </div>
                <div class="col-6" >General Examination :
                    <div class="row">
                        <div class="col-2">Pulse <input type="text" name="pulse" class="form-control" id="" value="<?php echo $row5['pulse'];?>"></div>
                        <div class="col-3">BP <input type="text" name="bp" class="form-control" id="" value="<?php echo $row5['bp'];?>"></div>
                        <div class="col-3">SPO2<input type="text" name="spo" class="form-control" id="" value="<?php echo $row5['spo'];?>"></div>
                        <div class="col-2">Height<input type="text" name="height" class="form-control" id="" value="<?php echo $row5['height'];?>"></div>
                        <div class="col-2">Weight<input type="text" name="weight" class="form-control" id="" value="<?php echo $row5['weight'];?>"></div>
                    </div>
                </div>
                <div class="col-6">Systematic Examination
                    <div class="row">
                        <div class="col-3">RS <input type="text" name="rs" class="form-control" id="" value="<?php echo $row5['rs'];?>"></div>
                        <div class="col-3">CVS <input type="text" name="cvs" class="form-control" id="" value="<?php echo $row5['cvs'];?>"></div>
                        <div class="col-3">CNS <input type="text" name="cns" class="form-control" id="" value="<?php echo $row5['cns'];?>"></div>
                        <div class="col-3">Per Abdomen <input type="text" name="abdomen" class="form-control" id="" value="<?php echo $row5['abdomen'];?>"></div>
                    </div>
                </div>

                <div class="col-6">Treatment Given <textarea name="treatment" id="" class="form-control"><?php echo $row5['treatment'];?></textarea></div>
                <div class="col-12">Operative Notes
                    <div class="row">
                        <div class="col-3">Date <input type="date" name="date_s" class="form-control" id="" value="<?php echo $row5['date_s'];?>"></div>
                        <div class="col-3">Surgery <input type="text" name="surgery" class="form-control" id="" value="<?php echo $row5['surgery'];?>"></div>
                        <div class="col-3">Surgeon <input type="text" name="surgeon" class="form-control" id="" value="<?php echo $row5['surgeon'];?>"></div>
                        <div class="col-3">Operative Note <textarea type="text" name="notes" class="form-control" id=""><?php echo $row5['notes'];?></textarea></div>
                        <div class="col-3">Anaesthetist <input type="text" name="an" class="form-control" id="" value="<?php echo $row5['an'];?>"></div>
                        <div class="col-3">Anesthesia <input type="text" name="anesthesia" class="form-control" id="" value="<?php echo $row5['anesthesia'];?>"></div>
                        <div class="col-3">Delivery Note <input type="text" name="del_notes" class="form-control" id="" value="<?php echo $row5['del_notes'];?>"></div>
                        <div class="col-3">Delivery Date & Time <input type="datetime"class="form-control" name="del_dt" id="" value="<?php echo $row5['del_dt'];?>"></div>
                    </div>
                </div>
                <div class="col-3">Condition On Discharge <textarea name="condition" id="" class="form-control"><?php echo $row5['co'];?></textarea></div>
                <div class="col-3">Provisional Diagnosis<textarea name="diagnosis" id="" class="form-control"> <?php echo $row5['diagnosis'];?></textarea></div>
               <div class="col-3">Final Diagnosis<textarea name="final" id="" class="form-control"><?php echo $row5['final'];?></textarea></div>
                <div class="col-3">Special Instructions<textarea name="special" id="" class="form-control"> <?php echo $row5['special'];?></textarea></div>
            <?php
 if (isset($_REQUEST['submit'])) {
    $i = 1;
    while (isset($_POST["a_$i"])) {
        if ($_POST["a_$i"] !== "") {
            $a=$_POST["a_$i"] ;
            $b = $_POST["b_$i"];
            $c = $_POST["c_$i"];
            $d = $_POST["d_$i"];
            $e = $_POST["e_$i"];

            $sql6 ="INSERT INTO discharge_sum(pt_id,a, b, c, d, e) VALUES ($id,'$a','$b','$c','$d','$e');";
           if ($conn->query($sql6) === TRUE) {
             $i++;
           } else {
             echo "<div class='alert alert-danger'>Error Updating </div>";
           }
 
         } else {
           $i++;
         }
    }
}

if (isset($_REQUEST['delete'])) {
    $sql6 = "DELETE FROM discharge_sum WHERE id = {$_POST['scan_id']} ;";
    if ($conn->query($sql6) === TRUE) {
      echo "<div class='alert alert-success'>Deleted Successfully</div>";
    } else {
      echo "<div class='alert alert-danger'>Error Deleting</div>";
    }
  }
  ?>
  <?php
    $sql7 = "SELECT * FROM discharge_sum WHERE pt_id = '$id';";
                    $row7 = $conn->query($sql7);
  
?>
                <div class="col-12"style="overflow:auto;">
                Medicine on Discharge
                <table class="table table-bordered border-black" >
                        <tr>
                            <th>Medicine</th>
                            <th>Tablet</th>
                            <th>Dosage</th>
                            <th>Timing</th>
                            <th>Days</th>
                            <th>Delete</th>
                        </tr>
                        <tr><tbody id="tbody">
                            <?php
                  $i = 1;
                  $sr = 1;
                  while ($res = $row7->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $res['a'] . '</td>';
                    echo '<td>' . $res['b'] . '</td>';
                    echo '<td>' . $res['c'] . '</td>';
                    echo '<td>' . $res['d'] . '</td>';
                    echo '<td>' . $res['e'] . '</td>';
                    echo "<td><form method='POST' action=''>
                                    <input type='hidden' value={$res['id']} name='scan_id' >
                                    <button type='submit' name = 'delete' class='btn btn-primary'>Delete</button> </form>" . '</td>';
                    echo '</tr>';
                    $i++;
                    $sr++;
                }
                  ?>
                        </tbody>
                        </tr>
                </table><?php
        echo '<button type="button" class=" btn btn-success " onclick="addItem();">
                Add Note
              </button>';
    ?>
            </div>

            <div class="col-3">Advice <textarea name="advice" id="" class="form-control"> <?php echo $row5['advice'];?></textarea></div>
            <div class="col-3">Follow Up date <input type="date" name="follow" class="form-control" id="" value="<?php echo $row5['follow'];?>"></div>
            <div class="col-3">Emergency Contact No. <input type="text" name="emer" class="form-control" id="" value="<?php echo $row5['emer'];?>"></div>
            <div class="col-3">Patient / Relatives Sign <input type="text" name="sign" class="form-control" id="" value="<?php echo $row5['sign'];?>"></div>
            <div class="col-4">Consultant Incharge <input type="text" name="incharge" class="form-control" id="" value="<?php echo $row5['incharge'];?>"></div>
            <div class="col-4">Sister <input type="text" name="sis" class="form-control" id="" value="<?php echo $row5['sis'];?>"></div>
            <div class="col-4">R.M.O.<input type="text" name="rmo" class="form-control" id="" value="<?php echo $row5['rmo'];?>"></div>
            </div>


             <br>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>