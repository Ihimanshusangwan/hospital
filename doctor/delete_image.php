<?php
session_start();
// Prevent access to the delete script without login
if (!isset($_SESSION['doctor_id']) && !isset($_SESSION['doctor_type'])) {
    header("location:login.php");
}
require("../admin/connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageId = $_POST['imageId'];
    $imagePath = getImagePath($imageId); 
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    deleteImageFromDatabase($imageId); 
    echo "Image deleted successfully";
}
function getImagePath($imageId)
{
    global $conn;
    $query = "SELECT img_add FROM dr_images WHERE id = $imageId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['img_add'];
}
function deleteImageFromDatabase($imageId)
{
    global $conn;
    $query = "DELETE FROM dr_images WHERE id = $imageId";
    $conn->query($query);
}
?>