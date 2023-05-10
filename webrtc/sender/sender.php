
	
<!-- doccure/video-call.html  30 Nov 2019 04:12:18 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
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

		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>

	<body class="call-page">
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
                                    <input type="hidden" value="<?php echo$_GET['id']; ?>" id="username-input" /><br>
                                    <button onclick="sendUsername()">Send Request</button>
                                    <button onclick="startCall()">Start Call</button>
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
                                    window.location.href="../../chat-doctor.php?id=<?php echo$_GET['id'];?>";
                                  }  
                                </script>    
									
      
			
			<!-- /Page Content -->
   
			
			<!-- /Footer -->
		   
		<!-- /Main Wrapper -->
		<script src="./sender.js"></script>
		
	</body>

<!-- doccure/video-call.html  30 Nov 2019 04:12:18 GMT -->
</html>
