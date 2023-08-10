<?php
 require("../admin/connect.php");
 $id = $_GET['id'];
 session_start();
//  error_reporting(0);

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
    $sahi1=$_POST['sahi1'];
    $sahi2=$_POST['sahi2'];
    $sahi3=$_POST['sahi3'];
    $name1=$_POST['name1'];
    $name2=$_POST['name2'];
    $date=$_POST['date'];
    $add1=$_POST['add1'];
    $add2=$_POST['add2'];
    $add3=$_POST['add3'];
    $vay1=$_POST['vay1'];
    $vay2=$_POST['vay2'];
    $time=$_POST['time'];

    $update="UPDATE hiv_consent SET
    sahi1='$sahi1',
    sahi2='$sahi2',
    sahi3='$sahi3',
    name1='$name1',
    name2='$name2',
    date='$date',
    add1='$add1',
    add2='$add2',
    add3='$add3',
    vay1='$vay1',
    vay2='$vay2',
    time='$time'
    WHERE id =$id;
    ";
    
$sql5=mysqli_query($conn,$update);
    $x=1;
}
    $sql6=mysqli_query($conn,"SELECT * FROM hiv_consent WHERE id =$id");
    $row6=mysqli_fetch_assoc($sql6);

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
        <h3 class=" fl text-center text-dark">एच आय व्ही तपासणी संबंधीचे संमतीपत्र</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="consent.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="hivConsent(mar).php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>

            <div class="row">
      <div class="col-md-12">
      <p class="form-label mt-2">रुग्णाचे नाव :  <strong><?php echo $row['name']; ?></strong>  
        यु एच आय डी नं  : <strong><?php echo $row2['uhid']; ?></strong> 
        आय पी डी नं :  <strong><?php echo $row2['ipd']; ?></strong> 
        दिनांक :  <strong><?php echo $row2['date']; ?></strong> 
        वय : <strong><?php echo $row['age']; ?></strong> 
        लिंग : <strong><?php echo $row['sex']; ?></strong>
     </p>
		 </div>
      <div class="col-md-12">
        <p class="form-label mt-2"> मी ( रुग्णाचे नाव ) : <strong><?php echo $row['name']; ?></strong> माझी रक्ताची एच आय व्ही टेस्ट करण्यासाठी संमती देत आहे. तपासणी पूर्व समुपदेशनाने मला या तपासणीचा संदर्भ आणि महत्व सांगण्यात आले आहे . 
या तपासणीचा रिपोर्ट गोपनीय ठेवण्यात येईल असे सांगण्यात आले आहे. माझ्या परवानगीशिवाय हे रिपोर्ट कोणालाही देण्यात येणार नाहीत . तपासणी नंतर डॉक्टर माझे समुपदेशन करतील असे सांगण्यात आले आहे.  एच आय व्ही तपासणी बद्दल पुढील माहिती मला समजावून सांगण्यात अली आहे.
</p>
<p> १.	एच आय व्ही हा एक जिवाणू असून त्यामुळे एड्स होऊ शकतो . संसर्ग झाल्यानंतर जिवाणूंचा प्रतिकार करण्यासाठी शरीरामध्ये अँटीबॉडीज तयार होतात . एच आय व्ही अँटीबॉडी टेस्टचा रिपोर्ट पॉसिटीव्ह आला तर त्याचा अर्थ या जिवाणूंचा संसर्ग झाला आहे असा होतो. परंतु त्या व्यक्तीस एड्स आहेच असे होत नाही.े .</p>
	
	<p>  २.	आधुनिक तंत्रज्ञानाच्या वापरानंतर देखील काही जणांचा रिपोर्ट जंतुसंसर्ग नसतानाही पॉझिटिव्ह येऊ शकतो असे मला डॉक्टरांनी सांगितले आहे. (False - Positive ) . तसेच जंतुसंसर्ग झाल्यानंतरही अँटोबॉडीज तयार होण्यासाठी काही काळ लागतो , म्हणून काही केसेसमध्ये जंतुसंसर्ग असतानाही निगेटिव्ह रिपोर्ट येऊ शकतो ( False - Negative ).</p>

	<p>३.	एच आय व्ही अँटीबॉडी टेस्टचा रिपोर्ट डॉक्टरांना माहित असेल तर , त्यांच्याशी संबंधित आजारावर डॉक्टर चांगल्या पद्धतीने उपचार करू शकतात. एच आय व्ही संसर्ग होण्याचा धोका किंवा माझ्यामुळे इतरांना एच आय व्ही संसर्ग होण्याबद्दल चा धोका या गोष्टीबद्दलचा वैयक्तिक निर्णय यांच्यानंतर मला घेता येईल .   <p>
	
	
	<p>४.	माझ्या टेस्टचा रिझल्ट पॉझिटिव्ह असेल आणि जर तो मी इतरांना सांगितला जसे की ,जसे की मित्र , कुटुंबातील व्यक्ती , एम्प्लॉयर , घर मालक इन्शुरन्स कंपनी व इतर , तर माझ्यासोबत भेदभाव होऊ शकतो .म्हणून या टेस्ट चा रिपोर्ट दुसर्यांना सांगताना मी अतिशय काळजी घेतली पाहिजे . पॉझिटिव्ह रिझल्टची नोंद हि लॅब / हॉस्पिटलमधील रेकॉर्डमध्ये राहील .<p>
	
	<p> ५.	एच आय व्ही टेस्टच्या रिझल्टच्या गोपनीयतेबद्दल हॉस्पिटल चे नियम खूप कडक आहेत.<p>
	<p> ६.	माझ्या तपासणीचा रिपोर्ट गोपनीय राखण्यासाठी हॉस्पिटल पूर्ण प्रयत्नशील असेल. अनधिकृतपणे हि माहिती बाहेर पडण्याचा धोका असतो. यामुळे भेदभाव होण्याचा धिक असतो . तसेच या तपासणीचा रिझल्ट पॉझिटिव्ह आला किंवा पुढील काही तपासण्या केल्यानंतर एड्स  असल्याचे आढळले तर ते शासकीय यंत्रणेस कळवावे लागते. (NACO ). <p>
