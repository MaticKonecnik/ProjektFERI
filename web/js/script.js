$(document).ready(function() {
	if(location.pathname.indexOf("index.php") != -1)
  		init_slider();
	if(location.pathname.indexOf("recipe.php") != -1)
	{
		loadKomentarji();
	  	dodajKomentarje();
	}
});

function init_slider() {
	$('#da-slider').cslider({
		autoplay : true,
		bgincrement : 450
	});
}

function loadKomentarji()
{
	var ID_recepta = getUrlVars()["id"];	
	$.ajax({
	type: "GET",
	url: "includes/ajax/load_komentarji.php",
	data: { id: ID_recepta }
	})
	.done(function(msg) {
	  $("#comment_wrapper").html(msg);
	  //brisiKomentar();
	});
}

function dodajKomentarje()
{
	$('#vnos_komentarja').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){// če je enter
         	var id_recepta = getUrlVars()["id"];	
			$.ajax({
			type: "POST",
			url: "includes/ajax/shrani_komentar.php",
			data: { id_recepta: id_recepta, vsebina: $("#vnos_komentarja").val() }
			})
			.done(function(msg) {
			  loadKomentarji();
			});
    }
	});
}

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}