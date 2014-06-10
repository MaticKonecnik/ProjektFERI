<?php
	include("includes/header.php");
	include("includes/menu.php");
	
	echo($_GET['ingredient']);
	
	/*$query = $_SERVER['QUERY_STRING'];
	$vars = array();
	foreach (explode('&', $query) as $pair)
	{
    	list($key, $value) = explode('=', $pair);
    	$vars[] = array(urldecode($key), urldecode($value));
	}*/
	
	include("includes/footer.php");
?>