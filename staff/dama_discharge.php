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
    $discharge=isset($_POST['discharge'])?$_POST['discharge']:'';
    $dama=isset($_POST['dama'])?$_POST['dama']:'';
    $date=isset($_POST['date'])?$_POST['date']:'';
    $dis=isset($_POST['dis'])?$_POST['dis']:'';
    $medradio=isset($_POST['medradio'])?$_POST['medradio']:'';
    $medside=isset($_POST['medside'])?$_POST['medside']:'';
    $genradio=isset($_POST['genradio'])?$_POST['genradio']:'';
    $dietradio=isset($_POST['dietradio'])?$_POST['dietradio']:'';
    $phyradio=isset($_POST['phyradio'])?$_POST['phyradio']:'';
    $transradio=isset($_POST['transradio'])?$_POST['transradio']:'';
    $reqradio=isset($_POST['reqradio'])?$_POST['reqradio']:'';
    $ifradio=isset($_POST['ifradio'])?$_POST['ifradio']:'';
    $discu=isset($_POST['discu'])?$_POST['discu']:'';
    $lan=isset($_POST['lan'])?$_POST['lan']:'';
    $aradio=isset($_POST['aradio'])?$_POST['aradio']:'';
    $bradio=isset($_POST['bradio'])?$_POST['bradio']:'';
    $cradio=isset($_POST['cradio'])?$_POST['cradio']:'';
    $dradio=isset($_POST['dradio'])?$_POST['dradio']:'';
    $eradio=isset($_POST['eradio'])?$_POST['eradio']:'';
    $yradio=isset($_POST['yradio'])?$_POST['yradio']:'';
    $sign=isset($_POST['sign'])?$_POST['sign']:'';
    $sis=isset($_POST['sis'])?$_POST['sis']:'';
    $doc1=isset($_POST['doc1'])?$_POST['doc1']:'';
    $sis2=isset($_POST['sis2'])?$_POST['sis2']:'';
    $doc2=isset($_POST['doc2'])?$_POST['doc2']:'';

    $update = "UPDATE dama_dis SET 
            discharge = '$discharge', 
            dama = '$dama', 
            date = '$date', 
            dis = '$dis', 
            medradio = '$medradio', 
            medside = '$medside', 
            genradio = '$genradio', 
            dietradio = '$dietradio', 
            phyradio = '$phyradio', 
            transradio = '$transradio', 
            reqradio = '$reqradio', 
            ifradio = '$ifradio', 
            discu = '$discu', 
            lan = '$lan', 
            aradio = '$aradio', 
            bradio = '$bradio', 
            cradio = '$cradio', 
            dradio = '$dradio', 
            eradio = '$eradio', 
            yradio = '$yradio', 
            sign = '$sign', 
            sis = '$sis', 
            doc1 = '$doc1', 
            sis2 = '$sis2', 
            doc2 = '$doc2' 
            WHERE id = '$id'";
$sql4=mysqli_query($conn,$update);
   
 }
 $sql5=mysqli_query($conn,"SELECT * FROM dama_dis WHERE id=$id");
 $row5=mysqli_fetch_assoc($sql5);

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handover patient valuable item</title>
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
            <h3 class=" fl text-center text-dark"> DAMA Discharge</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="dama_dis_print.php?id=<?php echo $id; ?>" class=" btn btn-success"
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
     
        <div class="col-md-4">
          <label class="form-label">Sex: <?php echo $row['sex'];?></label>
        </div>
        <div class="col-md-4">
        <label class="form-label">Address :  <?php echo $row['address']." , ".$row['taluka']." , ".$row['district']; ?></label>
        <br>
        </div>
      
    </div>
            <form action="" method="post">
            <div class="col-12">Discharge Process Documentation Form (If be filled by the nurses, doctors and MSW at the time of Discharge / Transfer is advised)</div>
            <div class="row">
               <div class="col-3"><input type="checkbox" name="discharge" id="" value="discharge" <?php if($row5['discharge']=="discharge"){
                            echo 'checked';
                        }?>> Discharge</div>
                <div class="col-3"><input type="checkbox" name="dama" id=""value="dama" <?php if($row5['dama']=="dama"){
                            echo 'checked';
                        }?>> DAMA / LAMA</div>
                <div class="col-1">Date : </div>
                <div class="col-3"><input type="date" class="form-control" name="date" id="" value="<?php echo $row5['date'];?>"></div>
            </div>
            <div class="row">
                <div class="col-12">Discharge Plans are generally discussed by consultant with patient or patients relative at the time of
admission, on a daily basis and any prior. In case of patient receiving physiotherapy, it is discussed at the time
physiotherapy planning. Discharge may be to an interim placement (provisional). To give sufficient time for to
be transferred to a suitable location of choice or back to home.
</div>
            </div>

            <div class="row mt-3">
                <div class="col-3"><strong>Discharge Summary</strong></div>
                <div class="col-3">
                    <input type="checkbox" name="dis" id="" value="dis" <?php if($row5['discharge']=="dis"){
                            echo 'checked';
                        }?> >
                    Discussed
                </div>
                <div class="col-12">This document gives detailed information of all the treatments which patient have received during this
