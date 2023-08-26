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
            <h3 class=" fl text-center text-dark">Immediate Pre-Operative Re-Evaluation Form  </h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href=".php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            
            <form action="" method="post">
                
            <div class="row mt-3">
                    <div class="col-6 border border-black">
                        <div class="row">
                        <div class="col-6">Name :<input type="text" class="form-control" name="" id=""></div>
                        <div class="col-6">UHID :<input type="text" class="form-control" name="" id=""></div>
                        <div class="col-4">T :<input type="text" class="form-control" name="" id=""></div>
                        <div class="col-4">BP :<input type="text" class="form-control" name="" id=""></div>
                        <div class="col-4">P :<input type="text" class="form-control" name="" id=""></div>
                        <div class="col-3">R :<input type="text" class="form-control" name="" id=""></div>
                        <div class="col-3">O2 Sat :<input type="text" class="form-control" name="" id=""></div>
                        <div class="col-3">FBS :<input type="text" class="form-control" name="" id=""></div>
                        <div class="col-3">@ :<input type="text" class="form-control" name="" id=""></div>
                        <table class="mt-3 mb-3 table table-bordered border-black">
                            <tr>
                                <th>WBC</th>
                                <th>Hct</th>
                                <th>Pits</th>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="" id=""></td>
                                <td><input type="text" class="form-control" name="" id=""></td>
                                <td><input type="text" class="form-control" name="" id=""></td>
                            </tr>
                        </table>
                        <table class=" mb-3 table table-bordered border-black">
                            <tr>
                                <th>Na</th>
                                <th>Cl</th>
                                <th>Glucose</th>
                                <th>BUN</th>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="" id=""></td>
                                <td><input type="text" class="form-control" name="" id=""></td>
                                <td><input type="text" class="form-control" name="" id=""></td>
                                <td><input type="text" class="form-control" name="" id=""></td>
                            </tr>
                        </table>
                        <table class=" mb-3 table table-bordered border-black">
                            <tr>
                                <th>K</th>
                                <th>CO2</th>
                                <th>Cr</th>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="" id=""></td>
                                <td><input type="text" class="form-control" name="" id=""></td>
                                <td><input type="text" class="form-control" name="" id=""></td>
                            
                                </tr>
                        </table>
                        <table class=" mb-3 table table-bordered border-black">
                            <tr>
                                <th>INR</th>
                                <th>PT</th>
                                <th>PTT</th>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control" name="" id=""></td>
                                <td><input type="text" class="form-control" name="" id=""></td>
                                <td><input type="text" class="form-control" name="" id=""></td>
                                </tr>
                        </table>

                        </div>
                    </div>
                    <div class="col-6 border border-black">
                        <div class="row ">
                            <div class="col-2">UPT/SPT:</div>
                            <div class="col-3">Neg <input type="checkbox" name="" id=""></div>
                            <div class="col-3">Pos <input type="checkbox"  name="" id=""></div>
                            <div class="col-4">Date <input type="date" class="form-control"name="" id=""></div>
                            <div class="col-6">LFT's :<input type="text" class="form-control" name="" id=""></div>
                            <div class="col-6">Ca :<input type="text" class="form-control" name="" id=""></div>
                            <div class="col-6">CXR :<textarea type="text" class="form-control" name="" id=""></textarea></div>
                            <div class="col-6">Date :<input type="date" class="form-control" name="" id=""></div>
                            <div class="col-6">ECG :<textarea type="text" class="form-control" name="" id=""></textarea></div>
                            <div class="col-6">Date :<input type="date" class="form-control" name="" id=""></div>
                            <div class="col-6">Echo :<textarea type="text" class="form-control" name="" id=""></textarea></div>
                            <div class="col-6">Date :<input type="date" class="form-control" name="" id=""></div>
                            <div class="col-6">Stress Test :<textarea type="text" class="form-control" name="" id=""></textarea></div>
                            <div class="col-6">Date :<input type="date" class="form-control" name="" id=""></div>
                            <div class="col-6"></div>
                            <div class="col-6">Signature Nurse :<input type="text" class="form-control" name="" id=""></div>
               
                        </div>
                    </div>
                   </div>
                    <div class="row border border-black ">
                        <div class="col-12 p-2 text-center"><strong>Physician Only</strong></div>
                        <div class="col-6 border border-black">
                            <div class="row">
                                <div class="col-12">
                                    <ol>
                                        <li class="mt-2">NBM , status reaffirmed <input type="radio" name="" id=""> Yes <input type="radio" name="" id=""> No</li>
                                        <li class="mt-1">Advised pre-op medications taken <input type="radio" name="" id=""> Yes <input type="radio" name="" id=""> No</li>
                                        <li class="mt-1">Consent taken<input type="radio" name="" id=""> Yes <input type="radio" name="" id=""> No</li>
                                        <li class="mt-1">The risks , benefits , and alternatives of GA , Reg. and Loc/Sed have been discussed <input type="checkbox" name="" id=""></li>
                                        <li class="mt-1">The  plan is : <input type="checkbox" name="" id=""> GA <input type="checkbox" name="" id="">Regional
                                        <input type="checkbox" name="" id=""> IV Sedation <input type="checkbox" name="" id="">Spinal Or <input type="text" class="form-control mt-1 mb-2" name="" id=""></li>
                                        <li class="mt-1"><input type="checkbox" name="" id=""> H&P Reviewed , Patient assessed; fit for planned anesthesia.</li>
                                    </ol>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-6 border border-black">
                            <div class="row">
                                <div class="col-12">Intubation Assessment</div>
                                <div class="col-3">I <input type="text"class="form-control" name="" id=""></div>
                                <div class="col-3">II <input type="text"class="form-control" name="" id=""></div>
                                <div class="col-3">III <input type="text"class="form-control" name="" id=""></div>
                                <div class="col-3">IV <input type="text"class="form-control" name="" id=""></div>
                                <div class="col-3 mt-2"><input type="checkbox" name="" id=""> Dentures</div>
                                <div class="col-3 mt-2"><input type="checkbox" name="" id=""> Caps</div>
                                <div class="col-3 mt-2"><input type="checkbox" name="" id=""> Overbite</div>
                                <div class="col-3 mt-2"><input type="checkbox" name="" id=""> Loose Teeth</div>
                                <div class="col-12">ROM : <input type="checkbox" name="" id=""> Full <input type="checkbox" name="" id="" >  Limited <input type="checkbox" name="" id=""> None</div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">Lungs : clear to ausculation OR </div>
                                        <div class="col-6"><input type="text" class="form-control"name="" id=""></div>
                                    </div></div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="col-8">Heart : regular rhythm with no murmurs OR</div>
                                        <div class="col-4"><input type="text" name="" id="" class="form-control"></div>
                                    </div> </div>
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-2">ASA :</div>
                                        <div class="col-4">
                                            <select  class="form-control"name="" id="">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                            <option value="">6</option>
                                            <option value="">E</option>

                                        </select></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

             <br>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>