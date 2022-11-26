<?php 
include("db.php");
// include("authication.php");

	session_start();
	if (!$_SESSION['auth']) {
		header('location: ../admin.php');
	}

    if ($_GET['del']) {
        $idname = $_GET['del'];
        mysqli_query($conn, "DELETE FROM admins WHERE id=$idname");
    }

    if ($_GET['delpost']) {
        $idname = $_GET['delpost'];
        mysqli_query($conn, "DELETE FROM products WHERE id=$idname");
    }
    // $name = mysqli_query($conn, "SELECT * FROM `admins` WHERE name='$name'");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель | Интернет магазин текстильной продукции</title>
    <link type="image/x-icon" href="../images/logo-textile.png" rel="shortcut icon">
    <link type="Image/x-icon" href="../images/logo-textile.png" rel="icon">

    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../style/admin-panel.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@100;300;400;500;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body> 
    <div class="profile">
    <header>
            <nav>
                <div class="menu">
                    <div class="logo">
                        <a href="index.html ">
                            <div class="text">
                                <b>T</b><span>extile</span>
                                <h6>AdminPanel</h6>
                            </div>
                        </a>
                    </div>


                    <div id="burger" class="burger">
                        <div class="top"></div>
                        <div class="middle"></div>
                        <div class="bottom"></div>
                    </div>
    
                    <div class="menu-items">
                        <ul>
                            <li><a href="#addproduct">Добавить продукт</a></li>
                            <li><a href="#product">Продукты</a></li>
                            <li><a href="#order">Заказы</a></li>
                            <li><a href="#client">Клиенты</a></li>
                            <li><a href="#admin">Администраторы</a></li>
                        </ul>
                    </div>
                </div>

                </div>
    

             
            </nav>

        </header>

        <div class="container">
            <div class="profile-admin">
                <div class="profile-name">
                    <h5>Имя администратора: <?php echo($_SESSION['name']); ?></h5> 
                </div>
                <a href="logout.php">Выйти</a>
            </div>

            <div class="info-admin-panel">
                <h2>Добро пожаловать в панель администратора</h2>
                <p><i>На этой страничке вы можете редактировать и управлять сайтом Textile Production. Желаем удачи!!!</i></p>
                <h2 id="admin">Список администраторов</h2>
                <table class="table-admins">
                    <tr><td>id</td><td>name</td><td>password</td><td>respons</td></tr>
                    <?php 
                        $sql = "SELECT * FROM admins";
                        $results = mysqli_query($conn, $sql);

         
    
                        if ($results > 0) {
                            foreach($results as $row) {
                                $userid = $row["id"];
                                $username = $row["name"];
                                $userpassword = $row["password"];
                                $userrespons = $row["respons"];

                                if ($_SESSION['name'] == 'admin') {
                                    if ($userid != 1) {
                                    echo("<tr><td>$userid</td><td>$username</td><td>$userpassword</td><td>$userrespons</td><td><a href='?del=$userid'>Удалить</a></td></tr>");
                                    }

                                } else {
                                    echo("<tr><td>$userid</td><td>$username</td><td>$userpassword</td><td>$userrespons</td></tr>");
                                }
    
                            }
                        }
            

                    ?>
                    
                </table>

                <h2 id="product">Список продуктов</h2>
                <table class="table-admins">
                    <tr><td>id</td><td>title</td><td>price</td></tr>
                    <?php 
                        $sql = "SELECT * FROM products";
                        $results = mysqli_query($conn, $sql);

         
    
                        if ($results > 0) {
                            foreach($results as $row) {
                                $userid = $row["id"];
    
                                $userpassword = $row["title"];
                                $userrespons = $row["price"];

                                if ($_SESSION['name'] == 'admin') {
                                    if ($userid != 1) {
                                    echo("<tr><td>$userid</td><td>$userpassword</td><td>$userrespons</td><td><a href='?delpost=$userid'>Удалить</a></td></tr>");
                                    }

                                } else {
                                    echo("<tr><td>$userid</td><td>$userpassword</td><td>$userrespons</td></tr>");
                                }
    
                            }
                        }
            

                    ?>
                    
                </table>

                <h2 id="client">Список клиентов</h2>
                <table class="table-admins">
                    <tr><td>id</td><td>mail</td><td>name</td></tr>
                    <?php 
                        $sql = "SELECT * FROM users";
                        $results = mysqli_query($conn, $sql);

         
    
                        if ($results > 0) {
                            foreach($results as $row) {
                                $userid = $row["id"];
    
                                $usermail = $row["mail"];
                                $username = $row["name"];

                                if ($_SESSION['name'] == 'admin') {
                                    if ($userid != 1) {
                                    echo("<tr><td>$userid</td><td>$usermail</td><td>$username</td><td><a href='?delpost=$userid'>Удалить</a></td></tr>");
                                    }

                                } else {
                                    echo("<tr><td>$userid</td><td>$usermail</td><td>$username</td></tr>");
                                }
    
                            }
                        }
            

                    ?>
                    
                </table>
                



                <h2>Добавить администратора</h2>
                <form action="add-admin.php" method="post">
                    Имя нового администратора: 
                    <input type="text" name="name"><br>
                    Пароль для нового администратора: 
                    <input type="text" name="password"><br>
                    Должность: 
                    <input type="text" name="respons"><br>
                    <button>Добавить</button>
                </form>
                <h2>Удалить администратора</h2>
                <form action="delete-admin.php" method="post">
                    id администратора: 
                    <input type="text" name="id-admin"><br>
                    <button>Удалить</button>
                </form>
            </div>

            <div class="add-post">
                <h2 id="addproduct">Добавить продукт</h2>
                <form action="./upload.php" method="post" enctype="multipart/form-data">
                <h3>Выберите картинку:</h3>
                    <input type="file" name="image"><br>
                <h3>Название продукта:</h3>

                    <input type="text" name="title-product" placeholder="Название продукта" class="title-product-form"><br>
                <h3>Цена продукта:</h3>

                    <input type="text" name="price-product" placeholder="Цена продукта" class="price-product-form"><br>

                    <button type="submit">Загрузить</button>
                </form>
            </div>
            
            <div class="add-post">
                <h2>Удалить продукт</h2>
                <form action="delete-product.php" method="post" enctype="multipart/form-data">
    
                <h3>id продукта:</h3>
                    <input type="text" name="product-id" placeholder="id продукта" class="title-product-form"><br>
                    <button type="submit">Удалить</button>
                </form>
            </div>
        </div>
        <div class="container">
        <h2 id="order">Заказы которые ожидают ответа</h2>
        <?php 
            $sql = "SELECT * FROM `basket_users` WHERE buy = true";
            $result = mysqli_query($conn, $sql);

            

        ?>
        <table class="table-admins">
            <?php
                echo "<tr><td >id_basket</td><td>user_id</td><td>mail</td><td>product_id</td><td>buy</td></tr>";
                
                foreach($result as $res) {
                    $id_basket    = $res['id_basket'];
                    $user_id      = $res['user_id'];
                    $product_id   = $res['product_id'];
                    $buy          = $res['buy'];

                    $sql_update = "UPDATE `basket_users` SET buy = true WHERE user_id = $user_id";
                    mysqli_query($conn, $sql_update);   

                    $sql_email = "SELECT * FROM `users` WHERE id = $user_id";

                    $res_email = mysqli_query($conn, $sql_email);
                    foreach($res_email as $ress) {
                        $mail = $ress['mail'];
                    }
    

                    echo "<tr><td>$id_basket</td><td>$user_id</td><td>$mail</td><td>$product_id</td><td>$buy</td></tr>";
                }
            ?>
        </table>

    </div>
    </div>
    <script src="../scripts/burger.js"></script>
</body>
</html>