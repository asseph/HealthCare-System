<?php
error_reporting(0);
include "connection.php";

echo $uid = $_POST['uid'];

$sql = "DELETE FROM `audio` WHERE `uid` = '$uid'";
$res = mysqli_query($con,$sql);
if($res)
{
    
    echo
    "<script>
   
    window.location.href='../chat-doctor.php?id=$uid';
    </script>
    ";
}
