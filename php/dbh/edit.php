<!-- same reason as dlete-->
<?php
session_start();

if(!isset($_SESSION['id'])){
	header("Location: show.php");
	exit();
	}else{

include "connection.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT * FROM `fees` WHERE id='$id'";
	$result=mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
		?>
		<form method="post">
student name: <input type="text" name="name" value="<?php echo $row['student_name'];?>"required><br>
student class: <input type="text" name="class" value="<?php echo $row['Class'];?>" required><br>
student fees: <input type="text" name="fees" value="<?php echo $row['Fees'];?>"required><br>
fee status: <select name="Fee_status"><option value="paid" <?php if($row['Fee_status']=="paid"){echo "selected";} ?>>paid</option><option value="unpaid"  <?php if($row['Fee_status']=="unpaid"){echo "selected";} ?>>unpaid</option></select>
<input type="submit" name="submit">
</form>
		<?php
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
	$class = $_POST['class'];
	$fees = $_POST['fees'];
	$Fee_status = $_POST['Fee_status'];
	//sql2 because already sql has been used in this file
	$sql2 = "UPDATE `fees` SET `student_name`='$name',`Class`='$class',`Fees`='$fees',`Fee_status`='$Fee_status' WHERE id='$id'";
	
	if(mysqli_query($conn, $sql2)){
		header("LOCATION:show.php?updatedSuccess");
	}
		}
	}
}else{
	header("LOCATION: show.php");
}
	}
?>
