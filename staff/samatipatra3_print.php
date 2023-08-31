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

$sql4=mysqli_query($conn,"SELECT * FROM samtipatra1 WHERE id=$id;");
$row4=mysqli_fetch_assoc($sql4);

if($row4){
    $e_de =  json_decode($row4['e'], true);
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
        <a href="samatipatra3.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Samatipatra 3</h3>

    <?php include_once("../header/header.php") ?>


    <div class="row">
                    <div class="col-12">प्रमुख शल्यचिकित्सक / प्रमुख (मध्यस्थ) सहाय्यक :<?php echo $e_de[0];?></div>
                    <div class="col-12">डॉ.:<?php echo $e_de[1];?></div>
                    <div class="col-12">शै अर्हता :<?php echo $e_de[2];?></div>
                    <div class="col-12">पत्ता :<?php echo $e_de[3];?></div>
                    <div class="col-12">फोन :<?php echo $e_de[4];?></div>
                    <div class="col-12">ई-मेल :<?php echo $e_de[5];?></div>

                    <div class="col-12 text-center mt-4 "><strong>रक्त संक्रमणाविषयी संमती</strong></div>
                    <div class="col-12">रुग्णाविषयी माहिती</div>
                    <div class="col-3">नांव : श्री / सौ. /कु.</div>
                    <div class="col-3"><?php echo $e_de[6];?></div>
                    <div class="col-1">वय :</div>
                    <div class="col-2"><?php echo $e_de[7];?></div>
                    <div class="col-1">वर्ष :</div>
                    <div class="col-2"><?php echo $e_de[8];?></div>
                    <div class="col-1">पत्ता :</div>
                    <div class="col-5"><?php echo $e_de[9];?></div>
                    <div class="col-3">रूग्णाचे मासिक उत्पन्न:</div>
                    <div class="col-3"><?php echo $e_de[10];?></div>
                    <div class="col-12">रूग्णाचे पालक / प्रतिनीधी बद्दल माहिती : <?php echo $e_de[11];?></div>
                    <div class="col-3">नांव : श्री. /सौ. / श्रीमती-</div>
                    <div class="col-4"><?php echo $e_de[12];?></div>
                    <div class="col-1">पत्ता:</div>
                    <div class="col-4"><?php echo $e_de[13];?></div>
                    <div class="col-1">फोन:</div>
                    <div class="col-5"><?php echo $e_de[14];?></div>
                    <div class="col-2">रुग्णाशी नाते :</div>
                    <div class="col-4"><?php echo $e_de[15];?></div>
                    <div class="col-4">नियोजित शल्यचिकित्सा दिनांक:</div>
                    <div class="col-2"><?php echo $e_de[16];?></div>
                    <div class="col-3">प्रभारी शल्य चिकित्सक :</div>
                    <div class="col-3"><?php echo $e_de[17];?></div>
                    <div class="col-1">नांव :</div>
                    <div class="col-5"><?php echo $e_de[18];?></div>
                    <div class="col-2">शैक्षणिक अर्हता:</div>
                    <div class="col-4"><?php echo $e_de[19];?></div>
                    <div class="col-6">प्रास्तावित उपायपद्दती / नियोजित शल्यचिकित्सा / उपचार पध्दती:</div>
                    <div class="col-6"><?php echo $e_de[20];?></div>
                    <div class="col-12">अ.:<?php echo $e_de[21];?></div>
                    <div class="col-12">ब.:<?php echo $e_de[22];?></div>
                    <div class="col-12">क.:<?php echo $e_de[23];?></div>
                    <div class="col-12">ड.:<?php echo $e_de[24];?></div>
                    <div class="col-12">मी खालील सही करणार, या पत्रकाद्वारे खात्री पूर्वक लिहून देतो की, </div>
                    <div class="col-12">
                        १. मला स्पष्ट समजेल अशा भाषेत व शब्दात आणि मी समजू शकेल अशा मराठी बोली भाषेत ही माहिती स्पष्ट
                        करून सांगण्यात आली आहे.
                        २. या संबंधी पुरेशी माहिती मला पुरवण्यात येऊन तिचे स्पष्टीकरण मला समजेल अशा पद्धतीने करून
                        देण्यात आले आहे. त्यानंतरच मी ही संमती देत आहे. व संबंधीत डॉक्टर/प्रमुख चिकीत्सक/त्यांचे सहकारी
                        यांना संमती देऊन विना हरकत ऑपरेशन करण्यास अधिकार देऊन सूचवित आहे. ते त्यांच्या निवडी प्रमाणेच
                        ऑपरेशन किंवा प्रास्तावित उपचार करतील याची मला जाणीव आहे.
                        ३. मला हे समजावून स्पष्टीकरण करून
                        सांगण्यात आले आहे की, रक्त संक्रमण/रक्त घटक संक्रमित करतांना काही भौतिक जोखिमा गुंतागुंती
                        निर्माण होऊ शकतात जसे रूग्णाला हिपॅटायटीस. एच. आय. व्ही. सिफीलीस काही भौतिक परोपजिवी विषाणू इ.
                        ची बाधा झालेली असू शकतो. मला
                        या संबंधीची पुरेशी माहिती पुरवण्यात आलेली आहे मला हे देखील समजावून सांगण्यात आले आहे की यात आणखी
                        विश्लेषणा पलीकडील,
                        अनपेक्षीत स्पष्टीकरण पलिकडील जोखीमा गुंतागुंती बाहारक्त रक्त संक्रमित करतांना होऊ शकतात. ४. मला
                        हे समजावून सांगण्यात आले आहे व मला ते समजले आहे की रक्त संक्रमण करतांना किंवा रक्त घटक बदलतांना
                        ऑपरेशनमध्ये क्रॉस चेकींग, मेचिंग अचूक पध्दतीने करून ही त्यात रिअॅक्शन ची शक्यता नाकारता येत
                        नाही.
                        ५. हे मी नमूद करतो की प्रमुख चिकित्सक इ. सर्व संबंधीतांनी माझ्या सर्व प्रश्नांची उत्तरे समाधान
                        कारक रित्या दिली आहेत त्यामुळे मला रक्त घटक बदलणे किंवा रक्त संक्रमित करणे या बद्दल माझे समाधान
                        झाले आहे. ६. रक्त संक्रमण करतांना काही गुंतागुंत उद्भवल्यास मला (पेशंटला) अतिदक्षता विभागात
                        न्यावे लागू शकते ह्याची मला कल्पना देण्यात आली
                        असून ते मला समजले आहे.
                        ७. ह्या हॉस्पिटलमध्ये असलेल्या सुविधा मला / आम्हाला माहीत आहेत. काही प्रकारची सुविधा नसल्याची
                        कल्पना मला/आम्हाला डॉक्टरांनी दिली
                        आहे. ८. मी ही स्वाक्षरी स्वखुशीने माझ्या स्वेच्छेने कुठल्याही दडपण किंवा जबरदस्तीला बळी पडून
                        दिलेली नाही. ९. वरील संमतीपत्रातील सर्व रिक्त जागा मी सही करण्यापुर्वी भरलेल्या होत्या.
                    </div>
                    <div class="col-12">संमतीची दिनांक व वेळ:<?php echo $e_de[25];?></div>
                    <div class="col-12">पेशंट / पालकाची सही / अंगठा:<?php echo $e_de[26];?></div>
                    <div class="col-12">पेशंट/पालकाचे नाव:<?php echo $e_de[27];?></div>
                    <div class="col-12">साक्षीदार:</div>
                    <div class="col-12">
                        आम्ही या संबंधी खात्री करून घेतली आहे की उपरोक्त माहितीचे स्पष्टीकरण रूग्ण / त्याचे पालक यांना
                        अशा पध्दतीत आणि भाषेत समजावून सांगण्यात आले आहे. की रूण त्याचे आप्त/पालक / यांना ते आमच्या समक्ष
                        समजले आहे. आम्ही याची सुद्धा खात्री देत आहोत की रूग्ण / त्याचे आप्त/पालक यांनी ही सही/ अंगठ्याचा
                        ठसा आमच्या उपस्थितीत उमटवला आहे.</div>
                    <div class="col-6">(१) साक्षीदाराची सही:<?php echo $e_de[28];?></div>
                    <div class="col-6">(२) साक्षीदाराची सही<?php echo $e_de[29];?></div>
                    <div class="col-6">(१) साक्षीदाराचे नांव:<?php echo $e_de[30];?></div>
                    <div class="col-6">(२)साक्षीदाराचे नांव: <?php echo $e_de[31];?></div>
                    <div class="col-12">प्रभारी डॉक्टर / प्रमुख शल्यचिकित्सक / प्रमुख सहाय्यकाची स्वाक्षरी:
                        पेशंट / पालकाची सही/अंगठा : <?php echo $e_de[32];?></div>
                    <div class="col-5"></div>
                    <div class="col-7">पेशंट / पालकाची सही/अंगठा :<?php echo $e_de[33];?></div>
                    <div class="col-5"></div>
                    <div class="col-7">पेशंट / पालकाचे नाव:<?php echo $e_de[34];?></div>


                </div>
    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>