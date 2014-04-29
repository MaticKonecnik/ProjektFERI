<?php
/**
 * jQuery-PHP-Mysql Star Rating
 * This jQuery-PHP-Mysql plugin was inspired and based on jQuery Star Rating Plugin (http://www.fyneworks.com/jquery/star-rating/)
 * and adapted to me for use like a plugin from jQuery.
 * @name jQuery-PHP-Mysql Star Rating
 * @author Igor Jovičić - http://www.izradawebstranice.com.hr
 * @version v3.13
 * @date August 14, 2010
 * @category jQuery plugin
 * @copyright (c) 2010 Igor Jovičić (www.izradawebstranice.com.hr)
 * @license CC Attribution-No Derivative Works 2.5 Brazil - http://creativecommons.org/licenses/by-nd/2.5/br/deed.en_US
 * @example Visit http://www.izradawebstranice.com.hr/upute-kako/jquery/jquery-php-mysql-star-rating-plugin.html for more informations about this jQuery/PHP/Mysql plugin
 */
 
 // function to retrieve
function getRate() {
	$sql= "select ifnull(round(sum(rate)/count(*),0),0) avg, count(*) count from example_rate where product_id=" . $_GET['product_id'];
	if($result=mysql_query($sql)) {
		if($row=mysql_fetch_array($result)) {
			$rate['avg'] = $row['avg'];
			$rate['count'] = $row['count'];
			echo json_encode($rate);
		}
	}
}

// function to insert rating
function rate() {
	$sql = "insert into example_rate (product_id, rate) values (" . $_GET['product_id'] . ", ".$_GET['rate'].")";
	if($result=mysql_query($sql)) {
		getRate(); //call retrieve from getRate function
	}
}

if(!empty($_GET['do'])) {
	include '../../php/config.php';
	include '../../php/opendb.php';  //open database connection
	
	if($_GET['do']=='rate'){
		// do rate
		rate();
	}
	else if($_GET['do']=='getRate'){
		// get rating
		getRate();
	}
}
?>