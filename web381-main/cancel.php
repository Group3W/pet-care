<?php
include 'connect.php';
if(isset($_GET['cancelid']))
{
    $id = $_GET['cancelid'];
    $sql = "delete from `appointment` where AID=$id";    
    $result = mysqli_query($con,$sql);
    if($result)
    {
header('location:UpComingAppoint.php');
    }
    else{
 die(mysqli_error($con));
    }
}
?>