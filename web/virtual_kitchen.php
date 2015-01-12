<?php
	include("includes/header.php");
	include("includes/menu.php");
?>
<script type="x-shader/x-vertex" id="vertexShader">
	varying vec3 vWorldPosition;

	void main() {
		vec4 worldPosition = modelMatrix * vec4( position, 1.0 );
		vWorldPosition = worldPosition.xyz;

		gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );
	}
</script>
<script type="x-shader/x-fragment" id="fragmentShader">
	uniform vec3 topColor;
	uniform vec3 bottomColor;
	uniform float offset;
	uniform float exponent;

	varying vec3 vWorldPosition;

	void main() {
		float h = normalize( vWorldPosition + offset ).y;
		gl_FragColor = vec4( mix( bottomColor, topColor, max( pow( max( h, 0.0 ), exponent ), 0.0 ) ), 1.0 );
	}
</script>
<div id="canvas_wrapper"></div>
<?php
	include("includes/footer.php");
?>