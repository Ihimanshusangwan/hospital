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
    
    $d=array();
    for ($i = 0; $i < 48; $i++) {
        $element = $_POST[ $i];
        array_push($d, $element);
    }
    
$d_en=json_encode($d);


$update ="UPDATE samtipatra1 SET
d='$d_en'
WHERE id =$id;
";
$sql3=mysqli_query($conn,$update);

}
$sql4=mysqli_query($conn,"SELECT * FROM samtipatra1 WHERE id=$id;");
$row4=mysqli_fetch_assoc($sql4);

if($row4){
    $d_de =  json_decode($row4['d'], true);
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
    <style type="text/css">
    body {
        background: lightgray;
        animation: fade-in 1s linear;
    }

    .fl {
        animation: gelatine 1s;
    }

    [class^="col-"] {
        margin-top: 0.5rem;
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

<body class="m-2">
    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class=" fl text-center text-dark">Samatipatra 2</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>

    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="samatipatra2_print.php?id=<?php echo $id; ?>" class=" btn btn-success" id="dashboard">Print</a>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-md-3">
                    <label class="form-label">UHID No: <?php echo $row2['uhid'];?></label>
                </div>
            </div>

            <form action="" method="post">
                <div class="row">
                    <div class="col-5">प्रमुख शल्यचिकित्सक / प्रमुख (मध्यस्थ) सहाय्यक :</div>
                    <div class="col-4"><input type="text" name="0" id="" class="form-control"
                            value="<?php echo $d_de[0];?>"></div>
                    <div class="col-3"></div>
                    <div class="col-1">डॉ.</div>
                    <div class="col-4"><input type="text" name="1" id="" class="form-control"
                            value="<?php echo $d_de[1];?>"></div>
                    <div class="col-7"></div>

                    <div class="col-1">शै अर्हता</div>
                    <div class="col-4"><input type="text" name="2" id="" class="form-control"
                            value="<?php echo $d_de[2];?>"></div>
                    <div class="col-7"></div>

                    <div class="col-1">पत्ता</div>
                    <div class="col-4"><input type="text" name="3" id="" class="form-control"
                            value="<?php echo $d_de[3];?>"></div>
                    <div class="col-7"></div>

                    <div class="col-1">फोन</div>
                    <div class="col-4"><input type="text" name="4" id="" class="form-control"
                            value="<?php echo $d_de[4];?>"></div>
                    <div class="col-7"></div>

                    <div class="col-1">ई-मेल </div>
                    <div class="col-4"><input type="text" name="5" id="" class="form-control"
                            value="<?php echo $d_de[5];?>"></div>
                    <div class="col-7"></div>

                    <div class="col-2">रुग्णाविषयी माहिती</div>
                    <div class="col-4"><input type="text" name="6" id="" class="form-control"
                            value="<?php echo $d_de[6];?>"></div>
                    <div class="col-3"></div>

                    <div class="col-12 text-center mt-4 "><strong>अतिगंभीर जोखमी विषयी संमती पत्रक</strong></div>
                    <div class="col-12">रुग्णाविषयी माहिती</div>
                    <div class="col-2">नांव : श्री / सौ. /कु.</div>
                    <div class="col-4"><input type="text" name="7" id="" class="form-control"
                            value="<?php echo $d_de[7];?>"></div>
                    <div class="col-1">वय</div>
                    <div class="col-2"><input type="text" name="8" id="" class="form-control"
                            value="<?php echo $d_de[8];?>"></div>
                    <div class="col-1">वर्ष</div>
                    <div class="col-2"><input type="text" name="9" id="" class="form-control"
                            value="<?php echo $d_de[9];?>"></div>
                    <div class="col-1">पत्ता</div>
                    <div class="col-5"><input type="text" name="10" id="" class="form-control"
                            value="<?php echo $d_de[10];?>"></div>
                    <div class="col-2">रूग्णाचे मासिक उत्पन्न:</div>
                    <div class="col-4"><input type="text" name="11" id="" class="form-control"
                            value="<?php echo $d_de[11];?>"></div>
                    <div class="col-4">रूग्णाचे पालक / प्रतिनीधी बद्दल माहिती</div>
                    <div class="col-8"><input type="text" name="12" id="" class="form-control"
                            value="<?php echo $d_de[12];?>"></div>
                    <div class="col-3">नांव : श्री. /सौ. / श्रीमती-</div>
                    <div class="col-4"><input type="text" name="13" id="" class="form-control"
                            value="<?php echo $d_de[13];?>"></div>
                    <div class="col-1">पत्ता:</div>
                    <div class="col-4"><input type="text" name="14" id="" class="form-control"
                            value="<?php echo $d_de[14];?>"></div>
                    <div class="col-1">फोन</div>
                    <div class="col-5"><input type="text" name="15" id="" class="form-control"
                            value="<?php echo $d_de[15];?>"></div>
                    <div class="col-2">रुग्णाशी नाते :</div>
                    <div class="col-4"><input type="text" name="16" id="" class="form-control"
                            value="<?php echo $d_de[16];?>"></div>
                    <div class="col-3">नियोजित शल्यचिकित्सा दिनांक</div>
                    <div class="col-3"><input type="date" name="17" id="" class="form-control"
                            value="<?php echo $d_de[17];?>"></div>
                    <div class="col-3">प्रभारी शल्य चिकित्सक :</div>
                    <div class="col-3"><input type="text" name="18" id="" class="form-control"
                            value="<?php echo $d_de[18];?>"></div>
                    <div class="col-1">नांव :</div>
                    <div class="col-5"><input type="text" name="19" id="" class="form-control"
                            value="<?php echo $d_de[19];?>"></div>
                    <div class="col-2">शैक्षणिक अर्हता</div>
                    <div class="col-4"><input type="text" name="20" id="" class="form-control"
                            value="<?php echo $d_de[20];?>"></div>
                    <div class="col-6">प्रास्तावित उपायपद्दती / नियोजित शल्यचिकित्सा / उपचार पध्दती:</div>
                    <div class="col-6"><input type="text" name="21" id="" class="form-control"
                            value="<?php echo $d_de[21];?>"></div>
                    <div class="col-1">अ.</div>
                    <div class="col-2"><input type="text" name="22" id="" class="form-control"
                            value="<?php echo $d_de[22];?>"></div>
                    <div class="col-1">ब.</div>
                    <div class="col-2"><input type="text" name="23" id="" class="form-control"
                            value="<?php echo $d_de[23];?>"></div>
                    <div class="col-1">क.</div>
                    <div class="col-2"><input type="text" name="24" id="" class="form-control"
                            value="<?php echo $d_de[24];?>"></div>
                    <div class="col-1">ड.</div>
                    <div class="col-2"><input type="text" name="25" id="" class="form-control"
                            value="<?php echo $d_de[25];?>"></div>
                    <div class="col-12">मी खालील सही करणार, या पत्रका द्वारे खात्री पूर्वक लिहून देतो की,</div>
                    <div class="col-12">१. मला स्पष्ट समजेल अशा भाषेत व शब्दात आणि मी समजू शकेल अशा मराठी बोली
                        भाषेत ही माहिती स्पष्ट करून सांगण्यात आली आहे. २. या
                        संबंधी पुरेशी माहती मला पुरवण्यात येऊन तिचे स्पष्टीकरण मला समजेल अशा भाषेत करून देण्यात आले आहे.
                        त्यानंतरच मी ही संमती देत आहे. व संबंधीत डॉक्टर/प्रमुख चिकीत्सक/ त्यांचे सहकारी यांना संमती देऊन
                        ना
                        हरकत ऑपरेशन करण्यास सूचवित आहे. ते त्यांच्या निवडी प्रमाणेच ऑपरेशन किंवा प्रास्तावित उपचार करतील
                        याची
                        मला जाणीव आहे. ३. उपचार प्रक्रिया / ऑपरेशन दरम्यान अपेक्षित पर्यायी व्यवस्था अधिक उपचार पध्दतीचे
                        ऑपरेशन यांचा
                        अधिकार मी त्यांना देत आहे. ४. मला हे देखील समजावून सांगण्यात आले आहे आणि ते मला समजले आहे की
                        ऑपरेशन दरम्यान
                        काही अकल्पीत घटना किंवा परिस्थीती उद्भवल्यास, आधी ठरलेल्या व्यतीरीक अन्य पध्दतीचा उपचार करावा
                        लागल्यास त्यांनी तो बेलाशक
                        करावा. एकंदरीत अशा संभाव्य परिस्थितीत मी अशी संमती देतो की डॉक्टरांच्या गृपने दुसऱ्या एखाद्या
                        योग्य वाटेल अशा त्यांच्या व्यवसायातील
                        अनुभवानुसार पर्यायी निर्णय घेऊन पाहिजे त्या प्रमाणे उपचार केल्यास माझी हरकत नाही. ५. प्रस्तावित
                        उपचार पध्दती संबंधी विशेष
                        जोखीमीच्या शस्त्रक्रियेविषयी / संबंधीत प्रस्तावित शस्त्रक्रियेविषयी काही महत्त्वाच्या जोखिमा /
                        गुंतागुंती याची शक्यता या विषयी मला
                        स्पष्टीकरण करून सांगण्यात आले असून मला त्या समजल्या आहेत त्याच बरोबर आवश्यक त्या गोष्टींची
                        माहितीही मला समजावून
                        सांगण्यात आली आहे. शस्त्रक्रिये दरम्यान किंवा त्या नंतर काही अनिश्चित अनपेक्षित अवर्णनीय बिघाड,
                        घडू शकतो यांचे स्पष्टीकरण
                        करून देण्यात आले असून मला ते समजले आहे.</div>
                    <div class="col-5"></div>
                    <div class="col-3">पेशंट / पालकाची सही/अंगठा</div>
                    <div class="col-4"><input type="text" name="26" id="" class="form-control"
                            value="<?php echo $d_de[26];?>"></div>
                    <div class="col-5"></div>
                    <div class="col-3">पेशंट / पालकाचे नाव</div>
                    <div class="col-4"><input type="text" name="27" id="" class="form-control"
                            value="<?php echo $d_de[27];?>"></div>
                    <div class="col-12">६. या उपचारा संबंधी किंवा शस्त्रक्रियेविषयी मी विचारलेल्या सर्व प्रश्न किंवा
                        शंका विषयी मला समाधान कारक उत्तरे देण्यात आले आहे असे मी नमूद करतो. ७. सर्व प्रकारची
                        खबरदारी घेऊन व काळजीपूर्वक प्रयत्न करून देखील प्रस्तावित ऑपरेशन किंवा उपाययोजना यशस्वी
                        होईल याची खात्री देता येत नाही हे मला समजावून सांगण्यात आले आहे. ऑपरेशन किंवा चिकित्से
                        परिणामाची कुठलीही हमी देता येत नाही या संबंधी मी खात्री केलेली आहे असे मी नमूद करतो. ८.
                        सर्व प्रकारची खबरदारी घेऊन देखील काही गुंतागुंत उद्भवु शकते किंवा रूग्णाचा मृत्यु ओढवू शकतो
                        किंवा
                        त्यास शारिरीक दुर्बल्य येऊ शकते याची मला जाणीव करून दिली गेली आहे आणि मला हे समजलेलं आहे.
                        ९. संबंधीत शस्त्रक्रिया किंवा प्रास्तावित चिकित्सा असामान्य / असाधारण गुंतागुंतीची आहे /जोखमिची
                        आहे
                        हे मला समजावून सांगण्यात आले आहे आणि ते मला समजलेले आहे. १०. प्रस्तावित चिकित्सा / शस्त्रक्रिया
                        ही अशा तंत्रपध्दतीवर / औषधांवर / शास्त्रोक्त प्रायोगिक तत्वावर आधारित आहे की जे सापेक्षतः नवीन
                        आहे हे मला समजावून सांगण्यात आले आहे आणि ते मला कळले आहे. ११. प्रस्तावित चिकित्सा /
                        शस्त्रक्रिया अपयशी ठरू शकते याची मला जाणिव करून देण्यात आली आहे व ती मला समजली आहे.
                        १२. अशा प्रकारची शस्त्रक्रिया/प्रस्तावित चिकित्सा याच्या मोठ्या प्रमाणात उलट प्रतिक्रिया होणे,
                        दुखणे
                        उलटणे त्याचा पुर्नउद्भव होऊ शकतो याची मला जाणीव करून देण्यात आली आहे व ती माझ्या लक्षात
                        आली आहे. १३. या शस्त्रक्रियेसंबंधी / चिकित्सा पद्धती बद्दल आवश्यक असलेल्या अनेक चर्चा/अभ्यास
                        सत्रे/बैठकी घेण्यात आल्या आहेत. अशा उपचारपद्धतीसाठी वारंवार ट्रिटमेंट / शस्त्रक्रिया करायला लागू
                        शकते. याची मला जाणीव करून देण्यात आली आहे आणि ती मला कळली आहे. १४. संबंधीत /
                        प्रस्तावित शस्त्रक्रिये विषयी पुरेशी माहिती देण्यात आली असून ह्यासाठी पुन्हा दुसरे ऑपरेशन/
                        शस्त्रक्रिया
                        करावी लागू शकते याची मला जाणीव करून देण्यात आलेली आहे. १५. प्रस्तावित शस्त्रक्रियेस आवश्यक
                        असलेली पर्यायी सुधारित तातडीची शस्त्रक्रिया, गुंतागुंतीची असल्याचे मला स्पष्टीकरण करून
                        सांगितलेली व
                        समजलेली आहे. त्यानुसार मी माझी संमती दिलेली आहे. १६. प्रस्तावित शस्त्रक्रियेत साधारणतः नव्याने
                        संशोधन
                        करावे लागणार याची मला जाणीव करून देण्यात आली आहे व ते मला समजले आहे. त्यानुसार मी माझी
                        संमती दिलेली आहे. १७. संबंधीत उपचार पद्धतीत विविध टप्प्यांच्या उपचाराची गरज असल्याचे मला
                        समजावून सांगण्यात आले असून मी माझी संमती दिली आहे. १८. मला प्रदीर्घ काळापर्यंत उपचार घ्यावे
                        लागणार याची समज देण्यात आली असून मला त्यासंबधीचे स्पष्टीकरण समजले आहे. १९. मला दीर्घकाळपर्यंत
                        सराव करणे व काळजी घेणे आवश्यक आहे याचे ही स्पष्टीकरण करून सांगण्यात आले असून मला ते समजलेले
                        आहे.. २०. व्याधीमुक्तीसाठी मला प्रदीर्घकाळ लागू शकेल याची जाणीव करून देण्यात आली असून ते माझ्या
                        लक्षात आले आहे. २१. शस्त्रक्रिये आधी, शस्त्रक्रिये दरम्यान अथवा शस्त्रक्रिये पश्चात काही
                        गुंतागुंत उद्भवल्यास
                        मला (पेशंटला) अतिदक्षता विभागात न्यावे लागू शकते ह्याची मला कल्पना देण्यात आली असून ते मला
                        समजले आहे. २२. मी ऑडमिट असतांना दिल्या जाणाऱ्या औषधांची (गोळ्या / इंजेक्शन्स्) ह्यांची
                        कोणत्याही स्वरूपात रिअॅक्शन
                        (दुष्परिणाम) येऊ शकते. ह्याची मला कल्पना देण्यात आली आहे व ते मला समजले आहे. २३. मी नमूद करू
                        इच्छितो की जर या
                        उपचारा दरम्यान मी भविष्यकाळात संपर्क करण्यास असमर्थ ठरलो तर आपण पुढील मार्गदर्शनासाठी खालील
                        व्यक्तींचे मार्गदर्शन / निर्णय आपण घेऊ शकता.</div>
                    <div class="col-1">नांव</div>
                    <div class="col-3"><input type="text" name="28" id="" class="form-control"
                            value="<?php echo $d_de[28];?>"></div>
                    <div class="col-1">मोबाईल</div>
                    <div class="col-3"><input type="text" name="29" id="" class="form-control"
                            value="<?php echo $d_de[29];?>"></div>
                    <div class="col-1">पत्ता</div>
                    <div class="col-3"><input type="text" name="30" id="" class="form-control"
                            value="<?php echo $d_de[30];?>"></div>
                    <div class="col-1">नांव</div>
                    <div class="col-3"><input type="text" name="31" id="" class="form-control"
                            value="<?php echo $d_de[31];?>"></div>
                    <div class="col-1">मोबाईल</div>
                    <div class="col-3"><input type="text" name="32" id="" class="form-control"
                            value="<?php echo $d_de[32];?>"></div>
                    <div class="col-1">पत्ता</div>
                    <div class="col-3"><input type="text" name="33" id="" class="form-control"
                            value="<?php echo $d_de[33];?>"></div>
                    <div class="col-1">नांव</div>
                    <div class="col-3"><input type="text" name="34" id="" class="form-control"
                            value="<?php echo $d_de[34];?>"></div>
                    <div class="col-1">मोबाईल</div>
                    <div class="col-3"><input type="text" name="35" id="" class="form-control"
                            value="<?php echo $d_de[35];?>"></div>
                    <div class="col-1">पत्ता</div>
                    <div class="col-3"><input type="text" name="36" id="" class="form-control"
                            value="<?php echo $d_de[36];?>"></div>
                    <div class="col-12">२४. संबंधीत शस्त्रक्रियेविषयी मी दुसऱ्या डॉक्टरांचे मत घेऊ शकतो असा सल्ला मला
                        देण्यात आला आहे. २५. मी नमूद करतो की मला सर्व बाबी समजावून सांगितल्यानंतर सल्ला मसल्लत प्रगटीकरण
                        केल्यावर मला निर्णय घेण्यास व संमती देण्यास पुरेसा अवधी देण्यात आला होता. २६. ह्या हॉस्पिटलमध्ये
                        असलेल्या सुविधा मला/आम्हाला माहीत आहेत. काही प्रकारची सुविधा नसल्याची कल्पना मला/आम्हाला
                        डॉक्टरांनी दिली आहे. २७. ही संमती मी स्वखुशीने कोणत्याही दडपणाखाली न येता या संमती वर मी
                        स्वाक्षरी करीत आहे. २८. ह्या संमतीपत्रातील सर्व रिक्त जागा मी
                        सही करण्यापूर्वी भरल्या होत्या.</div>
                    <div class="col-3">संमतीची दिनांक व वेळ:</div>
                    <div class="col-3"><input type="text" name="37" id="" class="form-control"
                            value="<?php echo $d_de[37];?>"></div>
                    <div class="col-6"></div>
                    <div class="col-3">पेशंट / पालकाची सही/अंगठा :</div>
                    <div class="col-3"><input type="text" name="38" id="" class="form-control"
                            value="<?php echo $d_de[38];?>"></div>
                    <div class="col-6"></div>
                    <div class="col-3">पेशंट/पालकाचे नाव:</div>
                    <div class="col-3"><input type="text" name="39" id="" class="form-control"
                            value="<?php echo $d_de[39];?>"></div>
                    <div class="col-6"></div>
                    <div class="col-3">साक्षीदार :</div>
                    <div class="col-3"><input type="text" name="40" id="" class="form-control"
                            value="<?php echo $d_de[40];?>"></div>
                    <div class="col-6"></div>
                    <div class="col-12">आम्ही या संबंधी खात्री करून घेतली आहे की उपरोक्त माहितीचे स्पष्टीकरण रूग्ण /
                        त्याचे पालक यांना अशा पध्दतीत आणि भाषेत समजावून सांगण्यात आले आहे. की रूग्ण त्याचे
                        आप्त/पालक/यांना ते आमच्या समक्ष समजले आहे. आम्ही याची सुद्धा खात्री देत आहोत की रूग्ण / त्याचे
                        आप्त / पालक यांनी ही सही / अंगठ्याचा ठसा आमच्या उपस्थितीत उमटवला आहे.</div>
                    <div class="col-2">(१) साक्षीदाराची सही:</div>
                    <div class="col-4"><input type="text" name="41" id="" class="form-control"
                            value="<?php echo $d_de[41];?>"></div>
                    <div class="col-2">(२) साक्षीदाराची सही</div>
                    <div class="col-4"><input type="text" name="42" id="" class="form-control"
                            value="<?php echo $d_de[42];?>"></div>
                    <div class="col-2">(१) साक्षीदाराचे नांव:</div>
                    <div class="col-4"><input type="text" name="43" id="" class="form-control"
                            value="<?php echo $d_de[43];?>"></div>
                    <div class="col-2">(२)साक्षीदाराचे नांव</div>
                    <div class="col-4"><input type="text" name="44" id="" class="form-control"
                            value="<?php echo $d_de[44];?>"></div>
                    <div class="col-6">प्रभारी डॉक्टर / प्रमुख शल्यचिकित्सक / प्रमुख सहाय्यकाची स्वाक्षरी:
                        पेशंट / पालकाची सही/अंगठा</div>
                    <div class="col-6"><input type="text" name="45" id="" class="form-control"
                            value="<?php echo $d_de[45];?>"></div>
                    <div class="col-5"></div>
                    <div class="col-3">पेशंट / पालकाची सही/अंगठा</div>
                    <div class="col-4"><input type="text" name="46" id="" class="form-control"
                            value="<?php echo $d_de[46];?>" ></div>
                    <div class="col-5"></div>
                    <div class="col-3">पेशंट / पालकाचे नाव</div>
                    <div class="col-4"><input type="text" name="47" id="" class="form-control"
                            value="<?php echo $d_de[47];?>"></div>


                </div>


                <br>
                <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit"
                    id="submit">Submit</button>

            </form>
        </div>
</body>

</html>