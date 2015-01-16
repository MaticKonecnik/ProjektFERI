// SCENE
	scene = new THREE.Scene(),
	renderer = new THREE.WebGLRenderer( { alpha: true } );
	renderer.setSize( $("#canvas_wrapper").width(), $("#canvas_wrapper").height());
	$("#canvas_wrapper").append(renderer.domElement);

// CAMERA
	var SCREEN_WIDTH = $("#canvas_wrapper").width(),
	SCREEN_HEIGHT = $("#canvas_wrapper").height(),
	VIEW_ANGLE = 60,
	ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT,
	NEAR = 0.1,
	FAR = 15000;
	camera = new THREE.PerspectiveCamera(VIEW_ANGLE, ASPECT, NEAR, FAR);
	cameraClone = camera.clone();
	camera.position.set(0,200,600);
	camera.up.set(0, 1, 0);
	scene.add(camera);
	camera.lookAt(scene.position);
	

// CONTROLS
	controls = new THREE.OrbitControls(cameraClone, renderer.domElement);

// STATS
	var stats = new Stats();
	$("#canvas_wrapper").append(stats.domElement);

// LIGHT
	var directionalLight = new THREE.DirectionalLight( 0xffffff, 1.475 );
	directionalLight.position.set( 100, 100, -100 );
	scene.add( directionalLight );

	var hemiLight = new THREE.HemisphereLight( 0xffffff, 0xffffff, 0.5 );
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

	
/*//Reflection (TEST)
	var mirrorCube, mirrorCubeCamera;
	var cubeGeom = new THREE.CubeGeometry(100, 10000, 1, 1, 1, 1);
	mirrorCubeCamera = new THREE.CubeCamera( 0.001, 5000, 512 );
	//mirrorCubeCamera.renderTarget.minFilter = THREE.LinearMipMapLinearFilter;
	scene.add( mirrorCubeCamera );
	var mirrorCubeMaterial = new THREE.MeshBasicMaterial( { envMap: mirrorCubeCamera.renderTarget } );
	mirrorCube = new THREE.Mesh( cubeGeom, mirrorCubeMaterial );
	mirrorCube.position.set(-50,100,240);
	mirrorCubeCamera.position = mirrorCube.position;
	scene.add(mirrorCube);		

	var mirrorSphere, mirrorSphereCamera; // for mirror material
	var sphereGeom =  new THREE.SphereGeometry( 50, 32, 16 ); // radius, segmentsWidth, segmentsHeight
	mirrorSphereCamera = new THREE.CubeCamera( 0.0000001, 5000, 512 );
	// mirrorCubeCamera.renderTarget.minFilter = THREE.LinearMipMapLinearFilter;
	scene.add( mirrorSphereCamera );
	var mirrorSphereMaterial = new THREE.MeshBasicMaterial( { envMap: mirrorSphereCamera.renderTarget } );
	mirrorSphere = new THREE.Mesh( sphereGeom, mirrorSphereMaterial );
	mirrorSphere.position.set(75,150,0);
	mirrorSphereCamera.position = mirrorSphere.position;
	scene.add(mirrorSphere);
*/

/*//SHADOW (TEST)
	// must enable shadows on the renderer 
	//renderer.shadowMapEnabled = true;


	/*
	// spotlight #1 -- yellow, dark shadow
	var spotlight = new THREE.SpotLight(0xfffff0);
	spotlight.position.set(-60,300,-50);
	spotlight.shadowCameraVisible = true;
	spotlight.shadowDarkness = 0.3;
	spotlight.intensity = 1.4;
	// must enable shadow casting ability for the light
	spotlight.castShadow = true;
	scene.add(spotlight);
	*/
	
	
	// spotlight #3
	/*
	var spotlight3 = new THREE.SpotLight(0x0000ff);
	spotlight3.position.set(0,500,-100);
	spotlight3.shadowCameraVisible = true;
	spotlight3.shadowDarkness = 0.5;
	spotlight3.intensity = 2;
	spotlight3.castShadow = true;
	scene.add(spotlight3);
	// change the direction this spotlight is facing
	var lightTarget = new THREE.Object3D();
	lightTarget.position.set(0,10,-100);
	scene.add(lightTarget);
	spotlight3.target = lightTarget;
	*/
	
	
