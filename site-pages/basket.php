<?php 
    include "../includes/db.php"; 

    session_start();
	if (!$_SESSION['name_auth']) {
		header('location: authication-render.php');
	}

         
    ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет магазин текстильной продукции</title>
    
    <link type="image/x-icon" href=".././images/logo-textile.png" rel="shortcut icon">
    <link type="Image/x-icon" href=".././images/logo-textile.png" rel="icon">

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/navigation.css">
    <link rel="stylesheet" type="text/css" href="../style/product-block.css">
    <link rel="stylesheet" type="text/css" href="../style/profile.css">

    <link rel="stylesheet" type="text/css" href="../style/basket.css">
   

  <!--   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@100;300;400;500;800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


</head>
<body> 
    
    <div id="header" class="container">
        <header>
            <nav scrolling="no">
                <div class="menu" scrolling="no">
                    <div class="logo">
                        <a href="index.html ">
                            <div class="text">
                                <b>T</b><span>extile</span>
                            </div>
                        </a>
                    </div>
    
                    <div id="burger" class="burger" scrolling="no">
                        <div class="top"></div>
                        <div class="middle"></div>
                        <div class="bottom"></div>
                    </div>
    
                    <div class="menu-items" scrolling="no">
                        <ul>
                            <li><a href="./profile.php">Главное</a></li>
                            <li><a href="./products.php">Продукция</a></li>
                            <li><a href="./services.php">Услуги</a></li>
                            <li><a href="./about.php">О нас</a></li>
                            <li><a href="./basket.php?productid=false&userid=false" class="basket" id="basket-user">Корзина</a></li>
                            <li><a href="./logout.php">Выйти</a></li>
                        </ul>
                    </div>
                </div>
    
                <!--
                <div class="contacts">
                    <ul>
                        <li>E-mail: <a href="#">mywayinprogramming@gmail.com</a></li>
                        <li>телефон: <a href="#">8-913-222-22-22</a></li>
                        <li>адрес: <a href="#">г.Горно-Алтайск, улица промышленная 33/1</a></li>
                    </ul>
                </div>
                -->
             
            </nav>

        </header>

        <article>

                <div class="user-name">

                    <h5>Имя: <?php echo($_SESSION['user_name']); ?></h5> 
                    <a href="./logout.php">Выйти</a>
                </div>
                <div class="basket-style">
                    <h1>Ваша корзина:</h1>
                </div>
                <table class="table-admins">
                <tr><td>id</td><td>Номер товара</td><td>Товар</td><td>Цена</td></tr>
                <?php 

                    $count_all = 0;
                    // error_reporting(0);

                    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    // echo $url;
                    
                    
                    // error_reporting(0);

                    $product_id = $_GET['productid'];
                    $user_id = $_GET['userid'];

                    if ($product_id == 'false') {
                        // echo ("Hello");

                        $basket_callback = "SELECT * FROM `basket_users` WHERE user_id = {$_SESSION['user_id']}";
                        $result_basket = mysqli_query($conn, $basket_callback);                        
    
                        foreach($result_basket as $row) {
    
                            echo("<br>");
                            $row_product = $row['product_id'];
                            $idbasket= $row['id_basket'];
                            
    
                            $product_result = mysqli_query($conn, "SELECT * FROM `products` WHERE id={$row_product}");
                            
                            foreach($product_result as $res) {
                                $product_id = $res['id'];
                                $product_title = $res['title'];
                                $product_price = $res['price'];
                                
                                $count_all = $count_all + $product_price;
                                



                                echo("<tr><td>$idbasket</td><td>$product_id</td><td>$product_title</td><td>$product_price</td><td><a href='./delete-product_from_basket.php?deleteid=$idbasket'>Убрать</a></td></tr>");
                            }
                        
                        }
                        
                    } else {
                        $basket_sql = "INSERT INTO `basket_users` (user_id, product_id) values ('$user_id', '$product_id')";
                        mysqli_query($conn, $basket_sql);
              
                        $basket_callback = "SELECT * FROM `basket_users` WHERE user_id = {$_SESSION['user_id']}";
                        $result_basket = mysqli_query($conn, $basket_callback);
    
                        foreach($result_basket as $row) {
    
                            echo("<br>");
                            $row_product = $row['product_id'];
                            $idbasket= $row['id_basket'];
                            
    
                            $product_result = mysqli_query($conn, "SELECT * FROM `products` WHERE id={$row_product}");
                            
                            foreach($product_result as $res) {
                                $product_id = $res['id'];
                                $product_title = $res['title'];
                                $product_price = $res['price'];
                                
                                $count_all = $count_all + $product_price;
                                



                                echo("<tr><td>$idbasket</td><td>$product_id</td><td>$product_title</td><td>$product_price</td><td><a href='./delete-product_from_basket.php?deleteid=$idbasket'>Убрать</a></td></tr>");
                            }
                        
                        }
                        
                        // $product_id = $row['product_id'];
                        // $products_basket = "SELECT * FROM `products` WHERE id = . '$product_id' . ";
                        // $products_basket = mysqli_query($conn, $products_basket);
                        // foreach($products_basket as $res) {
                        //     print_r($res['title']);
                        // }
                    
                    }


                    /*
                        Проблема в том что из бд удаляется все товары с одинаковым айди надо сделать так чтобы удалялся только один товар
                        - Решение добавить в бд basket_users два столбца id и count для количества товаров
                        - Добавить уникальный id ключ и по нему удалять 
                    */

                  

                ?>
                </table>
                <?php echo("<h2>Итого к оплате: $count_all</h2>"); ?>
          
        </article>



    
        <footer>
            <div class="author">
                <hr>
                <i>Сайт создал <a href="mailto:MyWayInProgramming@gmail.com">Пушкунов Айдыс</a></i>
            </div>
        </footer>
    </div>

    <a href="#header"><div class="button-top">^</div></a>
    <script src=".././scripts/burger.js"></script>

</body>
</html>