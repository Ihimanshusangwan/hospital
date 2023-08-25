<?php
    require("../admin/connect.php");
    
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_GET['pId']) && !empty($_GET['pId'])) {
            $pId = intval($_GET['pId']);
          
        $id = $_GET['id'];
            $sql = "DELETE FROM opto_pres WHERE id = $pId;";
            if ($conn->query($sql) === TRUE) {
                $response['success'] = true;
                $sql = "SELECT * FROM opto_pres WHERE patient_id = $id ORDER BY id ;";
                $data = $conn->query($sql);
                $tableHTML = '';
                $i = 1;
                while ($res = $data->fetch_assoc()) {
    
    
                    $tableHTML .= '<tr>';
                    $tableHTML .= '<td>' . $res['type'] . '</td>';
                    $tableHTML .= '<td>' . $res['med_name'] . '</td>';
                    $tableHTML .= '<td>' . $res['morning'] . '</td>';
                    $tableHTML .= '<td>' . $res['afternoon'] . '</td>';
                    $tableHTML .= '<td>' . $res['night'] . '</td>';
                    $tableHTML .= '<td>' . $res['eat'] . '</td>';
                    $tableHTML .= '<td>' . $res['days'] . '</td>';
                    $tableHTML .= '<td>' . $res['quantity'] . '</td>';
                    $tableHTML .= "<td><button type='button' value={$res['id']} class='btn btn-primary delete-btn'>Delete</button></td>";
                    $tableHTML .= '</tr>';
                    $i++;
                }
                $response['tableContent'] = $tableHTML;
            } else {
                $response['error'] = "Failed to delete prescription.";
            }
          
        } else {
            $response['error'] = "Prescription ID not provided.";
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if (isset($_POST['submit_changes'])) {

        $response = array();
        // Extract the 'id' from the $_POST array
        $id = $_POST['id'];

        $i = 1;
        while (isset($_POST["med_name_$i"])) {

            if ($_POST["med_name_$i"] !=="") {
                // Extract form data
                $med_name = filter_var($_POST["med_name_$i"], FILTER_SANITIZE_STRING);
                $quantity = $_POST["quantity_$i"];
                $morning = $_POST["morning_$i"];
                $afternoon = $_POST["afternoon_$i"];
                $night = $_POST["night_$i"];
                $type = $_POST["type_$i"];
                $eat = isset($_POST["eat_$i"]) ? $_POST["eat_$i"] : "";
                $days = $_POST["days_$i"];

                // Build the SQL query
                $sql = "INSERT INTO opto_pres (patient_id,med_name,quantity,morning,afternoon,night,days,eat,type) VALUES ($id,'$med_name','$quantity','$morning','$afternoon','$night','$days','$eat','$type');";

                // Execute the query
                if ($conn->query($sql) === TRUE) {
                    $i++;
                } else {
                    // Add an error message to the response array if there's an error with the query
                    $response['error'] = "Error Updating Prescription";
                    break;
                }
            } else {
                $i++;
            }
        }

        // If there are no errors, add a success message to the response array
        if (!isset($response['error'])) {
            $response['success'] = "Prescription Updated Successfully";
            $sql = "SELECT * FROM opto_pres WHERE patient_id = $id ORDER BY id ;";
            $data = $conn->query($sql);
            $tableHTML = '';
            $i = 1;
            while ($res = $data->fetch_assoc()) {


                $tableHTML .= '<tr>';
                $tableHTML .= '<td>' . $res['type'] . '</td>';
                $tableHTML .= '<td>' . $res['med_name'] . '</td>';
                $tableHTML .= '<td>' . $res['morning'] . '</td>';
                $tableHTML .= '<td>' . $res['afternoon'] . '</td>';
                $tableHTML .= '<td>' . $res['night'] . '</td>';
                $tableHTML .= '<td>' . $res['eat'] . '</td>';
                $tableHTML .= '<td>' . $res['days'] . '</td>';
                $tableHTML .= '<td>' . $res['quantity'] . '</td>';
                $tableHTML .= "<td><button type='button' value={$res['id']} class='btn btn-primary delete-btn'>Delete</button></td>";
                $tableHTML .= '</tr>';
                $i++;
            }
            $response['tableContent'] = $tableHTML;
        }
    } else {
        // If the form was not submitted correctly, add an error message to the response array
        $response['error'] = "Form not submitted correctly";
    }

    // Sending the response back to JavaScript as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
$conn->close();
?>