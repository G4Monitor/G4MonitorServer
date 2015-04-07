<?php

	$deviceMAC = trim($_POST['deviceMAC'], '\n');
	$deviceName = trim($_POST['deviceName'], '\n');
	$deviceOS = trim($_POST['deviceOS'], '\n');
	$deviceOSVersion = trim($_POST['deviceOSVersion'], '\n');
	$deviceProcessor = trim($_POST['deviceProcessor'], '\n');

$bdd = new PDO('mysql:host=127.0.0.1;dbname=g4monitor;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$req2 = $bdd->prepare("UPDATE device SET deviceName = :deviceName, deviceOS = :deviceOS, deviceOSVersion = :deviceOSVersion, deviceProcessor = :deviceProcessor, deviceLastUpdateDate = :deviceLastUpdateDate WHERE deviceMac = :deviceMac");
			//$req2 = $bdd->prepare("UPDATE device SET deviceName = :deviceName WHERE deviceMac = :deviceMac");
			$req2->execute(array(
				'deviceMac' => $deviceMAC,
				'deviceName' => $deviceName,
				'deviceOS' => $deviceOS,
				'deviceOSVersion' => $deviceOSVersion,
				'deviceProcessor' => $deviceProcessor,
				'deviceLastUpdateDate' => date("Y-m-d H:i:s")
			));
?>