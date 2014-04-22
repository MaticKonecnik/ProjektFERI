<?php
	include_once 'database.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	
	$query = sprintf("INSERT INTO user(username, password, name, surname, email) VALUES('%s', '%s', '%s', '%s', '%s')",
			mysql_real_escape_string($username),
			mysql_real_escape_string($password),
			mysql_real_escape_string($name),
			mysql_real_escape_string($surname),
			mysql_real_escape_string($email));
	
	if(mysqli_query($con, $query)){
		//preusmeritev na prijavo, ker je zapis v bazo uspešen
		header("Location: login.php");
	}
	else{
		echo "Registracija neuspešna!";
		die();
	}
?>