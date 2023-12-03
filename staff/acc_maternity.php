<?php
 require("../admin/connect.php");
 $id = $_GET['id'];
 session_start();

 $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
 $row=mysqli_fetch_assoc($sql);

 $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
 $row1=mysqli_fetch_assoc($sql1);

 $sql2=mysqli_query($conn,"SELECT * FROM ortho_p_insure WHERE id = '$id';");
 $row2=mysqli_fetch_assoc($sql2);
 
 $sql = "SELECT * FROM titles WHERE id = 1;";
 $data = $conn->query($sql);
 $title = $data->fetch_assoc();
 
$x=0;
 if (isset($_REQUEST['submit'])) {
    $i = 1;
    while (isset($_POST["date_$i"])) {
        if ($_POST["date_$i"] !== "") {
            $date=$_POST["date_$i"] ;
            $time = $_POST["time_$i"];
            $temp = $_POST["temp_$i"];
            $pulse = $_POST["pulse_$i"];
            $bp = $_POST["bp_$i"];
            $spo = $_POST["spo_$i"];
            $time2 = $_POST["time2_$i"];
            $fluid = $_POST["fluid_$i"];
            $oral = $_POST["oral_$i"];
            $intake = $_POST["intake_$i"];
            $urine_output = $_POST["urine_output_$i"];
            $others = $_POST["others_$i"];
            $total_output = $_POST["total_output_$i"];

            $sql3= "INSERT INTO `acc_maternity`(pt_id,`date`, `time`, `temp`, `pulse`, `bp`, `spo`, `time2`, `fluid`, `oral`, `intake`, `urine_output`, `others`, `total_output`) VALUES
            ($id,'$date','$time','$temp','$pulse','$bp','$spo','$time2','$fluid','$oral','$intake','$urine_output','$others','$total_output');";
           if ($conn->query($sql3) === TRUE) {
             $i++;
           } else {
             echo "<div class='alert alert-danger'>Error Updating </div>";
           }
 
         } else {
           $i++;
         }
    }
}

