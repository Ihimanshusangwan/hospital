<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="col p-4 shadow-lg rounded-3 m-4">
            <a href="adminLogin.php" class="btn btn-success m-2">Dashboard</a>
            <?php
            require("../admin/connect.php");
            // error_reporting(0);
            $sql = "SELECT * FROM titles WHERE id = 1;";
            $data = $conn->query($sql);
            if ($data->num_rows < 1) {
                $sql = "insert into titles (id) values(1);";
                $conn->query($sql);
            } 
            

            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $address = $_POST['address'];
                $mobile = $_POST['mobile'];



                $update1 = "UPDATE `titles` SET title='$title', `address` ='$address', `mobile` ='$mobile' where id = 1";
                $conn->query($update1);
                echo "<div class='alert alert-success'> Updated Successfully</div>";

            }
            if (isset($_POST['change'])) {
                $image = addslashes(file_get_contents($_FILES["logo"]["tmp_name"]));
                $update1 = "UPDATE `titles` SET logo='$image' where id = 1";
                $conn->query($update1);
                echo "<div class='alert alert-success'> Updated Successfully</div>";
            }
            if (isset($_POST['submit1'])) {
                $rm = $_POST['rm'];
                $ro = $_POST['ro'];
                $update1 = "UPDATE `titles` SET `rm`='$rm',`ro`='$ro' where id = 1";
                $conn->query($update1);
                echo "<div class='alert alert-success'> Updated Successfully</div>";
            }
            if (isset($_POST['submit2'])) {
                $dm = $_POST['dm'];
                $do = $_POST['do'];
                $update1 = "UPDATE `titles` SET `dm`='$dm',`do`='$do' where id = 1";
                $conn->query($update1);
                echo "<div class='alert alert-success'> Updated Successfully</div>";
            }
            if (isset($_POST['submit3'])) {
                $sm = $_POST['sm'];
                $so = $_POST['so'];
                $update1 = "UPDATE `titles` SET `sm`='$sm',`so`='$so' where id = 1";
                $conn->query($update1);
                echo "<div class='alert alert-success'> Updated Successfully</div>";
            }
            $sql = "SELECT * FROM titles WHERE id = 1;";
            $data = $conn->query($sql);
            
            $title = $data->fetch_assoc();


            ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <h3 class="text-dark text-center ml-2 mt-5">Reception Page:</h3>
                <div class="row">
                    <div class="form-check col-4">
                        <label for="name">Main Title:</label>
                        <input name="rm" id="taluka" value="<?php echo $title['rm'] ?>" class="form-control"
                            placeholder="" />
                    </div>
                    <div class="form-check col-4">
                        <label for="name">Other Titles:</label>
                        <input name="ro" id="district" value="<?php echo $title['ro'] ?>" class="form-control"
                            placeholder="" />
                    </div>
                </div>
                <div class="form-group m-2">
                    <button type="submit" name="submit1" class="btn btn-info">Submit
                    </button>
                </div>
            </form>
            <form method="POST" action="" enctype="multipart/form-data">
                <h3 class="text-dark text-center ml-2 mt-5">Doctor Page:</h3>
                <div class="row">
                    <div class="form-check col-4">
                        <label for="name">Main Title:</label>
                        <input name="dm" id="taluka" value="<?php echo $title['dm'] ?>" class="form-control"
                            placeholder="" />
                    </div>
                    <div class="form-check col-4">
                        <label for="name">Other Titles:</label>
                        <input name="do" id="district" value="<?php echo $title['do'] ?>" class="form-control"
                            placeholder="" />
                    </div>
                </div>
                <div class="form-group m-2">
                    <button type="submit" name="submit2" class="btn btn-info">Submit
                    </button>
                </div>
            </form>
            <form method="POST" action="" enctype="multipart/form-data">
                <h3 class="text-dark text-center ml-2 mt-5">Staff Page:</h3>
                <div class="row">
                    <div class="form-check col-4">
                        <label for="name">Main Title:</label>
                        <input name="sm" id="taluka" value="<?php echo $title['sm'] ?>" class="form-control"
                            placeholder="" />
                    </div>
                    <div class="form-check col-4">
                        <label for="name">Other Titles:</label>
                        <input name="so" id="district" value="<?php echo $title['so'] ?>" class="form-control"
                            placeholder="" />
                    </div>
                </div>
                <div class="form-group m-2">
                    <button type="submit" name="submit3" class="btn btn-info">Submit
                    </button>
                </div>
            </form>
            <form method="POST" action="" enctype="multipart/form-data">
                <h3 class="text-dark text-center ml-2 mt-5">Print Page:</h3>
                <div class="form-group m-2">
                    <label for="consultant">Title:</label>
                    <input type="text" name="title" id="consultant" value="<?php echo $title['title'] ?>"
                        class="form-control" placeholder="Title">
                    <label for="consultant">Address:</label>
                    <input type="text" name="address" id="consultant" value="<?php echo $title['address'] ?>"
                        class="form-control" placeholder="Address">
                    <label for="consultant">Mobile:</label>
                    <input type="text" name="mobile" id="consultant" value="<?php echo $title['mobile'] ?>"
                        class="form-control" placeholder="Mobile">


                </div>
                <div class="form-group m-2">
                    <button type="submit" name="submit" class="btn btn-info">Submit
                    </button>
                </div>

            </form>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-check col-3">
                        <label for="name">Current Logo:</label><br>
                        <?php echo '<img style="height: 8rem; width: 8rem;" src="data:image/jpeg;base64,' . base64_encode($title['logo']) . '"'; ?>
                    </div>


                    <div class="form-group m-2">
                        <label for="name">Change Logo:</label>
                        <input type="file" name="logo" id="consultant" class="form-control" placeholder="Mobile"
                            required>
                    </div>
                    <div class="form-group m-2">
                        <button type="submit" name="change" class="btn btn-info">Change
                        </button>
                    </div>
                </div>
                </from>

        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>