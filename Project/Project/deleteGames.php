<?php
    
    require_once('dbconfig.php');
    $sql = "DELETE FROM games WHERE game_id = $_GET[game_id]";
    $conn->query($sql);
    header('location:admin/admin.php');
    
?>