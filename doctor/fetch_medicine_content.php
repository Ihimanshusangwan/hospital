<?php
include("../admin/connect.php");

$inputValue = $_GET['input'];
$columnName = 'med_name';
$tableName = 'prescription';
$query = "SELECT DISTINCT med_name,quantity,morning,afternoon,night,days,eat,type FROM $tableName WHERE $columnName LIKE '%$inputValue%' ;";
$result = $conn->query($query);
$results = array();

if ($result) {
    // Fetch the results into an array
    while ($row = $result->fetch_assoc()) {
      
        $results[] = array(
            'columnToShow' => $row[$columnName] ,
            'otherColumn' => $row
        );
        

    }
}

// Return the results as a JSON response
header('Content-Type: application/json');
echo json_encode($results);
?>
