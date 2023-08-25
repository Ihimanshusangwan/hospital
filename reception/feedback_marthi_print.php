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

$sql6="SELECT * FROM `feedback_english` WHERE `id` = '$id' ";
$data6=$conn->query($sql6);
$res6=$data6->fetch_assoc();


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
    tboody,
    th,
    tr,td {
        border: 1px solid black;
    }

    body {
        margin: 0;
    }

    .style5 {
        color: #333333
    }

    .style10 {
        font-size: 14px
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
        <a href="feedback_marthi.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">रुग्णाचे हॉस्पिटल विषयी मनोग</h3>
    <?php include_once("../header/header.php") ?>
    <form method="post">
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
                <p class="style10"> दिनांक <STRong><?php echo $res6['r_11'];?></STRong>
            </div>
        </div>

        <div>

            <table width="100%">
                <th width="5%"><span class="style8">Sr.No.
                </th>
                 <th width="52%">
                        <p class=" style10">मनोगत विषयी पॉईंट / मार्क
</p>
                    </th>
                    <th width="4%">A सर्वोत्तम</th>
                    <th width="4%">B 
खुप
चांगले</th>
                    <th width="4%">C चांगले</th>
                    <th width="4%">D साधारण</th>
                    <th width="4%">E वाईट
</th>
                </tr>

                <tr>
                    <th scope="row"><span class="style23">1.</span></th>
                    <td><span class="style23">तुम्हाला नोंदणी / स्वागत कक्षा कडून कसे मार्गदर्शन मिळाले ?
                        </span></td>

                    <td>
                        <div class="form-check form-check-inline">
                            <?php echo $res6['r_1']=='A'?'A':''; ?>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_1']=='B'?'B':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_1']=='C'?'C':''; ?>

                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_1']=='D'?'D':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_1']=='E'?'E':''; ?>
                        </div>
                    </td>

                </tr>
                <tr>
                    <th scope="row"><span class="style23">2.</span></th>
                    <td><span class="style23">
या दवाखान्यातील डॉक्टरांद्वारे देण्यात येणारी वैद्यकीय सेवा / उपचार या बद्दल तुमचे अनुभव काय आहे ?

                        </span></td>

                    <td>
                        <div class="form-check form-check-inline">
                            <?php echo $res6['r_2']=='A'?'A':''; ?>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_2']=='B'?'B':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_2']=='C'?'C':''; ?>

                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_2']=='D'?'D':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_2']=='E'?'E':''; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">3.</span></th>
                    <td><span class="style23">
दवाखान्यातील स्टाफकडून देण्यात येणारी रुग्णांची सेवा / नम्रता याबद्दल तुमचे मत काय आहे ?
                        </span></td>
                    <td>
                        <div class="form-check form-check-inline">
                            <?php echo $res6['r_3']=='A'?'A':''; ?>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_3']=='B'?'B':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_3']=='C'?'C':''; ?>

                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_3']=='D'?'D':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_3']=='E'?'E':''; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">4.</span></th>
                    <td><span class="style23">नर्सिंग स्टाफ व पॅरामेडिकल स्टाफच्या सेवेबद्दल तुमचा अनुभव काय आहे ?
                        </span></td>
                    <td>
                        <div class="form-check form-check-inline">
                            <?php echo $res6['r_4']=='A'?'A':''; ?>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_4']=='B'?'B':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_4']=='C'?'C':''; ?>

                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_4']=='D'?'D':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_4']=='E'?'E':''; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">5.</span></th>
                    <td><span class="style23"> वॉर्डबॉय व आया यांच्या सेवेबद्दल तुमचा अनुभव काय आहे ?

                        </span></td>


                    <td>
                        <div class="form-check form-check-inline">
                            <?php echo $res6['r_5']=='A'?'A':''; ?>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_5']=='B'?'B':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_5']=='C'?'C':''; ?>

                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_5']=='D'?'D':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_5']=='E'?'E':''; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">6.</span></th>
                    <td><span class="style23">

        दवाखान्यातील आंतर रूग्ण विभागातील उपलब्ध असलेल्या सोयी सुविधा बाबत तुमचा अनुभव काय आहे ?
                        </span>
                    </td>


                    <td>
                        <div class="form-check form-check-inline">
                            <?php echo $res6['r_6']=='A'?'A':''; ?>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_6']=='B'?'B':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_6']=='C'?'C':''; ?>

                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_6']=='D'?'D':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_6']=='E'?'E':''; ?>
                        </div>

                    </td>
                </tr>
                <tr>
                    <th scope="row"><span class="style23">7.</span></th>
                    <td>
                        <p class="style23">दवाखान्यातील वॉर्ड व परिसर, शौचालयांच्या

