<?php
	
	require "conf.php" ;
	
	$host = new Config;

	$ip_host = $host->setIpHost('192.168.31.182');
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

	$getHostName= "NetInfo--getHostName\n";
	socket_write($socket, $getHostName, strlen($getHostName)) or die("Could not send data to server\n");
	$response['host_name'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	$getNetmask= "NetInfo--getNetmask\n";
	socket_write($socket, $getNetmask, strlen($getNetmask)) or die("Could not send data to server\n");
	$response['netmask'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	$getDefaultGateway= "NetInfo--getNetmask\n";
	socket_write($socket, $getDefaultGateway, strlen($getDefaultGateway)) or die("Could not send data to server\n");
	$response['default_gateway'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	$getPrimaryDNS= "NetInfo--getPrimaryDNS\n";
	socket_write($socket, $getPrimaryDNS, strlen($getPrimaryDNS)) or die("Could not send data to server\n");
	$response['primary_dns'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	$getSecondaryDNS= "NetInfo--getSecondaryDNS\n";
	socket_write($socket, $getSecondaryDNS, strlen($getSecondaryDNS)) or die("Could not send data to server\n");
	$response['secondary_dns'] = socket_read($socket, 2048, PHP_NORMAL_READ);
	
	$response = json_encode($response);

	// close socket
	socket_close($socket);
	
	echo $response;

?>