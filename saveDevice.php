<?php

	$deviceMAC = trim($_POST['deviceMAC'], '\n');
	$deviceName = trim($_POST['deviceName'], '\n');
	$deviceOS = trim($_POST['deviceOS'], '\n');
	$deviceOSVersion = trim($_POST['deviceOSVersion'], '\n');
	$deviceProcessor = trim($_POST['deviceProcessor'], '\n');

	try {
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=g4monitor;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare("SELECT deviceMac as vDevice FROM device WHERE deviceMac = ?");
		$req->execute(array(
			$deviceMAC
		));

		$vDevice = $req->rowCount();

		if($vDevice == 1) {
			$req = $bdd->prepare("INSERT INTO device(deviceMAC, deviceName, deviceOS, deviceOSVersion, deviceProcessor, deviceSaveDate, deviceLastUpdateDate) VALUES(:deviceMAC, :deviceName, :deviceOS, :deviceOSVersion, :deviceProcessor, :deviceSaveDate, :deviceLastUpdateDate)");
			$req->execute(array(
				'deviceMAC' => $deviceMAC,
				'deviceName' => $deviceName,
				'deviceOS' => $deviceOS,
				'deviceOSVersion' => $deviceOSVersion,
				'deviceProcessor' => $deviceProcessor,
				'deviceSaveDate' =>	date("Y-m-j H:i:s"),
				'deviceLastUpdateDate' => date("Y-m-d H:i:s")
			));
			echo 'insert';
		}
		else {
			/*$req2 = $bdd->prepare("UPDATE device SET deviceName = :deviceName, deviceOS = :deviceOS, deviceOSVersion = :deviceOSVersion, deviceProcessor = :deviceProcessor, deviceLastUpdateDate = :deviceLastUpdateDate WHERE deviceMac = :deviceMac");
			//$req2 = $bdd->prepare("UPDATE device SET deviceName = :deviceName WHERE deviceMac = :deviceMac");
			$req2->execute(array(
				'deviceMac' => $deviceMAC,
				'deviceName' => $deviceName,
				'deviceOS' => $deviceOS,
				'deviceOSVersion' => $deviceOSVersion,
				'deviceProcessor' => $deviceProcessor,
				'deviceLastUpdateDate' => date("Y-m-j H:i:s")
			));*/
$date = date("Y-m-d H:i:s");
			$sql = "UPDATE device SET deviceName = :deviceName, 
			            deviceOS = :deviceOS, 
			            deviceOSVersion = :deviceOSVersion,  
			            deviceProcessor = :deviceProcessor,  
			            deviceLastUpdateDate = :deviceLastUpdateDate  
			            WHERE deviceMac = :deviceMAC";
			$stmt = $bdd->prepare($sql);                                  
			$stmt->bindParam(':deviceName', 'test', PDO::PARAM_STR);       
			$stmt->bindParam(':deviceOS', $deviceOS, PDO::PARAM_STR);    
			$stmt->bindParam(':deviceOSVersion', $deviceOSVersion, PDO::PARAM_STR);
			// use PARAM_STR although a number  
			$stmt->bindParam(':deviceProcessor', $deviceProcessor, PDO::PARAM_STR); 
			$stmt->bindParam(':deviceLastUpdateDate', $date, PDO::PARAM_STR);   
			$stmt->bindParam(':deviceMAC', $deviceMAC, PDO::PARAM_STR);   
			$stmt->execute(); 
		}
	} catch(Exception $e) {
		echo $e->getMessage();
	}

?>