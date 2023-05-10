<?php
error_reporting(0);
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/register.html  30 Nov 2019 04:12:20 GMT -->
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
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Patient Register <a href="doctor-register.php">Are you a Doctor?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="form-group form-focus">
												<input type="text" name="pname" class="form-control floating">
												<label class="focus-label">Name</label>
											</div>
											<div class="form-group form-focus">
												<input type="text" name="contact" class="form-control floating">
												<label class="focus-label">Mobile Number</label>
											</div>
											<div class="form-group form-focus">
												<input type="text" name="email" class="form-control floating">
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" name="pwd" class="form-control floating">
												<label class="focus-label">Create Password</label>
											</div>
											<div class="form-group form-focus">
												<input type="text" name="ads" class="form-control floating">
												<label class="focus-label">Address</label>
											</div>
											<div class="form-group form-focus">
												<input type="file" name="img" class="form-control floating">
												<label class="focus-label">Uplaod Image</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="login.php">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" name="submit" type="submit">Signup</button>
											
											
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
							<?php
							include "connection.php";
                            error_reporting(0);
							$name = $_POST['pname'];
							$mob = $_POST['contact'];
							$pwd = $_POST['pwd'];
                            $email = $_POST['email'];
							$ads = $_POST['ads'];
							$filename = $_FILES["img"]["name"];
							$tempname = $_FILES["img"]["tmp_name"];
							$folder = "image/" . $filename;
                            move_uploaded_file($tempname, $folder);

						 if(isset($_POST['submit']))
						  {

							$sql = "INSERT INTO `patientRegistration` (`name`, `email`, `mobile`,`password`) VALUES ('$name', '$email','$mob', '$pwd')";
							$res = mysqli_query($con,$sql);
							$patient_id = mysqli_insert_id($con);
							if($res)
							{
								$psql = "INSERT INTO `PatientProfile` (`patientId`, `address`, `image`) VALUES ('$patient_id', '$ads', '$filename')";
								$res = mysqli_query($con,$psql);
								if($res)
								{
									echo "
									<script>
										window.location.href='login.php';
									</script>	
									";
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

<!-- doccure/register.html  30 Nov 2019 04:12:20 GMT -->
</html>