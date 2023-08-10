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
$sql1 = "SELECT * FROM titles WHERE id = 1;";
$data1 = $conn->query($sql1);
$title = $data1->fetch_assoc();
error_reporting(0);
$sql="SELECT * FROM `operation_record` WHERE  `id`='$id'";
$data=$conn->query($sql);
$res=$data->fetch_assoc();
$inp_json = $res['inp_array'];
$dyn_json = $res['dyn_array'];

$inp_array = json_decode($inp_json, true);
$dyn_array = json_decode($dyn_json, true);
$inp_array = is_array($inp_array) ? $inp_array : array_fill(0, 144, '');
$dyn_array = is_array($dyn_array) ? $dyn_array : array_fill(0, 30, '');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Operation Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
              body {
            margin: 0;
        }
        hr{
            border :2px solid black;
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

           

            .noprint {
                visibility: hidden;
            }
            body{
                margin: 0;
            }
           
        }
    </style>
</head>

<body>
    <div>
        <div class="col p-4 m-4">
        <?php include_once("../header/images.php") ?>
            <a id="button" href="operation_record.php?id=<?php echo $id;?>" class="btn btn-success m-2">Dashboard</a>
            <button id="button" onclick="location.reload();" class="btn btn-success">Refresh</button>
               
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
            <form method="post">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <strong>Patient's Name</strong>
                        <?php echo "hello";?>
                    </div>
                    <div class="col-md-3">
                        <strong>Surgeon</strong>
                        <?php echo $inp_array[0];?>
                    </div>
                    <div class="col-md-3">
                        <strong>Diagnosis</strong>
                        <?php echo $inp_array[1];?>
                    </div>
                    <div class="col-md-3">
                        <strong>Assistant</strong>
                        <?php echo $inp_array[2];?>
                    </div>
                    <div class="col-md-3">
                        <strong>Nurse</strong>
                        <?php echo $inp_array[3];?>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-3">
                        <strong>HCA</strong>
                        <?php echo $inp_array[4];?>
                    </div>
                    <div class="col-md-3">
                        <strong>Visitors :</strong><?php echo $inp_array[5];?>
                    </div>
                    <div class="col-md-3">
                        <strong>Date :</strong>
                        <?php echo $inp_array[6];?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <strong for="time_ad">Surgery Start Time:</strong>
                        <?php echo $inp_array[7]?>
                    </div>
                    <div class="col-md-6">
                        <strong for="time_ad">Surgery Ending Time:</strong>
                        <?php echo $inp_array[8];?>
                    </div>
                </div>
                <div>
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <strong>Eye :</strong>
                            <?php echo $inp_array[9];?>
                        </div>
                        <div class="col-md-2">
                            <strong>O.T. No :</strong>
                            <?php echo $inp_array[10];?>
                        </div>
                        <div class="col-md-2">
                            <strong>Case No :</strong>
                            <?php echo $inp_array[11];?>
                        </div>
                        <div class="col-md-2">
                            <strong>E.M.R. No :</strong>
                            <?php echo $inp_array[12];?>
                        </div>
                    </div>
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Procedure</th>
                            <th scope="col">Description</th>
                            <th scope="col">Complications</th>
                            <th scope="col" colspan="2">Comment</th>
                            <th scope="col" colspan="2">
                                <strong>MPM</strong>
                                <?php echo $inp_array[13];?>
                            </th>
                            <th scope="col">Status</th>

                            <th scope="col">
                                <strong>O2</strong>
                                <?php echo $inp_array[14];?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Anesthesia</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[14]?'La':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[15]?'GA':'';?>
                                        <label for="">GA</label>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[16]?'TA':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[17]?'Peribulbar':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[18]?'Supplement':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[19]?'Retrobulbar':'';?>
                                        <div class="col-12">
                                            <?php echo $inp_array[20]?'No Anaesthesia':'';?>
                                        </div>
                                    </div>

                            </td>
                            <td>

                                <?php echo $inp_array[21]=='Yes'?'Yes':'No'; ?>

                            </td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[22]?'2% Lignocane HCL':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[23]?'Preservative Free':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[24]?'2% Lignocane HCL':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[25]?'0.5% Sensorcane':'';?>

                                    </div>
                                </div>

                            </td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[26].'ml';?>
                                    </div>
                                </div>
                                <div class="col-12"><br></div>
                                <div class="row">
                                    <div class="col-12"><?php echo $inp_array[27].'ml';?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><?php echo $inp_array[28] .'ml';?>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php echo $inp_array[29]=='Conscious'?'Conscious':''; ?>
                                <?php echo $inp_array[29]=='Comfortable'?'Comfortable':''; ?>
                                <?php echo $inp_array[29]=='Co-operation'?'Co-operation':''; ?>
                                <?php echo $inp_array[29]=='None'?'selected':''; ?>
                            </td>

                        </tr>

                        <tr>
                            <th scope="row">ASD & Drape</th>
                            <td colspan="4">
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo $inp_array[29]?'Betadine':'';?>

                                    </div>
                                    <div class="col">
                                        <?php echo $inp_array[30]?'RL':'';?>

                                    </div>
                                    <div class="col">
                                        <?php echo $inp_array[31]?'NS':'';?>
                                    </div>
                                    <div class="col-3">
                                        <?php echo $inp_array[32]?'Poly drape':'';?>
                                    </div>
                                    <div class="col">
                                        <?php echo $inp_array[33]?'Other':'';?>
                                    </div>
                                </div>

                            </td>
                         

                        </tr>
                        <tr>
                            <th scope="row">Conjunctival</th>
                            <td >
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[34]?'Limbal':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[35]?'Fornix':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[36]?'No':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[37]?'Poly drape':'';?>
                                    </div>
                                 
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12"><?php echo $inp_array[39]?'Incision':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[40]?'Burn':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[41]?'Bleeding':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[42]?'Loss of Int':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[43]?'Iris Injury':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[44]?'Valve':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[45]?'Lens Injury':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[46]?'Irregular':'';?></div>
                                </div>
                            </td>
                   <hr>
                        <tr class="mt-3">
                            <th scope="row">Flap Incision</th>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[47]?'Clear Cornea Tunnel':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[48]?'Temporal':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[49]?'Superior':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[50]?'Sciral Tunnel':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[51]?'Other':'';?>
                                    </div>
                                </div>

                            </td>
                            <td colspan="2"> Length: <?php echo $inp_array[52].'mm';?>
                            </td>
                            <td></td>


                        </tr>
                    </tbody>
                </table>
                <table class="table ">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <th>Lens</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[53]?'Capsulorrhexis':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[54]?'Can Opening':'';?>
                                    </div>
                                    <div class="col-12"> Size <<?php echo $inp_array[55].' mm';?>< /div>
                                    </div>

                            </td>

                            <td>
                                <div class="row">
                                    <div class="col-12"><?php echo $inp_array[56]?'Difficult Nucleus':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[57]?'Expression':'';?></div>
                                </div>
                            </td>
                            <td rowspan="2" colspan="2">
                                <div class="row">
                                    <div class="col-12">
                                        Pre.OP. K Reading
                                    </div>
                                    <div class="col-12 " style=" height: 10rem;">
                                        <img src="clock.png" alt="" style="width: 100%;height: 100%;">
                                    </div>
                                    <div class="col-12">
                                        Incision Site
                                    </div>
                                    <div class="col-12 " style="height: 10rem;">
                                        <img src="clock.png" alt="" style="width: 100%;height: 100%;">
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <th>Extraction</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[58]?'Hydroprocedure':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[59]?'Nucleus expression':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[60]?'Visodelivery':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[61]?'Cortex Irr / Asp':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[62]?'2% methyl Cellulose':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[63]?'Sodium Hyaluronate':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[64]?'PKE TECHNIQUE':'';?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12"> <?php echo $inp_array[65]?'Cortex Remained':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[66]?'Heavy Irrigation':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[67]?'Capsule Tear':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[68]?'Nucleus Drop':'';?>/div>
                                        <div class="col-12"><?php echo $inp_array[69]?'Vitreous Loss':'';?></div>
                                    </div>
                            </td>

                        </tr>
                        <tr>
                            <th>Phaco Plane Posterior</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[71]?'Endo Capsular':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[72]?'Iris Plane':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[73]?'Anterrior Chamber':'';?>
                                    </div>
                                </div>
                            </td>
                            <td> <?php echo $inp_array[74]?'Vitreous Haemorrhage':'';?></td>
                        </tr>
                        <tr>
                            <th>Capsulotomy</th>
                            <td>
                                <?php echo $inp_array[75]=='Yes'?'No':''; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Lens Insertion</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[76]?'Posterior Chamber':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[77]?'IN the Bag':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[78]?'Sulcus Fixated':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[79]?'Anterrior Chamber':'';?>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12"><?php echo $inp_array[80]?'Corneal Damage':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[81]?'Corneal touch':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[82]?'Viterous loss':'';?>></div>
                                    <div class="col-12"><?php echo $inp_array[83]?'Inadequate Support':'';?></div>
                                    <div class="col-12"><?php echo $inp_array[84]?'Excessve Manipulation':'';?></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Capsule Polishing</th>
                            <td><strong>Anterior Capsule</strong></td>
                            <td>
                                <?php echo $inp_array[85]=='Adequate'?'Adequate':'Inadequate'; ?></td>
                            <td><strong>Posterior Capsule</strong></td>
                            <td>
                                <?php echo $inp_array[86]=='Adequate'?'Adequate':'Inadequate'; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>OVD Removal</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[87]?'Two Plain':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[88]?'Rock & Roll':'';?>>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[89]?'Single/ Plain':'';?>
                                    </div>
                                </div>
                            </td>
                            <td></td>
                            <td>
                                <div class="row">
                                    <div class="col-12"><strong>Intra Cameral Drug Used</strong></div>
                                    <div class="col-12 my-2">
                                        Adrenaline :
                                        <?php echo $inp_array[90]=='Yes'?'Yes':'No'; ?>
                                        </select>
                                    </div>
                                    <div class="col-12 my-2">
                                        Miotic : <?php echo $inp_array[91]=='Yes'?'Yes':'NO'; ?>
                                    </div>
                                    <div class="col-12 my-2">
                                        Antibiotic : <?php echo $inp_array[92]=='Yes'?'Yes':'No'; ?>
                                    </div>
                                    <div class="col-12 my-2">
                                        Topical Betadine :
                                        <?php echo $inp_array[93]=='Yes'?'Yes':'No'; ?>
                                    </div>
                                    <div class="col-12 my-2">
                                        Triamcinolone: <?php echo $inp_array[94]=='Yes'?'Yes':'No';?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Reformation of AC</th>
                            <td>

                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[94]?'Two Plain':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[95]?'Rock & Roll':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[96]?'Single/ Plain':'';?>
                                    </div>
                                </div>

                            </td>
                            <td><strong>Wound leak : </strong>
                                <?php echo $inp_array[97]=='Yes'?'Yes':'No';?>
                            </td>
                        </tr>
                        <tr>
                            <th>Wound Sutured</th>
                            <td>

                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[98]?'No':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[99]?'Int.':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[100]?'Cont.':'';?>
                                    </div>
                                </div>

                            </td>
                            <td><strong>Wound Hydrated </strong>
                                <?php echo $inp_array[101]=='Yes'?'Yes':'No';?>
                            </td>
                        </tr>
                        <tr>

                            <th>Wound Security</th>
                            <td><?php echo $inp_array[143]=='Adequate'?'Adequate':'nadequate'; ?></td>
                            <td><?php echo $inp_array[102]?'Irisprolapase':'';?></td>
                        </tr>
                        <tr>
                            <th rowspan="2">Procedure</th>
                            <td>1.Surgery</td>
                            <td>
                                <?php echo $inp_array[141]=='Successful'?'Successful':'Unsuccessful'; ?> </td>
                        </tr>
                        <tr>
                            <td>2.Complications</td>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[103]?'NIL':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[104]?'YES':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[105]?'Specify':'';?>
                                    </div>
                                Date : <?php echo $inp_array[142];?>
                                </div>
                            </td>


                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-12 text center"><strong>Phaco-I</strong></div>
                                    <div class="col-12">Vacuum <?php echo $inp_array[106];?>
                                    </div>
                                    <div class="col-12">Flow RAte <?php echo $inp_array[107];?></div>
                                    <div class="col-12">Us Power <?php echo $inp_array[108];?></div>
                                    <div class="col-12">Fluid Required <?php echo $inp_array[109];?>> C.C
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="row">
                                    <div class="col-12 text center"><strong>Phaco-II</strong></div>
                                    <div class="col-12">Vacuum <?php echo $inp_array[110];?>
                                    </div>
                                    <div class="col-12">Flow RAte <?php echo $inp_array[111];?>></div>
                                    <div class="col-12">Us Power <?php echo $inp_array[112];?>
                                    </div>
                                    <div class="col-12">Fluid Required <?php echo $inp_array[114];?> C.C
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12 text center"><strong>I/A</strong></div>
                                    <div class="col-12">Vacuum <?php echo $inp_array[114];?>
                                    </div>
                                    <div class="col-12">Flow RAte <?php echo $inp_array[115];?></div>
                                    <div class="col-12">Us Power <?php echo $inp_array[116];?>
                                    </div>
                                    <div class="col-12">Fluid Required <?php echo $inp_array[117];?> C.C
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12">Phaco Time <?php echo $inp_array[118];?>/div>
                                        <div class="col-12">Surgery Time <?php echo $inp_array[119];?>></div>

                                    </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Us Power</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo $inp_array[120]?'Linear':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[121]?'Pulse':'';?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo $inp_array[122]?'Any Other':'';?>
                                    </div>
                                </div>
                            </td>
                            <td>Any Other Specify: <?php echo $inp_array[123];?></td>
                            <td colspan="2">Signature of Doctor: <?php echo $inp_array[124];?>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="border p-2">
                    <h3 class="text-center">Post Operative Data Record</h3>
                    <h3 class="text-center">OD/OS</h3>
                    <table class="table table-bordered">
                        <thead>
                       
                            <tr>
                                <?php
                                    for($i=0;$i<3;$i++){
                                        echo<<<data
                                          <td width="33%">
                                        <strong>
                                            Date:
                                            </strong>
                                           {$dyn_array[$i]}
                                        
                                    </td>
                                    data;
                                    }
                                    ?>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                    for($i=0;$i<3;$i++){
                                        $nameValue = $i + 3;
                                        echo<<<data
                                        <td>
                                        <label for="">Vision:</label>
                                        <select name="{$nameValue}"}>
                                            <option value="PH">PH</option>
                                            <option value="BCVA">BCVA</option>
                                        </select>
                                    </td>
