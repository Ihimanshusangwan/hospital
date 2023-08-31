<?php
session_start();
if (isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
}
//prevent access of doctor page without login
if (!isset($_SESSION['receptionist_id'])) {
    header("location:login.php");
}
require("../admin/connect.php");

if(isset($_POST['skip'])){
    $inp_id=$_POST['inp_id'];
  $sql="UPDATE `patient_records` SET `skip`='1' where `id`='$inp_id'";
  $data=$conn->query($sql);
  if(!$data){
    echo '<div class="alert alert-danger " role="alert"> Something went wrong!
  </div>';
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Reception</title>
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

        .inline-heading,
        .inline-select {
            display: inline-block;
            vertical-align: middle;
            margin-bottom: 0;
        }

        .select-wrapper select {
            width: 100%;
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ced4da;
        }

        .fullscreen-alert {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .alert-content {
            background-color: #fff;
            width: 70%;
            /* Fixed width */
            height: 70%;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            overflow-y: auto;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .table tbody tr.table-light {
            background-color: green !important;
        }

        .name-hover:hover {
            cursor: pointer;
        }
    </style>

    <script>






    </script>

</head>

<body>
    <div class="fullscreen-alert" id="fullscreenAlert">
        <div class="alert-content ">
            <div class="row">
                <div class="col-10 offset-1">
                    <h2 class="text-center text-dark mb-4">Messages</h2>

                </div>
                <div class="col-1">

                    <button class="btn btn-outline-danger btn-sm" id="closeAlert"><i class="fas fa-times"></i></button>
                </div>
            </div>


            <?php $msg_sql = "
    SELECT messages.*, doctors.name 
    FROM messages
    INNER JOIN doctors ON messages.dr_id = doctors.id
    WHERE messages.r_id = {$_SESSION['receptionist_id']}
    ORDER BY messages.id DESC;
";
            $msg_res = $conn->query($msg_sql);
            $newMsg = 0;
            if ($msg_res->num_rows < 1) {
                echo "No Message Available";
            } else {
                while ($row = $msg_res->fetch_assoc()) {
                    echo <<<msg
                <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-9 text-left text-primary">
                            <h5 style="text-align: left;">{$row['name']}</h5>
                        </div>
                        <div class="col-3">
                            {$row['time']}
                        </div>
                        <div class="col-10 text-left">
                            <h6 class="card-title " style="text-align: left;">{$row['msg_body']}</h6>
                        </div>
                        <div class="col-2">
msg;
                    if ($row['is_read'] == 0) {
                        $newMsg = 1;
                        echo <<<msg
    <button class="btn btn-outline-success btn-sm" msg-id="{$row['id']}" onclick="markAsRead(this)"><i class="fas fa-check-double"></i></button>
msg;

                    }
                    echo <<<msg
                            <button class="btn btn-outline-danger btn-sm" msg-id="{$row['id']}" onclick="deleteMsg(this)"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>

                </div>
            </div>
msg;
                }
            }

            ?>
            <script> const newMsg = <?php echo $newMsg; ?>;</script>


        </div>
    </div>

    <header>
        <nav class="navbar navbar-light bg-primary">
            <a class="navbar-brand" href="#">
                <h3 style="color: aliceblue; padding-left: 5%;">
                    <?php echo $title['rm'] ?>
                </h3>
            </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <form class="form-inline my-2 my-lg-0" action="" method="POST">

                    <span class="btn btn-warning mb-2" id="showAlert" onclick="showMsgOnBtn()">Messages </span>

                    <a href="filter.php" style="margin-right: 1rem;" class="btn btn-warning mb-2">Filter</a>
                    <a href="scanner.html" style="margin-right: 1rem;" class="btn btn-warning mb-2">Scanner</a>
                    <a href="appoint.php" style="margin-right: 1rem;" class="btn btn-warning mb-2">View Appointments</a>
                     <a href="followup.php" style="margin-right: 1rem;" class="btn btn-warning mb-2">View FollowUp</a>
                     <a href="skip.php" style="margin-right: 1rem;" class="btn btn-warning mb-2">View skip</a>
                    <a href="addPatientDetail.php" style="margin-right: 1rem;" class="btn btn-warning mb-2">New
                        Registration</a>
                    <a class="navbar-brand">
                        <button type="submit" name="logout" style="margin-right: 1rem;" class="btn btn-danger  mb-2">
                            Logout
                        </button>
                    </a>
                </form>
            </ul>
            </div>
        </nav>
        <div>
        </div>
    </header>
    <div>
        <hr style="height:15px;border-width:0;color:rgb(148, 28, 28);background-color:rgb(148, 30, 30)">
    </div>
    <section>
        <div class="container-fluid">
            <h1 class="bg-light text-black p-2">PATIENT LIST</h1>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table">
                    <thead class="table-primary">
                        <tr>
                            <th>PATIENT ID</th>
                            <th>REG DATE</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>CONSULTANT</th>
                            <th>ADMIT STATUS</th>
                            <th>TYPE</th>
                            <th>REFER STATUS</th>
                            <th>SKIP</th>
                            <th>DELETE</th>
                            <th>OPD Bill</th>
                            <th>IPD Bill</th>
                            <th>Details & Other Forms</th>
                            <th>Eye Consent Form</th>
                            <th>Ortho Consent Form</th>

                        </tr>
                        <tr>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Search Patient ID">
                            </th>
                            <th><input type="date" class="form-control form-control-sm"
                                    placeholder="Search Registration Date"></th>
                            <th><input type="text" class="form-control form-control-sm" placeholder="Search Name"></th>
                            <th></th>
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
                            <th><select id="admitStatusFilter" class='form-control form-control-sm'>
                                    <option value="">All</option>
                                    <option value="Admitted by">Admitted</option>
                                    <option value="Not Admitted">Not Admitted</option>
                                </select>

                            </th>
                            <th><select id="typeFilter" class='form-control form-control-sm'>
                                    <option value="">All</option>
                                    <option value="Registration">Registration</option>
                                    <option value="Appointment">Appointment</option>
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
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM patient_records  where(is_registered = 1 OR is_visited = 1) AND skip = 0  ORDER BY id DESC ";
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
                            echo '<tr  data-row-id="' . $res['id'] . '" >';
                            echo '<td data-row-id="' . $res['id'] . '" class="a">' . $res['id'] . '</td>';

                            echo '<td>' . $res['reg_date'] . '</td>';
                            echo '<td onclick="colorChange(this)" class="name-hover">' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['consultant'] . '</td>';
                            if ($res['is_admited'] == 1) {
                                echo '<td>Admitted by ' . $res['consultant'] . '</td>';

                                echo '<td>' . $type . '</td>';
                                if ($res['is_refered'] == 1) {

                                    echo '<td>Refered by ' . $res['refered_by'] . '</td>';
                                } else {

                                    echo '<td>Not Refered</td>';
                                }
                                echo ' <td>';
                              
                                echo '<form method="POST">
                                <input type="text" style="display:none;" name="inp_id" value="' . $res['id'] . '">
                                <div class="col-4 mx-2 mt-1">';
                                echo '<button class="btn btn-outline-warning  text-black change-color-button" name="skip"> Skip</button>';
                                echo '</div></form>';
                                
                                echo '</td>';
                                echo '<td><button class=" btn btn-danger delete_record" type="submit" data-id="' . $res['id'] . '">Delete</button></td>';

                                echo ' <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="' . $res['id'] . '" cookieName="opd-referer" destination="opd_bill">OPD Bill</button></td>';
                                echo '<td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="' . $res['id'] . '" cookieName="ipd-referer" destination="ipd_bill">IPD Bill</button></td>';
                                echo ' <td><a href="details.php?id=' . $res['id'] . '" class="btn btn-primary">Details</a> <a href="more_forms.php?id=' . $res['id'] . '" class="btn btn-primary m-1 multi-reference" id="receptionPage" p-id="' . $res['id'] . '" cookieName="other-form-referer" destination="more_forms">More Forms</a></td>';

                                if ($res['is_eye'] == '1' && $res['is_ortho'] == 0) {
                                    echo <<<btn
                              
                                    <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="consent-referer" destination="consent">Eye Consent Forms</button></td>
                                    <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="ortho-consent-referer" destination="ortho_consent" style="display: none;">Ortho Consent Forms</button>
                                    <button class="btn btn-warning activate-form" p_id="{$res['id']}" p_col="is_ortho">Activate Ortho Forms</button></td>
        btn;
                                } else if ($res['is_ortho'] == '1' && $res['is_eye'] == 0) {
                                    echo <<<btn
                              
                                    <td><button class="btn btn-primary multi-reference " style="display: none;"" id="receptionPage" p-id="{$res['id']}" cookieName="consent-referer" destination="consent" disabled>Eye Consent Forms</button>
                                    <button class="btn btn-warning activate-form"  p_id="{$res['id']}" p_col="is_eye">Activate Eye Forms</button></td>
                                    <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="ortho-consent-referer" destination="ortho_consent" >Ortho Consent Forms</button></td>
        btn;
                                } else if ($res['is_ortho'] == '1' && $res['is_eye'] == 1) {
                                    echo <<<btn
                              
                                    <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="consent-referer" destination="consent">Eye Consent Forms</button></td>
                                    <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="ortho-consent-referer" destination="ortho_consent"  >Ortho Consent Forms</button>
                                    </td>
        btn;

                                } else {
                                    echo <<<btn
                                    <td><button class="btn btn-primary multi-reference " style="display: none;"" id="receptionPage" p-id="{$res['id']}" cookieName="consent-referer" destination="consent" disabled>Eye Consent Forms</button>
                                    <button class="btn btn-warning activate-form"  p_id="{$res['id']}" p_col="is_eye">Activate Eye Forms</button></td>
                                     <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="ortho-consent-referer" destination="ortho_consent" style="display: none;">Ortho Consent Forms</button>
                                     <button class="btn btn-warning activate-form" p_id="{$res['id']}" p_col="is_ortho">Activate Ortho Forms</button></td>
    btn;
                                }

                            } else {
                                echo '<td>Not yet Admitted</td>';

                                echo '<td>' . $type . '</td>';
                                if ($res['is_refered'] == 1) {

                                    echo '<td>Refered by ' . $res['refered_by'] . '</td>';
                                } else {

                                    echo '<td>Not Refered</td>';
                                }
                                echo ' <td>';
                                echo '<div class="row  ">';
                               
                                echo '<form method="POST">
                                <input type="text" style="display:none;" name="inp_id" value="' . $res['id'] . '">
                                <div class="col-4  mt-1">';
                                echo '<button class="btn btn-outline-primary  text-black change-color-button" name="skip"> Skip</button>';
                                echo '</div></form>';
                               
                                echo '</div>';
                                echo '</td>';
                                echo '<td><button class=" btn btn-danger delete_record" type="submit" data-id="' . $res['id'] . '">Delete</button></td>';
                                
                                echo ' <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="' . $res['id'] . '" cookieName="opd-referer" destination="opd_bill">OPD Bill</button></td>';
                                echo '<td><button class="btn btn-primary" disabled>IPD Bill</button></td>';
                                echo ' <td><a href="details.php?id=' . $res['id'] . '" class="btn btn-primary">Details</a> <a href="more_forms.php?id=' . $res['id'] . '" class="btn btn-primary m-1 multi-reference" id="receptionPage" p-id="' . $res['id'] . '" cookieName="other-form-referer" destination="more_forms">More Forms</a></td>';
                                echo '<td><button class="btn btn-primary " disabled >Eye Consent Forms</button></td>';
                                echo '<td><button class="btn btn-primary " disabled >Ortho Consent Forms</button></td>';
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
    <!-- script to delete patient -->
    <script>
        $(document).ready(function() {
            $(".delete_record").on("click", function(e) {
                e.preventDefault(); // Prevent the default form submission

                var id = $(this).data("id");
                $.ajax({
                    type: "POST",
                    url: "delete_patient.php",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        location.reload(); // Refresh the page
                    }
                });
            });
        });
        </script>
    <script>
        const cookieName = "currentPatient";
        function getCookieValue(cookieName) {
            const cookies = document.cookie.split("; ");
            for (const cookie of cookies) {
                const [name, value] = cookie.split("=");
                if (name === cookieName) {
                    return value;
                }
            }
            return null;
        }



        function colorChange(tr) {
            var rows = document.querySelectorAll("tr");
            const pIdForColor = tr.parentElement.getAttribute("data-row-id");


            const expirationDate = new Date();
            expirationDate.setFullYear(expirationDate.getFullYear() + 1);

            const expires = "expires=" + expirationDate.toUTCString();
            document.cookie = cookieName + "=" + pIdForColor + ";" + expires + ";path=/";
            rows.forEach(function (row) {
                row.classList.remove("table-success");
                row.classList.remove("table-danger");
                row.classList.remove("table-warning");
            });

            var current = tr.parentElement;
            var previous = current.nextElementSibling;
            var next = current.previousElementSibling;

            current.classList.add("table-success");
            if (next) {
                next.classList.add("table-warning");
            }
            if (previous) {
                previous.classList.add("table-danger");
            }

        }
        const fullscreenAlert = document.getElementById('fullscreenAlert');
        const closeAlertButton = document.getElementById('closeAlert');
        if (newMsg == 1) {
            fullscreenAlert.style.display = 'flex';
        }
        closeAlertButton.addEventListener('click', () => {
            fullscreenAlert.style.display = 'none';
        });
        function showMsgOnBtn() {

            fullscreenAlert.style.display = 'flex';
        }

        function markAsRead(btn) {
            const msgId = btn.getAttribute("msg-id");

            const data = new URLSearchParams();
            data.append('msgId', msgId);

            fetch('markAsRead.php', {
                method: 'POST',
                body: data
            })
                .then(response => response.text())
                .then(result => {
                    console.log(result);
                    if (result.trim() === "success") {

                        btn.style.display = "none";
                    } else {
                        alert("An error occurred");
                    }

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function deleteMsg(btn) {
            const msgId = btn.getAttribute("msg-id");

            const data = new URLSearchParams();
            data.append('msgId', msgId);

            fetch('deleteMsg.php', {
                method: 'POST',
                body: data
            })
                .then(response => response.text())
                .then(result => {
                    console.log(result);
                    if (result.trim() === "success") {

                        btn.parentElement.parentElement.parentElement.parentElement.style.display = "none";
                    } else {
                        alert("An error occurred");
                    }

                })
                .catch(error => {
                    console.error('Error:', error);
                });

        }
        document.querySelectorAll('.activate-form').forEach(function (button) {
            button.addEventListener('click', function () {
                var pId = this.getAttribute('p_id');
                var pCol = this.getAttribute('p_col');
                var url = '../staff/activate_forms.php';
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
                    });
                    $('#admitStatusFilter').on('change', function () {
                        var selectedValue = $(this).val();

                        table.columns(7).search(selectedValue).draw(); // Search only on the 7th column (Admit Status)
                    });
                    $('#consultant-filter').on('change', function () {

                        var selectedValue = $(this).val();

                        table.columns(6).search(selectedValue).draw();
                    });
                    $('#typeFilter').on('change', function () {
                        var selectedValue = $(this).val();

                        table.columns(8).search(selectedValue).draw();
                    });
                    $('#referFilter').on('change', function () {
                        var selectedValue = $(this).val();

                        table.columns(9).search(selectedValue).draw();
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

        document.addEventListener('DOMContentLoaded', () => {
            startIdleTimer();
            const pIdForColor = getCookieValue("currentPatient");

            if (pIdForColor !== null) {
                const element = document.querySelector(`[data-row-id="${pIdForColor}"]`);
                var rows = document.querySelectorAll("tr");
                
                rows.forEach(function (row) {
                    row.classList.remove("table-success");
                    row.classList.remove("table-danger");
                    row.classList.remove("table-warning");
                });

                var current = element;
                var previous = current.nextElementSibling;
                var next = current.previousElementSibling;

                current.classList.add("table-success");
                if (next) {
                    next.classList.add("table-warning");
                }
                if (previous) {
                    previous.classList.add("table-danger");
                }

            } else {
                console.log("'currentPatient' cookie not found.");
            }

        });

    </script>
</body>

</html>