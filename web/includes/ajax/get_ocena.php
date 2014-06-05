<?php
	include '../database.php';
	
	$id = $_GET['id'];
	$sql = "SELECT rate, rated FROM recipe WHERE id=$id LIMIT 1";
	$row = mysqli_fetch_array(mysqli_query($con,$sql));
	
	if($row['rated'] != 0)
		$ocena =  $row['rate'] / $row['rated'];
	else
		$ocena = 0;
	$procenti = round($ocena * 100);
	$prikaz_ocena = $procenti / 10;
	$st_glasov = $row['rated'];
	if($st_glasov == 1)
		$glasov_beseda = 'glas';
	else if($st_glasov == 2)
		$glasov_beseda = 'glasa';
	else
		$glasov_beseda = 'glasov';
		
	echo('<span class="white_stars">
          	<span class="yellow_stars" style="width: '.$procenti.'%;"></span>
          </span>');
	if($st_glasov > 0)
		echo('<span class="about_ocena">Ocena: '.$prikaz_ocena.'/10 - ‎'.$st_glasov.' '.$glasov_beseda.'</span>');
	else
		echo('<span class="about_ocena">Recept ni ocenjevan</span>');

?>