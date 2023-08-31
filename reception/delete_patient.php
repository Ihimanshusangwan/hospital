<?php
require("../admin/connect.php");

$patientIdToDelete = $_POST['id'];
 // Replace with the patient ID you want to delete

// Delete patient-related data from various tables
$deleteInfoSql = "DELETE FROM patient_info WHERE patient_id = $patientIdToDelete";
$conn->query($deleteInfoSql);

$deletePInsureSql = "DELETE FROM p_insure WHERE id = $patientIdToDelete";
$conn->query($deletePInsureSql);

$deletePInitSql = "DELETE FROM p_init WHERE id = $patientIdToDelete";
$conn->query($deletePInitSql);

$deletePGeneralSql = "DELETE FROM p_general WHERE id = $patientIdToDelete";
$conn->query($deletePGeneralSql);

$deleteOrthoPInsureSql = "DELETE FROM ortho_p_insure WHERE id = $patientIdToDelete";
$conn->query($deleteOrthoPInsureSql);

$deleteOrthoPInitSql = "DELETE FROM ortho_p_init WHERE id = $patientIdToDelete";
$conn->query($deleteOrthoPInitSql);

$deleteOrthoPGeneralSql = "DELETE FROM ortho_p_general WHERE id = $patientIdToDelete";
$conn->query($deleteOrthoPGeneralSql);

$deleteOrthoInitialCounsellingSql = "DELETE FROM ortho_initial_counselling WHERE patient_id = $patientIdToDelete";
$conn->query($deleteOrthoInitialCounsellingSql);

$deleteOrthoPreOpChecklistSql = "DELETE FROM ortho_pre_op_checklist WHERE patient_id = $patientIdToDelete";
$conn->query($deleteOrthoPreOpChecklistSql);

$deleteEyePreOpChecklistSql = "DELETE FROM eye_pre_op_checklist WHERE patient_id = $patientIdToDelete";
$conn->query($deleteEyePreOpChecklistSql);

$deleteIPDBill1Sql = "DELETE FROM ipd_bill1 WHERE id = $patientIdToDelete";
$conn->query($deleteIPDBill1Sql);

$deleteIPDBill2Sql = "DELETE FROM ipd_bill2 WHERE id = $patientIdToDelete";
$conn->query($deleteIPDBill2Sql);

// Delete patient's data from the main patient_records table
$deletePatientSql = "DELETE FROM patient_records WHERE id = $patientIdToDelete";
$conn->query($deletePatientSql);
$deletePLogSql = "DELETE FROM p_log WHERE id = $patientIdToDelete";
$conn->query($deletePLogSql);

$deleteDischargeSql = "DELETE FROM discharge WHERE id = $patientIdToDelete";
$conn->query($deleteDischargeSql);

$deleteVRSurgerySql = "DELETE FROM vr_surgery WHERE id = $patientIdToDelete";
$conn->query($deleteVRSurgerySql);

$deleteOcuSql = "DELETE FROM ocu WHERE id = $patientIdToDelete";
$conn->query($deleteOcuSql);

$deleteCor1Sql = "DELETE FROM cor1 WHERE id = $patientIdToDelete";
$conn->query($deleteCor1Sql);

$deleteCounselSql = "DELETE FROM counsel WHERE id = $patientIdToDelete";
$conn->query($deleteCounselSql);

$deleteBloodSql = "DELETE FROM blood WHERE id = $patientIdToDelete";
$conn->query($deleteBloodSql);

$deleteOpSql = "DELETE FROM op WHERE id = $patientIdToDelete";
$conn->query($deleteOpSql);

$deleteAnaSql = "DELETE FROM ana WHERE id = $patientIdToDelete";
$conn->query($deleteAnaSql);

$deleteAcqSql = "DELETE FROM acq WHERE id = $patientIdToDelete";
$conn->query($deleteAcqSql);
$deleteNutritionalAssSql = "DELETE FROM nutritional_ass WHERE id = $patientIdToDelete";
$conn->query($deleteNutritionalAssSql);

$deleteHistopathSql = "DELETE FROM histopath WHERE id = $patientIdToDelete";
$conn->query($deleteHistopathSql);

$deleteHandoverSql = "DELETE FROM handover WHERE id = $patientIdToDelete";
$conn->query($deleteHandoverSql);

$deleteFDataSql = "DELETE FROM fdata WHERE id = $patientIdToDelete";
$conn->query($deleteFDataSql);

$deleteMLCSql = "DELETE FROM mlc WHERE id = $patientIdToDelete";
$conn->query($deleteMLCSql);

$deleteOrthoDischargeSql = "DELETE FROM ortho_discharge WHERE id = $patientIdToDelete";
$conn->query($deleteOrthoDischargeSql);

$deleteCaseAuditSheetSql = "DELETE FROM case_audit_sheet WHERE id = $patientIdToDelete";
$conn->query($deleteCaseAuditSheetSql);

$deleteDrugAdminSql = "DELETE FROM drug_administration WHERE id = $patientIdToDelete";
$conn->query($deleteDrugAdminSql);

$deleteNursesDailyRecordSql = "DELETE FROM nurses_daily_record WHERE id = $patientIdToDelete";
$conn->query($deleteNursesDailyRecordSql);

$deleteNurseInitialAssessmentSql = "DELETE FROM nurse_intial_assesment WHERE id = $patientIdToDelete";
$conn->query($deleteNurseInitialAssessmentSql);

$deleteDoctorInitialAssessmentSql = "DELETE FROM doctor_initail_assesment WHERE id = $patientIdToDelete";
$conn->query($deleteDoctorInitialAssessmentSql);

$deleteOptoAscanSql = "DELETE FROM opto_ascan WHERE id = $patientIdToDelete";
$conn->query($deleteOptoAscanSql);

