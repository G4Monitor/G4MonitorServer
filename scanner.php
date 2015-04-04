<?php

	sleep(0.2);	
	$ip = $_POST['ip'];

	$result = shell_exec('ping -n 1 ' . $ip);
	if(preg_match('%Impossible de joindre%', $result)) {
		$result = false;
	}
	else {
		$result = true;
	}

	if($result == true) {
		echo $ip;
	}
	else {
		echo '';
	}
?>