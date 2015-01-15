//VIDEO
//var keyboard = new THREEx.KeyboardState();
// custom global variables
var videoImage, videoImageContext, videoTexture;
var controls;

/*
function init_video(){

	// create the video element
	video = document.createElement( 'video' );
	// video.id = 'video';
	// video.type = ' video/ogg; codecs="theora, vorbis" ';
	video.src = "videos/Pancakes.mp4";
	video.load(); // must call after setting/changing source
	video.play();

	videoImage = document.createElement( 'canvas' );
	videoImage.width = 480;
	videoImage.height = 204;

	videoImageContext = videoImage.getContext( '2d' );
	// background color if no video present
	videoImageContext.fillStyle = '#000000';
	videoImageContext.fillRect( 0, 0, videoImage.width, videoImage.height );

	videoTexture = new THREE.Texture( videoImage );
	videoTexture.minFilter = THREE.LinearFilter;
	videoTexture.magFilter = THREE.LinearFilter;
	
	var movieMaterial = new THREE.MeshBasicMaterial( { map: videoTexture, overdraw: true, side:THREE.DoubleSide } );
	// the geometry on which the movie will be displayed;
	// 		movie image will be scaled to fit these dimensions.
	var movieGeometry = new THREE.PlaneBufferGeometry( 200, 100, 4, 4 );
	var movieScreen = new THREE.Mesh( movieGeometry, movieMaterial );
	movieScreen.position.set(240,125,0);
	movieScreen.rotation.y=Math.PI/2;
	scene.add(movieScreen);
	
}

function animate() 
{
    requestAnimationFrame( animate );
	render();		
}


$('body').bind('keypress', function(e) {
	if (e.keyCode==32) //space
	{
		if(!video.paused)
			video.pause();
		else
			video.play();
	}
	if (e.keyCode==112) //p
	{
		video.play();
	}
	if (e.keyCode==115) //s
	{
		video.pause();
		video.currentTime = 0;
	}
});

animate();
init_video();
*/