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
require("../admin/connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define hardcoded username and password
    $hardcoded_username = "medical";
    $hardcoded_password = "123";

    // Retrieve the entered username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the entered credentials match the hardcoded values
    if ($username === $hardcoded_username && $password === $hardcoded_password) {
        // Set session variables (you can modify this part based on your use case)
        session_start();
        $_SESSION['staff_id'] = 1;  
        $_SESSION['staff_name'] = "Medical"; 
        header("location: medical_Page.php");
        exit();
    } else {
        echo "<script> alert('Invalid Username or Password'); </script>";
    }
}
?>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="card shadow-lg p-4 " id="login-card">
                <a href="../index.html" class="btn btn-success m-2">Home</a>
                    <h1 class="text-center mb-4">Medical Login</h1>
                    <form method="post" action="">
                        <div class="form-group my-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
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