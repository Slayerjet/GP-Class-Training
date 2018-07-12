<?php
    
    require_once('dbconfig.php');
    $sql = "DELETE FROM consoles WHERE console_id = $_GET[console_id]";
    $conn->query($sql);
    header('location:admin/admin.php');
    
?>