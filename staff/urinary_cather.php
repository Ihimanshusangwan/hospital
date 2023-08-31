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
    $b=array();
    $detail=array();
    for ($i = 0; $i < 4; $i++){
        $element=$_POST[$i];
        array_push($detail,$element);
    }
    for ($i = 0; $i < 13; $i++) {
        for ($j = 0; $j < 9; $j++) {
            $element2=$_POST['b'.$i.'_'.$j];
            $b[$i][$j] = $element2;
        }
    }
    
$b_en=json_encode($b);
$detail_urinary=json_encode($detail);

$update ="UPDATE pre_room_urinary SET
b='$b_en',
detail_urinary='$detail_urinary'
WHERE id =$id;
";
$sql3=mysqli_query($conn,$update);

}
$sql4=mysqli_query($conn,"SELECT * FROM pre_room_urinary WHERE id=$id;");
$row4=mysqli_fetch_assoc($sql4);

if($row4){
    $b_de =  json_decode($row4['b'], true);
    $detail_de =json_decode($row4['detail_urinary'],true);
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
            <h3 class=" fl text-center text-dark">Urinary Catheter Bundle Follow Up</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="urinary_cath_print.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <form action="" method="post">

            <div class="row">
                
                <div class="col-4">
                  <label class="form-label">Name: <?php echo $row['name'];?></label>
                </div>
                <div class="col-4">
                  <label class="form-label">MRD No:
                    <input type="text" name="0" id="" class="form-control" value="<?php echo $detail_de[0];?>"></label>
                </div>
                <div class="col-4">
                  <label class="form-label">Department: <input type="text" name="1" id=""  value="<?php echo $detail_de[1];?>"class="form-control"></label>
                </div>
                <div class="col-6">
                  <label class="form-label">Urinary Catheter Inserted On: <input type="text" name="2" value="<?php echo $detail_de[2];?>" id="" class="form-control"></label>
                </div>
                <div class="col-6">
                  <label class="form-label">Urinary Catheter Removed On:<input type="text" name="3"  value="<?php echo $detail_de[3];?>"id="" class="form-control"></label>
                </div></div>
            
            <div style="overflow: auto;">
    <table class="table table-bordered border-black table-hover text-center">
        <tr>
            <th rowspan="2">S No.</th>
            <th rowspan="2">Criteria</th>
            <th rowspan="1" colspan="3">Day 1</th>
            <th rowspan="1" colspan="3">Day 2</th>
            <th rowspan="1" colspan="3">Day 3</th>
        </tr>
        <tr>
            <th>Shift 1</th>
            <th>Shift 2</th>
            <th>Shift 3</th>
            <th>Shift 1</th>
            <th>Shift 2</th>
            <th>Shift 3</th>
            <th>Shift 1</th>
            <th>Shift 2</th>
            <th>Shift 3</th>
        </tr>
        
        <?php
        $tableHeaders = array(
            'Hand Hygiene performed before and after manipulating the catheter & Uro bag',
            'Proper fixing of catheter on time',
            'Uro bag not touching the floor',
            'Urine flow should remain unobstructed',
            'Perform routin hygiene meatal care',
            'Maintaining closed drainage system',
            'Uro bag emptied every 6 hours',
            'Proper disinfection of sample collection site',
            'Urine aspirated for culture using sterile needle and syringe',
            'Specimen transported to the lab within 2 hours of collection',
            'Sterility maintain throughout the procedure',
            'Hand washing done after removal of gloves',
            'Catheter or uro bag labeled with date and time of  insertion & should change on due date basis'
        );

        for ($i = 0; $i < 13; $i++) {
            echo '<tr>';
            echo '<th>'.($i+1).'</th>';
            echo '<th>' . $tableHeaders[$i] . '</th>';
            for ($j = 0; $j < 9; $j++) {

                echo '<td><input type="text" name="b'.$i.'_'.$j.'" value="'.$b_de[$i][$j] .'" class="form-control"></td>';
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