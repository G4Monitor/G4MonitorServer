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
	$getNbDisks = "DiskSpaceUsage--getNumberDisks\n";
	socket_write($socket, $getNbDisks, strlen($getNbDisks)) or die("Could not send data to server\n");
	$nbDisks = $result = socket_read($socket, 2048, PHP_NORMAL_READ);
	
	$response = array();

	for($i = 0 ; $i < $nbDisks ; $i++) {
		$getDiskName = "DiskSpaceUsage--getDiskName--". $i ."\n";
		$getDiskTypeName = "DiskSpaceUsage--getDiskTypeName--". $i ."\n";
		$getDiskSystemTypeName = "DiskSpaceUsage--getDiskSystemTypeName--". $i ."\n";
		$getDiskTotalSpace = "DiskSpaceUsage--getDiskTotalSpace--". $i ."\n";
		$getDiskUsedSpace = "DiskSpaceUsage--getDiskUsedSpace--". $i ."\n";
		$getDiskPercentUsed = "DiskSpaceUsage--getDiskPercentUsed--". $i ."\n";
		
		socket_write($socket, $getDiskName, strlen($getDiskName)) or die("Could not send data to server\n");
		$result_disk_name = socket_read($socket, 2048, PHP_NORMAL_READ);

		socket_write($socket, $getDiskTypeName, strlen($getDiskTypeName)) or die("Could not send data to server\n");
		$result_disk_type = socket_read($socket, 2048, PHP_NORMAL_READ);

		socket_write($socket, $getDiskSystemTypeName, strlen($getDiskSystemTypeName)) or die("Could not send data to server\n");
		$result_disk_type_name = socket_read($socket, 2048, PHP_NORMAL_READ);

		socket_write($socket, $getDiskUsedSpace, strlen($getDiskUsedSpace)) or die("Could not send data to server\n");
		$result_used_space = socket_read($socket, 2048, PHP_NORMAL_READ);

		socket_write($socket, $getDiskTotalSpace, strlen($getDiskTotalSpace)) or die("Could not send data to server\n");
		$result_total_space = socket_read($socket, 2048, PHP_NORMAL_READ);

		socket_write($socket, $getDiskPercentUsed, strlen($getDiskPercentUsed)) or die("Could not send data to server\n");
		$result_percent_used = socket_read($socket, 2048, PHP_NORMAL_READ);
		//var_dump($result);
		$response[$i]["name"][] = $result_disk_name;
		$response[$i]["disk_type"] = $result_disk_type;
		$response[$i]["disk_type_name"] = $result_disk_type_name;
		$response[$i]["total_space"]= str_replace(CHR(10), "", $result_total_space);
		$response[$i]["used_space"]= str_replace(CHR(10), "", $result_used_space);
		$response[$i]["percent_used"]= str_replace(CHR(10), "", $result_percent_used);

	}

	// var_dump($response);
	$response = json_encode($response);

	

	// Récupération des informations sur chaque disque

	// close socket
	socket_close($socket);
	
	echo $response;
?>