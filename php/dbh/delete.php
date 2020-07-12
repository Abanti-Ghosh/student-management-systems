<!--later for 2nd project we added a restriction which is because in url earlier we were writting delte.php and then id and it was deleting that id which is not secure-->
<?php
session_start();

if(!isset($_SESSION['id'])){
	header("Location: show.php");
	exit();
	}else{
include "connection.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$sql = "DELETE FROM `fees` WHERE id='$id'";
	if(mysqli_query($conn, $sql)){
		header("LOCATION:show.php?Deletedsuccessfully");
	}
}else{
	header ("LOCATION: show.php");
}
	}
?>