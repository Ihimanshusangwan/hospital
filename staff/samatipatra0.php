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
    
    $c=array();
    for ($i = 0; $i < 12; $i++) {
        $dateValue = $_POST[ $i];
        array_push($c, $dateValue);
    }
    
$c_en=json_encode($c);


$update ="UPDATE samtipatra1 SET
c='$c_en'
WHERE id =$id;
";
$sql3=mysqli_query($conn,$update);

}
$sql4=mysqli_query($conn,"SELECT * FROM samtipatra1 WHERE id=$id;");
$row4=mysqli_fetch_assoc($sql4);

if($row4){
    $c_de =  json_decode($row4['c'], true);
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

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px;
    }
  [class^="col-"] {
    margin-top: 0.5rem;
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
        <h3 class=" fl text-center text-dark">Samatipatra</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>

    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="samtipatra0_print.php?id=<?php echo $id; ?>" class=" btn btn-success" id="dashboard">Print</a>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-md-3">
                    <label class="form-label">UHID No: <?php echo $row2['uhid'];?></label>
                </div>
            </div>

            <form action="" method="post">
                <div class="row">
                    <div class="col-2">रुग्णांचे नांव :</div>
                    <div class="col-4"><input type="text" name="0" id="" value="<?php echo $c_de['0'];?>"class="form-control"></div>
                    <div class="col-1">वय :</div>
                    <div class="col-5"><input type="text" name="1" id=""value="<?php echo $c_de['1'];?>" class="form-control"></div>
                    <div class="col-1">मी</div>
                    <div class="col-11"><input type="text" name="2" id=""value="<?php echo $c_de['2'];?>" class="form-control"></div>
                    <div class="col-2">राहणार :</div>
                    <div class="col-4"><input type="text" name="3" id="" value="<?php echo $c_de['3'];?>"class="form-control"></div>
                    <div class="col-6">मला स्वतःला / माझ्या नातेवाईकाला उपचारासाठी भरती करण्याची संमती देत आहे.</div>
                    <div class="col-12">
                        मी येथील डॉक्टर, नर्सेस व टेक्नीशिअन यांना माझ्यावर योग्य तो इलाज करण्याची परवानगी देत आहे.
                        इलाजासाठी आवश्यक त्या

                        तपासण्या व आवश्यक तर शस्त्रक्रिया करण्यास माझी संमती आहे. मी माझी वैद्यकिय कागदपत्रे योग्य त्या
                        व्यक्तीस गरज असल्यास दाखवायची परवानगी देत आहे.

                        मला हॉस्पिटलच्या नियमांची जाणीव असून त्याप्रमाणे मी वागण्याची जबाबदारी घेतो. रुग्णाबरोबर असलेले
                        पैसे, दागिने व जोखिमीच्या

                        वस्तू भी ताब्यात घेतल्या असून त्या बद्दल हॉस्पिटलची काहीही जबाबदारी नाही. अनपेक्षीत प्रसंगी वा
                        ज्या डॉक्टरांचा इलाज चालू आहे ते जर काही

                        अपरिहार्य कारणामुळे येऊ न शकल्यास त्यांच्या ऐवजी योग्य त्या दुसन्या डॉक्टरांना इलाज करू देण्यास
                        व्यवस्थापनास परवानगी देत आहे. हॉस्पिटलच्या फिस व इतर चार्जेस बदल मला कल्पना दिली असून
                        त्याप्रमाणे पैसे भरण्याची मी जबाबदारी घेतो. काही अनपेक्षित व मानवी प्रयत्नांबाहेरच्या घटना
                        रुग्णा बाबतीत घडू शकतात याची मला कल्पना आहे व त्याबद्दल मी हॉस्पिटलला जबाबदार ठरणार नाही.

                        वरील सर्व मजकूर भी काळजी पूर्वक वाचुन त्यानंतरच मी सही कलेली आहे.
                    </div>
                    <div class="col-6"></div>
                    <div class="col-2">रुग्ण / नातेवाईक सही</div>
                    <div class="col-4">
                    <input type="radio" name="4" value='patient_sign' <?php echo ($c_de['4'] =="patient_sign")?"checked":""; ?>  > Patient Sign    
                    <input type="radio" name="4" value='relative_sign'  <?php echo ($c_de['4'] =="relative_sign")?"checked":""; ?>> Relative Sign <br>   
                    <input type="radio" name="4" value='patient_name'  <?php echo ($c_de['4'] =="patient_name")?"checked":""; ?> <?php echo ($c_de['4']=="")?"checked":""; ?>> Patient Name    
                    <input type="radio" name="4" value='relative_name'  <?php echo ($c_de['4'] =="relative_name")?"checked":""; ?>> Relative Name    
                 </div>
                    <div class="col-1">तारीख :</div>
                    <div class="col-3"><input type="date" name="5"value="<?php echo $c_de['5'];?>" id="" class="form-control"></div>
                    <div class="col-2"></div>
                    <div class="col-1">नाव :</div>
                    <div class="col-5"> <input type="radio" name="6" value='patient_name'  <?php echo ($c_de['6'] =="patient_name")?"checked":""; ?> <?php echo ($c_de['6']=="")?"checked":""; ?>> Patient Name    
                    <input type="radio" name="6" value='relative_name'  <?php echo ($c_de['6'] =="relative_name")?"checked":""; ?>> Relative Name   </div>

                    <div class="col-12 text-center mt-4"> <strong>रुग्ण अत्यावस्थ असल्याची माहिती</strong></div>
                    <div class="col-12">मला, माझ्या / माझी नातेवाईक</div>
                    <div class="col-12"> याची तब्येत अत्यावस्थ असल्याची कल्पना दिली आहे. तरी त्याच्यावर / तिचेवर आवश्यक
                        ते सर्व
                        उपचार व संबंधित तपासण्या करण्याची मी डॉक्टरांना व व्यवस्थापनास संमती देत आहे</div>
                    <div class="col-6"></div>
                    <div class="col-2">रुग्ण / नातेवाईक सही</div>
                    <div class="col-4"><input type="text" name="7"value="<?php echo $c_de['7'];?>" id="" class="form-control"></div>
                    <div class="col-12 text-center mt-4"><strong>डॉक्टराच्या सल्ल्याविरुद्ध रुग्णास नेण्याची
                            संमती</strong></div>
                    <div class="col-1">मी</div>
                    <div class="col-5"></div>
                    <div class="col-2">माझ्या नातेवाईक</div>
                    <div class="col-4"></div>
                    <div class="col-12">यास डॉक्टरांच्या सल्ल्याविरूद्ध स्वतः च्या जबाबदारीवर हॉस्पिटल मधून घेऊन जात
                        आहे.
                        त्याचेवर चालू असलेले औषधोपचार अगर कृत्रिम श्वासोश्वास थांबवल्यास त्यांच्या जीवास धोका उत्पन्न
                        होऊन हृदयक्रिया
                        बंद पडू शकते यांची संपूर्ण कल्पना डॉक्टरांनी मला दिली आहे. या बद्दल माझी डॉक्टर्स हॉस्पिटल
                        व्यवस्थापनाबद्दल
                        कोणतीही तक्रार असणार नाही. मी हॉस्पिटल व्यवस्थापनाला संबंधित जबाबदारीतून मुक्त करीत आहे.</div>
                    <div class="col-1">तारीख :</div>
                    <div class="col-3"><input type="date" name="8"value="<?php echo $c_de['8'];?>" id="" class="form-control"></div>
                    <div class="col-2"></div>
                    <div class="col-2">रूग्ण / नातेवाईक सही</div>
                    <div class="col-4"><input type="text" name="9"value="<?php echo $c_de['9'];?>" id="" class="form-control"></div>
                    <div class="col-12 text-center mt-4"><strong>Discharge Information</strong></div>
                    <div class="col-12">मला / आमच्या नातेवाईकास रुग्णालयातून डिस्चार्ज मिळाला आहे. रुग्णालय सोडतांना
                        आम्हाला रुग्णासंबंधी सर्व कागदपत्रे (उदा. डिस्चार्ज कार्ड, सर्व तपासण्या मुळे कागद पत्र, पुढील
                        उपचाराबद्दल
                        माहिती किंवा लागू असल्यास मृत्यूचा दाखला / पावती इ.) ताब्यात मिळालेली आहेत.
                        त्याबद्दल काहीही तक्रार नाही.</div>
                    <div class="col-1">तारीख :</div>
                    <div class="col-3"><input type="date" name="10" value="<?php echo $c_de['10'];?>"id="" class="form-control"></div>
                    <div class="col-2"></div>
                    <div class="col-2">रूग्ण / नातेवाईक सही</div>
                    <div class="col-4"><input type="text" name="11" value="<?php echo $c_de['11'];?>"id="" class="form-control"></div>


                </div>


                <br>
                <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit"
                    id="submit">Submit</button>

            </form>
        </div>
</body>

</html>