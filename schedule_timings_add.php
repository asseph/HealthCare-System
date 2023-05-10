<?php
include "connection.php";
$doctorId = $_POST['doctorId'];
$duration = $_POST['duration'];
$day = $_POST['day'];
$time = $_POST['time'];
if($_POST['add'])
{
$sql = "INSERT INTO `schedule-slot` (`dcotorId`, `day`, `time`, `duration`) VALUES ('$doctorId', '$day', '$time', '$duration')";
$res = mysqli_query($con,$sql);
if($res)
{
    echo 1;
}
}
?>