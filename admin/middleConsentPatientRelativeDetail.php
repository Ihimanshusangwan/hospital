// <?php 
//  require("../admin/connect.php");
//  $id = $_GET['id'];
//  session_start();
// //  error_reporting(0);

//  $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
//  $row=mysqli_fetch_assoc($sql);

//  $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
//  $row1=mysqli_fetch_assoc($sql1);

//  $sql2=mysqli_query($conn,"SELECT * FROM p_insure WHERE id = '$id';");
//  $row2=mysqli_fetch_assoc($sql2);
 

//  $sql = "SELECT * FROM titles WHERE id = 1;";
//  $data = $conn->query($sql);
//  $title = $data->fetch_assoc();
//  $sql12="SELECT * FROM `config_print` WHERE 1";
// $data12=$conn->query($sql12);
// $res12=$data12->fetch_assoc();
// if (!isset($res12['inp'])) {
//     $inp_arr = array_fill(0, 3, 'option2');
// } else {
//     $inp = $res12['inp'];
//     $inp_arr = json_decode($inp, true);
//     $inp_arr = is_array($inp_arr) ? $inp_arr : array_fill(0, 3, '');
// }


//

function printSignature( $conn, $id)
{
  $sql2 = "SELECT uhid FROM ortho_p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res2 = $data2->fetch_assoc();
  $sql = "SELECT name,name_pwp FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res = $data->fetch_assoc();

 
    $sql = "select path from patient_images where uhid = '{$res2['uhid']}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $path = $result->fetch_assoc();
      $img = "../../reception/" . $path['path'];
      echo "<img src='$img' style='height:3rem; width:4rem;' >";
    } else {
      echo "No sign Uploaded";
    }
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
<table width="997" border="1" cellspacing="8" cellpadding="10" >
      <colgroup>
      <col span="2" style="border-color: #000000">
      </colgroup>
      
      <tr>
        <th class="style22" scope="row"><p align="left"> <font size="+1"></p> रुग्णाची सही / अंगठ्याचा ठसा  :<?php printSignature($conn,$id); ?><P>      </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"> रुग्णाचे  नाव :<?php echo $row['name']; ?></p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">पत्ता <?php echo $row['address']; ?></p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">दूरध्वनी क्रमांक <?php echo $row['mobile']; ?>दिनांक <?php echo $row['reg_date']; ?></p>        </th>
       
  <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"> स्थळ : <?php echo $row['address'] ." ".$row['taluka']." ".$row['district']; ?></p>        </th>
		
       
  </tr>
</table>
</p>       <p>
		</p>  <p>


<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<h2></h2>
	
<table width="997" border="1" cellspacing="8" cellpadding="10" >
      <colgroup>
      <col span="2" style="border-color: #000000">
      </colgroup>
      <p> <font size="+1">रुग्ण अल्पवयीन किंवा मानसिकरित्या असक्षम असल्यास, रुग्णाच्या पालकांची सही / अंगठ्याचा ठसा  <p>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"></p>  पालकाचे नाव : <?php echo $row['name_pwp']; ?> </p>      </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1"> रुग्णाशी नाते :   <?php echo $row['relation']; ?> </p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">पत्ता:  <?php echo $row['address_pwp']; ?></p>        </th>
        
      </tr>
      <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">दूरध्वनी क्रमांक: <?php echo $row['mobile_pwp']; ?> दिनांक: <?php echo $row['reg_date']; ?> </p>        </th>
       
  <tr>
        <th class="style22" scope="row"><p align="left"> <font size="+1">स्थळ  : <?php echo $row['address_pwp'] ." ".$row['taluka_pwp']." ".$row['district_pwp']; ?></p>        </th>
       
  <tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">साक्षीदार क्रमांक १ <p align="center"><font size="+1"> साक्षीदार २ </p> <p align="left"><font size="+1"> सही : --------------------<p align="center"><font size="+1"> सही : -------------------- <p align="left"><font size="+1">नाव : --------------------<p> <p align="center"><font size="+1"> नाव : --------------------<p align="left"> <font size="+1">पता : --------------------<p align="center"><font size="+1">पता : --------------------  <p align="left"><font size="+1">दूरध्वनी क्रमांक : -----------------------<p align="center"><font size="+1">दूरध्वनी क्रमांक: -----------------------      </th>
  <tr>
		       
	
  </tr>
</table>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>








