<?php
    
    require_once('dbconfig.php');
    $sql = "DELETE FROM catagories WHERE cat_id = $_GET[user_id]";
    $conn->query($sql);
    header('location:categories.php');
    
?>