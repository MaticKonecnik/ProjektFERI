$(document).ready(function() {
	preveri_gesla();
});

function preveri_gesla(){
	$('input[name="password"]').blur(function(event){
		if($('input[name="password"]').length != 0){
			$("#validate").text("");
			geslo = $('input[name="password"]').val();
			if(geslo.length > 5){
				$('input[name="password2"]').prop('disabled', false);
				$('input[type="submit"]').prop('disabled', false);
				geslo2 = $('input[name="password2"]').val();
				if(geslo2.length != 0){
					if(geslo != geslo2){
						$("#validate").text("Gesli se ne ujemata!");
						$('input[type="submit"]').prop('disabled', true);
					}
				}
			}
			else{
				$("#validate").text("Geslo mora biti dolgo najmanj 6 znakov!");
			}
		}
	});
	
	$('input[name="password2"]').blur(function(event){
		geslo = $('input[name="password"]').val();
		geslo2 = $('input[name="password2"]').val();
		if(geslo != geslo2){
			$("#validate").text("Gesli se ne ujemata!");
			$('input[type="submit"]').prop('disabled', true);
		}
		else{
			$("#validate").text("");
			$('input[type="submit"]').prop('disabled', false);
		}
	});
}