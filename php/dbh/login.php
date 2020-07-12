<html>
<?php include "connection.php"; session_start(); ?>
<form method="post">
username:<input type="text" name="username"><br>
password:<input type="password" name="password"><br>
<input type="submit" name="submit" value="login">
</form>

<?php
if(isset($_POST['submit'])){
	$user_username = mysqli_real_escape_string($conn, $_POST['username']);
	$user_password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$sql = "SELECT * FROM `users` WHERE user_username='$user_username'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
if(password_verify($user_password, $row['user_password'])){
$_SESSION['id']=$row['user_id'];
echo "you are logged in";	
header("Location:show.php");
	}
}
}
}
?>
</html>