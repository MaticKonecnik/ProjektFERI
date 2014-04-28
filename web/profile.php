<?php
	session_start();
	include("includes/header.php");
	include("includes/menu.php");
	include_once ("includes/database.php");
	
	$id = (int)$_GET['id'];
	
	//prijavljen uporabnik, lahko ureja svoj profil
	if(isset($_SESSION['login']) && $id = $_SESSION['login']){
		//echo '<a href="editProfile.php">Uredi profil</a>';
	}
?>
	
<?php
	include("includes/footer.php");
?>