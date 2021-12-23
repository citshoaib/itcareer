

   
        <h1 id="header">Record Your Video</h1>
        <h3 style="color: red;">This will work on only Windows OS and Mozilla Firefox browser.

You can also check it on Android mobile.</h3>
        <video id="your-video-id" controls="" autoplay="" ></video>
        <button class="start">Start</button>
   <script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
        <script type="text/javascript">
                $(".start").click(function(){
                    
                        $(this).hide();
            
            
            
                        // capture camera and/or microphone
            navigator.mediaDevices.getUserMedia({ video: true, audio: true }).then(function(camera) {

                // preview camera during recording
                document.getElementById('your-video-id').muted = false;
                document.getElementById('your-video-id').srcObject = camera;

                // recording configuration/hints/parameters
                var recordingHints = {
                    type: 'video'
                };

                // initiating the recorder
                var recorder = RecordRTC(camera, recordingHints);

                // starting recording here
                recorder.startRecording();

                // auto stop recording after 5 seconds
                var milliSeconds = 50 * 1000;
                setTimeout(function() {

                    // stop recording
                    recorder.stopRecording(function() {
                        
                        // get recorded blob
                        var blob = recorder.getBlob();

                        // generating a random file name
                        var fileName = getFileName('mp4');

                        // we need to upload "File" --- not "Blob"
                        var fileObject = new File([blob], fileName, {
                            type: 'video/mp4'
                        });

                        var formData = new FormData();

                        // recorded data
                        formData.append('videoFile', fileObject);

                        // file name
                        formData.append('video-filename', fileObject.name);

                        document.getElementById('header').innerHTML = 'File Size: (' +  bytesToSize(fileObject.size) + '). Please wait... We are uploading your video to server';
            
                        // upload using jQuery
                        $.ajax({
                            url: "view/ajax/video_capture_ajax.php", // replace with your own server URL
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                           // async: false,
                            type: 'POST',
                            success: function(response) {
                                
                                
                               // alert(response);
                                var res = response.split("@@");
                               // alert(res[1]);
                                if (res[0]==='success') {
                                        
                                      
                                        
                                    alert('successfully uploaded to Server');
                                
                                    // file path on server
                                    var fileDownloadURL = '../admin/upload_doc/profile_video/' + res[1];
                                
                                    // preview the uploaded file URL
                                   // document.getElementById('header').innerHTML = '<a href="' + fileDownloadURL + '" target="_blank">' + fileDownloadURL + '</a>';
                                
                                    // preview uploaded file in a VIDEO element
                                    document.getElementById('your-video-id').src = fileDownloadURL;
                                
                                    // open uploaded file in a new tab
                                   // window.open(fileDownloadURL);
                                } else {
                                    alert(response); // error/failure
                                }
                            }
                        });

                        // release camera
                        document.getElementById('your-video-id').srcObject = null;
                        camera.getTracks().forEach(function(track) {
                            track.stop();
                        });

                    });

                }, milliSeconds);
            });

            // this function is used to generate random file name
            function getFileName(fileExtension) {
               // alert("working");
                var d = new Date();
                var year = d.getUTCFullYear();
                var month = d.getUTCMonth();
                var date = d.getUTCDate();
                return 'RecordRTC-' + year + month + date + '-' + getRandomString() + '.' + fileExtension;
            }

            function getRandomString() {
                if (window.crypto && window.crypto.getRandomValues && navigator.userAgent.indexOf('Safari') === -1) {
                    var a = window.crypto.getRandomValues(new Uint32Array(3)),
                        token = '';
                    for (var i = 0, l = a.length; i < l; i++) {
                        token += a[i].toString(36);
                    }
                    return token;
                } else {
                    return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');
                }
            }
                
            
            
                  
                    
                    });


            
        </script>
  
