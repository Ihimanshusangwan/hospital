<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
<?php
require("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $username = $password= "";
    $username_err = $password_err = "";

    // Validate email
    if (empty(trim($_POST["username"])) || !filter_var(trim($_POST["username"]),FILTER_VALIDATE_EMAIL)){
        $username_err = "Please enter your email.";
    } else {
        $username = filter_var(trim($_POST["username"]),FILTER_VALIDATE_EMAIL);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = filter_var(trim($_POST["password"]),FILTER_SANITIZE_STRING);
    }
 
    if (empty($email_err) && empty($password_err)) {
     
        $sql = "SELECT * FROM admin ;";
        $result = $conn->query($sql)->fetch_assoc();
        
        if(($username === $result['username'] && $password === $result['password'] )|| isset($_COOKIE['username'])){
            session_start();
            $_SESSION['username'] = $username;
            header("location:adminLogin.php");
            exit();
        }
        else {
            echo"<script> alert('invalid Username or Password'); </script>";
        }
    }
    else{

        echo"there was a error in validating the fields, try again....";
        exit();
    }
}
$conn->close();
?>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="card shadow-lg p-4 " id="login-card">
                <a href="../index.html" class="btn btn-success m-2">Home</a>
                    <h1 class="text-center mb-4">Admin Login</h1>
                    <form method="post" action="">
                        <div class="form-group my-3">
                            <label for="username">Username:</label>
                            <input type="email" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group my-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>