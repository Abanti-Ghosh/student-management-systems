<?php session_start();?><!DOCTYPE html>
<html>
<head>
<title>show all record</title>
<style>
td{
	text-align:right;
}
th{
	padding:10px;
	background-color:grey;
}
#container{
	width:80%;
	margin:auto;
	background-color:#ebebeb;
	height:auto;
}
body{
	paddding:0;
	margin:0;
}
#sidebar{
	width:30%;
	float:left;
}
#content{
	width:70%;
	float:right;
}
#footer{
	clear:both;
	background-color:black;
	color:white;
	text-align:center;
}
</style>
</head>
<body>
<div id="container">
<div id="sidebar">
<form action="search.php"><input type="text" name="s" placeholder="search here"><input type="submit" name="submit"></form>
<?php

	include "connection.php";
	
	$sql = "SELECT * FROM `fees`";
	// $sql="SELECT * FROM `fees` WHERE Fee_status='unpaid'";
	$result = mysqli_query($conn, $sql);
	
?>

<?php if(isset($_SESSION['id'])){
	?>
	<a href="logout.php"><button>logout</button></a> <a href="insert.php"><button>insert</button></a>
	<?php
}else{?>
<form action="login.php" method="post">
username:<input type="text" name="username"><br>
password:<input type="password" name="password"><br>
<input type="submit" name="submit" value="login">
</form><?php } ?>
</div>
<div id="content">
<table border="1" style="border-collapse:collapse">
<tr>
<th>ID</th>
<th>NAME</th>
<th>CLASS</th>
<th>FEES</th>
<th>FEE STATUS</th>
<?php if(isset($_SESSION['id'])){?>
<th>Delete</th>
<th>Edit</th>
<?php } ?>
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
	if(isset($_SESSION['id'])){
	echo "<td><a href='delete.php?id=".$row['id']."' onClick='return confirm(".'"are you sure?"'.");'>DELETE</a></td>";
	echo "<td><a href='edit.php?id=".$row['id']."'>edit</a></td>";
	}
	echo "<tr>";
	}
	?>
	</table>
	
</div>


<div id="footer">copyright php</div>



</div>

	</body>
	</html>