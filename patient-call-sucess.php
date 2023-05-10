<html>
 <body>   
<?php
include "connection.php"; 
echo $did =  $_POST['did'];
$vsql = "SELECT * FROM `videocall` Where `uid` = '$did'";
$res = mysqli_query($con,$vsql);
$row = mysqli_fetch_assoc($res);
$status = $row['status'];
if($status == 1)
{
  echo'
  
  <div class="modal call-modal" id="myModal">
  <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        
    </div>
      <div class="modal-dialog modal-dialog-centered">
      hy
          <div class="modal-content">
              <div class="modal-body">
              
                  <!-- Incoming Call -->
                  <div class="call-box incoming-box">
                      <div class="call-wrapper">
                          <div class="call-inner">
                              <div class="call-user">
                                  <img class="call-avatar" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                  <h4>Darren Elder</h4>
                                  <span>Calling ...</span>
                              </div>							
                              <div class="call-items">
                                  <a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
                                  <a href="video-call.html" class="btn call-item call-start"><i class="material-icons">videocam</i></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- /Incoming Call -->
                  
              </div>
          </div>
      </div>
      
  </div>
  ';
}
echo"
<script>
setInterval(function () { loadcall(); }, 2000);
function loadcall(){
$(window).on('load', function() {
    $('#myModal').modal('show');
});
}
</script>
";
?>

  </body>
  </html>