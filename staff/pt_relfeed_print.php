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

$sql4=mysqli_query($conn,"SELECT * FROM pt_rel_feedback WHERE id=$id");
$row4=mysqli_fetch_assoc($sql4);
$a_de = array_fill(0, 20, '');
if($row4){
    $a_de = json_decode($row4['a'], true);
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
        <a href="patient_relative_feedback.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Patient & Relative Feedback ORM</h3>
    <?php include_once("../header/header.php") ?>

    <h6 class="my-4">Your Feedback on the following elements of our services will be highly appreciated
                    Please rate the following parameters on a scale of 1 to 3
                    <br> <br>आमच्या सेवांच्या खालील घटकांवर आपल्या अभिप्रायाची अत्यंत प्रशंसा केली जाईल. कृपया खालील
                    पॅरामिटर्स 1 ते 3 च्या प्रमाणत रेट करा
                </h6>
                <table class="table table-bordered border-black" >
                    <thead>
                        <tr>
                            <th >Sr No.</th>
                            <th>Particular</th>
                            <th >Good-1</th>
                            <th >Average-2</th>
                            <th >Poor-3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       $arr=array("Registration/ Help Desk नोंदणी / मदतडेस्क",
                    "Reception & Registration स्वागत आणि नोंदणी ","Telephonic Convocation टेलिफोनिक संभाषण ",
                    "Guidance through required processess आवश्यक मार्गदर्शक तत्वांनुसार मार्गदर्शन ",
                    "Medical & nursing process वैद्यकीय आणि नर्सिंग प्रक्रिया",
                    " Attention, efficiency counseling of the Treating doctor-Consultant उपचार डॉक्टरांच्या सल्ला-दक्षतेचे समुपदेशन Attention",
                    " Attention, efficiency of the Nursing staff नर्सिंग कर्मचाऱ्यांचं कार्यक्षमता",
                    " Hospital Environment & Cleanliness रुग्णालय पर्यावरण आणि स्वच्छता ",
                    "Canteen Services कँटीनसेवा ","Laboratory Services लॅबोरेटरी सेवा",
                    " Imaging Services इमेजिंग सेवा"," Chemist/ Other Shops केमिस्ट / इतर दुकाने ",
                    "Accommodation राहण्याची जागा",
                    "Discharge Process डिस्चार्ज प्रक्रिया",
                    " Overall level of Service एकूण से"
                );
                        for($i=0; $i<15;$i++){
                            echo "<tr>
                            <td>" . ($i + 1) . "</td>
                            <td>$arr[$i]</td>";
                            
                            echo '
                            <td><input class="form-check-input d-flex  mx-auto" type="radio" name="'.$i.'" 
                            value="good" ' . (($a_de[$i] === 'good') ? 'checked' : '') . ' echo "checked"; id=""></td>
                            <td><input class="form-check-input d-flex  mx-auto" type="radio" name="'.$i.'" 
                            value="average" ' . (($a_de[$i] === 'average') ? 'checked' : '') . ' echo "checked"; id=""></td>
                            <td><input class="form-check-input d-flex  mx-auto" type="radio" name="'.$i.'"
                            value="poor" ' . (($a_de[$i] === 'poor') ? 'checked' : '') . ' echo "checked"; id=""></td>
                        </tr>';

                        }
                        ?>
                    </tbody>
                </table>
    <h6 class="mt-2" >Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>