<?php
require("../admin/connect.php");
$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <title>Document</title>
  <style>
    label {
      font-weight: 600;
    }
  </style>
</head>

<body style="background-color: #90D0E5;">
  <div class="container mb-4">
    <h1>
      <marquee style="color: purple;" BEHAVIOUR="slide" scrollnount="70" scrolledeley="100">
      <?php echo $title['ro']?>
      </marquee>
    </h1>
    <a href="receptionPage.php" class="btn btn-success m-2">Dashboard</a>
    <h3 class="mx-3 my-2 inline-heading">Pending Appointments</h3>
    <?php
          if (isset($_REQUEST['submit'])) {
            $id = $_POST['id'];
            $date = $_POST['date'];
            $update="UPDATE `patient_records` SET reg_date = '$date', is_approved= 1  WHERE `id` = '$id'";
            $conn->query($update);
            $day = date('d');
                $month = date('m');
                $year = date('Y');
                
                $uhid = $id.'/'.$day.'/'.$month.'/'.$year;
              
                
                //auto generate uhid
                $sql = "update p_insure set uhid = '$uhid' where id = $id;";
                $conn->query($sql);
                $sql = "update ortho_p_insure set uhid = '$uhid' where id = $id;";
                $conn->query($sql);
            echo "<div class='alert alert-success'> Updated Successfully</div>";

          }
          $sql = "SELECT * FROM patient_records  where is_registered= 0  and is_approved= 0 ORDER BY id DESC; ";
          $data = $conn->query($sql);
          if(!$res = $data->fetch_assoc()){
            echo "<div class='alert alert-danger'>No Appointment Requets</div>";
          }
          else{


     ?> 


        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-all" mt-2>
                    <thead class="table-dark">
                        <tr>
                            <th>PATIENT ID</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>CONSULTANT</th>
                            <th>REG DATE</th>
                            <th>APPROVE </th>


                        </tr>
                    </thead>
                    <tbody>
                      <form method="POST" action="appoint.php">
                        <?php
                        $sql = "SELECT * FROM patient_records  where is_registered= 0  and is_approved= 0 ORDER BY id DESC; ";
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['consultant'] . '</td>';
                            echo '<td> <input type="hidden" name="id" value="' . $res['id'] . '">
                            <input type="date"  name="date" value="' . $res['reg_date'] . '"> </td>';
                            echo '<td> <button  type="submit" name="submit" class="btn btn-primary">Approve</button></td>';
                            echo '</tr>';
                        }
                      }
                        ?>
                    </tbody>
                </table>
  </div>
  <section>
    <?php 
    if (isset($_REQUEST['visit']) && $_POST['visit'] == "is_visited") {
      $id = $_POST['p_id'];
      $update="UPDATE `patient_records` SET  is_visited= 1  WHERE `id` = '$id'";
      $conn->query($update);

    }
    ?>
        <div class="container" >
            <h1 class=" text-black p-2"> Aproved Appointments </h1>
            <div >
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
                            <th>VISIT STATUS</th>

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
                           
                         
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM patient_records  where is_registered= 0  and is_approved= 1 ORDER BY id DESC; ";
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
      
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';

                            echo '<td>' . $res['reg_date'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['consultant'] . '</td>';
                            if( $res['is_visited'] == 0){
                              echo<<<data
                              <td> <form action="" method="POST">
                              <input type="hidden" name="p_id" value="{$res['id']}">
                              <button type="submit" name="visit" value="is_visited" class="btn btn-success">Mark as Visited</button>
                            </form> </td>

data;
                            }else{
                              echo '<td><button class="btn btn-success" disabled>Visited</button></td>';
                            }
                            
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
 
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
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
                  
                    $('#consultant-filter').on('change', function () {
                            var selectedValue = $(this).val();

                            table.columns(6).search(selectedValue).draw();
                        });
                   
                },
                order: [[0, 'desc']]
            });

        });
    </script>
</body>

</html>