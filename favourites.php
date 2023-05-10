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
		alert('Welcome to patent Panel');
	</script>
	";
}
$sessionid = $_SESSION['id'];
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/favourites.html  30 Nov 2019 04:12:16 GMT -->
<head>
		<meta charset="utf-8">
		<title>JSK</title>
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
									<li class="breadcrumb-item active" aria-current="page">Favourites</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Favourites</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			<?php
            include "connection.php";
			$dsql = "SELECT * FROM patientregistration RIGHT JOIN patientprofile ON patientregistration.id = patientprofile.patientId WHERE patientregistration.id = '$sessionid'";
            $dres = mysqli_query($con,$dsql);
            $drow = mysqli_fetch_assoc($dres);
            
            ?>
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<?php
							include "patient-sidebar.php";
							?>

							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="row row-grid">
                                <?php
                                
                                $sql = "SELECT * FROM doctorregistration RIGHT JOIN doctorprofile ON doctorregistration.id = doctorprofile.dcotorId";
                                $res = mysqli_query($con,$sql);
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    echo'
                                    <div class="col-md-6 col-lg-4 col-xl-3" >
									<div class="profile-widget">
										<div class="doc-img">
											<a href="doctor-profile.html">
												<img class="img-fluid" style="height:160px" alt="User Image" src="image/'.$row['image'].'">
											</a>
											<a href="javascript:void(0)" class="fav-btn">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title">
												<a href="doctor-profile.html">'.$row['name'].'</a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality">'.$row['education'].'</p></p>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<span class="d-inline-block average-rating">(17)</span>
											</div>
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i>'.$row['address'].'
												</li>
												<li>
													<i class="far fa-clock"></i>'.$row['time'].'
												</li>
												<li>
													<i class="far fa-money-bill-alt"></i>'.$row['fees'].'<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
												</li>
											</ul>
											<div class="row row-sm">
												
												<div class="col-6">
													<a href="booking.php?id='.$row['dcotorId'].'" class="btn book-btn">Book Now</a>
												</div>
											</div>
										</div>
									</div>
								</div>
                                    ';
                                }
                                ?>
						
								
								
								
								
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
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/favourites.html  30 Nov 2019 04:12:17 GMT -->
</html>