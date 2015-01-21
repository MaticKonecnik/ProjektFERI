var loader = new THREE.JSONLoader();
var oLoader = new THREE.OBJMTLLoader();

//štedilnik
loader.load( "models/cooker.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	//mesh.scale.multiplyScalar(90);
	mesh.scale.set(100, 90, 90);
	mesh.rotation.y = Math.PI / 2;
	mesh.translateX(-202);
	mesh.translateZ(-111);
	scene.add( mesh );
	obstacles.push(mesh);
} );


//regal in umivalnik
loader.load( "models/Regal_umivalnik.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar( 100 );
	mesh.rotation.y = Math.PI / 2;
	mesh.translateX(-200);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//miza
loader.load( "models/KitchenTable.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.set(60, 70, 90);
	//mesh.rotation.y = Math.PI / 2;
	mesh.translateX(120);
	mesh.castShadow = true;
	scene.add( mesh );
	obstacles.push(mesh);
} );

//stol
loader.load( "models/Chair.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(100);
	mesh.rotation.y = Math.PI / 2;
	mesh.translateX(-40);
	mesh.translateZ(100);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//stol
loader.load( "models/Chair.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(100);
	mesh.rotation.y = Math.PI / 2;
	mesh.translateX(-40);
	mesh.translateZ(150);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//stol
loader.load( "models/Chair.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(100);
	mesh.rotation.y = 3 * Math.PI / 2;
	mesh.translateX(-30);
	mesh.translateZ(-140);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//stol
loader.load( "models/Chair.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(100);
	mesh.rotation.y = 3 * Math.PI / 2;
	mesh.translateX(-30);
	mesh.translateZ(-90);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//mikrovalovna
loader.load( "models/mikrovalna.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.rotation.y = Math.PI;
	mesh.position.y = 76;
	mesh.translateZ(-190);
	mesh.translateX(34);	
	scene.add( mesh );
	obstacles.push(mesh);
	
} );

//pizza
loader.load( "models/pizza.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(2);
	mesh.position.y = 55;
	mesh.translateX(118);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//hladilnik (Unutarnja strana)
loader.load( "models/FridgeInterier.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.rotation.y = Math.PI;
	mesh.scale.multiplyScalar(90);
	mesh.position.y = 0;
	mesh.translateX(-110);
	mesh.translateZ(-202);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//Hladilnikova vrata 
loader.load( "models/FridgeDoor.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.rotation.y = Math.PI;
	mesh.scale.multiplyScalar(90);
	mesh.position.y = 0;
	mesh.translateX(-110);
	mesh.translateZ(-202);
	mesh.name = "VrataFridgeZatvorena";
	scene.add( mesh );
	obstacles.push(mesh);
	//Dodamo v target list
	targetList.push(mesh);
} );

//pribor
loader.load( "models/DinnerWare.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.set(25, 1, 30);
	mesh.position.y = 52;
	mesh.translateX(164);
	mesh.translateZ(8);
	scene.add( mesh );
} );


//sadje
loader.load( "models/Ingredients/sadje.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.rotation.y = Math.PI;
	mesh.scale.multiplyScalar(120);
	mesh.position.y = 80;
	mesh.translateX(220);
	mesh.translateZ(-130);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//omare
loader.load( "models/Kuhinja/kuhinja2.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.rotation.y = Math.PI *0.5;
	//mesh.scale.set(50, 75, 80);
	//mesh.scale.multiplyScalar(50);
	mesh.scale.set(45,65,40);
	mesh.position.x = -230;
	mesh.position.z = 60;
	mesh.position.y = 95;
	scene.add( mesh );
	obstacles.push(mesh);
} );


//Cajnik
loader.load( "models/cajnik.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.rotation.y = Math.PI *0.5;
	mesh.scale.multiplyScalar(10);
	mesh.rotation.y = Math.PI;
	mesh.position.x = -126;
	mesh.position.z = 234;
	mesh.position.y = 57;
	scene.add( mesh );
	obstacles.push(mesh);
	
} );

// prepare loader and load the model
//THREE.Loader.Handlers.add( /\.dds$/i, new THREE.DDSLoader() );
/*
oLoader.load('models/InteraktivnaPloca/desk/Plocica.obj', 'models/InteraktivnaPloca/desk/Plocica.mtl', function(object, materials) {
	var mesh = new THREE.Mesh( object, new THREE.MeshFaceMaterial( material ) );
	var material = new THREE.MeshFaceMaterial(materials);
	//var material2 = new THREE.MeshLambertMaterial({ color: 0xa65e00 });
	object.traverse( function(child) {
		if (child instanceof THREE.Mesh) {
			// apply custom material
			//child.material = material2;
			// enable casting shadows
		}
	});
	
	object.rotation.y = Math.PI * 1;
	object.scale.multiplyScalar(0.4);
	
	object.position.z = 170;
	object.position.x = 0;
	object.position.y = 80;
	
	scene.add(object);	
});
*/


loader.load( "models/Tablet.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(50);
	mesh.rotation.y = Math.PI * 0.5;
	mesh.position.x = - 170.8;
	mesh.position.z = 244.5;
	mesh.position.y = 100;
	mesh.name = "Tablet";
	targetList.push(mesh);
	
	scene.add( mesh );
} );

oLoader.load('models/Window2.obj', 'models/Window2.mtl', function(object, materials) {
	var mesh = new THREE.Mesh( object, new THREE.MeshFaceMaterial( material ) );
	var material = new THREE.MeshFaceMaterial(materials);
	//var material2 = new THREE.MeshLambertMaterial({ color: 0xa65e00 });
	
	object.traverse( function(child) {
		if (child instanceof THREE.Mesh) {
			// apply custom material
			//child.material = material2;
			// enable casting shadows
		}
	});
	object.rotation.y = Math.PI * 0.5;
	object.scale.multiplyScalar(15);
	object.position.x = -110;
	object.position.y = 100;
	object.position.z = 275;

		
	scene.add(object);	
	
});

oLoader.load('models/puerta_yafaray_door.obj', 'models/puerta_yafaray_door.mtl', function(object, materials) {
	var mesh = new THREE.Mesh( object, new THREE.MeshFaceMaterial( material ) );
	var material = new THREE.MeshFaceMaterial(materials);
	//var material2 = new THREE.MeshLambertMaterial({ color: 0xa65e00 });
	
	object.traverse( function(child) {
		if (child instanceof THREE.Mesh) {
			// apply custom material
			//child.material = material2;
			// enable casting shadows
		}
	});
	object.scale.x = 2;
	object.scale.multiplyScalar(80);
	object.rotation.y = Math.PI * 1.5;
	object.position.x = -275;
	object.position.y = 0;
	object.position.z = -120;
	
	scene.add(object);	
});

oLoader.load('models/Mirror.obj', 'models/Mirror.mtl', function(object, materials) {
	var mesh = new THREE.Mesh( object, new THREE.MeshFaceMaterial( material ) );
	var material = new THREE.MeshFaceMaterial(materials);
	//var material2 = new THREE.MeshLambertMaterial({ color: 0xa65e00 });
	
	object.traverse( function(child) {
		if (child instanceof THREE.Mesh) {
			// apply custom material
			//child.material = material2;
			// enable casting shadows
		}
	});
	object.scale.x = 1.2;
	object.scale.y = 2;
	object.scale.z = 1.9;
	object.scale.multiplyScalar(10);
	
	object.rotation.y = Math.PI;
	object.position.x = 195;
	object.position.y = 100;
	object.position.z = 250;
	
	
	scene.add(object);	
});


oLoader.load('models/Sconce.obj', 'models/Sconce.mtl', function(object, materials) {
	var mesh = new THREE.Mesh( object, new THREE.MeshFaceMaterial( material ) );
	var material = new THREE.MeshFaceMaterial(materials);
	//var material2 = new THREE.MeshLambertMaterial({ color: 0xa65e00 });
	
	object.traverse( function(child) {
		if (child instanceof THREE.Mesh) {
			// apply custom material
			//child.material = material2;
			// enable casting shadows
		}
	});
	object.scale.multiplyScalar(10);
	
	object.position.x = -235;
	object.position.y = 175;
	object.position.z = -200;
	
	scene.add(object);	
});

oLoader.load('models/GasStove.obj', 'models/GasStove.mtl', function(object, materials) {
	var mesh = new THREE.Mesh( object, new THREE.MeshFaceMaterial( material ) );
	var material = new THREE.MeshFaceMaterial(materials);
	//var material2 = new THREE.MeshLambertMaterial({ color: 0xa65e00 });
	
	object.traverse( function(child) {
		if (child instanceof THREE.Mesh) {
			// apply custom material
			//child.material = material2;
			// enable casting shadows
		}
	});
	object.scale.multiplyScalar(6);
	object.rotation.y = Math.PI;
	object.position.x = -230;
	object.position.y = 65;
	object.position.z = 60;
	
	scene.add(object);	
});


loader.load( "models/Switcher.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(50);
	mesh.position.x = -240;
	mesh.position.y =  60;
	mesh.position.z = -50;
	mesh.name = "Sklopka";
	
	scene.add( mesh );
	targetList.push(mesh);
	
} );

/*//TragetList
-Hladilnikova Vrata
-Sklopka
*/
