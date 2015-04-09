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
		$rq->setFetchMode(PDO::FETCH_OBJ);
		if($rq->rowCount())
		{
			$r = $rq->fetch();
			$_SESSION['login'] = $login ;
			$_SESSION['is_logged'] = true ;
			$_SESSION['password'] = sha1($password);
			$_SESSION['id_account'] = $r->id ;
		}			
		else
			$_SESSION['is_logged'] = false ;

		return true;
	}

	function email_adress_to_inform()
	{
		$ret="";
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=g4monitor;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$sql = "SELECT email FROM mailto WHERE sendto = 1";
		$rq = $bdd->prepare($sql);
		$rq->setFetchMode(PDO::FETCH_OBJ);
		while( $r = $rq->fetch() )
		{
			$ret .= ", ".$r->email;
		}

		$ret = substr($ret, 2);
		return $ret;
	}

	function add_email($email)
	{
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=g4monitor;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$sql = "INSERT INTO mailto (email, sendto) VALUES (:email, 1)";
		$rq = $bdd->prepare($sql);
		$rq->bindValue('email', $email, PDO::PARAM_STR);
		return $rq->execute();
	}

	function modify_info_login($login = false, $password = false)
	{
		if(!$login && !$password)
			return false;


		$login_account = $_SESSION['login'];
		$password_account = $_SESSION['password'];

		$bdd = new PDO('mysql:host=127.0.0.1;dbname=g4monitor;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$sql = "UPDATE account SET login = :login, password = :password WHERE id = ".$_SESSION['id_account'];
		$rq = $bdd->prepare($sql);
		if($login)
		{
			$rq->bindValue('login', $login, PDO::PARAM_STR);
		}
		else
		{
			$rq->bindValue('login', $login_account, PDO::PARAM_STR);
		}

		if($password)
		{
			$rq->bindValue('password', sha1($password), PDO::PARAM_STR);
		}
		else
		{
			$rq->bindValue('password', $password_account, PDO::PARAM_STR);
		}

		
		return $rq->execute();
	}


}

?>