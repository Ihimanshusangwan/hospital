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
    <title>Medical</title>
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
                    <?php echo $title['sm']; ?>
                </h3>
            </a>
            <a class="navbar-brand" href="#">
                <h3 style="color: aliceblue; padding-left: 5%;">
                    <?php echo $_SESSION['staff_name']; ?>
                </h3>
            </a>
            <form class="form-inline my-2 my-lg-0" action="" method="POST">
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
                            <th>Canvas</th>
                            <th>Prescription</th>

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
                        $today = date("Y-m-d");
                        if (isset($_GET['date'])) {
                            $today = $_GET['date'];
                        }
                        $sql = "SELECT * FROM patient_records WHERE (is_registered= 1  or is_approved= 1) and is_deleted = 0 and is_viewed = 1 and reg_date ='$today' ORDER BY id DESC;";
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
                            echo '<td><a class="btn btn-primary" href="pres_print.php?id=' . $res['id'] . '" >Hand written Pres.</a></td>';
                            echo '<td><a class="btn btn-primary" href="pres_print2.php?id=' . $res['id'] . '" >Prescription</a></td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
   
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
        document.getElementById("regDateSearch").addEventListener("change", () => {
            console.log("clicked");
            let date = document.getElementById("regDateSearch").value;
            window.location.href = "medical_Page.php?date=" + date;

        })
    </script>
</body>

</html>