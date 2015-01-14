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
	mesh.translateX(120);
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

//hladilnik
loader.load( "models/hladilnik.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.rotation.y = Math.PI;
	mesh.scale.multiplyScalar(90);
	mesh.position.y = 35;
	mesh.translateX(-110);
	mesh.translateZ(-202);
	scene.add( mesh );
	obstacles.push(mesh);
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


//sofa
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

//Kuhinja2
loader.load( "models/Kuhinja/kuhinja2.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.rotation.y = Math.PI *0.5;
	//mesh.scale.set(50, 75, 80);
	//mesh.scale.multiplyScalar(50);
	mesh.scale.set(45,55,40);
	mesh.position.x = -230;
	mesh.position.z = 60;
	mesh.position.y = 85;
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