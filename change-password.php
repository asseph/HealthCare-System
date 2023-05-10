<?php
error_reporting(0);
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
		alert('Welcome to patent Panel');
	</script>
	";
}
$sessionid = $_SESSION['id'];
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/change-password.html  30 Nov 2019 04:12:18 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
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
	<body>
    <?php
            include "connection.php";
			$dsql = "SELECT * FROM patientregistration RIGHT JOIN patientprofile ON patientregistration.id = patientprofile.patientId WHERE patientregistration.id = '$sessionid'";
            $dres = mysqli_query($con,$dsql);
            $drow = mysqli_fetch_assoc($dres);
            $pwd = $drow['password'];
            ?>
		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<?php
			include "navbar.php";
			?>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Sidebar -->
							<?php

							include "patient-sidebar.php";
							?>
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-6">
										
											<!-- Change Password Form -->
											<form action="" method="POST">
												<div class="form-group">
													<label>Old Password</label>
													<input type="text" value="<?php echo $pwd  ?>" class="form-control">
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input type="password" name="npwd" class="form-control">
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" name="cpwd" class="form-control">
												</div>
												<div class="submit-section">
													<button type="submit" name="submit" class="btn btn-primary submit-btn">Save Changes</button>
												</div>
											</form>
											<!-- /Change Password Form -->
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
			<?php
			include "conection.php";
			$npwd = $_POST['npwd'];
			$cpwd = $_POST['cpwd'];
			if(isset($_POST['submit']))
			if($npwd == $cpwd)
			{
			$sql = "UPDATE `patientregistration` SET `password` = '$npwd ' WHERE `patientregistration`.`id` = '$sessionid'";
			$res = mysqli_query($con,$sql);
			}
			?>
			<!-- Footer -->
			<?php
            include "footer.php";
            ?>
   
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
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/change-password.html  30 Nov 2019 04:12:18 GMT -->
</html>