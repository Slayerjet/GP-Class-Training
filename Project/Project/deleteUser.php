<?php
    
    require_once('dbconfig.php');
    $sql = "DELETE FROM users WHERE user_id = $_SESSION[user_id]";
    $conn->query($sql);
    header('location:admin/admin.php');
    
?>