<?php
session_start();
  if(isset($_REQUEST['logout'])){
    session_unset();
    session_destroy();
  }
//prevent access of doctor page without login
  if(!isset($_SESSION['receptionist_id']) ){
    header("location:login.php");
  }
  require("../admin/connect.php");

  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

  
  

if (isset($_POST['submit'])) {

    $id = $_GET['id'];
    $is_ipd = 1;
    $sql10 = "SELECT * FROM patient_records WHERE id = '$id';";
    $data10 = $conn->query($sql10);
    $res10 = $data10->fetch_assoc();
    $username = $res10['mobile'];
    $password = $res10['mobile'];    
    $update2="UPDATE `p_log` SET `is_ipd` = '$is_ipd',`username`='$username',`password`='$password' WHERE `id` = '$id'";
    $conn->query($update2);

    $stay_charge = $_POST['stay_charge'];
    $t_days = $_POST['t_days1'];
    
    $t_stay  = $_POST['t_stay'];
    $cd_fee  = $_POST['cd_fee'];
    $c_days  = $_POST['c_days'];
    $t_fee  = $_POST['t_fee'];
    $visit  = $_POST['visit'];
    $no_visits  = $_POST['no_visits'];
    $t_visits  = $_POST['t_visits'];
    $nursing  = $_POST['nursing'];
    $total  = $_POST['total'];
    $total_nc  = $_POST['total_nc'];
    $ot  = $_POST['ot'];
    $ot_charge  = $_POST['ot_charge'];
    $total_ot = $_POST['total_ot'];
    $ana  = $_POST['ana'];
    $ana_cd  = $_POST['ana_cd'];
    $total_ana  = $_POST['total_ana'];
    $su_fee  = $_POST['su_fee'];
    $s_visits  = $_POST['s_visits'];
    $total_su  = $_POST['total_su'];
    $treat_charges  = $_POST['treat_charges']; 
    $treat_days  = $_POST['treat_days'];   
    $total_treat  = $_POST['total_treat'];
    $c_arm  = $_POST['c_arm'];
    $c_arm= $_POST['c_arm'];
    $count_carm  = $_POST['count_carm'];
    $total_carm  = $_POST['total_carm'];
    $ecg_charge  = $_POST['ecg_charge'];
    $total_ecg  = $_POST['total_ecg'];
    $total_ecg_charge  = $_POST['total_ecg_charge'];
    
    $update="UPDATE `ipd_bill1` SET `stay_charge` = '$stay_charge', `t_days` ='$t_days', `t_stay` ='$t_stay', `cd_fee` ='$cd_fee', `c_days` ='$c_days', `t_fee` ='$t_fee', `visit` ='$visit', `no_visits` ='$no_visits', `t_visits` ='$t_visits', `nursing` ='$nursing', `total` ='$total', `total_nc` ='$total_nc', `ot` ='$ot', `ot_charge` ='$ot_charge', `total_ot` ='$total_ot', `ana` ='$ana', `ana_cd` ='$ana_cd', `total_ana` ='$total_ana', `su_fee` ='$su_fee', `s_visits` ='$s_visits', `total_su` ='$total_su', `treat_charges` ='$treat_charges', `treat_days` ='$treat_days', `total_treat` ='$total_treat', `c_arm` ='$c_arm', `count_carm` ='$count_carm', `total_carm` ='$total_carm', `ecg_charge` ='$ecg_charge', `total_ecg` ='$total_ecg', `total_ecg_charge` ='$total_ecg_charge'  WHERE `id` = '$id'";
    $conn->query($update);


    $xray  = $_POST['xray'];
    $t_xray = $_POST['t_xray'];
    $t_xfee = $_POST['t_xfee'];
    $m_charge = $_POST['m_charge'];
    $m_days = $_POST['m_days'];
    $t_mcharge = $_POST['t_mcharge'];
    $v_sfee = $_POST['v_sfee'];
    $v_visits = $_POST['v_visits'];
    $t_sfee = $_POST['t_sfee'];
    $i_charge = $_POST['i_charge'];
    $n_imp = $_POST['n_imp'];
    $t_icharge = $_POST['t_icharge'];
    $p_charge = $_POST['p_charge'];
    $n_tests = $_POST['n_tests'];
    $t_pcharge = $_POST['t_pcharge'];
    $med = $_POST['med'];
    $med_quant = $_POST['med_quant'];
    $med_tot = $_POST['med_tot'];
    $plaster = $_POST['plaster'];
    $plaster_quant = $_POST['plaster_quant'];
    $plaster_tot = $_POST['plaster_tot'];
    $other = $_POST['other'];
    $quant = $_POST['quant'];
    $total = $_POST['total'];
    $tot_pay = $_POST['tot_pay'];
    $adv = $_POST['adv'];
    $pay_method = $_POST['pay_method'];
    $pay_due = $_POST['pay_due'];
    $discount =$_POST['discount'];
    $payable =$_POST['payable'];
    $payment_id =$_POST['Pi'];


    $update1="UPDATE `ipd_bill2` SET `xray` = '$xray', `t_xray` = '$t_xray', `t_xfee` = '$t_xfee', `m_charge` = '$m_charge', `m_days` = '$m_days', `t_mcharge` = '$t_mcharge', `v_sfee` = '$v_sfee', `v_visits` = '$v_visits', `t_sfee` = '$t_sfee', `i_charge` = '$i_charge', `n_imp` = '$n_imp', `t_icharge` = '$t_icharge', `p_charge` = '$p_charge', `n_tests` = '$n_tests', `t_pcharge` = '$t_pcharge',  `med` = '$med', `med_quant` = '$med_quant', `med_tot` = '$med_tot', `plaster` = '$plaster',`plaster_quant` = '$plaster_quant', `plaster_tot` = '$plaster_tot',`other` = '$other',`quant` = '$quant',`total` = '$total',`tot_pay` = '$tot_pay', `adv` = '$adv',`pay_method` = '$pay_method',`pay_due` = '$pay_due' ,`discount`='$discount',`payable`='$payable',`payment_id` = '$payment_id' WHERE `id` = '$id'";
    $conn->query($update1);

    echo "<div class='alert alert-success'> Updated Successfully</div>";
    $description = '{"0":{"name":"stay","stay_charge_per_day":"'.$stay_charge.'","totalnumberofdays":"'.$t_days.'","total_stay_charge":"'.$t_stay.'"},"1":{"name":"Consluted Doctor","consulted_doctor_fees":"'.$cd_fee.'","total_consulted_days":"'.$c_days.'","total_consulted_fees":"'.$t_fee.'"},"2":{"name":"Visit","visit":"'.$visit.'","no_of_visit":"'.$no_visits.'","total_visit_fees":"'.$t_visits.'"},"3":{"name":"Nursing","nursing":"'.$nursing.'","total_nursing":"'.$total.'","total_nursing_charge":"'.$total_nc.'"},"4":{"name":"OT","ot":"'.$ot.'","ot_charge":"'.$ot_charge.'","total_ot_charge":"'.$total_ot.'"},"5":{"name":"Anasthesia","anasthesia":"'.$ana.'","anasthesia_charge_days":"'.$ana_cd.'","total_anasthesia_fees":"'.$total_ana.'"},"6":{"name":"Surgeon","surgeon_fees":"'.$su_fee.'","surgeon_visits":"'.$s_visits.'","total_surgeon_visits":"'.$total_su.'"},"7":{"name":"Treatment","treatment_charge":"'.$treat_charges.'","no_of_days":"'.$treat_days.'","total_treatment_charge":"'.$total_treat.'"},"8":{"name":"C-ARM","carm":"'.$c_arm.'","carm_count":"'.$count_carm.'","total_carm_fees":"'.$total_carm.'"},"9":{"name":"ECG","ecg":"'.$ecg_charge.'","total_ecg":"'.$total_ecg.'","total_ecg_charge":"'.$total_ecg_charge.'"},"10":{"name":"XRAY","xray":"'.$xray.'","total_xray":"'.$t_xray.'","total_xray_fees":"'.$t_xfee.'"},"11":{"name":"Moniter Charges","monitor_charge":"'.$m_charge.'","no_of_days":"'.$m_days.'","total_monitor_charge":"'.$t_mcharge.'"},"12":{"name":"Visiting Surgeon Fee","visiting_surgeon_fees":"'.$v_sfee.'","visiting_surgeon_no_of_visits":"'.$v_visits.'","total_visit_surgeon_fees":"'.$t_sfee.'"},"13":{"name":"Implant","implant_charges":"'.$i_charge.'","no_of_days":"'.$n_imp.'","total_implant_charge":"'.$t_icharge.'"},"14":{"name":"Pathology Charges","pathology_charge":"'.$p_charge.'","no_of_tests":"'.$n_tests.'","total_pathology_charge":"'.$t_pcharge.'"},"15":{"name":"Medicines","medicines":"'.$med.'","medicine_quanity_times":"'.$med_quant.'","total_medical_charge":"'.$med_tot.'"},"17":{"name":"Plaster","plaster":"'.$plaster.'","plaster_quantity":"'.$plaster_quant.'","total_plaster_charge":"'.$plaster_tot.'"},"18":{"name":"Other","other_charges":"'.$other.'","quantity":"'.$quant.'","total_charge":"'.$total.'"}}';

    $update3 = "UPDATE `ipd_bill1` SET `description` = '$description' WHERE `id` = '$id';";
    $conn->query($update3);


    $sql = "SELECT * FROM ipd_bill1 WHERE id = '$id';";
    $data = $conn->query($sql);
    $res = $data->fetch_assoc();


    $sql1 = "SELECT * FROM ipd_bill2 WHERE id = '$id';";
    $data1 = $conn->query($sql1);
    $res1 = $data1->fetch_assoc();
    
    
    $msg = "Details Updated successfully";
}
else{

    $id = $_GET['id'];
    $sql = "SELECT * FROM ipd_bill1 WHERE id = '$id';";
    $data = $conn->query($sql);
    $res = $data->fetch_assoc();

    $sql1 = "SELECT * FROM ipd_bill2 WHERE id = '$id';";
    $data1 = $conn->query($sql1);
    $res1 = $data1->fetch_assoc();

    $msg = " ";

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body style="background-color:#90D0E5;">
    <h1><marquee style="color: purple;" BEHAVIOUR="slide"scrollnount="70"scrolledeley="100">
    <?php echo $title['ro']?>
        </marquee>
     </h1>
        <button class="btn btn-success m-2" id="dashboard" cookieName="ipd-referer">Dashboard</button>
    <div class="container">
        <div class="col m-4 p-4 shadow-lg rounded">
            <h2 style="text-align: center; color: red;"> IPD Billing Section</h2>
            <form method="POST" action="">
                <div class="row mt-4">
                    
                    <br>
                    <div class="col-4">
                        <label for="" class="form-label">Stay Charge per day</label>
                        <input type="hidden" name="stay_charge1" value="stay">
                        <select class="form-control stay" name="stay_charge" onchange="stays()">

                            <option value="600" <?php if ($res['stay_charge'] == '600') {
                                      echo 'selected';
                                    } ?>>General</option>
                            <option value="1000" <?php if ($res['stay_charge'] == '1000') {
                                      echo 'selected';
                                    } ?>>Semi Special Room</option>
                            <option value="1500" <?php if ($res['stay_charge'] == '1500') {
                                      echo 'selected';
                                    } ?>>Special Room</option>
                            <option value="2500" <?php if ($res['stay_charge'] == '2500') {
                                      echo 'selected';
                                    } ?>>Deluxe room without AC</option>
                            <option value="3000" <?php if ($res['stay_charge'] == '3000') {
                                      echo 'selected';
                                    } ?>>Deluxe room with AC</option>
                            
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="totalnumberofdays" class="form-label">Total Number of Days</label>
                        <input type="text"  value="<?php echo $res['t_days']; ?>" name="t_days1" class="form-control totalnumberofdays" name="ipd[0][totalnumberofdays]" placeholder="Total Number of Days" id="totalnumberofdays" onchange="stays()"   >
                    </div>
                    <div class="col-4">
                        <label for="tsc" class="form-label">Total Stay Charge</label>
                        <input type="text"  value="<?php echo $res['t_stay']; ?>" name="t_stay"  class="form-control tsc"  placeholder="Total Consulted Fees" id="tsc"   >
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4">
                        <label for="consulteddoctorfees" class="form-label">Consluted Doctor Fees</label>
                        <input type="hidden" name="ipd[1][name]" value="Consluted">
                        <input type="hidden" name="ipd[1][name]" value="Consluted Doctor">
                        <input type="text"  value="<?php echo $res['cd_fee']; ?>" name="cd_fee"  class="form-control consulteddoctorfees"  placeholder="Consulted Doctor Fees"   onchange="consulted()">
                    </div>
                    <div class="col-4">
                        <label for="totalconsulteddays" class="form-label">Total Consulted Days</label>
                        <input type="text"  value="<?php echo $res['c_days']; ?>" name="c_days"  class="form-control totalconsulteddays"  placeholder="Total Consulted Days" id="totalconsulteddays" onchange="consulted()"   >
                    </div>
                    <div class="col-4">
                        <label for="totalconsultedfees" class="form-label">Total Consulted Fees</label>
                        <input type="text"  value="<?php echo $res['t_fee']; ?>" name="t_fee"  class="form-control totalconsultedfees"  placeholder="Total Consulted Fees" id="totalconsultedfees"  onchange="consulted()" >
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4">
                        <input type="hidden" name="ipd[2][name]" value="Visit">
                        <label for="visit" class="form-label">Visit</label>
                        <input type="text"  value="<?php echo $res['visit']; ?>" name="visit"  class="form-control visit"  placeholder="Visit" id="visit"    onchange="visiti()" >
                    </div>
                    <div class="col-4">
                        <label for="nv" class="form-label">No of Visits</label>
                        <input type="text"  value="<?php echo $res['no_visits']; ?>" name="no_visits"  class="form-control nv"  placeholder="No. of Visits" id="nv" onchange="visiti()"    >
                    </div>
                    <div class="col-4">
                        <label for="tvf" class="form-label">Total Visit Fees</label>
                        <input type="text"  value="<?php echo $res['t_visits']; ?>" name="t_visits"  class="form-control tvf"  placeholder="Total Visit Fees" id="tvf"   onchange="visiti()"  >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <input type="hidden" name="ipd[3][name]" value="Nursing">
                        <label for="nursing" class="form-label">Nursing</label>
                        <input type="text"  value="<?php echo $res['nursing']; ?>" name="nursing"  class="form-control nursing"  placeholder="Nursing" id="nursing"  onchange="nursings()" >
                    </div>
                    <div class="col-4">
                        <label for="totalnursing" class="form-label">Total</label>
                        <input type="text"  value="<?php echo $res['total']; ?>" name="total"  class="form-control totalnursing"  placeholder="Nursing Total" id="totalnursing" onchange="nursings()"   >
                    </div>
                    <div class="col-4">
                        <label for="tnc" class="form-label">Total Nursing Charge</label>
                        <input type="text"  value="<?php echo $res['total_nc']; ?>" name="total_nc"  class="form-control tnc"  placeholder="Total Nursing Charge" id="tnc"   onchange="nursings()">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <label for="ot" class="form-label">OT</label>
                        <input type="hidden" name="ipd[4][name]" value="OT">
                        <input type="text"  value="<?php echo $res['ot']; ?>" name="ot"  class="form-control ot"  placeholder="OT" id="ot"  onchange="ots()"  >
                    </div>
                    <div class="col-4">
                        <label for="otc" class="form-label">OT Charge</label>

                        <input type="text"   value="<?php echo $res['ot_charge']; ?>" name="ot_charge" class="form-control otc"  placeholder="OT Charge" id="otc" onchange="ots()"   >
                    </div>
                    <div class="col-4">
                        <label for="toc" class="form-label">Total OT Charge</label>
                        <input type="text"  value="<?php echo $res['total_ot']; ?>" name="total_ot"  class="form-control toc"  placeholder="Total OT Charge" id="toc"  onchange="ots()"  >
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4">
                        <label for="anasthesia" class="form-label">Anasthesia</label>
                        <input type="hidden" name="ipd[5][name]" value="Anasthesia">
                        <input type="text"  value="<?php echo $res['ana']; ?>" name="ana"  class="form-control anasthesia"  placeholder="Anasthesia" id="anasthesia" onchange="anasthesias()"   >
                    </div>
                    <div class="col-4">
                        <label for="acd" class="form-label">Anasthesia Charge Days</label>
                        <input type="text"  value="<?php echo $res['ana_cd']; ?>" name="ana_cd"  class="form-control acd"  placeholder="Anasthesia Charge" id="acd" onchange="anasthesias()"   >
                    </div>
                    <div class="col-4">
                        <label for="tac" class="form-label">Total Anasthesia Charge</label>
                        <input type="text"  value="<?php echo $res['total_ana']; ?>" name="total_ana"  class="form-control tac"  placeholder="Total Anasthesia Charge" id="tac"   onchange="anasthesias()"  >
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4">
                        <label for="sf" class="form-label">Surgeon Fee</label>
                        <input type="hidden" name="ipd[6][name]" value="Surgeon">
                        <input type="text"  value="<?php echo $res['su_fee']; ?>" name="su_fee"  class="form-control sf"  placeholder="Surgeon Fee" id="sf" onchange="surgeon()"   >
                    </div>
                    <div class="col-4">
                        <label for="snv" class="form-label">Surgeon No of Visits</label>
                        <input type="text"  value="<?php echo $res['s_visits']; ?>" name="s_visits"  class="form-control snv"  placeholder="Surgeon No. of Visits" id="snc" onchange="surgeon()"   >
                    </div>
                    <div class="col-4">
                        <label for="tsf" class="form-label">Total Surgeon Fees</label>
                        <input type="text"  value="<?php echo $res['total_su']; ?>" name="total_su"  class="form-control tsf"  placeholder="Total Surgeon Fees" id="tsf"  onchange="surgeon()"  >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <label for="tc" class="form-label">Treatment Charges</label>
                        <input type="hidden" name="ipd[7][name]" value="Treatment">
                        <input type="text"  value="<?php echo $res['treat_charges']; ?>" name="treat_charges"  class="form-control tc"  placeholder="Treatmennt Charge" id="tc" onchange="treatment()"   >
                    </div>
                    <div class="col-4">
                        <label for="nd" class="form-label">No.of Days</label>
                        <input type="text"  value="<?php echo $res['treat_days']; ?>" name="treat_days"  class="form-control nd"  placeholder="No. of Days" id="nd" onchange="treatment()"    >
                    </div>
                    <div class="col-4">
                        <label for="ttc" class="form-label">Total Treatment Charge</label>
                        <input type="text"  value="<?php echo $res['total_treat']; ?>" name="total_treat"  class="form-control ttc"  placeholder="Total Treatmennt Charge" id="ttc"   onchange="treatment()"   >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <input type="hidden" name="ipd[8][name]" value="C-ARM">
                        <label for="carm" class="form-label">C-ARM</label>
                        <input type="text"  value="<?php echo $res['c_arm']; ?>" name="c_arm"  class="form-control carm"  placeholder="C-ARM" id="carm" value="1000" onchange="carms()"   >
                    </div>
                    <div class="col-4">
                        <label for="carmcount" class="form-label">C-ARM Count</label>
                        <input type="text"  value="<?php echo $res['count_carm']; ?>" name="count_carm"  class="form-control carmcount" name="ipd[8][carm_count]" placeholder="C-ARM Count" id="carmcount" onchange="carms()"   >
                    </div>
                    <div class="col-4">
                        <label for="tcf" class="form-label">Total C-ARM Fees</label>
                        <input type="text"  value="<?php echo $res['total_carm']; ?>" name="total_carm"  class="form-control tcf"  placeholder="Total Surgeon Fees" id="tcf" onchange="carms()"   >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <label for="ecg" class="form-label">ECG Charges</label>
                        <input type="hidden" name="ipd[9][name]" value="ECG">
                        <input type="text"  value="<?php echo $res['ecg_charge']; ?>" name="ecg_charge"  class="form-control ecg"  placeholder="ECG Charges" id="ecg" onchange="ecgs()"   >
                    </div>
                    <div class="col-4">
                        <label for="tecg" class="form-label">Total ECG</label>
                        <input type="text"  value="<?php echo $res['total_ecg']; ?>" name="total_ecg"  class="form-control tecg"  placeholder="Total ECG" id="tecg" onchange="ecgs()"   >
                    </div>
                    <div class="col-4">
                        <label for="tecgc" class="form-label">Total ECG Charge</label>
                        <input type="text"  value="<?php echo $res['total_ecg_charge']; ?>" name="total_ecg_charge"  class="form-control tecgc"  placeholder="Total ECG Charge" id="tecgc" onchange="ecgs()"   >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <input type="hidden" name="ipd[10][name]" value="XRAY">
                        <label for="xray" class="form-label">XRAY</label>
                        <input type="text"  value="<?php echo $res1['xray']; ?>" name="xray"  class="form-control xray"  placeholder="XRAY Fee" id="xray" onchange="xrays()"   >
                    </div>
                    <div class="col-4">
                        <label for="txray" class="form-label">Total XRAY</label>
                        <input type="text"  value="<?php echo $res1['t_xray']; ?>" name="t_xray"  class="form-control txray"  placeholder="Total XRAY" id="txray" onchange="xrays()"   >
                    </div>
                    <div class="col-4">
                        <label for="txrayf" class="form-label">Total XRAY Fees</label>
                        <input type="text"  value="<?php echo $res1['t_xfee']; ?>" name="t_xfee"  class="form-control txrayf"  placeholder="Total XRAY Fees" id="txrayf" onchange="xrays()"  >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <input type="hidden" name="ipd[11][name]" value="Moniter Charges">
                        <label for="mc" class="form-label">Moniter Charges</label>
                        <input type="text"  value="<?php echo $res1['m_charge']; ?>" name="m_charge"  class="form-control mc" placeholder="Monitor Charge" id="mc" value="500" onchange="moniters()">
                    </div>
                    <div class="col-4">
                        <label for="ndm" class="form-label">No.of Days</label>
                        <input type="text"  value="<?php echo $res1['m_days']; ?>" name="m_days"  class="form-control ndm"  placeholder="No. of Days" id="ndm" onchange="moniters()"   >
                    </div>
                    <div class="col-4">
                        <label for="tmc" class="form-label">Total Monitor Charge</label>
                        <input type="text"  value="<?php echo $res1['t_mcharge']; ?>" name="t_mcharge"  class="form-control tmc"  placeholder="Total Moniter Charge" id="tmc"  onchange="moniters()" >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <label for="vsf" class="form-label"> Visiting Surgeon Fee</label>
                        <input type="hidden" name="ipd[12][name]" value="Visiting Surgeon Fee">
                        <input type="text"  value="<?php echo $res1['v_sfee']; ?>" name="v_sfee"  class="form-control vsf"  placeholder=" Visiting Surgeon Fee" id="vsf" onchange="vsurgeon()"    >
                    </div>
                    <div class="col-4">
                        <label for="vsnv" class="form-label">Visiting Surgeon No of Visits</label>
                        <input type="text"   value="<?php echo $res1['v_visits']; ?>" name="v_visits"  class="form-control vsnv"   placeholder="Visiting Surgeon No. of Visits" id="vsnv" onchange="vsurgeon()"    >
                    </div>
                    <div class="col-4">
                        <label for="tvsf" class="form-label">Total Visited Surgeon Fees</label>
                        <input type="text"  value="<?php echo $res1['t_sfee']; ?>" name="t_sfee"  class="form-control tvsf"  placeholder="Total Visited Surgeon Fees" id="tvsf"  onchange="vsurgeon()"   >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <label for="ic" class="form-label">Implant Charges</label>
                        <input type="hidden" name="ipd[13][name]" value="Implant">
                        <input type="text"  value="<?php echo $res1['i_charge']; ?>" name="i_charge"  class="form-control ic"  placeholder="Implant Charge" id="ic" onchange="implant()"   >
                    </div>
                    <div class="col-4">
                        <label for="ndi" class="form-label">No.of Implants</label>
                        <input type="text"  value="<?php echo $res1['n_imp']; ?>" name="n_imp"  class="form-control ndi"  placeholder="No. of Implants" id="ndi" onchange="implant()"   >
                    </div>
                    <div class="col-4">
                        <label for="tic" class="form-label">Total Implant Charge</label>
                        <input type="text"  value="<?php echo $res1['t_icharge']; ?>" name="t_icharge"  class="form-control tic"  placeholder="Total Implant Charge" id="tic"   onchange="implant()"  >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <input type="hidden" name="ipd[14][name]" value="Pathology Charges">
                        <label for="pc" class="form-label">Pathology Charges</label>
                        <input type="text"  value="<?php echo $res1['p_charge']; ?>" name="p_charge"  class="form-control pc"  placeholder="Pathology Charge" id="pc" onchange="pathology()"   >
                    </div>
                    <div class="col-4">
                        <label for="nt" class="form-label">No.of Tests</label>
                        <input type="text"   value="<?php echo $res1['n_tests']; ?>" name="n_tests" class="form-control nt"  placeholder="No. of Tests" id="nt" onchange="pathology()"   >
                    </div>
                    <div class="col-4">
                        <label for="tpc" class="form-label">Total Pathology Charge</label>
                        <input type="text"   value="<?php echo $res1['t_pcharge']; ?>" name="t_pcharge" class="form-control tpc" placeholder="Total Pathology Charge" id="tpc"  onchange="pathology()"   >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <label for="medicines" class="form-label"> Medicines</label>
                        <input type="hidden" name="ipd[15][name]" value="Medicines">
                        <input type="text"   value="<?php echo $res1['med']; ?>" name="med" class="form-control medicines"  placeholder=" Medicines" id="medicines" onchange="medicine()"   >
                    </div>
                    <div class="col-4">
                        <label for="mqt" class="form-label">Medicine Quantity Times</label>
                        <input type="text"   value="<?php echo $res1['med_quant']; ?>" name="med_quant" class="form-control mqt" placeholder="Medicine Quantity Times" id="mqt" onchange="medicine()"   >
                    </div>
                    <div class="col-4">
                        <label for="tmcm" class="form-label">Total Medical Charge</label>
                        <input type="text"   value="<?php echo $res1['med_tot']; ?>" name="med_tot" class="form-control tmcm"  placeholder="Medicine Quantity Times" id="tmcm"  onchange="medicine()"  >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <label for="plaster" class="form-label"> Plaster</label>
                        <input type="hidden" name="ipd[17][name]" value="Plaster">
                        <input type="text"   value="<?php echo $res1['plaster']; ?>" name="plaster" class="form-control plaster"  placeholder=" Plaster" id="plaster" onchange="plasters()"    >
                    </div>
                    <div class="col-4">
                        <label for="pq" class="form-label">Plaster Quantity</label>

                        <input type="text"   value="<?php echo $res1['plaster_quant']; ?>" name="plaster_quant" class="form-control pq"  placeholder="Plaster Quantity " id="pq" onchange="plasters()"   >
                    </div>
                    <div class="col-4">
                        <label for="tpcc" class="form-label">Total Plaster Charge</label>
                        <input type="text"   value="<?php echo $res1['plaster_tot']; ?>" name="plaster_tot" class="form-control tpcc"  placeholder="Total Plaster Charge" id="tpcc"   onchange="plasters()"  >
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <label for="oc" class="form-label">Other Charges</label>
                        <input type="hidden" name="ipd[18][name]" value="Other">
                        <input type="text"   value="<?php echo $res1['other']; ?>" name="other" class="form-control oc"  placeholder="Other Charges" id="oc" onchange="other1()"   >
                    </div>
                    <div class="col-4">
                        <label for="q" class="form-label">Quantity</label>
                        <input type="text"   value="<?php echo $res1['quant']; ?>" name="quant" class="form-control q" name="ipd[18][quantity]" placeholder="Quantity" id="q" onchange="other1()"   >
                    </div>
                    <div class="col-4">
                        <label for="tco" class="form-label">Total Charge</label>
                        <input type="text"   value="<?php echo $res1['total']; ?>" name="total" class="form-control tco"  placeholder="Total Treatmennt Charge" id="tco"   onchange="other1()"  >
                    </div>
                </div>
                <div class="row">
                <div class="col-4 mt-4">
                        <label for="tp" class="form-label">Total </label>
                        <input type="text"   value="<?php echo $res1['tot_pay']; ?>" name="tot_pay" class="form-control tp"  placeholder="Total " id="tp" onchange="deposited()" readonly  >
                    </div>
                   
                    <div class="col-4 mt-4">
                        <label for="ad" class="form-label">Discount Amount:</label>
                        <input type="text"   value="<?php echo $res1['discount']; ?>" name="discount" class="form-control ad"  placeholder="Discount" id="discount" onchange="deposited()"   >
                    </div>
                    <div class="col-4 mt-4">
                        <label for="tp" class="form-label">Total Payable</label>
                        <input type="text"   value="<?php echo $res1['payable']; ?>" name="payable" class="form-control tp"  placeholder="Payable" id="payable" onchange="deposited()" readonly   >
                    </div>
                    <div class="col-4 mt-4">
                        <label for="ad" class="form-label">Advance Deposited</label>
                        <input type="text"   value="<?php echo $res1['adv']; ?>" name="adv" class="form-control ad"  placeholder="Advance Deposited" id="ad" onchange="deposited()"   >
                    </div>
                   
                    <div class="col-4 mt-4">
                        <label for="" class="form-label">Payment Mode</label>
                        <select class="form-control" name="pay_method" onchange="Payment_method_control(this)" id="pay_method">
                            

                            <option value="CASH" <?php if ($res1['pay_method'] == 'CASH') {
                                      echo 'selected';
                                    } ?>>CASH</option>

                            <option value="CHECK" <?php if ($res1['pay_method'] == 'CHECK') {
                                      echo 'selected';
                                    } ?>>CHECK</option>

                            <option value="NEFT" <?php if ($res1['pay_method'] == 'NEFT') {
                                      echo 'selected';
                                    } ?>>NEFT</option>
                           
                            <option value="CARD" <?php if ($res1['pay_method'] == 'CARD') {
                                      echo 'selected';
                                    } ?>>CARD</option>

                            <option value="GOOGLE PAY" <?php if ($res1['pay_method'] == 'GOOGLE PAY') {
                                      echo 'selected';
                                    } ?>>GOOGLE PAY</option>

                            <option value="PHONEPE" <?php if ($res1['pay_method'] == 'PHONEPE') {
                                      echo 'selected';
                                    } ?>>PHONEPE</option>
                        </select>
                    </div>
                    <div class="col-4 mt-4" style="display: none;" id="Payment_id">
                        <label for="Pi" class="form-label">Payment Id</label>
                        <input type="text"   value="<?php echo $res1['payment_id']; ?>" name="Pi" class="form-control ad"  placeholder="Payment Id" id="Pi"    >
                    </div>

                </div>
                    <div class="col-4 mt-4">
                        <label for="pd" class="form-label">Payment Due</label>
                        <input type="text" value="<?php echo $res1['pay_due']; ?>" name="pay_due" class="form-control pd"  placeholder="Payment Due" id="pd" onchange="deposited()"  readonly  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"    id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                I hereby Confirm that Patient has paid due bill or expected bill as per Hospital Norms
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"    id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                I agree to all the Terms and Conditions of the Hospital
                            </label>
                        </div>
                    </div>
                </div>
                <div id="btn-hide">
                    <div class="row">
                        <div class="col-1">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-danger" name="submit" id="submit">Submit</button>
                        </div>
                        <div class="col-1">
                            <a href="ipd_print.php?id=<?php echo $id; ?>" class="btn btn-success" id="print">Print</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script>
        function getCookieValue(cookieName) {
    const cookies = document.cookie.split("; ");
    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].split("=");
      if (cookie[0] === cookieName) {
        return cookie[1];
      }
    }
    return null;
  }
      document.getElementById("dashboard").addEventListener("click",()=>{
          var page= document.getElementById("dashboard").getAttribute("cookieName");
          var cookieValue = getCookieValue(page);
          document.cookie = `${page}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
          window.location.href=`${cookieValue}.php?id=<?php echo $id; ?>`;
  
      })
    </script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        Payment_method_control(document.getElementById("pay_method"));
        function Payment_method_control(e){
            let val = e.value;
            if(val!== "CASH"){
                $('#Payment_id').show("slow");
            }
            else{
                $('#Payment_id').hide('slow');
            }
        }
        function stays() {
            var x = 0;
            x = $('.stay').val();
            var y = 0;
            y = $('.totalnumberofdays').val();
            var tsc = parseInt(x) * parseInt(y);
            $('.tsc').val(tsc);
            payble_total();
        }
        function consulted() {
            
            var x = 0;
            x = $('.consulteddoctorfees').val();
            var y = 0;
            y = $('.totalconsulteddays').val();
            var totalconsultedfees = parseInt(x) * parseInt(y);
            $('.totalconsultedfees').val(totalconsultedfees);
            payble_total();
        }

        function visiti() {
            var x = 0;
            x = $('.visit').val();
            var y = 0;
            y = $('.nv').val();
            var tvf = parseInt(x) * parseInt(y);
            $('.tvf').val(tvf);
            payble_total();
        }

        function nursings() {
            var x = 0;
            x = $('#nursing').val();
            var y = 0;
            y = $('.totalnursing').val();
            var tnc = parseInt(x) * parseInt(y)
            $('.tnc').val(tnc);
            payble_total();
        }

        function ots() {
            var x = 0;
            x = $('.ot').val();
            var y = 0;
            y = $('.otc').val();
            var toc = parseInt(x) * parseInt(y)
            $('.toc').val(toc);
            payble_total();
        }

        function anasthesias() {
            var x = 0;
            x = $('.anasthesia').val();
            var y = 0;
            y = $('.acd').val();
            var tac = parseInt(x) * parseInt(y)
            $('.tac').val(tac);
            payble_total();
        }

        function surgeon() {
            var x = 0;
            x = $('.sf').val();
            var y = 0;
            y = $('.snv').val();
            var tsf = parseInt(x) * parseInt(y)
            $('.tsf').val(tsf);
            payble_total();
        }

        function treatment() {
            var x = 0;
            x = $('.tc').val();
            var y = 0;
            y = $('.nd').val();
            var ttc = parseInt(x) * parseInt(y)
            $('.ttc').val(ttc);
            payble_total();
        }

        function carms() {
            var x = 0;
            x = $('.carm').val();
            var y = 0;
            y = $('.carmcount').val();
            var tcf = parseInt(x) * parseInt(y)
            $('.tcf').val(tcf);
            payble_total();
        }

        function ecgs() {
            var x = 0;
            x = $('.ecg').val();
            var y = 0;
            y = $('.tecg').val();
            var tecgc = parseInt(x) * parseInt(y)
            $('.tecgc').val(tecgc);
            payble_total();
        }

        function xrays() {
            var x = 0;
            x = $('.xray').val();
            var y = 0;
            y = $('.txray').val();
            var txrayf = parseInt(x) * parseInt(y)
            $('.txrayf').val(txrayf);
            payble_total();
        }

        function moniters() {
            var x = 0;
            x = $('.mc').val();
            var y = 0;
            y = $('.ndm').val();
            var tmc = parseInt(x) * parseInt(y)
            $('.tmc').val(tmc);
            payble_total();
        }

        function vsurgeon() {
            var x = 0;
            x = $('.vsf').val();
            var y = 0;
            y = $('.vsnv').val();
            var tvsf = parseInt(x) * parseInt(y)
            $('.tvsf').val(tvsf);
            payble_total();
        }

        function implant() {
            var x = 0;
            x = $('.ic').val();
            var y = 0;
            y = $('.ndi').val();
            var tic = parseInt(x) * parseInt(y)
            $('.tic').val(tic);
            payble_total();
        }

        function pathology() {
            var x = 0;
            x = $('.pc').val();
            var y = 0;
            y = $('.nt').val();
            var tpc = parseInt(x) * parseInt(y)
            $('.tpc').val(tpc);
            payble_total();
        }

        function medicine() {
            var x = 0;
            x = $('.medicines').val();
            var y = 0;
            y = $('.mqt').val();
            var tmcm = parseInt(x) * parseInt(y)
            $('.tmcm').val(tmcm);
            payble_total();
        }

        function physiotherapy() {
            var x = 0;
            x = $('.pc').val();
            var y = 0;
            y = $('.ndt').val();
            var tpc = parseInt(x) * parseInt(y)
            $('.tpc').val(tpc);
            payble_total();
        }

        function plasters() {
            var x = 0;
            x = $('.plaster').val();
            var y = 0;
            y = $('.pq').val();
            var tpcc = parseInt(x) * parseInt(y)
            $('.tpcc').val(tpcc);
            payble_total();
        }

        function other1() {
            var x = 0;
            x = $('.oc').val();
            var y = 0;
            y = $('.q').val();
            var tco = parseInt(x) * parseInt(y)
            $('.tco').val(tco);
            payble_total();
        }

        function other2() {
            var x = 0;
            x = $('.oc2').val();
            var y = 0;
            y = $('.q2').val();
            var tco2 = parseInt(x) * parseInt(y)
            $('.tco2').val(tco2);
            payble_total();
        }

        function other3() {
            var x = 0;
            x = $('.oc3').val();
            var y = 0;
            y = $('.q3').val();
            var tco3 = parseInt(x) * parseInt(y)
            $('.tco3').val(tco3);
            payble_total();
        }

        function deposited() {
            var x = 0;
            x = $('#ad').val()
            var y = 0;
            y = $('#tp').val()
            
            var dis = 0;
            dis=parseInt(document.getElementById("discount").value);
            var pay = parseInt(y)- dis;
            $('#payable').val(pay);
            
            var ad=parseInt(document.getElementById("ad").value);
            var due = parseInt(pay)-parseInt(ad);
            $('#pd').val(due);
           
        }

        function payble_total() {
            var tsc =parseInt($('#tsc').val());
            if ($('#tsc').val() != '' && tsc>1) {
                var tsc = $('#tsc').val();
            } else {
                var tsc = 0;
            }
            if ($('#totalconsultedfees').val() != '') {
                var totalconsultedfees = $('#totalconsultedfees').val();
            } else {
                var totalconsultedfees = 0;
            }
            if ($('#tvf').val() != '') {
                var tvf = $('#tvf').val();
            } else {
                var tvf = 0;
            }
            if ($('#tnc').val() != '') {
                var tnc = $('#tnc').val();
            } else {
                var tnc = 0;
            }
            if ($('#toc').val() != '') {
                var toc = $('#toc').val();
            } else {
                var toc = 0;
            }
            if ($('#tac').val() != '') {
                var tac = $('#tac').val();
            } else {
                var tac = 0;
            }
            if ($('#tsf').val() != '') {
                var tsf = $('#tsf').val();
            } else {
                var tsf = 0;
            }
            if ($('#ttc').val() != '') {
                var ttc = $('#ttc').val();
            } else {
                var ttc = 0;
            }
            if ($('#tcf').val() != '') {
                var tcf = $('#tcf').val();
            } else {
                var tcf = 0;
            }
            if ($('#tecgc').val() != '') {
                var tecgc = $('#tecgc').val();
            } else {
                var tecgc = 0;
            }

            if ($('#txrayf').val() != '') {
                var txrayf = $('#txrayf').val();
            } else {
                var txrayf = 0;
            }
            if ($('#tmc').val() != '') {
                var tmc = $('#tmc').val();
            } else {
                var tmc = 0;
            }
            if ($('#tvsf').val() != '') {
                var tvsf = $('#tvsf').val();
            } else {
                var tvsf = 0;
            }
            if ($('#tic').val() != '') {
                var tic = $('#tic').val();
            } else {
                var tic = 0;
            }
            if ($('#tmcm').val() != '') {
                var tmcm = $('#tmcm').val();
            } else {
                var tmcm = 0;
            }
            if ($('#tpc').val() != '') {
                var tpc = $('#tpc').val();
            } else {
                var tpc = 0;
            }
            if ($('#tpcc').val() != '') {
                var tpcc = $('#tpcc').val();
            } else {
                var tpcc = 0;
            }
            if ($('#tco').val() != '') {
                var tco = $('#tco').val();
            } else {
                var tco = 0;
            }
            if ($('#tco2').val() != '') {
                var tco2 = $('#tco2').val();
            } else {
                var tco2 = 0;
            }
            var x = parseInt(tsc) + parseInt(totalconsultedfees) + parseInt(tvf) + parseInt(tnc) + parseInt(toc) + parseInt(tac) + parseInt(tsf) + parseInt(ttc) + parseInt(tcf) + parseInt(tecgc) + parseInt(txrayf) + parseInt(tmc) + parseInt(tic) + parseInt(tvsf) + parseInt(tmcm) + parseInt(tpc) + parseInt(tpcc) + parseInt(tco);
            
            $('#tp').val(x);
            deposited();
        }

        $(document).ready(function() {

            $('#btn-hide').hide();
            $(' input[type="checkbox"]').on('change', function() {
                var count = 0;
                $(' input[type="checkbox"]').each(function() {
                    if ($(this).prop('checked')) {
                        count++;
                        return;
                    }

                })
                if (count > 0) {
                    $('#btn-hide').show();
                } else {
                    $('#btn-hide').hide();
                }
            });
        });
    </script>

</body>

</html>