<p> 
     <strong>मला हेही समजते कि,</strong><p>
	
<p> १.	मी चाचणी घेण्यास नकार देऊ शकतो आणि माझा नकार हॉस्पिटल मध्ये माझ्या भविष्यातील काळजीवर परिणाम करणार नाही.   <p>
	
	<p> २. तपासणीचा   रिपोर्ट पॉझिटिव्ह आला तर , रिपोर्टचा परिणामांबाबत माझे तपासणी पश्चात समुपदेशन केले जाईल.  <p>
	<p> ३. मला रक्त काढण्याच्या प्रक्रियेबद्दल व त्यात असणाऱ्या किरकोळ धोक्याबद्दलही सांगण्यात आले आहे.   <p>
	
        </div>
      <div class="col-md-4">
        <label class="form-label mt-2"> </label>
        </div>
      
    </div>
   
            <form action="" method="post">
                <div class="row">
                    
                    <div class="container">
                    <div class="row ">

     
    </div>
    <br>

            
    <div >
                            <div style="overflow: auto;">
                            <table class="table table-bordered border-black table-hover text-center">
                            <tr>
                                <th></th>
    <th><span class="style6">नातेवाईक</span></th>
    <th><span class="style6">साक्षीदार</span></th>
    <th><span class="style6">पेशंट</span></th>
  </tr>
  <tr>
    <td><span class="style6">सही / अंगठा :</span></td>
    <td> <input  type="text" class="form-control" id="" placeholder="सही / अंगठा" name="sahi1" value="<?php echo $row6['sahi1'];?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="सही / अंगठा" name="sahi2" value="<?php echo $row6['sahi2'] ;?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="सही / अंगठा" name="sahi3" value="<?php echo $row6['sahi3']; ?>"></td>
  </tr>
  <tr>
    <td><span class="style6">नाव : </span></td>
    <td><span class="style6"> <input  type="text" class="form-control" id="" placeholder="नाव" name="name1" value="<?php echo $row6['name1'];?>"></span></td>
    <td> <input  type="text" class="form-control" id="" placeholder="नाव" name="name2" value="<?php echo $row6['name2'];?>"></td>
    <td><span class="style6">तारीख : <input  type="date" class="form-control" id="" placeholder="तारीख" name="date" value="<?php echo $row6['date'];?>"> </span></td>
  </tr>
  <tr>
    <td><span class="style6">पत्ता :  </span></td>
    <td><span class="style6">  <input  type="text" class="form-control" id="" placeholder="पत्ता" name="add1" value="<?php echo $row6['add1'];?>">  </span></td>
    <td> <input  type="text" class="form-control" id="" placeholder="पत्ता" name="add2" value="<?php echo $row6['add2'];?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="पत्ता" name="add3" value="<?php echo $row6['add3'];?>"></td>
  </tr>
  <tr>
    <td class="style6">वय :    वर्ष : </td>
    <td>  <input  type="text" class="form-control" id="" placeholder="वय" name="vay1" value="<?php echo $row6['vay1'];?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="वय" name="vay2" value="<?php echo $row6['vay2'];?>"> </td>
    <td><span class="style6">वेळ :  <input  type="time" class="form-control" id="" placeholder="वेळ" name="time" value="<?php echo $row6['time'];?>"> </span></td>
  </tr>
                            </table>
                    </div>
                    <hr>

                    
                    
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>