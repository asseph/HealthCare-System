<?php
error_reporting(0);
?>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://cdn.scaledrone.com/scaledrone.min.js'></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <style>
    body {
     
      display: flex;
      height: 100vh;
      margin: 0;
      align-items: center;
      justify-content: center;
      
      font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    }
    video {
      max-width: 100%;
      
      box-sizing: border-box;
      border-radius: 2px;
      padding: 0;
      background: white;
    }
    .copy {
      position: fixed;
      
      transform: translateX(-50%);
      font-size: 16px;
      color: white;
    }
    #endcall{
      display:none;
    }
  </style>
</head>
<body>

 <div class="container"> 
  <div class="col-lg-4" style="postion:absolute">
  <video id="localVideo" autoplay muted></video>
  </div>
  <div class="col-lg-8" style="position:relative">
  <video id="remoteVideo" autoplay></video>
  </div>
</div>
  
  <script src="script.js"></script>
  <div id="endcall">
  <form action="endcall.php" method="POST">
    <input type="hidden" name="uid" value="<?php echo $_POST['pid']?>">
    <input type="submit" name="endcall" class="btn btn-primary" value="Sendcall">
  </form> 
  </div>
  <?php
echo $_POST['rid'];
?>
<div id="endcall_reciver">
  <form action="endcall_reciver.php" method="POST">
  <input type="hidden" name="mid" value="<?php echo $_POST['mid']?>">
    <input type="hidden" name="uid" value="<?php echo $_POST['rid']?>">
    <input type="submit" name="endcall" class="btn btn-primary" value="rendcall">
  </form> 
  </div>
  
</body>
</html>
<?php
error_reporting(0);
include "connection.php";
$url = 'video_calling/index.php#3165a7 ';
$did = $_POST['pid'];
if($_POST['submit'] == 'dsubmit')
{
$sql = "INSERT INTO `videocall` (`url`, `uid`, `status`) VALUES ('$url', '$did', '1')";
$res = mysqli_query($con,$sql);
if($res && $_POST['pid'] )
{
  echo "
  <script>
  
  document.getElementById('endcall_reciver').style.display='none';
  document.getElementById('endcall').style.display='block';
  </script>
  ";
}
if($res && $_POST['rid'] )
{
  echo "
  <script>

  document.getElementById('endcall').style.display='none';
  document.getElementById('endcall_reciver').style.display='block';
  </script>
  ";
}
}

?>