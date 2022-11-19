<?php 
   include 'db.php';

   $admin_id = $_POST['id-admin'];

   if ($admin_id == 1) {
     echo "Вы не можете удалить данного администратора <br> <a href='admin-panel.php'>Вернуться назад</a>";
   } else {

        $query_sql = "DELETE from `admins` WHERE id={$admin_id}";
        $result = mysqli_query($conn, $query_sql);
    
        if ($result) {
            echo("Админ успешно удален<br> <a href='admin-panel.php'>Вернуться назад</a>");
        } else {
            echo "Такого админа нету <br> <a href='admin-panel.php'>Вернуться назад</a>";
        }
   }

?>