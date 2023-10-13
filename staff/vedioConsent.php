<?php
require("../admin/connect.php");

$patientId = isset($_GET['id']) ? $_GET['id'] : null;

if ($patientId) {
    $sql = "SELECT * FROM videos WHERE patient_id='$patientId' order by id desc";
    $result = $conn->query($sql);
}

function saveVideo($videoName, $videoBlob, $patientId)
{
    global $conn;

    $sql = "INSERT INTO videos (patient_id, video_name) VALUES ('$patientId', '$videoName')";
    if ($conn->query($sql) === TRUE) {
        $videoId = $conn->insert_id;
        $videoPath = 'uploads/video_' . $videoId . '.webm';
        $tempPath = $videoBlob['tmp_name'];

        if (move_uploaded_file($tempPath, $videoPath)) {
            $sql = "UPDATE videos SET video_path='$videoPath' WHERE id='$videoId'";
            if ($conn->query($sql) === TRUE) {
                return 'Video saved successfully.';
            } else {
                return 'Error updating video path: ' . $conn->error;
            }
        } else {
            return 'Error moving uploaded file.';
        }
    } else {
        return 'Error saving video: ' . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['videoBlob'])) {
        $videoName = $_POST['videoName'];
        $patientId = $_POST['patientId'];

        $response = saveVideo($videoName, $_FILES['videoBlob'], $patientId);
        echo json_encode(['message' => $response]);
        exit;
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Recording and Playback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    
<a class="btn btn-primary m-2" href="liveConsents.php?id=<?php echo $patientId; ?>">Dashboard</a>
    <div class="row">
        <div class="col-12 mb-3">
            <button type="button" id="buttonStart" class="btn btn-primary">Start</button>
            <button type="button" id="buttonStop" class="btn btn-danger" disabled>Stop</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <video autoplay muted playsinline id="videoLive" style="display:none;"></video>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <video controls playsinline id="videoRecorded"></video>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <form id="uploadForm" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" id="videoName" name="videoName" placeholder="Enter video name">
                </div>
                <input type="hidden" id="patientId" name="patientId" value="<?php echo $patientId; ?>">
                <div class="form-group">
                    <input type="file" class="form-control-file" id="videoBlob" name="videoBlob" accept="video/webm" style="display:none;">
                </div>
                <button type="button" onclick="saveVideo()" class="btn btn-success">Save Video</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Videos:</h4>
            <?php
            if ($patientId && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $videoId = $row['id'];
                    $videoName = $row['video_name'];
                    $videoPath = $row['video_path'];
                    echo '<p><strong>Video Name:</strong> ' . $videoName . ' | <a href="#" class="play-button btn btn-primary" data-video-path="' . $videoPath . '">Play</a></p>';
                }
            } else {
                echo '<p>No videos available for this patient.</p>';
            }
            ?>
        </div>
    </div>
</div>

<script>
    let recordedVideoBlob = null; 
    async function main() {
        // Rest of your code
        const buttonStart = document.querySelector('#buttonStart');
        const buttonStop = document.querySelector('#buttonStop');
        const videoLive = document.querySelector('#videoLive');
        const videoRecorded = document.querySelector('#videoRecorded');
        const videoNameInput = document.getElementById('videoName');
        const patientIdInput = document.getElementById('patientId');
        const videoBlobInput = document.getElementById('videoBlob');

        const stream = await navigator.mediaDevices.getUserMedia({
            video: true,
            audio: true,
        });

        videoLive.srcObject = stream;

        if (!MediaRecorder.isTypeSupported('video/webm')) {
            console.warn('video/webm is not supported');
        }

        const mediaChunks = [];
    const mediaRecorder = new MediaRecorder(stream, {
        mimeType: 'video/webm',
    });

    buttonStart.addEventListener('click', () => {
        videoLive.style.display ="inline-block";
        mediaChunks.length = 0;
        mediaRecorder.start();
        buttonStart.setAttribute('disabled', '');
        buttonStop.removeAttribute('disabled');
    });

    buttonStop.addEventListener('click', () => {
        
        videoLive.style.display ="none";
        mediaRecorder.stop();
        buttonStart.removeAttribute('disabled');
        buttonStop.setAttribute('disabled', '');
    });

    mediaRecorder.addEventListener('dataavailable', event => {
        if (event.data.size > 0) {
            mediaChunks.push(event.data);
            const blob = new Blob(mediaChunks, { type: 'video/webm' });
            videoRecorded.src = URL.createObjectURL(blob);
            recordedVideoBlob = blob; // Assign the recorded video blob to the variable
        }
    });
}

async function saveVideo() {
    const videoName = document.getElementById('videoName').value;
    const patientId = document.getElementById('patientId').value;

    if (!recordedVideoBlob) { // Check if recordedVideoBlob is set
        alert('No recorded video available.');
        return;
    }

    const formData = new FormData();
    formData.append('videoName', videoName);
    formData.append('patientId', patientId);
    formData.append('videoBlob', recordedVideoBlob); // Use the recorded video blob

    try {
        const response = await fetch('', { // Empty string means the current URL
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            const responseData = await response.json();
            console.log('Video saved successfully:', responseData.message);
            alert("Video saved successfully");
            location.reload();
            // You can update the UI or take further actions upon successful save
        } else {
            console.error('Error saving video:', response.statusText);
        }
    } catch (error) {
        console.error('Error saving video:', error);
    }
}

    const playButtons = document.querySelectorAll('.play-button');

    playButtons.forEach(button => {
        button.addEventListener('click', () => {
            const videoPath = button.getAttribute('data-video-path');
            const video = document.getElementById('videoRecorded');
            video.src = videoPath;
        });
    });

    main();
</script>
</body>
</html>
