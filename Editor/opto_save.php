<?php
session_start();
$base64_string = $_POST['image'];
$output_file = $_POST['output'];

$result = base64_to_png($base64_string, $output_file);

if ($result === true) {
    echo "success";
} else {

}

function base64_to_png($base64_string, $output_file)
{
    $ifp = fopen($output_file, "wb");
    if (!$ifp) {
        return "Unable to open the output file.";
    }

    $data = explode(',', $base64_string);
    if (count($data) < 2) {
        return "Invalid base64 data.";
    }

    if (!fwrite($ifp, base64_decode($data[1]))) {
        return "Failed to write the file.";
    }

    fclose($ifp);
    return true;
}


?>