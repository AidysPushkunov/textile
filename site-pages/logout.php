<?php 
	session_start();
	if (!$_SESSION['name_auth']) {
		header('location: authication-user.php');
	}
	session_start();
	session_unset();
	session_destroy();
	header('location: authication-user.php')
?>
