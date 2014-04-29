<?php
	include_once ("../database.php");
	
	$id = (int)$_POST['user_id'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	
	$query = sprintf("UPDATE user SET name='%s', surname='%s', username='%s', email='%s' WHERE id = '$id'",
			mysqli_real_escape_string($con, $name),
			mysqli_real_escape_string($con, $surname),
			mysqli_real_escape_string($con, $username),
			mysqli_real_escape_string($con, $email));
	if(!mysqli_query($con, $query)){
		die(mysqli_error($con));
	}
?>