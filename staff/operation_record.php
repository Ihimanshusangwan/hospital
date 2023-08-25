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
$sql1 = "SELECT * FROM titles WHERE id = 1;";
$data1 = $conn->query($sql1);
$title = $data1->fetch_assoc();
error_reporting(0);

if(isset($_POST['submit'])){
    $inp_array=array();
    $dyn_array=array();

    for($i=1;$i<145;$i++){
        $element=isset($_POST['inp_'.$i])?$_POST['inp_'.$i]:'';
        array_push($inp_array,$element);
    }
    for($i=0;$i<30;$i++){
        $element=$_POST[$i];
        array_push($dyn_array,$element);
    }
    $inp_json=json_encode($inp_array);
    $dyn_json=json_encode($dyn_array);
    
   $sql="UPDATE `operation_record` SET `inp_array`='$inp_json',`dyn_array`='$dyn_json' WHERE `id`='$id'   ";
   $res=$conn->query($sql);
   if($res){
    echo "data update sucessfully";
   }
}
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
    <!-- Add necessary Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
       
            <a href="OT.php?id=<?php echo $id;?>" class="btn btn-success m-2">Dashboard</a>
            <a href="operation_record_print.php?id=<?php echo $id;?>" class="btn btn-danger m-2">print</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>
            <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <h3 class="text-center text-dark mt-3">Operation Record</h3>
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
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Patient's Name</label>
                        <input  type=" text" class="form-control" id="reg" value="<?php echo  $res0['name'];?>" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Surgeon</label>
                        <input type="text" name="inp_1" value="<?php echo $inp_array[0];?>" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Diagnosis</label>
                        <input type="text" name="inp_2" value="<?php echo $inp_array[1];?>" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Assistant</label>
                        <input type="text" name="inp_3" value="<?php echo $inp_array[2];?>" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Nurse</label>
                        <input type="text" name="inp_4" value="<?php echo $inp_array[3];?>" class="form-control">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">HCA</label>
                        <input type="text" name="inp_5" value="<?php echo $inp_array[4];?>" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Visitors :</label>
                        <input type="text" name="inp_6" value="<?php echo $inp_array[5];?>" class="form-control"
                            id="name">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Date :</label>
                        <input type="date" name="inp_7" value="<?php echo $inp_array[6];?>" class="form-control"
                            id="DOA">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="time_ad">Surgery Start Time:</label>
                        <input type="time" class="form-control" name="inp_8" value="<?php echo $inp_array[7];?>"
                            placeholder="Time of Admission">
                    </div>
                    <div class="col-md-2 ml-2">
                        <label class="form-label" for="time_ad">Surgery Ending Time:</label>
                        <input type="time" class="form-control" value="<?php echo $inp_array[8];?>" id="time_ad"
                            name="inp_9" placeholder="Time of Admission">
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <label class="form-label">Eye :</label>
                            <input name="inp_10" type="text" value="<?php echo $inp_array[9];?>" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">O.T. No :</label>
                            <input name="inp_11" type="text" value="<?php echo $inp_array[10];?>" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Case No :</label>
                            <input name="inp_12" type="text" value="<?php echo $inp_array[11];?>" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">E.M.R. No :</label>
                            <input name="inp_13" type="text" value="<?php echo $inp_array[12];?>" class="form-control">
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
                                <label>MPM</label>
                                <input style="width: 4rem;" class="form-control-sm inline" type="text"
                                    value="<?php echo $inp_array[13];?>" name="inp_14">
                            </th>
                            <th scope="col">Status</th>
                            <th scope="col">
                                <label>O2</label>
                                <input style="width: 4rem;" class="form-control-sm inline" name="inp_144"
                                    value="<?php echo $inp_array[143];?>" type="text">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Anesthesia</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_15" <?php echo $inp_array[14]?'checked':'';?>>
                                        <label for="la_la">LA</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_16" <?php echo $inp_array[15]?'checked':'';?>>
                                        <label for="la_ga">GA</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_17" <?php echo $inp_array[16]?'checked':'';?>>
                                        <label for="la_ta">TA</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_18" <?php echo $inp_array[17]?'checked':'';?>>
                                        <label for="la_peribulbar">Peribulbar</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_19" <?php echo $inp_array[18]?'checked':'';?>>
                                        <label for="la_supplement">Supplement</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_20" <?php echo $inp_array[19]?'checked':'';?>>
                                        <label for="la_retrobulbar">Retrobulbar</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_21" <?php echo $inp_array[20]?'checked':'';?>>
                                        <label for="la_no_anaesthesia">No Anaesthesia</label>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <select name="inp_22">
                                    <option value="Yes" <?php echo $inp_array[21]=='Yes'?'selected':''; ?>>Yes</option>
                                    <option value="No" <?php echo $inp_array[21]=='No'?'selected':''; ?>>No</option>
                                </select>
                            </td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_23" <?php echo $inp_array[22]?'checked':'';?>>
                                        <label for="lig_lignocane_hcl">2% Lignocane HCL</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_24" <?php echo $inp_array[23]?'checked':'';?>>
                                        <label for="lig_preservative_free">Preservative Free</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_25" <?php echo $inp_array[24]?'checked':'';?>>
                                        <label for="lig_lignocane_hcl_2">2% Lignocane HCL</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_26" <?php echo $inp_array[25]?'checked':'';?>>
                                        <label for="lig_sensorcane">0.5% Sensorcane</label>
                                    </div>
                                </div>

                            </td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-12"><input style="width: 4rem;" class="form-control-sm inline"
                                            value="<?php echo $inp_array[26];?>" type="text" name="inp_27">

                                        <label>ml</label>
                                    </div>
                                </div>
                                <div class="col-12"><br></div>
                                <div class="row">
                                    <div class="col-12"><input style="width: 4rem;" class="form-control-sm inline"
                                            value="<?php echo $inp_array[27];?>" type="text" name="inp_28">

                                        <label>ml</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><input style="width: 4rem;" class="form-control-sm inline"
                                            value="<?php echo $inp_array[28];?>" type="text" name="inp_29">

                                        <label>ml</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <select name="inp_30">
                                    <option value="Conscious" <?php echo $inp_array[29]=='Conscious'?'selected':''; ?>>
                                        Conscious</option>
                                    <option value="Comfortable"
                                        <?php echo $inp_array[29]=='Comfortable'?'selected':''; ?>>Comfortable</option>
                                    <option value="Co-operation"
                                        <?php echo $inp_array[29]=='Co-operation'?'selected':''; ?>>Co-operation
                                    </option>
                                    <option value="None" <?php echo $inp_array[29]=='None'?'selected':''; ?>>None
                                    </option>
                                </select>
                            </td>

                        </tr>

                        <tr>
                            <th scope="row">ASD & Drape</th>
                            <td colspan="4">
                                <div class="row">
                                    <div class="col-3">
                                        <input type="checkbox" name="inp_30" <?php echo $inp_array[29]?'checked':'';?>>
                                        <label for="beta_betadine">Betadine</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="inp_31" <?php echo $inp_array[30]?'checked':'';?>>
                                        <label for="beta_rl">RL</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="inp_32" <?php echo $inp_array[31]?'checked':'';?>>
                                        <label for="beta_ns">NS</label>
                                    </div>
                                    <div class="col-3">
                                        <input type="checkbox" name="inp_33" <?php echo $inp_array[32]?'checked':'';?>>
                                        <label for="beta_poly_drape">Poly drape</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" name="inp_34" <?php echo $inp_array[33]?'checked':'';?>>
                                        <label for="beta_other">Other</label>
                                    </div>
                                </div>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <th scope="row">Conjunctival</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_35" <?php echo $inp_array[34]?'checked':'';?>>
                                        <label for="beta_limbal">Limbal</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_36" <?php echo $inp_array[35]?'checked':'';?>>
                                        <label for="beta_fornix">Fornix</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_37" <?php echo $inp_array[36]?'checked':'';?>>
                                        <label for="beta_no">No</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_38" <?php echo $inp_array[37]?'checked':'';?>>
                                        <label for="beta_poly_drape">Poly drape</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_39" <?php echo $inp_array[38]?'checked':'';?>>
                                        <label for="beta_other">Other</label>
                                    </div>
                                </div>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td rowspan="2">
                                <div class="row">
                                    <div class="col-12">Incision <input type="checkbox" name="inp_40"
                                            <?php echo $inp_array[39]?'checked':'';?>></div>
                                    <div class="col-12">Burn <input type="checkbox" name="inp_41"
                                            <?php echo $inp_array[40]?'checked':'';?>></div>
                                    <div class="col-12">Bleeding <input type="checkbox" name="inp_42"
                                            <?php echo $inp_array[41]?'checked':'';?>></div>
                                    <div class="col-12">Loss of Int <input type="checkbox" name="inp_43"
                                            <?php echo $inp_array[42]?'checked':'';?>></div>
                                    <div class="col-12">Iris Injury <input type="checkbox" name="inp_44"
                                            <?php echo $inp_array[43]?'checked':'';?>></div>
                                    <div class="col-12">Valve <input type="checkbox" name="inp_45"
                                            <?php echo $inp_array[44]?'checked':'';?>></div>
                                    <div class="col-12">Lens Injury <input type="checkbox" name="inp_46"
                                            <?php echo $inp_array[45]?'checked':'';?>></div>
                                    <div class="col-12">Irregular <input type="checkbox" name="inp_47"
                                            <?php echo $inp_array[46]?'checked':'';?>></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Flap Incision</th>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_48" <?php echo $inp_array[47]?'checked':'';?>>
                                        <label for="beta_clear_cornea_tunnel">Clear Cornea Tunnel</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_49" <?php echo $inp_array[48]?'checked':'';?>>
                                        <label for="beta_temporal">Temporal</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_50" <?php echo $inp_array[49]?'checked':'';?>>
                                        <label for="beta_superior">Superior</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_51" <?php echo $inp_array[50]?'checked':'';?>>
                                        <label for="beta_sciral_tunnel">Sciral Tunnel</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_52" <?php echo $inp_array[51]?'checked':'';?>>
                                        <label for="beta_other">Other</label>
                                    </div>
                                </div>

                            </td>
                            <td colspan="2"> Length: <input type="text" style="width: 4rem;" name="inp_53"
                                    value="<?php echo $inp_array[52];?>" class="form-control-sm">mm
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
                                        <input type="checkbox" name="inp_54" <?php echo $inp_array[53]?'checked':'';?>>
                                        <label for="procedure_capsulorrhexis">Capsulorrhexis</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_55" <?php echo $inp_array[54]?'checked':'';?>>
                                        <label for="procedure_can_opening">Can Opening</label>
                                    </div>
                                    <div class="col-12"> <strong>Size</strong> <input type="text"
                                            class="form-control-sm" value="<?php echo $inp_array[55].'mm';?>"
                                            style="width: 4rem;" name="inp_56">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12">Difficult Nucleus <input type="checkbox" name="inp_57"
                                            <?php echo $inp_array[56]?'checked':'';?>></div>
                                    <div class="col-12">Expression <input type="checkbox" name="inp_58"
                                            <?php echo $inp_array[57]?'checked':'';?>></div>
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
                                        <input type="checkbox" name="inp_59" <?php echo $inp_array[58]?'checked':'';?>>
                                        <label for="procedure_hydroprocedure">Hydroprocedure</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_60" <?php echo $inp_array[59]?'checked':'';?>>
                                        <label for="procedure_nucleus_expression">Nucleus expression</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_61" <?php echo $inp_array[60]?'checked':'';?>>
                                        <label for="procedure_visodelivery">Visodelivery</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_62" <?php echo $inp_array[61]?'checked':'';?>>
                                        <label for="procedure_cortex_irr_asp">Cortex Irr / Asp</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_63" <?php echo $inp_array[62]?'checked':'';?>>
                                        <label for="procedure_methyl_cellulose">2% methyl Cellulose</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_64" <?php echo $inp_array[63]?'checked':'';?>>
                                        <label for="procedure_sodium_hyaluronate">Sodium Hyaluronate</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_65" <?php echo $inp_array[64]?'checked':'';?>>
                                        <label for="procedure_pke_technique">PKE TECHNIQUE</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12">Cortex Remained <input type="checkbox" name="inp_66"
                                            <?php echo $inp_array[65]?'checked':'';?>></div>
                                    <div class="col-12">Heavy Irrigation <input type="checkbox" name="inp_67"
                                            <?php echo $inp_array[66]?'checked':'';?>></div>
                                    <div class="col-12">Capsule Tear <input type="checkbox" name="inp_68"
                                            <?php echo $inp_array[67]?'checked':'';?>></div>
                                    <div class="col-12">Nucleus Drop <input type="checkbox" name="inp_69"
                                            <?php echo $inp_array[68]?'checked':'';?>></div>
                                    <div class="col-12">Vitreous Loss <input type="checkbox" name="inp_70"
                                            <?php echo $inp_array[69]?'checked':'';?>></div>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <th>Phaco Plane Posterior</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_72" <?php echo $inp_array[71]?'checked':'';?>>
                                        <label for="location_endo_capsular">Endo Capsular</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_73" <?php echo $inp_array[72]?'checked':'';?>>
                                        <label for="location_iris_plane">Iris Plane</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_74" <?php echo $inp_array[73]?'checked':'';?>>
                                        <label for="location_anterior_chamber">Anterrior Chamber</label>
                                    </div>
                                </div>
                            </td>
                            <td> Vitreous Haemorrhage <input type="checkbox" name="inp_75"
                                    <?php echo $inp_array[74]?'checked':'';?>></td>
                        </tr>
                        <tr>
                            <th>Capsulotomy</th>
                            <td>
                                <select name="inp_76">
                                    <option value="Yes" <?php echo $inp_array[75]=='Yes'?'selected':''; ?>>Yes</option>
                                    <option value="No" <?php echo $inp_array[75]=='No'?'selected':''; ?>>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Lens Insertion</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_77" <?php echo $inp_array[76]?'checked':'';?>>
                                        <label for="yes_posterior_chamber">Posterior Chamber</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_78"
                                            <?php echo $inp_array[77]?'checked':'';?>>IN the Bag</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_79" <?php echo $inp_array[78]?'checked':'';?>>
                                        <label for="yes_sulcus_fixated">Sulcus Fixated</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_80" <?php echo $inp_array[79]?'checked':'';?>>
                                        <label for="yes_anterior_chamber">Anterrior Chamber</label>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12">Corneal Damage <input type="checkbox" name="inp_81"
                                            <?php echo $inp_array[80]?'checked':'';?>></div>
                                    <div class="col-12">Corneal touch <input type="checkbox" name="inp_82"
                                            <?php echo $inp_array[81]?'checked':'';?>></div>
                                    <div class="col-12">Viterous loss <input type="checkbox" name="inp_83"
                                            <?php echo $inp_array[82]?'checked':'';?>></div>
                                    <div class="col-12">Inadequate Support <input type="checkbox" name="inp_84"
                                            <?php echo $inp_array[83]?'checked':'';?>></div>
                                    <div class="col-12">Excessve Manipulation <input type="checkbox" name="inp_85"
                                            <?php echo $inp_array[84]?'checked':'';?>>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Capsule Polishing</th>
                            <td><strong>Anterior Capsule</strong></td>
                            <td> <select name="inp_86">
                                    <option value="Adequate" <?php echo $inp_array[85]=='Adequate'?'selected':''; ?>>
                                        Adequate</option>
                                    <option value="Inadequate"
                                        <?php echo $inp_array[85]=='Inadequate'?'selected':''; ?>>Inadequate</option>
                                </select></td>
                            <td><strong>Posterior Capsule</strong></td>
                            <td> <select name="inp_87">
                                    <option value="Adequate" <?php echo $inp_array[86]=='Adequate'?'selected':''; ?>>
                                        Adequate</option>
                                    <option value="Inadequate"
                                        <?php echo $inp_array[86]=='Inadequate'?'selected':''; ?>>Inadequate</option>
                                </select></td>
                        </tr>
                        <tr>
                            <th>OVD Removal</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_88" <?php echo $inp_array[87]?'checked':'';?>>
                                        <label for="yes_two_plain">Two Plain</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_89" <?php echo $inp_array[88]?'checked':'';?>>
                                        <label for="yes_rock_and_roll">Rock & Roll</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_90" <?php echo $inp_array[89]?'checked':'';?>>
                                        <label for="yes_single_plain">Single/ Plain</label>
                                    </div>
                                </div>
                            </td>
                            <td></td>
                            <td rowspan="4" colspan="2">
                                <div class="row">
                                    <div class="col-12"><strong>Intra Cameral Drug Used</strong></div>
                                    <div class="col-12 my-2">
                                        Adrenaline <select name="inp_91">
                                            <option value="Yes" <?php echo $inp_array[90]=='Yes'?'selected':''; ?>>Yes
                                            </option>
                                            <option value="No" <?php echo $inp_array[90]=='No'?'selected':''; ?>>No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-12 my-2">
                                        Miotic <select name="inp_92">
                                            <option value="Yes" <?php echo $inp_array[91]=='Yes'?'selected':''; ?>>Yes
                                            </option>
                                            <option value="No" <?php echo $inp_array[91]=='No'?'selected':''; ?>>No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-12 my-2">
                                        Antibiotic <select name="inp_93">
                                            <option value="Yes" <?php echo $inp_array[92]=='Yes'?'selected':''; ?>>Yes
                                            </option>
                                            <option value="No" <?php echo $inp_array[92]=='No'?'selected':''; ?>>No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-12 my-2">
                                        Topical Betadine <select name="inp_94">
                                            <option value="Yes" <?php echo $inp_array[93]=='Yes'?'selected':''; ?>>Yes
                                            </option>
                                            <option value="No" <?php echo $inp_array[93]=='No'?'selected':''; ?>>No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-12 my-2">
                                        Triamcinolone <select name="inp_95">
                                            <option value="Yes" <?php echo $inp_array[94]=='Yes'?'selected':''; ?>>Yes
                                            </option>
                                            <option value="No" <?php echo $inp_array[94]=='No'?'selected':''; ?>>No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Reformation of AC</th>
                            <td>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_95" <?php echo $inp_array[94]?'checked':'';?>>
                                        <label for="yes_two_plain">Two Plain</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_96" <?php echo $inp_array[95]?'checked':'';?>>
                                        <label for="yes_rock_and_roll">Rock & Roll</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_97" <?php echo $inp_array[96]?'checked':'';?>>
                                        <label for="yes_single_plain">Single/ Plain</label>
                                    </div>
                                </div>

                            </td>
                            <td><strong>Wound leak </strong>
                                <select name="inp_98">
                                    <option value="Yes" <?php echo $inp_array[97]=='Yes'?'selected':''; ?>>Yes</option>
                                    <option value="No" <?php echo $inp_array[97]=='No'?'selected':''; ?>>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Wound Sutured</th>
                            <td>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_99" <?php echo $inp_array[98]?'checked':'';?>>
                                        <label for="yes_no">No</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_100" <?php echo $inp_array[99]?'checked':'';?>>
                                        <label for="yes_int">Int.</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_101"
                                            <?php echo $inp_array[100]?'checked':'';?>>
                                        <label for="yes_cont">Cont.</label>
                                    </div>
                                </div>

                            </td>
                            <td><strong>Wound Hydrated </strong>
                                <select name="inp_102">
                                    <option value="Yes" <?php echo $inp_array[101]=='Yes'?'selected':''; ?>>Yes</option>
                                    <option value="No" <?php echo $inp_array[101]=='NO'?'selected':''; ?>>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>

                            <th>Wound Security</th>
                            <td><select name="inp_144">
                                    <option value="Adequate" <?php echo $inp_array[143]=='Adequate'?'selected':''; ?>>
                                        Adequate</option>
                                    <option value="Inadequate"
                                        <?php echo $inp_array[143]=='Inadequate'?'selected':''; ?>>Inadequate</option>
                                </select></td>

                            <td>Irisprolapase <input type="checkbox" name="inp_103"
                                    <?php echo $inp_array[102]?'checked':'';?>></td>
                        </tr>
                        <tr>
                            <th rowspan="2">Procedure</th>
                            <td>1.Surgery</td>
                            <td><select name="inp_103">
                                    <option value="Successful"
                                        <?php echo $inp_array[103]=='Successful'?'selected':''; ?>>Successful</option>
                                    <option value="Unsuccessful"
                                        <?php echo $inp_array[103]=='Unsuccessful'?'selected':''; ?>>Unsuccessful
                                    </option>
                                </select></td>


                        </tr>
                        <tr>
                            <td>2.Complications</td>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_104"
                                            <?php echo $inp_array[103]?'checked':'';?>>
                                        <label for="yes_nil">NIL</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_105"
                                            <?php echo $inp_array[104]?'checked':'';?>>
                                        <label for="yes_yes">YES</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_106"
                                            <?php echo $inp_array[105]?'checked':'';?>>
                                        <label for="yes_specify">Specify</label> <input type="text"
                                            value="<?php echo $inp_array[142];?>" name="inp_143" class="form-control">
                                    </div>
                                </div>
                            </td>


                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-12 text center"><strong>Phaco-I</strong></div>
                                    <div class="col-12">Vacuum <input type="text" value="<?php echo $inp_array[106];?>"
                                            class="form-control" name="inp_107">
                                    </div>
                                    <div class="col-12">Flow RAte <input type="text"
                                            value="<?php echo $inp_array[107];?>" class="form-control" name="inp_108">
                                    </div>
                                    <div class="col-12">Us Power <input type="text"
                                            value="<?php echo $inp_array[108];?>" class="form-control" name="inp_109 ">
                                    </div>
                                    <div class="col-12">Fluid Required <input type="text"
                                            value="<?php echo $inp_array[109];?>" class="form-control" name="inp_110">
                                        C.C
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="row">
                                    <div class="col-12 text center"><strong>Phaco-II</strong></div>
                                    <div class="col-12">Vacuum <input type="text" value="<?php echo $inp_array[110];?>"
                                            class="form-control" name="inp_111">
                                    </div>
                                    <div class="col-12">Flow RAte <input type="text"
                                            value="<?php echo $inp_array[111];?>" class="form-control" name="inp_112">
                                    </div>
                                    <div class="col-12">Us Power <input type="text"
                                            value="<?php echo $inp_array[112];?>" class="form-control" name="inp_113">
                                    </div>
                                    <div class="col-12">Fluid Required <input type="text" class="form-control"
                                            value="<?php echo $inp_array[114];?>" name="inp_114"> C.C
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12 text center"><strong>I/A</strong></div>
                                    <div class="col-12">Vacuum <input type="text" value="<?php echo $inp_array[114];?>"
                                            class="form-control" name="inp_115">
                                    </div>
                                    <div class="col-12">Flow RAte <input type="text"
                                            value="<?php echo $inp_array[115];?>" class="form-control" name="inp_116">
                                    </div>
                                    <div class="col-12">Us Power <input type="text"
                                            value="<?php echo $inp_array[116];?>" class="form-control" name="inp_117">
                                    </div>
                                    <div class="col-12">Fluid Required <input type="text"
                                            value="<?php echo $inp_array[117];?>" class="form-control" name="inp_118">
                                        C.C
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12">Phaco Time <input type="time" class="form-control"
                                            value="<?php echo $inp_array[118];?>" name="inp_119"></div>
                                    <div class="col-12">Surgery Time <input type="time" class="form-control"
                                            value="<?php echo $inp_array[119];?>" name="inp_120"></div>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Us Power</th>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_121"
                                            <?php echo $inp_array[120]?'checked':'';?>>
                                        <label for="yes_linear">Linear</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_122"
                                            <?php echo $inp_array[121]?'checked':'';?>>
                                        <label for="yes_pulse">Pulse</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" name="inp_123"
                                            <?php echo $inp_array[122]?'checked':'';?>>
                                        <label for="yes_any_other">Any Other</label>
                                    </div>
                                </div>
                            </td>
                            <td>Any Other Specify: <input type="text" class="form-control"
                                    value="<?php echo $inp_array[123];?>" name="inp_124"></td>
                            <td colspan="2">Signature of Doctor: <input type="text"
                                    value="<?php echo $inp_array[124];?>" class="form-control" name="inp_125">
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="container border p-2">
                    <h3 class="text-center">Post Operative Data Record</h3>
                    <h3 class="text-center">OD/OS</h3>
                    <table class="table table-bordered">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <?php
                                    for($i=0;$i<3;$i++){
                                        echo<<<data
                                          <td>
                                        <strong>
                                            <label for=""> Date:</label>
                                            <input type="date" name="$i" value="{$dyn_array[$i]}">
                                        </strong>
                                    </td>
                                    data;
                                    }
                                    ?>
                            </tr>
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
                                        <td >
                                      <input type="text" class="form-control" name="{$nameValue}" value="{$dyn_array[$i + 6]}">
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
                                        <td >
                                      <input type="text" class= "form-control" name="{$nameValue}" value="{$dyn_array[8+ $i]}">
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
                                      <input type="text" class="form-control" name="{$nameValue}" value="{$dyn_array[10 + $i]}">
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
                                      <input type="text" class= "form-control" name="{$nameValue}"" value="{$dyn_array[12 + $i]}" >
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
                                      <input type="text" class= "form-control"name="{$nameValue}" value="{$dyn_array[14 + $i]}" >
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
                                        <div class="col-12"><input type="text" class="form-control" name="{$nameValue}" value="{$dyn_array[16+$i]}" ></div> 
                                        <div class="col-12"><input type="text" class="form-control" name="{$nameValue1}" value="{$dyn_array[18+$i]}" ></div> 
                                        <div class="col-12"><input type="text" class="form-control" name="{$nameValue2}" value="{$dyn_array[20+$i]}" ></div> 
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
                                    <input type="text" style="width:5rem;" name="{$nameValue}" value="{$dyn_array[22+ $i]}" >
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
                                        <input type="text" style="width:5rem;" name="{$nameValue}" value="{$dyn_array[24 + $i]}"> mm of Hg GAT
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
                                        Rx: <textarea class="form-control" name="{$nameValue}">{$dyn_array[27 + $i]}</textarea>
                                    </td>