if (isset($_REQUEST['delete'])) {
    $sql3 = "DELETE FROM acc_maternity WHERE id = {$_POST['scan_id']} ;";
    if ($conn->query($sql3) === TRUE) {
      echo "<div class='alert alert-success'>Deleted Successfully</div>";
    } else {
      echo "<div class='alert alert-danger'>Error Deleting</div>";
    }
  }
  ?><?php
    $sql3 = "SELECT * FROM acc_maternity WHERE pt_id = '$id';";
                    $data3 = $conn->query($sql3);
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accident And Maternity Homes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style type="text/css">
    body {
        background: lightgray;
        animation: fade-in 1s linear;
    }

    .fl {
        animation: gelatine 1s;
    }

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px;
    }

    input[type="text"]::placeholder,
    input[type="time"]::placeholder,
    input[type="date"]::placeholder {
        color: lightgrey;
    }

    textarea[type="text"]::placeholder {
        color: lightgrey;
    }

    hr {
        border: 1px solid black;
    }

    label {
        animation: gelatine 1s;

    }

    select {
        animation: gelatine 1s;
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;
    }

    input[type="text"],
    input[type="time"],
    input[type="date"] {
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;

    }

    textarea[type="text"] {
        outline: none !important;
        border-color: #C0C0C0;
        box-shadow: 5px 5px 5px 5px #C0C0C0;
        animation: gelatine 1s;
    }

    input[type="text"]:focus,
    input[type="time"]:focus,
    input[type="date"]:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
    }

    textarea[type="text"]:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
    }

    select:focus {
        outline: none !important;
        border-color: grey;
        box-shadow: 2px 2px 2px 2px grey;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes gelatine {
        0% {
            opacity: 0;
            transform: translateX(2000px);
        }

        60% {
            opacity: 1;
            transform: translateX(-30px);
        }

        80% {
            transform: translateX(10px);
        }

        100% {
            transform: translateX(0);
        }
    }
    </style>
<script>
    var items = 0;

    function addItem() {
      var today = new Date();
      var time =
        today.getHours() +
        ":" +
        today.getMinutes() +
        ":" +
        today.getSeconds();
      const date2 = new Date().toJSON().slice(0, 10);
      items++;
      var html = "<tr>";
      html += "<td>" + items + "</td>";
      html += "<td class='col-md-2'><input type='date' value=" + date2 + " name='date_" + items + "'> </td>";
      html += "<td class='col-md-2'><input type='time' name='time_" + items + "'></td>";
      html += "<td><input type='text' name='temp_" + items + "'></td>";
      html += "<td><input type='text' name='pulse_" + items + "'></td>";
      html += "<td><input type='text' name='bp_" + items + "'></td>";
      html += "<td><input type='text' name='spo_" + items + "'></td>";
      html += "<td><input type='time' name='time2_" + items + "'></td>";
      html += "<td><input type='text' name='fluid_" + items + "'></td>";
      html += "<td><input type='text' name='oral_" + items + "'></td>";
      html += "<td><input type='text' name='intake_" + items + "'></td>";
      html += "<td><input type='text' name='urine_output_" + items + "'></td>";
      html += "<td><input type='text' name='others_" + items + "'></td>";
      html += "<td><input type='text' name='total_output_" + items + "'></td>";
      html += "<td><button class='btn btn-danger' type='button' onclick='deleteRow(this);'>Delete</button></td>";
      html += "</tr>";
      var row = document.getElementById("tbody").insertRow();
      row.innerHTML = html;
    }

    function deleteRow(button) {
      button.parentElement.parentElement.children[2].children[0].value = "";
      button.parentElement.parentElement.style.display = "none";
    }
  </script>
    <title>Document</title>
</head>

<body class="m-2">
    <div class="container">
        <h1 class="text-center text-danger mt-3">
            <?php echo $title['so'] ?>
        </h1>
        <h3 class=" fl text-center text-dark">Accident And Maternity Homes</h3>
        <?php if($x==1){echo "<div class='alert alert-success'> Updated Successfully</div>";} ?>
    </div>

    <div class="container">
        <div class="col p-4 m-4 shadow-lg rounded">
            <a class="btn btn-primary" href="ortho_forms.php?id=<?php echo $id; ?>">Dashboard</a>
            <a href="acc_print.php?id=<?php echo $id; ?>" class=" btn btn-success" id="dashboard">Print</a>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label mt-2">Patient's Name : <?php echo $row['name']; ?></label>
                </div>
                <div class="col-md-4">
                    <label class="form-label mt-2">UHID No : <?php echo $row2['uhid'];?></label>
                </div>
                <div class="col-md-4">
                    <label class="form-label mt-2">Date : <?php echo $row2['date'];?></label>
                </div>

            </div>
            <form action="" method="post">
<div class="text-center"  style="overflow:auto;">
            <table class="table table-bordered  border-secondary">
                <thead >
                <tr class="main-header">
                    <th rowspan="2">Sno</th>
                    <th rowspan="2">Date</th>
                    <th rowspan="2">Time</th>
                    <th rowspan="2">Temp</th>
                    <th rowspan="2">Pulse</th>
                    <th rowspan="2">BP</th>
                    <th rowspan="2">SPO2</th>
                    <th rowspan="2">Time</th>
                    <th colspan="3" rowspan="1">Intake</th>
                    <th colspan="3" rowspan="1">Outputs</th>
                    <th rowspan="2">Delete</th>
                </tr>
                <tr>
                    <th>IV Fluids</th>
                    <th>Oral</th>
                    <th>Total Intake</th>
                    <th>Urine Output</th>
                    <th>Others</th>
                    <th>Total Output</th>
                </tr>
               
                </thead>
                <tbody id="tbody">
                <?php
                  $i = 1;
                  $sr = 1;
                  while ($res = $data3->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $sr . '</td>';
                    echo '<td>' . $res['date'] . '</td>';
                    echo '<td>' . $res['time'] . '</td>';
                    echo '<td>' . $res['temp'] . '</td>';
                    echo '<td>' . $res['pulse'] . '</td>';
                    echo '<td>' . $res['bp'] . '</td>';
                    echo '<td>' . $res['spo'] . '</td>';
                    echo '<td>' . $res['time2'] . '</td>';
                    echo '<td>' . $res['fluid'] . '</td>';
                    echo '<td>' . $res['oral'] . '</td>';
                    echo '<td>' . $res['intake'] . '</td>';
                    echo '<td>' . $res['urine_output'] . '</td>';
                    echo '<td>' . $res['others'] . '</td>';
                    echo '<td>' . $res['total_output'] . '</td>';
                    echo "<td><form method='POST' action=''>
                                    <input type='hidden' value={$res['id']} name='scan_id' >
                                    <button type='submit' name = 'delete' class='btn btn-primary'>Delete</button> </form>" . '</td>';
                    echo '</tr>';
                    $i++;
                    $sr++;
                  }
                  ?>
                </tbody>
            </table>
            </div>
            <?php
                  echo '<button type="button" class="btn btn-warning" onclick="addItem();">
                        Add Note
                      </button>';
                      echo '<button type="submit" class="btn btn-info mx-2 ml-auto" name="submit" value="submit"
                      id="submit">Submit</button>';
                      ?>
                    
                <br>
                
            </form>
        </div>
</body>

</html>