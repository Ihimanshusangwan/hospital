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
session_start();

$sql3 = "SELECT * FROM `acq`  WHERE id = '$id';";
$data3 = $conn->query($sql3);
$acq = $data3->fetch_assoc();
$acqa = explode("&", $acq['acqa']);
$acqb = explode("&", $acq['acqb']);
$acqc = explode("&", $acq['acqc']);
$acqd = explode("&", $acq['acqd']);
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible content=" IE="edge">
    <meta viewport content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
        <style>
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        @media print {

#button {
    display: none !important;
}
@page {size: A4 landscape; 
margin-top: 20px;
}
.noprint {
visibility: hidden;
}
}

    </style>
</head>

<body>

    <div id="button">
        <button type="button" class=" btn btn-danger mt-4 noprint" onclick="window.print()" id="print">Print</button>
        <a href="consumable_acquisition_form.php?id=<?php echo $id; ?>"class=" btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
    <?php include_once("../header/images.php") ?>
    <h3 class="text-center text-dark my-3 ">Consumable Acquisition</h3>
    <?php include_once("../header/header.php") ?>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">SR.</th>
                        <th scope="col">PARTICULAR</th>
                        <th scope="col">SIZE</th>
                        <th scope="col">QTY</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">01</th>
                        <td>Mask</td>
                        <td>

                            <?php echo $acqa[0]; ?>
                        </td>
                        <td>

                            <?php echo $acqa[1]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">02</th>
                        <td>Cap</td>
                        <td>

                            <?php echo $acqa[2]; ?>
                        </td>
                        <td>

                            <?php echo $acqa[3]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">03</th>
                        <td>Meditape</td>
                        <td>

                            <?php echo $acqa[4]; ?>
                        </td>
                        <td>

                            <?php echo $acqa[5]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">04</th>
                        <td>Eye Shield</td>
                        <td>

                            <?php echo $acqa[6]; ?>
                        </td>
                        <td>

                            <?php echo $acqa[7]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">05</th>
                        <td>Eye Patch</td>
                        <td>

                            <?php echo $acqa[8]; ?>
                        </td>
                        <td>

                            <?php echo $acqa[9]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">06</th>
                        <td>J & J Ear Buds</td>
                        <td>
                            <?php echo $acqa[10]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[11]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">07</th>
                        <td>E/D. Paracine</td>
                        <td>
                            <?php echo $acqa[12]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[13]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">08</th>
                        <td>E/D. Apidine</td>
                        <td>
                            <?php echo $acqa[14]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[15]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">09</th>
                        <td>Eye Drape</td>
                        <td>
                            <?php echo $acqa[16]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[17]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>Trolley Drape</td>
                        <td>
                            <?php echo $acqa[18]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[19]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>Surgical Gloves 6.5</td>
                        <td>
                            <?php echo $acqa[20]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[21]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td>Surgical Gloves .0</td>
                        <td>
                            <?php echo $acqa[22]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[23]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td>Surgical Gloves .5</td>
                        <td>
                            <?php echo $acqa[24]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[25]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">14</th>
                        <td>Surgical Gloves .0</td>
                        <td>
                            <?php echo $acqa[26]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[27]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">15</th>
                        <td>I.V. Set</td>
                        <td>
                            <?php echo $acqa[28]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[29]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">16</th>
                        <td>BT Set</td>
                        <td>
                            <?php echo $acqa[30]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[31]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">17</th>
                        <td>RL</td>
                        <td>
                            <?php echo $acqa[32]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[33]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">18</th>
                        <td>NS</td>
                        <td>
                            <?php echo $acqa[34]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[35]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">19</th>
                        <td>BSS</td>
                        <td>
                            <?php echo $acqa[36]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[37]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">20</th>
                        <td>Contasol</td>
                        <td>
                            <?php echo $acqa[38]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[39]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">21</th>
                        <td>Dyspo Van CC</td>
                        <td>
                            <?php echo $acqa[40]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[41]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">22</th>
                        <td>Dyspo Van 2CC</td>
                        <td>
                            <?php echo $acqa[42]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[43]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">23</th>
                        <td>Dyspo Van 5CC</td>
                        <td>
                            <?php echo $acqa[44]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[45]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">24</th>
                        <td>Dyspo Van 0CC</td>
                        <td>
                            <?php echo $acqa[46]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[47]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">25</th>
                        <td>Dyspo Van 20CC</td>
                        <td>
                            <?php echo $acqa[48]; ?>
                        </td>
                        <td>
                            <?php echo $acqa[49]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">26</th>
                        <td>15 Degree LANS TIP</td>
                        <td>
                            <?php echo $acqb[0]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[1]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">27</th>
                        <td>15 Degree LANS MVR</td>
                        <td>
                            <?php echo $acqb[2]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[3]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">28</th>
                        <td>2.8mm Keratome</td>
                        <td>
                            <?php echo $acqb[4]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[5]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">29</th>
                        <td>5.2mm Keratome</td>
                        <td>
                            <?php echo $acqb[6]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[7]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">30</th>
                        <td>2.2mm Cresent</td>
                        <td>
                            <?php echo $acqb[8]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[9]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">31</th>
                        <td>Surgical Blade 1 No</td>
                        <td>
                            <?php echo $acqb[10]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[11]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">32</th>
                        <td>Surgical Blade 5 No</td>
                        <td>
                            <?php echo $acqb[12]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[13]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">33</th>
                        <td>Intracath</td>
                        <td>
                            <?php echo $acqb[14]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[15]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">34</th>
                        <td>Intracath Three way Cannula</td>
                        <td>
                            <?php echo $acqb[16]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[17]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">35</th>
                        <td>Three way Cannula</td>
                        <td>
                            <?php echo $acqb[18]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[19]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">36</th>
                        <td>Merocel PVA Sponge</td>
                        <td>
                            <?php echo $acqb[20]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[21]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">37</th>
                        <td>PVA Segment</td>
                        <td>
                            <?php echo $acqb[22]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[23]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">38</th>
                        <td>CTR</td>
                        <td>
                            <?php echo $acqb[24]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[25]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">39</th>
                        <td>Irirs Hooks</td>
                        <td>
                            <?php echo $acqb[26]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[27]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">40</th>
                        <td>B- Hex Ring</td>
                        <td>
                            <?php echo $acqb[28]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[29]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">41</th>
                        <td>BCL</td>
                        <td>
                            <?php echo $acqb[30]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[31]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">42</th>
                        <td>Fibrin Glue Baxter</td>
                        <td>
                            <?php echo $acqb[32]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[33]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">43</th>
                        <td>Fibrin Glue Reliseal</td>
                        <td>
                            <?php echo $acqb[34]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[35]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">44</th>
                        <td>Suture Material</td>
                        <td>
                            <?php echo $acqb[36]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[37]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">45</th>
                        <td>Trypan Blue Dye</td>
                        <td>
                            <?php echo $acqb[38]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[39]; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">SR.</th>
                        <th scope="col">PARTICULAR</th>
                        <th scope="col">SIZE</th>
                        <th scope="col">QTY</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">01</th>
                        <td>Inj. Lox 2% wuth Adrenaline</td>
                        <td>
                            <?php echo $acqb[40]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[41]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">02</th>
                        <td>Inj. Lox 2%</td>
                        <td>
                            <?php echo $acqb[42]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[43]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">03</th>
                        <td>Inj. Loxicard 2%</td>
                        <td>
                            <?php echo $acqb[44]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[45]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">04</th>
                        <td>Inj. Bupicacaine 0.5%</td>
                        <td>
                            <?php echo $acqb[46]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[47]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">05</th>
                        <td>Inj. Hynidase</td>
                        <td>
                            <?php echo $acqb[48]; ?>
                        </td>
                        <td>
                            <?php echo $acqb[49]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">06</th>
                        <td>Inj. Entodase</td>
                        <td>
                            <?php echo $acqc[0]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[1]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">07</th>
                        <td>Inj. Lox 4% Topical</td>
                        <td>
                            <?php echo $acqc[2]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[3]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">08</th>
                        <td>Inj. Oculan</td>
                        <td>
                            <?php echo $acqc[4]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[5]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">09</th>
                        <td>HPMC 2%</td>
                        <td>
                            <?php echo $acqc[6]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[7]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>Visco</td>
                        <td>
                            <?php echo $acqc[8]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[9]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>Inj. Hylucoat</td>
                        <td>
                            <?php echo $acqc[10]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[11]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td>Inj. Aurocoat</td>
                        <td>
                            <?php echo $acqc[12]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[13]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td>Inj. Adrenaline</td>
                        <td>
                            <?php echo $acqc[14]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[15]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">14</th>
                        <td>Inj.. Auromox</td>
                        <td>
                            <?php echo $acqc[16]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[17]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">15</th>
                        <td>Inj. Vancomycin</td>
                        <td>
                            <?php echo $acqc[18]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[19]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">16</th>
                        <td>Inj. Pilocarpine</td>
                        <td>
                            <?php echo $acqc[20]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[21]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">17</th>
                        <td>Inj. Pilomin</td>
                        <td>
                            <?php echo $acqc[22]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[23]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">18</th>
                        <td>Inj. Diclofenac</td>
                        <td>
                            <?php echo $acqc[24]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[25]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">19</th>
                        <td>Inj. Aurocort</td>
                        <td>
                            <?php echo $acqc[26]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[27]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">20</th>
                        <td>Inj. Razumab</td>
                        <td>
                            <?php echo $acqc[28]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[29]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">21</th>
                        <td>Inj. Accentrix</td>
                        <td>
                            <?php echo $acqc[30]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[31]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">22</th>
                        <td>Inj. Avastin</td>
                        <td>
                            <?php echo $acqc[32]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[33]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">23</th>
                        <td>Inj. Ceftazidine</td>
                        <td>
                            <?php echo $acqc[34]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[35]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">24</th>
                        <td>Inj.Amicacin</td>
                        <td>
                            <?php echo $acqc[36]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[37]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">25</th>
                        <td>Inj. Vozole</td>
                        <td>
                            <?php echo $acqc[38]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[39]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">26</th>
                        <td>Inj. Gentamycin</td>
                        <td>
                            <?php echo $acqc[40]; ?>

                        </td>
                        <td>
                            <?php echo $acqc[41]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">27</th>
                        <td>Inj. Dexa</td>
                        <td>
                            <?php echo $acqc[42]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[43]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">28</th>
                        <td>Inj. Ampho B</td>
                        <td>
                            <?php echo $acqc[44]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[45]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">29</th>
                        <td>Inj. Mannitol</td>
                        <td>
                            <?php echo $acqc[46]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[47]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">30</th>
                        <td>Inj. Ceftriaxone gm</td>
                        <td>
                            <?php echo $acqc[48]; ?>
                        </td>
                        <td>
                            <?php echo $acqc[49]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">31</th>
                        <td>Inj. Mitomycin - C</td>
                        <td>
                            <?php echo $acqd[0]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[1]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">32</th>
                        <td>Inj. Optineuron</td>
                        <td>
                            <?php echo $acqd[2]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[3]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">33</th>
                        <td>Inj. Pan 40</td>
                        <td>
                            <?php echo $acqd[4]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[5]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">34</th>
                        <td>Inj. Tramadol</td>
                        <td>
                            <?php echo $acqd[6]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[7]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">35</th>
                        <td>Inj. IV Methyl Prednisolone</td>
                        <td>
                            <?php echo $acqd[8]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[9]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">36</th>
                        <td>
                            <?php echo $acqd[10]; ?>
                        </td>

                        <td>
                            <?php echo $acqd[11]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[12]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">37</th>
                        <td>
                            <?php echo $acqd[13]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[14]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[15]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">38</th>
                        <td>
                            <?php echo $acqd[16]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[17]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[18]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">39</th>
                        <td>
                            <?php echo $acqd[19]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[20]; ?>
                        </td>
                        <td>
                            <?php echo $acqd[21]; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
                <div><strong>Sign of Ward Sister :</strong><?php echo $acq['ward_sign']; ?></div>
            </div>
        <div class="col-6">
                <div><strong>Sign of ICU Sister :</strong><?php echo $acq['icu_sign']; ?></div>
            </div>
        </div>
    
    <h6>Thank You !</h6>
    <script> window.print();</script>
</body>

</html>