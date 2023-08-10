<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <title>Document</title>
</head>

<body>
  <div class="container mb-4">
    <h1 class="text-center text-danger mt-3">SHRI SIDDHIVINAYAK NETRALAYA</h1>
    <a href="adminLogin.php" class="btn btn-success m-2">Dashboard</a>
    <h5 class="text-center mt-3">Staff Registration Form</h5>
    <div class="row p-4 pt-4">
      <div class="col shadow-lg rounded m-2 p-4">
        <div class="text-info text-center ml-2">Staff Details:</div>
        <?php
    require("connect.php");
  // Check if form is submitted
  if (isset($_POST['submit'])) {

    //initializing error variables
   $mailErr = $passErr ="";
   
      $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
      $address = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
      $taluka = filter_var($_POST['taluka'],FILTER_SANITIZE_STRING);
      $district = filter_var($_POST['district'],FILTER_SANITIZE_STRING);
    
      $age = $_POST['age'];
      $sex = $_POST['sex'];
      $dob_date = $_POST['dob_date'];
      $reg_date = $_POST['reg_date'];
      $mobile = $_POST['mobile'];

    if (empty($_POST['mail'])) {
      $mailErr = "Email is required";
    } else {
      $mail = $_POST['mail'];
    }

    // Check if password is entered
    if (empty($_POST['pass'])) {
      $passErr = "Password is required";
    } else {
      $pass = $_POST['pass'];
    }

    // If no errors, insert data into database
    if (empty($mailErr) && empty($passErr)) {

      $sql = "INSERT INTO staff (name, address, taluka, district, age, sex,dob, reg_date, mobile, email, password)
    VALUES ('$name', '$address', '$taluka', '$district', '$age', '$sex', '$dob_date', '$reg_date', '$mobile', '$mail', '$pass')";

      if ($conn->query($sql) === TRUE) {
        echo "<span style='color:green;'>New registration successfull</span>";
        // redirect to the same page to prevent form resubmission
        // header("Location: " . $_SERVER["PHP_SELF"]);
        // exit();

      } else {
        echo "Error:";
      }
    }else{
      echo"<span style='color:red;'>please fill all required fields!</span>";
    }
  }
  ?>
        <form id="form" action="" method="POST" enctype="multipart/form-data">
          <div class="form-group m-2">
            <label for="name">Name of Staff:</label>
            <input name="name" id="name" value="" class="form-control" placeholder="Name" />
          </div>
          <div class="form-group m-2">
            <label for="name">Address:</label>
            <input name="address" id="address" value="" class="form-control" placeholder="Address" />
          </div>
          <div class="row">
            <div class="form-check col-3">
              <label for="name">Taluka:</label>
              <input name="taluka" id="taluka" value="" class="form-control" placeholder="Taluka" />
            </div>
            <div class="form-check col-3">
              <label for="name">District:</label>
              <input name="district" id="district" value="" class="form-control" placeholder="District" />
            </div>
          </div>
          <div class="row">
            <div class="form-check col-3">
              <label for="age">Age</label>
              <input class="form-control" placeholder="Age" id="age" name="age" value="" />
            </div>
            <div class="form-check col-3">
              <label for="sex">Sex:</label>
              <select class="form-control" name="sex" id="sex">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Female">Others</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-check col-3">
              <label for="reg_date">Date of Birth:</label>
              <input type="date" class="form-control" placeholder="dob_date" id="dob_date" name="dob_date"
                value="15-10-1995" />
            </div>
            <div class="form-check col-3">
              <label for="reg_date">Reg Date:</label>
              <input type="date" class="form-control" placeholder="reg_date" id="reg_date" name="reg_date"
                value="15-10-1995" />
            </div>
          </div>
          <div class="form-group m-2">
            <label for="mobile">Mobile Number:</label>
            <input type="number" class="form-control" placeholder="mobile" id="mobile" name="mobile" />
          </div>
          <div class="form-group m-2">
            <label for="mail">Username:</label>
            <input name="mail" type="email" id="mail" value="" class="form-control" placeholder="Enter Email" />
          </div>
          <div class="form-group m-2">
            <label for="pass">Password:</label>
            <input name="pass" type="password" id="pass" value="" class="form-control" placeholder="Password" />
          </div>
          <div class="form-group m-2">
            <button type="submit" name="submit" id="submit" class="btn btn-outline-danger mt-2">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
$conn->close();
?>