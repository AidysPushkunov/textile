<?php 
    include "db.php";
    session_start();
	if (!$_SESSION['auth']) {
		header('location: ../admin.php');
	}
    ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL);


    $name = $_POST['name'];
    $password = $_POST['password'];
    $respons = $_POST['respons'];


    $query =  "INSERT INTO `admins` (name, password, respons) values ('$name', '$password', '$respons')";
    $result = mysqli_query($conn, $query);


    if ($result) {
        echo "Админ успешно добавлен <br> <a href='admin-panel.php'>Вернуться назад</a>";
    } else {
        echo "Что то пошло не так <br> <a href='admin-panel.php'>Вернуться назад</a>";
    }
?>