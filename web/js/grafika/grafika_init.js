

// SCENE
	scene = new THREE.Scene(),
	renderer = new THREE.WebGLRenderer( { alpha: true, antialias:true } );
	renderer.setSize( $("#canvas_wrapper").width(), $("#canvas_wrapper").height());
	$("#canvas_wrapper").append(renderer.domElement);

// CAMERA

	//To Testirati
	var SCREEN_WIDTH = window.innerWidth, SCREEN_HEIGHT = window.innerHeight;
	VIEW_ANGLE = 60,
	ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT,
	NEAR = 0.1,
	FAR = 15000;
	camera = new THREE.PerspectiveCamera(VIEW_ANGLE, ASPECT, NEAR, FAR);
	cameraClone = camera.clone();
	camera.position.set(0,200,-600);
	camera.up.set(0, 1, 0);
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
	//scene.add( axes );

// STATS
	var stats = new Stats();
	stats.domElement.style.position = 'absolute';
	stats.domElement.style.bottom = '0px';
	stats.domElement.style.zIndex = 100;
	$("#canvas_wrapper").append(stats.domElement);

// LIGHT	
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
	//scene.add( lightbulb );
	
	
	//POINT LIGHT
	var pointLight = new THREE.PointLight( 0xffffff, 1.475 );
	pointLight.position.set( 100, 200, -100 );
	scene.add( pointLight );
	pointLight.intensity = 1;
	//small sphere show pointLight
	var lightbulb = new THREE.Mesh( 
		new THREE.SphereGeometry( 10, 16, 8 ), 
		new THREE.MeshBasicMaterial( { color: 0xffaa00 } )
	);
	lightbulb.position.x = pointLight.position.x;
	lightbulb.position.y = pointLight.position.y;
	lightbulb.position.z = pointLight.position.z;
	//scene.add( lightbulb );
	

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
	var cubeGeom = new THREE.BoxGeometry(90, 100, 10, 1, 1, 1);
	mirrorCubeCamera = new THREE.CubeCamera( 0.1, 512, 252 );
	//mirrorCubeCamera.renderTarget.minFilter = THREE.LinearMipMapLinearFilter;
	scene.add( mirrorCubeCamera );
	var mirrorCubeMaterial = new THREE.MeshBasicMaterial( { envMap: mirrorCubeCamera.renderTarget } );
	mirrorCube = new THREE.Mesh( cubeGeom, mirrorCubeMaterial );
	mirrorCube.position.set(195, 100, 250);
	mirrorCubeCamera.position.x = mirrorCube.position.x;
	mirrorCubeCamera.position.y = mirrorCube.position.y;
	mirrorCubeCamera.position.z = mirrorCube.position.z;
	scene.add(mirrorCube);	
	
//CSS3D HTML Renders
	var planeMaterial   = new THREE.MeshBasicMaterial({color: 0x000000, opacity: 0.001, side: THREE.DoubleSide });
	var planeWidth = 32;
    var planeHeight = 18;
	var planeGeometry = new THREE.PlaneGeometry( planeWidth, planeHeight );
	var planeMesh= new THREE.Mesh( planeGeometry, planeMaterial );
	planeMesh.position.x += planeHeight/2 - 179;
	planeMesh.position.y += planeHeight/2 + 95.7;
	planeMesh.position.z = 242;
	planeMesh.rotation.y = Math.PI;
	planeMesh.rotation.x = 0.4;
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
	cssObject.position.x = planeMesh.position.x;
	cssObject.position.y = planeMesh.position.y;
	cssObject.position.z = planeMesh.position.z;
	//Rotation
	cssObject.rotation.x = planeMesh.rotation.x;
	cssObject.rotation.y = planeMesh.rotation.y;
	cssObject.rotation.z = planeMesh.rotation.z;
	
	// resize cssObject to same size as planeMesh (plus a border)
	var percentBorder = 0.0;
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


//HTML Mixer
	
	//create THREEx.HtmlMixer	
	var mixerContext= new THREEx.HtmlMixer.Context(renderer, scene, camera)
	// set up rendererCss
	var rendererCss		= mixerContext.rendererCss;
	rendererCss.setSize( window.innerWidth, window.innerHeight )
	// set up rendererWebgl
	var rendererWebgl	= mixerContext.rendererWebgl
	
	var webglCanvas			= rendererWebgl.domElement
	webglCanvas.style.position	= 'absolute'
	webglCanvas.style.top		= '0px'
	webglCanvas.style.width		= '50%'
	webglCanvas.style.height	= '100%'
	webglCanvas.style.pointerEvents	= 'none'
	//css3dElement.appendChild( webglCanvas )
	
	
