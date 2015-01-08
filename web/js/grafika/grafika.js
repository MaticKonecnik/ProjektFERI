// globalne spremeljivke
var scene, renderer;

$(document).ready(function() {
$.getScript('js/grafika/grafika_init.js', function() {
	
$.getScript('js/grafika/grafika_models.js', function() {});

var render = function () {
	requestAnimationFrame( render );

	controls.update();
	stats.update();
	renderer.render(scene, camera);
};

render();
FullScreenOn();
$.getScript('js/grafika/grafika_character.js', function() {}); //character


});
});