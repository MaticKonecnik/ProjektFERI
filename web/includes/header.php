<?php session_start(); ?>
<!doctype html>
<html>
<head>
<title>Projekt</title>
<meta charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<?php if(basename($_SERVER['PHP_SELF'])=="index.php") echo('<link rel="stylesheet" type="text/css" href="css/slider.css" />'."\n"); ?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
<?php if(basename($_SERVER['PHP_SELF'])=="index.php") echo('<script type="text/javascript" src="js/jquery.cslider.js"></script>'."\n"); ?>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div class="wrap">
	<div class="main"><!-- start main -->
    