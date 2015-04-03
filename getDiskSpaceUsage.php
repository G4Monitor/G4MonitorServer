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
	$getNbDisks = "DiskSpaceUsage--getDiskName--0\n";
	socket_write($socket, $getNbDisks, strlen($getNbDisks)) or die("Could not send data to server\n");
	$result = socket_read($socket, 2048, PHP_NORMAL_READ);

	// Récupération des informations sur chaque disque

	// close socket
	socket_close($socket);
	
	echo $result;
?>