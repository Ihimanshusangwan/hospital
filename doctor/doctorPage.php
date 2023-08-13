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
    <header>
        <nav class="navbar navbar-light bg-primary">
            <a class="navbar-brand" href="#">
                <h3 style="color: aliceblue; padding-left: 5%;">
                    <?php echo $title['dm'] ?>
                </h3>
            </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
            <form class="form-inline my-2 my-lg-0" action="" method="POST">
                <a class="navbar-brand btn btn-warning" href="image_gallery.php">Image Gallery</a>
                <a class="navbar-brand btn btn-warning" href="template.php">Manage Templates</a>
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
                            <th>PATIENT ID</th>
                            <th>REG DATE</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>REFER STATUS</th>
                            <th>View</th>
                            <th>OT NOTES</th>
                            <th>More</th>
                            <th>Images</th>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM patient_records WHERE type_of_visit = '{$_SESSION['doctor_type']}' AND (is_registered = 1 OR is_visited = 1);";
                        $data = $conn->query($sql);

                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';
                            echo '<td>' . $res['reg_date'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            if ($res['is_refered'] == 1) {

                                echo '<td>Refered by ' . $res['refered_by'] . '</td>';
                            } else {

                                echo '<td>Not Refered</td>';
                            }
                            echo '<td><a href="view.php?id=' . $res['id'] . '" class="btn btn-primary">View</a></td>';
                            if ($res['is_admited'] == 1) {
                                echo '<td><a href="OT.php?id=' . $res['id'] . '" class="btn btn-primary">OT Notes</a></td>';

                            } else {
                                echo '<td><button class="btn btn-primary" disabled>OT Notes</button></td>';

                            }
                            

                            if ($res['type_of_visit'] == 'Eye') {
                                echo '<td><a href="opto.php?id=' . $res['id'] . '" class="btn btn-primary">Ophthalmologist</a></td>';
                            } else {
                                echo "<td></td>";
                            }
                            if ($res['is_admited'] == 1) {
                                echo '<td><a href="img.php?id=' . $res['id'] . '" class="btn btn-primary">Images</a></td>';

                            } else {
                                echo '<td><button class="btn btn-primary" disabled>Images</button></td>';

                            }

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
                        $('#referFilter').on('change', function () {
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