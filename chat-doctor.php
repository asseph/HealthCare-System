<?php
session_start();
if($_SESSION['loggedin'] != true)
{
	echo"
	<script>
		window.location.href='login.php';
	</script>
	";
}
else{
	echo"
	<script>
		alert('Welcome to Doctor Panel');
	</script>
	";
}
$sessionid = $_SESSION['id'];
error_reporting(0);		
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/chat-doctor.html  30 Nov 2019 04:12:13 GMT -->
<head>
		<meta charset="utf-8">
		<title>JSK Clinic</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="logo.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body class="chat-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<?php
			include "navbar.php";
			?>
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="chat-window">
							
								<!-- Chat Left -->
								<div class="chat-cont-left">
									<div class="chat-header">
										<span>Chats</span>
										<a href="javascript:void(0)" class="chat-compose">
											<i class="material-icons">control_point</i>
										</a>
									</div>
								
									<div class="chat-users-list">
									<div class="chat-scroll">
									<?php
								$pid = $_GET['id'];
								include "connection.php";
								$psql = "SELECT * FROM patientprofile RIGHT JOIN patientregistration ON patientprofile.patientId = patientregistration.id  WHERE patientprofile.patientId = '$pid'";
								$pres = mysqli_query($con,$psql);
								$prow = mysqli_fetch_assoc($pres);
								$image = $prow['image'];
								$name = $prow['name'];

								?>
											<a href="javascript:void(0);" class="media">
												<div class="media-img-wrap">
													<div class="avatar avatar-away">
														<img src="image/<?php echo $image?>" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name"><?php echo $name; ?></div>
														<div class="user-last-chat">Patient of JSK Clinic</div>
													</div>
													<!-- <div>
														<div class="last-chat-time block">2 min</div>
														<div class="badge badge-success badge-pill">15</div>
													</div> -->
												</div>
											</a>
											
										</div>
									</div>
								</div>
								<!-- /Chat Left -->
								<?php
								$pid = $_GET['id'];
								include "connection.php";
								$psql = "SELECT * FROM patientprofile RIGHT JOIN patientregistration ON patientprofile.patientId = patientregistration.id  WHERE patientprofile.patientId = '$pid'";
								$pres = mysqli_query($con,$psql);
								$prow = mysqli_fetch_assoc($pres);
								$image = $prow['image'];
								$name = $prow['name'];
								$mobile = $prow['mobile'];

								?>
								<!-- Chat Right -->
								<div class="chat-cont-right">
									<div class="chat-header">
										<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
											<i class="material-icons">chevron_left</i>
										</a>
										<div class="media">
											<div class="media-img-wrap">
												<div class="avatar avatar-online">
													<img src="image/<?php echo $image?>" alt="User Image" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="user-name"><?php echo $name;?></div>
												<div class="user-status">online</div>
											</div>
										</div>
										<div class="chat-options">
											<a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call">
												<i class="material-icons">local_phone</i>
											</a>							
											<a href="javascript:void(0)" data-toggle="modal" data-target="#video_call">
												<i class="material-icons">videocam</i>
											</a>
											<a href="javascript:void(0)">
												<i class="material-icons">more_vert</i>
											</a>
										</div>
									</div>
									<div class="chat-body">
										<div class="chat-scroll" id="chatbody">
											<ul class="list-unstyled" id="chat">
										
												<!-- <li class="media sent">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Hello. What can I do for you?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:30 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media received">
													<div class="avatar">
														<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>I'm just looking around.</p>
																<p>Will you tell me something about yourself?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:35 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<p>Are you there? That time!</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:40 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<div class="chat-msg-attachments">
																	<div class="chat-attachment">
																		<img src="assets/img/img-02.jpg" alt="Attachment">
																		<div class="chat-attach-caption">placeholder.jpg</div>
																		<a href="#" class="chat-attach-download">
																			<i class="fas fa-download"></i>
																		</a>
																	</div>
																	<div class="chat-attachment">
																		<img src="assets/img/img-03.jpg" alt="Attachment">
																		<div class="chat-attach-caption">placeholder.jpg</div>
																		<a href="#" class="chat-attach-download">
																			<i class="fas fa-download"></i>
																		</a>
																	</div>
																</div>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:41 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media sent">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Where?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:42 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<p>OK, my name is Limingqiang. I like singing, playing basketballand so on.</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:42 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<div class="chat-msg-attachments">
																	<div class="chat-attachment">
																		<img src="assets/img/img-04.jpg" alt="Attachment">
																		<div class="chat-attach-caption">placeholder.jpg</div>
																		<a href="#" class="chat-attach-download">
																			<i class="fas fa-download"></i>
																		</a>
																	</div>
																</div>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:50 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media received">
													<div class="avatar">
														<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>You wait for notice.</p>
																<p>Consectetuorem ipsum dolor sit?</p>
																<p>Ok?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:55 PM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="chat-date">Today</li>
												<li class="media received">
													<div class="avatar">
														<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>10:17 AM</span>
																		</div>
																	</li>
																	<li><a href="#">Edit</a></li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media sent">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Lorem ipsum dollar sit</p>
																<div class="chat-msg-actions dropdown">
																	<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		<i class="fe fe-elipsis-v"></i>
																	</a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a class="dropdown-item" href="#">Delete</a>
																	</div>
																</div>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>10:19 AM</span>
																		</div>
																	</li>
																	<li><a href="#">Edit</a></li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media received">
													<div class="avatar">
														<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<div class="msg-typing">
																	<span></span>
																	<span></span>
																	<span></span>
																</div>
															</div>
														</div>
													</div>
												</li> -->
												
											</ul>
										</div>
									</div>
									<form action="" method="POST">
									<div class="chat-footer">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="btn-file btn">
													<i class="fa fa-paperclip"></i>
													<input type="file">
												</div>
											
											</div>
											
											<input type="hidden" name="reciverid" id="reciverid"  value="<?php echo$resiverid=$_GET['id'];?>" class="input-msg-send form-control" placeholder="Type something">
											<input type="hidden" name="senderid" id="senderid" value="<?php echo$sessionid?>" class="input-msg-send form-control" placeholder="Type something">
											<input type="hidden" name="cheker" id="cheker" value="sender" class="input-msg-send form-control" placeholder="Type something">
											<input type="text" name="msg" id="msg" onfocus="this.value=''" class="input-msg-send form-control" placeholder="Type something">
											<div class="input-group-append">
												<button type="submit" name="msgsubmit" onclick="ClearFields()" id="msgsubmit" class="btn msg-send-btn"><i class="fab fa-telegram-plane"></i></button>
											
											</div>
											
							 
										</div>
									</div>
									</form>
								</div>
									
								<!-- /Chat Right -->
								
							</div>
						</div>
					</div>
					<!-- /Row -->

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<?php
            include "footer.php";
            ?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Voice Call Modal -->
		<div class="modal fade call-modal" id="voice_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<!-- Outgoing Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="User Image" src="image/<?php echo $image?>" class="call-avatar">
										<h4><?php echo $name;?></h4>
										<span>Calling...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<form action="audio_call/voice-call.php" method="POST">
												<input type="hidden" value="<?php echo $pid ?>" name="pid">
												<input type="hidden" value="dsubmit" name="submit">
												<button type="submit" style="text-decoration:none;border:none;background:transparent">
												
												<a class="btn call-item call-start"><i class="material-icons">call</i></a>>
												</button>
											</form>
										
									</div>
								</div>
							</div>
						</div>
						<!-- Outgoing Call -->

					</div>
				</div>
			</div>
		</div>
		<!-- /Voice Call Modal -->
		
		<!-- Video Call Modal -->
		<div class="modal fade call-modal" id="video_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<!-- Incoming Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="User Image" src="image/<?php echo$image?>" class="call-avatar">
										<h4><?php echo $name;?></h4>
										<span>Connecting...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<form action="video_calling/index.php#3165a7" method="POST">
												<input type="hidden" value="<?php echo $pid ?>" name="pid">
												<input type="hidden" value="dsubmit" name="submit">
												<button type="submit" style="text-decoration:none;border:none;background:transparent">
												
												<a class="btn call-item call-start"><i class="material-icons">videocam</i></a>
												</button>
											</form>
										
									</div>
								</div>
							</div>
						</div>
						<!-- /Incoming Call -->
						
					</div>
				</div>
			</div>
		</div>
		<!-- Video Call Modal -->
		<script src="audio_call/main.js"></script>
			
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script>
       
	   setInterval(function () { loadTasks(); }, 2000);
       function loadTasks() {
		
		var reciverid = $('#reciverid').val();
		var senderid = $('#senderid').val();
		var cheker = $('#cheker').val();
		var msg = $('#msg').val(); 
		var msgsubmit = $('#msgsubmit').val();  
    $.ajax({
        url: "chat_sucess.php",
        type: "POST",
		data: { reciverid: reciverid,senderid: senderid, cheker:cheker, msg:msg, msgsubmit:msgsubmit },
        success: function (data) {
            $("#chat").html(data);
        }
          });
         
      }
	  loadTasks();
      
       $('#msgsubmit').on('click', function (e) {
               e.preventDefault();
               var reciverid = $('#reciverid').val();
                var senderid = $('#senderid').val();
                var cheker = $('#cheker').val();
                var msg = $('#msg').val(); 
                var msgsubmit = $('#msgsubmit').val();                     
       
               $.ajax({
                   url: 'chat_add.php',
                   type: 'POST',
                   data: { reciverid: reciverid,senderid: senderid, cheker:cheker, msg:msg, msgsubmit:msgsubmit },
                   success: function (dataa) {
                       if(dataa) {

							document.getElementById("msg").value = "";
						
	
                           loadTasks();
                       }
                       else {

                          
                           loadTasks();
                           }

                   }
               });
           });
         

     </script> 
		
	
		
	</body>

<!-- doccure/chat-doctor.html  30 Nov 2019 04:12:14 GMT -->
</html>