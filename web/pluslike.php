<?php
	include("includes/database.php");
	$id = $_GET['id'];
	$sql = "SELECT id, likes FROM recipe WHERE id='$id' LIMIT 1";
	$row = mysqli_fetch_array(mysqli_query($con,$sql));
	$id=$row['id'];
	$likes=$row['likes']+1;
	$sql1="UPDATE recipe SET likes='$likes' WHERE id='$id'";
	$query=mysqli_fetch_array(mysqli_query($con,$sql1));
	header("Location: recipe.php?id=$id");

?>