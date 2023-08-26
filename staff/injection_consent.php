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
    $guardian=$_POST['guardian'];
    $translator=$_POST['translator'];

    $update="UPDATE injection_consent SET 
    guardian_name='$guardian',
    translator='$translator'
    WHERE id=$id;";
    $sql3=mysqli_query($conn,$update);
 }

   $sql4=mysqli_query($conn,"SELECT *  FROM injection_consent WHERE id =$id");
   $row4=mysqli_fetch_assoc($sql4);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IM /IV SC Injection Consent </title>
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
   
</head>

<body class="m-2">
    <div class="container">
    <h1 class="text-center text-danger mt-3">
                <?php echo $title['so'] ?>
            </h1>
            <h3 class=" fl text-center text-dark">IM /IV SC Injection Consent </h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>
    
    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
        <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <a href=".php?id=<?php echo $id; ?>" class=" btn btn-success"
            id="dashboard">Print</a>
            
            <form action="" method="post">
             <div class="row">
                <div class="col-12 text-center"><strong>CONSENT FOR INTRAMUSCULAR (IM) INTRA VENOUS (IV) AND SUBCUTANEOUS
                     (SUB Q) INJECTION</strong></div>
                <div class="col-12 mt-3">
IM IV and SUBQ Injection are treatments that deliver medications directly into a muscle or vein or into the tissue
 under the skin respectively treatments are typically well tolerated without any adverse reactions. Sometimes a 
 series of injection are recommended for satisfactory outcome.</div>
<br>
            <div class="col-12 mt-4">
            Potential side effects include but are not limited to. 
            
            <ul>
                <li>Local skin irritation and bruising.</li>
                <li>Swelling and/ or pain at the injection sites.</li>
                <li>Infection is very rare but possible. All standard precautions. (gloves, alcohol cleaning) are
taken to prevent infection.</li>
                <li>Nerve damage. From improper injections is also very rare but possible.</li>
                <li> Allergic reaction potential for anaphylaxis is low however there have been cases where patients have reacted to the medication administered</li>
                <li> By signing this document, i am agreeing to treatment with m, iv and/ or sub q injection. I have been informed of the risks and benefits involved with this treatment and understand
the potential effects.</li>
                <li>I have informed the administrators of any allergies, medication that am taking and all past negative experiences with foods, medications and previous injections.
<br>(वरील मजकुर मला माझ्या भाषेत रूपांतरित करून समजावुन सांगण्यात आला आहे व मला तो समजला आहे. )</li>
            </ul>
            </div>
             </div>

             <div class="row">
                <div class="col-4">Patient name
                    <input type="text" value="<?php echo $row['name']; ?>" class="form-control" id="" readonly>
                </div>
                <div class="col-4">Parents guardian name
                <input type="text" name="guardian"  value="<?php echo $row4['guardian_name']; ?>" class="form-control" id="">
                </div>
                <div class="col-4" > Translators name
                <input type="text" name="translator"  value="<?php echo $row4['translator']; ?>" class="form-control" id="">
                </div>
             </div><br>
        <button type="submit" class="btn btn-primary ml-auto" name="submit" value="submit" id="submit"  >Submit</button>
                            
        </form>
    </div>
</body>

</html>