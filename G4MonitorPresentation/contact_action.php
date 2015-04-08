<?php 
session_start();

if(isset($_POST['name']) && isset($_POST['email']))
{ 
    extract($_POST);
    $to="dalleau.romain@gmail.com";
    $subject = "Contact about G4 Monitor";

    $_SESSION['msg_send'] = mail ( $to, $subject, $message );

	header("Location: index.php?msg_send=1#contact");
	die();
}
else
{
	header("Location: index.php?msg_send=0#contact");
	die();
}


?>