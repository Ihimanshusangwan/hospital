<?php
require("../admin/connect.php");
$id = $_GET['id'];


$sql = "SELECT * FROM patient_records WHERE id = '$id';";
// select * from opd where p_id = id;
$result = $conn->query($sql);
$res = $result->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql7 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql7);
$res2 = $data2->fetch_assoc();

$sql12 = "SELECT * FROM `config_print` WHERE 1";
$data12 = $conn->query($sql12);
$res12 = $data12->fetch_assoc();
if (!isset($res12['inp'])) {
    $inp_arr = array_fill(0, 2, 'option2');
} else {
    $inp = $res12['inp'];
    $inp_arr = json_decode($inp, true);
    $inp_arr = is_array($inp_arr) ? $inp_arr : array_fill(0, 2, '');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Document</title>
    <style>
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
        }

        th,
        td,
        tr {
            border: 1px solid black;
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .pad {
            padding: 2px;
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
</head>

<body>
    <div class="container">
        <div id="button">
            <a href="lab_Page.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint" id="dashboard">Dashboard</a>
        </div>

        <?php if ($inp_arr[0] == 'option1') {
            include_once("../header/images.php");

        } else {
            echo '<div style="margin-top: 150px;"></div>';
        }
        ?>
        <div class="container text-center mt-4">
            <div class="row">
                <div class="col-4"><strong>Name:</strong>
                    <?php echo strtoupper($res['name']); ?>
                </div>
                <div class="col-4"><strong>UHID No:</strong>
                    <?php echo $res2['uhid']; ?>
                </div>
                <div class="col-4"><strong>Age:</strong>
                    <?php echo strtoupper($res['age']); ?>
                </div>
                <div class="col-4"><strong>Date:</strong>
                    <?php
                    $timestamp = strtotime($res['reg_date']);
                    $formattedDate = date("d M Y", $timestamp);
                    echo $formattedDate;
                    ?>
                </div>
                <div class="col-4  mt-2"><strong>Sex:</strong>
                    <?php echo $res['sex']; ?>
                </div><br>

                <div class="col-4 mt-2" style="width:20px;">
                    <script src="../barcode.js"></script>
                    <canvas id="barcode"></canvas>
                    <script>
                        const canvas = document.getElementById('barcode');
                        const opts = {
                            bcid: 'code39',
                            text: '<?php echo $id; ?>',
                            scale: 2,
                            height: 5,
                            includetext: false,
                        };
                        bwipjs.toCanvas(canvas, opts, function (err) {
                            if (err) {
                                console.error('Error generating barcode:', err);
                            } else {
                                console.log('Barcode generated successfully');
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom : 5px;  margin-top: 10px;"></div>
    </div>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
            $fileUploadPath = "reports/"; // Directory to store files
            $fileName = $_FILES["file"]["name"];
            $timestamp = time(); // Get current timestamp (you can use microtime() for more precision)
            $newFileName = $fileName . "_" . $timestamp;
            $filePath = $fileUploadPath . $newFileName;

            // // Check if a record with the given id already exists in the database
            // $checkSql = "SELECT * FROM reports WHERE id = '$id'";
            // $result = $conn->query($checkSql);
        
            // if ($result->num_rows > 0) {
            //     // Delete the existing file on the server
            //     $row = $result->fetch_assoc();
            //     $oldFilePath = $row["path"];
            //     unlink($oldFilePath);
        
            //     // Update the existing record
            //     $updateSql = "UPDATE reports SET path = '$filePath' WHERE id = '$id'";
            //     $conn->query($updateSql);
            //     echo '<div class="alert alert-success" role="alert">
            //     File updated successfully!
            //  </div>';
            // } else {
            // Insert a new record
            $insertSql = "INSERT INTO reports (patient_id, path) VALUES ('$id', '$filePath')";
            $conn->query($insertSql);
            echo '<div class="alert alert-success" role="alert">
                File updated successfully!
             </div>';
            // }
        
            // Move the uploaded file to the designated directory with the new filename
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)) {
                // Continue with the database update/insert
            } else {
                echo '<div class="alert alert-danger" role="alert">
                File upload failed.
             </div>';
            }
        }


        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Choose File:</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary my-3">Upload File</button>
        </form>

    </div>
    <div class="container mt-5">
        <h2>Uploaded Files</h2>

        <?php

        // Fetch uploaded files for the user from the database
        $sql = "SELECT * FROM reports WHERE patient_id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<ul class="list-group">';
            while ($row = $result->fetch_assoc()) {
                $fileName = basename($row["path"]);
                $filePath = $row["path"];

                echo '<li class="list-group-item">
                    <a href="#" class="file-link" data-file="' . $filePath . '">' . $fileName . '</a>
                 </li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No files uploaded for this user.</p>';
        }
        ?>

    </div>
    <script>
        // Add click event listener to all elements with the 'file-link' class
        document.querySelectorAll('.file-link').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent default link behavior

                // Get the data-file attribute value (file path)
                var filePath = link.getAttribute('data-file');

                // Use JavaScript to initiate file download
                var anchor = document.createElement('a');
                anchor.href = 'download.php?file=' + filePath;
                anchor.download = filePath.split('/').pop(); // Extract filename from path
                document.body.appendChild(anchor);
                anchor.click();
                document.body.removeChild(anchor);
            });
        });
    </script>


</body>

</html>