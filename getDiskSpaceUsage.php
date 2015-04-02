<?php

	$host = '127.0.0.1';
	$port    = 4444;

	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n"); 

	// Récupération du nombre de disques présents
	$getNbDisks = "DiskSpaceUsage--getNumberDisks--0\n";
	socket_write($socket, $getNbDisks, strlen($getNbDisks)) or die("Could not send data to server\n");
	$result = socket_read($socket, 2048, PHP_NORMAL_READ);

	// Récupération des informations sur chaque disque

	// close socket
	socket_close($socket);
	
	echo $result;
?>