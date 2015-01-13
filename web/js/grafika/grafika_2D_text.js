function makeTextSprite( message, parameters )
{
	if ( parameters === undefined ) parameters = {};
	
	var fontface = parameters.hasOwnProperty("fontface") ? 
		parameters["fontface"] : "Arial";
	
	var fontsize = parameters.hasOwnProperty("fontsize") ? 
		parameters["fontsize"] : 18;
	
	var borderThickness = parameters.hasOwnProperty("borderThickness") ? 
		parameters["borderThickness"] : 4;
	
	var borderColor = parameters.hasOwnProperty("borderColor") ?
		parameters["borderColor"] : { r:0, g:0, b:0, a:1.0 };
	
	var backgroundColor = parameters.hasOwnProperty("backgroundColor") ?
		parameters["backgroundColor"] : { r:255, g:255, b:255, a:1.0 };

		
	var canvas = document.createElement('canvas');
	var context = canvas.getContext('2d');
	context.font = "Bold " + fontsize + "px " + fontface;
    
	// get size data (height depends only on font size)
	var metrics = context.measureText( message );
	var textWidth = metrics.width;
	
	// background color
	context.fillStyle   = "rgba(" + backgroundColor.r + "," + backgroundColor.g + ","
								  + backgroundColor.b + "," + backgroundColor.a + ")";
	// border color
	context.strokeStyle = "rgba(" + borderColor.r + "," + borderColor.g + ","
								  + borderColor.b + "," + borderColor.a + ")";

	context.lineWidth = borderThickness;
	roundRect(context, borderThickness/2, borderThickness/2, textWidth + borderThickness, fontsize * 1.4 + borderThickness, 6);
	// 1.4 is extra height factor for text below baseline: g,j,p,q.
	
	// text color
	context.fillStyle = "rgba(0, 0, 0, 1.0)";

	context.fillText( message, borderThickness, fontsize + borderThickness);
	
	// canvas contents will be used for a texture
	var texture = new THREE.Texture(canvas) 
	texture.needsUpdate = true;

	var spriteMaterial = new THREE.SpriteMaterial( 
		{ map: texture, useScreenCoordinates: false} );
	var sprite = new THREE.Sprite( spriteMaterial );
	sprite.scale.set(100,50,1.0);
	return sprite;	
}

// function for drawing rounded rectangles
function roundRect(ctx, x, y, w, h, r) 
{
    ctx.beginPath();
    ctx.moveTo(x+r, y);
    ctx.lineTo(x+w-r, y);
    ctx.quadraticCurveTo(x+w, y, x+w, y+r);
    ctx.lineTo(x+w, y+h-r);
    ctx.quadraticCurveTo(x+w, y+h, x+w-r, y+h);
    ctx.lineTo(x+r, y+h);
    ctx.quadraticCurveTo(x, y+h, x, y+h-r);
    ctx.lineTo(x, y+r);
    ctx.quadraticCurveTo(x, y, x+r, y);
    ctx.closePath();
    ctx.fill();
	ctx.stroke();   
}

var seznam_objektov = [];

var spritey2 = makeTextSprite( " Razumljivo! ", 
	{
		fontsize: 24,
		borderColor: {r:255, g:0, b:0, a:1.0},
		backgroundColor: {r:255, g:100, b:100, a:0.8}
	} );
	spritey2.position.set(-80,105,55);
	//scene.add( spritey2 );
	seznam_objektov[0] = spritey2;

var temperatura = 21.4;
var interval = 5;

function loadTemperatura()
{
	$.ajax({
	type: "GET",
	url: "includes/ajax/load_temperatura.php",
	data: {}
	})
	.done(function(msg) {
		temperatura = msg;
		//console.log(msg);
	});
}

update_text = function()
{
	seznam_objektov.forEach(function(entry) { // zbriši vse
		scene.remove(entry);
	});

	delete seznam_objektov[1];
	seznam_objektov[1] = (makeTextSprite(temperatura + "°C", 
	{
		fontsize: 32,
		fontface: "Georgia",
		borderColor: {r:0, g:0, b:255, a:1.0}
	}));
	seznam_objektov[1].position.set(40,105,5);

	seznam_objektov.forEach(function(entry) { // dodaj vse
    	scene.add(entry);
	});

	//console.log(redner_iteration/60);
	if(redner_iteration%(60*5)===0)
		loadTemperatura();
}

