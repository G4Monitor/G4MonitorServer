<?php 
session_start();
require "conf.php" ;

if(isset($_SESSION['is_logged']) &&  $_SESSION['is_logged'])
{
	header("Location:index.php");
	die();
}

$conf = new Config ;
if(isset($_POST['login']) && isset($_POST['password']))
{
	$conf->authentification($_POST['login'], $_POST['password']) ;

	if($_SESSION['is_logged'])
	{
		header("location: index.php");
		die();
	}
	else
	{
		header("location: authentication.php");
		die();
	}
}


?>