<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>

  <div class="container">
    <h1 class="text-center text-danger mt-3">
      <?php echo $title['so'] ?>
    </h1>
    <button class="btn btn-success m-2" id="dashboard" cookieName="eye-referer">Dashboard</button>
    <h3 class="text-center text-dark mt-3">Eye Forms</h3>
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
          <?php echo $res2['date']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label" for="time_ad">Time of Admission :
          <?php echo $res2['time']; ?>
        </label>
      </div>
    </div>
    <div class="row g-3">
      <div class="col-md-3">
        <label class="form-label">Name:
          <?php echo $res['name']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Age:
          <?php echo $res['age']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Sex:
          <?php echo $res['sex']; ?>
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
        <label class="form-label">Consultant:
          <?php echo $res['consultant']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Diagnosis:
          <?php echo $res1['diagnosis']; ?>
        </label>
      </div>
      <div class="col-md-3">
        <label class="form-label">Bed Number:
          <?php echo $res2['bed/room']; ?>
        </label>
      </div>
    </div>
    <table class="table table-borderless">

      <tr>

        <td><a href="admission.php?id=<?php echo $id; ?>"><button class="btn btn-primary m-2">Admission
              Form</button></a></td>
        <td><a href="discharge.php?id=<?php echo $id; ?>"><button class="btn btn-primary m-2">Discharge
              Form</button></a></td>
        <td><a href="otNotes.php?id=<?php echo $id; ?>"><button class="btn btn-primary m-2">Observation
              Chart</button></a></td>
        <td><a href="continuation.php?id=<?php echo $id; ?>"> <button class="btn btn-primary m-2">Continuation
              Sheet</button></a></td>

      </tr>
      <tr>
        <td><a href="consumable_acquisition_form.php?id=<?php echo $id; ?>"><button
              class="btn btn-primary m-2">Consumable Acquisition </button></a></td>
        <td><a href="Pre-operative_Checklist.php?id=<?php echo $id; ?>"><button
              class="btn btn-primary m-2">Pre-Operative Checklist</button></a></td>
        <td><a href="OT.php?id=<?php echo $id; ?>"><button class="btn btn-primary m-2">OT Notes</button></a></td>
        <td><a href="pre_operative_anesthesia.php?id=<?php echo $id; ?>"><button
              class="btn btn-primary m-2">Pre-Operative Assessment by Anesthetist</button></a></td>
      </tr>
    </table>
    <h3 class="text-center mb-3">Consent Forms
    </h3>

    <table class="table table-borderless">

      <tr>

        <td><a href="hiv_consent_mar.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">HIV Consent
              Marathi</button></a></td>
        <td><a href="hiv_consent_eng.php?id=<?php echo $id; ?>"> <button class="btn btn-primary mb-2">HIV Consent
              English</button></a></td>
        <td><a href="general_info_consent.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">General Inform
              Consent</button></a></td>
        <td><a href="inform_consent.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">विशेष संमती
              पात्र</button></a></td>
      </tr>
      <tr>

        <td><a href="postConsent.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">ऑपरेशन नंतर पेशंटने
              घ्यावयाची काळजी
            </button></a></td>
        <td><a href="anumati.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">अनुमतीपत्र</button></a></td>
        <td><a href="inform_sur_consent.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Informed Consent
              form for surgery</button></a></td>
        <td><a href="ALTK.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Automated Lamellar Therapeutic Keratoplasty</button></a></td>
      </tr>

      <td><a href="./consents/ManualSmallIncisionCataractSurgery(MSICS).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Manual Small Incision Cataract Surgery(MSICS)
            </button></a></td>
        <td><a href="./consents/GlobeRupture(Corneo-ScleralRepair).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Globe Rupture(Corneo-ScleralRepair)</button></a></td>
        <td><a href="./consents/FemtocataractSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Femtocataract Surgery</button></a></td>
        <td><a href="./consents/CornealCollagenCrosslinking.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Corneal Collagen Crosslinking</button></a></td>
      </tr>
       <tr>

        <td><a href="./consents/DescemetMembraneEndothelialKeratoplasty(DMEK).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2"> Descemet Membrane Endothelial Keratoplasty(DMEK)
            </button></a></td>
        <td><a href="./consents/GlobeRupture(Corneo-ScleralRepair).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Globe Rupture(Corneo-ScleralRepair)</button></a></td>
        <td><a href="./consents/Descemet'sStrippingEndothelialKeratoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Descemet's Stripping Endothelial Keratoplasty</button></a></td>
        <td><a href="./consents/DeepAnteriorLamellarKeratoplasty(DALK).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">DeepAnterior Lamellar Keratoplasty(DALK).php</button></a></td>
         <td><a href="./consents/CataractSurgery(Phacoemulsification)withIntraocularLensImplant.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Cataract Surgery(Phacoemulsification)with Intraocular Lens Implant</button></a></td>
      </tr>
     

    </table>
