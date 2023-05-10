
<?php
error_reporting(0);
include "connection.php";
$mid = $_POST['mid'];
echo $uid = $_POST['uid'];

$sql = "DELETE FROM `videocall` WHERE `uid` = '$uid'";
$res = mysqli_query($con,$sql);
if($res)
{
    
    echo
    "<script>
   
    window.location.href='../chat.php?id=$mid';
    </script>
    ";
}