// FLOOR
	var floorWidth = 500, floorHeight = 500;
	var floorTexture = new THREE.ImageUtils.loadTexture( 'images/Checkerboard.jpg' );
	floorTexture.wrapS = floorTexture.wrapT = THREE.RepeatWrapping; 
	floorTexture.repeat.set( 10, 10 );
	var floorMaterial = new THREE.MeshBasicMaterial( { map: floorTexture, side: THREE.DoubleSide } );
	var floorGeometry = new THREE.PlaneBufferGeometry(floorWidth, floorHeight);
	var floor = new THREE.Mesh(floorGeometry, floorMaterial);
	floor.position.y = 0;
	floor.rotation.x = Math.PI / 2;
	floor.receiveShadow = true;
	scene.add(floor);


//WALLS
	var height = 250;
	var wallTexture = new THREE.ImageUtils.loadTexture( 'images/Wall_texture.jpg' );
	wallTexture.wrapS = wallTexture.wrapT = THREE.RepeatWrapping; 
	wallTexture.repeat.set( 10, 2 );
	var wallMaterial = new THREE.MeshBasicMaterial( { map: wallTexture, side: THREE.DoubleSide } );
	var	walls_geometry =
		[
			new THREE.PlaneBufferGeometry(floorHeight, height),
			new THREE.PlaneBufferGeometry(floorWidth, height),
			new THREE.PlaneBufferGeometry(floorHeight, height),
			new THREE.PlaneBufferGeometry(floorWidth, height)
		];
	var walls = [];
	for (var i = 0; i < walls_geometry.length; ++i)
	{
		walls.push(new THREE.Mesh(walls_geometry[i], wallMaterial));
		walls[i].position.y = height / 2;
		scene.add(walls[i]);
		obstacles.push(walls[i]);
	}
	walls[0].rotation.y = -Math.PI / 2;
	walls[0].position.x = floorWidth / 2;
	walls[1].rotation.y = Math.PI;
	walls[1].position.z = floorHeight / 2;
	walls[2].rotation.y = Math.PI / 2;
	walls[2].position.x = -floorWidth / 2;
	walls[3].position.z = -floorHeight / 2;
	
	walls[3].material = walls[3].material.clone();
	walls[3].material.visible = false;

// FULLSCREEN
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

//************************************
//********** RENDER ******************
//************************************

var redner_iteration = 1;

var render = function () {
	requestAnimationFrame( render );
	controls.update();
	stats.update();
	renderer.render(scene, camera);
	if (typeof user !== 'undefined')
	{
		user.motion();
		camera.position.set(user.mesh.position.x, user.mesh.position.y + 128, user.mesh.position.z - 256);
        camera.lookAt(user.mesh.position);
	}
	redner_iteration++;
	if(redner_iteration%60===0) //vsako sekundo naredi
	{
		update_text();

	}
	
	/*//Reflection (TEST)
	mirrorCube.visible = true;
	mirrorCubeCamera.updateCubeMap( renderer, scene );
	mirrorCube.visible = true;
	
	mirrorSphere.visible = false;
	mirrorSphereCamera.updateCubeMap( renderer, scene );
	mirrorSphere.visible = true;
	
	renderer.render( scene, camera );
	*/
	
	/*if(typeof video !== "undefined")
	if ( video.readyState === video.HAVE_ENOUGH_DATA ) 
	{
		videoImageContext.drawImage( video, 0, 0 );
		if ( videoTexture ) 
			videoTexture.needsUpdate = true;
	}*/
};

render();
FullScreenOn();

//************************************
//************************************
//************************************