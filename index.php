<!DOCTYPE html>
<html>
	<head>
		<title>G4Monitor - Homepage</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./style.css">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation-icons.css">
		<script src="./Foundation/js/vendor/modernizr.js"></script>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="./ajax-functions.js"></script>
	</head>

	<body>

		<div class="row">
			<div class="large-12 columns">
				<h1 class="text-center">G4 Monitor</h1>
			</div>
		</div>

		<div class="row">
			<div class="large-10 columns">
				<h4>Computer : Robin-Portable</h4>
				<ul>
					<li>IP Address : 192.168.31.5</li>
					<li>MAC Address : bec2:a884e:bec2:a884e:bec2:a884e
				</ul>
			</div>
			<div class="large-2 columns">
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
					<div class="">
						<table>
							<thead>
								<tr>
									<th>Disk name</th>
									<th>Total space</th>
									<th>Used space</th>
									<th>Percent used</th>
								</tr>
								<div id="listDisk">

								</div>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="panel radius">
					<div class="large-12">
						<h4 class="text-center">RAM</h4>
					</div>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="panel radius">
					<div class="large-12">
						<h4 class="text-center">RAM</h4>
					</div>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="panel radius">
					<div class="large-12">
						<h4 class="text-center">RAM</h4>
					</div>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="panel radius">
					<div class="large-12">
						<h4 class="text-center">RAM</h4>
					</div>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="panel radius">
					<div class="large-12">
						<h4 class="text-center">RAM</h4>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
