<?php

require("../admin/connect.php");
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['imageId'])) {
    function getImagePath($imageId)
    {
        global $conn;
        $query = "SELECT img_add FROM opto_images WHERE id = $imageId";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['img_add'];
    }

    function deleteImageFromDatabase($imageId)
    {
        global $conn;
        $query = "DELETE FROM opto_images WHERE id = $imageId";
        $conn->query($query);
    }

    $imageId = $_GET['imageId'];
    $imagePath = getImagePath($imageId);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    deleteImageFromDatabase($imageId);

    // Return a JSON response indicating the success
    echo json_encode(array('success' => true, 'message' => 'Image deleted successfully'));
    exit;
}


// Check if the request is sent via POST and handle image upload
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if ($_FILES['img']['name'] != "" && isset($_POST['img_desc'])) {
        $sql = "INSERT INTO opto_images (patient_id, img_add, img_desc) VALUES ({$_POST['pId']}, '', '');";
        $conn->query($sql);
        $id = $conn->insert_id;
        $img = $_FILES['img'];
        $filename = $img['name'];
        $ext = explode(".", $filename);
        $extension = end($ext);
        $newfile = "patientimages/" . $id . "." . $extension;
        $tmpfile = $img['tmp_name'];
        move_uploaded_file($tmpfile, $newfile);
        $query2 = "UPDATE opto_images SET img_add = '$newfile', img_desc = '" . $_POST['img_desc'] . "' WHERE id = $id ;";
        $conn->query($query2);

        $query = "SELECT * FROM opto_images WHERE patient_id = {$_POST['pId']};";
        $result = mysqli_query($conn, $query);
        $imageData = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $imageData[] = $row;
        }

        // Store the HTML in a variable
        $html = '';
        foreach ($imageData as $data) {
            $imageId = $data['id'];
            $html .= '<div class="col-md-4">
                        <div class="image-box">
                          <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                            <img class="img-fluid zoom-image" src="' . $data['img_add'] . '" alt="' . $data['img_desc'] . '" onclick="redirectToEditor(this)" >
                          </div>
                          <div class="caption">
                            ' . $data['img_desc'] . '
                          </div>
                          <button class="btn btn-danger delete-button" data-image-id="' . $imageId . '">Delete</button>
                        </div>
                      </div>';
        }

        // Return a JSON response indicating the success
        echo json_encode(array('success' => true, 'message' => 'Image uploaded successfully', 'html' => $html));
    } else {
        // Return a JSON response indicating the failure
        echo json_encode(array('error' => true, 'message' => 'Image description or file is missing.'));
    }
    exit;
}
?>