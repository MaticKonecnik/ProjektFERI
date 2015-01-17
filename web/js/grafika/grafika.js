// custom global variables
var cssScene, scene, renderer, user, video, camera, raycaster, container, controls, stats;

var targetList = [];
var projector, mouse = { x: 0, y: 0 };

var mouse = new THREE.Vector2(), INTERSECTED;
var clock = new THREE.Clock();
var obstacles = [];
function update_text(){};

$(document).ready(function() {
$.getScript('js/grafika/grafika_init.js', function() {
	$.getScript('js/grafika/grafika_models.js', function() {});
	$.getScript('js/grafika/grafika_character.js', function() {});
	$.getScript('js/grafika/grafika_2D_text.js', function() {});
	$.getScript('js/grafika/grafika_video.js', function() {});
});
});