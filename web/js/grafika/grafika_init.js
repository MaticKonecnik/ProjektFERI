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
	camera.position.set(0,200,-600);
	//camera.up.set(0, 1, 0);
	scene.add(camera);
	//camera.lookAt(scene.position);
	
//Events
	//RESIZE RENDER
	THREEx.WindowResize(renderer, camera);
	//FULL SCREEN
	THREEx.FullScreen.bindKey({ charCode : 'm'.charCodeAt(0) });
	
// CONTROLS
	controls = new THREE.OrbitControls(camera, renderer.domElement);
	
// create a set of coordinate axes to help orient user
//    specify length in pixels in each direction
	var axes = new THREE.AxisHelper(400);
	scene.add( axes );

// STATS
	var stats = new Stats();
	stats.domElement.style.position = 'absolute';
	stats.domElement.style.bottom = '0px';
	stats.domElement.style.zIndex = 0;
	$("#canvas_wrapper").append(stats.domElement);

// LIGHT
	//DirectionalLight
	var directionalLight = new THREE.DirectionalLight( 0xffffff, 1.475 );
	directionalLight.position.set( 100, 100, -100 );
	//scene.add( directionalLight );
	//small sphere show DirectionalLight
	var lightbulb = new THREE.Mesh( 
		new THREE.SphereGeometry( 10, 16, 8 ), 
		new THREE.MeshBasicMaterial( { color: 0xffaa00 } )
	);
	lightbulb.position.x = directionalLight.position.x;
	lightbulb.position.y = directionalLight.position.y;
	lightbulb.position.z = directionalLight.position.z;
	scene.add( lightbulb );
		
	//HEMISPHERE LIGHT
	var hemiLight = new THREE.HemisphereLight( 0xffffff, 0xffffff, 0.5 );
	hemiLight.color.setHSL( 0.6, 1, 0.75 );
	hemiLight.groundColor.setHSL( 0.1, 0.8, 0.7 );
	hemiLight.position.y = 500;
	scene.add( hemiLight );	
	//small sphere show HemisphereLight
	var lightbulb = new THREE.Mesh( 
		new THREE.SphereGeometry( 10, 16, 8 ), 
		new THREE.MeshBasicMaterial( { color: 0xffaa00 } )
	);
	lightbulb.position.x = hemiLight.position.x;
	lightbulb.position.y = hemiLight.position.y;
	lightbulb.position.z = hemiLight.position.z;
	scene.add( lightbulb );
	
	
	//POINT LIGHT
	var pointLight = new THREE.PointLight( 0xffffff, 1.475 );
	pointLight.position.set( 100, 100, -100 );
	scene.add( pointLight );
	
	//small sphere show directionalLight
	var lightbulb = new THREE.Mesh( 
		new THREE.SphereGeometry( 10, 16, 8 ), 
		new THREE.MeshBasicMaterial( { color: 0xffaa00 } )
	);
	lightbulb.position.x = pointLight.position.x;
	lightbulb.position.y = pointLight.position.y;
	lightbulb.position.z = pointLight.position.z;
	scene.add( lightbulb );
	

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
	
	raycaster = new THREE.Raycaster();
	
//Reflection (TEST)
	var cubeGeom = new THREE.BoxGeometry(100, 100, 10, 1, 1, 1);
	mirrorCubeCamera = new THREE.CubeCamera( 0.1, 512, 252 );
	//mirrorCubeCamera.renderTarget.minFilter = THREE.LinearMipMapLinearFilter;
	scene.add( mirrorCubeCamera );
	var mirrorCubeMaterial = new THREE.MeshBasicMaterial( { envMap: mirrorCubeCamera.renderTarget } );
	mirrorCube = new THREE.Mesh( cubeGeom, mirrorCubeMaterial );
	mirrorCube.position.set(200, 100, 250);
	mirrorCubeCamera.position.x = mirrorCube.position.x;
	mirrorCubeCamera.position.y = mirrorCube.position.y;
	mirrorCubeCamera.position.z = mirrorCube.position.z;
	scene.add(mirrorCube);	

	
