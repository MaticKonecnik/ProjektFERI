$(document).ready(function() {

// SCENE
	var scene = new THREE.Scene(),
	renderer = new THREE.WebGLRenderer( { alpha: true } );
	renderer.setSize( $("#canvas_wrapper").width(), $("#canvas_wrapper").height());
	$("#canvas_wrapper").append(renderer.domElement);

// CAMERA
	var SCREEN_WIDTH = $("#canvas_wrapper").width(),
	SCREEN_HEIGHT = $("#canvas_wrapper").height(),
	VIEW_ANGLE = 45,
	ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT,
	NEAR = 0.1,
	FAR = 15000;
	camera = new THREE.PerspectiveCamera( VIEW_ANGLE, ASPECT, NEAR, FAR );
	scene.add(camera);
	camera.position.set(0,200,600);
	camera.lookAt(scene.position);

// CONTROLS
	controls = new THREE.OrbitControls( camera, renderer.domElement );

// STATS
	var stats = new Stats();
	$("#canvas_wrapper").append(stats.domElement);

// LIGHT
	var directionalLight = new THREE.DirectionalLight( 0xffffff, 1.475 );
	directionalLight.position.set( 100, 100, -100 );
	scene.add( directionalLight );

	var hemiLight = new THREE.HemisphereLight( 0xffffff, 0xffffff, 1.25 );
	hemiLight.color.setHSL( 0.6, 1, 0.75 );
	hemiLight.groundColor.setHSL( 0.1, 0.8, 0.7 );
	hemiLight.position.y = 500;
	scene.add( hemiLight );

// SKYDOME

	var vertexShader = document.getElementById( 'vertexShader' ).textContent;
	var fragmentShader = document.getElementById( 'fragmentShader' ).textContent;
	var uniforms = {
		topColor: 	 { type: "c", value: new THREE.Color( 0x0077ff ) },
		bottomColor: { type: "c", value: new THREE.Color( 0xffffff ) },
		offset:		 { type: "f", value: 400 },
		exponent:	 { type: "f", value: 0.6 }
	}
	uniforms.topColor.value.copy( hemiLight.color );

	//scene.fog.color.copy( uniforms.bottomColor.value );

	var skyGeo = new THREE.SphereGeometry( 4000, 32, 15 );
	var skyMat = new THREE.ShaderMaterial( {
		uniforms: uniforms,
		vertexShader: vertexShader,
		fragmentShader: fragmentShader,
		side: THREE.BackSide
	} );

	var sky = new THREE.Mesh( skyGeo, skyMat );
	scene.add( sky );


// FLOOR
	var floorTexture = new THREE.ImageUtils.loadTexture( 'images/Checkerboard.jpg' );
	floorTexture.wrapS = floorTexture.wrapT = THREE.RepeatWrapping; 
	floorTexture.repeat.set( 10, 10 );
	var floorMaterial = new THREE.MeshBasicMaterial( { map: floorTexture, side: THREE.DoubleSide } );
	var floorGeometry = new THREE.PlaneGeometry(1000, 1000, 10, 10);
	var floor = new THREE.Mesh(floorGeometry, floorMaterial);
	floor.position.y = 0;
	floor.rotation.x = Math.PI / 2;
	scene.add(floor);

// MODEL

	var loader = new THREE.JSONLoader();
	loader.load( "models/cooker.json", function ( geometry, materials ) {
		var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
		mesh.scale.multiplyScalar( 100 );
		mesh.translateY(-5);
		mesh.rotation.y = - Math.PI / 2;
		scene.add( mesh );
	} );
	loader.load( "models/Bar.json", function ( geometry, materials ) {
		var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
		mesh.scale.multiplyScalar( 100 );
		scene.add( mesh );
	} );

var render = function () {
	requestAnimationFrame( render );

	controls.update();
	stats.update();
	renderer.render(scene, camera);
};

render();
FullScreenOn();

// FullScreen

var fullscreen = false;
$("#canvas_wrapper").dblclick(function() {
	if(!fullscreen)
		FullScreenOn();
  	else
		FullScreenOff();
});

$(document).keyup(function(e) {
  if (e.keyCode == 27) // esc
  	FullScreenOff();
});

function FullScreenOn()
{
	fullscreen = true;
	$("#canvas_wrapper").css({
		position: 'fixed',
		width: '100%',
		height: '100%',
		left: '0px',
		top: '0px',
		background: 'lightblue'
	});
  	renderer.setSize( $("#canvas_wrapper").width(), $("#canvas_wrapper").height());
}
function FullScreenOff()
{
	fullscreen = false;
	$("#canvas_wrapper").css({
		position: '',
		width: '',
		height: '600px',
		left: '',
		top: '',
		background: ''
	});
  	renderer.setSize( $("#canvas_wrapper").width(), $("#canvas_wrapper").height());	
}

});