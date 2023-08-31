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
    $t=$_POST['t'];
    $bp=$_POST['bp'];
    $p=$_POST['p'];
    $r=$_POST['r'];
    $osat=$_POST['osat'];
    $fbs=$_POST['fbs'];
    $a=$_POST['a'];
    $wbc=$_POST['wbc'];
    $hct=$_POST['hct'];
    $pits=$_POST['pits'];
    $na=$_POST['na'];
    $cl=$_POST['cl'];
    $glucose=$_POST['glucose'];
    $bun=$_POST['bun'];
    $k=$_POST['k'];
    $co=$_POST['co'];
    $cr=$_POST['cr'];
    $inr=$_POST['inr'];
    $pt=$_POST['pt'];
    $ptt=$_POST['ptt'];
    $upt=isset($_POST['uptRadio'])?$_POST['uptRadio']:'';
    $date=$_POST['date'];
    $lft=$_POST['lft'];
    $ca=$_POST['ca'];
    $cxr=$_POST['cxr'];
    $date2=$_POST['date2'];
    $ecg=$_POST['ecg'];
    $date3=$_POST['date3'];
    $echo=$_POST['echo'];
    $date4=$_POST['date4'];
    $stress=$_POST['stress'];
    $date5=$_POST['date5'];
    $sign=$_POST['sign'];
    $nbm=isset($_POST['nbmRadio'])?$_POST['nbmRadio']:'';
    $ad=isset($_POST['adRadio'])?($_POST['adRadio']):'';
    $consent=isset($_POST['consentRadio'])?$_POST['consentRadio']:'';
    $risk=isset($_POST['riskRadio'])?$_POST['riskRadio']:'';
    $hp=isset($_POST['hpRadio'])?$_POST['hpRadio']:'';
    $I=$_POST['I'];
    $II=$_POST['II'];
    $III=$_POST['III'];
    $IV=$_POST['IV'];
    $caps=isset($_POST['caps'])?$_POST['caps']:'';
    $overbite=isset($_POST['overbite'])?$_POST['overbite']:'';
    $loose=isset($_POST['loose'])?$_POST['loose']:'';
    $rom=isset($_POST['romRadio'])?$_POST['romRadio']:'';
    $lungs=$_POST['lungs'];
    $heart=$_POST['heart'];
    $asa=$_POST['asa'];
    $plan=$_POST['plan'];
    $ga=isset($_POST['ga'])?$_POST['ga']:'';
    $regional=isset($_POST['regional'])?$_POST['regional']:'';
    $spinal=isset($_POST['spinal'])?$_POST['spinal']:'';
    $sed=isset($_POST['sed'])?$_POST['sed']:'';

    $update="UPDATE im_reval SET 
    t = '$t',
    bp = '$bp',
    p = '$p',
    r = '$r',
    osat = '$osat',
    fbs = '$fbs',
    a = '$a',
    wbc = '$wbc',
    hct = '$hct',
    pits = '$pits',
    na = '$na',
    cl = '$cl',
    glucose = '$glucose',
    bun = '$bun',
    k = '$k',
    co = '$co',
    cr = '$cr',
    inr = '$inr',
    pt = '$pt',
    ptt = '$ptt',
    upt = '$upt',
    date = '$date',
    lft = '$lft',
    ca = '$ca',
    cxr = '$cxr',
    date2 = '$date2',
    ecg = '$ecg',
    date3 = '$date3',
    echo = '$echo',
    date4 = '$date4',
    stress = '$stress',
    date5 = '$date5',
    sign = '$sign',
    nbm = '$nbm',
    ad = '$ad',
    consent = '$consent',
    risk = '$risk',
    hp = '$hp',
    I = '$I',
    II = '$II',
    III = '$III',
    IV = '$IV',
    caps = '$caps',
    overbite = '$overbite',
    loose = '$loose',
    rom = '$rom',
    lungs = '$lungs',
    heart = '$heart',
    asa = '$asa',
    ga= '$ga',
    regional='$regional',
    spinal='$spinal',
    sed='$sed',
    plan='$plan'
    WHERE id=$id;
    ";
$sql3=mysqli_query($conn,$update);

 }
 $sql5=mysqli_query($conn,"SELECT * FROM im_reval WHERE id=$id");
 $row5=mysqli_fetch_assoc($sql5);
error_reporting(0);
   
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

    <title>Document</title>
