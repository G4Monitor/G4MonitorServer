<?php 
session_start();
if(isset($_SESSION['is_logged']) &&  $_SESSION['is_logged'])
{
	header("Location:index.php");
	die();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="./Foundation/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="./Foundation/css/foundation-icons.css">
        <link rel="shortcut icon" href="./favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
    	<div class="row">
    		<div class="large-12 text-center">
		    	<img src="./img/logo_g4monitor.png" width="300px"/>
				<section class="main">
					<form class="form-1" action="login_action.php" method="POST">
						<p class="field">
							<input type="text" name="login" placeholder="Username or email">
							<i class="icon-user icon-large"></i>
						</p>
							<p class="field">
								<input type="password" name="password" placeholder="Password">
								<i class="icon-lock icon-large"></i>
						</p>
						<p class="submit">
							<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
						</p>
					</form>
				</section>
			</div>
		</div>
	</body>
</html>