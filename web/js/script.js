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
	if(location.pathname.indexOf("makemenu.php") != -1)
	{
		meniji();
	}
	if(location.pathname.indexOf("profile.php") != -1)
	{
		naloziProfil();
		lightbox();
	}
});

function init_slider() {
	  $("#owl-demo").owlCarousel({
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true,
	  autoPlay : true
  });
  $("#owl-demo > div.owl-wrapper-outer > div > div:last-child").remove();
  $("#owl-demo > div.owl-controls.clickable > div > div:last-child").remove();
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

function naloziProfil(){
	var id = getUrlVars()["id"];	
	$.ajax({
		type: "GET",
		url: "includes/ajax/nalozi_profil.php",
		data:{
			id: id
		}
	})
	.done(function(msg){
		$("#profile_wrapper").html(msg);
		lightbox();
	});
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
			naloziProfil();
		});
	});
}

function search(){
	$('#isci').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){// če je enter	
			$.ajax({
			type: "POST",
			url: "includes/ajax/search.php",
			data: { isci: $("#isci").val() }
			})
			.done(function(msg) {
			alert ("p");
			});
    }
	});
}

function meniji(){
	$('#vnesi_ceno').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){// če je enter
			meniji_ajax();
    }
	});
	$(".sestavi_meni_click").click(function(){
		meniji_ajax();
	});
}

function meniji_ajax()
{
	if($.isNumeric($("#vnesi_ceno").val()))
	{
		$.ajax({
				type: "POST",
				url: "includes/ajax/sestavimeni.php",
				data: { budget: $("#vnesi_ceno").val() }
				})
				.done(function(msg) {
					$("#skatla_za_prikaz_menijev").html(msg);
				});
	}
}