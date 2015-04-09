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
			
			<img class="item" src="./img/logo_g4monitor_blanc.png" alt="G4Monitor" height="80%"/>
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

		</div>

				
		 
		<footer>
			<div class="footer">
				<div class="large-5 columns slogan">
					<h6 class="text-white"><i> " Do not lose sight of the priorities "</i></h6>
				</div>
				<div class="large-5 columns text-white">
					Copyright RO(B|MA)IN &copy;
				</div>
				<div class="large-2 columns">
					<a href="disconnect.php" class="log_out"> Log out </a>
				</div>
			<div>	
		</footer>
	</body>
</html>