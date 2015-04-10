<?php 
require "verif_if_logged.php";

include "conf.php";
$config = new Config;

if (isset($_POST['error_state']) && isset($_POST['error_id']) && $_POST['error_state'] && $_POST['error_id'])
{
	$config->change_state_error($_POST['error_id'], $_POST['error_state']);
}

header("Location: global-history.php");
die();
?>