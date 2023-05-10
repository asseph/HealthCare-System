<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/voice-call.html  30 Nov 2019 04:12:18 GMT -->
<head>
		<meta charset="utf-8">
		<title>JSK Clinic</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="../logo.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="../assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body class="call-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<?php
				include '../navbar.php';
				?>
			</header>
			<!-- /Header -->
            <?php
            if($_POST['pid'])
            {
							$pid = $_POST['pid'];
            }
            if($_POST['rid'])
            {
							$pid = $_POST['rid'];
            }
								include "../connection.php";
								$psql = "SELECT * FROM patientprofile RIGHT JOIN patientregistration ON patientprofile.patientId = patientregistration.id  WHERE patientprofile.patientId = '$pid'";
								$pres = mysqli_query($con,$psql);
								$prow = mysqli_fetch_assoc($pres);
								$image = $prow['image'];
								$name = $prow['name'];
								$mobile = $prow['mobile'];
			?>
                                <!-- Page Content -->
			<div class="content">
				<div class="container">
				
						<div>
							<div id = "loginPage" class = "container text-center">		
								<div class = "row"> 
										<div class = "col-md-4 col-md-offset-4">
								
											<h2>WebRTC Voice Demo. Please sign in</h2>
								
											<label for = "usernameInput" class = "sr-only">Login</label> 
											<input type = "email" id = "usernameInput" 
													class = "form-control formgroup"
													placeholder = "Login" required = "" autofocus = ""> 
											<button id = "loginBtn" class = "btn btn-lg btn-primary btnblock">
													Sign in</button> 
										</div> 
								</div> 
							
							</div>
						
							<div id = "callPage" class = "call-page">
								<div class="row">
									<video id = "localVideo" autoplay></video> 
      						<video id = "remoteVideo" autoplay></video>
								</div>
								<div class = "row"> 
							
										<div class = "col-md-6 text-right"> 
											Local audio: <audio id = "localAudio" 
											controls autoplay></audio> 
										</div>
								
										<div class = "col-md-6 text-left"> 
											Remote audio: <audio id = "remoteAudio" 
													controls autoplay></audio> 
										</div> 
								
								</div> 
							
								<div class = "row text-center"> 
										<div class = "col-md-12"> 
											<input id = "callToUsernameInput" 
													type = "text" placeholder = "username to call" /> 
											<button id = "callBtn" class = "btn-success btn">Call</button> 
											<button id = "hangUpBtn" class = "btn-danger btn">Hang Up</button> 
										</div> 
								</div>
							
							</div>							
						</div>
					<!-- Call Wrapper -->
					<div class="call-wrapper">
						<div class="call-main-row">
							<div class="call-main-wrapper">
								<div class="call-view">
									<div class="call-window">
									
										<!-- Call Header -->
										<div class="fixed-header">
											<div class="navbar">
												<div class="user-details">
													<div class="float-left user-img">
														<a class="avatar avatar-sm mr-2" href="patient-profile.html" title="Charlene Reed">
															<img src="../logo.png" alt="User Image" class="rounded-circle">
															<span class="status online"></span>
														</a>
													</div>
													<div class="user-info float-left">
														<a href="patient-profile.html"><span>JSK Clinic</span></a>
														<span class="last-seen">Online</span>
													</div>
												</div>
												
											</div>
										</div>
										<!-- /Call Header -->
										
										<!-- Call Contents -->
										<div class="call-contents">
											<div class="call-content-wrap">
												<div class="voice-call-avatar">
													<img src="../image/<?php echo $image?>" alt="User Image" class="call-avatar">
													<span class="username"><?php echo $name;?></span>
													<!-- <span class="call-timing-count">00:59</span> -->
												</div>
												
											</div>
										</div>
										<!-- /Call Contents -->
										
										<!-- Call Footer -->
										<div class="call-footer">
											<div class="call-icons">
                                            <ul class="call-items">
													
													<li class="call-item">
														
                                                        <button id="startButton" class="btn btn-primary">On Audio</button>
													</li>
													
												</ul>
												<?php
                        if($_POST['pid'] )
                        {
												echo '<div class="end-call">
                                                <div id="endcall">
                                                <form action="voice_docendcall.php" method="POST">
                                                    <input type="hidden" name="uid" value="'.$_POST['pid'].'">
                                                    <button type="submit" name="endcall" class="btn btn-danger" value="Sendcall">
                                                    <i class="material-icons">call_end</i>
                                                    </button>
                                                </form> 
                                                </div>
												</div>';
                        }?>                 
                                                <?php
                                                 $_POST['rid'];
                                                ?>
                                                <?php
                                                if($_POST['rid'] )
                                                {
                                               echo '<div class="end-call">
                                                <div id="endcall_reciver">
                                                <form action="voice_patendcall.php" method="POST">
                                                <input type="hidden" name="mid" value="'.$_POST['mid'].'">
                                                    <input type="hidden" name="uid" value="'.$_POST['rid'].'">
                                                    <button type="submit" name="endcall" class="btn btn-primary" value="rendcall">
                                                    <i class="material-icons">call_end</i>
                                                    </button>
                                                    
                                                </form> 
                                                </div>
                                            </div>';
                                                }
                                                ?>
											</div>
										</div>
										<!-- /Call Footer -->
									
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<!-- /Call Wrapper -->
					
				</div>

			</div>	
            <?php
                error_reporting(0);
                include "connection.php";
                $url = 'audio_call/voice-call.php';
                $did = $_POST['pid'];
                if($_POST['submit'] == 'dsubmit')
                {
                	$sql = "INSERT INTO `audio` (`url`, `uid`, `status`) VALUES ('$url', '$did', '1')";
                	$res = mysqli_query($con,$sql);
                	if($res && $_POST['pid'] )
                	{
										/*echo "
										<script>										
											document.getElementById('endcall_reciver').style.display='none';
											document.getElementById('endcall').style.display='block';
										</script>
										";*/
                	}
									if($res && $_POST['rid'] )
									{
									echo "
									<script>

									document.getElementById('endcall').style.display='none';
									document.getElementById('endcall_reciver').style.display='block';
									</script>
									";
									}
                }
              ?>
			<!-- /Page Content -->
   
			<!-- Footer -->
			
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
    <script src="audio.js"></script>
		<!-- jQuery -->
		<script src="./../assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="./../assets/js/popper.min.js"></script>
		<script src="./../assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="./../assets/js/script.js"></script>
		
	</body>

<!-- doccure/voice-call.html  30 Nov 2019 04:12:18 GMT -->
</html>