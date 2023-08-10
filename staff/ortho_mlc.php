<?php
     require("../admin/connect.php");
     $id = $_GET['id'];
 
     $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
     $row=mysqli_fetch_assoc($sql);
 
     $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
     $row1=mysqli_fetch_assoc($sql1);
 
     $sql2=mysqli_query($conn,"SELECT * FROM ortho_p_insure WHERE id = '$id';");
     $row2=mysqli_fetch_assoc($sql2);
     $sql = "SELECT * FROM titles WHERE id = 1;";
     $data = $conn->query($sql);
     $title = $data->fetch_assoc();
     error_reporting(0);
     $x=0;
if(isset($_POST['submit'])){
    $mlc=isset($_POST['mlcno']) ? $_POST['mlcno']:'';
    $date1=isset($_POST['mlcdate']) ? $_POST['mlcdate']: '';
    $vay= $_POST['vay'];
    $mo=$_POST['mokramank'];
    $mupu=$_POST['mupu'];
    $date2=$_POST['date'];
    $time1=$_POST['time'];
    $msg=$_POST['msg'];
    $thikar=$_POST['thikar'];
    $yn=isset($_POST['yno']) ? $_POST['yno']:'';
    $nav=$_POST['nav'];
    $date3=$_POST['dt'];
    $time2=$_POST['tm'];
    $sign=$_POST['sign'];

    $update="UPDATE mlc SET
    `mlc`='$mlc',
    `date1`='$date1',
    `vay`='$vay',
    `mo`='$mo',
    `mupu`='$mupu',
    `date2`='$date2',
    `time1`='$time1', 
    `msg`='$msg',
    `thikar`='$thikar',
    `yn`='$yn',
    `nav`='$nav',
    `date3`='$date3',
    `time2`='$time2',
    `sign`='$sign'
    WHERE id=$id ";
    $sql3=mysqli_query($conn,$update);
    $x=1;
}
$sql4=mysqli_query($conn,"SELECT * FROM `mlc` WHERE id={$id}");
$row4=mysqli_fetch_assoc($sql4);
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

<body>
    <div class="container">
    <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
         <h3 class=" fl text-center text-dark">M.L.C. नोंद करणे बाबत</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
       
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="ortho_mlc_print.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>

            <form action="" method="post">
                <div class="row">
                    <div class="container">

                    <div class="row">
      <div class="col-md-3">
        <label class="form-label mt-2">M.L.C. No.: </label>
        <input type="text" class="form-control" name="mlcno" id="mlc" value="<?php echo $row4['mlc']; ?>" placeholder="Enter M.L.C. No.">
      </div>
      <div class="col-md-6">
    </div>
      <div class="col-md-3">
        <label class="form-label mt-2">Date: </label>
        <input type="date" class="form-control" name="mlcdate" id="dm" value="<?php echo $row4['date1']; ?>" >
      </div>
    </div>
    <div class="row ">
      <div class="col-md-3 mt-5">
        <label class="form-label">प्रति,</label></div>
    </div>

      <div class="col-md-3">
        <label class="form-label">पोलीस निरीक्षक</label>
       </div>
   
      <div class="col-md-5">
        <label class="form-label">शिवाजीनगर पोलीस ठाणे, बीड- ४३११२२</label>
       </div>
    

      <div class="col-md-10">
        <label class="form-label">विषय : श्री सिद्धिविनायक नेत्रालय , शासकीय विश्रामगृहा शेजारी, नगर रोड , बीड येथे भरती झालेल्या रुग्णाची नोंद करणे बाबत
