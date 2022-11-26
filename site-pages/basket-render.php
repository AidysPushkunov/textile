
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет магазин текстильной продукции</title>
    
  
    <link rel="stylesheet" type="text/css" href="../style/basket.css">
   

</head>
<?php 
    include "../includes/db.php"; 

    $user_id = $_GET['userid'];
    echo "hello world $user_id";

    $sql = "SELECT * FROM `basket_users` WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);

?>

<!-- <table style="border: 1px solid black"> -->
<?php
    // echo "<tr><td >id_basket</td><td>user_id</td><td>product_id</td><td>buy</td></tr>";
    foreach($result as $res) {
        $id_basket    = $res['id_basket'];
        $user_id      = $res['user_id'];
        $product_id   = $res['product_id'];
        $buy          = $res['buy'];

        $sql_update = "UPDATE `basket_users` SET buy = true WHERE user_id = $user_id";
        mysqli_query($conn, $sql_update);   

        // echo "<tr><td>$id_basket</td><td>$user_id</td><td>$product_id</td><td>$buy</td></tr>";
    }

	header('location: ./basket.php?userid=false&productid=false');

?>
    
<!-- </table> -->
