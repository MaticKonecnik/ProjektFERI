var loader = new THREE.JSONLoader();

//štedilnik
loader.load( "models/cooker.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar( 100 );
	mesh.rotation.y = Math.PI / 2;
	mesh.translateX(-200);
	mesh.translateZ(-110);
	scene.add( mesh );
	obstacles.push(mesh);
} );

//regal in umivalnik
loader.load( "models/Kitchen1.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar( 100 );
	mesh.rotation.y = Math.PI / 2;
	mesh.translateX(-200);
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