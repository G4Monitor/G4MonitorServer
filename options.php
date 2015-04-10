<?php 
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>G4Monitor - Scan the network</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation-icons.css">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<link rel="icon" type="image/ico" href="favicon.png">
		<script src="./Foundation/js/vendor/modernizr.js"></script>
		<script src="./Foundation/js/vendor/jquery.js"></script>
		<script src="./Foundation/js/foundation/foundation.js"></script>
		<script src="./Foundation/js/foundation/foundation.equalizer.js"></script>
		<script>
			$(document).ready(function() {
				$(document).foundation();
			});
  		</script>
	</head>

	<body>

		<div class="icon-bar six-up" style="height: 107px;">
			
			<img class="item" src="./img/logo_g4monitor.png" alt="G4Monitor" height="80%"/>
			<a class="item" href="index.php">
				<i class="fi-home"></i>
				<label>Home</label>
			</a>
			<a class="item" href="scan-network.php">
				<i class="fi-eye"></i>
				<label>Scan network</label>
			</a>
			<a class="item " href="global-history.php">
				<i class="fi-graph-bar"></i>
				<label>Global history</label>
			</a>
			<a class="item active" href="options.php">
				<i class="fi-wrench"></i>
				<label>Options</label>
			</a>
			<a class="item" href="#">
				<i class="fi-info"></i>
				<label>Info</label>
			</a>
		</div>

		<div class="row">
			<div class="large-8">
				<?php 
				if(isset($_GET['modify']) && $_GET['modify'])
				{
				?>
					<div data-alert class="alert-box success radius">
					  Informations have been modified
					  <a href="#" class="close">&times;</a>
					</div>
				<?php
				} else if(isset($_GET['modify']) && !$_GET['modify'])
				{
				?>
					<div data-alert class="alert-box warning radius">
					  An error occured or fields were empty
					  <a href="#" class="close">&times;</a>
					</div>
				<?php
				}
				?>
			</div>
		</div>

		<div class="row">
			<h3 class="text-white">Change some informations</h3>
		</div>
		<br/>
		<div class="row">
			<div class="large-8">
				<form action="modify_info.php" method="POST">
					<label class="text-white text-center"> Login
						<input type="text" name="login">
					</label>
					<br/>
					<label class="text-white text-center"> Password
						<input type="text" name="password">
					</label>
					<br/>
					<label class="text-white text-center"> Add someone more to inform
						<input type="text" name="email">
					</label>
					<input class="button" type="submit" value="Update">
				<form>
			</div>
		</div>




		<footer class="footer">
		<div class="row text-right">

				<a href="disconnect.php" style="font-size: 1.5em;"> Log out </a>
		</div>
		</footer>


	</body>

</html>