<?php 
    include "../includes/db.php"; 

    $delete_product_id = $_GET['deleteid'];
    echo "Hello From Altai!" . $delete_product_id;

    $sql = "DELETE FROM basket_users WHERE id_basket = {$delete_product_id}";
    mysqli_query($conn, $sql);

    header('Location: ./basket.php?productid=false&userid=false');
?>