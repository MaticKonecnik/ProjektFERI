<?php 
	session_start();
	include_once ("includes/database.php");
	$prijava=isset($_POST['prijava']);
	$registracija=isset($_POST['registracija']);
	if ($prijava){
		header('Location: login.php');
	}
	else if ($registracija){
		header('Location: registration.php');
	}
	else if (isset($_SESSION["login"])){
		$id= $_SESSION["login"];
		$now=time();
		$sql="SELECT name, surname, image FROM user WHERE id='$id'";
		$query= mysqli_query($con, $sql);
		$rezultat=mysqli_num_rows($query);
		if ($rezultat>0){
			while($row=mysqli_fetch_assoc($query)){
			$name=$row['name'];
			$surname=$row['surname'];
			$image=$row['image'];
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
<?php
	if(basename($_SERVER['PHP_SELF'])=="index.php")
	{
		echo('<script type="text/javascript" src="js/jquery.cslider.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/unslider.min.js"></script>'."\n");
	}
	if(basename($_SERVER['PHP_SELF'])=="popular.php")
		echo('<script type="text/javascript" src="js/jquery.cslider.js"></script>'."\n");
	if(basename($_SERVER['PHP_SELF'])=="registration.php")
		echo('<script type="text/javascript" src="js/preveri_registracijo.js"></script>'."\n");
	if(basename($_SERVER['PHP_SELF'])=="recipe.php")
	{
		echo('<script type="text/javascript" src="js/starRatings/jquery.rating.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/starRatings/rate-product-ajax.js"></script>'."\n");
		echo ('<link href="js/starRatings/jquery.rating.css" type="text/css" rel="stylesheet" />'."\n");
    }
  //<!-- Zakomentirana skirpta jer onda ne delaju komentari -->
 /* if(basename($_SERVER['PHP_SELF'])=="recipe.php") echo ('<script type="text/javascript" src="js/starRatings/jquery.js"></script>'."\n"); */
//<!-- css stylsheet zvezdice -->
?>
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
	if ($now > $_SESSION["expire"]){
		echo " <form method='post'> 
			<div class='header_form' >
			<input type='submit' value='Registriraj se' name='registracija'>
			<input type='submit' value='Prijavi se' name='prijava'>
			</div></form>";
	}
	else{
		echo "	<div class='header_form'>
				<a href='profile.php?id=$id' class='current-login'><img src='$image' alt='$name $surname' title='$name $surname' class='login-img'/>$name $surname</a>
				<a href='logout.php'><input type='submit' value='Odjava'></a>
				</div>";
		}
	}
?>
<div class="main">
<!-- start main --> 
