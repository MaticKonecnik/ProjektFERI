//VIDEO
var keyboard = new THREEx.KeyboardState();
// custom global variables
var video, videoImage, videoImageContext, videoTexture;

init();
function init(){
	video = document.createElement( 'video' );
	video.src = "https://www.youtube.com/watch?v=tf2HxCaKCB0";
	video.load(); // must call after setting/changing source
	video.play();
	
	videoImage = document.createElement( 'canvas' );
	videoImage.width = 480;
	videoImage.height = 204;
	
	videoImageContext = videoImage.getContext( '2d' );
	
	videoTexture = new THREE.Texture( videoImage );
	videoTexture.minFilter = THREE.LinearFilter;
	videoTexture.magFilter = THREE.LinearFilter;
	
	var movieMaterial = new THREE.MeshBasicMaterial( { map: videoTexture, overdraw: true, side:THREE.DoubleSide } );
	// the geometry on which the movie will be displayed;
	// 		movie image will be scaled to fit these dimensions.
	var movieGeometry = new THREE.PlaneGeometry( 240, 100, 4, 4 );
	var movieScreen = new THREE.Mesh( movieGeometry, movieMaterial );
	movieScreen.position.set(0,50,0);
	scene.add(movieScreen);
	
	
}