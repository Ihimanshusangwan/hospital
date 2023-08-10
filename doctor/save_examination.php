<?php
$id = $_GET['id'];
require("../admin/connect.php");
$wnl = $_POST['wnl'];
$lids_1 = $_POST['lids_1'];
$lids_2 = $_POST['lids_2'];
$conjunctive_1 = $_POST['conjunctive_1'];
$conjunctive_2 = $_POST['conjunctive_2'];
$cornea_1 = $_POST['cornea_1'];
$cornea_2 = $_POST['cornea_2'];
$ac_1 = $_POST['ac_1'];
$ac_2 = $_POST['ac_2'];
$pupil_1 = $_POST['pupil_1'];
$pupil_2 = $_POST['pupil_2'];
$lens_1 = $_POST['lens_1'];
$lens_2 = $_POST['lens_2'];
$fundus_1 = $_POST['fundus_1'];
$fundus_2 = $_POST['fundus_2'];
$sac_1 = $_POST['sac_1'];
$sac_2 = $_POST['sac_2'];
$iop_1 = $_POST['iop_1'];
$iop_2 = $_POST['iop_2'];
$diagnosis_1 = $_POST['diagnosis_1'];
$diagnosis_2 = $_POST['diagnosis_2'];
$vision_1 = $_POST['vision_1'];
$vision_2 = $_POST['vision_2'];
$via_spect_1 = $_POST['via_spect_1'];
$via_spect_2 = $_POST['via_spect_2'];
$via_ph_1 = $_POST['via_ph_1'];
$via_ph_2 = $_POST['via_ph_2'];
$at_1 = $_POST['at_1'];
$at_2 = $_POST['at_2'];
$ar_sph_1 = $_POST['ar_sph_1'];
$ar_sph_2 = $_POST['ar_sph_2'];
$ar_cyl_1 = $_POST['ar_cyl_1'];
$ar_cyl_2 = $_POST['ar_cyl_2'];
$ar_axis_1 = $_POST['ar_axis_1'];
$ar_axis_2 = $_POST['ar_axis_2'];
$dig= $_POST['dig'];

$sql = "UPDATE `opto_examination` SET 
        `wnl` = '$wnl',
        `lids_1` = '$lids_1',
        `lids_2` = '$lids_2',
        `conjunctive_1` = '$conjunctive_1',
        `conjunctive_2` = '$conjunctive_2',
        `cornea_1` = '$cornea_1',
        `cornea_2` = '$cornea_2',
        `ac_1` = '$ac_1',
        `ac_2` = '$ac_2',
        `pupil_1` = '$pupil_1',
        `pupil_2` = '$pupil_2',
        `lens_1` = '$lens_1',
        `lens_2` = '$lens_2',
        `fundus_1` = '$fundus_1',
        `fundus_2` = '$fundus_2',
        `sac_1` = '$sac_1',
        `sac_2` = '$sac_2',
        `iop_1` = '$iop_1',
        `iop_2` = '$iop_2',
        `diagnosis_1` = '$diagnosis_1',
        `diagnosis_2` = '$diagnosis_2',
        `vision_1` = '$vision_1',
        `vision_2` = '$vision_2',
        `via_spect_1` = '$via_spect_1',
        `via_spect_2` = '$via_spect_2',
        `via_ph_1` = '$via_ph_1',
        `via_ph_2` = '$via_ph_2',
        `at_1` = '$at_1',
        `at_2` = '$at_2',
        `ar_sph_1` = '$ar_sph_1',
        `ar_sph_2` = '$ar_sph_2',
        `ar_cyl_1` = '$ar_cyl_1',
        `ar_cyl_2` = '$ar_cyl_2',
        `ar_axis_1` = '$ar_axis_1',
        `ar_axis_2` = '$ar_axis_2',
        `dig` = '$dig'
        WHERE `id` = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully.";
        } else {
            echo "Error updating data: " . $conn->error;
        }
        $conn->close();


?>