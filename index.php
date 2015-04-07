<!DOCTYPE html>
<html>
	<head>
		<title>G4Monitor - Homepage</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation-icons.css">
	</head>

	<body>

		<div class="row">
			<div class="large-12 columns">
				<h1 class="text-center">G4 Monitor</h1>
			</div>
		</div>

		<div class="row">
			<div class="large-2 large-offset-10 columns">
				<div id="refresh" class="panel text-center cursor-pointer">
					<h5>Refresh</h5>
					<h1 id="refreshLogo">
						<i class="fi-refresh"></i>
					</h1>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="large-3 columns">
				<div class="panel radius">
					<div class="large-12">
						<h4 class="text-center"><i class="fi-results"></i> RAM</h4>
					</div>
					<div class="large-12">
						<div class="text-center">
							<div class="progress large-10 large-offset-1">
								<span id="percentUsedRAMBar" class="meter" style="width: 0%"></span>
							</div>
							<span id="percentUsedRAM"></span> %
						</div>
					</div>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="panel radius">
					<div class="large-12">
						<h4 class="text-center">Up time</h4>
					</div>
					<div class="text-center">
						Device start on <span id="uptimeStartDate"></span>
					</div>
				</div>
			</div>
			<div class="large-6 columns">
				<div class="panel radius">
					<div class="large-12">
						<h4 class="text-center">Disk space usage</h4>
					</div>
					<div class="large-12">
						<table class="large-12">
							<thead>
								<tr>
									<th>Disk name</th>
									<th>Type/Format</th>
									<th>Percent used</th>
								</tr>
							</thead>
							<tbody id="listDisk">

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="panel radius">
					<div class="large-12">
						<h4 class="text-center">OS</h4>
					</div>
					<div class="large-12 text-center">
						<span id="osName"></span><br/>
						Version <span id="osVersion"></span><br/>
						Processeur : <span id="processeur"></span>
					</div>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="panel radius">
					<div class="large-12">
						<h4 class="text-center">Network</h4>
					</div>
					<div class="large-12">
						<ul>
							<li>IP address : <span id="ipAddress"></span></li>
							<li>MAC address : <span id="macAddress"></span></li>
							<li>Host name : <span id="hostName"></span></li>
							<li>Netmask : <span id="netmask"></span></li>
							<li>Default gateway : <span id="defaultGateway"></span></li>
							<li>Primary DNS : <span id="primaryDNS"></span></li>
							<li>Secondary DNS : <span id="secondaryDNS"></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<script src="./Foundation/js/vendor/modernizr.js"></script>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="./ajax-functions.js"></script>

	</body>
</html>
