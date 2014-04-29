/**
 * jQuery-PHP-Mysql Star Rating
 * This jQuery-PHP-Mysql plugin was inspired and based on jQuery Star Rating Plugin (http://www.fyneworks.com/jquery/star-rating/)
 * and adapted to me for use like a plugin from jQuery.
 * @name jQuery-PHP-Mysql Star Rating
 * @author Igor Jovičić - http://www.izradawebstranice.com.hr
 * @version 1.0
 * @date August 14, 2010
 * @category jQuery plugin
 * @copyright (c) 2010 Igor Jovičić (www.izradawebstranice.com.hr)
 * @license CC Attribution-No Derivative Works 2.5 Brazil - http://creativecommons.org/licenses/by-nd/2.5/br/deed.en_US
 * @example Visit http://www.izradawebstranice.com.hr/upute-kako/jquery/jquery-php-mysql-star-rating-plugin.html for more informations about this jQuery/PHP/Mysql plugin
 */
$(document).ready(function() {
var some_product_id=1;  //let's say it's product with id=1, if you have application you will change this variable programatically

getRating(some_product_id);

function getRating(id){
	$.ajax({
		type: "GET",
		url: "/download/star-rating/rate-product.php",
		dataType : 'json',
		data: "do=getRate&product_id=" + id,
		cache: false,
		async: false,
		success: function(result) {
			avg=result.avg;
			sum=result.count;
			$("#votes").html("Average:" + avg);
			$(".vote_count").html(sum + " vote(s)");
			$('.rate').rating('select',avg);
		},
		error: function() {
			alert("Error, please try again!");
		}
	});
}

$('.rate').click(function(){
	$.ajax({
		type: "GET",
		url: "/download/star-rating/rate-product.php",
		dataType : 'json',
		data: "do=rate&product_id=" + some_product_id + "&rate="+$(this).text(),
		cache: false,
		async: false,
		success: function(result) {
			avg=result.avg;
			sum=result.count;
			$("#votes").html("Average:" + avg);
			$(".vote_count").html(sum + " vote(s)");
			$('.rate').rating('select',avg);
		},
		error: function() {
			alert("Error, please try again!");
		}
	});
});
});