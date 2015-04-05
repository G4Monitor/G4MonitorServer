<?php
	
	require "conf.php" ;
	
	$host = new Config;

	$ip_host = $host->setIpHost('192.168.1.20');
	$port    = $host->setPort(4445);

	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$result = socket_connect($socket, $ip_host, $port) or die("Could not connect to server\n"); 

	// Récupération du nombre de disques présents
	$getIp = "NetInfo--getIPAddress\n";
	socket_write($socket, $getIp, strlen($getIp)) or die("Could not send data to server\n");
	$response['ip_address'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	$getMACAddress = "NetInfo--getMACAddress\n";
	socket_write($socket, $getMACAddress, strlen($getMACAddress)) or die("Could not send data to server\n");
	$response['mac_address'] = socket_read($socket, 2048, PHP_NORMAL_READ);
	
	$response = json_encode($response);

	// close socket
	socket_close($socket);
	
	echo $response;

?>