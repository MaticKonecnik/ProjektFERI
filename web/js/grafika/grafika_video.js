//VIDEO
//var keyboard = new THREEx.KeyboardState();
// custom global variables
var videoImage, videoImageContext, videoTexture;
var controls;


function init_video(){
	 
	/*var video =  document.createElement("video");
	var source = document.createElement("source"); 
	source.type = "video/mp4";
	source.src = "videos/mov_bbb.mp4";
	video.appendChild(source);
	video.width	= 320;
	video.height= 240;
	video.load();
	video.play();

	// find out which file formats i can read
	var canPlayMp4	= document.createElement('video').canPlayType('video/mp4') !== '' ? true : false
	var canPlayOgg	= document.createElement('video').canPlayType('video/ogg') !== '' ? true : false
	if( canPlayMp4 ){
		var url	= 'videos/mov_bbb.mp4'
	}else alert('cant play mp4')

	/*	// create the videoTexture
	var videoTexture= new THREEx.VideoTexture(url)
	var video	= videoTexture.video
	updateFcts.push(function(delta, now){
		videoTexture.update(delta, now)
	})

	var material	= new THREE.MeshBasicMaterial({
		map	: videoTexture.texture
	});
	
	var movieGeometry = new THREE.PlaneBufferGeometry( 200, 100, 4, 4 );
	var movieScreen = new THREE.Mesh( movieGeometry, material );
	movieScreen.position.set(240,125,0);
	
	movieScreen.rotation.y=Math.PI/3;	
	scene.add(movieScreen);*/

	// create the videoTexture
	/*var videoTexture= new THREEx.VideoTexture(url)
	var video	= videoTexture.video
	updateFcts.push(function(delta, now){
		videoTexture.update(delta, now)
	})
		console.log(video);
	
	// use the texture in a THREE.Mesh
	var geometry	= new THREE.CubeGeometry(1,1,1);
	var material	= new THREE.MeshBasicMaterial({
		map	: videoTexture.texture
	});
	var mesh	= new THREE.Mesh( geometry, material );
	scene.add( mesh );
	updateFcts.push(function(delta, now){
		mesh.rotation.x += 1 * delta;
		mesh.rotation.y += 2 * delta;		
	})
	console.log(video);
	video.play();*/

	// create the video element
	video = document.createElement( 'video' );
	// video.id = 'video';
	// video.type = ' video/ogg; codecs="theora, vorbis" ';
<<<<<<< HEAD
	video.src = "videos/mov_bbb.mp4";
=======
	video.src = "videos/Pancakes.mp4";
>>>>>>> 2a38ea2d13c18fd2828da618e24d79e79c66e27d
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
