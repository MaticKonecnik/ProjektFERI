<?php
//include("includes/header.php");
//include("includes/menu.php");
include_once ("includes/database.php");


echo "123";

$sql="SELECT MAX(transaction_id)+1 FROM  transaction;";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($result);
$idTransaction = $row[0];
$_SESSION['transaction']=$idTransaction;



?>