<div class="container row">
    <div class="col-md-3"><a href="./consents/AmnioticMembraneTransplantation(AMT).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Amniotic Membrane Transplantation(AMT)</button></a> </div>
    <div class="col-md-3"><a href="./consents/Blepharoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Blepharoplasty</button></a> </div>
    <div class="col-md-3"><a href="./consents/BostonKeratoprosthesis.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">BostonKeratoprosthesis</button></a> </div>
    <div class="col-md-3"><a href="./consents/CanalicularTrephiningandIntubation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Canalicular Trephiningand Intubation</button></a> </div>
</div>
<div class="container row">
    <div class="col-md-3"><a href="./consents/ChalazionIncisionandCurettage.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Chalazion Incisio nand Curettage</button></a> </div>
    <div class="col-md-3"><a href="./consents/CombinedPhaco_trabeculectomy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">CombinedPhaco Trabeculectomy</button></a> </div>
    <div class="col-md-3"><a href="./consents/ContractedSocket.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Contracted Socket</button></a> </div>
    <div class="col-md-3"><a href="./consents/CornealScraping.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Corneal Scraping</button></a> </div>
</div>
<div class="container row">
    <div class="col-md-3"><a href="./consents/Dacryocystectomy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Dacryocystectomy</button></a> </div>
    <div class="col-md-3"><a href="./consents/DiodeLaserCyclo_Photocoagulation(DLCP).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">DiodeLaserCyclo Photocoagulation (DLCP)</button></a> </div>
    <div class="col-md-3"><a href="./consents/PunctalDilatationandIntubation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Punctal Dilatation and Intubation</button></a> </div>
    <div class="col-md-3"><a href="./consents/Punctalplugs.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Punctalplugs</button></a> </div>
</div>
<div class="container row">
  <div class="col-md-3"><a href="./consents/Punctoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Punctoplasty</button></a> </div>
  <div class="col-md-3"><a href="./consents/SecondaryOrbitalImplant.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Secondary Orbital Implant</button></a> </div>
  <div class="col-md-3"><a href="./consents/SelectiveLaserTrabeculoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Selective Laser Trabeculoplasty</button></a> </div>
  <div class="col-md-3"><a href="./consents/SimpleCulturedLimbalEpithelialTransplantSurgery(SLETCLET).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Simple Cultured Limbal Epithelial TransplantSurgery(SLETCLET)</button></a> </div>
</div>
<div class="container row">
  <div class="col-md-3"><a href="./consents/SurgicalIridectomy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">SurgicalIridectomy</button></a> </div>
  <div class="col-md-3"><a href="./consents/SutureRemoval.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Suture Removal</button></a> </div>
  <div class="col-md-3"><a href="./consents/SymblepharonRelease.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Symblepharon Release</button></a> </div>
  <div class="col-md-3"><a href="./consents/SyringingandProbing.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Syringingand Probing</button></a> </div>
</div>




<div class="container row">
  <div class="col-md-3"><a href="./consents/Non_endoscopicEndonasalDacryocystorhinostomy(New_DCR).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Non Endoscopic Endonasal Dacryocystorhinostomy (New_DCR)</button></a> </div>
  <div class="col-md-3"><a href="./consents/OpticalPenetratingKeratoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Optical Penetrating Keratoplasty</button></a> </div>
  <div class="col-md-3"><a href="./consents/OrbitalExenteration.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Orbital Exenteration</button></a> </div>
  <div class="col-md-3"><a href="./consents/OrbitalFatTransfer.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">OrbitalFatTransfer</button></a> </div>
