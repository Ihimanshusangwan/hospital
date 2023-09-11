
<?php
error_reporting(0);
$id = $_GET['id'];
require("../admin/connect.php");
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
  
  $sql6=mysqli_query($conn,"SELECT * FROM hiv_consent WHERE id =$id");
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

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        @media print {
            .noprint {
                visibility: hidden;
            }
        }

.style1 {font-size: 12px}
.style3 {
	font-size: 24px;
	font-weight: bold;
}
.style4 {font-size: 14px}

    </style>
</head>
<body>
<div id="button">
            <a href='hiv_consent_eng.php?id=<?php echo $id;?>' class="btn btn-primary m-2 noprint">Dashboard</a>
            <a class="btn btn-primary m-2 noprint" onclick="window.print()">Print</a>
        </div>
<?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">HIV TEST CONSENT</h3>
        <?php include_once("../header/header.php") ?>

    </p>
 
    
    

     	<p> I (Name of patient ) <?php echo $res['name'];?> </p>

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
	<table class="table table-bordered border-black table-hover text-center">
                            <tr>
                                <th></th>
    <th><span class="style6">Relative</span></th>
    <th><span class="style6">Witness</span></th>
    <th><span class="style6">Patient</span></th>
  </tr>
  <tr>
    <td><span class="style6">Sign:</span></td>
    <td> <?php echo $row6['sahi1'];?></td>
    <td><?php echo $row6['sahi2'] ;?></td>
    <td><?php echo $row6['sahi3']; ?></td>
  </tr>
  <tr>
    <td><span class="style6">Name : </span></td>
    <td><?php echo $row6['name1'];?></span></td>
    <td><?php echo $row6['name2'];?></td>
    <td>Date: <?php echo $row6['date'];?> </span></td>
  </tr>
  <tr>
    <td><span class="style6">Address :  </span></td>
    <td><span class="style6"> <?php echo $row6['add1'];?>  </span></td>
    <td><?php echo $row6['add2'];?></td>
    <td><?php echo $row6['add3'];?></td>
  </tr>
  <tr>
    <td class="style6">Age :    Year : </td>
    <td><?php echo $row6['vay1'];?> </td>
    <td><?php echo $row6['vay2'];?> </td>
    <td><span class="style6">Time : <?php echo $row6['time'];?> </span></td>
  </tr>
       
</table>

<script>
    window.print();
</script>
</body>
</html>