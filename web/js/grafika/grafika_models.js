var loader = new THREE.JSONLoader();

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
	mesh.translateX(80);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//stol
loader.load( "models/Chair.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(100);
	mesh.rotation.y = Math.PI / 2;
	mesh.translateX(-40);
	mesh.translateZ(60);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//stol
loader.load( "models/Chair.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(100);
	mesh.rotation.y = Math.PI / 2;
	mesh.translateX(-40);
	mesh.translateZ(110);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//stol
loader.load( "models/Chair.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(100);
	mesh.rotation.y = 3 * Math.PI / 2;
	mesh.translateX(-30);
	mesh.translateZ(-100);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//stol
loader.load( "models/Chair.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar(100);
	mesh.rotation.y = 3 * Math.PI / 2;
	mesh.translateX(-30);
	mesh.translateZ(-50);
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


/*// prepare loader and load the model
THREE.Loader.Handlers.add( /\.dds$/i, new THREE.DDSLoader() );
var oLoader = new THREE.OBJMTLLoader();
oLoader.load('models/CountryKitchen/Country-Kitchen.obj', 'models/CountryKitchen/Country-Kitchen.mtl', function(object, materials) {
	// var material = new THREE.MeshFaceMaterial(materials);
	var material2 = new THREE.MeshLambertMaterial({ color: 0xa65e00 });
	object.traverse( function(child) {
		if (child instanceof THREE.Mesh) {
			// apply custom material
			child.material = material2;
			// enable casting shadows
			child.castShadow = true;
			child.receiveShadow = true;
		}
	});
	object.scale.multiplyScalar(100);
	scene.add(object);
	obstacles.push(object);
});*/