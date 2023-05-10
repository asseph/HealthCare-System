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
		alert('Welcome to Doctor Schedule Time');
	</script>
	";
}
$sessionid = $_SESSION['id'];
include "connection.php";
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/schedule-timings.html  30 Nov 2019 04:12:09 GMT -->
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
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Schedule Timings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Schedule Timings</h2>
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
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">
												<div class="row">

													<div class="col-lg-4">
														<div class="form-group">               
															<label>Duration Slot </label>
															<select name="duration" id="duration" class="select form-control">
																<option>-</option>
																<option value="15 min">15 mins</option>
																<option value="30 min" selected="selected">30 mins</option>  
																<option value="45 min">45 mins</option>
																<option value="1 hour">1 Hour</option>
															</select>
														</div>
														<div class="form-group">               
															<label>Day Slot </label>
															<select name="day" id="day" class="select form-control">
																<option>-</option>
																<option value="Sunday">Sunday</option>
																<option value="Monday" selected="selected">Monday</option>  
																<option value="Tuesday">Tuesday</option>
																<option value="Wednesday">Wednesday</option>
																<option value="Thursday">Thursday</option>
																<option value="Friday">Friday</option>
															</select>
														</div>
														<div class="form-group">               
															<label>Timing Slot </label>
															<input type="text" name="time" id="time" class="select form-control">
                                                            <input type="hidden" name="time" id="doctorId" value="<?php echo$sessionid;?>" class="select form-control">
                                                            
														</div>
                                                        <div class="form-group">               
														<label>Button </label>
                                                            <input type="submit" id="addSlot" class="form-control" value="Add Slot" ></input>
														</div>

													</div>

												</div>   
                                               
												<div class="row">
													<div class="col-md-12">
														<div class="card schedule-widget mb-0">
														
															<!-- Schedule Header -->
															<div class="schedule-header">
															
																<!-- Schedule Nav -->
																<div class="schedule-nav">
																	<ul class="nav nav-tabs nav-justified">
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_sunday">Sunday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link active" data-toggle="tab" href="#slot_monday">Monday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_tuesday">Tuesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_wednesday">Wednesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_thursday">Thursday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_friday">Friday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_saturday">Saturday</a>
																		</li>
																	</ul>
																</div>
																<!-- /Schedule Nav -->
																
															</div>
															<!-- /Schedule Header -->
															
															<!-- Schedule Content -->
															<div class="tab-content schedule-cont" id="product">
															
																

															</div>
															<!-- /Schedule Content -->
															
														</div>
													</div>
												</div>
											</div>
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
		
		<!-- Add Time Slot Modal -->
		<div class="modal fade custom-modal" id="add_time_slot">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
													<select class="form-control">
														<option>-</option>
														<option>12.00 am</option>
														<option>12.30 am</option>  
														<option>1.00 am</option>
														<option>1.30 am</option>
													</select>
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
													<select class="form-control">
														<option>-</option>
														<option>12.00 am</option>
														<option>12.30 am</option>  
														<option>1.00 am</option>
														<option>1.30 am</option>
													</select>
												</div> 
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal -->
		
		<!-- Edit Time Slot Modal -->
		<div class="modal fade custom-modal" id="edit_time_slot">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
													<select class="form-control">
														<option>-</option>
														<option selected>12.00 am</option>
														<option>12.30 am</option>  
														<option>1.00 am</option>
														<option>1.30 am</option>
													</select>
												</div> 
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
													<select class="form-control">
														<option>-</option>
														<option>12.00 am</option>
														<option selected>12.30 am</option>  
														<option>1.00 am</option>
														<option>1.30 am</option>
													</select>
												</div> 
											</div>
										</div>
									</div>
								</div>
								
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
													<select class="form-control">
														<option>-</option>
														<option>12.00 am</option>
														<option selected>12.30 am</option>
														<option>1.00 am</option>
														<option>1.30 am</option>
													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
													<select class="form-control">
														<option>-</option>
														<option>12.00 am</option>
														<option>12.30 am</option>
														<option selected>1.00 am</option>
														<option>1.30 am</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
								</div>
								
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
													<select class="form-control">
														<option>-</option>
														<option>12.00 am</option>
														<option>12.30 am</option>
														<option selected>1.00 am</option>
														<option>1.30 am</option>
													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
													<select class="form-control">
														<option>-</option>
														<option>12.00 am</option>
														<option>12.30 am</option>
														<option>1.00 am</option>
														<option selected>1.30 am</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
								</div>

							</div>
							
							<div class="add-more mb-3">
								<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Time Slot Modal -->
      
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
        <script>
       

       function loadTasks() {
        var duration = $('#duration').val();
        var day = $('#day').val();
        var time = $('#time').val();
        var doctorId = $('#doctorId').val(); 
    $.ajax({
        url: "schedule_timings_sucess.php",
        type: "POST",
        data: { duration:duration, day:day, time:time, doctorId:doctorId},
        success: function (data) {
            $("#product").html(data);
        }
          });
         
      }
      loadTasks();
       $('#addSlot').on('click', function (e) {
               e.preventDefault();
               var duration = $('#duration').val();
                var day = $('#day').val();
                var time = $('#time').val();
                var doctorId = $('#doctorId').val(); 
                var add = $('#addSlot').val();                     
       
               $.ajax({
                   url: 'schedule_timings_add.php',
                   type: 'POST',
                   data: { duration: duration,day: day, time:time, doctorId:doctorId, add:add },
                   success: function (dataa) {
                       if(dataa) {

                        alert('Task added successfully.');
                           loadTasks();
                       }
                       else {

                           alert('Task not added successfully.');
                           loadTasks();
                           }

                   }
               });
           });
         

     </script>   
		
	</body>

<!-- doccure/schedule-timings.html  30 Nov 2019 04:12:09 GMT -->
</html>