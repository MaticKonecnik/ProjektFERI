<?php
	include_once 'database.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	
	$query = sprintf("INSERT INTO user(username, password, name, surname, email) VALUES('%s', '%s', '%s', '%s', '%s')",
			mysqli_real_escape_string($con, $username),
			mysqli_real_escape_string($con, $password),
			mysqli_real_escape_string($con, $name),
			mysqli_real_escape_string($con, $surname),
			mysqli_real_escape_string($con, $email));
			
	
	if(mysqli_query($con, $query)){
		//preusmeritev na prijavo, ker je zapis v bazo uspešen
		header("Location: login.php");
	}
	else{
		die("Registracija neuspešna!".mysqli_error($con));
	}
?>