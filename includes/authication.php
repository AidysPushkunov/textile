<?php include("db.php");


	$name = $_POST['name'];
	$password = $_POST['password'];	


	$query = "SELECT * from `admins` WHERE name='$name' and password='$password'";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) == 1) 
	{		
	
	
		session_start(); 
		$_SESSION['auth'] = 'true';
		$_SESSION['name'] = $name;
		header('location: admin-panel.php');

	}

	else 
	{
		echo "Wrong name or password.<br> <a href='../admin.php'>Come back</a>";

	}
	




	// print_r($food);

?>