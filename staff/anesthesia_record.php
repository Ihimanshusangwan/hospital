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
    $asa=$_POST['asa'];
    $complaint=$_POST['complaint'];
    $history=$_POST['history'];
    $other_his=$_POST['other_his'];
    $nbm=$_POST['nbm'];
    $inve=$_POST['inve'];
    $exam=$_POST['exam'];
    $hb=$_POST['hb'];
    $pulse=$_POST['pulse'];
    $urine=$_POST['urine'];
    $bp=$_POST['bp'];
    $bsl=$_POST['bsl'];
    $cvs=$_POST['cvs'];
    $bul=$_POST['bul'];
    $rs=$_POST['rs'];
    $s=$_POST['s'];
    $other=$_POST['other'];
    $xray=$_POST['xray'];
    $consent=$_POST['consent'];
    $ecg=$_POST['ecg'];
    $fitness=$_POST['fitness'];
    $o=$_POST['o'];
    $premed=$_POST['premed'];
    $type=$_POST['type'];
    $induction=$_POST['induction'];
    $spinal=$_POST['spinal'];
    $muscle=$_POST['muscle'];
    $atlevel=$_POST['atlevel'];
    $with=$_POST['with'];
    $intu=$_POST['intu'];
    $needle=$_POST['needle'];
    $withco=$_POST['withco'];
    $agent=$_POST['agent'];
    $catheter=$_POST['catheter'];
    $withcat=$_POST['withcat'];
    $typeres=$_POST['typeres'];
    $drug=$_POST['drug'];
    $an=$_POST['an'];
    $ex=$_POST['ex'];
    $resp=$_POST['resp'];
    $postop=$_POST['postop'];
    $nb=$_POST['nb'];
    $ivf=$_POST['ivf'];
    $sign=$_POST['sign'];

    $update="UPDATE an_record SET
    asa='$asa',
    complaint='$complaint',
    history='$history',
    other_his='$other_his',
    nbm='$nbm',
    inve='$inve',
    exam='$exam',
    hb='$hb',
    pulse='$pulse',
    urine='$urine',
    bp='$bp',
    bsl='$bsl',
    cvs='$cvs',
    bul='$bul',
    rs='$rs',
    s='$s',
    other='$other',
    xray='$xray',
    consent='$consent',
    ecg='$ecg',
    fitness='$fitness',
    o='$o',
    premed='$premed',
    type='$type',
    induction='$induction',
    spinal='$spinal',
    muscle='$muscle',
    atlevel='$atlevel',
    w='$with',
    intu='$intu',
    needle='$needle',
    withco='$withco',
    agent='$agent',
    catheter='$catheter',
    withcat='$withcat',
    typeres='$typeres',
    drug='$drug',
    an='$an',
    ex='$ex',
    resp='$resp',
    postop='$postop',
    nb='$nb',
    ivf='$ivf',
    sign='$sign'
    WHERE id=$id;

    ";
