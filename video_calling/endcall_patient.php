
<?php
error_reporting(0);
include "connection.php";

echo $uid = $_POST['uid'];

$sql = "DELETE FROM `videocall` WHERE `uid` = '$uid'";
$res = mysqli_query($con,$sql);
if($res)
{
    
    echo
    "<script>
    alert('data is deleted');
    window.location.href='../chat.php?id=$uid';
    </script>
    ";
}
