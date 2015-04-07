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
		<nav class="top-bar" data-topbar role="navigation" data-options="is_hover: false">
			<div class="row">
				<div class="large-12 columns">
					<a href="#"> G4 Monitor </a>
				</div>
			</div>
		</nav>

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
						Version <span id="osVersion"></span>
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
			<div id="line_top_x"></div>
		</div>



		<script src="./Foundation/js/vendor/modernizr.js"></script>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="./ajax-functions.js"></script>

		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
    google.load('visualization', '1.1', {packages: ['line']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'percentUsedRAM');

      data.addRows([
        [1,  37.8],
        [2,  30.9],
        [3,  25.4],
        [4,  11.7],
        [5,  11.9],
        [6,   8.8],
        [7,   7.6]
      ]);

      var options = {
        chart: {
          title: 'Used Ram',
          subtitle: 'in Percent'
        },
        axes: {
          x: {
            0: {side: 'bottom'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, options);
    }
  </script>


	</body>
</html>
