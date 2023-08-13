<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  require("../admin/connect.php");
  $id = $_GET['id'];
  $content = "";
  $sql = "select dig from opto_examination where id=$id";
  $res = $conn->query($sql)->fetch_assoc();
  $dig = $res['dig'];

  $sql = "Select img_desc,img_add from opto_images where patient_id = $id";
  $result1 = $conn->query($sql);

  if ($result1 && $result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
      $imgDesc = $row['img_desc'];
      $imgAdd = $row['img_add'];
      if ($dig == $imgDesc) {

        $content .= "<option value=\"$imgDesc\" add=\"$imgAdd\" selected >$imgDesc</option>";
      } else {

        $content .= "<option value=\"$imgDesc\" add=\"$imgAdd\"  >$imgDesc</option>";
      }
    }
  } else {
    $content = "<option value=\"\">No options available</option>";
  }
  $response['success'] = true;
  $response['content'] = $content;


  // Sending the response back to JavaScript as JSON
  header('Content-Type: application/json');
  echo json_encode($response);
}
$conn->close();
?>