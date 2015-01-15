// create the plane mesh
var material = new THREE.MeshBasicMaterial({ wireframe: true });
var geometry = new THREE.PlaneGeometry();
var planeMesh= new THREE.Mesh( geometry, material );
//planeMesh.scale.multiplyScalar(100);
// add it to the WebGL scene
scene.add(planeMesh);


// create the dom Element
var element = document.createElement( 'img' );
element.src = 'models/leather_bump.jpg';
// create the object3d for this element
var cssObject = new THREE.CSS3DObject( element );
// we reference the same position and rotation 
cssObject.position = planeMesh.position;
cssObject.rotation = planeMesh.rotation;
// add it to the css scene
cssScene.add(cssObject);