<?php 

	$ip = 'localhost';
	$user = 'root';
	$password = 'zaq@12WSX';
	$db_name = 'textile_shop';

	$conn = mysqli_connect($ip, $user, $password, $db_name );

	if ($conn === false) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// echo "Connected successfully<br>";
	// mysqli_close($conn);

?>