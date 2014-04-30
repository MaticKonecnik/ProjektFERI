
<?php


//Ponovni izracun ocjene i glasova
function getRate() {
	global $con;
	$idRecipe = $_GET['product_id'];
	//mysql procedura getRate za dobivanje prosjecne ocjene i broj glasova
	$sql= $con->query("CALL getRate($idRecipe)");
	if($result = $sql->fetch_assoc())
	{
		$rate['avg'] = $result['avg'];
		$rate['count'] = $result['count'];
		echo json_encode($rate);
	}
	
}


// function vstavljanje v bazu
function rate() {
	global $con;
	$idRecipe = $_GET['product_id'];
	$starRate = $_GET['rate'];
	//mysql procedura inserRate za stavljanje recepta
	$sql = $con->query("CALL insertRate($idRecipe,$starRate)");
	//zavnje funkcije za ponovno izracunavanje
		echo getRate();
}


if(!empty($_GET['do'])) {
	//open database connection
	include ("../../includes/database.php");	  	
	if($_GET['do']=='rate'){
		// do rate
		echo rate();
	}
}


?>