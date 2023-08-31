<?php
require("../admin/connect.php");

if (isset($_POST['date'])) {
    $selectedDate = $_POST['date'];
$sql = "SELECT * FROM patient_records WHERE is_followup = 1 AND follow_date = '$selectedDate' ORDER BY id ASC";
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['consultant'] . '</td>';
                            echo ' <form method="POST"><td> <input type="hidden" name="id" value="' . $res['id'] . '">
                            <input type="hidden" name="name" value="' . $res['name'] . '">
                            <input type="date"  name="date" value="' . $res['follow_date'] . '" readonly> </td>';
                            echo '<td> <button type="submit" name="approve" class="btn btn-primary"' ; 
                            echo'>Approve</button></td>';
                            echo '<td> <button  name="hold" class="btn btn-success">Hold</button></td>';
                            echo '<td> <button  type="submit" name="reject" class="btn btn-danger">Reject</button></td></form>';
                            echo '</tr>';
                           
                            
                            echo '</tr>';
                        }
                    }
                        ?>