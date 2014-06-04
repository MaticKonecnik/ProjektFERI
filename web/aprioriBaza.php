<?php
include("includes/header.php");
include("includes/menu.php");
include_once ("includes/database.php");

/*
$sql="SELECT MAX(transaction_id)+1 FROM  transaction;";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($result);
$idTransaction = $row[0];
$_SESSION['transaction']=$idTransaction;
echo "$_SESSION[transaction]";
*/

/*
$idRecepta = $_GET['id'];

$sql = "INSERT INTO transaction(transaction_id, item)  VALUES ($_SESSION[transaction], $idRecepta);";
mysqli_query($con, $sql);
*/


//Vstavljanje v tabelu
//INSERT INTO transaction(transaction_id, item, fuzzy_value, total_item)  SELECT MAX(transaction_id)+1, 4, 1.0, 1 FROM transaction;


//Dobimo broj transakcij odredjene transakcije
/*
$sql = "SELECT count(transaction_id) from transaction where transaction_id=$_SESSION[transaction];";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($result);
$brojTransakcij = $row[0];
*/

//header("Location: recipe.php?id=". $_GET['id'] ."");

//SELECT count(transaction_id) from transaction where transaction_id=3;

//Update broj transakcij
//UPDATE transaction SET total_item= $brojTransakcij where transaction_id=3;


//Izracun fuzzy za vsako transakciju




//Dobimo itemset
/*
SELECT t.name AS item_set, 
SUM(t.fuzzy_value) /COUNT(*) AS support
FROM trans2 t
GROUP BY t.name;
*/

?>