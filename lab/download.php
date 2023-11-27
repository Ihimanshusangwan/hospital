<?php
if (isset($_GET['file'])) {
    $filePath = $_GET['file'];

    // Validate the file path to prevent directory traversal
    $filePath = realpath($filePath);
    $basePath = realpath('reports/'); // Change this to your file upload directory

    if (strpos($filePath, $basePath) === 0 && file_exists($filePath)) {
        // Set the appropriate headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filePath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo 'Invalid file path.';
    }
} else {
    echo 'File parameter is missing.';
}
?>
