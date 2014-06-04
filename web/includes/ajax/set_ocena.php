<?php
	include '../database.php';
	if(!empty($_POST['ocena']))
	{
	$id = $_POST['id'];
	$ocena = $_POST['ocena'];
	$sql="UPDATE recipe SET rate = rate +'$ocena', rated = rated +1 WHERE id = $id;";
			if (!mysqli_query($con,$sql))
 				 die('Napaka: ' . mysqli_error($conn));
	}

?>