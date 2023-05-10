<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
    <style>
      button{
        border-radius:25px;
        background-color:#007bff;
        border: none;
        height: 35px;
        color:white;
      }
    </style>  
        <div class="main-wrapper">
		
			<!-- Header -->
                    <?php
                    include "../../navbar.php";
                    ?>
        </div>		
		           
        <div>
            <input type="hidden"  value="<?php echo$_GET['id']; ?>" id="username-input" /><br>
            <button onclick="joinCall()">Join Call</button>
        </div>
        <div id="video-call-div">
            <video muted id="local-video" autoplay></video>
            <video id="remote-video" autoplay></video>
            <div class="call-action-div">
                <button onclick="muteVideo()">Mute Video</button>
                <button onclick="muteAudio()">Mute Audio</button>
                <button onclick="endcall()">End Call</button>
            </div>
        </div>
        <script>
                                  function endcall(){
                                    window.location.href="../../chat.php?id=<?php echo$_GET['did'];?>";
                                  }  
                                </script> 
        <script src="./receiver.js"></script>
    </body>

</html>