<?php
include "connection.php";
if(isset($_GET['s'])){
	$s = mysqli_real_escape_string($conn,$_GET['s']);
	
	$sql = "SELECT * FROM `fees` WHERE `Class` LIKE '$s' OR `student_name` LIKE '%$s%' OR `Fees`= '$s' OR `Fee_status` LIKE '$s'";
	
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		?>
		<table border="1" style="border-collapse:collapse">
<tr>
<th>ID</th>
<th>NAME</th>
<th>CLASS</th>
<th>FEES</th>
<th>FEE STATUS</th>
<th>Delete</th>
<th>Edit</th>
</tr>
<?php
    while($row = mysqli_fetch_assoc($result)){
		
	echo "<tr>";
	//print_r($row);
	//echo "<br>";
	echo "<td>".$row['id']."</td>";
	echo "<td>".$row['student_name']."</td>";
	echo "<td>".$row['Class']."</td>";
	echo "<td>".$row['Fees']."</td>";
	echo "<td>".$row['Fee_status']."</td>";
	echo "<td><a href='delete.php?id=".$row['id']."' onClick='return confirm(".'"are you sure?"'.");'>DELETE</a></td>";
	echo "<td><a href='edit.php?id=".$row['id']."'>edit</a></td>";
	echo "<tr>";
	}
	?>
		</table>
		<?php
	}else{
		echo "no results found";
		exit();
	}
}
?>