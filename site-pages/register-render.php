<?php include("../includes/db.php");
    $mail = $_POST['mail'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];

    if ($password == $password_repeat) {
        // echo "Passwords 100%";
        $query = "INSERT INTO `users` (mail, name, password) values ('$mail', '$name', '$password')";
        mysqli_query($conn, $query);
        echo "Вы успешно зарегистрировались <br> <a href='./..'>Вернуться</a>";
    }   else {
        echo "Пароли не совпадают";
    }

    // echo $mail;
    // echo $name;
    // echo $password;
    // echo $password_repeat;

?>