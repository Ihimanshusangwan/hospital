// <?php 
//  require("../admin/connect.php");
//  $id = $_GET['id'];
//  session_start();
// //  error_reporting(0);

//  $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
//  $row=mysqli_fetch_assoc($sql);

//  $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
//  $row1=mysqli_fetch_assoc($sql1);

//  $sql2=mysqli_query($conn,"SELECT * FROM p_insure WHERE id = '$id';");
//  $row2=mysqli_fetch_assoc($sql2);
 

//  $sql = "SELECT * FROM titles WHERE id = 1;";
//  $data = $conn->query($sql);
//  $title = $data->fetch_assoc();
//  $sql12="SELECT * FROM `config_print` WHERE 1";
// $data12=$conn->query($sql12);
// $res12=$data12->fetch_assoc();
// if (!isset($res12['inp'])) {
//     $inp_arr = array_fill(0, 3, 'option2');
// } else {
//     $inp = $res12['inp'];
//     $inp_arr = json_decode($inp, true);
//     $inp_arr = is_array($inp_arr) ? $inp_arr : array_fill(0, 3, '');
// }
// ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
<p align="center" class="style33"><font size="+1"> -----डॉक्टरांचे घोषणापत्र----- <p>
</p><font size="+1"> मी. डॉ.<strong> <?php echo $row['consultant']; ?></strong>
. असे घोषित करतो / करते की, मी या उपचार / शस्त्रक्रिये बद्दलच्या सर्व परिणामांची व संभाव्य धोक्यांची पूर्ण कल्पना रुग्णास नातेवाईकास समजेल अशा भाषेत समजाविली आहे. मी रुग्णास / नातेवाईकास त्यांच्या सर्व शंकानिरसन करण्याची संधी दिलेली आहे.<p>
<strong></p><font size="+1">डॉक्टरांचे नाव व सही : <?php echo $row['consultant']; ?>  <p></strong>
<strong></p> दिनांक : <?php echo $row['reg_date']; ?> स्थळ : <?php echo $row['address']; ?></p></strong>
<strong>
<tr>
        <th class="style22" scope="row"><p align="left"><font size="+1">साक्षीदार क्रमांक १ <p align="center"><font size="+1"> साक्षीदार २ </p> <p align="left"> <font size="+1">सही : --------------------<p align="center"><font size="+1"> सही : -------------------- <p align="left"><font size="+1">नाव : --------------------<p> <p align="center"><font size="+1"> नाव : --------------------<p align="left"><font size="+1"> पता : --------------------<p align="center">पता : --------------------  <p align="left"><font size="+1">दूरध्वनी क्रमांक : -----------------------<p align="center"><font size="+1">दूरध्वनी क्रमांक: -----------------------      </th>
<tr>
</strong>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>