admission, current medication and follow up information. One copy of discharge summary will be issued at the
end of discharge process.
</div>
            </div>

            <div class="row mt-3">
                <div class="col-3"><strong>Medications</strong></div>
                <div class="col-3"><input type="radio" name="medradio" id="" value="me" <?php if($row5['medradio']=="me"){
                            echo 'checked';
                        }?>> Discussed</div>
                <div class="col-3"><input type="radio" name="medradio" id="" value="med" <?php if($row5['medradio']=="med"){
                            echo 'checked';
                        }?>> Not applicable</div>
                <div class="col-12">A Nurse, Doctor or pharmacist will explain your discharge medications to you.
</div>
            </div>

            <div class="row mt-3">
                <div class="col-3"><strong>Medications side effects</strong></div>
                <div class="col-3"><input type="checkbox" name="medside" id="" value="medside" <?php if($row5['medside']=="medside"){
                            echo 'checked';
                        }?>> Discussed</div>
                <div class="col-12">A Nurse, Doctor or pharmacist will explain general side effects of medicine Detailed information about
medication side effects can be the medication boxes.

</div>
            </div>

            <div class="row mt-4">
                <div class="col-3">General Health Instruction 
                 </div>
                <div class="col-3"><input type="radio" name="genradio" id="" value="s" <?php if($row5['genradio']=="s"){
                            echo 'checked';
                        }?>> Post Surgery </div>
                <div class="col-3"><input type="radio" name="genradio" id="" value="r" <?php if($row5['genradio']=="r"){
                            echo 'checked';
                        }?>> Post Radiation</div>
                <div class="col-3"><input type="radio" name="genradio" id="" value="g" <?php if($row5['genradio']=="g"){
                            echo 'checked';
                        }?>> General</div>
                 </div>

                 <div class="row">
                <div class="col-3">Dietitian  </div>
                <div class="col-3"><input type="radio" name="dietradio" id="" value="g" <?php if($row5['dietradio']=="g"){
                            echo 'checked';
                        }?>> General Diet </div>
                <div class="col-3"><input type="radio" name="dietradio" id="" value="s" <?php if($row5['dietradio']=="s"){
                            echo 'checked';
                        }?>> Specific</div>
                 </div>

                 <div class="row">
                <div class="col-3">Physiotherapist </div>
                <div class="col-3"><input type="radio" name="phyradio" id="" value="d" <?php if($row5['phyradio']=="d"){
                            echo 'checked';
                        }?>> Discussed </div>
                <div class="col-3"><input type="radio" name="phyradio" id="" value="n" <?php if($row5['phyradio']=="n"){
                            echo 'checked';
                        }?>> Not applicable</div>
                 </div>

                 <div class="row">
                <div class="col-3">Transport </div>
                <div class="col-3"><input type="radio" name="transradio" id="" value="d" <?php if($row5['transradio']=="d"){
                            echo 'checked';
                        }?>> Discussed </div>
                <div class="col-3"><input type="radio" name="transradio" id="" value="n" <?php if($row5['transradio']=="n"){
                            echo 'checked';
                        }?>> Not applicable</div>
                 </div>
                 
                 <div class="row">
                    <div class="col-12">  Transport to home is not usually provided by the hospital so you will need to make your own arrangements. If
you need AMBULATE / AMBULANCE to transport the patient, Please discuss this with the MSW.
              </div>
                 <div class="col-3">Requires Transportation</div>
                <div class="col-3"><input type="radio" name="reqradio" id="" value="y" <?php if($row5['reqradio']=="y"){
                            echo 'checked';
                        }?>> Yes</div>
                <div class="col-6"><input type="radio" name="reqradio" id="" value="n" <?php if($row5['reqradio']=="n"){
                            echo 'checked';
                        }?>> No</div>
                <div class="col-3">If yes</div>
                <div class="col-3"> <input type="radio" name="ifradio" id="" value="w" <?php if($row5['ifradio']=="w"){
                            echo 'checked';
                        }?>> With Medical Supervision</div>
                <div class="col-3"> <input type="radio" name="ifradio" id="" value="n" <?php if($row5['ifradio']=="n"){
                            echo 'checked';
                        }?>> No</div>
                 </div>

                 <div class="row">
                    <div class="col-6">Whom to contact if you are worried about your condition</div>
                    <div class="col-3"><input type="checkbox" name="discu" id="" value="d" <?php if($row5['discu']=="d"){
                            echo 'checked';
                        }?>> Discussed</div>
                    <div class="col-12">
                        Name of person and phone number is given in the Discharge Summary to contact in case of emergency to
avoid mishaps, your GP can discuss the condition and possible health problem at the time of discharge, so that you
can contact your GP in the first instance. They can contact the Hospital if necessary.</div>
                <div class="col-12">
                I/we understand and agree for discharge. My/my relative general health condition is discussed to me/us.
