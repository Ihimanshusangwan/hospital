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


$sql4 = mysqli_query($conn, "SELECT * FROM samtipatra1 WHERE id=$id;");
$row4 = mysqli_fetch_assoc($sql4);

if ($row4) {
    $c_de = json_decode($row4['c'], true);
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
        <a href="samatipatra0.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Samatipatra</h3>
    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-2">रुग्णांचे नांव :</div>
        <div class="col-4">
            <?php echo $c_de['0']; ?>
        </div>
        <div class="col-1">वय :</div>
        <div class="col-5">
            <?php echo $c_de['1']; ?>
        </div>
        <div class="col-1">मी</div>
        <div class="col-11">
            <?php echo $c_de['2']; ?>
        </div>
        <div class="col-2">राहणार :</div>
        <div class="col-4">
            <?php echo $c_de['3']; ?>
        </div>
        <div class="col-6">मला स्वतःला / माझ्या नातेवाईकाला उपचारासाठी भरती करण्याची संमती देत आहे.</div>
        <div class="col-12">
            मी येथील डॉक्टर, नर्सेस व टेक्नीशिअन यांना माझ्यावर योग्य तो इलाज करण्याची परवानगी देत आहे.
            इलाजासाठी आवश्यक त्या

            तपासण्या व आवश्यक तर शस्त्रक्रिया करण्यास माझी संमती आहे. मी माझी वैद्यकिय कागदपत्रे योग्य त्या
            व्यक्तीस गरज असल्यास दाखवायची परवानगी देत आहे.

            मला हॉस्पिटलच्या नियमांची जाणीव असून त्याप्रमाणे मी वागण्याची जबाबदारी घेतो. रुग्णाबरोबर असलेले
            पैसे, दागिने व जोखिमीच्या

            वस्तू भी ताब्यात घेतल्या असून त्या बद्दल हॉस्पिटलची काहीही जबाबदारी नाही. अनपेक्षीत प्रसंगी वा
            ज्या डॉक्टरांचा इलाज चालू आहे ते जर काही

            अपरिहार्य कारणामुळे येऊ न शकल्यास त्यांच्या ऐवजी योग्य त्या दुसन्या डॉक्टरांना इलाज करू देण्यास
            व्यवस्थापनास परवानगी देत आहे. हॉस्पिटलच्या फिस व इतर चार्जेस बदल मला कल्पना दिली असून
            त्याप्रमाणे पैसे भरण्याची मी जबाबदारी घेतो. काही अनपेक्षित व मानवी प्रयत्नांबाहेरच्या घटना
            रुग्णा बाबतीत घडू शकतात याची मला कल्पना आहे व त्याबद्दल मी हॉस्पिटलला जबाबदार ठरणार नाही.

            वरील सर्व मजकूर भी काळजी पूर्वक वाचुन त्यानंतरच मी सही कलेली आहे.
        </div>
        <div class="col-5"></div>
        <div class="col-3">रुग्ण / नातेवाईक सही</div>
        <div class="col-4">
            <?php
            printSignatures($c_de, "4", $conn, $id);
            ?>
        </div>
        <div class="col-1">तारीख :</div>
        <div class="col-3">
            <?php echo $c_de['5']; ?>
        </div>
        <div class="col-2"></div>
        <div class="col-1">नाव : </div>
        <div class="col-5">
            <?php
           printNames($c_de, "6", $conn, $id);
            ?>
        </div>

        <div class="col-12 text-center mt-4"> <strong>रुग्ण अत्यावस्थ असल्याची माहिती</strong></div>
        <div class="col-12">मला, माझ्या / माझी नातेवाईक</div>
        <div class="col-12"> याची तब्येत अत्यावस्थ असल्याची कल्पना दिली आहे. तरी त्याच्यावर / तिचेवर आवश्यक
            ते सर्व
            उपचार व संबंधित तपासण्या करण्याची मी डॉक्टरांना व व्यवस्थापनास संमती देत आहे</div>
        <div class="col-5"></div>
        <div class="col-3">रुग्ण / नातेवाईक सही</div>
        <div class="col-4">
            <?php echo $c_de['7']; ?>
        </div>
        <div class="col-12 text-center mt-4"><strong>डॉक्टराच्या सल्ल्याविरुद्ध रुग्णास नेण्याची
                संमती</strong></div>
        <div class="col-1">मी</div>
        <div class="col-4"></div>
        <div class="col-3">माझ्या नातेवाईक</div>
        <div class="col-4"></div>
        <div class="col-12">यास डॉक्टरांच्या सल्ल्याविरूद्ध स्वतः च्या जबाबदारीवर हॉस्पिटल मधून घेऊन जात
            आहे.
            त्याचेवर चालू असलेले औषधोपचार अगर कृत्रिम श्वासोश्वास थांबवल्यास त्यांच्या जीवास धोका उत्पन्न
            होऊन हृदयक्रिया
            बंद पडू शकते यांची संपूर्ण कल्पना डॉक्टरांनी मला दिली आहे. या बद्दल माझी डॉक्टर्स हॉस्पिटल
            व्यवस्थापनाबद्दल
            कोणतीही तक्रार असणार नाही. मी हॉस्पिटल व्यवस्थापनाला संबंधित जबाबदारीतून मुक्त करीत आहे.</div>
        <div class="col-1">तारीख :</div>
        <div class="col-3">
            <?php echo $c_de['8']; ?>
        </div>
        <div class="col-1"></div>
        <div class="col-3">रूग्ण / नातेवाईक सही</div>
        <div class="col-4">
            <?php
            printSignatures($c_de, "9", $conn, $id); ?>
        </div>
        <div class="col-12 text-center mt-4"><strong>Discharge Information</strong></div>
        <div class="col-12">मला / आमच्या नातेवाईकास रुग्णालयातून डिस्चार्ज मिळाला आहे. रुग्णालय सोडतांना
            आम्हाला रुग्णासंबंधी सर्व कागदपत्रे (उदा. डिस्चार्ज कार्ड, सर्व तपासण्या मुळे कागद पत्र, पुढील
            उपचाराबद्दल
            माहिती किंवा लागू असल्यास मृत्यूचा दाखला / पावती इ.) ताब्यात मिळालेली आहेत.
            त्याबद्दल काहीही तक्रार नाही.</div>
        <div class="col-1">तारीख :</div>
        <div class="col-3">
            <?php echo $c_de['10']; ?>
        </div>
        <div class="col-2"></div>
        <div class="col-3">रूग्ण / नातेवाईक सही</div>
        <div class="col-3">
            <?php echo 
           printNames($c_de, "11", $conn, $id); ?>
        </div>


    </div>

    <h6 class="mt-2">Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>