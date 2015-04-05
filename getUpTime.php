<?php
	
	require "conf.php" ;
	
	$host = new Config;

	$ip_host = $host->setIpHost('192.168.1.20');
	$port    = $host->setPort(4445);

	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$result = socket_connect($socket, $ip_host, $port) or die("Could not connect to server\n"); 

	$getUpTime = "UpTime--getStartDate\n";
	socket_write($socket, $getUpTime, strlen($getUpTime)) or die("Could not send data to server\n");
	$result = socket_read($socket, 2048, PHP_NORMAL_READ);

	// close socket
	socket_close($socket);
	
	echo $result;
	//return $result;
?>