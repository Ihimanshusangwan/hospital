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
    
    $c=array();
    $detail_r=array();
    for ($i = 0; $i < 11; $i++){
        $element=$_POST[$i];
        array_push($detail_r,$element);
    }
    for ($i = 0; $i < 24; $i++) {
        for ($j = 0; $j < 2; $j++) {
            $element2=$_POST['c'.$i.'_'.$j];
            $c[$i][$j] = $element2;
        }
    }
$c_en=json_encode($c);
$detail_room=json_encode($detail_r);

$update ="UPDATE pre_room_urinary SET
c='$c_en',
detail_room='$detail_room'
WHERE id =$id;
";
$sql3=mysqli_query($conn,$update);

}
$sql4=mysqli_query($conn,"SELECT * FROM pre_room_urinary WHERE id=$id;");
$row4=mysqli_fetch_assoc($sql4);

if($row4){
    $c_de =  json_decode($row4['c'], true);
    $detail_room_de=json_decode($row4['detail_room'],true);
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
        <h3 class=" fl text-center text-dark">Room Checklist</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>

    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="room_check_print.php?id=<?php echo $id; ?>" class=" btn btn-success" id="dashboard">Print</a>
            <form action="" method="post">

                <div class="row">

                    <div class="col-4">
                        <label class="form-label">Name: <?php echo $row['name'];?></label>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">UHID No: <?php echo $row2['uhid'];?></label>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">IPD No: <?php echo $row2['ipd'];?></label>
                    </div>
                    <div class="col-4">
                        <label class="form-label">DOA :
                            <input type="text" name="0" id="" class="form-control"
                                value="<?php echo $detail_room_de[0];?>"></label>
                    </div>
                    <div class="col-4">
                        <label class="form-label">DOD: <input type="text" name="1" id=""
                                value="<?php echo $detail_room_de[1];?>" class="form-control"></label>
                    </div>
                </div>

                <div style="overflow: auto;">
                    <table class="table table-bordered border-black table-hover text-center">

                        <tr>
                            <th></th>
                            <th>Admission</th>
                            <th> Discharge</th>
                            <th></th>
                        </tr>

                        <?php
        $tableHeaders = array(
            'Consent Record',
            'IV Stand',
            'Stool',
            'Urine Pot',
            'Latrine Pot',
            'Mirror',
            'Mug',
            'Bucket',
            'Bulb',
            'Tap',
            'Remotes',
            'Side Locker',
            'Door Mat',
            '',
            'Done By'
         );

        for ($i = 0; $i < 15; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 2; $j++) {
                
                echo '<td><input type="text" name="c'.$i.'_'.$j.'" value="'.$c_de[$i][$j] .'" class="form-control"></td>';
                if($i==0 && $j==1){
                echo '<td><strong>Hospital Bill :</strong></td>';
                }
                if($i==3 && $j==1){
                echo '<td><strong>Medical Bill :</strong></td>';
                } 
                if($i==6 && $j==1){
                echo '<td><strong>Discharge Card :</strong></td>';
                }
                if($i==9 && $j==1){
                echo '<td rowspan="2"><strong>Patient Explanation :</strong></td>';
                }
                if($i==13 && $j==1){
                echo '<td><strong> ISO Forms :</strong></td>';
                }
                if($i==1 && $j==1){
                echo '<td><input type="text" name="3"  value="'.$detail_room_de[3].'" class="form-control"></td>';
                }
                if($i==2 && $j==1 ){
                echo '<td><input type="text" name="4"  value="'.$detail_room_de[4].'" class="form-control"></td>';
                }
                if($i==4 && $j==1 ){
                echo '<td><input type="text" name="5"  value="'.$detail_room_de[5].'" class="form-control"></td>';
                }            
                    if($i==5  && $j==1){
                echo '<td><input type="text" name="6"  value="'.$detail_room_de[6].'" class="form-control"></td>';
                }                
                if($i==7 && $j==1){
                echo '<td><input type="text" name="7"  value="'.$detail_room_de[7].'" class="form-control"></td>';
                }              
                  if($i==8  && $j==1){
                echo '<td><input type="text" name="8"  value="'.$detail_room_de[8].'" class="form-control"></td>';
                }              
                  if($i==11 && $j==1){
                echo '<td><input type="text" name="9"  value="'.$detail_room_de[9].'" class="form-control"></td>';
                }          
                      if($i==12 && $j==1){
                echo '<td><input type="text" name="10"  value="'.$detail_room_de[10].'" class="form-control"></td>';
                }
                if($i==14 && $j==1){
                echo '<td><input type="text" name="2"  value="'.$detail_room_de[2].'" class="form-control"></td>';
                }
            }

           
        
            echo '</tr>';
        }
        ?>


                    </table>
                    <table class="table table-bordered border-black table-hover text-center">
                        <tr>
                            <th colspan="5">Services</th>
                        </tr>
                        <?php
        $tableHeaders = array(
            'ECG',
            'Nebulisation',
            'Monitor',
            'GLucometer',
            'Physio',
            'Medicines',
            'Dressings',
            'X-Ray',
            'NST'
         );

        for ($i = 0; $i < 9; $i++) {
            echo '<tr>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 2; $j++) {
                echo '<td><input type="text" name="c'.($i+15).'_'.($j).'" value="'.$c_de[$i+15][$j].'" class="form-control"></td>';
            }

            echo '</tr>';
        }
        ?>


                    </table>
                </div>



                <br>
                <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit"
                    id="submit">Submit</button>

            </form>
        </div>
</body>

</html>