</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/OrbitalFractureRepair.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Orbital Fracture Repair</button></a> </div>
<div class="col-md-3"><a href="./consents/Osteo_odontoKeratoprosthesis(OOKP).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Osteo Odon to Keratoprosthesis(OOKP)</button></a> </div>
<div class="col-md-3"><a href="./consents/PaediatricCataractSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Paediatric Cataract Surgery</button></a> </div>
<div class="col-md-3"><a href="./consents/PhototherapeuticKeratectomy(PTK).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Photo Therapeutic Keratectomy(PTK)</button></a> </div>
</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/PterygiumSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Pterygium Surgery</button></a> </div>
<div class="col-md-3"><a href="./consents/PtosisSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Ptosis Surgery</button></a> </div>

<div class="col-md-3"><a href="./consents/LimbalStemCellTransplantation(LSCT).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Limbal Stem Cell Transplantation(LSCT)</button></a> </div>

<div class="col-md-3"><a href="./consents/ManualSmallIncisionCataractSurgery(MSICS).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Manual Small Incision Cataract Surgery(MSICS)</button></a> </div>


</div>


</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/MedialCanthoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Medial Canthoplasty</button></a> </div>
<div class="col-md-3"><a href="./consents/OpticalPenetratingKeratoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Optical Penetrating Keratoplasty</button></a> </div>

<div class="col-md-3"><a href="./consents/OrbitalDecompression.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Orbital Decompression</button></a> </div>

<div class="col-md-3"><a href="./consents/OrbitalExenteration.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Orbital Exenteration</button></a> </div>


</div>


</div>


</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/Orbitotomy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Orbitotomy</button></a> </div>

<div class="col-md-3"><a href="./consents/Osteo-odontoKeratoprosthesis(OOKP).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Osteo-Odonto Keratoprosthesis(OOKP)</button></a> </div>

<div class="col-md-3"><a href="./consents/Orbitotomy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Orbitotomy</button></a> </div>

<div class="col-md-3"><a href="./consents/PaediatricCataractSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Paediatric Cataract Surgery</button></a> </div>


</div>


</div>


</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/ParsPlana VitrectomyforMacularHoleSurgeryERMRemoval.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">ParsPlana Vitrectomy for Macular Hole Surgery ERMRemoval</button></a> </div>

<div class="col-md-3"><a href="./consents/ParsPlanaVitrectomyforVitreousHaemorrhage.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">ParsPlanaVitrectomyforVitreousHaemorrhage</button></a> </div>

<div class="col-md-3"><a href="./consents/PhakicIOL.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">PhakicIOL</button></a> </div>

<div class="col-md-3"><a href="./consents/PhotorefractiveKeratectomy(PRK).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Photoref Ractive Keratectomy(PRK)</button></a> </div>


</div>

</div>


</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/PhototherapeuticKeratectomy(PTK).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Phototherapeutic Keratectomy(PTK)</button></a> </div>

<div class="col-md-3"><a href="./consents/PterygiumSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Pterygium Surgery</button></a> </div>

<div class="col-md-3"><a href="./consents/PtosisSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Ptosis Surgery</button></a> </div>

<div class="col-md-3"><a href="./consents/PunctalDilatationandIntubation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Punctal Dilatation and Intubation</button></a> </div>


</div>



</div>

</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/Punctalplugs.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Punctalplugs</button></a> </div>

<div class="col-md-3"><a href="./consents/Punctoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Punctoplasty</button></a> </div>

<div class="col-md-3"><a href="./consents/RetinopathyofPrematurity(ROP)Laser.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Retinopathy of Prematurity(ROP)Laser</button></a> </div>

<div class="col-md-3"><a href="./consents/ScleralBucklingSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Scleral Buckling Surgery</button></a> </div>

</div>


</div>

</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/SecondaryOrbitalImplant.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Secondary Orbital Implant</button></a> </div>

<div class="col-md-3"><a href="./consents/SelectiveLaserTrabeculoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Selective Laser Trabeculoplasty</button></a> </div>

<div class="col-md-3"><a href="./consents/Siliconoilremova injectionwithorwithoutLensectomy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Silicono ilremova injection with or without Lensectomy</button></a> </div>

