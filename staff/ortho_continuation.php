<?php 
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
  $data = $conn->query($sql);
  $res = $data->fetch_assoc();

  $sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
  $data1 = $conn->query($sql1);
  $res1 = $data1->fetch_assoc();

  $sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
  $data2 = $conn->query($sql2);
  $res2 = $data2->fetch_assoc();
  $sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
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
        input[type="date"]::placeholder ,
        input[type="tel"]::placeholder,
        input[type="number"]::placeholder{
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
        input[type="date"],
        input[type="tel"],
        input[type="number"] {
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
        input[type="date"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus {
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
          today.getMinutes();
        const date2 = new Date().toJSON().slice(0, 10);
        items++;
        var html = "<tr>";
        html += "<td class='col-md-2'><input type='date' value="+date2+" name='date_"+ items +"'> </td>";
        html += "<td class='col-md-2'><input type='time'  value="+time+"  name='time_"+ items +"'></td>";
        html += "<td class='col-md-2'><input type='text' name='note_"+ items +"'></td>";  
        html += "<td><input type='text' name='treat_"+ items +"'></td>";
        html += "<td><input type='text' name='pulse_"+ items +"'></td>";
        html += "<td><input type='text' name='temp_"+ items +"'></td>";
        html += "<td><input type='text' name='resp_"+ items +"'></td>";
        html += "<td><input type='text' name='bp_"+ items +"'></td>";
        html += "<td><input type='text' name='sp_"+ items +"'></td>";
        html += "<td><input type='text' name='pa_"+ items +"'></td>";
        html += "<td><input type='text' name='cns_"+ items +"'></td>";
        html += "<td><input type='text' name='bb_"+ items +"'></td>";
        html += "<td><input type='text' name='dmtb_"+ items +"'></td>";
        html += "<td><input type='text' name='sign_" + items + "' value=<?php echo $_SESSION['staff_name'];?> ></td>"
        html +="<td><button class='btn btn-danger' type='button' onclick='deleteRow(this);'>Delete</button></td>";
        html += "</tr>";

        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
      }

      function deleteRow(button) {
      button.parentElement.parentElement.children[2].children[0].value="";
      button.parentElement.parentElement.style.display = "none";
      }
    </script>
  </head>

  <body>
    <div class="container">
      <h1 class="text-center text-danger mt-3"><?php echo $title['so']?></h1>
      <a href="ortho_forms.php?id=<?php echo $id; ?>" class="btn btn-success m-2">Dashboard</a>
      <h3 class="text-center text-dark my-3 ">Continuation Sheet</h3>
      <div class="row">
        <div class="col-md-3">
          <label class="form-label">UHID No: <?php echo $res2['uhid'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">IPD No: <?php echo $res2['ipd'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Date of Admission : <?php echo $res2['date'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label" for="time_ad">Time of Admission : <?php echo $res2['time'];?></label>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">Name: <?php echo $res['name'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Age: <?php echo $res['age'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Sex: <?php echo $res['sex'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">ICU/Ward Room No: <?php echo $res2['ward/icu'];?></label>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <label class="form-label">Consultant: <?php echo $res['consultant'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Diagnosis: <?php echo $res1['diagnosis'];?></label>
        </div>
        <div class="col-md-3">
          <label class="form-label">Bed Number: <?php echo $res2['bed/room'];?></label>
        </div>
      </div>
      <?php
    if (isset($_REQUEST['submit_changes'])) {
        $i = 1;
        while (isset($_POST["note_$i"])) {

            if ($_POST["note_$i"] !=="") {
            
                
                    $date = $_POST["date_$i"];
                    $time = $_POST["time_$i"];
                    $note = $_POST["note_$i"];
                    $treat = $_POST["treat_$i"];
                    $pulse = $_POST["pulse_$i"];
                    $temp = $_POST["temp_$i"];
                    $resp = $_POST["resp_$i"];
                    $bp = $_POST["bp_$i"];
                    $sp = $_POST["sp_$i"];
                    $pa = $_POST["pa_$i"];
                    $cns = $_POST["cns_$i"];
                    $bb = $_POST["bb_$i"];
                    $dmtb = $_POST["dmtb_$i"];

                    $sign = $_POST["sign_$i"];
                    
                    
                    
                    $id = $_GET['id'];
                    
                    $sql3 = "INSERT INTO ortho_cont (patient_id,date,time,note,treat,pulse,temp,resp,bp,sp,pa,cns,bb,dmtb,sign) VALUES ('$id','$date','$time','$note','$treat','$pulse','$temp','$resp','$bp','$sp','$pa','$cns','$bb','$dmtb','$sign');";
                    if ($conn->query($sql3) === TRUE) {
                        $i++;
                    } else {
                        echo "<div class='alert alert-danger'>Error Updating </div>";
                    }
                
            }
            else{
                $i++;
            }

        }
        echo "<div class='alert alert-success'>Updated Successfully</div>";
    }
    if (isset($_REQUEST['delete'])) {
        $sql3 = "DELETE FROM ortho_cont WHERE id = {$_POST['cont_id']} ;";
        if ($conn->query($sql3) === TRUE) {
            echo "<div class='alert alert-success'>Deleted Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error Deleting</div>";
        }
    }
    $sql3 = "SELECT * FROM ortho_cont WHERE id = $id;";
    $res3 = $conn->query($sql3)->fetch_assoc();
    ?>

    <form method="POST" action="">
      <div class="container-fluid" style="margin-top: 20px">
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table table-bordered"
                id="dataTable"
                width="100%"
                cellspacing="0"
              >
                <tr>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Notes</th>
                  <th>Treatment/Advice</th>
                  <th>Pulse</th>
                  <th>Temp</th>
                  <th>Resp</th>
                  <th>BP</th>
                  <th>SPO2</th>
                  <th>pa</th>
                  <th>cns</th>
                  <th>b/b</th>
                  <th>dmtb</th>
                  <th>Sign</th>
                  <th>Delete</th>
                </tr>
                <tbody id="tbody">
                <?php
                            $sql3 = "SELECT * FROM ortho_cont  WHERE patient_id = $id;";
                            $data3 = $conn->query($sql3);
                            $i = 1;
                            $sr = 1;
                            while ($res = $data3->fetch_assoc()) {
                                echo '<tr>';
                                
                                echo '<td>' . $res['date'] . '</td>';
                                echo '<td>' . $res['time'] . '</td>';
                                echo '<td>' . $res['note'] . '</td>';
                                echo '<td><input type="hidden" value="'.$res['id'].'" ><input type="text" value="'.$res['treat'].'" class="treatment"></td>';
                                echo '<td>' . $res['pulse'] . '</td>';
                                echo '<td>' . $res['temp'] . '</td>';
                                echo '<td>' . $res['resp'] . '</td>';
                                echo '<td>' . $res['bp'] . '</td>';
                                echo '<td>' . $res['sp'] . '</td>';
                                echo '<td>' . $res['pa'] . '</td>';
                                echo '<td>' . $res['cns'] . '</td>';
                                echo '<td>' . $res['bb'] . '</td>';
                                echo '<td>' . $res['dmtb'] . '</td>';
                                echo '<td>' . $res['sign'] . '</td>';
                                echo "<td><form method='POST' action=''>
                                    <input type='hidden' value={$res['id']} name='cont_id' >
                                    <button type='submit' name = 'delete' class='btn btn-primary'>Delete</button> </form>" . '</td>';
                                echo '</tr>';
                                $i++;
                                $sr++;
                            }
                            ?>

                </tbody>
              </table>
            </div>
            <button
              type="button"
              class="btn btn-info btn-lg"
              onclick="addItem();"
            >
              Add Note
            </button>
            <input
              type="submit"
              class="btn btn-info btn-lg"
              name="submit_changes"
              value="Save"
            />
            <a href="ortho_continuation_print.php?id=<?php echo $id; ?>" class="btn btn-info btn-lg">Print Note</a>
          </div>
        </div>
      </div>
      </div>
    </div>
  </form>

   
  </body>
  <script>
   const treatmentInputs = document.querySelectorAll('.treatment');

treatmentInputs.forEach((input) => {
  const messageElement = document.createElement('span'); // Create a new <span> element
  messageElement.classList.add('message'); // Add a CSS class for styling

  input.parentNode.appendChild(messageElement); // Append the message element next to the input

  input.addEventListener('change', () => {
    const currentValue = input.value;
    const previousValue = input.previousElementSibling.value;

    // Make a POST request to save the data in the database
    fetch('ortho_save_treatment.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        id: previousValue,
        treat: currentValue,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === 'success') {
          messageElement.textContent = 'Updated';
          messageElement.style.color = 'green';
        } else {
          messageElement.textContent = 'Failed to update';
          messageElement.style.color = 'red';
        }
      })
      .catch((error) => {
        console.error('Error:', error);
        // Handle any errors that occurred during the request
      });
  });
});

</script>

</html>