data;
                                    }
                                    ?>

                            </tr>
                        </tbody>
                    </table>
                    <div class="container mt-5">
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
                                            <td><input type="text" value="<?php echo $inp_array[126];?>"
                                                    class="form-control" name="inp_127">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[127];?>"
                                                    class="form-control" name="inp_128">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[128];?>"
                                                    class="form-control" name="inp_129">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[129];?>"
                                                    class="form-control" name="inp_130">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[130];?>"
                                                    class="form-control" name="inp_131">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[131];?>"
                                                    class="form-control" name="inp_132">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[132];?>"
                                                    class="form-control" name="inp_133">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[133];?>"
                                                    class="form-control" name="inp_134"></td>
                                        </tr>
                                        <tr>
                                            <th>Near</th>
                                            <td><input type="text" value="<?php echo $inp_array[134];?>"
                                                    class="form-control" name="inp_135">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[135];?>"
                                                    class="form-control" name="inp_136">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[136];?>"
                                                    class="form-control" name="inp_137">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[137];?>"
                                                    class="form-control" name="inp_138"></td>
                                            <td><input type="text" value="<?php echo $inp_array[138];?>"
                                                    class="form-control" name="inp_139">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[139];?>"
                                                    class="form-control" name="inp_140">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[140];?>"
                                                    class="form-control" name="inp_141">
                                            </td>
                                            <td><input type="text" value="<?php echo $inp_array[141];?>"
                                                    class="form-control" name="inp_142"></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <label for=""> Date: </label>
                                    <input type="date" class="form-control" style="width:17rem;"
                                        value="<?php echo $inp_array[142];?>" name="inp_143">

                                </div>
                                <button type="submit" class="btn btn-primary my-4" name="submit">Submit</button>
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

</html>