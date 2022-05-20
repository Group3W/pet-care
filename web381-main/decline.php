
<?php
include 'connect.php';
if(isset($_GET['declineid']))
{
    $id=$_GET['declineid'];
    $sql="update `appointment` set appointment_status='Declined' where AID=$id";    
    $result=mysqli_query($con,$sql);
    if($result)
    {
//echo"deleted";
header('location:RequistList.php');
    }
    else{
 die(mysqli_error($con));
    }
}
?>
