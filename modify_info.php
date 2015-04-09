<?php 
require "verif_if_logged.php";
require "conf.php";

$config = new Config;

$login = false;
$password = false;

if((isset($_POST['login']) && $_POST['login']))
	$login = $_POST['login'];

if (isset($_POST['password']) && $_POST['password'])
	$password = $_POST['password'];

$config->modify_info_login($login, $password);

if(isset($_POST['email']) && $_POST['email'])
	$config->add_email($_POST['email']);

/*echo $login;
echo $password;
var_dump($_POST);
die();*/
header("Location: options.php?modify=1");
die();
?>
