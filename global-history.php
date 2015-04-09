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
			<a class="item active" href="global-history.php">
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
		<?php
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=g4monitor;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$last_alerts = array();
		$sql = "SELECT allocationDate, percentUsedRAM FROM ram WHERE percentUsedRAM > 50 LIMIT 10 ";
		$rq = $bdd->prepare($sql);
		$rq->execute();
		$rq->setFetchMode(PDO::FETCH_OBJ);
		while( $r = $rq->fetch() )
		{
			$last_alerts[] = array("date" => $r->allocationDate, "percentUsedRAM" => $r->allocationDate);
		}
		?>
		<div data-equalizer>
			<div class="large-4 columns">
				<div class="panel" data-equalizer-watch>
					<div class="row">
						<div class="large-12 columns">
							<h3 class="text-center">Latest alerts</h3>
							<hr/>
							<div class="scrollableDiv">
								<table class="large-12">
									<thead>
										<tr>
											<th class="large-4 columns">Date</th>
											<th class="large-4 columns">Type</th>
											<th class="large-4 columns">State</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($last_alerts as $last_alert) 
										{
										?>
										<tr>
											<td class="large-4 columns"><<?php echo substr($last_alert['date'], 0, 10) ;?></td>
											<td class="large-4 columns">RAM</td>
											<td class="large-4 columns text-alert">Unsolved</td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="large-4 columns">
				<div class="panel" data-equalizer-watch>
					<h3 class="text-center">General informations</h3>
					<hr/>
					<div class="row">
						<div class="large-6 columns">
							<strong>Devices registered :</strong><br/>
							64
						</div>
						<div class="large-6 columns">
							<strong>Errors solved/detected :</strong><br/>
							12 / 17
						</div>
					</div>
				</div>
			</div>
			<div class="large-4 columns">
				<div class="panel" data-equalizer-watch>
					<h3 class="text-center">Fast network map</h3>
					<hr/>
					<div class="scrollableDiv">
						<table class="large-12">
							<thead>
								<tr>
									<th class="large-4 columns">Host name</th>
									<th class="large-4 columns">Lastest update</th>
									<th class="large-4 columns">Latest IP</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="large-4 columns">PortableRobin</td>
									<td class="large-4 columns">2014-04-09</td>
									<td class="large-4 columns">192.168.31.182</td>
								</tr>
								<tr>
									<td class="large-4 columns">PortableRobin</td>
									<td class="large-4 columns">2014-04-09</td>
									<td class="large-4 columns">192.168.31.182</td>
								</tr>
								<tr>
									<td class="large-4 columns">PortableRobin</td>
									<td class="large-4 columns">2014-04-09</td>
									<td class="large-4 columns">192.168.31.182</td>
								</tr>
								<tr>
									<td class="large-4 columns">PortableRobin</td>
									<td class="large-4 columns">2014-04-09</td>
									<td class="large-4 columns">192.168.31.182</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="large-12 columns">
			<div class="panel">
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
       <div id="chart_div" style="width: 100%; height: 500px;"></div>
           <script>  google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'RAM'],
          ['2015-04-09',  57],
          ['2015-04-09',  11],
          ['2015-04-09',  57],
          ['2015-04-09',  32],
             ['2015-04-09',  25],
          ['2015-04-09',  47],
          ['2015-04-09',  86],
          ['2015-04-09',  89],
             ['2015-04-09',  18],
          ['2015-04-09',  0],
          ['2015-04-09',  31],
          ['2015-04-09',  24],
             ['2015-04-09',  36],
          ['2015-04-09',  58],
          ['2015-04-09',  64],
          ['2015-04-09',  97],
        ]);

        var options = {
          title: 'History of the network\'s global state',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0, maxValue:100}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }</script>
             <div id="chart_div2" style="width: 100%; height: 500px;"></div>
           <script>  google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Errors detected', 'Errors solved'],
          ['2015-04-09', 0, 0],
          ['2015-04-09', 1, 1],
          ['2015-04-09',  5, 2],
          ['2015-04-09',  0, 0],
             ['2015-04-09', 0, 0],
          ['2015-04-09',   0, 2],
          ['2015-04-09',   0, 1],
          ['2015-04-09',   5, 4],
             ['2015-04-09',  2, 2],
          ['2015-04-09',   0, 1],
          ['2015-04-09',  0, 0],
          ['2015-04-09',  1, 1],
             ['2015-04-09',   1, 0],
          ['2015-04-09',  1, 1],
          ['2015-04-09',  1, 2],
          ['2015-04-09',  0, 0],
        ]);

        var options = {
          title: 'History of errors',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }</script>
			</div>
		</div>
	</body>
</html>