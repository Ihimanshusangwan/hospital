<?php
require("../admin/connect.php");
error_reporting(0);
$id = $_GET['id'];
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
    $sql = "select * from birth where id=$id";
    $res = $conn->query($sql)->fetch_assoc();
    $data = json_decode($res['data'],true);
    // print_r($data);
    
    $dateTimeValue = $data['4'];
    
    // Convert the date-time string to a DateTime object
    $dateTime = new DateTime($dateTimeValue);
    
    // Format and display the date and time separately
    $date = $dateTime->format('Y-m-d'); // Date format
    $time = $dateTime->format('H:i');   // Time format
    ?>
    
    


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Birth Certificate</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<style type="text/css">
<!--
.style10 {font-size: 11px}
.style25 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-style: italic;
}
.style26 {
	color: #FF0000;
	font-weight: bold;
	font-size: 24px;
	font-family: "Monotype Corsiva";
}
.style27 {
	font-family: "Monotype Corsiva";
	color: #FFFFFF;
}
.style28 {font-size: 36px}
.style29 {
	font-size: 18px;
	font-family: "Monotype Corsiva";
}
.style30 {font-family: "Monotype Corsiva"}
-->
    </style>
</head>
<body>
</p>
<p align="center">
  <style>
table, th, td {
  border:1px solid black;
}

@media print {
        .noprint {
            visibility: hidden;
        }

        body {
            margin: 0;
        }

        .page-break {
            page-break-before: always;
        }
    }
  </style>
  <body>

  <body>
  <div id="button">
            <button type="button" class="btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
            <a href="birth.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
        </div>
<table width="806" height="81" border="1">
  <tr>
    <td width="796"><p align="center" class="style26 style28"><strong>Birth Certificate </strong></p>
      <p align="Left" class="style25"> <span class="style27">------</span> <span class="style29">This is certify that,</span> </p>
	  </p> <p>
      <p align="Left" class="style25"><span class="style30">Mrs</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data ['1']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style30">Age</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data ['2']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style30">R/o</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data ['3']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style30">Who was</span></p>
	  </p> <p>
	     <p align="Left" class="style25"></p>
		 </p> <p>
    <p align="Left" class="style25"> <span class="style30">Admitted in my Hospital ,Delivered on</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style30">at</span>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $time; ?></p>
	</p> <p>
    <p align="Left" class="style25"></p>
    <p align="Left" class="style25"><span class="style30">She delivered</span>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data ['5']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style30">Child, Weight</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data ['6']; ?></p>
    <p align="Left" class="style25"></p>
	
	<p align="right" class="=style25 style30">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $title['do'] ?> </p>
	
	<p align="right" class="=style25 style30"> Stamp & Signature   </p>
    
	<p align="center" class="style25">&nbsp;</p></td>
	
  </tr>
</table>
<script>window.print();</script>
</body>

</html>
