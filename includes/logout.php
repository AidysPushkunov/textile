<?php 
	session_start();
	if (!$_SESSION['auth']) {
		header('location: ../admin.php');
	}
	session_start();
	session_unset();
	session_destroy();
	header('location: ../admin.php');
?>