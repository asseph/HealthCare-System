<!-- HTML -->
<!DOCTYPE html>
<html>
<head>
    <title>Audio Call</title>
</head>
<body>
    <h1>Audio Call</h1>
    <button id="startButton">Start Call</button>
    <button id="endButton">End Call</button>
    <script src="main.js"></script>
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
	<body class="chat-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<?php
			include "navbar.php";
			?>
			<!-- /Header -->
        </div>	
			<!-- Page Content -->
            <a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call">
												<i class="material-icons">local_phone</i>
											</a>
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
										<img alt="User Image" src="image/<?php echo$image?>" class="call-avatar">
										<h4><?php echo $name;?></h4>
										<span>Connecting...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<button id="startButton" href="audio_call/audio.html" class="btn call-item call-start"><i class="material-icons">call</i></button>
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
										<span>Calling ...</span>
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
		<script src="main.js"></script>
			
		<!-- jQuery -->
		<script src="../assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="../assets/js/popper.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="../assets/js/script.js"></script>
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
    
</body>

</html>