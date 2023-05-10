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
		alert('Welcome to Doctor Appoinment');
	</script>
	";
}
$sessionid = $_SESSION['id'];
include "connection.php";
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/appointments.html  30 Nov 2019 04:12:09 GMT -->
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
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
									<li class="breadcrumb-item"><a href="#.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Appointments</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Appointments</h2>
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
						include "doctor-profile-slider.php"
						?>
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="appointments">
							
								<!-- Appointment List -->
								<?php
								$currentDate = date('Y-m-d'); 
								$sql = "SELECT * FROM appoinment WHERE doctorId = '$sessionid' AND appoinmentdate = '$currentDate'";
								$res = mysqli_query($con,$sql);
							while($row = mysqli_fetch_assoc($res))
							{
								
								$appoinmentdate = $row['appoinmentdate'];
								$patientname = $row['name'];
								$mid = $row['id'];
								$problem = $row['problem'];
								$amount = $row['amount'];
								$pid = $row['patientId'];
								$status = $row['status'];
								if($status == 0){
									$astatus = '<span class="badge badge-pill bg-danger-light">Pending</span>';
								  }
								  if($status == 1){
									  $astatus =  '<span class="badge badge-pill bg-success-light">Confirm</span>';
								  }
								$psql = "SELECT * FROM patientregistration RIGHT JOIN patientprofile ON patientregistration.id = patientprofile.patientId WHERE patientregistration.id = '$pid'";
								$pres = mysqli_query($con,$psql);
								$prow = mysqli_fetch_assoc($pres);
								$image = $prow['image'];
								$address = $prow['address'];
								$email = $prow['email'];
								echo'
								<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="image/'.$image.'" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="#">'.$patientname.'</a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i> '.$appoinmentdate.', 10.00 AM</h5>
												<h5><i class="fas fa-map-marker-alt"></i>'.$address.'</h5>
												<h5><i class="fas fa-envelope"></i>'.$email.'</h5>
												<h5 class="mb-0"><i class="fa-solid fa-disease"></i>'.$problem.'</h5>
											</div>
										</div>
									</div>
									<form action="status_update_appoinment.php" method="POST">
										<p>
										'.$astatus.'
										</p>
										<p>
										<input type="hidden" name="id" value="'.$mid.'"class="btn btn-sm bg-success-light">
										<button type="submit" class="btn btn-sm bg-success-light">
											<i class="fas fa-check"></i> Accept
										</button>
										</p>
									</form>	
									
								</div>';
							}
								?>
								<!-- /Appointment List -->
							
								<!-- Appointment List -->
								<!-- <div class="appointment-list">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="assets/img/patients/patient1.jpg" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="#">Charlene Reed </a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i> 12 Nov 2019, 5.00 PM</h5>
												<h5><i class="fas fa-map-marker-alt"></i> North Carolina, United States</h5>
												<h5><i class="fas fa-envelope"></i> charlenereed@example.com</h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i> +1 828 632 9170</h5>
											</div>
										</div>
									</div>
									<div class="appointment-action">
										<a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
											<i class="far fa-eye"></i> View
										</a>
										<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
											<i class="fas fa-check"></i> Accept
										</a>
										<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
											<i class="fas fa-times"></i> Cancel
										</a>
									</div>
								</div>
								/Appointment List -->
								
								<!-- Appointment List -->
								
								<!-- /Appointment List -->
								
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
		
		<!-- Appointment Details Modal -->
		<div class="modal fade custom-modal" id="appt_details">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Appointment Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<ul class="info-details">
							<li>
								<div class="details-header">
									<div class="row">
										<div class="col-md-6">
											<span class="title">#APT0001</span>
											<span class="text">21 Oct 2019 10:00 AM</span>
										</div>
										<div class="col-md-6">
											<div class="text-right">
												<button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<span class="title">Status:</span>
								<span class="text">Completed</span>
							</li>
							<li>
								<span class="title">Confirm Date:</span>
								<span class="text">29 Jun 2019</span>
							</li>
							<li>
								<span class="title">Paid Amount</span>
								<span class="text">$450</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /Appointment Details Modal -->
	  
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

<!-- doccure/appointments.html  30 Nov 2019 04:12:09 GMT -->
</html>