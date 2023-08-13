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


$sql4=mysqli_query($conn,"SELECT * FROM `mlc` WHERE id={$id}");
$row4=mysqli_fetch_assoc($sql4);
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
        <a href="ortho_mlc.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">M.L.C. नोंद करणे बाबत</h3>
    <?php include_once("../header/header.php") ?>

    <div class="row ">
    <div class="col-4">
        <strong>M.L.C. No. : </strong><?php echo $row4['mlc']; ?>
        </div>
      <div class="col-5"></div>
      <div class="col-3">
        <strong>Date: </strong><?php echo $row4['date1']; ?>
      </div>
      <div class="col-md-3 mt-2">
        <strong>प्रति,</strong></div>
    </div>

      <div class="col-md-3">
        <strong>पोलीस निरीक्षक</strong>
       </div>
   
      <div class="col-md-5">
        <strong>शिवाजीनगर पोलीस ठाणे, बीड- ४३११२२</strong>
       </div>
    

      <div class="col-md-10">
        <strong>विषय : श्री सिद्धिविनायक नेत्रालय , शासकीय विश्रामगृहा शेजारी, नगर रोड , बीड येथे भरती झालेल्या रुग्णाची नोंद करणे बाबत
</strong>
       </div>
       
       <div class="col-lg-5">
                    <strong>महोदय,</strong>
                    </div>
                        
                    <div class="row">
                             <div class="col">
                                <strong >श्री / श्रीमती : </strong><?php echo $res['name']; ?>
                            </div>
                    </div>

                            <div class="row">
                            <div class="col-4">
                                <strong >वय :</strong>
                                <?php echo $row4['vay']; ?>
                               </div>
                               <div class="col-4">
                                <strong>वर्षे : </strong><?php echo $res['age']; ?>
                                </div>
                                <div class="col-4">
                                <strong>मो.क्र. : </strong><?php echo $row4['mo']; ?>
                               </div>
                            
                   
                             <div class="col-12">
                                <strong>मु.पो. : </strong><?php echo $row4['mupu']; ?>
                        </div>
                       
                             <div class="col-6">
                                <strong>हा रुग्ण आज दिनांक : </strong><?php echo $row4['date2']; ?>
                               </div>
                               <div class="col-6">
                                <strong>वेळ :</strong><?php echo $row4['time1']; ?>
                                </div>
                                <div class="col-12">
                                <strong>रोजी आमच्या रुग्णालयात</strong> <?php echo $row4['msg']; ?></div>
                               
                            <div class="col-12">
                                <strong >या कारणास्तव दाखल आहे.</strong>
                                </div>
                                <div class="col-12">
                                <strong>घटणेचे  ठिकाण : </strong><?php echo $row4['thikar']; ?>
                                </div>
                                <div class="col-12">
                                <strong>रूग्गणांची स्थित : रुग्ण जबाब देण्याचा स्थितीत : </strong><?php echo $row4['yn'];?>
                                </div>
                                <div class="col-12">
                                    <strong>आपल्या महितीस्तव व कार्यवाहिस्तव सादर .</strong></div>
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <strong>वैद्यकिय अधिकारी</strong>
                                    </div><div class="col-8"></div>
                                    <div class="col-4">
                                        <strong>श्री सिद्धिविनायक नेत्रालय , बीड</strong>
                                    </div>
                                    <div class="col-12">
                                    <strong>नोंद घेणान्या पोलीस कर्मचान्याचे नाव </strong><?php echo $row4['nav']; ?>
                                    </div>
                                    <div class="col-6">
                                    <strong>नोंद घेण्याचा दिनांक : </strong><?php echo $row4['date3']; ?>
                                    </div>
                                    <div class="col-6">
                                    <strong>वेळ : </strong><?php echo $row4['time2']; ?>
                                    </div>
                               <div class="col-6">
                               <strong>नोंद घेणान्या पोलीस कर्मचान्याचे स्वाक्षरी </strong><?php echo $row4['sign']; ?>
                               </div>
                               
                    </div>
                   
             
                        </div>
                       
    </div>
                        </div>
    <h6 class="mt-2" >Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>