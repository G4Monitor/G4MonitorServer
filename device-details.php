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
		<script src="./js/device-details.js"></script>
		<script src="./js/konamiCode.js"></script>
		<script>
			$(document).ready(function() {
				$('#RAMKonami').hide();
				$(document).foundation();
			});
  		</script>
	</head>

	<body>
		<div id="container">
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

			<div data-equalizer>
				<div class="large-3 columns">
					<form>
						<div class="row panel" data-equalizer-watch>
							<div class="large-12 columns">
								<h1 class="text-center"><i class="fi-monitor"></i></h1>
								<h4 class="text-center subheader"><span id="hostName"></span></h4>
								<hr/>
								<div class="large-6 columns">
									<strong>IP Address :</strong><br/>
									<span id="ipAddress"></span>
								</div>
								<div class="large-6 columns">
									<strong>Start date :</strong><br/>
									<span id="uptimeStartDate"></span>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="large-3 columns" >
					<div class="row panel" data-equalizer-watch>
						<h5 class="text-center">Operating System</h5>
						<hr/>
						<div class="large-4 columns">
							<img src="./img/logo_windows.png" />
						</div>
						<div class="large-8 columns">
							<strong><span id="osName"></span></strong><br/>
							Version <span id="osVersion">
						</div>
					</div>
				</div>
				<div class="large-3 columns" >
					<div class="row panel" data-equalizer-watch>
						<h5 class="text-center">Random Access Memory</h5>
						<hr/>
						<div class="large-9 columns">
							<div class="progress large-12">
								<span id="percentUsedRAMBar" class="meter" style="width: 0.0%"></span>
							</div>
						</div>
						<div class="large-3 columns">
							<span id="percentUsedRAM">0.0</span> %
						</div>
						<div class="row">
							<div class="large-12 columns text-center">
								<span id="usedRAM">0.0</span> Go / <span id="totalRAM">0.0</span> Go
							</div>
						</div>
					</div>
				</div>
				<div class="large-3 columns" >
					<div class="row panel" data-equalizer-watch>
						<h5 class="text-center">Processor</h5>
						<hr/>
						<div class="large-12 columns">
							<strong>Type :</strong><br/><span id="processeur"></span><br/>
							<strong>Cores :</strong><br/><span id="availableProcessors"></span><br/>
						</div>
					</div>
				</div>
			</div>
			<div data-equalizer>
				<div class="large-3 columns" data-equalizer-watch>
					<div class="row panel" >
						<h5 class="text-center">Network interface configuration</h5>
						<hr/>
						<div class="large-6 columns">
							<strong>IP Address :</strong><br/>
							<span id="ipAddressNetwork"></span>
						</div>
						<div class="large-6 columns">
							<strong>MAC Address :</strong><br/>
							<span id="macAddress"></span>
						</div>
						<div class="large-6 columns">
							<strong>Netmask :</strong><br/>
							<span id="netmask"></span>
						</div>
						<div class="large-6 columns">
							<strong>Default gateway :</strong><br/>
							<span id="defaultGateway"></span>
						</div>
						<div class="large-6 columns">
							<strong>Primary DNS :</strong><br/>
							<span id="primaryDNS"></span>
						</div>
						<div class="large-6 columns">
							<strong>Secondary DNS :</strong><br/>
							<span id="secondaryDNS"></span>
						</div>
					</div>
				</div>
				<div class="large-6 columns" data-equalizer-watch>
					<div class="row panel" >
						<h5 class="text-center">Disk space usage</h5>
						<hr/>
						<div class="large-12 columns">
							<table class="large-12">
								<thead>
									<tr>
										<th>Disk name</th>
										<th>Type / Format</th>
										<th>Used space</th>
										<th>Details</th>
									</tr>
								</thead>
								<tbody id="listDisk">

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="large-3 columns" data-equalizer-watch>
					<div class="row panel" >
						<h5 class="text-center">Threads</h5>
						<hr/>
						<div class="large-12 columns">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="RAMKonami" class="large-3 columns" >
			<div class="row panel" data-equalizer-watch>
				<h4 id="RAMKonamiTitle" class="text-center">Daft Punk</h4>
				<h5 class="text-center">Random Access Memory</h5>
				<hr/>
				<div id="RAMKonamiPlayParent" class="large-1 large-offset-2 columns" style="display: none;">
					<a href="#" id="RAMKonamiPlay" class="button tiny"><i class="fi-play"></i></a>
				</div>
				<div id="RAMKonamiPauseParent" class="large-1 large-offset-2 columns">
					<a href="#" id="RAMKonamiPause" class="button tiny"><i class="fi-pause"></i></a>
				</div>
				<div id="RAMKonamiProgressBarParent" class="large-6 columns">
					<div id="RAMKonamiProgressBarControl" class="progress large-12">
						<span id="RAMKonamiProgressBar" class="meter" style="width: 0.0%"></span>
					</div>
				</div>
				<div class="large-3 columns">
					<span id="RAMKonamiPercentPlayed">0</span> %
				</div>
				<div class="row">
					<div id="RAMKonamiReal" class="large-12 columns text-center">
						9.12 Go / 15.89 Go
					</div>
					<div class="large-12 columns text-center">
						<span id="RAMKonamiTime"></span> / <span id="RAMKonamiDuration"></span>
					</div>
				</div>
				<audio id="audioPlayer" ontimeupdate="update(this)"></audio>
			</div>
		</div>

		<div class="row">
			<div class="large-12 text-right">
				<a href="disconnect.php" class="button"> Log out </a>
			</div>	
		</div>

	</body>
</html>