</head>

<body class="m-2">
    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class=" fl text-center text-dark">Immediate Pre-Operative Re-Evaluation Form </h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>

    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="imm_reval_print.php?id=<?php echo $id; ?>" class=" btn btn-success" id="dashboard">Print</a>

            <form action="" method="post">

                <div class="row mt-3">
                    <div class="col-6 border border-black">
                        <div class="row">
                            <div class="col-6">Name :<input type="text" class="form-control" name="" id="" readonly
                                    value="<?php echo $row['name'];?>"> </div>
                            <div class="col-6">UHID :<input type="text" class="form-control" name="" readonly
                                    value="<?php echo $row2['uhid'];?>" id=""></div>
                            <div class="col-4">T :<input type="text" class="form-control" name="t" id=""
                                    value="<?php echo $row5['t'];?>"></div>
                            <div class="col-4">BP :<input type="text" class="form-control" name="bp" id=""
                                    value="<?php echo $row5['bp'];?>"></div>
                            <div class="col-4">P :<input type="text" class="form-control" name="p" id=""
                                    value="<?php echo $row5['p'];?>"></div>
                            <div class="col-3">R :<input type="text" class="form-control" name="r" id=""
                                    value="<?php echo $row5['r'];?>"></div>
                            <div class="col-3">O2 Sat :<input type="text" class="form-control" name="osat" id=""
                                    value="<?php echo $row5['osat'];?>"></div>
                            <div class="col-3">FBS :<input type="text" class="form-control" name="fbs" id=""
                                    value="<?php echo $row5['fbs'];?>"></div>
                            <div class="col-3">@ :<input type="text" class="form-control" name="a" id=""
                                    value="<?php echo $row5['a'];?>"></div>
                            <table class="mt-3 mb-3 table table-bordered border-black">
                                <tr>
                                    <th>WBC</th>
                                    <th>Hct</th>
                                    <th>Pits</th>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="wbc" id=""
                                            value="<?php echo $row5['wbc'];?>"></td>
                                    <td><input type="text" class="form-control" name="hct" id=""
                                            value="<?php echo $row5['hct'];?>"></td>
                                    <td><input type="text" class="form-control" name="pits" id=""
                                            value="<?php echo $row5['pits'];?>"></td>
                                </tr>
                            </table>
                            <table class=" mb-3 table table-bordered border-black">
                                <tr>
                                    <th>Na</th>
                                    <th>Cl</th>
                                    <th>Glucose</th>
                                    <th>BUN</th>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="na" id=""
                                            value="<?php echo $row5['na'];?>"></td>
                                    <td><input type="text" class="form-control" name="cl" id=""
                                            value="<?php echo $row5['cl'];?>"></td>
                                    <td><input type="text" class="form-control" name="glucose" id=""
                                            value="<?php echo $row5['glucose'];?>"></td>
                                    <td><input type="text" class="form-control" name="bun" id=""
                                            value="<?php echo $row5['bun'];?>"></td>
                                </tr>
                            </table>
                            <table class=" mb-3 table table-bordered border-black">
                                <tr>
                                    <th>K</th>
                                    <th>CO2</th>
                                    <th>Cr</th>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="k" id=""
                                            value="<?php echo $row5['k'];?>"></td>
                                    <td><input type="text" class="form-control" name="co" id=""
                                            value="<?php echo $row5['co'];?>"></td>
                                    <td><input type="text" class="form-control" name="cr" id=""
                                            value="<?php echo $row5['cr'];?>"></td>

                                </tr>
                            </table>
                            <table class=" mb-3 table table-bordered border-black">
                                <tr>
                                    <th>INR</th>
                                    <th>PT</th>
                                    <th>PTT</th>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="inr" id=""
                                            value="<?php echo $row5['inr'];?>"></td>
                                    <td><input type="text" class="form-control" name="pt" id=""
                                            value="<?php echo $row5['pt'];?>"></td>
                                    <td><input type="text" class="form-control" name="ptt" id=""
                                            value="<?php echo $row5['ptt'];?>"></td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <div class="col-6 border border-black">
                        <div class="row ">
                            <div class="d-flex flex-row">
                                <div class="col-2">UPT/SPT:</div>
                                <div class="col-2">
                                    <input type="radio" name="uptRadio" id="uptNeg" value="Neg"
                                        <?php if($row5['upt']=="Neg"){ echo 'checked'; }?>>
                                    <label for="uptNeg">Neg</label>
                                </div>
                                <div class="col-2">
                                    <input type="radio" name="uptRadio" id="uptPos" value="Pos"
                                        <?php if($row5['upt']=="Pos"){ echo 'checked'; }?>>
                                    <label for="uptPos">Pos</label>
                                </div>
                                <div class="col-4">Date <input type="date" class="form-control" name="date" id=""
                                        value="<?php echo $row5['date'];?>"></div>
                            </div>

                            <div class="col-6">LFT's :<input type="text" class="form-control" name="lft" id=""
                                    value="<?php echo $row5['lft'];?>"></div>
                            <div class="col-6">Ca :<input type="text" class="form-control" name="ca" id=""
                                    value="<?php echo $row5['ca'];?>"></div>
                            <div class="col-6">CXR :<textarea type="text" class="form-control" name="cxr"
                                    id=""><?php echo $row5['cxr'];?></textarea></div>
                            <div class="col-6">Date :<input type="date" class="form-control" name="date2" id=""
                                    value="<?php echo $row5['date2'];?>"></div>
                            <div class="col-6">ECG :<textarea type="text" class="form-control" name="ecg"
                                    id=""><?php echo $row5['ecg'];?></textarea></div>
                            <div class="col-6">Date :<input type="date" class="form-control" name="date3" id=""
                                    value="<?php echo $row5['date3'];?>"></div>
                            <div class="col-6">Echo :<textarea type="text" class="form-control" name="echo"
                                     id=""><?php echo $row5['echo'];?></textarea></div>
                            <div class="col-6">Date :<input type="date" class="form-control" name="date4"
                                    value="<?php echo $row5['date4'];?>" id=""></div>
                            <div class="col-6">Stress Test :<textarea type="text" class="form-control" name="stress"
                                    id=""><?php echo $row5['stress'];?></textarea></div>
                            <div class="col-6">Date :<input type="date" class="form-control" name="date5"
                                    value="<?php echo $row5['date5'];?>" id=""></div>
                            <div class="col-6"></div>
                            <div class="col-6">Signature Nurse :<input type="text" class="form-control"
                                    value="<?php echo $row5['sign'];?>" name="sign" id=""></div>

                        </div>
                    </div>
                </div>
                <div class="row border border-black ">
                    <div class="col-12 p-2 text-center"><strong>Physician Only</strong></div>
                    <div class="col-6 border border-black">
                        <div class="row">
                            <div class="col-12">
                                <ol>
                                    <li class="mt-2">NBM , status reaffirmed
                                        <input type="radio" name="nbmRadio" id="" value="Yes" <?php if($row5['nbm']=="Yes"){
                            echo 'checked';
                        }?>>
                                        <label>Yes</label>
                                        <input type="radio" name="nbmRadio" id="" value="No" <?php if($row5['nbm']=="No"){
                            echo 'checked';
                        }?>>
                                        <label>No</label>
                                    </li>

                                    <li class="mt-1">Advised pre-op medications taken
                                        <input type="radio" name="adRadio" id="" value="Yes" <?php if($row5['ad']=="Yes"){
                            echo 'checked';
                        }?>>
                                        <label>Yes</label>
                                        <input type="radio" name="adRadio" id="" value="No" <?php if($row5['ad']=="No"){
                            echo 'checked';
                        }?>>
                                        <label>No</label>
                                    </li>
                                    <li class="mt-1">Consent taken
                                        <input type="radio" name="consentRadio" id="" value="Yes" <?php if($row5['consent']=="Yes"){
                            echo 'checked';
                        }?>>
                                        <label>Yes</label>
                                        <input type="radio" name="consentRadio" id="" value="No" <?php if($row5['consent']=="No"){
                            echo 'checked';
                        }?>>
                                        <label>No</label>
                                    </li>
                                    <li class="mt-1">The risks , benefits , and alternatives of GA , Reg. and Loc/Sed
                                        have been discussed
                                        <input type="checkbox" name="riskRadio" id="" value="risk" <?php if($row5['risk']=="risk"){
                            echo 'checked';
                        }?>>
                                    </li>
                                    <li class="mt-1">The plan is :
                                        <input type="checkbox" name="ga" id="" value="ga" <?php if($row5['ga']=="ga"){
                            echo 'checked';
                        }?>> GA
                                        <input type="checkbox" name="regional" value="regional" <?php if($row5['regional']=="regional"){
                            echo 'checked';
                        }?> id="">Regional

                                        <input type="checkbox" name="sed" id="" value="sed" <?php if($row5['sed']=="sed"){
                            echo 'checked';
                        }?>> IV Sedation
                                        <input type="checkbox" name="spinal" value="spinal" <?php if($row5['spinal']=="spinal"){
                            echo 'checked';
                        }?> id="">Spinal Or
                                        <input type="text" class="form-control mt-1 mb-2" name="plan" id="" value="<?php echo $row5['plan'];?>">
                                    </li>
                                    <li class="mt-1">
                                        <input type="checkbox" name="hpRadio" id="" value="hp" <?php if($row5['hp']=="hp"){
                            echo 'checked';
                        }?>>H&P Reviewed , Patient assessed; fit for planned anesthesia.
                                    </li>
                                </ol>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 border border-black">
                        <div class="row">
                            <div class="col-12">Intubation Assessment</div>
                            <div class="col-3">I <input type="text" class="form-control" name="I"
                                    value="<?php echo $row5['I'];?>" id=""></div>
                            <div class="col-3">II <input type="text" class="form-control" name="II"
                                    value="<?php echo $row5['II'];?>" id=""></div>
                            <div class="col-3">III <input type="text" class="form-control" name="III"
                                    value="<?php echo $row5['III'];?>" id=""></div>
                            <div class="col-3">IV <input type="text" class="form-control" name="IV"
                                    value="<?php echo $row5['IV'];?>" id=""></div>
                            <div class="col-3 mt-2"><input type="checkbox" name="caps" id="" value="caps" <?php if($row5['caps']=="caps"){
                            echo 'checked';
                        }?>> Caps</div>
                            <div class="col-3 mt-2"><input type="checkbox" name="overbite" id="" value="overbite" <?php if($row5['overbite']=="overbite"){
                            echo 'checked';
                        }?>> Overbite</div>
                            <div class="col-3 mt-2"><input type="checkbox" name="loose" id="" value="overbite" <?php if($row5['loose']=="loose"){
                            echo 'checked';
                        }?>> Loose Teeth</div>
                            <div class="col-12">ROM :
                                <input type="radio" name="romRadio" id="" value="Full" <?php if($row5['rom']=="Full"){
                            echo 'checked';
                        }?>>
                                <label>Full</label>
                                <input type="radio" name="romRadio" id="" value="Limited" <?php if($row5['rom']=="Limited"){
                            echo 'checked';
                        }?>>
                                <label for="">Limited</label>
                                <input type="radio" name="romRadio" id="" value="None" <?php if($row5['rom']=="None"){
                            echo 'checked';
                        }?>>
                                <label for="">None</label>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">Lungs : clear to ausculation OR </div>
                                    <div class="col-6"><input type="text" class="form-control" name="lungs" id=""
                                            value="<?php echo $row5['lungs'];?>"></div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-8">Heart : regular rhythm with no murmurs OR</div>
                                    <div class="col-4"><input type="text" name="heart" id="" class="form-control"
                                            value="<?php echo $row5['heart'];?>"></div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-2">ASA :</div>
                                    <div class="col-4">
                                        <select class="form-control" name="asa" id="">
                                            <option value="0" <?php if ($row5['asa'] == 0) { echo 'selected'; } ?>>0
                                            </option>
                                            <option value="1" <?php if ($row5['asa'] == 1) { echo 'selected'; } ?>>1
                                            </option>
                                            <option value="2" <?php if ($row5['asa'] == 2) { echo 'selected'; } ?>>2
                                            </option>
                                            <option value="3" <?php if ($row5['asa'] == 3) { echo 'selected'; } ?>>3
                                            </option>
                                            <option value="4" <?php if ($row5['asa'] == 4) { echo 'selected'; } ?>>4
                                            </option>
                                            <option value="5" <?php if ($row5['asa'] == 5) { echo 'selected'; } ?>>5
                                            </option>
                                            <option value="6" <?php if ($row5['asa'] == 6) { echo 'selected'; } ?>>6
                                            </option>
                                            <option value="E" <?php if ($row5['asa'] == 'E') { echo 'selected'; } ?>>E
                                            </option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit"
                    id="submit">Submit</button>

        </div>
        </form>
    </div>
</body>

</html>