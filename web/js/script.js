$(document).ready(function() {
  init_slider();
  menu_select();
});


function init_slider() {
$('#da-slider').cslider({
	autoplay : true,
	bgincrement : 450
});
}

function menu_select() {
	if(location.pathname.indexOf("index.php") != -1)
  	{
		$("div.menu > ul > li:nth-child(1) > a").addClass("active");
  	}
	else if(location.pathname.indexOf("recepti.php") != -1)
	{
		$("div.menu > ul > li:nth-child(2) > a").addClass("active");
  	}
	
}