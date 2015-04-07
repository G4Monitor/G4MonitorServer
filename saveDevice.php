<?php
	date_default_timezone_set('Europe/Paris');
	$deviceMAC = substr(trim($_POST['deviceMAC'], '\n'),0,17);
	$deviceName = trim($_POST['deviceName'], '\n');
	$deviceOS = trim($_POST['deviceOS'], '\n');
	$deviceOSVersion = trim($_POST['deviceOSVersion'], '\n');
	$deviceProcessor = trim($_POST['deviceProcessor'], '\n');

	try {
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=g4monitor;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare("SELECT deviceMac as vDevice FROM device WHERE deviceMac = :deviceMAC");
		$req->execute(array(
			':deviceMAC' => $deviceMAC
		));

		$vDevice = $req->rowCount();

		var_dump($vDevice);

		if(!$vDevice) {
			$req = $bdd->prepare("INSERT INTO device(deviceMAC, deviceName, deviceOS, deviceOSVersion, deviceProcessor, deviceSaveDate, deviceLastUpdateDate) VALUES(:deviceMAC, :deviceName, :deviceOS, :deviceOSVersion, :deviceProcessor, now(), now())");
			$req->execute(array(
				'deviceMAC' => $deviceMAC,
				'deviceName' => $deviceName,
				'deviceOS' => $deviceOS,
				'deviceOSVersion' => $deviceOSVersion,
				'deviceProcessor' => $deviceProcessor
			));
			echo 'insert';
		}
		else {
			$sql = "UPDATE device SET deviceName = :deviceName, 
			            deviceOS = :deviceOS, 
			            deviceOSVersion = :deviceOSVersion,  
			            deviceProcessor = :deviceProcessor,  
			            deviceLastUpdateDate = now()  
			            WHERE deviceMac = :deviceMAC";
			$stmt = $bdd->prepare($sql);                                  
			$stmt->bindParam(':deviceName', $deviceName, PDO::PARAM_STR);       
			$stmt->bindParam(':deviceOS', $deviceOS, PDO::PARAM_STR);    
			$stmt->bindParam(':deviceOSVersion', $deviceOSVersion, PDO::PARAM_STR);
			// use PARAM_STR although a number  
			$stmt->bindParam(':deviceProcessor', $deviceProcessor, PDO::PARAM_STR);  
			$stmt->bindParam(':deviceMAC', $deviceMAC, PDO::PARAM_STR);   
			$stmt->execute(); 
		}
	} catch(Exception $e) {
		echo $e->getMessage();
	}

?>