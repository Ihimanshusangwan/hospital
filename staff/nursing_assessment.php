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
 }

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handover patient valuable item</title>
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

<body class="m-2">
    <div class="container">
    <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <h3 class=" fl text-center text-dark">Nursing Assessment </h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href=".php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <div class="row">
                
        <div class="col-md-3">
          <label class="form-label">Name: <?php echo $row['name'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Age: <?php echo $row['age'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Sex: <?php echo $row['sex'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">UHID No: <?php echo $row2['uhid'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Bed Number: <?php echo $row2['bed/room'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Consultant: <?php echo $row['consultant'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Diagnosis: <?php echo $row1['diagnosis'];?></label>
        </div></div>
        
            <form action="" method="post">
            <div class="row">
                <div class="col-6">Date <input type="date" name="" id="" class="form-control"></div>
                <div class="col-6">Mode of arrival <input type="text" name="" id="" class="form-control"></div>
                <div class="col-6 mt-3">Patient accompained on admission  <input type="radio" name="" id="" > Yes <input type="radio" name="" id="" >No if yes</div>
                <div class="col-3">Name <input type="text" name="" id="" class="form-control"></div>
                <div class="col-3">Relation <input type="text" name="" id="" class="form-control"></div>
                <div class="col-4">Contact Person <input type="text" name="" id="" class="form-control"></div>
                <div class="col-4">Relation <input type="text" name="" id="" class="form-control"></div>
                <div class="col-4">Phone No <input type="text" name="" id="" class="form-control"></div>
                <div class="col-6 mt-3">Primary language spoken interpreter needed <input type="radio" name="" id="" > Yes <input type="radio" name="" id="" >No </div>
                <div class="col-6">Educational status <select name=""class="form-control" id="">
                    <option value="">Primary</option>
                    <option value="">Higher Secondary</option>
                    <option value="">Graduate</option>
                    <option value="">Post Graduate</option>
                </select></div>
                <div class="col-3">Socio economic status <select name=""class="form-control" id="">
                    <option value="">Poor</option>
                    <option value="">Average</option>
                    <option value="">Good</option>
                </select></div>
                <div class="col-3">Chief Complaints <textarea name="" class="form-control"id=""></textarea></div>
                <div class="col-2">Temperature<input name="" class="form-control"id=""></div>
                <div class="col-2">Pulse <input name="" class="form-control"id=""></div>
                <div class="col-2">BP <input name="" class="form-control"id=""></div>
                <div class="col-2">Respiration <input name="" class="form-control"id=""></div>
                <div class="col-2">Height <input name="" class="form-control"id=""></div>
                <div class="col-2">Weight <input name="" class="form-control"id=""></div>
                <div class="col-6">Valuable / Belongings <input name="" class="form-control"id=""></div>
                <div class="col-6 mt-3">
                <div class="row">
                    <div class="col-2">Dentures </div>
                    <div class="col-3"><input type="radio" name="" id="" > Yes <input type="radio" name="" id="" >No</div>
                    <div class="col-7">
                    <select name=""class="form-control" id="">
                    <option value="">Upper</option>
                    <option value="">Lower</option>
                    <option value="">Partial</option>
                </select>
                    </div>
                </div></div>

                <div class="col-6 mt-3">
                <div class="row">
                    <div class="col-3">Hearing aid </div>
                    <div class="col-3"><input type="radio" name="" id="" > Yes <input type="radio" name="" id="" >No</div>
                    <div class="col-6">
                    <select name=""class="form-control" id="">
                    <option value="">Right</option>
                    <option value="">Left</option>
                </select>
                    </div>
                </div></div>

                <div class="col-4 mt-3">Eyeglasses <input type="radio" name="" id="" > Yes <input type="radio" name="" id="" >No</div>
                <div class="col-4 mt-3">Contact lens <input type="radio" name="" id="" > Yes <input type="radio" name="" id="" >No </div>
                <div class="col-4 mt-3">Prosthesis<input type="radio" name="" id="" > Yes <input type="radio" name="" id="" >No </div>
                <div class="col-12 mt-4">
                    <div class="row">
                        <div class="col-4">Orientation to patient environment</div>
                        <div class="col-2"><input type="checkbox" name="" id="">Room</div>
                        <div class="col-2"><input type="checkbox" name="" id="">Light control</div>
                        <div class="col-2"><input type="checkbox" name="" id="">Television</div>
                        <div class="col-2"><input type="checkbox" name="" id="">Bathroom</div>
                        <div class="col-2"><input type="checkbox" name="" id="">Side rails</div>
                        <div class="col-1"><input type="checkbox" name="" id="">Visitor</div>
                        <div class="col-1"><input type="checkbox" name="" id="">Policy</div>
                        <div class="col-2"><input type="checkbox" name="" id="">Bed control</div>
                        <div class="col-2"><input type="checkbox" name="" id="">Emergency exit</div>
                        <div class="col-2"><input type="checkbox" name="" id="">Nurse call</div>
                        <div class="col-2"><input type="checkbox" name="" id="">Religious needs</div>
                    </div>
                </div>

                <div class="col-6 mt-3">
                    <div class="row">
                        <div class="col-12">Allergies /Adverse Reaction</div>
                        <div class="col-12">Known or suspected allergies to</div>
                        <div class="col-12">1. Medication /drugs <input type="radio" name="" id="" > Yes <input type="radio" name="" id="" >No</div>
                        <div class="col-12">2. Blood tranfusion <input type="radio" name="" id="" > Yes <input type="radio" name="" id="" >No </div>
                        <div class="col-12">3. Food <input type="radio" name="" id="" > Yes <input type="radio" name="" id="" >No </div>
    </div>
                </div>

                <div class="col-12">
                    <table class="table table-bordered border-black">
                        <tr>
                            <th>Risk Factor</th>
                            <th>0</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>Score</th>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>0-19 years</td>
                            <td>20-59 years</td>
                            <td>60-70 years</td>
                            <td>>70 years</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Fall History</td>
                            <td>No fall in last year</td>
                            <td>Single fall in last 6 month</td>
                            <td>Single fall in last 3 month</td>
                            <td>Single fall in last month or multiple fall in last year</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Mental State</td>
                            <td>Orientated to time ,place & person</td>
                            <td>Orientated to place & person</td>
                            <td>Orientated to person only</td>
                            <td>Disoriented & or impaired judgment or impulsive or depression</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Vision</td>
                            <td>Normal</td>
                            <td>Wear glasses</td>
                            <td>Maculopathu, blurred vision, cataract or glaucoma</td>
                            <td>Severe visual disturbance or blindness</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Incontinence</td>
                            <td>Non (Normal)</td>
                            <td>Increased frequency</td>
                            <td>Nocturia or stress incontinence</td>
                            <td>Urge incontinence</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Speech & communication</td>
                            <td>Normal</td>
                            <td>Speech deficit but understood</td>
                            <td>Dysphasia / language /communication barrier</td>
                            <td>Severe deficit, severe language /communication barrier</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total Score</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                    </table>
                    <div class="col-12">Score-key : 0-No fall risk , 1-6 : Mild fall risk , 7-12 : Moderate fall risk , 13-18 : High fall risk</div>
                </div>

                <div class="col-12 mt-4">
                    <table class="table table-bordered border-black">
                        <tr>
                            <th>Risk Factor</th>
                            <th>0</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>Score</th>
                        </tr>
                        <tr>
                            <td>Sensory Perception</td>
                            <td>Completely Limited</td>
                            <td>Very Limited</td>
                            <td>Slightly Limited</td>
                            <td>>No impaiment</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Moisture</td>
                            <td>Constantly Moist</td>
                            <td>Very Moist</td>
                            <td>Occasionally</td>
                            <td>Rarely Moist</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Activity</td>
                            <td>Bedfast</td>
                            <td>Chairfast</td>
                            <td>Walks Occasionally</td>
                            <td>Walks Frequently</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Mobility</td>
                            <td>Completely immobile</td>
                            <td>Very Limited</td>
                            <td>Slightly Limited</td>
                            <td>No Limitation</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Nutrition</td>
                            <td>Very Poor</td>
                            <td>Probably Inadequate</td>
                            <td>Adequate</td>
                            <td>Excellent</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Friction & shear</td>
                            <td>Problem</td>
                            <td>Potential Problem</td>
                            <td>No Apparent Problem</td>
                            <td></td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total Score</td>
                            <td><input type="text" name="" id="" class="form-control"></td>
                        </tr>
                    </table>
                    <div class="col-12">Score-key : 15-18 : Mild risk , 13-14 : Moderate risk , 10-12 : High risk , < 9 : Very High Risk</div>
                </div>

                <div class="col-12 mt-4">Ability to perform activities of daily living</div>

                <div style="overflow: auto;">
                            <table class="table table-bordered border-black table-hover text-center">
                            <?php
   
                    echo '<tr><th>Activity</th>';
                    echo '<th>Independent</th>';
                    echo '<th>Assist</th>';
                    echo '<th>Dependent</th>';
                    echo '</tr>';
                    echo '<tr><th>Bathing </th>';
                    
                    for ($i = 0; $i < 3; $i++) {
                        echo '<th><input type="text" class="form-control" ></th>';
                    }
                    
                    echo '</tr>';
                    echo '<tr><th>Dressing</th>';
                    
                    for ($i = 0; $i < 3; $i++) { 
                        echo '<th><input type="text" class="form-control" ></th>';
                    }
                    
                    echo '</tr>';

                    echo '<tr><th>Eating</th>';
                    
                    for ($i = 0; $i < 3; $i++) { 
                        echo '<th><input type="text" class="form-control" ></th>';
                    }
                    
                    echo '</tr>';

                    echo '<tr><th>Mobility / Walking</th>';
                    
                    for ($i = 0; $i < 3; $i++) { 
                        echo '<th><input type="text" class="form-control" ></th>';
                    }
                    
                    echo '</tr>';

                    echo '<tr><th>Stair Climbing</th>';
                    
                    for ($i = 0; $i < 3; $i++) { 
                        echo '<th><input type="text" class="form-control" ></th>';
                    }
                    
                    echo '</tr>';

                    echo '<tr><th>Toilet Use</th>';
                    
                    for ($i = 0; $i < 3; $i++) { 
                        echo '<th><input type="text" class="form-control" ></th>';
                    }
                    
                    echo '</tr>'; 
                ?> </table>
</div>

                    <div class="col-6">Form Completed By <input type="text" name="" id="" class="form-control"></div>
                    <div class="col-6">Date & Time <input type="datetime" name="" id="" class="form-control"></div>
                

            </div>
            <br>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>