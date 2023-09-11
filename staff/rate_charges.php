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

$sql11="SELECT * FROM `change_rate` WHERE 1";
$data11=$conn->query($sql11);
if ($data11->num_rows < 1) {
    $sql11 = "insert into change_rate(id) values(1);";
    $conn->query($sql11);
} 
$res11=$data11->fetch_assoc();

$inp=$res11['inp'];
$inp_arr=json_decode($inp,true);
$inp_arr = is_array($inp_arr) ? $inp_arr: array_fill(0,15, 0);

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
  $input_14 = $_POST['input_14'];
  $input_15 = $_POST['input_15'];
  $input_16 = $_POST['input_16'];
  $input_17 = $_POST['input_17'];   
  $input_18 = $_POST['input_18'];
  $input_19 = $_POST['input_19'];
  $input_20 = $_POST['input_20'];
  $input_21 = $_POST['input_21'];  
  $input_22 = $_POST['input_22'];     

$query5 = "UPDATE `rate_charges` SET
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
      `input_14` = '$input_14',
      `input_15` = '$input_15',
      `input_16` = '$input_16',
      `input_17` = '$input_17',
      `input_18` = '$input_18',
      `input_19` = '$input_19',
      `input_20` = '$input_20',
      `input_21` = '$input_21',
      `input_22` = '$input_22'
       WHERE  `id` = '$id'";

  $data5=$conn->query($query5);
  if($data5){
    echo "<div class='alert alert-success'> Updated Successfully</div>";
  }
}
$sql6="SELECT * FROM `rate_charges` WHERE `id` = '$id' ";
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

