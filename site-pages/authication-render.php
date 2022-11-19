<?php include("../includes/db.php");
   ini_set('display_errors', 1); 
   ini_set('display_startup_errors', 1); 
   error_reporting(E_ALL);
   
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $search_query = "SELECT * from `users` WHERE mail = '{$mail}' AND password = '{$password}'";
    $user_mail = mysqli_query($conn, $search_query);
    $user = mysqli_fetch_assoc($user_mail);

    // echo $user['name'];


    if ($user) {
        // $user = mysqli_fetch_assoc($user_mail);

        echo "Success!";

        $sql = "SELECT * FROM users WHERE mail = '{$mail}'";
		$results_users = mysqli_query($conn, $sql);
		// print_r($results_users);
	
        
        session_start();
        $_SESSION['name_auth'] = true;
        $_SESSION['user_name'] = $user['name'];
        foreach ($results_users as $rows) {
			$user_id = $rows["id"];
            $_SESSION['user_id'] = $user_id;
		}
       
        header('Location: profile.php');
    } else {
        echo "Почта или пароль указаны неверно<br> <a href='./authication-user.php'>вернуться назад</a>";
    }
?>