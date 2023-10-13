<?php
    require("../admin/connect.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['audioBlob'])) {
        $audioName = $_POST['audioName'];
        $patientId = $_GET['id'];

        // Insert into the database
        $sql = "INSERT INTO audio (patient_id, audio_name, audio_path) VALUES ('$patientId', '$audioName', '')";
        if ($conn->query($sql) === TRUE) {
            $audioId = $conn->insert_id;
            $audioPath = 'uploads/audio_' . $audioId . '.wav';
            move_uploaded_file($_FILES['audioBlob']['tmp_name'], $audioPath);

            // Update audio_path in the database
            $sql = "UPDATE audio SET audio_path='$audioPath' WHERE id='$audioId'";
            $conn->query($sql);

            echo 'Media saved successfully.';
        } else {
            echo 'Error saving media: ' . $conn->error;
        }
    }

    ?>

<?php

$patientId = isset($_GET['id']) ? $_GET['id'] : null;

if ($patientId) {
    $sql = "SELECT * FROM audio WHERE patient_id='$patientId' order by id desc;";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        button {
            margin: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .status {
            margin-top: 20px;
        }

        .audio-list {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        
      <a class="btn btn-primary m-2" href="liveConsents.php?id=<?php echo $patientId; ?>">Dashboard</a>
        <div>
            <button id="start" class="btn btn-primary">Start Recording</button>
            <button id="stop" class="btn btn-danger" disabled>Stop Recording</button>
            <button id="play" class="btn btn-success" disabled>Play Recorded Audio</button>
            <button id="save" class="btn btn-warning" disabled>Save Recording</button>
        </div>
        <br>
        <div>
            <input type="text" id="audioName" class="form-control" placeholder="Enter audio name">
        </div>

        <div id="output" class="status"></div>

        <form id="uploadForm" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="audioBlob" name="audioBlob">
        </form>

        <div class="audio-list">
            <h4>Recordings:</h4>
            <?php
            if ($patientId && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $audioId = $row['id'];
                    $audioName = $row['audio_name'];
                    $audioPath = $row['audio_path'];
                    echo '<p><strong>Audio Name:</strong> ' . $audioName . ' | <a href="#" class="play-button" data-audio-path="' . $audioPath . '">Play</a></p>';
                }
            } else {
                echo 'No recordings available for this patient.';
            }
            ?>
        </div>
    </div>

    <script>
        const startButton = document.getElementById('start');
        const stopButton = document.getElementById('stop');
        const playButton = document.getElementById('play');
        const saveButton = document.getElementById('save');
        const audioNameInput = document.getElementById('audioName');
        const audioList = document.querySelector('.audio-list');
        let output = document.getElementById('output');
        let audioRecorder;
        let audioChunks = [];

        navigator.mediaDevices.getUserMedia({ audio: true })
            .then(stream => {
                audioRecorder = new MediaRecorder(stream);

                audioRecorder.addEventListener('dataavailable', e => {
                    audioChunks.push(e.data);
                });

                startButton.addEventListener('click', () => {
                    audioChunks = [];
                    audioRecorder.start();
                    output.innerHTML = '<div class="alert alert-info" role="alert">Recording started! Speak now.</div>';
                    saveButton.disabled = true;
                    playButton.disabled = true;
                    stopButton.disabled = false;
                });

                stopButton.addEventListener('click', () => {
                    audioRecorder.stop();
                    output.innerHTML = '<div class="alert alert-info" role="alert">Recording stopped! Click on the play button to listen.</div>';
                    saveButton.disabled = false;
                    playButton.disabled = false;
                    startButton.disabled = true;
                });

                playButton.addEventListener('click', () => {
                    const blobObj = new Blob(audioChunks, { type: 'audio/wav' });
                    const audioUrl = URL.createObjectURL(blobObj);
                    const audio = new Audio(audioUrl);
                    audio.play();
                    output.innerHTML = '<div class="alert alert-success" role="alert">Playing the recorded audio!</div>';
                });

                saveButton.addEventListener('click', () => {
                    const blob = new Blob(audioChunks, { type: 'audio/wav' });
                    const formData = new FormData();
                    formData.append('audioBlob', blob);
                    formData.append('audioName', audioNameInput.value);

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '', true);
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            output.innerHTML = '<div class="alert alert-success" role="alert">Media saved successfully.</div>';
                            location.reload();
                        } else {
                            output.innerHTML = '<div class="alert alert-danger" role="alert">Error saving media.</div>';
                        }
                    };
                    xhr.send(formData);
                });
            }).catch(err => {
                console.log('Error: ' + err);
            });

        // Add event listener for play buttons
        const playButtons = document.querySelectorAll('.play-button');
        playButtons.forEach(button => {
            button.addEventListener('click', () => {
                const audioPath = button.getAttribute('data-audio-path');
                const audio = new Audio(audioPath);
                audio.play();
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
