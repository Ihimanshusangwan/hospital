<?php
require("../admin/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Search</title>
    <style type="text/css">
        @media print {
            #myForm {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div>
        <center>
            <div class="container m-2 shadow-lg rounded p-2">

                <form id="myForm">
                    <div class="row m-2">
                        <div class="col-5">
                            <div class="form-group row">
                                <label class="col-sm-4">From :</label> <input type="date" class="form-control col"
                                    name="from">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group row">
                                <label class="col-sm-4">To :</label> <input type="date" class="form-control col"
                                    name="to">
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div class="form-group row">
                                <label class="col-sm-4">Search Field:</label class="col-sm-2">
                                <select class="form-control col" name="option_val">
                                  <option value='name'>Patient Name</option>
                                  <option value='taluka'>Taluka</option>
                                  <option value='district'>District</option>
                                  <option value='address'>Address</option>
                                  <option value='mobile'>Mobile No.</option>
                                  <option value='uhid'>UHID</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-6 mt-2">
                        <div class="form-group row">
                                <label for="" class="col-sm-4">Search Value:</label>
                                <input type="text" class="form-control col" name="option_val2" />
                            </div>
                        </div>
                        <div class="col mt-2">
                            <button type="button" name="submit" class="btn btn-primary btn-sm"
                                id="search">Submit</button>
                            <a href="receptionPage.php" class="btn btn-danger btn-sm">Dashboard</a>
                            <button id="xl" class="btn btn-success btn-sm xl">Excel</button>
                            <button id="xl" class="btn btn-success btn-sm" onclick="window.print();">Print</button>
                        </div>
                    </div>
                </form>
                <div id="data_app"></div>
                <div class="row">
                    <div id="totalval" class="col"> </div>
                    <div id="count" class="col"> </div>
                </div>

            </div>
        </center>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="excel.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#search").click(function () {
                    var formData = $('#myForm').serializeArray();
                    $.ajax({
                        type: 'POST',
                        url: 'globalSearchFilter.php',
                        data: formData,
                        success: function (data) {
                            $("#data_app").html(data);
                            // total();
                            // console.log(data);
                            
                            var rowCount = $('#table tr').length;
                            rowCount--;
                            $('#count').html('Record : ' + rowCount);
                        }
                    });
                });
            });

            function total() {
                var sum = 0;
                $('.total').each(function () {
                    sum += parseFloat($(this).text()); // Or this.innerHTML, this.innerText
                });
                $('#totalval').text('Total : ' + sum);

            }

            $(".xl").click(function () {
                $("#table").table2excel({
                    name: " Hospital ",
                    filename: "filter", //do not include extension
                    fileext: ".xls" // file extension
                });
            });
        </script>

</body>

</html>