$sql3=mysqli_query($conn,$update);

 }
 $sql4=mysqli_query($conn,"SELECT * FROM an_record WHERE id=$id ");
 $row4=mysqli_fetch_assoc($sql4);

   error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anesthesia Record</title>
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
        html += "<td><input type='time' name='a_" + items + "'></td>";
        html += "<td><input type='text' name='b_" + items + "'></td>";
        html += "<td><input type='text' name='c_" + items + "'></td>";
        html += "<td><input type='text' name='d_" + items + "'></td>";
        html += "<td><input type='text' name='e_" + items + "'></td>";
        html += "<td><input type='text' name='f_" + items + "'></td>";
        html += "<td><input type='text' name='g_" + items + "'></td>";
        html += "<td><input type='text' name='h_" + items + "'></td>";

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
            <h3 class=" fl text-center text-dark">Anesthesia Record</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href=".php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            
            <div class="row">
      <div class="col-md-4">
        <label class="form-label mt-2">Patient's Name : <?php echo $row['name']; ?></label>
       </div>
      <div class="col-md-4">
        <label class="form-label mt-2">UHID No : <?php echo $row2['uhid'];?></label>
        </div>
      <div class="col-md-4">
        <label class="form-label mt-2">Date : <?php echo $row2['date'];?></label>
        </div>
      
    </div>
            <form action="" method="post">
              <div class="row">
                <div class="col-9 mt-3" style="text-decoration:underline;">
                Pre-Anesthesia Status :
                </div>
              <div class="col-3">
                ASA Grade :
                <input type="text" class="form-control" name="asa" value="<?php echo $row4['asa'];?>">
              </div>
              </div>
              <div class="row">
                <div class="col-4">Complaints if any
                <textarea type="text" class="form-control" name="complaint"><?php echo $row4['complaint'];?></textarea>
                </div>
                <div class="col-4">Previous History
                <textarea type="text" class="form-control" name="history"><?php echo $row4['history'];?></textarea>
                </div>
                <div class="col-4">Other significant history
                <textarea type="text" class="form-control" name="other_his"><?php echo $row4['other_his'];?></textarea>
                </div>
                <div class="col-3">NBM status
                <input type="text" class="form-control" name="nbm" value="<?php echo $row4['nbm'];?>">
                </div>
                <div class="col-3">Investigations
                <input type="text" class="form-control" name="inve"value="<?php echo $row4['inve'];?>">
                </div>
                <div class="col-3">Examination
                <input type="text" class="form-control" name="exam"value="<?php echo $row4['exam'];?>">
                </div>
                <div class="col-3">Hb%
                <input type="text" class="form-control"  name="hb"value="<?php echo $row4['hb'];?>">
                </div>
                <div class="col-3">Pulse
                <input type="text" class="form-control" name="pulse"value="<?php echo $row4['pulse'];?>">
                </div>
                <div class="col-3">Urine
                <input type="text" class="form-control" name="urine"value="<?php echo $row4['urine'];?>">
                </div>
                <div class="col-3">BP
                <input type="text" class="form-control" name="bp"value="<?php echo $row4['bp'];?>">
                </div>
                <div class="col-3">BSL
                <input type="text" class="form-control" name="bsl"value="<?php echo $row4['bsl'];?>">
                </div>
                <div class="col-3">CVS
                <input type="text" class="form-control" name="cvs"value="<?php echo $row4['cvs'];?>">
                </div>
                <div class="col-3">BUL
                <input type="text" class="form-control" name="bul"value="<?php echo $row4['bul'];?>">
                </div>
                <div class="col-3">RS
                <input type="text" class="form-control" name="rs"value="<?php echo $row4['rs'];?>">
                </div>
                <div class="col-3">S creat
                <input type="text" class="form-control" name="s"value="<?php echo $row4['s'];?>">
                </div>
                <div class="col-3">Other
                <input type="text" class="form-control" name="other"value="<?php echo $row4['other'];?>">
                </div>
                <div class="col-3">X-ray chest
                <input type="text" class="form-control" name="xray"value="<?php echo $row4['xray'];?>">
                </div>
                <div class="col-3">Consent
                <input type="text" class="form-control" name="consent"value="<?php echo $row4['consent'];?>">
                </div>
                <div class="col-3">ECG
                <input type="text" class="form-control" name="ecg"value="<?php echo $row4['ecg'];?>">
                </div>
                <div class="col-6">Fitness
                <input type="text" class="form-control" name="fitness"value="<?php echo $row4['fitness'];?>">
                </div>
                <div class="col-6">Other
                <input type="text" class="form-control" name="o"value="<?php echo $row4['o'];?>">
                </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-3" style="text-decoration:underline;">Anaesthesia Notes :</div>
                    <div class="col-6">Premedication
                    <input type="text" class="form-control" name="premed"value="<?php echo $row4['premed'];?>">

                    </div>
                    <div class="col-6">Type of Anaesthesia
                    <input type="text" class="form-control" name="type"value="<?php echo $row4['type'];?>">

                    </div>
                </div>
                    <div class="row">
                        <div class="col-6 mt-3 mb-3" style="text-decoration:underline;">General Anaesthesia :</div>
                        <div class="col-6 mt-3 mb-3" style="text-decoration:underline;">Regional Anaesthesia :</div>
                        <div class="col-5">Induction
                        <input type="text" class="form-control" name="induction"value="<?php echo $row4['induction'];?>">
                        </div><div class="col-1"></div>
                        <div class="col-6">Spinal /Epidural Anaesthesia given
                        <input type="text" class="form-control" name="spinal"value="<?php echo $row4['spinal'];?>">
                        </div>
                        <div class="col-5">Muscle relaxant
                        <input type="text" class="form-control" name="muscle" value="<?php echo $row4['muscle'];?>">
                        </div><div class="col-1"></div>
                        <div class="col-6 mt-4"> <div class="row">
                                <div class="col-3"> At level </div>
                                <div class="col-3"> <input type="text" class="form-control" name="atlevel"value="<?php echo $row4['atlevel'];?>"></div>
                                <div class="col-2">with</div>
                                <div class="col-4"> <input type="text" class="form-control" name="with"value="<?php echo $row4['w'];?>"></div>

                            </div>
                        
                        </div>
                        <div class="col-5 ">Intubation
                        <input type="text" class="form-control" name="intu" value="<?php echo $row4['intu'];?>">
                        </div><div class="col-1"></div>
                        <div class="col-6 mt-4">  <div class="row">
                                <div class="col-3"> Needle no </div>
                                <div class="col-3"> <input type="text" class="form-control" name="needle"value="<?php echo $row4['needle'];?>"></div>
                                <div class="col-2">with</div>
                                <div class="col-4"> <input type="text" class="form-control" name="withco"value="<?php echo $row4['withco'];?>"></div>

                            </div>
                        
                        </div>
                        <div class="col-5">Anaesthetic agent
                        <input type="text" class="form-control" name="agent" value="<?php echo $row4['agent'];?>">
                        </div><div class="col-1"></div>
                        <div class="col-6 mt-4">
                            <div class="row">
                                <div class="col-3"> Catheter no </div>
                                <div class="col-3"> <input type="text" class="form-control" name="catheter"value="<?php echo $row4['catheter'];?>"></div>
                                <div class="col-2">with</div>
                                <div class="col-4"> <input type="text" class="form-control" name="withcat"value="<?php echo $row4['withcat'];?>"></div>

                            </div>
                        
                        </div>
                        <div class="col-5">Type of respiration
                        <input type="text" class="form-control" name="typeres"value="<?php echo $row4['typeres'];?>">
                        </div><div class="col-1"></div>
                        <div class="col-6">Drug
                        <input type="text" class="form-control" name="drug"value="<?php echo $row4['drug'];?>">
                        </div>
                        <div class="col-6"></div>
                        <div class="col-6">Level of anaesthesia
                        <input type="text" class="form-control" name="an"value="<?php echo $row4['an'];?>">
                        </div>

                    </div>
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
            $f = $_POST["f_$i"];
            $g = $_POST["g_$i"];
            $h = $_POST["h_$i"];



            $sql6 ="INSERT INTO anes_reco(pt_id,a, b, c, d, e, f, g, h) VALUES ($id,'$a','$b','$c','$d','$e','$f','$g','$h');";
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
    $sql6 = "DELETE FROM anes_reco WHERE id = {$_POST['scan_id']} ;";
    if ($conn->query($sql6) === TRUE) {
      echo "<div class='alert alert-success'>Deleted Successfully</div>";
    } else {
      echo "<div class='alert alert-danger'>Error Deleting</div>";
    }
  }
  ?>
  <?php
    $sql7 = "SELECT * FROM anes_reco WHERE pt_id = '$id';";
                    $row7 = $conn->query($sql7);
  
