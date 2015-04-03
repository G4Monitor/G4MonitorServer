<?php

Class Config
{

	var $ip_host = false;
	var $port = false;

	function getIpHost()
	{
		return $this->ip_host;
	}

	function getPort()
	{
		return $this->port;
	}

	function setIpHost($value)
	{
		return $this->ip_host = $value;
	}

	function setPort($value)
	{
		return $this->port = $value;
	}


}

?>