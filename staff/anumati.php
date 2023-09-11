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

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();

$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

if(isset($_POST['submit'])){
    
    $a=$_POST['1']; $b=$_POST['2']; $c=$_POST['3']; $d=$_POST['4']; $e=$_POST['5']; $f=$_POST['6']; $g=$_POST['7']; $h=$_POST['8'];
    $i=$_POST['9']; $j=$_POST['10'];$k=$_POST['11']; $l=$_POST['12'];$m=$_POST['13'];$sahi1=$_POST['sahi1'];$sahi2=$_POST['sahi2'];
    $sahi3=$_POST['sahi3'];$name1=$_POST['name1'];$name2=$_POST['name2'];$date=$_POST['date'];$add1=$_POST['add1'];$add2=$_POST['add2'];
    $add3=$_POST['add3'];$vay1=$_POST['vay1'];$vay2=$_POST['vay2'];$time=$_POST['time'];

    $update="UPDATE anumati_consent SET
    sahi1='$sahi1', a='$a',b='$b', c='$c', d='$d', e='$e', f='$f' ,g='$g', h='$h', i='$i', j='$j' ,k='$k', l='$l', m='$m' ,sahi2='$sahi2',
    sahi3='$sahi3',name1='$name1',name2='$name2',date='$date',add1='$add1', add2='$add2',add3='$add3',vay1='$vay1',vay2='$vay2',
    time='$time'
    WHERE id =$id;
    ";
    $sql5=mysqli_query($conn,$update);
    $x=1;
}
$sql6=mysqli_query($conn,"SELECT * FROM anumati_consent WHERE id =$id");
$row6=mysqli_fetch_assoc($sql6);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style type="text/css">

