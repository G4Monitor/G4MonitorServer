<?php
include "conf.php";

$config = new Config;

	date_default_timezone_set('Europe/Paris');

	$deviceMac = substr(trim($_POST['deviceMac'], '\n'),0,17);
	$errorType = trim($_POST['errorType'], '\n');

	// Insertion de l'erreur dans la base
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=g4monitor;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$req = $bdd->prepare("INSERT INTO error(device_mac_address, type, state, errorDate) VALUES(:device_mac_address, :type, :state, now())");
	$req->execute(array(
			'device_mac_address' => $deviceMac,
			'type' => $errorType,
			'state' => 'Unsolved'
	));

	$subject = 'G4Monitor : Erreur ' . $errorType;
	$message = 'Hello, An error as occured on a monitored device : Device : ' . $deviceMac . ', Error type : ' . $errorType . '.';
	mail($config->email_adress_to_inform(), $subject , $message );

?>