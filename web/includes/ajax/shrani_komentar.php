<?php
session_start();
include '../database.php';
$id_recepta = $_POST['id_recepta'];
$vsebina = $_POST['vsebina'];
echo($_SESSION["login"]);
if($vsebina!="" && $id_recepta!="" && isset($_SESSION["login"]))
{
	$id_uporabnika = $_SESSION["login"];
	$sql="INSERT INTO comment (content, recipe_id, user_id) VALUES ('$vsebina', '$id_recepta', '$id_uporabnika');";
	if (!mysqli_query($con,$sql))
	  die('Napaka: ' . mysqli_error($con));
}
mysqli_close($con);
?>