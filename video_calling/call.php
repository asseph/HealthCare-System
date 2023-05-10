<?php
error_reporting(0);
include "connection.php";
$url = $_POST['url'];
$uid = $_POST['uid'];
if($_POST['submit'])
{
$sql = "INSERT INTO `videocall` (`url`, `uid`) VALUES ('$url', '$uid')";
$res = mysqli_query($con,$sql);
if($res)
{
  echo "
  <script>
  document.getElementById('form').style.display='none';
  document.getElementById('endcall').style.display='block';
  </script>
  ";
}
}
?>