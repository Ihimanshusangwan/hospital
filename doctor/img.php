<?php
session_start();
$id=$_GET['id'];
$pt_id=$id;
require("../admin/connect.php");
$query = "SELECT COUNT(*) AS count FROM pt_image WHERE pt_id = {$id}";
$result = mysqli_query($conn, $query);
$countData = mysqli_fetch_assoc($result);
$count = $countData['count'];

$isDisabled = $count >= 5 ? "disabled" : "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>Image Gallery</title>
  <style>
    .image-box {
      position: relative;
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      overflow: hidden;
      margin-bottom: 20px;
      height: 300px;
    }

    .zoom-image {
      transition: transform 0.3s;
      cursor: pointer;
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      z-index: 0;
    }

    .zoom-image:hover {
      transform: scale(1.2);
      z-index: 1;
    }

    .caption {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 5px;
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      font-size: 14px;
      text-align: center;
      z-index: 2;
    }

    #fullscreenModal .modal-dialog {
      max-width: 100%;
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #fullscreenModal .modal-content {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .delete-button {
      position: absolute;
      top: 5px;
      right: 5px;
      z-index: 2;
    }

    .print-button {
      position: absolute;
      top: 5px;
      left: 5px;
      z-index: 2;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
    }

    .col-fill {
      flex: 1 0 33.333%;
    }

    @media print {

      .no-print {
        display: none !important;
      }

      @page {
        size: A4 landscape;
      }

    }
  </style>
</head>

<body>
  <section class="no-print">
    <div class="container">
      
      <button type="button" class="btn btn-primary my-3 float-right" id="addImageButton" <?php echo $isDisabled; ?>>Add Image</button>
      <h1>Image Gallery</h1>
      <a href="doctorPage.php" class="btn btn-success m-2">Dashboard</a>
      <?php
      if (isset($_REQUEST['upload'])) {
        if ($_FILES['img']['name'] != "" && isset($_REQUEST['img_desc'])) {
          $sql = "INSERT INTO pt_image (pt_id,image,img_desc) VALUES ({$id},'','');";
          $conn->query($sql);
          $id = $conn->insert_id;
          $img = $_FILES['img'];
          $filename = $img['name'];
          $ext = explode(".", $filename);
          $extension = end($ext);
          $newfile = "pt_img/" . $id . "." . $extension;
          $tmpfile = $img['tmp_name'];
          move_uploaded_file($tmpfile, $newfile);
          $query2 = "UPDATE pt_image SET image = '$newfile', img_desc = '" . $_REQUEST['img_desc'] . "' WHERE id = $id ;";
          $conn->query($query2);
          echo "<span style='color:green;'>Image uploaded successfully</span>";
          var_dump($id);
          header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . urlencode($pt_id));
          exit();
          
        }
      }
      ?>
      <div class="row">
        <?php
        $query = "SELECT * FROM pt_image where pt_id= {$id};";
        $result = mysqli_query($conn, $query);
        $imageData = array();
        while ($row = mysqli_fetch_assoc($result)) {
          $imageData[] = $row;
        }
        foreach ($imageData as $data):
          $imageId = $data['id'];
          ?>
          <div class="col-md-4">
            <div class="image-box">
              <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                <img class="img-fluid zoom-image" src="<?php echo $data['image']; ?>"
                  alt="<?php echo $data['img_desc']; ?>">
              </div>
              <div class="caption">
                <?php echo $data['img_desc']; ?>
              </div>
              <button class="btn btn-danger delete-button" data-image-id="<?php echo $imageId; ?>">Delete</button>
              <button class="btn btn-warning print-button" value="<?php echo $data['image']; ?>"
                onclick="printing(this)">Print</button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="uploadModalLabel">Image Upload</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="pt_id" value="<?php echo $id; ?>">
      
            <div class="form-group">
                <label for="img_desc">Image Description:</label>
                <input type="text" class="form-control" id="img_desc" name="img_desc" required>
              </div>
              <div class="form-group">
                <label for="upload_image">Upload Image:</label>
                <input type="file" class="form-control-file" id="upload_image" name="img" accept="image/*" required>
              </div>
              <button type="submit" class="btn btn-primary" onclick="window.location.reload();" name="upload" value="upload">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="fullscreenModal" tabindex="-1" role="dialog" aria-labelledby="fullscreenModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img class="img-fluid" id="fullscreenImage" src="" alt="Fullscreen Image" onclick="redirectToEditor(this);">
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    
    function redirectToEditor(imageSrc) {
      var image = imageSrc.getAttribute('src');
      var url = '../Editor/index.php?img=' + image;
      window.location.assign(url);
    }
    $(document).ready(function () {
      $('.zoom-image').on('click', function () {
        var imageSrc = $(this).attr('src');
        $('#fullscreenImage').attr('src', imageSrc);
        $('#fullscreenModal').modal('show');
      });

      $('#addImageButton').on('click', function () {
         $('#uploadModal').modal('show');
      
      });
    });
  </script>
  <script>
    $(document).ready(function () {

      $('.delete-button').on('click', function () {
        var imageId = $(this).data('image-id');
        if (confirm("Are you sure you want to delete this image?")) {
          $.ajax({
            type: "POST",
            url: "dlt_pt_img.php",
            data: { imageId: imageId },
            success: function (response) {
              $('.alert').remove();
              var alertHtml = '<div class="alert alert-success alert-dismissible fade show position-fixed w-100" role="alert">' +
                response +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span></button></div>';
              $('body').prepend(alertHtml);
              $('[data-image-id="' + imageId + '"]').closest('.col-md-4').remove();
              window.location.reload();
              var remainingImages = $('.image-box');
              var numImages = remainingImages.length;
              var numColumns = Math.ceil(numImages / 3);
              var columnWidth = 100 / numColumns;
              remainingImages.closest('.row').find('.col-fill').css('flex-basis', columnWidth + '%');
            }
          });
        }
      });
    });
    
  </script>
<script>
  
function printing(button) {
  var imgUrl = button.value;
  var printWindow = window.open('', '_blank');
  printWindow.document.write('<html><head>');
  printWindow.document.write('<style>@media print { body { margin: 0; }');
  printWindow.document.write('img#print-image { max-width: 100%; max-height: 100vh; margin: auto; display: block; } }');
  printWindow.document.write('</style></head><body>');
  printWindow.document.write('<img src="' + imgUrl + '" alt="Image to Print" id="print-image">');
  printWindow.document.write('<script>var img = document.getElementById("print-image"); img.onload = function() { window.print(); };<\/script>');
  printWindow.document.write('</body></html>');
  printWindow.document.close();
}
</script>

</body>

</html>