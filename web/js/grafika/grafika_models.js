var loader = new THREE.JSONLoader();
var texture = new THREE.Texture();
var manager = new THREE.LoadingManager();
var objLoader = new THREE.OBJLoader( manager );

//štedilnik
loader.load( "models/cooker.json", function ( geometry, materials ) {
	var mesh = new THREE.Mesh( geometry, new THREE.MeshFaceMaterial( materials ) );
	mesh.scale.multiplyScalar( 100 );
	mesh.rotation.y = Math.PI / 2;
	mesh.translateX(-100);
	scene.add( mesh );
	obstacles.push(mesh);
} );

objLoader.load( "models/Country-Kitchen.obj", function ( object ) {
	object.traverse( function ( child ) {
		if ( child instanceof THREE.Mesh ) {
			child.material.map = texture;
		}
	} );
	object.position.y = - 80;
	scene.add( object );
}, onProgress, onError );