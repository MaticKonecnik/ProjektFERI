$(document).ready(function() {
	if(location.pathname.indexOf("index.php") != -1)
	{
  		init_slider();
	}
	if(location.pathname.indexOf("popular.php") != -1)
	{
  		init_slider();
	}
	if(location.pathname.indexOf("recipe.php") != -1)
	{
		loadKomentarji();
	  	dodajKomentarje();
		$("body,html").animate({ scrollTop:  $("#slika_en_recept").offset().top }, "slow");
	}
	if(location.pathname.indexOf("profile.php") != -1)
	{
		lightbox();
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
			  $("#vnos_komentarja").val("");
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

function lightbox(){
	$("#editProfile").click(function(){
		$("#underlay").css("display", "block");
		$("#lightbox").css("display", "block");
	});
	
	$("#cancelProfile").click(function(){
		$("#underlay").css("display", "none");
		$("#lightbox").css("display", "none");
	});
	
	$("#updateProfile").click(function(){
		var user_id = getUrlVars()["id"];
		$.ajax({
			type: "POST",
			url: "includes/ajax/uredi_profil.php",
			data:{
				user_id: user_id,
				name: $("#name").val(),
				surname: $("#surname").val(),
				username: $("#username").val(),
				email: $("#email").val()
			}
		})
		.done(function(msg){
			location.reload();
		});
	});
}