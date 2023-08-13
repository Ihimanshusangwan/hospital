<?php
require("../admin/connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql4 = "SELECT * FROM cor1 WHERE id = '$id';";
$data4 = $conn->query($sql4);
$res4 = $data4->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  $sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> Corneal Procedure</title>
    <style>
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
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="button">
            <a href="cornealProcedure.php?id=<?php echo $id; ?>" class="btn btn-info noprint"
                id="dashboard">Dashboard</a>
            <a class="btn btn-primary m-2" onclick="window.print()">Print</a>
        </div>
        <?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">Corneal Procedure</h3>
        <?php include_once("../header/header.php") ?>
    </div>
    <div class="container">
        

        <div class="row">
            <div class="col-6"><strong>Name: </strong>
                <?php echo strtoupper($res['name']); ?>
            </div>
            <div class="col-6"><strong>Surgeon: </strong>
                <?php $res4['sur']; ?>
            </div>
            <div class="col-6"><strong>Assistant: </strong>
                <?php $res4['ass']; ?>
            </div>
            <div class="col-6"><strong>Nurse:</strong>
                <?php $res4['nurse']; ?>
            </div>
            <div class="col-3"><strong>HCA: </strong>
                <?php $res4['hca']; ?>
            </div>
            <div class="col-3"><strong>Visitors :</strong>
                <?php echo $res4['visit']; ?>
            </div>
            <div class="col-3"><strong>Date: </strong>
                <?php echo $res4['date']; ?>
            </div>
            <div class="row">
                <div class="col-12"><strong>Surgery Start TIme :</strong>
                    <?php echo $res4['s_time']; ?>
                </div>
                <div class="col-3"><strong>Surgery Ending TIme :</strong>
                    <?php echo $res4['e_time']; ?>
                </div>
                <div class="col-3"><strong>Referred By: </strong>
                    <?php echo $res4['refer']; ?>
                </div>
                <div class="col-3"><strong>Eye : </strong>
                    <?php echo $res4['eye']; ?>
                </div>
                <div class="col-3"><strong>O.T. No : </strong>
                    <?php echo $res4['ot']; ?>
                </div>
                <div class="col-3"><strong>Case No : </strong>
                    <?php echo $res4['case_no']; ?>
                </div>
                <div class="col-3"><strong>E.M.R. No :</strong>
                    <?php echo $res4['emr']; ?>
                </div>
                <div class="col-3"><strong>Position :</strong>
                    <?php echo $res4['pos']; ?>
                </div>
                <div class="col-3"><strong>Incigen :</strong>
                    <?php echo $res4['inc']; ?>
                </div>
                <br>
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12"><strong>PROCEDURE: </strong>
                    <?php echo $res4['proc']; ?>
                </div>
            </div><br>
            <div class="row">
                <div class="col-12"><strong>Anaesthesia : </strong>
                    <?php echo $res4['ana']; ?>
                </div>
            </div><br>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Procedure</th>
                        <th scope="col">Description</th>
                        <th scope="col">Complications</th>
                        <th scope="col">Comment</th>
                        <th scope="col">
                            <label>MPM</label>
                            <?php echo $res4['mpm']; ?>
                        </th>
                        <th scope="col">Status</th>
                        <th scope="col">
                            <label>O2</label>
                            <?php echo $res4['o2']; ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Anasthesia</th>
                        <td>
                            <?php echo $res4['la'] ?>;
                        </td>
                        <td>
                            <?php echo $res4['yes'] ?>;
                        </td>
                        <td>
                            <?php echo $res4['lig'] ?>;
                        </td>
                        <td>
                            <?php echo $res4['ml']; ?>
                            <label>ml</label>
                        </td>
                        <td>
                            <?php echo $res4['lig'] ?>;
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">ASD & Drape</th>
                        <td>
                            <?php echo $res4['beta'] ?>;
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <h2 class="text-center mt-3">Operation Note</h2>
            <?php
$query = "SELECT * FROM cor1 WHERE id=$id;";
$result = $conn->query($query);
if ($result && $result->num_rows > 0) {
    $bill = $result->fetch_assoc();
    $data = $bill['description'];
    $bills = json_decode($data, true);
    if ($bills !== null) {
        $checkboxes = [
            'Eye Cleaned',
            'Dressing with betadine solution done',
            'Peribulbar block/LA with 6ml of 2% lignocaine and adrenaline injected.',
            'Dressing with betadine done',
            'Eye Drapping Done',
            'Pterygium mass excised',
            'Mild cautery applied',
            'Corneal surface smoothed with crescent blade',
            'Amniotic Membrane Graft applied over bare surface and sutured with 10-0 vicryl',
            'Eye drape removed',
            '5% betadine eye drop applied',
            'Eye Patched',
            'Surgery concluded'
        ];
        
        foreach ($checkboxes as $index => $label) {
            $checkboxName = 'val' . ($index + 1);
            $checkboxValue = isset($bills[$index]['value']) && $bills[$index]['value'] === 'on' ? 'checked' : '';

            if ($checkboxValue === 'checked') {
                echo '<div class="col-md-12">';
                echo '<label>' . $label . '</label>';
                echo '</div>';
            }
        }
    } else {
        echo "Error decoding JSON: " . json_last_error_msg();
    }
} else {
    echo "No bill found.";
}
?>

        </div>

</body>
<script>
    window.print();
</script>

</html>