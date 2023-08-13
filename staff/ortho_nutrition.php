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
  
error_reporting(0);
$x=0;
    
    if(isset($_POST['submit'])){

        $allergy=$_POST['allergy'];
        $namediet=$_POST['diet'];
        $diagnosis=$_POST['diagno'];
        $complaints=isset($_POST['complaint']) ? $_POST['complaint']: '';
        $clinicalsy=$_POST['clinicals'];
        $treatment=$_POST['treatment'];
        $height=$_POST['height'];
        $weight=$_POST['weight'];
        $bmi=$_POST['bmi'];
        $weinou=isset($_POST['nuow']) ? $_POST['nuow']: '';
        $weichange=isset($_POST['wchange']) ? $_POST['wchange']: '';
        $dietprior=$_POST['dietprior'];
        $appetite=$_POST['appetitep'];
        $foodal=$_POST['foodal'];
        $vegn=isset($_POST['vegn']) ? $_POST['vegn']: '';
        $hofood=isset($_POST['food']) ? $_POST['food']: '';
        $properinter=isset($_POST['properint']) ? $_POST['properint']: '';
        $junk=isset($_POST['snacks']) ? $_POST['snacks']: '';
        $cookm=$_POST['cookingmed'];
        $waterin=isset($_POST['water']) ? $_POST['water']: '';
        $saltin=$_POST['salt'];
        $recomm=$_POST['recommend'];
        $nameofdiet=$_POST['nodiet'];
        $date=$_POST['date'];
        $time=$_POST['time'];

        $update="UPDATE `nutritional_ass` SET 
        `allergy`='$allergy',
        `namediet`='$namediet',
        `diagnosis`='$diagnosis',
        `complaints`='$complaints',
        `csymptm`='$clinicalsy',
        `treatment`='$treatment',
        `height`='$height',
        `weight`='$weight',
        `bmi`='$bmi',
        `wenou`='$weinou',
        `weichange`='$weichange',
        `dietprior`='$dietprior',
        `appetite`='$appetite',
        `foodaller`='$foodal',
        `vegnon`='$vegn',
        `hofood`='$hofood',
        `proper`='$properinter',
        `junk`='$junk',
        `cookm`='$cookm',
        `waterin`='$waterin',
        `saltin`='$saltin',
        `recomm`='$recomm',
        `nameofdiet`='$nameofdiet',
        `date`='$date',
        `time`='$time'
        WHERE `id`={$id}";
        $sql3=mysqli_query($conn,$update);
    $x=1;
    }

    $sql4=mysqli_query($conn,"SELECT * FROM `nutritional_ass` WHERE id = $id");
    $row3=mysqli_fetch_assoc($sql4);
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutritional Assessment</title>
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
        <h3 class=" fl text-center text-dark">NUTRITIONAL ASSESSMENT</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
       
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="ortho_nutri_print.php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <button onclick="location.reload();" class="btn btn-success">Refresh</button>

            <div class="row">
      <div class="col-md-3 mt-2">
        <label class="form-label">UHID No: <?php echo $row2['uhid'];?></label>
       </div>
      <div class="col-md-3 mt-2">
        <label class="form-label">IPD No: <?php echo $row2['ipd']; ?> </label>
        </div>
      <div class="col-md-3 mt-2">
        <label class="form-label">Date of Admission : <?php echo $row2['date']; ?></label>
        </div>
      <div class="col-md-3 mt-2">
        <label class="form-label">Time of Admission : <?php echo $row2['time']; ?></label>
       </div>
    </div>
    <div class="row ">
      <div class="col-md-3">
        <label class="form-label">Name:<?php echo $row['name']; ?></label>
       </div>
      <div class="col-md-3">
        <label class="form-label">Age: <?php echo $row['age']; ?></label>
         
      </div>
      <div class="col-md-3">
        <label class="form-label">Sex:<?php echo $row['sex']; ?></label>
        </div>
      <div class="col-md-3">
        <label class="form-label">ICU/Ward Room No:<?php echo $row2['ward/icu']; ?></label>
       </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <label class="form-label">Consultant:  <?php echo $row['consultant']; ?></label>
        </div>
      <div class="col-md-3">
        <label class="form-label">Diagnosis:<?php echo $row1['diagnosis']; ?></label>
           </div>
      <div class="col-md-3">
        <label class="form-label">Bed Number:<?php echo $row2['bed/room']; ?> </label>
        </div>
    </div>
            <form action="" method="post">
                <div class="row">
                    
                    <div class="container">
                    <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="form-label ">Allergy To (Drug / Food Other) :</label>
                                <input  type="text" class="form-control" id="drug" placeholder="Allergy To (Drug / Food Other)"  name="allergy"    value="<?php echo $row3['allergy'];?>">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Name of Dietitian:</label>
                                <input type="text" class="form-control" id="nodiet" placeholder="Enter Name of Dietitian" name="diet"    value="<?php echo $row3['namediet'];?>">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Diagnosis:</label>
                                <input  type="text" class="form-control" id="diagnosis" placeholder="Diagnosis" name="diagno"    value="<?php echo $row3['diagnosis'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label ">Present Complaints:</label>
                                <textarea  type="text" class="form-control" id="complaints" name= "complaint"   placeholder="Present Complaints"><?php echo $row3['complaints'];?></textarea>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Clinical Symptoms:</label>
                                <textarea  type="text" class="form-control" id="cs"
                                    placeholder="Clinical Symptoms" name= "clinicals"><?php echo $row3['csymptm'];?></textarea>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label ">Treatment:</label>
                                <textarea  type="text" class="form-control" id="treatm"
                                    placeholder="Treatment" name= "treatment"><?php echo $row3['treatment'];?></textarea>
                            <br>
                                </div>
                            <hr>
                            <span >Objective Information</span>

                            <div class="row">
                            <div class="col-md-3 mt-2">
                                <label class="form-label " >Height:</label>
                                <input  type="text" class="form-control" id="hei"
                                    placeholder="Height" name="height"    value="<?php echo $row3['height'];?>">
                                    <br>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label class="form-label">Weight:</label>
                                <input  type="text" class="form-control" id="wei"
                                    placeholder="Weight" name="weight"    value="<?php echo $row3['weight'];?>">
                                    <br>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label class="form-label ">BMI:</label>
                                <input  type="text" class="form-control" id="bm"
                                    placeholder="BMI" name="bmi"    value="<?php echo $row3['bmi'];?>">
                                    <br>
                            </div>

                            <div class="col-md-3 mt-2">
                            <label class="form-label">Weight</label>
                            <select class="form-control" name="nuow" id="w">
                              <option selected value="Normal Weight">Normal Weight  <?php if ($row3['wenou'] == 'Normal Weight') {
                                      echo 'selected';
                                    } ?></option>
                              <option value="Under Weight" >Under Weight  <?php if ($row3['wenou'] == 'Under Weight') {
                                      echo 'selected';
                                    } ?></option>
                              <option value="Over Weight(Obese)">Over Weight(Obese)  <?php if ($row3['wenou'] == 'Over Weight(Obese)') {
                                      echo 'selected';
                                    } ?></option>
                              
                            </select>
                            </div>

                            <div class="col-md-5 mt-2">
                            <label class="col-sm-6 col-form-label">Weight Change or Loss</label>
                                   <?php     
                                    $options = array(
                                        array('id' => 'o', 'value' => 'Over', 'label' => 'Over'),
                                        array('id' => 'p', 'value' => 'Period', 'label' => 'Period'),
                                        array('id' => 'n', 'value' => 'No change in weight', 'label' => 'No change in weight')
                                    );
                                   foreach ($options as $option) {
                                    $optionId = $option['id'];
                                    $optionValue = $option['value'];
                                    $optionLabel = $option['label'];
                                    echo "<div class='form-check'>";
                                    echo "<input class='form-check-input' type='radio' name='wchange' value='$optionValue' id='$optionId'";
                                    if($row3['weichange'] ===$optionValue){
                                        echo "checked";
                                    }
                                    echo ">";
                                    echo "<span>$optionLabel</span>";
                                    echo "</div>";
                    }
           ?><br>
      </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <span>Nutritional History/Therapy</span><br>
                    <div class="container">
                        <div class="row">
                        
                            <div class="col-lg-4">
                                <label class="form-label ">Diet Prior to Admission:</label>
                                <input  type="text" class="form-control" id="dietp"
                                    placeholder="Diet Prior to Admission" value="<?php echo $row3['dietprior'];?>" name="dietprior">
                                    
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label ">Appetite Prior to Admission:</label>
                                <input  type="text" class="form-control" id="aptr"
                                    placeholder="Appetite Prior to Admission" value="<?php echo $row3['appetite'];?>"  name="appetitep">
                                    
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label ">Food Allergies:</label>
                                <input  type="text" class="form-control" id="fa"
                                    placeholder="Food Allergies" value="<?php echo $row3['foodaller'];?>" name="foodal">
                                    
                           <br>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <span>Food Habits:</span>
                  <div class="row">
            <div class="col-lg-4">
                <label class="form-label">Vegetarian or Non-vegetarian?</label>
                <div class="form-check">

                <?php     
                                    $options = array(
                                        array('id' => 've', 'value' => 'Vegetarian', 'label' => 'Vegetarian'),
                                        array('id' => 'nv', 'value' => 'Non-vegetarian', 'label' => 'Non-vegetarian'),
                                    );
                                   foreach ($options as $option) {
                                    $optionId = $option['id'];
                                    $optionValue = $option['value'];
                                    $optionLabel = $option['label'];
                                    echo "<div class='form-check'>";
                                    echo "<input class='form-check-input' type='radio' name='vegn' value='$optionValue' id='$optionId'";
                                    if(($row3['vegnon'])===$optionValue){
                                        echo "checked";
                                    }
                                    echo ">";
                                    echo "<span>$optionLabel</span>";
                                    echo "</div>";
                    }
           ?>
