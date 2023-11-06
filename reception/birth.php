<?php
require("../admin/connect.php");
error_reporting(0);
$id = $_GET['id'];
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $data = array();
for ($i=1;$i<=6;$i++){
    $data[$i] = $_POST[$i];
}
$dataToStore = json_encode($data);
$sql= "select * from birth where id = $id;";
$result = $conn->query($sql);
if($result->num_rows >0){
    //update
    $sql = "update birth set data = '$dataToStore' where id = $id";
    $conn->query($sql);
    echo '<div class="alert alert-success" role="alert">
    <strong>Success!</strong> Your data has been updated successfully.
  </div>
  ';
}else{
    //insert
    $sql = "insert into birth(id,data) values($id,'$dataToStore')";
    $conn->query($sql);
    echo '<div class="alert alert-success" role="alert">
    <strong>Success!</strong> Your data has been submitted successfully.
  </div>
  ';
}
} 
    $sql = "select * from birth where id=$id";
    $res = $conn->query($sql)->fetch_assoc();
    $data = json_decode($res['data'],true);
    // print_r($data);


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

</style>
</head>
<body>

<a href="details.php?id=<?php echo $id ;?>" class="btn btn-primary m-2">Dashboard</a>
<a href="birth_print.php?id=<?php echo $id ;?>" class="btn btn-primary m-2">Print</a>
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-12">
      <table width="806" height="81" border="1">
        <tr>
          <td width="796">
            <p align="center" class="style26 style28"><strong>Birth Certificate</strong></p>
            <form action="" method='Post'>
              <div class="form-group">
                <label for="name"> Mother's Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name='1' value = "<?php echo $data['1'] ?>">
              </div>
              <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" class="form-control" id="age" placeholder="Enter Age" name='2' value = "<?php echo $data['2'] ?>">
              </div>
              <div class="form-group">
                <label for="address">Residence:</label>
                <input type="text" class="form-control" id="address" placeholder="Enter Residence" name='3' value = "<?php echo $data['3'] ?>">
              </div>
              <div class="form-group">
                <label for="deliveryDate">Date and Time of Delivery:</label>
                <input type="datetime-local" class="form-control" id="deliveryDate" name='4' value = "<?php echo $data['4'] ?>">
              </div>
              <div class="form-group">
                <label for="childGender">Child's Gender:</label>
                <input type="text" class="form-control" id="childGender" placeholder="Enter Child's Gender" name='5' value = "<?php echo $data['5'] ?>">
              </div>
              <div class="form-group">
                <label for="childWeight">Child's Weight:</label>
                <input type="text" class="form-control" id="childWeight" placeholder="Enter Child's Weight" name='6' value = "<?php echo $data['6'] ?>">
              </div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            <p align="right" class="style25"><?php echo $title['do'] ?> </p>
            <p align="right" class="style25">Stamp & Signature</p>
            <p align="center" class="style25">&nbsp;</p>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
</body>
</html>
