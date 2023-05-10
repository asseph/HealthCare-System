<?php
error_reporting(0);
?>
<script>
   
</script>  
<!DOCTYPE html> 
<html lang="en">
	
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
		  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://cdn.scaledrone.com/scaledrone.min.js'></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
		
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
				include 'navbar.php';
				?>
			</header>
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
				
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
												<div class="user-video">
                                                <video id="remoteVideo"  alt="User Image" autoplay></video>
													
												</div>
												<div class="my-video">
													<ul>
														<li>
															
                                                            <video id="localVideo"  class="img-fluid" alt="User Image" autoplay muted></video>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<!-- Call Contents -->
										
										<!-- Call Footer -->
										<div class="call-footer">
											<div class="call-icons">
												<?php
                        if($_POST['pid'] )
                        {
												echo '<div class="end-call">
                                                <div id="endcall">
                                                <form action="endcall.php" method="POST">
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
                                                <form action="endcall_reciver.php" method="POST">
                                                <input type="hidden" name="mid" value="'.$_POST['mid'].'">
                                                    <input type="hidden" name="uid" value="'.$_POST['rid'].'">
                                                    <button type="submit" name="endcall" class="btn btn-danger" value="rendcall">
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
			<!-- /Page Content -->
   
			<!-- Footer -->
		
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
        <script src="script.js"></script>

		
	</body>

<!-- doccure/video-call.html  30 Nov 2019 04:12:18 GMT -->
</html>



  
 
  
</body>
</html>
<?php
error_reporting(0);
include "connection.php";
$url = 'video_calling/index.php#3165a7 ';
$did = $_POST['pid'];
if($_POST['submit'] == 'dsubmit')
{
$sql = "INSERT INTO `videocall` (`url`, `uid`, `status`) VALUES ('$url', '$did', '1')";
$res = mysqli_query($con,$sql);
if($res && $_POST['pid'] )
{
  echo "
  <script>
  
  document.getElementById('endcall_reciver').style.display='none';
  document.getElementById('endcall').style.display='block';
  </script>
  ";
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