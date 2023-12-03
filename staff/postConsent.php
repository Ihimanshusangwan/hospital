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
    $date=$_POST['date'];
    $sign=$_POST['sign'];

    $update="UPDATE post_consent SET
    date='$date',
    sign='$sign'
    WHERE id =$id;
    ";
    
$sql5=mysqli_query($conn,$update);
    $x=1;
}
    $sql6=mysqli_query($conn,"SELECT * FROM post_consent WHERE id =$id");
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
        <h3 class=" fl text-center text-dark">ऑपरेशन नंतर पेशंटने घ्यावयाची काळजी </h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
   
    <form action="" method="post">
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="post_consent.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <div class="row">
      <div class="col-md-12">
      <p class="style6"> १ तीन आठवडे मानेखालून अंघोळ घेणे , डोळ्यात पाणी जाऊ देऊ नये .</p>
	
	<p class="style6">  २. तीन आठवडे ऑपरेशन झालेल्या कुशीवर झोपू नये . </p>

	<p class="style6"> ३. प्रखर उजेड व धूर टाळण्यासाठी काळा चष्मा लावावा . (चष्माचा नंबर मिळेपर्यंत )	</p>
	
	
	<p class="style6"> ४. धाणेरडे हात किंवा रुमाल डोळ्याला लावू नये , पाणी आल्यास गालावरच टिपू घ्यावे .</p>
	
	<p class="style6"> ५. जाड वजन उचलू नये , जोरात खोकला , गुळण्या करू नये . </p>
	<p class="style6"> ६. ऑपरेशन नंतर दोन दिवस हलका आहार आणि नंतर नेहमीचा आहार घ्यावा .</p>
<p class="style6">७. लहान मुलांना जवळ घेऊ नये. कारण खेळताना डोळ्याला हात लागू शकतो . </p>
<p class="style6"> ८. डोळ्यात ड्रॉप्स टाकण्याआधी हात साबणाने स्वच्छ धुऊन खालची पापणी ओढून टाकणे . </p>
	<p class="style6">१०. आठवड्यानंतर फेरतपासणीस येणे .   </p>
<p class="style6">११. ऑपरेशन झालेल्या डोळ्याला लाली , वेदना , किंवा घाण आल्यास त्वरित हॉस्पिटलमध्ये संपर्क साधावा . </p>
<p class="style6"> १२. बैलगाडीवर प्रवास करू नये .</p>
	
	<p class="style6"> १३. कापसाचा बोळा भिजून अलगद बाहेरूनच घाण साफ करणे.</p>
	<p class="style6"> १४. गोळ्या जेवणानंतर घेणे.</p>
<p class="style6"> १५. बी. पी., डायबेटिज, दमा , इ. पेशन्टने  आपली औषधी नेहमीप्रमाणे घेणे .</p>

</head>
<body>

    <div class="row">
        <div class="col-7"></div>
        <div class="col-5"><p>Date : <input  type="date" class="form-control" id="" placeholder="Date" name="date" value="<?php echo $row6['date'];?>"></p></div>
        <div class="col-7"></div>
        <div class="col-5"><p>( Patient / Relative Signature ) :<input  type="text" class="form-control" id="" placeholder="Sign" name="sign" value="<?php echo $row6['sign']; ?>"></p></div>
        
    </div>
</div>
</div>
                    
                    
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>