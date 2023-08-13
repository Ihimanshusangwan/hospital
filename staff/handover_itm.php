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
    $sno=array();
    $valueitem=array();
    $number=array();
    for( $i = 0 ; $i<6 ; $i++){
        $element1= $_POST['ts'.$i];
        array_push($sno, $element1);

        $element2=$_POST['tn'.$i];
        array_push($valueitem, $element2);

        $element3=$_POST['tno'.$i];
        array_push($number, $element3);
    }
    $snoj = json_encode($sno);
    $valuej = json_encode($valueitem);
    $numberj = json_encode($number);

    $transfer=$_POST['transfer'];
    $recipient=$_POST['recipient'];
    $nurse=$_POST['nurse'];
    $wit1=$_POST['witness1'];
    $relative=$_POST['relative'];
    $wit2=$_POST['witness2'];

    $update="UPDATE `handover` SET
    `element1`='$snoj',
    `element2`='$valuej',
    `element3`='$numberj',
    `transfer`='$transfer',
    `recipient`='$recipient',
    `nurse`='$nurse',
    `wit1`='$wit1',
    `rel`='$relative',
    `wit2`='$wit2'
    WHERE id={$id}";

    $sql3=mysqli_query($conn,$update);
    $x=1;
 }

    $sql4=mysqli_query($conn,"SELECT * FROM `handover` WHERE `id` ={$id}");
    $row4=mysqli_fetch_assoc($sql4);
    if($row4){
    $sno_norm = isset($row4['element1'])? json_decode($row4['element1'], true):['','','','','',''];
    $item_norm = isset($row4['element2'])? json_decode($row4['element2'], true):['','','','','',''];
    $no_norm = isset($row4['element3'])? json_decode($row4['element3'], true):['','','','','',''];
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handover patient valuable item</title>
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

<body>
    <div class="container">
    <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <h3 class=" fl text-center text-dark">HANDOVER LETTERS OF PATIENT'S VALUABLE ITEMS</h3>
        <h3 class=" fl text-center text-dark">रुग्णांच्या मौल्यवान वस्तूंचे हस्तांतरण पत्र</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="handover_itm_print.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>

            <div class="row">
      <div class="col-md-4">
        <label class="form-label mt-2">Patient's Name (रुग्णाचे नाव) : <?php echo $row['name']; ?></label>
       </div>
      <div class="col-md-4">
        <label class="form-label mt-2">UHID No (रजिस्ट्रेशन नं.): <?php echo $row2['uhid'];?></label>
        </div>
      <div class="col-md-4">
        <label class="form-label mt-2">Ward / Bed (वाॅर्ड / पलंग) : <?php echo $row2['ward/icu']; ?> /<?php echo $row2['bed/room']; ?>    </label>
        </div>
      
    </div>
   
            <form action="" method="post">
                <div class="row">
                    
                    <div class="container">
                    <div class="row ">

      <div class="col-md-6 mt-2">
        <label class="form-label">Mobile No. (मोबाईल नं.):<?php echo $row['mobile']; ?></label>
       </div>
    </div>
    <br>

            
    <div class="text-center ">
                            <div style="overflow: auto;">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <th scope="col">Sr.No.(क्र.)</th>
                                    <th scope="col">Name of Valuable Items (आभूषणांचे नाव)</th>
                                    <th scope="col">Number(संख्या)</th>
                                </thead>
                                
                                <?php
                                for( $i = 0 ; $i<6 ; $i++){
                                    echo '<tbody>';
                                    echo ' <td><input type="text" name="ts'. $i .'" value="'.$sno_norm[$i] .'" class="form-control text-center" id="tsn'. $i .'"></td>';
                                    echo '<td><input type="text" name="tn'. $i .'" value="'.$item_norm[$i].'" class="form-control text-center" id="tni'. $i .'"></td>';
                                    echo '<td><input type="text" name="tno'. $i .'" value="'.$no_norm[$i].'" class="form-control text-center" id="tnos'. $i .'"></td>';
                                    echo '</tbody>';
                                }
                            ?>
                                
                            </table>
                    </div>
                    <hr>

                    <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label ">Transfer To (हस्तांतरण):</label>
                                <input  type="text" class="form-control" id="tranto" placeholder="Enter Transfer To"  name="transfer"    value="<?php echo $row4['transfer'];?>"><br>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Recipient(प्राप्तकर्ता):</label>
                                <input type="text" class="form-control" id="rec" placeholder="Enter Recipient" name="recipient"    value="<?php echo $row4['recipient'];?>"><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label ">Name & Sign of Nurse (परिचारिकेचे नाव व हस्ताक्षर):</label>
                                <textarea  type="text" class="form-control" id="nnurse"  name="nurse" ><?php echo $row4['nurse'];?></textarea><br>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Name & Sign of Witness(साक्षीदाराचे नाव व हस्ताक्षर):</label>
                                <textarea type="text" class="form-control" id="wit" name="witness1"><?php echo $row4['wit1'];?></textarea><br>
                            </div>
                           
                        </div>

                    <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label ">Name & Sign of Relatives (नातेवाईकाचे नाव व हस्ताक्षर):</label>
                                <textarea  type="text" class="form-control" id="rel"  name="relative"><?php echo $row4['rel'];?></textarea><br>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Name & Sign of Witness(साक्षीदाराचे नाव व हस्ताक्षर):</label>
                                <textarea type="text" class="form-control" id="wit2" name="witness2"><?php echo $row4['wit2'];?></textarea><br>
                            </div>
                            </div>
                        </div>
                   
                    
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>