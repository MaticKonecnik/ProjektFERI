$(document).ready(function() {

// SCENE
	var scene = new THREE.Scene(),
	renderer = new THREE.WebGLRenderer();
	renderer.setSize( $("#canvas_wrapper").width(), $("#canvas_wrapper").height());
	$("#canvas_wrapper").append(renderer.domElement);

// CAMERA
	var SCREEN_WIDTH = $("#canvas_wrapper").width(),
	SCREEN_HEIGHT = $("#canvas_wrapper").height(),
	VIEW_ANGLE = 45,
	ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT,
	NEAR = 0.1,
	FAR = 1000;
	camera = new THREE.PerspectiveCamera( VIEW_ANGLE, ASPECT, NEAR, FAR);
	scene.add(camera);
	camera.position.set(0,150,400);
	camera.lookAt(scene.position);

// CONTROLS
	controls = new THREE.OrbitControls( camera, renderer.domElement );

// LIGHT
	var directionalLight = new THREE.DirectionalLight( 0xffffff, 1.475 );
	directionalLight.position.set( 100, 100, -100 );
	scene.add( directionalLight );

	var hemiLight = new THREE.HemisphereLight( 0xffffff, 0xffffff, 1.25 );
	hemiLight.color.setHSL( 0.6, 1, 0.75 );
	hemiLight.groundColor.setHSL( 0.1, 0.8, 0.7 );
	hemiLight.position.y = 500;
	scene.add( hemiLight );

// FLOOR
	var floorTexture = new THREE.ImageUtils.loadTexture( 'images/Checkerboard.jpg' );
	floorTexture.wrapS = floorTexture.wrapT = THREE.RepeatWrapping; 
	floorTexture.repeat.set( 10, 10 );
	var floorMaterial = new THREE.MeshBasicMaterial( { map: floorTexture, side: THREE.DoubleSide } );
	var floorGeometry = new THREE.PlaneGeometry(1000, 1000, 10, 10);
	var floor = new THREE.Mesh(floorGeometry, floorMaterial);
	floor.position.y = -0.5;
	floor.rotation.x = Math.PI / 2;
	scene.add(floor);

// cube
	var geometry = new THREE.BoxGeometry( 50, 50, 50 );
	var material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );
	var cube = new THREE.Mesh( geometry, material );
	cube.position.set(0,50,0);
	scene.add(cube);



var render = function () {
	requestAnimationFrame( render );

	cube.rotation.x += 0.1;
	cube.rotation.y += 0.1;

	controls.update();
	renderer.render(scene, camera);
};

render();

});