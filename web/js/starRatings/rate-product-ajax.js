
//funkcija za dobivanje getResponse u JavaSkripti
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

$(document).ready(function() {   
//Id recepta  
var some_product_id=getUrlVars()["id"];


//Ajax skripta click
$('.rate').click(function(){
	$.ajax({
		type: "GET",
		url: "js/starRatings/rate-product.php",
		dataType : 'json',
		data: "do=rate&product_id=" + some_product_id + "&rate="+$(this).text(),
		cache: false,
		async: false,
		success: function(result) {
			avg=result.avg;
			sum=result.count;
			$("#ocijena").html("Ocjena: " + avg);
			$(".vote_count").html(sum + " Glasov");
			$('.rate').rating('select',avg);
		},
		error: function() {
			alert("Error2, please try again!");
		}
	});
});
});