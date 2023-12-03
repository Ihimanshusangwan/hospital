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

$sql4=mysqli_query($conn,"SELECT * FROM invest_sheet WHERE id=$id;");
$row4=mysqli_fetch_assoc($sql4);

if($row4){
    $date_de = json_decode($row4['date'], true);
    $a_de =  json_decode($row4['a'], true);
    $b_de =  json_decode($row4['b'], true);
    $c_de =  json_decode($row4['c'], true);
    $d_de =  json_decode($row4['d'], true);
    $e_de =  json_decode($row4['e'], true);
    $f_de =  json_decode($row4['f'], true);
    $g_de =  json_decode($row4['g'], true);
    $h_de =  json_decode($row4['h'], true);
    $i_de =  json_decode($row4['i'], true);
    $j_de =  json_decode($row4['j'], true);
    $k_de =  json_decode($row4['k'], true);
    $l_de =  json_decode($row4['l'], true);
    $m_de =  json_decode($row4['m'], true);
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
        <a href="invest_sheet.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">    Investigation Sheet</h3>

    <?php include_once("../header/header.php") ?>
    <table class="table table-bordered border-secondary ">
        <tr>
            <th>Date</th>
            <?php
            for ($i = 0; $i < 7; $i++) {
                        echo '<th>'.$date_de[$i] .'</th>';
                    }?>
        </tr>
        <?php
        $tableHeaders = array(
            'Blood Group',
            'Rh',
            'I.C.T.'
        );

        for ($i = 0; $i < 3; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td>'.$a_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>
       
       
       <tr><th>Haematology</th></tr>
          <?php

        $tableHeaders = array(
            'Haemoglobin',
            'P.C.V',
            'Red Blood Count',
            'Total Count',
            'Platelets',
            'Reticulocyte Count'
        );

        for ($i = 0; $i < 6; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td> '.$b_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>



       
    <tr><th>Total Leucocytes</th></tr>
          <?php

        $tableHeaders = array(
            'Diff.Count',
            'Neutrophils',
            'Lymphocytes',
            'Eosinophils',
            'E.S.R.',
            'M.P./ M.F.'
        );

        for ($i = 0; $i < 6; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td>'.$c_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>
        
        <tr><th>Bio Chemistry</th></tr>
          <?php
        $tableHeaders = array(
            'F.B.S.',
            'R.B.S.',
            'P.P.B.S.',
            'Urea',
            'Ser. Creatinine',
            'Total Bilirubin',
            'Direct Bilirubin',
            'Indirect Bilirubin',
            'S.G.O.T.',
            'S.G.P.T.',
            'Alk. Phosphate',
            'Total Protein',
            'Ser. Albumin',
            'Ser. GLobulin'
        );

        for ($i = 0; $i < 14; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td> '.$d_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>
        <tr><th>Cardiac Enzymes</th></tr>
        <?php
        $tableHeaders = array(
            'CK-NAC',
            'C.P.K. - M.B.',
            'LDH'
        );

        for ($i = 0; $i < 3; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td>'.$e_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>

<tr><th>Electrolytes</th></tr>
        <?php
        $tableHeaders = array(
            'Sodium',
            'Potassium',
            'Bicarb',
            'Chlorides'
        );

        for ($i = 0; $i < 4; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td> '.$f_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>
        <tr><th>Coagulation</th></tr>
        <?php
        $tableHeaders = array(
            'B.T.',
            'C.T.',
            'A.C.T.',
            'P.T.',
            'INR',
            'aP.T.T.'
        );

        for ($i = 0; $i < 6; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td>'.$g_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>

        <tr><th>Lipid Profile</th></tr>
        <?php
        $tableHeaders = array(
            'Total Cholestrol',
            'Trigyceride',
            'H.D.L.',
            'L.D.L.',
            'Ser. Uric Acid',
            'Ser. Digoxin'
        );

        for ($i = 0; $i < 6; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td>'.$h_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>

        <tr><th>Serology</th></tr>
        <?php
        $tableHeaders = array(
            'HBs Ag',
            'H.I.V.',
            'H.C.V.',
            'V.D.R.L.'
        );

        for ($i = 0; $i < 4; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td>'.$i_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>

        <tr><th>Thyroid Function</th></tr>
        <?php
        $tableHeaders = array(
            'T3',
            'T4',
            'T.S.H.'
        );

        for ($i = 0; $i < 3; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td>'.$j_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>

        <tr><th>Urine</th></tr>
        <?php
        $tableHeaders = array(
            'Precolor',
            'ALbumin',
            'Sugar',
            'Acetone',
            'Micro',
            'Bile Salt',
            'Bile Pigment'
        );

        for ($i = 0; $i < 7; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td> '.$k_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>

        <tr><th>Stool</th></tr>
        <?php
        $tableHeaders = array(
            'Occult Blood',
            'OVA /CYST'
        );

        for ($i = 0; $i < 2; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td>'.$l_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>

        <tr><th>Miscellaneous</th></tr>
        <?php
        $tableHeaders = array(
            'Urine C/S',
            'Pus C/S',
            'Vaginal Swab C/S',
            ''.$row4['urine'] .'',
            ''.$row4['pus'] .'',
            ''.$row4['vaginal'] .''
        );

        for ($i = 0; $i < 6; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td>'.$m_de[$i][$j] .'</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>