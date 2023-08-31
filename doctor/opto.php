<?php
$id = $_GET['id'];
require("../admin/connect.php");
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();

$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ophthalmologist</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../dropdown_styles.css">
    <style>
    body {
        height: 100%;
        width: 100%;
        background: #e9dfc4;
        background: -moz-linear-gradient(left, #e9dfc4 0%, #e9dfc4 1%, #ede3c8 2%, #ede3c8 24%, #ebddc3 25%, #e9dfc4 48%, #ebddc3 49%, #e6d8bd 52%, #e6d8bd 53%, #e9dbc0 54%, #e6d8bd 55%, #e6d8bd 56%, #e9dbc0 57%, #e6d8bd 58%, #e6d8bd 73%, #e9dbc0 74%, #e9dbc0 98%, #ebddc3 100%);
        background: -webkit-gradient(linear, left top, right top, color-stop(0%, #e9dfc4), color-stop(1%, #e9dfc4), color-stop(2%, #ede3c8), color-stop(24%, #ede3c8), color-stop(25%, #ebddc3), color-stop(48%, #e9dfc4), color-stop(49%, #ebddc3), color-stop(52%, #e6d8bd), color-stop(53%, #e6d8bd), color-stop(54%, #e9dbc0), color-stop(55%, #e6d8bd), color-stop(56%, #e6d8bd), color-stop(57%, #e9dbc0), color-stop(58%, #e6d8bd), color-stop(73%, #e6d8bd), color-stop(74%, #e9dbc0), color-stop(98%, #e9dbc0), color-stop(100%, #ebddc3));
        background: -webkit-linear-gradient(left, #e9dfc4 0%, #e9dfc4 1%, #ede3c8 2%, #ede3c8 24%, #ebddc3 25%, #e9dfc4 48%, #ebddc3 49%, #e6d8bd 52%, #e6d8bd 53%, #e9dbc0 54%, #e6d8bd 55%, #e6d8bd 56%, #e9dbc0 57%, #e6d8bd 58%, #e6d8bd 73%, #e9dbc0 74%, #e9dbc0 98%, #ebddc3 100%);
        background: -o-linear-gradient(left, #e9dfc4 0%, #e9dfc4 1%, #ede3c8 2%, #ede3c8 24%, #ebddc3 25%, #e9dfc4 48%, #ebddc3 49%, #e6d8bd 52%, #e6d8bd 53%, #e9dbc0 54%, #e6d8bd 55%, #e6d8bd 56%, #e9dbc0 57%, #e6d8bd 58%, #e6d8bd 73%, #e9dbc0 74%, #e9dbc0 98%, #ebddc3 100%);
        background: -ms-linear-gradient(left, #e9dfc4 0%, #e9dfc4 1%, #ede3c8 2%, #ede3c8 24%, #ebddc3 25%, #e9dfc4 48%, #ebddc3 49%, #e6d8bd 52%, #e6d8bd 53%, #e9dbc0 54%, #e6d8bd 55%, #e6d8bd 56%, #e9dbc0 57%, #e6d8bd 58%, #e6d8bd 73%, #e9dbc0 74%, #e9dbc0 98%, #ebddc3 100%);
        background: linear-gradient(to right, #e9dfc4 0%, #e9dfc4 1%, #ede3c8 2%, #ede3c8 24%, #ebddc3 25%, #e9dfc4 48%, #ebddc3 49%, #e6d8bd 52%, #e6d8bd 53%, #e9dbc0 54%, #e6d8bd 55%, #e6d8bd 56%, #e9dbc0 57%, #e6d8bd 58%, #e6d8bd 73%, #e9dbc0 74%, #e9dbc0 98%, #ebddc3 100%);
        background-size: 120px;
        background-repeat: repeat;
    }

    input {
        width: 5rem;
    }

    .shift-right-bottom {
        position: absolute;
        right: 0;
        margin-top: 50%;
    }

    .wid10 {
        height: 150px;
    }
    </style>
    <style>
    .image-box {
        position: relative;
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
        overflow: hidden;
        margin-bottom: 20px;
        height: 300px;
    }

    .zoom-image {
        transition: transform 0.3s;
        cursor: pointer;
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        z-index: 0;
    }

    .zoom-image:hover {
        transform: scale(1.2);
        z-index: 1;
    }

    .br-1 {
        display: flex;
        algin-items: center;
        justify-content: center;
    }

    .caption {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 5px;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        font-size: 14px;
        text-align: center;
        z-index: 2;
    }

    #fullscreenModal .modal-dialog {
        max-width: 100%;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #fullscreenModal .modal-content {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .delete-button {
        position: absolute;
        top: 5px;
        right: 5px;
        z-index: 2;
    }

    .print-button {
        position: absolute;
        top: 5px;
        left: 5px;
        z-index: 2;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-fill {
        flex: 1 0 33.333%;
    }

    .br4 {
        border-top: 3px solid black;
        width: 90%;

    }
    </style>
</head>

<body>
    <h1 class="text-center text-danger mt-3">
        <h1>
            <marquee style="color: purple;" BEHAVIOUR="slide" scrollnount="70" scrolledeley="100">
                <?php echo $title['do'] ?>
            </marquee>
        </h1>
    </h1>
    <!-- Container for the buttons -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="btn-group" role="group">
                    <!-- 10 Buttons at the top -->
                    <a class="btn btn-primary" href="short_rx_print.php?id=<?php echo $id; ?>">Short +Rx</a>
                    <a class="btn btn-primary" href="rx_print.php?id=<?php echo $id; ?>">Rx</a>
                    <a class="btn btn-primary" href="spect_print.php?id=<?php echo $id; ?>">Spect </a>
                    <a class="btn btn-primary" href="spect_rx_print.php?id=<?php echo $id; ?>">Spect +Rx</a>
                    <a class="btn btn-primary" href="ex_rx_print.php?id=<?php echo $id; ?>">Ex +Rx</a>
                    <a class="btn btn-primary" href="ex_spect_rx_print.php?id=<?php echo $id; ?>">Ex + Spect +Rx</a>
                    <a class="btn btn-primary" href="ex_dig_rx_print.php?id=<?php echo $id; ?>">Ex + Dig +Rx</a>
                    <a class="btn btn-primary" href="glass_ex_dig_print.php?id=<?php echo $id; ?>">Glass +Ex + Dig
                        +Rx</a>
                    <a class="btn btn-primary" href="ascan_print.php?id=<?php echo $id; ?>">A-Scan</a>
                </div>
            </div>
        </div>
    </div>

    <a href="doctorPage.php" class="btn btn-success m-2">Dashboard</a>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row ">

                    <div class="col-md-3">
                        <label class="form-label">Name:
                            <?php echo $res['name']; ?>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Age:
                            <?php echo $res['age']; ?>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Sex:
                            <?php echo $res['sex']; ?>
                        </label>
                    </div>
                    <div class="col-md-3"><label class="form-label">UHID No:
                            <?php echo $res2['uhid']; ?>
                        </label></div>

                    <div class="col-md-3">
                        <label class="form-label">Date of Admission :
                            <?php echo $res2['date']; ?>
                        </label>
                    </div>
                    <?php
                    $sql5 = "SELECT * FROM `cc_glass_rx`  WHERE `id`= '$id'";
                    $data5 = $conn->query($sql5);
                    $result5 = $data5->fetch_assoc();
                    ?>
                    <div class="col-md-3">
                        <label class="form-label" for="time_ad"> Visit NO. :
                        </label>
                        <input type="text" class="form-control-sm inline" name="visit_no"
                            value="<?php echo $result5['visit_no']; ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="time_ad"> Fees :
                        </label> <input type="text" class="form-control-sm inline" name="fees"
                            value="<?php echo $result5['fees']; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="btn-group" role="group">
                    <!-- 5 Buttons at the bottom -->
                    <button type="button" class="btn btn-secondary content-button active" data-target="content1"
                        id="first-btn">REFRACTION</button>
                    <button type="button" class="btn btn-secondary content-button" data-target="content2"
                        id="examination">EXAMINATION</button>
                    <button type="button" class="btn btn-secondary content-button"
                        data-target="content3">A-Scan</button>
                    <button type="button" class="btn btn-secondary content-button" data-target="content6"
                        id="attach-btn">PRESCRPTION</button>
                    <button type="button" class="btn btn-secondary content-button"
                        data-target="content4">SURGERY</button>
                    <button type="button" class="btn btn-secondary content-button" data-target="content5"
                        id="attach-btn">ATTACHMENT</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Container for the content -->
    <!-- C.c + Glass + Rx -->

    <div id="content1" class="content container-fluid" style="display: none;">
        <div class="row mt-5">
            <div class="col-5 offset-1">
                <label class="form-label" for="time_ad"><strong>Complaints:</strong>
                    <textarea class="form-control live-fetch"
                        style="width: 30rem; height: 70px; border:2px solid black;" rows="5" name="complaints"
                        data-column="complaints"
                        data-table="cc_glass_rx"><?php echo $result5['complaints']; ?></textarea>
                    <div class="dropdown-container"></div>
            </div>
            <div class="col-5 offset-1">
                <label class="form-label" for="time_ad"><strong>Past H/o:</strong>
                    <textarea class="form-control live-fetch"
                        style="width: 30rem; height: 70px; border:2px solid black;" rows="5" name="past_his"
                        data-column="past_his" data-table="cc_glass_rx"><?php echo $result5['past_his']; ?></textarea>
                    <div class="dropdown-container"></div>
            </div>

        </div>
        <div class="br-1 mt-2">
            <div class="br4 mt-3"></div>
        </div>
        <!-- first row -->
        <div class="row mt-4">

            <div class="col-8 offset-1">
                <div class="row">
                    <div class="col"><strong>Glass details:</strong></div>
                    <div class="col"><strong>RE:</strong></div>
                    <div class="col"><strong>LE:</strong></div>
                </div>

                <table class="table table-bordered border-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th class="w-2">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                            <th scope="col">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">DIST</th>
                            <th><input type="text" name="dist_input_1" value="<?php echo $result5['dist_input_1']; ?>"
                                    class="live-fetch" data-column="dist_input_1" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist_input_2" value="<?php echo $result5['dist_input_2']; ?>"
                                    class="live-fetch" data-column="dist_input_2" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist_input_3" value="<?php echo $result5['dist_input_3']; ?>"
                                    class="live-fetch" data-column="dist_input_3" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist_input_4" value="<?php echo $result5['dist_input_4']; ?>"
                                    class="live-fetch" data-column="dist_input_4" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist_input_5" value="<?php echo $result5['dist_input_5']; ?>"
                                    class="live-fetch" data-column="dist_input_5" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist_input_6" value="<?php echo $result5['dist_input_6']; ?>"
                                    class="live-fetch" data-column="dist_input_6" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist_input_7" value="<?php echo $result5['dist_input_7']; ?>"
                                    class="live-fetch" data-column="dist_input_7" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist_input_8" value="<?php echo $result5['dist_input_8']; ?>"
                                    class="live-fetch" data-column="dist_input_8" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">NEAR</th>
                            <td><input type="text" name="near_input_1" value="<?php echo $result5['near_input_1']; ?>"
                                    class="live-fetch" data-column="near_input_1" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near_input_2" value="<?php echo $result5['near_input_2']; ?>"
                                    class="live-fetch" data-column="near_input_2" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near_input_3" value="<?php echo $result5['near_input_3']; ?>"
                                    class="live-fetch" data-column="near_input_3" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near_input_4" value="<?php echo $result5['near_input_4']; ?>"
                                    class="live-fetch" data-column="near_input_4" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near_input_5" value="<?php echo $result5['near_input_5']; ?>"
                                    class="live-fetch" data-column="near_input_5" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near_input_6" value="<?php echo $result5['near_input_6']; ?>"
                                    class="live-fetch" data-column="near_input_6" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near_input_7" value="<?php echo $result5['near_input_7']; ?>"
                                    class="live-fetch" data-column="near_input_7" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near_input_8" value="<?php echo $result5['near_input_8']; ?>"
                                    class="live-fetch" data-column="near_input_8" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-2 mt-5">
                <div class="col my-2">
                    <label class="form-label" for="time_ad">BE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="be_add" data-column="be_add"
                        value="<?php echo $result5['be_add'];?>" data-table="cc_glass_rx">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">RE:</label>
                    <input type="text" class="form-control-sm inline mx-4 live-fetch" name="re"
                        value="<?php echo $result5['re']; ?>" class="live-fetch" data-column="re"
                        data-table="cc_glass_rx">
                    <div class="dropdown-container" style="left:4.8rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">LE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="le_add"
                        value="<?php echo $result5['le_add']; ?>" data-column="le_add" data-table="cc_glass_rx">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-1">
                <label class="form-label" for="time_ad">Glass Type:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass_type"
                    value="<?php echo $result5['glass_type']; ?>" data-column="glass_type" data-table="cc_glass_rx">
                <div class="dropdown-container" style="left:6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Color:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass_colour"
                    value="<?php echo $result5['glass_colour']; ?>" data-column="glass_colour" data-table="cc_glass_rx">
                <div class="dropdown-container" style="left:6.25rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Use:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass_use"
                    value="<?php echo $result5['glass_use']; ?>" data-column="glass_use" data-table="cc_glass_rx">
                <div class="dropdown-container" style="left:5.6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">PD:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="pd"
                    value="<?php echo $result5['pd']; ?>" data-column="pd" data-table="cc_glass_rx">
                <div class="dropdown-container" style="left:2.5rem;"></div>
            </div>
        </div>
        <div class="br-1 mt-2">
            <div class="br4 mt-3"></div>
        </div>
        <!-- second row -->
        <?php
        $sql5 = "SELECT * FROM `cc_glass_rx1`  WHERE `id`= '$id'";
        $data5 = $conn->query($sql5);
        $result5 = $data5->fetch_assoc();
        ?>
        <div class="row mt-4">
            <div class="col-8 offset-1">
                <div class="row">
                    <div class="col"><strong>ADD AR:</strong></div>
                    <div class="col"><strong>RE:</strong></div>
                    <div class="col"><strong>LE:</strong></div>
                </div>

                <table class="table table-bordered border-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th class="w-2">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                            <th scope="col">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">DIST</th>
                            <th><input type="text" name="dist1_input_1" value="<?php echo $result5['dist1_input_1']; ?>"
                                    class="live-fetch" data-column="dist1_input_1" data-table="cc_glass_rx">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_2" value="<?php echo $result5['dist1_input_2']; ?>"
                                    class="live-fetch" data-column="dist1_input_2" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_3" value="<?php echo $result5['dist1_input_3']; ?>"
                                    class="live-fetch" data-column="dist1_input_3" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_4" value="<?php echo $result5['dist1_input_4']; ?>"
                                    class="live-fetch" data-column="dist1_input_4" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_5" value="<?php echo $result5['dist1_input_5']; ?>"
                                    class="live-fetch" data-column="dist1_input_5" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_6" value="<?php echo $result5['dist1_input_6']; ?>"
                                    class="live-fetch" data-column="dist1_input_6" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_7" value="<?php echo $result5['dist1_input_7']; ?>"
                                    class="live-fetch" data-column="dist1_input_7" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist1_input_8" value="<?php echo $result5['dist1_input_8']; ?>"
                                    class="live-fetch" data-column="dist1_input_8" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">NEAR</th>
                            <td><input type="text" name="near1_input_1" value="<?php echo $result5['near1_input_1']; ?>"
                                    class="live-fetch" data-column="near1_input_1" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_2" value="<?php echo $result5['near1_input_2']; ?>"
                                    class="live-fetch" data-column="near1_input_2" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_3" value="<?php echo $result5['near1_input_3']; ?>"
                                    class="live-fetch" data-column="near1_input_3" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_4" value="<?php echo $result5['near1_input_4']; ?>"
                                    class="live-fetch" data-column="near1_input_4" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_5" value="<?php echo $result5['near1_input_5']; ?>"
                                    class="live-fetch" data-column="near1_input_5" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_6" value="<?php echo $result5['near1_input_6']; ?>"
                                    class="live-fetch" data-column="near1_input_6" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_7" value="<?php echo $result5['near1_input_7']; ?>"
                                    class="live-fetch" data-column="near1_input_7" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near1_input_8" value="<?php echo $result5['near1_input_8']; ?>"
                                    class="live-fetch" data-column="near1_input_8" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-2 mt-5">
                <div class="col my-2">
                    <label class="form-label" for="time_ad">BE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="be1_add" data-column="be1_add"
                        value="<?php echo $result5['be1_add'];?>" data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">RE:</label>
                    <input type="text" class="form-control-sm inline mx-4 live-fetch" name="re1"
                        value="<?php echo $result5['re1']; ?>" class="live-fetch" data-column="re1"
                        data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:4.8rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">LE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="le1_add"
                        value="<?php echo $result5['le1_add']; ?>" data-column="le1_add" data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-1">
                <label class="form-label" for="time_ad">Glass Type:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass1_type"
                    value="<?php echo $result5['glass1_type']; ?>" data-column="glass1_type" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Color:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass1_colour"
                    value="<?php echo $result5['glass1_colour']; ?>" data-column="glass1_colour"
                    data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:6.25rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Use:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass1_use"
                    value="<?php echo $result5['glass1_use']; ?>" data-column="glass1_use" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:5.6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">PD:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="pd1"
                    value="<?php echo $result5['pd1']; ?>" data-column="pd1" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:2.5rem;"></div>
            </div>
        </div>

        <!-- thIrd row -->
        <div class="br-1 mt-2">
            <div class="br4 mt-3"></div>
        </div>
        <div class="row mt-4">
            <div class="col-8 offset-1">

                <div class="row">
                    <div class="col"><strong>TYCLO TLIGC:</strong></div>
                    <div class="col"><strong>RE:</strong></div>
                    <div class="col"><strong>LE:</strong></div>
                </div>

                <table class="table table-bordered border-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th class="w-2">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                            <th scope="col">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">DIST</th>
                            <th><input type="text" name="dist2_input_1" value="<?php echo $result5['dist2_input_1']; ?>"
                                    class="live-fetch" data-column="dist2_input_1" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist2_input_2" value="<?php echo $result5['dist2_input_2']; ?>"
                                    class="live-fetch" data-column="dist2_input_2" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist2_input_3" value="<?php echo $result5['dist2_input_3']; ?>"
                                    class="live-fetch" data-column="dist2_input_3" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist2_input_4" value="<?php echo $result5['dist2_input_4']; ?>"
                                    class="live-fetch" data-column="dist2_input_4" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist2_input_5" value="<?php echo $result5['dist2_input_5']; ?>"
                                    class="live-fetch" data-column="dist2_input_5" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist2_input_6" value="<?php echo $result5['dist2_input_6']; ?>"
                                    class="live-fetch" data-column="dist2_input_6" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist2_input_7" value="<?php echo $result5['dist2_input_7']; ?>"
                                    class="live-fetch" data-column="dist2_input_7" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist2_input_8" value="<?php echo $result5['dist2_input_8']; ?>"
                                    class="live-fetch" data-column="dist2_input_8" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">NEAR</th>
                            <td><input type="text" name="near2_input_1" value="<?php echo $result5['near2_input_1']; ?>"
                                    class="live-fetch" data-column="near2_input_1" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near2_input_2" value="<?php echo $result5['near2_input_2']; ?>"
                                    class="live-fetch" data-column="near2_input_2" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near2_input_3" value="<?php echo $result5['near2_input_3']; ?>"
                                    class="live-fetch" data-column="near2_input_3" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near2_input_4" value="<?php echo $result5['near2_input_4']; ?>"
                                    class="live-fetch" data-column="near2_input_4" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near2_input_5" value="<?php echo $result5['near2_input_5']; ?>"
                                    class="live-fetch" data-column="near2_input_5" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near2_input_6" value="<?php echo $result5['near2_input_6']; ?>"
                                    class="live-fetch" data-column="near2_input_6" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near2_input_7" value="<?php echo $result5['near2_input_7']; ?>"
                                    class="live-fetch" data-column="near2_input_7" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near2_input_8" value="<?php echo $result5['near2_input_8']; ?>"
                                    class="live-fetch" data-column="near2_input_8" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-2 mt-5">
                <div class="col my-2">
                    <label class="form-label" for="time_ad">BE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="be2_add" data-column="be2_add"
                        value="<?php echo $result5['be2_add'];?>" data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">RE:</label>
                    <input type="text" class="form-control-sm inline mx-4 live-fetch" name="re2"
                        value="<?php echo $result5['re2']; ?>" class="live-fetch" data-column="re2"
                        data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:4.8rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">LE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="le2_add"
                        value="<?php echo $result5['le2_add']; ?>" data-column="le2_add" data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-1">
                <label class="form-label" for="time_ad">Glass Type:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass2_type"
                    value="<?php echo $result5['glass2_type']; ?>" data-column="glass2_type" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Color:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass2_colour"
                    value="<?php echo $result5['glass2_colour']; ?>" data-column="glass2_colour"
                    data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:6.25rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Use:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass2_use"
                    value="<?php echo $result5['glass2_use']; ?>" data-column="glass2_use" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:5.6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">PD:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="pd2"
                    value="<?php echo $result5['pd2']; ?>" data-column="pd2" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:2.5rem;"></div>
            </div>
        </div>
        <!-- fourth row -->
        <div class="br-1 mt-2">
            <div class="br4 mt-3"></div>
        </div>
        <div class="row mt-4">
            <div class="col-8 offset-1">


                <div class="row">
                    <div class="col"><strong>PGP:</strong></div>
                    <div class="col"><strong>RE:</strong></div>
                    <div class="col"><strong>LE:</strong></div>
                </div>

                <table class="table table-bordered border-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th class="w-2">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                            <th scope="col">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">DIST</th>
                            <th><input type="text" name="dist3_input_1" value="<?php echo $result5['dist3_input_1']; ?>"
                                    class="live-fetch" data-column="dist3_input_1" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist3_input_2" value="<?php echo $result5['dist3_input_2']; ?>"
                                    class="live-fetch" data-column="dist3_input_2" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist3_input_3" value="<?php echo $result5['dist3_input_3']; ?>"
                                    class="live-fetch" data-column="dist3_input_3" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist3_input_4" value="<?php echo $result5['dist3_input_4']; ?>"
                                    class="live-fetch" data-column="dist3_input_4" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist3_input_5" value="<?php echo $result5['dist3_input_5']; ?>"
                                    class="live-fetch" data-column="dist3_input_5" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist3_input_6" value="<?php echo $result5['dist3_input_6']; ?>"
                                    class="live-fetch" data-column="dist3_input_6" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist3_input_7" value="<?php echo $result5['dist3_input_7']; ?>"
                                    class="live-fetch" data-column="dist3_input_7" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist3_input_8" value="<?php echo $result5['dist3_input_8']; ?>"
                                    class="live-fetch" data-column="dist3_input_8" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">NEAR</th>
                            <td><input type="text" name="near3_input_1" value="<?php echo $result5['near3_input_1']; ?>"
                                    class="live-fetch" data-column="near3_input_1" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near3_input_2" value="<?php echo $result5['near3_input_2']; ?>"
                                    class="live-fetch" data-column="near3_input_2" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near3_input_3" value="<?php echo $result5['near3_input_3']; ?>"
                                    class="live-fetch" data-column="near3_input_3" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near3_input_4" value="<?php echo $result5['near3_input_4']; ?>"
                                    class="live-fetch" data-column="near3_input_4" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near3_input_5" value="<?php echo $result5['near3_input_5']; ?>"
                                    class="live-fetch" data-column="near3_input_5" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near3_input_6" value="<?php echo $result5['near3_input_6']; ?>"
                                    class="live-fetch" data-column="near3_input_6" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near3_input_7" value="<?php echo $result5['near3_input_7']; ?>"
                                    class="live-fetch" data-column="near3_input_7" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near3_input_8" value="<?php echo $result5['near3_input_8']; ?>"
                                    class="live-fetch" data-column="near3_input_8" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-2 mt-5">
                <div class="col my-2">
                    <label class="form-label" for="time_ad">BE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="be3_add" data-column="be3_add"
                        value="<?php echo $result5['be3_add'];?>" data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">RE:</label>
                    <input type="text" class="form-control-sm inline mx-4 live-fetch" name="re3"
                        value="<?php echo $result5['re3']; ?>" class="live-fetch" data-column="re3"
                        data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:4.8rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">LE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="le3_add"
                        value="<?php echo $result5['le3_add']; ?>" data-column="le3_add" data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-1">
                <label class="form-label" for="time_ad">Glass Type:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass3_type"
                    value="<?php echo $result5['glass3_type']; ?>" data-column="glass3_type" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Color:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass3_colour"
                    value="<?php echo $result5['glass3_colour']; ?>" data-column="glass3_colour"
                    data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:6.25rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Use:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass3_use"
                    value="<?php echo $result5['glass3_use']; ?>" data-column="glass3_use" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:5.6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">PD:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="pd3"
                    value="<?php echo $result5['pd3']; ?>" data-column="pd3" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:2.5rem;"></div>
            </div>
        </div>

        <!-- FIFTH ROW -->

        <div class="br-1 mt-2">
            <div class="br4 mt-3"></div>
        </div>
        <div class="row mt-4">
            <div class="col-8 offset-1">


                <div class="row">
                    <div class="col"><strong>TODAY GLASS PRESCRIPTIOM:</strong></div>
                    <div class="col"><strong>RE:</strong></div>
                    <div class="col"><strong>LE:</strong></div>
                </div>

                <table class="table table-bordered border-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th class="w-2">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                            <th scope="col">SPH</th>
                            <th scope="col">CYL</th>
                            <th scope="col">AXIS</th>
                            <th scope="col">Vision</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">DIST</th>
                            <th><input type="text" name="dist4_input_1" value="<?php echo $result5['dist4_input_1']; ?>"
                                    class="live-fetch" data-column="dist4_input_1" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist4_input_2" value="<?php echo $result5['dist4_input_2']; ?>"
                                    class="live-fetch" data-column="dist4_input_2" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist4_input_3" value="<?php echo $result5['dist4_input_3']; ?>"
                                    class="live-fetch" data-column="dist4_input_3" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist4_input_4" value="<?php echo $result5['dist4_input_4']; ?>"
                                    class="live-fetch" data-column="dist4_input_4" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist4_input_5" value="<?php echo $result5['dist4_input_5']; ?>"
                                    class="live-fetch" data-column="dist4_input_5" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist4_input_6" value="<?php echo $result5['dist4_input_6']; ?>"
                                    class="live-fetch" data-column="dist4_input_6" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist4_input_7" value="<?php echo $result5['dist4_input_7']; ?>"
                                    class="live-fetch" data-column="dist4_input_7" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                            <th><input type="text" name="dist4_input_8" value="<?php echo $result5['dist4_input_8']; ?>"
                                    class="live-fetch" data-column="dist4_input_8" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col">NEAR</th>
                            <td><input type="text" name="near4_input_1" value="<?php echo $result5['near4_input_1']; ?>"
                                    class="live-fetch" data-column="near4_input_1" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near4_input_2" value="<?php echo $result5['near4_input_2']; ?>"
                                    class="live-fetch" data-column="near4_input_2" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near4_input_3" value="<?php echo $result5['near4_input_3']; ?>"
                                    class="live-fetch" data-column="near4_input_3" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near4_input_4" value="<?php echo $result5['near4_input_4']; ?>"
                                    class="live-fetch" data-column="near4_input_4" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near4_input_5" value="<?php echo $result5['near4_input_5']; ?>"
                                    class="live-fetch" data-column="near4_input_5" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near4_input_6" value="<?php echo $result5['near4_input_6']; ?>"
                                    class="live-fetch" data-column="near4_input_6" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near4_input_7" value="<?php echo $result5['near4_input_7']; ?>"
                                    class="live-fetch" data-column="near4_input_7" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="near4_input_8" value="<?php echo $result5['near4_input_8']; ?>"
                                    class="live-fetch" data-column="near4_input_8" data-table="cc_glass_rx1">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-2 mt-5">
                <div class="col my-2">
                    <label class="form-label" for="time_ad">BE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="be4_add" data-column="be4_add"
                        value="<?php echo $result5['be4_add'];?>" data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">RE:</label>
                    <input type="text" class="form-control-sm inline mx-4 live-fetch" name="re4"
                        value="<?php echo $result5['re4']; ?>" class="live-fetch" data-column="re4"
                        data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:4.8rem;"></div>
                </div>
                <div class="col my-2">
                    <label class="form-label" for="time_ad">LE ADD:</label>
                    <input type="text" class="form-control-sm inline live-fetch" name="le4_add"
                        value="<?php echo $result5['le4_add']; ?>" data-column="le4_add" data-table="cc_glass_rx1">
                    <div class="dropdown-container" style="left:5rem;"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 offset-1">
                <label class="form-label" for="time_ad">Glass Type:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass4_type"
                    value="<?php echo $result5['glass4_type']; ?>" data-column="glass4_type" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Color:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass4_colour"
                    value="<?php echo $result5['glass4_colour']; ?>" data-column="glass4_colour"
                    data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:6.25rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">Glass Use:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="glass4_use"
                    value="<?php echo $result5['glass4_use']; ?>" data-column="glass4_use" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:5.6rem;"></div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="time_ad">PD:</label>
                <input type="text" class="form-control-sm inline live-fetch" name="pd4"
                    value="<?php echo $result5['pd4']; ?>" data-column="pd4" data-table="cc_glass_rx1">
                <div class="dropdown-container" style="left:2.5rem;"></div>
            </div>
        </div>



        <!-- row end -->



        <div class="card shadow my-5">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">Add medicines</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="" id="medicine-form">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="col-1">Types</th>
                                    <th class="col-3">Medicine</th>
                                    <th class="col-1">सकाळ</th>
                                    <th class="col-1">दुपार</th>
                                    <th class="col-1">रात्र</th>
                                    <th class="col-1">कधी घ्यायच्या </th>
                                    <th class="col-1">किती दिवस </th>
                                    <th class="col-1">Qty</th>
                                    <th class="col-1">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                $sql = "SELECT * FROM opto_pres WHERE patient_id = $id ORDER BY id DESC;";
                                $data = $conn->query($sql);
                                $i = 1;
                                while ($res = $data->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $res['type'] . '</td>';
                                    echo '<td>' . $res['med_name'] . '</td>';
                                    echo '<td>' . $res['morning'] . '</td>';
                                    echo '<td>' . $res['afternoon'] . '</td>';
                                    echo '<td>' . $res['night'] . '</td>';
                                    echo '<td>' . $res['eat'] . '</td>';
                                    echo '<td>' . $res['days'] . '</td>';
                                    echo '<td>' . $res['quantity'] . '</td>';
                                    echo "<td><button type='button' value='{$res['id']}' class='btn btn-primary delete-btn'>Delete</button></td>";
                                    echo '</tr>';
                                    $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </form>
                </div>
                <button type="button" class="btn btn-info" onclick="addItem1();">Add Medicine</button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 offset-1">
                <label class="form-label" for="time_ad"><strong>Advice:</strong>
                    <textarea class="form-control live-fetch"
                        style="width: 30rem; height: 70px; border:2px solid black;" rows="5" name="advice"
                        data-column="advice" data-table="cc_glass_rx"><?php echo $result5['advice']; ?></textarea>
                    <div class="dropdown-container"></div>
            </div>
            <div class="col-5 ">
                <label class="form-label" for="time_ad"><strong>फेर तपासणी:</strong></label>
                <div>
                    <input type="text" class="form-control-sm live-fetch" style="width: 15rem;" name="fer"
                        value="<?php echo $result5['fer']; ?>" data-column="fer" data-table="cc_glass_rx">
                    <div class="dropdown-container"></div>
                </div>
            </div>
        </div>
        <div class="col-3 offset-1 mt-1">
            <button class="btn btn-success mb-5 save_glass" id="save-1">Save</button>
        </div>




    </div>

    <!-- EXAMINATION -->
    <?php
    $sql = "SELECT * FROM `opto_examination`  WHERE `id`= '$id' ";
    $data = $conn->query($sql);
    $result = $data->fetch_assoc();
    ?>

    <div id="content2" class="content container-fluid" style="display: none;">
        <div class="row">
            <div class="col-7 offset-1">
                <table class="table table-bordered border-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col"> <input type="checkbox" id="checkbox2" name="wnl"
                                    <?php echo (isset($result['wnl']) && $result['wnl'] === 'on') ? 'value = "on" checked' : 'value="off"'; ?>>
                                WNL
                            <th scope="col" class="text-center">RE/OD</th>
                            <th scope="col" class="text-center">LE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">LIDS</th>
                            <td><input type="text" name="lids_1" value="<?php echo $result['lids_1']; ?>"
                                    style="width: 19rem;" class="live-fetch" data-column="lids_1"
                                    data-table="opto_examination">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="lids_2" value="<?php echo $result['lids_2']; ?>"
                                    class="live-fetch" data-column="lids_2" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">CONJUCTIVE</th>
                            <td><input type="text" name="conjunctive_1" value="<?php echo $result['conjunctive_1']; ?>"
                                    class="live-fetch" data-column="conjunctive_1" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="conjunctive_2" value="<?php echo $result['conjunctive_2']; ?>"
                                    class="live-fetch" data-column="conjunctive_2" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">CORNEA</th>
                            <td><input type="text" name="cornea_1" value="<?php echo $result['cornea_1']; ?>"
                                    class="live-fetch" data-column="cornea_1" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="cornea_2" value="<?php echo $result['cornea_2']; ?>"
                                    class="live-fetch" data-column="cornea_2" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">A/C</th>
                            <td><input type="text" name="ac_1" value="<?php echo $result['ac_1']; ?>" class="live-fetch"
                                    data-column="ac_1" data-table="opto_examination" style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="ac_2" value="<?php echo $result['ac_2']; ?>" class="live-fetch"
                                    data-column="ac_2" data-table="opto_examination" style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">PUPIL</th>
                            <td><input type="text" name="pupil_1" value="<?php echo $result['pupil_1']; ?>"
                                    class="live-fetch" data-column="pupil_1" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="pupil_2" value="<?php echo $result['pupil_2']; ?>"
                                    class="live-fetch" data-column="pupil_2" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">LENS</th>
                            <td><input type="text" name="lens_1" value="<?php echo $result['lens_1']; ?>"
                                    class="live-fetch" data-column="lens_1" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="lens_2" value="<?php echo $result['lens_2']; ?>"
                                    class="live-fetch" data-column="lens_2" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">FUNDUS</th>
                            <td><input type="text" name="fundus_1" value="<?php echo $result['fundus_1']; ?>"
                                    class="live-fetch" data-column="fundus_2" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="fundus_2" value="<?php echo $result['fundus_2']; ?>"
                                    class="live-fetch" data-column="fundus_2" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">SAC</th>
                            <td><input type="text" name="sac_1" value="<?php echo $result['sac_1']; ?>"
                                    class="live-fetch" data-column="sac_1" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="sac_2" value="<?php echo $result['sac_2']; ?>"
                                    class="live-fetch" data-column="sac_2" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">IOP</th>
                            <td><input type="text" name="iop_1" value="<?php echo $result['iop_1']; ?>"
                                    class="live-fetch" data-column="iop_1" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="iop_2" value="<?php echo $result['iop_2']; ?>"
                                    class="live-fetch" data-column="iop_2" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">DIAGNOSIS</th>
                            <td><input type="text" name="diagnosis_1" value="<?php echo $result['diagnosis_1']; ?>"
                                    class="live-fetch" data-column="diagnosis_1" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="diagnosis_2" value="<?php echo $result['diagnosis_2']; ?>"
                                    class="live-fetch" data-column="diagnosis_2" data-table="opto_examination"
                                    style="width: 19rem;">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="col-3 mr-4">
                <table class="table table-bordered border-dark mt-4">
                    <thead>
                        <th scope="col"></th>
                        <th scope="col" class="text-center">RE</th>
                        <th scope="col" class="text-center">LE</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-center">Vision: </th>
                            <td><input type="text" name="vision_1" class="live-fetch" data-column="vision_1"
                                    data-table="opto_examination" value="<?php echo $result['vision_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="vision_2" class="live-fetch" data-column="vision_2"
                                    data-table="opto_examination" value="<?php echo $result['vision_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">V/A Spect: </th>
                            <td><input type="text" name="via_spect_1" class="live-fetch" data-column="via_spect_1"
                                    data-table="opto_examination" value="<?php echo $result['via_spect_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="via_spect_2" class="live-fetch" data-column="via_spect_2"
                                    data-table="opto_examination" value="<?php echo $result['via_spect_2']; ?>">

                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">V/A PH: </th>
                            <td><input type="text" name="via_ph_1" class="live-fetch" data-column="via_ph_1"
                                    data-table="opto_examination" value="<?php echo $result['via_ph_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="via_ph_2" class="live-fetch" data-column="via_ph_2"
                                    data-table="opto_examination" value="<?php echo $result['via_ph_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">AT: </th>
                            <td><input type="text" name="at_1" class="live-fetch" data-column="at_1"
                                    data-table="opto_examination" value="<?php echo $result['at_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="at_2" class="live-fetch" data-column="at_2"
                                    data-table="opto_examination" value="<?php echo $result['at_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group m-3 mt-5">
                    <label for="" class="mr-1">Select Diagram: </label><select type="text" style="width:11rem;"
                        id="select-dig" class="form-control-sm">
                    </select>
                </div>
                <div class="mb-4" style="width: 100%; height: 17rem;" id="dig-preview">
                    <img src="" alt=" Diagram Preview">

                </div>
            </div>
            <div class="col-6 offset-2 mb-5">
                <table class="table table-bordered border-dark mt-4">
                    <thead>
                        <th scope="col"></th>
                        <th scope="col">SPH</th>
                        <th scope="col">CYL</th>
                        <th scope="col">AXIS</th>
                        <th scope="col">SPH</th>
                        <th scope="col">CYL</th>
                        <th scope="col">AXIS</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">AR: </th>
                            <td><input type="text" name="ar_sph_1" class="live-fetch" data-column="ar_sph_1"
                                    data-table="opto_examination" value="<?php echo $result['ar_sph_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="ar_cyl_1" class="live-fetch" data-column="ar_cyl_1"
                                    data-table="opto_examination" value="<?php echo $result['ar_cyl_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="ar_axis_1" class="live-fetch" data-column="ar_axis_1"
                                    data-table="opto_examination" value="<?php echo $result['ar_axis_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="ar_sph_2" class="live-fetch" data-column="ar_sph_2"
                                    data-table="opto_examination" value="<?php echo $result['ar_sph_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="ar_cyl_2" class="live-fetch" data-column="ar_cyl_2"
                                    data-table="opto_examination" value="<?php echo $result['ar_cyl_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" name="ar_axis_2" class="live-fetch" data-column="ar_axis_2"
                                    data-table="opto_examination" value="<?php echo $result['ar_axis_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-3 offset-1">

                <button class="btn btn-success mb-5 save_examination">Save</button>
            </div>
        </div>
    </div>

    <!-- A-Scan -->
    <?php
    $sql6 = "SELECT * FROM `opto_ascan` WHERE `id`='$id'";
    $data6 = $conn->query($sql6);
    $result6 = $data6->fetch_assoc();
    ?>
    <div id="content3" class="content container" style="display: none;">
        <div class="row">
            <div class="col-7  mb-5">
                <table class="table table-bordered border-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col" class="text-center">RE/OD</th>
                            <th scope="col" class="text-center">LE/OS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">K1</th>
                            <td><input type="text" style="width: 19rem;" name="k1_1" class="live-fetch"
                                    data-column="k1_1" data-table="opto_ascan" value="<?php echo $result6['k1_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" style="width: 19rem;" name="k1_2" class="live-fetch"
                                    data-column="k1_2" data-table="opto_ascan" value="<?php echo $result6['k1_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">K2</th>
                            <td><input type="text" style="width: 19rem;" name="k2_1" class="live-fetch"
                                    data-column="k2_1" data-table="opto_ascan" value="<?php echo $result6['k2_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" style="width: 19rem;" name="k2_2" class="live-fetch"
                                    data-column="k2_2" data-table="opto_ascan" value="<?php echo $result6['k2_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">AVG. K.</th>
                            <td><input type="text" style="width: 19rem;" name="avg_1" class="live-fetch"
                                    data-column="avg_1" data-table="opto_ascan"
                                    value="<?php echo $result6['avg_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" style="width: 19rem;" name="avg_2" class="live-fetch"
                                    data-column="avg_2" data-table="opto_ascan"
                                    value="<?php echo $result6['avg_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">AXL</th>
                            <td><input type="text" style="width: 19rem;" name="axl_1" class="live-fetch"
                                    data-column="axl_1" data-table="opto_ascan"
                                    value="<?php echo $result6['axl_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" style="width: 19rem;" name="axl_2" class="live-fetch"
                                    data-column="axl_2" data-table="opto_ascan"
                                    value="<?php echo $result6['axl_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">ACD</th>
                            <td><input type="text" style="width: 19rem;" name="acd_1" class="live-fetch"
                                    data-column="acd_1" data-table="opto_ascan"
                                    value="<?php echo $result6['acd_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" style="width: 19rem;" name="acd_2" class="live-fetch"
                                    data-column="acd_2" data-table="opto_ascan"
                                    value="<?php echo $result6['acd_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">A CONST.</th>
                            <td><input type="text" style="width: 19rem;" name="aconst_1" class="live-fetch"
                                    data-column="aconst_1" data-table="opto_ascan"
                                    value="<?php echo $result6['aconst_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" style="width: 19rem;" name="aconst_2" class="live-fetch"
                                    data-column="aconst_2" data-table="opto_ascan"
                                    value="<?php echo $result6['aconst_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">FORMULA</th>
                            <td><input type="text" style="width: 19rem;" name="formula_1" class="live-fetch"
                                    data-column="formula_1" data-table="opto_ascan"
                                    value="<?php echo $result6['formula_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" style="width: 19rem;" name="formula_2" class="live-fetch"
                                    data-column="formula_2" data-table="opto_ascan"
                                    value="<?php echo $result6['formula_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">IOL</th>
                            <td><input type="text" style="width: 19rem;" name="iol_1" class="live-fetch"
                                    data-column="iol_1" data-table="opto_ascan"
                                    value="<?php echo $result6['iol_1']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                            <td><input type="text" style="width: 19rem;" name="iol_2" class="live-fetch"
                                    data-column="iol_2" data-table="opto_ascan"
                                    value="<?php echo $result6['iol_2']; ?>">
                                <div class="dropdown-container"></div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="offset-2">
            <button class="btn btn-success mb-5 save_ascan">Save</button>
        </div>
    </div>

    <!-- prescription -->
    <?php
      $sql6 = "SELECT * FROM `patient_info` WHERE `patient_id`='$id'";
      $data6 = $conn->query($sql6);
      $res6 = $data6->fetch_assoc();
    ?>
    <div id="content6" class="content container-fluid" style="display: none;">
        <div class="row  d-flex justify-content-around">
            <div class="col-3 shadow-lg  wid10 rounded-3 m-3 marl">
                <div class="form-group">
                    <label class="font-weight-bold" for="chief_complaint" class="text-danger">Chief
                        Complaint:</label>
                    <textarea type="text" name="chief_complaint" id="chief_complaint" class="form-control  live-fetch"
                        data-column="chief_complaint"
                        data-table="patient_info"><?php echo $res6['chief_complaint']; ?></textarea>
                    <div class="dropdown-container"></div>
                </div>
            </div>
            <div class="col-3 shadow-lg  wid10 rounded-3  m-3">
                <div class="form-group m-2">
                    <label class="font-weight-bold" for="examination" class="text-danger">Examination:</label>
                    <textarea type="text" name="examination" id="examination" class="form-control live-fetch"
                        data-column="examination"
                        data-table="patient_info"><?php echo $res6['examination']; ?></textarea>
                    <div class="dropdown-container"></div>
                </div>
            </div>
            <div class="col-3 shadow-lg rounded-3 wid10 m-3">
                <div class="form-group m-2">
                    <label class="font-weight-bold" for="diagnosis" class="text-danger">Diagnosis:</label>
                    <textarea type="text" name="diagnosis" id="diagnosis" class="form-control live-fetch"
                        data-column="diagnosis" data-table="patient_info"><?php echo $res6['diagnosis']; ?></textarea>
                    <div class="dropdown-container"></div>
                </div>
            </div>
            <div class="col-3 shadow-lg rounded-3 wid10 m-3">
                <div class="form-group m-2">
                    <label class="font-weight-bold" for="history" class="text-danger">History:</label>
                    <textarea type="text" name="history" id="history" class="form-control live-fetch"
                        data-column="history" data-table="patient_info"><?php echo $res6['history']; ?></textarea>
                    <div class="dropdown-container"></div>
                </div>
            </div>
            <div class="col-3 shadow-lg rounded-3 wid10 m-3">
                <div class="form-group m-2">
                    <label class="font-weight-bold" for="family_history" class="text-danger">Family/Drug
                        History:</label>
                    <textarea type="text" name="family_history" id="family_history" class="form-control live-fetch"
                        data-column="family_history"
                        data-table="patient_info"><?php echo $res6['family_history']; ?></textarea>
                    <div class="dropdown-container"></div>
                </div>
            </div>
            <div class="col-3 shadow-lg rounded-3 wid10 m-3">
                <div class="form-group m-2">
                    <label class="font-weight-bold" for="procedure_done" class="text-danger">Operative Procedure
                        Done:</label>
                    <textarea type="text" name="procedure_done" id="procedure_done" class="form-control live-fetch"
                        data-column="procedure_done"
                        data-table="patient_info"><?php echo $res6['procedure_done']; ?></textarea>
                    <div class="dropdown-container"></div>
                </div>
            </div>
        </div>
        <div class="row  d-flex justify-content-around">
            <div class="col-3 shadow-lg rounded-3 m-3 ">
                <?php
                $sql31 = "SELECT investigation FROM patient_info WHERE patient_id = $id;";
                $res31 = $conn->query($sql31)->fetch_assoc();
              ?>
                <label class="font-weight-bold" for="" class="text-danger">Investigation Lab :</label>
                <div class="card-body p-2">
                    <form method="POST">
                        <textarea class="form-control mt-3" id="selected-investigation"
                            name="investigation"><?php echo $res31['investigation'];?></textarea>
                        <div class="row">
                            <div class="col-6 mt-2">
                                <button type="button" id="invest" class="btn btn-primary "> Lab</button>
                            </div>
                        </div>
                        <div class="modal" id="investigationModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Investigations Lab</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><strong>
                                                    &times;
                                                </strong></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">**Admin Configurable Data**</p>
                                        <table class="mx-3">
                                            <tr>
                                                <th>Checkbox</th>
                                                <th>Investigation Lab</th>
                                            </tr>

                                            <?php     
                                            $i = 1;
                                            $sql32 = mysqli_query($conn, "SELECT * FROM investigation_view");
                                            while ($res32 = mysqli_fetch_assoc($sql32)) {
                                                echo '<tr>
                                                    <td>
                                                        <input class="form-check-input checkbox-investigation" type="checkbox" name="inve_checkbox_'.$i.'"
                                                        id="inves_checkbox_'.$i.'">
                                                    </td>
                                                    <td>'.$res32['description'].'</td>
                                                </tr>';
                                                $i++;
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-3 shadow-lg rounded-3 m-3">
                <?php
                $sql = "SELECT investigation_imaging FROM patient_info WHERE patient_id = $id;";
                $res = $conn->query($sql)->fetch_assoc();
              ?>
                <label class="font-weight-bold" for="" class="text-danger">Investigation Imaging:</label>
                <div class="card-body p-2">
                    <form action="" method="POST">
                        <textarea class="form-control mt-3" id="selected-investigation_imaging"
                            name="investigation_imaging"><?php echo $res['investigation_imaging'];?></textarea>
                        <div class="row">
                            <div class="col-6 mt-2">
                                <button type="button" id="invest_imaging" class="btn btn-primary "> Imaging</button>
                            </div>
                        </div>

                        <div class="modal" id="investigationImagingModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Investigation Imaging</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><strong>
                                                    &times;
                                                </strong></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">**Admin Configurable Data**</p>
                                        <table class="mx-3">
                                            <tr>
                                                <th>Checkbox</th>
                                                <th>Investigations Imaging</th>
                                            </tr>

                                            <?php
                                    $i = 1;
                                    $sql1 = mysqli_query($conn, "SELECT * FROM add_invest_imaging");

                                    while ($res = mysqli_fetch_assoc($sql1)) {
                                        echo '<tr>
                                            <td>
                                                <input class="form-check-input checkbox-investigation_imaging" type="checkbox" name="inve_imaging_checkbox_'.$i.'"
                                                id="inves_imaging_checkbox_'.$i.'">
                                            </td>
                                            <td>'.$res['description'].'</td>
                                        </tr>';
                                        $i++;
                                    }
                                    ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-3 shadow-lg rounded-3 m-3">
                <?php
                $sql = "SELECT symptoms FROM patient_info WHERE patient_id = $id;";
                $res = $conn->query($sql)->fetch_assoc();
                ?>
                <label class="font-weight-bold" for="" class="text-danger">Symptoms :</label>
                <div class="card-body p-2">
                    <form action="" method="POST">
                        <textarea class="form-control mt-3" id="selected-symptoms"
                            name="symptoms"><?php echo $res['symptoms'];?></textarea>

                        <div class="row">
                            <div class="col-6 mt-2">
                                <button type="button" id="symptom" class="btn btn-primary ">Symptoms</button>
                            </div>
                        </div>

                        <div class="modal" id="symptomsModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Symptoms</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><strong>
                                                    &times;
                                                </strong></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">**Admin Configurable Data**</p>
                                        <table class="mx-3">
                                            <tr>
                                                <th>Checkbox</th>
                                                <th>Symptoms</th>
                                            </tr>

                                            <?php
                                    $i = 1;
                                    $sql1 = mysqli_query($conn, "SELECT * FROM symptoms_view");

                                    while ($res = mysqli_fetch_assoc($sql1)) {
                                        echo '<tr>
                                            <td>
                                                <input class="form-check-input checkbox-symptoms" type="checkbox" name="sym_checkbox_'.$i.'"
                                                id="symp_checkbox_'.$i.'">
                                            </td>
                                            <td>'.$res['desc_sym'].'</td>
                                        </tr>';
                                        $i++;
                                    }
                                    ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3 shadow-lg rounded-3 m-3 ">
                <?php
                $sql = "SELECT instructions FROM patient_info WHERE patient_id = $id;";
                $res = $conn->query($sql)->fetch_assoc();
                ?>
                <label class="font-weight-bold" for="" class="text-danger">Instructions :</label>
                <div class="card-body p-2">
                    <form method="POST">
                        <textarea class="form-control mt-3" id="selected-instructions"
                            name="instructions"><?php echo $res['instructions'];?></textarea>

                        <div class="row">
                            <div class="col-6 mt-2">
                                <button type="button" id="instru" class="btn btn-primary ">Instructions</button>
                            </div>
                        </div>

                        <div class="modal" id="instructionModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Instructions</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><strong>
                                                    &times;
                                                </strong></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">**Admin Configurable Data**</p>
                                        <table class="mx-3">
                                            <tr>
                                                <th>Checkbox</th>
                                                <th>Instructions</th>
                                            </tr>
                                            <?php
                                    $i = 1;
                                    $sql1 = mysqli_query($conn, "SELECT * FROM in_view");

                                    while ($res = mysqli_fetch_assoc($sql1)) {
                                        echo '<tr>
                                            <td>
                                                <input class="form-check-input checkbox-instruction" type="checkbox" name="in_checkbox_'.$i.'"
                                                id="inst_checkbox_'.$i.'">
                                            </td>
                                            <td>'.$res['instruction'].'</td>
                                        </tr>';
                                        $i++;
                                    }
                                    ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

        </div>
    </div>
    <button type="submit" class="btn btn-success mx-auto d-flex mt-3 save_pre">save</button>
    </div>

    <!-- SURGERY -->
    <?php
    $sql7 = "SELECT * FROM `opto_surgery` WHERE `id`='$id'";
    $data7 = $conn->query($sql7);
    $result7 = $data7->fetch_assoc();
    ?>

    <div id="content4" class="content" style="display: none;">
        <div class="row m-4">
            <div class="col-7">
                <div class=" offset-1">
                    <label class="form-label" for="time_ad"><strong> Surgery Advice:</strong>
                    </label> <input type="text" class="form-control-sm inline live-fetch" style="width:30rem;"
                        data-column="surgery_advice" data-table="opto_surgery" name="surgery_advice"
                        value="<?php echo $result7['surgery_advice']; ?>">
                    <div class="dropdown-container" style="left:12.5rem;"></div>
                </div>
                <div class=" offset-1">
                    <label class="form-label" for="time_ad"><strong>Surgery Plan Date:</strong>
                    </label> <input type="date" class="form-control-sm inline" style="width:15rem;"
                        name="surgery_plan_date" value="<?php echo $result7['surgery_plan_date']; ?>">
                </div>
                <div class=" offset-1">
                    <label class="form-label" for="time_ad"><strong>Surgery Status:</strong>
                    </label> <input type="text" class="form-control-sm inline live-fetch" style="width:15rem;"
                        name="surgery_status" value="<?php echo $result7['surgery_status']; ?>"
                        data-column="surgery_status" data-table="opto_surgery">
                    <div class="dropdown-container" style="left:12.5rem;"></div>
                </div>
                <div class=" offset-1 mt-4">
                    <label class="form-label" for="time_ad"><strong>Surgery &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            RE:</strong>
                    </label> <input type="text" class="form-control-sm inline live-fetch" style="width:30rem;"
                        name="surgery_re" value="<?php echo $result7['surgery_re']; ?>" data-column="surgery_re"
                        data-table="opto_surgery">
                    <div class="dropdown-container" style="left:12.5rem;"></div>
                </div>
                <div class=" offset-2">
                    <label class="form-label" for="time_ad"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LE:</strong>
                    </label> <input type="text" class="form-control-sm inline live-fetch" style="width:30rem;"
                        name="surgery_le" value="<?php echo $result7['surgery_le']; ?>" data-column="surgery_le"
                        data-table="opto_surgery">
                    <div class="dropdown-container" style="left:12rem;"></div>
                </div>
                <div class=" offset-1 row mt-4">
                    <table class="table col-6 table-borderless">
                        <thead>
                            <tr>
                                <th>LENS</th>
                                <th>POWER</th>
                                <th>BATCH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control-sm inline live-fetch" style="width:10rem;"
                                        name="lens" value="<?php echo $result7['lens']; ?>" data-column="lens"
                                        data-table="opto_surgery">
                                    <div class="dropdown-container"></div>
                                </td>
                                <td><input type="text" class="form-control-sm inline live-fetch" style="width:7rem;"
                                        name="power" value="<?php echo $result7['power']; ?>" data-column="power"
                                        data-table="opto_surgery">
                                    <div class="dropdown-container"></div>
                                </td>
                                <td><input type="text" class="form-control-sm inline live-fetch" style="width:15rem;"
                                        name="batch" value="<?php echo $result7['batch']; ?>" data-column="batch"
                                        data-table="opto_surgery">
                                    <div class="dropdown-container"></div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class=" offset-1">
                    <label class="form-label" for="time_ad"><strong>Other Item:</strong></label>
                    <input type="text" class="form-control-sm inline live-fetch" style="width:15rem;" name="other_1"
                        value="<?php echo $result7['other_1']; ?>" data-column="other_1" data-table="opto_surgery">
                    <div class="dropdown-container" style="left:10.5rem;"></div>
                    <input type="text" class="form-control-sm inline live-fetch" style="width:15rem;" name="other_2"
                        value="<?php echo $result7['other_2']; ?>" data-column="other_2" data-table="opto_surgery">
                    <div class="dropdown-container" style="left:26rem;"></div>
                </div>
                <div class=" offset-1 mt-4">
                    <label class="form-label" for="time_ad"><strong>Final Diagnosis:</strong></label>
                    <input type="text" class="form-control-sm inline live-fetch" style="width:35rem;"
                        name="final_diagonsis" value="<?php echo $result7['final_diagonsis']; ?>"
                        data-column="final_diagonsis" data-table="opto_surgery">
                    <div class="dropdown-container" style="left:12.5rem;"></div>
                </div>
                <div class=" offset-1 mb-5">
                    <label class="form-label" for="time_ad"><strong>Condition on Discharge:</strong></label>
                    <input type="text" class="form-control-sm inline live-fetch" style="width:35rem;"
                        name="condition_discharge" value="<?php echo $result7['condition_discharge']; ?>"
                        data-column="condition_discharge" data-table="opto_surgery">
                    <div class="dropdown-container"></div>
                </div>


            </div>
            <div class="col-5">
                <table class="table table-borderless mt-4">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Admission:</th>
                            <td><input type="date" class="form-control-sm inline" style="width:10rem;"
                                    name="admission_date" value="<?php echo $result7['admission_date']; ?>"></td>
                            <td><input type="time" class="form-control-sm inline" style="width:10rem;"
                                    name="admission_time" value="<?php echo $result7['admission_time']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Surgery:</th>
                            <td><input type="date" class="form-control-sm inline" style="width:10rem;"
                                    name="surgery_date" value="<?php echo $result7['surgery_date']; ?>"></td>
                            <td><input type="time" class="form-control-sm inline" style="width:10rem;"
                                    name="surgery_time" value="<?php echo $result7['surgery_time']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Discharge:</th>
                            <td><input type="date" class="form-control-sm inline" style="width:10rem;"
                                    name="discharge_date" value="<?php echo $result7['discharge_date']; ?>"></td>
                            <td><input type="time" class="form-control-sm inline" style="width:10rem;"
                                    name="discharge_time" value="<?php echo $result7['discharge_time']; ?>"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-3">
                    <label class="form-label" for="time_ad"><strong>Notes:</strong></label>
                    <textarea name="notes" id="" class="form-control live-fetch" data-column="notes"
                        data-table="opto_surgery"><?php echo $result7['notes']; ?></textarea>
                    <div class="dropdown-container"></div>
                </div>
                <div class="m-5">

                    <button class="btn btn-success mb-5 save_surgery">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ATTACHMENT -->

    <div id="content5" class="content container" style="display: none;">
        <div class="container">
            <button type="button" class="btn btn-primary my-3 float-right" id="addImageButton">Add Image</button>
            <div class="row" id="imageContainer">
                <?php
                $query = "SELECT * FROM opto_images where patient_id= {$id};";
                $result = mysqli_query($conn, $query);
                $imageData = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageData[] = $row;
                }
                foreach ($imageData as $data):
                    $imageId = $data['id'];
                    ?>
                <div class="col-md-4">
                    <div class="image-box">
                        <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                            <img class="img-fluid zoom-image" src="<?php echo $data['img_add']; ?>"
                                alt="<?php echo $data['img_desc']; ?>" onclick="redirectToEditor(this)">
                        </div>
                        <div class="caption">
                            <?php echo $data['img_desc']; ?>
                        </div>
                        <button class="btn btn-danger delete-button"
                            data-image-id="<?php echo $imageId; ?>">Delete</button>


                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Image Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" id="img_form">
                            <div class="form-group">
                                <label for="img_desc">Image Description:</label>
                                <input type="text" class="form-control" id="img_desc" name="img_desc" required>
                            </div>
                            <div class="form-group">
                                <label for="upload_image">Upload Image:</label>
                                <input type="file" class="form-control-file" id="upload_image" name="img"
                                    accept="image/*" required>
                            </div>
                            <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="prescription.js"></script>
    <script src="../fetch_dropdown_script.js"></script>
    <script src="fetch_medicine.js"></script>
    
    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="alert.js"></script>



    <script>
    $(document).ready(function() {
        $(".save_glass").on("click", function() {
            var Data = {
                visit_no: $("input[name='visit_no']").val(),
                fees: $("input[name='fees']").val(),
                past_his: $("textarea[name='past_his']").val(),
                complaints: $("textarea[name='complaints']").val(),
                dist_input_1: $("input[name='dist_input_1']").val(),
                dist_input_2: $("input[name='dist_input_2']").val(),
                dist_input_3: $("input[name='dist_input_3']").val(),
                dist_input_4: $("input[name='dist_input_4']").val(),
                dist_input_5: $("input[name='dist_input_5']").val(),
                dist_input_6: $("input[name='dist_input_6']").val(),
                dist_input_7: $("input[name='dist_input_7']").val(),
                dist_input_8: $("input[name='dist_input_8']").val(),
                near_input_1: $("input[name='near_input_1']").val(),
                near_input_2: $("input[name='near_input_2']").val(),
                near_input_3: $("input[name='near_input_3']").val(),
                near_input_4: $("input[name='near_input_4']").val(),
                near_input_5: $("input[name='near_input_5']").val(),
                near_input_6: $("input[name='near_input_6']").val(),
                near_input_7: $("input[name='near_input_7']").val(),
                near_input_8: $("input[name='near_input_8']").val(),
                be_add: $("input[name='be_add']").val(),
                re: $("input[name='re']").val(),
                le_add: $("input[name='le_add']").val(),
                glass_type: $("input[name='glass_type']").val(),
                glass_colour: $("input[name='glass_colour']").val(),
                glass_use: $("input[name='glass_use']").val(),
                pd: $("input[name='pd']").val(),
                dist1_input_1: $("input[name='dist1_input_1']").val(),
                dist1_input_2: $("input[name='dist1_input_2']").val(),
                dist1_input_3: $("input[name='dist1_input_3']").val(),
                dist1_input_4: $("input[name='dist1_input_4']").val(),
                dist1_input_5: $("input[name='dist1_input_5']").val(),
                dist1_input_6: $("input[name='dist1_input_6']").val(),
                dist1_input_7: $("input[name='dist1_input_7']").val(),
                dist1_input_8: $("input[name='dist1_input_8']").val(),
                near1_input_1: $("input[name='near1_input_1']").val(),
                near1_input_2: $("input[name='near1_input_2']").val(),
                near1_input_3: $("input[name='near1_input_3']").val(),
                near1_input_4: $("input[name='near1_input_4']").val(),
                near1_input_5: $("input[name='near1_input_5']").val(),
                near1_input_6: $("input[name='near1_input_6']").val(),
                near1_input_7: $("input[name='near1_input_7']").val(),
                near1_input_8: $("input[name='near1_input_8']").val(),
                be1_add: $("input[name='be1_add']").val(),
                re1: $("input[name='re1']").val(),
                le1_add: $("input[name='le1_add']").val(),
                glass1_type: $("input[name='glass1_type']").val(),
                glass1_colour: $("input[name='glass1_colour']").val(),
                glass1_use: $("input[name='glass1_use']").val(),
                pd1: $("input[name='pd1']").val(),
                dist2_input_1: $("input[name='dist2_input_1']").val(),
                dist2_input_2: $("input[name='dist2_input_2']").val(),
                dist2_input_3: $("input[name='dist2_input_3']").val(),
                dist2_input_4: $("input[name='dist2_input_4']").val(),
                dist2_input_5: $("input[name='dist2_input_5']").val(),
                dist2_input_6: $("input[name='dist2_input_6']").val(),
                dist2_input_7: $("input[name='dist2_input_7']").val(),
                dist2_input_8: $("input[name='dist2_input_8']").val(),
                near2_input_1: $("input[name='near2_input_1']").val(),
                near2_input_2: $("input[name='near2_input_2']").val(),
                near2_input_3: $("input[name='near2_input_3']").val(),
                near2_input_4: $("input[name='near2_input_4']").val(),
                near2_input_5: $("input[name='near2_input_5']").val(),
                near2_input_6: $("input[name='near2_input_6']").val(),
                near2_input_7: $("input[name='near2_input_7']").val(),
                near2_input_8: $("input[name='near2_input_8']").val(),
                be2_add: $("input[name='be2_add']").val(),
                re2: $("input[name='re2']").val(),
                le2_add: $("input[name='le2_add']").val(),
                glass2_type: $("input[name='glass2_type']").val(),
                glass2_colour: $("input[name='glass2_colour']").val(),
                glass2_use: $("input[name='glass2_use']").val(),
                pd2: $("input[name='pd2']").val(),
                dist3_input_1: $("input[name='dist3_input_1']").val(),
                dist3_input_2: $("input[name='dist3_input_2']").val(),
                dist3_input_3: $("input[name='dist3_input_3']").val(),
                dist3_input_4: $("input[name='dist3_input_4']").val(),
                dist3_input_5: $("input[name='dist3_input_5']").val(),
                dist3_input_6: $("input[name='dist3_input_6']").val(),
                dist3_input_7: $("input[name='dist3_input_7']").val(),
                dist3_input_8: $("input[name='dist3_input_8']").val(),
                near3_input_1: $("input[name='near3_input_1']").val(),
                near3_input_2: $("input[name='near3_input_2']").val(),
                near3_input_3: $("input[name='near3_input_3']").val(),
                near3_input_4: $("input[name='near3_input_4']").val(),
                near3_input_5: $("input[name='near3_input_5']").val(),
                near3_input_6: $("input[name='near3_input_6']").val(),
                near3_input_7: $("input[name='near3_input_7']").val(),
                near3_input_8: $("input[name='near3_input_8']").val(),
                be3_add: $("input[name='be3_add']").val(),
                re3: $("input[name='re3']").val(),
                le3_add: $("input[name='le3_add']").val(),
                glass3_type: $("input[name='glass3_type']").val(),
                glass3_colour: $("input[name='glass3_colour']").val(),
                glass3_use: $("input[name='glass3_use']").val(),
                pd3: $("input[name='pd3']").val(),
                dist4_input_1: $("input[name='dist4_input_1']").val(),
                dist4_input_2: $("input[name='dist4_input_2']").val(),
                dist4_input_3: $("input[name='dist4_input_3']").val(),
                dist4_input_4: $("input[name='dist4_input_4']").val(),
                dist4_input_5: $("input[name='dist4_input_5']").val(),
                dist4_input_6: $("input[name='dist4_input_6']").val(),
                dist4_input_7: $("input[name='dist4_input_7']").val(),
                dist4_input_8: $("input[name='dist4_input_8']").val(),
                near4_input_1: $("input[name='near4_input_1']").val(),
                near4_input_2: $("input[name='near4_input_2']").val(),
                near4_input_3: $("input[name='near4_input_3']").val(),
                near4_input_4: $("input[name='near4_input_4']").val(),
                near4_input_5: $("input[name='near4_input_5']").val(),
                near4_input_6: $("input[name='near4_input_6']").val(),
                near4_input_7: $("input[name='near4_input_7']").val(),
                near4_input_8: $("input[name='near4_input_8']").val(),
                be4_add: $("input[name='be4_add']").val(),
                re4: $("input[name='re4']").val(),
                le4_add: $("input[name='le4_add']").val(),
                glass4_type: $("input[name='glass4_type']").val(),
                glass4_colour: $("input[name='glass4_colour']").val(),
                glass4_use: $("input[name='glass4_use']").val(),
                pd4: $("input[name='pd4']").val(),
                advice: $("textarea[name='advice']").val(),
                fer: $("input[name='fer']").val()
            };

            var id = <?php echo $id; ?>;
            $.ajax({
                type: "POST",
                url: "save_glass.php?id=" + id,
                data: Data,
                success: function(response) {
                    console.log("Data inserted successfully");
                    swal({
                        title: "Data Saved Sucessfully!",
                        text: "Your operation was successful.",
                        icon: "success",
                        button: false, // Set the button to false to hide it
                        timer: 1500 // Set the timer to automatically close the alert after 2000ms (2 seconds)
                    });

                },
                error: function(xhr, status, error) {
                    console.log("Data not inserted successfully");
                }
            });
        });
    });
    </script>


    <!-- perscription -->
    <script>
    $(document).ready(function() {
        $(".save_pre").on("click", function() {
            var data = {   
                chief_complaint: $("textarea[name='chief_complaint']").val(),
                examination: $("textarea[name='examination']").val(),
                diagnosis: $("textarea[name='diagnosis']").val(),
                history: $("textarea[name='history']").val(),
                family_history: $("textarea[name='family_history']").val(),
                procedure_done: $("textarea[name='procedure_done']").val(),
                investigation_imaging: $("textarea[name='investigation_imaging']").val(),
                investigation:$("textarea[name='investigation']").val(),
                symptoms: $("textarea[name='symptoms']").val(),
                instructions: $("textarea[name='instructions']").val()
            };

            var id = <?php echo $id ?>;
            $.ajax({
                type: "POST",
                url: "save_prescription.php?id=" + id,
                data: data,
                success: function(response) {
                    swal({
                title: "Data Saved Sucessfully!",
                text: "Your operation was successful.",
                icon: "success",
                button: false, 
                timer: 1500 
            });
                    console.log("data inserted sucessfully");
                },
                error: function(xhr, status, error) {
                    console.log("data  not inserted sucessfully");
                }
            });
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        // ascan
        $(".save_ascan").on("click", function() {
            swal({
                title: "Data Saved Sucessfully!",
                text: "Your operation was successful.",
                icon: "success",
                button: false, // Set the button to false to hide it
                timer: 1500 // Set the timer to automatically close the alert after 2000ms (2 seconds)
            });
            var data = {
                k1_1: $("input[name='k1_1']").val(),
                k1_2: $("input[name='k1_2']").val(),
                k2_1: $("input[name='k2_1']").val(),
                k2_2: $("input[name='k2_2']").val(),
                avg_1: $("input[name='avg_1']").val(),
                avg_2: $("input[name='avg_2']").val(),
                axl_1: $("input[name='axl_1']").val(),
                axl_2: $("input[name='axl_2']").val(),
                acd_1: $("input[name='acd_1']").val(),
                acd_2: $("input[name='acd_2']").val(),
                aconst_1: $("input[name='aconst_1']").val(),
                aconst_2: $("input[name='aconst_2']").val(),
                formula_1: $("input[name='formula_1']").val(),
                formula_2: $("input[name='formula_2']").val(),
                iol_1: $("input[name='iol_1']").val(),
                iol_2: $("input[name='iol_2']").val()
            };

            var id = <?php echo $id ?>;
            $.ajax({
                type: "POST",
                url: "save_ascan.php?id=" + id,
                data: data,
                success: function(response) {
                    console.log("data inserted sucessfully");
                },
                error: function(xhr, status, error) {
                    console.log("data  not inserted sucessfully");
                }
            });
        });
    });
    </script>




    <script type="text/javascript">
    // examination_save
    $(document).ready(function() {
        var checkValue = document.getElementById("checkbox2").value;
        console.log(checkValue)
        document.getElementById("checkbox2").addEventListener("change", () => {


            if (checkValue == 'off') {
                checkValue = "on";
            } else {
                checkValue = "off";
            }
        })
        $(".save_examination").on("click", function() {

            console.log(document.getElementById("checkbox2").value);
            var data = {
                wnl: checkValue,
                lids_1: $("input[name='lids_1']").val(),
                lids_2: $("input[name='lids_2']").val(),
                conjunctive_1: $("input[name='conjunctive_1']").val(),
                conjunctive_2: $("input[name='conjunctive_2']").val(),
                cornea_1: $("input[name='cornea_1']").val(),
                cornea_2: $("input[name='cornea_2']").val(),
                ac_1: $("input[name='ac_1']").val(),
                ac_2: $("input[name='ac_2']").val(),
                pupil_1: $("input[name='pupil_1']").val(),
                pupil_2: $("input[name='pupil_2']").val(),
                lens_1: $("input[name='lens_1']").val(),
                lens_2: $("input[name='lens_2']").val(),
                fundus_1: $("input[name='fundus_1']").val(),
                fundus_2: $("input[name='fundus_2']").val(),
                sac_1: $("input[name='sac_1']").val(),
                sac_2: $("input[name='sac_2']").val(),
                iop_1: $("input[name='iop_1']").val(),
                iop_2: $("input[name='iop_2']").val(),
                diagnosis_1: $("input[name='diagnosis_1']").val(),
                diagnosis_2: $("input[name='diagnosis_2']").val(),
                vision_1: $("input[name='vision_1']").val(),
                vision_2: $("input[name='vision_2']").val(),
                via_spect_1: $("input[name='via_spect_1']").val(),
                via_spect_2: $("input[name='via_spect_2']").val(),
                via_ph_1: $("input[name='via_ph_1']").val(),
                via_ph_2: $("input[name='via_ph_2']").val(),
                at_1: $("input[name='at_1']").val(),
                at_2: $("input[name='at_2']").val(),
                ar_sph_1: $("input[name='ar_sph_1']").val(),
                ar_sph_2: $("input[name='ar_sph_2']").val(),
                ar_cyl_1: $("input[name='ar_cyl_1']").val(),
                ar_cyl_2: $("input[name='ar_cyl_2']").val(),
                ar_axis_1: $("input[name='ar_axis_1']").val(),
                ar_axis_2: $("input[name='ar_axis_2']").val(),
                dig: document.getElementById("select-dig").value

            };
            var id = <?php echo $id ?>;
            $.ajax({
                type: "POST",
                url: "save_examination.php?id=" + id,
                data: data,
                success: function(response) {
                    console.log("data inserted sucessfully");
                    swal({
                        title: "Data Saved Sucessfully!",
                        text: "Your operation was successful.",
                        icon: "success",
                        button: false, // Set the button to false to hide it
                        timer: 1500 // Set the timer to automatically close the alert after 2000ms (2 seconds)
                    });
                },
                error: function(xhr, status, error) {
                    console.log("data  not inserted sucessfully");
                }
            });
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        // surgery
        $(".save_surgery").on("click", function() {

            console.log('function called');
            var data = {
                surgery_advice: $("input[name='surgery_advice']").val(),
                surgery_plan_date: $("input[name='surgery_plan_date']").val(),
                surgery_status: $("input[name='surgery_status']").val(),
                surgery_re: $("input[name='surgery_re']").val(),
                surgery_le: $("input[name='surgery_le']").val(),
                lens: $("input[name='lens']").val(),
                power: $("input[name='power']").val(),
                batch: $("input[name='batch']").val(),
                other_1: $("input[name='other_1']").val(),
                other_2: $("input[name='other_2']").val(),
                final_diagonsis: $("input[name='final_diagonsis']").val(),
                condition_discharge: $("input[name='condition_discharge']").val(),
                admission_date: $("input[name='admission_date']").val(),
                admission_time: $("input[name='admission_time']").val(),
                surgery_date: $("input[name='surgery_date']").val(),
                surgery_time: $("input[name='surgery_time']").val(),
                discharge_date: $("input[name='discharge_date']").val(),
                discharge_time: $("input[name='discharge_time']").val(),
                notes: $("textarea[name='notes']").val()
            };

            var id = <?php echo $id ?>;
            $.ajax({
                type: "POST",
                url: "save_surgery.php?id=" + id,
                data: data,
                success: function(response) {
                    console.log("data inserted sucessfully");
                    swal({
                        title: "Data Saved Sucessfully!",
                        text: "Your operation was successful.",
                        icon: "success",
                        button: false, // Set the button to false to hide it
                        timer: 1500 // Set the timer to automatically close the alert after 2000ms (2 seconds)
                    });
                },
                error: function(xhr, status, error) {
                    console.log("data  not inserted sucessfully");
                }
            });
        });
    });
    </script>
    <!-- modal popup -->
    <script>
    document.getElementById("invest_imaging").addEventListener("click", function () {
        $("#investigationImagingModal").modal("show");
    });
</script>

<script>
    $(document).ready(function() {
        $(".checkbox-instruction").change(function() {
            var selectedInstructions = [];
            $(".checkbox-instruction:checked").each(function() {
                var instruction = $(this).closest("tr").find("td:last").text();
                selectedInstructions.push(instruction);
            });
            $("#selected-instructions").val(selectedInstructions.join(" , "));
        });
    });

    $(document).ready(function() {
        $(".checkbox-investigation").change(function() {
            var selectedInvestigation = [];
            $(".checkbox-investigation:checked").each(function() {
                var investigation = $(this).closest("tr").find("td:last").text();
                selectedInvestigation.push(investigation);
            });
            $("#selected-investigation").val(selectedInvestigation.join(" , "));
        });
    });
    $(document).ready(function() {
        $(".checkbox-symptoms").change(function() {
            var selectedSymptoms = [];
            $(".checkbox-symptoms:checked").each(function() {
                var symptoms = $(this).closest("tr").find("td:last").text();
                selectedSymptoms.push(symptoms);
            });
            $("#selected-symptoms").val(selectedSymptoms.join(" , "));
        });
    });


$(document).ready(function () {
    $(".checkbox-investigation_imaging").change(function () {
        var selectedInvestigationImaging = [];
        $(".checkbox-investigation_imaging:checked").each(function () {
            var investigationImaging = $(this).closest("tr").find("td:last").text();
            selectedInvestigationImaging.push(investigationImaging);
        });
        $("#selected-investigation_imaging").val(selectedInvestigationImaging.join(" , "));
    });
});

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("instructionModal");
        const instuctionButton = document.getElementById("instru");
        const closeButton = modal.querySelector(".close");

        instuctionButton.addEventListener("click", function() {
            modal.style.display = "block";
        });

        closeButton.addEventListener("click", function() {
            modal.style.display = "none";
        });

        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("investigationModal");
        const investigationButton = document.getElementById("invest");
        const closeButton = modal.querySelector(".close");

        investigationButton.addEventListener("click", function() {
            modal.style.display = "block";
        });

        closeButton.addEventListener("click", function() {
            modal.style.display = "none";
        });

        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("investigationImagingModal");
        const investigationImagingButton = document.getElementById("invest_imaging");
        const closeButton = modal.querySelector(".close");

        investigationImagingButton.addEventListener("click", function () {
            modal.style.display = "block";
        });

        closeButton.addEventListener("click", function () {
            modal.style.display = "none";
        });

        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("symptomsModal");
        const symptomsButton = document.getElementById("symptom");
        const closeButton = modal.querySelector(".close");

        symptomsButton.addEventListener("click", function() {
            modal.style.display = "block";
        });

        closeButton.addEventListener("click", function() {
            modal.style.display = "none";
        });

        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    });
    </script>

    <script>
    //redirect ot editer
    function redirectToEditor(imageSrc) {
        var image = imageSrc.getAttribute('src');
        var url = '../Editor/opto_img.php?img=' + image;
        window.location.assign(url);
    }
    var id = <?php echo $id; ?>;

    // select diagram
    document.getElementById("examination").addEventListener("click", () => {
        fetch("fetch_diagram.php?id=" + encodeURIComponent(id), {
                method: "GET"
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('select-dig').innerHTML = data.content;

                    var selectBox = document.getElementById("select-dig");
                    var selectedOption = selectBox.options[selectBox.selectedIndex];

                    var dig_img = selectedOption.getAttribute("add");
                    document.getElementById("dig-preview").innerHTML =
                        `<img src="${dig_img}" style="height:100%; width:100%;"/>`;

                } else if (data.error) {
                    console.error("Error:", data.error);
                } else {
                    console.warn("Unknown response from PHP file:", data);
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    })
    document.getElementById("select-dig").addEventListener("change", () => {
        var selectBox = document.getElementById("select-dig");
        var selectedOption = selectBox.options[selectBox.selectedIndex];

        var dig_img = selectedOption.getAttribute("add");
        document.getElementById("dig-preview").innerHTML =
            `<img src="${dig_img}" style="height:100%; width:100%;"/>`;

    })
    // Add an event listener to all delete buttons with class 'delete-btn'
    var delete_btn_event = () => {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                var pId = button.value;
                fetch("medicine_save.php?pId=" + encodeURIComponent(pId) + "&id=" +
                        encodeURIComponent(id), {
                            method: "GET"
                        })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('tbody').innerHTML = data.tableContent;
                            delete_btn_event();

                            items = 0;
                        } else if (data.error) {
                            console.error("Error:", data.error);
                        } else {
                            console.warn("Unknown response from PHP file:", data);
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
            });
        });

    }

    delete_btn_event();
    // medicine save
    document.getElementById("save-1").addEventListener("click", function() {
        const formData = new FormData(document.getElementById("medicine-form"));


        // Add the flag to indicate form submission
        formData.append('submit_changes', true);
        formData.append('id', id);

        // Make a POST request to the PHP file
        fetch("medicine_save.php", {
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {

                if (data.error) {
                    console.error("Error:", data.error);
                } else if (data.success) {
                    console.log("Success:", data.success);
                    document.getElementById('tbody').innerHTML = data.tableContent;
                    delete_btn_event();
                } else {
                    console.warn("Unknown response from PHP file:", data);
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });

    const params = new URLSearchParams(window.location.search);
    const attachment = params.get('attachment');
    console.log(attachment);

    if (attachment === '1') {
        $('#content5').show();
        document.getElementById('attach-btn').classList.add("active");
        document.getElementById('first-btn').classList.remove("active");
    } else {
        $('#content1').show();
    }

    $('.content-button').on('click', function() {
        $('.content-button').removeClass('active');

        $(this).addClass('active');
        var contentID = $(this).data('target');
        $('.content').hide();
        $('#' + contentID).show();
    });


    $('#addImageButton').on('click', function() {
        $('#uploadModal').modal('show');
    });
    var deleteImgEvent = () => {
        $('.delete-button').on('click', function() {
            var imageId = $(this).data('image-id');

            if (confirm("Are you sure you want to delete this image?")) {
                $.get("attachment.php", {
                    imageId: imageId
                }, function(response) {
                    $('[data-image-id="' + imageId + '"]').closest('.col-md-4').remove();
                    var remainingImages = $('.image-box');
                    var numImages = remainingImages.length;
                    var numColumns = Math.ceil(numImages / 3);
                    var columnWidth = 100 / numColumns;
                    remainingImages.closest('.row').find('.col-fill').css('flex-basis',
                        columnWidth + '%');
                });
            }
        });
    }
    deleteImgEvent();

    //attachment save
    document.getElementById("submitBtn").addEventListener("click", function() {
        const formElement = document.getElementById("img_form");
        var formData = new FormData(formElement);
        formData.append("pId", id);

        fetch("attachment.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the PHP file here
                if (data.success) {
                    $('#uploadModal').modal('hide');
                    document.getElementById("imageContainer").innerHTML = data.html;

                    formElement.reset();
                    deleteImgEvent();

                } else {
                    // Show error message
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
    </script>

</body>

</html>