?>
<div class="row" style="overflow: auto;">
    <div class="col-12 mt-3 mb-3" style="text-decoration:underline">Intraoperative Monitering :</div>
    <table class="table table-bordered border-black text-center">
        <tr>
            <th>Time</th>
            <th>Pulse</th>
            <th>BP mm Hg</th>
            <th>SPO2</th>
            <th>IV fluids</th>
            <th>Relaxant</th>
            <th>IV Drugs</th>
            <th>Urine Output</th>
            <th>Delete</th>
        </tr>
        <tbody id="tbody">
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
                    echo '<td>' . $res['f'] . '</td>';
                    echo '<td>' . $res['g'] . '</td>';
                    echo '<td>' . $res['h'] . '</td>';


                    echo "<td><form method='POST' action=''>
                                    <input type='hidden' value={$res['id']} name='scan_id' >
                                    <button type='submit' name = 'delete' class='btn btn-primary'>Delete</button> </form>" . '</td>';
                    echo '</tr>';
                    $i++;
                    $sr++;
                }
             
                  ?>
                        </tbody>
    </table>
   
</div>
<?php
        echo '<button type="button" class=" btn btn-success " onclick="addItem();">
                Add Note
              </button>';
    ?>

                    <div class="row mt-4">
                        <div class="col-6">
                            Extubation done after adequate suction and adequate reversal at 
                            
                        </div>
                        <div class="col-6"><input type="text" class="form-control" name="ex"value="<?php echo $row4['ex'];?>">
                       </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3 mt-3" style="text-decoration:underline;">Postoperative :</div>
                        <div class="col-12">Patient is out of General Anaesthesia / Spinal Anaesthesia effect is wearing off </div>
                        <div class="col-1">Resp</div>
                        <div class="col-4"><input type="text" class="form-control" name="resp"value="<?php echo $row4['resp'];?>"></div>
                        <div class="col-4">SpO2 on air</div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-2">
                           Postop orders :
                        </div>
                        <div class="col-10"><input type="text" class="form-control" name="postop"value="<?php echo $row4['postop'];?>">
                       </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-1">
                            NBM</div>
                        <div class="col-2"><input type="text" class="form-control" name="nb"value="<?php echo $row4['nb'];?>"></div>
                       <div class="col-4">hrs. Head low / propped up position . IVF </div>
                       <div class="col-2"><input type="text" class="form-control" name="ivf"value="<?php echo $row4['ivf'];?>">
                    </div>
                       <div class="col-3">ml/hr ,W/F T , P,R ,BP ,I/O.</div>
                       
                    </div>
                    <div class="row mt-4">
                        <div class="col-8"></div>
                        <div class="col-4">Name & Sign of Anesthesiologist
                            <input type="text" class="form-control" name="sign"value="<?php echo $row4['sign'];?>">
                        </div>
                    </div>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>