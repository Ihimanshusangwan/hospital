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

if(isset($_POST['save'])){
  $input_1 = $_POST['input_1']; 
  $input_2 =  $_POST['input_2'];
  $input_3 =  $_POST['input_3'];
  $input_4 =  $_POST['input_4'];
  $input_5 =  $_POST['input_5'];
  $input_6 =  $_POST['input_6'];
  $input_7 =  $_POST['input_7'];
  $input_8 =  $_POST['input_8'];
  $input_9 =  $_POST['input_9'];
  $input_10 = $_POST['input_10'];
  $input_11 = $_POST['input_11'];
  $input_12 = $_POST['input_12'];
  $input_13 = $_POST['input_13']; 
  $t_1 = $_POST['t_1']; 
  $t_2 =  $_POST['t_2'];
  $t_3 =  $_POST['t_3'];
  $t_4 =  $_POST['t_4'];
  $t_5 =  $_POST['t_5'];
  $t_6 =  $_POST['t_6'];
  $t_7 =  $_POST['t_7'];
  $t_8 =  $_POST['t_8'];
  $t_9 =  $_POST['t_9'];
  $t_10 = $_POST['t_10'];
  $t_11 = $_POST['t_11'];
  $t_12 = $_POST['t_12'];   

$query5 = "UPDATE `permission` SET
      `input_1` = '$input_1',
      `input_2` = '$input_2',
      `input_3` = '$input_3',
      `input_4` = '$input_4',
      `input_5` = '$input_5',
      `input_6` = '$input_6',
      `input_7` = '$input_7',
      `input_8` = '$input_8',
      `input_9` = '$input_9',
      `input_10` = '$input_10',
      `input_11` = '$input_11',
      `input_12` = '$input_12',
      `input_13` = '$input_13',
        `t_1` = '$t_1', 
            `t_2` =  '$t_2',
            `t_3` =  '$t_3',
            `t_4` =  '$t_4',
            `t_5` =  '$t_5',
            `t_6` =  '$t_6',
            `t_7` =  '$t_7',
            `t_8` =  '$t_8',
            `t_9`=  '$t_9',
            `t_10` = '$t_10',
            `t_11` = '$t_11',
            `t_12` = '$t_12'
       WHERE  `id` = '$id'";

  $data5=$conn->query($query5);
  if($data5){
      echo "sucessfully";
  }
}
$sql6="SELECT * FROM `permission` WHERE `id` = '$id' ";
$data6=$conn->query($sql6);
$res6=$data6->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style type="text/css">
    tboody,
    th,
    td {
        border: 1px solid black;
    }

    input[type="text"] {
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 200px;
        height: 35px;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    input[type="text"]:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 5px #4CAF50;
    }

    input[type="text"]:hover {
        border-color: #555;
    }

    /* Style for placeholder text inside the input field */
    input[type="text"]::placeholder {
        color: #aaa;
    }

    body {
        background: lightgray;
        animation: fade-in 1s linear;
    }

    .fl {
        animation: gelatine 1s;
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
</head>

<body class="mt-4">

    <div class="container shadow-lg rounded">
        <div id="button">
            <a href="more_forms.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
                id="dashboard">Dashboard</a>
            <a href="permission_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger"
                id="dashboard">print</a>
        </div>
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class="text-center text-dark my-3 "> हॉस्पिटल मधील रूमच्या शुल्का बद्धल संमतीपत्र </h3>
        <h3 class="text-center text-dark my-3 ">या रुग्णालयात खालील दराप्रमाणे प्रतिदिन देयक आकारले जातात याची स्पष्ट
            कल्पना मला / आम्हाला रुग्णालय प्रशासनाने दिलेली आहे </h3>
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">UHID No: <?php echo $res2['uhid'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">IPD No: <?php echo $res2['ipd'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Date of Admission : <?php echo $res2['date'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label" for="time_ad">Time of Admission : <?php echo $res2['time'];?></label>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Name: <?php echo $res['name'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Age: <?php echo $res['age'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Sex: <?php echo $res['sex'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">ICU/Ward Room No: <?php echo $res2['ward/icu'];?></label>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <label class="form-label">Consultant: <?php echo $res['consultant'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Diagnosis: <?php echo $res1['diagnosis'];?></label>
            </div>
            <div class="col-md-3">
                <label class="form-label">Bed Number: <?php echo $res2['bed/room'];?></label>
            </div>
        </div>
        <form method="post">
            <hr>

            <h1 class="text-center"> -: अनुमतीपत्र :- </h1>
            <p align="center">
            <p class=" style10"> १ ) डॉक्टरांनी मला / आम्हाला / माझ्या आमच्या रुग्णांच्या ( रुग्णांचे नाव &nbsp; <input
                    type="text" name="input_1" value="<?php echo $res6['input_1'];?>"> &nbsp;- आजाराच्या व त्याच्या
                प्रकृतीच्या आताच्या परिस्थितीची संपूर्ण माहिती व कल्पना दिली
                आहे .</p>

            <p> २ ) मला / आम्हाला डॉक्टरांनी करावा लागणाऱ्या तपासण्या , औषधउपचार , त्याचे परिणाम व संभाव्य दुष्परिणाम
                किंवा
                अकल्पित प्रतिक्रिया व संभाव्य विकृती वा विकोप इ. सर्व बाबींची संपूर्ण व स्पष्ट कल्पना दिली आहे . </p>

            <p> ३ ) गरज भासल्यास रुग्णांच्या बाबतीत जरुरीप्रमाणे अतिरिक्त तज्ञांचा सल्ला घेण्यास माझी / आमची संमती आहे.
                त्या
                संबधीच्या खर्चाची जबाबदारी माझ्यावर / आमच्यावर राहील .
            <p>

            <p> ४) पोलीस केस असल्यास ( मेडिको लीगल केस ) माझे रुग्णालयाला पूर्ण सहकार्य राहील . अशा केसमध्ये
                रुग्णालयातील
                कार्यवाहीस माझी पूर्ण परवानगी आहे .
            <p>
            <p> ५ ) आवश्यकतेनुसार कराव्या लागणाऱ्या तपासण्या व औषधउपचार त्याबद्धल मी / आम्ही संबंधीत डॉक्टरांकडून
                वेळोवेळी
                माहिती जाणून घेऊ .
            <p>
            <p> ६ ) रुग्णालयात वापरण्यात येणारी औषधे , सलाईनच्या बाटल्या , सलाईन सेट इत्यादी वस्तूचे रुग्णालयात उत्पादन
                केले
                जात नाही व रुग्णालयात वापरण्यात येणारी औषधी प्रमाणित कंपन्यांची असतात . याची मला जाणीव आहे.
            <p>
            <p> ७ ) रुग्णाच्या प्रकृतीविषयी वेळोवेळी मी डॉक्टरांकडून माहिती करून घेईल .
            <p>
            <p> ८ ) रुग्ण अथवा रुग्णाच्या नातेवाईकांकडून रुग्णालयातील वस्तूंची मोडतोड झाल्यास त्याची सर्व जबादारी
                माझ्यावर /
                आमच्यावर राहील व त्याचा वेगळा आकार मी / आम्ही भरेल / भरू
            <p>
            <p> ९ ) ह्या हॉस्पिटल मध्ये असलेल्या सुविधा मला / आम्हाला माहित आहेत . काही प्रकारच्या सुविधा सुविधा
                नसल्याची
                कल्पना मला / आम्हाला डॉक्टरांनी दिलेली आहे.
            <p>
            <p> १० ) वैदकीय ज्ञानाच्या अभिवृद्धीसाठी उपचार / शस्त्रक्रिया करतांना छायाचित्रे (फोटोग्राफ्स / ट्रान्सपनीज
                )
                दृश्य किती प्रदर्शित अथवा प्रकाशित करण्यात माझी / आमची अनुमती आहे. मी / आम्ही असे गृहीत धरतो कि , अशा
                प्रकाशनात / प्रदर्शनात माझी / रुग्णाची ओळख दिली जाणार नाही . वरील सर्वे कलमे मी / आम्ही वाचली आहे . ती
                मला /
                आम्हाला समजली आहेत . व मला / आम्हाला मान्य आहेत व ती माझ्यावर /आम्हावर बंधनकारक आहेत. तरी मी / आम्ही
                रुग्णालयाच्या अधिकाऱ्यांना मला / रुग्णास नाव <input type="text" name="input_2"
                    value="<?php echo $res6['input_2'];?>"> वा रुग्णालयात
                दाखल करून घेण्याची विनंती करतो .
            <p>
            <p> नाव : <input type="text" name="input_3" value="<?php echo $res6['input_3'];?>"> सही / अंगठा
            <p>

            <p> रुग्णांशी नाते <input type="text" name="input_4" value="<?php echo $res6['input_4'];?>"> तारीख <input
                    type="date" name="input_5" value="<?php echo $res6['input_5'];?>">
            <p>

            <p> वरील अनुमती पत्राची कलमे मला माझ्या मातृभाषेत वाचून दाखविण्यात आलेली आहे . ती मला मान्य आहेत व माझ्यावर
                बंधनकारक आहेत .
            <p>
            <p> नाव : <input type="text" name="input_6" value="<?php echo $res6['input_6'];?>"> सही / अंगठा <input
                    type="text" name="input_7" value="<?php echo $res6['input_7'];?>">
            <p>

            <p> रुग्णांशी नाते <input type="text" name="input_8" value="<?php echo $res6['input_8'];?>"> तारीख <input type="date" name="input_9" value="<?php echo $res6['input_9'];?>">
            <p>
            <p> साक्षीदारांचे नाव व सही : -<input type="text" name="input_10" value="<?php echo $res6['input_10'];?>">
            <p>

            <p>पत्ता <input type="text" name="input_11" value="<?php echo $res6['input_11'];?>" >
            <p>

                <body>
                    <!DOCTYPE html>
                    <html>
                    <h2 align="center" class="style8"> -: परिशिष्ट - अ :- </h2>
                    <p align="center" class="style6"> खर्च व बिले चुकती करण्याची संमती
                    <p>
                    <h5>मला / आम्हाला संभाव्य खर्चाची कल्पना देण्यात आलेली आहे . मी / आम्ही रुग्णालयात येणाऱ्या
                        सर्वसाधारण
                        दैनंदिन खर्च त्याचप्रमाणे तपासण्याचा सर्व उपचार व औषधे यासाठी होणार खर्च भरण्याचे काबुल करतो मी
                        /आम्ही आवश्यक ती अनामत रक्कम भरण्याचे व अंतिम बिल भरण्याचे स्वखुशीने मेनी करतो .</h5>
                    <table style="width:100%" class="mt-4">
                        <tr>
                            <th><span></span><span class="style8">नातेवाईक</span></th>

                            <th><span>साक्षीदार</span></th>
                            <th><span>पेशंट</span></th>
                        </tr>
                        <tr>
                            <td><span>सही / अंगठा<input class="form-control" type="text" name="t_1" value="<?php echo $res6['t_1'];?>"></span></td>
                            <td><span>सही / अंगठा<input class="form-control" type="text" name="t_2" value="<?php echo $res6['t_2'];?>"></span></td>
                            <td><span>सही / अंगठा<input class="form-control" type="text" name="t_3" value="<?php echo $res6['t_3'];?>"></span></td>
                        </tr>
                        <tr>
                            <td><span>नाव : <input class="form-control" type="text" name="t_4" value="<?php echo $res6['t_4'];?>"></span></td>
                            <td><span>नाव :<input class="form-control" type="text" name="t_5" value="<?php echo $res6['t_5'];?>"></span></td>
                            <td><span>तारीख :<input class="form-control" type="text" name="t_6" value="<?php echo $res6['t_6'];?>"> </span></td>
                        </tr>
                        <tr>
                            <td><span>पत्ता :<input class="form-control" type="text" name="t_7" value="<?php echo $res6['t_7'];?>"> </span></td>
                            <td><span>पत्ता :<input class="form-control" type="text" name="t_8" value="<?php echo $res6['t_8'];?>"> </span></td>
                            <td><span>पत्ता :<input class="form-control" type="text" name="t_9" value="<?php echo $res6['t_9'];?>"> </span></td>

                        </tr>
                        <tr>
                            <td>वय : वर्ष :<input class="form-control" type="text" name="t_10" value="<?php echo $res6['t_10'];?>"> </td>
                            <td><span> वय : वर्ष : <input class="form-control" type="text" name="t_11" value="<?php echo $res6['t_11'];?>"> </span></td>
                            <td><span>वेळ :<input class="form-control" type="text" name="t_12" value="<?php echo $res6['t_12'];?>"> </span></td>
                        </tr>
                    </table>
                    <label class="form-label mt-3" for=""> Date:</label> <input class="form-control" type="text"
                        name="input_12" value="<?php echo $res6['input_12'];?>">
                    <label class="form-label mt-3">Patient / Relative Signature ) :</label> <input class="form-control"
                        type="text" name="input_13" value="<?php echo $res6['input_13'];?>">
                    <button class="btn btn-primary d-flex mx-auto" name="save">save</button>
        </form>
</body>

</html>