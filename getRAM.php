<?php
	require "conf.php" ;
	
	$host = new Config;

	$ip_host = $host->setIpHost($_REQUEST['ip_host']);
	$port    = $host->setPort(4445);

	// create socket
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

	// connect to server
	$result = socket_connect($socket, $ip_host, $port) or die("Could not connect to server\n"); 

	$getPercentUsedRAM = "RAM--getPercentUsedRAM\n";
	socket_write($socket, $getPercentUsedRAM, strlen($getPercentUsedRAM)) or die("Could not send data to server\n");
	$ram['percent_used_ram'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	$getTotalRAM = "RAM--getTotalRAM\n";
	socket_write($socket, $getTotalRAM, strlen($getTotalRAM)) or die("Could not send data to server\n");
	$ram['total_ram'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	$getUsedRAM = "RAM--getUsedRAM\n";
	socket_write($socket, $getUsedRAM, strlen($getUsedRAM)) or die("Could not send data to server\n");
	$ram['used_ram'] = socket_read($socket, 2048, PHP_NORMAL_READ);

	// close socket
	socket_close($socket);

	$ram['percent_used_ram'] = str_replace(CHR(10), "", $ram['percent_used_ram']);
	$ram['total_ram'] = str_replace(CHR(10), "", $ram['total_ram']);
	$ram['used_ram'] = str_replace(CHR(10), "", $ram['used_ram']);

	$ram = json_encode($ram);
	echo $ram;
?>