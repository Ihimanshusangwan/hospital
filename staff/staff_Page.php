<?php
session_start();
if (isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
}
//prevent access of staff page without login
if (!isset($_SESSION['staff_id'])) {
    header("location:login.php");
}
require("../admin/connect.php");
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Staff</title>
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
    <header>
        <nav class="navbar navbar-light bg-primary">
            <a class="navbar-brand" href="#">
                <h3 style="color: aliceblue; padding-left: 5%;">
                    <?php echo $title['sm'] ?>
                </h3>
            </a>
            <form class="form-inline my-2 my-lg-0" action="" method="POST">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#largeModal1">
                    Eye Registers
                </button>
                   
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#largeModal">
                     Ortho Registers
                </button>

                <a href="floor_cleaning.php?month=<?php echo date('Y-m'); ?>" class="btn btn-secondary">Floor
                        Cleaning</a>
                <a class="navbar-brand">
                    <button type="submit" name="logout" class="btn btn-danger mx-2 px-2 py-1">
                        Logout
                    </button>
                </a>
            </form>
            </div>
        </nav>
        <div>
        </div>
    </header>
    <div>
        <hr style="height:15px;border-width:0;color:rgb(148, 28, 28);background-color:rgb(148, 30, 30)">
    </div>
    <!-- resester modal -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Registers</h5>
                </div>
                <div class="modal-body">
                <a class=" btn btn-primary mb-2"
                        href="register/pre_anasthesia_checkup_record.php?month=<?php echo date('Y-m'); ?>">Pre
                        Anasthesia Checkup Record</a>
                    <a href="register/vac_employee.php?month=<?php echo date("Y-m"); ?>"><button class="btn btn-primary mb-2">Vaccination To Employee Register</button></a>
                    <a href="register/venti_pneumonia.php?month=<?php echo date("Y-m"); ?>"><button class="btn btn-primary mb-2">Ventilator Associated Pneumonia</button></a>
                    <a href="register/medical_error_record.php?month=<?php echo date("Y-m"); ?>"><button class="btn btn-primary mb-2">Medical Error Record</button></a>
                    <a href="register/repeat_surgery_record.php?month=<?php echo date("Y-m"); ?>"><button class="btn btn-primary mb-2">Repeat Surgery Record</button></a>
                    <a href="register/postpone_surgery_record.php?month=<?php echo date("Y-m"); ?>"><button class="btn btn-primary mb-2">Postpone Surgery Record</button></a>
                    <a href="register/needle_injury_record.php?month=<?php echo date("Y-m"); ?>"><button class="btn btn-primary mb-2">Needle Prick Injury Record</button></a>
                    <a href="register/wrong_side_record.php?month=<?php echo date("Y-m"); ?>"><button class="btn btn-primary mb-2">Wrong Side Surgery Record</button></a>
                    <a href="register/refr_temp_register.php?month=<?php echo date("Y-m"); ?>"><button class="btn btn-primary mb-2">Refrigerator Temp. Register</button></a>
                    <a class=" btn btn-primary mb-2" href="register/ambulance_register.php?month=<?php echo date('Y-m'); ?>">
                        Ambulance Register</a>

                    <a class="btn btn-primary mb-2"
                        href="register/appointment_register.php?month=<?php echo date('Y-m'); ?>">
                        Appointment Register</a>

                    <a class="btn btn-primary mb-2"
                        href="register/discharge_file_register.php?month=<?php echo date('Y-m'); ?>">
                        Discharge & File Submission Register:</a>

                    <a class="btn btn-primary mb-2"
                        href="register/discharge_routine_register.php?month=<?php echo date('Y-m'); ?>">
                        Discharge (Routine/DAMA/LAMA/Refer/Death) Register</a>
                    </a>
                    <a class="btn btn-primary mb-2"
                        href="register/doctor_round_register.php?month=<?php echo date('Y-m'); ?>">
                        Doctor Round Register</a>

                    <a class="btn btn-primary mb-2"
                        href="register/drug_reaction_record.php?month=<?php echo date('Y-m'); ?>">
                        Durg Reaction Record</a>

                    <a class="btn btn-primary mb-2" href="register/incident_register.php?month=<?php echo date('Y-m'); ?>">
                        Incident Register</a>

                    <a class="btn btn-primary mb-2"
                        href="register/indoor_case_register.php?month=<?php echo date('Y-m'); ?>">
                        Indoor Case Register</a>

                    <a class="btn btn-primary mb-2" href="register/opd_register.php?month=<?php echo date('Y-m'); ?>"> 
                    OPD Register</a>

                    <a class="btn btn-primary mb-2" href="register/patient_register_ot.php?month=<?php echo date('Y-m'); ?>">
                        Patient Register (OT)</a>

                    <a class="btn btn-primary mb-2"
                        href="register/post_operative_surgical.php?month=<?php echo date('Y-m'); ?>">
                        POST OPERATIVE SURGICAL</a>

                    <a class="btn btn-primary mb-2"
                        href="register/surgical_site_injection_register.php?month=<?php echo date('Y-m'); ?>">
                        Surgical Site Injection (SSI) Register</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="largeModal1" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Eye Registers</h5>
                </div>
                <div class="modal-body">
                        <a href="investigation.php?month=<?php echo date('Y-m');; ?>"><button class="btn btn-primary mb-2">A'Scan Register</button></a>
                        <a href="laser.php?month=<?php echo date('Y-m'); ?>"><button class="btn btn-primary mb-2">Laser Register</button></a>
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Start -->
    <section>
        <div class="container-fluid">
            <h1 class="bg-light text-black p-2">PATIENT LIST</h1>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table">
                    <thead class="table-primary">
                        <tr>
                            <th>OPD NO.</th>
                            <th>REG DATE</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>CONSULTANT</th>
                            <th>Type</th>
                            <th>Eye Forms</th>
                            <th>Ortho Forms</th>
                        </tr>
                        <tr>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Search Patient ID">
                            </th>
                            <th><input type="date" class="form-control form-control-sm"
                                    placeholder="Search Registration Date"></th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Search Name"></th>
                            <th></th>
                            <th></th>
                            <th><select class="form-control form-control-sm" placeholder="Search consultant"
                                    id="consultant-filter">
                                    <option value="">All</option>
                                    <?php
                                    $sql = "SELECT name FROM doctors;";
                                    $res = $conn->query($sql);
                                    while ($values = $res->fetch_assoc()) {
                                        echo '
                  <option value="' . $values['name'] . '">
                    ' . $values['name'] . '
                  </option>
                  ';
                                    }
                                    ?>
                                </select></th>
                            <th><select class="form-control form-control-sm" placeholder="Search Type" id="type-filter">
                                    <option value="">All</option>
                                    <?php
                                    $sql = "SELECT * FROM type;";
                                    $res = $conn->query($sql);
                                    while ($values = $res->fetch_assoc()) {
                                        echo '
                  <option value="' . $values['type'] . '">
                    ' . $values['type'] . '
                  </option>
                  ';
                                    }
                                    ?>
                                </select></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM patient_records WHERE is_admited = 1 and is_registered= 1  or is_approved= 1 and is_deleted = 0 ORDER BY id DESC;";
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['opd_no'] . '</td>';
                            echo '<td>' . $res['reg_date'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['consultant'] . '</td>';
                            echo '<td>' . $res['type_of_visit'] . '</td>';
                            if ($res['is_eye'] == '1' && $res['is_ortho'] == 0) {
                                echo <<<btn
                          
                                <td><button class="btn btn-primary multi-reference" id="staff_Page" p-id="{$res['id']}" cookieName="eye-referer" destination="eye_forms">Eye Forms</button></td>
                                <td><button class="btn btn-primary multi-reference " style="display: none;"" id="staff_Page" p-id="{$res['id']}" cookieName="ortho-referer" destination="ortho_forms" disabled >Ortho Forms</button>
                                <button class="btn btn-warning activate-form" p_id="{$res['id']}" p_col="is_ortho">Activate Ortho Forms</button></td>
    btn;
                            } else if ($res['is_ortho'] == '1' && $res['is_eye'] == 0) {
                                echo <<<btn
                          
                                <td><button class="btn btn-primary multi-reference " style="display: none;"" id="staff_Page" p-id="{$res['id']}" cookieName="eye-referer" destination="eye_forms" disabled>Eye Forms</button>
                                <button class="btn btn-warning activate-form"  p_id="{$res['id']}" p_col="is_eye">Activate Eye Forms</button></td>
                                <td><button class="btn btn-primary multi-reference" id="staff_Page" p-id="{$res['id']}" cookieName="ortho-referer" destination="ortho_forms" >Ortho Forms</button></td>
    btn;
                            } else if ($res['is_ortho'] == '1' && $res['is_eye'] == 1) {
                                echo <<<btn
                          
                                <td><button class="btn btn-primary multi-reference" id="staff_Page" p-id="{$res['id']}" cookieName="eye-referer" destination="eye_forms">Eye Forms</button></td>
                                <td><button class="btn btn-primary multi-reference" id="staff_Page" p-id="{$res['id']}" cookieName="ortho-referer" destination="ortho_forms"  >Ortho Forms</button>
                                </td>
    btn;

                            } else {
                                echo <<<btn
                                 <td><button class="btn btn-primary multi-reference " style="display: none;"" id="staff_Page" p-id="{$res['id']}" cookieName="eye-referer" destination="eye_forms" disabled>Eye Forms</button> <button class="btn btn-warning activate-form" p_id="{$res['id']}" p_col="is_eye">Activate Eye Forms</button></td>
                                 <td><button class="btn btn-primary multi-reference " style="display: none;"" id="staff_Page" p-id="{$res['id']}" cookieName="ortho-referer" destination="ortho_forms" disabled >Ortho Forms</button> <button class="btn btn-warning activate-form" p_id="{$res['id']}" p_col="is_ortho">Activate Ortho Forms</button></td>
                                
                                
btn;
                            }
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- HTML code for the Bootstrap modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to Activate this form ? This Action can't be undone !!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmButton">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.activate-form').forEach(function (button) {
            button.addEventListener('click', function () {
                var pId = this.getAttribute('p_id');
                var pCol = this.getAttribute('p_col');
                var url = 'activate_forms.php';
                var data = { "pId": pId, "pCol": pCol };

                // Show the Bootstrap modal
                $('#confirmationModal').modal('show');

                // Add event listener to the Confirm button
                document.getElementById('confirmButton').addEventListener('click', function () {
                    fetch(url, {
                        method: 'POST',
                        body: JSON.stringify(data)
                    })
                        .then(function (response) {
                            if (response.ok) {
                                return response.json();
                            } else {
                                throw new Error('Error: ' + response.status);
                            }
                        })
                        .then(function (data) {
                            if (data.success) {
                                // On successful response, hide the current button
                                button.style.display = 'none';

                                // Show the previous sibling button
                                var previousButton = button.previousElementSibling;
                                previousButton.style.display = 'inline-block';
                                previousButton.disabled = false;
                            } else {
                                console.log('Error: Operation failed.');
                            }
                        })
                        .catch(function (error) {
                            console.error('Error:', error);
                        })
                        .finally(function () {
                            // Hide the Bootstrap modal
                            $('#confirmationModal').modal('hide');
                        });
                });
            });
        });

        const setCookie = (name, value, days) => {
            const expirationDate = new Date();
            expirationDate.setDate(expirationDate.getDate() + days);
            document.cookie = `${name}=${value}; expires=${expirationDate.toUTCString()}; path=/`;
        };
        document.querySelectorAll(".multi-reference").forEach((element) => {
            element.addEventListener("click", (event) => {
                var id = element.getAttribute("id");
                var p_id = element.getAttribute("p-id");
                var cookieName = element.getAttribute("cookieName");
                setCookie(cookieName, id, 7);
                var destination = element.getAttribute("destination");
                window.location.href = destination + ".php?id=" + p_id;
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            var table = $('#table').DataTable({
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var header = $(column.header());
                        header.off('click.DT');
                        header.removeClass('sorting_asc sorting_desc sorting');
                        header.addClass('no-sort');

                        $('input', header).on('keyup change clear', function () {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                        $('#consultant-filter').on('change', function () {
                            var selectedValue = $(this).val();

                            table.columns(5).search(selectedValue).draw();
                        });
                        $('#type-filter').on('change', function () {
                            var selectedValue = $(this).val();

                            table.columns(6).search(selectedValue).draw();
                        });
                    });
                },
                order: [[0, 'desc']]
            });
        });
    </script>
</body>

</html>