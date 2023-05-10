<script>
	  setInterval(function () { location.reload(); }, 20000);
</script>	
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
	
	";
}
 $sessionid = $_SESSION['id'];
?>
<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/chat.html  30 Nov 2019 04:12:18 GMT -->
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
	
	</head>
	<body class="chat-page">

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
						<div class="col-xl-12">
							<div class="chat-window">
							
								<!-- Chat Left -->
								<div class="chat-cont-left">
									<div class="chat-header">
										<span>Chats</span>
										<a href="javascript:void(0)" class="chat-compose">
											<i class="material-icons">control_point</i>
										</a>
									</div>
									<form class="chat-search">
										<div class="input-group">
											<div class="input-group-prepend">
												<i class="fas fa-search"></i>
											</div>
											<input type="text" class="form-control" placeholder="Search">
										</div>
									</form>
									<?php
								include "connection.php";
								$doctorId = $_GET['id'];
								$dsql = "SELECT * FROM doctorregistration RIGHT JOIN doctorprofile ON doctorregistration.id = doctorprofile.dcotorId WHERE doctorregistration.id = '$doctorId'";
								$dres = mysqli_query($con,$dsql);
								$drow = mysqli_fetch_assoc($dres);
								$education = $drow['education'];
								$name = $drow['name'];
								$image = $drow['image'];
								
								?>
									<div class="chat-users-list">
										<div class="chat-scroll">
											<a href="javascript:void(0);" class="media">
												<div class="media-img-wrap">
													<div class="avatar avatar-away">
														<img src="<?php echo 'image/'.$image?>" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">Dr. <?php echo $name ?></div>
														<div class="user-last-chat">Doctor of JSK Clinic</div>
													</div>
													<div>
														<!-- <div class="last-chat-time block">2 min</div>
														<div class="badge badge-success badge-pill">15</div> -->
													</div>
												</div>
											</a>
											
										</div>
									</div>
								</div>
								<!-- /Chat Left -->
								<?php
								include "connection.php";
								$doctorId = $_GET['id'];
								$dsql = "SELECT * FROM doctorregistration RIGHT JOIN doctorprofile ON doctorregistration.id = doctorprofile.dcotorId WHERE doctorregistration.id = '$doctorId'";
								$dres = mysqli_query($con,$dsql);
								$drow = mysqli_fetch_assoc($dres);
								$education = $drow['education'];
								$name = $drow['name'];
								$image = $drow['image'];
								$mobile = $drow['mobile'];
								?>
							
								<!-- Chat Right -->
								<div class="chat-cont-right">
									<div class="chat-header">
										<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
											<i class="material-icons">chevron_left</i>
										</a>
										<div class="media">
											<div class="media-img-wrap">
												<div class="avatar avatar-online">
													<img src="<?php echo 'image/'.$image?>" alt="User Image" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="user-name">Dr. <?php echo $name ?></div>
												<div class="user-status">online</div>
											</div>
										</div>
										<div class="chat-options">
											<a href="tel:+91 <?php echo $mobile?>">
												<i class="material-icons">local_phone</i>
											</a>
											<a href="#" data-toggle="modal" data-target="#myModal">
												<i class="material-icons">videocam</i>
											</a>
											<a href="javascript:void(0)">
												<i class="material-icons">more_vert</i>
											</a>
										</div>
									</div>
									<div class="chat-body">
										<div class="chat-scroll">
											<ul class="list-unstyled" id="chat">
												
											</ul>
										</div>
									</div>
									<div class="chat-footer">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="btn-file btn">
													<i class="fa fa-paperclip"></i>
													<input type="file">
												</div>
											</div>
											
											<input type="hidden" name="reciverid" id="reciverid"  value="<?php echo$sessionid?>" class="input-msg-send form-control" placeholder="Type something">
											<input type="hidden" name="senderid" id="senderid" value="<?php echo$resiverid=$_GET['id'];?>" class="input-msg-send form-control" placeholder="Type something">
											<input type="hidden" name="cheker" id="cheker" value="reciver" class="input-msg-send form-control" placeholder="Type something">
											<input type="text" name="msg" id="msg" class="input-msg-send form-control" placeholder="Type something">
											<div class="input-group-append">
												<button type="submit" name="msgsubmit" id="msgsubmit" class="btn msg-send-btn"><i class="fab fa-telegram-plane"></i></button>
											
											</div>
										</div>
									</div>
								</div>
								<!-- /Chat Right -->
								
							</div>
						</div>
					</div>
					<!-- /Row -->

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
		
		<!-- Voice Call Modal -->
		<?php
include "connection.php"; 

$id = $_GET['id'];
$sql = "SELECT * FROM `audio` where `uid` = '$sessionid'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);
$purl = $row['url'];


