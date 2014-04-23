$(document).ready(function() {
	if(location.pathname.indexOf("index.php") != -1)
  		init_slider();
});


function init_slider() {
$('#da-slider').cslider({
	autoplay : true,
	bgincrement : 450
});
}