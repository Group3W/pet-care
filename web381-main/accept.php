<?php
include 'connect.php';
if(isset($_GET['acceptid']))
{
    $id=$_GET['acceptid'];
    $sql="update `appointment` set appointment_status='Accepted' where AID=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        header('location:RequistList.php');

    }
    else{
 die(mysqli_error($con));
    }
}
?>

