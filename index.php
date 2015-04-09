<?php 
require "verif_if_logged.php";

?>
<!DOCTYPE html>
<html>
	<head>
		<title>G4Monitor - Homepage</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation-icons.css">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<link rel="icon" type="image/ico" href="favicon.png">
		<script src="./Foundation/js/vendor/modernizr.js"></script>
		<script src="./Foundation/js/vendor/jquery.js"></script>
		<script src="./Foundation/js/foundation/foundation.js"></script>
		<script src="./Foundation/js/foundation/foundation.equalizer.js"></script>
	</head>

	<body>

		<div class="icon-bar six-up" style="height: 107px;">
			
			<img class="item" src="./img/logo_g4monitor.png" alt="G4Monitor" height="80%"/>
			<a class="item active" href="index.php">
				<i class="fi-home"></i>
				<label>Home</label>
			</a>
			<a class="item" href="scan-network.php">
				<i class="fi-eye"></i>
				<label>Scan network</label>
			</a>
			<a class="item" href="#">
				<i class="fi-graph-bar"></i>
				<label>Global history</label>
			</a>
			<a class="item" href="#">
				<i class="fi-wrench"></i>
				<label>Options</label>
			</a>
			<a class="item" href="#">
				<i class="fi-info"></i>
				<label>Info</label>
			</a>
		</div>
	
		<div class="large-12 text-center">
			<h1 class="text-white">Welcome</h1>
			<h3 class="text-white">On G4Monitor</h3>

			<h4 class="text-white">Do not lose sight of the priorities</h4>
		</div>

		<div class="row">
			<div class="large-12 text-right">
				<a href="disconnect.php" class="button"> Log out </a>
			</div>	
		</div> 

	</body>
</html>