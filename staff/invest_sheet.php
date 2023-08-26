<?php
 require("../admin/connect.php");
 $id = $_GET['id'];
 session_start();

 $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
 $row=mysqli_fetch_assoc($sql);

 $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
 $row1=mysqli_fetch_assoc($sql1);

 $sql2=mysqli_query($conn,"SELECT * FROM ortho_p_insure WHERE id = '$id';");
 $row2=mysqli_fetch_assoc($sql2);
 
 $sql = "SELECT * FROM titles WHERE id = 1;";
 $data = $conn->query($sql);
 $title = $data->fetch_assoc();
 
$x=0;
 if(isset($_POST['submit'])){
    
    $date=array();
    $a=array();
    $b=array();
    $c=array();
    $d=array();
    $e=array();
    $f=array();
    $g=array();
    $h=array();
    $ie=array();
    $je=array();
    $k=array();
    $l=array();
    $m=array();
    for ($i = 0; $i < 7; $i++) {
        $dateValue = $_POST['date' . $i];
        array_push($date, $dateValue);
    }
    
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 7; $j++) {
            $element1=$_POST['a'.$i.'_'.$j];
            $a[$i][$j] = $element1;
        }
    }
 

 for ($i = 0; $i < 6; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element2=$_POST['b'.$i.'_'.$j];
        $b[$i][$j] = $element2;
    }
}


for ($i = 0; $i < 6; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element3=$_POST['c'.$i.'_'.$j];
        $c[$i][$j] = $element3;
    }
}

for ($i = 0; $i < 14; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element4=$_POST['d'.$i.'_'.$j];
        $d[$i][$j] = $element4;
    }
}

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element5=$_POST['e'.$i.'_'.$j];
        $e[$i][$j] = $element5;
    }
}

for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element6=$_POST['f'.$i.'_'.$j];
        $f[$i][$j] = $element6;
    }
}


for ($i = 0; $i < 6; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element7=$_POST['g'.$i.'_'.$j];
        $g[$i][$j] = $element7;
    }
}

for ($i = 0; $i < 6; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element8=$_POST['h'.$i.'_'.$j];
        $h[$i][$j] = $element8;
    }
}


for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element9=$_POST['i'.$i.'_'.$j];
        $ie[$i][$j] = $element9;
    }
}

for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element10=$_POST['j'.$i.'_'.$j];
        $je[$i][$j] = $element10;
    }
}

for ($i = 0; $i < 7; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element11=$_POST['k'.$i.'_'.$j];
        $k[$i][$j] = $element11;
    }
}


for ($i = 0; $i < 2; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element12=$_POST['l'.$i.'_'.$j];
        $l[$i][$j] = $element12;
    }
}


for ($i = 0; $i < 6; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $element13=$_POST['m'.$i.'_'.$j];
        $m[$i][$j] = $element13;
    }
}


$date_en=json_encode($date);
$a_en=json_encode($a);
$b_en=json_encode($b);
$c_en=json_encode($c);
$d_en=json_encode($d);
$e_en=json_encode($e);
$f_en=json_encode($f);
$g_en=json_encode($g);
$h_en=json_encode($h);
$i_en=json_encode($ie);
$j_en=json_encode($je);
$k_en=json_encode($k);
$l_en=json_encode($l);
$m_en=json_encode($m);

$urine=$_POST['urine'];
$pus=$_POST['pus'];
$vaginal=$_POST['vaginal'];

$update ="UPDATE invest_sheet SET
date='$date_en',
a='$a_en',
b='$b_en',
c='$c_en',
d='$d_en',
e='$e_en',
f='$f_en',
g='$g_en',
h='$h_en',
i='$i_en',
j='$j_en',
k='$k_en',
l='$l_en',
m='$m_en',
urine='$urine',
pus='$pus',
vaginal='$vaginal'
WHERE id =$id;
";
$sql3=mysqli_query($conn,$update);

}
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
    <title>Investigation Sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style type="text/css">
        body {
            background: lightgray;
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
    <div class="container">
    <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <h3 class=" fl text-center text-dark">Investigation Sheet </h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href=".php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <div class="row">
                
                <div class="col-md-3">
                  <label class="form-label">Name: <?php echo $row['name'];?></label>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Age: <?php echo $row['age'];?></label>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Sex: <?php echo $row['sex'];?></label>
                </div>
                <div class="col-md-3">
                  <label class="form-label">UHID No: <?php echo $row2['uhid'];?></label>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Bed Number: <?php echo $row2['bed/room'];?></label>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Consultant: <?php echo $row['consultant'];?></label>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Date of Admission: <?php echo $row2['date'];?></label>
                </div></div>
            
            <form action="" method="post">
            <div style="overflow: auto;">
    <table class="table table-bordered border-black table-hover text-center">
        <tr>
            <th>Date</th>
            <?php
            for ($i = 0; $i < 7; $i++) {
                        echo '<th><input type="date" name="date'.$i.'" value="'.$date_de[$i] .'" class="form-control" ></th>';
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
                echo '<td><input type="text" name="a'.$i.'_'.$j.'" value="'.$a_de[$i][$j] .'" class="form-control"></td>';
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
                echo '<td><input type="text" name="b'.$i.'_'.$j.'" value="'.$b_de[$i][$j] .'"class="form-control"></td>';
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
                echo '<td><input type="text" name="c'.$i.'_'.$j.'"value="'.$c_de[$i][$j] .'" class="form-control"></td>';
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
                echo '<td><input type="text" name="d'.$i.'_'.$j.'" value="'.$d_de[$i][$j] .'"class="form-control"></td>';
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
                echo '<td><input type="text"  name="e'.$i.'_'.$j.'"value="'.$e_de[$i][$j] .'"class="form-control"></td>';
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
                echo '<td><input type="text" name="f'.$i.'_'.$j.'" value="'.$f_de[$i][$j] .'"class="form-control"></td>';
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
                echo '<td><input type="text"  name="g'.$i.'_'.$j.'"value="'.$g_de[$i][$j] .'"class="form-control"></td>';
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
                echo '<td><input type="text"  name="h'.$i.'_'.$j.'"value="'.$h_de[$i][$j] .'"class="form-control"></td>';
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
                echo '<td><input type="text"  name="i'.$i.'_'.$j.'"value="'.$i_de[$i][$j] .'"class="form-control"></td>';
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
                echo '<td><input type="text"  name="j'.$i.'_'.$j.'"value="'.$j_de[$i][$j] .'"class="form-control"></td>';
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
                echo '<td><input type="text" name="k'.$i.'_'.$j.'" value="'.$k_de[$i][$j] .'"class="form-control"></td>';
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
                echo '<td><input type="text"  name="l'.$i.'_'.$j.'"value="'.$l_de[$i][$j] .'"class="form-control"></td>';
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
            '<input type="text" name="urine" value="'.$row4['urine'] .'"class="form-control">',
            '<input type="text" name="pus"  value="'.$row4['pus'] .'"class="form-control">',
            '<input type="text" name="vaginal" value="'.$row4['vaginal'] .'" class="form-control">'
        );

        for ($i = 0; $i < 6; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 7; $j++) {
                echo '<td><input type="text"  name="m'.$i.'_'.$j.'"value="'.$m_de[$i][$j] .'"class="form-control"></td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
</div>



            <br>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>