<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous"
  />
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="col p-4 shadow-lg rounded-3 m-4">
        <a href="adminLogin.php" class="btn btn-success m-2">Dashboard</a>
        <?php
        
        if (isset($_POST['submit'])) {
            $typeErr = "";
            if (empty($_POST['consultant'])) {
                $typeErr = "Type is required";
                echo"<span style='color:red;'>".$typeErr."</span>";
              } else {
                require("connect.php");
                $type = filter_var($_POST['consultant'],FILTER_SANITIZE_STRING);
                $sql = "INSERT INTO type(type) VALUES('$type');";
                if($conn->query($sql) ===TRUE){
                    echo "<span style='color:green;'>New Type Added Successfully</span>";
                }
                else{
                    echo "Error: ";
                }
                $conn->close();
              }
        }
        ?>
            <form method="POST" action="">
                <div class="form-group m-2">
                    <label for="consultant">Type</label>
                    <input type="text" name="consultant" id="consultant" class="form-control" placeholder="Type">
                </div>
                <div class="form-group m-2">
                    <button type="submit" name="submit" class="btn btn-info">Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>