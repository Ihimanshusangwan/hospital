<?php
session_start();
if (isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
    header("location:../index.html");
}
//prevent access of admin page without login
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Admin</title>
    
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-primary">
            <a class="navbar-brand" href="#">
                <h3 style="color: aliceblue; padding-left: 5%;">SHRI SIDDHIVINAYAK NETRALAYA</h3>
            </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <form class="form-inline my-2 my-lg-0" action="" method="POST">
                 <a class="navbar-brand">
                    <a href="staffRegistrationForm.php" class="btn btn-primary mx-1">Register Staff
                    </a>
                </a>
                <a class="navbar-brand">
                    <a href="change_label.php" class="btn btn-primary mx-1">Change Label
                    </a>
                </a>
                <a class="navbar-brand">
                    <a href="change_rate.php" class="btn btn-primary mx-1">Change Rate Charges
                    </a>
                </a>
                <a class="navbar-brand">
                    <a href="configure_print.php" class="btn btn-primary mx-1">Configure Print Page
                    </a>
                </a>
                <a class="navbar-brand">
                    <a href="pregnancyCalc.php" class="btn btn-primary mx-1">Pregnancy Calculator
                    </a>
                </a>


                <a class="navbar-brand">
                    <a href="receptionistRegistration.php" class="btn btn-primary mx-1">Register Receptionist</a>
                </a>
                <a class="navbar-brand">
                    <a href="doctorRegistrationForm.php" class="btn btn-primary mx-1">Register Doctor</a>
                </a>
                <a class="navbar-brand">
                    <a href="addType.php" class="btn btn-primary mx-1">Add type</a>

                </a>
               
                <a class="navbar-brand">
                    <a href="editTitle.php" class="btn btn-primary mx-1">Edit Titles</a>

                </a>
                <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#myModal">
      
         Set Base Patient Id 
    </button>
    <a class="navbar-brand">

                </a>  <a class="navbar-brand">

                </a><a class="navbar-brand">
                    

                </a> <a class="navbar-brand">

                </a>
                </a> <a class="navbar-brand">
                    <a href="set_auto_reload.php" class="btn btn-primary mx-1">Auto Refresh</a>

                </a>
                <a class="navbar-brand">
                    <a href="opd_sign.php" class="btn btn-primary mx-1">Opd Sign </a>

                </a>
                <a class="navbar-brand">
                    <a href="deletedPatient.php" class="btn btn-primary mx-1">Deleted Patients</a>

                </a>
                <a class="navbar-brand">
                    <button type="submit" name="logout" class="btn btn-danger mx-2 px-2 py-1">
                        Logout
                    </button>
                    <!-- <a href="#" class="btn btn-primary mx-1" style="margin-right: 2rem;">Logout</a> -->
                </a>
            </form>
            </div>
        </nav>
        <div>
            <hr style="height:15px;border-width:0;color:rgb(148, 28, 28);background-color:rgb(148, 30, 30)">
        </div>
    </header>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Set Auto Increment Start Value</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label >Start Value:</label>
                            <input type="number" class="form-control" id="start_value" name="start_value" required>
                        </div>
                        <button class="btn btn-primary m-3" id="submitBtn">Submit</button>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Table Start -->
    <section>
        <h3 class=" mx-3 my-2">Receptionist's Details</h3>
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-2">
                    <thead class="table-dark">
                        <tr>
                            <th> RECEPTIONIST ID</th>
                            <th>REG DATE</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require("connect.php");
                        $sql = "SELECT * FROM receptionists ;";
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';
                            echo '<td>' . $res['reg_date'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['email'] . '</td>';
                            echo '<td>' . $res['password'] . '</td>';
                            echo '</tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section>
        <h3 class=" mx-3 my-2">Doctor's Details</h3>
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table" mt-2>
                    <thead class="table-dark">
                        <tr>
                            <th>Doctor ID</th>
                            <th>REG DATE</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>Type</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM doctors ;";
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';
                            echo '<td>' . $res['reg_date'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['type_of_visit'] . '</td>';
                            echo '<td>' . $res['email'] . '</td>';
                            echo '<td>' . $res['password'] . '</td>';
                            echo '</tr>';
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section>
        <h3 class=" mx-3 my-2">Staff Details</h3>
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-2">
                    <thead class="table-dark">
                        <tr>
                            <th>STAFF ID</th>
                            <th>REG DATE</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>AGE</th>
                            <th>MOBILE</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require("connect.php");
                        $sql = "SELECT * FROM staff ;";
                        $data = $conn->query($sql);
                        while ($res = $data->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $res['id'] . '</td>';
                            echo '<td>' . $res['reg_date'] . '</td>';
                            echo '<td>' . $res['name'] . '</td>';
                            echo '<td>' . $res['sex'] . '</td>';
                            echo '<td>' . $res['age'] . '</td>';
                            echo '<td>' . $res['mobile'] . '</td>';
                            echo '<td>' . $res['email'] . '</td>';
                            echo '<td>' . $res['password'] . '</td>';
                            echo '</tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script>
document.getElementById('submitBtn').addEventListener('click', function(event) {

    var startValue = document.getElementById('start_value').value;

    if (confirm("Are you sure you want to set the auto-increment start value to " + startValue + "? This action cannot be undone.")) {
        fetch('update_auto_increment.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'start_value=' + encodeURIComponent(startValue)
        })
        .then(function(response) {
            return response.text();
        })
        .then(function(data) {
            showAlert(data);
        })
        .catch(function(error) {
            console.log('Error: ' + error);
        });
    }
});

function showAlert(message) {
    var alertElement = document.createElement('div');
    alertElement.className = 'alert alert-primary';
    alertElement.textContent = message;

    var modalBody = document.querySelector('.modal-body');
    modalBody.appendChild(alertElement);
}

    </script>
 
</body>

</html>
