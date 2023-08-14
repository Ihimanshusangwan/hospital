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
    $uda=$_POST['m'];
    $doctor=$_POST['doctor'];


    $update="UPDATE inform_consent SET
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
    time='$time',
    uda='$uda',
    doctor='$doctor'
    WHERE id =$id;
    ";
    
$sql5=mysqli_query($conn,$update);
    $x=1;
}
    $sql6=mysqli_query($conn,"SELECT * FROM inform_consent WHERE id =$id");
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
        <h3 class=" fl text-center text-dark">विशेष संमती पात्र</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="consent.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="inform.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <div class="row">
      <div class="col-md-12">
   
   <form action="" method="post">
        
      <p class="form-label mt-2">रुग्णाचे नाव :  <strong><?php echo $row['name']; ?></strong>  
        यु एच आय डी नं  : <strong><?php echo $row2['uhid']; ?></strong> 
        आय पी डी नं :  <strong><?php echo $row2['ipd']; ?></strong> 
        दिनांक :  <strong><?php echo $row2['date']; ?></strong> 
        वय : <strong><?php echo $row['age']; ?></strong> 
        लिंग : <strong><?php echo $row['sex']; ?></strong>
     </p>
		 </div>
      <p class="style6"> १. सदर औषधउपचार / तपासण्या / भुल उपचारपद्धतीची आवश्यकता , न केल्यास होणारे परिणाम , आणि ऑपरेशन    खेरीज अन्य उपचारामधील धोके व तोटे हे सर्व मला डॉ. यांनी समजावून सांगितले .</p>
	  <p class="style6">  २. कोणत्याही ऑपरेशन संपूर्ण सुरक्षित नसते व  औषधउपचार / तपासण्या / शस्त्रक्रिया / उपचारपद्धती वा भुलेमुळे जीवाला धोका वा इजा होण्याची शक्यता सर्वसाधारण निरोगी असणाऱ्याला ( व्यक्तीला ) सुद्धा असते याची मला स्वच्छ कल्पना दिली गेली आहे .  </p>
	  <p class="style6"> ३.जादा रक्तस्रव जंतुबाधा हृदय बंद पडणे व फुफूसात रक्ताची गुठळी अडकणे हे यांसारखे अकल्पित / आकस्मित इतर ही काही धोके शस्त्रक्रियेतुन वा भूदेण्यातून उद्धभवू शकतात याची मला कल्पना डॉक्टरांनी दिली आहे .	</p>
      <p class="style6"> ४. औषधउपचार / तपासण्या /शस्त्रक्रिया  / उपचारपद्धती करताना डॉक्टरांना काही कारणाने शस्त्रक्रिया  वा भुलेचे स्वरूप बदलावे लागले तर तसेच अत्यावश्यक वाटल्यास एखाद्या अवयव वा भाग काढून टाकावा लागल्यास अशा बदलास माझी संमती गृहीत आहे व तशी कल्पना मला दिली आहे .</p>
	  <p class="style6"> ५. वरील ऑपरेशन व संबंधित भूल यांच्यानंतर क्वचित , इच्छित फायदा होण्याऐवजी अन्य त्रास चालू शकतो . </p>
	  <div class="col-md-4">
        <label class="form-label mt-2">उदा . </label>
        <input type="text" class="form-control" id="rec" placeholder="" name="m" value="<?php echo $row6['uda'];?>">    
        </div>
      <p class="style6"> पण तो टाळण्यासठी व झाल्यास सुधारण्यासाठी आवश्यक ती काळजी डॉक्टर ( सर्जन ) व डॉक्टर ( भुलतज्ञ )
        
      <input  type="text" class="form-control" name="doctor" value="<?php echo $row6['doctor']; ?>">
      आणि जरूर वाटल्यास त्यांनी सुचविलेले इतर डॉक्टर घेतील याचा मला विश्वास आहे व संभाव्य धोक्याची मला कल्पना आहे. वरील मजकूर मी वाचला आहे / मला वाचून दाखवण्यात आला  आहे.   मला ते समाजाला आहे व त्यास माझी संपूर्ण मान्यता आहे. <p>

      
      
    </div>
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
<<<<<<< HEAD
    <td> <input  type="text" class="form-control" id="" placeholder="पत्ता" name="add3" value=" "></td>
=======
    <td> <input  type="text" class="form-control" id="" placeholder="पत्ता" name="add3" value="<?php echo $row6['add3'];?>"></td>
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
  </tr>
  <tr>
    <td class="style6">वय :    वर्ष : </td>
    <td>  <input  type="text" class="form-control" id="" placeholder="वय" name="vay1" value="<?php echo $row6['vay1'];?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="वय" name="vay2" value="<?php echo $row6['vay2'];?>"></td>
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