स्वच्छतेबाबत तुमचे मत काय आहे ?</p>
                    </td>
                    <td>
                        <div class="form-check form-check-inline">
                            <?php echo $res6['r_7']=='A'?'A':''; ?>
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_7']=='B'?'B':''; ?>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-check-inline mx-4">
                            <?php echo $res6['r_7']=='C'?'C':''; ?>
                        </div>
                    </td>

                    <td>
                        <?php echo $res6['r_7']=='D'?'D':''; ?>
        </div>
        </td>
        <td>
            <div class="form-check form-check-inline mx-4">
                <?php echo $res6['r_7']=='E'?'E':''; ?>
            </div>
        </td>
        </tr>
        <tr>
            <th scope="row"><span class="style23">8.</span></th>
            <td><span class="style23">
                   दवाखान्यातील चहा, आहाराची सेवा व गुणवत्ते बद्दल तुमचे मत काय आहे ?
           </span></td>

            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_8']=='A'?'A':''; ?>
                </div>
            </td>

            <td>
                <div class="form-check form-check-inline mx-4">
                    <?php echo $res6['r_8']=='B'?'B':''; ?>
                </div>
            </td>
            <td>
                <div class="form-check form-check-inline mx-4">
                    <?php echo $res6['r_8']=='C'?'C':''; ?>
                </div>
            </td>

            <td>
                <?php echo $res6['r_8']=='D'?'D':''; ?>
                </div>
            </td>
            <td>
                <div class="form-check form-check-inline mx-4">
                    <?php echo $res6['r_8']=='E'?'E':''; ?>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row"><span class="style23">9.</span></th>
            <td><span class="style23">दवाखान्यातील चौकशी विभाग, नोंदणी व बिलींग विभागाच्या सेवा व गुणवत्तेबद्दल तुमचे मत काय आहे ?
           </span></td>

            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_9']=='A'?'A':''; ?>
                </div>
            </td>

            <td>
                <div class="form-check form-check-inline mx-4">
                    <?php echo $res6['r_9']=='B'?'B':''; ?>
                </div>
            </td>
            <td>
                <div class="form-check form-check-inline mx-4">
                    <?php echo $res6['r_9']=='C'?'C':''; ?>
                </div>
            </td>

            <td>
                <?php echo $res6['r_9']=='D'?'D':''; ?>
                </div>
            </td>
            <td>
                <div class="form-check form-check-inline mx-4">
                    <?php echo $res6['r_9']=='E'?'E':''; ?>
                </div>
            </td>
        </tr>
        <tr>

            <th scope="row"><span class="style23">10.</span></th>
            <td><span class="style23">दवाखान्यातील ऑप्टीकल व मेडीकलच्या सेवा व गुणवत्ते विषयी तुमचे मत काय आहे 
              </span></td>
            <td>
                <div class="form-check form-check-inline">
                    <?php echo $res6['r_10']=='A'?'A':''; ?>
                </div>
            </td>

            <td>
                <div class="form-check form-check-inline mx-4">
                     <?php echo $res6['r_10']=='B'?'B':''; ?> </div>
            </td>
            <td>
                <div class="form-check form-check-inline mx-4">
                    <?php echo $res6['r_10']=='C'?'C':''; ?>
                </div>
            </td>

            <td>
                <?php echo $res6['r_10']=='D'?'D':''; ?>
                </div>
            </td>
            <td>
                <div class="form-check form-check-inline mx-4">
                    <?php echo $res6['r_10']=='E'?'E':''; ?>
                </div>
            </td>
        </tr>
        </table>
        <div class="mt-4">
            <label for="">11. तुम्हाला दवाखान्याबाबत कुणाकडून माहिती मिळाली ? डॉक्टरांकडून / मित्राकडून / नातेवाईकाकडून / सामाजिक माध्यम / प्रसार माध्यमांकडून / स्वतः
</label> &nbsp; <strong><?php echo $res6['r_12'];?></strong>
        </div>
        <div class="mt-3">
            <label for="">12. आपली काही तक्रार आहे काय ?
            </label> &nbsp; <strong><?php echo $res6['r_13'];?></strong>
        </div>
        <div class="mt-3">
            <label for=""> 13. आपल्या काही बहुमुल्य सुचना आहेत का ?
            </label> &nbsp; <strong><?php echo $res6['r_14'];?></strong>
            <div class="mt-3">
                <label for="">नांव:</label>
                &nbsp; <strong><?php echo $res6['r_15'];?></strong>
            </div>
            <hr>
            <h5 class="text-center">For office use only</h5>
            <table width="100%">
                <tr>
                    <th width="20%">
                        E<br>
                        10 Poor <br>
                    </th>
                    <th width="20%">
                        D
                        <br>
                        11-20 Average <br>

                    <th width="20%">
                        C
                        <br>
                        21-30 Good <br>

                    </th>
                    <th width="20%">
                        B
                        <br>
                        31-40 Very Good<br>
                    </th>
                    <th width="20%">
                        A<br>
                        41-50 Excellent <br>
                    </th>
                </tr>
                <tr>
                    <th><?php echo $res6['r_16']=='E'?'E':''; ?></th>
                    <th><?php echo $res6['r_16']=='D'?'D':''; ?></th>
                    <th><?php echo $res6['r_16']=='C'?'C':''; ?></th>
                    <th><?php echo $res6['r_16']=='B'?'B':''; ?></th>
                    <th><?php echo $res6['r_16']=='A'?'A':''; ?></th>
                </tr>
            </table>

    </form>
    <script>
    window.print();
    </script>
    </div>
</body>

</html>