.style3 {
	font-size: 24px;
	font-weight: bold;
}
.style5 {color: #333333}
.style6 {
	font-size: 16px;
	font-weight: bold;
}
.style8 {font-size: 16px; font-weight: bold; }
.style9 {font-size: 16px}
.style10 {font-size: 16px}
tr {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
    }

    /* Add borders to the left and right of each column */
    td {
        border-left: 1px solid black;
        border-right: 1px solid black;

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
    </style>
</head>
<body class="m-2"> 
  <div class="container shadow-lg rounded">
   
<div id="button">
            <a href="eye_forms.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
                id="dashboard">Dashboard</a>
            <a href="anumati_print.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 btn-danger"
                id="dashboard">Print </a>
        </div>
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class="text-center text-dark my-3 ">INFORMED CONSENT FOR ANESTHESIA </h3>
       
    </p><form method="POST">
 
    <p >
<h1 align="center" class="style3  style5"> -: अनुमतीपत्र :-  </h1>
	
	   <h1>
	    <p class=" style10"> १. डॉक्टरांनी मला / आम्हाला / माझ्या आमच्या रुग्णांच्या  रुग्णांचे नाव  <strong><?php echo $res['name'];?></strong> आजाराच्या व त्याच्या प्रकृतीच्या आताच्या परिस्थितीची संपूर्ण माहिती व कल्पना दिली आहे .</p>
	
	<p class="style10">  २. मला / आम्हाला डॉक्टरांनी करावा लागणाऱ्या तपासण्या , औषधउपचार , त्याचे परिणाम व संभाव्य दुष्परिणाम किंवा अकल्पित प्रतिक्रिया व संभाव्य विकृती वा विकोप इ. सर्व बाबींची संपूर्ण व स्पष्ट कल्पना दिली आहे .  </p>

	<p class="style10"> ३. गरज भासल्यास रुग्णांच्या बाबतीत जरुरीप्रमाणे अतिरिक्त  तज्ञांचा सल्ला घेण्यास माझी / आमची संमती आहे. त्या संबधीच्या खर्चाची जबाबदारी माझ्यावर / आमच्यावर राहील .<p>
	
	<p class="style10"> ४. पोलीस केस असल्यास ( मेडिको लीगल केस ) माझे रुग्णालयाला पूर्ण सहकार्य राहील . अशा केसमध्ये रुग्णालयातील कार्यवाहीस माझी पूर्ण परवानगी आहे .  <p>
		<p class="style10"> ५. आवश्यकतेनुसार कराव्या लागणाऱ्या तपासण्या व औषधउपचार त्याबद्धल मी / आम्ही संबंधीत डॉक्टरांकडून वेळोवेळी माहिती जाणून घेऊ . <p>
	<p class="style10"> ६. रुग्णालयात वापरण्यात येणारी औषधे , सलाईनच्या बाटल्या , सलाईन सेट इत्यादी वस्तूचे रुग्णालयात उत्पादन केले जात नाही व रुग्णालयात वापरण्यात येणारी औषधी प्रमाणित कंपन्यांची असतात . याची मला जाणीव आहे.<p>
<p class="style10"> ७. रुग्णाच्या प्रकृतीविषयी वेळोवेळी मी डॉक्टरांकडून माहिती करून घेईल .  <p>
<p class="style10"> ८. रुग्ण अथवा रुग्णाच्या नातेवाईकांकडून रुग्णालयातील वस्तूंची मोडतोड झाल्यास त्याची सर्व जबादारी माझ्यावर / आमच्यावर राहील व त्याचा वेगळा आकार मी / आम्ही भरेल / भरू <p>
	<p class="style10"> ९. ह्या हॉस्पिटल मध्ये असलेल्या सुविधा मला / आम्हाला माहित आहेत . काही प्रकारच्या सुविधा सुविधा नसल्याची कल्पना मला / आम्हाला डॉक्टरांनी दिलेली आहे. <p> 
<p class="style10"> १०. वैदकीय ज्ञानाच्या अभिवृद्धीसाठी उपचार / शस्त्रक्रिया करतांना छायाचित्रे (फोटोग्राफ्स / ट्रान्सपनीज ) दृश्य किती प्रदर्शित अथवा प्रकाशित करण्यात माझी / आमची अनुमती आहे. मी / आम्ही असे गृहीत धरतो कि , अशा प्रकाशनात / प्रदर्शनात माझी / रुग्णाची ओळख दिली जाणार नाही . वरील सर्वे कलमे मी / आम्ही वाचली आहे . ती मला / आम्हाला समजली आहेत . व मला / आम्हाला मान्य आहेत व ती माझ्यावर /आम्हावर बंधनकारक आहेत. तरी मी / आम्ही  रुग्णालयाच्या अधिकाऱ्यांना मला /
   <div class="row">
    <div class="col-2"><p class="style10">रुग्णास नाव </p></div>
    <div class="col-4"><input  type="text" class="form-control" id="" placeholder="रुग्णास नाव " name="1" value="<?php echo $row6['a'];?>"></div>
    <div class="col-5"><p class="style10"> वा रुग्णालयात दाखल करून घेण्याची विनंती करतो .  </p></div>
  </div> <p>
<p class="style10"> <div class="row">
  <div class="col-2"><p class="style10"> नाव :</p></div>
  <div class="col-4"><input  type="text" class="form-control" id="" placeholder="नाव" name="2" value="<?php echo $row6['b'];?>"></div>
  <div class="col-2"><p class="style10">  सही / अंगठा :</p></div>
  <div class="col-4"><input  type="text" class="form-control" id="" placeholder="सही / अंगठा" name="3" value="<?php echo $row6['c'];?>"></div>
  <div class="col-2 mt-2"><p class="style10">  रुग्णांशी  नाते:</p></div>
  <div class="col-4 mt-2"><input  type="text" class="form-control" id="" placeholder="रुग्णांशी  नाते" name="4" value=" <?php echo $row6['d'];?>"></div>
  <div class="col-2 mt-2"><p class="style10">  तारीख :</p></div>
  <div class="col-4 mt-2"><input  type="date" class="form-control" id="" placeholder="तारीख" name="5" value="<?php echo $row6['e'];?>"> </div>

</div>
	
	<p class="style10 mt-3" > वरील अनुमती पत्राची कलमे मला माझ्या मातृभाषेत वाचून दाखविण्यात आलेली आहे .  ती मला मान्य आहेत व माझ्यावर बंधनकारक आहेत .<p>
  <div class="row">
  <div class="col-2"><p class="style10"> नाव :</p></div>
  <div class="col-4"><input  type="text" class="form-control" id="" placeholder="नाव" name="6" value=" <?php echo $row6['f'];?>"></div>
  <div class="col-2"><p class="style10">  सही / अंगठा :</p></div>
  <div class="col-4"><input  type="text" class="form-control" id="" placeholder="सही / अंगठा" name="7" value="<?php echo $row6['g'];?> "></div>
  <div class="col-2 mt-2"><p class="style10">  रुग्णांशी  नाते:</p></div>
  <div class="col-4 mt-2"><input  type="text" class="form-control" id="" placeholder="रुग्णांशी  नाते" name="8" value=" <?php echo $row6['h'];?>"></div>
  <div class="col-2 mt-2"><p class="style10">  तारीख :</p></div>
  <div class="col-4 mt-2"><input  type="date" class="form-control" id="" placeholder="तारीख" name="9" value="<?php echo $row6['i'];?>"> </div>
  <div class="col-2 mt-2"><p class="style10">  साक्षीदारांचे नाव व सही  :</p></div>
  <div class="col-4 mt-2"><input  type="text" class="form-control" id="" placeholder="साक्षीदारांचे नाव व सही" name="10" value=" <?php echo $row6['j'];?>"></div>
  <div class="col-2 mt-2"><p class="style10">  पत्ता :</p></div>
  <div class="col-4 mt-2"><input  type="text" class="form-control" id="" placeholder="पत्ता" name="11" value=" <?php echo $row6['k'];?>"></div>

</div>
<h1 align="center" class="style8"> -: परिशिष्ट - अ :-  </h1>
<p align="center" class="style6"> खर्च व बिले चुकती करण्याची संमती <p>
<h1 class="style10">मला / आम्हाला संभाव्य खर्चाची कल्पना देण्यात आलेली आहे . मी / आम्ही रुग्णालयात येणाऱ्या सर्वसाधारण दैनंदिन खर्च त्याचप्रमाणे तपासण्याचा सर्व उपचार व औषधे यासाठी होणार खर्च भरण्याचे काबुल करतो मी /आम्ही आवश्यक ती अनामत रक्कम भरण्याचे व अंतिम बिल भरण्याचे स्वखुशीने मेनी करतो .</h1>
<p>
<style>
table, th, td {
  border:1px solid black;
}
</style> 
<h2></h2>

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
    <td>
        <div class="row">
            <div class="col-3">
            <span class="style6">तारीख : </span>
            </div>
            <div class="col-9">
            <input  type="date" class="form-control" id="" placeholder="तारीख" name="date" value="<?php echo $row6['date'];?>">
            </div>
        </div>
        </td>
  </tr>
  <tr>
    <td><span class="style6">पत्ता :  </span></td>
    <td><span class="style6">  <input  type="text" class="form-control" id="" placeholder="पत्ता" name="add1" value="<?php echo $row6['add1'];?>">  </span></td>
    <td> <input  type="text" class="form-control" id="" placeholder="पत्ता" name="add2" value="<?php echo $row6['add2'];?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="पत्ता" name="add3" value="<?php echo $row6['add3'];?> "></td>
  </tr>
  <tr>
    <td class="style6">वय :    वर्ष : </td>
    <td>  <input  type="text" class="form-control" id="" placeholder="वय" name="vay1" value="<?php echo $row6['vay1'];?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="वय" name="vay2" value="<?php echo $row6['vay2'];?>"> </td>
    <td>
       <div class="row">
        <div class="col-3">
        <span class="style6">वेळ :  </span>
        </div>
        <div class="col-9">
        <input  type="time" class="form-control" id="" placeholder="वेळ" name="time" value="<?php echo $row6['time'];?>"> 
        </div>
       </div> 
    </td>
  </tr>
                            </table>
  
 
	 <div class="row">

   <div class="col-3">
   <h1 class="style3  style10"> Date : <input  type="date" class="form-control" id="" placeholder="तारीख" name="12" value="<?php echo $row6['l'];?>"> </h1>
	
   </div>
   <div class="col-6"></div>
   <div class="col-3">
<h1 class="style3  style10"> ( Patient / Relative Signature ) :<input  type="text" class="form-control" id="" placeholder="Patient / Relative Signature " name="13" value="<?php echo $row6['m'];?>">  </h1>
</div>
   </div>
   <button type="submit" class="btn btn-primary ml-auto m-2" name="submit" value="submit" id="submit"  >Submit</button>
                            
                            </form>

</body>
</html>


	