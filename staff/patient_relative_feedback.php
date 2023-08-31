<?php
 require("../admin/connect.php");
 $id = $_GET['id'];
 $sql = "SELECT * FROM patient_records WHERE id = '$id';";
 $data = $conn->query($sql);
 $res = $data->fetch_assoc();
 
 $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
 $data1 = $conn->query($sql1);
 $res1 = $data1->fetch_assoc();
 
 $sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
 $data2 = $conn->query($sql2);
 $res2 = $data2->fetch_assoc();

 $sql4 = "SELECT * FROM discharge WHERE id = '$id';";
 $data4 = $conn->query($sql4);
 $res4 = $data4->fetch_assoc();

 $sql = "SELECT * FROM titles WHERE id = 1;";
   $data = $conn->query($sql);
   $title = $data->fetch_assoc();


   if(isset($_POST['submit'])){
    $a=array();
    for($i = 0; $i < 20; $i++){
        $element = isset($_POST[$i]) ? $_POST[$i] : '';
            array_push($a, $element);
    }

    $a_en=json_encode($a);
    $update="UPDATE pt_rel_feedback SET
    a='$a_en'
    WHERE id=$id;
    ";
    $sql3=mysqli_query($conn,$update);

}
$sql4=mysqli_query($conn,"SELECT * FROM pt_rel_feedback WHERE id=$id");
$row4=mysqli_fetch_assoc($sql4);
$a_de = array_fill(0, 20, '');
if($row4){
    $a_de = json_decode($row4['a'], true);
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
    <style>
    td,
    tr,
    th,
    tbody {
        border: 1px solid black;
    }

    body {
        /* background: lightgray; */
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
    <title>Document</title>
</head>

<body class="m-2">
    <form method="post">
        <div class="container ">
            <div class="shadow-lg  rounded">
                <h1 class="text-center text-danger mt-3">
                    <?php echo $title['so']; ?>
                </h1>
                <div id="button">
                    <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
                        id="dashboard">Dashboard</a>
                        <a href="pt_relfeed_print.php?id=<?php echo $id; ?>" class="btn btn-danger mt-4 noprint"
                        id="dashboard">Print</a>
                </div>
                <h3 class="text-center text-dark my-3 ">Patient & Relative Feedback ORM</h3>
                <div class="table mx-4">
                    <div class="row">
                        <div class="col-12"> <label>Name.:</label>
                            <input type="text" name="16" class="form-control" value="<?php echo $a_de['16'];?>"style="display: inline-block; width: auto;">
                        </div>
                    </div>
                    <div class="row  mt-3">
                        <div class="col-4"> <label>Phone: </label>
                            <input type="text" name="17" class="form-control"value="<?php echo $a_de['17'];?>" style="display: inline-block; width: auto;">
                        </div>
                        <div class="col-4"> <label>Email </label>
                            <input type="text" name="18" class="form-control"value="<?php echo $a_de['18'];?>" style="display: inline-block; width: auto;">
                        </div>
                        <div class="col-4">
                            <label for="">Date</label>
                            <input type="Date" name="19" class="form-control"value="<?php echo $a_de['19'];?>" style="display: inline-block; width: auto;">
                        </div>
                    </div>
                </div>
                <br>
                <h6 class="mx-4">Your Feedback on the following elements of our services will be highly appreciated
                    Please rate the following parameters on a scale of 1 to 3
                    <br> <br>आमच्या सेवांच्या खालील घटकांवर आपल्या अभिप्रायाची अत्यंत प्रशंसा केली जाईल. कृपया खालील
                    पॅरामिटर्स 1 ते 3 च्या प्रमाणत रेट करा
                </h6>
                <table class="table mt-2" style="margin:auto; width:80%;">
                    <thead>
                        <tr>
                            <th width="5%">Sr No.</th>
                            <th width="40%">Particular</th>
                            <th width="7%">Good-1</th>
                            <th width="7%">Average-2</th>
                            <th width="7%">Poor-3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       $arr=array("Registration/ Help Desk नोंदणी / मदतडेस्क",
                    "Reception & Registration स्वागत आणि नोंदणी ","Telephonic Convocation टेलिफोनिक संभाषण ",
                    "Guidance through required processess आवश्यक मार्गदर्शक तत्वांनुसार मार्गदर्शन ",
                    "Medical & nursing process वैद्यकीय आणि नर्सिंग प्रक्रिया",
                    " Attention, efficiency counseling of the Treating doctor-Consultant उपचार डॉक्टरांच्या सल्ला-दक्षतेचे समुपदेशन Attention",
                    " Attention, efficiency of the Nursing staff नर्सिंग कर्मचाऱ्यांचं कार्यक्षमता",
                    " Hospital Environment & Cleanliness रुग्णालय पर्यावरण आणि स्वच्छता ",
                    "Canteen Services कँटीनसेवा ","Laboratory Services लॅबोरेटरी सेवा",
                    " Imaging Services इमेजिंग सेवा"," Chemist/ Other Shops केमिस्ट / इतर दुकाने ",
                    "Accommodation राहण्याची जागा",
                    "Discharge Process डिस्चार्ज प्रक्रिया",
                    " Overall level of Service एकूण से"
                );
                        for($i=0; $i<15;$i++){
                            echo "<tr>
                            <td>" . ($i + 1) . "</td>
                            <td>$arr[$i]</td>";
                            
                            echo '
                            <td><input class="form-check-input d-flex  mx-auto" type="radio" name="'.$i.'" 
                            value="good" ' . (($a_de[$i] === 'good') ? 'checked' : '') . ' echo "checked"; id=""></td>
                            <td><input class="form-check-input d-flex  mx-auto" type="radio" name="'.$i.'" 
                            value="average" ' . (($a_de[$i] === 'average') ? 'checked' : '') . ' echo "checked"; id=""></td>
                            <td><input class="form-check-input d-flex  mx-auto" type="radio" name="'.$i.'"
                            value="poor" ' . (($a_de[$i] === 'poor') ? 'checked' : '') . ' echo "checked"; id=""></td>
                        </tr>';

                        }
                        ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mt-3 d-flex mx-auto" name="submit" value="submit"
                    id="submit">Submit</button>
            </div>

        </div>
    </form>


</html>