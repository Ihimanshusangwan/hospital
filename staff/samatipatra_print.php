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

$sql4 = mysqli_query($conn, "SELECT * FROM samtipatra1 WHERE id=$id");
$row4 = mysqli_fetch_assoc($sql4);
$a_de = array_fill(0, 26, '');
if ($row4) {
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
        <a href="samatipatra.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Samatipatra 1</h3>
    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6">UHID No:
                    <?php echo $res2['uhid']; ?>
                </div>
                <div class="col-6"></div>
                <div class="col-6">IPD No:
                    <?php echo $res2['ipd']; ?>
                </div>
                <div class="col-12 mt-1">प्रमुख शल्यचिकित्सक/ प्रमुख (मध्यस्थ) सहाय्यक : डॉ. :
                    <?php echo $a_de['1']; ?>
                </div>
                <div class="col-12 my-2">रूग्णाविषयी माहिती</div>
                <div class="col-6 mt-1">नांव : श्री / सौ. / कु
                    <?php echo $res['name']; ?>
                </div>
                <div class="col-6 mt-1">वय:
                    <?php echo $res['age']; ?> वर्ष:
                </div>
                <div class="col-6 mt-1">पत्ता:
                    <?php echo $res['address'] . " , " . $res['taluka'] . " , " . $res['district']; ?>
                </div>
                <div class="col-6 mt-1"> रूग्णाचे मासिक उत्पन्न :
                    <?php echo $a_de['3']; ?>
                </div>
                <div class="col-12 mt-1">रुग्णाचे पालक / प्रतिनीधी बद्दल माहिती नांव : श्री. /सौ. / श्रीमती-
                    <?php echo $a_de['4']; ?>
                </div>
                <div class="col-6 mt-1">पत्ता:
                    <?php echo $a_de['5']; ?>
                </div>
                <div class="col-6 mt-1"> फोन.:
                    <?php echo $a_de['6']; ?>
                </div>
                <div class="col-6 mt-1">रुग्णाशी नाते :
                    <?php echo $a_de['7']; ?>
                </div>
                <div class="col-6 mt-1">नियोजित शल्यचिकित्सा दिनांक :
                    <?php echo $a_de['8']; ?>
                </div>
                <div class="col-12 mt-1">प्रास्तावित उपायपद्दती / नियोजित शल्यचिकित्सा / उपचार पध्दती :
                    <?php echo $a_de['9']; ?>
                </div>
                <div class="col-6 mt-1">अ.
                    <?php echo $a_de['10']; ?>
                </div>
                <div class="col-6 mt-1">ब.
                    <?php echo $a_de['11']; ?>
                </div>
                <div class="col-12">मी खालील सही करणार, या पत्रकाद्वारे खात्री पूर्वक लिहून देतो की,
                    १. मला स्पष्ट समजेल अशा भाषेत व शब्दात आणि मी समजू शकेल अशा मराठी बोली भाषेत ही माहिती
                    स्पष्ट
                    करून सांगण्यात आली आहे. २. या संबंधी | पुरेशी माहती मला पुरवण्यात येऊन तिचे स्पष्टीकरण मला
                    समजेल अशा
                    पद्धतीने करून देण्यात आले आहे. त्यानंतरच मी ही संमती देत आहे. व संबंधीत | डॉक्टर / प्रमुख
                    चिकीत्सक/त्यांचे सहकारी
                    यांना संमती देऊन ना हरकत ऑपरेशन करण्यास सूचवित आहे. ते त्यांच्या निवडी प्रमाणे ऑपरेशन किंवा
                    प्रास्तावित उपचार करतील
                    याची मला जाणीव आहे. ३. उपचार प्रक्रिया/ऑपरेशन दरम्यान अपेक्षित पर्यायी व्यवस्था, अधिक उपचार
                    पध्दतीचे ऑपरेशन यांचा
                    अधिकार मी त्यांना देत आहे. मला हे देखील समजावून सांगण्यात आले आहे आणि ते मला समजले आहे की
                    ऑपरेशन दरम्यान
                    काही अकल्पीत घटना किंवा परिस्थीती उद्भवल्यास, आधी ठरलेल्या व्यतीरीक्त अन्य पध्दतीचा उपचार
                    करावा लागल्यास त्यांनी तो
                    बेलाशक करावा. एकंदरीत अशा संभाव्य परिस्थितीत मी अशी संमती देतो की डॉक्टरांच्या गृपने दुसऱ्या
                    एखाद्या योग्य वाटेल अशा
                    त्यांच्या व्यवसायातील अनुभवानुसार पर्यायी निर्णय घेऊन पाहिजे त्या प्रमाणे उपचार केल्यास माझी
                    हरकत नाही. ४. मला हे
                    देखील समजावून सांगण्यात आले आणि मला हे समजले आहे की पर्यायी पद्धतीच्या ऑपरेशन | दरम्यान काही
                    जोखीमा उद्भवू
                    शकतात किंवा त्यांचे तोटेही होऊ शकतात. ५. मला हे समजावून सांगण्यात आले आहे आणि मला हे कळले
                    आहे की प्रास्तावित
                    शस्त्रक्रिया (पद्धती) करत असतांना काही जोखिमा गुंतागुंती उद्भवू शकतात त्या संबंधी मला पुरेशी
                    माहिती देण्यात आली आहे. ६.
                    मी हे नमूद करू | इच्छितो की प्रमुख डॉक्टरांनी माझ्या सर्व शंका / प्रश्नांची समर्पक उत्तरे
                    दिली असून प्रस्तावित शस्त्रक्रिया विषयी
                    माझे आता समाधान झाले आहे. ७. मी हे सुद्धा नमूद करून सांगतो की शस्त्रक्रिये विषयी मला
                    सांगण्यात आलेल्या बाबी उपचाराच्या
                    उत्तमोत्तम प्रयत्नाच्या पलीकडे जावून इच्छित परिणामांविषयी मला कोणतीही खात्री/हमी देण्यात आली
                    नाही. ८. मला याचे स्पष्टीकरण
                    करून सांगण्यात आले असून मला ते समजलेले आहे की सर्व प्रकारच्या | खबरदाऱ्या घेऊन देखील काही
                    गुंतागुंती घडू शकतात की
                    त्यामुळे रूग्णाचा मृत्यू ओढवणे किंवा काही बाबतीत अपंगत्व येऊ शकते. ९.या ऑपरेशन विषयी |
                    दुसऱ्या कोण्या अन्य डॉक्टरांचा
                    सल्ला घेण्यास हरकत नाही असे ही मला सुचवण्यात आले आहे. १०. मी हे नमूद करतो की हे सर्व
                    स्पष्टीकरण व समुपदेशन उलगडा
                    झाल्यावरच मला या विषयी निर्णय घेण्यासाठी व संमती देण्याविषयी पुरेशी वेळ देण्यात आली होती.
                    ११. मी अॅडमिट असतांना दिल्या
                    जाणाऱ्या औषधांची (गोळ्या/इंजेक्शन्स्) ह्यांची कोणत्याही स्वरूपात रिॲक्शन (दुष्परिणाम) येऊ
                    शकते. ह्याची मला कल्पना देण्यात
                    आली आहे व ते मला समजले |आहे. १२. उपचारा दरम्यान काही गुंतागुंत उद्भवल्यास मला (पेशंटला)
                    अतिदक्षता विभागात न्यावे
                    लागू शकते ह्याची मला कल्पना देण्यात आली असून ते मला समजले आहे. १३. ह्या हॉस्पिटलमध्ये
                    असलेल्या सुविधा मला/आम्हाला
                    माहीत आहेत. काही प्रकारची सुविधा नसल्याची कल्पना मला/आम्हाला डॉक्टरांनी दिली आहे. १४. हे
                    संमतीपत्र मी कुठल्याही दबावाखाली
                    आल्यावर न देता स्वेच्छेने व स्वखुशीने त्यावर स्वाक्षरी करीत आहे. १५. ह्या |
                    संमतीपत्रातील सर्व रिक्त जागा मी सही करण्यापुर्वी भरलेल्या होत्या.</div>

                <div class="col-6 mt-4">संमतीची दिनांक व वेळ :
                    <?php echo $a_de['12']; ?>
                </div>
                <div class="col-6 mt-4">पेशंट/पालकाची सही / अंगठा :
                    <?php
                    printSignatures($a_de, "13", $conn, $id); ?>
                </div>
                <div class="col-6 mb-4"></div>
                <div class="col-6 mt-1 mb-4"> पेशंट / पालकाचे नाव:
                    <?php printNames($a_de, "14", $conn, $id); ?>
                </div>
                <hr>
                <div class="col-6">Doctor / delegate Statement: I have explained the procedure to the patient
                    and the potential risks
                    involved, What the treatment is likely to involve, the benefits, the risk of any available
                    alternate treatments
                    (including no treatment) and any other particular concern of patient Any extra
                    procedure that might become necessary during procedure such as-Blood transfusion,
                    <div class="row">
                        <div class="col-12">Other procedure :
                            <?php echo $a_de['15']; ?>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">An interpreter service is required?</div>
                        <div class="col-3"><input type="radio" name="16" value="Yes" <?php if ($a_de['16'] == 'Yes') {
                            echo 'checked';
                        } ?> id="">Yes</div>
                        <div class="col-3"><input type="radio" name="16" value="No" <?php if ($a_de['16'] == 'No') {
                            echo 'checked';
                        } ?> id="">No</div>
                        <div class="col-12">Interpreter's Statement: I have given a sight translation in :</div>
                        <div class="col-12">
                            <?php echo $a_de['17']; ?>
                        </div>
                        <div class="col-12">and
                            assisted in the provision of any verbal and written information given to the
                            patient/parent or
                            guardian/substitute decision maker by the doctor.</div>
                        <div class="col-12 mt-1"> Name & Sign of Interpreter:
                            <?php echo $a_de['18']; ?>
                        </div>
                        <div class="col-12 mt-1">Date & Time :
                            <?php echo $a_de['19']; ?>
                        </div> <br>
                    </div>
                    <hr>

                </div>

                <div class="col-12">
                    साक्षीदार : आम्ही या संबंधी खात्री करून घेतली आहे की उपरोक्त माहितीचे स्पष्टीकरण
                    रूग्ण/त्याचे पालक
                    यांना अशा पध्दतीत आणि भाषेत समजावून | सांगण्यात आले आहे. की रुग्ण त्याचे आप्त/पालक/यांना ते
                    आमच्या
                    समक्ष समजले आहे. आम्ही याची सुद्धा खात्री देत आहोत की रूग्ण / त्याचे । | आप्त / पालक यांनी
                    ही
                    सही/अंगठ्याचा ठसा आमच्या उपस्थितीत उमटवला आहे.</div>
            </div>
            <div class="row">
                <div class="col-6">(१) साक्षीदाराची नांव व सही :
                    <?php echo $a_de['20']; ?>
                </div>
                <div class="col-6">(२) साक्षीदाराची नांव व सही :
                    <?php echo $a_de['21']; ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12"> प्रभारी डॉक्टर/प्रमुख शल्यचिकित्सक :
                            <?php echo $a_de['22']; ?>
                        </div>
                        <div class="col-12"> प्रमुख सहाय्यकाची स्वाक्षरी :
                            <?php echo $a_de['23']; ?>
                        </div>

                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-12"> पेशंट/पालकाची सही/अंगठा :
                        <?php
                    printSignatures($a_de, "24", $conn, $id); ?>
                        </div>
                        <div class="col-12"> पेशंट / पालकाचे नाव :
                        <?php
                    printNames($a_de, "25", $conn, $id); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    <h6 class="mt-2">Thank You !</h6>
</body>
<script>
    window.print();
</script>

</html>