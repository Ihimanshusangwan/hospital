<?php
$id = $_GET['id'];
require("../admin/connect.php");
session_start();
$sql = "SELECT * FROM patient_records WHERE id = '$id';";
$data = $conn->query($sql);
$res = $data->fetch_assoc();

$sql1 = "SELECT * FROM patient_info WHERE patient_id = '$id';";
$data1 = $conn->query($sql1);
$res1 = $data1->fetch_assoc();

$sql2 = "SELECT * FROM ortho_p_insure WHERE id = '$id';";
$data2 = $conn->query($sql2);
$res2 = $data2->fetch_assoc();
$sql = "SELECT * FROM titles WHERE id = 1;";
$data = $conn->query($sql);
$title = $data->fetch_assoc();

$sql6="SELECT * FROM `minor_pro_consent` WHERE `id` = '$id' ";
$data6=$conn->query($sql6);
$res6=$data6->fetch_assoc();
$sql12="SELECT * FROM `config_print` WHERE 1";
$data12=$conn->query($sql12);
$res12=$data12->fetch_assoc();
$inp=$res12['inp'];
$inp_arr=json_decode($inp,true);
$inp_arr = is_array($inp_arr) ? $inp_arr: array_fill(0,2, '');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <style>
        th,td{
            font-size:15px !important; 
        }
    body {
        margin: 0;
    }

    .style5 {
        color: #333333
    }

    .style8 {
        font-size: 16px;
        font-weight: bold;
    }

    .style10 {
        font-size: 16px
    }

    .style11 {
        font-size: 15px;
    }

    .style12 {
        font-size: 15px;
        font-weight: bold;
    }

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

        @page {
            size: A4;
        }

        .noprint {
            visibility: hidden;
        }
    }
    </style>
</head>

