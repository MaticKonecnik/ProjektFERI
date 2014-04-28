<?php 
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	include_once ("includes/database.php");
	$id=$_SESSION["login"];
	$prijava=isset($_POST['prijava']);
	$registracija=isset($_POST['registracija']);
	if ($prijava){
		header('Location: login.php');
	}
	else if ($registracija){
		header('Location: registration.php');
	}
	else if (isset($id)){
		$sql="SELECT name, surname FROM user WHERE id='$id'";
		$query= mysqli_query($con, $sql);
		$rezultat=mysqli_num_rows($query);
		if ($rezultat>0){
			while($row=mysqli_fetch_assoc($query)){
			$name=$row['name'];
			$surname=$row['surname'];
			}
		}	
	}
?>
<!doctype html>
<html>
<head>
<title>Projekt</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<?php if(basename($_SERVER['PHP_SELF'])=="index.php") echo('<link rel="stylesheet" type="text/css" href="css/slider.css" />'."\n"); ?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
<?php if(basename($_SERVER['PHP_SELF'])=="index.php") echo('<script type="text/javascript" src="js/jquery.cslider.js"></script>'."\n"); ?>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div class="wrap">
<?php
if(!isset($id)){
	echo " <form method='post'> 
			<div class='header_form' >
			<input type='submit' value='Registriraj se' name='registracija'>
			<input type='submit' value='Prijavi se' name='prijava'>
			</div></form>";
		}
else{
	echo "
			<div class='header_form'>
			$name $surname
			
			<a href='logout.php'><input type='submit' value='Odjava'></a>
			</div>";
	}
?>
	<div class="main"><!-- start main -->
    