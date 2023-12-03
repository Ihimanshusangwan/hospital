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
    
    $e=array();
    for ($i = 0; $i < 35; $i++) {
        $element = $_POST[ $i];
        array_push($e, $element);
    }
    
$e_en=json_encode($e);


$update ="UPDATE samtipatra1 SET
e='$e_en'
WHERE id =$id;
";
$sql3=mysqli_query($conn,$update);

}
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
        <h3 class=" fl text-center text-dark">Samatipatra 3</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>

    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="samatipatra3_print.php?id=<?php echo $id; ?>" class=" btn btn-success" id="dashboard">Print</a>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-md-3">
                    <label class="form-label">UHID No: <?php echo $row2['uhid'];?></label>
                </div>
            </div>

            <form action="" method="post">
                <div class="row">
                    <div class="col-5">प्रमुख शल्यचिकित्सक / प्रमुख (मध्यस्थ) सहाय्यक :</div>
                    <div class="col-4"><input type="text" name="0" id="" value="<?php echo $e_de[0];?>"
                            class="form-control"></div>
                    <div class="col-3"></div>
                    <div class="col-1">डॉ.</div>
                    <div class="col-4"><input type="text" name="1" id="" value="<?php echo $e_de[1];?>"
                            class="form-control"></div>
                    <div class="col-7"></div>

                    <div class="col-1">शै अर्हता</div>
                    <div class="col-4"><input type="text" name="2" id="" value="<?php echo $e_de[2];?>"
                            class="form-control"></div>
                    <div class="col-7"></div>

                    <div class="col-1">पत्ता</div>
                    <div class="col-4"><input type="text" name="3" id="" value="<?php echo $e_de[3];?>"
                            class="form-control"></div>
                    <div class="col-7"></div>

                    <div class="col-1">फोन</div>
                    <div class="col-4"><input type="text" name="4" id="" value="<?php echo $e_de[4];?>"
                            class="form-control"></div>
                    <div class="col-7"></div>

                    <div class="col-1">ई-मेल </div>
                    <div class="col-4"><input type="text" name="5" id="" value="<?php echo $e_de[5];?>"
                            class="form-control"></div>
                    <div class="col-7"></div>

                    <div class="col-12 text-center mt-4 "><strong>रक्त संक्रमणाविषयी संमती</strong></div>
                    <div class="col-12">रुग्णाविषयी माहिती</div>
                    <div class="col-2">नांव : श्री / सौ. /कु.</div>
                    <div class="col-4"><input type="text" name="6" id="" value="<?php echo $e_de[6];?>"
                            class="form-control"></div>
                    <div class="col-1">वय</div>
                    <div class="col-2"><input type="text" name="7" id="" value="<?php echo $e_de[7];?>"
                            class="form-control"></div>
                    <div class="col-1">वर्ष</div>
                    <div class="col-2"><input type="text" name="8" id="" value="<?php echo $e_de[8];?>"
                            class="form-control"></div>
                    <div class="col-1">पत्ता</div>
                    <div class="col-5"><input type="text" name="9" id="" value="<?php echo $e_de[9];?>"
                            class="form-control"></div>
                    <div class="col-2">रूग्णाचे मासिक उत्पन्न:</div>
                    <div class="col-4"><input type="text" name="10" id="" value="<?php echo $e_de[10];?>"
                            class="form-control"></div>
                    <div class="col-4">रूग्णाचे पालक / प्रतिनीधी बद्दल माहिती</div>
                    <div class="col-8"><input type="text" name="11" id="" value="<?php echo $e_de[11];?>"
                            class="form-control"></div>
                    <div class="col-3">नांव : श्री. /सौ. / श्रीमती-</div>
                    <div class="col-4"><input type="text" name="12" id="" value="<?php echo $e_de[12];?>"
                            class="form-control"></div>
                    <div class="col-1">पत्ता:</div>
                    <div class="col-4"><input type="text" name="13" id="" value="<?php echo $e_de[13];?>"
                            class="form-control"></div>
                    <div class="col-1">फोन</div>
                    <div class="col-5"><input type="text" name="14" id="" value="<?php echo $e_de[14];?>"
                            class="form-control"></div>
                    <div class="col-2">रुग्णाशी नाते :</div>
                    <div class="col-4"><input type="text" name="15" id="" value="<?php echo $e_de[15];?>"
                            class="form-control"></div>
                    <div class="col-3">नियोजित शल्यचिकित्सा दिनांक</div>
                    <div class="col-3"><input type="date" name="16" id="" value="<?php echo $e_de[16];?>"
                            class="form-control"></div>
                    <div class="col-3">प्रभारी शल्य चिकित्सक :</div>
                    <div class="col-3"><input type="text" name="17" id="" value="<?php echo $e_de[17];?>" 
                            class="form-control"></div>
                    <div class="col-1">नांव :</div>
                    <div class="col-5"><input type="text" name="18" id="" value="<?php echo $e_de[18];?>"
                            class="form-control"></div>
                    <div class="col-2">शैक्षणिक अर्हता</div>
                    <div class="col-4"><input type="text" name="19" id="" value="<?php echo $e_de[19];?>"
                            class="form-control"></div>
                    <div class="col-6">प्रास्तावित उपायपद्दती / नियोजित शल्यचिकित्सा / उपचार पध्दती:</div>
                    <div class="col-6"><input type="text" name="20" id="" value="<?php echo $e_de[20];?>"
                            class="form-control"></div>
                    <div class="col-1">अ.</div>
                    <div class="col-2"><input type="text" name="21" id="" value="<?php echo $e_de[21];?>"
                            class="form-control"></div>
                    <div class="col-1">ब.</div>
                    <div class="col-2"><input type="text" name="22" id="" value="<?php echo $e_de[22];?>"
                            class="form-control"></div>
                    <div class="col-1">क.</div>
                    <div class="col-2"><input type="text" name="23" id="" value="<?php echo $e_de[23];?>"
                            class="form-control"></div>
                    <div class="col-1">ड.</div>
                    <div class="col-2"><input type="text" name="24" id="" value="<?php echo $e_de[24];?>"
                            class="form-control"></div>
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
                    <div class="col-2">संमतीची दिनांक व वेळ</div>
                    <div class="col-4"><input type="text" name="25" id="" value="<?php echo $e_de[25];?>"
                            class="form-control"></div>
                    <div class="col-3">पेशंट / पालकाची सही / अंगठा</div>
                    <div class="col-3"><input type="text" name="26" id="" value="<?php echo $e_de[26];?>"
                            class="form-control"></div>
                    <div class="col-2">पेशंट/पालकाचे नाव:</div>
                    <div class="col-4"><input type="text" name="27" id="" value="<?php echo $e_de[27];?>"
                            class="form-control"></div>
                    <div class="col-12">साक्षीदार:</div>
                    <div class="col-12">
                        आम्ही या संबंधी खात्री करून घेतली आहे की उपरोक्त माहितीचे स्पष्टीकरण रूग्ण / त्याचे पालक यांना
                        अशा पध्दतीत आणि भाषेत समजावून सांगण्यात आले आहे. की रूण त्याचे आप्त/पालक / यांना ते आमच्या समक्ष
                        समजले आहे. आम्ही याची सुद्धा खात्री देत आहोत की रूग्ण / त्याचे आप्त/पालक यांनी ही सही/ अंगठ्याचा
                        ठसा आमच्या उपस्थितीत उमटवला आहे.</div>
                    <div class="col-2">(१) साक्षीदाराची सही:</div>
                    <div class="col-4"><input type="text" name="28" id="" value="<?php echo $e_de[28];?>"
                            class="form-control"></div>
                    <div class="col-2">(२) साक्षीदाराची सही</div>
                    <div class="col-4"><input type="text" name="29" id="" value="<?php echo $e_de[29];?>"
                            class="form-control"></div>
                    <div class="col-2">(१) साक्षीदाराचे नांव:</div>
                    <div class="col-4"><input type="text" name="30" id="" value="<?php echo $e_de[30];?>"
                            class="form-control"></div>
                    <div class="col-2">(२)साक्षीदाराचे नांव</div>
                    <div class="col-4"><input type="text" name="31" id="" value="<?php echo $e_de[31];?>"
                            class="form-control"></div>
                    <div class="col-6">प्रभारी डॉक्टर / प्रमुख शल्यचिकित्सक / प्रमुख सहाय्यकाची स्वाक्षरी:
                        पेशंट / पालकाची सही/अंगठा</div>
                    <div class="col-6"><input type="text" name="32" id="" value="<?php echo $e_de[32];?>"
                            class="form-control"></div>
                    <div class="col-5"></div>
                    <div class="col-3">पेशंट / पालकाची सही/अंगठा</div>
                    <div class="col-4"><input type="text" name="33" id="" value="<?php echo $e_de[33];?>"
                            class="form-control"></div>
                    <div class="col-5"></div>
                    <div class="col-3">पेशंट / पालकाचे नाव</div>
                    <div class="col-4"><input type="text" name="34" id="" value="<?php echo $e_de[34];?>"
                            class="form-control"></div>


                </div>


                <br>
                <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit"
                    id="submit">Submit</button>

            </form>
        </div>
</body>

</html>