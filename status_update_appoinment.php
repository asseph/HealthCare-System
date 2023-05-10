<?php
include "connection.php";
$id = $_POST['id'];
$sql = "SELECT * FROM appoinment WHERE id = '$id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);
if($row['status'] == 0)
{
    $astatus = 1;
}
if($row['status'] == 1)
{
    $astatus = 0;
}
$upsql = "UPDATE `appoinment` SET `status` = '$astatus' WHERE `appoinment`.`id` = '$id'";
$upres = mysqli_query($con,$upsql);
if($upres)
{
    echo
    "<script>
    window.location.href='appointments.php';
    </script>
    ";
}
?>