$deleteOptoExaminationSql = "DELETE FROM opto_examination WHERE id = $patientIdToDelete";
$conn->query($deleteOptoExaminationSql);

$deleteOptoSurgerySql = "DELETE FROM opto_surgery WHERE id = $patientIdToDelete";
$conn->query($deleteOptoSurgerySql);

$deleteCCGlassRxSql = "DELETE FROM cc_glass_rx WHERE id = $patientIdToDelete";
$conn->query($deleteCCGlassRxSql);

$deleteHIVConsentSql = "DELETE FROM hiv_consent WHERE id = $patientIdToDelete";
$conn->query($deleteHIVConsentSql);

$deletePostConsentSql = "DELETE FROM post_consent WHERE id = $patientIdToDelete";
$conn->query($deletePostConsentSql);

$deleteGeneralInfoConsentSql = "DELETE FROM general_info_consent WHERE id = $patientIdToDelete";
$conn->query($deleteGeneralInfoConsentSql);

$deleteInformConsentSql = "DELETE FROM inform_consent WHERE id = $patientIdToDelete";
$conn->query($deleteInformConsentSql);

$deleteInfoSurConsentSql = "DELETE FROM info_sur_consent WHERE id = $patientIdToDelete";
$conn->query($deleteInfoSurConsentSql);

$deletePreOperativeAnesthSql = "DELETE FROM pre_operative_anesth WHERE id = $patientIdToDelete";
$conn->query($deletePreOperativeAnesthSql);

$deleteMinorProConsentSql = "DELETE FROM minor_pro_consent WHERE id = $patientIdToDelete";
$conn->query($deleteMinorProConsentSql);
// Delete patient-related data from various tables
$deleteAPForDocumentSql = "DELETE FROM ap_for_document WHERE id = $patientIdToDelete";
$conn->query($deleteAPForDocumentSql);

$deleteAnesthesiaConsentSql = "DELETE FROM anesthesia_consent WHERE id = $patientIdToDelete";
$conn->query($deleteAnesthesiaConsentSql);

$deleteDischargeDamaConsentSql = "DELETE FROM discharge_dama_consent WHERE id = $patientIdToDelete";
$conn->query($deleteDischargeDamaConsentSql);

$deleteRefConsentSql = "DELETE FROM ref_consent WHERE id = $patientIdToDelete";
$conn->query($deleteRefConsentSql);

$deleteHighRiskConsentSql = "DELETE FROM highrisk_consent WHERE id = $patientIdToDelete";
$conn->query($deleteHighRiskConsentSql);

$deleteInfoTransfusionConsentSql = "DELETE FROM info_transfusion_consent WHERE id = $patientIdToDelete";
$conn->query($deleteInfoTransfusionConsentSql);

$deleteInitialCounsellingSql = "DELETE FROM initial_counselling WHERE id = $patientIdToDelete";
$conn->query($deleteInitialCounsellingSql);

$deleteRateChargesSql = "DELETE FROM rate_charges WHERE id = $patientIdToDelete";
$conn->query($deleteRateChargesSql);

$deleteGeneralConsentSql = "DELETE FROM general_consent WHERE id = $patientIdToDelete";
$conn->query($deleteGeneralConsentSql);

$deleteRoomConsentSql = "DELETE FROM room_consent WHERE id = $patientIdToDelete";
$conn->query($deleteRoomConsentSql);

$deletePermissionSql = "DELETE FROM permission WHERE id = $patientIdToDelete";
$conn->query($deletePermissionSql);

$deleteFeedbackEnglishSql = "DELETE FROM feedback_english WHERE id = $patientIdToDelete";
$conn->query($deleteFeedbackEnglishSql);

$deleteFeedbackMarthiSql = "DELETE FROM feedback_marthi WHERE id = $patientIdToDelete";
$conn->query($deleteFeedbackMarthiSql);

$deleteAnumatiConsentSql = "DELETE FROM anumati_consent WHERE id = $patientIdToDelete";
$conn->query($deleteAnumatiConsentSql);

$deleteCounsellingConsentSql = "DELETE FROM counselling_consent WHERE id = $patientIdToDelete";
$conn->query($deleteCounsellingConsentSql);

$deleteOPDBillPaySql = "DELETE FROM opd_bill_pay WHERE patient_id = '$patientIdToDelete'";
$conn->query($deleteOPDBillPaySql);

$deleteANRecordSql = "DELETE FROM an_record WHERE id = '$patientIdToDelete'";
$conn->query($deleteANRecordSql);

$deleteDisSumSql = "DELETE FROM dis_sum WHERE id = '$patientIdToDelete'";
$conn->query($deleteDisSumSql);

$deleteDoctorInpatientSql = "DELETE FROM doctor_inpatient WHERE id = '$patientIdToDelete'";
$conn->query($deleteDoctorInpatientSql);

$deleteInRegSql = "DELETE FROM in_reg WHERE id = '$patientIdToDelete'";
$conn->query($deleteInRegSql);

$deleteIndoorCaseSql = "DELETE FROM indoor_case WHERE id = '$patientIdToDelete'";
$conn->query($deleteIndoorCaseSql);

$deleteInjectionConsentSql = "DELETE FROM injection_consent WHERE id = '$patientIdToDelete'";
$conn->query($deleteInjectionConsentSql);

$deleteInvestSheetSql = "DELETE FROM invest_sheet WHERE id = '$patientIdToDelete'";
$conn->query($deleteInvestSheetSql);

$deleteNutriAssessmentSql = "DELETE FROM nutri_assessment WHERE id = '$patientIdToDelete'";
$conn->query($deleteNutriAssessmentSql);

?>