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
      padding: 0 50px;
      font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    }
    video {
      max-width: calc(50% - 100px);
      margin: 0 50px;
      box-sizing: border-box;
      border-radius: 2px;
      padding: 0;
      background: white;
    }
    .copy {
      position: fixed;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 16px;
      color: white;
    }
  </style>
</head>
<body>
<?php
include "connection.php";
$id = $_GET['id'];
$did = $_GET['did'];
$sql = "SELECT * FROM `videocall` where `uid` = '$id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);
$url = $row['url'];

?>
<div class="container">
  <center>
<div class="col-lg-4">
<?php
  if($url)
  {
echo '<p>Call from Doctor</p>
echo $url;
<a href="'.$url.'" class="btn btn-primary">join</a>';
  }
  else{
    echo '<a href="../chat.php?id='.$did.'" class="btn btn-primary">End Call</a>';
  }
?>
</div>
  </center>
</div>  
  <script src="script.js"></script>
<script>
  setInterval(function () { location.reload();; }, 2000);
</script>

</body>
</html>
