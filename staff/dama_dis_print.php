<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
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


$sql5=mysqli_query($conn,"SELECT * FROM dama_dis WHERE id=$id");
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
    <style>
    body {
        margin: 0;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
    }

    .title {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    @media print {

        #button {
            display: none !important;
        }

        @page {
            size: A4;
        }

        .noprint {
            visibility: hidden;
        }
    }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="dama_discharge.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">DAMA Discharge</h3>

    <?php include_once("../header/header.php") ?>
            <div class="col-12">Discharge Process Documentation Form (If be filled by the nurses, doctors and MSW at the time of Discharge / Transfer is advised)</div>
            <div class="row">
               <div class="col-3"><input type="checkbox" name="discharge" id="" value="discharge" <?php if($row5['discharge']=="discharge"){
                            echo 'checked';
                        }?>> Discharge</div>
                <div class="col-3"><input type="checkbox" name="dama" id=""value="dama" <?php if($row5['dama']=="dama"){
                            echo 'checked';
                        }?>> DAMA / LAMA</div>
                <div class="col-4">Date : <?php echo $row5['date'];?></div>
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
                    <input type="checkbox" name="dis" id="" value="dis" <?php if($row5['dis']=="dis"){
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
                <div class="col-3"><?php echo $row5['sis'];?></div>
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
                <div class="col-5 mt-3">Signature of the patient/ relative <?php echo $row5['sign'];?>
                </div><div class="col-1"></div>
                <div class="col-6">
                    <table class="table table-bordered border-dark ">
                        <tr>
                            <th>Sisters Name with sign & date</th>
                            <th>Duty Doctors Name with sign & date</th>
                        </tr>
                        <tr>
                            <td><?php echo $row5['sis'];?></td>
                            <td><?php echo $row5['doc1'];?></td>
                        </tr>
                        <tr>
                            <td><?php echo $row5['sis2'];?></td>
                            <td><?php echo $row5['doc2'];?></td>
                        </tr>
                    </table>
                </div>
                
            </div>
                

    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>