//Interakcija Mis(objekti)
// initialize object to perform world/screen calculations
	projector = new THREE.Projector();
	
	// when the mouse moves, call the given function
	document.addEventListener( 'mousedown', onDocumentMouseDown, false );
	
	function onDocumentMouseDown( event ) 
	{
		console.log("Klik");
		
		// update the mouse variable
		mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
		mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
		
		// find intersections
		console.log(Object.keys(targetList));
		
		// create a Ray with origin at the mouse position
		//   and direction into the scene (camera direction)
		var vector = new THREE.Vector3( mouse.x, mouse.y, 1 );
		projector.unprojectVector( vector, camera );
		var ray = new THREE.Raycaster( camera.position, vector.sub( camera.position ).normalize() );
		
		// create an array containing all objects in the scene with which the ray intersects
		var intersects = ray.intersectObjects( targetList );
		// if there is one (or more) intersections
		if ( intersects.length > 0 )
		{
			console.log("Hit @ " + toString( intersects[0].point ) );
			// Do stuff
			intersects[ 0 ].object.position.set(0,0,0);
		}
	}
	
//CSS3D HTML Renders
	var planeMaterial   = new THREE.MeshBasicMaterial({color: 0x000000, opacity: 0.001, side: THREE.DoubleSide });
	var planeWidth = 360;
    var planeHeight = 120;
	var planeGeometry = new THREE.PlaneGeometry( planeWidth, planeHeight );
	var planeMesh= new THREE.Mesh( planeGeometry, planeMaterial );
	planeMesh.position.x += planeHeight/2 + 188;
	planeMesh.position.y += planeHeight/2 + 100;
	planeMesh.rotation.y = Math.PI *0.5;
	// add it to the standard (WebGL) scene
	scene.add(planeMesh);
	
	
	// create a new scene to hold CSS
	cssScene = new THREE.Scene();
	// create the iframe to contain webpage
	var element	= document.createElement('iframe')
	// webpage to be loaded into iframe
	element.src	= "index.php";
	// width of iframe in pixels
	var elementWidth = 2024;
	// force iframe to have same relative dimensions as planeGeometry
	var aspectRatio = planeHeight / planeWidth;
	var elementHeight = elementWidth * aspectRatio;
	element.style.width  = elementWidth + "px";
	element.style.height = elementHeight + "px";
	
	var cssObject = new THREE.CSS3DObject( element );
	cssObject.position.x = planeMesh.position.x - 20;
	cssObject.position.y = planeMesh.position.y;
	cssObject.position.z = planeMesh.position.z;
	cssObject.rotation.y = Math.PI * 1.5;
	// resize cssObject to same size as planeMesh (plus a border)
	var percentBorder = 0.001;
	cssObject.scale.x /= (1 + percentBorder) * (elementWidth / planeWidth);
	cssObject.scale.y /= (1 + percentBorder) * (elementWidth / planeWidth);
	cssScene.add(cssObject);
	
	rendererCSS	= new THREE.CSS3DRenderer();
	rendererCSS.setSize( window.innerWidth, window.innerHeight );
	rendererCSS.domElement.style.position = 'absolute';
	rendererCSS.domElement.style.top	  = 0;
	rendererCSS.domElement.style.margin	  = 0;
	rendererCSS.domElement.style.padding  = 0;
	document.body.appendChild( rendererCSS.domElement );
	// when window resizes, also resize this renderer
	THREEx.WindowResize(rendererCSS, camera);
	
	renderer.domElement.style.position = 'absolute';
	renderer.domElement.style.top      = 0;
	// make sure original renderer appears on top of CSS renderer
	renderer.domElement.style.zIndex   = 1;
	rendererCSS.domElement.appendChild( renderer.domElement );
	
	
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
	//Animate
	requestAnimationFrame( render );
	
	
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
		
	/*if(typeof video !== "undefined")
	if ( video.readyState === video.HAVE_ENOUGH_DATA ) 
	{
		videoImageContext.drawImage( video, 0, 0 );
		if ( videoTexture ) 
			videoTexture.needsUpdate = true;
	}*/
	
	
	//RENDER SCENE 
	mirrorCube.visible = false;
	mirrorCubeCamera.updateCubeMap( renderer, scene );
	mirrorCube.visible = true;
	
	rendererCSS.render( cssScene, camera );
	renderer.render( scene, camera );
	controls.update();
	stats.update();
	
};

render();
FullScreenOn();

//************************************
//************************************
//************************************