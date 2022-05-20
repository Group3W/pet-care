<?php
include 'connect.php';
if(isset($_GET['doneid']))
{
    $id=$_GET['doneid'];
    $sql="update `appointment` set appointment_status='Done' where AID=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        header('location:UpcomingAppointments.php');

    }
    else{
 die(mysqli_error($con));
    }
}
?>

