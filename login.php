<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/login.html  30 Nov 2019 04:12:20 GMT -->
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
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body class="account-page">

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
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span>JSK Clinic</span></h3>
										</div>
										<form action="" method="POST">
											<div class="form-group form-focus">
												<input type="email" name="email" class="form-control floating">
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="pwd" class="form-control floating">
												<label class="focus-label">Password</label>
											</div>
											<div class="form-group form-focus">
												
												
												<select name="post" class="form-control floating">
													<option value="Doctor">Doctor</option>
													<option value="Patient">Patient</option>
													
												</select>	
											</div>
											
											<button class="btn btn-primary btn-block btn-lg login-btn" name="submit" type="submit">Login</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<!-- <div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div> -->
											<div class="text-center dont-have">Don’t have an account? <a href="register.php">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
							</div>
							<?php
							include "connection.php";
							echo $email = $_POST['email'];
							echo $pwd = $_POST['pwd'];
                            echo $post = $_POST['post'];
                          	if(isset($_POST['submit']))
                            {
                                if($post == "Doctor")
                                {
                                $sql = "SELECT * FROM `doctorregistration` WHERE email = '$email' AND password = '$pwd'";
                                $res = mysqli_query($con,$sql);
								$row = mysqli_fetch_assoc($res);
                                $num = mysqli_num_rows($res);
                                if($num>0)
                                {
									$_SESSION['email'] = $email;
									$_SESSION['id'] = $row['id'];
									$_SESSION['loggedin'] = true;
                                    echo '
                                    <script>
                                   
                                    window.location.href="doctor-dashboard.php";
                                    </script>
                                    ';
                                }
                                }
                                if($post == "Patient")
                                {
                                $sql = "SELECT * FROM `patientregistration` WHERE email = '$email' AND password = '$pwd'";
                                $res = mysqli_query($con,$sql);
								$row = mysqli_fetch_assoc($res);
                                $num = mysqli_num_rows($res);
                                if($num>0)
                                {
									$_SESSION['email'] = $email;
									$_SESSION['id'] = $row['id'];
									$_SESSION['loggedin'] = true;
                                    echo '
                                    <script>
                                   
                                    window.location.href="patient-dashboard.php";
                                    </script>
                                    ';
                                }
                                }
                            }
							?>
						</div>
					</div>

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
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/login.html  30 Nov 2019 04:12:20 GMT -->
</html>