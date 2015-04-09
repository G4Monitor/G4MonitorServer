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

	function authentification($login, $password)
	{
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=g4monitor;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$sql = "SELECT id FROM account WHERE login = :login AND password = :password";
		$rq = $bdd->prepare($sql);
		$rq->bindValue('login', $login, PDO::PARAM_STR);
		$rq->bindValue('password', sha1($password), PDO::PARAM_STR);
		$rq->execute();

		if($rq->rowCount())
		{
			$_SESSION['login'] = $login ;
			$_SESSION['is_logged'] = true ;
		}
		else
			$_SESSION['is_logged'] = false ;

		return true;
	}


}

?>