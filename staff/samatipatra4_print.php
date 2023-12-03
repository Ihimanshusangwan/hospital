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

$sql4=mysqli_query($conn,"SELECT * FROM samtipatra1 WHERE id=$id");
$row4=mysqli_fetch_assoc($sql4);
$b_de = array_fill(0, 26, '');
if($row4){
    $b_de = json_decode($row4['b'], true);
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
        <a href="samatipatra4.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Samatipatra 4</h3>

    <?php include_once("../header/header.php") ?>
   
    <div class="row">
                <div class="col-12">
                    <div class="row">
                       
                        <div class="col-12 ">प्रमुख शल्यचिकित्सक/ प्रमुख (मध्यस्थ) सहाय्यक : डॉ. :<?php echo $b_de['1'];?></div>
                        <div class="col-12 my-2">रूग्णाविषयी माहिती</div>
                        <div class="col-3 mt-1">नांव : श्री / सौ. / कु</div>
                        <div class="col-6"> <?php echo $res['name']; ?></div>
                        <div class="col-1 mt-1">वय:</div>
                        <div class="col-2"><?php echo $res['age']; ?></div>
                        <div class="col-1">वर्ष:</div>
                        <div class="col-12 ">पत्ता:<?php echo $res['address']." , ".$res['taluka']." , ".$res['district']; ?>
                        </div>
                        <div class="col-12 mt-1"> रूग्णाचे मासिक उत्पन्न :<?php echo $b_de['3'];?></div>
                        <div class="col-12 mt-1">रुग्णाचे पालक / प्रतिनीधी बद्दल माहिती नांव : श्री. /सौ. / श्रीमती-
                       <?php echo $b_de['4'];?></div>
                        <div class="col-12 mt-1">पत्ता:<?php echo $b_de['5'];?></div>
                        <div class="col-12 mt-1"> फोन.:<?php echo $b_de['6'];?></div>
                        <div class="col-12 mt-1">रुग्णाशी नाते :<?php echo $b_de['7'];?></div>
                        <div class="col-12 mt-1">नियोजित शल्यचिकित्सा दिनांक :<?php echo $b_de['8'];?></div>
                        <div class="col-12 mt-1">प्रास्तावित उपायपद्दती / नियोजित शल्यचिकित्सा / उपचार पध्दती :<?php echo $b_de['9'];?>/div>
                        <div class="col-12 mt-1">अ.:<?php echo $b_de['10'];?></div>
                        <div class="col-12 mt-1">ब.:<?php echo $b_de['11'];?></div>
                        <div class="col-12">मी खालील सही करणार, या पत्रकाद्वारे खात्री पूर्वक लिहून देतो की,
                            <br>
                            १. संबंधीत उपचार पध्दती बद्दल मला सर्व अटी स्पष्टपणे बोलीभाषेत समजावून सांगण्यात आल्या असून
                            मला त्या समजल्या आहेत.
                            <br>
                            २. नियोजित पध्दती बद्दल मला सर्व अत्यावश्यक माहिती पुरवण्यात आली व ती मला समजली आहे. आणि
                            त्यानंतर मी संबंधीत वर उखलेल्या मुख्य भूलतज्ञास आणि त्यांच्या संघास अधिकृत परवानगी देत आहे.
                            त्यांनी त्यांच्या निवडीनुसार बधिरता पद्धतीचा नियोजित उपचार पध्दतीत वापर करावा व आवश्यक औषधी
                            पदार्थांचा वापर करण्याची भी संमती देत आहे.
                            <br>
                            ३. अनेस्थेशिया मूलदेण्याचे औषधाचा वापर करण्यापूर्वी अन्नपाणी कार्य करणे किंवा कोणत्याही धन व
                            द्रवरूप पदार्थाचे सेवन न करणे इ. विषयी
                            <br>
                            जोखीम या बद्दलचे महत्व मला समजावून सांगण्यात आले आहे ते मला समजले आहे.
                            <br>
                            ४. मूल देण्याच्या औषधाच्या वापरात काही भौतिक जोखीमा, गुंतागुंत उद्भवू शकतात याची जाणीव मला
                            करून देण्यात आली आहे व त्या विषयी आवश्यक माहिती मला पुरवण्यात आली आहे. (अनेस्थेशिया) मूल
                            देण्याचे औषधाचा विनीयोग करताना काही अनिश्चित, अनपेक्षित,
                            <br>
                            स्पष्टीकरणापलिकडील जोखीमा किया गुंतागुंती उद्भवू शकतात या विषयी मला स्पष्टीकरण करण्यात आले
                            आहे व ते मला समजले आहे.
                            <br>
                            ५. सर्व प्रकारची सावधगिरी बाळगून सुध्दा काही गुतागुती उदभवून त्याचा परिणाम म्हणून रुग्णाचा
                            मृत्यु किया दुर्बलता/अपंगत्व येऊ शकते हे
                            <br>
                            मला समजावून सांगण्यात आले असून ते मला नीट कळले आहे.
                            <br>
                            ६. मी या संगती पत्रावर स्वखुषीने स्वेच्छेने सही केली आहे. कुठल्याही बळजबरीच्या दबावाखाली
                            येऊन मी यास मान्यता दिलेली नाही.
                            <br>
                            ७. ह्या संमतीपत्रातील सर्व रिक जागा भी सही करण्यापूर्वी भरल्या होत्या
                        </div>

                        <div class="col-12 mt-4">संमतीची दिनांक व वेळ :<?php echo $b_de['12'];?></div>
                        <div class="col-12 mt-4">पेशंट/पालकाची सही / अंगठा :<?php echo $b_de['13'];?></div>
                        <div class="col-12 mt-1 mb-4"> पेशंट / पालकाचे नाव:<?php echo $b_de['14'];?></div>
                        <hr>
                        <div class="col-12">Doctor / delegate Statement: I have explained the procedure to the patient
                            and the potential risks
                            involved, What the treatment is likely to involve, the benefits, the risk of any available
                            alternate treatments
                            (including no treatment) and any other particular concern of patient Any extra
                            procedure that might become necessary during procedure such as-Blood transfusion,
                            <div class="row">
                                <div class="col-12">Other procedure:<?php echo $b_de['15'];?></div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">An interpreter service is required?</div>
                                <div class="col-3"><input type="radio" name="16" value="Yes" <?php if($b_de['16']=='Yes'){
                                    echo 'checked';
                                } ?> id="">Yes</div>
                                <div class="col-3"><input type="radio" name="16" value="No" <?php if($b_de['16']=='No'){
                                    echo 'checked';
                                } ?> id="">No</div>
                                <div class="col-12">Interpreter's Statement: I have given a sight translation in:<?php echo $b_de['17'];?></div>
                                <div class="col-12">and
                                    assisted in the provision of any verbal and written information given to the
                                    patient/parent or
                                    guardian/substitute decision maker by the doctor.</div>
                                <div class="col-6 mt-1"> Name & Sign of Interpreter:<?php echo $b_de['18'];?></div>
                                <div class="col-6 mt-1">Date & Time :<?php echo $b_de['19'];?>
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
                        <div class="col-6">(१) साक्षीदाराची नांव व सही :<?php echo $b_de['20'];?></div>
                        <div class="col-6">(२) साक्षीदाराची नांव व सही :<?php echo $b_de['21'];?></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12"> प्रभारी डॉक्टर/प्रमुख शल्यचिकित्सक :<?php echo $b_de['22'];?></div>

                                <div class="col-12"> प्रमुख सहाय्यकाची स्वाक्षरी :<?php echo $b_de['23'];?></div>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12"> पेशंट/पालकाची सही/अंगठा :<?php echo $b_de['24'];?></div>
                                <div class="col-12"> पेशंट / पालकाचे नाव :<?php echo $b_de['25'];?></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    <h6 class="text-center mt-3">Thank You !</h6>
</body>
<script>
window.print();
</script>

</html>