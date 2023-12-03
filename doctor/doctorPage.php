<?php
session_start();
if (isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
}
if (!isset($_SESSION['doctor_id']) && !isset($_SESSION['doctor_type'])) {
    header("location:login.php");
}
require("../admin/connect.php");
$doc_id = $_SESSION['doctor_id'];
if (isset($_POST['review'])) {
    $inp_id = $_POST['inp_id'];
    $sql = "UPDATE `patient_records` SET `review`='1' where `id`='$inp_id'";
    $data = $conn->query($sql);
    if (!$data) {
        echo '<div class="alert alert-danger " role="alert"> Something went wrong!</div>';
    }
}


$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../chat.css">
    <link rel="stylesheet" href="../messages.css">
    <script src="../chat.js"></script>
    <title>Doctor</title>
    <style>
        .dl-horizontal dt {
            white-space: normal;
        }

        div.dt-buttons {
            float: left;
            margin-bottom: 5px;
        }

        div.dom_wrapper {
            position: fixed;
            top: 0;
            right: 0;
        }

        table {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <?php require("../chat.php"); ?>
    
   <?php include_once("../messages.php"); ?>
    <header>
        <nav class="navbar navbar-light bg-primary">
            <a class="navbar-brand" href="#">
                <h3 style="color: aliceblue; padding-left: 5%;">
                    <?php echo $title['dm'] ;?>
                </h3>
            </a>
            <a class="navbar-brand" href="#">
                <h3 style="color: aliceblue; padding-left: 5%;">
                    <?php echo $_SESSION['doctor_name'] ;?>
                </h3>
            </a>
            
            <form class="form-inline" action="" method="POST">
            <span class="btn btn-primary mx-1" id="showAlert" onclick="showMsgOnBtn()">Messages
                    </span>
                <a class="btn btn-primary mx-1" href="image_gallery.php">Image Gallery</a>
                <a class="btn btn-primary mx-1" href="tobe_review.php?id=<?php echo $doc_id; ?>">Review Table</a>
                <a class="btn btn-primary mx-1" href="template.php">Manage Templates</a>
                
                <a href="add_investigation.php" class="btn btn-primary mx-1">Add Investigation Lab</a>
                <a href="add_invest_imaging.php" class="btn btn-primary mx-1">Add Investigation Imaging</a>
                <a href="add_symptoms.php" class="btn btn-primary mx-1">Add Symptoms</a>
                
                <a href="add_instructions.php" class="btn btn-primary mx-1">Add Instructions</a>
                <a href="add_chief_complaints.php" class="btn btn-primary mx-1">Add Cheif Complaints</a>
                <a href="add_examinations.php" class="btn btn-primary mx-1">Add Examinations</a>
                <a class="navbar-brand">
                    <button type="submit" name="logout" class="btn btn-danger mx-2 px-2 py-1">Logout</button>
                </a>
            </form>


        </nav>
        <div>
            <hr style="height:15px;border-width:0;color:rgb(148, 28, 28);background-color:rgb(148, 30, 30)">
        </div>
    </header>
    <section>
        <div class="container-fluid">
            <h1 class="bg-light text-black p-2">PATIENT LIST</h1>
            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table table-bordered table-striped" id="table">
                    <thead class="table-primary">
                        <tr>
                            <th>OPD NO.</th>
                            <th>REG DATE</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>TYPE</th>
                            <th>REFER STATUS</th>
                            <th>VISIT NO.</th>
                            <th>REVIEW PATIENT</th>
                            <th>VIEW</th>
                            <?php echo ($_SESSION['doctor_type'] != 'Ortho')?" <th>OT NOTES</th>":"";?>  
                            <?php echo ($_SESSION['doctor_type'] != 'Ortho')?" <th>More</th>":"";?>  
            
                        <th>Images</th>
                        </tr>
                        <tr>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Search Patient ID">
                            </th>
                            <th><input type="date" class="form-control form-control-sm"
                                    placeholder="Search Registration Date" id="regDateSearch"
                                    value="<?php echo (isset($_GET['date'])) ? $_GET['date'] : date("Y-m-d"); ?>"></th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Search Name"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><select id="typeFilter" class='form-control form-control-sm'>
                                    <option value="">All</option>
                                    <option value="Registration">Registration</option>
                                    <option value="Appointment">Appointment</option>
                                    <option value="Follow Up">Follow Up</option>
                                </select>

                            </th>
                            <th><select id="referFilter" class='form-control form-control-sm'>
                                    <option value="">All</option>
                                    <option value="Refered by">Refered</option>
                                    <option value="Not Refered">Not Refered</option>
                                </select>

                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <?php echo ($_SESSION['doctor_type'] != 'Ortho')?" <th></th>":"";?> 
                            <?php echo ($_SESSION['doctor_type'] != 'Ortho')?" <th></th>":"";?> 
                           <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $today = date("Y-m-d");
                        if (isset($_GET['date'])) {
                            $today = $_GET['date'];
                        }
                        $sql = "SELECT * FROM patient_records WHERE consultant = '{$_SESSION['doctor_name']}' AND (is_registered = 1 OR is_visited = 1) AND review=0 and reg_date ='$today' and is_deleted = 0;";
                        $data = $conn->query($sql);

                        while ($res = $data->fetch_assoc()) {
                            $type = '';
                            if ($res['follow_reg'] == 1) {
                                $type = 'Follow Up';
                            } else if ($res['is_registered'] == 1) {
                                $type = 'Registration';
                            } else {
                                $type = 'Appointment';
                            }
                           echo ($res['is_viewed'])?'<tr class="table-success" >':'<tr>';
                          
                            echo '<td>' . $res['opd_no'] . '</td>';
                            echo '<td>' . $res['reg_date'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            
                            echo '<td>' . $type . '</td>';
                            if ($res['is_refered'] == 1) {

                                echo '<td>Refered by ' . $res['refered_by'] . '</td>';
                            } else {

                                echo '<td>Not Refered</td>';
                            }
                            
                            echo '<td>' . $res['visit_count'] . '</td>';
                            echo '<form method="POST"><td><button class="btn btn-primary mx-auto d-flex"  name="review" >Review</button></td>
                                <input type="hidden" name="inp_id" value="' . $res['id'] . '"></form>';

                            echo '<td><a href="view.php?id=' . $res['id'] . '" class="btn btn-primary">View</a></td>';
                            if($_SESSION['doctor_type'] != 'Ortho'){
                                if ($res['is_admited'] == 1) {
                                    echo '<td><a href="OT.php?id=' . $res['id'] . '" class="btn btn-primary">OT Notes</a></td>';
    
                                } else {
                                    echo '<td><button class="btn btn-primary" disabled>OT Notes</button></td>';
                                }
                            }
                            if($_SESSION['doctor_type'] == 'Eye'){
                                
                                echo '<td><a href="opto.php?id=' . $res['id'] . '" class="btn btn-primary">Ophthalmologist</a></td>';
                                
                            }
                            
                            // if ($res['type_of_visit'] == 'Eye') {
                            // } else {
                            //     echo "<td></td>";
                            // }
                           
                                echo '<td><a href="img.php?id=' . $res['id'] . '" class="btn btn-primary">Images</a></td>';

                        

                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="chat.js"></script>



    <script>
        $(document).ready(function () {
            // var today = new Date();
            // var formattedDate = today.getFullYear() + '-' + (today.getMonth() + 1).toString().padStart(2, '0') + '-' + today.getDate().toString().padStart(2, '0');
            var table = $('#table').DataTable({
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var header = $(column.header());
                        header.off('click.DT');
                        header.removeClass('sorting_asc sorting_desc sorting');
                        header.addClass('no-sort');

                        // if (column.index() === 1) {
                        //     column.search(formattedDate).draw();
                        // }
                        $('input', header).on('keyup change clear', function () {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                        $('#typeFilter').on('change', function () {
                        var selectedValue = $(this).val();

                        table.columns(6).search(selectedValue).draw();
                    });
                        $('#referFilter').on('change', function () {
                            var selectedValue = $(this).val();

                            table.columns(7).search(selectedValue).draw();
                        });
                    });
                },
                order: [[0, 'desc']]
            });
        });
        <?php
        $sql10 = "SELECT auto_reload FROM `change_label` WHERE id =1";
        $data10 = $conn->query($sql10);
        $res10 = $data10->fetch_assoc();
        $idleTimer = (isset($res10['auto_reload'])) ? $res10['auto_reload'] . "000" : 20000;
        ?>
        let idleTimerCount = <?php echo $idleTimer; ?>;
        let idleTimer;

        function reloadPage() {
            location.reload();
        }

        function startIdleTimer() {
            idleTimer = setTimeout(reloadPage, idleTimerCount);
        }

        function resetIdleTimer() {
            clearTimeout(idleTimer);
            startIdleTimer();
        }
        function resetTimerOnClick() {
            resetIdleTimer();
        }

        document.addEventListener('mousemove', resetTimerOnClick);

        document.addEventListener('DOMContentLoaded',()=>{
            startIdleTimer();
            document.getElementById("regDateSearch").addEventListener("change", () => {
                let date = document.getElementById("regDateSearch").value;
                window.location.href = "doctorPage.php?date=" + date;

            })
        } );

    </script>
    <script src="checkbox.js"></script>


</body>

</html>