data;
                                    }
                                    ?>

                            </tr>
                            <tr>
                                <?php
                                    for($i=0;$i<3;$i++){
                                        echo<<<data
                                        <td>
                                        <label for="">Slit Lamp Examination</label>
                                    </td>
data;
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <?php
                                    for($i=0;$i<3;$i++){
                                       
                                        echo<<<data
                                        <td class="text-center">
                                        <img src="cor_back.png" alt="" style="height: 10rem;">
                                    </td>
data;
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <td>Corneal Edema</td>
                                <?php
                                    for($i=0;$i<2;$i++){
                                        $nameValue = $i + 6;
                                        echo<<<data
                                        <td>
                                    {$dyn_array[$i + 6]}
                                    </td>
data;
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <td>D M Fold</td>
                                <?php
                                    for($i=0;$i<2;$i++){
                                        $nameValue = $i + 8;
                                        echo<<<data
                                        <td>
                                    {$dyn_array[8+ $i]}
                                    </td>
data;
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <td>AC Status</td>
                                <?php
                                    for($i=0;$i<2;$i++){
                                        $nameValue = $i + 10;
                                        echo<<<data
                                        <td >
                                     {$dyn_array[10 + $i]}
                                    </td>
data;
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <td>Pupil</td>
                                <?php
                                    for($i=0;$i<2;$i++){
                                        $nameValue = $i + 12;
                                        echo<<<data
                                        <td >
                                     {$dyn_array[12 + $i]}
                                    </td>
data;
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <td>IOL Position</td>
                                <?php
                                    for($i=0;$i<2;$i++){
                                        $nameValue = $i + 14;
                                        echo<<<data
                                        <td >
                                    {$dyn_array[14 + $i]}
                                    </td>
data;
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-12">Inflammatery reaction</div>
                                        <div class="col-12">(a) Adnexa</div>
                                        <div class="col-12">(b) Ant Chamber</div>
                                        <div class="col-12">(c) Vitreous</div>

                                    </div>
                                </td>
                                <?php
                                    for($i=0;$i<2;$i++){
                                        $nameValue = $i+16;
                                        $nameValue1=$i+18;
                                        $nameValue2=$i+20;
                                        echo<<<data
                                        <td > <div class = "row mt-3"> 
                                        <div class="col-12">{$dyn_array[16+$i]}</div> 
                                        <div class="col-12">{$dyn_array[18+$i]}</div> 
                                        <div class="col-12">{$dyn_array[20+$i]}</div> 
                                        </div>
                                    </td>
data;
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <td>Post Capsule</td>
                                <?php
                                    for($i=0;$i<2;$i++){
                                        $nameValue = $i + 22;
                                        echo<<<data
                                        <td >
                                   {$dyn_array[22+ $i]}
                                    </td>
data;
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <?php
                                    for($i=0;$i<3;$i++){
                                        $nameValue = $i + 24;
                                        echo<<<data
                                        <td>
                                        <label for="">IOP:</label>
                                       {$dyn_array[24 + $i]} mm of Hg GAT
                                    </td>
data;
                                    }
                                    ?>

                            </tr>
                            <tr>
                                <?php
                                    for($i=0;$i<3;$i++){
                                 
                                        echo<<<data
                                        <td>
                                        <div class="row " >  
                                        <div class="col-8 offset-2" style=" height:15rem; border:1px solid black; border-radius:50%; ">   </div>
                                        <div class="col-12 text-center"> Post Segment</div>

                                        </div>
                                        
                                    </td>
data;
                                    }
                                    ?>

                            </tr>
                            <tr>
                                <?php
                                    for($i=0;$i<3;$i++){
                                        $nameValue = $i + 27;
                                        echo<<<data
                                        <td>
                                        Rx: {$dyn_array[27 + $i]}
                                    </td>
data;
                                    }
                                    ?>

                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-5">
                        <div class="row mt-3">
                            <div class="col">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"></th>
                                            <th colspan="4" class="text-center">Right Eye (RE)</th>
                                            <th colspan="4" class="text-center">Left Eye (LE)</th>
                                        </tr>
                                        <tr>
                                            <th>SPH</th>
                                            <th>CYL</th>
                                            <th>Axis</th>
                                            <th>Vision</th>
                                            <th>SPH</th>
                                            <th>CYL</th>
                                            <th>Axis</th>
                                            <th>Vision</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Distance</th>
                                            <td><?php echo $inp_array[126];?>
                                            </td>
                                            <td><?php echo $inp_array[127];?>
                                            </td>
                                            <td><?php echo $inp_array[128];?>
                                            </td>
                                            <td><?php echo $inp_array[129];?>
                                            </td>
                                            <td><?php echo $inp_array[130];?>
                                            </td>
                                            <td><?php echo $inp_array[131];?>
                                            </td>
                                            <td><?php echo $inp_array[132];?>
                                            </td>
                                            <td><?php echo $inp_array[133];?></td>
                                        </tr>
                                        <tr>
                                            <th>Near</th>
                                            <td><?php echo $inp_array[134];?>
                                            </td>
                                            <td><?php echo $inp_array[135];?>
                                            </td>
                                            <td><?php echo $inp_array[136];?>
                                            </td>
                                            <td><?php echo $inp_array[137];?></td>
                                            <td><?php echo $inp_array[138];?>
                                            </td>
                                            <td><?php echo $inp_array[139];?>
                                            </td>
                                            <td><?php echo $inp_array[140];?>
                                            </td>
                                            <td><?php echo $inp_array[141];?></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <label for=""> Date: </label>
                                    <?php echo $inp_array[142];?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
        </div>
        </form>


    </div>

    <!-- Add necessary Bootstrap JS and jQuery scripts here (if required) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script>
window.print();
</script>

</html>