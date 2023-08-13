<?php
session_start();
if (!isset($_SESSION['doctor_id'])) {
  header("location:login.php");
}
require("../admin/connect.php");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <?php
  if(isset($_POST['delete_btn'])){
    $sql = "delete from template where id = {$_POST['delete_id']};";
    if ($conn->query($sql) === TRUE) {
      echo "<div class='alert alert-success'> Template Deleted Successfully</div>";
    } else {
      echo "<div class='alert alert-danger'>Error 
      deleting TEmplate : " . $conn->error . "</div>";
    }
  }
  if (isset($_POST['save'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $complaints = isset($_POST['complaints']) ? $_POST['complaints'] : '';
    $examination = isset($_POST['examination']) ? $_POST['examination'] : '';
    $diagnosis = isset($_POST['diagnosis']) ? $_POST['diagnosis'] : '';
    $pres = [];
    $i = 1;
    while (isset($_POST["med_name_$i"])) {

      if ($_POST["med_name_$i"] !== "") {
        // Extract form data
        $med_name = filter_var($_POST["med_name_$i"], FILTER_SANITIZE_STRING);
        $quantity = $_POST["quantity_$i"];
        $morning = $_POST["morning_$i"];
        $afternoon = $_POST["afternoon_$i"];
        $night = $_POST["night_$i"];
        $type = $_POST["type_$i"];
        $eat = isset($_POST["eat_$i"]) ? $_POST["eat_$i"] : "";
        $days = $_POST["days_$i"];

        $pres["$i"] = ["med_name" => "$med_name", "quantity" => "$quantity", "morning" => "$morning", "afternoon" => "$afternoon", "night" => "$night", "days" => "$days", "eat" => "$eat", "type" => "$type"];
        $i++;

      } else {
        $i++;
      }
    }
    $med = serialize($pres);
    $sql = "INSERT INTO template (doctor_id, name, description, complaints, examination, diagnosis, prescription)
    VALUES ({$_SESSION['doctor_id']}, '$name', '$description', '$complaints', '$examination', '$diagnosis', '$med')";

    if ($conn->query($sql) === TRUE) {
      echo "<div class='alert alert-success'> Template Added Successfully</div>";
    } else {
      echo "<div class='alert alert-danger'>Error Adding TEmplate : " . $conn->error . "</div>";
    }
  }
  ?>
  <a href="doctorPage.php" class="btn btn-primary m-4" > Dashboard</a>
  <!-- Section for Available Templates -->
  <section class="container mt-5">

    <h2>Available Templates</h2>

    <div class="row">
      <?php
      $sql = "SELECT id, name, description FROM template WHERE doctor_id = '{$_SESSION['doctor_id']}'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $template_id = $row['id'];
          $template_name = htmlspecialchars($row['name']);
          $template_description = htmlspecialchars($row['description']);
          ?>

          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $template_name; ?>
                </h5>
                <p class="card-text">
                  <?php echo $template_description; ?>
                </p> <form action="" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $template_id; ?>">
                <button type="submit" class="btn btn-danger" name="delete_btn" value="del">Delete</button>
                </form>
              </div>
            </div>
          </div>

          <?php
        }
      } else {
        echo "<p>No templates found.</p>";
      }
      ?>
    </div>
    </div>
    </div>
  </section>
  <!-- Leave the body empty for now -->
  <div class="container-fluid">
    <div class="card mb-4">
      <div class="card-body">
        <h2 class="card-title text-primary">Add New Template</h2>
        <form method="post" action="">
          <!-- Name -->
          <div class="form-group">
            <label for="name">Template Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Template's name" name="name">
          </div>

          <!-- Description -->
          <div class="form-group">
            <label for="description">Template Description:</label>
            <textarea class="form-control" id="description" rows="3" placeholder="Enter Template description"
              name="description"></textarea>
          </div>

          <!-- Complaints -->
          <div class="form-group">
            <label for="complaints">Complaints:</label>
            <textarea class="form-control" id="complaints" rows="3" placeholder="Enter complaints"
              name="complaints"></textarea>
          </div>

          <!-- Examination -->
          <div class="form-group">
            <label for="examination">Examination:</label>
            <textarea class="form-control" id="examination" rows="3" placeholder="Enter examination details"
              name="examination"></textarea>
          </div>

          <!-- Diagnosis -->
          <div class="form-group">
            <label for="diagnosis">Diagnosis:</label>
            <textarea class="form-control" id="diagnosis" rows="3" placeholder="Enter diagnosis"
              name="diagnosis"></textarea>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add medicines</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <tr>
                    <th class="col-1">Types</th>
                    <th class="col-3">Medicine</th>
                    <th class="col-1">सकाळ</th>
                    <th class="col-1">दुपार</th>
                    <th class="col-1">रात्र</th>
                    <th class="col-1">कधी घ्यायच्या </th>
                    <th class="col-1">किती दिवस </th>
                    <th class="col-1">Qty</th>
                    <th class="col-1">Delete</th>
                  </tr>
                  <tbody id="tbody">


                  </tbody>
                </table>
              </div>
              <span class="btn btn-info" onclick="addItem1();">Add Medicine</span>

            </div>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary" name="save" value="save">Save Template</button>
        </form>
      </div>
    </div>
  </div>
  <script src="prescription.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

</body>

</html>