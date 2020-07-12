<?php
include "connection.php";
session_start();

if(!isset($_SESSION['id'])){
	header("Location: show.php");
	exit();
	}else{?>
<!DOCTYPE html>
<html>
<head>
<title>insert a record</title>
</head>
<body>
<form method="post">
student name: <input type="text" name="name" required><br>
student class: <input type="text" name="class" required><br>
student fees: <input type="text" name="fees" required><br>
fee status: <select name="fee_status"><option value="paid">paid</option><option value="unpaid">unpaid</option></select>
<input type="submit" name="submit">
</form>
<?php
if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$class = mysqli_real_escape_string($conn,$_POST['class']);
	$fees = mysqli_real_escape_string($conn,$_POST['fees']);
	$fee_status = mysqli_real_escape_string($conn,$_POST['fee_status']);
	
	$conn = mysqli_connect("localhost","root", "", "myfirstdb");
	//to check the connection
	//if($conn){
	//echo "true";
	
	$sql = "INSERT INTO `fees` (`student_name`, `Class`, `Fees`, `Fee_status`) VALUES ('$name', '$class', '$fees', '$fee_status');";
	//same as go button that means running query
	//mysqli_query($conn, $sql);
	//the same above thing we can also write like this
	
	if(mysqli_query($conn, $sql)){
		echo "<h1> successfull</h1>";
		header("Location:show.php?message=recordadded");
	}
}
	?>
	</body>
	</html>
<?php } ?>