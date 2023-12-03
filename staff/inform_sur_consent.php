<?php
 require("../admin/connect.php");
 $id = $_GET['id'];
 session_start();

 $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
 $row=mysqli_fetch_assoc($sql);

 $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
 $row1=mysqli_fetch_assoc($sql1);

 $sql2=mysqli_query($conn,"SELECT * FROM p_insure WHERE id = '$id';");
 $row2=mysqli_fetch_assoc($sql2);

 $sql = "SELECT * FROM titles WHERE id = 1;";
 $data = $conn->query($sql);
 $title = $data->fetch_assoc();
 
$x=0;
if(isset($_POST['submit'])){
    $table_sign=array();
    $table_name=array();
    $table_date=array();
    $table_time=array();
   
        for ($i = 0; $i < 4; $i++){
            $element=$_POST['sign'.($i)];
            array_push($table_sign, $element);
        } 
   
        for ($i = 0; $i < 4; $i++){
            $element=$_POST['name'.($i)];
            array_push($table_name, $element);
        }  
   
        for ($i = 0; $i < 4; $i++){
            $element=$_POST['date'.($i)];
            array_push($table_date, $element);
        }  
    
        for ($i = 0; $i < 4; $i++){
            $element=$_POST['time'.($i)];
            array_push($table_time, $element);
        } 
   
    $sign_json = json_encode($table_sign);
    $name_json = json_encode($table_name);
    $date_json = json_encode($table_date);
    $time_json = json_encode($table_time);
    $doctor=$_POST['doctor'];
    $pro=$_POST['pro'];


    $update="UPDATE info_sur_consent SET
   `sign`='$sign_json',
   `name`='$name_json',
   `date`='$date_json',
   `time`='$time_json',
   `doctor`='$doctor',
   `pro`='$pro'
    WHERE id =$id;
    ";
    
$sql5=mysqli_query($conn,$update);
    $x=1;
}
    $sql6=mysqli_query($conn,"SELECT * FROM info_sur_consent WHERE id =$id");
    $row6=mysqli_fetch_assoc($sql6);
    if ($row6) {
        $sign_norm = json_decode($row6['sign'], true);
        $name_norm = json_decode($row6['name'], true);
        $date_norm = json_decode($row6['date'], true);
        $time_norm = json_decode($row6['time'], true);
    
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
        
table, th, td {
  border:1px solid black;
}
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
    <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
        <h3 class=" fl text-center text-dark">INFORMED CONSENT FORM FOR SURGERY</h3>
        <h3 class=" fl text-center text-dark">शस्त्रक्रिया किंवा तत्सम प्रक्रियेसाठी संमतीपत्र </h3>

        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <form action="" method="post">
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="info_surgery_consent.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <div class="row">
      <div class="col-md-12">
      <p align="left" class="style30"> 1. I hereby authorize Dr. <input  type="text" class="form-control" name="doctor" value="<?php echo $row6['doctor']; ?>">
      or his associates to perform surgery/Oprative upon me/above named patient.The name of procedure is <input  type="text" class="form-control" name="pro" value="<?php echo $row6['pro']; ?>">
      <p>
<p align="left" class="style30">डॉ .<?php echo $row6['doctor']; ?>
     किंवा त्यांचे सहकारी यांना माझ्यावर/माझ्या रुग्णावर शस्त्रक्रिया/तत्सम प्रक्रिया करण्यास परवानगी देत आहे. शस्त्रक्रिया / तत्सम प्रक्रियेचे नाव: <?php echo $row6['pro']; ?>
      <p> 
<p> 2. I have been fully explained in the language I understand about the kind of procedure the Surgeon will perform . I have been given an opportunity to ask question and all my question have been answered satisfactorily . He/ She answered my questions about my condition and the procedure to my satisfaction.<p> 
<p class="style24">प्रक्रिये बाबत मला/आम्हाला समजणाऱ्या सरळ आणि सोप्या भाषेत मला/आम्हाला समजेल अशा पद्धतीने समजावून सांगण्यात आलेले आहे. त्याचप्रमाणे मला प्रश्न विचारण्याची संधी देण्यात अली व माझ्या शंका / कुशंका आणि प्रत्येक प्रश्नांचे समाधान होई पर्यंत मला कळविण्यात आलेले आहे. <p>

 <p>3.  Dr. has fully explained to me the nature and purpose of opration/procedure and has also informed me of expected benefits and complications, attendant discomfort and risks that may arise , as well as possible alternatives to the proposed treatment. <p>
 <p>डॉक्टरांनी मला ऑपरेशनचा उद्देश आणि त्याची प्रक्रिया याबाबत माहिती दिलेली आहे. तसेच ऑपरेशन करण्याचे फायदे ,तोटे ,अडचणी , उद्भवू शकणारे धोके तसेच पर्यायी चिकित्सा पद्धती याबाबत माहिती दिलेली आहे.<p>    

<p>4. The Doctor explained the likelihood of major risk or complications that may occur during this procedure including but not limited to loss of limb function,brain damage,paralysis,hemorrhage,infection , drug reaction, blood clots or sometimes loss of life I undersatand those risks and I am willing to undergo the procedure. I have been explained about the risk of not undergoing this procedure.The doctor has explained to me the possible problems related to recovery. 

<p>शत्रक्रिये दरम्यान अचानक उद्भवणारे धोके किंवा गुंतागुंत जसे कि ,हात पाय बधिर होणे किंवा अपंगत्व येणे , लकवा मारणे, मेंदूमध्ये बिघाड , रक्तस्राव होणे, जंतुसंसर्ग होणे , औषधाची रिअक्शन होणे , रक्ताची गुठळी होणे, काही वेळा मृत्यू येणे किंवा तत्सम इतर धोके या बाबत मला विवरण आणि समाज देण्यात आलेली आहे. त्याचप्रमांणे डॉक्टरांनी शस्त्रक्रियेनंतर उद्भवू शकणाऱ्या विविध समस्या आणि संपूर्ण बरा होईपर्यंत काय होऊ शकेल याबाबत मला समजावून सांगितले आहे.    <p>
<p>5. I understand that during the course of procedure or operation, unforeseen condition may arise the procedurse different form those planned . I therefore consent to the performance of additional procedure above named physician or his/her associates may consider necessary.<p>

<p>मला याची ही जाणीव करून देण्यात आहे की , ऑपरेशन दरम्यान अचानक उध्दभवणाऱ्या परिस्थितीनुसार निश्चित केलेल्या प्रक्रियेपेक्षा इतर प्रक्रिया / ऑपरेशन करण्याची करण्याची गरज पडू शकते . त्यामुळे अशापरीस्थिती मध्ये उपयोक्त नमूद केलेल्या शल्य चिकित्सकाला किंवा त्यांच्या सहाय्यकाला अशा प्रकारची प्रक्रिया करण्यास मी / आम्ही संमती देत आहे. <p>

<p>6. I ferther consent to the administration of such anesthesia as may be considered necessary . I recognize that there are occasional risks associated with anesthesia and such have been fully explained to me/us. <p>

<p>शस्त्रक्रिया किंवा प्रक्रियेसाठी गरजेच्या असलेल्या भूल प्रकार देण्यास मी / आम्ही संमती देत अहे . भूल देतांना क्वचित प्रसंगी उध्दभवू शकणाऱ्या धोक्या बद्दल ,आला / आम्हाला पूर्ण समजावण्यात आलेले आहे. <p>

<p>7. I hereby consent to the procedure being performed on me.

<p>उपयोक्त बाबी समजावून घेतल्यानंतर मी माझ्यावर शस्त्रक्रिया करण्याची संमती देत आहे. <p>

<p class="style10"> धन्यवाद ...!<p align="left">
        </div>
      <div class="col-md-4">
        <label class="form-label mt-2"> </label>
        </div>
      
    </div>
   
                <div class="row">
                    
                    <div class="container">
                    <div class="row ">

     
    </div>
    <br>
    <div >
                            <div style="overflow: auto;">
                            <table class="table table-bordered border-black table-hover text-center">
                            <?php
   
    echo '<tr><th></th>';
    echo '<th>Patient/Relative रुग्ण / नातेवाईक</th>';
    echo '<th>Witness (Relation with patient साक्षीदार (रुग्णाशी नाते )</th>';
    echo '<th> Doctor डॉक्टर</th>';
    echo '<th>Interpreter माहिती समजावून सांगणारे</th>';

    
    echo '</tr>';
    echo '<tr><th>Signature सही </th>';
    
    for ($i = 0; $i < 4; $i++) {
        $signValue = isset($sign_norm[$i]) ? $sign_norm[$i] : ''; 
        echo '<th><input type="text" class="form-control" placeholder="Signature" name="sign' . ($i) . '" id="sign' . ($i) . '" value="' . $signValue . '"></th>';
    }
    
    echo '</tr>';
    echo '<tr><th>Name नाव </th>';
    
    for ($i = 0; $i < 4; $i++) {
        $nameValue = isset($name_norm[$i]) ? $name_norm[$i] : ''; 
        echo '<th><input type="text" class="form-control" placeholder="Name" name="name' . ( $i) . '" id="name' . ($i) . '" value="' . $nameValue . '"></th>';
    }
    
    echo '</tr>';
    echo '<tr><th>Date दिनांक</th>';
    for ($i = 0; $i < 4; $i++) {
        $dateValue = isset($date_norm[$i]) ? $date_norm[$i] : ''; // Check if the value is set, otherwise assign an empty string
        echo '<th><input type="date" class="form-control " name="date' . ( $i) . '" id="date' . ( $i) . '" value="' . $dateValue . '"></th>';
    }
    
    echo '</tr>';
    echo '<tr><th>Time वेळ </th>';

    for ($i = 0; $i < 4; $i++) {
        $timeValue = isset($time_norm[$i]) ? $time_norm[$i] : ''; // Check if the value is set, otherwise assign an empty string
        echo '<th><input type="time" class="form-control " name="time' . ( $i) . '" id="time' . ( $i) . '" value="' . $timeValue . '"></th>';
    }
    
    echo '</tr>';
    
        
  ?> </table><br>

                    
                    
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>