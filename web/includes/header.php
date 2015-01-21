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
<?php if(basename($_SERVER['PHP_SELF'])=="index.php")
{
	//echo('<link rel="stylesheet" type="text/css" href="css/slider.css" />'."\n");
	echo('<link rel="stylesheet" href="owl-carousel/owl.carousel.css">'."\n");
	echo('<link rel="stylesheet" href="owl-carousel/owl.theme.css">'."\n");
} ?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
<?php
	if(basename($_SERVER['PHP_SELF'])=="index.php")
	{
		/*echo('<script type="text/javascript" src="js/jquery.cslider.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/unslider.min.js"></script>'."\n");*/
		echo('<link rel="stylesheet" href="owl-carousel/owl.carousel.css">'."\n");
		echo('<link rel="stylesheet" href="owl-carousel/owl.theme.css">'."\n");
		echo('<script src="owl-carousel/owl.carousel.js"></script>'."\n");
	}
	if(basename($_SERVER['PHP_SELF'])=="popular.php")
		echo('<script type="text/javascript" src="js/jquery.cslider.js"></script>'."\n");
	if(basename($_SERVER['PHP_SELF'])=="virtual_kitchen.php")
	{
		echo('<script type="text/javascript" src="js/grafika/libs/three.min.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/OrbitControls.js"></script>'."\n");
		//echo('<script type="text/javascript" src="js/grafika/libs/OBJLoader.js"></script>'."\n");
		//echo('<script type="text/javascript" src="js/grafika/libs/DDSLoader.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/MTLLoader.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/OBJMTLLoader.js"></script>'."\n");
		//echo('<script type="text/javascript" src="js/grafika/libs/threex.videotexture.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/stats.min.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/utils.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/threex.domevent.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/CSS3DRenderer.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/THREEx.WindowResize.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/THREEx.FullScreen.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/jQuery/jquery-1.9.1.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/jQuery/jquery-ui.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/libs/threex.htmlmixer.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/grafika/grafika.js"></script>'."\n");
		
		
	}
	if(basename($_SERVER['PHP_SELF'])=="registration.php")
		echo('<script type="text/javascript" src="js/preveri_registracijo.js"></script>'."\n");
	if(basename($_SERVER['PHP_SELF'])=="recipe.php")
	{
		echo('<script type="text/javascript" src="js/starRatings/jquery.rating.js"></script>'."\n");
		echo('<script type="text/javascript" src="js/starRatings/rate-product-ajax.js"></script>'."\n");
		echo ('<link href="js/starRatings/jquery.rating.css" type="text/css" rel="stylesheet" />'."\n");
    }
?>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<?php
if(basename($_SERVER['PHP_SELF'])=="recipe.php"){?>
	<div id="fb-root"></div>
	<script type="text/javascript">
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/sl_SI/sdk.js#xfbml=1&version=v2.0";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
<?php } ?>
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
		session_destroy();
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
