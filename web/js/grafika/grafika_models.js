var loader = new THREE.JSONLoader();

//štedilnik
loader.load( "models/cooker.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar( 100 );
	mesh.rotation.y = - Math.PI / 2;
	mesh.translateX(-100);
	scene.add( mesh );

} );