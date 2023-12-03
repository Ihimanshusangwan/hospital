<?php
 require("../admin/connect.php");
 $id = $_GET['id'];
 $sql = "SELECT * FROM patient_records WHERE id = '$id';";
 $data = $conn->query($sql);
 $res = $data->fetch_assoc();
 
 $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
 $data1 = $conn->query($sql1);
 $res1 = $data1->fetch_assoc();
 
 $sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
 $data2 = $conn->query($sql2);
 $res2 = $data2->fetch_assoc();

 $sql4 = "SELECT * FROM discharge WHERE id = '$id';";
 $data4 = $conn->query($sql4);
 $res4 = $data4->fetch_assoc();

 $sql = "SELECT * FROM titles WHERE id = 1;";
   $data = $conn->query($sql);
   $title = $data->fetch_assoc();

   

   if(isset($_POST['submit'])){
    $b=array();
    for($i = 0; $i < 23; $i++){
        $element = isset($_POST[$i]) ? $_POST[$i] : '';
            array_push($b, $element);
    }

    $b_en=json_encode($b);
    $update="UPDATE pt_rel_feedback SET
    b='$b_en'
    WHERE id=$id;
    ";
    $sql3=mysqli_query($conn,$update);

}
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
    td,
    tr,
    tbody {
        border: 1px solid black;
    }

    body {
        /* background: lightgray; */
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
    <form method="post">
        <div class="container ">
            <div class="shadow-lg  rounded">
                <h1 class="text-center text-danger mt-3">
                    <?php echo $title['so']; ?>
                </h1>
                <div id="button">
                   
                    <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
                        id="dashboard">Dashboard</a>
                        <a href="pt_edu_print.php?id=<?php echo $id; ?>" class="btn btn-danger mt-4 noprint"
                        id="">Print</a>
                </div>
                <h3 class="text-center text-dark my-3 ">Patient & Family Education Record </h3>
                <div class="table mx-4">
                    <div class="row">
                        <div class="col-5"> <label>UHID No.:</label>
                            <?php echo $res2['uhid']; ?></div>

                        <div class="col-4"> <label>D.O.B </label>
                            <?php echo $res['dob_date']; ?>
                        </div>
                        <div class="col-3"> <label>Age / Sex </label>
                            <?php echo $res['age'] . ' / '. $res['sex'] ; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5"><label>Name:</label>
                            <?php echo strtoupper($res['name']); ?></div>
                        <div class="col-4"><label>Consultant:</label>
                            <?php echo $res['consultant']; ?>
                        </div>
                        <div class="col-3">
                            <label for="" class="form-label">IPD No:</label>
                            <?php echo $res2['ipd']; ?>
                        </div>
                    </div>

                </div>
                <table class="table">
                    <thead>
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
                                echo'<td><input type="text" name="'.$i.'" value="'.$b_de[$i].'" class="form-control"></td>
                                <td><input type="text" name="'.($i+11).'" value="'.$b_de[($i+11)].'" class="form-control"></td>
                            </tr>';}
                            ?>

                    </tbody>
                    </thead>
                </table>
            </div>
            <button type="submit" class="btn btn-primary mt-3 d-flex mx-auto" name="submit" value="submit"
                id="submit">Submit</button>
        </div>
    </form>


</html>