<body class="m-2">

    <div class="container shadow-lg rounded">
        <div id="button">
            <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
                id="dashboard">Dashboard</a>
            <a href="rate_charges_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger"
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
        <hr>

        <h5 class="text-center mt-3"> याप्रमाणे देय रक्कम देण्यास माझी / आमची संमती आहे. </h5>
        <form  method="post">
          
        <table class="table mx-auto mt-3" style="width:500px">
            <tr>
                <td>&nbsp;</td>
                <td><label>१. सर्जन चार्जेस</label></td>
                <td><input class="form-control" type="text" name="input_1" value="<?php echo $res6['input_1'];?>"></td>
            </tr>
            <tr>
                <td><label>ऑपरेशन चार्जेस</label></td>
                <td><label>२. असिस्टंट सर्जन चार्जेस</label></td>
                <td><input class="form-control" type="text" name="input_2" value="<?php echo $res6['input_2'];?>"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><label>३. अनेस्थेसिस्ट चार्जेस</label></td>
                <td><input class="form-control" type="text" name="input_3" value="<?php echo $res6['input_3'];?>"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><label>४. ओटी / इन्स्ट्रुमेंट चार्जेस</label></td>
                <td><input class="form-control" type="text" name="input_4" value="<?php echo $res6['input_4'];?>"></td>
            </tr>
        </table>

        <p class="style10">* प्रतिदिन चार्जेस

        <table width="787" class="table border border-black">
            <tr>
                <td width="104">
                    <p class="style10"> वॉर्ड
                </td>
                <td width="79"><span class="style10">बेड</span></td>
                <td width="91"><span class="style10">कंसल्टंट डॉक्टर</span></td>
                <td width="76"><span class="style10">नर्सिंग</span></td>
                <td width="96"><span class="style10">मॉनिटर</span></td>
                <td width="98"><span class="style10">ऑक्सिजन</span></td>
                <td width="91"><span class="style10">सिरीप पंप</span></td>
                <td width="100"><span class="style10">एकूण</span></td>
            </tr>
            <tr>
                <td><span class="style10">आय सी यु </span></td>
                <td><?php echo $inp_arr[0]; ?></td>
                <td><?php echo $inp_arr[1]; ?></td>
                <td><?php echo $inp_arr[2]; ?></td>
                <td><?php echo $inp_arr[3]; ?></td>
                <td><?php echo $inp_arr[4]; ?></td>
                <td><?php echo $inp_arr[5]; ?>/<span class="style10">पंप</span></td>
                <td><?php echo  $inp_arr[0]+$inp_arr[1]+$inp_arr[2]+$inp_arr[3]+$inp_arr[4]+$inp_arr[5]; ?>प्रतिदिन </span></td>
            </tr>
            <tr>
                <td><span class="style10">जनरल वॉर्ड </span></td>
                <td><?php echo $inp_arr[6]; ?></td>
                <td><?php echo $inp_arr[7]; ?></td>
                <td><?php echo $inp_arr[8]; ?></td>
                <td>&nbsp;</td>
                <td><?php echo $inp_arr[9]; ?></td>
                <td>&nbsp;</td>
                <td><span class="style10"><?php echo $inp_arr[6]+$inp_arr[7]+$inp_arr[8]+$inp_arr[9]; ?>प्रतिदिन </span></td>
            </tr>
            <tr>
                <td><span class="style10">डिलक्स रूम </span></td>
                <td><?php echo $inp_arr[10]; ?></td>
                <td><?php echo $inp_arr[11]; ?></td>
                <td><?php echo $inp_arr[12]; ?></td>
                <td>&nbsp;</td>
                <td><?php echo $inp_arr[13]; ?></td>
                <td>&nbsp;</td>
                <td><?php echo $inp_arr[10]+$inp_arr[11]+$inp_arr[12]+$inp_arr[13]; ?>प्रतिदिन</td>
            </tr>
        </table>

        <p class="style10">* नोट : डिस्चार्जच्या दिवशी : - दुपारी १२ वाजेपर्यंत अर्धा दिवसाचे रूम चार्जेस आकारले जातील .
            दुपारी १२ नंतर पूर्ण दिवसाचे रूम चार्जेस आकारले जातील .
        <p class="style10">* Ventilator Charges ( व्हेंटिलेटर चार्जेस ) : Non Invasive - ४००० / day Invasive -७०००/day
            <input type="text" name="input_5" value="<?php echo $res6['input_5'];?>">
        <p>
        <p class="style10"> * Pharmacy (मेडिकल ) : Extra at actual MRP <input type="text" name="input_6" value="<?php echo $res6['input_6'];?>">
        <p>
        <p class="style10"> * Lab Charges ( रक्त तपासणी ) : Extra at actual <input type="text"  name="input_7" value="<?php echo $res6['input_7'];?>">
        <p>
        <p class="style10"> * Radiology ( सोनोग्राफी / सिटी स्कॅन /एक्स - रे ) : at actual <input type="text" name="input_8" value="<?php echo $res6['input_8'];?>">
        <p>

        <p class="style10"> * Dialysis Charges ( डायलेसिस ) : Emergency ४००० /- Dialysis Routine २००० /- Dialysis <input
                type="text" name="input_9" value="<?php echo $res6['input_9'];?>">
        <p>

        <p class="style10"> * Procedure Charges ( प्रोसिजर चार्जेस ) : As per procedure <input type="text" name="input_10" value="<?php echo $res6['input_10'];?>">
        <p>


        <p class="style10"> * Visiting Doctor Charges ( व्हिजिटिंग डॉक्टर चार्जेस ) : At actual / Extra <input
                type="text" name="input_11" value="<?php echo $res6['input_11'];?>">
        <p>

        <p class="style10"> * Emergency Consulting / Outside Consulting Charges / ECG /BSL /Dressing Charges are Extra .
            <input type="text" name="input_12" value="<?php echo $res6['input_12'];?>">
        <p>

        <p class="style10"> वर नमूद केलेले चार्जेस हे फक्त अंदाजित चार्जेस आहेत. रुग्णाच्या आजाराच्या स्थिती आणि
            गांभीर्यानुसार चार्जेस वाढू शकतात . <input type="text" name="input_13" value="<?php echo $res6['input_13'];?>">
        <p>

        <p class="style10"> अनपेक्षित बदल आणि आय सी. यु. चार्जेस यांचा खर्च वेगळा लागेल . सर्जरी पूर्वी ५० % ऍडव्हान्स
            भरावे लागतील .
            वरील प्रकारे देयक पूर्णपणे व वेळेवर देण्याची मी / आम्ही ग्वाही देतो. <input type="text" name="input_14" value="<?php echo $res6['input_14'];?>">
        <p>

        <p class="style10"> मला / आम्हाला संभाव्ये खर्चाची कल्पना देण्यात आलेली आहे , मी /आम्ही रुग्णालयात येणारा
            सर्वसाधारण दैनंदिन खर्च त्याच प्रमाणे तपासण्या ,सर्व उपचार व औषधी यासाठी होणार खर्च भरण्याचे काबुल करतो . मी
            / आम्ही आवश्यक ती अनामत रक्कम भरण्याचे व स्पाताहिक व अंतिम बिल भरण्याचे स्वखुशीने मान्य करतो. <input
                type="text" name="input_15" value="<?php echo $res6['input_15'];?>">
        <p>

        <p class="style10"> याबद्दल आमची रुग्णालयाकडे कसलीही तक्रार असणार नाही <input type="text" name="input_16" value="<?php echo $res6['input_16'];?>">.
        <table width="787" class="table border border-black">
            <tr>
                <td width="381">
                    <p class="style10">रुग्णाचे नाव : <input type="text" name="input_17" value="<?php echo $res6['input_17'];?>"> </p>
                    <p class="style10">मो. क्र. : <input type="text" name="input_18" value="<?php echo $res6['input_18'];?>"> </p>
                    <p class="style10">सही / अंगठा : <input type="text" name="input_19" value="<?php echo $res6['input_19'];?>"></p>
                </td>
                <td width="390">
                    <p class="style10">नातेवाईकाचे नाव <input type="text" name="input_20" value="<?php echo $res6['input_20'];?>"></p>
                    <p class="style10">नाते :<input type="text" name="input_21" value="<?php echo $res6['input_21'];?>"> </p>
                    <p><span class="style10">सही / अंगठा : <input type="text" name="input_22" value="<?php echo $res6['input_22'];?>"></p>
                </td>
            </tr>
        </table>
        <button class="btn btn-primary d-flex mx-auto" name="save">save</button>
        </form>

    </div>
</body>

</html>