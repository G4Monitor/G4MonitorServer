<?php
	
	require "conf.php" ;
	
	$host = new Config;

	$ip_host = $host->setIpHost($_REQUEST['ip_host']);
	$port    = $host->setPort(4445);

	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$result = socket_connect($socket, $ip_host, $port) or die("Could not connect to server\n"); 

	// Récupération du nombre de disques présents
	$getOSName = "SystemInfo--getOSName\n";
	socket_write($socket, $getOSName, strlen($getOSName)) or die("Could not send data to server\n");
	$response['os_name'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	$getOSVersion = "SystemInfo--getOSVersion\n";
	socket_write($socket, $getOSVersion, strlen($getOSVersion)) or die("Could not send data to server\n");
	$response['os_version'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	$getProcessor = "SystemInfo--getArch\n";
	socket_write($socket, $getProcessor, strlen($getProcessor)) or die("Could not send data to server\n");
	$response['processor'] = socket_read($socket, 2048, PHP_NORMAL_READ);
	
	$getAvailableProcessors = "SystemInfo--getAvailableProcessors\n";
	socket_write($socket, $getAvailableProcessors, strlen($getAvailableProcessors)) or die("Could not send data to server\n");
	$response['available_processors'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	$response = json_encode($response);

	// close socket
	socket_close($socket);
	
	echo $response;

?>