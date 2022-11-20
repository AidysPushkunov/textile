<?php
	session_start();
	if (!$_SESSION['auth']) {
		header('location: ../admin.php');
	}
	include("db.php");
	// print_r($_FILES['image']);

	print_r($_FILES['image']['tmp_name']);
	ini_set('display_errors', 1); 
	ini_set('display_startup_errors', 1); 
	error_reporting(E_ALL);

	$file_path = "uploads/" . time() . basename($_FILES['image']['name']);


	if (move_uploaded_file($_FILES['image']['tmp_name'], $file_path)) {
		echo 'Пост успешно загружен';
	} else {
		echo 'Произошла ошибка';
	}

	echo '<br><a href="./admin-panel.php">Вернуться назад</a>';

	// print_r($_POST['title-product']);
	// print_r($_POST['price-product']);

	$title_product = $_POST['title-product'];
	$price_product = $_POST['price-product'];

	
	$query = "INSERT INTO `products` (image, title, price) values ('$file_path', '$title_product', '$price_product')";
	$result = mysqli_query($conn, $query);

?>