<body class="m-2">

    <div id="button">
        <button type="button" class="btn btn-danger mt-4 noprint" id="print">Print</button>
        <a href="minor_pro_consent.php?id=<?php echo $id; ?>" class="btn btn-info mt-4 noprint"
            id="dashboard">Dashboard</a>
    </div>
   

    <?php if($inp_arr[0]=='option1'){
     include_once("../header/images.php");
        echo' 
        <h3 class="text-center text-dark my-3 ">INFORMED CONSENT FOR MINOR PROCEDURE</h3>
        <h3 class="text-center text-dark my-3 ">किरकोळ प्रक्रियेसाठी संमती पात्र</h3>
        <h6 class="text-center text-dark my-3 "> Name of procedure : (Tick as Applicable) : प्रक्रियेचे नाव - ( योग्य ठिकाणी
            खून करावी )</h6>';
        include_once("../header/header.php");

    } 
    else{

        echo '<div style="margin-top: 400px;"></div>';
    }
    ?>

    <table width="95%" style="width:100%">
        <tr>
                <table width="95%" style="width:100%" style="font-size:50px;">

                    <tr>
                        <th width="7%"><span class="style8">Sr.No.
                        </th>

                        <th width="30%">
                            Name of Procedure(प्रक्रियेचे नाव)
                        </th>
                        <th width="12%">checkbox</th>
                        <th width="9%"><span class="style8">Sr.No.</th>
                        <th width="30%">
                            Name of Procedure(प्रक्रियेचे
                            नाव)
                        </th>
                        <th width="12%">
                            checkbox
                        </th>
                    </tr>
                    <tr>
                        <td class="mt-3">
                            01
                        </td>
                        <td>
                            Aspiration(एस्पिरेशन)
                        </td>
                        <td><input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_1']=='on'?'checked':''; ?> name="input_1"></td>
                        <td>
                            08
                        </td>
                        <td>
                            Biopsy(बायोप्सी)
                        <td> <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_8']=='on'?'checked':''; ?> name="input_8"></td>
                    </tr>
                    <tr>
                        <td>
                            02
                        </td>
                        <td>
                            Lumbar Puncture(लुम्बारपंचार)
                        <td> <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_2']=='on'?'checked':''; ?> name="input_2"></td>
                        <td>
                            09
                        </td>
                        <td>
                            Bronchoscopy(ब्रोन्कोस्कोपी)
                        <td> <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_9']=='on'?'checked':''; ?> name="input_9"></td>
                    </tr>
                    <tr>
                        <td>
                            03
                        </td>
                        <td>
                            Central Venous Access(सेंट्रल व्हेन्स ऍक्सेस)
                        <td> <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_3']=='on'?'checked':''; ?> name="input_3"></td>
                        <td>
                            10
                        </td>
                        <td>
                            Arterial Line (अर्टेरियल लाईन)
                        <td> <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_10']=='on'?'checked':''; ?> name="input_10"></td>
                    </tr>
                    <tr>
                        <td>04 </td>
                        <td>
                            F.N.A.C.(एफ. एन. ए. सी .)
                        <td>
                            <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_4']=='on'?'checked':''; ?> name="input_4">
                        </td>
                        <td>11</td>
                        <td>Dialysis (डायलेसिस)
                        <td> <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_11']=='on'?'checked':''; ?> name="input_11"></td>
                    <tr>
                        <td>
                            05
                        </td>
                        <td>
                            Endo tracheal Intubation(इंडोट्रकियाला इंटुबेशन)
                        </td>
                        <td> <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_5']=='on'?'checked':''; ?> name="input_5"></td>
                        <td>12</td>
                        <td>Ascitic Paracentesis(असायटीक पॅरासेन्सटीसिस)
                        <td> <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_12']=='on'?'checked':''; ?> name="input_12"></td>
                    <tr>
                        <td>
                            06
                        </td>
                        <td>
                            Vein Cut Down(वेन कटडाऊन) >
                        </td>
                        <td> <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_6']=='on'?'checked':''; ?> name="input_6"></td>
                        <td>13</td>
                        <td>Catheterization(कॅथेटरायजेशन)
                        <td><input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_13']=='on'?'checked':''; ?> name="input_13"></td>
                    </tr>
                    <tr>
                        <td>
                            07
                        </td>
                        <td>
                            Other(इतर)
                        <td> <input type="checkbox" class="form-check-input"
                                <?php echo $res6['input_7']=='on'?'checked':''; ?> name="input_7">
                    </tr>
                </table <br>

                <h1>

                    <p class="style11"> 1. I have been advised of my medical condition the benefits , reason for
                        procedure as indicated by the clinical observations and / or diagnostics performed , the risk of
                        not having the procedure, alternative test I could have and their risk.
                    <p class="style11">
                    <p class="style11">माझ्या आरोग्य स्थिती नुसार व करण्यात आलेल्या तपासणी आणि निदान नुसार माझ्यावर
                        करण्यात येणाऱ्या प्रक्रियेची माहिती देण्यात आलेली आहे. तसेच हि प्रक्रिया करून नाही घेतल्यास
                        ऊध्वनारे संभाव्ये धोके , पर्यायी तपासण्या आणि त्यांचे धोके याबाबत माहिती देण्यात आलेली आहे.
                    <p class="style11">

                    <p class="style11"> २. I recognize that no guarantee have been made regarding like hood of success
                        or outcomes and also whether the procedures will give my doctor any further information and
                        further test may be needed . </p>
                    <p class="style11"> मला / आम्हाला हे सूचित केले आहे कि येणाऱ्या प्रक्रियेच्या यशस्वितेची पूर्ण
                        खात्री देता येत नाही तसेच या प्रक्रियेनंतर माझ्या डॉक्टरांच्या सल्ल्यानुसार काही तपासण्या
                        करण्यात येऊ शकतात याची मला कल्पना देण्यात आलेली आहे.
                    <p class="style11">

                    <p class="style11"> 3. I authorize Dr. <strong><?php echo $res6['dr_name_1']; ?></strong> and / or his assistants to perform above mentioned procedure
                        upon me .
                    <p class="style11">

                    <p class="style11"> मी डॉ . <strong><?php echo $res6['dr_name_2']; ?></strong> आणि त्यांचे सहाय्य्क यांना माझ्यावर उपरोक्त
                        नमूद केलेली प्रक्रिया करण्यासाठी संमती देत आहे.
                    <p class="style11">

                    <p class="style11"> ४. As with any procedure , I am aware that risks as blood loss , infection
                        ,change in blood pressure , heart failure, anesthetic / allergic reaction ,blood clots in leg
                        etc. may arise which may require attention . Therefore besides consenting the performance of the
                        procedure , I also consent and authorize the rendering of such other care and treatment as my
                        doctor and his associates believes necessary.
                    <p class="style11">
                    <p class="style11"> प्रक्रये दरम्यान रक्तस्राव ,जंतुसंसर्ग,रक्तदाबात फरक हृदय निकामी होण,रक्तात
                        गुठळी होणे,अनेस्थेशिया तसेच अलर्जीक रिएक्शन येणे या प्रकारचे धोके उद्भवू शकतात. म्हणून या
                        प्रक्रियेस संमती देताना यामुळे होणाऱ्या धोक्यांपैकी काही घडल्यास त्यावर लागणाऱ्या उपचारासाठी
                        डॉक्टर व त्यांच्या सहकार्यांना संमती देतो .
                    <p class="style11">
                    <p class="style11"><span class="style11"> ५. I agree that biopsy tissue taken during the procedure
                            will be kept for a period of time. </span>
                    <p>
                    <p class="style10 style11"> प्रक्रयेमध्ये काढण्यात आलेला अवयवाचा तुकडा तपासणीसाठी काही जतन करण्यात
                        येऊ शकतो याबाबत मी सहमत आहे.
                    <p class="style11">

                    <p class="style11"> ६. I consent and agree to the sedation to above mentioned anesthetist for
                        performance of the procedure. I am aware that risk of sedation and also consent to
                        supplementation with any other mode of anesthesia if necessary .
                    <p class="style11">
                    <p class="style11"> ६. उपरोक्त नमूद करण्यात आलेल्या प्रक्रियेसाठी बधिरीकरण करण्यासाठी मी उपरोक्त
                        नमूद करण्यात आलेल्या भूल तज्ञयांना संमती देत आहे. मला भूल देण्या मधील धोके याबाबत कल्पना देण्यात
                        आलेली आहे . गरजेनुसार भूल प्रकारात होणाऱ्या बदलास मी संमती देत आहे.
                    <p class="style11">

                    <p class="style11"> ७. I have informed the doctor about all my previous illnesses , allergies , drug
                        reactions , surgical procedures and any other relevant information relevant to my treatment . I
                        shall not hold the Hospital ,doctor or any staff responsible for any consequence which may arise
                        from the non disclosure of the same.
                    <p class="style11">

                    <p class="style11"> माझ्या डॉक्टरांना माझे आधीचे आजार , एलर्जी , औषधाची रिएक्शन ,शस्त्रक्रिया तसेच
                        माझ्या चिकीत्सेशी संबंधित माहिती दिलेली आहे. याबाबत माहिती न दिल्यामुळे उध्दभवणाऱ्या परिणामा
                        बाबत मी रुग्णालय यातील कर्मचारी यांना जबाबदार ठरवणार नाही.
                    <p class="style11">
                    <p class="style11"> ८. My queries and concerns about my condition , the procedure , cost, risk and
                        treatment options have been discussed with my doctor and answered to my satisfaction.
                    <p class="style11">

                    <p class="style11"> माझ्यावर करण्यात येणाऱ्या प्रक्रिये बाबत माझी शारीरिक स्थिती ,प्रक्रियेची माहिती
                        ,अंदाजे खर्च तसेच उध्दभवू शकणारा धोका व पर्यायी चिकीत्सा पद्धती या बाबत माझ्या शंकाचे मला समाधान
                        होई पर्यंत निरासन करण्यात आलेले आहे.
                    <p>

                        <style>
                        table,
                        th,
                        td {
                            border: 1px solid black;
                        }
                        </style>
                    <h2>
                    <table class="mt-4">
      <tr>
        <th width="137" class="style22" scope="col"><p>&nbsp;</p></th>
        <th width="105" class="style10" scope="col"><p>Signature सही</p></th>
        <th width="169" class="style10" scope="col"><p>Name नाव</p></th>
        <th width="109" class="style10" scope="col"><p>Date दिनांक</p></th>
        <th width="102" class="style10" scope="col"><p>Time वेळ</p></th>
      </tr>
      <tr>
        <th class="style22" scope="row"><p>Patient / Relative</p>
            <p>रुग्ण / नातेवाईक</p></th>
        <td><strong><?php echo $res6['sign_1']; ?></strong></>
        <td><strong><?php echo $res6['name_1']; ?></td>
        <td><strong><?php echo $res6['date_1']; ?></td>
        <td><strong><?php echo $res6['time_1']; ?></td>
      </tr>
      <tr>
        <th class="style22" scope="row"><p>Witness (Relation with patient) </p>
            <p>साक्षीदार (रुग्णाशी नाते )</p></th>
        <td><strong><?php echo $res6['sign_2']; ?></td>
        <td><strong><?php echo $res6['name_2']; ?></td>
        <td><strong><?php echo $res6['date_2']; ?></td>
        <td><strong><?php echo $res6['time_2']; ?></td>
      </tr>
      <tr>
        <th class="style22" scope="row"><p>Doctor</p>
            <p>डॉक्टर</p></th>
    
        <td><strong><?php echo $res6['sign_3']; ?></td>
        <td><strong><?php echo $res6['name_3']; ?></td>
        <td><strong><?php echo $res6['date_3']; ?></td>
        <td><strong><?php echo $res6['time_3']; ?></td>
      </tr>
      <tr>
        <th class="style22" scope="row"><p>Interpreter </p>
            <p>माहिती समजावून सांगणारे</p></th>
        <td><strong><?php echo $res6['sign_4']; ?></td>
        <td><strong><?php echo $res6['name_4']; ?></td>
        <td><strong><?php echo $res6['date_4']; ?></td>
        <td><strong><?php echo $res6['time_4']; ?></td>
      </tr>
    </table>

                        <script>
                        window.print();
                        </script>
</body>


</html>