<div class="col-md-3"><a href="./consents/SimpleCulturedLimbalEpithelialTransplantSurgery(SLET  CLET).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Simple Cultured Limbal Epithelial Transplant Surgery(SLET  CLET)</button></a> </div>

</div>


</div>

</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/SquintNystagmusSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Squint Nystagmus Surgery</button></a> </div>

<div class="col-md-3"><a href="./consents/SurgicalIridectomy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Surgical Iridectomy</button></a> </div>

<div class="col-md-3"><a href="./consents/SutureRemoval.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Suture Removal</button></a> </div>

<div class="col-md-3"><a href="./consents/SymblepharonRelease.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Symblepharon Release</button></a> </div>

</div>


</div>

</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/SyringingandProbing.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Syringing and Probing</button></a> </div>

<div class="col-md-3"><a href="./consents/TherapeuticDeepAnteriorLamellarKeratoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Therapeutic Deep Anterior Lamellar Keratoplasty</button></a> </div>

<div class="col-md-3"><a href="./consents/TherapeuticKeratoplasty.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Therapeutic Keratoplasty</button></a> </div>

<div class="col-md-3"><a href="./consents/Trabeculectomywith withoutAnti-fibroblasticagents TrabeculectomywithwithoutAnti-fibroblasticagents.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Trabeculectomy with  without Anti-fibroblastic agents TrabeculectomywithwithoutAnti-fibroblasticagents</button></a> </div>

</div>


</div>

</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/TrabeculectomywithwithoutAnti-fibroblasticagentsTrabeculectomywithwithoutAnti-fibroblasticagents.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Trabeculectomy with without Anti-fibroblasticagents Trabeculectomy with withoutAnti-fibroblasticagents</button></a> </div>

<div class="col-md-3"><a href="./consents/TrabeculotomywithTrabeculectomy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Trabeculotomy with Trabeculectomy</button></a> </div>


</div>


<div class="container row">
<div class="col-md-3"><a href="./consents/FibrinCyanoacrylateGlueAdhesiveforCornealPerforation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Fibrin Cyanoacrylate Gluen Adhesive for Corneal Perforation</button></a> </div>
<div class="col-md-3"><a href="./consents/GlaucomaTubeSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Glaucoma Tube Surgery</button></a> </div>

<div class="col-md-3"><a href="./consents/GlobeRupture(Corneo_ScleralRepair).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Globe Rupture (Corneo_ScleralRepair)</button></a> </div>

<div class="col-md-3"><a href="./consents/LaserIridotomy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Laser Iridotomy</button></a> </div>
</div>

<div class="container row">
<div class="col-md-3"><a href="./consents/Astigmatickeratotomy(AK).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Astigmatickeratotomy(AK)</button></a> </div>
<div class="col-md-3"><a href="./consents/BotulinumToxinInjection.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Botulinum Toxin Injection</button></a> </div>

<div class="col-md-3"><a href="./consents/CanalicularTrephiningandIntubation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Canalicular Trephining and Intubation</button></a> </div>

<div class="col-md-3"><a href="./consents/Cryosurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Cryosurgery</button></a> </div>
</div>
<div class="container row">
<div class="col-md-3"><a href="./consents/Debulking.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Debulking</button></a> </div>
<div class="col-md-3"><a href="./consents/DislocatedSecondaryIntraocularlensimplantation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Dislocated Secondary Intra ocular lens implantation</button></a> </div>

<div class="col-md-3"><a href="./consents/EdrophoniumTensilonTest.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Edrophonium Tensilon Test</button></a> </div>

<div class="col-md-3"><a href="./consents/Electroepilation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Electroepilation</button></a> </div>
</div>

<div class="container row">
<div class="col-md-3"><a href="./consents/EndoscopicEndonasalDacryocystorhinostomy(Endoscopic DCR).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Endoscopic Endonasal Dacryocystorhinostomy (Endoscopic DCR)</button></a> </div>
<div class="col-md-3"><a href="./consents/EnucleationwithImplant.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Enucleation with Implant</button></a> </div>

<div class="col-md-3"><a href="./consents/Entropion.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Entropion</button></a> </div>

<div class="col-md-3"><a href="./consents/EviscerationwithImplant.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Evisceration with Implant</button></a> </div>
</div>


