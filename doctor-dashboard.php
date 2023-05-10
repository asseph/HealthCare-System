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
	
	";
}
$sessionid = $_SESSION['id'];
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:03 GMT -->
<head>
		<meta charset="utf-8">
		<title>JSK Clinic</title>
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
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
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

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Patient</h6>
															<h3>1500</h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" data-percent="65">
																<img src="assets/img/icon-02.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Today Patient</h6>
															<h3>160</h3>
															<p class="text-muted">06, Nov 2019</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Appoinments</h6>
															<h3>85</h3>
															<p class="text-muted">06, Apr 2019</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Patient Name</th>
																		<th>Appt Date</th>
																		<th>Purpose</th>
																		<th>Type</th>
																		<th class="text-center">Paid Amount</th>
																		<th>Status</th>
																	</tr>
																</thead>
																<tbody>
                                                                    <?php
                                                                    $currentDate = date('Y-m-d'); 
                                                                    $sql = "SELECT * FROM appoinment WHERE doctorId = '$sessionid' AND appoinmentdate > '$currentDate'";
                                                                    $res = mysqli_query($con,$sql);
                                                                   while($row = mysqli_fetch_assoc($res))
                                                                   {
                                                                    $appoinmentdate = $row['appoinmentdate'];
                                                                    $patientname = $row['name'];
                                                                    $problem = $row['problem'];
                                                                    $amount = $row['amount'];
																	$mid = $row['id'];
																	$status = $row['status'];
																	$pimg = $row['patientId'];
																	
																	$psql = "SELECT * FROM patientprofile WHERE patientId = '$pimg'";
                                                                    $pres = mysqli_query($con,$psql);
																	$prow = mysqli_fetch_assoc($pres);
																	$image = $prow['image'];
																	if($status == 0){
																		$astatus = '<span class="badge badge-pill bg-danger-light">Pending</span>';
																	  }
																	  if($status == 1){
																		  $astatus =  '<span class="badge badge-pill bg-success-light">Confirm</span>';
																	  }
                                                                    echo'
																	
                                                                    <tr>
																	<form action="status_update.php" method="POST">
																		<td>
																			<h2 class="table-avatar">
																				<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="image/'.$image.'" alt="User Image"></a>
																				<a href="#">'.$patientname.' <span>#PT0016</span></a>
																			</h2>
																		</td>
																		<td>'.$appoinmentdate.'<span class="d-block text-info">10.00 AM</span></td>
																		<td>'.$problem.'</td>
																		<td>New Patient</td>
																		<td class="text-center">'.$amount.'</td>
																		<td class="text-center">'.$astatus.'</td>
																		<td class="text-right">
																			<div class="table-action">
																				
																			<input type="hidden" name="id" value="'.$mid.'"class="btn btn-sm bg-success-light">
																				<button type="submit" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</button>
																				
																			</div>
																		</td>
																		<td><a href="chat-doctor.php?id='.$pimg.'">Chat</td>
																	   </form>	
																	</tr>
                                                                    ';
                                                                   }
                                                                    ?>
																	
																	
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
									   
											<!-- Today Appointment Tab -->
											<div class="tab-pane" id="today-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Patient Name</th>
																		<th>Appt Date</th>
																		<th>Purpose</th>
																		<th>Type</th>
																		<th class="text-center">Paid Amount</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
                                                                <?php
                                                                    $currentDate = date('Y-m-d'); 
                                                                    $sql = "SELECT * FROM appoinment WHERE doctorId = '$sessionid' AND appoinmentdate = '$currentDate'";
                                                                    $res = mysqli_query($con,$sql);
                                                                   while($row = mysqli_fetch_assoc($res))
                                                                   {
                                                                    $appoinmentdate = $row['appoinmentdate'];
                                                                    $patientname = $row['name'];
                                                                    $problem = $row['problem'];
                                                                    $amount = $row['amount'];
																	$mid = $row['id'];
																	$status = $row['status'];
																	$pimg = $row['patientId'];
																	
																	$psql = "SELECT * FROM patientprofile WHERE patientId = '$pimg'";
                                                                    $pres = mysqli_query($con,$psql);
																	$prow = mysqli_fetch_assoc($pres);
																	$image = $prow['image'];
																	if($status == 0){
																		$astatus = '<span class="badge badge-pill bg-danger-light">Pending</span>';
																	  }
																	  if($status == 1){
																		  $astatus =  '<span class="badge badge-pill bg-success-light">Confirm</span>';
																	  }
                                                                    echo'
																	<tr>
																	<form action="status_update.php" method="POST">
																		<td>
																			<h2 class="table-avatar">
																				<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="image/'.$image.'" alt="User Image"></a>
																				<a href="#">'.$patientname.' <span>#PT0006</span></a>
																			</h2>
																		</td>
																		<td>'.$appoinmentdate.'<span class="d-block text-info">6.00 PM</span></td>
																		<td>'.$problem.'</td>
																		<td>Old Patient</td>
																		<td class="text-center">$'.$amount.'</td>
																		<td class="text-center">'.$astatus.'</td>
																		<td class="text-right">
																			<div class="table-action">
																			<input type="hidden" name="id" value="'.$mid.'"class="btn btn-sm bg-success-light">
																			<button type="submit" class="btn btn-sm bg-success-light">
																				<i class="fas fa-check"></i> Accept
																			</button>
																			</div>
																		</td>
																		<td><a href="chat-doctor.php?id='.$pimg.'">Chat</td>
																	</form>	
																	</tr>';
                                                                   }
                                                                    ?>
																	
																</tbody>
															</table>		
														</div>	
													</div>	
												</div>	
											</div>
											<!-- /Today Appointment Tab -->
											
										</div>
									</div>
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
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Circle Progress JS -->
		<script src="assets/js/circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:09 GMT -->
</html>