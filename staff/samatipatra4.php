<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $row = $data->fetch_assoc();

  $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
  $data1 = $conn->query($sql1);
  $res1 = $data1->fetch_assoc();

  $sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res2 = $data2->fetch_assoc();
  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();

if(isset($_POST['submit'])){
    $b=array();
    for($i = 0; $i < 26; $i++){
        $element = isset($_POST[$i]) ? $_POST[$i] : '';
            array_push($b, $element);
    }

    $b_en=json_encode($b);

    $update="UPDATE samtipatra1 SET
    b='$b_en'
    WHERE id=$id;
    ";
    $sql3=mysqli_query($conn,$update);

}
$sql4=mysqli_query($conn,"SELECT * FROM samtipatra1 WHERE id=$id");
$row4=mysqli_fetch_assoc($sql4);
$b_de = array_fill(0, 26, '');
if($row4){
    $b_de = json_decode($row4['b'], true);
}
error_reporting(0);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
    .size {
        width: 50px;
        margin: 6px;
    }

    .size1 {
        width: 700px;
        margin: 6px;
    }

    .size2 {
        width: 120px;
    }

    .size3 {
        width: 250px;

    }

    body {
        background: lightgray;
        animation: fade-in 1s linear;
    }

    .fl {
        animation: gelatine 1s;
    }

    th tr td {
        background-color: lightgray
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
        border: 2px solid black;
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
        margin: 2px;

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
</head>

<body>
    <h1 class="text-center text-danger mt-3">
        <?php echo $title['so'] ?>
    </h1>
    <h3 class="text-center text-dark mt-3">Samatipatra 4</h3>

    <form method="POST">
        <div class="container shadow-lg rounded">

            <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
            <a href="samatipatra4_print.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Print</a>



            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-1">UHID No:</div>
                        <div class="col-2"><?php echo $res2['uhid']; ?></div>
                        <div class="col-1">IPD No:</div>
                        <div class="col-2"><?php echo $res2['ipd']; ?></div>
                        <div class="col-4 mt-1">प्रमुख शल्यचिकित्सक/ प्रमुख (मध्यस्थ) सहाय्यक : डॉ. </div>
                        <div class="col-8"><input type="text" name="1" id="" value="<?php echo $b_de['1'];?>"
                                class="form-control"></div>
                        <div class="col-12 my-2">रूग्णाविषयी माहिती</div>
                        <div class="col-2 mt-1">नांव : श्री / सौ. / कु</div>
                        <div class="col-6"><input type="text" name="2" id="" readonly
                                value=" <?php echo $row['name']; ?>" class="form-control"></div>
                        <div class="col-1 mt-1">वय:</div>
                        <div class="col-2"><input type="text" value=" <?php echo $b_de['age']; ?>" readonly name=""
                                id="" class="form-control"></div>
                        <div class="col-1 mt-1">वर्ष:</div>
                        <div class="col-1 mt-1">पत्ता:</div>
                        <div class="col-5"><input type="text" class="form-control" id="" name=""
                                value=" <?php echo $row['address']." , ".$row['taluka']." , ".$row['district']; ?>"
                                readonly>
                        </div>
                        <div class="col-2 mt-1"> रूग्णाचे मासिक उत्पन्न :</div>
                        <div class="col-4"><input type="text" name="3" id="" value="<?php echo $b_de['3'];?>"
                                class="form-control"></div>
                        <div class="col-5 mt-1">रुग्णाचे पालक / प्रतिनीधी बद्दल माहिती नांव : श्री. /सौ. / श्रीमती-
                        </div>
                        <div class="col-7"><input type="text" name="4" id="" value="<?php echo $b_de['4'];?>"
                                class="form-control"></div>
                        <div class="col-1 mt-1">पत्ता:</div>
                        <div class="col-5"><input type="text" name="5" id="" value="<?php echo $b_de['5'];?>"
                                class="form-control"></div>
                        <div class="col-1 mt-1"> फोन.:</div>
                        <div class="col-5"><input type="text" name="6" id="" value="<?php echo $b_de['6'];?>"
                                class="form-control"></div>
                        <div class="col-2 mt-1">रुग्णाशी नाते :</div>
                        <div class="col-10"><input type="text" name="7" id="" value="<?php echo $b_de['7'];?>"
                                class="form-control"></div>
                        <div class="col-3 mt-1">नियोजित शल्यचिकित्सा दिनांक :</div>
                        <div class="col-9"><input type="date" name="8" id="" value="<?php echo $b_de['8'];?>"
                                class="form-control"></div>
                        <div class="col-5 mt-1">प्रास्तावित उपायपद्दती / नियोजित शल्यचिकित्सा / उपचार पध्दती :</div>
                        <div class="col-7"><input type="text" name="9" id="" value="<?php echo $b_de['9'];?>"
                                class="form-control"></div>
                        <div class="col-1 mt-1">अ.</div>
                        <div class="col-5"><input type="text" name="10" id="" value="<?php echo $b_de['10'];?>"
                                class="form-control"></div>
                        <div class="col-1 mt-1">ब.</div>
                        <div class="col-5"><input type="text" name="11" id="" value="<?php echo $b_de['11'];?>"
                                class="form-control"></div>
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

                        <div class="col-2 mt-4">संमतीची दिनांक व वेळ :</div>
                        <div class="col-4 mt-3"><input type="datetime-local" value="<?php echo $b_de['12'];?>"
                                class="form-control" name="12" id=""></div>
                        <div class="col-3 mt-4">पेशंट/पालकाची सही / अंगठा :</div>
                        <div class="col-3 mt-3"><input type="text" name="13" value="<?php echo $b_de['13'];?>" id=""
                                class="form-control"></div>
                        <div class="col-6 mb-4"></div>
                        <div class="col-2 mt-1 mb-4"> पेशंट / पालकाचे नाव:</div>
                        <div class="col-4 mb-4"><input type="text" name="14" value="<?php echo $b_de['14'];?>" id=""
                                class="form-control"></div>
                        <hr>
                        <div class="col-6">Doctor / delegate Statement: I have explained the procedure to the patient
                            and the potential risks
                            involved, What the treatment is likely to involve, the benefits, the risk of any available
                            alternate treatments
                            (including no treatment) and any other particular concern of patient Any extra
                            procedure that might become necessary during procedure such as-Blood transfusion,
                            <div class="row">
                                <div class="col-3">Other procedure</div>
                                <div class="col-9"><input type="text" name="15" value="<?php echo $b_de['15'];?>" id=""
                                        class="form-control"></div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">An interpreter service is required?</div>
                                <div class="col-3"><input type="radio" name="16" value="Yes" <?php if($b_de['16']=='Yes'){
                                    echo 'checked';
                                } ?> id="">Yes</div>
                                <div class="col-3"><input type="radio" name="16" value="No" <?php if($b_de['16']=='No'){
                                    echo 'checked';
                                } ?> id="">No</div>
                                <div class="col-12">Interpreter's Statement: I have given a sight translation in</div>
                                <div class="col-12"><input type="text" name="17" value="<?php echo $b_de['17'];?>" id=""
                                        class="form-control"></div>
                                <div class="col-12">and
                                    assisted in the provision of any verbal and written information given to the
                                    patient/parent or
                                    guardian/substitute decision maker by the doctor.</div>
                                <div class="col-6 mt-1"> Name & Sign of Interpreter:</div>
                                <div class="col-6"><input type="text" name="18" value="<?php echo $b_de['18'];?>" id=""
                                        class="form-control"></div>
                                <div class="col-6 mt-1">Date & Time :</div>
                                <div class="col-6"><input type="datetime-local" value="<?php echo $b_de['19'];?>"
                                        name="19" id="" class="form-control">
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
                        <div class="col-3">(१) साक्षीदाराची नांव व सही :</div>
                        <div class="col-3"><input type="text" name="20" id="" value="<?php echo $b_de['20'];?>"
                                class="form-control"></div>
                        <div class="col-3">(२) साक्षीदाराची नांव व सही :</div>
                        <div class="col-3"><input type="text" name="21" id="" value="<?php echo $b_de['21'];?>"
                                class="form-control"></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6"> प्रभारी डॉक्टर/प्रमुख शल्यचिकित्सक :</div>
                                <div class="col-6"><input type="text" name="22" value="<?php echo $b_de['22'];?>" id=""
                                        class="form-control"></div>

                                <div class="col-6"> प्रमुख सहाय्यकाची स्वाक्षरी :</div>
                                <div class="col-6"><input type="text" name="23" value="<?php echo $b_de['23'];?>" id=""
                                        class="form-control"></div>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6"> पेशंट/पालकाची सही/अंगठा :</div>
                                <div class="col-6"><input type="text" name="24" value="<?php echo $b_de['24'];?>" id=""
                                        class="form-control"></div>
                                <div class="col-6"> पेशंट / पालकाचे नाव :</div>
                                <div class="col-6"><input type="text" name="25" value="<?php echo $b_de['25'];?>" id=""
                                        class="form-control"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>

        <button class="btn btn-primary m-3" name="submit">Submit</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>