<div class="container row">
<div class="col-md-3"><a href="./consents/ExcisionBiopsy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Excision Biopsy</button></a> </div>
<div class="col-md-3"><a href="./consents/ExcisionalBiopsy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Excisional Biopsy</button></a> </div>

<div class="col-md-3"><a href="./consents/ExternalDacryocystorhinostomy(DCR).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">External Dacryocystorhinostomy(DCR)</button></a> </div>

<div class="col-md-3"><a href="./consents/EyelidReconstruction.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Eyelid Reconstruction</button></a> </div>
</div>

<div class="container row">
<div class="col-md-3"><a href="./consents/EyelidTearRepairwithorwithoutWoundDebridementwithorwithoutForeignBodyRemoval.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Eyelid Tear Repair with or without Wound Debridement with or without Foreign Body Removal</button></a> </div>
<div class="col-md-3"><a href="./consents/FundusFluoresceinAngiography_FAScopy_IndocyanineGreenAngiography.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Fundus Fluorescein Angiography_FA Scopy_ Indocyanine Green Angiography</button></a> </div>

<div class="col-md-3"><a href="./consents/IncisionalBiopsy.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Incisional Biopsy</button></a> </div>

<div class="col-md-3"><a href="./consents/IntrastromalIntracameralInjectionandAC(Anterior Chamber)wash.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Intrastromal Intracameral Injection and AC(Anterior Chamber) wash</button></a> </div>
</div>

<div class="container row">
<div class="col-md-3"><a href="./consents/IntravitrealAvastinLucentisEyeleaPagenexInjection.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Intravitreal Avastin Lucentis Eyelea Pagenex Injection</button></a> </div>
<div class="col-md-3"><a href="./consents/IntravitrealAvastin_LucentisInjection.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Intravitreal Avastin_Lucentis Injection</button></a> </div>

<div class="col-md-3"><a href="./consents/IntravitrealTriamcinoloneAcetonide(IVTA)Injection.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Intravitreal Triamcinolone Acetonide (IVTA) Injection</button></a> </div>

<div class="col-md-3"><a href="./consents/Squint_NystagmusSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Squint Nystagmus Surgery</button></a> </div>
</div>

<div class="container row">
<div class="col-md-3"><a href="./consents/LaserIndirectOphthalmoscopy(LIO).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Laser Indirect Ophthalmoscopy (LIO)</button></a> </div>
<div class="col-md-3"><a href="./consents/LaserPhotocoagulation.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Laser Photocoagulation</button></a> </div>

<div class="col-md-3"><a href="./consents/LaserAssistedinSituKeratomileusis(LASIK).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Laser-Assisted in Situ Keratomileusis (LASIK)</button></a> </div>

<div class="col-md-3"><a href="./consents/NonendoscopicEndonasalDacryocystorhinostomy(New-DCR).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Non-endoscopic Endonasal Dacryocystorhinostomy (New-DCR)</button></a> </div>
</div>

<div class="container row">
<div class="col-md-3"><a href="./consents/OpticNerveSheathFenestration.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Optic Nerve Sheath Fenestration</button></a> </div>
<div class="col-md-3"><a href="./consents/PhotorefractiveKeratectomy(PRK).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Photorefractive Keratectomy (PRK)</button></a> </div>

<div class="col-md-3"><a href="./consents/PhotorefractiveKeratectomy(PRK).php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Laser-Assisted in Situ Keratomileusis (LASIK)</button></a> </div>

<div class="col-md-3"><a href="./consents/RetinopathyofPrematurity(ROP)Laser.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Retinopathy of Prematurity(ROP) Laser</button></a> </div>
</div>


<div class="container row">
<div class="col-md-3"><a href="./consents/ScleralBucklingSurgery.php?id=<?php echo $id; ?>"><button class="btn btn-primary mb-2">Scleral Buckling Surgery</button></a> </div>
</div>


    </table>


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
      document.getElementById("dashboard").addEventListener("click", () => {
        var page = document.getElementById("dashboard").getAttribute("cookieName");
        var cookieValue = getCookieValue(page);
        document.cookie = `${page}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
        window.location.href = `${cookieValue}.php?id=<?php echo $id; ?>`;

      })
    </script>
</body>

</html>