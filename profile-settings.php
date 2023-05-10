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
		alert('Welcome to Doctor Profile Panel');
	</script>
	";
}
$sessionid = $_SESSION['id'];
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/profile-settings.html  30 Nov 2019 04:12:18 GMT -->
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
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
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

        $sql = "SELECT * FROM doctorregistration RIGHT JOIN doctorprofile ON doctorregistration.id = doctorprofile.dcotorId WHERE doctorregistration.id = '$sessionid'";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
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
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
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
                        include "doctor-profile-slider.php";
                        ?>
						<!-- /Profile Sidebar -->
                    </div>   
					
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
								<?php
									include "connection.php";
									$doctorid = $sessionid;
									$dsql = "SELECT * FROM `doctorprofile` WHERE `dcotorId` = '$doctorid'";
									$dres = mysqli_query($con,$dsql);
									$srow = mysqli_fetch_assoc($dres);
									
									$fname = $srow['fname'];
									$lname = $srow['lname'];
									$dob = $srow['dob'];
									$bgroup = $srow['bgroup'];
									$email = $srow['email'];
									$mob = $srow['mob'];
									$address = $srow['address'];
									$city = $srow['city'];
									$state = $srow['state'];
									$zip = $srow['zip'];
									$country = $srow['country'];
									$education = $srow['education'];
									$image = $srow['image'];
									?>
									<!-- Profile Settings Form -->
									<form action="" method="POST" enctype="multipart/form-data">
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="image/<?php echo$image; ?>" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" class="upload" name="image">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" value="<?php echo $fname?>" name="fname">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control"  value="<?php echo$lname?>" name="lname">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="cal-icon">
														<input type="text" class="form-control datetimepicker" value="<?php echo$dob?>" name="dob">
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Blood Group</label>
													<select class="form-control select" value="<?php echo$bgroup?>" name="bgroup">
														<option value="A-">A-</option>
														<option value="A+">A+</option>
														<option value="B-">B-</option>
														<option value="B+">B+</option>
														<option value="AB-">AB-</option>
														<option value="AB+">AB+</option>
														<option value="O-">O-</option>
														<option value="O+">O+</option>
													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" class="form-control" value="<?php echo$email ?>" name="email">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" value="<?php echo$mob ?>" class="form-control" name="mob">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Address</label>
													<input type="text" class="form-control" value="<?php echo$address ?>" name="address">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Eductaion</label>
													<input type="text" class="form-control" value="<?php echo$education ?>" name="education">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control" value="<?php echo$city ?>" name="city">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>State</label>
													<input type="text" class="form-control" value="<?php echo$state ?>" name="state">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Zip Code</label>
													<input type="text" class="form-control" value="<?php echo$zip ?>" name="zip">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control" value="<?php echo$country ?>" name="country">
												</div>
											</div>
										</div>
										<div class="submit-section">
											<button type="submit" name="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
									<?php
									include "connection.php";
									$doctorid = $sessionid;
									$fname = $_POST['fname'];
									$lname = $_POST['lname'];
									$dob = $_POST['dob'];
									$bgroup = $_POST['bgroup'];
									$email = $_POST['email'];
									$mob = $_POST['mob'];
									$address = $_POST['address'];
									$city = $_POST['city'];
									$state = $_POST['state'];
									$zip = $_POST['zip'];
									$country = $_POST['country'];
									$education = $_POST['education'];
									$filename = $_FILES["image"]["name"];
									$tempname = $_FILES["image"]["tmp_name"];
									$folder = "image/" . $filename;
									move_uploaded_file($tempname, $folder);
									if(isset($_POST['submit']))
									{
									$sql = "UPDATE `doctorprofile` SET `education` = '$education',`fname`='$fname',`lname`='$lname',`dob`='$dob',`bgroup`='$bgroup',`email`='$email',`mob`='$mob',`address`='$address',`city`='$city',`state`='$state',`zip`='$zip',`country`='$country',`image`='$filename' WHERE `doctorprofile`.`dcotorId` = '$doctorid'";
									$res = mysqli_query($con,$sql);
									if($res)
									{
										echo"
										<script>
										window.location.href='profile-settings.php';
										</script>
										";
									}
									}
									?>
								</div>
							</div>
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
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/profile-settings.html  30 Nov 2019 04:12:18 GMT -->
</html>