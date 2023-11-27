<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


function generateRadioInputsForSignatures($arrayName, $name)
{
  echo '<div class="col-4">';

  echo '<input type="radio" name="' . $name . '" value="patient_sign" ' . ($arrayName[$name] == "patient_sign" ? "checked" : "") . '> Patient Sign';

  echo '<input type="radio" name="' . $name . '" value="relative_sign" ' . ($arrayName[$name] == "relative_sign" ? "checked" : "") . '> Relative Sign <br>';

  echo '<input type="radio" name="' . $name . '" value="patient_name" ' . ($arrayName[$name] == "patient_name" || $arrayName[$name] == "" ? "checked" : "") . '> Patient Name';

  echo '<input type="radio" name="' . $name . '" value="relative_name" ' . ($arrayName[$name] == "relative_name" ? "checked" : "") . '> Relative Name';

  echo '</div>';
}
function generateRadioInputsForNames($arrayName, $name)
{
  echo '<div class="col-4">';

  echo '<input type="radio" name="' . $name . '" value="patient_name" ' . ($arrayName[$name] == "patient_name" || $arrayName[$name] == "" ? "checked" : "") . '> Patient Name';

  echo '<input type="radio" name="' . $name . '" value="relative_name" ' . ($arrayName[$name] == "relative_name" ? "checked" : "") . '> Relative Name';

  echo '</div>';
}
function printSignatures($arrayName, $name, $conn, $id)
{
  $sql2 = "SELECT uhid FROM ortho_p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res2 = $data2->fetch_assoc();
  $sql = "SELECT name,name_pwp FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res = $data->fetch_assoc();

  if ($arrayName[$name] == "patient_sign") {
    $sql = "select path from patient_images where uhid = '{$res2['uhid']}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $path = $result->fetch_assoc();
      $img = "../reception/" . $path['path'];
      echo "<img src='$img' style='height:3rem; width:4rem;' >";
    } else {
      echo "No sign Uploaded";
    }
  } else if ($arrayName[$name] == "relative_sign") {
    $sql = "select path from relative_images where id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $path = $result->fetch_assoc();
      $img = $path['path'];
      echo "<img src='$img'  >";

    } else {
      echo "No Relative sign Uploaded";
    }

  } else if ($arrayName[$name] == "patient_name") {
    echo $res['name'];
  } else {
    echo $res['name_pwp'];
  }
}
function printNames($arrayName, $name, $conn, $id)
{
  $sql = "SELECT name,name_pwp FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res = $data->fetch_assoc();

  if ($arrayName[$name] == "patient_name") {
    echo $res['name'];
  } else {
    echo $res['name_pwp'];
  }

}


?>