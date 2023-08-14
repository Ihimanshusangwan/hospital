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
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-primary">
            <a class="navbar-brand" href="#">
                <h3 style="color: aliceblue; padding-left: 5%;">
                    <?php echo $title['rm'] ?>
                </h3>
            </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <form class="form-inline my-2 my-lg-0" action="" method="POST">
                    <a href="scanner.html" style="margin-right: 1rem;" class="btn btn-warning mb-2">Scanner</a>
                    <a href="appoint.php" style="margin-right: 1rem;" class="btn btn-warning mb-2">View Appointments</a>
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
        <div><hr style="height:15px;border-width:0;color:rgb(148, 28, 28);background-color:rgb(148, 30, 30)"></div>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
<<<<<<< HEAD
                        $sql = "SELECT * FROM patient_records  where is_registered= 1  or is_approved= 1 ORDER BY id DESC; ";
=======
                        $sql = "SELECT * FROM patient_records  where is_registered=1  OR  is_visited = 1  ORDER BY id DESC ";
>>>>>>> 31de678f6cc9e916edd15c86d7b64b6b42dafd24
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
                            $type = '';
                            if ($res['is_registered'] == 1) {
                                $type = 'Registration';
                            } else {
                                $type = 'Appointment';
                            }
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';

                            echo '<td>' . $res['reg_date'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['consultant'] . '</td>';
                            if ($res['is_admited'] == 1) {
                                echo '<td>Admitted by ' . $res['consultant'] . '</td>';
                                
                                echo '<td>' . $type . '</td>';
                                if($res['is_refered']==1){

                                    echo '<td>Refered by ' . $res['refered_by'] . '</td>';
                                }else{
                                    
                                echo '<td>Not Refered</td>';
                                }
                                echo ' <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="'.$res['id'].'" cookieName="opd-referer" destination="opd_bill">OPD Bill</button></td>';
                                echo '<td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="'.$res['id'].'" cookieName="ipd-referer" destination="ipd_bill">IPD Bill</button></td>';
                                echo ' <td><a href="details.php?id=' . $res['id'] . '" class="btn btn-primary">Details</a> <a href="more_forms.php?id=' . $res['id'] . '" class="btn btn-primary m-1 multi-reference" id="receptionPage" p-id="'.$res['id'].'" cookieName="other-form-referer" destination="more_forms">More Forms</a></td>';

                                if($res['is_eye']=='1' && $res['is_ortho']==0){
                                    echo <<<btn
                              
                                    <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="consent-referer" destination="consent">Eye Consent Forms</button></td>
                                    <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="ortho-consent-referer" destination="ortho_consent" style="display: none;">Ortho Consent Forms</button>
                                    <button class="btn btn-warning activate-form" p_id="{$res['id']}" p_col="is_ortho">Activate Ortho Forms</button></td>
        btn;
                                }
                                else if($res['is_ortho']=='1'  && $res['is_eye']==0){
                                    echo <<<btn
                              
                                    <td><button class="btn btn-primary multi-reference " style="display: none;"" id="receptionPage" p-id="{$res['id']}" cookieName="consent-referer" destination="consent" disabled>Eye Consent Forms</button>
                                    <button class="btn btn-warning activate-form"  p_id="{$res['id']}" p_col="is_eye">Activate Eye Forms</button></td>
                                    <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="ortho-consent-referer" destination="ortho_consent" >Ortho Consent Forms</button></td>
        btn;
                                }else if( $res['is_ortho']=='1'  && $res['is_eye']==1){
                                    echo <<<btn
                              
                                    <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="consent-referer" destination="consent">Eye Consent Forms</button></td>
                                    <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="{$res['id']}" cookieName="ortho-consent-referer" destination="ortho_consent"  >Ortho Consent Forms</button>
                                    </td>
        btn;
    
                                }else{
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
                                if($res['is_refered']==1){

                                    echo '<td>Refered by ' . $res['refered_by'] . '</td>';
                                }else{
                                    
                                echo '<td>Not Refered</td>';
                                }
                                echo ' <td><button class="btn btn-primary multi-reference" id="receptionPage" p-id="'.$res['id'].'" cookieName="opd-referer" destination="opd_bill">OPD Bill</button></td>';
                                echo '<td><button class="btn btn-primary" disabled>IPD Bill</button></td>';
                                echo ' <td><a href="details.php?id=' . $res['id'] . '" class="btn btn-primary">Details</a> <a href="more_forms.php?id=' . $res['id'] . '" class="btn btn-primary m-1 multi-reference" id="receptionPage" p-id="'.$res['id'].'" cookieName="other-form-referer" destination="more_forms">More Forms</a></td>';
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
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
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
document.querySelectorAll('.activate-form').forEach(function(button) {
    button.addEventListener('click', function() {
        var pId = this.getAttribute('p_id');
        var pCol = this.getAttribute('p_col');
        var url = '../staff/activate_forms.php';
        var data = { "pId": pId, "pCol": pCol };

        // Show the Bootstrap modal
        $('#confirmationModal').modal('show');

        // Add event listener to the Confirm button
        document.getElementById('confirmButton').addEventListener('click', function() {
            fetch(url, {
                method: 'POST',
                body: JSON.stringify(data)
            })
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Error: ' + response.status);
                }
            })
            .then(function(data) {
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
            .catch(function(error) {
                console.error('Error:', error);
            })
            .finally(function() {
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
      setCookie(cookieName, id , 7);
      var destination =element.getAttribute("destination");
      window.location.href = destination +".php?id="+p_id;
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
    </script>
</body>

</html>