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
        <h3 class=" fl text-center text-dark">HIV TEST CONSENT</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href="hivonsent(eng).php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            <div class="row">
      <div class="col-md-12">
      <label class="form-label mt-2"> I (Name of patient ) :  <strong><?php echo $row['name']; ?></strong>  </label>
		 </div>
      <div class="col-md-12">
       
<p> hereby give myconsent to get my blood tested for HIV antibodies.I have been explained the relevance and significance of this test , through pre-Test Counselling .</p>

<p> I understand that , the result of my test will be kept confidential. Only on my authorization , my test result will be given to another person. I will be given a post -test couseling by my Doctor / traied counsellors.</p>

<p> I understand following information about HIV testing , as was explained to me: <p>
	
	<p> 1. HIV is the virus believed to cause AIDS. Antibodies are substances made by the body in response to infection . A positive test for HIV antibodies means a person is infected with HIV , butdose notnecessarily mean a person has AIDS .</p>

	<p>2.Despite the use of the most advanced technology , a small number of "False Positive" results produce antibodies after the virus enters the body , some infected individuals may not have a positive test for HIV antibodies ("False Negative" results) .</p>

	<p> 3. If my Hiv antibody test results are know , it may help my doctor decied how best to treat me for the illness associated with HIV infection. It may also help me to make personal decision, if I am at risk for HIV infection or for transmitting HIV to someone else. <p>
	
	<p> 4. If my blood test is positive and others know the test result, I might be discriminated against by friends,familly,employers,landlors,insurance companies, and others, Therefore, I should be exteremely careful diclosing my test results. In addition , a positive test result may be recorded in my medical record maitained at the hospital and the laboratory.<p>
	
	<p> 5. The hospital has strict laws and policies to keep the HIV testing result confidential from anyone other than you and people involved in treatment. <p>
	<p> 6. Hospital will make every attempt to ensure the confidential of my test result. However , the possibility or unauthorized disclosure always exists. This might result in some form of discrimination. Furthermore, if this test for HIV is positive of if additional tests indicate that I have AIDS, this information must,by statue,be reported to the State Health Authority ( NACO )   <p>
	<p> I also Understand that, <p>
	<p> 1. I can refuse to be tested and my refusal will not affect my future care at the hospital.<p>
	<p> 2. If my test is positive , I can expect a post-test counselling about implication of the test result.<p>
	<p> 3. I have also been explained procedure of drawing blood and the minimal risk involved in this.
	
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

            
    <div class="text-center ">     <div style="overflow: auto;">
                            <table class="table table-bordered border-black table-hover text-center">
                            <tr>
                                <th></th>
    <th><span class="style6">Relative</span></th>
    <th><span class="style6">Witness</span></th>
    <th><span class="style6">Patient</span></th>
  </tr>
  <tr>
    <td><span class="style6">Sign:</span></td>
    <td> <input  type="text" class="form-control" id="" placeholder=" Sign" name="sahi1" value="<?php echo $row6['sahi1'];?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="Sign" name="sahi2" value="<?php echo $row6['sahi2'] ;?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="Sign" name="sahi3" value="<?php echo $row6['sahi3']; ?>"></td>
  </tr>
  <tr>
    <td><span class="style6">Name : </span></td>
    <td><span class="style6"> <input  type="text" class="form-control" id="" placeholder="Name" name="name1" value="<?php echo $row6['name1'];?>"></span></td>
    <td> <input  type="text" class="form-control" id="" placeholder="Name" name="name2" value="<?php echo $row6['name2'];?>"></td>
    <td><span class="style6">Date : <input  type="date" class="form-control" id="" placeholder="" name="date" value="<?php echo $row6['date'];?>"> </span></td>
  </tr>
  <tr>
    <td><span class="style6">Address :  </span></td>
    <td><span class="style6">  <input  type="text" class="form-control" id="" placeholder="Address" name="add1" value="<?php echo $row6['add1'];?>">  </span></td>
    <td> <input  type="text" class="form-control" id="" placeholder="Address" name="add2" value="<?php echo $row6['add2'];?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="Address" name="add3" value="<?php echo $row6['add3'];?>"></td>
  </tr>
  <tr>
    <td class="style6">Age    Year : </td>
    <td>  <input  type="text" class="form-control" id="" placeholder="Age" name="vay1" value="<?php echo $row6['vay1'];?>"></td>
    <td> <input  type="text" class="form-control" id="" placeholder="Age" name="vay2" value="<?php echo $row6['vay2'];?>"> </td>
    <td><span class="style6">Time :  <input  type="time" class="form-control" id="" placeholder="" name="time" value="<?php echo $row6['time'];?>"> </span></td>
  </tr>
                            </table>
                    </div>
                    <hr>

                    
                    
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>