</label>
       </div>
       
       <div class="col-lg-5">
                    <label class="form-label ">महोदय,</label>
                    </div>


                        <div class="row">
                             <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">श्री /श्रीमती</label>
                                <div class="col-sm-10">
                                <input type="text" value="<?php echo $row['name']; ?>" class="form-control mt-1" id="fname" name="name" placeholder="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-1 col-form-label">वय :</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control mt-1" id="vya" name="vay" value="<?php echo $row4['vay']; ?>">
                                </div>
                                <label class="col-sm-1 col-form-label">वर्षे :</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control mt-1" id="var" name="varsh" value="<?php echo $row['age']; ?>" placeholder="">
                                </div>
                                <label class="col-sm-1 col-form-label">मो.क्र. :</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control mt-1" id="mo" name="mokramank" value="<?php echo $row4['mo']; ?>" placeholder="">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                             <div class="row mb-3">
                                <label  class="col-sm-1 col-form-label">मु.पो.</label>
                                <div class="col-sm-11">
                                <input type="text" class="form-control mt-1" id="mp" name="mupu" value="<?php echo $row4['mupu']; ?>" placeholder="">
                                </div>   
                        </div>
                       
                             <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">हा रुग्ण आज दिनांक</label>
                                <div class="col-sm-3">
                                <input type="date" class="form-control mt-1" id="dates" name="date" value="<?php echo $row4['date2']; ?>" placeholder="">
                                </div>
                                
                                <label class="col-sm-1 col-form-label">वेळ :</label>
                                <div class="col-sm-3">
                                <input type="time" class="form-control mt-1" id="t" name="time"  value="<?php echo $row4['time1']; ?>" placeholder="">
                                </div>
                                
                                <label class="col-sm-3 col-form-label">रोजी आमच्या रुग्णालयात</label>
                                <div class="col-sm-12 mt-3">
                                <textarea type="text" class="form-control mt-1" id="msg" name="msg" ><?php echo $row4['msg']; ?></textarea>
                                </div>
                                <label  class="col-sm-3 mt-2 col-form-label">या कारणास्तव दाखल आहे</label>
                                
                    </div>
                   
                    <div class="row">
                             <div class="row mt-2 mb-3">
                                <label  class="col-sm-2 col-form-label">घटणेचे  ठिकाण</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control mt-1" id="gt" name="thikar" value="<?php echo $row4['thikar']; ?>" placeholder="">
                                </div>   
                                <label class="col-sm-5 col-form-label">रूग्गणांची स्थित : रुग्ण जबाब देण्याचा स्थितीत </label>
                                   <?php     
                                    $options = array(
                                        array('id' => 'y', 'value' => 'आहे', 'label' => 'आहे '),
                                        array('id' => 'n', 'value' => 'नाही', 'label' => 'नाही')
                                    );
                                   foreach ($options as $option) {
                                    $optionId = $option['id'];
                                    $optionValue = $option['value'];
                                    $optionLabel = $option['label'];
                                    echo "<div class='form-check'>";
                                    echo "<input class='form-check-input' type='radio' name='yno' value='$optionValue' id='$optionId'";
                                    if(($row4['yn'])===$optionValue){
                                        echo "checked";
                                    }
                                    
                                          echo ">";
                                    echo "<span>$optionLabel</span>";
                                    echo "</div>";
                    }
           ?>
             <label class="col-sm-4 col-form-label">आपल्या महितीस्तव व कार्यवाहिस्तव सादर .</label>
                        </div>
                       <div class="row">
                       <div class="col-sm-10"></div>
                        <label class="col-sm-2 col-form-label">वैद्यकिय अधिकारी</label>
                       </div>
                       <div class="col-sm-9"></div>
                        <label class="col-sm-3  mb-4 col-form-label">श्री सिद्धिविनायक नेत्रालय , बीड</label>
                        
                    </div>

                    <div class="row">
                             <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">नोंद घेणान्या पोलीस कर्मचान्याचे नाव</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control mt-1" id="nond" name="nav"  value="<?php echo $row4['nav']; ?>" placeholder="">
                                </div>

                                <label  class="col-sm-2 mt-3  col-form-label">नोंद घेण्याचा दिनांक</label>
                                <div class="col-sm-3 mt-3 ">
                                <input type="date" class="form-control mt-1" id="dated" name="dt"  value="<?php echo $row4['date3']; ?>" placeholder="">
                                </div>
                                <div class="col-sm-3"></div>
                                <label class="col-sm-1 mt-3  col-form-label">वेळ</label>
                                <div class="col-sm-3 mt-2">
                                <input type="time" class="form-control mt-1" id="timed" name="tm" value="<?php echo $row4['time2']; ?>" placeholder="">
                                </div>

                                <label class="col-sm-4 col-form-label mt-3">नोंद घेणान्या पोलीस कर्मचान्याचे स्वाक्षरी</label>
                                <div class="col-sm-8 mt-2">
                                <input type="text" class="form-control mt-1" id="signs" name="sign" value="<?php echo $row4['sign']; ?>" placeholder="">
                                </div>
</div>
                        
                            
    </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
        
        
        </form>
</body>

</html>