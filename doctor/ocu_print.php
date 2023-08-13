<?php  
  require("../admin/connect.php");
  $id=$_GET['id'];

  $query="SELECT * FROM p_general JOIN p_init ON p_general.id = p_init.id JOIN patient_info ON p_general.id = patient_info.patient_id  JOIN patient_records ON p_general.id = patient_records.id JOIN p_insure ON p_general.id = p_insure.id WHERE p_general.id = $id;";
  $res= $conn->query($query)->fetch_assoc();
//   print_r($res);
  $query2="SELECT * FROM discharge WHERE id = $id;";
  $res2= $conn->query($query2)->fetch_assoc();
//   print_r($res2);
$sql4 = "SELECT * FROM ocu WHERE id = '$id';";
$data4 = $conn->query($sql4);
$res4 = $data4->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
  $data = $conn->query($sql);
  $title = $data->fetch_assoc();
  $sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Admission Form</title>
    <style>
        .header{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: row;
}

.title{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
        @media print {

            #button {
                display: none !important;
            }
            @page {size: A4 ; }
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="button">
            <a href='OculoPlasty.php?id=<?php echo $id; ?>' class="btn btn-primary m-2">Dashboard</a>
            <a class="btn btn-primary m-2" onclick="window.print()">Print</a>
        </div>
        <?php include_once("../header/images.php") ?>
        <h3 class="text-center text-dark my-3 ">Oculo Plasty</h3>
        <?php include_once("../header/header.php") ?>
    </div>
    <div class="container">
        

        
        <div class="row">
        <div class="col-4">
            <Strong><label class="form-label">Patient's Name :</label></strong>
            <?php echo $res['name']; ?>
          </div>
          <div class="col-4">
            <strong><label class="form-label">Surgeon :</label></strong>
           <?php echo $res4['sur']; ?>
          </div>
          <div class="col-4">
            <strong><label class="form-label">Assistant :</label></strong>
            <?php echo $res4['ass']; ?>
          </div>
          
        </div><br>
        <div class="row">
        <div class="col-4">
            <strong><label class="form-label">Nurse :</label></strong>
            <?php echo $res4['nurse']; ?>
          </div>
          <div class="col-4">
            <strong><label class="form-label">HCA :</label></strong>
            <?php echo $res4['hca']; ?>
          </div>
          <div class="col-4">
            <strong><label class="form-label">Visitors :</label></strong>
            <?php echo $res4['visit']; ?>
          </div>
          
        </div><br>
        <div class="row">
        <div class="col-4">
            <strong><label class="form-label">Date :</label></strong>
            <?php echo $res4['date']; ?>
          </div>
          <div class="col-4">
            <strong><label class="form-label" for="time_ad">Surgery Start TIme :</label></strong>
            <?php echo $res4['s_time']; ?>
          </div>
          <div class="col-4">
            <strong><label class="form-label" for="time_ad">Surgery Ending TIme :</label></strong>
            <?php echo $res4['e_time']; ?>
          </div>
          
        </div><br>

        <div class="row">
        <div class="col-4">
                <strong><label class="form-label">Anaesthesia :</label></strong>
                <?php echo $res4['ana']; ?>
              </div>
              <div class="col-4">
                <strong><label class="form-label">Complication :</label></strong>
                <?php echo $res4['com']; ?>
              </div>
              <div class="col-4">
                <strong><label class="form-label">Referred By :</label></strong>
               <?php echo $res4['refer']; ?>
              </div>
          
        </div><br>
        <div class="row">
        
              <div class="col-4">
                <strong><label class="form-label">Eye :</label></strong>
                <?php echo $res4['eye']; ?>

              </div>
              <div class="col-4">
                <strong><label class="form-label">O.T. No :</label></strong>
                <?php echo $res4['ot']; ?>

              </div>
              <div class="col-4">
                <strong><label class="form-label">Case No :</label></strong>
                <?php echo $res4['case_no']; ?>
              </div>
              
          
        </div><br>

        <div class="row">
        <div class="col-4">
                <strong><label class="form-label">E.M.R. No :</label></strong>
                <?php echo $res4['emr']; ?>
              </div> 
              <div class="col-4">
                <strong><label class="form-label">Position :</label></strong>
                <?php echo $res4['pos']; ?>
              </div> 
              <div class="col-4">
                <strong><label class="form-label">Incigen :</label></strong>
                <?php echo $res4['inc']; ?>
              </div> 
              
          
        </div><br>
        <div class="row">
        <div class="col-md">
        <strong><label class="form-label">PROCEDURE :</label></strong>
                <?php echo $res4['proc']; ?>
              </div> 
              
          
        </div><br>
        <div class="row">
        <div class="col-md">
        <strong><label class="form-label">ASD/Drape :</label></strong>
          <?php echo $res4['asd']; ?>
              </div> 
              
          
        </div><br>
        <div class="row">
        <div class="col-md">
        <strong><label class="form-label">Post Operative Record :</label></strong>
              <?php echo $res4['record']; ?>
              </div> 
              
          
        </div>

        
         
              
            </div>
          </div>
        </div>
    </div>
            
        
    </div>
</body>
    <script>
    window.print();
    </script>

</html>