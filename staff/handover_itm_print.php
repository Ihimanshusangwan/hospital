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

$sql4=mysqli_query($conn,"SELECT * FROM `handover` WHERE `id` ={$id}");
$row4=mysqli_fetch_assoc($sql4);

$sno_norm = isset($row4['element1'])? json_decode($row4['element1'], true):['','','','','',''];
$item_norm = isset($row4['element2'])? json_decode($row4['element2'], true):['','','','','',''];
$no_norm = isset($row4['element3'])? json_decode($row4['element3'], true):['','','','','',''];

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
        <a href="handover_itm.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">HANDOVER LETTERS OF PATIENT'S VALUABLE ITEMS</h3>
    <h3 class="text-center text-dark my-3 ">रुग्णांच्या मौल्यवान वस्तूंचे हस्तांतरण पत्र</h3>
   
    <?php include_once("../header/header.php") ?>
    <strong>Mobile No. (मोबाईल नं.) : </strong><?php echo $res['mobile']; ?>
       
    <div class="text-center mt-3">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <th scope="col">Sr.No.(क्र.)</th>
                                    <th scope="col">Name of Valuable Items (आभूषणांचे नाव)</th>
                                    <th scope="col">Number(संख्या)</th>
                                </thead>
                                
                                <?php
                                for( $i = 0 ; $i<6 ; $i++){
                                    echo '<tbody>';
                                    echo '<td>'.$sno_norm[$i].'</td>';
                                    echo '<td>'.$item_norm[$i].'</td>';
                                    echo '<td>'.$no_norm[$i].'</td>';
                                    echo '</tbody>';
                                }
                            ?>
                            </table>
                            </div>
                            <div class="row">
                           <div class="col-6 mt-2">
                            <strong>Transfer To (हस्तांतरण) : </strong><?php echo $row4['transfer'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Recipient (प्राप्तकर्ता) : </strong><?php echo $row4['recipient'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Name & Sign of Nurse (परिचारिकेचे नाव व हस्ताक्षर) : </strong><?php echo $row4['nurse'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Name & Sign of Witness (साक्षीदाराचे नाव व हस्ताक्षर) : </strong><?php echo $row4['wit1'];?>
                            </div>
                            <div class="col-6 mt-2">
                            <strong>Name & Sign of Relatives (नातेवाईकाचे नाव व हस्ताक्षर) : </strong><?php echo $row4['rel'];?>
                            </div>
                            <div class="col-6 mt-2 mb-2">
                            <strong>Name & Sign of Witness (साक्षीदाराचे नाव व हस्ताक्षर) : </strong><?php echo $row4['wit2'];?>
                            </div>
                            </div>
    <h6 class="mt-3">Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>