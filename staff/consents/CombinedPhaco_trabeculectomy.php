<?php 
 require("../../admin/connect.php");
 $id = $_GET['id'];
 session_start();
//  error_reporting(0);

 $sql=mysqli_query($conn,"SELECT * FROM patient_records WHERE id = '$id';");
 $row=mysqli_fetch_assoc($sql);

 $sql1=mysqli_query($conn,"SELECT * FROM patient_info WHERE patient_id = '$id';");
 $row1=mysqli_fetch_assoc($sql1);

 $sql2=mysqli_query($conn,"SELECT * FROM p_insure WHERE id = '$id';");
 $row2=mysqli_fetch_assoc($sql2);
 

 $sql = "SELECT * FROM titles WHERE id = 1;";
 $data = $conn->query($sql);
 $title = $data->fetch_assoc();
 $sql12="SELECT * FROM `config_print` WHERE 1";
$data12=$conn->query($sql12);
$res12=$data12->fetch_assoc();
if (!isset($res12['inp'])) {
    $inp_arr = array_fill(0, 3, 'option2');
} else {
    $inp = $res12['inp'];
    $inp_arr = json_decode($inp, true);
    $inp_arr = is_array($inp_arr) ? $inp_arr : array_fill(0, 3, '');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Combined Phaco-trabeculectomy     </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

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

    .pad {
        padding: 2px;
    }

   
    </style>

    <style type="text/css">
<!--
.style10 {font-size: 11px}
.style22 {font-size: 11px; color: #000000; }
.style27 {font-size: 12px}
    .style33 {
	color: #660066;
	font-size: x-large;
	font-weight: bold;
}
.style39 {color: #058CFA}
@media print {
            .noprint {
                visibility: hidden;
            }
        }
    </style>

    
<p align="right" class="style10">  तारीख -------/-----/------<p>
	</head>
  </style>
</head>
<body>
<a class="btn btn-primary noprint" href="../eye_forms.php?id=<?php echo $id; ?>">Dashboard</a>
           <button class='btn btn-success noprint' onclick="window.print();">Print</button>

     <h2><h2>
     <?php if($inp_arr[1]=='option1'){
            include_once("../header/images.php");

        } 
       
        ?>
</body>
  
</html>
<h1 align="center" class="style33 style40"><strong> Combined Phaco-trabeculectomy     </strong></h1>
<h1 align="center" class="style33"><strong> ( काचबिंदू व मोतीबिंदू शस्त्रक्रिया एकत्रितपणे करणे ) </strong></h1>
<div class="container"> <?php require("../../admin/consentHeaderDetails.php");?> </div>
<p align="center" class="style9 style23 style27"><span class="style33">-------------------------- उपचारपद्धतीची आवश्यकता,  फायदे आणि इतर उपचारपद्धती --------------------------</span> </p>

</p> शस्त्रक्रियेची आवश्यकता, फायदे, इतर उपचारपद्धती मला माझ्या मातृभाषेत पूर्णपणे समजावून सांगण्यात आलेले आहे की माझ्या डोळ्यावर मोतीबिंदू व काचबिंदू ह्या दोन्ही शस्त्रक्रिया एकत्रितपणे (combined) करण्याची आवश्यकता आहे. <p>

</p> <strong> मला ठाऊक आहे की मला मोतीबिंदू व काचबिंदू हे दोन्ही झालेले असून त्या दोन्ही आजारांमुळे मला कमी दिसत आहे .ह्या शस्त्रक्रियेनंतर मोतीबिंदूमुळे झालेला दृष्टिदोष सुधारेल परंतु काचबिंदूमुळे झालेला दृष्टिदोष सुधारणार नाही याची मला संपूर्ण कल्पना आहे. </strong> <p> 

</p> माझ्या डॉक्टरांनी मला मूलभूत मोतीबिंदू शस्त्रक्रिया कृत्रिम भिंगारोपण शस्त्रक्रिया, या दोन्ही शस्त्रक्रियांचे फायदे, तोटे, संभाव्य धोके, गुंतागुंती तसेच इतर उपचारपद्धतीची माहिती दिलेली आहे. <p>

</p> मला हे सांगितले आहे की काचबिंदू शस्त्रक्रियेमुळे ( Trabeculectomy) माझ्या डोळ्याचा दाब नियंत्रणात राहील. डोळ्याचा दाब जर जास्त काळ वाढलेला राहिला तर डोळ्याची नस (Optic Nerve ) खराब होऊन दृष्टी कमी होते व कायमचे अंधत्व येऊ शकते. शस्त्रक्रिया यशस्वी झाल्यावर डोळ्याचा दाब नियंत्रणात रहातो. त्यामुळे काचबिंदूमुळे अंधत्व येण्याचा धोका कमी होतो. 
शस्त्रक्रियेचा हेतू डोळ्याचा दाब कमी करणे आणि दृष्टी टिकवून ठेवणे हा आहे. <strong>काचबिंदूमुळे गमावलेली दृष्टी परत मिळवता येत नाही.</strong><p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- गुंतागुंती (complications) ---------------------------- ------</span> </p>

</p> इतर शस्त्रक्रियांप्रमाणे या शस्त्रक्रियेमध्ये अनेक धोके आहेत, डोळ्याचा दाब कमी न होणे व त्यासाठी औषधोपचार चालू ठेवावा लागणे, अजून एखाद्या शस्त्रक्रियेची आवश्यकता भासणे. सर्व धोके लिहिणे शक्य नाही परंतु या गुंतागुंती काही दिवस आठवडे, महिने किंवा वर्षांनी दिसून येऊ शकतात त्यामुळे शस्त्रक्रियेनंतर वारंवार फेरतपासणीसाठी येण्याची गरज आहे.<p>
</p> जखम भरून आल्यानंतरही नियमितपणे उपचार घेण्यास व डोळ्याचा दाब तपासून घेण्यासाठी येण्याची आवश्यकता आहे.<p>


<p align="center" class="style9 style23 style27"><span class="style33"> ---------------------------------- गुंतागुंती (complications) ----------------------------------</span> </p>

</p> इतर शस्त्रक्रियांप्रमाणे या शस्त्रक्रियेमध्ये अनेक धोके आहेत, डोळ्याचा दाब कमी न होणे व त्यासाठी औषधोपचार चालू ठेवावा लागणे, अजून एखाद्या शस्त्रक्रियेची आवश्यकता भासणे. डोळ्याचा दाब शस्त्रक्रियेनंतर जरी नियंत्रणात आला तरी काचबिंदूमुळे माझी दृष्टी अजून कमी होऊ शकते.
या ठिकाणी सर्व धोके नमूद करणे शक्य नाही परंतु हे दुष्परिणाम काही दिवस आठवडे महिने किंवा वर्षांनी दिसून येऊ शकतात त्यामुळे शस्त्रक्रियेनंतर वारंवार फेरतपासणीसाठी येण्याची गरज आहे. जखम भरून आल्यानंतरही नियमितपणे उपचार घेण्यास व डोळ्याचा दाब तपासून घेण्यासाठी येण्याची आवश्यकता आहे. <p>



<p align="center" class="style9 style23 style27"><span class="style33">----------------------------मोतीबिंदू शस्त्रक्रियेच्या गुंतागुंती ---------------------------- </span> </p>

</p> १. नैसर्गिक नेत्रभिंग काढताना रक्तस्त्राव, भिंगास सपोर्ट देणारे आवरण फाटणे, डोळ्यात छिद्र पडणे ( परफोरेशन- हे भूल देण्याच्या इंजेक्शनच्या सुईमुळे डोळ्याच्या पांढऱ्या आवरणात पडू शकते), नेत्रपटलास सूज ( कॉर्निअल इंडिमा) येऊन काही काळासाठी धुरकटपणा येणे. यासाठी कधी कधी नेत्रपटलरोपण (corneal transplant) शस्त्रक्रियेची गरज भासते. दृष्टिपटलातील पीतबिंदूस सूज येते (मॅक्यूलर इडिमा). ही सूज काही दिवसांत कमी होते.
मोतीबिंदूच्या सर्वात मागील आवरणाला छिद्र पडणे, या छिद्रातून संपूर्ण मोतीबिंदू अथवा त्याचे काही तुकडे storiया अंतर्भागात जाणे व काही तुकडे डोळ्यांच्या आतच राहणे जे शस्त्रक्रियेने काढण्याची गरज पडू शकते. डोळ्यांमध्ये एक प्रकारची रिअॅक्शन येऊन सूज येणे (आयरायटिस), जंतुंचा प्रादुर्भाव, दृष्टीपटल निसटणे, डोळ्यात असहय वेदना होणे, पापणी खाली येणे. विषम ( वक्र) दृष्टीदोष (astigmatism) वाढणे, काही काळासाठी डोळ्याचा दाब वाढणे (काचबिंदू), दोन प्रतिमा दिसणे, हे होऊ शकते. या आणि अशा इतर गुंतागुंतींचा परिणाम होऊन विशेषतः जंतुसंसर्ग होऊन (एंडॉफ्थल्मायटिस किंवा पॅन ऑफ्थल्मायटिस) होऊन दृष्टी कमी होऊ शकते किंवा पूर्णपणे कायमस्वरूपी अंधत्व येऊ शकते व कधी कधी अपवादात्मक परिस्थितीत पूर्ण डोळाही खराब होऊन गमावला जाऊ शकतो. असे प्रादुर्भाव कृत्रिम भिंगारोपण केले
किंवा नाही केले तरी होऊ शकतात. हे सर्व संभाव्य धोके दुर्मिळ असतात. <p>

</p> २. कृत्रिम नेत्रभिंगामुळे होऊ शकणारे गुंतागुंतीचे परिणाम रात्रीच्या वेळी डोळ्यासमोर अधिक प्रकाश चमकणे, प्रकाशवर्तुळ ( halo) दिसणे, दोन प्रतिमा दिसणे किंवा छुपी ( ghost ) प्रतिमा दिसणे, भिंग सरकणे, बहुकेंद्रित (मल्टिफोकल) भिंगामध्ये हे जास्त प्रमाणात आढळू शकते. काही प्रसंगी नजर सुधारण्यासाठी चष्मा, कॉन्टॅक्ट लेन्स किंवा कृत्रिम नेत्रभिंग बदलणे असे उपाय करावे लागतात. जर एककेंद्रित ( मोनोफोकल) भिंग वापरल्यास आवश्यक दृष्टीसाठी जवळचा किंवा दूरचा चष्मा किंवा कॉन्टॅक्ट लेन्स ची गरज भासू शकते. मल्टिफोकल लेन्स असेल तर चष्म्याची गरज भासणार नाही पण कदाचित कमी उजेडात व धुक्यात नजरेची स्पष्टता कमी असू शकते. तसेच रात्री दिव्याभोवती वर्तुळे किंवा वलये दिसू शकतात. गडद पार्श्वभूमीवरच्या वस्तू आणि विशेषतः कमी उजेडात नीट बघायला त्रास होऊ शकतो. रात्री वाहन चालवताना अडचण येऊ शकते. शस्त्रक्रिया करताना काही गुंतागुंत वाटल्यास मल्टिफोकल ऐवजी मोनोफोकल भिंग बसवावे लागते. जरी मल्टिफोकल भिंग बसविले तरी सर्व टप्प्यांवरची जवळची, मध्य अंतराची नजर सुधारतेच असे नाही. त्यामुळे उत्तम दृष्टीसाठी काही अधिक उपचार आणि / किंवा शस्त्रक्रिया लागू शकतात. काही वेळा बसवलेले नेत्रभिंग काढून त्या जागी दुसरे बसवावे लागते. कधी कधी चष्म्याची गरज पडू शकते हे आधीही नमूद केलेले आहे. <p>

</p> ३. शस्त्रक्रियेदरम्यान काही गुंतागुंत झाल्यास तुमच्या डोळ्यात कृत्रिम नेत्रभिंग न बसविण्याचा निर्णय तुमचे नेत्रतज्ज्ञ घेतात. पण त्यासाठीची पूर्वपरवानगी तुम्हाला द्यावी लागते. शस्त्रक्रियेदरम्यान डोळ्यात घेतलेला छेद एका विशिष्ट पद्धतीने केल्यामुळे तो आपोआप बंद होतो ( व्हाल्व इंन्सिजन) पण क्वचित प्रसंगी तो बंद करण्यासाठी टाके घ्यावे लागतात. <p>

</p> ४.मोतीबिंदू शस्त्रक्रियेनंतर येणारी दृष्टी ही इतरही काही बाबींवर अवलंबून असते. त्यामध्ये काचबिंदू, मधुमेहामुळे झालेले दृष्टिपटलातील दोष, वयोमानामुळे सुरकुतलेला पीतबिंदू ( age related macular degeneration). कृत्रिम नेत्रभिंगाचा नंबर (IOL power). प्रत्येक माणसाची डोळा बरे होण्याची क्षमता अशा अनेक बाबी आहेत. इतर कोणत्याही कारणांनी कमी झालेली दृष्टी जसे काचबिंदू मधुमेहामुळे किंवा वृद्धत्वाने आलेला पीतबिंदूचा सुरुकुतलेपणा, हे दोष मोतीबिंदू शस्त्रक्रियेने सुधारू शकत नाहीत.<p>

</p> ५. अद्ययावत यंत्रसामुग्री व संगणक समीकरणाच्या सहाय्याने कृत्रिम नेत्रभिंगाची नंबर मोजण्याचे शास्त्र अचूक नाही. त्यामुळे शस्त्रक्रियेपूर्वी मशीनवर मोजलेली पॉवर ( ज्यावर आधारित निवडलेले कृत्रिम भिंग) व शस्त्रक्रियेनंतर डोळा पूर्ण बरा झाल्यानंतरची पॉवर यामध्ये फरक पडू शकतो. अशा वेळी सुस्पष्ट दृष्टीसाठी चष्मा किंवा कॉन्टॅक्ट लेन्स ची गरज पडू शकते. जर तुम्ही प्राप्त दृष्टीने समाधानी नसाल तर कृत्रिम नेत्रभिंग बदलणे, अजून एक नेत्रभिंग आत बसवणे, किंवा लेझर उपचारांनी डोळ्यांचा नंबर घालवणे हे करता येऊ शकते.<p>

</p> ६. आपला डोळा हे यंत्र नसून जिवंत अवयव असल्याने शस्त्रक्रियेच्या अगदी अचूक परिणामांची १०० % शाश्वती देता येत नाही.<p>

</p>  ७. तुम्ही कोणतेही भिंग निवडले तरी तुम्हाला कधी कधी याग लेझरची ( YAG Laser) गरज पडू शकते. ज्या थैलीमध्ये नेत्रभिंग बसवले जाते, त्या शैलीचे मागील आवरण काही दिवसांनंतर/ वर्षांनंतर अपारदर्शक झाल्यास दृष्टी धुरकट होते व याग लेझर उपचारांनी आवरणामध्ये छिद्र करून दृष्टी पुन्हा सुधारता येऊ शकते.<p>

</p> ८. कधीतरी भविष्यामध्ये रोपण केलेले नेत्रभिंग पुन्हा सरकवून योग्य जागी बसवण्याची किंवा शस्त्रक्रियेने काढून टाकण्याची किंवा एक काढून दुसरे बसवण्याची गरज पडू शकते.<p>

</p> ९. जर तुमच्या डोळ्यात जास्त प्रमाणाचा दूरदृष्टीता जवळचे न दिसण्याचा दोष / दीर्घदृष्टी ( hyperopia) असेल आणि डोळ्यांची लांबी (axial length) खूप कमी असेल तर नॅनॉफ्थेल्मिक कोरॉयडल इफ्युजन म्हणजेच आकाराने अती लहान डोळ्यात कोराइडमधून द्रव झिरपणे. या गुंतागुंतीमुळे शस्त्रक्रियेत अनेक अवघड अडथळे येऊ शकतात. कधी कधी शस्त्रक्रिया पूर्ण करणे व कृत्रिम भिंग बसवणे अशक्य असते. कधी कधी डोळा ही गमावला जाऊ शकतो. त्यासाठी कधी कधी डोळा वाचवण्यासाठी व हे इफ्युजन थांबवण्यासाठी काही वेगळ्या शस्त्रक्रिया जसे स्क्लेरोटॉमी ( डोळ्याच्या बाहेरील पांढऱ्या आवरणात छोटे छेद घेणे) कराव्या लागतात. <p> 

</p> १०. जर तुम्हाला जास्त प्रमाणात दूरचे न दिसण्याचा दोष हस्वदृष्टी (myopia) असेल व / किंवा डोळ्यांची लांबी प्रमाणापेक्षा जास्त असेल ( लांब ऑक्सियल लेंथ) तर दृष्टीपटल निसटण्याचा (रेटिनल डिटॅचमेंट) धोका वाढतो. दृष्टीपटल शस्त्रक्रिया करून परत पूर्ववत करता येते परंतु दृष्टी जाऊ शकते व अंधत्व येऊ शकते. <p>

</p> ११. एका वेळी एकाच डोळ्याची शस्त्रक्रिया केल्याने काही काळ तुम्हाला दोन डोळ्यांच्या नजरेत फरक जाणवेल (अनुआयसोमेट्रोपिया) व नजर संतुलित होण्यास वेळ लागतो. हे चष्म्यानेही सुधारता येत नाही कारण दोन्ही डोळ्यांच्या चष्म्याच्या नंबरमध्ये बराच फरक असतो. अशा वेळी दोन पर्याय असतात. एक तर फक्त शस्त्रक्रिया झालेल्या डोळ्यानेच दूरचे पाहणे किंवा शस्त्रक्रिया न झालेल्या डोळ्याला कॉन्टॅक्ट लेन्स बसवणे. जर शस्त्रक्रिया झालेल्या डोळ्यात काही गुंतागुंत नसेल व पूर्ण बरा असेल तर तो डोळा स्थिरस्थावर झाल्यावर काही दिवसात / आठवड्यात दुसऱ्या डोळ्यांची मोतीबिंदू शस्त्रक्रिया करता येऊ शकते.<p>

</p> १२. ज्यांना मोतीबिंदू असतो त्यांना वयोमानाने वयाच्या चाळीस वर्षानंतर चाळीशी (Presbyopia) असू शकते. साधारणपणे दूरची व जवळची दृष्टी उत्तम असणाऱ्यानाही चाळीशीनंतर जवळचा चष्मा लागतो. त्यांना बायफोकल म्हणजे एकाच चष्म्याने जवळचे व दूरचे दोन्ही पाहता येणे किंवा दूरचा व जवळचा असे दोन चष्मे वापरणे. मोतीबिंदू शस्त्रक्रियेनंतर दूरचे व जवळचे पाहण्यासाठी तुम्हाला अनेक पर्याय उपलब्ध आहेत.<p>

</p>१३. शस्त्रक्रिया व त्यासाठी दिल्या जाणाऱ्या भुलीमुळे दृष्टी कमी होण्याची शक्यता असते. काही वेळा काही अनपेक्षित गुंतागुंतीच्या समस्या अनेक आठवड्यानंतर, महिन्यांनंतर वा अनेक वर्षांनंतरही उद्भवू शकतात. <p>

</p> १४. वेगवेगळ्या भूलीमुळेही वेगवेगळे धोके उद्भवू शकतात. यामध्ये हृदयाच्या व श्वसनाच्या समस्या आणि अगदी अपवादात्मक परिस्थितीत मृत्यू होऊ शकतो. <p>

<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- काचबिंदू शस्त्रक्रियेतील गुंतागुंती ---------------------------- ------</span> </p>

</p> 1. डोळ्याचा दाब कमी न होणे व त्यासाठी लवकर किंवा काही काळाने शस्त्रक्रिया करावी लागणे. <p>

</p> 2. डोळ्याची दृष्टी कमी होणे. डोळ्यांमध्ये मोतीबिंदू होणे तसेच वक्रदृष्टीदोष ( Astigmatism) निर्माण होणे. यासाठी अजून एखाद्या शस्त्रक्रियेची गरज भासणे तसेच त्यामुळे आधीची शस्त्रक्रिया निरुपयोगी ठरणे<p>

</p>3. डोळ्याचा दाब अधिक प्रमाणात वाढणे किंवा अती कमी होणे व त्यासाठी अधिक उपचारांची आवश्यकता भासणे. <p>

</p> 4. डोळ्यांत रक्तस्त्राव होणे.  <p>

</p> 5. डोळा दीर्घ काळ लाल राहणे व दुखणे तसेच दीर्घकालीन सूज असणे.<p>

</p> 6. डोळा चुरचुरणे व कायम अस्वस्थ वाटणे ( फुगवटाbleb / टाके असल्याने) <p>

</p> 7. शस्त्रक्रिया करून देखील दृष्टी कमीकमी होत जाणे <p> 

</p> 8. जंतुसंसर्ग ( लवकर किंवा उशिराने) व त्यामुळे डोळा लाल होणे, दृष्टी कमी होणे, डोळा दुखणे. <p>

</p> 9. काही दुर्मिळ घटनेत दृष्टी पूर्णपणे गमावणे. <p>

</p> 10. शस्त्रक्रियेद्वारे डोळ्याच्या पांढऱ्या आवरणावर केलेल्या फुगवट्यातून (bleb) गळती होणे ( लवकर किंवा उशिराने) व त्यासाठी अधिक उपचारांची आवश्यकता कॉन्टॅक्ट लेन्स डोळ्याला पट्टी बांधणे परत शस्त्रक्रिया करणे<p>

</p> 11. शस्त्रक्रियेत वापरलेल्या रासायनिक संयुगांमुळे (Antimetabolites) होणाऱ्या गुंतागुंती- बुबुळाला (cornea ) जखम होणे, फुगवट्याला गळती लागणे. फुगवट्याला जंतुसंसर्ग होणे. <p>

</p> 12. शस्त्रक्रियेच्या जागी व वरच्या पापणीच्या खाली पांढरा फुगवटा निर्माण होणे. या जागी डोळ्यातील जास्तीच्या द्रवपदार्थाचा निचरा होत असतो.<p>

</p> 13. वरची पापणी खाली पडणे / येणे. <p>


<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- डोळ्याभोवती देण्यात येणाऱ्या बधिरीकरणातील गुंतागुंती ---------------------------- ------</span> </p>


</p> शस्त्रक्रिया संपूर्ण किंवा फक्त डोळ्याचे बधिरीकरण करून केली जाईल डोळ्याच्या बधिरीकरणातील धोके पुढीलप्रमाणे आहेत . <p>

</p> 1. डोळ्याला छिद्र पडणे.<p>

</p> 2. सुईमुळे डोळ्याच्या मागील नसेला (Optic nerve ) धक्का पोहोचणे व नस निकामी होणे.<p>

</p> 3. दृष्टिपटलाचा रक्तपुरवठा विस्कळीत होणे.<p>

</p> 4. पापणी खाली पडणे येणे. <p>

</p> 5. रुग्णाच्या जीवाला धोका निर्माण होणे आणि क्वचित प्रसंगी रुग्ण मृत्युमुखी पडणे. <p>


<p align="center" class="style9 style23 style27"><span class="style33">---------------------------------- रुग्णाचे संमतीपत्र ---------------------------- ------</span> </p>

</p>  शस्त्रक्रियेदरम्यान अचानक गुंतागुंतीची परिस्थिती निर्माण होऊ शकते ह्याची मला पूर्ण कल्पना आहे. अशा स्थितीमध्ये कोणताही निर्णय घेण्याची पूर्ण परवानगी मी माझ्या शल्यचिकित्सकाला देत आहे. मला हे माहित आहे की जर ही शस्त्रक्रिया केली नाही तर माझी दृष्टी खराब होऊ शकते. मी हे संमतीपत्र वाचलेले असून मला ते संपूर्णपणे समजले आहे. <p>


</p> सर्व संभाव्य धोके येथे नमूद करणे अशक्य आहे, परंतु धोके टाळण्यासाठी आवश्यक ती सर्व काळजी घेतली जाईल. <p>

</p> सदर शस्त्रक्रियेचे फायदे, तोटे, जोखिमा संभाव्य गुंतागुंती आणि पर्यायी उपचार मला माझ्या नेत्रतज्ज्ञांनी समजावून सांगितले आहेत. शस्त्रक्रियेदरम्यान काही आणीबाणीचे प्रसंग उद्भवण्याची देखील शक्यता आहे. ज्याकरिता मी माझ्या नेत्रतज्ज्ञांना माझ्या / माझ्या रुग्णाच्या हितासाठी योग्य ते उपचार करण्याची संमती देतो / देते. मला शस्त्रक्रियेच्या / उपचाराच्या सगळ्या गुंतागुंतीची (कॉम्प्लिकेशन्स) माहिती देणे शक्य नसले, तरी माझ्या नेत्रतज्ज्ञांनी माझ्या सर्व प्रश्नांची समाधानकारक उत्तरे दिलेली आहेत. हे संमतीपत्र सही करताना मी असे नमूद करतो / करते की मला या संमतीपत्राची प्रत मिळू शकते याची मला कल्पना आहे.<p>

</p> तसेच, या शस्त्रक्रियेची किंवा परत कराव्या लागणाऱ्या शस्त्रक्रियेची माहिती, छायाचित्र किंवा व्हिडिओ रेकॉर्डिंग, है सर्व वैद्यकीय ज्ञानाच्या वृद्धीसाठी प्रकाशित करण्यासाठी मी संमती देतो/देते.
मी हे संमतीपत्र वाचले आहे मला ते वाचून दाखविले आहे, मला ते समजले आहे आणि माझ्या सर्व प्रश्नांची मला उत्तरे मिळालेली आहेत आणि मी माझे नेत्रतज्ज्ञ ----------------------- यांना माझ्या उजव्या डाव्या डोळ्यावर ------------------------- शस्त्रक्रिया करण्यासाठी संमती देतो/ देते. शस्त्रक्रियेसाठीच्या या वैध संमतीपत्रावर मी स्वेच्छेने सही करत आहे. <p>


	<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<h2></h2>	
    <div class="container">
  <?php require("../../admin/middleConsentPatientRelativeDetail.php")?>
</div>
<div class="container">
    <?php require("../../admin/doctorWriitenBottom.php")?>
</div>

</body>
</html>


	