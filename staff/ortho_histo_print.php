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


$sql4=mysqli_query($conn,"SELECT * FROM `histopath` WHERE id = $id");
$row3=mysqli_fetch_assoc($sql4);

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
        <a href="ortho_histopath.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">HISTOPATHOLOGY SAMPLE HANDOVER FORM</h3>
    <?php include_once("../header/header.php") ?>

                            <div class="row">
                           <div class="col-12 mb-2">
                            <strong>Name of Specimen Fixative : </strong><?php echo $row3['specimen'];?>
                            </div><hr>
                            <div class="col-6 ">
                            <strong>Clinical History : </strong><?php echo $row3['clinical'];?>
                            </div>

                            <div class="col-12 mt-2">
                            <strong>Examination : </strong><?php echo $row3['exam'];?>
                            </div>

                            <div class="col-12 mt-2">
                            <strong>Investigation : </strong><?php echo $row3['investi'];?>
                            </div>

                            <div class="col-6 mt-2">
                            <strong>Imaging (X-Ray/CT Scan/MRI) : </strong> <?php echo $row3['imaging'];?>
                            </div>

                            <div class="col-12 mt-2">
                            <strong>Provisional Diagnosis : </strong><?php echo $row3['diagno'];?>
                            </div>

                            <div class="col-12 mt-2">
                            <strong>Previous Biospy Reference (If any) : </strong><?php echo $row3['ref'];?>
                            </div>
                            
                            <div class="col-12 mt-2">
                            <strong>Operative Notes : </strong><?php echo $row3['opnote'];?>
                            </div>

                            <div class="col mt-2">
                            <strong>Referred By Doctor : </strong><?php echo $row3['refered'];?>
                            </div>
                            
                            <div class="col-12 mt-2 ">
                            <strong>Received Container (1/2/3) For Histopathology Examination : </strong><?php echo $row3['rcontainer'];?>
                            </div>
                            
                            <div class="col-6 mt-2 mb-2">
                            <strong>Relative Name : </strong><?php echo $row3['relative'];?>
                            </div>
                            <div class ="mt-2" style="overflow:auto">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                        <th scope="col">Relative's Signature</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <tr>
                                    <td><?php echo $row3['relsign'];?></td>
                                    <td><?php echo $row3['date'];?></td>
                                    <td><?php echo $row3['time'];?></td>
                                </tr>
                        </tbody>
                    </table>
    </div>
                            </div>
    <h6 class="mt-3">Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>