</div>
                
            </div>
            
            <div class="col-lg-4">
                <label class="form-label">Home Food or Outside Food?</label>
                <div class="form-check">
                <?php     
                                    $options = array(
                                        array('id' => 'hf', 'value' => 'Home Food', 'label' => 'Home Food'),
                                        array('id' => 'of', 'value' => 'Outside Food', 'label' => 'Outside Food'),
                                    );
                                   foreach ($options as $option) {
                                    $optionId = $option['id'];
                                    $optionValue = $option['value'];
                                    $optionLabel = $option['label'];
                                    echo "<div class='form-check'>";
                                    echo "<input class='form-check-input' type='radio' name='food' value='$optionValue' id='$optionId'";
                                    if($row3['hofood'] ===$optionValue){
                                        echo "checked";
                                    }
                                    echo ">";
                                    echo "<span>$optionLabel</span>";
                                    echo "</div>";
                    }
           ?></div>
            </div>
            
            <div class="col-lg-4">
                <label class="form-label">Do you have food at proper intervals?</label>
                <div class="form-check">
                <?php
            $options = array(
                array('id' => 'py', 'value' => 'Yes', 'label' => 'Yes'),
                array('id' => 'pn', 'value' => 'No', 'label' => 'No')
            );
            foreach ($options as $option) {
                $optionId = $option['id'];
                $optionValue = $option['value'];
                $optionLabel = $option['label'];
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='properint' value='$optionValue' id='$optionId'";
                if (($row3['proper'])=== $optionValue) {
                    echo " checked";
                }
                echo ">";
                echo "<span>$optionLabel</span>";
                echo "</div>";
            }
            ?>
                </div>
            </div>
            
            <div class="col-lg-4 mt-3">
                <label class="form-label">Do you have snacks/junk food frequently?</label>
                <div class="form-check">
                <?php
            $options = array(
                array('id' => 'junkyes', 'value' => 'Yes', 'label' => 'Yes'),
                array('id' => 'junkno', 'value' => 'No', 'label' => 'No')
            );
            foreach ($options as $option) {
                $optionId = $option['id'];
                $optionValue = $option['value'];
                $optionLabel = $option['label'];
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='snacks' value='$optionValue' id='$optionId'";
                if (($row3['junk']) === $optionValue) {
                    echo " checked";
                }
                echo ">";
                echo "<span>$optionLabel</span>";
                echo "</div>";
            }
            ?>
                    
                </div>
                </div>
                
                <div class="col-lg-4 mt-3">
                <label class="form-label">Cooking Medium:</label>
                <select class="form-select" name="cookingmed" id="cookingmedium">
                    <option value="Refined Oil" <?php if ($row3['cookm'] == 'Refined Oil') {
                                      echo 'selected';
                                    } ?>>Refined Oil </option>
                    <option value="Gingerly Oil"<?php if ($row3['cookm'] == 'Gingerly Oil') {
                                      echo 'selected';
                                    } ?>>Gingerly Oil  </option>
                    <option value="Sunflower Oil"<?php if ($row3['cookm'] == 'Sunflower Oil') {
                                      echo 'selected';
                                    } ?>>Sunflower Oil  </option>
                    <option value="Others"<?php if ($row3['cookm'] == 'Others') {
                                      echo 'selected';
                                    } ?>>Others</option>
                </select>
            </div>
            </div>


            <div class="row">
                            <div class="col-md-3 mt-2">
                                <label class="form-label ">Water Intake:</label>
                                <input  type="text" class="form-control" id="waterin"
                                    placeholder="lit/day" name="water"    value="<?php echo $row3['waterin'];?>">
                            </div>
                            <div class="col-md-3 mt-2">
                                <label class="form-label " >Salt Intake:</label>
                                <input  type="text" class="form-control" id="saltin"
                                    placeholder="gm/day" name="salt"    value="<?php echo $row3['saltin'];?>">
                            </div>
                </div>

                <div class="row">
                            <div class="col-md-3 mt-2">
                                <label class="form-label " >Recommendations:</label>
                                <textarea  type="text" class="form-control" id="rec"
                                    placeholder="Recommendation" name="recommend"><?php echo $row3['recomm'];?></textarea>
                                    <br>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label class="form-label ">Name of Dietitian:</label>
                                <input  type="text" class="form-control" id="nodieti"
                                    placeholder="Name of Dietitian" name="nodiet"    value="<?php echo $row3['nameofdiet'];?>">
                            </div>
                            <div class="col-md-3 mt-2">
                                <label class="form-label " >Date:</label>
                                <input  type="date" class="form-control" id="dates"
                                     name="date"    value="<?php echo $row3['date'];?>">
                            </div>
                            <div class="col-md-3 mt-2">
                                <label class="form-label ">Time:</label>
                                <input  type="time" class="form-control" id="times"
                                     name="time"    value="<?php echo $row3['time'];?>">
                            </div>
                </div>
            
        </div>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
            
        </form>
    </div>
</body>

</html>