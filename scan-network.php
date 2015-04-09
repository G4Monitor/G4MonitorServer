<?php 
require "verif_if_logged.php";
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
	</head>

	<body>

		<div class="icon-bar six-up" style="height: 107px;">
			
			<img class="item" src="./img/logo_g4monitor_blanc.png" alt="G4Monitor" height="80%"/>
			<a class="item" href="index.php">
				<i class="fi-home"></i>
				<label>Home</label>
			</a>
			<a class="item active" href="scan-network.php">
				<i class="fi-eye"></i>
				<label>Scan network</label>
			</a>
			<a class="item" href="global-history.php">
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
		
		<div class="large-3 columns">
			<div class="panel">
					<div class="row">
						<div class="large-12 columns">
							<label>Current IP Address :
								<input id="currentIPAddress" type="text" placeholder="Example : 192.168.31.1" />
							</label>
							<button id="launchScanNetwork" class="button expand">Scan the network</button>
						</div>
					</div>
				<div class="row">
					<div id="loader">
						<div id="loaderBar" class="progress large-8 large-offset-1 columns">
							<span id="percentLoaded" style="width: 0%" class="meter"></span>
						</div>
						<div class="large-3 columns">
							<span id="percentLoadedNumber">0.0</span> %
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="large-9 columns">
			<div class="panel" id="devices" data-equalizer>
				<h3 class="text-center">No data found ?</h3> <br/>
				<h4 class="text-center">Try to make a scan of your network !<br/></h4>
				<h1 class="text-center"><i class="fi-arrow-left"></i></h1>
				
			</div>
		</div>

		<div class="row">
			<div class="large-12 text-right">
				<a href="disconnect.php" class="button"> Log out </a>
			</div>	
		</div> 

		<script src="./Foundation/js/vendor/modernizr.js"></script>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="./js/scan-network.js"></script>
	</body>
</html>