//SHADOW (TEST)
	// must enable shadows on the renderer 
	renderer.shadowMapEnabled = true;


	// spotlight #1 -- yellow, dark shadow
	var spotlight = new THREE.SpotLight(0xfffff0);
	spotlight.position.set(220,190,-200);
	//spotlight.shadowCameraVisible = true;
	spotlight.shadowDarkness = 0.2;
	spotlight.intensity = 1.4;
	// must enable shadow casting ability for the light
	spotlight.castShadow = true;
	scene.add(spotlight);
	
	var lightbulb = new THREE.Mesh( 
		new THREE.SphereGeometry( 10, 16, 8 ), 
		new THREE.MeshBasicMaterial( { color: 0xffaa00 } )
	);
	lightbulb.position.x = spotlight.position.x;
	lightbulb.position.y = spotlight.position.y;
	lightbulb.position.z = spotlight.position.z;
	//scene.add( lightbulb );
	
	
	/*// spotlight #3
	var spotlight3 = new THREE.SpotLight(0x8B0000);
	spotlight3.position.set(-220,190,-200);
	spotlight3.shadowCameraVisible = true;
	spotlight3.shadowDarkness = 0.3;
	spotlight3.intensity = 3;
	spotlight3.castShadow = true;
	//scene.add(spotlight3);
	
	// change the direction this spotlight is facing
	var lightTarget = new THREE.Object3D();
	lightTarget.position.set(0,10,-100);
	scene.add(lightTarget);
	spotlight3.target = lightTarget;
	
	
	var lightbulb = new THREE.Mesh( 
		new THREE.SphereGeometry( 10, 16, 8 ), 
		new THREE.MeshBasicMaterial( { color: 0xffaa00 } )
	);
	lightbulb.position.x = spotlight3.position.x;
	lightbulb.position.y = spotlight3.position.y;
	lightbulb.position.z = spotlight3.position.z;
	scene.add( lightbulb );
	*/
	
	//Interakcija Mis(objekti)
// initialize object to perform world/screen calculations
	projector = new THREE.Projector();
	
	// when the mouse moves, call the given function
	document.addEventListener( 'mousedown', onDocumentMouseDown, false );
	
	function onDocumentMouseDown( event ) 
	{
		var intersects;
		console.log("Klik");
		
		// update the mouse variable
		mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
		mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
		
		// find intersections
		// create a Ray with origin at the mouse position
		//   and direction into the scene (camera direction)
		var vector = new THREE.Vector3( mouse.x, mouse.y, 1 );
		projector.unprojectVector(vector, camera );
		var ray = new THREE.Raycaster( camera.position, vector.sub( camera.position ).normalize() );
		
		intersects = ray.intersectObjects( targetList );
		// if there is one (or more) intersections
		if ( intersects.length > 0 )
		{
			console.log(Object.keys(targetList));
			console.log("Hit @ " + toString( intersects[0].point ) );
			// Do stuff
			//Vrata Frizidera
			if(intersects[ 0 ].object.name == "VrataFridgeZatvorena")
			{
				intersects[ 0 ].object.rotation.y = Math.PI + 1.6;
				intersects[ 0 ].object.position.x += -12
				intersects[ 0 ].object.position.z += -39	
				intersects[ 0 ].object.name = "VrataFridgeOtvorena";
			}
			else if(intersects[ 0 ].object.name == "VrataFridgeOtvorena")
			{
				intersects[ 0 ].object.rotation.y = Math.PI;
				intersects[ 0 ].object.position.x += +12
				intersects[ 0 ].object.position.z += +39	
				intersects[ 0 ].object.name = "VrataFridgeZatvorena";
			}
			
			//Sklopka
			if(intersects[ 0 ].object.name == "Sklopka")
			{
				if(spotlight.intensity >= 1)
				{
					spotlight.intensity = 0;
					spotlight.shadowDarkness = 0;
				}
				else
				{
					spotlight.intensity = 1.4;
					spotlight.shadowDarkness = 0.2;
				}
			}
			if(intersects[ 0 ].object.name == "Tablet")
			{
				if(selectKamera == 0)
					selectKamera = 1;
				else
					selectKamera = 0;
			}
			
		}
		
	}
	
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
		
		
		/*//Camera (Chase)
		var relativeCameraOffset = new THREE.Vector3(0,100,-200);
		var cameraOffset = relativeCameraOffset.applyMatrix4( user.mesh.matrixWorld );

		camera.position.x = cameraOffset.x;
		camera.position.y = cameraOffset.y;
		camera.position.z = cameraOffset.z;
		camera.lookAt( user.mesh.position );
		*/
		
		
		if(selectKamera == 0)
		{
		
			camera.position.set(user.mesh.position.x, user.mesh.position.y + 128, user.mesh.position.z - 256);
			camera.fov = 60;
			camera.updateProjectionMatrix();
			camera.lookAt(user.mesh.position);
		}
		else if(selectKamera == 1)
		{	
			camera.lookAt( planeMesh.position );
			camera.fov = 2.5;
			camera.updateProjectionMatrix();
		}
		
		

	}
	redner_iteration++;
	if(redner_iteration%60===0) //vsako sekundo naredi
	{
		update_text();
	}
	
	//SelectCamera
		
	/*if(typeof video !== "undefined")
	if ( video.readyState === video.HAVE_ENOUGH_DATA ) 
	{
		videoImageContext.drawImage( video, 0, 0 );
		if ( videoTexture ) 
			videoTexture.needsUpdate = true;
	}*/
	
	//RENDER SCENE 
		//Render Reflection
		mirrorCube.visible = false;
		mirrorCubeCamera.updateCubeMap( renderer, scene );
		mirrorCube.visible = true;
	
		//Render Scene
		renderer.render( scene, camera );
		
		//Render cssScene
		rendererCSS.render( cssScene, camera );
		
		//Update
		controls.update();
		stats.update();
	
};

render();
FullScreenOn();

//************************************
//************************************
//************************************