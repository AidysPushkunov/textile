<?php include("includes/db.php");
$echo = '<div class="registration-render.php">
                <h3>Регистрация</h3>
                <form method="post" class="forum-authentication" action="register-render.php">
                    <input type="name" name="mail" required placeholder="Почта" class="login"><br>
                    <input type="name" name="name" required placeholder="Логин" class="login"><br>
                    <input type="password" name="password" required placeholder="Пароль" class="password"><br>
                    <input type="password" name="password-repeat" required placeholder="Подтвердите пароль" class="password"><br>
                    <input type="submit" value="Зарегистрироваться" class="button"><br>
                    <a href="authication-user.php">Уже зарегистрированны?</a>
                </form>
            </div>';
?>




<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация | Интернет магазин текстильной продукции</title>
    <link type="image/x-icon" href="./images/logo-textile.png" rel="shortcut icon">
    <link type="Image/x-icon" href="./images/logo-textile.png" rel="icon">

    <link rel="stylesheet" type="text/css" href="../style/admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@100;300;400;500;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body> 

    <div class="logo">
        <a href="index.html ">
            <div class="text">
                <b>T</b><span>extile</span>
            </div>
        </a>
    </div>
    
    <div class='wrapper'>
        <main class='main' id='main'>
            <?php echo $echo; ?>
        </main>
    </div>
</body>
</html>