<?php
include "connection.php";
$msg = $_POST['msg'];
$cheker = $_POST['cheker'];
$senderid = $_POST['senderid'];
$reciverid = $_POST['reciverid'];
if(isset($_POST['msgsubmit']))
{
    $sql = "INSERT INTO `chat` (`reciver_id`, `sender_id`, `msg`, `date`, `msg_checker`) VALUES ('$reciverid', '$senderid', '$msg', '2023-03-09 11:39:25.000000', '$cheker')";
    $res = mysqli_query($con,$sql);
    if($res)
    {
        echo 1;
    }

}

?>