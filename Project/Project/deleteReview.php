<?php
    
    require_once('dbconfig.php');
    $sql = "DELETE FROM reviews WHERE review_id = $_GET[review_id]";
    $conn->query($sql);
    header('location:admin/admin.php');
    
?>