Uwe also mate that this Has been   
                </div>
                <div class="col-4 mt-1">explained to me/us in the Language</div>
                <div class="col-3"><input type="text" name="lan" class="form-control" id=""value="<?php echo $row5['sis'];?>"></div>
                <div class="col-5 mt-1">(mention language in which
explained) that we</div>
                <div class="col-12"> understand. With these understandings we give consent for discharge of my/my relative.
</div>
                 </div>

                 <div class="row mt-4">
                 <div class="col-5">I recieved my patients </div>
                <div class="col-2">Given</div>
                <div class="col-2">Pending</div>
                <div class="col-3">Not applicable</div>

                <div class="col-5">Hospital Discharge Summary </div>
                <div class="col-2"><input type="radio" name="aradio" id="" value="a" <?php if($row5['aradio']=="a"){
                            echo 'checked';
                        }?>></div>
                <div class="col-2"><input type="radio" name="aradio" id="" value="b" <?php if($row5['aradio']=="b"){
                            echo 'checked';
                        }?>></div>
                <div class="col-3"><input type="radio" name="aradio" id="" value="c" <?php if($row5['aradio']=="c"){
                            echo 'checked';
                        }?>></div>

                <div class="col-5">Death Summary/ Death Certificate </div>
                <div class="col-2"><input type="radio" name="bradio" id="" value="a" <?php if($row5['bradio']=="a"){
                            echo 'checked';
                        }?>></div>
                <div class="col-2"><input type="radio" name="bradio" id="" value="b" <?php if($row5['bradio']=="b"){
                            echo 'checked';
                        }?>></div>
                <div class="col-3"><input type="radio" name="bradio" id="" value="c" <?php if($row5['bradio']=="c"){
                            echo 'checked';
                        }?>></div>

                <div class="col-5">Pathology Reports </div>
                <div class="col-2"><input type="radio" name="cradio" id="" value="a" <?php if($row5['cradio']=="a"){
                            echo 'checked';
                        }?>></div>
                <div class="col-2"><input type="radio" name="cradio" id="" value="b" <?php if($row5['cradio']=="b"){
                            echo 'checked';
                        }?>></div>
                <div class="col-3"><input type="radio" name="cradio" id="" value="c" <?php if($row5['cradio']=="c"){
                            echo 'checked';
                        }?>></div>

                <div class="col-5">Histopath Reports </div>
                <div class="col-2"><input type="radio" name="dradio" id="" value="a" <?php if($row5['dradio']=="a"){
                            echo 'checked';
                        }?>></div>
                <div class="col-2"><input type="radio" name="dradio" id="" value="b" <?php if($row5['dradio']=="b"){
                            echo 'checked';
                        }?>></div>
                <div class="col-3"><input type="radio" name="dradio" id="" value="c" <?php if($row5['dradio']=="c"){
                            echo 'checked';
                        }?>></div>

                <div class="col-5">Radiology Reports</div>
                <div class="col-2"><input type="radio" name="eradio" id="" value="a" <?php if($row5['eradio']=="a"){
                            echo 'checked';
                        }?>></div>
                <div class="col-2"><input type="radio" name="eradio" id="" value="b" <?php if($row5['eradio']=="b"){
                            echo 'checked';
                        }?>></div>
                <div class="col-3"><input type="radio" name="eradio" id="" value="c" <?php if($row5['eradio']=="c"){
                            echo 'checked';
                        }?>></div>

               <div class="col-12">(Circle included items X ray/CT scan/PET Scan/USG/Marrimo/2D Echo/Color Doppler)</div>
               <div class="col-5">Visitors & Attender Pass submitted back to billing</div>
               <div class="col-1"><input type="radio" name="yradio" id="" value="y" <?php if($row5['yradio']=="y"){
                            echo 'checked';
                        }?>> Yes</div>   
               <div class="col-1"><input type="radio" name="yradio" id="" value="n" <?php if($row5['yradio']=="n"){
                            echo 'checked';
                        }?>> No</div> 
               <div class="col-4">(ask to pay charges)</div>  

            </div>

            <div class="row">
                <div class="col-5 mt-3">Signature of the patient/ relative
                    <input type="text" name="sign"class="form-control"value="<?php echo $row5['sign'];?>">
                    </div><div class="col-1"></div>
                <div class="col-6">
                    <table class="table table-bordered border-dark ">
                        <tr>
                            <th>Sisters Name with sign & date</th>
                            <th>Duty Doctors Name with sign & date</th>
                        </tr>
                        <tr>
                            <td><input type="text"class="form-control"  name="sis" value="<?php echo $row5['sis'];?>"id=""></td>
                            <td><input type="text"class="form-control"  name="doc1" id=""value="<?php echo $row5['sis'];?>"></td>
                        </tr>
                        <tr>
                            <td><input type="date"class="form-control"  name="sis2" id=""value="<?php echo $row5['sis'];?>"></td>
                            <td><input type="date"class="form-control"  name="doc2" id=""value="<?php echo $row5['sis'];?>"></td>
                        </tr>
                    </table>
                </div>
                
            </div>
                

                      <br>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>