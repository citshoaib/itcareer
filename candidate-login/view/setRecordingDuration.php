
<input type="hidden" id="txt-recording-duration" value="30000" >
<button id="btn-start-recording">Start Recording</button>
<button id="btn-stop-recording" disabled>Stop Recording</button>
<video controls autoplay playsinline></video>

<script src="view/RecordRTC.js"></script>
<script>
var video = document.querySelector('video');

function captureCamera(callback) {
    navigator.mediaDevices.getUserMedia({ audio: true, video: true }).then(function(camera) {
        callback(camera);
    }).catch(function(error) {
        alert('Unable to capture your camera. Please check console logs.');
        console.error(error);
    });
}

function stopRecordingCallback() {
    video.srcObject = null;

    var blob = recorder.getBlob();
    video.src = URL.createObjectURL(blob);

    recorder.camera.stop();
}

var recorder; // globally accessible

document.getElementById('btn-start-recording').onclick = function() {
    this.disabled = true;
    captureCamera(function(camera) {
        video.srcObject = camera;

        recorder = RecordRTC(camera, {
            type: 'video'
        });

        var recordingDuration = parseInt(document.getElementById('txt-recording-duration').value) || 5000;
        recorder.setRecordingDuration(recordingDuration).onRecordingStopped(stopRecordingCallback);

        recorder.startRecording();

        // release camera on stopRecording
        recorder.camera = camera;

        document.getElementById('btn-stop-recording').disabled = false;
        document.getElementById('btn-pause-recording').disabled = false;
    });
};

document.getElementById('btn-stop-recording').onclick = function() {
    this.disabled = true;
    recorder.stopRecording(stopRecordingCallback);
};

document.getElementById('btn-pause-recording').onclick = function() {
    this.disabled = true;

    if(this.innerHTML === 'Pause Recording') {
        recorder.pauseRecording();
        this.innerHTML = 'Resume Recording';
    }
    else {
        recorder.resumeRecording();
        this.innerHTML = 'Pause Recording';
    }

    setTimeout(function() {
        document.getElementById('btn-pause-recording').disabled = false;
    }, 2000);
};
</script>

<script src="https://www.webrtc-experiment.com/common.js"></script>