$vsql = "SELECT * FROM `audio` Where `uid` = '$sessionid'";
$res = mysqli_query($con,$vsql);
$row = mysqli_fetch_assoc($res);
$pstatus = $row['status'];
if($pstatus == 1)
{
  echo
		'<div class="modal fade call-modal" id="myModal">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<!-- Outgoing Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="User Image" src="image/'.$image.'" class="call-avatar">
										<h4>'.$name.'</h4>
										<span>Calling audio ...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<form action="'.$purl.'" method="POST">
										<input type="hidden" value="'.$sessionid.'" name="rid">
										<input type="hidden" value="'.$id.'" name="mid">
										<input type="hidden" value="rsubmit" name="submit">
										<button type="submit" style="text-decoration:none;border:none;background:transparent">
										
										<a class="btn call-item call-start"><i class="material-icons">call</i></a>
										</button>
									</form
									</div>
								</div>	
							</div>
						</div>
						<!-- Outgoing Call -->

					</div>
				</div>
			</div>
		</div>';
}
		?>
		<!-- /Voice Call Modal -->
		
		<!-- Video Call Modal -->
		
			
		<!-- Video Call Modal -->
		
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
		<?php
include "connection.php"; 

$id = $_GET['id'];
$sql = "SELECT * FROM `videocall` where `uid` = '$sessionid'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);
$url = $row['url'];


$vsql = "SELECT * FROM `videocall` Where `uid` = '$sessionid'";
$res = mysqli_query($con,$vsql);
$row = mysqli_fetch_assoc($res);
$status = $row['status'];
if($status == 1)
{
  echo'
  
  <div class="modal call-modal" id="myModal">
  
      <div class="modal-dialog modal-dialog-centered">
      
          <div class="modal-content">
              <div class="modal-body">
              
                  <!-- Incoming Call -->
                  <div class="call-box incoming-box">
                      <div class="call-wrapper">
                          <div class="call-inner">
                              <div class="call-user">
                                  <img class="call-avatar" src="image/'.$image.'" alt="User Image">
                                  <h4>'.$name.'</h4>
                                  <span>Call from...</span>
                              </div>							
                              <div class="call-items">
                                  <a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
								  <form action="'.$url.'" method="POST">
								  <input type="hidden" value="'.$sessionid.'" name="rid">
								  <input type="hidden" value="'.$id.'" name="mid">
								  <input type="hidden" value="rsubmit" name="submit">
								  <button type="submit" style="text-decoration:none;border:none;background:transparent">
								  
								  <a class="btn call-item call-start"><i class="material-icons">videocam</i></a>
								  </button>
							  </form> 
								 
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- /Incoming Call -->
                  
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        
    </div>
  </div>
  ';
}
?>
		
			<script>

$(window).on('load', function() {
    $('#myModal').modal('show');
});
	 
	 function loadcall() {
		
	
		var did = $('#sid').val();
	   
  $.ajax({
	  url: "patient-call-sucess.php",
	  type: "POST",
	  data: { did:did },
	  success: function (data) {
		  $("#call").html(data);
	  }
		});
	   
	}
	loadcall();
	</script>
		<script>
     
	   setInterval(function () { loadTasks(); }, 2000);
       function loadTasks() {
		var reciverid = $('#reciverid').val();
		var senderid = $('#senderid').val();
		var cheker = $('#cheker').val();
		var msg = $('#msg').val(); 
		var msgsubmit = $('#msgsubmit').val();  
    $.ajax({
        url: "patient-chat-sucess.php",
        type: "POST",
		data: { reciverid: reciverid,senderid: senderid, cheker:cheker, msg:msg, msgsubmit:msgsubmit },
        success: function (data) {
            $("#chat").html(data);
        }
          });
         
      }
	  loadTasks();
      
       $('#msgsubmit').on('click', function (e) {
               e.preventDefault();
               var reciverid = $('#reciverid').val();
                var senderid = $('#senderid').val();
                var cheker = $('#cheker').val();
                var msg = $('#msg').val(); 
                var msgsubmit = $('#msgsubmit').val();                     
       
               $.ajax({
                   url: 'chat_add.php',
                   type: 'POST',
                   data: { reciverid: reciverid,senderid: senderid, cheker:cheker, msg:msg, msgsubmit:msgsubmit },
                   success: function (dataa) {
                       if(dataa) {

                        document.getElementById("msg").value = "";
                           loadTasks();
                       }
                       else {

                          
                           loadTasks();
                           }

                   }
               });
           });
         

     </script> 
		
		
	</body>

<!-- doccure/chat.html  30 Nov 2019 04:12:18 GMT -->
</html>