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
												<ul class="nav float-right custom-menu">
													<li class="nav-item dropdown dropdown-action">
														<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="javascript:void(0)" class="dropdown-item">Settings</a>
														</div>
													</li>
												</ul>
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
												
												<div class="end-call">
                                                <div id="endcall">
                                                <form action="endcall.php" method="POST">
                                                    <input type="hidden" name="uid" value="<?php echo $_POST['pid']?>">
                                                    <button type="submit" name="endcall" class="btn btn-primary" value="Sendcall">
                                                    <i class="material-icons">call_end</i>
                                                    </button>
                                                </form> 
                                                </div>
												</div>
                                                 
                                                <?php
                                                echo $_POST['rid'];
                                                ?>
                                                <div id="endcall_reciver">
                                                <form action="endcall_reciver.php" method="POST">
                                                <input type="hidden" name="mid" value="<?php echo $_POST['mid']?>">
                                                    <input type="hidden" name="uid" value="<?php echo $_POST['rid']?>">
                                                    <input type="submit" name="endcall" class="btn btn-primary" value="rendcall">
                                                </form> 
                                                </div>
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
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="assets/img/footer-logo.png" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										<li><a href="search.html"><i class="fas fa-angle-double-right"></i> Search for Doctors</a></li>
										<li><a href="login.html"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="register.html"><i class="fas fa-angle-double-right"></i> Register</a></li>
										<li><a href="booking.html"><i class="fas fa-angle-double-right"></i> Booking</a></li>
										<li><a href="patient-dashboard.html"><i class="fas fa-angle-double-right"></i> Patient Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Doctors</h2>
									<ul>
										<li><a href="appointments.html"><i class="fas fa-angle-double-right"></i> Appointments</a></li>
										<li><a href="chat.html"><i class="fas fa-angle-double-right"></i> Chat</a></li>
										<li><a href="login.html"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="doctor-register.html"><i class="fas fa-angle-double-right"></i> Register</a></li>
										<li><a href="doctor-dashboard.html"><i class="fas fa-angle-double-right"></i> Doctor Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											doccure@example.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0"><a href="templateshub.net">Templates Hub</a></p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
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

<?php
error_reporting(0);
?>

  
 
  
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