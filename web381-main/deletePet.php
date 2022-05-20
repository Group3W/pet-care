<?php
session_start();
 
/*if(!isset($_SESSION['email'])) {
  header("location: login.php");
  exit();
}
 
$id=$_SESSION['id'];*/
$ownerid=1;
if (!( $database = mysqli_connect( "localhost", "root", "" )))
die( "<p>Could not connect to database</p>" );
 
if (!mysqli_select_db( $database, "petcare" ))
die( "<p>Could not open URL database</p>" );
 
$id = $_POST['a'];
  $s = mysqli_query($database,"DELETE FROM pet WHERE vpid='$id' and ownerID='$ownerid'")
 
  ?>