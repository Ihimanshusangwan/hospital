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

$sql4=mysqli_query($conn,"SELECT * FROM pt_rel_feedback WHERE id=$id");
$row4=mysqli_fetch_assoc($sql4);
$b_de = array_fill(0, 23, '');
if($row4){
    $b_de = json_decode($row4['b'], true);
}
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
        <a href="patient_family_education.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Patient & Family Education Record</h3>
    <?php include_once("../header/header.php") ?>
    <table class="table table-bordered border-black">
                    
                        <tr>
                            <td width="8%">Scheduled Date</td>
                            <td width="8%">Education BY</td>
                            <td width="34%">Consueling To Be Done For </td>
                            <td width="14%">Method</td>
                            <td width="12%">remarks</td>
                            <td width="12%">Sign & Name</td>
                            <td width="12%">Sign of Patient/Relative</td>
                        </tr>
                    <tbody>
                        <?php
                        $sch_arr=array("At Admission","At Admission","At Admission",
                            "Before Opeartion","Before Opeartion","After Opeartion",
                            "After Opeartion","After Opeartion","After Opeartion",
                            "At Discharge DT","At Discharge DT","At Discharge DT");
                            
                        $education_arr=array("Surgeon","Receptionist","Ward Nurse","OT Nurse","Anasthetist",
                            "Anasthetist","OT Nurse","Surgeon","Ward Nurse","Ward Nurse","Surgeon","Receptionist");
                        
                            $consultant_arr=array(
                                "Operative Risk Possible Complications",
                                "Consent Papers & Details About Risks ,Monetary Expenses & Hospital Charges List, Advance Policy",
                                "Hospital Information, Hospital Rules,Timings, Rules About se Valuables & Acompaning Relatives, No Smoking & Diet etc.",
                                "Pre Anasthetia NBM  Policy, Pre Anasthetia Medications, Operation Theater Orientation & Operation Brief ",
                                "Anasthetia Type, Risk  & Complications", 
                                "Post Anasthetia Care & Diet & Post Anasthetia Position &  Mobility",
                                " Post Operative Care,Position, Dressing, Wound Care & Medications, Diet, Specimen Dispatch HPE Report Collection Details",
                                "Opeartive Details In Breif ,Difficulties, Proable ,Progonsis & Further Care",
                                "Post Operative Care, Position, Dressing Wound Care, Diet & Medications",
                                "Post Discharge Medication, Wound Care, Diet & Medications",
                                "Post Discharge Followup, Diet & Care, In Emergency ",
                                " Billing Details, Followup & Emergency Protocols");

                          $method_arr=array("Face to Face Counseling Anatomical Diagram","Face to Face Counseling & Written Papaer Consent", "Face to Face Counseling","Face to Face Counseling","Face to Face Counseling","Face to Face Counseling",
                          "Face to Face Counseling",
                          "Face to Face Counseling Anatomical Diagram",
                          "Face to Face Counseling",
                          "Face to Face Counseling",
                          "Face to Face Counseling",
                          "Face to Face Counseling");
                          
                            for($i=0;$i<11;$i++){
                                echo "<tr>
                                <td>$sch_arr[$i]</td>
                                <td> $education_arr[$i]</td>
                                <td>$consultant_arr[$i]</td>
                                <td>$method_arr[$i]</td>
                                <td>Done As per Schedule Yes / No</td>";
                                echo'<td>'.$b_de[$i].'</td>
                                <td>'.$b_de[($i+11)].'</td>
                            </tr>';}
                            ?>

                    </tbody>
                </table>
    <h6 class="mt-2" >Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>