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
			<a class="item" href="options.php">
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
		$sql = "SELECT type, state FROM error LIMIT 10 ";
		$rq = $bdd->prepare($sql);
		$rq->execute();
		$rq->setFetchMode(PDO::FETCH_OBJ);
		while( $r = $rq->fetch() )
		{
			$last_alerts[] = array("type" => $r->type, "state" => $r->state);
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
											<td class="large-4 columns"><?php echo "Date a récupérer dans la BDD" ;//substr($last_alert['date'], 0, 10) ;?></td>
											<td class="large-4 columns"><?php echo $last_alert['type'] ?></td>
											<td class="large-4 columns text-alert"><?php echo $last_alert['state'] ?></td>
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
							<?php 
								$sql = "SELECT deviceMac FROM device WHERE deviceMac != 'undefined' ";
								$rq = $bdd->prepare($sql);
								$rq->execute();
								$nbDevices = $rq->rowCount();
				
							?>
							<strong>Devices registered :</strong><br/>
							<?php echo $nbDevices ;?>
						</div>
						<div class="large-6 columns">
							<?php 
							$sql = "SELECT id FROM error ";
								$rq = $bdd->prepare($sql);
								$rq->execute();
								$total_errors_detected = $rq->rowCount();


								$sql = "SELECT id FROM error WHERE state = 'solved' ";
								$rq = $bdd->prepare($sql);
								$rq->execute();
								$total_errors_solved = $rq->rowCount();

							?>
							<strong>Errors solved/detected :</strong><br/>
							<?php echo $total_errors_solved .' / '.  $total_errors_detected; ?>	
						</div>
					</div>
				</div>
			</div>
			<div class="large-4 columns">
				<div class="panel" data-equalizer-watch>
					<h3 class="text-center">Fast network map</h3>
					<hr/>
					<div class="scrollableDiv">
						<?php 
						$last_updates = array();
						$sql = "SELECT d.deviceName, a.IPAddress, a.allocationDate FROM device d LEFT JOIN allocation a ON d.deviceMac = a.deviceMac LIMIT 10";
						$rq = $bdd->prepare($sql);
						$rq->execute();
						$rq->setFetchMode(PDO::FETCH_OBJ);
						while( $r = $rq->fetch() )
						{
							$last_updates[] = array("date" => $r->allocationDate, "deviceName" => $r->deviceName, "ip_adress" => $r->IPAddress );
						}

						?>
						<table class="large-12">
							<thead>
								<tr>
									<th class="large-4 columns">Host name</th>
									<th class="large-4 columns">Lastest update</th>
									<th class="large-4 columns">Latest IP</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach ($last_updates as $last_update) {
								?>
								<tr>
									<td class="large-4 columns"><?php echo $last_update['deviceName'] ?></td>
									<td class="large-4 columns"><?php echo substr($last_update['date'], 0, 10) ;?></td>
									<td class="large-4 columns"><?php echo $last_update['ip_adress'] ?></td>
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
		<div class="large-12 columns">
			<div class="panel">
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
       <div id="chart_div" style="width: 100%; height: 500px;"></div>

       	<?php
       	$stats_ram = array(); 
       	$sql = "SELECT AVG(percentUsedRAM) as average, SUBSTR(allocationDate, 1, 10) as date FROM ram WHERE deviceMac != 'undefined' GROUP BY SUBSTR(allocationDate, 1, 10) ";
		$rq = $bdd->prepare($sql);
		$rq->execute();
		$rq->setFetchMode(PDO::FETCH_OBJ);
		while( $r = $rq->fetch() )
		{
			$stats_ram[] = array("average" => $r->average, "date" => $r->date);
		}

       	?>
		<footer class="footer">
		<div class="row text-right">

				<a href="disconnect.php" style="font-size: 1.5em;"> Log out </a>
		</div>
		</footer>
           <script>  google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'RAM'],
          <?php 
       		 foreach ($stats_ram as $stat_ram) {
       		 ?>
          ['<?php echo $stat_ram['date'] ?>', <?php echo $stat_ram['average'] ?>],
          <?php 
      		}
      	?>
          
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