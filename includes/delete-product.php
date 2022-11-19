<?php 
    include 'db.php';

    $product_id = $_POST['product-id'];

    $query_sql = "DELETE from `products` WHERE id={$product_id}";
    $result = mysqli_query($conn, $query_sql);

    if ($result) {
        echo("Продукт успешно удален<br> <a href='admin-panel.php'>Вернуться назад</a>");
    } else {
        echo "Такого продукта нету <br> <a href='admin-panel.php'>Вернуться назад</a>";
    }
    
?>